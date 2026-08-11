<?php
/**
 * Template Name: Contact Us
 * Description: Contact page with centered hero, form, expert cards, contact info, and final CTA.
 *
 * @package TestRo
 */

get_header();

$email = function_exists( 'testro_get_option' )
	? testro_get_option( 'email', 'support@thetestro.com' )
	: 'support@thetestro.com';
$phone = function_exists( 'testro_get_option' )
	? testro_get_option( 'phone', '' )
	: '';

$contact_actions = array(
	array(
		'label' => __( 'Book a Demo', 'testro' ),
		'style' => 'primary',
		'modal' => 'demo-modal',
	),
	array(
		'label' => __( 'Get in Touch', 'testro' ),
		'style' => 'outline',
		'href'  => '#get-in-touch',
		'icon'  => 'arrow-right',
	),
);
?>
<div class="testro-page-shell testro-page-shell--contact">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'eyebrow'     => __( 'Contact Us', 'testro' ),
			'title'       => __( "Let's Build Smarter Software Testing Together", 'testro' ),
			'subtitle'    => __( 'theTestRo helps teams modernize software testing with AI-powered, no-code automation. Connect with our team for product questions, demos, support, or partnership opportunities.', 'testro' ),
			'actions'     => $contact_actions,
			'breadcrumbs' => true,
		)
	);

	get_template_part(
		'template-parts/sections/contact',
		null,
		array(
			'layout'        => 'split',
			'title'         => __( 'Get in Touch', 'testro' ),
			'description'   => __( 'Reach out to theTestRo team for demos, product questions, support, or business inquiries. We typically respond within one business day.', 'testro' ),
			'submit_label'  => __( 'Send Message', 'testro' ),
			'show_phone'    => true,
			'show_subject'  => true,
			'full_name'     => true,
			'section_id'    => 'get-in-touch',
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'      => 'talk-to-experts',
			'variant' => 'spotlight',
			'columns' => 3,
			'eyebrow' => __( 'Our Teams', 'testro' ),
			'title'   => __( 'Talk to Our Experts', 'testro' ),
			'intro'   => __( 'Choose the conversation that fits your goals—sales, product support, or partnership opportunities.', 'testro' ),
			'items'   => array(
				array(
					'icon'        => 'user-check',
					'title'       => __( 'Sales', 'testro' ),
					'description' => __( 'Talk to our sales team. Learn how theTestRo can help your team modernize and scale software testing.', 'testro' ),
					'cta'         => array(
						'label' => __( 'Talk to Sales', 'testro' ),
						'href'  => '#get-in-touch',
						'attrs' => array(
							'data-inquiry' => 'sales',
						),
					),
				),
				array(
					'icon'        => 'message-text',
					'title'       => __( 'Support', 'testro' ),
					'description' => __( 'Get product support. Get assistance with your existing theTestRo setup, testing workflows, or product questions.', 'testro' ),
					'cta'         => array(
						'label' => __( 'Contact Support', 'testro' ),
						'href'  => 'mailto:' . $email,
					),
				),
				array(
					'icon'        => 'plug',
					'title'       => __( 'Partnerships', 'testro' ),
					'description' => __( 'Partner with theTestRo. Explore partnership and collaboration opportunities.', 'testro' ),
					'cta'         => array(
						'label' => __( 'Explore Partnerships', 'testro' ),
						'href'  => '#get-in-touch',
						'attrs' => array(
							'data-inquiry' => 'partnerships',
						),
					),
				),
			),
		)
	);

	get_template_part(
		'template-parts/sections/office-locations',
		null,
		array(
			'email' => $email,
			'phone' => $phone,
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'         => 'contact-final-cta',
			'title'      => __( 'Ready to Build Smarter Software Testing?', 'testro' ),
			'intro'      => __( 'Connect with theTestRo team and discover how AI-powered, no-code test automation can help your team deliver reliable software faster.', 'testro' ),
			'actions'    => array(
				array(
					'label' => __( 'Book a Demo', 'testro' ),
					'style' => 'primary',
					'modal' => 'demo-modal',
				),
				array(
					'label' => __( 'Start Testing', 'testro' ),
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
