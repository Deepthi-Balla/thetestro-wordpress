<?php
/**
 * Template Name: Compare Tools
 * Description: Compare theTestRo with leading test automation platforms — hub page with competitor cards, capability table, outcomes, social proof, FAQ, and CTA.
 *
 * @package TestRo
 */

get_header();

$compare_anchor = '#compare-platforms';
$demo_actions   = array(
	array(
		'label' => __( 'Compare Platforms', 'testro' ),
		'style' => 'primary',
		'href'  => $compare_anchor,
	),
	array(
		'label' => __( 'Get a Demo', 'testro' ),
		'style' => 'outline',
		'modal' => 'demo-modal',
		'icon'  => 'arrow-right',
	),
);

$cta_actions = array(
	array(
		'label' => __( 'Compare Platforms', 'testro' ),
		'style' => 'primary',
		'href'  => $compare_anchor,
	),
	array(
		'label' => __( 'Book a Demo', 'testro' ),
		'style' => 'outline',
		'modal' => 'demo-modal',
		'icon'  => 'arrow-right',
	),
);

/**
 * Resolve a competitor comparison URL when a dedicated page exists at
 * `/thetestro-vs-{competitor}/`; otherwise deep-link to the side-by-side
 * comparison so the hub never 404s before individual routes ship.
 *
 * @param string $competitor Competitor slug fragment (e.g. browserstack).
 * @return string
 */
$resolve_compare_url = static function ( $competitor ) {
	$competitor = sanitize_title( $competitor );
	$slug       = 'thetestro-vs-' . $competitor;
	$page       = get_page_by_path( $slug );

	if ( $page instanceof WP_Post ) {
		return get_permalink( $page );
	}

	$hub = function_exists( 'testro_get_page_url' )
		? testro_get_page_url( 'compare-test-automation-tools' )
		: home_url( '/compare-test-automation-tools/' );

	return trailingslashit( $hub ) . '#side-by-side';
};

$competitors = array(
	array(
		'slug'        => 'browserstack',
		'icon'        => 'browsers',
		'title'       => __( 'theTestRo vs BrowserStack', 'testro' ),
		'description' => __( 'Compare AI-powered, no-code automation with BrowserStack’s cloud testing and device coverage approach.', 'testro' ),
	),
	array(
		'slug'        => 'testsigma',
		'icon'        => 'sparkles',
		'title'       => __( 'theTestRo vs Testsigma', 'testro' ),
		'description' => __( 'See how theTestRo’s unified AI platform differs from Testsigma for enterprise test automation.', 'testro' ),
	),
	array(
		'slug'        => 'selenium',
		'icon'        => 'code',
		'title'       => __( 'theTestRo vs Selenium', 'testro' ),
		'description' => __( 'Explore a Selenium alternative built for faster authoring, self-healing, and lower maintenance.', 'testro' ),
	),
	array(
		'slug'        => 'playwright',
		'icon'        => 'code',
		'title'       => __( 'theTestRo vs Playwright', 'testro' ),
		'description' => __( 'Compare no-code AI automation with Playwright scripting for teams that need scale without heavy code ownership.', 'testro' ),
	),
	array(
		'slug'        => 'mabl',
		'icon'        => 'wand',
		'title'       => __( 'theTestRo vs Mabl', 'testro' ),
		'description' => __( 'Evaluate theTestRo against Mabl for AI-assisted testing, coverage, and enterprise delivery workflows.', 'testro' ),
	),
	array(
		'slug'        => 'testgrid',
		'icon'        => 'layout-grid',
		'title'       => __( 'theTestRo vs TestGrid', 'testro' ),
		'description' => __( 'Compare platform depth, automation intelligence, and maintenance effort versus TestGrid.', 'testro' ),
	),
	array(
		'slug'        => 'reflect',
		'icon'        => 'scan-eye',
		'title'       => __( 'theTestRo vs Reflect', 'testro' ),
		'description' => __( 'See how theTestRo stacks up against Reflect for no-code web automation and continuous testing.', 'testro' ),
	),
	array(
		'slug'        => 'virtuoso',
		'icon'        => 'message-text',
		'title'       => __( 'theTestRo vs Virtuoso', 'testro' ),
		'description' => __( 'Compare AI-powered test creation and enterprise scalability between theTestRo and Virtuoso.', 'testro' ),
	),
	array(
		'slug'        => 'testrigor',
		'icon'        => 'pen-square',
		'title'       => __( 'theTestRo vs TestRigor', 'testro' ),
		'description' => __( 'Understand differences in plain-English automation, maintenance, and unified testing capabilities.', 'testro' ),
	),
);

