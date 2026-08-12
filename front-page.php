<?php
/**
 * Front page template — homepage section assembly.
 *
 * @package TestRo
 */

get_header();

$sections = array(
	'hero',
	'clients',
	'overview',
	'why-testro',
	'key-features',
	'ai-capabilities',
	'how-it-works',
	'videos',
	'industries',
	'benefits',
	'testimonials',
	'faq',
	'resources',
	'final-cta',
);

foreach ( $sections as $section ) {
	get_template_part( 'template-parts/sections/' . $section );
}

get_footer();
