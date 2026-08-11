<?php
/**
 * Performance helpers.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Lazy-load attribute helper for images/iframes.
 *
 * @param string $html Existing tag HTML or empty.
 * @param array  $attrs Extra attributes (src, alt, class, etc.).
 * @param string $tag   Tag name: img|iframe|video.
 * @return string
 */
function testro_lazy_attrs( $attrs = array(), $tag = 'img' ) {
	$defaults = array(
		'loading'  => 'lazy',
		'decoding' => 'async',
	);

	if ( 'img' === $tag ) {
		$defaults['alt'] = '';
	}

	$merged = array_merge( $defaults, $attrs );
	$out    = '';

	foreach ( $merged as $key => $value ) {
		if ( null === $value || false === $value ) {
			continue;
		}
		if ( true === $value ) {
			$out .= ' ' . esc_attr( $key );
			continue;
		}
		$out .= sprintf( ' %s="%s"', esc_attr( $key ), esc_attr( $value ) );
	}

	return trim( $out );
}

/**
 * Render a lazy image.
 *
 * @param string $src   Image URL.
 * @param string $alt   Alt text.
 * @param array  $attrs Extra attributes.
 * @return string
 */
function testro_lazy_img( $src, $alt = '', $attrs = array() ) {
	$attrs = array_merge(
		array(
			'src' => $src,
			'alt' => $alt,
		),
		$attrs
	);

	return '<img ' . testro_lazy_attrs( $attrs, 'img' ) . ' />';
}

/**
 * Defer non-critical scripts (exclude jQuery admin and localized handles we need early).
 *
 * @param string $tag    Script tag.
 * @param string $handle Handle.
 * @param string $src    Source URL.
 * @return string
 */
function testro_defer_scripts( $tag, $handle, $src ) {
	$skip = array( 'jquery-core', 'jquery-migrate', 'jquery' );
	if ( is_admin() || in_array( $handle, $skip, true ) ) {
		return $tag;
	}

	if ( false !== strpos( $tag, ' defer' ) || false !== strpos( $tag, ' async' ) ) {
		return $tag;
	}

	if ( 'testro-main' === $handle ) {
		return $tag;
	}

	return str_replace( ' src', ' defer src', $tag );
}
add_filter( 'script_loader_tag', 'testro_defer_scripts', 10, 3 );

/**
 * Optionally remove version query strings from static assets.
 *
 * @param string $src Source URL.
 * @return string
 */
function testro_remove_query_strings( $src ) {
	if ( strpos( $src, '?ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
// Uncomment if desired: add_filter( 'style_loader_src', 'testro_remove_query_strings', 15 ); add_filter( 'script_loader_src', 'testro_remove_query_strings', 15 );

/**
 * Disable embeds / oEmbed discovery when unused on marketing pages.
 */
function testro_disable_embeds() {
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	add_filter( 'embed_oembed_discover', '__return_false' );
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	add_filter( 'tiny_mce_plugins', 'testro_disable_embeds_tiny_mce_plugin' );
	add_filter( 'rewrite_rules_array', 'testro_disable_embeds_rewrites' );
}
add_action( 'init', 'testro_disable_embeds', 9999 );

/**
 * @param array $plugins Plugins.
 * @return array
 */
function testro_disable_embeds_tiny_mce_plugin( $plugins ) {
	return array_diff( $plugins, array( 'wpembed' ) );
}

/**
 * @param array $rules Rules.
 * @return array
 */
function testro_disable_embeds_rewrites( $rules ) {
	foreach ( $rules as $rule => $rewrite ) {
		if ( false !== strpos( $rewrite, 'embed=true' ) ) {
			unset( $rules[ $rule ] );
		}
	}
	return $rules;
}

/**
 * Remove unnecessary head links.
 */
function testro_cleanup_head() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
}
add_action( 'init', 'testro_cleanup_head' );

/**
 * Security-related HTTP headers (SEO / trust signals).
 *
 * @param array $headers Response headers.
 * @return array
 */
function testro_security_headers( $headers ) {
	if ( is_admin() ) {
		return $headers;
	}

	$headers['X-Content-Type-Options'] = 'nosniff';
	$headers['X-Frame-Options']        = 'SAMEORIGIN';
	$headers['Referrer-Policy']        = 'strict-origin-when-cross-origin';
	$headers['Permissions-Policy']     = 'geolocation=(), microphone=(), camera=()';
	$headers['X-XSS-Protection']       = '1; mode=block';

	// HSTS only over HTTPS (enable preload in production after verifying HTTPS everywhere).
	if ( is_ssl() ) {
		$headers['Strict-Transport-Security'] = 'max-age=31536000; includeSubDomains';
	}

	// Report-only CSP — observe violations without breaking YouTube/analytics embeds.
	$csp = array(
		"default-src 'self'",
		"script-src 'self' 'unsafe-inline' https://www.googletagmanager.com https://www.google-analytics.com https://www.youtube.com https://www.youtube-nocookie.com",
		"style-src 'self' 'unsafe-inline'",
		"img-src 'self' data: https: blob:",
		"font-src 'self' data:",
		"connect-src 'self' https://dev-api.thetestro.com https://api.thetestro.com https://www.google-analytics.com https://www.googletagmanager.com https://region1.google-analytics.com",
		"frame-src 'self' https://www.youtube.com https://www.youtube-nocookie.com https://www.google.com https://maps.google.com https://www.google.com/maps",
		"media-src 'self' blob:",
		"object-src 'none'",
		"base-uri 'self'",
		"form-action 'self'",
		"frame-ancestors 'self'",
	);
	$headers['Content-Security-Policy-Report-Only'] = implode( '; ', $csp );

	return $headers;
}
add_filter( 'wp_headers', 'testro_security_headers' );

/**
 * Ensure images added via content get lazy loading + decoding when missing.
 *
 * @param string $content Post content.
 * @return string
 */
function testro_content_image_attrs( $content ) {
	if ( false === strpos( $content, '<img' ) ) {
		return $content;
	}

	return preg_replace_callback(
		'/<img\b([^>]*)>/i',
		function ( $matches ) {
			$attrs = $matches[1];
			if ( false === stripos( $attrs, 'loading=' ) ) {
				$attrs .= ' loading="lazy"';
			}
			if ( false === stripos( $attrs, 'decoding=' ) ) {
				$attrs .= ' decoding="async"';
			}
			return '<img' . $attrs . '>';
		},
		$content
	);
}
add_filter( 'the_content', 'testro_content_image_attrs', 20 );
