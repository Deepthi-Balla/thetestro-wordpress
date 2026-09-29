#!/usr/bin/env php
<?php
/**
 * Run the WebP optimizer now instead of waiting for WP-Cron, then audit.
 *
 * Usage (from anywhere): php wp-content/themes/testro/bin/optimize-images.php [--force] [--audit-only]
 *
 * --force       Re-encode images even when a valid WebP already exists.
 * --audit-only  Only report; do not encode anything.
 *
 * Exit code is 1 when any image is still missing a WebP under the size limit.
 *
 * @package TestRo
 */

if ( 'cli' !== PHP_SAPI ) {
	exit( 1 );
}

$testro_root = dirname( __DIR__, 4 );
if ( ! is_file( $testro_root . '/wp-load.php' ) ) {
	fwrite( STDERR, "wp-load.php not found in {$testro_root}\n" );
	exit( 1 );
}

$_SERVER['HTTP_HOST']   = isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : 'localhost';
$_SERVER['REQUEST_URI'] = '/';
define( 'WP_USE_THEMES', false );
require $testro_root . '/wp-load.php';

if ( ! function_exists( 'testro_webp_optimize_all' ) ) {
	fwrite( STDERR, "The TestRo theme is not active.\n" );
	exit( 1 );
}

$testro_args = array_slice( $argv, 1 );

if ( ! in_array( '--audit-only', $testro_args, true ) ) {
	$testro_start  = microtime( true );
	$testro_report = testro_webp_optimize_all( in_array( '--force', $testro_args, true ) );
	if ( $testro_report['failed'] ) {
		fwrite( STDERR, "Some images failed (check that this user can write to the image folders); WP-Cron will retry them.\n" );
		wp_schedule_single_event( time() + 60, TESTRO_WEBP_BACKFILL_HOOK );
	}
	printf(
		"Theme images: %d encoded, %d already optimized.\nAttachments processed: %d.\nTook %.1fs.\n\n",
		count( $testro_report['theme']['processed'] ),
		count( $testro_report['theme']['skipped'] ),
		count( $testro_report['attachments'] ),
		microtime( true ) - $testro_start
	);
	foreach ( $testro_report['theme']['errors'] as $testro_error ) {
		fwrite( STDERR, "WARNING: {$testro_error}\n" );
	}
	foreach ( $testro_report['attachments'] as $testro_id => $testro_errors ) {
		foreach ( $testro_errors as $testro_error ) {
			fwrite( STDERR, "WARNING: attachment {$testro_id}: {$testro_error}\n" );
		}
	}
}

$testro_bad = 0;
foreach ( testro_webp_audit() as $testro_row ) {
	$testro_bad += $testro_row['ok'] ? 0 : 1;
	printf(
		"%-4s %8s  %s\n",
		$testro_row['ok'] ? 'OK' : 'FAIL',
		$testro_row['bytes'] ? number_format( $testro_row['bytes'] ) : '-',
		str_replace( ABSPATH, '', $testro_row['webp'] )
	);
}
printf( "\n%s\n", $testro_bad ? "{$testro_bad} image(s) not optimized." : 'All images are WebP under ' . number_format( TESTRO_WEBP_MAX_BYTES ) . ' bytes.' );
exit( $testro_bad ? 1 : 0 );
