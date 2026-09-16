<?php
/**
 * Template Name: Pricing
 * Description: Pricing — Framer /why-thetestro/pricing (qGMZIzxDz).
 *
 * Framer source (read-only): Qc7jNmQghS7yjIB35091
 * Desktop: Ro7yItzyo
 *
 * Sections: qQh2Y_dT6 hero · hFZM6z_eV plans · YF3UpXccO FAQ · hPn5qPAKx CTA
 *
 * @package TestRo
 */

get_header();

$contact_url = function_exists( 'testro_get_page_url' )
	? testro_get_page_url( 'contact-us' )
	: home_url( '/contact-us/' );

$hero_actions = array(
	array(
		'label'         => __( 'Get Custom Pricing', 'testro' ),
		'style'         => 'primary',
		'modal'         => 'demo-modal',
		'with_arrow'    => false,
		'allow_on_hero' => true,
	),
);

$cta_actions = array(
	array(
		'label'           => __( 'Talk to Sales', 'testro' ),
		'style'           => 'secondary',
		'href'            => $contact_url,
		'with_arrow'      => false,
		'allow_on_footer' => true,
	),
	array(
		'label'           => __( 'Start Testing Free', 'testro' ),
		'style'           => 'primary',
		'modal'           => 'demo-modal',
		'with_arrow'      => false,
		'allow_on_footer' => true,
	),
);
?>
<div class="testro-page-shell testro-page-shell--pricing">
	<?php
	/* Framer qQh2Y_dT6 — Platform Opening; eyebrow + banking leftover hidden. */
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Simple, Scalable Pricing for Enterprise Test Automation', 'testro' ),
			'subtitle'    => __( "Every plan includes theTestRo's full AI testing platform. No per-agent fees, no hidden charges. Pick the plan that fits your team's size and scale, and grow into the next one when you're ready.", 'testro' ),
			'actions'     => $hero_actions,
			'breadcrumbs' => false,
		)
	);

	/* Framer hFZM6z_eV — plans header + interactive cards (Framer shows as image; WP keeps live toggle/infra). */
	get_template_part( 'template-parts/sections/pricing' );

	/* Framer YF3UpXccO — FAQ eyebrow + title; summary intro hidden (visible:false). */
	get_template_part(
		'template-parts/sections/faq',
		null,
		array(
			'faqs'          => 'pricing',
			'title'         => __( 'Frequently Asked Questions', 'testro' ),
			'intro'         => '',
			'heading_level' => 2,
		)
	);

	/*
	 * Framer hPn5qPAKx — brand Final CTA.
	 * Eyebrow "Ship Every Release With Confidence" and 14-day note are hidden.
	 * Visible hierarchy: "Not Sure…" (eyebrow) → "Talk to us…" (heading) → buttons.
	 */
	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'pricing-get-started',
			'variant'       => 'brand',
			'title'         => __( 'Not Sure Which Plan Fits Your Team?', 'testro' ),
			'intro'         => __( "Talk to us, and we'll help you find the right starting point", 'testro' ),
			'heading_level' => 2,
			'actions'       => $cta_actions,
		)
	);
	?>
</div>
<?php
get_footer();
