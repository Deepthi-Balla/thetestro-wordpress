<?php
/**
 * Final CTA band before contact — reuses product CTA template.
 *
 * @package TestRo
 */

get_template_part(
	'template-parts/product/cta',
	null,
	array(
		'id'         => 'final-cta',
		'title'      => __( 'Transform Your Software Testing with AI', 'testro' ),
		'intro'      => __( "Start building faster, smarter, and more reliable software testing workflows with theTestRo's AI-powered automation platform.", 'testro' ),
		'actions'    => array(
			array(
				'label' => __( 'Start Free Trial', 'testro' ),
				'style' => 'primary',
				'modal' => 'demo-modal',
			),
			array(
				'label' => __( 'Book a Demo', 'testro' ),
				'style' => 'outline',
				'modal' => 'demo-modal',
			),
		),
		'assurances' => array(
			__( 'No credit card required', 'testro' ),
			__( 'Cancel anytime', 'testro' ),
			__( 'Setup in minutes', 'testro' ),
		),
	)
);
