<?php
/**
 * Template Name: Microsoft Dynamics 365 Testing
 * Description: Solution landing page for Microsoft Dynamics 365 test automation.
 * Kept as a named template so the page keeps rendering if its slug changes; the
 * layout and content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'microsoft-dynamics-365-test-automation' )
);

get_footer();
