<?php
/**
 * Template Name: Self-Healing Automation Tool
 * Description: Product landing page for the Self-Healing Automation Tool. Kept as a
 * named template so the page keeps rendering if its slug changes; the layout and
 * content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'self-healing-test-automation-tool' )
);

get_footer();
