<?php
/**
 * AI capabilities — healing-style flow + capability cards.
 *
 * @package TestRo
 */

$data = testro_get_ai_capabilities();

get_template_part(
	'template-parts/product/healing',
	null,
	array(
		'id'            => 'ai-capabilities',
		'title'         => $data['title'],
		'intro'         => $data['intro'],
		'outro'         => isset( $data['outro'] ) ? $data['outro'] : '',
		'items'         => $data['items'],
		'heading_level' => 3,
	)
);
