<?php
/**
 * Sitemap and robots.txt customization + image/video sitemaps.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customize WordPress core sitemaps: exclude users, taxonomies that invite thin pages.
 *
 * @param WP_Sitemaps_Provider $provider Provider instance.
 * @param string               $name     Provider name.
 * @return WP_Sitemaps_Provider|false
 */
function testro_filter_sitemaps_add_provider( $provider, $name ) {
	if ( in_array( $name, array( 'users' ), true ) ) {
		return false;
	}
	return $provider;
}
add_filter( 'wp_sitemaps_add_provider', 'testro_filter_sitemaps_add_provider', 10, 2 );

/**
 * Exclude noindex-worthy taxonomies from sitemaps.
 *
 * @param array $taxonomies Taxonomies.
 * @return array
 */
function testro_sitemaps_taxonomies( $taxonomies ) {
	unset( $taxonomies['post_tag'], $taxonomies['category'] );
	return $taxonomies;
}
add_filter( 'wp_sitemaps_taxonomies', 'testro_sitemaps_taxonomies' );

/**
 * Keep thank-you / conversion pages out of the core sitemap.
 *
 * @param WP_Query $query Sitemap query.
 */
function testro_sitemaps_exclude_thankyou( $args, $post_type ) {
	if ( 'page' !== $post_type ) {
		return $args;
	}
	$exclude = array();
	foreach ( array( 'thank-you-contact', 'thank-you-demo', 'thank-you-newsletter', 'products', 'features', 'sample-page' ) as $slug ) {
		$page = get_page_by_path( $slug );
		if ( $page ) {
			$exclude[] = (int) $page->ID;
		}
	}

	$stubs = get_posts(
		array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'meta_key'       => '_testro_page_stub',
			'meta_value'     => '1',
		)
	);
	if ( $stubs ) {
		$exclude = array_merge( $exclude, array_map( 'intval', $stubs ) );
	}

	if ( $exclude ) {
		$args['post__not_in'] = isset( $args['post__not_in'] ) ? array_merge( (array) $args['post__not_in'], $exclude ) : $exclude;
	}
	return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'testro_sitemaps_exclude_thankyou', 10, 2 );

/**
 * Path prefix for subdirectory installs (e.g. /testro).
 *
 * @return string
 */
function testro_home_path_prefix() {
	$path = wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	$path = is_string( $path ) ? untrailingslashit( $path ) : '';
	return $path ? $path : '';
}

/**
 * Image sitemap URL.
 *
 * @return string
 */
function testro_image_sitemap_url() {
	return add_query_arg( 'testro_image_sitemap', '1', home_url( '/' ) );
}

/**
 * Video sitemap URL.
 *
 * @return string
 */
function testro_video_sitemap_url() {
	return add_query_arg( 'testro_video_sitemap', '1', home_url( '/' ) );
}

/**
 * Filter robots.txt output.
 *
 * Prefer this dynamic file over a static robots.txt so the sitemap URL
 * always matches the current environment (no localhost leftovers).
 *
 * @param string $output Robots.txt content.
 * @param bool   $public Whether blog is public.
 * @return string
 */
function testro_robots_txt( $output, $public ) {
	if ( ! $public ) {
		return $output;
	}

	$prefix = testro_home_path_prefix();

	$lines = array(
		'User-agent: *',
		'Allow: /',
		'',
		'# Thin / utility templates',
		'Disallow: ' . $prefix . '/?s=',
		'Disallow: ' . $prefix . '/search/',
		'Disallow: ' . $prefix . '/author/',
		'Disallow: ' . $prefix . '/tag/',
		'Disallow: ' . $prefix . '/category/',
		'',
		'# WordPress admin',
		'Disallow: ' . $prefix . '/wp-admin/',
		'Allow: ' . $prefix . '/wp-admin/admin-ajax.php',
		'Disallow: ' . $prefix . '/wp-includes/',
		'',
		'Sitemap: ' . esc_url_raw( home_url( '/wp-sitemap.xml' ) ),
		'Sitemap: ' . esc_url_raw( testro_image_sitemap_url() ),
		'Sitemap: ' . esc_url_raw( testro_video_sitemap_url() ),
		'',
	);

	return implode( "\n", $lines );
}
add_filter( 'robots_txt', 'testro_robots_txt', 10, 2 );

/**
 * Ensure sitemap URLs are advertised in head for discovery.
 */
