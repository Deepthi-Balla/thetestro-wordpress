<?php
/**
 * Template Name: Travel & Hospitality
 * Description: Industry landing page for Travel & Hospitality testing solutions. Kept
 * as a named template so the page keeps rendering if its slug changes; the layout
 * and content are shared with the generic Product Page template.
 *
 * @package TestRo
 */

get_header();

get_template_part(
	'template-parts/product/page',
	null,
	array( 'slug' => 'travel-and-hospitality' )
);

get_footer();
