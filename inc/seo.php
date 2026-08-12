<?php
/**
 * SEO helpers: titles, meta, OG, robots, trailing slash.
 *
 * Compatible with Yoast, Rank Math, AIOSEO, and SEOPress — skips duplicate
 * meta output when one of those plugins is active.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Whether a major SEO plugin is handling meta/schema.
 *
 * @return bool
 */
function testro_seo_plugin_active() {
	if ( defined( 'WPSEO_VERSION' ) || class_exists( 'WPSEO_Options', false ) ) {
		return true;
	}
	if ( defined( 'RANK_MATH_VERSION' ) || class_exists( 'RankMath', false ) ) {
		return true;
	}
	if ( defined( 'AIOSEO_VERSION' ) || function_exists( 'aioseo' ) ) {
		return true;
	}
	if ( defined( 'SEOPRESS_VERSION' ) || function_exists( 'seopress_init' ) ) {
		return true;
	}
	return (bool) apply_filters( 'testro_seo_plugin_active', false );
}

/**
 * Unique document titles.
 *
 * @param array $parts Title parts.
 * @return array
 */
function testro_document_title_parts( $parts ) {
	$product = function_exists( 'testro_get_product_page' ) ? testro_get_product_page() : null;
	$static  = function_exists( 'testro_get_static_page' ) ? testro_get_static_page() : null;

	if ( is_front_page() ) {
		$parts['title']   = 'Best Test Automation Platform for Modern Software Testing';
		$parts['tagline'] = '';
		$parts['site']    = '';
	} elseif ( is_404() ) {
		$parts['title'] = __( 'Page Not Found', 'testro' );
	} elseif ( is_search() ) {
		$parts['title'] = sprintf(
			/* translators: %s: search query */
			__( 'Search results for "%s"', 'testro' ),
			get_search_query()
		);
	} elseif ( $product && ! empty( $product['seo']['title'] ) ) {
		$parts['title'] = $product['seo']['title'];
		$parts['site']  = '';
	} elseif ( $static && ! empty( $static['seo']['title'] ) ) {
		$parts['title'] = $static['seo']['title'];
		$parts['site']  = '';
	} elseif ( is_page( 'terms-conditions' ) ) {
		$parts['title'] = __( 'Terms & Conditions | theTestRo', 'testro' );
		$parts['site']  = '';
	} elseif ( is_page( 'privacy-notice' ) ) {
		$parts['title'] = __( 'Privacy Notice | theTestRo', 'testro' );
		$parts['site']  = '';
	} elseif ( is_home() && ! is_front_page() ) {
		$parts['title'] = __( 'Test Automation Blog for QA Professionals | theTestRo', 'testro' );
		$parts['site']  = '';
	} elseif ( is_singular() && empty( $parts['title'] ) ) {
		$parts['title'] = get_the_title();
	}

	return $parts;
}
add_filter( 'document_title_parts', 'testro_document_title_parts' );

/**
 * Meta description for the current request.
 *
 * @return string
 */
function testro_get_meta_description() {
	if ( is_front_page() ) {
		return "Accelerate software testing with theTestRo's test automation platform. Automate web, API, cross-browser, AI-powered, and no-code testing from one platform.";
	}

	if ( function_exists( 'testro_get_product_page' ) ) {
		$product = testro_get_product_page();
		if ( $product && ! empty( $product['seo']['description'] ) ) {
			return $product['seo']['description'];
		}
	}

	if ( function_exists( 'testro_get_static_page' ) ) {
		$static = testro_get_static_page();
		if ( $static && ! empty( $static['seo']['description'] ) ) {
			return $static['seo']['description'];
		}
	}

	if ( is_page( 'terms-conditions' ) ) {
		return 'Read theTestRo Terms & Conditions covering use of our Intelligence-powered no-code test automation platform, accounts, and service policies.';
	}

	if ( is_page( 'privacy-notice' ) ) {
		return 'Learn how theTestRo collects, uses, and protects your personal data. Review our Privacy Notice for the Intelligence test automation platform.';
	}

	if ( is_home() && ! is_front_page() ) {
		return 'Read the theTestRo test automation blog for QA professionals—AI testing tips, no-code automation strategies, product insights, and modern QA best practices.';
	}

	if ( is_singular() ) {
		$post = get_queried_object();
		if ( $post && ! empty( $post->post_excerpt ) ) {
			return wp_strip_all_tags( $post->post_excerpt );
		}
		if ( $post && ! empty( $post->post_content ) ) {
			return wp_trim_words( wp_strip_all_tags( $post->post_content ), 40, '…' );
		}
	}

	if ( is_category() || is_tag() || is_tax() ) {
		$desc = term_description();
		if ( $desc ) {
			return wp_strip_all_tags( $desc );
		}
	}

	if ( is_404() ) {
		return 'The page you requested could not be found. Return to theTestRo for Intelligence-powered no-code web automation.';
	}

	return get_bloginfo( 'description', 'display' );
}

