<?php
/**
 * Template Name: Retail & E-commerce
 * Description: Industry landing page for Retail & E-commerce testing solutions. Kept
 * as a named template so the page keeps rendering if its slug changes; the layout
 * and content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'retail-ecommerce' )
);

get_footer();
