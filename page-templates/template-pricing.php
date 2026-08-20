<?php
/**
 * Template Name: Pricing
 * Description: Dedicated pricing page with hero, plan cards, FAQ, and CTAs.
 *
 * @package TestRo
 */

get_header();

$contact_url = function_exists( 'testro_get_page_url' )
	? testro_get_page_url( 'contact-us' )
	: home_url( '/contact-us/' );
?>
<div class="testro-page-shell testro-page-shell--pricing">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Simple, Scalable Pricing for Enterprise Test Automation', 'testro' ),
			'subtitle'    => __( "Every plan includes theTestRo's full AI testing platform. No per-agent fees, no hidden charges. Pick the plan that fits your team's size and scale, and grow into the next one when you're ready.", 'testro' ),
			'actions'     => array(
				array(
					'label' => __( 'Get Custom Pricing', 'testro' ),
					'style' => 'primary',
					'modal' => 'demo-modal',
				),
			),
			'breadcrumbs' => true,
		)
	);

	get_template_part( 'template-parts/sections/pricing' );

	get_template_part(
		'template-parts/sections/faq',
		null,
		array(
			'faqs'          => 'pricing',
			'title'         => __( 'Frequently Asked Questions', 'testro' ),
			'heading_level' => 2,
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'final-cta',
			'title'         => __( 'Not Sure Which Plan Fits Your Team?', 'testro' ),
			'intro'         => __( "Talk to us, and we'll help you find the right starting point.", 'testro' ),
			'heading_level' => 3,
			'actions'       => array(
				array(
					'label' => __( 'Talk to Sales', 'testro' ),
					'style' => 'primary',
					'href'  => $contact_url,
				),
				array(
					'label' => __( 'Start Testing Free', 'testro' ),
					'style' => 'outline',
					'modal' => 'demo-modal',
					'icon'  => 'arrow-right',
				),
			),
		)
	);
	?>
</div>
<?php
get_footer();