/**
 * Default social / OG image URL (square brand mark, WebP when available).
 *
 * @return string
 */
function testro_get_default_og_image() {
	return testro_asset_webp( 'images/testrologo.png' );
}

/**
 * Canonical URL with trailing slash consistency.
 *
 * @return string
 */
function testro_get_canonical_url() {
	if ( is_404() ) {
		return trailingslashit( home_url( '/' ) );
	}

	if ( is_front_page() ) {
		return trailingslashit( home_url( '/' ) );
	}

	if ( is_singular() ) {
		return trailingslashit( get_permalink() );
	}

	if ( is_home() && ! is_front_page() ) {
		$page_for_posts = (int) get_option( 'page_for_posts' );
		if ( $page_for_posts ) {
			return trailingslashit( get_permalink( $page_for_posts ) );
		}
	}

	if ( is_category() || is_tag() || is_tax() ) {
		$link = get_term_link( get_queried_object() );
		return is_wp_error( $link ) ? home_url( '/' ) : trailingslashit( $link );
	}

	if ( is_post_type_archive() ) {
		$link = get_post_type_archive_link( get_query_var( 'post_type' ) );
		return $link ? trailingslashit( $link ) : trailingslashit( home_url( '/' ) );
	}

	if ( is_year() || is_month() || is_day() ) {
		$year  = (int) get_query_var( 'year' );
		$month = (int) get_query_var( 'monthnum' );
		$day   = (int) get_query_var( 'day' );
		if ( is_day() && $year && $month && $day ) {
			return trailingslashit( get_day_link( $year, $month, $day ) );
		}
		if ( is_month() && $year && $month ) {
			return trailingslashit( get_month_link( $year, $month ) );
		}
		if ( $year ) {
			return trailingslashit( get_year_link( $year ) );
		}
	}

	return trailingslashit( home_url( add_query_arg( array() ) ) );
}

/**
 * Whether the current view should be noindexed.
 *
 * @return bool
 */
function testro_should_noindex() {
	if ( is_404() || is_search() || is_author() || is_date() || is_attachment() ) {
		return true;
	}

	if ( is_tag() || is_category() || is_tax() ) {
		return true;
	}

	if ( is_paged() ) {
		return true;
	}

	// Thank-you / conversion pages — indexable landing is the form, not the confirmation.
	if ( is_page( array( 'thank-you-contact', 'thank-you-demo', 'thank-you-newsletter' ) ) ) {
		return true;
	}

	// Thin stub shells and retired hubs.
	if ( is_page( array( 'products', 'features', 'sample-page' ) ) ) {
		return true;
	}

	if ( is_singular( 'page' ) && (int) get_post_meta( get_queried_object_id(), '_testro_page_stub', true ) ) {
		return true;
	}

	return false;
}

/**
 * Robots directives via core wp_robots API (avoids duplicate meta tags).
 *
 * @param array $robots Robots directives.
 * @return array
 */
function testro_wp_robots( $robots ) {
	if ( testro_seo_plugin_active() ) {
		return $robots;
	}

	if ( testro_should_noindex() ) {
		return array(
			'noindex' => true,
			'follow'  => true,
		);
	}

	return array(
		'index'             => true,
		'follow'            => true,
		'max-image-preview' => 'large',
		'max-snippet'       => '-1',
		'max-video-preview' => '-1',
	);
}
add_filter( 'wp_robots', 'testro_wp_robots' );

