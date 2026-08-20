<?php
/**
 * Enqueue scripts and styles + critical CSS.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Prefer .min assets unless SCRIPT_DEBUG is on (or min file missing).
 *
 * @param string $relative Path under assets/ without extension suffix logic, e.g. css/main.css.
 * @return string Absolute theme URI to the file that should be enqueued.
 */
function testro_asset_file_uri( $relative ) {
	$relative = ltrim( $relative, '/' );
	$use_min  = ! ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG );

	if ( $use_min && preg_match( '/\.(css|js)$/i', $relative ) ) {
		$min = preg_replace( '/\.(css|js)$/i', '.min.$1', $relative );
		if ( is_readable( TESTRO_DIR . '/assets/' . $min ) ) {
			return TESTRO_URI . '/assets/' . $min;
		}
	}

	return TESTRO_URI . '/assets/' . $relative;
}

/**
 * Thank-you URL for a form type (contact|demo|newsletter).
 *
 * @param string $type Form type.
 * @return string Empty when redirects disabled or page missing.
 */
function testro_get_thankyou_url( $type ) {
	if ( ! testro_get_option( 'form_redirects', true ) ) {
		return '';
	}

	$custom = testro_get_option( 'thankyou_' . $type, '' );
	if ( $custom ) {
		return esc_url_raw( $custom );
	}

	$slugs = array(
		'contact'     => 'thank-you-contact',
		'demo'        => 'thank-you-demo',
		'newsletter'  => 'thank-you-newsletter',
	);
	if ( empty( $slugs[ $type ] ) ) {
		return '';
	}

	$page = get_page_by_path( $slugs[ $type ] );
	if ( ! $page ) {
		return '';
	}

	return trailingslashit( get_permalink( $page ) );
}

/**
 * Enqueue front-end assets.
 */
