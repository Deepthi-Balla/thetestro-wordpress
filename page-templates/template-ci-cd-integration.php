<?php
/**
 * Template Name: CI/CD Integration
 * Description: Product landing page for AI-Powered CI/CD Integration for Continuous
 * Testing. Kept as a named template so the page keeps rendering if its slug changes;
 * the layout and content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'ci-cd-integration' )
);

get_footer();
