<?php
/**
 * Template Name: Software Testing Use Cases
 * Description: Hub landing for all software testing use cases.
 * Kept as a named template so the page keeps rendering if its slug changes; the
 * layout and content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'use-cases' )
);

get_footer();