/**
 * Disable core canonical when the theme emits its own (avoids duplicate tags).
 */
function testro_disable_core_canonical() {
	if ( testro_seo_plugin_active() ) {
		return;
	}
	remove_action( 'wp_head', 'rel_canonical' );
}
add_action( 'wp_head', 'testro_disable_core_canonical', 0 );

/**
 * Output meta description, canonical, OG, Twitter.
 */
function testro_seo_meta_tags() {
	if ( testro_seo_plugin_active() ) {
		return;
	}

	$description = testro_get_meta_description();
	$canonical   = testro_get_canonical_url();
	$title       = wp_get_document_title();
	$image       = testro_get_default_og_image();
	$image_w     = 315;
	$image_h     = 315;
	$image_alt   = 'theTestRo';
	$site_name   = get_bloginfo( 'name' );
	$twitter     = testro_get_option( 'twitter', '@testro_ai' );

	if ( is_singular() && has_post_thumbnail() ) {
		$thumb_id = get_post_thumbnail_id();
		$thumb    = wp_get_attachment_image_src( $thumb_id, 'full' );
		if ( $thumb ) {
			$image     = $thumb[0];
			$image_w   = (int) $thumb[1];
			$image_h   = (int) $thumb[2];
			$alt       = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
			$image_alt = $alt ? $alt : get_the_title();
		}
	}

	printf( '<meta name="description" content="%s" />' . "\n", esc_attr( $description ) );

	$keywords = apply_filters(
		'testro_meta_keywords',
		testro_get_option(
			'meta_keywords',
			'test automation, Intelligence testing, no-code testing, Playwright, API testing, self-healing locators, theTestRo'
		)
	);
	if ( is_string( $keywords ) && '' !== trim( $keywords ) ) {
		printf( '<meta name="keywords" content="%s" />' . "\n", esc_attr( $keywords ) );
	}

	// Skip canonical on 404 to avoid advertising a broken URL.
	if ( ! is_404() ) {
		printf( '<link rel="canonical" href="%s" />' . "\n", esc_url( $canonical ) );
	}

	$og_type = is_singular( 'post' ) ? 'article' : 'website';

	printf( '<meta property="og:type" content="%s" />' . "\n", esc_attr( $og_type ) );
	printf( '<meta property="og:title" content="%s" />' . "\n", esc_attr( $title ) );
	printf( '<meta property="og:description" content="%s" />' . "\n", esc_attr( $description ) );
	printf( '<meta property="og:url" content="%s" />' . "\n", esc_url( $canonical ) );
	printf( '<meta property="og:site_name" content="%s" />' . "\n", esc_attr( $site_name ) );
	printf( '<meta property="og:image" content="%s" />' . "\n", esc_url( $image ) );
	printf( '<meta property="og:image:width" content="%d" />' . "\n", (int) $image_w );
	printf( '<meta property="og:image:height" content="%d" />' . "\n", (int) $image_h );
	printf( '<meta property="og:image:alt" content="%s" />' . "\n", esc_attr( $image_alt ) );
	echo '<meta property="og:locale" content="en_US" />' . "\n";

	if ( is_singular( 'post' ) ) {
		printf( '<meta property="article:published_time" content="%s" />' . "\n", esc_attr( get_the_date( DATE_W3C ) ) );
		printf( '<meta property="article:modified_time" content="%s" />' . "\n", esc_attr( get_the_modified_date( DATE_W3C ) ) );
	}

	echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
	if ( $twitter ) {
		$handle = 0 === strpos( $twitter, '@' ) ? $twitter : '@' . ltrim( $twitter, '@' );
		printf( '<meta name="twitter:site" content="%s" />' . "\n", esc_attr( $handle ) );
	}
	printf( '<meta name="twitter:title" content="%s" />' . "\n", esc_attr( $title ) );
	printf( '<meta name="twitter:description" content="%s" />' . "\n", esc_attr( $description ) );
	printf( '<meta name="twitter:image" content="%s" />' . "\n", esc_url( $image ) );
	printf( '<meta name="twitter:image:alt" content="%s" />' . "\n", esc_attr( $image_alt ) );
}
add_action( 'wp_head', 'testro_seo_meta_tags', 2 );

