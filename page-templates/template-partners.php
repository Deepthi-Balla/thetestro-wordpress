<?php
/**
 * Template Name: Partners
 * Description: Partners landing page.
 *
 * @package TestRo
 */

get_header();

$contact_url = function_exists( 'testro_nav_url' )
	? testro_nav_url( 'contact-us' )
	: home_url( '/contact-us/' );

$partner_contact = $contact_url . '?inquiry=partnerships#get-in-touch';

$partner_actions = array(
	array(
		'label' => __( 'Become a Partner', 'testro' ),
		'style' => 'primary',
		'href'  => $partner_contact,
	),
);
?>
<div class="testro-page-shell testro-page-shell--partners">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Grow With theTestRo', 'testro' ),
			'subtitle'    => __( 'Bring AI-powered test automation to your clients and open up a new line of revenue for your business.', 'testro' ),
			'actions'     => $partner_actions,
			'breadcrumbs' => true,
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'                 => 'partnership-opportunities',
			'variant'            => 'spotlight',
			'columns'            => 4,
			'title'                => __( 'Ways to Partner', 'testro' ),
			'intro'                => __( 'A Few Ways to Work With Us', 'testro' ),
			'card_heading_level'   => 3,
			'items'                => array(
				array(
					'icon'        => 'wrench',
					'title'       => __( 'Implementation Partners', 'testro' ),
					'description' => __( 'Add theTestRo to your service lineup and help your clients get set up, configured, and running fast.', 'testro' ),
				),
				array(
					'icon'        => 'package',
					'title'       => __( 'Resellers', 'testro' ),
					'description' => __( 'Sell theTestRo directly to your customer base, with pricing and support built for reseller partners.', 'testro' ),
				),
				array(
					'icon'        => 'user-check',
					'title'       => __( 'Referral Partners', 'testro' ),
					'description' => __( "Send us a lead, and we'll handle the rest. Earn a commission for every deal that closes.", 'testro' ),
				),
				array(
					'icon'        => 'plug',
					'title'       => __( 'System Integrators and Distributors', 'testro' ),
					'description' => __( 'Bundle theTestRo into larger deployments and go-to-market alongside your existing enterprise offerings.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'                 => 'why-partner',
			'variant'            => 'default',
			'columns'            => 3,
			'title'              => __( 'What You Get as a Partner', 'testro' ),
			'intro'              => __( 'Real Support, Not Just a Login', 'testro' ),
			'card_heading_level' => 3,
			'items'              => array(
				array(
					'icon'        => 'trending-up',
					'title'       => __( 'Co-Marketing', 'testro' ),
					'description' => __( 'Get featured in joint campaigns, case studies, and content that puts your name in front of a bigger audience.', 'testro' ),
				),
				array(
					'icon'        => 'wrench',
					'title'       => __( 'Hands-On Implementation Help', 'testro' ),
					'description' => __( 'Our team backs you up during client rollouts, so you can own the relationship and the revenue without carrying the technical load alone.', 'testro' ),
				),
				array(
					'icon'        => 'file-text',
					'title'       => __( 'Training and Ongoing Support', 'testro' ),
					'description' => __( 'Get access to onboarding, product training, and a support line built specifically for partners, not just end users.', 'testro' ),
				),
				array(
					'icon'        => 'message-text',
					'title'       => __( 'Sales and Marketing Resources', 'testro' ),
					'description' => __( 'Pitch decks, one-pagers, demo scripts, and campaign assets, ready to use whenever you need them.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'                 => 'why-thetestro-partner',
			'variant'            => 'tint',
			'columns'            => 4,
			'title'              => __( 'Why Partners Choose theTestRo', 'testro' ),
			'heading_level'      => 3,
			'card_heading_level' => 4,
			'items'              => array(
				array(
					'icon'        => 'user-check',
					'title'       => __( 'A Platform Teams Actually Adopt', 'testro' ),
					'description' => __( 'theTestRo is built to be picked up fast by QA teams of every size, which means shorter sales cycles and happier clients.', 'testro' ),
				),
				array(
					'icon'        => 'sparkles',
					'title'       => __( 'AI That Cuts Real Time, Not Just Marketing Copy', 'testro' ),
					'description' => __( 'Plain-English test creation and self-healing tests mean your clients see results early, which makes renewals easier.', 'testro' ),
				),
				array(
					'icon'        => 'pen-square',
					'title'       => __( 'One Platform Across Every Industry', 'testro' ),
					'description' => __( 'From retail to healthcare to financial services, theTestRo fits a wide range of client environments without a custom build each time.', 'testro' ),
				),
				array(
					'icon'        => 'rocket',
					'title'       => __( 'A Growing Market to Sell Into', 'testro' ),
					'description' => __( 'Test automation demand keeps climbing as companies ship software faster. Partnering now means growing alongside that demand, not catching up to it later.', 'testro' ),
				),
			),
		)
	);
	?>

	<section class="testro-partner-logos" id="partner-network" aria-labelledby="partner-network-heading">
		<div class="testro-container">
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'title'         => __( 'Join a Growing Partner Network', 'testro' ),
					'intro'         => __( "You'd Be in Good Company", 'testro' ),
					'intro_extra'   => __( 'theTestRo works with implementation firms, resellers, and system integrators across the industry, from focused boutique QA consultancies to large enterprise service providers. Whatever size your business is, there\'s a partnership model that fits.', 'testro' ),
					'heading_id'    => 'partner-network-heading',
					'heading_level' => 2,
				)
			);
			?>
			<div class="testro-partner-logos__cta" style="margin-top: 2.25rem;" data-reveal>
				<?php
				get_template_part(
					'template-parts/product/actions',
					null,
					array(
						'actions' => $partner_actions,
						'align'   => 'center',
						'tone'    => 'light',
					)
				);
				?>
			</div>
		</div>
	</section>

	<?php
	get_template_part(
		'template-parts/sections/faq',
		null,
		array(
			'title'         => __( 'Frequently Asked Questions', 'testro' ),
			'heading_level' => 2,
			'faqs'          => 'partners',
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'become-a-partner',
			'title'         => __( 'Ready to Partner With theTestRo?', 'testro' ),
			'heading_level' => 2,
			'actions'       => $partner_actions,
		)
	);
	?>
</div>
<?php
get_footer();
