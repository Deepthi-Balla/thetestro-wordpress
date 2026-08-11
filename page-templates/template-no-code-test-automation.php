<?php
/**
 * Template Name: No-Code Test Automation
 * Description: Product landing page for the No-Code Test Automation platform. Kept as a
 * named template so the page keeps rendering if its slug changes; the layout and
 * content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'no-code-test-automation' )
);

get_footer();
