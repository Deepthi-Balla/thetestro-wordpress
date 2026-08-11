<?php
/**
 * Template Name: AI-Powered Integration Testing
 * Description: Product landing page for AI-Powered Integration Testing.
 * Kept as a named template so the page keeps rendering if its slug changes; the
 * layout and content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'ai-powered-integration-testing' )
);

get_footer();
