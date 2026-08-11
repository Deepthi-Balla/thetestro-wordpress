<?php
/**
 * Template Name: Partners
 * Description: Partners landing — centered hero, partnership types, benefits, ecosystem logos, FAQ, and CTA.
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
		'href'  => '#become-a-partner',
	),
);

$partner_final_actions = array(
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
			'eyebrow'     => __( 'Partners', 'testro' ),
			'title'       => __( 'Become a theTestRo Partner', 'testro' ),
			'subtitle'    => __( 'Grow your business by delivering AI-powered test automation solutions to enterprise customers.', 'testro' ),
			'badges'      => array(
				__( 'Implementation', 'testro' ),
				__( 'Reseller', 'testro' ),
				__( 'Referral', 'testro' ),
				__( 'Technology', 'testro' ),
			),
			'actions'     => $partner_actions,
			'breadcrumbs' => true,
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'      => 'partnership-opportunities',
			'variant' => 'spotlight',
			'columns' => 4,
			'eyebrow' => __( 'Grow Together', 'testro' ),
			'title'   => __( 'Partnership Opportunities', 'testro' ),
			'intro'   => __( 'theTestRo works with different types of partners to help organizations adopt AI-powered software testing—and to create new revenue opportunities for the firms that deliver it.', 'testro' ),
			'items'   => array(
				array(
					'icon'        => 'wrench',
					'title'       => __( 'Implementation Partners', 'testro' ),
					'description' => __( 'Help organizations implement, configure, and scale theTestRo across their testing workflows.', 'testro' ),
				),
				array(
					'icon'        => 'package',
					'title'       => __( 'Reseller Partners', 'testro' ),
					'description' => __( "Expand your portfolio by offering theTestRo's AI-powered test automation platform to customers.", 'testro' ),
				),
				array(
					'icon'        => 'user-check',
					'title'       => __( 'Referral Partners', 'testro' ),
					'description' => __( 'Refer organizations that can benefit from modern AI-powered software testing.', 'testro' ),
				),
				array(
					'icon'        => 'plug',
					'title'       => __( 'Technology & Strategic Partners', 'testro' ),
					'description' => __( 'Build integrations, technology partnerships, and strategic collaborations with theTestRo.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'      => 'why-partner',
			'variant' => 'default',
			'columns' => 3,
			'eyebrow' => __( 'Partner Benefits', 'testro' ),
			'title'   => __( 'Why Partner with theTestRo?', 'testro' ),
			'intro'   => __( 'Join a collaborative partner program built to help you win deals, deliver successful implementations, and grow recurring revenue.', 'testro' ),
			'items'   => array(
				array(
					'icon'        => 'trending-up',
					'title'       => __( 'Co-Marketing Opportunities', 'testro' ),
					'description' => __( 'Amplify your brand with joint campaigns, webinars, case studies, and shared go-to-market initiatives.', 'testro' ),
				),
				array(
					'icon'        => 'coins',
					'title'       => __( 'Revenue Growth', 'testro' ),
					'description' => __( 'Unlock new revenue streams through resale, referrals, implementation services, and long-term customer success.', 'testro' ),
				),
				array(
					'icon'        => 'badge-check',
					'title'       => __( 'Technical Enablement & Training', 'testro' ),
					'description' => __( 'Get certified enablement so your teams can implement, configure, and support theTestRo with confidence.', 'testro' ),
				),
				array(
					'icon'        => 'file-text',
					'title'       => __( 'Sales & Marketing Resources', 'testro' ),
					'description' => __( 'Access ready-to-use decks, demos, battle cards, and content that help you engage enterprise buyers faster.', 'testro' ),
				),
				array(
					'icon'        => 'message-text',
					'title'       => __( 'Dedicated Partner Support', 'testro' ),
					'description' => __( 'Work with a dedicated partner contact who helps you prioritize opportunities and resolve customer needs quickly.', 'testro' ),
				),
				array(
					'icon'        => 'layout-grid',
					'title'       => __( 'Product & Implementation Assistance', 'testro' ),
					'description' => __( 'Leverage product experts for complex rollouts, integrations, and best-practice guidance across engagements.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'      => 'why-thetestro-partner',
			'variant' => 'tint',
			'columns' => 3,
			'eyebrow' => __( 'Platform Advantage', 'testro' ),
			'title'   => __( 'Why theTestRo?', 'testro' ),
			'intro'   => __( 'Organizations choose theTestRo as their testing technology partner because it delivers modern, AI-powered automation that is easy to adopt and ready for enterprise scale.', 'testro' ),
			'items'   => array(
				array(
					'icon'        => 'sparkles',
					'title'       => __( 'AI-Powered Test Automation Platform', 'testro' ),
					'description' => __( 'Deliver intelligent test creation, execution, analysis, and maintenance powered by AI.', 'testro' ),
				),
				array(
					'icon'        => 'pen-square',
					'title'       => __( 'No-Code Test Automation', 'testro' ),
					'description' => __( 'Enable teams to automate testing without deep scripting expertise—accelerating time to value.', 'testro' ),
				),
				array(
					'icon'        => 'shield-check',
					'title'       => __( 'Enterprise-Ready Solution', 'testro' ),
					'description' => __( 'Support security, governance, and reliability requirements expected by enterprise customers.', 'testro' ),
				),
				array(
					'icon'        => 'browsers',
					'title'       => __( 'Unified Web, API & Cross-Browser Testing', 'testro' ),
					'description' => __( 'Cover critical quality workflows in one platform—web, API, and cross-browser validation.', 'testro' ),
				),
				array(
					'icon'        => 'rocket',
					'title'       => __( 'Scalable for Businesses of Every Size', 'testro' ),
					'description' => __( 'Grow with customers from first automation projects to large-scale, multi-team quality programs.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/sections/partner-logos',
		null,
		array(
			'eyebrow' => __( 'Ecosystem', 'testro' ),
			'title'   => __( 'Our Partner Ecosystem', 'testro' ),
			'intro'   => __( 'theTestRo collaborates with a growing network of organizations that help teams modernize software quality with AI-powered test automation.', 'testro' ),
		)
	);

	get_template_part(
		'template-parts/sections/faq',
		null,
		array(
			'eyebrow' => __( 'Partner Program', 'testro' ),
			'title'   => __( 'Frequently Asked Questions', 'testro' ),
			'faqs'    => array(
				array(
					'question' => __( 'How do I become a partner?', 'testro' ),
					'answer'   => __( 'Click Become a Partner to share your company details and partnership interest. Our partnerships team will review your application and follow up to discuss the best-fit program.', 'testro' ),
				),
				array(
					'question' => __( 'Is there a partner program fee?', 'testro' ),
					'answer'   => __( 'Program requirements and any fees vary by partnership type. After you apply, we will outline the options that match your business model with clear commercial terms.', 'testro' ),
				),
				array(
					'question' => __( 'What types of partnerships are available?', 'testro' ),
					'answer'   => __( 'We work with Implementation, Reseller, Referral, and Technology & Strategic partners. Many organizations combine more than one model based on how they engage customers.', 'testro' ),
				),
				array(
					'question' => __( 'What support does theTestRo provide?', 'testro' ),
					'answer'   => __( 'Partners receive enablement and training, sales and marketing resources, dedicated partner support, and product or implementation assistance for customer engagements.', 'testro' ),
				),
				array(
					'question' => __( 'How do partners generate revenue?', 'testro' ),
					'answer'   => __( 'Partners can earn through resale margins, referral incentives, implementation and consulting services, and ongoing customer success engagements tied to theTestRo deployments.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'         => 'become-a-partner',
			'title'      => __( 'Ready to Grow with theTestRo?', 'testro' ),
			'intro'      => __( 'Join our partner ecosystem and help organizations accelerate software quality with AI-powered test automation.', 'testro' ),
			'actions'    => $partner_final_actions,
			'assurances' => array(
				__( 'Flexible partnership models', 'testro' ),
				__( 'Dedicated partner support', 'testro' ),
				__( 'Co-marketing opportunities', 'testro' ),
			),
		)
	);
	?>
</div>
<?php
get_footer();
