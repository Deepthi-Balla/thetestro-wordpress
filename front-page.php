<?php
/**
 * Front page template — homepage section assembly.
 *
 * @package TestRo
 */

get_header();

$sections = array(
	'hero',
	'stats',
	'clients',
	'overview',
	'services',
	'why-testro',
	'key-features',
	'features',
	'ai-capabilities',
	'how-it-works',
	'videos',
	'industries',
	'benefits',
	'testimonials',
	'case-studies',
	'pricing',
	'faq',
	'resources',
	'final-cta',
	'contact',
);

foreach ( $sections as $section ) {
	get_template_part( 'template-parts/sections/' . $section );
}

get_footer();
