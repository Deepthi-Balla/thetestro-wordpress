<?php
/**
 * TestRo theme functions and definitions.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TESTRO_VERSION', '1.2.5' );
define( 'TESTRO_DIR', get_template_directory() );
define( 'TESTRO_URI', get_template_directory_uri() );

$testro_includes = array(
	'/inc/setup.php',
	'/inc/enqueue.php',
	'/inc/nav-menu.php',
	'/inc/seo.php',
	'/inc/schema.php',
	'/inc/ajax.php',
	'/inc/sitemap.php',
	'/inc/customizer.php',
	'/inc/performance.php',
	'/inc/images.php',
	'/inc/icons.php',
	'/inc/content.php',
	'/inc/product-content.php',
	'/inc/migration.php',
	'/inc/static-pages.php',
	'/inc/redirects.php',
	'/inc/activation.php',
);

foreach ( $testro_includes as $file ) {
	$path = TESTRO_DIR . $file;
	if ( file_exists( $path ) ) {
		require_once $path;
	}
}
