<?php
/**
 * Product/page hero adapter — delegates to the common hero component.
 *
 * Expected $args: eyebrow, title, subtitle, subtitle_extra, badges, actions,
 * metrics, layout, visual, breadcrumbs, logos.
 *
 * @package TestRo
 */

$args = isset( $args ) && is_array( $args ) ? $args : array();

if ( empty( $args['title'] ) ) {
	return;
}

get_template_part(
	'template-parts/components/hero',
	null,
	testro_normalize_product_hero_args( $args )
);
