<?php
/**
 * Template Name: Why theTestRo
 * Description: Why Choose theTestRo landing page.
 *
 * Framer source (read-only): Qc7jNmQghS7yjIB35091
 * Page: /why-thetestro/why-choose-thetestro (CQjJlqtMZ / Desktop dgW3_j1Ef)
 *
 * @package TestRo
 */

get_header();

/*
 * Framer Qc7jNmQghS7yjIB35091 /why-thetestro/why-choose-thetestro (CQjJlqtMZ / dgW3_j1Ef)
 * Section order (skip Navigation): Platform Opening → Trusted Logos Row One → Real Results
 * → Why Choose cards → Compare → Real Savings → Enterprise → Final CTA
 *
 * Hero CTAs (cfxdEXwlg): Start Testing Free = Primary, Book a Demo = Secondary.
 * Final CTA (tZHKgQOg7): Start Testing Free = Secondary, Book a Demo = Primary.
 */
$why_hero_actions = array(
	array(
		'label'      => __( 'Start Testing Free', 'testro' ),
		'style'      => 'primary',
		'modal'      => 'demo-modal',
		'with_arrow' => false,
	),
	array(
		'label'         => __( 'Book a Demo', 'testro' ),
		'style'         => 'secondary',
		'modal'         => 'demo-modal',
		'with_arrow'    => false,
		'allow_on_hero' => true,
	),
);

