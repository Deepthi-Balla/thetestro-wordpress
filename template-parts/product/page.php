<?php
/**
 * Product page renderer — walks a registered product definition and renders
 * the matching reusable section component for each entry.
 *
 * Optional $args:
 * - slug (string) Product key. Defaults to the queried page slug.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$slug    = isset( $args['slug'] ) ? (string) $args['slug'] : '';
$product = testro_get_product_page( $slug );

if ( ! $product ) {
	get_template_part( 'template-parts/product/fallback' );
	return;
}

if ( ! empty( $product['hero'] ) ) {
	$hero_args = $product['hero'];
	/* Breadcrumbs only when Framer (or the page) explicitly enables them. */
	if ( ! array_key_exists( 'breadcrumbs', $hero_args ) ) {
		$hero_args['breadcrumbs'] = true;
	}
	get_template_part( 'template-parts/product/hero', null, $hero_args );
}

$shared   = testro_product_shared_sections();
$sections = isset( $product['sections'] ) && is_array( $product['sections'] ) ? $product['sections'] : array();

foreach ( $sections as $section ) {
	if ( empty( $section['type'] ) ) {
		continue;
	}

	$type = (string) $section['type'];
	$part = isset( $shared[ $type ] ) ? $shared[ $type ] : 'template-parts/product/' . sanitize_file_name( $type );

	get_template_part( $part, null, $section );
}
