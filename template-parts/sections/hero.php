<?php
/**
 * Home hero — Framer Platform Opening redesign (1536 reference).
 *
 * @package TestRo
 */

get_template_part(
	'template-parts/components/hero-redesign',
	null,
	array(
		'heading_id'    => 'hero-heading',
		'section_class' => 'testro-hero',
		'title'         => __( 'Best Test Automation Platform for Modern Software Testing', 'testro' ),
		'title_lines'   => array(
			array(
				array(
					'text' => __( 'Best Test Automation', 'testro' ),
					'tone' => 'gradient',
				),
			),
			array(
				array(
					'text' => __( 'Platform', 'testro' ),
					'tone' => 'gradient',
				),
				array(
					'text' => __( 'for Modern', 'testro' ),
					'tone' => 'dark',
				),
			),
			array(
				array(
					'text' => __( 'Software Testing', 'testro' ),
					'tone' => 'dark',
				),
			),
		),
		'body_blocks'   => array(
			array(
				array(
					'text' => __( 'theTestRo is the best test automation platform for teams testing ', 'testro' ),
					'tone' => 'muted',
				),
				array(
					'text' => __( 'Web, API, mobile, and cross-browser apps', 'testro' ),
					'tone' => 'strong',
				),
				array(
					'text' => __( ' — fast.', 'testro' ),
					'tone' => 'muted',
				),
			),
			array(
				array(
					'text' => __( 'Build, run, and scale your tests in one place. ', 'testro' ),
					'tone' => 'muted',
				),
				array(
					'text' => __( 'No slowdowns, no extra tools.', 'testro' ),
					'tone' => 'strong',
				),
			),
		),
		'cta_label'     => __( 'Start Testing', 'testro' ),
		'cta_href'      => '#final-cta',
		'cta_with_arrow'=> true,
		'trust'         => true,
		'mesh'          => 'images/hero/mesh-home.gif',
		'show_divider'  => true,
	)
);
