<?php
/**
 * Template Name: Why theTestRo
 * Description: Why Choose theTestRo landing page.
 *
 * @package TestRo
 */

get_header();

$why_actions = array(
	array(
		'label' => __( 'Start Testing Free', 'testro' ),
		'style' => 'primary',
		'modal' => 'demo-modal',
	),
	array(
		'label' => __( 'Get a Demo', 'testro' ),
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
			'title'       => __( 'Test Smarter and Ship Faster with a No-Code Test Automation Platform', 'testro' ),
			'subtitle'    => __( 'theTestRo is your reliable, no-code test automation platform for web, mobile, and API testing, all from one place. Build tests in plain English, run them at scale, and stop losing time to broken scripts.', 'testro' ),
			'actions'     => $why_actions,
			'breadcrumbs' => true,
		)
	);
	?>

	<section class="testro-prod-section testro-prod-section--tint" id="real-results" aria-labelledby="real-results-heading">
		<div class="testro-container">
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'title'         => __( 'Real Results, Not Just Promises', 'testro' ),
					'heading_id'    => 'real-results-heading',
					'heading_level' => 2,
				)
			);

			$real_results_metrics = array(
				array(
					'value' => '10X',
					'label' => __( 'Faster Test Development', 'testro' ),
					'icon'  => 'zap',
				),
				array(
					'value' => '25M+',
					'label' => __( 'Tests Executed', 'testro' ),
					'icon'  => 'activity',
				),
				array(
					'value' => '70%',
					'label' => __( 'Reduced Testing Effort', 'testro' ),
					'icon'  => 'heart-pulse',
				),
				array(
					'value' => '30%',
					'label' => __( 'Shorter Development Cycle', 'testro' ),
					'icon'  => 'rocket',
				),
			);
			?>
			<ul class="testro-prod-hero__metrics" data-reveal aria-label="<?php esc_attr_e( 'Real results statistics', 'testro' ); ?>">
				<?php foreach ( $real_results_metrics as $metric ) : ?>
					<li class="testro-prod-hero__metric">
						<span class="testro-prod-hero__metric-icon" aria-hidden="true">
							<?php echo testro_icon( $metric['icon'], array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<span class="testro-prod-hero__metric-text">
							<span class="testro-prod-hero__metric-value"><?php echo esc_html( $metric['value'] ); ?></span>
							<span class="testro-prod-hero__metric-label"><?php echo esc_html( $metric['label'] ); ?></span>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<?php
	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'                 => 'why-choose-features',
			'variant'            => 'spotlight',
			'columns'            => 3,
			'title'              => __( 'Why Choose theTestRo?', 'testro' ),
			'card_heading_level' => 3,
			'items'              => array(
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

	get_template_part(
		'template-parts/product/comparison',
		null,
		array(
			'id'            => 'why-different',
			'title'         => __( 'theTestRo vs. Custom Frameworks vs. Other Tools', 'testro' ),
			'heading_level' => 3,
			'text_only'     => true,
			'legacy'        => array(
				'label' => __( 'Custom Frameworks', 'testro' ),
			),
			'middle'        => array(
				'label' => __( 'Other Tools', 'testro' ),
			),
			'modern'        => array(
				'label' => __( 'theTestRo AI Test Automation Platform', 'testro' ),
			),
			'rows'          => array(
				array(
					'aspect' => __( 'Setup Time', 'testro' ),
					'legacy' => __( 'High', 'testro' ),
					'middle' => __( 'Minimal to Moderate', 'testro' ),
					'modern' => __( 'Start Testing in Minutes', 'testro' ),
				),
				array(
					'aspect' => __( 'Scripting Language', 'testro' ),
					'legacy' => __( 'Java, Python, JavaScript, etc.', 'testro' ),
					'middle' => __( 'Visual or Keyword', 'testro' ),
					'modern' => __( 'Plain English', 'testro' ),
				),
				array(
					'aspect' => __( 'Test Creation Effort', 'testro' ),
					'legacy' => __( 'High', 'testro' ),
					'middle' => __( 'Moderate', 'testro' ),
					'modern' => __( 'Build Tests Fast, No Code Needed', 'testro' ),
				),
				array(
					'aspect' => __( 'Maintenance', 'testro' ),
					'legacy' => __( 'High', 'testro' ),
					'middle' => __( 'Requires Updates', 'testro' ),
					'modern' => __( 'Self-Healing, Updates on Its Own', 'testro' ),
				),
				array(
					'aspect' => __( 'Cross-Browser Testing', 'testro' ),
					'legacy' => __( 'Requires Setup', 'testro' ),
					'middle' => __( 'Add-On Integration', 'testro' ),
					'modern' => __( 'Built In From Day One', 'testro' ),
				),
				array(
					'aspect' => __( 'Parallel Testing', 'testro' ),
					'legacy' => __( 'Requires Setup', 'testro' ),
					'middle' => __( 'Add-On Integration', 'testro' ),
					'modern' => __( 'Built In From Day One', 'testro' ),
				),
				array(
					'aspect' => __( 'Scalability', 'testro' ),
					'legacy' => __( 'High Effort', 'testro' ),
					'middle' => __( 'Low', 'testro' ),
					'modern' => __( 'Scales With Your Team, No Extra Work', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'                 => 'real-savings',
			'variant'            => 'default',
			'columns'            => 3,
			'title'              => __( 'Where the Real Savings Show Up', 'testro' ),
			'intro'              => __( 'Faster and Cheaper, Not Just One or the Other', 'testro' ),
			'heading_level'      => 3,
			'card_heading_level' => 4,
			'items'              => array(
				array(
					'icon'        => 'rocket',
					'title'       => __( 'Setup and Ramp-Up', 'testro' ),
					'description' => __( 'Skip the weeks most teams spend just getting a framework running.', 'testro' ),
				),
				array(
					'icon'        => 'pen-square',
					'title'       => __( 'Test Script Development', 'testro' ),
					'description' => __( 'Build tests much faster than hand-scripting.', 'testro' ),
				),
				array(
					'icon'        => 'zap',
					'title'       => __( 'Test Execution', 'testro' ),
					'description' => __( 'Parallel runs cut execution time a lot compared to running tests one by one.', 'testro' ),
				),
				array(
					'icon'        => 'puzzle',
					'title'       => __( 'Framework Development', 'testro' ),
					'description' => __( 'No custom framework to build or own long term.', 'testro' ),
				),
				array(
					'icon'        => 'heart-pulse',
					'title'       => __( 'AI-Driven Maintenance', 'testro' ),
					'description' => __( 'Self-healing tests mean far less time spent patching broken scripts.', 'testro' ),
				),
				array(
					'icon'        => 'file-text',
					'title'       => __( 'Test Planning and Design', 'testro' ),
					'description' => __( 'Plain-English test creation cuts planning time too. Not just scripting time.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'                 => 'enterprise-test-automation',
			'variant'            => 'tint',
			'columns'            => 2,
			'title'              => __( 'Built for Enterprise Test Automation', 'testro' ),
			'intro'              => __( 'Scale That Holds Up Under Real Pressure', 'testro' ),
			'heading_level'      => 3,
			'card_heading_level' => 4,
			'items'              => array(
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

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'why-final-cta',
			'title'         => __( 'Get Started With theTestRo', 'testro' ),
			'intro'         => __( 'Get started with automated testing with theTestRo', 'testro' ),
			'body'          => __( 'theTestRo brings no-code test automation, enterprise-grade scale, and continuous testing together in one AI test automation platform. Build your first test in minutes, and see why teams are making the switch.', 'testro' ),
			'heading_level' => 4,
			'actions'       => $why_actions,
		)
	);
	?>
</div>
<?php
get_footer();