$why_cta_actions = array(
	array(
		'label'           => __( 'Start Testing Free', 'testro' ),
		'style'           => 'secondary',
		'modal'           => 'demo-modal',
		'with_arrow'      => false,
		'allow_on_footer' => true,
	),
	array(
		'label' => __( 'Book a Demo', 'testro' ),
		'style' => 'primary',
		'modal' => 'demo-modal',
	),
);
?>
<div class="testro-page-shell testro-page-shell--why">
	<?php
	/* Framer cfxdEXwlg — Platform Opening; no breadcrumbs; CTAs Primary + Secondary. */
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Test Smarter and Ship Faster with a No-Code Test Automation Platform', 'testro' ),
			'subtitle'    => __( 'theTestRo is your reliable, no-code test automation platform for web, mobile, and API testing, all from one place. Build tests in plain English, run them at scale, and stop losing time to broken scripts.', 'testro' ),
			'actions'     => $why_hero_actions,
			'breadcrumbs' => false,
		)
	);

	/* Framer oyx6zQLFo — Trusted Logos Row One (marquee review cards). */
	get_template_part( 'template-parts/sections/why-trusted-reviews' );
	?>

	<?php /* Framer Acs1lSScs — brand gradient metrics; no icons. Preserve Framer "developement" spelling. */ ?>
	<section class="testro-prod-section testro-why-results" id="real-results" aria-labelledby="real-results-heading">
		<div class="testro-container">
			<header class="testro-why-results__head" data-reveal>
				<h2 id="real-results-heading" class="testro-why-results__title"><?php esc_html_e( 'Real Results, Not Just Promises', 'testro' ); ?></h2>
				<p class="testro-why-results__intro"><?php esc_html_e( 'Built for Teams Shipping Constantly', 'testro' ); ?></p>
			</header>
			<ul class="testro-why-results__metrics" data-reveal aria-label="<?php esc_attr_e( 'Real results statistics', 'testro' ); ?>">
				<li class="testro-why-results__metric">
					<span class="testro-why-results__value">10X</span>
					<span class="testro-why-results__label"><?php esc_html_e( 'Faster Test Development', 'testro' ); ?></span>
				</li>
				<li class="testro-why-results__metric">
					<span class="testro-why-results__value">25M+</span>
					<span class="testro-why-results__label"><?php esc_html_e( 'Tests Executed', 'testro' ); ?></span>
				</li>
				<li class="testro-why-results__metric">
					<span class="testro-why-results__value">70%</span>
					<span class="testro-why-results__label"><?php esc_html_e( 'Reduced Testing Effort', 'testro' ); ?></span>
				</li>
				<li class="testro-why-results__metric">
					<span class="testro-why-results__value">30%</span>
					<span class="testro-why-results__label"><?php esc_html_e( 'Shorter developement cycle', 'testro' ); ?></span>
				</li>
			</ul>
		</div>
	</section>

	<?php
	/* Framer Fhe6QqoKC — industry cards ×6 on #F4F9FF; equal h≈238; cyan border; fill #F4F9FF. */
	get_template_part(
		'template-parts/product/bf-compose',
		null,
		array(
			'id'            => 'why-choose-features',
			'variant'       => 'feature-cards',
			'card_style'    => 'industry',
			'tint'          => true,
			'card_fill'     => 'tint',
			'columns'       => 3,
			'title'         => __( 'Why Choose theTestRo?', 'testro' ),
			'heading_level' => 2,
			'items'         => array(
				array(
					'icon'        => 'pen-square',
					'title'       => __( 'No-Code Test Automation', 'testro' ),
					'description' => __( 'Build automated tests using plain English. No coding needed, and no one left out. theTestRo mixes the best of both worlds: record and playback for speed, plus natural language for deeper checks.', 'testro' ),
				),
				array(
					'icon'        => 'layout-grid',
					'title'       => __( 'One Unified Platform', 'testro' ),
					'description' => __( 'Plan, build, run, debug, maintain, and report on every test from one place. Web, mobile, and API all covered. Automate functional, UI, regression, and cross-browser testing without switching tools.', 'testro' ),
				),
				array(
					'icon'        => 'browsers',
					'title'       => __( 'Real Devices at Real Scale', 'testro' ),
					'description' => __( 'Run UI and functional tests across thousands of real browsers and devices. Parallel execution means hundreds of tests run at once. Total test time drops a lot.', 'testro' ),
				),
				array(
					'icon'        => 'heart-pulse',
					'title'       => __( 'Self-Healing Tests', 'testro' ),
					'description' => __( "theTestRo adjusts on its own when small elements shift. A minor UI change doesn't break your suite. Something does need attention? Affected tests get flagged right away.", 'testro' ),
				),
				array(
					'icon'        => 'shield-check',
					'title'       => __( 'Full Regression Coverage', 'testro' ),
					'description' => __( 'Combine functional, UI, and API tests to reach real regression coverage. Automate full user stories so every feature actually gets tested. Not just the easy parts.', 'testro' ),
				),
				array(
					'icon'        => 'database',
					'title'       => __( 'Data-Driven Testing', 'testro' ),
					'description' => __( 'Use dynamic parameters for input values. Store data as plain text, runtime variables, or random values. Reuse it across test runs without rebuilding tests each time.', 'testro' ),
				),
			),
		)
	);

	/* Framer CwcalJw13 — Tool Comparison (Custom Frameworks | Other Tools). */
	get_template_part(
		'template-parts/product/comparison',
		null,
		array(
			'id'            => 'why-different',
			'variant'       => 'why-gradient',
			'title'         => __( 'theTestRo vs. Custom Frameworks vs. Other Tools', 'testro' ),
			'heading_level' => 2,
			'align'         => 'start',
			'text_only'     => true,
			'first_label'   => '',
			'legacy'        => array(
				'label' => __( 'Custom Frameworks', 'testro' ),
			),
			'middle'        => array(
				'label' => __( 'Other Tools', 'testro' ),
			),
			'modern'        => array(),
			'rows'          => array(
				array(
					'aspect' => __( 'Setup Time', 'testro' ),
					'legacy' => __( 'High', 'testro' ),
					'middle' => __( 'Minimal to Moderate', 'testro' ),
				),
				array(
					'aspect' => __( 'Scripting Language', 'testro' ),
					'legacy' => __( 'Java, Python, JavaScript, etc.', 'testro' ),
					'middle' => __( 'Visual or Keyword', 'testro' ),
				),
				array(
					'aspect' => __( 'Test Creation Effort', 'testro' ),
					'legacy' => __( 'High', 'testro' ),
					'middle' => __( 'Moderate', 'testro' ),
				),
				array(
					'aspect' => __( 'Maintenance', 'testro' ),
					'legacy' => __( 'High', 'testro' ),
					'middle' => __( 'Requires Updates', 'testro' ),
				),
				array(
					'aspect' => __( 'Cross-Browser Testing', 'testro' ),
					'legacy' => __( 'Requires Setup', 'testro' ),
					'middle' => __( 'Add-On Integration', 'testro' ),
				),
				array(
					'aspect' => __( 'Parallel Testing', 'testro' ),
					'legacy' => __( 'Requires Setup', 'testro' ),
					'middle' => __( 'Add-On Integration', 'testro' ),
				),
				array(
					'aspect' => __( 'Scalability', 'testro' ),
					'legacy' => __( 'High Effort', 'testro' ),
					'middle' => __( 'Low', 'testro' ),
				),
			),
		)
	);

	/* Framer zBWLD349I — exec-split; QI numbered rows (AI Quality Intelligence left rail). */
	get_template_part(
		'template-parts/product/bf-compose',
		null,
		array(
			'id'            => 'real-savings',
			'variant'       => 'exec-split',
			'tint'          => true,
			'steps_style'   => 'numbered-rows',
			'title'         => __( 'Where the Real Savings Show Up', 'testro' ),
			'intro'         => __( 'Faster and Cheaper, Not Just One or the Other', 'testro' ),
			'heading_level' => 2,
			'items'         => array(
				array(
					'stage'       => '01',
					'title'       => __( 'Setup and Ramp-Up', 'testro' ),
					'description' => __( 'Skip the weeks most teams spend just getting a framework running.', 'testro' ),
				),
				array(
					'stage'       => '02',
					'title'       => __( 'Test Script Development', 'testro' ),
					'description' => __( 'Build tests much faster than hand-scripting.', 'testro' ),
				),
				array(
					'stage'       => '03',
					'title'       => __( 'Test Execution', 'testro' ),
					'description' => __( 'Parallel runs cut execution time a lot compared to running tests one by one.', 'testro' ),
				),
				array(
					'stage'       => '03',
					'title'       => __( 'Framework Development', 'testro' ),
					'description' => __( 'No custom framework to build or own long term.', 'testro' ),
				),
				array(
					'stage'       => '03',
					'title'       => __( 'AI-Driven Maintenance', 'testro' ),
					'description' => __( 'Self-healing tests mean far less time spent patching broken scripts.', 'testro' ),
				),
				array(
					'stage'       => '03',
					'title'       => __( 'Test Planning and Design', 'testro' ),
					'description' => __( 'Plain-English test creation cuts planning time too. Not just scripting time.', 'testro' ),
				),
			),
		)
	);

	/* Framer URHjZ8H1R — white section; 2×2 industry cards fill #F4F9FF cyan border. */
	get_template_part(
		'template-parts/product/bf-compose',
		null,
		array(
			'id'            => 'enterprise-test-automation',
			'variant'       => 'feature-cards',
			'card_style'    => 'industry',
			'white'         => true,
			'card_fill'     => 'tint',
			'columns'       => 2,
			'title'         => __( 'Built for Enterprise Test Automation', 'testro' ),
			'intro'         => __( 'Scale That Holds Up Under Real Pressure', 'testro' ),
			'heading_level' => 2,
			'items'         => array(
				array(
					'icon'        => 'user-check',
					'title'       => __( 'Cross-Team Collaboration', 'testro' ),
					'description' => __( 'Give QA, developers, and business users the same platform. Not separate siloed tools.', 'testro' ),
				),
				array(
					'icon'        => 'shield-check',
					'title'       => __( 'Role-Based Access', 'testro' ),
					'description' => __( 'Control who can build, edit, and approve tests as your org grows.', 'testro' ),
				),
				array(
					'icon'        => 'git-branch',
					'title'       => __( 'CI/CD Integration', 'testro' ),
					'description' => __( 'Connect to Jenkins, GitHub Actions, Azure DevOps, and GitLab. Testing runs right inside your pipeline.', 'testro' ),
				),
				array(
					'icon'        => 'file-text',
					'title'       => __( 'Audit-Ready Reporting', 'testro' ),
					'description' => __( 'Clear links between requirements, tests, and results back up compliance reviews. No extra work needed.', 'testro' ),
				),
			),
		)
	);

	/* Framer tZHKgQOg7 — brand Final CTA; single heading (no eyebrow); Secondary then Primary. */
	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'why-final-cta',
			'variant'       => 'brand',
			'title'         => '',
			'intro'         => __( 'Get started with automated testing with theTestRo', 'testro' ),
			'body'          => __( 'theTestRo brings no-code test automation, enterprise-grade scale, and continuous testing together in one AI test automation platform. Build your first test in minutes, and see why teams are making the switch.', 'testro' ),
			'heading_level' => 2,
			'actions'       => $why_cta_actions,
		)
	);
	?>
</div>
<?php
get_footer();
