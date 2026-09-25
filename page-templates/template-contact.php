<?php
/**
 * Template Name: Contact Us
 * Description: Contact page — Framer /why-thetestro/contact-us (ZkNQuuai1).
 *
 * Framer source (read-only): Qc7jNmQghS7yjIB35091
 * Desktop: gk5bTngIL
 * Sections: Platform Opening → Form (exec-split) → Office → Final CTA
 *
 * @package TestRo
 */

get_header();

$sales_email   = 'sales@thetestro.com';
$support_email = 'support@thetestro.com';

/*
 * Final CTA (p_VDbGabt): Start Testing Free = Secondary, Book a Demo = Primary.
 */
$contact_cta_actions = array(
	array(
		'label'           => __( 'Start Testing Free', 'testro' ),
		'style'           => 'secondary',
		'modal'           => 'demo-modal',
		'with_arrow'      => false,
		'allow_on_footer' => true,
	),
	array(
		'label'      => __( 'Book a Demo', 'testro' ),
		'style'      => 'primary',
		'modal'      => 'demo-modal',
		'with_arrow' => false,
	),
);
?>
<div class="testro-page-shell testro-page-shell--contact">
	<?php
	/* Framer eSYVygpZf — Platform Opening: hero copy + sales/support cards. */
	?>
	<section class="testro-prod-hero testro-contact-hero" aria-labelledby="product-hero-title">
		<div class="testro-container testro-prod-hero__inner testro-contact-hero__inner">
			<div class="testro-contact-hero__copy">
				<h1 id="product-hero-title" class="testro-prod-hero__title" data-reveal>
					<?php esc_html_e( "Let's Build Smarter Software Testing Together", 'testro' ); ?>
				</h1>
				<p class="testro-prod-hero__sub" data-reveal>
					<?php esc_html_e( "Got a question about pricing, a feature, or how theTestRo fits your team? Want to see it in action first? Just reach out. We'll get you the answer.", 'testro' ); ?>
				</p>
			</div>

			<ul class="testro-contact-channels" data-reveal aria-label="<?php esc_attr_e( 'Contact channels', 'testro' ); ?>">
				<li class="testro-contact-channels__card testro-card--top-line">
					<span class="testro-contact-channels__icon" aria-hidden="true">
						<?php echo testro_icon( 'message-text', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<div class="testro-contact-channels__copy">
						<h2 class="testro-contact-channels__title"><?php esc_html_e( 'Talk to Sales', 'testro' ); ?></h2>
						<p class="testro-contact-channels__desc"><?php esc_html_e( 'Curious about plans, pricing, or a custom setup for your team? Our sales team is ready when you are.', 'testro' ); ?></p>
					</div>
					<a class="testro-contact-channels__link" href="<?php echo esc_url( 'mailto:' . $sales_email ); ?>"><?php echo esc_html( $sales_email ); ?></a>
				</li>
				<li class="testro-contact-channels__card testro-card--top-line">
					<span class="testro-contact-channels__icon" aria-hidden="true">
						<?php echo testro_icon( 'clock', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<div class="testro-contact-channels__copy">
						<h2 class="testro-contact-channels__title"><?php esc_html_e( 'Get Support', 'testro' ); ?></h2>
						<p class="testro-contact-channels__desc"><?php esc_html_e( 'Already using theTestRo and need a hand? Our support team responds fast.', 'testro' ); ?></p>
					</div>
					<a class="testro-contact-channels__link" href="<?php echo esc_url( 'mailto:' . $support_email ); ?>"><?php echo esc_html( $support_email ); ?></a>
				</li>
			</ul>
		</div>
	</section>

	<?php
	/* Framer HUsfsRFdk — split form: left copy 390px + right form frame (~677px). */
	get_template_part(
		'template-parts/sections/contact',
		null,
		array(
			'layout'          => 'brief',
			'title'           => __( 'Send Us a Message', 'testro' ),
			'supporting'      => '',
			'description'     => __( 'Tell Us a Bit About What You Need.', 'testro' ),
			'intro_extra'     => __( 'Fill this out, and someone from our team will follow up shortly.', 'testro' ),
			'submit_label'    => __( 'Send Message', 'testro' ),
			'message_label'   => __( 'Message', 'testro' ),
			'full_name'       => true,
			'section_id'      => 'get-in-touch',
			'show_highlights' => false,
			'show_consent'    => true,
			'show_eyebrow'    => false,
			'header_style'    => 'three-lines',
		)
	);

	/* Framer sWUzgHZy8 — Where to Find Us (two office columns; Framer placeholder copy preserved). */
	get_template_part(
		'template-parts/sections/office-locations',
		null,
		array(
			'title'      => __( 'Where to Find Us', 'testro' ),
			'eyebrow'    => '',
			'intro'      => __( "Got a question about pricing, a feature, or how theTestRo fits your team? Want to see it in action first? Just reach out. We'll get you the answer.", 'testro' ),
			'show_map'   => false,
			'white'      => true,
			'align'      => 'start',
			'locations'  => array(
				array(
					'city'  => __( '[City Name]', 'testro' ),
					'name'  => __( 'theTestRo Inc', 'testro' ),
					'lines' => array(
						__( '[Street Address, Suite Number]', 'testro' ),
						__( '[City, State, ZIP Code]', 'testro' ),
					),
				),
				array(
					'city'  => __( '[City Name]', 'testro' ),
					'name'  => __( 'theTestRo Technologies Pvt. Ltd', 'testro' ),
					'lines' => array(
						__( '[Street Address, Suite Number]', 'testro' ),
						__( '[City, State, ZIP Code]', 'testro' ),
					),
				),
			),
		)
	);

	/* Framer p_VDbGabt — brand Final CTA; heading only; Secondary then Primary. */
	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'contact-final-cta',
			'variant'       => 'brand',
			'title'         => '',
			'intro'         => __( 'Ready to See What theTestRo Can Do?', 'testro' ),
			'heading_level' => 2,
			'actions'       => $contact_cta_actions,
		)
	);
	?>
</div>
<?php
get_footer();
