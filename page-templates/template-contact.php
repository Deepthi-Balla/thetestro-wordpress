<?php
/**
 * Template Name: Contact Us
 * Description: Contact page with hero, sales/support cards, form, office locations, and CTA.
 *
 * @package TestRo
 */

get_header();

$sales_email   = 'sales@thetestro.com';
$support_email = 'support@thetestro.com';
?>
<div class="testro-page-shell testro-page-shell--contact">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( "Let's Build Smarter Software Testing Together", 'testro' ),
			'subtitle'    => __( "Got a question about pricing, a feature, or how theTestRo fits your team? Want to see it in action first? Just reach out. We'll get you the answer.", 'testro' ),
			'breadcrumbs' => true,
		)
	);
	?>

	<section class="testro-prod-section testro-prod-section--spotlight testro-prod-features" id="contact-channels" aria-label="<?php esc_attr_e( 'Contact channels', 'testro' ); ?>">
		<div class="testro-container">
			<ul class="testro-prod-cards" data-columns="2">
				<li class="testro-prod-card testro-prod-card--cta" data-reveal style="--reveal-delay: 0ms">
					<span class="testro-prod-card__glow" aria-hidden="true"></span>
					<div class="testro-prod-card__body">
						<span class="testro-prod-card__icon" aria-hidden="true">
							<?php echo testro_icon( 'user-check', array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<h2 class="testro-prod-card__title"><?php esc_html_e( 'Talk to Sales', 'testro' ); ?></h2>
						<p class="testro-prod-card__desc"><?php esc_html_e( 'Curious about plans, pricing, or a custom setup for your team? Our sales team is ready when you are.', 'testro' ); ?></p>
						<p class="testro-prod-card__cta">
							<a class="testro-btn testro-btn--outline testro-prod-card__cta-btn" href="<?php echo esc_url( 'mailto:' . $sales_email ); ?>">
								<span><?php echo esc_html( $sales_email ); ?></span>
								<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</a>
						</p>
					</div>
				</li>
				<li class="testro-prod-card testro-prod-card--cta" data-reveal style="--reveal-delay: 70ms">
					<span class="testro-prod-card__glow" aria-hidden="true"></span>
					<div class="testro-prod-card__body">
						<span class="testro-prod-card__icon" aria-hidden="true">
							<?php echo testro_icon( 'message-text', array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<h2 class="testro-prod-card__title"><?php esc_html_e( 'Get Support', 'testro' ); ?></h2>
						<p class="testro-prod-card__desc"><?php esc_html_e( 'Already using theTestRo and need a hand? Our support team responds fast.', 'testro' ); ?></p>
						<p class="testro-prod-card__cta">
							<a class="testro-btn testro-btn--outline testro-prod-card__cta-btn" href="<?php echo esc_url( 'mailto:' . $support_email ); ?>">
								<span><?php echo esc_html( $support_email ); ?></span>
								<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</a>
						</p>
					</div>
				</li>
			</ul>
		</div>
	</section>

	<?php
	get_template_part(
		'template-parts/sections/contact',
		null,
		array(
			'layout'          => 'default',
			'title'           => __( 'Send Us a Message', 'testro' ),
			'supporting'      => __( 'Tell Us a Bit About What You Need', 'testro' ),
			'description'     => __( 'Fill this out, and someone from our team will follow up shortly.', 'testro' ),
			'submit_label'    => __( 'Send Message', 'testro' ),
			'message_label'   => __( 'Message', 'testro' ),
			'full_name'       => true,
			'section_id'      => 'get-in-touch',
			'show_highlights' => false,
			'show_consent'    => true,
			'show_eyebrow'    => false,
		)
	);

	get_template_part(
		'template-parts/sections/office-locations',
		null,
		array(
			'title'     => __( 'Where to Find Us', 'testro' ),
			'eyebrow'   => '',
			'intro'     => '',
			'show_map'  => true,
			'company'   => __( 'Openskale Technologies', 'testro' ),
			'address'   => __( '1st Floor, Jain Sadguru Images, Unit-106B, Capital Park Road, VIP Hills, Madhapur, Hyderabad, Telangana 500081', 'testro' ),
			'map_query' => 'Openskale Technologies Pvt Ltd, Jain Sadguru Images, Unit-106B, Capital Park Road, VIP Hills, Madhapur, Hyderabad, Telangana 500081',
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'contact-final-cta',
			'title'         => __( 'Ready to See What theTestRo Can Do?', 'testro' ),
			'heading_level' => 2,
			'actions'       => array(
				array(
					'label' => __( 'Start Testing Free', 'testro' ),
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
		)
	);
	?>
</div>
<?php
get_footer();
