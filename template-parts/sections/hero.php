<?php
/**
 * Home page hero — common split hero with dynamic content.
 *
 * @package TestRo
 */

$hero = function_exists( 'testro_get_home_hero' ) ? testro_get_home_hero() : array();

get_template_part(
	'template-parts/components/hero',
	null,
	array_merge(
		$hero,
		array(
			'variant'     => 'home',
			'heading_id'  => 'home-hero-title',
			'heading_tag' => 1,
			'visual'      => 'home',
		)
	)
);
