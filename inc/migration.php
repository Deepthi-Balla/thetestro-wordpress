<?php
/**
 * Flat permalink migration: slug map + one-shot DB flatten.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Old product/feature slug => production flat slug.
 *
 * @return array<string, string>
 */
function testro_get_slug_migration_map() {
	return array(
		'ai-test-automation'      => 'ai-test-automation',
		'no-code-test-automation' => 'no-code-test-automation',
		'web-testing'             => 'automated-web-application-testing',
		'api-testing'             => 'automated-api-testing',
		'cross-browser-testing'   => 'automated-cross-browser-testing-tool',
		'ai-test-management'      => 'test-management-software',
		'self-healing-tests'      => 'self-healing-test-automation-tool',
		'test-development'        => 'test-development',
		'test-execution'          => 'test-lab',
		'ci-cd-integration'       => 'ci-cd-integration',
		'playwright-export'       => 'playwright-test-automation',
		'reports-analytics'       => 'reporting-analytics',
	);
}

/**
 * Flatten product/feature pages and rename post_name to production slugs.
 *
 * Runs once per environment (testro_flat_permalinks_version).
 */
function testro_migrate_flat_permalinks() {
	if ( (int) get_option( 'testro_flat_permalinks_version', 0 ) >= 1 ) {
		return;
	}

	$map     = testro_get_slug_migration_map();
	$parents = array( 'products', 'features' );
	$log     = array();

	foreach ( $parents as $parent_slug ) {
		$parent = get_page_by_path( $parent_slug );
		if ( ! $parent ) {
			continue;
		}

		$children = get_posts(
			array(
				'post_type'      => 'page',
				'post_parent'    => (int) $parent->ID,
				'post_status'    => 'any',
				'posts_per_page' => -1,
			)
		);

		foreach ( $children as $child ) {
			$old = $child->post_name;
			$new = isset( $map[ $old ] ) ? $map[ $old ] : $old;

			wp_update_post(
				array(
					'ID'          => (int) $child->ID,
					'post_name'   => $new,
					'post_parent' => 0,
				)
			);

			$actual = get_post_field( 'post_name', $child->ID );
			if ( $actual !== $new ) {
				global $wpdb;
				$wpdb->update( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
					$wpdb->posts,
					array( 'post_name' => $new ),
					array( 'ID' => (int) $child->ID ),
					array( '%s' ),
					array( '%d' )
				);
				clean_post_cache( $child->ID );
				$actual = $new;
			}

			$log[] = $parent_slug . '/' . $old . ' => ' . $actual;
		}
	}

	update_option( 'testro_flat_permalinks_log', $log, false );
	update_option( 'testro_flat_permalinks_version', 1, true );
	flush_rewrite_rules( false );
}
add_action( 'init', 'testro_migrate_flat_permalinks', 15 );
