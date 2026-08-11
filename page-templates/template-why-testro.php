<?php
/**
 * Template Name: Why theTestRo
 * Description: Why Choose theTestRo landing — centered hero, feature cards, comparison, outcomes, social proof, and CTA.
 *
 * @package TestRo
 */

get_header();

$why_actions = array(
	array(
		'label' => __( 'Start Testing', 'testro' ),
		'style' => 'primary',
		'modal' => 'demo-modal',
	),
	array(
		'label' => __( 'Book a Demo', 'testro' ),
		'style' => 'outline',
		'modal' => 'demo-modal',
		'icon'  => 'arrow-right',
	),
);
?>
<div class="testro-page-shell testro-page-shell--why">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'eyebrow'     => __( 'Why theTestRo', 'testro' ),
			'title'       => __( 'Test Smarter and Ship Faster with a No-Code Test Automation Platform', 'testro' ),
			'subtitle'    => __( 'theTestRo helps QA, development, and product teams automate testing faster with AI-powered, no-code automation—cutting maintenance effort while improving software quality across every release.', 'testro' ),
			'badges'      => array(
				__( 'AI-Powered', 'testro' ),
				__( 'No-Code', 'testro' ),
				__( 'Enterprise-Ready', 'testro' ),
				__( 'Unified Platform', 'testro' ),
			),
			'actions'     => $why_actions,
			'metrics'     => array(
				array(
					'value' => '30X',
					'label' => __( 'Faster Test Creation', 'testro' ),
					'icon'  => 'zap',
				),
				array(
					'value' => '3×',
					'label' => __( 'Higher Test Coverage', 'testro' ),
					'icon'  => 'layout-grid',
				),
				array(
					'value' => '−70%',
					'label' => __( 'Reduced Test Maintenance', 'testro' ),
					'icon'  => 'heart-pulse',
				),
				array(
					'value' => '50%',
					'label' => __( 'Faster Release Cycles', 'testro' ),
					'icon'  => 'rocket',
				),
			),
			'breadcrumbs' => true,
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'      => 'why-choose-features',
			'variant' => 'spotlight',
			'columns' => 3,
			'eyebrow' => __( 'Platform Advantages', 'testro' ),
			'title'   => __( 'Why Choose theTestRo?', 'testro' ),
			'intro'   => __( 'Modern teams choose theTestRo to replace fragmented, script-heavy tooling with intelligent automation that scales from first test to enterprise delivery.', 'testro' ),
			'items'   => array(
				array(
					'icon'        => 'sparkles',
					'title'       => __( 'AI-Powered Test Automation', 'testro' ),
					'description' => __( 'Automate testing intelligently with AI-powered test creation, execution, analysis, and maintenance.', 'testro' ),
				),
				array(
					'icon'        => 'pen-square',
					'title'       => __( 'No-Code Test Automation', 'testro' ),
					'description' => __( 'Create and maintain automated tests without requiring extensive scripting expertise.', 'testro' ),
				),
				array(
					'icon'        => 'layout-grid',
					'title'       => __( 'Unified Testing Platform', 'testro' ),
					'description' => __( 'Bring test creation, execution, management, analytics, and automation into one platform.', 'testro' ),
				),
				array(
					'icon'        => 'heart-pulse',
					'title'       => __( 'Self-Healing Automation', 'testro' ),
					'description' => __( 'Automatically adapt tests to application changes and reduce ongoing maintenance effort.', 'testro' ),
				),
				array(
					'icon'        => 'browsers',
					'title'       => __( 'Cross-Browser & Parallel Testing', 'testro' ),
					'description' => __( 'Validate applications across browsers and environments while running tests in parallel.', 'testro' ),
				),
				array(
					'icon'        => 'git-branch',
					'title'       => __( 'Continuous Testing & CI/CD', 'testro' ),
					'description' => __( 'Integrate automated testing directly into development and deployment workflows for continuous quality.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/comparison',
		null,
		array(
			'id'      => 'why-different',
			'eyebrow' => __( 'Platform Difference', 'testro' ),
			'title'   => __( 'Why theTestRo is Different', 'testro' ),
			'intro'   => __( 'See how AI-powered, no-code automation compares to traditional testing tools—so teams spend less time maintaining scripts and more time shipping quality software.', 'testro' ),
			'legacy'  => array(
				'label' => __( 'Traditional Tools', 'testro' ),
				'note'  => __( 'Script-heavy & fragmented', 'testro' ),
			),
			'modern'  => array(
				'label' => __( 'theTestRo', 'testro' ),
				'note'  => __( 'AI + No-Code + Unified', 'testro' ),
			),
			'rows'    => array(
				array(
					'aspect' => __( 'Authoring', 'testro' ),
					'legacy' => __( 'Script-heavy', 'testro' ),
					'modern' => __( 'AI + No-Code', 'testro' ),
				),
				array(
					'aspect' => __( 'Maintenance', 'testro' ),
					'legacy' => __( 'High maintenance', 'testro' ),
					'modern' => __( 'Self-healing', 'testro' ),
				),
				array(
					'aspect' => __( 'Tooling', 'testro' ),
					'legacy' => __( 'Multiple tools', 'testro' ),
					'modern' => __( 'Unified platform', 'testro' ),
				),
				array(
					'aspect' => __( 'Execution', 'testro' ),
					'legacy' => __( 'Manual execution', 'testro' ),
					'modern' => __( 'AI-powered automation', 'testro' ),
				),
				array(
					'aspect' => __( 'Reporting', 'testro' ),
					'legacy' => __( 'Separate reporting', 'testro' ),
					'modern' => __( 'Built-in analytics', 'testro' ),
				),
				array(
					'aspect' => __( 'Scale', 'testro' ),
					'legacy' => __( 'Limited scalability', 'testro' ),
					'modern' => __( 'Enterprise-ready', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/outcomes',
		null,
		array(
			'id'      => 'business-impact',
			'variant' => 'tint',
			'eyebrow' => __( 'Outcomes', 'testro' ),
			'title'   => __( 'Business Impact', 'testro' ),
			'intro'   => __( 'Teams using theTestRo modernize quality engineering with outcomes that compound across every sprint and release.', 'testro' ),
			'items'   => array(
				array(
					'icon'  => 'zap',
					'title' => __( 'Faster Test Creation', 'testro' ),
				),
				array(
					'icon'  => 'wrench',
					'title' => __( 'Lower Test Maintenance', 'testro' ),
				),
				array(
					'icon'  => 'shield-check',
					'title' => __( 'Higher Automation Stability', 'testro' ),
				),
				array(
					'icon'  => 'layout-grid',
					'title' => __( 'Increased Test Coverage', 'testro' ),
				),
				array(
					'icon'  => 'rocket',
					'title' => __( 'Faster Software Releases', 'testro' ),
				),
				array(
					'icon'  => 'coins',
					'title' => __( 'Reduced QA Costs', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/sections/clients',
		null,
		array(
			'eyebrow' => __( 'Customer Success', 'testro' ),
			'title'   => __( 'Trusted by Teams Shipping Quality Software', 'testro' ),
			'intro'   => __( 'From growing startups to enterprise QA organizations, teams rely on theTestRo to power reliable automation at scale.', 'testro' ),
		)
	);

	get_template_part(
		'template-parts/sections/testimonials',
		null,
		array(
			'eyebrow' => __( 'Customer Voices', 'testro' ),
			'title'   => __( 'What Teams Say About theTestRo', 'testro' ),
			'intro'   => __( 'Hear how QA, engineering, and product teams use AI-powered, no-code automation to reduce maintenance and accelerate delivery.', 'testro' ),
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'         => 'why-final-cta',
			'title'      => __( 'Start Testing Smarter with theTestRo', 'testro' ),
			'intro'      => __( 'Modernize software testing with AI-powered, no-code automation—create reliable tests faster, reduce maintenance, and ship with confidence.', 'testro' ),
			'actions'    => $why_actions,
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
