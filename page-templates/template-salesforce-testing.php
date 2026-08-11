<?php
/**
 * Template Name: Salesforce Testing
 * Description: Solution landing page for Salesforce test automation.
 * Kept as a named template so the page keeps rendering if its slug changes; the
 * layout and content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'salesforce-test-automation' )
);

get_footer();