/**
 * Favicon, apple-touch-icon, manifest, theme-color.
 */
function testro_site_icons() {
	$theme_color = testro_get_option( 'theme_color', '#003e81' );
	$icons       = TESTRO_URI . '/assets/images/icons';

	// Prefer WordPress Site Icon when configured for favicon; still emit theme-color + manifest.
	if ( ! has_site_icon() ) {
		printf( '<link rel="icon" href="%s" sizes="32x32" type="image/png" />' . "\n", esc_url( $icons . '/favicon-32x32.png' ) );
		printf( '<link rel="icon" href="%s" sizes="16x16" type="image/png" />' . "\n", esc_url( $icons . '/favicon-16x16.png' ) );
		printf( '<link rel="shortcut icon" href="%s" />' . "\n", esc_url( $icons . '/favicon.ico' ) );
		printf( '<link rel="apple-touch-icon" href="%s" sizes="180x180" />' . "\n", esc_url( $icons . '/apple-touch-icon.png' ) );
	}

	$manifest = add_query_arg( 'testro_manifest', '1', home_url( '/' ) );
	printf( '<link rel="manifest" href="%s" />' . "\n", esc_url( $manifest ) );
	printf( '<meta name="theme-color" content="%s" />' . "\n", esc_attr( $theme_color ) );
	echo '<meta name="mobile-web-app-capable" content="yes" />' . "\n";
	echo '<meta name="apple-mobile-web-app-capable" content="yes" />' . "\n";
	printf( '<meta name="apple-mobile-web-app-title" content="%s" />' . "\n", esc_attr( 'theTestRo' ) );
}
add_action( 'wp_head', 'testro_site_icons', 1 );

/**
 * Dynamically serve web app manifest with correct start_url for subdirectory installs.
 */
