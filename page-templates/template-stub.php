<?php
/**
 * Template Name: Marketing Stub
 * Description: Lightweight shell for flat production landing pages.
 *
 * @package TestRo
 */

get_header();

$stub = function_exists( 'testro_get_static_page' ) ? testro_get_static_page() : null;

if ( $stub && ! empty( $stub['hero'] ) ) {
	get_template_part(
		'template-parts/product/hero',
		null,
		array_merge(
			$stub['hero'],
			array( 'breadcrumbs' => true )
		)
	);
}

if ( $stub && ! empty( $stub['sections'] ) && is_array( $stub['sections'] ) ) {
	foreach ( $stub['sections'] as $section ) {
		get_template_part( 'template-parts/sections/' . sanitize_file_name( (string) $section ) );
	}
}

get_template_part( 'template-parts/sections/final-cta' );

get_footer();
