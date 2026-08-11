<?php
/**
 * Template Name: SAP Testing
 * Description: Solution landing page for SAP test automation.
 * Kept as a named template so the page keeps rendering if its slug changes; the
 * layout and content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'sap-testing' )
);

get_footer();
