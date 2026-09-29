<?php
/**
 * Serve the optimized WebP version of every theme/media image on the front end.
 *
 * The final HTML is filtered once per request: image URLs in <img>/<source>
 * src/srcset, lazy-load data attributes, video posters, image preloads, inline
 * style url() values and <style> blocks are swapped for their WebP counterpart
 * when that file exists (see inc/images.php). Only the URL changes, so markup,
 * classes, dimensions and lazy-loading attributes stay untouched. Meta tags,
 * JSON-LD and other scripts are left alone.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * URL-path prefixes of locally served images mapped to their directories.
 *
 * @return array[] { path: URL path prefix, dir: absolute dir, type: theme|uploads }
 */
function testro_webp_url_roots() {
	static $roots = null;
	if ( null !== $roots ) {
		return $roots;
	}

	$roots = array(
		array(
			'path' => (string) wp_parse_url( TESTRO_URI . '/assets/', PHP_URL_PATH ),
			'dir'  => TESTRO_DIR . '/assets/',
			'type' => 'theme',
		),
	);

	$uploads = wp_get_upload_dir();
	if ( empty( $uploads['error'] ) ) {
		$roots[] = array(
			'path' => (string) wp_parse_url( trailingslashit( $uploads['baseurl'] ), PHP_URL_PATH ),
			'dir'  => trailingslashit( $uploads['basedir'] ),
			'type' => 'uploads',
		);
	}

	return $roots;
}

/**
 * WebP URL for a local JPG/PNG/GIF URL, or the URL unchanged.
 *
 * @param string $url Image URL (absolute, protocol-relative or root-relative).
 * @return string
 */
function testro_webp_url( $url ) {
	static $cache = array();
	if ( isset( $cache[ $url ] ) ) {
		return $cache[ $url ];
	}
	$cache[ $url ] = $url;

	if ( ! preg_match( '/^([^?#]+\.(?:jpe?g|png|gif))([?#].*)?$/i', $url, $m ) ) {
		return $url;
	}

	$host = wp_parse_url( $m[1], PHP_URL_HOST );
	if ( $host ) {
		$local = array_filter(
			array(
				wp_parse_url( home_url(), PHP_URL_HOST ),
				wp_parse_url( site_url(), PHP_URL_HOST ),
			)
		);
		if ( ! in_array( strtolower( $host ), array_map( 'strtolower', $local ), true ) ) {
			return $url;
		}
	}

	$path   = (string) wp_parse_url( $m[1], PHP_URL_PATH );
	$suffix = isset( $m[2] ) ? $m[2] : '';

	foreach ( testro_webp_url_roots() as $root ) {
		if ( '' === $root['path'] || 0 !== strpos( $path, $root['path'] ) ) {
			continue;
		}
		$rel_raw = substr( $path, strlen( $root['path'] ) );
		$rel     = rawurldecode( $rel_raw );

		if ( 'theme' === $root['type'] ) {
			$webp_rel = testro_webp_theme_relative( $rel );
			if ( '' === $webp_rel || ! is_file( $root['dir'] . $webp_rel ) ) {
				return $url;
			}
			$base = substr( $m[1], 0, strlen( $m[1] ) - strlen( $rel_raw ) );
			$webp = $base . str_replace( '%2F', '/', rawurlencode( $webp_rel ) );
		} else {
			if ( ! is_file( testro_webp_sidecar_path( $root['dir'] . $rel ) ) ) {
				return $url;
			}
			$webp = $m[1] . '.webp';
		}

		$cache[ $url ] = $webp . $suffix;
		return $cache[ $url ];
	}

	return $url;
}

/**
 * Apply testro_webp_url() to every candidate of a srcset value.
 *
 * @param string $srcset Srcset attribute value.
 * @return string
 */
function testro_webp_srcset( $srcset ) {
	$parts   = array_map( 'trim', explode( ',', $srcset ) );
	$changed = false;
	foreach ( $parts as $i => $part ) {
		$bits = preg_split( '/\s+/', $part, 2 );
		if ( ! empty( $bits[0] ) ) {
			$webp = testro_webp_url( $bits[0] );
			if ( $webp !== $bits[0] ) {
				$bits[0]     = $webp;
				$parts[ $i ] = implode( ' ', $bits );
				$changed     = true;
			}
		}
	}
	return $changed ? implode( ', ', $parts ) : $srcset;
}

/**
 * Rewrite url(...) references inside CSS text.
 *
 * @param string $css CSS.
 * @return string
 */
function testro_webp_css( $css ) {
	if ( false === stripos( $css, 'url(' ) ) {
		return $css;
	}
	return preg_replace_callback(
		'/url\(\s*(["\']?)([^"\')]+)\1\s*\)/i',
		function ( $m ) {
			$webp = testro_webp_url( trim( $m[2] ) );
			return $webp === trim( $m[2] ) ? $m[0] : 'url(' . $m[1] . $webp . $m[1] . ')';
		},
		$css
	);
}

