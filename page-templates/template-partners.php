<?php
/**
 * Template Name: Partners
 * Description: Partners landing page — Framer /why-thetestro/partners (DxJdpzUfv).
 *
 * Framer source (read-only): Qc7jNmQghS7yjIB35091
 * Desktop: sshwB0IPG
 *
 * @package TestRo
 */

get_header();

$contact_url = function_exists( 'testro_nav_url' )
	? testro_nav_url( 'contact-us' )
	: home_url( '/contact-us/' );

$partner_contact = $contact_url . '?inquiry=partnerships#get-in-touch';

/*
 * Framer DxJdpzUfv CTAs: Become a Partner = Primary (hero, network, final CTA).
 */
$partner_actions = array(
	array(
		'label'           => __( 'Become a Partner', 'testro' ),
		'style'           => 'primary',
		'href'            => $partner_contact,
		'with_arrow'      => false,
		'allow_on_hero'   => true,
		'allow_on_footer' => true,
	),
);
?>
<div class="testro-page-shell testro-page-shell--partners">
	<?php
	/* Framer ZOy8hv38D — Platform Opening; no breadcrumbs. */
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Grow With theTestRo', 'testro' ),
			'subtitle'    => __( 'Bring AI-powered test automation to your clients and open up a new line of revenue for your business.', 'testro' ),
			'actions'     => $partner_actions,
			'breadcrumbs' => false,
		)
	);

	/* Framer w9X6aEuRB — Trusted Logos Row One (tickerEffect velocity 38). */
	get_template_part(
		'template-parts/sections/why-trusted-reviews',
		null,
		array(
			'id' => 'partners-trusted-reviews',
		)
	);

	/* Framer EenyUkM1G — Ways to Partner · 4 white cards on #F4F9FF. */
	get_template_part(
		'template-parts/product/bf-compose',
		null,
		array(
			'id'            => 'ways-to-partner',
			'variant'       => 'feature-cards',
			'tint'          => true,
			'columns'       => 4,
			'title'         => __( 'Ways to Partner', 'testro' ),
			'intro'         => __( 'A Few Ways to Work With Us', 'testro' ),
			'heading_level' => 2,
			'items'         => array(
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

	/* Framer GHB5QiSyx — What You Get · 4 white cards on white · 3-col wrap. */
	get_template_part(
		'template-parts/product/bf-compose',
		null,
		array(
			'id'            => 'what-you-get',
			'variant'       => 'feature-cards',
			'white'         => true,
			'columns'       => 3,
			'title'         => __( 'What You Get as a Partner', 'testro' ),
			'intro'         => __( 'Real Support, Not Just a Login', 'testro' ),
			'heading_level' => 2,
			'items'         => array(
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

	/* Framer ub0iRos3M — Why Partners Choose · QI numbered rows (AI Quality Intelligence left rail). */
	get_template_part(
		'template-parts/product/bf-compose',
		null,
		array(
			'id'            => 'why-partners-choose',
			'variant'       => 'exec-split',
			'white'         => true,
			'steps_style'   => 'numbered-rows',
			'title'         => __( 'Why Partners Choose theTestRo', 'testro' ),
			'intro'         => __( 'Real Outcomes, Not Just Feature Checklists', 'testro' ),
			'heading_level' => 2,
			'items'         => array(
				array(
					'title'       => __( 'A Platform Teams Actually Adopt', 'testro' ),
					'description' => __( 'theTestRo is built to be picked up fast by QA teams of every size, which means shorter sales cycles and happier clients.', 'testro' ),
				),
				array(
					'title'       => __( 'AI That Cuts Real Time, Not Just Marketing Copy', 'testro' ),
					'description' => __( 'Plain-English test creation and self-healing tests mean your clients see results early, which makes renewals easier.', 'testro' ),
				),
				array(
					'title'       => __( 'One Platform Across Every Industry', 'testro' ),
					'description' => __( 'From retail to healthcare to financial services, theTestRo fits a wide range of client environments without a custom build each time.', 'testro' ),
				),
				array(
					'title'       => __( 'A Growing Market to Sell Into', 'testro' ),
					'description' => __( 'Test automation demand keeps climbing as companies ship software faster. Partnering now means growing alongside that demand, not catching up to it later.', 'testro' ),
				),
			),
		)
	);
	?>

	<?php /* Framer fuCTOgkgZ — Join a Growing Partner Network · three-line header + logos + CTA. */ ?>
	<section class="testro-partner-network" id="partner-network" aria-labelledby="partner-network-heading">
		<div class="testro-container testro-partner-network__inner">
			<header class="testro-section-header testro-section-header--three-lines testro-why__header testro-partner-network__header" data-reveal>
				<h2 id="partner-network-heading" class="main-headings testro-why__heading"><?php echo esc_html( testro_section_label_title( __( 'Join a Growing Partner Network', 'testro' ) ) ); ?></h2>
				<p class="sub-text testro-why__intro"><?php echo esc_html( __( "You'd Be in Good Company", 'testro' ) ); ?></p>
				<p class="sub-text testro-why__intro"><?php echo esc_html( __( "theTestRo works with implementation firms, resellers, and system integrators across the industry, from focused boutique QA consultancies to large enterprise service providers. Whatever size your business is, there's a partnership model that fits.", 'testro' ) ); ?></p>
			</header>

			<?php
			/* Framer fPTkjCQkB — Trusted Logos Row One ticker inside Partner Network. */
			get_template_part(
				'template-parts/sections/why-trusted-reviews',
				null,
				array(
					'id'       => 'partner-network-reviews',
					'embedded' => true,
				)
			);
			?>

			<div class="testro-partner-network__cta" data-reveal>
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
	/* Framer Ruk9E1O70 — FAQ (eyebrow FAQ, no intro). */
	get_template_part(
		'template-parts/sections/faq',
		null,
		array(
			'title'         => __( 'Frequently Asked Questions', 'testro' ),
			'intro'         => '',
			'heading_level' => 2,
			'faqs'          => 'partners',
		)
	);

	/* Framer XKXDrBleW — brand Final CTA. */
	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'become-a-partner',
			'variant'       => 'brand',
			'title'         => '',
			'intro'         => __( 'Ready to Partner With theTestRo?', 'testro' ),
			'heading_level' => 2,
			'actions'       => $partner_actions,
		)
	);
	?>
</div>
<?php
get_footer();
