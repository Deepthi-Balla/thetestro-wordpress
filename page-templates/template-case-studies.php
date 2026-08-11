<?php
/**
 * Template Name: Case Studies
 * Description: Customer success hub — centered hero, outcome stories, social proof, and CTA.
 *
 * @package TestRo
 */

get_header();

$case_actions = array(
	array(
		'label' => __( 'Explore Stories', 'testro' ),
		'style' => 'primary',
		'href'  => '#case-studies',
	),
	array(
		'label' => __( 'Book a Demo', 'testro' ),
		'style' => 'outline',
		'modal' => 'demo-modal',
		'icon'  => 'arrow-right',
	),
);
?>
<div class="testro-page-shell testro-page-shell--case-studies">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'eyebrow'     => __( 'Explore & Learn', 'testro' ),
			'title'       => __( 'theTestRo Case Studies', 'testro' ),
			'subtitle'    => __( 'See how engineering and QA teams use AI-powered, no-code automation to ship faster, reduce maintenance, and improve software quality.', 'testro' ),
			'badges'      => array(
				__( 'Customer Success', 'testro' ),
				__( 'Proven Outcomes', 'testro' ),
				__( 'Enterprise Teams', 'testro' ),
			),
			'actions'     => $case_actions,
			'breadcrumbs' => true,
		)
	);

	get_template_part(
		'template-parts/product/outcomes',
		null,
		array(
			'id'      => 'case-study-outcomes',
			'variant' => 'tint',
			'eyebrow' => __( 'Results', 'testro' ),
			'title'   => __( 'Outcomes Teams Achieve with theTestRo', 'testro' ),
			'intro'   => __( 'Customer stories highlight the same quality outcomes modern delivery teams need across every release cycle.', 'testro' ),
			'items'   => array(
				array(
					'icon'  => 'zap',
					'title' => __( 'Faster Test Creation', 'testro' ),
				),
				array(
					'icon'  => 'wrench',
					'title' => __( 'Lower Maintenance Effort', 'testro' ),
				),
				array(
					'icon'  => 'layout-grid',
					'title' => __( 'Higher Automation Coverage', 'testro' ),
				),
				array(
					'icon'  => 'rocket',
					'title' => __( 'Faster Release Cycles', 'testro' ),
				),
				array(
					'icon'  => 'shield-check',
					'title' => __( 'Improved Software Quality', 'testro' ),
				),
				array(
					'icon'  => 'coins',
					'title' => __( 'Reduced QA Costs', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/sections/case-studies',
		null,
		array(
			'eyebrow'  => __( 'Customer Stories', 'testro' ),
			'title'    => __( 'Our Work with High-Velocity Teams', 'testro' ),
			'intro'    => __( 'Explore how teams across industries use theTestRo to modernize automation and deliver better software with confidence.', 'testro' ),
			'cta_mode' => 'demo',
		)
	);

	get_template_part(
		'template-parts/sections/clients',
		null,
		array(
			'eyebrow' => __( 'Trusted Teams', 'testro' ),
			'title'   => __( 'Trusted by Teams Shipping Quality Software', 'testro' ),
			'intro'   => __( 'From growing product organizations to enterprise QA programs, teams rely on theTestRo for reliable automation at scale.', 'testro' ),
		)
	);

	get_template_part(
		'template-parts/sections/testimonials',
		null,
		array(
			'eyebrow' => __( 'Customer Voices', 'testro' ),
			'title'   => __( 'Hear It From Our Customers', 'testro' ),
			'intro'   => __( 'Real feedback from teams using AI-powered, no-code automation to reduce maintenance and accelerate delivery.', 'testro' ),
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'         => 'case-studies-final-cta',
			'title'      => __( 'Ready to Write Your Success Story?', 'testro' ),
			'intro'      => __( 'Talk with our team about how theTestRo can help your organization automate testing faster and ship higher-quality software.', 'testro' ),
			'actions'    => array(
				array(
					'label' => __( 'Book a Demo', 'testro' ),
					'style' => 'primary',
					'modal' => 'demo-modal',
				),
				array(
					'label' => __( 'Contact Us', 'testro' ),
					'style' => 'outline',
					'href'  => function_exists( 'testro_get_page_url' ) ? testro_get_page_url( 'contact-us' ) : home_url( '/contact-us/' ),
					'icon'  => 'arrow-right',
				),
			),
			'assurances' => array(
				__( 'No credit card required', 'testro' ),
				__( 'Cancel anytime', 'testro' ),
				__( 'Setup in minutes', 'testro' ),
			),
		)
	);
	?>
</div>
<?php
get_footer();
