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
		'id'      => 'ai-capabilities',
		'eyebrow' => $data['eyebrow'],
		'title'   => $data['title'],
		'intro'   => $data['intro'],
		'steps'   => $data['steps'],
		'items'   => $data['items'],
	)
);
