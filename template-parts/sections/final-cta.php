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
		'id'               => 'final-cta',
		'eyebrow'          => __( 'Ready when you are', 'testro' ),
		'title'            => __( 'Ready to test smarter?', 'testro' ),
		'intro'            => __( 'Join teams who use theTestRo to ship faster, catch more bugs, and cut manual work.', 'testro' ),
		'heading_level'    => 2,
		'supporting_line'  => __( '14-day full access trial · No credit card required', 'testro' ),
		'actions'          => array(
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
