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
		'title'         => __( 'Final CTA', 'testro' ),
		'intro'         => __( 'Ready to Test Smarter?', 'testro' ),
		'body'          => __( 'Join teams who use theTestRo to ship faster, catch more bugs, and cut manual work.', 'testro' ),
		'heading_level' => 5,
		'actions'       => array(
			array(
				'label' => __( 'Book a Demo', 'testro' ),
				'style' => 'outline',
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
