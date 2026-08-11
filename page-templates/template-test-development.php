<?php
/**
 * Template Name: Test Development
 * Description: Product landing page for the AI-Powered Test Development Platform.
 * Kept as a named template so the page keeps rendering if its slug changes; the
 * layout and content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'test-development' )
);

get_footer();