function testro_sitemap_link_rel() {
	printf(
		'<link rel="sitemap" type="application/xml" title="Sitemap" href="%s" />' . "\n",
		esc_url( home_url( '/wp-sitemap.xml' ) )
	);
	printf(
		'<link rel="sitemap" type="application/xml" title="Image Sitemap" href="%s" />' . "\n",
		esc_url( testro_image_sitemap_url() )
	);
	printf(
		'<link rel="sitemap" type="application/xml" title="Video Sitemap" href="%s" />' . "\n",
		esc_url( testro_video_sitemap_url() )
	);
}
add_action( 'wp_head', 'testro_sitemap_link_rel', 3 );

/**
 * Serve Google image sitemap XML.
 */
function testro_serve_image_sitemap() {
	if ( empty( $_GET['testro_image_sitemap'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}

	$images = function_exists( 'testro_get_sitemap_images' ) ? testro_get_sitemap_images() : array();
	$loc    = trailingslashit( home_url( '/' ) );
	$mod    = gmdate( 'c', filemtime( TESTRO_DIR . '/inc/content.php' ) ?: time() );

	nocache_headers();
	header( 'Content-Type: application/xml; charset=UTF-8' );

	echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
	echo "  <url>\n";
	echo '    <loc>' . esc_url( $loc ) . "</loc>\n";
	echo '    <lastmod>' . esc_html( $mod ) . "</lastmod>\n";

	foreach ( $images as $image ) {
		echo "    <image:image>\n";
		echo '      <image:loc>' . esc_url( $image['url'] ) . "</image:loc>\n";
		if ( ! empty( $image['title'] ) ) {
			echo '      <image:title>' . esc_html( $image['title'] ) . "</image:title>\n";
		}
		if ( ! empty( $image['caption'] ) ) {
			echo '      <image:caption>' . esc_html( $image['caption'] ) . "</image:caption>\n";
		}
		echo "    </image:image>\n";
	}

	echo "  </url>\n";
	echo '</urlset>';
	exit;
}
add_action( 'template_redirect', 'testro_serve_image_sitemap', 0 );

/**
 * Serve Google video sitemap XML for homepage YouTube embeds.
 */
function testro_serve_video_sitemap() {
	if ( empty( $_GET['testro_video_sitemap'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}

	$videos = function_exists( 'testro_get_videos' ) ? testro_get_videos() : array();
	$loc    = trailingslashit( home_url( '/' ) ) . '#videos';
	$mod    = gmdate( 'c', (int) get_option( 'testro_videos_upload_date_ts', filemtime( TESTRO_DIR . '/inc/content.php' ) ?: time() ) );

	nocache_headers();
	header( 'Content-Type: application/xml; charset=UTF-8' );

	echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">' . "\n";

	foreach ( $videos as $video ) {
		$id        = isset( $video['id'] ) ? $video['id'] : '';
		$title     = isset( $video['title'] ) ? $video['title'] : 'theTestRo video';
		$thumb     = 'https://i.ytimg.com/vi/' . rawurlencode( $id ) . '/hqdefault.jpg';
		$player    = 'https://www.youtube.com/embed/' . rawurlencode( $id );
		$watch     = 'https://www.youtube.com/watch?v=' . rawurlencode( $id );
		$desc      = $title . ' — Intelligence-powered no-code test automation with theTestRo.';

		echo "  <url>\n";
		echo '    <loc>' . esc_url( $loc ) . "</loc>\n";
		echo '    <lastmod>' . esc_html( $mod ) . "</lastmod>\n";
		echo "    <video:video>\n";
		echo '      <video:thumbnail_loc>' . esc_url( $thumb ) . "</video:thumbnail_loc>\n";
		echo '      <video:title>' . esc_html( $title ) . "</video:title>\n";
		echo '      <video:description>' . esc_html( $desc ) . "</video:description>\n";
		echo '      <video:player_loc>' . esc_url( $player ) . "</video:player_loc>\n";
		echo '      <video:content_loc>' . esc_url( $watch ) . "</video:content_loc>\n";
		echo "      <video:family_friendly>yes</video:family_friendly>\n";
		echo "      <video:live>no</video:live>\n";
		echo "    </video:video>\n";
		echo "  </url>\n";
	}

	echo '</urlset>';
	exit;
}
add_action( 'template_redirect', 'testro_serve_video_sitemap', 0 );