function testro_enqueue_assets() {
	wp_enqueue_style(
		'testro-main',
		testro_asset_file_uri( 'css/main.css' ),
		array(),
		TESTRO_VERSION
	);

	wp_enqueue_script(
		'cloudflare-turnstile',
		'https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit',
		array(),
		null,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	wp_enqueue_script(
		'testro-main',
		testro_asset_file_uri( 'js/main.js' ),
		array(),
		TESTRO_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);

	wp_localize_script(
		'testro-main',
		'testroData',
		array(
			'ajaxUrl'          => admin_url( 'admin-ajax.php' ),
			'nonce'            => wp_create_nonce( 'testro_nonce' ),
			'themeUri'         => TESTRO_URI,
			'homeUrl'          => home_url( '/' ),
			'turnstileSiteKey' => '0x4AAAAAAEGFTa-galkC_DbX',
			'thankYou'         => array(
				'contact'    => testro_get_thankyou_url( 'contact' ),
				'demo'       => testro_get_thankyou_url( 'demo' ),
				'newsletter' => testro_get_thankyou_url( 'newsletter' ),
			),
			'webVitals'        => (bool) ( testro_get_option( 'ga_id', 'G-B1SLQ5SRNV' ) || testro_get_option( 'gtm_id', '' ) ),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'testro_enqueue_assets' );

/**
 * Inline above-the-fold critical CSS for faster FCP/LCP.
 */
function testro_inline_critical_css() {
	$path = TESTRO_DIR . '/assets/css/critical.css';
	if ( ! is_readable( $path ) ) {
		return;
	}

	$css = file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
	if ( false === $css || '' === $css ) {
		return;
	}

	$css = str_replace(
		array( 'url("../fonts/', "url('../fonts/" ),
		array( 'url("' . TESTRO_URI . '/assets/fonts/', "url('" . TESTRO_URI . '/assets/fonts/' ),
		$css
	);

	echo "<style id=\"testro-critical-css\">\n" . $css . "\n</style>\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action( 'wp_head', 'testro_inline_critical_css', 0 );

/**
 * Flag JS availability before first paint.
 *
 * Scroll-reveal styles are scoped to html.testro-js so content stays visible
 * when scripting is unavailable or fails to load.
 */
function testro_js_flag() {
	echo '<script id="testro-js-flag">document.documentElement.classList.add("testro-js");</script>' . "\n";
}
add_action( 'wp_head', 'testro_js_flag', 1 );

/**
 * Reset scroll to top before first paint on every navigation.
 *
 * Disables the browser's automatic scroll restoration so landing pages always
 * open at the top. Hash URLs (in-page anchors) are left alone so deep links
 * still land on the intended section.
 */
function testro_scroll_reset() {
	echo '<script id="testro-scroll-reset">'
		. '(function(){if("scrollRestoration"in history){history.scrollRestoration="manual";}'
		. 'var h=location.hash;if(!h||h==="#"){window.scrollTo(0,0);}'
		. '})();'
		. '</script>' . "\n";
}
add_action( 'wp_head', 'testro_scroll_reset', 1 );

/**
 * Load main stylesheet asynchronously (print media trick + noscript fallback).
 *
 * @param string $html   Link tag HTML.
 * @param string $handle Style handle.
 * @param string $href   Stylesheet URL.
 * @param string $media  Media attribute.
 * @return string
 */
function testro_async_main_css( $html, $handle, $href, $media ) {
	if ( 'testro-main' !== $handle || is_admin() ) {
		return $html;
	}

	$async = sprintf(
		'<link rel="preload" as="style" href="%1$s" />' . "\n" .
		'<link rel="stylesheet" id="%2$s-css" href="%1$s" media="print" onload="this.media=\'all\'" />' . "\n" .
		'<noscript><link rel="stylesheet" href="%1$s" /></noscript>' . "\n",
		esc_url( $href ),
		esc_attr( $handle )
	);

	return $async;
}
add_filter( 'style_loader_tag', 'testro_async_main_css', 10, 4 );

/**
 * Preload LCP logo (AVIF → WebP → PNG) + critical fonts.
 */
function testro_preload_lcp() {
	$logo_avif = TESTRO_DIR . '/assets/images/avif/testro-logo.avif';
	$logo_webp = TESTRO_DIR . '/assets/images/webp/testro-logo.webp';

	if ( file_exists( $logo_avif ) ) {
		$logo = TESTRO_URI . '/assets/images/avif/testro-logo.avif';
		$type = 'image/avif';
	} elseif ( file_exists( $logo_webp ) ) {
		$logo = TESTRO_URI . '/assets/images/webp/testro-logo.webp';
		$type = 'image/webp';
	} else {
		$logo = TESTRO_URI . '/assets/images/testro-logo.png';
		$type = 'image/png';
	}

	printf(
		'<link rel="preload" as="image" href="%s" type="%s" fetchpriority="high" />' . "\n",
		esc_url( $logo ),
		esc_attr( $type )
	);

	$fonts = array(
		TESTRO_URI . '/assets/fonts/InterDisplay-Bold.woff2',
		TESTRO_URI . '/assets/fonts/InterDisplay-Medium.woff2',
	);
	foreach ( $fonts as $font ) {
		printf(
			'<link rel="preload" as="font" type="font/woff2" href="%s" crossorigin />' . "\n",
			esc_url( $font )
		);
	}
}
add_action( 'wp_head', 'testro_preload_lcp', 1 );

/**
 * Add preconnect hints when analytics is enabled; fonts remain self-hosted.
 *
 * @param array  $urls          URLs.
 * @param string $relation_type Relation type.
 * @return array
 */
function testro_resource_hints( $urls, $relation_type ) {
	$needs_gtm = testro_get_option( 'ga_id', 'G-B1SLQ5SRNV' ) || testro_get_option( 'gtm_id', '' );
	if ( 'preconnect' === $relation_type && $needs_gtm ) {
		$urls[] = array(
			'href'        => 'https://www.googletagmanager.com',
			'crossorigin' => 'anonymous',
		);
		$urls[] = 'https://www.google-analytics.com';
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'testro_resource_hints', 10, 2 );
