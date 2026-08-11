<?php
/**
 * Template Name: Cross-Browser Testing
 * Description: Product landing page for the Cross-Browser Testing platform. Kept as a
 * named template so the page keeps rendering if its slug changes; the layout and
 * content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'automated-cross-browser-testing-tool' )
);

get_footer();
