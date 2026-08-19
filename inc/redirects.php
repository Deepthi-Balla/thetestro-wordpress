<?php
/**
 * Legacy URL redirects to flat production permalinks.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Map of request path (no leading/trailing slash) => target slug (empty = home).
 *
 * @return array<string, string>
 */
function testro_get_redirect_map() {
	$map = array();

	$product_olds = array(
		'ai-test-automation',
		'no-code-test-automation',
		'web-testing',
		'api-testing',
		'cross-browser-testing',
	);

	if ( function_exists( 'testro_get_slug_migration_map' ) ) {
		foreach ( testro_get_slug_migration_map() as $old => $new ) {
			$parent                 = in_array( $old, $product_olds, true ) ? 'products' : 'features';
			$map[ $parent . '/' . $old ] = $new;
			if ( $old !== $new ) {
				$map[ $old ] = $new;
			}
		}
	}

	$map = array_merge(
		$map,
		array(
			'solutions/retail'                 => 'retail-ecommerce',
			'solutions/healthcare'             => 'healthcare',
			'solutions/banking-finance'        => 'banking-finance',
			'solutions/travel-hospitality'     => 'travel-and-hospitality',
			'solutions/insurance'              => 'insurance',
			'solutions/microsoft-dynamics-365' => 'microsoft-dynamics-365-test-automation',
			'solutions/salesforce-testing'     => 'salesforce-test-automation',
			'solutions/oracle-testing'         => 'oracle-testing',
			'solutions/sap-testing'            => 'sap-testing',
			'solutions/workday-testing'        => 'workday-testing',
			'solutions/servicenow-testing'     => 'servicenow-testing',
			'solutions/regression-testing'     => 'regression-test-automation',
			'solutions/sanity-testing'         => 'ai-automated-sanity-testing',
			'solutions/integration-testing'    => 'ai-powered-integration-testing',
			'solutions/functional-testing'     => 'automated-functional-testing',
			'solutions/end-to-end-testing'     => 'end-to-end-testing',
			'solutions/api-testing'            => 'automated-api-testing',
			'solutions/smoke-testing'          => 'use-cases',
			'solutions/backend-testing'        => 'use-cases',
			'solutions/frontend-testing'       => 'use-cases',
			'solutions'                        => 'use-cases',
			'test-lab'                         => 'test-execution',
			'about-us'                         => 'why-choose-thetestro',
			'products'                         => '',
			'features'                         => '',
			'resources'                        => 'blog',
		)
	);

	return apply_filters( 'testro_redirect_map', $map );
}

/**
 * Issue a single 301 for legacy nested / placeholder paths.
 */
function testro_legacy_redirects() {
	if ( is_admin() || wp_doing_ajax() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
		return;
	}

	$uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	if ( '' === $uri ) {
		return;
	}

	$path = wp_parse_url( $uri, PHP_URL_PATH );
	if ( ! is_string( $path ) || '' === $path ) {
		return;
	}

	$home_path = wp_parse_url( home_url( '/' ), PHP_URL_PATH );
	$home_path = is_string( $home_path ) ? untrailingslashit( $home_path ) : '';
	if ( $home_path && 0 === strpos( $path, $home_path ) ) {
		$path = substr( $path, strlen( $home_path ) );
	}

	$path = trim( $path, '/' );
	if ( '' === $path ) {
		return;
	}

	$map = testro_get_redirect_map();
	if ( ! isset( $map[ $path ] ) ) {
		return;
	}

	$target = $map[ $path ];
	$url    = ( '' === $target ) ? home_url( '/' ) : home_url( '/' . $target . '/' );

	wp_safe_redirect( $url, 301 );
	exit;
}
add_action( 'template_redirect', 'testro_legacy_redirects', 1 );
