<?php
/**
 * Homepage hero — maps shared homepage copy into the reusable product hero.
 *
 * @package TestRo
 */

$slides = testro_get_hero_slides();
$slide  = isset( $slides[0] ) && is_array( $slides[0] ) ? $slides[0] : array();
$title  = isset( $slide['title'] ) ? (string) $slide['title'] : '';

if ( '' === $title ) {
	return;
}

$cta_primary   = isset( $slide['cta'] ) ? (string) $slide['cta'] : __( 'Start Testing', 'testro' );
$cta_secondary = isset( $slide['cta_secondary'] ) ? (string) $slide['cta_secondary'] : '';

$actions = array(
	array(
		'label' => $cta_primary,
		'style' => 'primary',
		'href'  => '#final-cta',
	),
);

if ( '' !== $cta_secondary ) {
	$actions[] = array(
		'label' => $cta_secondary,
		'style' => 'outline',
		'modal' => 'demo-modal',
	);
}

get_template_part(
	'template-parts/product/hero',
	null,
	array(
		'title'           => $title,
		'subtitle'        => isset( $slide['subtitle'] ) ? (string) $slide['subtitle'] : '',
		'actions'         => $actions,
		'supporting_line' => isset( $slide['supporting_line'] ) ? (string) $slide['supporting_line'] : '',
		'badges'          => isset( $slide['badges'] ) && is_array( $slide['badges'] ) ? $slide['badges'] : array(),
	)
);
