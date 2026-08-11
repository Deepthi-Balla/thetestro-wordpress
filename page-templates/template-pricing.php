<?php
/**
 * Template Name: Pricing
 * Description: Dedicated pricing page with centered hero, plan cards, benefits, FAQ, and CTAs.
 *
 * @package TestRo
 */

get_header();

$compare_url = function_exists( 'testro_get_page_url' )
	? testro_get_page_url( 'compare-test-automation-tools' )
	: home_url( '/compare-test-automation-tools/' );
?>
<div class="testro-page-shell testro-page-shell--pricing">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'eyebrow'  => __( 'Pricing', 'testro' ),
			'title'    => __( 'Simple, Scalable Pricing for Enterprise Test Automation', 'testro' ),
			'subtitle' => __( "Flexible pricing for teams of every size—from growing QA teams to large enterprises. Scale AI-powered test automation as your needs grow.", 'testro' ),
			'actions'  => array(
				array(
					'label' => __( 'Get Custom Pricing', 'testro' ),
					'style' => 'primary',
					'modal' => 'demo-modal',
				),
				array(
					'label' => __( 'Book a Demo', 'testro' ),
					'style' => 'outline',
					'modal' => 'demo-modal',
					'icon'  => 'arrow-right',
				),
			),
			'breadcrumbs' => true,
		)
	);

	get_template_part( 'template-parts/sections/pricing-plans' );

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'      => 'every-plan-includes',
			'variant' => 'tint',
			'columns' => 4,
			'eyebrow' => __( 'Included', 'testro' ),
			'title'   => __( 'Every Plan Includes', 'testro' ),
			'intro'   => __( 'Core capabilities that help every team automate testing with confidence—no matter which plan you choose.', 'testro' ),
			'items'   => function_exists( 'testro_get_pricing_includes' ) ? testro_get_pricing_includes() : array(),
		)
	);

	get_template_part(
		'template-parts/product/outcomes',
		null,
		array(
			'id'      => 'why-choose-pricing',
			'variant' => 'spotlight',
			'eyebrow' => __( 'Why theTestRo', 'testro' ),
			'title'   => __( 'Why Choose theTestRo?', 'testro' ),
			'intro'   => __( 'Built for modern QA and engineering teams that need faster releases, lower maintenance, and enterprise-grade quality.', 'testro' ),
			'items'   => function_exists( 'testro_get_pricing_benefits' ) ? testro_get_pricing_benefits() : array(),
		)
	);

	get_template_part(
		'template-parts/sections/faq',
		null,
		array(
			'faqs'    => 'pricing',
			'eyebrow' => __( 'FAQ', 'testro' ),
			'title'   => __( 'Frequently Asked Questions', 'testro' ),
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'      => 'compare-cta',
			'title'   => __( 'Ready to Compare theTestRo?', 'testro' ),
			'intro'   => __( 'See how theTestRo helps engineering teams automate testing faster with AI-powered, no-code automation built for modern software delivery.', 'testro' ),
			'actions' => array(
				array(
					'label' => __( 'Compare Platforms', 'testro' ),
					'style' => 'primary',
					'href'  => $compare_url,
				),
				array(
					'label' => __( 'Book a Demo', 'testro' ),
					'style' => 'outline',
					'modal' => 'demo-modal',
					'icon'  => 'arrow-right',
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'         => 'final-cta',
			'title'      => __( 'Ready to Transform Your Software Testing?', 'testro' ),
			'intro'      => __( 'Talk to our experts to find the right plan for your team and start automating software testing with AI-powered, enterprise-grade automation.', 'testro' ),
			'actions'    => array(
				array(
					'label' => __( 'Get Custom Pricing', 'testro' ),
					'style' => 'primary',
					'modal' => 'demo-modal',
				),
				array(
					'label' => __( 'Book a Demo', 'testro' ),
					'style' => 'outline',
					'modal' => 'demo-modal',
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