$competitor_items = array();
foreach ( $competitors as $competitor ) {
	$competitor_items[] = array(
		'id'          => 'compare-' . $competitor['slug'],
		'icon'        => $competitor['icon'],
		'title'       => $competitor['title'],
		'description' => $competitor['description'],
		'cta'         => array(
			'label' => __( 'Compare Now', 'testro' ),
			'href'  => $resolve_compare_url( $competitor['slug'] ),
		),
	);
}
?>
<div class="testro-page-shell testro-page-shell--compare">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'eyebrow'     => __( 'Compare Tools', 'testro' ),
			'title'       => __( 'theTestRo vs Test Automation Alternatives', 'testro' ),
			'subtitle'    => __( 'Compare theTestRo with leading test automation platforms to discover why engineering teams choose AI-powered, no-code automation for faster software delivery.', 'testro' ),
			'badges'      => array(
				__( 'AI Test Automation', 'testro' ),
				__( 'No-Code Platform', 'testro' ),
				__( 'Enterprise Ready', 'testro' ),
				__( 'Selenium Alternatives', 'testro' ),
			),
			'actions'     => $demo_actions,
			'breadcrumbs' => true,
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'      => 'why-compare',
			'variant' => 'spotlight',
			'columns' => 3,
			'eyebrow' => __( 'Decision Guide', 'testro' ),
			'title'   => __( 'Why Compare theTestRo?', 'testro' ),
			'intro'   => __( 'Choosing the right test automation platform can have a major impact on development speed, testing coverage, maintenance effort, and software quality. theTestRo combines the capabilities modern teams need in one AI-powered platform.', 'testro' ),
			'items'   => array(
				array(
					'icon'        => 'sparkles',
					'title'       => __( 'AI-Powered Automation', 'testro' ),
					'description' => __( 'Accelerate creation, execution, analysis, and maintenance with intelligent AI-powered test automation.', 'testro' ),
				),
				array(
					'icon'        => 'pen-square',
					'title'       => __( 'No-Code Test Creation', 'testro' ),
					'description' => __( 'Build reliable automated tests without extensive scripting expertise across QA and engineering teams.', 'testro' ),
				),
				array(
					'icon'        => 'server',
					'title'       => __( 'Enterprise Scalability', 'testro' ),
					'description' => __( 'Scale automation from growing teams to complex enterprise programs with governance-ready workflows.', 'testro' ),
				),
				array(
					'icon'        => 'heart-pulse',
					'title'       => __( 'Lower Test Maintenance', 'testro' ),
					'description' => __( 'Reduce brittle script upkeep with self-healing automation that adapts as applications change.', 'testro' ),
				),
				array(
					'icon'        => 'layout-grid',
					'title'       => __( 'Unified Testing Capabilities', 'testro' ),
					'description' => __( 'Cover web, API, and cross-browser testing from one centralized platform instead of fragmented tools.', 'testro' ),
				),
				array(
					'icon'        => 'git-branch',
					'title'       => __( 'Continuous Testing', 'testro' ),
					'description' => __( 'Integrate quality into CI/CD so every build and release is validated with continuous testing.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'      => 'compare-platforms',
			'variant' => 'default',
			'columns' => 3,
			'eyebrow' => __( 'Platform Comparisons', 'testro' ),
			'title'   => __( 'Compare theTestRo with Leading Platforms', 'testro' ),
			'intro'   => __( 'Explore side-by-side comparisons of theTestRo versus popular test automation tools and Selenium alternatives to understand which platform fits your delivery goals.', 'testro' ),
			'items'   => $competitor_items,
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'      => 'why-teams-choose',
			'variant' => 'tint',
			'columns' => 3,
			'eyebrow' => __( 'Platform Advantages', 'testro' ),
			'title'   => __( 'Why Teams Choose theTestRo', 'testro' ),
			'intro'   => __( 'An AI test automation platform designed to help engineering teams automate faster, maintain less, and ship higher-quality software.', 'testro' ),
			'items'   => array(
				array(
					'icon'        => 'sparkles',
					'title'       => __( 'AI-Powered Test Automation', 'testro' ),
					'description' => __( 'Create, execute, analyze, and maintain tests with intelligent AI-powered automation.', 'testro' ),
				),
				array(
					'icon'        => 'pen-square',
					'title'       => __( 'No-Code Test Automation', 'testro' ),
					'description' => __( 'Build automated tests without extensive scripting expertise.', 'testro' ),
				),
				array(
					'icon'        => 'browsers',
					'title'       => __( 'Unified Web, API & Cross-Browser Testing', 'testro' ),
					'description' => __( 'Test multiple application layers from one centralized platform.', 'testro' ),
				),
				array(
					'icon'        => 'heart-pulse',
					'title'       => __( 'Self-Healing Automation', 'testro' ),
					'description' => __( 'Automatically adapt tests to application changes and reduce maintenance effort.', 'testro' ),
				),
				array(
					'icon'        => 'zap',
					'title'       => __( 'Parallel Test Execution', 'testro' ),
					'description' => __( 'Execute multiple tests simultaneously to accelerate testing cycles.', 'testro' ),
				),
				array(
					'icon'        => 'git-branch',
					'title'       => __( 'CI/CD Integration', 'testro' ),
					'description' => __( 'Integrate testing directly into modern development and deployment workflows.', 'testro' ),
				),
				array(
					'icon'        => 'chart-bar',
					'title'       => __( 'Intelligent Reports & Analytics', 'testro' ),
					'description' => __( 'Gain actionable insights into test execution, failures, trends, and release readiness.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/comparison',
		null,
		array(
			'id'      => 'side-by-side',
			'eyebrow' => __( 'Capability Matrix', 'testro' ),
			'title'   => __( 'theTestRo vs Traditional Automation Tools', 'testro' ),
			'intro'   => __( 'A clear test automation tools comparison of AI-powered, no-code capabilities versus traditional automation approaches.', 'testro' ),
			'legacy'  => array(
				'label' => __( 'Traditional Automation Tools', 'testro' ),
				'note'  => __( 'Script-heavy & fragmented', 'testro' ),
			),
			'modern'  => array(
				'label' => __( 'theTestRo', 'testro' ),
				'note'  => __( 'AI + No-Code + Unified', 'testro' ),
			),
			'rows'    => array(
				array(
					'aspect'      => __( 'AI-Powered Automation', 'testro' ),
					'legacy'      => __( 'Limited', 'testro' ),
					'modern'      => __( 'Yes', 'testro' ),
					'legacy_mark' => 'partial',
					'modern_mark' => 'check',
				),
				array(
					'aspect'      => __( 'No-Code Test Creation', 'testro' ),
					'legacy'      => __( 'No', 'testro' ),
					'modern'      => __( 'Yes', 'testro' ),
					'legacy_mark' => 'close',
					'modern_mark' => 'check',
				),
				array(
					'aspect'      => __( 'Self-Healing Tests', 'testro' ),
					'legacy'      => __( 'Limited', 'testro' ),
					'modern'      => __( 'Yes', 'testro' ),
					'legacy_mark' => 'partial',
					'modern_mark' => 'check',
				),
				array(
					'aspect'      => __( 'Web Testing', 'testro' ),
					'legacy'      => __( 'Yes', 'testro' ),
					'modern'      => __( 'Yes', 'testro' ),
					'legacy_mark' => 'check',
					'modern_mark' => 'check',
				),
				array(
					'aspect'      => __( 'API Testing', 'testro' ),
					'legacy'      => __( 'Varies', 'testro' ),
					'modern'      => __( 'Yes', 'testro' ),
					'legacy_mark' => 'partial',
					'modern_mark' => 'check',
				),
				array(
					'aspect'      => __( 'Cross-Browser Testing', 'testro' ),
					'legacy'      => __( 'Varies', 'testro' ),
					'modern'      => __( 'Yes', 'testro' ),
					'legacy_mark' => 'partial',
					'modern_mark' => 'check',
				),
				array(
					'aspect'      => __( 'Parallel Execution', 'testro' ),
					'legacy'      => __( 'Varies', 'testro' ),
					'modern'      => __( 'Yes', 'testro' ),
					'legacy_mark' => 'partial',
					'modern_mark' => 'check',
				),
				array(
					'aspect'      => __( 'CI/CD Integration', 'testro' ),
					'legacy'      => __( 'Varies', 'testro' ),
					'modern'      => __( 'Yes', 'testro' ),
					'legacy_mark' => 'partial',
					'modern_mark' => 'check',
				),
				array(
					'aspect'      => __( 'Enterprise Scalability', 'testro' ),
					'legacy'      => __( 'Depends on tool', 'testro' ),
					'modern'      => __( 'Yes', 'testro' ),
					'legacy_mark' => 'partial',
					'modern_mark' => 'check',
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/outcomes',
		null,
		array(
			'id'      => 'why-customers-switch',
			'variant' => 'spotlight',
			'eyebrow' => __( 'Business Outcomes', 'testro' ),
			'title'   => __( 'Why Customers Switch to theTestRo', 'testro' ),
			'intro'   => __( 'Teams switch from traditional and fragmented automation stacks to accelerate quality without increasing maintenance overhead.', 'testro' ),
			'items'   => array(
				array(
					'icon'  => 'zap',
					'title' => __( 'Faster Test Development', 'testro' ),
				),
				array(
					'icon'  => 'wrench',
					'title' => __( 'Reduced Test Maintenance', 'testro' ),
				),
				array(
					'icon'  => 'layout-grid',
					'title' => __( 'Higher Automation Coverage', 'testro' ),
				),
				array(
					'icon'  => 'rocket',
					'title' => __( 'Faster Release Cycles', 'testro' ),
				),
				array(
					'icon'  => 'shield-check',
					'title' => __( 'Improved Software Quality', 'testro' ),
				),
				array(
					'icon'  => 'coins',
					'title' => __( 'Lower QA Costs', 'testro' ),
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

	get_template_part( 'template-parts/sections/case-studies' );

	get_template_part(
		'template-parts/sections/faq',
		null,
		array(
			'faqs'    => 'compare-tools',
			'eyebrow' => __( 'FAQ', 'testro' ),
			'title'   => __( 'Frequently Asked Questions', 'testro' ),
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'         => 'compare-final-cta',
			'title'      => __( 'Ready to Compare theTestRo?', 'testro' ),
			'intro'      => __( 'See how theTestRo helps engineering teams automate testing faster with AI-powered, no-code automation built for modern software delivery.', 'testro' ),
			'actions'    => $cta_actions,
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
