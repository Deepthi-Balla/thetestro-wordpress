<?php
/**
 * Final CTA band — reuses product CTA template.
 *
 * @package TestRo
 */

get_template_part(
	'template-parts/product/cta',
	null,
	array(
		'id'            => 'final-cta',
		'title'         => __( 'READY WHEN YOU ARE', 'testro' ),
		'intro'         => __( 'Ready to test smarter?', 'testro' ),
		'body'          => __( 'Join teams who use theTestRo to ship faster, catch more bugs, and cut manual work.', 'testro' ),
		'note'          => __( '14-day full access trial  ·  No credit card required', 'testro' ),
		'heading_level' => 2,
		'variant'       => 'brand',
		'actions'       => array(
			array(
				'label' => __( 'Book a Demo', 'testro' ),
				'style' => 'secondary',
				'modal' => 'demo-modal',
			),
			array(
				'label' => __( 'Start Free Trial', 'testro' ),
				'style' => 'primary',
				'modal' => 'demo-modal',
			),
		),
	)
);
