<?php
/**
 * Template Name: End-to-End Testing
 * Description: Product landing page for AI-Powered End-to-End Testing.
 * Kept as a named template so the page keeps rendering if its slug changes; the
 * layout and content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'end-to-end-testing' )
);

get_footer();
