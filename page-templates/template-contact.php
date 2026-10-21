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

$partners_url = function_exists( 'testro_nav_url' )
	? testro_nav_url( 'partners' )
	: ( function_exists( 'testro_get_page_url' ) ? testro_get_page_url( 'partners' ) : home_url( '/partners/' ) );

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
	/* Framer hero redesign — Contact Us. */
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'variant'        => 'redesign',
			'breadcrumbs'    => false,
			'title'          => __( "Let's Build Smarter Software Testing Together", 'testro' ),
			'title_lines'    => array(
				/* Framer rows: "Let's Build" / "Smarter Software Testing" / "Together" */
				array(
					array( 'text' => __( "Let's Build", 'testro' ), 'tone' => 'dark' ),
				),
				array(
					array( 'text' => __( 'Smarter Software Testing', 'testro' ), 'tone' => 'gradient' ),
				),
				array(
					array( 'text' => __( 'Together', 'testro' ), 'tone' => 'dark' ),
				),
			),
			'body_blocks'    => array(
				array(
					array( 'text' => __( 'Got a question about pricing, a feature, or how theTestRo fits your team? ', 'testro' ), 'tone' => 'muted' ),
					array( 'text' => __( 'Want to see it in action first?', 'testro' ), 'tone' => 'strong' ),
					array( 'text' => __( " Just reach out. We'll get you the answer.", 'testro' ), 'tone' => 'muted' ),
				),
			),
			/* Framer trust pill is hidden (visible:false) on Contact hero. */
			'trust'          => false,
			'mesh'           => 'images/hero/mesh-contact.webp',
			'show_divider'   => true,
			'cta_label'      => __( 'Become a Partner', 'testro' ),
			'cta_href'       => $partners_url,
			'cta_with_arrow' => true,
			'actions'        => array(
				array(
					'label'         => __( 'Become a Partner', 'testro' ),
					'style'         => 'primary',
					'href'          => $partners_url,
					'allow_on_hero' => true,
					'with_arrow'    => true,
				),
			),
		)
	);
	?>

	<?php /* Sales / support channel cards (below Platform Opening). */ ?>
	<section class="testro-contact-channels-section" aria-label="<?php esc_attr_e( 'Contact channels', 'testro' ); ?>">
		<div class="testro-container">
			<ul class="testro-contact-channels">
				<li class="testro-contact-channels__card testro-card--top-line">
					<span class="testro-contact-channels__icon" aria-hidden="true">
						<?php echo testro_icon( 'mail', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<div class="testro-contact-channels__copy">
						<h2 class="testro-contact-channels__title"><?php esc_html_e( 'Talk to Sales', 'testro' ); ?></h2>
						<p class="testro-contact-channels__desc"><?php esc_html_e( 'Curious about plans, pricing, or a custom setup for your team? Our sales team is ready when you are.', 'testro' ); ?></p>
					</div>
					<a class="testro-contact-channels__link" href="<?php echo esc_url( 'mailto:' . $sales_email ); ?>"><?php echo esc_html( $sales_email ); ?></a>
				</li>
				<li class="testro-contact-channels__card testro-card--top-line">
					<span class="testro-contact-channels__icon" aria-hidden="true">
						<?php echo testro_icon( 'timer', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
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
			'header_style'    => 'three-lines',
			'eyebrow'         => __( 'Send Us a Message', 'testro' ),
			'title'           => __( 'Tell Us a Bit About What You Need', 'testro' ),
			'supporting'      => '',
			'description'     => __( 'Fill this out, and someone from our team will follow up shortly.', 'testro' ),
			'submit_label'    => __( 'Send Message', 'testro' ),
			'message_label'   => __( 'Message', 'testro' ),
			'full_name'       => true,
			'section_id'      => 'get-in-touch',
			'show_highlights' => false,
			'show_consent'    => true,
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