/**
 * Rewrite image URLs inside one HTML tag.
 *
 * @param string $tag  Full tag markup.
 * @param string $name Lower-case tag name.
 * @return string
 */
function testro_webp_tag( $tag, $name ) {
	$attrs = array();
	if ( 'img' === $name || 'source' === $name ) {
		$attrs = array( 'src', 'srcset', 'data-src', 'data-srcset', 'data-lazy-src', 'data-lazy-srcset' );
	} elseif ( 'video' === $name ) {
		$attrs = array( 'poster' );
	} elseif ( 'link' === $name ) {
		if ( ! preg_match( '/\brel=(["\']?)preload\1/i', $tag ) || ! preg_match( '/\bas=(["\']?)image\1/i', $tag ) ) {
			return $tag;
		}
		$attrs = array( 'href', 'imagesrcset' );
	}
	$attrs = array_merge( $attrs, array( 'data-bg', 'data-background', 'data-background-image' ) );

	$tag = preg_replace_callback(
		'/(\s(' . implode( '|', array_map( 'preg_quote', $attrs ) ) . ')=)(["\'])(.*?)\3/is',
		function ( $m ) {
			$value = trim( $m[4] );
			$new   = false !== stripos( $m[2], 'srcset' ) ? testro_webp_srcset( $value ) : testro_webp_url( $value );
			return $new === $value ? $m[0] : $m[1] . $m[3] . $new . $m[3];
		},
		$tag
	);

	if ( 'link' === $name && false !== strpos( $tag, '.webp' ) ) {
		$tag = preg_replace( '/\btype=(["\'])image\/(png|jpe?g|gif)\1/i', 'type=$1image/webp$1', $tag );
	}

	if ( false !== stripos( $tag, 'style=' ) && false !== stripos( $tag, 'url(' ) ) {
		$tag = preg_replace_callback(
			'/(\sstyle=)(["\'])(.*?)\2/is',
			function ( $m ) {
				return $m[1] . $m[2] . testro_webp_css( $m[3] ) . $m[2];
			},
			$tag
		);
	}

	return $tag;
}

/**
 * Rewrite image URLs in a full HTML document.
 *
 * @param string $html HTML.
 * @return string
 */
function testro_webp_rewrite_html( $html ) {
	if ( ! preg_match( '/\.(?:jpe?g|png|gif)/i', $html ) ) {
		return $html;
	}

	// Scripts, textareas and comments pass through verbatim; <style> gets CSS rewriting.
	$chunks = preg_split( '#(<script\b.*?</script>|<textarea\b.*?</textarea>|<!--.*?-->|<style\b.*?</style>)#is', $html, -1, PREG_SPLIT_DELIM_CAPTURE );
	if ( false === $chunks ) {
		return $html;
	}

	foreach ( $chunks as $i => $chunk ) {
		if ( 1 === $i % 2 ) {
			if ( 0 === stripos( $chunk, '<style' ) ) {
				$chunks[ $i ] = testro_webp_css( $chunk );
			}
			continue;
		}
		if ( ! preg_match( '/\.(?:jpe?g|png|gif)/i', $chunk ) ) {
			continue;
		}
		$chunks[ $i ] = preg_replace_callback(
			'/<([a-z][a-z0-9-]*)\b[^>]*>/i',
			function ( $m ) {
				return preg_match( '/\.(?:jpe?g|png|gif)/i', $m[0] ) ? testro_webp_tag( $m[0], strtolower( $m[1] ) ) : $m[0];
			},
			$chunk
		);
	}

	return implode( '', $chunks );
}

/**
 * Output-buffer callback; leaves non-HTML responses (sitemaps, JSON) alone.
 *
 * @param string $buffer Response body.
 * @return string
 */
function testro_webp_buffer_callback( $buffer ) {
	if ( '' === $buffer || false === stripos( $buffer, '<' ) ) {
		return $buffer;
	}
	foreach ( headers_list() as $header ) {
		if ( 0 === stripos( $header, 'content-type:' ) && false === stripos( $header, 'html' ) ) {
			return $buffer;
		}
	}
	return testro_webp_rewrite_html( $buffer );
}

/**
 * Start buffering front-end page output.
 */
function testro_webp_start_buffer() {
	if ( is_admin() || wp_doing_ajax() || wp_doing_cron() || wp_is_json_request() || is_feed() || is_robots() || is_trackback() || is_customize_preview() ) {
		return;
	}
	/**
	 * Filters whether front-end HTML image URLs are swapped to WebP.
	 *
	 * @param bool $enabled Default true.
	 */
	if ( ! apply_filters( 'testro_webp_rewrite_html', true ) ) {
		return;
	}
	ob_start( 'testro_webp_buffer_callback' );
}
add_action( 'template_redirect', 'testro_webp_start_buffer', 1000 );