function testro_serve_manifest() {
	if ( empty( $_GET['testro_manifest'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return;
	}

	$theme_color = testro_get_option( 'theme_color', '#003e81' );
	$icons_base  = TESTRO_URI . '/assets/images/icons';

	$manifest = array(
		'name'             => 'theTestRo',
		'short_name'       => 'TestRo',
		'description'      => 'Intelligence-powered no-code web automation platform for functional and API testing.',
		'start_url'        => trailingslashit( home_url( '/' ) ),
		'scope'            => trailingslashit( home_url( '/' ) ),
		'display'          => 'standalone',
		'background_color' => '#ffffff',
		'theme_color'      => $theme_color,
		'icons'            => array(
			array(
				'src'     => $icons_base . '/icon-192.png',
				'sizes'   => '192x192',
				'type'    => 'image/png',
				'purpose' => 'any',
			),
			array(
				'src'     => $icons_base . '/icon-512.png',
				'sizes'   => '512x512',
				'type'    => 'image/png',
				'purpose' => 'any',
			),
		),
	);

	nocache_headers();
	header( 'Content-Type: application/manifest+json; charset=utf-8' );
	echo wp_json_encode( $manifest, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
	exit;
}
add_action( 'template_redirect', 'testro_serve_manifest', 0 );

/**
 * Webmaster verification meta tags (Customizer-driven).
 */
function testro_verification_meta() {
	$gsc  = testro_get_option( 'gsc_verification', '' );
	$bing = testro_get_option( 'bing_verification', '' );

	if ( $gsc ) {
		printf( '<meta name="google-site-verification" content="%s" />' . "\n", esc_attr( $gsc ) );
	}
	if ( $bing ) {
		printf( '<meta name="msvalidate.01" content="%s" />' . "\n", esc_attr( $bing ) );
	}
}
add_action( 'wp_head', 'testro_verification_meta', 1 );

/**
 * Google Tag Manager (head) — only when Container ID is set in Customizer.
 * Prefer GTM over direct gtag when both are configured.
 */
function testro_gtm_head() {
	$gtm_id = testro_get_option( 'gtm_id', '' );
	if ( ! $gtm_id || is_admin() ) {
		return;
	}

	$gtm_id = preg_replace( '/[^A-Za-z0-9\-]/', '', $gtm_id );
	if ( ! $gtm_id || 0 !== strpos( $gtm_id, 'GTM-' ) ) {
		return;
	}
	?>
	<script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php echo esc_js( $gtm_id ); ?>');
	</script>
	<?php
}
add_action( 'wp_head', 'testro_gtm_head', 1 );

/**
 * Google Tag Manager (noscript body fallback).
 */
function testro_gtm_body() {
	$gtm_id = testro_get_option( 'gtm_id', '' );
	if ( ! $gtm_id || is_admin() ) {
		return;
	}

	$gtm_id = preg_replace( '/[^A-Za-z0-9\-]/', '', $gtm_id );
	if ( ! $gtm_id || 0 !== strpos( $gtm_id, 'GTM-' ) ) {
		return;
	}
	?>
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $gtm_id ); ?>"
	height="0" width="0" style="display:none;visibility:hidden" title="Google Tag Manager"></iframe></noscript>
	<?php
}
add_action( 'wp_body_open', 'testro_gtm_body', 0 );

/**
 * Google Analytics / gtag (only when Measurement ID is set and GTM is not).
 */
function testro_analytics_scripts() {
	if ( testro_get_option( 'gtm_id', '' ) ) {
		return;
	}

	$ga_id = testro_get_option( 'ga_id', 'G-B1SLQ5SRNV' );
	if ( ! $ga_id ) {
		$ga_id = 'G-B1SLQ5SRNV';
	}
	if ( is_admin() ) {
		return;
	}

	$ga_id = preg_replace( '/[^A-Za-z0-9\-]/', '', $ga_id );
	if ( ! $ga_id ) {
		return;
	}
	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $ga_id ); ?>"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', '<?php echo esc_js( $ga_id ); ?>');
	</script>
	<?php
}
add_action( 'wp_head', 'testro_analytics_scripts', 20 );

/**
 * Optional Meta Pixel (only when Pixel ID is set in Customizer).
 */
function testro_meta_pixel() {
	$pixel_id = testro_get_option( 'meta_pixel_id', '' );
	if ( ! $pixel_id || is_admin() ) {
		return;
	}

	$pixel_id = preg_replace( '/[^0-9]/', '', $pixel_id );
	if ( ! $pixel_id ) {
		return;
	}
	?>
	<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init','<?php echo esc_js( $pixel_id ); ?>');
		fbq('track','PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo esc_attr( $pixel_id ); ?>&amp;ev=PageView&amp;noscript=1" alt="" /></noscript>
	<?php
}
add_action( 'wp_head', 'testro_meta_pixel', 21 );

/**
 * Prefer trailing slashes on home URL helpers.
 *
 * @param string $url URL.
 * @return string
 */
function testro_ensure_trailing_slash( $url ) {
	if ( empty( $url ) || false !== strpos( $url, '?' ) || false !== strpos( $url, '#' ) ) {
		return $url;
	}
	$path = wp_parse_url( $url, PHP_URL_PATH );
	if ( null === $path || '/' === $path || '' === $path ) {
		return trailingslashit( $url );
	}
	if ( preg_match( '/\.[a-z0-9]{2,5}$/i', $path ) ) {
		return $url;
	}
	return trailingslashit( $url );
}

/**
 * Remove emoji scripts/styles for performance.
 */
function testro_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'testro_disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'testro_disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'testro_disable_emojis' );

/**
 * @param array $plugins TinyMCE plugins.
 * @return array
 */
function testro_disable_emojis_tinymce( $plugins ) {
	return is_array( $plugins ) ? array_diff( $plugins, array( 'wpemoji' ) ) : array();
}

/**
 * @param array  $urls          URLs.
 * @param string $relation_type Relation.
 * @return array
 */
function testro_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		$emoji = 'https://s.w.org/images/core/emoji/';
		foreach ( $urls as $key => $url ) {
			if ( is_string( $url ) && strpos( $url, $emoji ) !== false ) {
				unset( $urls[ $key ] );
			}
		}
	}
	return $urls;
}
