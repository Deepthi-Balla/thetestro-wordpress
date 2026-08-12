<?php
/**
 * Product landing page content registry.
 *
 * Each entry is a data-only description of a product page. The generic
 * `page-templates/template-product.php` walks the `sections` list and renders
 * the matching reusable component, so a new product page is a data addition
 * rather than a new template.
 *
 * Section `type` maps to `template-parts/product/{type}.php`, except for the
 * shared marketing sections listed in testro_product_shared_sections().
 *
 * Product section types: feature-grid, pipeline, bento (flat items or
 * grouped capability areas), browsers, healing, visual-diff,
 * request-response (API or visual→code export), architecture, analytics,
 * lifecycle, comparison, outcomes, usecases, kanban, traceability, cta.
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Section types that reuse existing site-wide sections instead of a product part.
 *
 * @return array<string, string> Section type => template part path.
 */
function testro_product_shared_sections() {
	return array(
		'stats'        => 'template-parts/sections/stats',
		'clients'      => 'template-parts/sections/clients',
		'testimonials' => 'template-parts/sections/testimonials',
		'faq'          => 'template-parts/sections/faq',
		'contact'      => 'template-parts/sections/contact',
	);
}

/**
 * Standard conversion actions shared by every product page.
 *
 * Both actions open the shared demo dialog, which is the site's single
 * qualified-lead entry point.
 *
 * @return array[]
 */
function testro_product_default_actions() {
	return array(
		array(
			'label'   => __( 'Start Free Trial', 'testro' ),
			'style'   => 'primary',
			'modal'   => 'demo-modal',
		),
		array(
			'label'   => __( 'Schedule a Demo', 'testro' ),
			'style'   => 'outline',
			'modal'   => 'demo-modal',
			'icon'    => 'arrow-right',
		),
	);
}

/**
 * All registered product pages keyed by page slug.
 *
 * @return array<string, array<string, mixed>>
 */
function testro_get_product_pages() {
	$pages = array(
		'ai-test-automation' => array(
			'slug' => 'ai-test-automation',
			'seo'  => array(
				'title'       => __( 'AI Test Automation Platform for Intelligent Software Testing', 'testro' ),
				'description' => __( 'Accelerate software testing with theTestRo\'s AI test automation platform. Create, execute, and maintain AI-powered automated tests with speed and accuracy.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Test Smarter with an AI Test Automation Platform', 'testro' ),
				'subtitle' => __( 'Built for modern software teams. theTestRo is an AI test automation platform that writes, runs, and heals your tests. Ship faster. Catch more bugs. Spend less time on manual fixes.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Schedule a Demo', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
						'icon'  => 'arrow-right',
					),
				),
			),

			'sections' => array(

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-native-automation',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'AI-Native Test Automation', 'testro' ),
					'intro'         => __( 'theTestRo is AI-native. AI sits at the core of every test. It\'s not bolted on as an extra. This is real AI software testing, not automation with an AI label stuck on top.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Natural Language Test Authoring', 'testro' ),
							'description' => __( 'Type a test in plain English. AI turns it into a working test in seconds.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI-Driven Test Generation', 'testro' ),
							'description' => __( 'AI studies your app and your past tests. Then it builds new test cases on its own.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Human-in-the-Loop Validation', 'testro' ),
							'description' => __( 'AI proposes each step. Your team checks and approves it. You stay in control.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'intelligent-automation-engine',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Intelligent Automation Engine', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'AI Test Authoring', 'testro' ),
							'description' => __( 'Build tests by recording, typing a prompt, or writing plain steps.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Intelligent Object Recognition', 'testro' ),
							'description' => __( 'AI finds buttons and fields the way a real user would.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Automation', 'testro' ),
							'description' => __( 'Your UI changes. AI fixes the test. No manual work needed.', 'testro' ),
						),
						array(
							'icon'        => 'crosshair',
							'title'       => __( 'Dynamic Locator Intelligence', 'testro' ),
							'description' => __( 'AI tracks more than one way to find each element. One small change won\'t break your test.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'AI Test Data Generation', 'testro' ),
							'description' => __( 'Get realistic names, dates, and addresses in seconds. No setup required.', 'testro' ),
						),
						array(
							'icon'        => 'stethoscope',
							'title'       => __( 'AI Root Cause Analysis', 'testro' ),
							'description' => __( 'A test fails. AI tells you why, fast. No digging through logs.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-test-execution',
					'variant'       => 'brand',
					'columns'       => 3,
					'title'         => __( 'Enterprise Test Execution', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Parallel Execution Engine', 'testro' ),
							'description' => __( 'Run thousands of tests at once, in the cloud.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser & Cross-Platform Execution', 'testro' ),
							'description' => __( 'Test every browser, OS, and device combo.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API + UI + End-to-End Test Automation', 'testro' ),
							'description' => __( 'Cover your whole stack. One platform, not five tools.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Continuous Test Orchestration', 'testro' ),
							'description' => __( 'Schedule and trigger test runs on autopilot.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Cloud-Native Execution', 'testro' ),
							'description' => __( 'No servers to manage. Scale up or down, anytime.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'lifecycle',
					'id'            => 'autonomous-test-lifecycle',
					'title'         => __( 'Autonomous Test Lifecycle', 'testro' ),
					'intro'         => __( 'theTestRo manages the full test lifecycle, start to finish:', 'testro' ),
					'heading_level' => 3,
					'loop_note'     => '',
					'items'         => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Generate Test Cases', 'testro' ),
							'description' => __( 'AI builds tests from your requirements and user flows.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Execute at Scale', 'testro' ),
							'description' => __( 'Run tests in parallel, across every browser and device.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Detect Failures', 'testro' ),
							'description' => __( 'AI flags failed steps the moment they happen.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Analyze Root Cause', 'testro' ),
							'description' => __( 'AI explains why a test failed, not just that it did.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Self-Heal Tests', 'testro' ),
							'description' => __( 'AI fixes broken tests on its own. Your suite stays green.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Continuous Optimization', 'testro' ),
							'description' => __( 'AI learns from every run. Test accuracy improves over time.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'analytics',
					'id'            => 'quality-intelligence',
					'title'         => __( 'AI-Powered Quality Intelligence', 'testro' ),
					'intro'         => __( 'Turn Test Results Into Real Insight', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Smart Failure Classification', 'testro' ),
							'description' => __( 'AI sorts failures into real bugs, flaky tests, or setup issues.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Execution Insights', 'testro' ),
							'description' => __( 'See trends across every test run, in one clear view.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Test Health Analytics', 'testro' ),
							'description' => __( 'Know which tests are stable and which need attention.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Risk-Based Prioritization', 'testro' ),
							'description' => __( 'AI points you to the tests that matter most.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Release Readiness Dashboard', 'testro' ),
							'description' => __( 'Know in seconds if your build is safe to ship.', 'testro' ),
						),
					),
					'dashboard'     => array(
						'label'     => __( 'Release readiness', 'testro' ),
						'score'     => 96,
						'status'    => __( 'Ready to ship', 'testro' ),
						'build'     => __( 'Build #2481 · main', 'testro' ),
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '98.4%',
								'trend' => __( '+2.1 pts', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Self-healed steps', 'testro' ),
								'value' => '312',
								'trend' => __( 'No manual fixes', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Avg. suite duration', 'testro' ),
								'value' => '4m 12s',
								'trend' => __( '−38% vs. last month', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Flaky tests', 'testro' ),
								'value' => '0.6%',
								'trend' => __( '−4.3 pts', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Last 7 executions', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 62,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 74,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 58,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 83,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 91,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 78,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 96,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'Product defects', 'testro' ),
								'value' => 12,
								'tone'  => 'critical',
							),
							array(
								'label' => __( 'Environment issues', 'testro' ),
								'value' => 5,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Auto-resolved by AI', 'testro' ),
								'value' => 83,
								'tone'  => 'healthy',
							),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'architecture',
					'id'            => 'enterprise-architecture',
					'title'         => __( 'Enterprise Automation Architecture', 'testro' ),
					'intro'         => __( 'Built for Scale and Security', 'testro' ),
					'heading_level' => 4,
					'hub'           => array(
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'AI automation core', 'testro' ),
						'icon'  => 'sparkles',
					),
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Unified Test Platform', 'testro' ),
							'description' => __( 'Manage every test type in one place, not scattered tools.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Scalable Test Repository', 'testro' ),
							'description' => __( 'Store and organize thousands of tests with no slowdown.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Reusable Test Components', 'testro' ),
							'description' => __( 'Build once, use everywhere. Cut duplicate work.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Environment Management', 'testro' ),
							'description' => __( 'Test across dev, staging, and production with ease.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Secure Enterprise Infrastructure', 'testro' ),
							'description' => __( 'Built with enterprise-grade security in mind.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'pipeline',
					'id'            => 'devops-continuous-quality',
					'title'         => __( 'DevOps & Continuous Quality', 'testro' ),
					'intro'         => __( 'Fits Right Into Your DevOps Flow', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'infinity',
							'stage'       => __( 'Build', 'testro' ),
							'title'       => __( 'CI/CD Pipeline Integration', 'testro' ),
							'description' => __( 'Connects with Jenkins, GitHub Actions, GitLab, and Azure DevOps.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Commit', 'testro' ),
							'title'       => __( 'Git-Based Workflows', 'testro' ),
							'description' => __( 'Version-control your tests, just like your code.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'stage'       => __( 'Trigger', 'testro' ),
							'title'       => __( 'Scheduled & Trigger-Based Execution', 'testro' ),
							'description' => __( 'Run tests on a schedule, or the second new code lands.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'stage'       => __( 'Gate', 'testro' ),
							'title'       => __( 'Quality Gates', 'testro' ),
							'description' => __( 'Block risky releases automatically when tests fail.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'stage'       => __( 'Feedback', 'testro' ),
							'title'       => __( 'Continuous Feedback Loop', 'testro' ),
							'description' => __( 'Get instant results your whole team can see.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'comparison',
					'id'            => 'ai-vs-legacy',
					'title'         => __( 'Why AI-Native Automation Outperforms Legacy Frameworks', 'testro' ),
					'intro'         => __( 'theTestRo vs. Old-School Frameworks', 'testro' ),
					'heading_level' => 4,
					'legacy'        => array(
						'label' => __( 'Legacy Frameworks', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'theTestRo', 'testro' ),
					),
					'rows'          => array(
						array(
							'legacy' => __( 'Heavy scripts, slow to build', 'testro' ),
							'modern' => __( 'Plain-English test creation', 'testro' ),
						),
						array(
							'legacy' => __( 'Manual upkeep', 'testro' ),
							'modern' => __( 'Tests that update themselves', 'testro' ),
						),
						array(
							'legacy' => __( 'Breaks on every UI change', 'testro' ),
							'modern' => __( 'Tests that heal on their own', 'testro' ),
						),
						array(
							'legacy' => __( 'Slower runs', 'testro' ),
							'modern' => __( 'Faster runs at scale', 'testro' ),
						),
						array(
							'legacy' => __( 'High maintenance cost', 'testro' ),
							'modern' => __( 'Low maintenance cost', 'testro' ),
						),
						array(
							'legacy' => __( 'Flaky, unstable tests', 'testro' ),
							'modern' => __( 'Stable, reliable tests', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'enterprise-outcomes',
					'title'         => __( 'Enterprise Outcomes', 'testro' ),
					'intro'         => __( 'What Teams Gain with theTestRo', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Software Delivery', 'testro' ),
							'description' => __( 'Ship releases in days, not weeks.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Reduced Maintenance', 'testro' ),
							'description' => __( 'Spend less time fixing tests. Spend more time building.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Improved Test Stability', 'testro' ),
							'description' => __( 'Fewer flaky failures. More trust in every result.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Increased Coverage', 'testro' ),
							'description' => __( 'Test more of your app, with less manual work.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Lower QA Costs', 'testro' ),
							'description' => __( 'Do more with a smaller team.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Faster Digital Transformation', 'testro' ),
							'description' => __( 'Move fast on new projects, backed by solid testing.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'ai-test-automation',
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'cta',
					'id'            => 'get-started',
					'title'         => __( 'Final CTA', 'testro' ),
					'intro'         => __( 'Ready to Modernize Testing with AI?', 'testro' ),
					'body'          => __( 'Join QA teams already using theTestRo to ship faster, catch more bugs, and cut manual work.', 'testro' ),
					'heading_level' => 5,
					'actions'       => testro_product_default_actions(),
				),
			),
		),

		'no-code-test-automation' => array(
			'slug' => 'no-code-test-automation',
			'seo'  => array(
				'title'       => __( 'Best No-Code Test Automation Tool for Faster Testing', 'testro' ),
				'description' => __( 'Discover the best no-code test automation tool to create, execute, and maintain automated tests without coding. Accelerate software testing with theTestRo.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best No-Code Test Automation Tool', 'testro' ),
				'subtitle' => __( 'theTestRo is the best no-code test automation tool for teams who want speed without scripts. Record your actions or type plain steps. Get a working test in minutes, with zero code.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'pipeline',
					'id'            => 'how-it-works',
					'title'         => __( 'How It Works', 'testro' ),
					'intro'         => __( 'Say goodbye to scripts and syntax errors. Record your actions in a real browser, or type steps in plain English. Either way, you get a working test fast — and you don\'t need a developer standing by to explain what went wrong.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'activity',
							'stage'       => __( 'Record', 'testro' ),
							'title'       => __( 'Record Your Actions', 'testro' ),
							'description' => __( 'Click through your app like a real user. Every step gets captured automatically.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'stage'       => __( 'Run', 'testro' ),
							'title'       => __( 'Run Anywhere, Anytime', 'testro' ),
							'description' => __( 'Schedule runs, trigger them after every deploy, or start one on demand.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Start', 'testro' ),
							'title'       => __( 'No Setup Required', 'testro' ),
							'description' => __( 'Test right in your browser. No installs. No config files. No hassle.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'key-features',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Key Features', 'testro' ),
					'intro'         => __( 'theTestRo covers the essentials any strong codeless testing platform needs, plus a few extras most tools skip.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Fast Test Creation', 'testro' ),
							'description' => __( 'Turn real actions into a repeatable test in seconds.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Easy Maintenance', 'testro' ),
							'description' => __( 'Smart selectors keep your tests working, even as your app changes.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Painless CI Integration', 'testro' ),
							'description' => __( 'Connect to Jenkins, GitHub Actions, and CircleCI right out of the box.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Powerful Debugging Tools', 'testro' ),
							'description' => __( 'Every run comes with video, logs, and a step-by-step replay.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Coverage', 'testro' ),
							'description' => __( 'Run the same test across Chrome, Firefox, Safari, and Edge without extra setup.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'ai-backed-authoring',
					'variant'       => 'tint',
					'title'         => __( 'Plain-English, AI-Backed Authoring', 'testro' ),
					'intro'         => __( 'This isn\'t basic record-and-playback. theTestRo is AI no-code test automation at its core. It understands real apps, not just clicks.', 'testro' ),
					'intro_extra'   => __( 'That difference matters once your app goes beyond simple flows. It includes logins with multi-factor codes. It includes dynamic pricing tables. It also includes forms that change based on what users pick.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain English Steps', 'testro' ),
							'description' => __( 'Write "Log in with a valid email." The platform builds the working test for you.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'BDD Support', 'testro' ),
							'description' => __( 'Paste Behavior-Driven Development steps and get instant automation.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Smart Object Recognition', 'testro' ),
							'description' => __( 'AI finds buttons and fields even when your page layout shifts around.', 'testro' ),
						),
					),
					'outro'         => __( 'Skipping code shouldn\'t mean losing power. theTestRo gives non-technical testers the same depth a full engineering team used to need.', 'testro' ),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'built-to-stay-green',
					'variant'       => 'tint',
					'title'         => __( 'Built to Stay Green', 'testro' ),
					'intro'         => __( 'A common worry with any codeless test automation platform is upkeep. theTestRo handles this with a few smart defaults, so tests stay stable over time:', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'crosshair',
							'title'       => __( 'Multiple Backup Selectors', 'testro' ),
							'description' => __( 'Each step gets more than one way to find an element. A small design tweak won\'t break your test.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Built-In Auto-Retries', 'testro' ),
							'description' => __( 'Flaky steps get a second try automatically, instead of failing right away.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Smart Waits', 'testro' ),
							'description' => __( 'Tests wait for key background calls to finish before moving forward. Fewer false failures, less noise.', 'testro' ),
						),
					),
					'outro'         => __( 'This is scriptless test automation built to last, not just built to launch fast.', 'testro' ),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'who-its-for',
					'variant'       => 'tint',
					'title'         => __( 'Who It\'s For', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Manual Testers', 'testro' ),
							'description' => __( 'Turn your existing test cases into automated ones. No coding course needed.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'QA Teams', 'testro' ),
							'description' => __( 'Free up your automation engineers for the hard problems. Let the whole team help with testing.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Product Managers', 'testro' ),
							'description' => __( 'Check new features yourself, without waiting on engineering.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Small Teams & Startups', 'testro' ),
							'description' => __( 'Get real test coverage without hiring a full automation team.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'QA Leads & Managers', 'testro' ),
							'description' => __( 'Roll out a repeatable, no-code software testing process across every team, without months of training.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Growing Engineering Orgs', 'testro' ),
							'description' => __( 'Add test coverage as fast as you ship new features. Do it without hiring a new tester for each one.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'comparison',
					'id'            => 'scripted-tools-vs-thetestro',
					'title'         => __( 'Scripted Tools vs. theTestRo', 'testro' ),
					'intro'         => __( 'Why More Teams Are Going Scriptless', 'testro' ),
					'heading_level' => 4,
					'legacy'        => array(
						'label' => __( 'Code-Based Tools (Selenium, Cypress)', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'theTestRo', 'testro' ),
					),
					'rows'          => array(
						array(
							'legacy' => __( 'Needs dedicated automation engineers', 'testro' ),
							'modern' => __( 'Anyone on the team can build a test', 'testro' ),
						),
						array(
							'legacy' => __( 'Manual selector writing', 'testro' ),
							'modern' => __( 'Selectors update on their own', 'testro' ),
						),
						array(
							'legacy' => __( 'Slow ramp-up time', 'testro' ),
							'modern' => __( 'Live in minutes, not weeks', 'testro' ),
						),
						array(
							'legacy' => __( 'Pulls developers off feature work', 'testro' ),
							'modern' => __( 'Frees developers to build, not maintain tests', 'testro' ),
						),
						array(
							'legacy' => __( 'Steep learning curve', 'testro' ),
							'modern' => __( 'No coding skills needed at all', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'architecture',
					'id'            => 'integrations',
					'title'         => __( 'Integrations', 'testro' ),
					'heading_level' => 4,
					'hub'           => array(
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'No-code automation hub', 'testro' ),
						'icon'  => 'sparkles',
					),
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub Integration', 'testro' ),
							'description' => __( 'Run tests on every pull request, automatically.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'CI/CD Integrations', 'testro' ),
							'description' => __( 'Works with Jenkins, CircleCI, GitLab, and Azure DevOps out of the box.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Jira Integration', 'testro' ),
							'description' => __( 'One-click bug reports, with video, logs, and repro steps included.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack Integration', 'testro' ),
							'description' => __( 'Get alerts right in the channels your team already checks.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'analytics',
					'id'            => 'visual-reports-dashboards',
					'title'         => __( 'Visual Reports & Dashboards', 'testro' ),
					'intro'         => __( 'Raw test data turns into results your whole team can read at a glance. Track pass rates, spot flaky runs, and see exactly which step failed and why — all from one clean dashboard. No spreadsheets. No digging through raw logs to find the one line that matters.', 'testro' ),
					'heading_level' => 4,
					'dashboard'     => array(
						'label'     => __( 'Release readiness', 'testro' ),
						'score'     => 96,
						'status'    => __( 'Ready to ship', 'testro' ),
						'build'     => __( 'Build #2481 · main', 'testro' ),
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '98.4%',
								'trend' => __( '+2.1 pts', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Self-healed steps', 'testro' ),
								'value' => '312',
								'trend' => __( 'No manual fixes', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Avg. suite duration', 'testro' ),
								'value' => '4m 12s',
								'trend' => __( '−38% vs. last month', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Flaky tests', 'testro' ),
								'value' => '0.6%',
								'trend' => __( '−4.3 pts', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Last 7 executions', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 62,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 74,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 58,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 83,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 91,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 78,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 96,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'Product defects', 'testro' ),
								'value' => 12,
								'tone'  => 'critical',
							),
							array(
								'label' => __( 'Environment issues', 'testro' ),
								'value' => 5,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Auto-resolved by AI', 'testro' ),
								'value' => 83,
								'tone'  => 'healthy',
							),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'no-code-test-automation',
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'cta',
					'id'            => 'get-started-nocode',
					'title'         => __( 'Final CTA', 'testro' ),
					'intro'         => __( 'Start Testing Without Writing a Single Line of Code', 'testro' ),
					'body'          => __( 'Join teams who ship faster with theTestRo. No scripts. No engineers required. Just faster, more reliable releases — built by the people who already know your product best.', 'testro' ),
					'heading_level' => 5,
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
				),
			),
		),

		'automated-web-application-testing' => array(
			'slug' => 'automated-web-application-testing',
			'seo'  => array(
				'title'       => __( 'Best Web Testing Tool for Fast & Reliable Automation', 'testro' ),
				'description' => __( 'Automate web application testing with theTestRo\'s best web testing tool. Execute reliable cross-browser tests and accelerate software delivery with confidence.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best Web Testing Tool for Automated Web Application Testing', 'testro' ),
				'subtitle' => __( 'theTestRo is a web testing tool built for real user journeys, not just clicks. Write tests in plain English. Run them across every browser. Let AI catch what breaks, before your users do. This is automated web testing built to keep pace with how fast your team ships.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'build-reliable-web-tests',
					'variant'       => 'spotlight',
					'title'         => __( 'Build Reliable Web Tests Faster', 'testro' ),
					'intro'         => __( 'Stop losing sprint days to test scripts and syntax errors. theTestRo turns your stories, page flows, or plain-English steps into a working test in minutes, not days. Update any step by typing a new sentence. No code. No rebuild.', 'testro' ),
					'intro_extra'   => __( 'This kind of web application test automation means your team spends less time maintaining tests and more time building features.', 'testro' ),
					'heading_level' => 2,
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'test-every-user-journey',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Test Every User Journey', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'User Flows', 'testro' ),
							'description' => __( 'Cover logins, sign-ups, search, and checkout, the paths your users take every day.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Business Workflows', 'testro' ),
							'description' => __( 'Test multi-step processes like approvals, payments, and order tracking, start to finish.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Critical Paths', 'testro' ),
							'description' => __( 'Protect the exact flows that drive revenue, so a bad release never slips through.', 'testro' ),
						),
					),
					'outro'         => __( 'A single missed step in a checkout flow can cost real money. theTestRo\'s web test automation is built to catch that kind of gap before it reaches production, not after a customer reports it.', 'testro' ),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-web-test-authoring',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'AI-Powered Web Test Authoring', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Natural Language Test Creation', 'testro' ),
							'description' => __( 'Type "Log in and add an item to the cart." Get a working test back in seconds.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI Test Generation', 'testro' ),
							'description' => __( 'Turn a user story, PRD, or design file into a full test. Edge cases included.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Visual Test Builder', 'testro' ),
							'description' => __( 'Prefer to see it? Build and edit tests by clicking through your app directly.', 'testro' ),
						),
					),
					'outro'         => __( 'theTestRo brings real AI web testing to every step, not just the first draft. It keeps learning from every test run.', 'testro' ),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'browsers',
					'id'            => 'execute-across-browsers',
					'title'         => __( 'Execute Tests Across Every Browser', 'testro' ),
					'intro'         => __( 'Run the same web test across every browser your users actually use:', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'name'     => __( 'Chrome', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 78,
							'tone'     => 'running',
						),
						array(
							'name'     => __( 'Edge', 'testro' ),
							'status'   => __( 'Passed', 'testro' ),
							'progress' => 100,
							'tone'     => 'passed',
						),
						array(
							'name'     => __( 'Firefox', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 64,
							'tone'     => 'running',
						),
						array(
							'name'     => __( 'Safari', 'testro' ),
							'status'   => __( 'Visual check', 'testro' ),
							'progress' => 91,
							'tone'     => 'visual',
						),
					),
					'parallel'      => array(
						'title'       => __( 'Parallel Execution', 'testro' ),
						'description' => __( 'Run thousands of tests at once, so a full regression suite finishes in minutes, not hours.', 'testro' ),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'healing',
					'id'            => 'intelligent-web-maintenance',
					'title'         => __( 'Intelligent Web Test Maintenance', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Locators', 'testro' ),
							'description' => __( 'Your page structure shifts. theTestRo finds the right element on its own.', 'testro' ),
						),
						array(
							'icon'        => 'crosshair',
							'title'       => __( 'Dynamic Element Detection', 'testro' ),
							'description' => __( 'Handles dropdowns, pop-ups, and content that loads after the page does.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Automatic Test Updates', 'testro' ),
							'description' => __( 'Tests adjust to small UI changes. No failing. No waiting on a fix.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'validate-ui-changes',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'Validate Every UI Change', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'UI Validation', 'testro' ),
							'description' => __( 'Confirm buttons, forms, and menus all work as designed, on every release.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Visual Regression Testing', 'testro' ),
							'description' => __( 'Catch layout shifts and broken styles before a user ever sees them.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Layout Verification', 'testro' ),
							'description' => __( 'Compare screenshots across builds. Spot changes that shouldn\'t be there.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Responsive Testing', 'testro' ),
							'description' => __( 'Check your site across screen sizes, from desktop down to mobile.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'debug-failures-faster',
					'variant'       => 'brand',
					'columns'       => 4,
					'title'         => __( 'Debug Test Failures Faster', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Screenshots', 'testro' ),
							'description' => __( 'See the exact moment a test failed, no guesswork needed.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Video Recording', 'testro' ),
							'description' => __( 'Watch a full replay of the run, step by step.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Execution Logs', 'testro' ),
							'description' => __( 'Dig into console and network activity behind every test.', 'testro' ),
						),
						array(
							'icon'        => 'stethoscope',
							'title'       => __( 'Root Cause Analysis', 'testro' ),
							'description' => __( 'AI tells you whether it\'s a real bug, a flaky step, or an environment issue.', 'testro' ),
						),
					),
					'outro'         => __( 'No more digging through a 500-test suite to find the one line that matters. theTestRo surfaces it for you.', 'testro' ),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'architecture',
					'id'            => 'scale-web-testing-cicd',
					'title'         => __( 'Scale Web Testing in CI/CD', 'testro' ),
					'heading_level' => 4,
					'hub'           => array(
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Web testing hub', 'testro' ),
						'icon'  => 'sparkles',
					),
					'items'         => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => '',
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub Actions', 'testro' ),
							'description' => '',
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => '',
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'GitLab', 'testro' ),
							'description' => '',
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Webhooks', 'testro' ),
							'description' => __( 'Trigger a test run the moment new code lands, no extra setup required.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'analytics',
					'id'            => 'web-testing-analytics',
					'title'         => __( 'Web Testing Analytics', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Test Reports', 'testro' ),
							'description' => __( 'Clear, shareable summaries after every run.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Historical Trends', 'testro' ),
							'description' => __( 'See how pass rates and stability shift release over release.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Execution Metrics', 'testro' ),
							'description' => __( 'Track run time, flaky rate, and coverage in one place.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Dashboard', 'testro' ),
							'description' => __( 'One view for your whole team to check before every ship.', 'testro' ),
						),
					),
					'dashboard'     => array(
						'label'     => __( 'Web release readiness', 'testro' ),
						'score'     => 97,
						'status'    => __( 'Ready to ship', 'testro' ),
						'build'     => __( 'Build #3120 · main', 'testro' ),
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '99.1%',
								'trend' => __( '+1.4 pts', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Browsers green', 'testro' ),
								'value' => '4/4',
								'trend' => __( 'All major', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Self-healed', 'testro' ),
								'value' => '186',
								'trend' => __( 'No manual fixes', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Suite duration', 'testro' ),
								'value' => '3m 48s',
								'trend' => __( '−41% parallel', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Last 7 web runs', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 71,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 84,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 69,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 88,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 93,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 81,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 97,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'UI defects', 'testro' ),
								'value' => 8,
								'tone'  => 'critical',
							),
							array(
								'label' => __( 'Browser quirks', 'testro' ),
								'value' => 4,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Auto-healed', 'testro' ),
								'value' => 186,
								'tone'  => 'healthy',
							),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-ready-web',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Enterprise-Ready Web Testing', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Team Collaboration', 'testro' ),
							'description' => __( 'Share tests, results, and notes across your whole QA team.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Role-Based Access', 'testro' ),
							'description' => __( 'Control who can edit, run, or approve a test.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Security', 'testro' ),
							'description' => __( 'Built with strong data protection in mind, at every step.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Cloud Execution', 'testro' ),
							'description' => __( 'Run at scale. No servers to set up or manage yourself.', 'testro' ),
						),
					),
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'supported-browsers-platforms',
					'variant'       => 'tint',
					'title'         => __( 'Supported Browsers & Platforms', 'testro' ),
					'intro'         => __( 'theTestRo covers every major browser and system your users touch. That includes Chrome, Firefox, Safari, and Edge, on Windows, macOS, and Linux. Add mobile web coverage too, for the full picture of how real users see your site.', 'testro' ),
					'intro_extra'   => __( 'Run a single-page app? A big multi-tenant platform? A site built on React, Angular, or Vue? theTestRo handles all of it. It deals with dynamic content and slow-loading parts on its own, no extra setup. You won\'t need to write custom waits every time your team ships something new.', 'testro' ),
					'heading_level' => 5,
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'automated-web-application-testing',
				),

				/* ---------------------------------------------------------- */
				array(
					'type'          => 'cta',
					'id'            => 'get-started-web-testing',
					'title'         => __( 'Start Testing Web Applications with AI', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s automated web testing to catch bugs early, cover every browser, and ship with real confidence.', 'testro' ),
					'heading_level' => 5,
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
				),
			),
		),

		'automated-api-testing' => array(
			'slug' => 'automated-api-testing',
			'seo'  => array(
				'title'       => __( 'Best API Testing Tool for Automated API Testing | theTestRo', 'testro' ),
				'description' => __( 'Automate API testing with theTestRo\'s best API testing tool. Test REST APIs faster, improve test coverage, and deliver reliable software with confidence.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best API Testing Tool for Faster API Automation', 'testro' ),
				'subtitle' => __( 'theTestRo is the best API testing tool for teams who want speed and accuracy without the busywork. Import a spec, chain a request into a full user journey, and let AI catch what breaks, before your users do.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				/* 2. Import a Spec, Get Working Tests --------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'import-a-spec',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Import a Spec, Get Working Tests', 'testro' ),
					'intro'         => __( 'From Spec to Test Suite in Minutes', 'testro' ),
					'intro_extra'   => __( 'Skip the blank page. Bring in your Postman collection or Swagger/OpenAPI file, and theTestRo reads it, finds every endpoint, and builds the requests for you. What used to take a sprint to hand-write now takes minutes.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'One-Click Import', 'testro' ),
							'description' => __( 'Upload a Postman or OpenAPI file. Get runnable tests back right away.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Auto-Detected Endpoints', 'testro' ),
							'description' => __( 'theTestRo maps out your routes, methods, and payloads on its own.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Assertions Built In', 'testro' ),
							'description' => __( 'Status codes, headers, and response body checks get added automatically, no manual setup.', 'testro' ),
						),
					),
				),

				/* 3. Test APIs Alone or Inside a Full Journey ------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'test-apis-alone-or-full-journey',
					'columns'       => 3,
					'title'         => __( 'Test APIs Alone or Inside a Full Journey', 'testro' ),
					'intro'         => __( 'Some checks just need a fast request and response. Others need the full picture.', 'testro' ),
					'outro'         => __( 'This shows what real API test automation looks like when one mode doesn\'t box it in.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Standalone API Tests', 'testro' ),
							'description' => __( 'Validate a single endpoint quickly, no browser required.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Chained API + UI Flows', 'testro' ),
							'description' => __( 'Call an API mid-journey, confirm the backend state, then continue through the UI to see it reflected correctly.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Reusable Step Groups', 'testro' ),
							'description' => __( 'Save common sequences like login and token setup once, then reuse them across every test.', 'testro' ),
						),
					),
				),

				/* 4. Validate Every Response ------------------------------ */
				array(
					'type'          => 'feature-grid',
					'id'            => 'validate-every-response',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Validate Every Response, Not Just the Status Code', 'testro' ),
					'intro'         => __( 'Go Deeper Than "It Returned 200"', 'testro' ),
					'intro_extra'   => __( 'A passing status code doesn\'t mean the response was actually correct. A field could be missing, a value could be wrong, or the shape of the data could have quietly changed. theTestRo checks further:', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Schema & Contract Validation', 'testro' ),
							'description' => __( 'Catch a broken response structure before it reaches your frontend.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Payload & Field-Level Checks', 'testro' ),
							'description' => __( 'Confirm the exact data your API sends back, not just that it sent something.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Data-Driven Testing', 'testro' ),
							'description' => __( 'Run the same test with many input sets from CSV, Excel, or a database. No duplicate test cases are needed.', 'testro' ),
						),
					),
				),

				/* 5. Self-Healing API Tests ------------------------------- */
				array(
					'type'          => 'healing',
					'id'            => 'self-healing-api-tests',
					'title'         => __( 'Self-Healing API Tests', 'testro' ),
					'intro'         => __( 'When Your API Changes, Your Tests Keep Up', 'testro' ),
					'intro_extra'   => __( 'Endpoints shift. Fields get renamed. Schemas evolve. theTestRo adapts instead of breaking:', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Schema Drift Detection', 'testro' ),
							'description' => __( 'Spot new fields, changed structures, or updated endpoints as soon as they happen.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Automatic Repair', 'testro' ),
							'description' => __( 'theTestRo updates the affected test on its own, so a small API change doesn\'t take down your whole suite.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Editing', 'testro' ),
							'description' => __( 'Need to adjust a step yourself? Just rewrite the sentence. No code, no framework digging.', 'testro' ),
						),
					),
				),

				/* 6. Scale Execution in the Cloud ------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'scale-execution-in-the-cloud',
					'variant'       => 'brand',
					'columns'       => 3,
					'title'         => __( 'Scale Execution in the Cloud', 'testro' ),
					'intro'         => __( 'theTestRo runs API test automation at real scale:', 'testro' ),
					'outro'         => __( 'theTestRo is API testing software built to handle real-world scale, not just a handful of test cases in a demo.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Parallel Execution', 'testro' ),
							'description' => __( 'Run large batches of tests at once, across services and environments.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Fast Feedback', 'testro' ),
							'description' => __( 'Get results back in minutes, not hours, even on large suites.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'REST API Testing & SOAP Support', 'testro' ),
							'description' => __( 'Cover modern REST endpoints and legacy SOAP services from the same platform.', 'testro' ),
						),
					),
				),

				/* 7. Trigger Tests on Every Backend Deploy ---------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'trigger-tests-on-every-backend-deploy',
					'variant'       => 'spotlight',
					'title'         => __( 'Trigger Tests on Every Backend Deploy', 'testro' ),
					'intro'         => __( 'Catch Breaks Before They Reach Production', 'testro' ),
					'intro_extra'   => __( 'theTestRo plugs straight into your release process. Every backend deploy can kick off a test run automatically, so a broken contract appears in the pull request, not after it ships.', 'testro' ),
					'intro_body'    => __( 'Results report a pass or fail status. Failures go to Slack or your issue tracker. No one needs to check a separate dashboard.', 'testro' ),
					'heading_level' => 4,
				),

				/* 8. Debug Failures Fast ---------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'debug-failures-fast',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Debug Failures Fast', 'testro' ),
					'intro'         => __( 'Know Why It Failed, Not Just That It Did', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'code',
							'title'       => __( 'Full Request & Response Logs', 'testro' ),
							'description' => __( 'See exactly what was sent and what came back.', 'testro' ),
						),
						array(
							'icon'        => 'stethoscope',
							'title'       => __( 'Root Cause Analysis', 'testro' ),
							'description' => __( 'AI separates a real contract break from a flaky network blip or environment issue.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'One-Click Bug Filing', 'testro' ),
							'description' => __( 'Send a failure straight to your tracker with logs and repro steps attached.', 'testro' ),
						),
					),
				),

				/* 9. Enterprise API Testing at Scale ---------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-api-testing-at-scale',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Enterprise API Testing at Scale', 'testro' ),
					'intro'         => __( 'Enterprise API testing means more than running a lot of tests. It means giving the right people access, keeping data where compliance rules require it, and letting teams work from one shared source of truth. It replaces five disconnected tools.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Unified Coverage View', 'testro' ),
							'description' => __( 'API results sit next to your web and mobile test results in one dashboard, so you see the whole picture.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Role-Based Access', 'testro' ),
							'description' => __( 'Control who can edit, run, or approve tests across teams.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Deployment Flexibility', 'testro' ),
							'description' => __( 'Run in theTestRo\'s cloud, a private environment, or fully on-premise behind your firewall. Choose what fits your compliance needs.', 'testro' ),
						),
					),
				),

				/* 10. FAQ ------------------------------------------------- */
				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'automated-api-testing',
				),

				/* 11. Final CTA ------------------------------------------- */
				array(
					'type'          => 'cta',
					'id'            => 'get-started-api-testing',
					'title'         => __( 'Start Automating API Tests with AI', 'testro' ),
					'intro'         => __( 'Stop Writing Requests by Hand', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s API testing platform. Catch broken contracts early, reduce maintenance, and ship backend changes with confidence.', 'testro' ),
					'heading_level' => 5,
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
				),
			),
		),

		'automated-cross-browser-testing-tool' => array(
			'slug' => 'automated-cross-browser-testing-tool',
			'seo'  => array(
				'title'       => __( 'Best Cross-Browser Testing Tool | theTestRo', 'testro' ),
				'description' => __( 'Run automated cross-browser testing with theTestRo\'s best cross-browser testing tool. Test web apps across browsers to ensure compatibility and faster releases.', 'testro' ),
			),

			'hero' => array(
				'title'          => __( 'Best Cross-Browser Testing Tool for Reliable Web Compatibility', 'testro' ),
				'subtitle'       => __( 'theTestRo is the best cross-browser testing tool for teams who can\'t afford browser gaps in production. Write a test once. Run it across Chrome, Safari, Firefox, and Edge automatically.', 'testro' ),
				'subtitle_extra' => __( 'Let AI catch what breaks along the way. This is cross-platform testing built to keep up with how many devices your users actually use.', 'testro' ),
				'actions'        => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				/* 2. Write Once, Run Everywhere --------------------------- */
				array(
					'type'          => 'browsers',
					'id'            => 'write-once-run-everywhere',
					'title'         => __( 'Write Once, Run Everywhere', 'testro' ),
					'intro'         => __( 'Your users don\'t all use the same browser. Your tests shouldn\'t need five versions just to keep up with that.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'name'     => __( 'Chrome', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 82,
							'tone'     => 'running',
						),
						array(
							'name'     => __( 'Safari', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 74,
							'tone'     => 'running',
						),
						array(
							'name'     => __( 'Firefox', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 68,
							'tone'     => 'running',
						),
						array(
							'name'     => __( 'Edge', 'testro' ),
							'status'   => __( 'Passed', 'testro' ),
							'progress' => 100,
							'tone'     => 'passed',
						),
					),
					'features'      => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Single Test, Full Coverage', 'testro' ),
							'description' => __( 'Build a test once. theTestRo runs it across Chrome, Safari, Firefox, and Edge. No rewriting needed.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Real Browsers, Not Just Emulators', 'testro' ),
							'description' => __( 'Check behavior on real browser engines. Not simulated guesses that miss real rendering quirks.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Desktop and Mobile Web Together', 'testro' ),
							'description' => __( 'Cover layouts, touch, and mobile behavior alongside desktop, all in one run.', 'testro' ),
						),
					),
					'outro'         => __( 'This is cross-browser test automation the way it should work. Build it once. Trust it everywhere.', 'testro' ),
				),

				/* 3. How It Works ------------------------------------------- */
				array(
					'type'          => 'pipeline',
					'id'            => 'how-it-works',
					'title'         => __( 'How It Works', 'testro' ),
					'intro'         => __( 'From One Test to Full Browser Coverage in Four Steps', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'pen-square',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Build the Test', 'testro' ),
							'description' => __( 'Record your actions or write steps in plain English. No browser-specific code needed.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'Pick Your Target Browsers', 'testro' ),
							'description' => __( 'Select which browsers, OS versions, and screen sizes matter to your users.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Run in Parallel', 'testro' ),
							'description' => __( 'theTestRo executes the same test across every selected target at once.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'Review Per-Browser Results', 'testro' ),
							'description' => __( 'See exactly which browsers passed, which failed, and why, all in one report.', 'testro' ),
						),
					),
				),

				/* 4. Browser compatibility -------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'browser-compatibility-testing',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Browser Compatibility Testing That Actually Catches the Gaps', 'testro' ),
					'intro'         => __( 'Find What "Works on Chrome" Misses', 'testro' ),
					'intro_extra'   => __( 'A feature can work fine in one browser and quietly break in another. A button that doesn\'t register a click. A layout that collapses. A form that submits wrong. theTestRo is built to catch exactly that kind of gap:', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Rendering Differences', 'testro' ),
							'description' => __( 'Spot layout shifts and style breaks between browser engines. Catch them before a user ever sees them.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Functional Parity Checks', 'testro' ),
							'description' => __( 'Confirm buttons, forms, and navigation work the same way everywhere. Not just on your team\'s default browser.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Legacy and Current Versions', 'testro' ),
							'description' => __( 'Test the latest browser releases and older versions your users might still be running.', 'testro' ),
						),
					),
				),

				/* 5. Who relies on cross-browser testing ------------------ */
				array(
					'type'          => 'outcomes',
					'id'            => 'who-relies-on-cross-browser-testing',
					'variant'       => 'tint',
					'title'         => __( 'Who Relies on Cross-Browser Testing', 'testro' ),
					'intro'         => __( 'Built for Teams Who Can\'t Guess Which Browser a User Picks', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'coins',
							'title'       => __( 'E-Commerce Teams', 'testro' ),
							'description' => __( 'A broken checkout button in one browser costs real revenue. Catch it before launch, not after a support ticket.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'SaaS Product Teams', 'testro' ),
							'description' => __( 'Enterprise customers use a wide mix of browsers, often older, locked-down corporate versions. Cover them all.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Agencies & Consultancies', 'testro' ),
							'description' => __( 'Deliver client sites with proof they work everywhere, not just in the browser your team happened to test in.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'QA Managers', 'testro' ),
							'description' => __( 'Get one clear report across every target browser, instead of piecing together manual checks from different testers.', 'testro' ),
						),
					),
				),

				/* 6. AI cross-browser testing ----------------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'ai-cross-browser-testing',
					'variant'       => 'spotlight',
					'title'         => __( 'AI Cross-Browser Testing That Adapts on Its Own', 'testro' ),
					'intro'         => __( 'When Browsers Render Differently, theTestRo Keeps Up', 'testro' ),
					'intro_extra'   => __( 'Every browser engine handles elements a little differently. That\'s usually where cross-browser tests break.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Across Engines', 'testro' ),
							'description' => __( 'theTestRo finds the right element even when Chrome, Firefox, and Safari render it differently underneath.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Automatic Adjustment', 'testro' ),
							'description' => __( 'A rendering quirk in one browser won\'t take down your whole suite. theTestRo adapts and keeps running.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Fixes', 'testro' ),
							'description' => __( 'Need to update a step yourself? Just rewrite the sentence. No separate driver code per browser.', 'testro' ),
						),
					),
				),

				/* 7. Scale execution in parallel ---------------------------- */
				array(
					'type'          => 'browsers',
					'id'            => 'scale-execution-parallel',
					'title'         => __( 'Scale Execution Across Browsers in Parallel', 'testro' ),
					'intro'         => __( 'Stop Running Browsers One at a Time', 'testro' ),
					'intro_extra'   => __( 'Sequential browser testing is slow by design; every browser waits its turn.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'name'     => __( 'Chrome', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 88,
							'tone'     => 'running',
						),
						array(
							'name'     => __( 'Firefox', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 72,
							'tone'     => 'running',
						),
						array(
							'name'     => __( 'Edge', 'testro' ),
							'status'   => __( 'Passed', 'testro' ),
							'progress' => 100,
							'tone'     => 'passed',
						),
						array(
							'name'     => __( 'Safari', 'testro' ),
							'status'   => __( 'Visual check', 'testro' ),
							'progress' => 91,
							'tone'     => 'visual',
						),
					),
					'features'      => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Parallel Execution', 'testro' ),
							'description' => __( 'Run your test across every target browser at the same time, not one after another.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Fast Feedback', 'testro' ),
							'description' => __( 'Get a full compatibility check back in minutes, even for large regression suites.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Cloud Execution', 'testro' ),
							'description' => __( 'No local browser lab to maintain, patch, or keep updated. theTestRo handles the infrastructure.', 'testro' ),
						),
					),
					'outro'         => __( 'Running the same suite locally across five browsers usually means five separate setups, five sets of drivers, and five places for something to go stale. theTestRo replaces all of that with one cloud-based run.', 'testro' ),
				),

				/* 8. Real-world conditions ---------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'real-world-conditions',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Real-World Conditions, Not Just a Clean Test Environment', 'testro' ),
					'intro'         => __( 'Test How Your Users Actually Experience Your Site', 'testro' ),
					'intro_extra'   => __( 'A perfect browser in a perfect test environment isn\'t the real world.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Network Throttling', 'testro' ),
							'description' => __( 'See how your app behaves on a slow connection, not just fast office Wi-Fi.', 'testro' ),
						),
						array(
							'icon'        => 'crosshair',
							'title'       => __( 'Geolocation Simulation', 'testro' ),
							'description' => __( 'Check how content, currency, and language change for users in different regions.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Responsive Breakpoints', 'testro' ),
							'description' => __( 'Check layouts across desktop, tablet, and mobile screens, all in one pass.', 'testro' ),
						),
					),
				),

				/* 9. Catch browser bugs before release ---------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'catch-browser-bugs-before-release',
					'variant'       => 'spotlight',
					'title'         => __( 'Catch Browser Bugs Before They Reach a Release', 'testro' ),
					'intro'         => __( 'Trigger a Full Browser Check on Every Pull Request', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects straight into your release workflow. New code lands, and a full cross-browser run can start automatically.', 'testro' ),
					'outro'         => __( 'A Safari-only bug shows up in code review, not in a support ticket weeks later. Results come back per browser, so your team knows exactly where the fix is needed. No guessing from one vague failure message.', 'testro' ),
					'heading_level' => 4,
				),

				/* 10. Debug browser-specific failures ----------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'debug-browser-specific-failures',
					'variant'       => 'brand',
					'columns'       => 3,
					'title'         => __( 'Debug Browser-Specific Failures Fast', 'testro' ),
					'intro'         => __( 'See Exactly Where It Broke, and Why', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Per-Browser Screenshots', 'testro' ),
							'description' => __( 'See the exact moment of failure, in the exact browser it happened in.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Video Playback', 'testro' ),
							'description' => __( 'Watch a full replay of the run, browser by browser.', 'testro' ),
						),
						array(
							'icon'        => 'stethoscope',
							'title'       => __( 'Root Cause Analysis', 'testro' ),
							'description' => __( 'AI tells you if it\'s a real compatibility bug or a flaky, unrelated failure.', 'testro' ),
						),
					),
					'outro'         => __( 'That distinction matters. A team that chases every flaky failure as if it were a real bug burns hours it doesn\'t have. theTestRo sorts the signal from the noise before your team even looks at the report.', 'testro' ),
				),

				/* 11. Enterprise cross-browser testing ---------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-cross-browser-testing',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Enterprise Cross-Browser Testing at Scale', 'testro' ),
					'intro'         => __( 'Built for Teams Running Hundreds of Checks a Day', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Broad Browser and OS Coverage', 'testro' ),
							'description' => __( 'Test across Windows, macOS, iOS, and Android. No new infrastructure needed.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Role-Based Access', 'testro' ),
							'description' => __( 'Control who can build, run, or approve tests across your org.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Manual and Automated Together', 'testro' ),
							'description' => __( 'Some edge cases still need a human eye. theTestRo supports manual browser sessions right alongside automated runs, in the same place.', 'testro' ),
						),
					),
					'outro'         => __( 'theTestRo isn\'t just browser testing on its own either. It provides full cross-platform testing and covers the mix of browsers, systems, and screen sizes your real users actually use.', 'testro' ),
				),

				/* 12. FAQ --------------------------------------------------- */
				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'automated-cross-browser-testing-tool',
				),

				/* 13. Final CTA --------------------------------------------- */
				array(
					'type'          => 'cta',
					'id'            => 'get-started-cross-browser-testing',
					'title'         => __( 'Start Testing Across Every Browser Today', 'testro' ),
					'intro'         => __( 'Stop Guessing Which Browsers Your Users Are On', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s cross-browser testing software. Catch compatibility bugs early and ship with confidence. It works no matter which browser a user opens. From a two-person startup to a large enterprise QA org, the same platform scales with what you need.', 'testro' ),
					'heading_level' => 5,
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
				),
			),
		),

		'test-management-software' => array(
			'slug'   => 'test-management-software',
			'title'  => __( 'AI Test Management Tool', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Best AI Test Management Software for Modern QA Teams', 'testro' ),
				'description' => __( 'Manage test cases, test execution, and reporting with the best AI test management tool. Improve collaboration, track QA progress, and deliver quality software faster.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best AI Test Management Software for Modern QA Teams', 'testro' ),
				'subtitle' => __( 'theTestRo is AI test management software that plans sprints, writes test cases, runs tests, and reports bugs, all in one place. One central repository. No more spreadsheets. No more tool switching.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				/* 2. What Is an AI Test Management Tool? -------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'what-is-ai-test-management',
					'title'         => __( 'What Is an AI Test Management Tool?', 'testro' ),
					'intro'         => __( 'A Single Source of Truth for Your Whole QA Process', 'testro' ),
					'intro_extra'   => __( 'A test management tool helps testers plan tests, write test cases, run them, and track bugs. It keeps everything organized in one place.', 'testro' ),
					'intro_body'    => __( 'A strong test management platform becomes the single source of truth for a QA team. Every test case, every run, and every bug report lives in one searchable home. No more digging through spreadsheets, chat threads, and someone\'s personal notes.', 'testro' ),
					'outro'         => __( 'An AI test management tool takes that a step further. Instead of testers doing every step by hand, AI agents handle the repetitive parts. They read requirements, draft test cases, run them, and write up bugs. Your team reviews and stays in control at each step.', 'testro' ),
					'heading_level' => 2,
				),

				/* 3. AI Agents at Every Stage of Testing -------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'ai-agents-testing',
					'variant'       => 'spotlight',
					'title'         => __( 'AI Agents at Every Stage of Testing', 'testro' ),
					'intro'         => __( 'Four AI Agents, One Testing Workflow', 'testro' ),
					'intro_extra'   => __( 'theTestRo places a dedicated AI agent at each stage of the test management cycle. This keeps work moving, so nothing waits for someone to handle it.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'The Planner', 'testro' ),
							'description' => __( 'Spots new sprints the moment they start. Pulls in every story automatically. No manual setup. No lag behind the dev team.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'The Generator', 'testro' ),
							'description' => __( 'Turns a Jira story, PRD, Figma file, screenshot, or a short prompt into a detailed test case. Complete with steps, preconditions, and both positive and negative scenarios.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'The Runner', 'testro' ),
							'description' => __( 'Runs test cases on a live browser while you watch. Pause it, tweak the test data, or rerun a step. No lost context.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'The Bug Reporter', 'testro' ),
							'description' => __( 'Writes a full bug report the second a step fails. Steps to reproduce are already filled in. Then it files straight into your tracker.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what AI-powered test management actually looks like in practice. Not one clever feature, but AI support at every single stage of the cycle.', 'testro' ),
				),

				/* 4. One Central Repository for Every Test ------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'central-test-repository',
					'variant'       => 'tint',
					'title'         => __( 'One Central Repository for Every Test', 'testro' ),
					'intro'         => __( 'Stop Hunting Across Spreadsheets and Tools', 'testro' ),
					'intro_extra'   => __( 'theTestRo replaces scattered spreadsheets and outdated tools. It gives you one central home for every test case, test run, and bug report.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Searchable Repository', 'testro' ),
							'description' => __( 'Find any test case in seconds, not by scrolling through tabs.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Version Control', 'testro' ),
							'description' => __( 'See exactly what changed in a test case and when, with a full history.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Team-Wide Access', 'testro' ),
							'description' => __( 'Testers, developers, and product managers all work from the same source, instead of five different copies.', 'testro' ),
						),
					),
					'outro'         => __( 'A test case management tool built this way means nobody\'s asking "wait, which version of this test is the current one?" ever again.', 'testro' ),
				),

				/* 5. Two-Way Sync With Jira --------------------------------- */
				array(
					'type'          => 'architecture',
					'id'            => 'jira-two-way-sync',
					'title'         => __( 'Two-Way Sync With Jira', 'testro' ),
					'intro'         => __( 'Requirements and Tests, Always in Sync', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects directly with Jira, so nothing needs to be updated twice.', 'testro' ),
					'heading_level' => 3,
					'hub'           => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Jira sync', 'testro' ),
					),
					'items'         => array(
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Auto-Detected Sprints', 'testro' ),
							'description' => __( 'The moment a sprint goes live, its stories flow into theTestRo automatically.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Story-to-Test Mapping', 'testro' ),
							'description' => __( 'Every test case links back to the exact requirement it covers, so "has this been tested?" has a real answer.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Two-Way Status Updates', 'testro' ),
							'description' => __( 'Update a test\'s status in theTestRo, and Jira reflects it instantly. No copy-pasting between tools.', 'testro' ),
						),
					),
					'outro'         => __( 'Full traceability between requirements, test cases, and bugs also makes audits and compliance reporting far less painful. The coverage mapping is already built in.', 'testro' ),
				),

				/* 6. Test Case Generation ----------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'test-case-generation',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Test Case Generation From Whatever You Already Have', 'testro' ),
					'intro'         => __( 'From Requirements to Test Cases, Without the Blank Page', 'testro' ),
					'intro_extra'   => __( 'Skip writing test cases from scratch. theTestRo\'s AI reads what your team already produces and turns it straight into structured tests.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Jira Stories', 'testro' ),
							'description' => __( 'Generate test cases directly from an existing story, no manual translation needed.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'PRDs & Figma Files', 'testro' ),
							'description' => __( 'Feed in a product doc or a design file, and get test coverage that reflects the actual planned experience.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Screenshots & Videos', 'testro' ),
							'description' => __( 'Upload a screen recording of a user flow, and theTestRo turns it into a repeatable test.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Prompts', 'testro' ),
							'description' => __( 'Type what you want tested, and get a complete test case back, edge cases included.', 'testro' ),
						),
					),
				),

				/* 7. Human-in-the-Loop Test Execution ----------------------- */
				array(
					'type'          => 'analytics',
					'id'            => 'human-in-the-loop-execution',
					'title'         => __( 'Human-in-the-Loop Test Execution', 'testro' ),
					'intro'         => __( 'AI Runs the Test. You Stay in Control.', 'testro' ),
					'intro_extra'   => __( 'theTestRo\'s test execution isn\'t a black box. Watch tests run live in a real browser, with full visibility into every step.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Live Execution View', 'testro' ),
							'description' => __( 'Watch each step happen in real time, not just a pass/fail summary after the fact.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Auto-Generated Test Data', 'testro' ),
							'description' => __( 'Tests run with realistic data automatically, no manual setup required.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Pause, Tweak, Rerun', 'testro' ),
							'description' => __( 'Something looks off mid-run? Pause it, adjust the data, and continue, without starting over.', 'testro' ),
						),
					),
					'dashboard'     => array(
						'label'     => __( 'Execution Control', 'testro' ),
						'build'     => __( 'Release 2.4 · Sprint 18', 'testro' ),
						'status'    => __( 'On track', 'testro' ),
						'score'     => 92,
						'tiles'     => array(
							array(
								'label' => __( 'Running', 'testro' ),
								'value' => '48',
								'trend' => __( 'Live now', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Completed', 'testro' ),
								'value' => '1,284',
								'trend' => __( '+12% week', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Scheduled', 'testro' ),
								'value' => '36',
								'trend' => __( 'Next 24h', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Environments', 'testro' ),
								'value' => '3/3',
								'trend' => __( 'Healthy', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Release progress', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 62,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 74,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 81,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 88,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 92,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 70,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 84,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'Dev', 'testro' ),
								'value' => 96,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'Staging', 'testro' ),
								'value' => 91,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'Production gate', 'testro' ),
								'value' => 78,
								'tone'  => 'warning',
							),
						),
					),
				),

				/* 8. Reporting, Analytics & Quality Insights ---------------- */
				array(
					'type'          => 'analytics',
					'id'            => 'reporting-analytics-insights',
					'title'         => __( 'Reporting, Analytics & Quality Insights', 'testro' ),
					'intro'         => __( 'See the Full Picture, Not Just Pass or Fail', 'testro' ),
					'intro_extra'   => __( 'A test management platform is only as useful as the visibility it gives your team.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Real-Time Dashboards', 'testro' ),
							'description' => __( 'Track pass rates, execution status, and defect trends as they happen.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Coverage & Traceability Reports', 'testro' ),
							'description' => __( 'Show exactly which requirements the tests cover and which requirements still need attention.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Quality Engineering Insights', 'testro' ),
							'description' => __( 'Track metrics like flakiness, cycle time, and defect leakage for every project in one view. Not spread across five tools.', 'testro' ),
						),
					),
					'dashboard'     => array(
						'label'     => __( 'Release Readiness', 'testro' ),
						'build'     => __( 'Build #1842 · Main', 'testro' ),
						'status'    => __( 'Ready', 'testro' ),
						'score'     => 96,
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '98.6%',
								'trend' => __( '+1.4%', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Test health', 'testro' ),
								'value' => 'A+',
								'trend' => __( 'Stable', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Risk score', 'testro' ),
								'value' => 'Low',
								'trend' => __( 'AI cleared', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'AI insights', 'testro' ),
								'value' => '7',
								'trend' => __( 'Actionable', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Pass/fail trend', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'R1', 'testro' ),
									'value' => 78,
								),
								array(
									'label' => __( 'R2', 'testro' ),
									'value' => 84,
								),
								array(
									'label' => __( 'R3', 'testro' ),
									'value' => 81,
								),
								array(
									'label' => __( 'R4', 'testro' ),
									'value' => 90,
								),
								array(
									'label' => __( 'R5', 'testro' ),
									'value' => 93,
								),
								array(
									'label' => __( 'R6', 'testro' ),
									'value' => 95,
								),
								array(
									'label' => __( 'R7', 'testro' ),
									'value' => 98,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'Critical risk', 'testro' ),
								'value' => 4,
								'tone'  => 'critical',
							),
							array(
								'label' => __( 'Watchlist modules', 'testro' ),
								'value' => 11,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Healthy coverage', 'testro' ),
								'value' => 92,
								'tone'  => 'healthy',
							),
						),
					),
					'outro'         => __( 'Instead of relying on a status meeting to find out where testing stands, everyone on the team can just open the dashboard. This is the kind of visibility an AI testing management platform should deliver. It gives insight without anyone having to chase it down.', 'testro' ),
				),

				/* 9. Migration ---------------------------------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'migrate-existing-tests',
					'variant'       => 'tint',
					'title'         => __( 'Migrate From Spreadsheets and Legacy Tools in Minutes', 'testro' ),
					'intro'         => __( 'Bring Your Existing Tests With You', 'testro' ),
					'intro_extra'   => __( 'Switching test case management software shouldn\'t mean starting from zero.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'database',
							'title'       => __( 'CSV & Excel Import', 'testro' ),
							'description' => __( 'Bring in your existing test cases in minutes, auto-tagged and organized with clean IDs.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Migration From Legacy Tools', 'testro' ),
							'description' => __( 'Move over from spreadsheets or older platforms without losing your test history.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Guided Onboarding', 'testro' ),
							'description' => __( 'Start testing within minutes of signing up, with no steep learning curve to climb first.', 'testro' ),
						),
					),
				),

				/* 10. Comparison table ---------------------------------------- */
				array(
					'type'          => 'comparison',
					'id'            => 'why-teams-move-off-spreadsheets',
					'title'         => __( 'Why Teams Move Off Spreadsheets and Legacy Tools', 'testro' ),
					'intro'         => __( 'Spreadsheets vs. Legacy Tools vs. theTestRo', 'testro' ),
					'heading_level' => 5,
					'text_only'     => true,
					'legacy'        => array(
						'label' => __( 'Spreadsheets', 'testro' ),
					),
					'middle'        => array(
						'label' => __( 'Legacy Tools', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'theTestRo', 'testro' ),
					),
					'rows'          => array(
						array(
							'aspect' => __( 'Setup', 'testro' ),
							'legacy' => __( 'None, but chaotic', 'testro' ),
							'middle' => __( 'Long, clunky onboarding', 'testro' ),
							'modern' => __( 'Live in minutes', 'testro' ),
						),
						array(
							'aspect' => __( 'Test Case Writing', 'testro' ),
							'legacy' => __( 'Fully manual', 'testro' ),
							'middle' => __( 'Manual or semi-automated', 'testro' ),
							'modern' => __( 'AI-generated from Jira, PRDs, prompts', 'testro' ),
						),
						array(
							'aspect' => __( 'Traceability', 'testro' ),
							'legacy' => __( 'None', 'testro' ),
							'middle' => __( 'Partial, hard to manage', 'testro' ),
							'modern' => __( 'Built-in, end-to-end', 'testro' ),
						),
						array(
							'aspect' => __( 'Collaboration', 'testro' ),
							'legacy' => __( 'Offline, email-based', 'testro' ),
							'middle' => __( 'Siloed', 'testro' ),
							'modern' => __( 'Real-time, shared workspace', 'testro' ),
						),
						array(
							'aspect' => __( 'Execution & Bug Filing', 'testro' ),
							'legacy' => __( 'Manual, error-prone', 'testro' ),
							'middle' => __( 'Manual, tool switching', 'testro' ),
							'modern' => __( 'AI-assisted, human-reviewed', 'testro' ),
						),
						array(
							'aspect' => __( 'Integrations', 'testro' ),
							'legacy' => __( 'None', 'testro' ),
							'middle' => __( 'Limited', 'testro' ),
							'modern' => __( 'Native Jira, CI/CD, and more', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'test-management-software',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-managing-tests-with-ai',
					'title'         => __( 'Start Managing Tests With AI Today', 'testro' ),
					'intro'         => __( 'Replace the Spreadsheet Chaos for Good', 'testro' ),
					'body'          => __( 'Join QA teams already using theTestRo\'s AI test management software to plan, test, and ship faster.', 'testro' ),
					'body_extra'    => __( 'Do less manual work at every stage.', 'testro' ),
					'heading_level' => 5,
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
				),
			),
		),


		'self-healing-test-automation-tool' => array(
			'slug'   => 'self-healing-test-automation-tool',
			'title'  => __( 'Self-Healing Automation Tool', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Best Self-Healing Test Automation tool for Stable Test Execution', 'testro' ),
				'description' => __( 'Reduce test maintenance with a self-healing test automation tool. Adapt to UI changes automatically, reduce flaky tests, and ensure reliable execution.', 'testro' ),
			),

			'hero' => array(
				'title'          => __( 'Best Self-Healing Test Automation Tool for Reliable Testing', 'testro' ),
				'subtitle'       => __( 'theTestRo is a self-healing test automation tool. It stops broken locators from breaking your builds.', 'testro' ),
				'subtitle_extra' => __( 'Your app\'s UI changes, and AI updates the test on its own. No manual script fixes. No flaky suite waiting on someone to notice. This is AI test automation built to hold up over time, not just on day one.', 'testro' ),
				'actions'        => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				/* 1. Intelligent Test Stability ---------------------------- */
				array(
					'type'          => 'pipeline',
					'id'            => 'intelligent-test-stability',
					'title'         => __( 'Intelligent Test Stability', 'testro' ),
					'intro'         => __( 'Tests That Stay Stable as Your App Changes', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'refresh',
							'stage'       => __( 'Adapt', 'testro' ),
							'title'       => __( 'Adaptive Test Execution', 'testro' ),
							'description' => __( 'Tests adjust in real time to small UI shifts. They don\'t just fail outright.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'stage'       => __( 'Recognize', 'testro' ),
							'title'       => __( 'Dynamic Object Recognition', 'testro' ),
							'description' => __( 'theTestRo finds elements based on how they actually behave and look. Not one fixed reference point.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'Recover', 'testro' ),
							'title'       => __( 'Automatic Recovery Engine', 'testro' ),
							'description' => __( 'If a step can\'t find its target the usual way, theTestRo tries other paths. It does this before it marks the step as a failure.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what AI self-healing test automation should deliver. Stability that holds up release after release, not just on day one.', 'testro' ),
				),

				/* 2. AI Locator Intelligence ------------------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'ai-locator-intelligence',
					'variant'       => 'spotlight',
					'title'         => __( 'AI Locator Intelligence', 'testro' ),
					'intro'         => __( 'Smarter Than a Single Hardcoded Selector', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'crosshair',
							'title'       => __( 'Smart Locator Detection', 'testro' ),
							'description' => __( 'theTestRo builds each locator from multiple signals. Not one brittle CSS path.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Multi-Attribute Element Matching', 'testro' ),
							'description' => __( 'An ID changes but the label, position, and role stay the same? theTestRo still finds it.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'DOM Change Detection', 'testro' ),
							'description' => __( 'Structural shifts in the page get flagged and handled on their own. Nothing breaks silently.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Intelligent Locator Ranking', 'testro' ),
							'description' => __( 'More than one match is possible? theTestRo picks the most reliable one, not just the first one found.', 'testro' ),
						),
					),
				),

				/* 3. Autonomous Test Recovery ------------------------------ */
				array(
					'type'          => 'healing',
					'id'            => 'autonomous-test-recovery',
					'title'         => __( 'Autonomous Test Recovery', 'testro' ),
					'intro'         => __( 'Recovery Without a Person in the Loop', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Automatic Locator Updates', 'testro' ),
							'description' => __( 'A changed element gets a new locator on its own. No manual edit needed.', 'testro' ),
						),
						array(
							'icon'        => 'crosshair',
							'title'       => __( 'Runtime Element Resolution', 'testro' ),
							'description' => __( 'theTestRo figures out what an element is right when the test runs. Not from a stale reference captured weeks ago.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Failed Step Recovery', 'testro' ),
							'description' => __( 'One failed step doesn\'t have to end the run. theTestRo tries to recover before giving up.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Zero Manual Script Updates', 'testro' ),
							'description' => __( 'Your team stops opening old test scripts just to fix a selector that moved.', 'testro' ),
						),
					),
				),

				/* 4. Adaptive UI Change Detection -------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'adaptive-ui-change-detection',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'Adaptive UI Change Detection', 'testro' ),
					'intro'         => __( 'Built for How Modern Web Apps Actually Change', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'DOM Structure Analysis', 'testro' ),
							'description' => __( 'theTestRo reads structural changes in the page. Not just surface-level text.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Dynamic Component Recognition', 'testro' ),
							'description' => __( 'Handles parts that load, re-render, or shift position with no warning.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Shadow DOM Support', 'testro' ),
							'description' => __( 'Works with elements nested inside shadow DOM, where many older tools lose sight of them.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Modern Web Framework Compatibility', 'testro' ),
							'description' => __( 'Built to handle React, Angular, and Vue apps. The DOM updates constantly behind the scenes, and theTestRo keeps up.', 'testro' ),
						),
					),
				),

				/* 5. Intelligent Execution Engine -------------------------- */
				array(
					'type'          => 'pipeline',
					'id'            => 'intelligent-execution-engine',
					'title'         => __( 'Intelligent Execution Engine', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Runtime', 'testro' ),
							'title'       => __( 'Runtime Decision Engine', 'testro' ),
							'description' => __( 'theTestRo decides how to handle a surprise in the moment. It doesn\'t just crash and wait for a rerun.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'stage'       => __( 'Wait', 'testro' ),
							'title'       => __( 'Smart Wait Strategies', 'testro' ),
							'description' => __( 'Wait times adjust to real network and page-load conditions. Not a fixed timer that\'s either too short or wastes time.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'stage'       => __( 'Retry', 'testro' ),
							'title'       => __( 'Automatic Retry Logic', 'testro' ),
							'description' => __( 'A flaky step gets a second try before it counts as a real failure.', 'testro' ),
						),
						array(
							'icon'        => 'circle-check',
							'stage'       => __( 'Sync', 'testro' ),
							'title'       => __( 'Dynamic Synchronization', 'testro' ),
							'description' => __( 'Tests stay in step with the app\'s real load state. Fewer timing-related false failures.', 'testro' ),
						),
					),
				),

				/* 6. Failure Diagnostics & AI Insights --------------------- */
				array(
					'type'          => 'analytics',
					'id'            => 'failure-diagnostics-ai-insights',
					'title'         => __( 'Failure Diagnostics & AI Insights', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Root Cause Analysis', 'testro' ),
							'description' => __( 'AI tells a real bug apart from a flaky, unrelated failure.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Failure Classification', 'testro' ),
							'description' => __( 'Failures get sorted on their own. Your team isn\'t triaging each one from scratch.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Execution Timeline', 'testro' ),
							'description' => __( 'See the full sequence of what happened, step by step, right up to the failure.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Screenshots & Video Logs', 'testro' ),
							'description' => __( 'Every failure comes with visual proof. Not just a line of error text.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI Recovery Recommendations', 'testro' ),
							'description' => __( 'theTestRo suggests a fix when a step can\'t heal itself. Your team isn\'t starting from zero.', 'testro' ),
						),
					),
					'dashboard'     => array(
						'label'     => __( 'Healing Diagnostics', 'testro' ),
						'build'     => __( 'Run #4821 · Checkout', 'testro' ),
						'status'    => __( 'Recovered', 'testro' ),
						'score'     => 98,
						'tiles'     => array(
							array(
								'label' => __( 'Screenshots', 'testro' ),
								'value' => '24',
								'trend' => __( 'Step captures', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Video', 'testro' ),
								'value' => '1',
								'trend' => __( 'Full replay', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Timeline', 'testro' ),
								'value' => '46s',
								'trend' => __( 'Heal at 12s', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Root Cause', 'testro' ),
								'value' => 'DOM',
								'trend' => __( 'Locator drift', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'AI Suggestions', 'testro' ),
								'value' => '3',
								'trend' => __( 'Actionable', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Classification', 'testro' ),
								'value' => 'Heal',
								'trend' => __( 'Not a defect', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Heal latency trend', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 72,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 68,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 81,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 76,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 88,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 84,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 91,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'Self-healed', 'testro' ),
								'value' => 94,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'Retried', 'testro' ),
								'value' => 11,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'True defects', 'testro' ),
								'value' => 3,
								'tone'  => 'critical',
							),
						),
					),
				),

				/* 7. Enterprise Automation Reliability --------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'enterprise-automation-reliability',
					'variant'       => 'tint',
					'title'         => __( 'Enterprise Automation Reliability', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Long-Term Test Stability', 'testro' ),
							'description' => __( 'Tests stay reliable over months of releases. Not just the week they were written.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Reduced Maintenance Overhead', 'testro' ),
							'description' => __( 'Automated test maintenance means less time on upkeep, more time on new coverage.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Higher Automation Success Rate', 'testro' ),
							'description' => __( 'Fewer false failures. Your team can trust a red result when it actually happens.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Large-Scale Test Suite Management', 'testro' ),
							'description' => __( 'Self-healing holds up whether you\'re running 50 tests or 5,000.', 'testro' ),
						),
					),
				),

				/* 8. DevOps & CI/CD Integration ---------------------------- */
				array(
					'type'          => 'architecture',
					'id'            => 'devops-cicd-integration',
					'title'         => __( 'DevOps & CI/CD Integration', 'testro' ),
					'intro'         => __( 'Self-Healing That Works Inside Your Existing Pipeline', 'testro' ),
					'intro_extra'   => __( 'Self-healing only helps if it runs where your team already ships code. theTestRo connects straight into the tools your pipeline already uses:', 'testro' ),
					'heading_level' => 5,
					'hub'           => array(
						'icon'  => 'heart-pulse',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Self-Healing Automation', 'testro' ),
					),
					'items'         => array(
						array(
							'icon'  => 'server',
							'title' => __( 'Jenkins', 'testro' ),
						),
						array(
							'icon'  => 'git-branch',
							'title' => __( 'GitHub Actions', 'testro' ),
						),
						array(
							'icon'  => 'cloud',
							'title' => __( 'Azure DevOps', 'testro' ),
						),
						array(
							'icon'  => 'infinity',
							'title' => __( 'GitLab CI', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Failed tests can file directly into your existing tickets.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Get notified the moment a test needs attention, right where your team already talks. A self-healing test automation tool that lives outside your pipeline just becomes one more dashboard nobody checks. theTestRo sits inside the workflow your team already has.', 'testro' ),
						),
					),
				),

				/* 9. Why Teams Choose -------------------------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'why-choose-self-healing',
					'variant'       => 'spotlight',
					'title'         => __( 'Why Teams Choose theTestRo Self-Healing Automation', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Healing at Every Layer', 'testro' ),
							'description' => __( 'Locators, waits, and retries all adapt together. Not just one isolated fix.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Transparent Recovery', 'testro' ),
							'description' => __( 'See exactly what changed and why a test still passed. No black-box "it worked" with zero explanation.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'No Extra Setup', 'testro' ),
							'description' => __( 'Self-healing is built in from day one. It\'s not a bolt-on feature buried behind a separate setup step.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Consistent Across Test Types', 'testro' ),
							'description' => __( 'The same self-healing logic covers web, API, and cross-browser tests. Not just one narrow use case.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'self-healing-test-automation-tool',
				),

				array(
					'type'          => 'cta',
					'id'            => 'get-started-self-healing',
					'title'         => __( 'Final CTA', 'testro' ),
					'intro'         => __( 'Stop Fixing Broken Tests by Hand', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s self-healing test automation. Cut maintenance time and keep your test suite reliable, release after release. Less time fixing tests. More time building.', 'testro' ),
					'heading_level' => 5,
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
				),
			),
		),

		'test-development' => array(
			'slug'   => 'test-development',
			'title'  => __( 'AI-Powered Test Development Platform', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Build Automated Tests with AI Test Development Platform', 'testro' ),
				'description' => __( 'Accelerate test creation with an AI-powered test development platform. Build, manage, and maintain automated tests using intelligent automation.', 'testro' ),
			),

			'hero' => array(
				'title'          => __( 'AI-Powered Test Development Platform', 'testro' ),
				'subtitle'       => __( 'theTestRo is an AI-powered test development platform built for speed. Describe a test in plain English, or record a flow. Get a working automated test back in seconds.', 'testro' ),
				'subtitle_extra' => __( 'No scripting. No steep learning curve. Just faster test development from day one.', 'testro' ),
				'actions'        => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				/* 1. Agentic Test Development ------------------------------ */
				array(
					'type'          => 'feature-grid',
					'id'            => 'agentic-test-development',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Agentic Test Development, Built for Speed', 'testro' ),
					'intro'         => __( 'Tests Built Before You\'d Even Finish Typing Them by Hand', 'testro' ),
					'intro_extra'   => __( 'theTestRo\'s AI agents handle the heavy lifting of test development. Your suite keeps pace with every sprint instead of falling behind it.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Auto-Generated Test Structure', 'testro' ),
							'description' => __( 'AI reads your requirements. It builds a test\'s structure on its own.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Sprint-Aware Updates', 'testro' ),
							'description' => __( 'New stories land, and theTestRo flags coverage gaps before your team has to go looking for them.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Continuous Test Suggestions', 'testro' ),
							'description' => __( 'AI recommends new tests and updates as your product changes. Not just once at setup.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what AI test development looks like when it\'s built to keep up. Not just to save time on day one.', 'testro' ),
				),

				/* 2. Natural Language Test Creation ------------------------ */
				array(
					'type'          => 'feature-grid',
					'id'            => 'natural-language-test-creation',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Natural Language Test Creation', 'testro' ),
					'intro'         => __( 'Write a Sentence. Get a Working Test.', 'testro' ),
					'intro_extra'   => __( 'You shouldn\'t need to know a framework to build a reliable test.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain English Test Steps', 'testro' ),
							'description' => __( 'Describe what should happen. theTestRo turns it into a working test.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Record-and-Convert', 'testro' ),
							'description' => __( 'Click through a flow once. Get a clean, readable test script back automatically.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'AI Test Creation for Any Skill Level', 'testro' ),
							'description' => __( 'Manual testers and engineers both work in the same simple interface. No separate tools needed.', 'testro' ),
						),
					),
					'outro'         => __( 'This is intelligent test authoring built so a whole QA team can pitch in. Not just the people who can code.', 'testro' ),
				),

				/* 3. How Test Development Works ---------------------------- */
				array(
					'type'          => 'lifecycle',
					'id'            => 'how-test-development-works',
					'title'         => __( 'How Test Development Works With theTestRo', 'testro' ),
					'intro'         => __( 'From Idea to Executable Test in Four Steps', 'testro' ),
					'heading_level' => 3,
					'loop_note'     => '',
					'items'         => array(
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Describe or Record', 'testro' ),
							'description' => __( 'Write a plain-English sentence. Or record yourself clicking through the flow once.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Review the Draft', 'testro' ),
							'description' => __( 'theTestRo builds the full test with steps, assertions, and structure. Check it before running anything.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Extend if Needed', 'testro' ),
							'description' => __( 'Add conditional logic, loops, or reusable components to cover edge cases.', 'testro' ),
						),
						array(
							'icon'        => 'circle-check',
							'title'       => __( 'Run and Refine', 'testro' ),
							'description' => __( 'Run the test, review results, and let AI flag anything that needs a second look.', 'testro' ),
						),
					),
				),

				/* 4. Who Builds Tests With theTestRo ----------------------- */
				array(
					'type'          => 'outcomes',
					'id'            => 'who-builds-tests',
					'variant'       => 'tint',
					'title'         => __( 'Who Builds Tests With theTestRo', 'testro' ),
					'intro'         => __( 'Built for the Whole QA Team, Not Just Engineers', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Manual Testers', 'testro' ),
							'description' => __( 'Turn existing manual test cases into automated ones. No need to learn a scripting language.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'QA Engineers', 'testro' ),
							'description' => __( 'Skip the repetitive setup work. Spend more time on complex scenarios and real edge cases.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Product Managers', 'testro' ),
							'description' => __( 'Validate a new feature yourself. No need to wait in line for QA bandwidth.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'QA Leads', 'testro' ),
							'description' => __( 'Roll out a consistent test development process across the whole team. Less onboarding time needed.', 'testro' ),
						),
					),
				),

				/* 5. Modular Test Components ------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'modular-test-components',
					'columns'       => 3,
					'title'         => __( 'Modular Test Components, Built for Reuse', 'testro' ),
					'intro'         => __( 'Build Once. Reuse Everywhere.', 'testro' ),
					'intro_extra'   => __( 'Repeating the same steps across dozens of tests wastes time. It multiplies maintenance work too.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Reusable Step Groups', 'testro' ),
							'description' => __( 'Turn a common sequence, like login, into a component you drop into any test.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Update Once, Apply Everywhere', 'testro' ),
							'description' => __( 'Change a shared component, and every test using it updates on its own.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'No Duplicate Logic', 'testro' ),
							'description' => __( 'Cut down on copy-pasted steps that quietly drift out of sync over time.', 'testro' ),
						),
					),
				),

				/* 6. Data-Driven Testing ----------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'data-driven-testing',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Data-Driven Testing, Made Simple', 'testro' ),
					'intro'         => __( 'One Test, Every Data Set', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'database',
							'title'       => __( 'Built-In Data Tables', 'testro' ),
							'description' => __( 'Run the same test against multiple input combinations. No need to write it multiple times.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'External Data Sources', 'testro' ),
							'description' => __( 'Pull test data straight from spreadsheets, APIs, or databases.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Broader Coverage, Less Effort', 'testro' ),
							'description' => __( 'Cover more real-world scenarios without multiplying your test count.', 'testro' ),
						),
					),
				),

				/* 7. Assertions That Understand Context -------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'assertions-that-understand-context',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Assertions That Understand Context', 'testro' ),
					'intro'         => __( 'Validation That Thinks, Not Just Checks', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'AI-Recommended Validations', 'testro' ),
							'description' => __( 'theTestRo suggests assertions based on what the UI is actually doing. Not a generic template.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Custom Assertions in Seconds', 'testro' ),
							'description' => __( 'Add a specific check without hunting for a locator first.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Fewer Missed Edge Cases', 'testro' ),
							'description' => __( 'AI flags validation gaps your team might not think to test by hand.', 'testro' ),
						),
					),
				),

				/* 8. Extend Any Test --------------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'extend-any-test',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Extend Any Test, Even the AI-Generated Ones', 'testro' ),
					'intro'         => __( 'AI Gets You Started. You Take It Further.', 'testro' ),
					'intro_extra'   => __( 'An AI-generated test is a starting point. Not a ceiling.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Conditional Logic', 'testro' ),
							'description' => __( 'Add if/else branches to handle different app states within one test.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Loops & Repetition', 'testro' ),
							'description' => __( 'Run a step multiple times without writing it out again and again.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Custom Flows on Top of AI Output', 'testro' ),
							'description' => __( 'Extend an auto-generated test with your own logic. Its built-in stability stays intact.', 'testro' ),
						),
					),
				),

				/* 9. Cleaner Maintenance With Smart Suggestions ------------ */
				array(
					'type'          => 'outcomes',
					'id'            => 'cleaner-maintenance',
					'variant'       => 'spotlight',
					'title'         => __( 'Cleaner Maintenance With Smart Suggestions', 'testro' ),
					'intro'         => __( 'A Test Suite That Tells You What Needs Attention', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Unused Step Detection', 'testro' ),
							'description' => __( 'theTestRo flags steps that no longer serve a purpose.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Outdated Logic Alerts', 'testro' ),
							'description' => __( 'Get notified when a test\'s logic no longer matches how the app behaves.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Missing Validation Flags', 'testro' ),
							'description' => __( 'AI points out where a test checks an action but not the actual result.', 'testro' ),
						),
					),
					'outro'         => __( 'Automated test development doesn\'t stop at creation. theTestRo keeps working after the test is written. Your suite stays lean instead of piling up dead weight release after release.', 'testro' ),
				),

				/* 10. One Platform for Every Testing Team ------------------ */
				array(
					'type'          => 'feature-grid',
					'id'            => 'one-platform-every-team',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'One Platform for Every Testing Team', 'testro' ),
					'intro'         => __( 'Authoring, Management, and Execution Together', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Test Authoring', 'testro' ),
							'description' => __( 'Recorder, plain-English tests, reusable step groups, and a shared element repository.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Test Management', 'testro' ),
							'description' => __( 'Version control, review workflows, role-based access, and test data handling.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Test Execution', 'testro' ),
							'description' => __( 'Cloud device coverage, local testing, parallel runs, and scheduled runs.', 'testro' ),
						),
					),
					'outro'         => __( 'A test development tool split across three separate products just adds friction. theTestRo keeps the whole workflow in one place.', 'testro' ),
				),

				/* 11. Fits Into Your Existing Workflow --------------------- */
				array(
					'type'          => 'architecture',
					'id'            => 'fits-existing-workflow',
					'title'         => __( 'Fits Into Your Existing Workflow', 'testro' ),
					'intro'         => __( 'Works With the Tools You Already Use', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with Jira, Jenkins, GitHub Actions, Azure DevOps, and GitLab. Test development plugs into your release process. It does not run as a separate task. A new pull request can trigger a test run automatically, and results flow back into the tools your team already checks each day.', 'testro' ),
					'heading_level' => 5,
					'hub'           => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Test Development hub', 'testro' ),
					),
					'items'         => array(
						array(
							'icon'  => 'plug',
							'title' => __( 'Jira', 'testro' ),
						),
						array(
							'icon'  => 'server',
							'title' => __( 'Jenkins', 'testro' ),
						),
						array(
							'icon'  => 'git-branch',
							'title' => __( 'GitHub Actions', 'testro' ),
						),
						array(
							'icon'  => 'cloud',
							'title' => __( 'Azure DevOps', 'testro' ),
						),
						array(
							'icon'  => 'infinity',
							'title' => __( 'GitLab', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'test-development',
				),

				array(
					'type'          => 'cta',
					'id'            => 'get-started-test-development',
					'title'         => __( 'Start Building Tests Faster Today', 'testro' ),
					'intro'         => __( 'Describe It. Automate It. Ship It.', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s AI test automation to build stable tests in minutes, not days.', 'testro' ),
					'heading_level' => 5,
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
				),
			),
		),

		'test-lab' => array(
			'slug'   => 'test-lab',
			'title'  => __( 'AI-Powered Test Execution Platform', 'testro' ),
			'seo'    => array(
				'title'       => __( 'AI-Powered Test Execution Platform | Parallel & Cloud Test Execution | theTestRo', 'testro' ),
				'description' => __( 'Execute automated tests faster with theTestRo\'s AI-Powered Test Execution Platform. Run parallel, cloud, and continuous test execution across browsers, devices, environments, and CI/CD pipelines.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'AI-Powered Test Execution', 'testro' ),
				'title'    => __( 'AI-Powered Test Execution Platform', 'testro' ),
				'subtitle' => __( 'Execute automated tests faster with theTestRo\'s AI-Powered Test Execution Platform. Run large-scale test suites across browsers, environments, and devices using intelligent orchestration, cloud execution, parallel processing, and AI-powered insights. Accelerate software delivery with reliable, scalable, and enterprise-ready test execution.', 'testro' ),
				'badges'   => array(
					__( 'Parallel Execution', 'testro' ),
					__( 'Cloud & Local Runs', 'testro' ),
					__( 'CI/CD Native', 'testro' ),
					__( 'Real-Time Insights', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '10X',
						'label' => __( 'Faster suite runs', 'testro' ),
						'icon'  => 'zap',
					),
					array(
						'value' => '∞',
						'label' => __( 'Parallel cloud scale', 'testro' ),
						'icon'  => 'infinity',
					),
					array(
						'value' => 'AI',
						'label' => __( 'Orchestration & insights', 'testro' ),
						'icon'  => 'sparkles',
					),
				),
			),

			'sections' => array(

				/* 1. Why theTestRo for Test Execution ---------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'why-test-execution',
					'eyebrow' => __( 'Why theTestRo', 'testro' ),
					'title'   => __( 'Why theTestRo for Test Execution', 'testro' ),
					'intro'   => __( 'Execute smarter at every stage of delivery—across environments, in parallel, and continuously—so releases move faster without sacrificing quality.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'server',
							'stage'       => __( 'Environments', 'testro' ),
							'title'       => __( 'Execute Tests Faster Across Multiple Environments', 'testro' ),
							'description' => __( 'Run automated tests seamlessly across development, staging, and production environments with intelligent execution management.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'stage'       => __( 'Parallel', 'testro' ),
							'title'       => __( 'Run Large Test Suites in Parallel', 'testro' ),
							'description' => __( 'Reduce execution time significantly by running multiple test suites simultaneously across browsers and environments.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Continuous', 'testro' ),
							'title'       => __( 'Accelerate Continuous Testing', 'testro' ),
							'description' => __( 'Integrate continuous execution into every software release to ensure rapid feedback and higher software quality.', 'testro' ),
						),
					),
				),

				/* 2. Intelligent Test Execution Platform ------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'intelligent-test-execution-platform',
					'variant' => 'spotlight',
					'eyebrow' => __( 'Intelligent Test Execution Platform', 'testro' ),
					'title'   => __( 'Orchestrate, Optimize, and Observe Every Run', 'testro' ),
					'intro'   => __( 'Execute anywhere, optimize every run, embed continuous testing in delivery, and turn live execution data into release-ready insights—all from one AI-powered platform.', 'testro' ),
					'groups'  => array(
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Execute Tests Anywhere', 'testro' ),
							'description' => __( 'Cloud, local, cross-browser, and cross-platform execution without infrastructure friction.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'cloud',
									'title'       => __( 'Cloud-Based Test Execution', 'testro' ),
									'description' => __( 'Execute automated tests on scalable cloud infrastructure without managing hardware.', 'testro' ),
								),
								array(
									'icon'        => 'server',
									'title'       => __( 'Local Test Execution', 'testro' ),
									'description' => __( 'Run tests securely within local environments whenever required.', 'testro' ),
								),
								array(
									'icon'        => 'browsers',
									'title'       => __( 'Cross-Browser Execution', 'testro' ),
									'description' => __( 'Validate applications across Chrome, Firefox, Edge, Safari, and more.', 'testro' ),
								),
								array(
									'icon'        => 'layout-grid',
									'title'       => __( 'Cross-Platform Testing', 'testro' ),
									'description' => __( 'Execute tests across Windows, macOS, Linux, and enterprise environments.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Optimize Test Runs', 'testro' ),
							'description' => __( 'Parallelize, schedule, and trigger executions so suites finish faster with less waiting.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'infinity',
									'title'       => __( 'Parallel Execution', 'testro' ),
									'description' => __( 'Execute multiple tests simultaneously to reduce execution time.', 'testro' ),
								),
								array(
									'icon'        => 'calendar-sync',
									'title'       => __( 'Scheduled Test Runs', 'testro' ),
									'description' => __( 'Automatically execute tests on predefined schedules.', 'testro' ),
								),
								array(
									'icon'        => 'zap',
									'title'       => __( 'On-Demand Execution', 'testro' ),
									'description' => __( 'Launch test executions instantly whenever required.', 'testro' ),
								),
								array(
									'icon'        => 'git-branch',
									'title'       => __( 'Build Triggered Execution', 'testro' ),
									'description' => __( 'Automatically trigger test execution after every software build.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Continuous Test Execution', 'testro' ),
							'description' => __( 'Keep quality gates running inside every pipeline, regression, and smoke check.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'plug',
									'title'       => __( 'CI/CD Integration', 'testro' ),
									'description' => __( 'Integrate automated execution into modern DevOps pipelines.', 'testro' ),
								),
								array(
									'icon'        => 'rocket',
									'title'       => __( 'Automated Pipeline Execution', 'testro' ),
									'description' => __( 'Validate every deployment using continuous automated execution.', 'testro' ),
								),
								array(
									'icon'        => 'refresh',
									'title'       => __( 'Regression Test Execution', 'testro' ),
									'description' => __( 'Automatically execute regression suites before every release.', 'testro' ),
								),
								array(
									'icon'        => 'activity',
									'title'       => __( 'Smoke Test Execution', 'testro' ),
									'description' => __( 'Quickly verify application health after every deployment.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Execution Insights & Analytics', 'testro' ),
							'description' => __( 'Monitor progress, evidence, and AI diagnostics that prove release readiness.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'activity',
									'title'       => __( 'Real-Time Execution Dashboard', 'testro' ),
									'description' => __( 'Monitor execution progress and system health in real time.', 'testro' ),
								),
								array(
									'icon'        => 'folder-tree',
									'title'       => __( 'Execution Logs', 'testro' ),
									'description' => __( 'Review detailed execution logs for every test run.', 'testro' ),
								),
								array(
									'icon'        => 'scan-eye',
									'title'       => __( 'Screenshots & Video Recording', 'testro' ),
									'description' => __( 'Capture complete visual evidence for every execution.', 'testro' ),
								),
								array(
									'icon'        => 'microscope',
									'title'       => __( 'AI Failure Analysis', 'testro' ),
									'description' => __( 'Identify root causes faster using AI-powered diagnostics.', 'testro' ),
								),
								array(
									'icon'        => 'badge-check',
									'title'       => __( 'Release Readiness Reports', 'testro' ),
									'description' => __( 'Determine whether applications are ready for production deployment.', 'testro' ),
								),
							),
						),
					),
				),

				/* 3. Live analytics proof ---------------------------------- */
				array(
					'type'      => 'analytics',
					'id'        => 'live-execution-insights',
					'eyebrow'   => __( 'Live Execution Insights', 'testro' ),
					'title'     => __( 'See Parallel Progress, Queue Health, and Release Readiness in Real Time', 'testro' ),
					'intro'     => __( 'Track running tests, browser and environment status, queue depth, and AI monitoring from a premium execution dashboard built for enterprise continuous testing.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Running Tests & Progress', 'testro' ),
							'description' => __( 'Watch live suite progress with animated status across every active run.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Parallel Execution View', 'testro' ),
							'description' => __( 'Visualize how concurrent suites share cloud capacity without blocking releases.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Browser & Environment Status', 'testro' ),
							'description' => __( 'Confirm browser and environment health before and during every execution.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Queue Manager', 'testro' ),
							'description' => __( 'Prioritize and throttle queued runs so critical releases always go first.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI Monitoring', 'testro' ),
							'description' => __( 'Surface anomalies and flaky patterns while executions are still in flight.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Execution Control', 'testro' ),
						'build'     => __( 'Release 3.1 · Parallel grid', 'testro' ),
						'status'    => __( 'Executing', 'testro' ),
						'score'     => 94,
						'tiles'     => array(
							array(
								'label' => __( 'Running', 'testro' ),
								'value' => '128',
								'trend' => __( 'Live now', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Parallel', 'testro' ),
								'value' => '32x',
								'trend' => __( 'Cloud nodes', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Queued', 'testro' ),
								'value' => '14',
								'trend' => __( 'Next window', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Readiness', 'testro' ),
								'value' => '94%',
								'trend' => __( 'Gate ready', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Execution throughput', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 68,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 76,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 84,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 91,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 94,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 72,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 81,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'Chrome grid', 'testro' ),
								'value' => 97,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'Staging env', 'testro' ),
								'value' => 93,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'Queue depth', 'testro' ),
								'value' => 78,
								'tone'  => 'warning',
							),
						),
					),
				),

				/* 4. Execute Across Every Testing Environment -------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'execute-across-environments',
					'eyebrow' => __( 'Multi-Platform Execution', 'testro' ),
					'title'   => __( 'Execute Across Every Testing Environment', 'testro' ),
					'intro'   => __( 'One AI Test Execution hub orchestrates web, mobile, API, enterprise, and cross-browser runs—with live execution indicators for every surface.', 'testro' ),
					'hub'     => array(
						'icon'  => 'zap',
						'label' => __( 'AI Test Execution', 'testro' ),
						'sub'   => __( 'Unified execution hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Web Applications', 'testro' ),
							'description' => __( 'Execute automated web tests across multiple browsers.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Mobile Applications', 'testro' ),
							'description' => __( 'Run reliable mobile automation across Android and iOS devices.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'APIs', 'testro' ),
							'description' => __( 'Execute backend API automation independently or alongside UI testing.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Enterprise Applications', 'testro' ),
							'description' => __( 'Support large-scale ERP, CRM, and enterprise platforms.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Validate user experiences consistently across every supported browser.', 'testro' ),
						),
					),
				),

				/* 5. DevOps workflow --------------------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'devops-execution-workflow',
					'eyebrow' => __( 'DevOps Workflow', 'testro' ),
					'title'   => __( 'From Commit to Release with AI Test Execution', 'testro' ),
					'intro'   => __( 'Animate quality through every delivery step—developers commit, pipelines trigger, AI Test Execution validates, and releases ship with confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'user-check',
							'stage'       => __( 'Developer', 'testro' ),
							'title'       => __( 'Developer', 'testro' ),
							'description' => __( 'Engineers push changes knowing automated execution will guard every build.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Commit', 'testro' ),
							'title'       => __( 'Commit Code', 'testro' ),
							'description' => __( 'Source control events kick off continuous quality without manual handoffs.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'stage'       => __( 'CI/CD', 'testro' ),
							'title'       => __( 'CI/CD Pipeline', 'testro' ),
							'description' => __( 'Pipelines invoke theTestRo as a first-class quality gate in delivery.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Execute', 'testro' ),
							'title'       => __( 'AI Test Execution', 'testro' ),
							'description' => __( 'Intelligent orchestration runs suites in parallel with live monitoring.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Release', 'testro' ),
							'description' => __( 'Teams ship when readiness reports confirm quality with confidence.', 'testro' ),
						),
					),
				),

				/* 6. Integrate with DevOps ecosystem ----------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'integrate-devops-ecosystem',
					'eyebrow' => __( 'DevOps Integration', 'testro' ),
					'title'   => __( 'Integrate with Your DevOps Ecosystem', 'testro' ),
					'intro'   => __( 'Integrate seamlessly with your existing DevOps workflow to automate test execution throughout your software delivery lifecycle. Execute tests automatically after every build, deployment, or release while keeping development and QA teams fully synchronized.', 'testro' ),
					'hub'     => array(
						'icon'  => 'infinity',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Execution hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Sync defects, stories, and execution outcomes with engineering trackers.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger and report automated runs from pull requests and repositories.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Launch parallel suites from Jenkins jobs on every build.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed execution gates inside Azure pipelines and release stages.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Notify teams instantly when runs fail, recover, or clear release gates.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted By', 'testro' ),
					'title'   => __( 'Chosen by Teams Scaling Enterprise Test Execution', 'testro' ),
					'intro'   => __( 'QA and engineering organizations rely on theTestRo to execute larger suites faster, improve reliability, and accelerate continuous testing.', 'testro' ),
				),

				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'How Teams Execute Faster and Release with Confidence', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo\'s Test Execution Platform to execute larger test suites faster, reduce release cycles, improve execution reliability, scale enterprise automation, accelerate continuous testing, and increase software quality.', 'testro' ),
				),

				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Test Execution FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'test-lab',
				),

				array(
					'type'       => 'cta',
					'id'         => 'get-started-test-execution',
					'title'      => __( 'Execute Smarter. Release Faster. Deliver Quality with Confidence.', 'testro' ),
					'intro'      => __( 'Scale your software testing with theTestRo\'s AI-Powered Test Execution Platform. Execute tests across browsers, environments, and applications using intelligent automation, real-time monitoring, and enterprise-grade execution infrastructure to accelerate every software release.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		'ci-cd-integration' => array(
			'slug'   => 'ci-cd-integration',
			'title'  => __( 'AI-Powered CI/CD Integration for Continuous Testing', 'testro' ),
			'seo'    => array(
				'title'       => __( 'AI-Powered CI/CD Integration | Continuous Testing & Pipeline Automation | theTestRo', 'testro' ),
				'description' => __( 'AI-Powered CI/CD Integration for Continuous Testing with theTestRo. Automate CI/CD Test Automation, DevOps Testing, Continuous Quality, and Pipeline Automation—trigger tests on every commit, enforce quality gates, and accelerate releases.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'AI-Powered CI/CD Integration', 'testro' ),
				'title'    => __( 'AI-Powered CI/CD Integration for Continuous Testing', 'testro' ),
				'subtitle' => __( 'Accelerate software delivery with theTestRo\'s AI-powered CI/CD Integration platform. Automate testing across every code commit, build, and deployment using intelligent pipeline orchestration, continuous quality validation, AI-powered test execution, and enterprise DevOps integrations. Deliver faster releases with greater confidence while reducing manual effort and improving software quality.', 'testro' ),
				'badges'   => array(
					__( 'Pipeline Automation', 'testro' ),
					__( 'Quality Gates', 'testro' ),
					__( 'AI Test Execution', 'testro' ),
					__( 'DevOps Native', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '50%',
						'label' => __( 'Faster releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => 'Auto',
						'label' => __( 'Commit & build triggers', 'testro' ),
						'icon'  => 'zap',
					),
					array(
						'value' => '98%',
						'label' => __( 'Quality gate pass rate', 'testro' ),
						'icon'  => 'badge-check',
					),
				),
			),

			'sections' => array(

				/* 1. Integrate testing into DevOps pipeline ---------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'integrate-devops-pipeline',
					'eyebrow' => __( 'Integrate Automated Testing into Your DevOps Pipeline', 'testro' ),
					'title'   => __( 'Connect Testing with Development Workflows', 'testro' ),
					'intro'   => __( 'Seamlessly integrate automated testing into your existing software development lifecycle.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'user-check',
							'stage'       => __( 'Developer', 'testro' ),
							'title'       => __( 'Developer', 'testro' ),
							'description' => __( 'Connect testing with development workflows so engineers ship changes with continuous quality in the loop.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Git Commit', 'testro' ),
							'title'       => __( 'Automate Test Execution on Code Changes', 'testro' ),
							'description' => __( 'Automatically trigger tests whenever developers commit code or create pull requests.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'stage'       => __( 'Build', 'testro' ),
							'title'       => __( 'Build', 'testro' ),
							'description' => __( 'Pipeline builds invoke automated testing as a first-class quality step in delivery.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Testing', 'testro' ),
							'title'       => __( 'Automated Testing', 'testro' ),
							'description' => __( 'AI-powered suites execute across environments the moment the pipeline needs validation.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'stage'       => __( 'Validation', 'testro' ),
							'title'       => __( 'Enable Continuous Quality Validation', 'testro' ),
							'description' => __( 'Ensure every software build meets quality standards before deployment.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Deploy', 'testro' ),
							'title'       => __( 'Deployment', 'testro' ),
							'description' => __( 'Approved builds proceed to deployment with continuous quality baked into the release path.', 'testro' ),
						),
					),
				),

				/* 2. Automated test execution across pipelines ------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'automated-pipeline-execution',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Pipeline Automation', 'testro' ),
					'title'   => __( 'Automated Test Execution Across CI/CD Pipelines', 'testro' ),
					'intro'   => __( 'Trigger, execute, and validate tests at every pipeline milestone—from the first commit through final release.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Commit-Based Test Triggers', 'testro' ),
							'description' => __( 'Automatically execute tests whenever code changes are committed.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Build-Based Test Execution', 'testro' ),
							'description' => __( 'Run validation suites immediately after every successful build.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Deployment Validation', 'testro' ),
							'description' => __( 'Verify application quality before deployment to production.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Release Pipeline Testing', 'testro' ),
							'description' => __( 'Continuously validate releases across every stage of the pipeline.', 'testro' ),
						),
					),
				),

				/* 3. Seamless DevOps tool integration ---------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'seamless-devops-tools',
					'eyebrow' => __( 'DevOps Tools', 'testro' ),
					'title'   => __( 'Seamless Integration with DevOps Tools', 'testro' ),
					'intro'   => __( 'Connect seamlessly with your existing DevOps ecosystem to automate testing across every build, deployment, and release pipeline.', 'testro' ),
					'hub'     => array(
						'icon'  => 'infinity',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Continuous Testing', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Launch automated suites from Jenkins jobs on every build and promotion.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub Actions', 'testro' ),
							'description' => __( 'Trigger and report continuous testing from pull requests and workflows.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'GitLab CI/CD', 'testro' ),
							'description' => __( 'Embed quality gates inside GitLab pipelines and merge-request checks.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Wire theTestRo into Azure pipelines and release stages as a native gate.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'CircleCI', 'testro' ),
							'description' => __( 'Orchestrate parallel test runs from CircleCI workflows with live feedback.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Bamboo', 'testro' ),
							'description' => __( 'Connect Bamboo plans so continuous testing protects every deployment path.', 'testro' ),
						),
					),
				),

				/* 4. AI continuous testing workflow ------------------------ */
				array(
					'type'    => 'lifecycle',
					'id'      => 'ai-continuous-testing-workflow',
					'eyebrow' => __( 'AI-Powered Continuous Testing Workflow', 'testro' ),
					'title'   => __( 'AI-Powered Continuous Testing Workflow', 'testro' ),
					'intro'   => __( 'Generate, execute, analyze, and self-heal tests inside every pipeline—so releases move forward with continuous confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI Test Generation', 'testro' ),
							'description' => __( 'Automatically generate optimized test scenarios using AI.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Automated Regression Execution', 'testro' ),
							'description' => __( 'Run regression suites automatically during every pipeline execution.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Intelligent Test Selection', 'testro' ),
							'description' => __( 'Execute only the most relevant tests based on recent code changes.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Failure Detection', 'testro' ),
							'description' => __( 'Detect failures immediately using AI-powered diagnostics.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Test Maintenance Automation', 'testro' ),
							'description' => __( 'Reduce maintenance effort through intelligent automation and self-healing.', 'testro' ),
						),
						array(
							'icon'        => 'circle-check',
							'title'       => __( 'Ready for Release', 'testro' ),
							'description' => __( 'Advance only when continuous testing signals confirm release readiness.', 'testro' ),
						),
					),
				),

				/* 5. Quality gates analytics ------------------------------- */
				array(
					'type'      => 'analytics',
					'id'        => 'quality-gates-faster-releases',
					'eyebrow'   => __( 'Quality Gates', 'testro' ),
					'title'     => __( 'Quality Gates for Faster Releases', 'testro' ),
					'intro'     => __( 'Enforce automated build validation, clear pass/fail criteria, and release risk insights so only production-ready builds advance.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Automated Build Validation', 'testro' ),
							'description' => __( 'Automatically verify software quality before deployment.', 'testro' ),
						),
						array(
							'icon'        => 'circle-check',
							'title'       => __( 'Pass/Fail Criteria Management', 'testro' ),
							'description' => __( 'Define custom quality gates based on business requirements.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Release Risk Assessment', 'testro' ),
							'description' => __( 'Evaluate release risk using intelligent analytics.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Deployment Approval Insights', 'testro' ),
							'description' => __( 'Provide AI-powered recommendations before approving production deployments.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Quality Gate', 'testro' ),
						'build'     => __( 'Release 4.2 · Pipeline gate', 'testro' ),
						'status'    => __( 'Approved', 'testro' ),
						'score'     => 96,
						'tiles'     => array(
							array(
								'label' => __( 'Gate score', 'testro' ),
								'value' => '96%',
								'trend' => __( 'Release ready', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Build checks', 'testro' ),
								'value' => 'Pass',
								'trend' => __( 'All green', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Failed suites', 'testro' ),
								'value' => '0',
								'trend' => __( 'Blocking clear', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Risk level', 'testro' ),
								'value' => 'Low',
								'trend' => __( 'Deploy approved', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Gate pass rate', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 88,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 91,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 94,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 96,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 97,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 93,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 95,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'Regression pack', 'testro' ),
								'value' => 98,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'Smoke checks', 'testro' ),
								'value' => 100,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'Flaky rate', 'testro' ),
								'value' => 82,
								'tone'  => 'warning',
							),
						),
					),
				),

				/* 6. Test orchestration ------------------------------------ */
				array(
					'type'    => 'feature-grid',
					'id'      => 'test-orchestration-management',
					'variant' => 'tint',
					'columns' => 4,
					'eyebrow' => __( 'Orchestration', 'testro' ),
					'title'   => __( 'Test Orchestration & Execution Management', 'testro' ),
					'intro'   => __( 'Schedule, parallelize, and control pipeline test runs across every environment your release path touches.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Scheduled Pipeline Runs', 'testro' ),
							'description' => __( 'Automatically execute pipelines on predefined schedules.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Parallel Test Execution', 'testro' ),
							'description' => __( 'Reduce execution time by running tests simultaneously.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Multi-Environment Testing', 'testro' ),
							'description' => __( 'Validate builds across development, staging, and production.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Test Execution Control', 'testro' ),
							'description' => __( 'Manage execution priorities, queues, and orchestration centrally.', 'testro' ),
						),
					),
				),

				/* 7. Real-time feedback analytics -------------------------- */
				array(
					'type'      => 'analytics',
					'id'        => 'realtime-pipeline-feedback',
					'eyebrow'   => __( 'Real-Time Feedback', 'testro' ),
					'title'     => __( 'Real-Time Test Feedback & Analytics', 'testro' ),
					'intro'     => __( 'Give engineering and QA instant visibility into pipeline execution results, failures, evidence, and trends—while runs are still in flight.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Pipeline Execution Results', 'testro' ),
							'description' => __( 'Track every pipeline execution in real time.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Failure Reports', 'testro' ),
							'description' => __( 'Access detailed failure diagnostics immediately.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Execution Logs', 'testro' ),
							'description' => __( 'Review comprehensive execution logs for every pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Screenshots & Videos', 'testro' ),
							'description' => __( 'Capture complete visual evidence for failed executions.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Test Trend Analysis', 'testro' ),
							'description' => __( 'Monitor quality improvements and testing trends over time.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Pipeline Analytics', 'testro' ),
						'build'     => __( 'main · CI run #1842', 'testro' ),
						'status'    => __( 'Running', 'testro' ),
						'score'     => 91,
						'tiles'     => array(
							array(
								'label' => __( 'Pipeline', 'testro' ),
								'value' => 'Live',
								'trend' => __( 'Status green', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Success rate', 'testro' ),
								'value' => '91%',
								'trend' => __( '7-day trend', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Failures', 'testro' ),
								'value' => '3',
								'trend' => __( 'Needs review', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'AI insights', 'testro' ),
								'value' => '12',
								'trend' => __( 'Active signals', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Execution timeline', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 72,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 81,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 86,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 90,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 91,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 78,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 84,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'Test trends', 'testro' ),
								'value' => 91,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'Failure reports', 'testro' ),
								'value' => 74,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'AI insights', 'testro' ),
								'value' => 88,
								'tone'  => 'healthy',
							),
						),
					),
				),

				/* 8. Developer-centric experience -------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'developer-centric-testing',
					'eyebrow' => __( 'Developer Experience', 'testro' ),
					'title'   => __( 'Developer-Centric Testing Experience', 'testro' ),
					'intro'   => __( 'Create seamless collaboration throughout the software delivery lifecycle—from pull request validation to merge.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'user-check',
							'stage'       => __( 'Developer', 'testro' ),
							'title'       => __( 'Developer', 'testro' ),
							'description' => __( 'Engineers get continuous testing feedback without leaving their delivery workflow.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Pull Request', 'testro' ),
							'title'       => __( 'Pull Request Validation', 'testro' ),
							'description' => __( 'Automatically validate pull requests before merging.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'AI Testing', 'testro' ),
							'title'       => __( 'Faster Debugging', 'testro' ),
							'description' => __( 'Reduce investigation time using AI-powered diagnostics.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'stage'       => __( 'Review', 'testro' ),
							'title'       => __( 'Instant Failure Notifications', 'testro' ),
							'description' => __( 'Notify developers immediately when failures occur.', 'testro' ),
						),
						array(
							'icon'        => 'circle-check',
							'stage'       => __( 'Merge', 'testro' ),
							'title'       => __( 'Collaboration Between QA & Development', 'testro' ),
							'description' => __( 'Create seamless collaboration throughout the software delivery lifecycle.', 'testro' ),
						),
					),
				),

				/* 9. Enterprise CI/CD automation --------------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'enterprise-cicd-automation',
					'variant' => 'brand',
					'columns' => 4,
					'eyebrow' => __( 'Enterprise Ready', 'testro' ),
					'title'   => __( 'Enterprise CI/CD Automation', 'testro' ),
					'intro'   => __( 'Scale continuous testing across projects, teams, and security boundaries without sacrificing pipeline speed.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'server',
							'title'       => __( 'Scalable Test Infrastructure', 'testro' ),
							'description' => __( 'Scale automated testing across enterprise pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Secure Pipeline Integration', 'testro' ),
							'description' => __( 'Protect development pipelines using enterprise-grade security.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Role-Based Access Control', 'testro' ),
							'description' => __( 'Manage permissions securely across multiple teams.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Multi-Project Management', 'testro' ),
							'description' => __( 'Support multiple products and projects from a centralized platform.', 'testro' ),
						),
					),
				),

				/* 10. Supported integrations ------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'supported-cicd-integrations',
					'eyebrow' => __( 'Integrations', 'testro' ),
					'title'   => __( 'Supported CI/CD Integrations', 'testro' ),
					'intro'   => __( 'Integrate effortlessly with your preferred CI/CD, DevOps, collaboration, and project management tools to build a fully automated continuous testing pipeline.', 'testro' ),
					'hub'     => array(
						'icon'  => 'plug',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'CI/CD Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Native job triggers and status reporting for classic and modern Jenkins fleets.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub Actions', 'testro' ),
							'description' => __( 'Workflow checks, PR annotations, and branch protection friendly results.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'GitLab CI/CD', 'testro' ),
							'description' => __( 'Pipeline jobs and merge-request quality signals inside GitLab.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Build and release stage gates across Azure DevOps projects.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'CircleCI', 'testro' ),
							'description' => __( 'Workflow-aware continuous testing for CircleCI delivery pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Sync defects, stories, and pipeline outcomes with engineering trackers.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Notify channels instantly when gates fail, recover, or clear for deploy.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted By', 'testro' ),
					'title'   => __( 'Chosen by Teams Automating Continuous Quality in CI/CD', 'testro' ),
					'intro'   => __( 'Engineering, DevOps, and QA organizations rely on theTestRo to embed continuous testing in pipelines, enforce quality gates, and accelerate every release.', 'testro' ),
				),

				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'How Teams Ship Faster with Continuous Testing in the Pipeline', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo CI/CD Integration to automate pipeline testing, enforce quality gates, reduce release risk, accelerate DevOps feedback, and deliver continuous quality at scale.', 'testro' ),
				),

				array(
					'type'    => 'faq',
					'eyebrow' => __( 'CI/CD Integration FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'ci-cd-integration',
				),

				array(
					'type'       => 'cta',
					'id'         => 'get-started-cicd-integration',
					'title'      => __( 'Accelerate Software Delivery with Continuous AI-Powered Testing', 'testro' ),
					'intro'      => __( 'Transform your DevOps workflow with theTestRo\'s AI-powered CI/CD Integration platform. Automate testing across every build, deployment, and release while improving software quality, accelerating delivery, and enabling continuous confidence through intelligent automation.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),
		'playwright-test-automation' => array(
			'slug'   => 'playwright-test-automation',
			'title'  => __( 'Playwright Testing Automation Platform', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Playwright Testing Automation Platform | Playwright Export & AI Test Code Generation | theTestRo', 'testro' ),
				'description' => __( 'theTestRo Playwright Export turns AI visual test creation into production-ready TypeScript Playwright scripts. Build automation visually, export developer-ready code, run cross-browser suites, integrate Playwright CI/CD pipelines, and maintain tests with AI self-healing.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'AI-Powered Playwright Export', 'testro' ),
				'title'    => __( 'Playwright Testing Automation Platform', 'testro' ),
				'subtitle' => __( 'Create automated tests visually using AI and instantly export them into production-ready Playwright-compatible frameworks. Bridge the gap between no-code automation and developer-first workflows while maintaining complete flexibility, scalability, and enterprise-grade testing capabilities.', 'testro' ),
				'badges'   => array(
					__( 'AI Visual Builder', 'testro' ),
					__( 'Instant Playwright Export', 'testro' ),
					__( 'TypeScript Ready', 'testro' ),
					__( 'CI/CD Native', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '1-Click',
						'label' => __( 'Playwright export', 'testro' ),
						'icon'  => 'code',
					),
					array(
						'value' => '−70%',
						'label' => __( 'Scripting effort', 'testro' ),
						'icon'  => 'trending-up',
					),
					array(
						'value' => 'TypeScript',
						'label' => __( 'Playwright ready', 'testro' ),
						'icon'  => 'sparkles',
					),
				),
			),

			'sections' => array(

				/* 1. Visual to Playwright pipeline ------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'visual-to-playwright',
					'eyebrow' => __( 'From Visual to Playwright', 'testro' ),
					'title'   => __( 'Build Tests Visually, Export Developer-Ready Code', 'testro' ),
					'intro'   => __( 'Create complete automation workflows with AI-powered visual test creation, then export clean Playwright code developers can customize and run anywhere.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'layout-grid',
							'stage'       => __( 'Visual Builder', 'testro' ),
							'title'       => __( 'Create Tests Without Writing Scripts', 'testro' ),
							'description' => __( 'Build complete automation workflows using AI-powered visual test creation.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'AI Generates Workflow', 'testro' ),
							'title'       => __( 'Convert Automated Workflows into Playwright Code', 'testro' ),
							'description' => __( 'Instantly generate clean, structured Playwright-compatible code from visual automation.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'stage'       => __( 'Playwright Code', 'testro' ),
							'title'       => __( 'Production-Ready Scripts', 'testro' ),
							'description' => __( 'Export TypeScript Playwright tests following modern framework best practices.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'stage'       => __( 'Developer Customization', 'testro' ),
							'title'       => __( 'Maintain Developer Flexibility', 'testro' ),
							'description' => __( 'Allow developers to customize exported Playwright scripts without restrictions.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Execution', 'testro' ),
							'title'       => __( 'Bridge No-Code and Code-Based Automation', 'testro' ),
							'description' => __( 'Combine business-user accessibility with developer-grade automation frameworks.', 'testro' ),
						),
					),
				),

				/* 2. AI Playwright code generation ------------------------- */
				array(
					'type'          => 'request-response',
					'id'            => 'ai-playwright-code-generation',
					'eyebrow'       => __( 'AI Test Code Generation', 'testro' ),
					'title'         => __( 'Convert Visual Workflows into Playwright Scripts', 'testro' ),
					'intro'         => __( 'Instantly generate clean, structured Playwright-compatible TypeScript from visual automation—ready for IDE customization and CI/CD.', 'testro' ),
					'process_label' => __( 'AI Code Generation', 'testro' ),
					'request_label' => __( 'Visual Builder', 'testro' ),
					'response_label' => __( 'Playwright Export', 'testro' ),
					'pass_label'    => __( 'Exported', 'testro' ),
					'flow_aria'     => __( 'Visual test builder converting into exported Playwright TypeScript', 'testro' ),
					'request'       => array(
						'method' => 'VISUAL',
						'path'   => 'login-checkout.flow',
						'body'   => array(
							'1. Open /login',
							'2. Fill email & password',
							'3. Click Sign in',
							'4. Expect /dashboard',
							'5. Assert welcome banner',
						),
					),
					'response'      => array(
						'status' => 'login.spec.ts',
						'body'   => array(
							"import { test, expect } from '@playwright/test';",
							'',
							"test('user can sign in', async ({ page }) => {",
							"  await page.goto('/login');",
							"  await page.getByLabel('Email').fill('qa@example.com');",
							"  await page.getByLabel('Password').fill('••••••••');",
							"  await page.getByRole('button', { name: 'Sign in' }).click();",
							"  await expect(page).toHaveURL('/dashboard');",
							"  await expect(page.getByRole('banner')).toContainText('Welcome');",
							'});',
						),
					),
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Create Tests Without Writing Scripts', 'testro' ),
							'description' => __( 'Build complete automation workflows using AI-powered visual test creation.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Convert Automated Workflows into Playwright Code', 'testro' ),
							'description' => __( 'Instantly generate clean, structured Playwright-compatible code from visual automation.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Maintain Developer Flexibility', 'testro' ),
							'description' => __( 'Allow developers to customize exported Playwright scripts without restrictions.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Bridge No-Code and Code-Based Automation', 'testro' ),
							'description' => __( 'Combine business-user accessibility with developer-grade automation frameworks.', 'testro' ),
						),
					),
				),

				/* 3. Scalable Playwright scripts --------------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'scalable-playwright-scripts',
					'variant' => 'spotlight',
					'eyebrow' => __( 'Generate Scalable Playwright Test Scripts', 'testro' ),
					'title'   => __( 'AI-Assisted Playwright Code Built for Enterprise Scale', 'testro' ),
					'intro'   => __( 'Generate optimized, modular Playwright assets that stay maintainable as suites grow.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Assisted Test Code Generation', 'testro' ),
							'description' => __( 'Generate clean Playwright TypeScript from visual workflows with AI recommendations that follow modern testing patterns.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Playwright Test Framework Compatibility', 'testro' ),
							'description' => __( 'Export scripts aligned with the official Playwright Test runner, fixtures, and project configuration conventions.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Reusable Test Components', 'testro' ),
							'description' => __( 'Modularize page objects, shared steps, and helper utilities so exported suites scale without duplication.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Structured Test Automation Assets', 'testro' ),
							'description' => __( 'Organize specs, fixtures, and data files into a predictable folder structure developers can adopt immediately.', 'testro' ),
						),
					),
				),

				/* 4. Cross-browser Playwright execution -------------------- */
				array(
					'type'    => 'browsers',
					'id'      => 'playwright-cross-browser',
					'eyebrow' => __( 'Run Across Browsers & Platforms', 'testro' ),
					'title'   => __( 'Run Playwright Tests Across Browsers & Platforms', 'testro' ),
					'intro'   => __( 'Execute exported Playwright automation consistently across Chromium, Firefox, WebKit, desktop browsers, and operating systems with parallel cloud execution.', 'testro' ),
					'items'   => array(
						array(
							'name'     => __( 'Chromium', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 92,
							'tone'     => 'running',
						),
						array(
							'name'     => __( 'Firefox', 'testro' ),
							'status'   => __( 'Queued', 'testro' ),
							'progress' => 64,
							'tone'     => 'queued',
						),
						array(
							'name'     => __( 'WebKit', 'testro' ),
							'status'   => __( 'Passed', 'testro' ),
							'progress' => 100,
							'tone'     => 'passed',
						),
						array(
							'name'     => __( 'Desktop', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 78,
							'tone'     => 'running',
						),
					),
					'parallel' => array(
						'title'       => __( 'Parallel Execution', 'testro' ),
						'description' => __( 'Fan Playwright suites across cloud workers for faster feedback.', 'testro' ),
						'stat'        => '4×',
						'stat_label'  => __( 'Faster suites', 'testro' ),
					),
				),

				/* 5. Enterprise Playwright cloud scale --------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'enterprise-playwright-scale',
					'eyebrow' => __( 'Execute at Enterprise Scale', 'testro' ),
					'title'   => __( 'Execute Playwright Tests at Enterprise Scale', 'testro' ),
					'intro'   => __( 'Run Playwright automation on scalable cloud infrastructure with parallel workers and unified results.', 'testro' ),
					'hub'     => array(
						'icon'  => 'cloud',
						'label' => __( 'theTestRo Cloud', 'testro' ),
						'sub'   => __( 'Parallel Execution', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Parallel Test Execution', 'testro' ),
							'description' => __( 'Run hundreds of Playwright specs simultaneously across cloud workers to shrink feedback loops.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Cloud-Based Execution', 'testro' ),
							'description' => __( 'Execute exported Playwright suites on elastic infrastructure without managing browser grids yourself.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Distributed Test Runs', 'testro' ),
							'description' => __( 'Shard large Playwright projects across workers and environments for consistent, repeatable results.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Reduced Execution Time', 'testro' ),
							'description' => __( 'Cut suite duration with intelligent orchestration and parallel fan-out across browser targets.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Scalable Test Infrastructure', 'testro' ),
							'description' => __( 'Scale Playwright automation from smoke packs to enterprise regression without re-architecting your pipeline.', 'testro' ),
						),
					),
				),

				/* 6. Playwright CI/CD workflow ----------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'playwright-cicd-workflow',
					'eyebrow' => __( 'Integrate into CI/CD', 'testro' ),
					'title'   => __( 'Integrate Playwright Tests into CI/CD Pipelines', 'testro' ),
					'intro'   => __( 'Wire exported Playwright suites into your DevOps workflow—from developer commit through release.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'user-check',
							'stage'       => __( 'Developer', 'testro' ),
							'title'       => __( 'Developer', 'testro' ),
							'description' => __( 'Authors and exports Playwright specs from visual workflows, then commits them alongside application code.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'GitHub', 'testro' ),
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Pull requests trigger Playwright validation so every change is checked before merge.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'stage'       => __( 'CI/CD', 'testro' ),
							'title'       => __( 'CI/CD', 'testro' ),
							'description' => __( 'Pipeline jobs orchestrate exported Playwright suites as a native quality gate on every build.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Playwright Execution', 'testro' ),
							'title'       => __( 'Playwright Execution', 'testro' ),
							'description' => __( 'AI-powered cloud execution runs Playwright tests in parallel across browsers and environments.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Release', 'testro' ),
							'description' => __( 'Approved builds advance to production with continuous Playwright confidence baked into delivery.', 'testro' ),
						),
					),
				),

				/* 7. Playwright DevOps integrations ------------------------ */
				array(
					'type'    => 'architecture',
					'id'      => 'playwright-devops-integrations',
					'eyebrow' => __( 'DevOps Integrations', 'testro' ),
					'title'   => __( 'Native CI/CD Integrations for Playwright Automation', 'testro' ),
					'intro'   => __( 'Automate Playwright execution across the delivery tools your teams already use.', 'testro' ),
					'hub'     => array(
						'icon'  => 'plug',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Playwright Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Trigger exported Playwright suites from Jenkins jobs on every build and promotion.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub Actions', 'testro' ),
							'description' => __( 'Run Playwright checks on pull requests and deployment workflows with native status reporting.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'GitLab CI/CD', 'testro' ),
							'description' => __( 'Embed Playwright quality gates inside GitLab pipelines and merge-request validation.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Wire theTestRo into Azure pipelines and release stages as a Playwright automation gate.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Automated Build Validation', 'testro' ),
							'description' => __( 'Validate every build before deployment using automated Playwright testing.', 'testro' ),
						),
					),
				),

				/* 8. Debug Playwright failures ----------------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'debug-playwright-failures',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Faster Debugging', 'testro' ),
					'title'   => __( 'Debug Playwright Test Failures Faster', 'testro' ),
					'intro'   => __( 'Investigate failures with rich diagnostics—logs, screenshots, video, network, console, and traces.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Execution Logs', 'testro' ),
							'description' => __( 'Inspect step-level Playwright commands, assertions, and timing details without leaving the platform.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Screenshots', 'testro' ),
							'description' => __( 'Capture the exact UI state at every failing step across Chromium, Firefox, and WebKit runs.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Video Recordings', 'testro' ),
							'description' => __( 'Replay full Playwright sessions to reproduce navigation, timing, and interaction issues quickly.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Network Logs', 'testro' ),
							'description' => __( 'Review HTTP requests and responses captured during Playwright execution for API-related failures.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Console Logs', 'testro' ),
							'description' => __( 'Surface browser console errors and warnings alongside test steps for faster root-cause analysis.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Test Trace Analysis', 'testro' ),
							'description' => __( 'Open Playwright trace artifacts to inspect DOM snapshots, network activity, and step timelines in one view.', 'testro' ),
						),
					),
				),

				/* 9. AI Playwright maintenance ----------------------------- */
				array(
					'type'    => 'healing',
					'id'      => 'ai-playwright-maintenance',
					'eyebrow' => __( 'Intelligent Test Maintenance', 'testro' ),
					'title'   => __( 'Intelligent Test Maintenance with AI', 'testro' ),
					'intro'   => __( 'Keep exported Playwright scripts healthy as UIs change—detect broken locators, update them automatically, and continue execution.', 'testro' ),
					'steps'   => array(
						array(
							'icon'  => 'alert-octagon',
							'label' => __( 'Broken Locator', 'testro' ),
						),
						array(
							'icon'  => 'scan-eye',
							'label' => __( 'AI Detection', 'testro' ),
						),
						array(
							'icon'  => 'wand',
							'label' => __( 'Locator Update', 'testro' ),
						),
						array(
							'icon'  => 'code',
							'label' => __( 'Playwright Script Updated', 'testro' ),
						),
						array(
							'icon'  => 'circle-check',
							'label' => __( 'Successful Execution', 'testro' ),
						),
					),
					'items'   => array(
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Locators', 'testro' ),
							'description' => __( 'Automatically repair broken locators in exported Playwright scripts when the UI shifts.', 'testro' ),
						),
						array(
							'icon'        => 'crosshair',
							'title'       => __( 'Dynamic Element Detection', 'testro' ),
							'description' => __( 'Identify updated elements using multiple locator strategies so Playwright steps stay resilient.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Reduced Script Maintenance', 'testro' ),
							'description' => __( 'Cut manual locator rework and keep Playwright suites trustworthy across every release.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Automatic Failure Recovery', 'testro' ),
							'description' => __( 'Recover failed Playwright steps mid-run and persist healed locators for the next execution.', 'testro' ),
						),
					),
				),

				/* 10. Playwright analytics ----------------------------------- */
				array(
					'type'      => 'analytics',
					'id'        => 'playwright-analytics',
					'eyebrow'   => __( 'Unified Analytics', 'testro' ),
					'title'     => __( 'Unified Test Analytics & Reporting', 'testro' ),
					'intro'     => __( 'Monitor Playwright executions, pass rates, browser analytics, failure insights, and historical trends from one dashboard.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Execution Dashboard', 'testro' ),
							'description' => __( 'Track live and historical Playwright runs with pass rates, duration, and export activity in one view.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Test Result Insights', 'testro' ),
							'description' => __( 'Surface pass/fail trends, flaky patterns, and browser-specific signals from every Playwright execution.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Failure Analysis', 'testro' ),
							'description' => __( 'Drill into failed Playwright specs with logs, screenshots, traces, and AI-assisted classification.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Historical Execution Trends', 'testro' ),
							'description' => __( 'Compare Playwright suite health over time to measure coverage growth and maintenance impact.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Playwright Execution', 'testro' ),
						'score'     => 97,
						'status'    => __( 'Ready to ship', 'testro' ),
						'build'     => __( 'Build #5208 · main', 'testro' ),
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '98.7%',
								'trend' => __( '+2.1 pts', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Browsers green', 'testro' ),
								'value' => '3/3',
								'trend' => __( 'All engines', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Exports today', 'testro' ),
								'value' => '42',
								'trend' => __( 'Specs generated', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Suite duration', 'testro' ),
								'value' => '2m 18s',
								'trend' => __( 'Parallel run', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Last 7 Playwright runs', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 72,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 78,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 84,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 88,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 92,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 89,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 96,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'Chromium pass', 'testro' ),
								'value' => 99,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'Firefox pass', 'testro' ),
								'value' => 97,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'WebKit pass', 'testro' ),
								'value' => 96,
								'tone'  => 'healthy',
							),
						),
					),
				),

				/* 11. Enterprise Playwright automation --------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'enterprise-playwright',
					'variant' => 'tint',
					'columns' => 4,
					'eyebrow' => __( 'Enterprise-Ready', 'testro' ),
					'title'   => __( 'Enterprise-Ready Playwright Automation', 'testro' ),
					'intro'   => __( 'Secure execution, collaboration, environment control, and scalable workflows for enterprise teams.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Secure Test Execution', 'testro' ),
							'description' => __( 'Run Playwright automation with enterprise-grade security, encrypted credentials, and controlled access.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Team Collaboration', 'testro' ),
							'description' => __( 'Share visual workflows, exported specs, and results so QA and engineering work from one source of truth.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Environment Management', 'testro' ),
							'description' => __( 'Manage dev, staging, and production targets for Playwright runs with environment-scoped configuration.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Scalable Automation Workflows', 'testro' ),
							'description' => __( 'Scale Playwright export and execution across projects, teams, and release trains without tool sprawl.', 'testro' ),
						),
					),
				),

				/* 12. Why choose Playwright export ------------------------- */
				array(
					'type'    => 'comparison',
					'id'      => 'why-choose-playwright-export',
					'eyebrow' => __( 'Why Choose theTestRo', 'testro' ),
					'title'   => __( 'Why Choose theTestRo Playwright Export?', 'testro' ),
					'intro'   => __( 'Organizations choose theTestRo because it combines AI-powered visual automation with production-ready Playwright code generation. Teams can accelerate automation development, reduce scripting effort, improve collaboration between QA and developers, and seamlessly integrate exported Playwright tests into enterprise DevOps workflows.', 'testro' ),
					'legacy'  => array(
						'label' => __( 'Traditional Playwright Development', 'testro' ),
						'note'  => __( 'Manual coding with higher maintenance', 'testro' ),
					),
					'modern'  => array(
						'label' => __( 'theTestRo', 'testro' ),
						'note'  => __( 'AI visual creation with instant Playwright export', 'testro' ),
					),
					'rows'    => array(
						array(
							'aspect' => __( 'Test creation', 'testro' ),
							'legacy' => __( 'Manual Coding', 'testro' ),
							'modern' => __( 'AI Visual Test Creation', 'testro' ),
						),
						array(
							'aspect' => __( 'Export', 'testro' ),
							'legacy' => __( 'Longer Development Time', 'testro' ),
							'modern' => __( 'Instant Playwright Export', 'testro' ),
						),
						array(
							'aspect' => __( 'Code quality', 'testro' ),
							'legacy' => __( 'Limited Visual Creation', 'testro' ),
							'modern' => __( 'Clean Developer-Ready Code', 'testro' ),
						),
						array(
							'aspect' => __( 'Maintenance', 'testro' ),
							'legacy' => __( 'Higher Maintenance', 'testro' ),
							'modern' => __( 'Self-Healing Automation', 'testro' ),
						),
						array(
							'aspect' => __( 'Scale', 'testro' ),
							'legacy' => __( 'Slower Automation Adoption', 'testro' ),
							'modern' => __( 'Enterprise Execution', 'testro' ),
						),
						array(
							'aspect' => __( 'Delivery', 'testro' ),
							'legacy' => __( 'No AI Assistance', 'testro' ),
							'modern' => __( 'CI/CD Ready + AI Test Maintenance', 'testro' ),
						),
					),
				),

				/* 13. Playwright productivity gains ------------------------ */
				array(
					'type'    => 'outcomes',
					'id'      => 'playwright-productivity-gains',
					'variant' => 'spotlight',
					'eyebrow' => __( 'Measurable Impact', 'testro' ),
					'title'   => __( 'Accelerate Automation. Reduce Scripting Effort.', 'testro' ),
					'intro'   => __( 'Teams using Playwright Export ship coverage faster with less hand-written code and stronger QA–developer collaboration.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'trending-up',
							'title'       => __( '70% Less Scripting Effort', 'testro' ),
							'description' => __( 'Replace manual Playwright boilerplate with AI-generated TypeScript exported from visual workflows.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( '5× Faster Test Creation', 'testro' ),
							'description' => __( 'Author critical journeys visually and export runnable Playwright specs in minutes—not sprints.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Seamless QA–Developer Handoff', 'testro' ),
							'description' => __( 'QA builds coverage visually while developers receive clean, editable Playwright code they trust.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'CI/CD Ready from Day One', 'testro' ),
							'description' => __( 'Drop exported Playwright suites straight into Jenkins, GitHub Actions, GitLab, or Azure DevOps pipelines.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted By', 'testro' ),
					'title'   => __( 'Chosen by Teams Bridging No-Code and Playwright', 'testro' ),
					'intro'   => __( 'QA and engineering teams rely on theTestRo Playwright Export to accelerate automation, reduce scripting effort, and deliver developer-ready tests at enterprise scale.', 'testro' ),
				),

				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'How Teams Export Playwright Faster with AI', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo to build tests visually, export production-ready Playwright TypeScript, integrate CI/CD pipelines, and maintain automation with AI self-healing.', 'testro' ),
				),

				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Playwright Export FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'playwright-test-automation',
				),

				array(
					'type'       => 'cta',
					'id'         => 'get-started-playwright-export',
					'title'      => __( 'Create Tests Visually. Export Playwright Code Instantly.', 'testro' ),
					'intro'      => __( 'Bridge the gap between no-code automation and developer-first testing with theTestRo\'s AI-powered Playwright Export. Build tests visually, generate production-ready Playwright scripts, integrate seamlessly into your DevOps pipeline, and accelerate software delivery with enterprise-grade automation.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		'reporting-analytics' => array(
			'slug'   => 'reporting-analytics',
			'title'  => __( 'Reports & Analytics', 'testro' ),
			'seo'    => array(
				'title'       => __( 'AI Test Reports & Analytics | Test Reporting Software | theTestRo', 'testro' ),
				'description' => __( 'theTestRo AI-Powered Test Reports & Analytics Platform delivers real-time dashboards, intelligent failure analysis, quality intelligence, and enterprise reporting so QA and DevOps teams release with confidence.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'AI-Powered Reporting & Analytics', 'testro' ),
				'title'    => __( 'AI-Powered Test Reports & Analytics Platform', 'testro' ),
				'subtitle' => __( 'Transform test execution data into actionable insights with theTestRo\'s AI-Powered Reports & Analytics Platform. Monitor quality in real time, analyze execution trends, identify failures instantly, and make confident release decisions using intelligent dashboards, enterprise reporting, and AI-driven analytics.', 'testro' ),
				'badges'   => array(
					__( 'Real-Time Dashboards', 'testro' ),
					__( 'AI Failure Analysis', 'testro' ),
					__( 'Release Readiness Scoring', 'testro' ),
					__( 'Enterprise Reporting', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '360°',
						'label' => __( 'Release visibility', 'testro' ),
						'icon'  => 'gauge',
					),
					array(
						'value' => '90%',
						'label' => __( 'Faster root cause', 'testro' ),
						'icon'  => 'microscope',
					),
					array(
						'value' => 'Live',
						'label' => __( 'Executive dashboards', 'testro' ),
						'icon'  => 'activity',
					),
				),
			),

			'sections' => array(

				/* 1. Gain Complete Visibility -------------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'complete-test-visibility',
					'eyebrow' => __( 'Centralized Analytics Command Center', 'testro' ),
					'title'   => __( 'Gain Complete Visibility into Test Execution', 'testro' ),
					'intro'   => __( 'Manage execution insights from one unified dashboard—track running tests live, visualize quality KPIs, and understand release confidence through AI-powered scoring.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Execution', 'testro' ),
							'title'       => __( 'Centralized Testing Dashboard', 'testro' ),
							'description' => __( 'Manage all execution insights from one unified dashboard.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'stage'       => __( 'Analytics', 'testro' ),
							'title'       => __( 'Real-Time Execution Monitoring', 'testro' ),
							'description' => __( 'Track running tests and execution progress live.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'AI Insights', 'testro' ),
							'title'       => __( 'Quality Metrics Overview', 'testro' ),
							'description' => __( 'Visualize software quality using meaningful KPIs.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'stage'       => __( 'Release Readiness', 'testro' ),
							'title'       => __( 'Release Readiness Insights', 'testro' ),
							'description' => __( 'Understand release confidence through AI-powered quality scoring.', 'testro' ),
						),
					),
				),

				/* 2. Intelligent Test Execution Analytics -------------------- */
				array(
					'type'      => 'analytics',
					'id'        => 'test-execution-analytics',
					'eyebrow'   => __( 'Intelligent Test Execution Analytics', 'testro' ),
					'title'     => __( 'Turn Every Run into Trends, Duration, and Stability Signals', 'testro' ),
					'intro'     => __( 'Analyze execution performance across every release with pass/fail trends, duration tracking, failure-rate analysis, and long-term automation stability metrics.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Test Run Analysis', 'testro' ),
							'description' => __( 'Analyze execution performance across every release.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Pass/Fail Trends', 'testro' ),
							'description' => __( 'Monitor execution success rates over time.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Execution Duration Tracking', 'testro' ),
							'description' => __( 'Measure execution efficiency and identify bottlenecks.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Failure Rate Analysis', 'testro' ),
							'description' => __( 'Identify recurring failure patterns quickly.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Test Stability Metrics', 'testro' ),
							'description' => __( 'Track automation reliability and long-term stability.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Execution Analytics', 'testro' ),
						'build'     => __( 'Build #2148 · Main', 'testro' ),
						'status'    => __( 'Healthy', 'testro' ),
						'score'     => 94,
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '98.6%',
								'trend' => __( '+1.4%', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Avg duration', 'testro' ),
								'value' => '4m 12s',
								'trend' => __( '−18s', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Flaky rate', 'testro' ),
								'value' => '0.6%',
								'trend' => __( 'Stable', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Coverage', 'testro' ),
								'value' => '92%',
								'trend' => __( '+3%', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Pass rate · last 7 runs', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'R1', 'testro' ),
									'value' => 78,
								),
								array(
									'label' => __( 'R2', 'testro' ),
									'value' => 84,
								),
								array(
									'label' => __( 'R3', 'testro' ),
									'value' => 81,
								),
								array(
									'label' => __( 'R4', 'testro' ),
									'value' => 90,
								),
								array(
									'label' => __( 'R5', 'testro' ),
									'value' => 93,
								),
								array(
									'label' => __( 'R6', 'testro' ),
									'value' => 95,
								),
								array(
									'label' => __( 'R7', 'testro' ),
									'value' => 98,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'UI change', 'testro' ),
								'value' => 42,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Test data', 'testro' ),
								'value' => 31,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Environment', 'testro' ),
								'value' => 27,
								'tone'  => 'healthy',
							),
						),
					),
				),

				/* 3. AI-Powered Failure Analysis ----------------------------- */
				array(
					'type'    => 'traceability',
					'id'      => 'ai-failure-analysis',
					'eyebrow' => __( 'AI-Powered Failure Analysis', 'testro' ),
					'title'   => __( 'From Failure to Resolution with Intelligent Diagnostics', 'testro' ),
					'intro'   => __( 'Classify failures automatically, surface root causes faster, detect recurring error patterns, and receive AI-driven recommendations that improve testing efficiency.', 'testro' ),
					'stages'  => array(
						array(
							'icon'  => 'alert-octagon',
							'label' => __( 'Failure', 'testro' ),
						),
						array(
							'icon'  => 'sparkles',
							'label' => __( 'AI Analysis', 'testro' ),
						),
						array(
							'icon'  => 'filter-check',
							'label' => __( 'Classification', 'testro' ),
						),
						array(
							'icon'  => 'wand',
							'label' => __( 'Recommendation', 'testro' ),
						),
						array(
							'icon'  => 'circle-check',
							'label' => __( 'Resolution', 'testro' ),
						),
					),
					'items'   => array(
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Automated Failure Classification', 'testro' ),
							'description' => __( 'Categorize failures automatically using AI.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Root Cause Insights', 'testro' ),
							'description' => __( 'Identify underlying issues faster.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Error Pattern Detection', 'testro' ),
							'description' => __( 'Recognize recurring failure patterns across executions.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Failure Trend Identification', 'testro' ),
							'description' => __( 'Analyze long-term automation health.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Intelligent Recommendations', 'testro' ),
							'description' => __( 'Receive AI-driven suggestions to improve testing efficiency.', 'testro' ),
						),
					),
				),

				/* 4. Real-Time Test Dashboards ------------------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'real-time-dashboards',
					'variant' => 'spotlight',
					'eyebrow' => __( 'Real-Time Test Dashboards', 'testro' ),
					'title'   => __( 'Live Views for Execution, Coverage, Regression, and Teams', 'testro' ),
					'intro'   => __( 'Give every role the dashboard they need—monitor live runs, visualize coverage, track regression performance, and measure QA productivity from one analytics platform.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Execution Status Dashboard', 'testro' ),
							'description' => __( 'Monitor running, completed, and failed executions.', 'testro' ),
						),
						array(
							'icon'        => 'pie-chart',
							'title'       => __( 'Test Coverage Dashboard', 'testro' ),
							'description' => __( 'Visualize automation coverage across applications.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Regression Testing Dashboard', 'testro' ),
							'description' => __( 'Track regression execution performance.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Team Performance Metrics', 'testro' ),
							'description' => __( 'Measure QA productivity and execution efficiency.', 'testro' ),
						),
					),
				),

				/* 5. Detailed Test Execution Reports ------------------------- */
				array(
					'type'      => 'lifecycle',
					'id'        => 'test-execution-reports',
					'eyebrow'   => __( 'Detailed Test Execution Reports', 'testro' ),
					'title'     => __( 'Complete Evidence from Steps to Screenshots, Logs, and Videos', 'testro' ),
					'intro'     => __( 'Review every execution step in detail with visual evidence, session replay, technical logs, and environment context—so debugging and release proof share the same trail.', 'testro' ),
					'loop_note' => __( 'Every run keeps a complete, shareable evidence trail — from the first step to the final video.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Step-Level Execution Reports', 'testro' ),
							'description' => __( 'Review every execution step in detail.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Screenshots', 'testro' ),
							'description' => __( 'Capture visual evidence for every execution.', 'testro' ),
						),
						array(
							'icon'        => 'video',
							'title'       => __( 'Video Recordings', 'testro' ),
							'description' => __( 'Replay complete test sessions.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Logs & Error Details', 'testro' ),
							'description' => __( 'Analyze execution logs and technical details.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Environment Information', 'testro' ),
							'description' => __( 'View execution environments, browser versions, and configurations.', 'testro' ),
						),
					),
				),

				/* 6. Quality Intelligence ------------------------------------ */
				array(
					'type'    => 'feature-grid',
					'id'      => 'quality-intelligence',
					'variant' => 'tint',
					'columns' => 4,
					'eyebrow' => __( 'Quality Intelligence for Faster Decisions', 'testro' ),
					'title'   => __( 'Risk, Readiness, Health, and Recommendations in One View', 'testro' ),
					'intro'   => __( 'Identify high-risk modules before release, understand production impact, track quality trends, and continuously monitor automation health with AI.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Risk-Based Insights', 'testro' ),
							'description' => __( 'Identify high-risk modules before release.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Release Impact Analysis', 'testro' ),
							'description' => __( 'Understand how failures affect production readiness.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Quality Trends', 'testro' ),
							'description' => __( 'Track quality improvements across releases.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Test Health Monitoring', 'testro' ),
							'description' => __( 'Continuously monitor automation health using AI.', 'testro' ),
						),
					),
				),

				/* 7. Enterprise Reporting Capabilities ----------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'enterprise-reporting',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Enterprise Reporting Capabilities', 'testro' ),
					'title'   => __( 'Custom, Scheduled, and Role-Based Reports for Every Stakeholder', 'testro' ),
					'intro'   => __( 'Create tailored reports, distribute them on a schedule, export in the formats stakeholders need, and give QA, developers, managers, and executives the dashboards they rely on.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Custom Reports', 'testro' ),
							'description' => __( 'Create customized reports tailored to business needs.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Scheduled Reports', 'testro' ),
							'description' => __( 'Automatically generate and distribute reports.', 'testro' ),
						),
						array(
							'icon'        => 'download',
							'title'       => __( 'Export Reports', 'testro' ),
							'description' => __( 'Export reports in multiple formats for stakeholders.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Role-Based Dashboards', 'testro' ),
							'description' => __( 'Provide customized dashboards for QA, developers, managers, and executives.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Multi-Project Analytics', 'testro' ),
							'description' => __( 'Monitor testing performance across multiple products and projects.', 'testro' ),
						),
					),
				),

				/* 8. DevOps Integrations ------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'reporting-integrations',
					'eyebrow' => __( 'Integrate Analytics into DevOps Workflows', 'testro' ),
					'title'   => __( 'Push Quality Signals into the Tools Your Delivery Teams Already Use', 'testro' ),
					'intro'   => __( 'Integrate reporting and analytics directly into your DevOps ecosystem to provide continuous visibility into software quality throughout the development lifecycle.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Reports & Analytics', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Return execution summaries and quality gates to Jenkins jobs.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub Actions', 'testro' ),
							'description' => __( 'Surface pass/fail analytics and readiness scores on every workflow run.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Feed pipeline reporting and release evidence into Azure DevOps boards.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Push failure summaries and linked defects into Jira for faster triage.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Post release-readiness alerts and AI insights into team channels.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'CI/CD Pipeline Reporting', 'testro' ),
							'description' => __( 'Embed continuous quality reporting across your delivery toolchain.', 'testro' ),
						),
					),
				),

				/* 9. AI-Driven Test Optimization ----------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'ai-test-optimization',
					'eyebrow' => __( 'AI-Driven Test Optimization', 'testro' ),
					'title'   => __( 'From Test Results to a Leaner, Faster Automation Suite', 'testro' ),
					'intro'   => __( 'Detect flaky tests, recommend suite improvements, flag maintenance issues, and continuously optimize execution performance with AI.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'database',
							'stage'       => __( 'Test Results', 'testro' ),
							'title'       => __( 'Identify Flaky Tests', 'testro' ),
							'description' => __( 'Automatically detect unstable tests affecting execution quality.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'AI Analysis', 'testro' ),
							'title'       => __( 'Optimize Test Suites', 'testro' ),
							'description' => __( 'Recommend improvements to increase efficiency.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'stage'       => __( 'Optimization', 'testro' ),
							'title'       => __( 'Detect Maintenance Issues', 'testro' ),
							'description' => __( 'Identify automation assets requiring updates.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'stage'       => __( 'Improved Suite', 'testro' ),
							'title'       => __( 'Improve Automation Efficiency', 'testro' ),
							'description' => __( 'Continuously optimize execution performance using AI.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Better Performance', 'testro' ),
							'title'       => __( 'Faster Feedback Loops', 'testro' ),
							'description' => __( 'Ship with leaner suites and clearer quality signals on every build.', 'testro' ),
						),
					),
				),

				/* 10. Why Choose --------------------------------------------- */
				array(
					'type'    => 'comparison',
					'id'      => 'why-choose-reports-analytics',
					'eyebrow' => __( 'Why Choose theTestRo Reports & Analytics?', 'testro' ),
					'title'   => __( 'Intelligent Insights Instead of Static Spreadsheets', 'testro' ),
					'intro'   => __( 'Organizations choose theTestRo because it transforms raw execution data into intelligent insights. AI-powered analytics, enterprise dashboards, real-time monitoring, and actionable recommendations help engineering teams improve software quality, reduce release risk, and make faster, data-driven decisions.', 'testro' ),
					'legacy'  => array(
						'label' => __( 'Traditional Reporting', 'testro' ),
						'note'  => __( 'Static exports and manual triage', 'testro' ),
					),
					'modern'  => array(
						'label' => __( 'theTestRo', 'testro' ),
						'note'  => __( 'AI analytics on one platform', 'testro' ),
					),
					'rows'    => array(
						array(
							'aspect' => __( 'Analytics depth', 'testro' ),
							'legacy' => __( 'Static Reports', 'testro' ),
							'modern' => __( 'AI-Powered Analytics', 'testro' ),
						),
						array(
							'aspect' => __( 'Visibility', 'testro' ),
							'legacy' => __( 'Delayed Insights', 'testro' ),
							'modern' => __( 'Real-Time Dashboards', 'testro' ),
						),
						array(
							'aspect' => __( 'Failure triage', 'testro' ),
							'legacy' => __( 'Manual Analysis', 'testro' ),
							'modern' => __( 'Intelligent Failure Analysis', 'testro' ),
						),
						array(
							'aspect' => __( 'Release decisions', 'testro' ),
							'legacy' => __( 'Limited Visibility', 'testro' ),
							'modern' => __( 'Release Readiness Insights', 'testro' ),
						),
						array(
							'aspect' => __( 'Stakeholder reporting', 'testro' ),
							'legacy' => __( 'Basic Metrics', 'testro' ),
							'modern' => __( 'Enterprise Reporting', 'testro' ),
						),
						array(
							'aspect' => __( 'Scale', 'testro' ),
							'legacy' => __( 'Single-project views', 'testro' ),
							'modern' => __( 'Multi-Project Visibility', 'testro' ),
						),
						array(
							'aspect' => __( 'Continuous improvement', 'testro' ),
							'legacy' => __( 'No AI Recommendations', 'testro' ),
							'modern' => __( 'AI Test Optimization', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'outcomes',
					'id'      => 'reports-analytics-outcomes',
					'variant' => 'tint',
					'eyebrow' => __( 'Measurable Impact', 'testro' ),
					'title'   => __( 'Visibility, Speed, Confidence, and Efficiency', 'testro' ),
					'intro'   => __( 'Teams using theTestRo Reports & Analytics improve release visibility, debug failures faster, reduce release risk, and keep automation efficient with AI recommendations.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Improved visibility', 'testro' ),
							'description' => __( 'One live source of truth for execution health across every release.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Faster debugging', 'testro' ),
							'description' => __( 'AI classification and root-cause insights cut triage time dramatically.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Reduced release risk', 'testro' ),
							'description' => __( 'Readiness scoring and risk signals support confident go/no-go decisions.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Increased automation efficiency', 'testro' ),
							'description' => __( 'Flaky detection and suite optimization keep runs lean and reliable.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Enterprise QA Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Engineering and QA organizations rely on theTestRo to turn execution data into release-ready intelligence.', 'testro' ),
				),

				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Teams Making Faster Quality Decisions with AI Analytics', 'testro' ),
					'intro'   => __( 'See how modern QA and DevOps teams use theTestRo Reports & Analytics for real-time visibility, intelligent failure analysis, and confident releases.', 'testro' ),
				),

				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Test Reports & Analytics FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'reporting-analytics',
				),

				array(
					'type'       => 'cta',
					'id'         => 'get-started-reports-analytics',
					'title'      => __( 'Turn Every Test Execution into Actionable Intelligence', 'testro' ),
					'intro'      => __( 'Gain complete visibility into software quality with theTestRo\'s AI-Powered Reports & Analytics Platform. Monitor execution in real time, identify risks faster, optimize automation with AI, and deliver high-quality software with confidence.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		/* ------------------------------------------------------------------ */
		/* Regression Test Automation                                         */
		/* ------------------------------------------------------------------ */
		'regression-test-automation' => array(
			'slug'   => 'regression-test-automation',
			'title'  => __( 'Regression Test Automation', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Automated Regression Testing Software | AI Regression Test Automation | theTestRo', 'testro' ),
				'description' => __( 'Automated Regression Testing Software from theTestRo. AI Regression Testing and Continuous Regression Testing on one Regression Testing Platform—self-healing suites, parallel execution, CI/CD integration, and release-ready analytics.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'AI-Powered Regression Testing', 'testro' ),
				'title'    => __( 'Best Automated Regression Testing Software', 'testro' ),
				'subtitle' => __( 'Ensure every software release is reliable with theTestRo\'s AI-powered Regression Testing Platform. Automatically validate existing functionality after every code change using intelligent automation, continuous regression execution, AI-powered maintenance, and enterprise-grade analytics. Deliver high-quality software faster while reducing manual testing effort and release risks.', 'testro' ),
				'badges'   => array(
					__( 'Continuous Regression', 'testro' ),
					__( 'AI Self-Healing', 'testro' ),
					__( 'Parallel Execution', 'testro' ),
					__( 'Release Ready', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '60%',
						'label' => __( 'Faster regression cycles', 'testro' ),
						'icon'  => 'zap',
					),
					array(
						'value' => '3×',
						'label' => __( 'Coverage uplift', 'testro' ),
						'icon'  => 'layout-grid',
					),
					array(
						'value' => '70%',
						'label' => __( 'Maintenance reduction', 'testro' ),
						'icon'  => 'wrench',
					),
				),
			),

			'sections' => array(

				/* 1. Why theTestRo for Regression Testing ------------------ */
				array(
					'type'    => 'feature-grid',
					'id'      => 'why-regression-testing',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Why theTestRo', 'testro' ),
					'title'   => __( 'Why theTestRo for Regression Testing', 'testro' ),
					'intro'   => __( 'Generate, execute, and maintain regression suites with AI so every code change is validated before it reaches production.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Powered Test Creation', 'testro' ),
							'description' => __( 'Automatically generate comprehensive regression test scenarios using AI, reducing manual effort and improving test coverage.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Continuous Regression Execution', 'testro' ),
							'description' => __( 'Execute regression suites automatically after every build, deployment, or release to identify issues early in the development lifecycle.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Intelligent Test Maintenance', 'testro' ),
							'description' => __( 'Reduce maintenance overhead with self-healing automation, automatic locator updates, and AI-powered test optimization.', 'testro' ),
						),
					),
				),

				/* 2. AI-Powered Regression Testing Platform ---------------- */
				array(
					'type'    => 'bento',
					'id'      => 'ai-regression-platform',
					'variant' => 'spotlight',
					'eyebrow' => __( 'AI-Powered Regression Testing Platform', 'testro' ),
					'title'   => __( 'Build, Accelerate, and Prove Every Regression Run', 'testro' ),
					'intro'   => __( 'Create end-to-end suites, run continuous regression inside delivery, drive data-powered scenarios, and turn every execution into release-ready intelligence.', 'testro' ),
					'groups'  => array(
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Build Reliable End-to-End Regression Suites', 'testro' ),
							'description' => __( 'Cover complete journeys across every layer so mission-critical workflows stay green after every update.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'browsers',
									'title'       => __( 'Web, Mobile & API Regression', 'testro' ),
									'description' => __( 'Validate complete user journeys across web, mobile, and API layers using one unified testing platform.', 'testro' ),
								),
								array(
									'icon'        => 'layout-grid',
									'title'       => __( 'Business Workflow Validation', 'testro' ),
									'description' => __( 'Ensure mission-critical business processes continue functioning after every software update.', 'testro' ),
								),
								array(
									'icon'        => 'target',
									'title'       => __( 'Maximum Test Coverage', 'testro' ),
									'description' => __( 'Increase automation coverage across applications while minimizing manual testing effort.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate Continuous Regression Testing', 'testro' ),
							'description' => __( 'Trigger, parallelize, and schedule regression so feedback arrives before the next deployment.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'plug',
									'title'       => __( 'CI/CD Pipeline Integration', 'testro' ),
									'description' => __( 'Automatically execute regression suites within your DevOps workflow.', 'testro' ),
								),
								array(
									'icon'        => 'badge-check',
									'title'       => __( 'Automated Build Validation', 'testro' ),
									'description' => __( 'Validate every software build before deployment using AI-powered regression testing.', 'testro' ),
								),
								array(
									'icon'        => 'infinity',
									'title'       => __( 'Parallel Test Execution', 'testro' ),
									'description' => __( 'Reduce execution time by running multiple regression suites simultaneously.', 'testro' ),
								),
								array(
									'icon'        => 'calendar-sync',
									'title'       => __( 'Scheduled Regression Runs', 'testro' ),
									'description' => __( 'Automatically execute regression tests based on predefined schedules.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Data-Driven Regression Testing', 'testro' ),
							'description' => __( 'Parameterize scenarios, manage dynamic data, and reuse assets without duplicating cases.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'filter-check',
									'title'       => __( 'Parameterized Test Execution', 'testro' ),
									'description' => __( 'Run regression scenarios using multiple datasets without duplicating test cases.', 'testro' ),
								),
								array(
									'icon'        => 'database',
									'title'       => __( 'Dynamic Test Data Management', 'testro' ),
									'description' => __( 'Manage test data efficiently across different environments.', 'testro' ),
								),
								array(
									'icon'        => 'folder-tree',
									'title'       => __( 'Reusable Test Assets', 'testro' ),
									'description' => __( 'Create reusable components that simplify regression maintenance.', 'testro' ),
								),
								array(
									'icon'        => 'sparkles',
									'title'       => __( 'Intelligent Test Data Handling', 'testro' ),
									'description' => __( 'Leverage AI to optimize test data usage across automated regression suites.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'AI-Powered Test Reports & Analytics', 'testro' ),
							'description' => __( 'Monitor runs live, diagnose failures faster, and measure release readiness with AI.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'activity',
									'title'       => __( 'Regression Execution Dashboard', 'testro' ),
									'description' => __( 'Monitor regression execution in real time through centralized dashboards.', 'testro' ),
								),
								array(
									'icon'        => 'chart-bar',
									'title'       => __( 'Test Result Analysis', 'testro' ),
									'description' => __( 'Analyze execution outcomes using AI-powered insights.', 'testro' ),
								),
								array(
									'icon'        => 'microscope',
									'title'       => __( 'Failure Insights', 'testro' ),
									'description' => __( 'Identify recurring issues and understand failure patterns quickly.', 'testro' ),
								),
								array(
									'icon'        => 'message-text',
									'title'       => __( 'Real-Time Notifications', 'testro' ),
									'description' => __( 'Receive instant alerts whenever regression failures occur.', 'testro' ),
								),
								array(
									'icon'        => 'badge-check',
									'title'       => __( 'Release Readiness Metrics', 'testro' ),
									'description' => __( 'Measure software quality before every deployment using intelligent release insights.', 'testro' ),
								),
							),
						),
					),
				),

				/* 3. Unified Test Automation Platform ---------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'unified-regression-platform',
					'eyebrow' => __( 'Unified Test Automation Platform', 'testro' ),
					'title'   => __( 'One Regression Hub Across Web, Mobile, API, and Browsers', 'testro' ),
					'intro'   => __( 'Validate every layer of your application through one unified AI-powered regression testing platform. Execute comprehensive regression suites across web, mobile, APIs, browsers, and enterprise environments without switching tools.', 'testro' ),
					'hub'     => array(
						'icon'  => 'refresh',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Regression Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Application Testing', 'testro' ),
							'description' => __( 'Automate end-to-end regression across modern web applications and critical UI journeys.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Application Testing', 'testro' ),
							'description' => __( 'Validate mobile experiences and native flows as part of every regression cycle.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Protect contracts and service layers with automated API regression on every build.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Confirm critical paths stay reliable across Chrome, Firefox, Edge, Safari, and more.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Cross-Platform Testing', 'testro' ),
							'description' => __( 'Execute regression across platforms and environments without toolchain fragmentation.', 'testro' ),
						),
					),
				),

				/* 4A. DevOps pipeline -------------------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'regression-devops-pipeline',
					'eyebrow' => __( 'Seamless DevOps Integration', 'testro' ),
					'title'   => __( 'Continuous Regression Inside Every Delivery Path', 'testro' ),
					'intro'   => __( 'Integrate seamlessly with your existing DevOps ecosystem to automate regression testing throughout your software delivery lifecycle. Trigger regression suites after every commit, build, or deployment while providing continuous quality feedback to development teams.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'user-check',
							'stage'       => __( 'Commit', 'testro' ),
							'title'       => __( 'Developer Commit', 'testro' ),
							'description' => __( 'Code changes enter the pipeline and queue continuous regression validation.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'CI/CD', 'testro' ),
							'title'       => __( 'CI/CD Pipeline', 'testro' ),
							'description' => __( 'Builds and pull requests automatically trigger the right regression packs.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'AI Testing', 'testro' ),
							'title'       => __( 'AI Regression Testing', 'testro' ),
							'description' => __( 'AI-powered suites execute in parallel with self-healing maintenance in the loop.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'stage'       => __( 'Analytics', 'testro' ),
							'title'       => __( 'Analytics', 'testro' ),
							'description' => __( 'Teams get live results, failure insights, and release readiness signals.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Release', 'testro' ),
							'description' => __( 'Approved builds ship with continuous quality confidence baked in.', 'testro' ),
						),
					),
				),

				/* 4B. Enterprise tool integrations ------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'regression-enterprise-integrations',
					'eyebrow' => __( 'Enterprise Integrations', 'testro' ),
					'title'   => __( 'Connect Regression to the Tools Your Teams Already Use', 'testro' ),
					'intro'   => __( 'Wire theTestRo into Jira, Jenkins, GitHub, Azure DevOps, Slack, and Bamboo so regression status, defects, and alerts flow through your delivery toolchain.', 'testro' ),
					'hub'     => array(
						'icon'  => 'plug',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'DevOps Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Sync defects and regression outcomes with engineering trackers.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Launch regression suites from Jenkins jobs on every build.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger and report continuous regression from pull requests and workflows.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed regression gates inside Azure pipelines and release stages.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Notify channels instantly when regression fails, recovers, or clears.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Bamboo', 'testro' ),
							'description' => __( 'Connect Bamboo plans so continuous regression protects every deployment path.', 'testro' ),
						),
					),
				),

				/* 5. Optional analytics enrichment ------------------------- */
				array(
					'type'      => 'analytics',
					'id'        => 'regression-execution-dashboard',
					'eyebrow'   => __( 'Regression Execution Dashboard', 'testro' ),
					'title'     => __( 'See Suite Health, Pass Rates, and Release Risk in Real Time', 'testro' ),
					'intro'     => __( 'Track continuous regression performance with live KPIs, pass/fail trends, coverage signals, and AI-assisted failure insights—so release decisions stay evidence-based.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Live suite progress', 'testro' ),
							'description' => __( 'Monitor running regression packs across browsers and environments.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Pass/fail trends', 'testro' ),
							'description' => __( 'Spot stability shifts before they become release blockers.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Failure pattern insights', 'testro' ),
							'description' => __( 'Classify recurring issues faster with AI-powered diagnostics.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Release readiness scoring', 'testro' ),
							'description' => __( 'Quantify confidence before promoting the next build.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Regression Analytics', 'testro' ),
						'build'     => __( 'Release 5.1 · Nightly + CI', 'testro' ),
						'status'    => __( 'Healthy', 'testro' ),
						'score'     => 97,
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '98.4%',
								'trend' => __( '+2.1%', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Coverage', 'testro' ),
								'value' => '94%',
								'trend' => __( '+6%', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Failed tests', 'testro' ),
								'value' => '8',
								'trend' => __( '2 critical', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Maintenance', 'testro' ),
								'value' => '−70%',
								'trend' => __( 'Self-healed', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Regression pass rate · 7 runs', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'R1', 'testro' ),
									'value' => 84,
								),
								array(
									'label' => __( 'R2', 'testro' ),
									'value' => 88,
								),
								array(
									'label' => __( 'R3', 'testro' ),
									'value' => 91,
								),
								array(
									'label' => __( 'R4', 'testro' ),
									'value' => 93,
								),
								array(
									'label' => __( 'R5', 'testro' ),
									'value' => 95,
								),
								array(
									'label' => __( 'R6', 'testro' ),
									'value' => 96,
								),
								array(
									'label' => __( 'R7', 'testro' ),
									'value' => 98,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'UI change', 'testro' ),
								'value' => 38,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Test data', 'testro' ),
								'value' => 29,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Environment', 'testro' ),
								'value' => 33,
								'tone'  => 'healthy',
							),
						),
					),
				),

				/* 6. Customer success outcomes ----------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'regression-customer-success',
					'variant' => 'tint',
					'eyebrow' => __( 'Customer Success', 'testro' ),
					'title'   => __( 'Less Effort. Faster Releases. Higher Confidence.', 'testro' ),
					'intro'   => __( 'Organizations use theTestRo to reduce regression effort, accelerate releases, improve quality, expand coverage, catch issues earlier, and lower release risk.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Reduce regression testing effort', 'testro' ),
							'description' => __( 'AI authoring and self-healing cut the manual work that keeps suites running.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate software releases', 'testro' ),
							'description' => __( 'Parallel continuous regression returns feedback in time for every commit.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Improve software quality', 'testro' ),
							'description' => __( 'Validate existing functionality after every change before customers feel it.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Increase automation coverage', 'testro' ),
							'description' => __( 'Expand web, mobile, and API regression without growing headcount.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Detect production issues earlier', 'testro' ),
							'description' => __( 'Catch regressions in CI instead of after the release window opens.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Reduce release risks', 'testro' ),
							'description' => __( 'Release readiness metrics and quality gates protect every promotion.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted By', 'testro' ),
					'title'   => __( 'Chosen by Teams Automating Continuous Regression', 'testro' ),
					'intro'   => __( 'QA, engineering, and DevOps organizations rely on theTestRo to keep regression suites green, accelerate delivery, and protect every release.', 'testro' ),
				),

				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'How Teams Ship Faster with AI-Powered Regression', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo Regression Test Automation to cut maintenance, expand coverage, integrate continuous regression into CI/CD, and release with confidence.', 'testro' ),
				),

				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Regression Testing FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'regression-test-automation',
				),

				array(
					'type'       => 'cta',
					'id'         => 'get-started-regression-test-automation',
					'title'      => __( 'Automate Regression Testing. Accelerate Every Release.', 'testro' ),
					'intro'      => __( 'Deliver software with confidence using theTestRo\'s AI-powered Regression Testing Platform. Automate regression suites, integrate seamlessly into your DevOps pipeline, reduce maintenance through AI, and ensure every release is stable, reliable, and production-ready.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		/* ------------------------------------------------------------------ */
		/* AI Automated Sanity Testing                                        */
		/* ------------------------------------------------------------------ */
		'ai-automated-sanity-testing' => array(
			'slug'   => 'ai-automated-sanity-testing',
			'title'  => __( 'AI Automated Sanity Testing', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Automated Sanity Testing Tool | AI Sanity Testing | Continuous Sanity Testing | theTestRo', 'testro' ),
				'description' => __( 'Automated Sanity Testing Tool from theTestRo. AI Sanity Testing and Continuous Sanity Testing for Build Validation Testing—critical-path automation, cloud execution, self-healing Sanity Test Automation, and release-ready analytics.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'AI-Powered Sanity Testing', 'testro' ),
				'title'    => __( 'Best Tool for Automated Sanity Testing', 'testro' ),
				'subtitle' => __( 'Quickly validate critical application functionality after every bug fix or feature update with theTestRo\'s AI-powered Sanity Testing Platform. Automatically verify essential workflows, accelerate release validation, and ensure application stability using intelligent automation, cloud execution, and AI-driven quality insights.', 'testro' ),
				'badges'   => array(
					__( 'Critical Path Validation', 'testro' ),
					__( 'AI Automation', 'testro' ),
					__( 'Cloud Execution', 'testro' ),
					__( 'Release Confidence', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '80%',
						'label' => __( 'Faster critical validation', 'testro' ),
						'icon'  => 'zap',
					),
					array(
						'value' => '5×',
						'label' => __( 'Quicker release gates', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '65%',
						'label' => __( 'Less manual sanity effort', 'testro' ),
						'icon'  => 'wrench',
					),
				),
			),

			'sections' => array(

				/* 1. Why theTestRo for Sanity Testing ---------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'why-sanity-testing',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Why theTestRo', 'testro' ),
					'title'   => __( 'Why theTestRo for Sanity Testing', 'testro' ),
					'intro'   => __( 'Validate critical paths after every bug fix or minor change—so teams get release confidence fast without waiting on a full regression cycle.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Powered Validation', 'testro' ),
							'description' => __( 'Use AI to prioritize and execute the critical checks that matter after each change—so Automated Sanity Testing stays focused, fast, and reliable.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Faster Release Confidence', 'testro' ),
							'description' => __( 'Clear build gates quickly with Continuous Sanity Testing that confirms essential workflows before promoting a release.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Reduced Manual Testing', 'testro' ),
							'description' => __( 'Replace repetitive post-fix and smoke checks with Sanity Test Automation that runs consistently across every build.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Continuous Quality Assurance', 'testro' ),
							'description' => __( 'Keep critical-path coverage always on with trigger-based AI Sanity Testing embedded in your delivery workflow.', 'testro' ),
						),
					),
				),

				/* 2. AI-Powered Sanity Testing Platform -------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'ai-sanity-platform',
					'variant' => 'spotlight',
					'eyebrow' => __( 'AI-Powered Sanity Testing Platform', 'testro' ),
					'title'   => __( 'Validate Critical Changes Before Full Regression', 'testro' ),
					'intro'   => __( 'Confirm what just changed—critical paths, new features, bug fixes, and overall stability—so teams ship with confidence without waiting on full-suite regression.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'target',
							'title'       => __( 'Validate Critical Application Changes', 'testro' ),
							'description' => __( 'Focus Automated Sanity Testing on the highest-risk journeys so every bug fix and code tweak is verified before broader regression.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Verify New Features', 'testro' ),
							'description' => __( 'Confirm newly shipped capabilities behave as expected with targeted AI Sanity Testing packs that protect happy paths and entry points.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Validate Bug Fixes', 'testro' ),
							'description' => __( 'Prove defects stay fixed with Build Validation Testing that re-checks the affected flows after every patch.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Ensure Application Stability', 'testro' ),
							'description' => __( 'Detect early instability signals across essential workflows so releases stay stable between deeper regression cycles.', 'testro' ),
						),
					),
				),

				/* 3. Cloud-Based Platform for Sanity Testing --------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'cloud-sanity-platform',
					'eyebrow' => __( 'Cloud-Based Platform for Sanity Testing', 'testro' ),
					'title'   => __( 'Centralize, Scale, and Parallelize Every Sanity Gate', 'testro' ),
					'intro'   => __( 'Run Continuous Sanity Testing on enterprise cloud infrastructure—manage suites centrally, execute in the cloud, scale capacity on demand, and parallelize critical checks for faster feedback.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'layout-grid',
							'stage'       => __( 'Manage', 'testro' ),
							'title'       => __( 'Cloud Platform', 'testro' ),
							'description' => __( 'Centralized test management keeps sanity packs organized, versioned, and ready for every build gate.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'stage'       => __( 'Execute', 'testro' ),
							'title'       => __( 'Test Execution', 'testro' ),
							'description' => __( 'Cloud test execution runs critical sanity checks without local bottlenecks or fragile agent farms.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'stage'       => __( 'Scale', 'testro' ),
							'title'       => __( 'Parallel Workers', 'testro' ),
							'description' => __( 'Scalable infrastructure and parallel test execution cut gate time while covering more critical paths.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'stage'       => __( 'Decide', 'testro' ),
							'title'       => __( 'Results Dashboard', 'testro' ),
							'description' => __( 'Live results dashboards surface pass/fail signals so teams clear or block releases with evidence.', 'testro' ),
						),
					),
				),

				/* 4. Continuous Sanity Testing ----------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'continuous-sanity-testing',
					'eyebrow' => __( 'Continuous Sanity Testing', 'testro' ),
					'title'   => __( 'From Commit to Release Decision in One Automated Loop', 'testro' ),
					'intro'   => __( 'Integrate Continuous Sanity Testing into CI/CD so every developer commit triggers build validation, automated sanity packs, AI validation, and a clear release decision.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'user-check',
							'stage'       => __( 'Commit', 'testro' ),
							'title'       => __( 'Developer Commit', 'testro' ),
							'description' => __( 'Code changes enter delivery and queue critical-path sanity validation immediately.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Build', 'testro' ),
							'title'       => __( 'Build', 'testro' ),
							'description' => __( 'CI/CD integration kicks Build Validation Testing as soon as the artifact is ready.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Sanity', 'testro' ),
							'title'       => __( 'Sanity Tests', 'testro' ),
							'description' => __( 'Automated trigger-based execution runs the focused sanity pack across critical workflows.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'AI', 'testro' ),
							'title'       => __( 'AI Validation', 'testro' ),
							'description' => __( 'AI Sanity Testing scores outcomes, highlights risk, and recommends gate actions.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Release Decision', 'testro' ),
							'description' => __( 'Release readiness signals tell teams whether to promote, hold, or escalate before full regression.', 'testro' ),
						),
					),
				),

				/* 5. Intelligent Test Maintenance -------------------------- */
				array(
					'type'    => 'healing',
					'id'      => 'intelligent-sanity-maintenance',
					'eyebrow' => __( 'Intelligent Test Maintenance', 'testro' ),
					'title'   => __( 'Keep Sanity Packs Green as Applications Evolve', 'testro' ),
					'intro'   => __( 'AI creates, heals, and updates sanity assets so Continuous Sanity Testing stays reliable after UI and workflow changes—without manual script churn.', 'testro' ),
					'steps'   => array(
						array(
							'icon'  => 'refresh',
							'label' => __( 'Application Update', 'testro' ),
						),
						array(
							'icon'  => 'scan-eye',
							'label' => __( 'AI Detection', 'testro' ),
						),
						array(
							'icon'  => 'wand',
							'label' => __( 'Self-Healing', 'testro' ),
						),
						array(
							'icon'  => 'pen-square',
							'label' => __( 'Updated Tests', 'testro' ),
						),
						array(
							'icon'  => 'circle-check',
							'label' => __( 'Successful Execution', 'testro' ),
						),
					),
					'items'   => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI Test Creation', 'testro' ),
							'description' => __( 'Generate focused sanity scenarios with AI so critical-path coverage expands without slow manual authoring.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Automation', 'testro' ),
							'description' => __( 'Repair broken locators mid-run so Sanity Test Automation keeps clearing gates after UI drift.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Smart Test Updates', 'testro' ),
							'description' => __( 'Persist healed steps and adaptive updates so tomorrow\'s sanity pack starts already stable.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Reusable Test Assets', 'testro' ),
							'description' => __( 'Share components across sanity packs to reduce duplication and accelerate maintenance.', 'testro' ),
						),
					),
				),

				/* 6. Test Execution Reports & Analytics -------------------- */
				array(
					'type'      => 'analytics',
					'id'        => 'sanity-execution-analytics',
					'eyebrow'   => __( 'Test Execution Reports & Analytics', 'testro' ),
					'title'     => __( 'See Critical Checks, Pass Rates, and Gate Risk in Real Time', 'testro' ),
					'intro'     => __( 'Monitor Automated Sanity Testing with live execution status, pass rates, failure trends, AI insights, quality scores, and release dashboards tailored to smaller critical suites—not full regression volume.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Real-Time Dashboards', 'testro' ),
							'description' => __( 'Track live execution status across critical sanity packs as builds progress.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Execution Reports', 'testro' ),
							'description' => __( 'Share concise Build Validation Testing reports that teams can act on immediately.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Failure Analysis', 'testro' ),
							'description' => __( 'Classify failed critical checks quickly so blockers never hide in noise.', 'testro' ),
						),
						array(
							'icon'        => 'stethoscope',
							'title'       => __( 'Root Cause Insights', 'testro' ),
							'description' => __( 'Use AI insights to pinpoint whether failures stem from code, data, or environment risk.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Sanity Analytics', 'testro' ),
						'build'     => __( 'Build #5124 · Critical Gate', 'testro' ),
						'status'    => __( 'Gate Clear', 'testro' ),
						'score'     => 96,
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '100%',
								'trend' => __( 'Critical clear', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Critical checks', 'testro' ),
								'value' => '42',
								'trend' => __( 'Focused suite', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Failed checks', 'testro' ),
								'value' => '0',
								'trend' => __( '0 blockers', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Gate time', 'testro' ),
								'value' => '4m 12s',
								'trend' => __( '−68%', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Sanity pass rate · 7 builds', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'B1', 'testro' ),
									'value' => 92,
								),
								array(
									'label' => __( 'B2', 'testro' ),
									'value' => 94,
								),
								array(
									'label' => __( 'B3', 'testro' ),
									'value' => 96,
								),
								array(
									'label' => __( 'B4', 'testro' ),
									'value' => 95,
								),
								array(
									'label' => __( 'B5', 'testro' ),
									'value' => 98,
								),
								array(
									'label' => __( 'B6', 'testro' ),
									'value' => 99,
								),
								array(
									'label' => __( 'B7', 'testro' ),
									'value' => 100,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'Critical path', 'testro' ),
								'value' => 48,
								'tone'  => 'healthy',
							),
							array(
								'label' => __( 'Bug-fix verify', 'testro' ),
								'value' => 27,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Build / env', 'testro' ),
								'value' => 25,
								'tone'  => 'warning',
							),
						),
					),
				),

				/* 7. Unified Test Automation Platform ---------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'unified-sanity-platform',
					'eyebrow' => __( 'Unified Test Automation Platform', 'testro' ),
					'title'   => __( 'One Sanity Hub Across Web, Mobile, API, and Browsers', 'testro' ),
					'intro'   => __( 'Run Automated Sanity Testing across every layer of your application through one unified AI-powered platform. Validate critical web, mobile, API, and cross-browser paths without switching tools.', 'testro' ),
					'hub'     => array(
						'icon'  => 'zap',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Sanity Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Testing', 'testro' ),
							'description' => __( 'Sanity-check critical UI journeys on modern web applications after every change.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Testing', 'testro' ),
							'description' => __( 'Validate essential mobile flows as part of every post-fix and build gate.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Confirm service health and contracts with focused API Sanity Test Automation.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Prove critical paths stay reliable across Chrome, Firefox, Edge, Safari, and more.', 'testro' ),
						),
					),
				),

				/* 8. Enterprise Integrations ------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'sanity-enterprise-integrations',
					'eyebrow' => __( 'Enterprise Integrations', 'testro' ),
					'title'   => __( 'Connect Sanity Gates to the Tools Your Teams Already Use', 'testro' ),
					'intro'   => __( 'Wire theTestRo into your DevOps ecosystem so Continuous Sanity Testing status, defects, and alerts flow through Jira, Jenkins, GitHub, Azure DevOps, Slack, and Bamboo.', 'testro' ),
					'hub'     => array(
						'icon'  => 'plug',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'DevOps Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Sync defects and sanity gate outcomes with engineering trackers.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Launch sanity packs from Jenkins jobs on every build.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger and report Continuous Sanity Testing from pull requests and workflows.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed sanity gates inside Azure pipelines and release stages.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Notify channels instantly when critical checks fail, recover, or clear.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Bamboo', 'testro' ),
							'description' => __( 'Connect Bamboo plans so Automated Sanity Testing protects every deployment path.', 'testro' ),
						),
					),
				),

				/* 9. Customer success outcomes ----------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'sanity-customer-success',
					'variant' => 'tint',
					'eyebrow' => __( 'Customer Success', 'testro' ),
					'title'   => __( 'Faster Gates. Less Manual Effort. Higher Confidence.', 'testro' ),
					'intro'   => __( 'Organizations use theTestRo to accelerate release validation, reduce manual sanity testing, improve software quality, increase deployment confidence, and detect critical issues earlier.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate release validation', 'testro' ),
							'description' => __( 'Clear critical gates in minutes so teams promote builds without waiting on full regression.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Reduce manual sanity testing', 'testro' ),
							'description' => __( 'Replace repetitive post-fix smoke checks with reliable Sanity Test Automation.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Improve software quality', 'testro' ),
							'description' => __( 'Catch broken critical paths before customers feel instability in production.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Increase deployment confidence', 'testro' ),
							'description' => __( 'Ship with evidence-backed Build Validation Testing after every bug fix or minor change.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Detect critical issues earlier', 'testro' ),
							'description' => __( 'Surface blockers in CI instead of discovering them late in the release window.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted By', 'testro' ),
					'title'   => __( 'Chosen by Teams Automating Continuous Sanity Testing', 'testro' ),
					'intro'   => __( 'QA, engineering, and DevOps organizations rely on theTestRo to clear critical-path gates, accelerate delivery, and protect every release between full regression cycles.', 'testro' ),
				),

				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'How Teams Ship Faster with AI-Powered Sanity Testing', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo Automated Sanity Testing to cut manual effort, validate critical changes after every build, integrate Continuous Sanity Testing into CI/CD, and release with confidence.', 'testro' ),
				),

				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Sanity Testing FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'ai-automated-sanity-testing',
				),

				array(
					'type'       => 'cta',
					'id'         => 'get-started-ai-automated-sanity-testing',
					'title'      => __( 'Validate Critical Changes Faster with AI-Powered Sanity Testing', 'testro' ),
					'intro'      => __( 'Accelerate software delivery with theTestRo\'s AI-powered Sanity Testing Platform. Quickly validate critical application functionality, automate build verification, integrate seamlessly into your DevOps pipeline, and release software with greater confidence through intelligent automation.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		/* ------------------------------------------------------------------ */
		/* Automated Functional Testing                                       */
		/* ------------------------------------------------------------------ */
		'automated-functional-testing' => array(
			'slug'   => 'automated-functional-testing',
			'title'  => __( 'Automated Functional Testing', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Best Automation Tools for Functional Testing | AI Functional Testing | theTestRo', 'testro' ),
				'description' => __( 'AI-powered Functional Testing Platform from theTestRo. Automate end-to-end functional testing across web, mobile, APIs, and enterprise apps with intelligent test creation, continuous execution, self-healing automation, and quality analytics.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'AI-Powered Functional Testing', 'testro' ),
				'title'    => __( 'Best Automation Tools for Functional Testing', 'testro' ),
				'subtitle' => __( 'Validate every business workflow with theTestRo\'s AI-powered Functional Testing Platform. Automate end-to-end functional testing across web, mobile, APIs, and enterprise applications using intelligent test creation, continuous execution, self-healing automation, and AI-driven quality insights. Deliver reliable software faster with complete confidence.', 'testro' ),
				'badges'   => array(
					__( 'End-to-End Workflows', 'testro' ),
					__( 'AI Test Creation', 'testro' ),
					__( 'Self-Healing', 'testro' ),
					__( 'Release Ready', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '10×',
						'label' => __( 'Faster test authoring', 'testro' ),
						'icon'  => 'zap',
					),
					array(
						'value' => '85%',
						'label' => __( 'Less maintenance effort', 'testro' ),
						'icon'  => 'wrench',
					),
					array(
						'value' => '3×',
						'label' => __( 'Broader functional coverage', 'testro' ),
						'icon'  => 'layout-grid',
					),
				),
			),

			'sections' => array(

				/* 1. Why theTestRo for Functional Test Automation ---------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'why-functional-testing',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Why theTestRo', 'testro' ),
					'title'   => __( 'Why theTestRo for Functional Test Automation', 'testro' ),
					'intro'   => __( 'Author, execute, and maintain functional suites with AI so every business workflow is validated with speed, reliability, and confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( '10X Faster Test Authoring & Development', 'testro' ),
							'description' => __( 'Accelerate test creation using AI-powered automation, low-code capabilities, and reusable test assets.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Continuous Test Execution Across Every Release', 'testro' ),
							'description' => __( 'Automatically validate functional workflows after every build, deployment, and release.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'AI-Powered Self-Healing & Intelligent Test Maintenance', 'testro' ),
							'description' => __( 'Reduce maintenance effort through automatic locator recovery, AI-powered updates, and intelligent automation.', 'testro' ),
						),
					),
				),

				/* 2. AI-Powered Functional Testing Platform ---------------- */
				array(
					'type'    => 'bento',
					'id'      => 'ai-functional-platform',
					'variant' => 'spotlight',
					'eyebrow' => __( 'AI-Powered Functional Testing Platform', 'testro' ),
					'title'   => __( 'Build, Accelerate, and Prove Every Functional Workflow', 'testro' ),
					'intro'   => __( 'Create end-to-end functional suites, run continuous validation inside delivery, drive data-powered scenarios, and turn every execution into release-ready intelligence.', 'testro' ),
					'groups'  => array(
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Build Reliable End-to-End Functional Tests', 'testro' ),
							'description' => __( 'Cover complete journeys across every layer so mission-critical workflows stay green after every update.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'browsers',
									'title'       => __( 'Automate Complete Business Workflows', 'testro' ),
									'description' => __( 'Validate complete user journeys from start to finish across multiple applications.', 'testro' ),
								),
								array(
									'icon'        => 'server',
									'title'       => __( 'UI & API Validation', 'testro' ),
									'description' => __( 'Ensure frontend functionality and backend services work together seamlessly.', 'testro' ),
								),
								array(
									'icon'        => 'target',
									'title'       => __( 'Comprehensive Functional Test Coverage', 'testro' ),
									'description' => __( 'Increase confidence with extensive automation coverage across critical business functions.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate Continuous Functional Testing', 'testro' ),
							'description' => __( 'Trigger, parallelize, and schedule functional tests so feedback arrives before the next deployment.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'plug',
									'title'       => __( 'CI/CD Pipeline Integration', 'testro' ),
									'description' => __( 'Automatically execute functional tests throughout your DevOps workflow.', 'testro' ),
								),
								array(
									'icon'        => 'infinity',
									'title'       => __( 'Parallel Test Execution', 'testro' ),
									'description' => __( 'Reduce execution time by running multiple functional tests simultaneously.', 'testro' ),
								),
								array(
									'icon'        => 'calendar-sync',
									'title'       => __( 'Scheduled Test Runs', 'testro' ),
									'description' => __( 'Schedule recurring test executions to maintain continuous quality.', 'testro' ),
								),
								array(
									'icon'        => 'cloud',
									'title'       => __( 'Multi-Environment Validation', 'testro' ),
									'description' => __( 'Validate application behavior consistently across development, QA, staging, and production.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Dynamic Data-Driven Functional Testing', 'testro' ),
							'description' => __( 'Parameterize scenarios, manage dynamic data, and reuse datasets without duplicating cases.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'filter-check',
									'title'       => __( 'Parameterized Test Execution', 'testro' ),
									'description' => __( 'Execute functional tests with multiple datasets using reusable scenarios.', 'testro' ),
								),
								array(
									'icon'        => 'database',
									'title'       => __( 'Dynamic Test Data Management', 'testro' ),
									'description' => __( 'Manage test data intelligently across multiple environments.', 'testro' ),
								),
								array(
									'icon'        => 'folder-tree',
									'title'       => __( 'Reusable Test Data Sets', 'testro' ),
									'description' => __( 'Reduce duplication with centralized reusable datasets.', 'testro' ),
								),
								array(
									'icon'        => 'sparkles',
									'title'       => __( 'Data-Driven Test Coverage', 'testro' ),
									'description' => __( 'Expand automation coverage by validating multiple business scenarios with dynamic data.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Built-in Reports & Quality Analytics', 'testro' ),
							'description' => __( 'Monitor runs live, diagnose failures faster, and measure release readiness with AI.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'activity',
									'title'       => __( 'Real-Time Execution Dashboard', 'testro' ),
									'description' => __( 'Monitor every functional test execution in real time.', 'testro' ),
								),
								array(
									'icon'        => 'microscope',
									'title'       => __( 'AI-Powered Failure Analysis', 'testro' ),
									'description' => __( 'Identify failures instantly with intelligent diagnostics and root cause analysis.', 'testro' ),
								),
								array(
									'icon'        => 'scan-eye',
									'title'       => __( 'Step-Level Logs & Screenshots', 'testro' ),
									'description' => __( 'Capture detailed logs, screenshots, and execution evidence for every test.', 'testro' ),
								),
								array(
									'icon'        => 'badge-check',
									'title'       => __( 'Quality Metrics & Release Insights', 'testro' ),
									'description' => __( 'Measure software quality and release readiness using AI-powered analytics.', 'testro' ),
								),
							),
						),
					),
				),

				/* 3. Cloud-Based Platform ---------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'cloud-functional-platform',
					'eyebrow' => __( 'Cloud-Based Platform for End-to-End Functional Testing', 'testro' ),
					'title'   => __( 'One Functional Hub Across Every Application Layer', 'testro' ),
					'intro'   => __( 'Execute end-to-end functional testing across every application layer using one centralized AI-powered cloud platform. Validate web applications, mobile apps, APIs, browsers, and enterprise systems through intelligent automation and scalable cloud infrastructure.', 'testro' ),
					'hub'     => array(
						'icon'  => 'zap',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Functional Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Application Testing', 'testro' ),
							'description' => __( 'Automate end-to-end functional journeys across modern web applications and critical UI flows.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Application Testing', 'testro' ),
							'description' => __( 'Validate mobile experiences and native flows as part of every functional cycle.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Protect contracts and service layers with automated API functional testing on every build.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Confirm functional paths stay reliable across Chrome, Firefox, Edge, Safari, and more.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Enterprise Application Testing', 'testro' ),
							'description' => __( 'Validate enterprise systems and complex business processes on scalable cloud infrastructure.', 'testro' ),
						),
					),
				),

				/* 4A. DevOps pipeline -------------------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'functional-devops-pipeline',
					'eyebrow' => __( 'Fits Seamlessly into Your DevOps Workflow', 'testro' ),
					'title'   => __( 'Continuous Functional Testing Inside Every Delivery Path', 'testro' ),
					'intro'   => __( 'Integrate functional testing directly into your DevOps pipeline to automate validation after every code change, build, or deployment. Receive immediate feedback, accelerate releases, and maintain continuous software quality across the entire development lifecycle.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'user-check',
							'stage'       => __( 'Commit', 'testro' ),
							'title'       => __( 'Developer Commit', 'testro' ),
							'description' => __( 'Code changes enter the pipeline and queue continuous functional validation.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Build', 'testro' ),
							'title'       => __( 'Build', 'testro' ),
							'description' => __( 'CI/CD builds automatically trigger the right functional test packs.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'AI Testing', 'testro' ),
							'title'       => __( 'AI Functional Testing', 'testro' ),
							'description' => __( 'AI-powered suites execute in parallel with self-healing maintenance in the loop.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'stage'       => __( 'Quality', 'testro' ),
							'title'       => __( 'Quality Validation', 'testro' ),
							'description' => __( 'Teams get live results, failure insights, and release readiness signals.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Release', 'testro' ),
							'description' => __( 'Approved builds ship with continuous quality confidence baked in.', 'testro' ),
						),
					),
				),

				/* 4B. Enterprise tool integrations ------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'functional-enterprise-integrations',
					'eyebrow' => __( 'Enterprise Integrations', 'testro' ),
					'title'   => __( 'Connect Functional Testing to the Tools Your Teams Already Use', 'testro' ),
					'intro'   => __( 'Wire theTestRo into Jira, Jenkins, GitHub, Azure DevOps, Slack, and Bamboo so functional testing status, defects, and alerts flow through your delivery toolchain.', 'testro' ),
					'hub'     => array(
						'icon'  => 'plug',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'DevOps Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'CI/CD Integration', 'testro' ),
							'description' => __( 'Embed functional gates inside any modern continuous delivery pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Sync defects and functional outcomes with engineering trackers.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Launch functional suites from Jenkins jobs on every build.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger and report continuous functional testing from pull requests and workflows.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed functional gates inside Azure pipelines and release stages.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Notify channels instantly when functional tests fail, recover, or clear.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Bamboo', 'testro' ),
							'description' => __( 'Connect Bamboo plans so continuous functional testing protects every deployment path.', 'testro' ),
						),
					),
				),

				/* 5. Analytics enrichment ---------------------------------- */
				array(
					'type'      => 'analytics',
					'id'        => 'functional-execution-dashboard',
					'eyebrow'   => __( 'Quality Analytics', 'testro' ),
					'title'     => __( 'See Workflow Health, Pass Rates, and Release Risk in Real Time', 'testro' ),
					'intro'     => __( 'Track continuous functional testing with live KPIs, pass/fail trends, coverage signals, and AI-assisted failure insights—so release decisions stay evidence-based.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Live workflow progress', 'testro' ),
							'description' => __( 'Monitor running functional packs across browsers and environments.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Pass/fail trends', 'testro' ),
							'description' => __( 'Spot stability shifts before they become release blockers.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'AI failure insights', 'testro' ),
							'description' => __( 'Classify recurring issues faster with AI-powered diagnostics.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Release readiness scoring', 'testro' ),
							'description' => __( 'Quantify confidence before promoting the next build.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Functional Analytics', 'testro' ),
						'build'     => __( 'Release 5.2 · CI + Nightly', 'testro' ),
						'status'    => __( 'Healthy', 'testro' ),
						'score'     => 98,
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '99.1%',
								'trend' => __( '+1.8%', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Coverage', 'testro' ),
								'value' => '96%',
								'trend' => __( '+8%', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Failed tests', 'testro' ),
								'value' => '5',
								'trend' => __( '1 critical', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Maintenance', 'testro' ),
								'value' => '−85%',
								'trend' => __( 'Self-healed', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Functional pass rate · 7 runs', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'R1', 'testro' ),
									'value' => 88,
								),
								array(
									'label' => __( 'R2', 'testro' ),
									'value' => 91,
								),
								array(
									'label' => __( 'R3', 'testro' ),
									'value' => 93,
								),
								array(
									'label' => __( 'R4', 'testro' ),
									'value' => 95,
								),
								array(
									'label' => __( 'R5', 'testro' ),
									'value' => 96,
								),
								array(
									'label' => __( 'R6', 'testro' ),
									'value' => 98,
								),
								array(
									'label' => __( 'R7', 'testro' ),
									'value' => 99,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'UI change', 'testro' ),
								'value' => 34,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Test data', 'testro' ),
								'value' => 28,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Environment', 'testro' ),
								'value' => 38,
								'tone'  => 'healthy',
							),
						),
					),
				),

				/* 6. Customer success outcomes ----------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'functional-customer-success',
					'variant' => 'tint',
					'eyebrow' => __( 'Customer Success', 'testro' ),
					'title'   => __( 'Faster Releases. Higher Coverage. Lower Risk.', 'testro' ),
					'intro'   => __( 'Organizations use theTestRo to accelerate functional testing, improve software quality, increase automation coverage, reduce release risks, minimize manual testing effort, and deliver faster software releases.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate functional testing', 'testro' ),
							'description' => __( 'AI authoring and parallel execution cut the time it takes to validate complete business workflows.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Improve software quality', 'testro' ),
							'description' => __( 'Validate user journeys, APIs, and application functionality before customers feel defects.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Increase automation coverage', 'testro' ),
							'description' => __( 'Expand web, mobile, and API functional coverage without growing headcount.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Reduce release risks', 'testro' ),
							'description' => __( 'Release readiness metrics and quality gates protect every promotion.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Minimize manual testing effort', 'testro' ),
							'description' => __( 'Replace repetitive functional checks with reliable AI-powered automation.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Deliver faster software releases', 'testro' ),
							'description' => __( 'Continuous functional feedback returns in time for every commit and deployment.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted By', 'testro' ),
					'title'   => __( 'Chosen by Teams Automating Functional Testing', 'testro' ),
					'intro'   => __( 'QA, engineering, and DevOps organizations rely on theTestRo to keep functional suites green, accelerate delivery, and protect every release.', 'testro' ),
				),

				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'How Teams Ship Faster with AI-Powered Functional Testing', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo to accelerate functional testing, improve software quality, increase automation coverage, reduce release risks, minimize manual testing effort, and deliver faster software releases.', 'testro' ),
				),

				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Functional Testing FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'automated-functional-testing',
				),

				array(
					'type'       => 'cta',
					'id'         => 'get-started-automated-functional-testing',
					'title'      => __( 'Automate Functional Testing with AI. Deliver Quality Faster.', 'testro' ),
					'intro'      => __( 'Transform your software quality process with theTestRo\'s AI-powered Functional Testing Platform. Automate complete business workflows, integrate seamlessly into your DevOps pipeline, reduce maintenance with AI, and deliver reliable software faster through intelligent end-to-end functional testing.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		/* ------------------------------------------------------------------ */
		/* End-to-End Testing                                                 */
		/* ------------------------------------------------------------------ */
		'end-to-end-testing' => array(
			'slug'   => 'end-to-end-testing',
			'title'  => __( 'End-to-End Testing', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Best Automated End-to-End Testing Tool | AI E2E Testing | theTestRo', 'testro' ),
				'description' => __( 'AI-powered End-to-End Testing Platform from theTestRo. Automate complete business workflows across web, mobile, APIs, databases, and enterprise systems with intelligent automation, self-healing technology, cloud execution, and AI-driven quality insights.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'AI-Powered End-to-End Testing', 'testro' ),
				'title'    => __( 'Best Automated End-to-End Testing Tool', 'testro' ),
				'subtitle' => __( 'Validate complete business workflows with theTestRo\'s AI-powered End-to-End Testing Platform. Automate user journeys across web applications, mobile apps, APIs, databases, and enterprise systems using intelligent automation, self-healing technology, cloud execution, and AI-driven quality insights. Deliver reliable software faster while ensuring every business process works flawlessly.', 'testro' ),
				'badges'   => array(
					__( 'Business Workflows', 'testro' ),
					__( 'AI Automation', 'testro' ),
					__( 'Self-Healing', 'testro' ),
					__( 'Cloud Execution', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '10×',
						'label' => __( 'Faster E2E authoring', 'testro' ),
						'icon'  => 'zap',
					),
					array(
						'value' => '85%',
						'label' => __( 'Less maintenance effort', 'testro' ),
						'icon'  => 'wrench',
					),
					array(
						'value' => '3×',
						'label' => __( 'Broader journey coverage', 'testro' ),
						'icon'  => 'layout-grid',
					),
				),
			),

			'sections' => array(

				/* 1. Why theTestRo for End-to-End Test Automation ---------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'why-end-to-end-testing',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Why theTestRo', 'testro' ),
					'title'   => __( 'Why theTestRo for End-to-End Test Automation', 'testro' ),
					'intro'   => __( 'Create, validate, and maintain complete business journeys with AI so every cross-system workflow stays reliable from commit to production.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Accelerate End-to-End Test Creation with AI', 'testro' ),
							'description' => __( 'Automatically generate comprehensive end-to-end scenarios using AI, dramatically reducing manual scripting and setup time.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Validate Complete Business Workflows', 'testro' ),
							'description' => __( 'Ensure every customer journey and business process works seamlessly across multiple applications and integrated systems.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Reduce Test Maintenance with Self-Healing Automation', 'testro' ),
							'description' => __( 'Automatically recover from UI and application changes using AI-powered self-healing technology and intelligent maintenance.', 'testro' ),
						),
					),
				),

				/* 2. AI-Powered End-to-End Testing Platform ---------------- */
				array(
					'type'    => 'bento',
					'id'      => 'ai-e2e-platform',
					'variant' => 'spotlight',
					'eyebrow' => __( 'AI-Powered End-to-End Testing Platform', 'testro' ),
					'title'   => __( 'Create, Execute, and Prove Complete Business Journeys', 'testro' ),
					'intro'   => __( 'Author comprehensive end-to-end scenarios, run them at enterprise scale, manage data-driven workflows, and turn every execution into release-ready intelligence.', 'testro' ),
					'groups'  => array(
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Create Comprehensive End-to-End Test Scenarios', 'testro' ),
							'description' => __( 'Cover complete journeys across applications and services so mission-critical workflows stay green after every update.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'browsers',
									'title'       => __( 'Automate Multi-Step Business Processes', 'testro' ),
									'description' => __( 'Validate complete workflows spanning multiple applications and services.', 'testro' ),
								),
								array(
									'icon'        => 'server',
									'title'       => __( 'Validate Cross-System Workflows', 'testro' ),
									'description' => __( 'Ensure seamless communication between frontend applications, APIs, databases, and enterprise platforms.', 'testro' ),
								),
								array(
									'icon'        => 'target',
									'title'       => __( 'Ensure End-to-End User Journey Coverage', 'testro' ),
									'description' => __( 'Cover every critical customer interaction from login to transaction completion.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Execute End-to-End Tests at Scale', 'testro' ),
							'description' => __( 'Parallelize, schedule, and cloud-execute E2E suites so feedback arrives before the next deployment.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'infinity',
									'title'       => __( 'Parallel Test Execution', 'testro' ),
									'description' => __( 'Reduce execution time by running multiple end-to-end workflows simultaneously.', 'testro' ),
								),
								array(
									'icon'        => 'layout-grid',
									'title'       => __( 'Cross-Browser & Cross-Platform Testing', 'testro' ),
									'description' => __( 'Validate user journeys across browsers, operating systems, and devices.', 'testro' ),
								),
								array(
									'icon'        => 'cloud',
									'title'       => __( 'Cloud-Based Test Execution', 'testro' ),
									'description' => __( 'Execute enterprise-scale testing through secure cloud infrastructure.', 'testro' ),
								),
								array(
									'icon'        => 'calendar-sync',
									'title'       => __( 'Scheduled & Trigger-Based Test Runs', 'testro' ),
									'description' => __( 'Automatically execute tests after deployments, builds, or scheduled intervals.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'AI-Driven Test Data & Workflow Management', 'testro' ),
							'description' => __( 'Manage dynamic data, reuse modular workflows, and keep suites healthy with intelligent maintenance.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'database',
									'title'       => __( 'Dynamic Test Data Handling', 'testro' ),
									'description' => __( 'Manage test data intelligently across multiple testing environments.', 'testro' ),
								),
								array(
									'icon'        => 'puzzle',
									'title'       => __( 'Reusable Test Components', 'testro' ),
									'description' => __( 'Build modular workflows that simplify long-term maintenance.', 'testro' ),
								),
								array(
									'icon'        => 'filter-check',
									'title'       => __( 'Parameterized Test Execution', 'testro' ),
									'description' => __( 'Execute the same workflows using multiple datasets without duplication.', 'testro' ),
								),
								array(
									'icon'        => 'heart-pulse',
									'title'       => __( 'Intelligent Test Maintenance', 'testro' ),
									'description' => __( 'Leverage AI-powered self-healing to minimize maintenance effort.', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Advanced Test Reports & Execution Insights', 'testro' ),
							'description' => __( 'Monitor runs live, diagnose failures faster, and measure release readiness with AI.', 'testro' ),
							'items'       => array(
								array(
									'icon'        => 'activity',
									'title'       => __( 'Real-Time Execution Dashboard', 'testro' ),
									'description' => __( 'Monitor end-to-end execution progress through centralized dashboards.', 'testro' ),
								),
								array(
									'icon'        => 'microscope',
									'title'       => __( 'AI-Powered Failure Analysis', 'testro' ),
									'description' => __( 'Identify failures instantly with intelligent diagnostics and recommendations.', 'testro' ),
								),
								array(
									'icon'        => 'file-text',
									'title'       => __( 'Step-by-Step Execution Logs', 'testro' ),
									'description' => __( 'Access detailed execution history for every workflow.', 'testro' ),
								),
								array(
									'icon'        => 'video',
									'title'       => __( 'Screenshots & Video Recording', 'testro' ),
									'description' => __( 'Capture complete visual evidence for every execution.', 'testro' ),
								),
								array(
									'icon'        => 'badge-check',
									'title'       => __( 'Release Readiness Insights', 'testro' ),
									'description' => __( 'Measure deployment confidence using AI-powered quality intelligence.', 'testro' ),
								),
							),
						),
					),
				),

				/* 3. Cloud-Based Platform ---------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'cloud-e2e-platform',
					'eyebrow' => __( 'Cloud-Based Platform for End-to-End Testing', 'testro' ),
					'title'   => __( 'One E2E Hub Across Every Application Layer', 'testro' ),
					'intro'   => __( 'Execute comprehensive end-to-end testing across every application layer from one unified AI-powered cloud platform. Validate complete user journeys spanning frontend interfaces, backend services, APIs, enterprise applications, and third-party integrations.', 'testro' ),
					'hub'     => array(
						'icon'  => 'zap',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'E2E Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Application Testing', 'testro' ),
							'description' => __( 'Automate end-to-end journeys across modern web applications and critical UI flows.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Frontend Testing', 'testro' ),
							'description' => __( 'Validate interface behavior and customer-facing steps within complete business workflows.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Backend Testing', 'testro' ),
							'description' => __( 'Confirm business services and data layers stay aligned through every end-to-end path.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Application Testing', 'testro' ),
							'description' => __( 'Validate mobile experiences and native flows as part of every end-to-end cycle.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Protect contracts and service layers with automated API validation on every journey.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Confirm end-to-end paths stay reliable across Chrome, Firefox, Edge, Safari, and more.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Enterprise Application Testing', 'testro' ),
							'description' => __( 'Validate enterprise systems and complex business processes on scalable cloud infrastructure.', 'testro' ),
						),
					),
				),

				/* 4A. DevOps pipeline -------------------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'e2e-devops-pipeline',
					'eyebrow' => __( 'Integrate with Your DevOps Ecosystem', 'testro' ),
					'title'   => __( 'Continuous End-to-End Testing Inside Every Delivery Path', 'testro' ),
					'intro'   => __( 'Integrate end-to-end testing seamlessly into your DevOps workflow to automatically validate complete business processes after every code change, build, or deployment. Accelerate software delivery while maintaining continuous quality and release confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'user-check',
							'stage'       => __( 'Commit', 'testro' ),
							'title'       => __( 'Developer Commit', 'testro' ),
							'description' => __( 'Code changes enter the pipeline and queue continuous end-to-end validation.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Build', 'testro' ),
							'title'       => __( 'Build', 'testro' ),
							'description' => __( 'CI/CD builds automatically trigger the right end-to-end workflow packs.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'AI Testing', 'testro' ),
							'title'       => __( 'AI End-to-End Testing', 'testro' ),
							'description' => __( 'AI-powered journeys execute in parallel with self-healing maintenance in the loop.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'stage'       => __( 'Quality', 'testro' ),
							'title'       => __( 'Quality Validation', 'testro' ),
							'description' => __( 'Teams get live results, failure insights, and release readiness signals.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Deploy', 'testro' ),
							'title'       => __( 'Deployment', 'testro' ),
							'description' => __( 'Approved builds promote with continuous quality confidence baked in.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'stage'       => __( 'Live', 'testro' ),
							'title'       => __( 'Production', 'testro' ),
							'description' => __( 'Business workflows stay proven as software reaches customers.', 'testro' ),
						),
					),
				),

				/* 4B. Enterprise tool integrations ------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'e2e-enterprise-integrations',
					'eyebrow' => __( 'Enterprise Integrations', 'testro' ),
					'title'   => __( 'Connect End-to-End Testing to the Tools Your Teams Already Use', 'testro' ),
					'intro'   => __( 'Wire theTestRo into Jira, Jenkins, GitHub, Azure DevOps, Slack, and Bamboo so end-to-end testing status, defects, and alerts flow through your delivery toolchain.', 'testro' ),
					'hub'     => array(
						'icon'  => 'plug',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'DevOps Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'CI/CD Integration', 'testro' ),
							'description' => __( 'Embed end-to-end gates inside any modern continuous delivery pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Sync defects and E2E outcomes with engineering trackers.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Launch end-to-end suites from Jenkins jobs on every build.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger and report continuous E2E testing from pull requests and workflows.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed end-to-end gates inside Azure pipelines and release stages.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Notify channels instantly when end-to-end tests fail, recover, or clear.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Bamboo', 'testro' ),
							'description' => __( 'Connect Bamboo plans so continuous E2E testing protects every deployment path.', 'testro' ),
						),
					),
				),

				/* 5. Analytics enrichment ---------------------------------- */
				array(
					'type'      => 'analytics',
					'id'        => 'e2e-execution-dashboard',
					'eyebrow'   => __( 'Quality Analytics', 'testro' ),
					'title'     => __( 'See Journey Health, Pass Rates, and Release Risk in Real Time', 'testro' ),
					'intro'     => __( 'Track continuous end-to-end testing with live KPIs, pass/fail trends, coverage signals, and AI-assisted failure insights—so release decisions stay evidence-based.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Live journey progress', 'testro' ),
							'description' => __( 'Monitor running end-to-end packs across browsers and environments.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Pass/fail trends', 'testro' ),
							'description' => __( 'Spot stability shifts before they become release blockers.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'AI failure insights', 'testro' ),
							'description' => __( 'Classify recurring issues faster with AI-powered diagnostics.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Release readiness scoring', 'testro' ),
							'description' => __( 'Quantify confidence before promoting the next build.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'E2E Analytics', 'testro' ),
						'build'     => __( 'Release 5.2 · CI + Nightly', 'testro' ),
						'status'    => __( 'Healthy', 'testro' ),
						'score'     => 98,
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '99.2%',
								'trend' => __( '+2.1%', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Coverage', 'testro' ),
								'value' => '97%',
								'trend' => __( '+9%', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Failed journeys', 'testro' ),
								'value' => '3',
								'trend' => __( '1 critical', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Maintenance', 'testro' ),
								'value' => '−85%',
								'trend' => __( 'Self-healed', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'E2E pass rate · 7 runs', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'R1', 'testro' ),
									'value' => 89,
								),
								array(
									'label' => __( 'R2', 'testro' ),
									'value' => 91,
								),
								array(
									'label' => __( 'R3', 'testro' ),
									'value' => 94,
								),
								array(
									'label' => __( 'R4', 'testro' ),
									'value' => 95,
								),
								array(
									'label' => __( 'R5', 'testro' ),
									'value' => 97,
								),
								array(
									'label' => __( 'R6', 'testro' ),
									'value' => 98,
								),
								array(
									'label' => __( 'R7', 'testro' ),
									'value' => 99,
								),
							),
						),
						'breakdown' => array(
							array(
								'label' => __( 'UI change', 'testro' ),
								'value' => 32,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Integration', 'testro' ),
								'value' => 30,
								'tone'  => 'warning',
							),
							array(
								'label' => __( 'Environment', 'testro' ),
								'value' => 38,
								'tone'  => 'healthy',
							),
						),
					),
				),

				/* 6. Customer success outcomes ----------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'e2e-customer-success',
					'variant' => 'tint',
					'eyebrow' => __( 'Customer Success', 'testro' ),
					'title'   => __( 'Faster Journeys. Higher Reliability. Lower Risk.', 'testro' ),
					'intro'   => __( 'Organizations use theTestRo to accelerate end-to-end testing, improve business workflow reliability, reduce release risks, increase automation coverage, minimize maintenance effort, and deliver better customer experiences.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate end-to-end testing', 'testro' ),
							'description' => __( 'AI authoring and parallel execution cut the time it takes to validate complete business workflows.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Improve business workflow reliability', 'testro' ),
							'description' => __( 'Validate cross-system journeys before customers feel defects in critical processes.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Reduce release risks', 'testro' ),
							'description' => __( 'Release readiness metrics and quality gates protect every promotion.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Increase automation coverage', 'testro' ),
							'description' => __( 'Expand web, mobile, API, and enterprise journey coverage without growing headcount.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Minimize maintenance effort', 'testro' ),
							'description' => __( 'Self-healing automation keeps long end-to-end suites stable as applications evolve.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Deliver better customer experiences', 'testro' ),
							'description' => __( 'Prove every critical user journey works flawlessly before it reaches production.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted By', 'testro' ),
					'title'   => __( 'Chosen by Teams Automating End-to-End Testing', 'testro' ),
					'intro'   => __( 'QA, engineering, and DevOps organizations rely on theTestRo to keep end-to-end journeys green, accelerate delivery, and protect every release.', 'testro' ),
				),

				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'How Teams Ship Faster with AI-Powered End-to-End Testing', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo to accelerate end-to-end testing, improve business workflow reliability, reduce release risks, increase automation coverage, minimize maintenance effort, and deliver better customer experiences.', 'testro' ),
				),

				array(
					'type'    => 'faq',
					'eyebrow' => __( 'End-to-End Testing FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'end-to-end-testing',
				),

				array(
					'type'       => 'cta',
					'id'         => 'get-started-end-to-end-testing',
					'title'      => __( 'Automate Complete Business Workflows with AI-Powered End-to-End Testing', 'testro' ),
					'intro'      => __( 'Transform your software quality process with theTestRo\'s AI-powered End-to-End Testing Platform. Validate complete user journeys across web, mobile, APIs, databases, and enterprise applications while reducing maintenance, accelerating releases, and delivering exceptional software experiences with confidence.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		/* ------------------------------------------------------------------ */
		/* Software Testing Use Cases (hub)                                   */
		/* ------------------------------------------------------------------ */
		'use-cases' => array(
			'slug'   => 'use-cases',
			'title'  => __( 'Software Testing Use Cases', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Software Testing Use Cases | AI Test Automation Hub | theTestRo', 'testro' ),
				'description' => __( 'Explore software testing use cases for modern QA teams. Automate regression, functional, integration, end-to-end, frontend, and backend testing with AI-powered test automation from theTestRo.', 'testro' ),
			),

			'hero' => array(
				'logos'    => true,
				'eyebrow'  => __( 'Software Testing Solutions', 'testro' ),
				'title'    => __( 'Software Testing Use Cases for Modern QA Teams', 'testro' ),
				'subtitle' => __( 'Discover how theTestRo helps QA teams automate every stage of software testing using AI-powered automation, no-code testing, self-healing technology, intelligent analytics, and enterprise-grade execution. From regression testing to end-to-end validation, explore purpose-built testing solutions designed to accelerate software delivery while improving quality and reducing maintenance.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Free Trial', 'testro' ),
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
			),

			'sections' => array(

				array(
					'type'    => 'feature-grid',
					'id'      => 'why-software-testing-use-cases-matter',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Why It Matters', 'testro' ),
					'title'   => __( 'Why Software Testing Use Cases Matter', 'testro' ),
					'intro'   => __( 'Purpose-built testing use cases help QA teams improve software quality, accelerate releases, and embed continuous validation across every DevOps stage.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Improve Software Quality', 'testro' ),
							'description' => __( 'Detect defects earlier and deliver more reliable applications.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate Release Cycles', 'testro' ),
							'description' => __( 'Automate repetitive testing to ship software faster.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Reduce Production Defects', 'testro' ),
							'description' => __( 'Catch issues before they impact end users.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Increase Test Coverage', 'testro' ),
							'description' => __( 'Validate every business workflow across applications and environments.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Enable Continuous Testing', 'testro' ),
							'description' => __( 'Integrate testing into every stage of your DevOps pipeline.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'use-case-grid',
					'id'      => 'explore-software-testing-use-cases',
					'variant' => 'tint',
					'columns' => 3,
					'eyebrow' => __( 'Explore Solutions', 'testro' ),
					'title'   => __( 'Explore Software Testing Use Cases', 'testro' ),
					'intro'   => __( 'Browse AI-powered testing solutions purpose-built for every stage of quality engineering—from smoke validation to enterprise end-to-end journeys.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Regression Testing', 'testro' ),
							'description' => __( 'Automatically validate existing functionality after every release using AI-powered regression testing, continuous execution, and intelligent maintenance.', 'testro' ),
							'href'        => testro_nav_url( 'regression-test-automation' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'regression',
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Smoke Testing', 'testro' ),
							'description' => __( 'Verify the stability of every new build by validating the most critical application functionality before deeper testing begins.', 'testro' ),
							'href'        => testro_nav_url( 'ai-automated-sanity-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'smoke',
						),
						array(
							'icon'        => 'circle-check',
							'title'       => __( 'Sanity Testing', 'testro' ),
							'description' => __( 'Quickly validate bug fixes and newly added features with AI-powered sanity testing to ensure applications remain stable after changes.', 'testro' ),
							'href'        => testro_nav_url( 'ai-automated-sanity-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'sanity',
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Functional Testing', 'testro' ),
							'description' => __( 'Automate complete business workflows across web, mobile, APIs, and enterprise applications with intelligent functional testing.', 'testro' ),
							'href'        => testro_nav_url( 'automated-functional-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'functional',
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Integration Testing', 'testro' ),
							'description' => __( 'Validate APIs, microservices, databases, and third-party integrations using AI-powered integration testing and intelligent automation.', 'testro' ),
							'href'        => testro_nav_url( 'ai-powered-integration-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'integration',
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'End-to-End Testing', 'testro' ),
							'description' => __( 'Automate complete customer journeys across multiple systems, applications, and platforms using enterprise-grade end-to-end testing.', 'testro' ),
							'href'        => testro_nav_url( 'end-to-end-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'e2e',
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Frontend Testing', 'testro' ),
							'description' => __( 'Ensure flawless user experiences by validating UI behavior, layouts, responsiveness, accessibility, and browser compatibility.', 'testro' ),
							'href'        => testro_nav_url( 'automated-web-application-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'frontend',
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Backend Testing', 'testro' ),
							'description' => __( 'Validate APIs, databases, business logic, authentication, and backend services using intelligent AI-powered backend testing.', 'testro' ),
							'href'        => testro_nav_url( 'automated-api-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'backend',
						),
					),
				),

				array(
					'type'    => 'bento',
					'id'      => 'why-choose-thetestro-use-cases',
					'variant' => 'spotlight',
					'eyebrow' => __( 'Why theTestRo', 'testro' ),
					'title'   => __( 'Why Choose theTestRo for Every Testing Use Case', 'testro' ),
					'intro'   => __( 'One AI-powered quality platform for authoring, execution, self-healing maintenance, and release intelligence across every software testing use case.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Powered Test Automation', 'testro' ),
							'description' => __( 'Automatically generate and execute intelligent test scenarios.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'No-Code Test Creation', 'testro' ),
							'description' => __( 'Build automated tests without writing code.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Tests', 'testro' ),
							'description' => __( 'Automatically recover from UI and application changes.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Validate applications across Chrome, Edge, Firefox, Safari, and more.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Automate API validation alongside UI testing from one platform.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Parallel Test Execution', 'testro' ),
							'description' => __( 'Execute thousands of tests simultaneously to reduce execution time.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'CI/CD Integration', 'testro' ),
							'description' => __( 'Integrate automated testing into every software delivery pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Reports & Analytics', 'testro' ),
							'description' => __( 'Gain real-time insights through AI-powered dashboards and detailed reporting.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'architecture',
					'id'      => 'supported-platforms',
					'eyebrow' => __( 'Supported Platforms', 'testro' ),
					'title'   => __( 'One Platform for Every Testing Surface', 'testro' ),
					'intro'   => __( 'Run every testing use case from one unified AI-powered testing platform across web, APIs, enterprise software, and cloud-native applications.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'AI Test Automation', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Applications', 'testro' ),
							'description' => __( 'Automate UI journeys, responsiveness, and browser compatibility for modern web apps.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'APIs', 'testro' ),
							'description' => __( 'Validate contracts, authentication, payloads, and service interactions at scale.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Enterprise Applications', 'testro' ),
							'description' => __( 'Cover ERP, CRM, and mission-critical enterprise workflows with resilient automation.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Cloud Applications', 'testro' ),
							'description' => __( 'Execute cloud-native suites with parallel capacity and continuous delivery feedback.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'outcomes',
					'id'      => 'benefits-ai-powered-test-automation',
					'variant' => 'tint',
					'eyebrow' => __( 'Business Impact', 'testro' ),
					'title'   => __( 'Benefits of AI-Powered Test Automation', 'testro' ),
					'intro'   => __( 'Turn every testing use case into measurable delivery outcomes—faster execution, lower maintenance, broader coverage, and higher release confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Faster Test Execution', 'testro' ),
							'description' => __( 'Execute more tests in less time through intelligent automation.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Reduced Maintenance', 'testro' ),
							'description' => __( 'Reduce manual updates with self-healing automation.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Higher Test Coverage', 'testro' ),
							'description' => __( 'Increase automation coverage across every business workflow.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Reliable Test Results', 'testro' ),
							'description' => __( 'Improve testing consistency using AI-powered execution.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Software Releases', 'testro' ),
							'description' => __( 'Release software with greater confidence and fewer production defects.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Improved QA Productivity', 'testro' ),
							'description' => __( 'Allow QA teams to focus on innovation instead of repetitive testing.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted By', 'testro' ),
					'title'   => __( 'Chosen by Teams Automating Every Testing Use Case', 'testro' ),
					'intro'   => __( 'QA, engineering, and DevOps organizations rely on theTestRo to automate regression, functional, integration, and end-to-end testing with AI-powered quality engineering.', 'testro' ),
				),

				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Use Cases FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'use-cases',
				),

				array(
					'type'       => 'cta',
					'id'         => 'automate-every-testing-use-case',
					'title'      => __( 'Automate Every Testing Use Case with AI-Powered Quality Engineering', 'testro' ),
					'intro'      => __( 'Whether you\'re validating a new feature, running regression tests, verifying APIs, or automating complete business workflows, theTestRo provides one intelligent AI-powered platform for every software testing need. Deliver faster releases, reduce maintenance, and improve software quality with enterprise-grade automation.', 'testro' ),
					'actions'    => array(
						array(
							'label' => __( 'Start Free Trial', 'testro' ),
							'style' => 'primary',
							'modal' => 'demo-modal',
						),
						array(
							'label' => __( 'Schedule a Demo', 'testro' ),
							'style' => 'outline',
							'modal' => 'demo-modal',
							'icon'  => 'arrow-right',
						),
					),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		/* ------------------------------------------------------------------ */
		/* AI-Powered Integration Testing                                     */
		/* ------------------------------------------------------------------ */
		'ai-powered-integration-testing' => array(
			'slug'   => 'ai-powered-integration-testing',
			'title'  => __( 'AI-Powered Integration Testing', 'testro' ),
			'seo'    => array(
				'title'       => __( 'AI Integration Testing Tool | API & Microservices Testing | theTestRo', 'testro' ),
				'description' => __( 'AI Integration Testing Tool from theTestRo. Automate API Integration Testing, Microservices Testing, and No-Code Integration Testing across databases, enterprise apps, and third-party systems with self-healing Automated Integration Testing.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'AI-Powered Integration Testing', 'testro' ),
				'title'    => __( 'Best AI Integration Testing Tool', 'testro' ),
				'subtitle' => __( 'Validate every connection across your software ecosystem with theTestRo\'s AI-powered Integration Testing Platform. Automate testing between APIs, microservices, databases, enterprise applications, and third-party systems using intelligent automation, no-code workflows, and AI-driven quality engineering. Ensure seamless data flow, reliable integrations, and faster software releases with confidence.', 'testro' ),
				'badges'   => array(
					__( 'API Validation', 'testro' ),
					__( 'Self-Healing AI', 'testro' ),
					__( 'No-Code Workflows', 'testro' ),
					__( 'Enterprise Scale', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '75%',
						'label' => __( 'Faster integration validation', 'testro' ),
						'icon'  => 'zap',
					),
					array(
						'value' => '4×',
						'label' => __( 'Broader connection coverage', 'testro' ),
						'icon'  => 'layout-grid',
					),
					array(
						'value' => '65%',
						'label' => __( 'Less integration maintenance', 'testro' ),
						'icon'  => 'wrench',
					),
				),
			),

			'sections' => array(

				/* 1. Scale Integration Test Automation --------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'scale-integration-automation',
					'eyebrow' => __( 'AI & No-Code Automation', 'testro' ),
					'title'   => __( 'Scale Integration Test Automation with AI & No-Code', 'testro' ),
					'intro'   => __( 'Define critical connections, create no-code integration tests, validate API contracts, execute in parallel, and keep suites healthy with self-healing AI—so Automated Integration Testing scales with your ecosystem.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'target',
							'stage'       => __( 'Integration Scope', 'testro' ),
							'title'       => __( 'Define Integration Scope', 'testro' ),
							'description' => __( 'Identify critical application interactions and business workflows that require validation.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'AI Test Creation', 'testro' ),
							'title'       => __( 'Create Integration Tests Without Coding', 'testro' ),
							'description' => __( 'Build powerful integration tests using AI-assisted visual automation without writing code.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'stage'       => __( 'Validation', 'testro' ),
							'title'       => __( 'Validate API Contracts', 'testro' ),
							'description' => __( 'Ensure APIs consistently meet functional and business requirements.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'stage'       => __( 'Execution', 'testro' ),
							'title'       => __( 'Execute Integration Tests in Parallel', 'testro' ),
							'description' => __( 'Accelerate testing across multiple integrations simultaneously.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'stage'       => __( 'AI Analytics', 'testro' ),
							'title'       => __( 'Reduce Test Maintenance with Self-Healing AI', 'testro' ),
							'description' => __( 'Automatically adapt to changing APIs and connected systems using intelligent self-healing automation.', 'testro' ),
						),
					),
				),

				/* 2. Why Teams Choose theTestRo ---------------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'why-integration-testing',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Why theTestRo', 'testro' ),
					'title'   => __( 'Why Teams Choose theTestRo for Integration Testing', 'testro' ),
					'intro'   => __( 'Accelerate verification across interconnected systems with AI Integration Testing that creates scenarios faster, heals itself, and keeps every deployment under continuous validation.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Faster Integration Validation', 'testro' ),
							'description' => __( 'Accelerate verification across interconnected systems using AI-powered automation.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Driven Test Creation', 'testro' ),
							'description' => __( 'Generate intelligent integration test scenarios with minimal manual effort.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Lower Test Maintenance', 'testro' ),
							'description' => __( 'Reduce maintenance using self-healing automation and reusable test assets.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Continuous Quality Across Connected Systems', 'testro' ),
							'description' => __( 'Maintain software quality throughout every deployment by continuously validating integrations.', 'testro' ),
						),
					),
				),

				/* 3. Integration Testing Types ----------------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'integration-testing-types',
					'variant' => 'spotlight',
					'eyebrow' => __( 'Integration Testing Types', 'testro' ),
					'title'   => __( 'Cover Every Connection Across Your Software Ecosystem', 'testro' ),
					'intro'   => __( 'From component and API Integration Testing to microservices, contracts, events, and third-party systems—validate every interaction with one AI-powered Integration Testing Tool.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Component Integration Testing', 'testro' ),
							'description' => __( 'Validate communication between application modules.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Integration Testing', 'testro' ),
							'description' => __( 'Ensure reliable communication across REST, SOAP, GraphQL, and enterprise APIs.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'UI-to-API Workflow Testing', 'testro' ),
							'description' => __( 'Verify complete business workflows from frontend to backend services.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Third-Party Integration Testing', 'testro' ),
							'description' => __( 'Validate integrations with payment gateways, CRM systems, ERP platforms, authentication providers, and external services.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Contract Testing', 'testro' ),
							'description' => __( 'Ensure service contracts remain compatible across evolving systems.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Event-Driven Integration Testing', 'testro' ),
							'description' => __( 'Validate asynchronous messaging and event-based architectures.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Database Integration Testing', 'testro' ),
							'description' => __( 'Verify database interactions, transactions, and data integrity.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Microservices Integration Testing', 'testro' ),
							'description' => __( 'Ensure reliable communication across distributed microservices.', 'testro' ),
						),
					),
				),

				/* 4. Benefits ---------------------------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'integration-testing-benefits',
					'variant' => 'tint',
					'eyebrow' => __( 'Benefits', 'testro' ),
					'title'   => __( 'Benefits of AI-Powered Integration Testing', 'testro' ),
					'intro'   => __( 'Teams use Automated Integration Testing to catch defects earlier, broaden coverage, tighten CI/CD gates, and lower release risk across every system connection.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Faster Defect Detection', 'testro' ),
							'description' => __( 'Identify integration failures before they impact production.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Higher Confidence Across Business Workflows', 'testro' ),
							'description' => __( 'Validate complete business processes across interconnected applications.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Better CI/CD Integration', 'testro' ),
							'description' => __( 'Automate integration validation within modern DevOps pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Broader Test Coverage', 'testro' ),
							'description' => __( 'Cover APIs, databases, services, and user workflows from a unified platform.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Reduced Test Maintenance', 'testro' ),
							'description' => __( 'Leverage AI-powered automation to reduce ongoing maintenance.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Lower Release Risk', 'testro' ),
							'description' => __( 'Release software confidently by validating every critical integration point.', 'testro' ),
						),
					),
				),

				/* 5. AI-Powered vs Traditional ----------------------------- */
				array(
					'type'    => 'comparison',
					'id'      => 'ai-vs-traditional-integration',
					'eyebrow' => __( 'AI-Powered vs Traditional', 'testro' ),
					'title'   => __( 'AI-Powered vs Traditional Integration Testing', 'testro' ),
					'intro'   => __( 'Compare modern AI-powered integration testing with traditional approaches, emphasizing faster execution, broader coverage, intelligent automation, lower maintenance, and improved release confidence.', 'testro' ),
					'legacy'  => array(
						'label' => __( 'Traditional Integration Testing', 'testro' ),
						'note'  => __( 'Manual creation, fragile scripts, slower validation', 'testro' ),
					),
					'modern'  => array(
						'label' => __( 'theTestRo AI Integration Testing', 'testro' ),
						'note'  => __( 'No-code automation that scales with every connection', 'testro' ),
					),
					'rows'    => array(
						array(
							'aspect' => __( 'Test creation', 'testro' ),
							'legacy' => __( 'Manual Test Creation', 'testro' ),
							'modern' => __( 'AI Test Creation', 'testro' ),
						),
						array(
							'aspect' => __( 'Automation model', 'testro' ),
							'legacy' => __( 'Limited Automation', 'testro' ),
							'modern' => __( 'No-Code Automation', 'testro' ),
						),
						array(
							'aspect' => __( 'Maintenance', 'testro' ),
							'legacy' => __( 'High Maintenance', 'testro' ),
							'modern' => __( 'Self-Healing Tests', 'testro' ),
						),
						array(
							'aspect' => __( 'Validation cadence', 'testro' ),
							'legacy' => __( 'Slower Validation', 'testro' ),
							'modern' => __( 'Continuous Validation', 'testro' ),
						),
						array(
							'aspect' => __( 'Execution speed', 'testro' ),
							'legacy' => __( 'Slower, sequential runs', 'testro' ),
							'modern' => __( 'Faster Execution', 'testro' ),
						),
						array(
							'aspect' => __( 'Scale', 'testro' ),
							'legacy' => __( 'Limited Scalability', 'testro' ),
							'modern' => __( 'Enterprise Scalability', 'testro' ),
						),
						array(
							'aspect' => __( 'Insights', 'testro' ),
							'legacy' => __( 'Manual Analysis', 'testro' ),
							'modern' => __( 'Intelligent Analytics', 'testro' ),
						),
						array(
							'aspect' => __( 'Release risk', 'testro' ),
							'legacy' => __( 'Higher Release Risk', 'testro' ),
							'modern' => __( 'Lower Release Risk', 'testro' ),
						),
					),
				),

				/* 6. How theTestRo Automates Integration Testing ----------- */
				array(
					'type'    => 'lifecycle',
					'id'      => 'how-integration-testing-works',
					'eyebrow' => __( 'How It Works', 'testro' ),
					'title'   => __( 'How theTestRo Automates Integration Testing', 'testro' ),
					'intro'   => __( 'Identify connections, define scenarios, generate AI-powered tests, execute in CI/CD, validate business rules, and expand coverage with continuous insights.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Identify Integration Points', 'testro' ),
							'description' => __( 'Automatically identify systems and workflows that require validation.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Define Test Scenarios & Test Data', 'testro' ),
							'description' => __( 'Create reusable scenarios with intelligent data management.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Generate AI-Powered Integration Tests', 'testro' ),
							'description' => __( 'Use AI to build scalable integration automation.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Execute Tests in CI/CD Pipelines', 'testro' ),
							'description' => __( 'Run integration tests automatically after every build or deployment.', 'testro' ),
						),
						array(
							'icon'        => 'circle-check',
							'title'       => __( 'Validate Responses & Business Rules', 'testro' ),
							'description' => __( 'Verify responses, business logic, and data consistency.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Monitor Results & Expand Test Coverage', 'testro' ),
							'description' => __( 'Use AI insights to continuously improve testing effectiveness.', 'testro' ),
						),
					),
				),

				/* 7. Integration ecosystem architecture -------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'integration-ecosystem-hub',
					'eyebrow' => __( 'Integration Ecosystem', 'testro' ),
					'title'   => __( 'One Hub Across APIs, Data, Microservices, and Enterprise Systems', 'testro' ),
					'intro'   => __( 'Validate the full integration map—APIs, databases, microservices, ERP/CRM platforms, payments, and authentication—through one AI-powered Integration Testing Platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'plug',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Integration Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'APIs', 'testro' ),
							'description' => __( 'Exercise REST, SOAP, GraphQL, and enterprise API contracts on every change.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Databases', 'testro' ),
							'description' => __( 'Confirm transactions, data integrity, and persistence across connected services.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Microservices', 'testro' ),
							'description' => __( 'Prove distributed service communication stays reliable under release pressure.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'ERP / CRM', 'testro' ),
							'description' => __( 'Validate enterprise application integrations that power critical business workflows.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Payments', 'testro' ),
							'description' => __( 'Protect payment gateway paths and financial handoffs with Automated Integration Testing.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Authentication', 'testro' ),
							'description' => __( 'Verify SSO, identity providers, and secure access across system boundaries.', 'testro' ),
						),
					),
				),

				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted By', 'testro' ),
					'title'   => __( 'Chosen by Teams Automating Integration Testing at Scale', 'testro' ),
					'intro'   => __( 'QA, SDET, DevOps, and engineering leaders rely on theTestRo to validate APIs, microservices, databases, and third-party systems with continuous AI-powered Integration Testing.', 'testro' ),
				),

				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'How Teams Ship Reliable Integrations Faster', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo AI Integration Testing to cut maintenance, expand API and microservices coverage, embed Automated Integration Testing in CI/CD, and release connected systems with confidence.', 'testro' ),
				),

				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Integration Testing FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'ai-powered-integration-testing',
				),

				array(
					'type'       => 'cta',
					'id'         => 'get-started-ai-powered-integration-testing',
					'title'      => __( 'Validate Every System Connection with AI-Powered Integration Testing', 'testro' ),
					'intro'      => __( 'Ensure your applications, APIs, databases, and enterprise systems work together seamlessly with theTestRo\'s AI-powered Integration Testing Platform. Automate integration validation, accelerate DevOps pipelines, reduce maintenance, and deliver reliable software with confidence.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		/* ------------------------------------------------------------------ */
		/* Retail & E-commerce Industry                                       */
		/* ------------------------------------------------------------------ */
		'retail-ecommerce' => array(
			'slug'  => 'retail-ecommerce',
			'title' => __( 'Retail & E-commerce', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Retail Testing | E-commerce Test Automation | AI Retail Testing | theTestRo', 'testro' ),
				'description' => __( 'AI-powered retail and e-commerce testing for storefronts, checkout, payments, POS, OMS/WMS, and omnichannel journeys. Automate retail software testing with continuous quality engineering from theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'Retail & E-commerce Testing', 'testro' ),
				'title'    => __( 'Automated Testing Tool for Retail & E-commerce Industry', 'testro' ),
				'subtitle' => __( 'Deliver flawless shopping experiences with theTestRo\'s AI-powered Retail & E-commerce Testing Platform. Automate testing across websites, mobile commerce apps, APIs, payment gateways, POS systems, and enterprise retail applications. Ensure every customer journey performs seamlessly while accelerating digital commerce releases with intelligent automation and continuous quality engineering.', 'testro' ),
				'badges'   => array(
					__( 'Omnichannel Coverage', 'testro' ),
					__( 'Checkout Reliability', 'testro' ),
					__( 'AI Self-Healing', 'testro' ),
					__( 'Peak-Season Ready', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster commerce releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '99.2%',
						'label' => __( 'Checkout pass rate', 'testro' ),
						'icon'  => 'badge-check',
					),
					array(
						'value' => '8+',
						'label' => __( 'Journey stages covered', 'testro' ),
						'icon'  => 'infinity',
					),
				),
			),

			'sections' => array(

				/* 1. Why choose ---------------------------------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'why-retail-teams-choose',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Why Retail & E-commerce Teams Choose theTestRo', 'testro' ),
					'title'   => __( 'Built for Digital Commerce Quality at Speed', 'testro' ),
					'intro'   => __( 'Retail and e-commerce teams rely on theTestRo to ship promotions faster, keep every channel consistent, and sustain quality with AI-powered continuous testing.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate Digital Commerce Releases', 'testro' ),
							'description' => __( 'Release new features, promotions, and storefront updates faster with intelligent automation.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Deliver Consistent Omnichannel Experiences', 'testro' ),
							'description' => __( 'Ensure customers enjoy seamless shopping experiences across web, mobile, POS, and in-store systems.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Driven Quality Engineering', 'testro' ),
							'description' => __( 'Leverage AI-powered automation to improve quality while reducing manual testing effort.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Continuous Testing Across Retail Applications', 'testro' ),
							'description' => __( 'Continuously validate every customer touchpoint throughout the software delivery lifecycle.', 'testro' ),
						),
					),
				),

				/* 2. Challenges → solutions ---------------------------------- */
				array(
					'type'    => 'comparison',
					'id'      => 'retail-challenges-solutions',
					'eyebrow' => __( 'Retail & E-commerce Testing Challenges', 'testro' ),
					'title'   => __( 'From Commerce Friction to AI-Powered Confidence', 'testro' ),
					'intro'   => __( 'Modern retail platforms change constantly—catalogs, promotions, checkout, and omnichannel journeys all need continuous validation. theTestRo turns those challenges into automated, self-healing coverage.', 'testro' ),
					'legacy'  => array(
						'label' => __( 'Retail Challenges', 'testro' ),
						'note'  => __( 'Where quality breaks under release pressure', 'testro' ),
					),
					'modern'  => array(
						'label' => __( 'How theTestRo Solves Them', 'testro' ),
						'note'  => __( 'AI automation built for commerce', 'testro' ),
					),
					'rows'    => array(
						array(
							'aspect' => __( 'Frequent Product & Feature Releases', 'testro' ),
							'legacy' => __( 'Rapid releases require continuous validation without slowing delivery.', 'testro' ),
							'modern' => __( 'Continuous AI automation validates every release without blocking commerce velocity.', 'testro' ),
						),
						array(
							'aspect' => __( 'Dynamic UI & Catalog Changes', 'testro' ),
							'legacy' => __( 'Product catalogs and storefronts change faster than scripts can keep up.', 'testro' ),
							'modern' => __( 'Self-healing locators adapt automatically as catalogs and storefront UIs evolve.', 'testro' ),
						),
						array(
							'aspect' => __( 'Omnichannel Customer Journeys', 'testro' ),
							'legacy' => __( 'Shoppers bounce between web, mobile, POS, and in-store systems.', 'testro' ),
							'modern' => __( 'Unified suites cover every digital and physical channel in one customer journey.', 'testro' ),
						),
						array(
							'aspect' => __( 'Payment & Checkout Reliability', 'testro' ),
							'legacy' => __( 'Checkout failures directly impact revenue and brand trust.', 'testro' ),
							'modern' => __( 'End-to-end checkout and payment gateway tests catch issues before shoppers do.', 'testro' ),
						),
						array(
							'aspect' => __( 'Cross-Browser & Cross-Device Compatibility', 'testro' ),
							'legacy' => __( 'Inconsistent experiences across browsers and devices erode conversion.', 'testro' ),
							'modern' => __( 'Parallel cloud execution validates major browsers, OS targets, and devices at scale.', 'testro' ),
						),
						array(
							'aspect' => __( 'Peak Traffic & Seasonal Sales Readiness', 'testro' ),
							'legacy' => __( 'Holiday and promo peaks expose performance and regression risk.', 'testro' ),
							'modern' => __( 'Performance and regression suites harden apps for seasonal demand and flash sales.', 'testro' ),
						),
					),
				),

				/* 3. What you can test --------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'what-you-can-test-retail',
					'eyebrow' => __( 'What You Can Test with theTestRo', 'testro' ),
					'title'   => __( 'One AI Platform Across the Retail Technology Stack', 'testro' ),
					'intro'   => __( 'Automate testing across every customer-facing and backend retail system using one unified AI-powered testing platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Retail Quality Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Applications', 'testro' ),
							'description' => __( 'Platforms — validate core retail web apps and admin experiences.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'APIs', 'testro' ),
							'description' => __( 'Platforms — exercise commerce, inventory, and payment APIs.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'POS Systems', 'testro' ),
							'description' => __( 'Platforms — cover in-store point-of-sale and associate workflows.', 'testro' ),
						),
						array(
							'icon'        => 'retail',
							'title'       => __( 'E-commerce Websites', 'testro' ),
							'description' => __( 'Retail apps — storefront, catalog, and promotion experiences.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Commerce Apps', 'testro' ),
							'description' => __( 'Retail apps — Android and iOS shopping journeys.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Customer Portals', 'testro' ),
							'description' => __( 'Retail apps — accounts, orders, and self-service portals.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Order Management Systems (OMS)', 'testro' ),
							'description' => __( 'Operations — validate order capture, routing, and fulfillment states.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'Warehouse Management Systems (WMS)', 'testro' ),
							'description' => __( 'Operations — verify warehouse and fulfillment system flows.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Inventory Management Systems', 'testro' ),
							'description' => __( 'Operations — keep stock, availability, and sync logic reliable.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'CRM & ERP Applications', 'testro' ),
							'description' => __( 'Enterprise — connect customer and back-office system quality.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Payment Gateways', 'testro' ),
							'description' => __( 'Enterprise — secure payment authorization and settlement paths.', 'testro' ),
						),
					),
				),

				/* 4. AI capabilities (bento) --------------------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'retail-ai-capabilities',
					'variant' => 'spotlight',
					'eyebrow' => __( 'AI-Powered Testing Capabilities', 'testro' ),
					'title'   => __( 'Intelligent Automation Built for Commerce Journeys', 'testro' ),
					'intro'   => __( 'Cover the full retail quality stack—from storefront and mobile commerce to APIs, regression, and peak-season performance—with AI-assisted automation.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Test Automation', 'testro' ),
							'description' => __( 'Validate modern e-commerce websites with intelligent automation.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Test Automation', 'testro' ),
							'description' => __( 'Ensure consistent shopping experiences across Android and iOS.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Verify APIs powering payments, inventory, customer accounts, and order processing.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'End-to-End Testing', 'testro' ),
							'description' => __( 'Automate complete shopping journeys from login to checkout.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Validate consistent user experiences across all major browsers.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Regression Testing', 'testro' ),
							'description' => __( 'Prevent new releases from impacting existing functionality.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Performance Testing', 'testro' ),
							'description' => __( 'Evaluate application performance during peak traffic and seasonal events.', 'testro' ),
						),
					),
				),

				/* 5. End-to-end workflows (lifecycle) ------------------------ */
				array(
					'type'      => 'lifecycle',
					'id'        => 'retail-customer-journeys',
					'eyebrow'   => __( 'Validate End-to-End Retail Workflows', 'testro' ),
					'title'     => __( 'Automate the Complete Omnichannel Customer Journey', 'testro' ),
					'intro'     => __( 'From registration through loyalty, cover every revenue-critical step shoppers take—so promotions, checkout, fulfillment, and returns stay reliable release after release.', 'testro' ),
					'loop_note' => __( 'Every journey stage feeds the next — continuous retail quality compounds with each release.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Customer Registration & Login', 'testro' ),
							'description' => __( 'Ensure secure account creation and authentication.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Product Search & Catalog Validation', 'testro' ),
							'description' => __( 'Validate search functionality, filters, and dynamic catalogs.', 'testro' ),
						),
						array(
							'icon'        => 'retail',
							'title'       => __( 'Shopping Cart', 'testro' ),
							'description' => __( 'Verify pricing, promotions, and cart management.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Checkout & Payment Processing', 'testro' ),
							'description' => __( 'Ensure reliable and secure checkout experiences.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Order Management', 'testro' ),
							'description' => __( 'Validate complete order processing workflows.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'Shipping & Delivery Tracking', 'testro' ),
							'description' => __( 'Verify shipment tracking and delivery updates.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Returns & Refunds', 'testro' ),
							'description' => __( 'Test return workflows and refund processing.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Loyalty Programs & Promotions', 'testro' ),
							'description' => __( 'Validate reward points, coupons, offers, and promotional campaigns.', 'testro' ),
						),
					),
				),

				/* 6. Continuous QE (pipeline) -------------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'retail-continuous-qe',
					'eyebrow' => __( 'Continuous Quality Engineering', 'testro' ),
					'title'   => __( 'AI → Generate → Execute → Analyze → Self-Heal → Optimize', 'testro' ),
					'intro'   => __( 'Keep retail quality continuous across every release with an AI-powered workflow that creates tests, runs them in parallel, analyzes results, heals broken automation, and feeds insights back into delivery.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'wand',
							'stage'       => __( 'Generate', 'testro' ),
							'title'       => __( 'AI Test Creation', 'testro' ),
							'description' => __( 'Automatically generate intelligent retail test scenarios.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Execute', 'testro' ),
							'title'       => __( 'Parallel Test Execution', 'testro' ),
							'description' => __( 'Execute thousands of retail test cases simultaneously.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'stage'       => __( 'Analyze', 'testro' ),
							'title'       => __( 'Intelligent Test Analytics', 'testro' ),
							'description' => __( 'Gain actionable insights through AI-powered reporting and analytics.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'stage'       => __( 'Self-Heal', 'testro' ),
							'title'       => __( 'Self-Healing Automation', 'testro' ),
							'description' => __( 'Adapt to UI changes without manual maintenance.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'stage'       => __( 'Optimize', 'testro' ),
							'title'       => __( 'CI/CD Integration', 'testro' ),
							'description' => __( 'Integrate continuous testing into every software release.', 'testro' ),
						),
					),
				),

				/* 7. Enterprise outcomes ------------------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'retail-enterprise-outcomes',
					'variant' => 'tint',
					'eyebrow' => __( 'Enterprise Retail Outcomes', 'testro' ),
					'title'   => __( 'Measurable Impact on Commerce Quality and Speed', 'testro' ),
					'intro'   => __( 'Retail organizations use theTestRo to ship faster, protect checkout revenue, expand automation coverage, and lower maintenance cost with AI.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Release Cycles', 'testro' ),
							'description' => __( 'Accelerate digital commerce innovation.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Reduced Production Defects', 'testro' ),
							'description' => __( 'Catch issues before they impact customers.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Higher Test Coverage', 'testro' ),
							'description' => __( 'Increase confidence through comprehensive automation.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Improved Customer Experience', 'testro' ),
							'description' => __( 'Deliver consistent shopping experiences across every channel.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Lower Test Maintenance Costs', 'testro' ),
							'description' => __( 'Reduce manual effort using AI-powered automation.', 'testro' ),
						),
					),
				),

				/* 8. Trust logos --------------------------------------------- */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Digital Commerce Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Retail and e-commerce organizations rely on theTestRo to protect storefront quality and accelerate online releases.', 'testro' ),
				),

				/* 9. Customer success ---------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Retail Teams Shipping Better Shopping Experiences', 'testro' ),
					'intro'   => __( 'See how organizations accelerate online releases, improve shopping experiences, reduce checkout issues, increase automation coverage, and raise software quality with theTestRo.', 'testro' ),
				),

				/* 10. Integrations ------------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'retail-integrations',
					'eyebrow' => __( 'Supported Integrations', 'testro' ),
					'title'   => __( 'Connect Retail Quality into Your DevOps Ecosystem', 'testro' ),
					'intro'   => __( 'Integrate seamlessly with your existing DevOps, collaboration, and project management tools to automate retail software quality throughout the delivery lifecycle.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Connected Delivery', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Link defects and retail quality signals to delivery work items.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Run continuous retail suites inside Jenkins pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger commerce regression on every pull request and release.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed quality gates into Azure boards and release pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Alert teams instantly when checkout or journey suites fail.', 'testro' ),
						),
					),
				),

				/* 11. FAQ ---------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Retail & E-commerce FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'retail-ecommerce',
				),

				/* 12. Final CTA ---------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-retail-ecommerce',
					'title'      => __( 'Deliver Exceptional Shopping Experiences with AI-Powered Retail Testing', 'testro' ),
					'intro'      => __( 'Accelerate digital commerce innovation with theTestRo\'s AI-powered Retail & E-commerce Testing Platform. Automate customer journeys, validate critical retail workflows, reduce production risks, and deliver seamless omnichannel experiences with enterprise-grade intelligent automation.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		'healthcare' => array(
			'slug'  => 'healthcare',
			'title' => __( 'Healthcare', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Healthcare Software Testing | AI Healthcare Test Automation | EHR Testing | theTestRo', 'testro' ),
				'description' => __( 'AI-powered Healthcare Software Testing and Healthcare Test Automation for EHR Testing, clinical workflows, patient portals, and APIs. Accelerate Healthcare Quality Engineering with AI Testing for Healthcare and Healthcare Automation Testing from theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'Healthcare Testing Solutions', 'testro' ),
				'title'    => __( 'AI Testing Automation for Healthcare Industry', 'testro' ),
				'subtitle' => __( 'Deliver reliable, secure, and compliant healthcare software with theTestRo\'s AI-powered Healthcare Testing Platform. Automate testing across EHR systems, patient portals, telemedicine platforms, APIs, and enterprise healthcare applications while accelerating digital healthcare innovation through intelligent automation and continuous quality engineering.', 'testro' ),
				'badges'   => array(
					__( 'HIPAA-Ready Testing', 'testro' ),
					__( 'EHR & FHIR Coverage', 'testro' ),
					__( 'AI Self-Healing', 'testro' ),
					__( 'Clinical Workflow QA', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster clinical releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '99.4%',
						'label' => __( 'Workflow pass rate', 'testro' ),
						'icon'  => 'badge-check',
					),
					array(
						'value' => '70%',
						'label' => __( 'Lower test maintenance', 'testro' ),
						'icon'  => 'heart-pulse',
					),
				),
			),

			'sections' => array(

				/* 1. Modernize Healthcare QE --------------------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'modernize-healthcare-qe',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Modernize Healthcare Quality Engineering', 'testro' ),
					'title'   => __( 'AI-Powered Quality for Clinical Software at Scale', 'testro' ),
					'intro'   => __( 'Healthcare organizations rely on theTestRo to accelerate digital transformation, protect patient experiences, and sustain regulatory-ready quality with intelligent automation.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate Digital Healthcare Innovation', 'testro' ),
							'description' => __( 'Release healthcare applications faster without compromising patient safety or software quality.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Deliver Reliable Clinical Experiences', 'testro' ),
							'description' => __( 'Ensure seamless patient interactions and uninterrupted clinical workflows across every healthcare platform.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Ensure Regulatory-Ready Software Quality', 'testro' ),
							'description' => __( 'Build confidence with continuous testing that supports healthcare compliance and quality standards.', 'testro' ),
						),
					),
				),

				/* 2. Challenges → solutions ---------------------------------- */
				array(
					'type'    => 'comparison',
					'id'      => 'healthcare-challenges-solutions',
					'eyebrow' => __( 'Healthcare Testing Challenges', 'testro' ),
					'title'   => __( 'From Clinical Risk to AI-Powered Confidence', 'testro' ),
					'intro'   => __( 'Healthcare platforms evolve constantly—EHR updates, interoperability, and compliance pressures all demand continuous validation. theTestRo turns those challenges into automated, self-healing coverage.', 'testro' ),
					'legacy'  => array(
						'label' => __( 'Healthcare Challenges', 'testro' ),
						'note'  => __( 'Where quality breaks under clinical pressure', 'testro' ),
					),
					'modern'  => array(
						'label' => __( 'How theTestRo Solves Them', 'testro' ),
						'note'  => __( 'AI automation built for healthcare', 'testro' ),
					),
					'rows'    => array(
						array(
							'aspect' => __( 'Complex Clinical Workflows', 'testro' ),
							'legacy' => __( 'Intricate patient care processes span multiple systems and roles.', 'testro' ),
							'modern' => __( 'Validate intricate patient care processes with intelligent end-to-end automation.', 'testro' ),
						),
						array(
							'aspect' => __( 'Legacy Healthcare Systems', 'testro' ),
							'legacy' => __( 'Modern apps must integrate reliably with aging healthcare infrastructure.', 'testro' ),
							'modern' => __( 'Ensure modern applications integrate reliably with existing healthcare infrastructure.', 'testro' ),
						),
						array(
							'aspect' => __( 'Regulatory & Compliance Requirements', 'testro' ),
							'legacy' => __( 'Audit trails and quality evidence are hard to sustain under release pressure.', 'testro' ),
							'modern' => __( 'Support compliance initiatives with automated quality validation and audit-ready reporting.', 'testro' ),
						),
						array(
							'aspect' => __( 'Patient Data Security', 'testro' ),
							'legacy' => __( 'Sensitive health data requires careful handling during every test cycle.', 'testro' ),
							'modern' => __( 'Test healthcare applications while maintaining secure handling of sensitive data.', 'testro' ),
						),
						array(
							'aspect' => __( 'Interoperability Across Healthcare Systems', 'testro' ),
							'legacy' => __( 'EHRs, labs, billing, and third-party platforms rarely stay in sync.', 'testro' ),
							'modern' => __( 'Validate integrations between EHRs, APIs, laboratory systems, billing systems, and third-party healthcare platforms.', 'testro' ),
						),
						array(
							'aspect' => __( 'Continuous Digital Transformation', 'testro' ),
							'legacy' => __( 'Continuous delivery must not risk clinical reliability.', 'testro' ),
							'modern' => __( 'Support continuous software delivery while maintaining clinical reliability.', 'testro' ),
						),
					),
				),

				/* 3. What you can test --------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'what-you-can-test-healthcare',
					'eyebrow' => __( 'Everything You Can Test', 'testro' ),
					'title'   => __( 'One AI Platform Across the Healthcare Technology Stack', 'testro' ),
					'intro'   => __( 'Automate testing across every healthcare platform, application, and workflow from one unified AI-powered testing platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Healthcare Quality Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Applications', 'testro' ),
							'description' => __( 'Platforms — validate clinical and administrative web experiences.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Applications', 'testro' ),
							'description' => __( 'Platforms — cover Android and iOS healthcare journeys.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'APIs', 'testro' ),
							'description' => __( 'Platforms — exercise FHIR, HL7, and healthcare service APIs.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Enterprise Healthcare Systems', 'testro' ),
							'description' => __( 'Platforms — cover hospital and health-system back-office stacks.', 'testro' ),
						),
						array(
							'icon'        => 'stethoscope',
							'title'       => __( 'EHR / EMR Systems', 'testro' ),
							'description' => __( 'Healthcare apps — core clinical record management workflows.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Patient Portals', 'testro' ),
							'description' => __( 'Healthcare apps — registration, records, and self-service access.', 'testro' ),
						),
						array(
							'icon'        => 'video',
							'title'       => __( 'Telemedicine Platforms', 'testro' ),
							'description' => __( 'Healthcare apps — virtual visit and remote care experiences.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Hospital Management Systems', 'testro' ),
							'description' => __( 'Healthcare apps — admissions, scheduling, and operations.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Laboratory Information Systems', 'testro' ),
							'description' => __( 'Healthcare apps — lab orders, results, and reporting flows.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Medical Billing & Claims', 'testro' ),
							'description' => __( 'Healthcare apps — insurance verification and claims processing.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI Test Automation', 'testro' ),
							'description' => __( 'Capabilities — generate and heal healthcare suites with AI.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'End-to-End Testing', 'testro' ),
							'description' => __( 'Capabilities — validate complete patient care journeys.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Regression Testing', 'testro' ),
							'description' => __( 'Capabilities — protect clinical reliability after every update.', 'testro' ),
						),
					),
				),

				/* 4. AI capabilities (bento) --------------------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'healthcare-ai-capabilities',
					'variant' => 'spotlight',
					'eyebrow' => __( 'AI-Powered Healthcare Quality Engineering', 'testro' ),
					'title'   => __( 'Intelligent Automation Built for Clinical Software', 'testro' ),
					'intro'   => __( 'Cover the full healthcare quality stack—from EHR and patient portals to APIs, regression, and release readiness—with AI-assisted automation.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI Test Creation', 'testro' ),
							'description' => __( 'Generate healthcare-specific test cases intelligently using AI.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Automation', 'testro' ),
							'description' => __( 'Automatically adapt to changing healthcare applications without manual maintenance.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Intelligent Test Maintenance', 'testro' ),
							'description' => __( 'Reduce maintenance effort through AI-driven automation.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Continuous Regression Testing', 'testro' ),
							'description' => __( 'Continuously validate critical healthcare workflows after every update.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Parallel Test Execution', 'testro' ),
							'description' => __( 'Accelerate validation of healthcare applications through enterprise-scale parallel execution.', 'testro' ),
						),
					),
				),

				/* 5. Clinical workflows (lifecycle) -------------------------- */
				array(
					'type'      => 'lifecycle',
					'id'        => 'healthcare-clinical-workflows',
					'eyebrow'   => __( 'Validate End-to-End Clinical Workflows', 'testro' ),
					'title'     => __( 'Automate the Complete Patient Care Journey', 'testro' ),
					'intro'     => __( 'From registration through discharge, cover every care-critical step patients and clinicians take—so EHR, lab, pharmacy, billing, and telehealth stays reliable release after release.', 'testro' ),
					'loop_note' => __( 'Every care stage feeds the next — continuous clinical quality compounds with each release.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Patient Registration', 'testro' ),
							'description' => __( 'Validate patient onboarding workflows.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Appointment Scheduling', 'testro' ),
							'description' => __( 'Ensure scheduling systems function reliably.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Patient Login & Authentication', 'testro' ),
							'description' => __( 'Verify secure patient authentication.', 'testro' ),
						),
						array(
							'icon'        => 'stethoscope',
							'title'       => __( 'Electronic Health Record (EHR) Workflows', 'testro' ),
							'description' => __( 'Test core clinical record management.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Clinical Documentation', 'testro' ),
							'description' => __( 'Validate physician documentation workflows.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Laboratory Orders & Results', 'testro' ),
							'description' => __( 'Ensure accurate lab request and reporting processes.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Prescription Management', 'testro' ),
							'description' => __( 'Validate medication ordering and pharmacy integration.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Medical Billing & Insurance Claims', 'testro' ),
							'description' => __( 'Test insurance verification and claims processing.', 'testro' ),
						),
						array(
							'icon'        => 'video',
							'title'       => __( 'Telehealth Consultations', 'testro' ),
							'description' => __( 'Ensure virtual healthcare experiences remain reliable.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Patient Discharge Workflows', 'testro' ),
							'description' => __( 'Validate discharge planning and follow-up processes.', 'testro' ),
						),
					),
				),

				/* 6. Compliance & secure testing ----------------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'healthcare-compliance-secure-testing',
					'variant' => 'spotlight',
					'columns' => 5,
					'eyebrow' => __( 'Healthcare Compliance & Secure Testing', 'testro' ),
					'title'   => __( 'Quality Engineering Aligned with Healthcare Standards', 'testro' ),
					'intro'   => __( 'Strengthen confidence across privacy, interoperability, access control, and audit readiness while you automate clinical software quality.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'HIPAA-Ready Testing', 'testro' ),
							'description' => __( 'Support secure testing practices aligned with healthcare privacy requirements.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'HL7 & FHIR Validation', 'testro' ),
							'description' => __( 'Validate interoperability standards across healthcare systems.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Secure Test Data Management', 'testro' ),
							'description' => __( 'Protect healthcare data throughout testing activities.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Role-Based Access Control', 'testro' ),
							'description' => __( 'Secure access to testing assets and execution environments.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Audit & Compliance Support', 'testro' ),
							'description' => __( 'Maintain audit trails and compliance-ready reporting.', 'testro' ),
						),
					),
				),

				/* 7. Continuous healthcare delivery (pipeline) --------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'healthcare-continuous-delivery',
					'eyebrow' => __( 'Continuous Healthcare Delivery', 'testro' ),
					'title'   => __( 'Development → CI/CD → Testing → Validation → Release', 'testro' ),
					'intro'   => __( 'Keep healthcare quality continuous across every release with an AI-powered workflow that integrates into delivery pipelines, validates clinical readiness, and reduces release risk.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Development', 'testro' ),
							'title'       => __( 'CI/CD Integration', 'testro' ),
							'description' => __( 'Integrate automated healthcare testing into continuous delivery pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'CI/CD', 'testro' ),
							'title'       => __( 'Release Validation', 'testro' ),
							'description' => __( 'Ensure software quality before production deployment.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'stage'       => __( 'Testing', 'testro' ),
							'title'       => __( 'Regression Automation', 'testro' ),
							'description' => __( 'Continuously validate healthcare applications with every release.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'stage'       => __( 'Validation', 'testro' ),
							'title'       => __( 'Multi-Environment Testing', 'testro' ),
							'description' => __( 'Test across development, staging, QA, and production environments.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Release Readiness', 'testro' ),
							'description' => __( 'Gain confidence before every software deployment.', 'testro' ),
						),
					),
				),

				/* 8. Quality intelligence (analytics) ------------------------ */
				array(
					'type'      => 'analytics',
					'id'        => 'healthcare-quality-intelligence',
					'eyebrow'   => __( 'Healthcare Quality Intelligence', 'testro' ),
					'title'     => __( 'Turn Clinical Test Results into Release Decisions', 'testro' ),
					'intro'     => __( 'Monitor AI insights, quality scores, coverage, risk signals, and release readiness from a healthcare-focused analytics experience.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'AI Failure Analysis', 'testro' ),
							'description' => __( 'Automatically identify the root causes of failed healthcare tests.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Test Analytics', 'testro' ),
							'description' => __( 'Gain real-time visibility into healthcare software quality.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Release Insights', 'testro' ),
							'description' => __( 'Understand deployment readiness using AI-powered analytics.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Quality Dashboards', 'testro' ),
							'description' => __( 'Monitor application health through centralized dashboards.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Test Coverage Analysis', 'testro' ),
							'description' => __( 'Measure testing completeness across healthcare applications.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Clinical release readiness', 'testro' ),
						'score'     => 97,
						'status'    => __( 'Ready for go-live', 'testro' ),
						'build'     => __( 'Build #3184 · main', 'testro' ),
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '99.1%',
								'trend' => __( '+1.6 pts', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Coverage', 'testro' ),
								'value' => '94%',
								'trend' => __( 'Critical journeys', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Compliance score', 'testro' ),
								'value' => 'A+',
								'trend' => __( 'Audit-ready', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Risk alerts', 'testro' ),
								'value' => '2',
								'trend' => __( '−5 vs last release', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Last 7 executions', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 68,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 76,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 71,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 84,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 88,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 79,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 91,
								),
							),
						),
					),
				),

				/* 9. Why choose (outcomes) ----------------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'healthcare-enterprise-outcomes',
					'variant' => 'tint',
					'eyebrow' => __( 'Why Healthcare Organizations Choose theTestRo', 'testro' ),
					'title'   => __( 'Measurable Impact on Clinical Software Quality', 'testro' ),
					'intro'   => __( 'Hospitals, health systems, EHR vendors, and healthtech teams use theTestRo to ship faster, expand automation coverage, and lower maintenance cost with AI.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Clinical Software Releases', 'testro' ),
							'description' => __( 'Accelerate innovation while maintaining software quality.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Higher Test Coverage', 'testro' ),
							'description' => __( 'Improve confidence across healthcare applications.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Reduced Manual Testing', 'testro' ),
							'description' => __( 'Increase automation through AI-powered testing.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Improved Software Reliability', 'testro' ),
							'description' => __( 'Deliver stable and secure clinical systems.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Lower Test Maintenance', 'testro' ),
							'description' => __( 'Reduce ongoing maintenance using intelligent automation.', 'testro' ),
						),
					),
				),

				/* 10. Trust logos -------------------------------------------- */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Healthcare Digitization Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Healthcare organizations rely on theTestRo to protect clinical software quality and accelerate digital health releases.', 'testro' ),
				),

				/* 11. Customer success --------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Healthcare Teams Shipping Safer Digital Experiences', 'testro' ),
					'intro'   => __( 'See how organizations accelerate digital healthcare transformation, improve software quality, reduce release risks, increase automation coverage, and deliver better patient experiences with theTestRo.', 'testro' ),
				),

				/* 12. Integrations ------------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'healthcare-integrations',
					'eyebrow' => __( 'Supported Integrations', 'testro' ),
					'title'   => __( 'Connect Healthcare Quality into Your DevOps Ecosystem', 'testro' ),
					'intro'   => __( 'Integrate seamlessly with your existing healthcare DevOps ecosystem to automate quality engineering across every release.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Connected Delivery', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Link defects and clinical quality signals to delivery work items.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Run continuous healthcare suites inside Jenkins pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger clinical regression on every pull request and release.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed quality gates into Azure boards and release pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Alert teams instantly when clinical or compliance suites fail.', 'testro' ),
						),
					),
				),

				/* 13. FAQ ---------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Healthcare FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'healthcare',
				),

				/* 14. Final CTA ---------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-healthcare',
					'title'      => __( 'Deliver Reliable, Secure, and Compliant Healthcare Software with AI', 'testro' ),
					'intro'      => __( 'Accelerate healthcare innovation with theTestRo\'s AI-powered Healthcare Testing Platform. Automate clinical workflows, validate healthcare applications, strengthen compliance, and deliver exceptional patient experiences through intelligent quality engineering.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		'banking-finance' => array(
			'slug'  => 'banking-finance',
			'title' => __( 'Banking & Finance', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Banking Software Testing | Financial Services Testing | BFSI Test Automation | theTestRo', 'testro' ),
				'description' => __( 'AI-powered Banking Software Testing and Financial Services Testing for payment systems, digital banking, UPI, APIs, and core banking. Accelerate BFSI Test Automation and Digital Banking Quality Engineering with theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'Banking & Financial Services Testing', 'testro' ),
				'title'    => __( 'AI Test Automation for Banking & Financial Services', 'testro' ),
				'subtitle' => __( 'Accelerate secure digital banking and financial innovation with theTestRo\'s AI-powered Banking & Financial Services Testing Platform. Automate testing across banking portals, payment systems, APIs, mobile banking applications, insurance platforms, and enterprise financial software while ensuring regulatory readiness, transaction reliability, and exceptional customer experiences.', 'testro' ),
				'badges'   => array(
					__( 'Audit-Ready Testing', 'testro' ),
					__( 'Payment & UPI Coverage', 'testro' ),
					__( 'AI Self-Healing', 'testro' ),
					__( 'BFSI Compliance', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster banking releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '99.5%',
						'label' => __( 'Payment suite pass rate', 'testro' ),
						'icon'  => 'badge-check',
					),
					array(
						'value' => '65%',
						'label' => __( 'Lower test maintenance', 'testro' ),
						'icon'  => 'coins',
					),
				),
			),

			'sections' => array(

				/* 1. Accelerate digital banking ------------------------------ */
				array(
					'type'    => 'feature-grid',
					'id'      => 'accelerate-digital-banking',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Accelerate Digital Banking & Financial Innovation', 'testro' ),
					'title'   => __( 'AI-Powered Quality for Mission-Critical Financial Software', 'testro' ),
					'intro'   => __( 'Banking and financial institutions rely on theTestRo to accelerate digital transformation, protect transaction reliability, and sustain audit-ready quality with intelligent automation.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI-Powered Quality Engineering', 'testro' ),
							'description' => __( 'Leverage intelligent automation to improve software quality while reducing manual testing effort.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster, Audit-Ready Releases', 'testro' ),
							'description' => __( 'Deliver software updates quickly with automated validation and complete audit readiness.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Secure & Reliable Financial Software Delivery', 'testro' ),
							'description' => __( 'Ensure mission-critical financial applications remain secure, stable, and highly available.', 'testro' ),
						),
					),
				),

				/* 2. Challenges → solutions ---------------------------------- */
				array(
					'type'    => 'comparison',
					'id'      => 'banking-challenges-solutions',
					'eyebrow' => __( 'Banking Testing Challenges', 'testro' ),
					'title'   => __( 'From Financial Risk to AI-Powered Confidence', 'testro' ),
					'intro'   => __( 'Banking platforms evolve constantly—core upgrades, payment innovation, and compliance pressures all demand continuous validation. theTestRo turns those challenges into automated, self-healing coverage.', 'testro' ),
					'legacy'  => array(
						'label' => __( 'Banking Testing Challenges', 'testro' ),
						'note'  => __( 'Where quality breaks under financial pressure', 'testro' ),
					),
					'modern'  => array(
						'label' => __( 'How theTestRo Solves Them', 'testro' ),
						'note'  => __( 'AI automation built for BFSI', 'testro' ),
					),
					'rows'    => array(
						array(
							'aspect' => __( 'Complex Financial Workflows', 'testro' ),
							'legacy' => __( 'Intricate banking processes span multiple systems, channels, and roles.', 'testro' ),
							'modern' => __( 'Automate intricate financial processes with end-to-end testing.', 'testro' ),
						),
						array(
							'aspect' => __( 'Regulatory & Compliance Requirements', 'testro' ),
							'legacy' => __( 'Audit trails and quality evidence are hard to sustain under release pressure.', 'testro' ),
							'modern' => __( 'Support compliance initiatives through continuous quality validation and audit-ready reporting.', 'testro' ),
						),
						array(
							'aspect' => __( 'High-Volume Transaction Processing', 'testro' ),
							'legacy' => __( 'Peak payment loads expose reliability gaps that manual testing misses.', 'testro' ),
							'modern' => __( 'Validate applications under high transaction loads while maintaining reliability.', 'testro' ),
						),
						array(
							'aspect' => __( 'Legacy Core Banking Systems', 'testro' ),
							'legacy' => __( 'Modern apps must integrate reliably with aging core banking infrastructure.', 'testro' ),
							'modern' => __( 'Ensure seamless integration with modern banking applications.', 'testro' ),
						),
						array(
							'aspect' => __( 'API & Third-Party Integrations', 'testro' ),
							'legacy' => __( 'Payment providers, banking APIs, and enterprise systems rarely stay in sync.', 'testro' ),
							'modern' => __( 'Validate integrations across payment providers, banking APIs, and enterprise systems.', 'testro' ),
						),
						array(
							'aspect' => __( 'Security & Fraud Prevention', 'testro' ),
							'legacy' => __( 'Security controls and fraud checks must hold through every release cycle.', 'testro' ),
							'modern' => __( 'Strengthen application reliability through continuous automated testing.', 'testro' ),
						),
					),
				),

				/* 3. What you can test --------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'what-you-can-test-banking',
					'eyebrow' => __( 'Everything You Can Test', 'testro' ),
					'title'   => __( 'One AI Platform Across the Banking Technology Stack', 'testro' ),
					'intro'   => __( 'Automate testing across every customer-facing and backend banking application using one unified AI-powered testing platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Banking Quality Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Applications', 'testro' ),
							'description' => __( 'Platforms — validate digital banking and administrative web experiences.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Banking Applications', 'testro' ),
							'description' => __( 'Platforms — cover Android and iOS banking journeys.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'APIs & Microservices', 'testro' ),
							'description' => __( 'Platforms — exercise banking service APIs and microservice contracts.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Enterprise Banking Systems', 'testro' ),
							'description' => __( 'Platforms — cover bank and financial-institution back-office stacks.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Core Banking Systems', 'testro' ),
							'description' => __( 'Banking apps — accounts, ledgers, and core transaction workflows.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Digital Banking Portals', 'testro' ),
							'description' => __( 'Banking apps — online banking and self-service experiences.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Banking Apps', 'testro' ),
							'description' => __( 'Banking apps — transfers, cards, and on-the-go account access.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Payment Gateways', 'testro' ),
							'description' => __( 'Banking apps — authorize, capture, and settlement flows.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'UPI & QR Payment Systems', 'testro' ),
							'description' => __( 'Banking apps — instant payment and QR transaction journeys.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Loan Management Systems', 'testro' ),
							'description' => __( 'Banking apps — origination, underwriting, and servicing.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Wealth Management Platforms', 'testro' ),
							'description' => __( 'Banking apps — portfolio, advisory, and wealth workflows.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Insurance & Claims Portals', 'testro' ),
							'description' => __( 'Banking apps — policy, claims, and insurance service flows.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Trading & Investment Platforms', 'testro' ),
							'description' => __( 'Banking apps — trade execution and investment journeys.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'CRM & ERP Applications', 'testro' ),
							'description' => __( 'Banking apps — customer and enterprise operations systems.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI Test Automation', 'testro' ),
							'description' => __( 'Capabilities — generate and heal banking suites with AI.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Functional Testing', 'testro' ),
							'description' => __( 'Capabilities — verify banking features behave as expected.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'End-to-End Testing', 'testro' ),
							'description' => __( 'Capabilities — validate complete customer financial journeys.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Capabilities — exercise contracts across payment and core APIs.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Capabilities — confirm banking portals across major browsers.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Cross-Platform Testing', 'testro' ),
							'description' => __( 'Capabilities — cover web and mobile banking experiences together.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Regression Testing', 'testro' ),
							'description' => __( 'Capabilities — protect transaction reliability after every update.', 'testro' ),
						),
					),
				),

				/* 4. Mission-critical workflows (lifecycle) ------------------ */
				array(
					'type'      => 'lifecycle',
					'id'        => 'banking-mission-critical-workflows',
					'eyebrow'   => __( 'Validate Mission-Critical Banking Workflows', 'testro' ),
					'title'     => __( 'Automate the Complete Digital Banking Journey', 'testro' ),
					'intro'     => __( 'From onboarding through payments, lending, and self-service, cover every finance-critical step customers take—so portals, UPI, loans, cards, and investments stay reliable release after release.', 'testro' ),
					'loop_note' => __( 'Every banking stage feeds the next — continuous financial quality compounds with each release.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Customer Onboarding & KYC', 'testro' ),
							'description' => __( 'Validate identity, KYC, and account opening workflows.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Login, MFA & Biometric Authentication', 'testro' ),
							'description' => __( 'Verify secure authentication across banking channels.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Account Management', 'testro' ),
							'description' => __( 'Test balances, statements, and account servicing flows.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Fund Transfers & Payments', 'testro' ),
							'description' => __( 'Automate NEFT, RTGS, IMPS, and transfer journeys.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'UPI & QR Transactions', 'testro' ),
							'description' => __( 'Ensure instant payment and QR experiences remain reliable.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Loan Origination & Approval', 'testro' ),
							'description' => __( 'Validate application, underwriting, and approval workflows.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'Credit Card & Wallet Transactions', 'testro' ),
							'description' => __( 'Test card payments, wallets, and related authorizations.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Bill Payments', 'testro' ),
							'description' => __( 'Cover biller discovery, payment, and confirmation flows.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Investment & Trading Workflows', 'testro' ),
							'description' => __( 'Validate portfolio, order, and investment journeys.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Customer Self-Service Portals', 'testro' ),
							'description' => __( 'Ensure self-service banking experiences stay seamless.', 'testro' ),
						),
					),
				),

				/* 5. AI capabilities (bento) --------------------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'banking-ai-capabilities',
					'variant' => 'spotlight',
					'eyebrow' => __( 'AI-Powered Banking Quality Engineering', 'testro' ),
					'title'   => __( 'Intelligent Automation Built for Financial Software', 'testro' ),
					'intro'   => __( 'Cover the full banking quality stack—from payments and UPI to APIs, regression, and release readiness—with AI-assisted automation.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI Test Creation', 'testro' ),
							'description' => __( 'Generate banking-specific test cases intelligently using AI.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Self-Healing Automation', 'testro' ),
							'description' => __( 'Automatically adapt to changing banking applications without manual maintenance.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Intelligent Test Maintenance', 'testro' ),
							'description' => __( 'Reduce maintenance effort through AI-driven automation.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Parallel Test Execution', 'testro' ),
							'description' => __( 'Accelerate validation of financial applications through enterprise-scale parallel execution.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Continuous Regression Testing', 'testro' ),
							'description' => __( 'Continuously validate critical banking workflows after every update.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Risk-Based Test Prioritization', 'testro' ),
							'description' => __( 'Focus automation on high-risk payments, compliance, and customer journeys.', 'testro' ),
						),
					),
				),

				/* 6. Security, compliance & governance ----------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'banking-security-compliance',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Security, Compliance & Governance', 'testro' ),
					'title'   => __( 'Quality Engineering Aligned with BFSI Standards', 'testro' ),
					'intro'   => __( 'Strengthen confidence across audit readiness, access control, secure data handling, and enterprise governance while you automate financial software quality.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Audit-Ready Test Evidence', 'testro' ),
							'description' => __( 'Maintain complete, exportable evidence for audits and regulatory reviews.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Role-Based Access Control', 'testro' ),
							'description' => __( 'Secure access to testing assets and execution environments.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Secure Test Data Management', 'testro' ),
							'description' => __( 'Protect sensitive financial data throughout testing activities.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Compliance Validation', 'testro' ),
							'description' => __( 'Support compliance initiatives with continuous quality validation.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'End-to-End Traceability', 'testro' ),
							'description' => __( 'Trace requirements, tests, and releases across banking delivery.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Enterprise Governance', 'testro' ),
							'description' => __( 'Enforce quality gates and governance across BFSI release pipelines.', 'testro' ),
						),
					),
				),

				/* 7. Continuous quality / DevOps (pipeline) ------------------ */
				array(
					'type'    => 'pipeline',
					'id'      => 'banking-continuous-quality',
					'eyebrow' => __( 'Continuous Quality & DevOps', 'testro' ),
					'title'   => __( 'Development → CI/CD → AI Testing → Validation → Release', 'testro' ),
					'intro'   => __( 'Keep banking quality continuous across every release with an AI-powered workflow that integrates into delivery pipelines, validates financial readiness, and reduces release risk.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Development', 'testro' ),
							'title'       => __( 'CI/CD Integration', 'testro' ),
							'description' => __( 'Integrate automated banking testing into continuous delivery pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'CI/CD', 'testro' ),
							'title'       => __( 'Automated Release Validation', 'testro' ),
							'description' => __( 'Ensure software quality before production deployment.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'AI Testing', 'testro' ),
							'title'       => __( 'Cross-Browser & Cross-Device Testing', 'testro' ),
							'description' => __( 'Validate banking experiences across browsers and devices at scale.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'stage'       => __( 'Validation', 'testro' ),
							'title'       => __( 'Multi-Environment Testing', 'testro' ),
							'description' => __( 'Test across development, staging, QA, and production environments.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Release Readiness Assessment', 'testro' ),
							'description' => __( 'Gain confidence before every financial software deployment.', 'testro' ),
						),
					),
				),

				/* 8. Quality intelligence (analytics) ------------------------ */
				array(
					'type'      => 'analytics',
					'id'        => 'banking-quality-intelligence',
					'eyebrow'   => __( 'Banking Quality Intelligence', 'testro' ),
					'title'     => __( 'Turn Financial Test Results into Release Decisions', 'testro' ),
					'intro'     => __( 'Monitor AI insights, transaction quality, coverage, risk signals, and release readiness from a banking-focused analytics experience.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'AI Failure Analysis', 'testro' ),
							'description' => __( 'Automatically identify the root causes of failed banking tests.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Test Analytics & Dashboards', 'testro' ),
							'description' => __( 'Gain real-time visibility into financial software quality.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Root Cause Analysis', 'testro' ),
							'description' => __( 'Pinpoint defects faster across payments, APIs, and core systems.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Test Coverage Insights', 'testro' ),
							'description' => __( 'Measure testing completeness across banking applications.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Release Health Metrics', 'testro' ),
							'description' => __( 'Understand deployment readiness using AI-powered analytics.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Banking release readiness', 'testro' ),
						'score'     => 98,
						'status'    => __( 'Ready for go-live', 'testro' ),
						'build'     => __( 'Build #4217 · main', 'testro' ),
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '99.5%',
								'trend' => __( '+1.2 pts', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Transaction quality', 'testro' ),
								'value' => '97%',
								'trend' => __( 'Payments & UPI', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Compliance score', 'testro' ),
								'value' => 'A+',
								'trend' => __( 'Audit-ready', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Risk alerts', 'testro' ),
								'value' => '1',
								'trend' => __( '−4 vs last release', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Last 7 executions', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 72,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 78,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 74,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 86,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 91,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 83,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 94,
								),
							),
						),
					),
				),

				/* 9. Why choose (outcomes) ----------------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'banking-enterprise-outcomes',
					'variant' => 'tint',
					'eyebrow' => __( 'Why Banking & Financial Institutions Choose theTestRo', 'testro' ),
					'title'   => __( 'Measurable Impact on Financial Software Quality', 'testro' ),
					'intro'   => __( 'Banks, insurers, fintechs, and BFSI digital teams use theTestRo to ship faster, expand automation coverage, and lower maintenance cost with AI.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Release Cycles', 'testro' ),
							'description' => __( 'Accelerate innovation while maintaining software quality.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Reduced Operational Risk', 'testro' ),
							'description' => __( 'Lower release risk across payments, core, and digital channels.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Higher Test Coverage', 'testro' ),
							'description' => __( 'Improve confidence across banking applications.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Improved Software Reliability', 'testro' ),
							'description' => __( 'Deliver stable and secure financial systems.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Lower Test Maintenance Costs', 'testro' ),
							'description' => __( 'Reduce ongoing maintenance using intelligent automation.', 'testro' ),
						),
					),
				),

				/* 10. Trust logos -------------------------------------------- */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Banking Digitization Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Banking and financial institutions rely on theTestRo to protect financial software quality and accelerate digital banking releases.', 'testro' ),
				),

				/* 11. Customer success --------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'BFSI Teams Shipping Safer Digital Banking Experiences', 'testro' ),
					'intro'   => __( 'See how organizations accelerate banking modernization, improve release quality, reduce operational risk, increase automation coverage, and deliver secure digital banking experiences with theTestRo.', 'testro' ),
				),

				/* 12. Integrations ------------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'banking-integrations',
					'eyebrow' => __( 'Supported Integrations', 'testro' ),
					'title'   => __( 'Connect Banking Quality into Your DevOps Ecosystem', 'testro' ),
					'intro'   => __( 'Integrate seamlessly with your existing DevOps ecosystem to automate quality engineering across every financial software release.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Connected Delivery', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Link defects and banking quality signals to delivery work items.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Run continuous banking suites inside Jenkins pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger financial regression on every pull request and release.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed quality gates into Azure boards and release pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Alert teams instantly when payment or compliance suites fail.', 'testro' ),
						),
					),
				),

				/* 13. FAQ ---------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Banking & Finance FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'banking-finance',
				),

				/* 14. Final CTA ---------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-banking-finance',
					'title'      => __( 'Power Secure, Reliable, and Intelligent Banking Software with AI', 'testro' ),
					'intro'      => __( 'Accelerate digital banking transformation with theTestRo\'s AI-powered Banking & Financial Services Testing Platform. Automate mission-critical workflows, validate secure financial transactions, strengthen compliance, and deliver exceptional customer experiences through intelligent quality engineering.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		'travel-and-hospitality' => array(
			'slug'  => 'travel-and-hospitality',
			'title' => __( 'Travel & Hospitality', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Travel Software Testing | Hospitality Testing | Travel Test Automation | theTestRo', 'testro' ),
				'description' => __( 'AI-powered Travel & Hospitality Testing for booking engines, hotel reservation systems, travel portals, and payment gateways. Accelerate Travel Quality Engineering and Booking Platform Testing with theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'Travel & Hospitality Testing', 'testro' ),
				'title'    => __( 'Travel & Hospitality Testing Solutions', 'testro' ),
				'subtitle' => __( 'Deliver exceptional digital travel experiences with theTestRo\'s AI-powered Travel & Hospitality Testing Platform. Automate testing across booking engines, hotel reservation systems, travel portals, mobile applications, payment gateways, and enterprise travel platforms to ensure reliable customer journeys, faster releases, and seamless travel experiences.', 'testro' ),
				'badges'   => array(
					__( 'Booking Reliability', 'testro' ),
					__( 'Peak-Season Ready', 'testro' ),
					__( 'AI Self-Healing', 'testro' ),
					__( 'Omnichannel Journeys', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster travel releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '99.4%',
						'label' => __( 'Booking suite pass rate', 'testro' ),
						'icon'  => 'badge-check',
					),
					array(
						'value' => '9+',
						'label' => __( 'Journey stages covered', 'testro' ),
						'icon'  => 'infinity',
					),
				),
			),

			'sections' => array(

				/* 1. Deliver exceptional experiences ----------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'deliver-exceptional-travel-experiences',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Deliver Exceptional Digital Travel Experiences', 'testro' ),
					'title'   => __( 'Accelerate Travel Innovation with Continuous Quality', 'testro' ),
					'intro'   => __( 'Travel and hospitality teams use AI automation to ship booking features faster while protecting every guest and traveler journey.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate Digital Transformation', 'testro' ),
							'description' => __( 'Deliver innovative travel experiences faster through intelligent automation and continuous testing.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Enhance Guest & Traveler Experiences', 'testro' ),
							'description' => __( 'Ensure smooth, reliable interactions across every customer touchpoint.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Release Booking Features with Confidence', 'testro' ),
							'description' => __( 'Validate booking workflows thoroughly before every release to minimize production issues.', 'testro' ),
						),
					),
				),

				/* 2. Challenges → solutions -------------------------------- */
				array(
					'type'    => 'comparison',
					'id'      => 'travel-challenges-solutions',
					'eyebrow' => __( 'Travel & Hospitality Testing Challenges', 'testro' ),
					'title'   => __( 'From Travel Friction to AI-Powered Confidence', 'testro' ),
					'intro'   => __( 'Travel platforms evolve constantly—booking engines, peak demand, and multi-channel journeys all demand continuous validation. theTestRo turns those challenges into automated, self-healing coverage.', 'testro' ),
					'legacy'  => array(
						'label' => __( 'Travel Industry Challenges', 'testro' ),
						'note'  => __( 'Where quality breaks under travel pressure', 'testro' ),
					),
					'modern'  => array(
						'label' => __( 'How theTestRo Solves Them', 'testro' ),
						'note'  => __( 'AI-powered quality engineering', 'testro' ),
					),
					'rows'    => array(
						array(
							'aspect' => __( 'Complex Booking & Reservation Workflows', 'testro' ),
							'legacy' => __( 'Flights, hotels, and ancillary services span brittle multi-step reservation paths.', 'testro' ),
							'modern' => __( 'Automate end-to-end booking scenarios across flights, hotels, and travel services.', 'testro' ),
						),
						array(
							'aspect' => __( 'High Seasonal Traffic & Peak Demand', 'testro' ),
							'legacy' => __( 'Holidays and promotions expose stability gaps that manual testing misses.', 'testro' ),
							'modern' => __( 'Ensure applications remain stable during holidays, promotions, and peak booking periods.', 'testro' ),
						),
						array(
							'aspect' => __( 'Multi-Channel Customer Journeys', 'testro' ),
							'legacy' => __( 'Travelers bounce between websites, apps, kiosks, and portals mid-journey.', 'testro' ),
							'modern' => __( 'Validate seamless experiences across websites, mobile apps, kiosks, and customer portals.', 'testro' ),
						),
						array(
							'aspect' => __( 'Third-Party Travel Integrations', 'testro' ),
							'legacy' => __( 'Airlines, hotels, payments, and travel APIs rarely stay in sync.', 'testro' ),
							'modern' => __( 'Test integrations with airlines, hotels, payment providers, and external travel APIs.', 'testro' ),
						),
						array(
							'aspect' => __( 'Payment Security & Transaction Reliability', 'testro' ),
							'legacy' => __( 'Booking payments must stay secure and reliable through every release.', 'testro' ),
							'modern' => __( 'Verify secure and reliable payment processing for every booking.', 'testro' ),
						),
						array(
							'aspect' => __( 'Global Device & Browser Fragmentation', 'testro' ),
							'legacy' => __( 'Inconsistent experiences across browsers and devices erode traveler trust.', 'testro' ),
							'modern' => __( 'Ensure consistent experiences across browsers, devices, and operating systems worldwide.', 'testro' ),
						),
					),
				),

				/* 3. What you can test ------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'what-you-can-test-travel',
					'eyebrow' => __( 'Everything You Can Test', 'testro' ),
					'title'   => __( 'One AI Platform Across the Travel Technology Stack', 'testro' ),
					'intro'   => __( 'Automate testing across every customer-facing and backend travel application from one intelligent AI-powered testing platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Travel Quality Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Applications', 'testro' ),
							'description' => __( 'Platforms — validate travel portals and administrative web experiences.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Applications', 'testro' ),
							'description' => __( 'Platforms — cover Android and iOS travel booking journeys.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'APIs', 'testro' ),
							'description' => __( 'Platforms — exercise booking, inventory, and payment service APIs.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Enterprise Travel Systems', 'testro' ),
							'description' => __( 'Platforms — cover airline, hotel, and travel-operator back-office stacks.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Flight Booking Platforms', 'testro' ),
							'description' => __( 'Travel apps — search, fare, and itinerary booking workflows.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'Hotel Reservation Systems', 'testro' ),
							'description' => __( 'Travel apps — room inventory, rates, and reservation journeys.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Travel Portals', 'testro' ),
							'description' => __( 'Travel apps — OTA and brand portal experiences.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Booking Apps', 'testro' ),
							'description' => __( 'Travel apps — native and responsive mobile reservation flows.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Self Check-In Applications', 'testro' ),
							'description' => __( 'Travel apps — digital check-in and boarding experiences.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Property Management Systems (PMS)', 'testro' ),
							'description' => __( 'Travel apps — property operations and guest service systems.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Central Reservation Systems (CRS)', 'testro' ),
							'description' => __( 'Travel apps — central inventory and distribution workflows.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Loyalty & Rewards Platforms', 'testro' ),
							'description' => __( 'Travel apps — memberships, points, and promotional offers.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Payment Gateways', 'testro' ),
							'description' => __( 'Travel apps — authorize, capture, and refund booking payments.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'CRM & ERP Applications', 'testro' ),
							'description' => __( 'Travel apps — guest and enterprise operations systems.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI Test Automation', 'testro' ),
							'description' => __( 'Capabilities — generate and heal travel suites with AI.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Functional Testing', 'testro' ),
							'description' => __( 'Capabilities — verify travel features behave as expected.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'End-to-End Testing', 'testro' ),
							'description' => __( 'Capabilities — validate complete traveler journeys.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Capabilities — exercise contracts across booking and payment APIs.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Capabilities — confirm travel portals across major browsers.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Cross-Platform Testing', 'testro' ),
							'description' => __( 'Capabilities — cover web and mobile booking experiences together.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Regression Testing', 'testro' ),
							'description' => __( 'Capabilities — protect booking reliability after every update.', 'testro' ),
						),
					),
				),

				/* 4. Traveler journey (lifecycle) -------------------------- */
				array(
					'type'      => 'lifecycle',
					'id'        => 'travel-end-to-end-workflows',
					'eyebrow'   => __( 'Validate End-to-End Travel Workflows', 'testro' ),
					'title'     => __( 'Automate the Complete Traveler Journey', 'testro' ),
					'intro'     => __( 'From registration through search, booking, payment, check-in, and loyalty, cover every travel-critical step customers take—so portals, apps, and reservations stay reliable release after release.', 'testro' ),
					'loop_note' => __( 'Every journey stage feeds the next — continuous travel quality compounds with each release.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'User Registration & Login', 'testro' ),
							'description' => __( 'Validate secure customer onboarding and authentication.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Flight & Hotel Search', 'testro' ),
							'description' => __( 'Verify search functionality, filters, pricing, and availability.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'Booking & Reservation', 'testro' ),
							'description' => __( 'Ensure accurate booking and reservation workflows.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Seat & Room Selection', 'testro' ),
							'description' => __( 'Validate seat assignment and room selection experiences.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Payment Processing', 'testro' ),
							'description' => __( 'Test secure payment transactions across multiple payment methods.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Check-In & Check-Out', 'testro' ),
							'description' => __( 'Ensure smooth digital check-in and check-out experiences.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Booking Modifications & Cancellations', 'testro' ),
							'description' => __( 'Validate changes, cancellations, and refund workflows.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Loyalty Program Validation', 'testro' ),
							'description' => __( 'Verify rewards, memberships, and promotional offers.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Notifications & Confirmation Workflows', 'testro' ),
							'description' => __( 'Ensure customers receive timely confirmations and travel updates.', 'testro' ),
						),
					),
				),

				/* 5. AI capabilities (bento) ------------------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'travel-ai-capabilities',
					'variant' => 'spotlight',
					'eyebrow' => __( 'AI-Powered Quality Engineering', 'testro' ),
					'title'   => __( 'Intelligent Automation Built for Travel Journeys', 'testro' ),
					'intro'   => __( 'Cover the full travel quality stack—from booking engines and hotel systems to APIs, regression, and release readiness—with AI-assisted automation.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI Test Creation', 'testro' ),
							'description' => __( 'Automatically generate intelligent travel testing scenarios.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Self-Healing Automation', 'testro' ),
							'description' => __( 'Adapt to UI and application changes without manual intervention.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Intelligent Test Maintenance', 'testro' ),
							'description' => __( 'Reduce maintenance through AI-driven automation.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Parallel Test Execution', 'testro' ),
							'description' => __( 'Execute thousands of travel test cases simultaneously.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Continuous Regression Testing', 'testro' ),
							'description' => __( 'Ensure every release maintains application stability.', 'testro' ),
						),
					),
				),

				/* 6. Real device & cross-platform -------------------------- */
				array(
					'type'    => 'browsers',
					'id'      => 'travel-real-device-cross-platform',
					'eyebrow' => __( 'Real Device & Cross-Platform Testing', 'testro' ),
					'title'   => __( 'Validate Travel Experiences Everywhere Travelers Book', 'testro' ),
					'intro'   => __( 'Run the same booking suites across desktop browsers, tablets, and real mobile devices so multi-screen travel journeys stay reliable worldwide.', 'testro' ),
					'items'   => array(
						array(
							'name'     => __( 'Desktop Browsers', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 84,
							'tone'     => 'running',
						),
						array(
							'name'     => __( 'Tablets', 'testro' ),
							'status'   => __( 'Passed', 'testro' ),
							'progress' => 100,
							'tone'     => 'passed',
						),
						array(
							'name'     => __( 'Android Devices', 'testro' ),
							'status'   => __( 'Running', 'testro' ),
							'progress' => 71,
							'tone'     => 'running',
						),
						array(
							'name'     => __( 'iPhones', 'testro' ),
							'status'   => __( 'Visual check', 'testro' ),
							'progress' => 93,
							'tone'     => 'visual',
						),
					),
					'parallel' => array(
						'title'       => __( 'Parallel Multi-Screen Validation', 'testro' ),
						'description' => __( 'Fan booking suites across browsers and real devices simultaneously—cut cycle time without sacrificing omnichannel travel coverage.', 'testro' ),
						'stat'        => '10X',
						'stat_label'  => __( 'faster suites', 'testro' ),
					),
				),

				array(
					'type'    => 'feature-grid',
					'id'      => 'travel-device-coverage-capabilities',
					'variant' => 'tint',
					'columns' => 3,
					'eyebrow' => __( 'Device & Browser Coverage', 'testro' ),
					'title'   => __( 'Confidence Across Every Booking Screen', 'testro' ),
					'intro'   => __( 'Protect traveler experiences with comprehensive browser, device, mobile, responsive, and visual coverage.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Ensure consistent functionality across modern browsers.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Real Device Testing', 'testro' ),
							'description' => __( 'Validate experiences on real mobile devices.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Mobile App Validation', 'testro' ),
							'description' => __( 'Test native and responsive mobile booking experiences.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Responsive UI Testing', 'testro' ),
							'description' => __( 'Verify layouts across different screen sizes.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Visual Regression Testing', 'testro' ),
							'description' => __( 'Detect unexpected UI changes before deployment.', 'testro' ),
						),
					),
				),

				/* 7. Continuous delivery (pipeline) ------------------------ */
				array(
					'type'    => 'pipeline',
					'id'      => 'travel-continuous-delivery',
					'eyebrow' => __( 'Continuous Delivery for Travel Applications', 'testro' ),
					'title'   => __( 'Development → CI/CD → AI Testing → Validation → Release', 'testro' ),
					'intro'   => __( 'Keep travel quality continuous across every release with an AI-powered workflow that integrates into delivery pipelines, validates booking readiness, and reduces release risk.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Development', 'testro' ),
							'title'       => __( 'CI/CD Integration', 'testro' ),
							'description' => __( 'Automate testing within continuous delivery pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'CI/CD', 'testro' ),
							'title'       => __( 'Automated Release Validation', 'testro' ),
							'description' => __( 'Validate every booking release before production.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'AI Testing', 'testro' ),
							'title'       => __( 'Multi-Environment Testing', 'testro' ),
							'description' => __( 'Execute tests across development, staging, QA, and production.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'stage'       => __( 'Validation', 'testro' ),
							'title'       => __( 'Release Readiness', 'testro' ),
							'description' => __( 'Determine deployment confidence using AI-driven insights.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Quality Gates', 'testro' ),
							'description' => __( 'Prevent unstable releases through automated quality validation.', 'testro' ),
						),
					),
				),

				/* 8. Quality intelligence (analytics) ---------------------- */
				array(
					'type'      => 'analytics',
					'id'        => 'travel-quality-intelligence',
					'eyebrow'   => __( 'AI-Driven Test Intelligence', 'testro' ),
					'title'     => __( 'Turn Travel Test Results into Release Decisions', 'testro' ),
					'intro'     => __( 'Monitor AI insights, booking health, coverage, risk signals, and release readiness from a travel-focused analytics experience.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Root Cause Analysis', 'testro' ),
							'description' => __( 'Quickly identify and resolve booking workflow failures.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Test Analytics', 'testro' ),
							'description' => __( 'Monitor execution trends and testing performance.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Quality Dashboards', 'testro' ),
							'description' => __( 'Track application quality in real time.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Release Insights', 'testro' ),
							'description' => __( 'Measure deployment readiness through intelligent analytics.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Test Coverage Metrics', 'testro' ),
							'description' => __( 'Visualize automation coverage across travel platforms.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Travel release readiness', 'testro' ),
						'score'     => 98,
						'status'    => __( 'Ready for peak season', 'testro' ),
						'build'     => __( 'Build #3842 · main', 'testro' ),
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '99.4%',
								'trend' => __( '+1.1 pts', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Booking Health', 'testro' ),
								'value' => '97%',
								'trend' => __( 'Engines & PMS', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Coverage', 'testro' ),
								'value' => '92%',
								'trend' => __( 'Journey stages', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Risk alerts', 'testro' ),
								'value' => '1',
								'trend' => __( '−3 vs last release', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Last 7 executions', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 74,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 79,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 76,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 88,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 92,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 85,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 95,
								),
							),
						),
					),
				),

				/* 9. Why choose (outcomes) --------------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'travel-enterprise-outcomes',
					'variant' => 'tint',
					'eyebrow' => __( 'Why Travel & Hospitality Enterprises Choose theTestRo', 'testro' ),
					'title'   => __( 'Measurable Impact on Travel Software Quality', 'testro' ),
					'intro'   => __( 'Airlines, hotels, OTAs, and hospitality digital teams use theTestRo to ship faster, expand automation coverage, and protect booking reliability with AI.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Release Cycles', 'testro' ),
							'description' => __( 'Accelerate delivery of new travel features.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Reliable Booking Experiences', 'testro' ),
							'description' => __( 'Ensure uninterrupted booking journeys.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Improved Customer Satisfaction', 'testro' ),
							'description' => __( 'Deliver smooth and consistent travel experiences.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Reduced Test Maintenance', 'testro' ),
							'description' => __( 'Minimize maintenance using AI-powered automation.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Higher Automation Coverage', 'testro' ),
							'description' => __( 'Increase confidence through broader test coverage.', 'testro' ),
						),
					),
				),

				/* 10. Trust logos ------------------------------------------ */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Travel Digitization Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Travel and hospitality organizations rely on theTestRo to protect booking quality and accelerate digital travel releases.', 'testro' ),
				),

				/* 11. Customer success ------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Travel Teams Delivering Better Traveler Experiences', 'testro' ),
					'intro'   => __( 'See how organizations accelerate digital transformation, improve booking reliability, increase automation coverage, reduce release risks, and deliver better traveler experiences with theTestRo.', 'testro' ),
				),

				/* 12. Integrations ----------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'travel-integrations',
					'eyebrow' => __( 'Supported Integrations', 'testro' ),
					'title'   => __( 'Connect Travel Quality into Your DevOps Ecosystem', 'testro' ),
					'intro'   => __( 'Integrate seamlessly with your existing DevOps ecosystem to automate quality engineering throughout every travel software release.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Connected Delivery', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Link defects and travel quality signals to delivery work items.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Run continuous travel suites inside Jenkins pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger booking regression on every pull request and release.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed quality gates into Azure boards and release pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Alert teams instantly when booking or payment suites fail.', 'testro' ),
						),
					),
				),

				/* 13. FAQ -------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Travel & Hospitality FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'travel-and-hospitality',
				),

				/* 14. Final CTA -------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-travel-and-hospitality',
					'title'      => __( 'Deliver Exceptional Travel Experiences with AI-Powered Quality Engineering', 'testro' ),
					'intro'      => __( 'Accelerate digital travel innovation with theTestRo\'s AI-powered Travel & Hospitality Testing Platform. Automate booking workflows, validate mission-critical travel applications, improve customer satisfaction, and release with confidence through intelligent software testing.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),
		'insurance' => array(
			'slug'  => 'insurance',
			'title' => __( 'Insurance', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Insurance Software Testing | Insurance Test Automation | AI Insurance Testing | theTestRo', 'testro' ),
				'description' => __( 'AI-powered Insurance Software Testing and Insurance Test Automation for policy administration, claims management, customer portals, and APIs. Accelerate AI Insurance Testing, Claims Management Testing, Policy Administration Testing, and Insurance Quality Engineering with theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'Insurance Software Testing', 'testro' ),
				'title'    => __( 'Insurance Testing Solutions with No-Code Test Automation', 'testro' ),
				'subtitle' => __( 'Accelerate digital insurance transformation with theTestRo\'s AI-powered Insurance Testing Platform. Automate testing across policy administration systems, claims platforms, customer portals, mobile applications, APIs, and enterprise insurance solutions to deliver secure, reliable, and compliant customer experiences while reducing manual testing effort.', 'testro' ),
				'badges'   => array(
					__( 'Policy & Claims Coverage', 'testro' ),
					__( 'AI Self-Healing', 'testro' ),
					__( 'Compliance Ready', 'testro' ),
					__( 'Audit-Ready Testing', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster policy & claims releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '99.4%',
						'label' => __( 'Claims suite pass rate', 'testro' ),
						'icon'  => 'badge-check',
					),
					array(
						'value' => '60%',
						'label' => __( 'Lower test maintenance', 'testro' ),
						'icon'  => 'coins',
					),
				),
			),

			'sections' => array(

				/* 1. Accelerate digital insurance ---------------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'accelerate-digital-insurance',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Accelerate Digital Insurance Transformation', 'testro' ),
					'title'   => __( 'AI-Powered Quality for Mission-Critical Insurance Software', 'testro' ),
					'intro'   => __( 'Insurance carriers, MGAs, brokers, and insurtechs rely on theTestRo to accelerate digital transformation, protect policy and claims reliability, and sustain audit-ready quality with intelligent automation.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI-Powered Quality Engineering', 'testro' ),
							'description' => __( 'Leverage AI-powered automation to improve software quality while reducing testing effort.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Deliver Secure & Reliable Insurance Experiences', 'testro' ),
							'description' => __( 'Ensure policyholders, agents, and brokers enjoy secure and reliable digital experiences.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Release Faster with Confidence', 'testro' ),
							'description' => __( 'Accelerate insurance application releases through intelligent automation and continuous validation.', 'testro' ),
						),
					),
				),

				/* 2. Challenges → solutions ---------------------------------- */
				array(
					'type'    => 'comparison',
					'id'      => 'insurance-challenges-solutions',
					'eyebrow' => __( 'Insurance Testing Challenges', 'testro' ),
					'title'   => __( 'From Insurance Risk to AI-Powered Confidence', 'testro' ),
					'intro'   => __( 'Insurance platforms evolve constantly—policy upgrades, claims modernization, and compliance pressures all demand continuous validation. theTestRo turns those challenges into automated, self-healing coverage.', 'testro' ),
					'legacy'  => array(
						'label' => __( 'Insurance Testing Challenges', 'testro' ),
						'note'  => __( 'Where quality breaks under insurance pressure', 'testro' ),
					),
					'modern'  => array(
						'label' => __( 'How theTestRo Solves Them', 'testro' ),
						'note'  => __( 'AI automation built for insurance', 'testro' ),
					),
					'rows'    => array(
						array(
							'aspect' => __( 'Complex Policy & Claims Workflows', 'testro' ),
							'legacy' => __( 'Intricate policy and claims processes span multiple systems, channels, and roles.', 'testro' ),
							'modern' => __( 'Automate end-to-end policy lifecycle and claims processing with intelligent testing.', 'testro' ),
						),
						array(
							'aspect' => __( 'Regulatory & Compliance Requirements', 'testro' ),
							'legacy' => __( 'Audit trails and quality evidence are hard to sustain under release pressure.', 'testro' ),
							'modern' => __( 'Support insurance compliance initiatives through continuous quality validation and audit-ready reporting.', 'testro' ),
						),
						array(
							'aspect' => __( 'Sensitive Customer Data Protection', 'testro' ),
							'legacy' => __( 'Confidential customer and policy data must stay protected across every test environment.', 'testro' ),
							'modern' => __( 'Ensure secure testing while protecting confidential customer and policy information.', 'testro' ),
						),
						array(
							'aspect' => __( 'Legacy Insurance Systems', 'testro' ),
							'legacy' => __( 'Modern apps must integrate reliably with aging policy and claims infrastructure.', 'testro' ),
							'modern' => __( 'Validate integrations between modern applications and legacy insurance platforms.', 'testro' ),
						),
						array(
							'aspect' => __( 'Third-Party Integrations', 'testro' ),
							'legacy' => __( 'Payment providers, CRM systems, underwriting engines, and external APIs rarely stay in sync.', 'testro' ),
							'modern' => __( 'Test payment providers, CRM systems, underwriting engines, and external APIs seamlessly.', 'testro' ),
						),
						array(
							'aspect' => __( 'High-Volume Processing During Renewals', 'testro' ),
							'legacy' => __( 'Renewal peaks and seasonal spikes expose reliability gaps that manual testing misses.', 'testro' ),
							'modern' => __( 'Ensure systems remain stable during policy renewals and seasonal processing spikes.', 'testro' ),
						),
					),
				),

				/* 3. What you can test --------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'what-you-can-test-insurance',
					'eyebrow' => __( 'Everything You Can Test', 'testro' ),
					'title'   => __( 'One AI Platform Across the Insurance Technology Stack', 'testro' ),
					'intro'   => __( 'Automate testing across every insurance application, customer journey, and business workflow using one intelligent AI-powered testing platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Insurance Quality Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Applications', 'testro' ),
							'description' => __( 'Platforms — validate insurance portals and administrative web experiences.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Mobile Applications', 'testro' ),
							'description' => __( 'Platforms — cover Android and iOS insurance journeys.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'APIs', 'testro' ),
							'description' => __( 'Platforms — exercise insurance service APIs and microservice contracts.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Enterprise Insurance Systems', 'testro' ),
							'description' => __( 'Platforms — cover carrier and MGA back-office stacks.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Policy Administration Systems', 'testro' ),
							'description' => __( 'Insurance apps — quote, issue, renew, and policy servicing.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Claims Management Systems', 'testro' ),
							'description' => __( 'Insurance apps — FNOL, adjudication, and settlement flows.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Customer Self-Service Portals', 'testro' ),
							'description' => __( 'Insurance apps — policy, claims, and account self-service.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Insurance Mobile Apps', 'testro' ),
							'description' => __( 'Insurance apps — on-the-go policy and claims access.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Underwriting Platforms', 'testro' ),
							'description' => __( 'Insurance apps — risk assessment and underwriting workflows.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Agent & Broker Portals', 'testro' ),
							'description' => __( 'Insurance apps — producer tools and broker management.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Billing & Payment Systems', 'testro' ),
							'description' => __( 'Insurance apps — premium collection and payment processing.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'CRM & ERP Applications', 'testro' ),
							'description' => __( 'Insurance apps — customer and enterprise operations systems.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Document Management Systems', 'testro' ),
							'description' => __( 'Insurance apps — uploads, verification, and document storage.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI Test Automation', 'testro' ),
							'description' => __( 'Capabilities — generate and heal insurance suites with AI.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Functional Testing', 'testro' ),
							'description' => __( 'Capabilities — verify insurance features behave as expected.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'End-to-End Testing', 'testro' ),
							'description' => __( 'Capabilities — validate complete policyholder journeys.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Capabilities — exercise contracts across policy and claims APIs.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Capabilities — confirm insurance portals across major browsers.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Cross-Platform Testing', 'testro' ),
							'description' => __( 'Capabilities — cover web and mobile insurance experiences together.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Regression Testing', 'testro' ),
							'description' => __( 'Capabilities — protect policy and claims reliability after every update.', 'testro' ),
						),
					),
				),

				/* 4. End-to-end insurance workflows (lifecycle) -------------- */
				array(
					'type'      => 'lifecycle',
					'id'        => 'insurance-end-to-end-workflows',
					'eyebrow'   => __( 'Validate End-to-End Insurance Workflows', 'testro' ),
					'title'     => __( 'Automate the Complete Digital Insurance Journey', 'testro' ),
					'intro'     => __( 'From onboarding through quoting, issuance, claims, and self-service, cover every insurance-critical step customers and agents take—so policy, claims, billing, and portals stay reliable release after release.', 'testro' ),
					'loop_note' => __( 'Every insurance stage feeds the next — continuous insurance quality compounds with each release.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Customer Onboarding', 'testro' ),
							'description' => __( 'Validate customer registration and onboarding experiences.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Quote Generation', 'testro' ),
							'description' => __( 'Ensure accurate quote generation across insurance products.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Policy Issuance & Renewals', 'testro' ),
							'description' => __( 'Verify policy creation, renewals, and policy lifecycle management.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Claims Submission & Processing', 'testro' ),
							'description' => __( 'Automate claims validation and settlement workflows.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Premium Calculations', 'testro' ),
							'description' => __( 'Validate premium calculations and policy pricing.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Document Upload & Validation', 'testro' ),
							'description' => __( 'Test document submission, verification, and storage workflows.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Payment Processing', 'testro' ),
							'description' => __( 'Ensure secure premium collection and payment processing.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Agent & Broker Workflows', 'testro' ),
							'description' => __( 'Validate agent portals and broker management systems.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Customer Self-Service Journeys', 'testro' ),
							'description' => __( 'Ensure policyholders can manage accounts, policies, and claims efficiently.', 'testro' ),
						),
					),
				),

				/* 5. AI capabilities (bento) --------------------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'insurance-ai-capabilities',
					'variant' => 'spotlight',
					'eyebrow' => __( 'AI-Powered Insurance Quality Engineering', 'testro' ),
					'title'   => __( 'Intelligent Automation Built for Insurance Software', 'testro' ),
					'intro'   => __( 'Cover the full insurance quality stack—from policy and claims to APIs, regression, and release readiness—with AI-assisted automation.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI Test Creation', 'testro' ),
							'description' => __( 'Automatically generate insurance-specific testing scenarios.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Self-Healing Automation', 'testro' ),
							'description' => __( 'Adapt to UI and workflow changes without manual intervention.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Intelligent Test Maintenance', 'testro' ),
							'description' => __( 'Reduce maintenance using AI-driven automation.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Parallel Test Execution', 'testro' ),
							'description' => __( 'Execute large-scale insurance testing efficiently.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Continuous Regression Testing', 'testro' ),
							'description' => __( 'Validate every release while protecting critical insurance functionality.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Risk-Based Test Prioritization', 'testro' ),
							'description' => __( 'Focus automation on high-risk policy, claims, and compliance journeys.', 'testro' ),
						),
					),
				),

				/* 6. Security, compliance & data validation ------------------ */
				array(
					'type'    => 'feature-grid',
					'id'      => 'insurance-security-compliance',
					'variant' => 'spotlight',
					'columns' => 3,
					'eyebrow' => __( 'Security, Compliance & Data Validation', 'testro' ),
					'title'   => __( 'Quality Engineering Aligned with Insurance Standards', 'testro' ),
					'intro'   => __( 'Strengthen confidence across audit readiness, access control, secure data handling, and document validation while you automate insurance software quality.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'database',
							'title'       => __( 'Secure Test Data Management', 'testro' ),
							'description' => __( 'Protect sensitive customer and policy information throughout testing.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Compliance Validation', 'testro' ),
							'description' => __( 'Support regulatory compliance through continuous validation and reporting.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Multi-Factor Authentication (MFA) Testing', 'testro' ),
							'description' => __( 'Verify secure authentication across insurance platforms.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Role-Based Access Control', 'testro' ),
							'description' => __( 'Ensure secure access to enterprise testing assets.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Audit-Ready Test Evidence', 'testro' ),
							'description' => __( 'Generate detailed execution records for audits and compliance reviews.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Document Verification Testing', 'testro' ),
							'description' => __( 'Validate document uploads, approvals, and verification workflows.', 'testro' ),
						),
					),
				),

				/* 7. Continuous quality / DevOps (pipeline) ------------------ */
				array(
					'type'    => 'pipeline',
					'id'      => 'insurance-continuous-quality',
					'eyebrow' => __( 'Continuous Quality for Insurance Releases', 'testro' ),
					'title'   => __( 'Development → CI/CD → AI Testing → Validation → Release', 'testro' ),
					'intro'   => __( 'Keep insurance quality continuous across every release with an AI-powered workflow that integrates into delivery pipelines, validates release readiness, and reduces deployment risk.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Development', 'testro' ),
							'title'       => __( 'CI/CD Integration', 'testro' ),
							'description' => __( 'Integrate insurance testing into continuous delivery pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'CI/CD', 'testro' ),
							'title'       => __( 'Automated Release Validation', 'testro' ),
							'description' => __( 'Validate every software release before production deployment.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'AI Testing', 'testro' ),
							'title'       => __( 'Cross-Browser & Cross-Device Testing', 'testro' ),
							'description' => __( 'Ensure consistent customer experiences across every platform.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'stage'       => __( 'Validation', 'testro' ),
							'title'       => __( 'Multi-Environment Testing', 'testro' ),
							'description' => __( 'Execute tests across development, QA, staging, and production.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Release Readiness', 'testro' ),
							'description' => __( 'Measure deployment confidence through AI-powered quality insights.', 'testro' ),
						),
					),
				),

				/* 8. Quality intelligence (analytics) ------------------------ */
				array(
					'type'      => 'analytics',
					'id'        => 'insurance-quality-intelligence',
					'eyebrow'   => __( 'AI-Driven Test Intelligence', 'testro' ),
					'title'     => __( 'Turn Insurance Test Results into Release Decisions', 'testro' ),
					'intro'     => __( 'Monitor AI insights, claims analytics, coverage, quality scores, and release readiness from an insurance-focused analytics experience.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Root Cause Analysis', 'testro' ),
							'description' => __( 'Identify issues quickly using AI-powered diagnostics.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Test Analytics & Dashboards', 'testro' ),
							'description' => __( 'Monitor testing performance through centralized dashboards.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Quality Insights', 'testro' ),
							'description' => __( 'Gain actionable intelligence into software quality.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Test Coverage Metrics', 'testro' ),
							'description' => __( 'Track automation coverage across insurance applications.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Release Health Monitoring', 'testro' ),
							'description' => __( 'Measure software readiness before every release.', 'testro' ),
						),
					),
					'dashboard' => array(
						'label'     => __( 'Insurance release readiness', 'testro' ),
						'score'     => 97,
						'status'    => __( 'Ready for go-live', 'testro' ),
						'build'     => __( 'Build #3184 · main', 'testro' ),
						'tiles'     => array(
							array(
								'label' => __( 'Pass rate', 'testro' ),
								'value' => '99.4%',
								'trend' => __( '+1.1 pts', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Claims analytics', 'testro' ),
								'value' => '96%',
								'trend' => __( 'Settlement quality', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Quality score', 'testro' ),
								'value' => 'A+',
								'trend' => __( 'Audit-ready', 'testro' ),
								'tone'  => 'up',
							),
							array(
								'label' => __( 'Risk alerts', 'testro' ),
								'value' => '2',
								'trend' => __( '−3 vs last release', 'testro' ),
								'tone'  => 'up',
							),
						),
						'chart'     => array(
							'title' => __( 'Last 7 executions', 'testro' ),
							'bars'  => array(
								array(
									'label' => __( 'Mon', 'testro' ),
									'value' => 70,
								),
								array(
									'label' => __( 'Tue', 'testro' ),
									'value' => 76,
								),
								array(
									'label' => __( 'Wed', 'testro' ),
									'value' => 73,
								),
								array(
									'label' => __( 'Thu', 'testro' ),
									'value' => 85,
								),
								array(
									'label' => __( 'Fri', 'testro' ),
									'value' => 90,
								),
								array(
									'label' => __( 'Sat', 'testro' ),
									'value' => 82,
								),
								array(
									'label' => __( 'Sun', 'testro' ),
									'value' => 93,
								),
							),
						),
					),
				),

				/* 9. Why choose (outcomes) ----------------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'insurance-enterprise-outcomes',
					'variant' => 'tint',
					'eyebrow' => __( 'Why Insurance Organizations Choose theTestRo', 'testro' ),
					'title'   => __( 'Measurable Impact on Insurance Software Quality', 'testro' ),
					'intro'   => __( 'Carriers, MGAs, brokers, and insurtechs use theTestRo to ship faster, expand automation coverage, and lower maintenance cost with AI.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Policy & Claims Releases', 'testro' ),
							'description' => __( 'Accelerate software delivery across insurance platforms.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Reduced Operational Risk', 'testro' ),
							'description' => __( 'Identify defects before they impact customers or operations.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Improved Software Reliability', 'testro' ),
							'description' => __( 'Deliver secure and highly available insurance applications.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Higher Automation Coverage', 'testro' ),
							'description' => __( 'Increase testing confidence with broader automation.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Lower Test Maintenance Costs', 'testro' ),
							'description' => __( 'Reduce manual maintenance through AI-powered automation.', 'testro' ),
						),
					),
				),

				/* 10. Trust logos -------------------------------------------- */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Insurance Digitization Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Insurance organizations rely on theTestRo to protect insurance software quality and accelerate digital insurance releases.', 'testro' ),
				),

				/* 11. Customer success --------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Insurance Teams Shipping Safer Digital Experiences', 'testro' ),
					'intro'   => __( 'See how organizations accelerate digital transformation, improve claims processing quality, reduce release risks, increase automation coverage, and deliver superior customer experiences with theTestRo.', 'testro' ),
				),

				/* 12. Integrations ------------------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'insurance-integrations',
					'eyebrow' => __( 'Supported Integrations', 'testro' ),
					'title'   => __( 'Connect Insurance Quality into Your DevOps Ecosystem', 'testro' ),
					'intro'   => __( 'Integrate seamlessly with your DevOps ecosystem to automate quality engineering across every insurance software release.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Connected Delivery', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Link defects and insurance quality signals to delivery work items.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Run continuous insurance suites inside Jenkins pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger policy and claims regression on every pull request and release.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed quality gates into Azure boards and release pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Alert teams instantly when policy or claims suites fail.', 'testro' ),
						),
					),
				),

				/* 13. FAQ ---------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Insurance FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'insurance',
				),

				/* 14. Final CTA ---------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-insurance',
					'title'      => __( 'Deliver Secure, Reliable Insurance Software with AI-Powered Quality Engineering', 'testro' ),
					'intro'      => __( 'Accelerate digital insurance innovation with theTestRo\'s AI-powered Insurance Testing Platform. Automate policy administration, claims processing, customer portals, and enterprise workflows while ensuring secure, compliant, and reliable software delivery through intelligent test automation.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		'microsoft-dynamics-365-test-automation' => array(
			'slug'  => 'microsoft-dynamics-365-test-automation',
			'title' => __( 'Microsoft Dynamics 365 Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Microsoft Dynamics 365 Testing | Dynamics 365 Test Automation | ERP QA | theTestRo', 'testro' ),
				'description' => __( 'AI-powered Microsoft Dynamics 365 Test Automation for Finance, Supply Chain, Sales, Customer Service, Commerce, and HR. Automate Dynamics 365 regression testing and ERP quality engineering with theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'Microsoft Dynamics 365 Testing', 'testro' ),
				'title'    => __( 'Microsoft Dynamics 365 Test Automation Platform', 'testro' ),
				'subtitle' => __( 'Accelerate Microsoft Dynamics 365 releases with theTestRo\'s AI-powered Test Automation Platform. Automate testing across Finance, Supply Chain, Sales, Customer Service, Commerce, and Human Resources using no-code automation, self-healing technology, intelligent analytics, and continuous quality engineering. Reduce manual testing, improve release confidence, and ensure business-critical workflows work flawlessly after every Microsoft update.', 'testro' ),
				'badges'   => array(
					__( 'No-Code Automation', 'testro' ),
					__( 'Self-Healing Tests', 'testro' ),
					__( 'ERP Workflow Coverage', 'testro' ),
					__( 'Azure DevOps Ready', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster Dynamics releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '70%',
						'label' => __( 'Less regression effort', 'testro' ),
						'icon'  => 'refresh',
					),
					array(
						'value' => '98%',
						'label' => __( 'Workflow pass confidence', 'testro' ),
						'icon'  => 'badge-check',
					),
				),
			),

			'sections' => array(

				/* 1. Accelerate Dynamics 365 testing ----------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'accelerate-dynamics-365-testing',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Accelerate Dynamics 365 Testing Across Every Release', 'testro' ),
					'title'   => __( 'AI-Powered Quality for Mission-Critical ERP Workflows', 'testro' ),
					'intro'   => __( 'Enterprise Dynamics teams use theTestRo to cut regression effort, protect business-critical processes, and ship every Microsoft update with greater confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Reduce Regression Testing Effort', 'testro' ),
							'description' => __( 'Automate repetitive regression testing to significantly reduce manual validation effort after every Dynamics 365 update.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Validate Business-Critical Workflows', 'testro' ),
							'description' => __( 'Ensure mission-critical ERP processes continue working across every release.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Support Continuous Microsoft Release Updates', 'testro' ),
							'description' => __( 'Adapt quickly to Microsoft\'s frequent product updates through AI-powered automated testing.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Improve Enterprise Release Quality', 'testro' ),
							'description' => __( 'Deliver reliable Dynamics 365 implementations with greater confidence and fewer production issues.', 'testro' ),
						),
					),
				),

				/* 2. End-to-end Dynamics automation (grouped bento) --------- */
				array(
					'type'    => 'bento',
					'id'      => 'end-to-end-dynamics-365-automation',
					'variant' => 'spotlight',
					'eyebrow' => __( 'End-to-End Dynamics 365 Test Automation', 'testro' ),
					'title'   => __( 'One Intelligent Platform Across Every Dynamics Module', 'testro' ),
					'intro'   => __( 'Automate applications, business processes, enterprise testing capabilities, and efficient execution from a single AI-powered quality platform.', 'testro' ),
					'groups'  => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Support for Microsoft Dynamics 365 Applications', 'testro' ),
							'description' => __( 'Validate every major Dynamics 365 module from a single unified testing platform.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'coins',
									'title' => __( 'Dynamics 365 Finance', 'testro' ),
								),
								array(
									'icon'  => 'package',
									'title' => __( 'Dynamics 365 Supply Chain Management', 'testro' ),
								),
								array(
									'icon'  => 'trending-up',
									'title' => __( 'Dynamics 365 Sales', 'testro' ),
								),
								array(
									'icon'  => 'message-text',
									'title' => __( 'Dynamics 365 Customer Service', 'testro' ),
								),
								array(
									'icon'  => 'retail',
									'title' => __( 'Dynamics 365 Commerce', 'testro' ),
								),
								array(
									'icon'  => 'user-check',
									'title' => __( 'Dynamics 365 Human Resources', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Automate Critical Business Processes', 'testro' ),
							'description' => __( 'Ensure complete business workflow validation across enterprise operations.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'rocket',
									'title' => __( 'Order-to-Cash', 'testro' ),
								),
								array(
									'icon'  => 'package',
									'title' => __( 'Procure-to-Pay', 'testro' ),
								),
								array(
									'icon'  => 'file-text',
									'title' => __( 'Record-to-Report', 'testro' ),
								),
								array(
									'icon'  => 'database',
									'title' => __( 'Inventory Management', 'testro' ),
								),
								array(
									'icon'  => 'message-text',
									'title' => __( 'Customer Service Operations', 'testro' ),
								),
								array(
									'icon'  => 'coins',
									'title' => __( 'Financial Workflows', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Enterprise Testing Capabilities', 'testro' ),
							'description' => __( 'Comprehensively validate enterprise applications through intelligent automation.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'refresh',
									'title' => __( 'Regression Testing', 'testro' ),
								),
								array(
									'icon'  => 'badge-check',
									'title' => __( 'Functional Testing', 'testro' ),
								),
								array(
									'icon'  => 'layers-api',
									'title' => __( 'API Testing', 'testro' ),
								),
								array(
									'icon'  => 'infinity',
									'title' => __( 'End-to-End Business Process Testing', 'testro' ),
								),
								array(
									'icon'  => 'browsers',
									'title' => __( 'Cross-Browser Testing', 'testro' ),
								),
								array(
									'icon'  => 'user-check',
									'title' => __( 'Role-Based User Validation', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Execute & Maintain Tests Efficiently', 'testro' ),
							'description' => __( 'Reduce maintenance while improving execution efficiency.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'pen-square',
									'title' => __( 'No-Code Test Creation', 'testro' ),
								),
								array(
									'icon'  => 'heart-pulse',
									'title' => __( 'Self-Healing Tests', 'testro' ),
								),
								array(
									'icon'  => 'zap',
									'title' => __( 'Parallel Test Execution', 'testro' ),
								),
								array(
									'icon'  => 'clock',
									'title' => __( 'Scheduled Test Runs', 'testro' ),
								),
								array(
									'icon'  => 'puzzle',
									'title' => __( 'Reusable Test Components', 'testro' ),
								),
								array(
									'icon'  => 'chart-bar',
									'title' => __( 'Execution Reports & Analytics', 'testro' ),
								),
							),
						),
					),
				),

				/* 3. Everything you can validate --------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'everything-you-can-validate-dynamics',
					'eyebrow' => __( 'Everything You Can Validate', 'testro' ),
					'title'   => __( 'One AI Platform Across Your Dynamics 365 Implementation', 'testro' ),
					'intro'   => __( 'Validate every layer of your Microsoft Dynamics 365 implementation—from business workflows and customizations to integrations, security, reporting, and enterprise data—using one intelligent AI-powered testing platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Dynamics Quality Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Business Processes', 'testro' ),
							'description' => __( 'Validate order-to-cash, procure-to-pay, and end-to-end ERP journeys.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Forms & User Interfaces', 'testro' ),
							'description' => __( 'Exercise Dynamics forms, grids, and role-based UI experiences.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Custom Workflows', 'testro' ),
							'description' => __( 'Cover customizations and tailored business process extensions.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Security Roles & Permissions', 'testro' ),
							'description' => __( 'Confirm access controls and role-based permissions stay correct.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Power Platform Integrations', 'testro' ),
							'description' => __( 'Validate Power Apps, Power Automate, and related extensions.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Third-Party Integrations', 'testro' ),
							'description' => __( 'Exercise connectors and enterprise system integrations reliably.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Reports & Dashboards', 'testro' ),
							'description' => __( 'Verify operational reports, analytics, and KPI surfaces.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Data Validation', 'testro' ),
							'description' => __( 'Confirm data integrity across modules, ledgers, and entities.', 'testro' ),
						),
					),
				),

				/* 4. Enterprise DevOps integration (pipeline) -------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'dynamics-enterprise-devops',
					'eyebrow' => __( 'Enterprise DevOps Integration', 'testro' ),
					'title'   => __( 'Developer → Azure DevOps → AI Test Automation → Quality Validation → Release', 'testro' ),
					'intro'   => __( 'Integrate Microsoft Dynamics 365 testing seamlessly into your DevOps workflow to automate validation after every deployment, customization, or Microsoft platform update. Accelerate enterprise releases while maintaining continuous software quality.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'code',
							'stage'       => __( 'Developer', 'testro' ),
							'title'       => __( 'Customization & Delivery', 'testro' ),
							'description' => __( 'Ship Dynamics customizations and configuration changes into the pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'stage'       => __( 'Azure DevOps', 'testro' ),
							'title'       => __( 'CI/CD Orchestration', 'testro' ),
							'description' => __( 'Trigger automated Dynamics validation from Azure DevOps pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'AI Test Automation', 'testro' ),
							'title'       => __( 'Intelligent ERP Suites', 'testro' ),
							'description' => __( 'Execute no-code, self-healing Dynamics suites at enterprise scale.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'stage'       => __( 'Quality Validation', 'testro' ),
							'title'       => __( 'Release Readiness Checks', 'testro' ),
							'description' => __( 'Confirm workflow health, coverage, and risk signals before go-live.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Confident Dynamics Deployments', 'testro' ),
							'description' => __( 'Promote Microsoft Dynamics 365 updates with measurable quality confidence.', 'testro' ),
						),
					),
				),

				/* 5. Connected integrations -------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'dynamics-integrations',
					'eyebrow' => __( 'Connected Delivery Ecosystem', 'testro' ),
					'title'   => __( 'Plug Dynamics Quality into Your Enterprise Toolchain', 'testro' ),
					'intro'   => __( 'Connect theTestRo with the tools Dynamics delivery teams already use—so every deployment, customization, and Microsoft update stays under continuous validation.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Connected Delivery', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed Dynamics quality gates into boards and release pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger ERP regression on every pull request and release.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Run continuous Dynamics suites inside Jenkins pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Link defects and Dynamics quality signals to delivery work items.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'CI/CD Pipelines', 'testro' ),
							'description' => __( 'Automate validation after every deployment and platform update.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Alert teams instantly when Dynamics suites fail or heal.', 'testro' ),
						),
					),
				),

				/* 6. Benefits / outcomes ----------------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'dynamics-team-benefits',
					'variant' => 'tint',
					'eyebrow' => __( 'Benefits for Dynamics 365 Teams', 'testro' ),
					'title'   => __( 'Measurable Impact on ERP Release Quality', 'testro' ),
					'intro'   => __( 'Dynamics delivery, QA, and IT teams use theTestRo to ship faster, expand automation coverage, and lower the cost of keeping ERP suites green.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate Release Cycles', 'testro' ),
							'description' => __( 'Deliver Dynamics 365 updates faster through AI-powered automation.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Reduce Testing Costs', 'testro' ),
							'description' => __( 'Lower manual testing effort and ongoing maintenance costs.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Increase Test Coverage', 'testro' ),
							'description' => __( 'Validate more business scenarios across every Dynamics module.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Minimize Business Risk', 'testro' ),
							'description' => __( 'Detect issues before they impact business operations.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Improve Release Confidence', 'testro' ),
							'description' => __( 'Deploy every Dynamics 365 update with greater certainty and reliability.', 'testro' ),
						),
					),
				),

				/* 7. Trust logos ------------------------------------------- */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Enterprise Dynamics Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Organizations rely on theTestRo to protect Microsoft Dynamics 365 quality and accelerate ERP releases.', 'testro' ),
				),

				/* 8. Customer success -------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Enterprise Teams Shipping Reliable Dynamics Releases', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo to accelerate Microsoft Dynamics 365 releases, improve ERP software quality, reduce regression testing effort, increase automation coverage, and deliver reliable enterprise business processes.', 'testro' ),
				),

				/* 9. FAQ --------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Dynamics 365 FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'microsoft-dynamics-365-test-automation',
				),

				/* 10. Final CTA -------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-microsoft-dynamics-365',
					'title'      => __( 'Automate Microsoft Dynamics 365 Testing with AI-Powered Quality Engineering', 'testro' ),
					'intro'      => __( 'Transform Microsoft Dynamics 365 quality assurance with theTestRo\'s AI-powered Test Automation Platform. Automate enterprise workflows, validate every business process, reduce maintenance through self-healing automation, and accelerate ERP releases with confidence using intelligent end-to-end testing.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		'salesforce-test-automation' => array(
			'slug'  => 'salesforce-test-automation',
			'title' => __( 'Salesforce Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Salesforce Testing | AI Salesforce Test Automation | CRM QA | theTestRo', 'testro' ),
				'description' => __( 'AI-powered Salesforce Test Automation for Sales Cloud, Service Cloud, Experience Cloud, Marketing Cloud, and Commerce Cloud. Automate Salesforce CRM testing, Lightning validation, and regression with theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'Salesforce Test Automation', 'testro' ),
				'title'    => __( 'AI Salesforce Test Automation Tool', 'testro' ),
				'subtitle' => __( 'Accelerate Salesforce releases with theTestRo\'s AI-powered Salesforce Test Automation Platform. Automate testing across Sales Cloud, Service Cloud, Experience Cloud, Marketing Cloud, and Commerce Cloud using no-code automation, self-healing technology, intelligent analytics, and continuous quality engineering. Validate every CRM workflow with confidence while reducing manual testing effort and accelerating enterprise releases.', 'testro' ),
				'badges'   => array(
					__( 'No-Code Automation', 'testro' ),
					__( 'Self-Healing Tests', 'testro' ),
					__( 'Lightning Coverage', 'testro' ),
					__( 'CI/CD Ready', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster Salesforce releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '70%',
						'label' => __( 'Less regression effort', 'testro' ),
						'icon'  => 'refresh',
					),
					array(
						'value' => '98%',
						'label' => __( 'CRM workflow confidence', 'testro' ),
						'icon'  => 'badge-check',
					),
				),
			),

			'sections' => array(

				/* 1. Simplify Salesforce testing --------------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'simplify-salesforce-testing',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Simplify Salesforce Testing Across Every Release', 'testro' ),
					'title'   => __( 'AI-Powered Quality for Mission-Critical CRM Workflows', 'testro' ),
					'intro'   => __( 'Enterprise Salesforce teams use theTestRo to accelerate CRM validation, remove testing bottlenecks, protect business continuity, and ship every Salesforce release with greater confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Accelerate CRM Validation', 'testro' ),
							'description' => __( 'Automate validation of Salesforce CRM functionality after every deployment to reduce testing time and improve release speed.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Reduce Testing Bottlenecks', 'testro' ),
							'description' => __( 'Eliminate repetitive manual testing using AI-powered automation and reusable test assets.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Ensure Business Continuity', 'testro' ),
							'description' => __( 'Validate mission-critical CRM processes to ensure uninterrupted business operations.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Improve Release Confidence', 'testro' ),
							'description' => __( 'Deploy Salesforce updates with greater confidence through continuous automated testing and AI-powered quality insights.', 'testro' ),
						),
					),
				),

				/* 2. Salesforce Clouds bento ------------------------------- */
				array(
					'type'    => 'bento',
					'id'      => 'test-every-salesforce-business-process',
					'variant' => 'spotlight',
					'eyebrow' => __( 'Test Every Salesforce Business Process', 'testro' ),
					'title'   => __( 'Complete Coverage Across Salesforce Clouds', 'testro' ),
					'intro'   => __( 'Validate Sales Cloud, Service Cloud, Experience Cloud, Marketing Cloud, and Commerce Cloud from one intelligent AI-powered Salesforce testing platform.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Sales Cloud', 'testro' ),
							'description' => __( 'Validate lead management, opportunities, forecasting, and sales workflows.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Service Cloud', 'testro' ),
							'description' => __( 'Ensure customer support, case management, and service operations work flawlessly.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Experience Cloud', 'testro' ),
							'description' => __( 'Test customer, partner, and community portals across devices and browsers.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Marketing Cloud', 'testro' ),
							'description' => __( 'Validate customer journeys, campaigns, email automation, and engagement workflows.', 'testro' ),
						),
						array(
							'icon'        => 'retail',
							'title'       => __( 'Commerce Cloud', 'testro' ),
							'description' => __( 'Ensure seamless digital commerce experiences, shopping journeys, and order processing.', 'testro' ),
						),
					),
				),

				/* 3. End-to-end CRM workflows ------------------------------ */
				array(
					'type'      => 'lifecycle',
					'id'        => 'validate-end-to-end-salesforce-workflows',
					'eyebrow'   => __( 'Validate End-to-End Salesforce Workflows', 'testro' ),
					'title'     => __( 'Automate the Complete CRM Business Journey', 'testro' ),
					'intro'     => __( 'From lead qualification through support and reporting, cover every revenue-critical Salesforce process—so CRM operations stay reliable after every release.', 'testro' ),
					'loop_note' => __( 'Every CRM stage feeds the next — continuous Salesforce quality compounds with each release.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Lead-to-Opportunity', 'testro' ),
							'description' => __( 'Validate lead qualification, opportunity creation, and pipeline management.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Quote-to-Cash', 'testro' ),
							'description' => __( 'Automate complete sales lifecycle validation from quotation to payment.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Case Management', 'testro' ),
							'description' => __( 'Ensure support tickets and customer service workflows operate correctly.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Approval Processes', 'testro' ),
							'description' => __( 'Validate approval chains, notifications, and workflow automation.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Reports & Dashboards', 'testro' ),
							'description' => __( 'Verify CRM reports, dashboards, KPIs, and business insights.', 'testro' ),
						),
					),
				),

				/* 4. Enterprise capabilities ------------------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'enterprise-salesforce-test-automation',
					'variant' => 'tint',
					'columns' => 3,
					'eyebrow' => __( 'Enterprise Test Automation Capabilities', 'testro' ),
					'title'   => __( 'Built for Scalable Salesforce QA Automation', 'testro' ),
					'intro'   => __( 'Create, heal, schedule, and scale Salesforce regression testing with no-code authoring, parallel execution, API coverage, and cross-browser validation.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'No-Code Test Creation', 'testro' ),
							'description' => __( 'Create Salesforce automation without writing code.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Tests', 'testro' ),
							'description' => __( 'Automatically recover from UI changes and Salesforce updates.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Validate CRM experiences across Chrome, Edge, Firefox, Safari, and more.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Validation', 'testro' ),
							'description' => __( 'Verify Salesforce APIs, integrations, and connected services.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Parallel Test Execution', 'testro' ),
							'description' => __( 'Run multiple Salesforce tests simultaneously for faster validation.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Test Scheduling', 'testro' ),
							'description' => __( 'Schedule automated test execution for every release cycle.', 'testro' ),
						),
					),
				),

				/* 5. Everything you can validate --------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'everything-you-can-validate-salesforce',
					'eyebrow' => __( 'Everything You Can Validate', 'testro' ),
					'title'   => __( 'One AI Platform Across Your Salesforce Implementation', 'testro' ),
					'intro'   => __( 'Validate every aspect of your Salesforce implementation—from Lightning components and Apex logic to business rules, security permissions, integrations, and enterprise data—using one intelligent AI-powered testing platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Salesforce Quality Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'User Interface', 'testro' ),
							'description' => __( 'Exercise Lightning pages, forms, and role-based CRM experiences.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Business Rules', 'testro' ),
							'description' => __( 'Validate flows, validation rules, and process automation logic.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Custom Objects', 'testro' ),
							'description' => __( 'Cover custom objects, fields, and tailored Salesforce data models.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Apex Integrations', 'testro' ),
							'description' => __( 'Verify Apex-driven logic and connected service integrations.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Lightning Components', 'testro' ),
							'description' => __( 'Test Lightning Experience components across key user journeys.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Third-Party Integrations', 'testro' ),
							'description' => __( 'Exercise connectors and enterprise system integrations reliably.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Data Validation', 'testro' ),
							'description' => __( 'Confirm CRM data integrity across objects, records, and sync paths.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Role-Based Access', 'testro' ),
							'description' => __( 'Confirm profiles, permission sets, and security controls stay correct.', 'testro' ),
						),
					),
				),

				/* 6. DevOps pipeline --------------------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'salesforce-enterprise-devops',
					'eyebrow' => __( 'Integrate with Your DevOps Pipeline', 'testro' ),
					'title'   => __( 'Developer → GitHub → CI/CD → AI Salesforce Testing → Quality Validation → Release', 'testro' ),
					'intro'   => __( 'Integrate Salesforce testing seamlessly into your DevOps pipeline to automate validation after every deployment, customization, or release. Accelerate CRM delivery while maintaining continuous quality and enterprise reliability.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'code',
							'stage'       => __( 'Developer', 'testro' ),
							'title'       => __( 'Customization & Delivery', 'testro' ),
							'description' => __( 'Ship Salesforce customizations and configuration changes into the pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'GitHub', 'testro' ),
							'title'       => __( 'Source Control Triggers', 'testro' ),
							'description' => __( 'Kick off CRM validation from pull requests and release branches.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'stage'       => __( 'CI/CD', 'testro' ),
							'title'       => __( 'Pipeline Orchestration', 'testro' ),
							'description' => __( 'Automate Salesforce QA gates after every deployment or update.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'AI Salesforce Testing', 'testro' ),
							'title'       => __( 'Intelligent CRM Suites', 'testro' ),
							'description' => __( 'Execute no-code, self-healing Salesforce suites at enterprise scale.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'stage'       => __( 'Quality Validation', 'testro' ),
							'title'       => __( 'Release Readiness Checks', 'testro' ),
							'description' => __( 'Confirm workflow health, coverage, and risk signals before go-live.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Confident Salesforce Deployments', 'testro' ),
							'description' => __( 'Promote Salesforce updates with measurable CRM quality confidence.', 'testro' ),
						),
					),
				),

				/* 7. Connected integrations -------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'salesforce-integrations',
					'eyebrow' => __( 'Connected Delivery Ecosystem', 'testro' ),
					'title'   => __( 'Plug Salesforce Quality into Your Enterprise Toolchain', 'testro' ),
					'intro'   => __( 'Connect theTestRo with the tools Salesforce delivery teams already use—so every deployment, customization, and platform update stays under continuous validation.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Connected Delivery', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Link defects and Salesforce quality signals to delivery work items.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Run continuous Salesforce suites inside Jenkins pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger CRM regression on every pull request and release.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed Salesforce quality gates into boards and release pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Alert teams instantly when Salesforce suites fail or heal.', 'testro' ),
						),
					),
				),

				/* 8. Trust logos ------------------------------------------- */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Enterprise Salesforce Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Organizations rely on theTestRo to protect Salesforce CRM quality and accelerate every release.', 'testro' ),
				),

				/* 9. Customer success -------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Enterprise Teams Shipping Reliable Salesforce Releases', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo to accelerate Salesforce releases, improve CRM software quality, reduce regression testing effort, increase automation coverage, and deliver reliable customer experiences.', 'testro' ),
				),

				/* 10. FAQ -------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Salesforce Testing FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'salesforce-test-automation',
				),

				/* 11. Final CTA -------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-salesforce',
					'title'      => __( 'Automate Salesforce Testing with AI-Powered Quality Engineering', 'testro' ),
					'intro'      => __( 'Transform Salesforce quality assurance with theTestRo\'s AI-powered Salesforce Test Automation Platform. Automate CRM workflows, validate every business process, reduce maintenance through self-healing automation, and accelerate Salesforce releases with confidence using intelligent end-to-end testing.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		'oracle-testing' => array(
			'slug'  => 'oracle-testing',
			'title' => __( 'Oracle Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Oracle Testing | Oracle Test Automation | Cloud ERP QA | theTestRo', 'testro' ),
				'description' => __( 'AI-powered Oracle Test Automation for Oracle Cloud Fusion, EBS, ERP, HCM, SCM, CRM, and Oracle Database. Automate Oracle regression testing and accelerate every quarterly release with theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'Oracle Test Automation', 'testro' ),
				'title'    => __( 'Oracle Test Automation Platform', 'testro' ),
				'subtitle' => __( 'Accelerate Oracle releases with theTestRo\'s AI-powered Oracle Test Automation Platform. Automate testing across Oracle Cloud Fusion, Oracle E-Business Suite (EBS), Oracle ERP, HCM, SCM, CRM, and Oracle Database using no-code automation, self-healing technology, intelligent analytics, and continuous quality engineering. Reduce regression testing effort, validate enterprise workflows, and confidently deploy every Oracle quarterly update.', 'testro' ),
				'badges'   => array(
					__( 'No-Code Automation', 'testro' ),
					__( 'Self-Healing Tests', 'testro' ),
					__( 'Oracle Cloud & EBS', 'testro' ),
					__( 'CI/CD Ready', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster Oracle releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '70%',
						'label' => __( 'Less regression effort', 'testro' ),
						'icon'  => 'refresh',
					),
					array(
						'value' => '98%',
						'label' => __( 'Workflow pass confidence', 'testro' ),
						'icon'  => 'badge-check',
					),
				),
			),

			'sections' => array(

				/* 1. Keep pace with every Oracle update -------------------- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'oracle-testing-keeps-pace',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Oracle Testing That Keeps Pace with Every Update', 'testro' ),
					'title'   => __( 'AI-Powered Quality for Mission-Critical Oracle Workflows', 'testro' ),
					'intro'   => __( 'Enterprise Oracle teams use theTestRo to automate Cloud and EBS validation, shrink regression cycles, protect business processes, and ship every quarterly release with greater confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Automate Oracle Cloud & Oracle EBS Testing', 'testro' ),
							'description' => __( 'Automatically validate Oracle Cloud and Oracle EBS applications across every release cycle.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Reduce Regression Testing Time', 'testro' ),
							'description' => __( 'Execute enterprise regression suites significantly faster through AI-powered automation and parallel execution.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Ensure Business Process Stability', 'testro' ),
							'description' => __( 'Validate mission-critical Oracle workflows before every production deployment.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Minimize Test Maintenance Across Quarterly Releases', 'testro' ),
							'description' => __( 'Leverage self-healing automation to automatically adapt to Oracle\'s frequent product updates with minimal maintenance.', 'testro' ),
						),
					),
				),

				/* 2. Complete Oracle suite (grouped bento) ----------------- */
				array(
					'type'    => 'bento',
					'id'      => 'complete-oracle-test-automation-suite',
					'variant' => 'spotlight',
					'eyebrow' => __( 'Complete Oracle Test Automation Suite', 'testro' ),
					'title'   => __( 'One Intelligent Platform Across Every Oracle Application', 'testro' ),
					'intro'   => __( 'Automate Oracle applications, release validation, DevOps integration, database coverage, and execution insights from a single AI-powered quality platform.', 'testro' ),
					'groups'  => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Comprehensive Oracle Application Coverage', 'testro' ),
							'description' => __( 'Validate every major Oracle enterprise application from a unified AI-powered testing platform.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'cloud',
									'title' => __( 'Oracle Cloud Fusion', 'testro' ),
								),
								array(
									'icon'  => 'server',
									'title' => __( 'Oracle EBS', 'testro' ),
								),
								array(
									'icon'  => 'coins',
									'title' => __( 'Oracle ERP', 'testro' ),
								),
								array(
									'icon'  => 'user-check',
									'title' => __( 'Oracle HCM', 'testro' ),
								),
								array(
									'icon'  => 'package',
									'title' => __( 'Oracle SCM', 'testro' ),
								),
								array(
									'icon'  => 'message-text',
									'title' => __( 'Oracle CRM', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Validate Every Oracle Release', 'testro' ),
							'description' => __( 'Ensure every Oracle deployment is production-ready.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'calendar-sync',
									'title' => __( 'Quarterly Update Testing', 'testro' ),
								),
								array(
									'icon'  => 'refresh',
									'title' => __( 'Regression Testing', 'testro' ),
								),
								array(
									'icon'  => 'git-branch',
									'title' => __( 'Sandbox-to-Production Validation', 'testro' ),
								),
								array(
									'icon'  => 'shield-check',
									'title' => __( 'Patch Verification', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Integrate Testing into Your Release Pipeline', 'testro' ),
							'description' => __( 'Embed Oracle testing into your DevOps workflow.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'infinity',
									'title' => __( 'CI/CD Integration', 'testro' ),
								),
								array(
									'icon'  => 'server',
									'title' => __( 'Jenkins', 'testro' ),
								),
								array(
									'icon'  => 'git-branch',
									'title' => __( 'GitHub Actions', 'testro' ),
								),
								array(
									'icon'  => 'cloud',
									'title' => __( 'Azure DevOps', 'testro' ),
								),
								array(
									'icon'  => 'plug',
									'title' => __( 'Jira', 'testro' ),
								),
								array(
									'icon'  => 'message-text',
									'title' => __( 'Slack Notifications', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Database & Enterprise Integration Validation', 'testro' ),
							'description' => __( 'Validate complete Oracle ecosystems.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'database',
									'title' => __( 'Oracle Database Testing', 'testro' ),
								),
								array(
									'icon'  => 'layers-api',
									'title' => __( 'REST & SOAP API Testing', 'testro' ),
								),
								array(
									'icon'  => 'infinity',
									'title' => __( 'Business Workflow Validation', 'testro' ),
								),
								array(
									'icon'  => 'badge-check',
									'title' => __( 'Data Integrity Verification', 'testro' ),
								),
								array(
									'icon'  => 'plug',
									'title' => __( 'Third-Party Integration Testing', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Test Maintenance & Execution Insights', 'testro' ),
							'description' => __( 'Reduce maintenance while improving execution quality.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'heart-pulse',
									'title' => __( 'Self-Healing Tests', 'testro' ),
								),
								array(
									'icon'  => 'microscope',
									'title' => __( 'Root Cause Analysis', 'testro' ),
								),
								array(
									'icon'  => 'file-text',
									'title' => __( 'Real-Time Test Reports', 'testro' ),
								),
								array(
									'icon'  => 'chart-bar',
									'title' => __( 'Execution Dashboards', 'testro' ),
								),
								array(
									'icon'  => 'activity',
									'title' => __( 'Flaky Test Detection', 'testro' ),
								),
							),
						),
					),
				),

				/* 3. Getting started workflow ------------------------------ */
				array(
					'type'      => 'lifecycle',
					'id'        => 'getting-started-oracle-testing',
					'eyebrow'   => __( 'Getting Started with Oracle Testing', 'testro' ),
					'title'     => __( 'From Connection to Confident Deployment', 'testro' ),
					'intro'     => __( 'Connect your Oracle environments, author AI-powered scenarios, run enterprise regression, validate results across sandboxes, and deploy every quarterly update with measurable quality confidence.', 'testro' ),
					'loop_note' => __( 'Every Oracle release feeds the next — continuous quality compounds with each quarterly update.', 'testro' ),
					'items'     => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Connect Your Oracle Environment', 'testro' ),
							'description' => __( 'Securely connect Oracle Cloud, Oracle EBS, and enterprise environments.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Create Oracle Test Scenarios', 'testro' ),
							'description' => __( 'Use AI-powered no-code automation to build reusable Oracle test cases.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Execute Regression Suites', 'testro' ),
							'description' => __( 'Run enterprise-scale Oracle regression testing across multiple environments.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Validate Results', 'testro' ),
							'description' => __( 'Review execution evidence, quality signals, and release readiness before go-live.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Deploy', 'testro' ),
							'description' => __( 'Validate development, QA, staging, sandbox, and production environments from one centralized platform—then ship with confidence.', 'testro' ),
						),
					),
				),

				/* 4. Enterprise Oracle capabilities ------------------------ */
				array(
					'type'    => 'feature-grid',
					'id'      => 'enterprise-oracle-testing-capabilities',
					'variant' => 'tint',
					'columns' => 3,
					'eyebrow' => __( 'Enterprise Oracle Testing Capabilities', 'testro' ),
					'title'   => __( 'Built for Scalable Oracle Quality Engineering', 'testro' ),
					'intro'   => __( 'Create, heal, orchestrate, and prove Oracle quality with natural language authoring, multi-module coverage, release analytics, and secure enterprise connectivity.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'Natural Language Test Creation', 'testro' ),
							'description' => __( 'Build Oracle automation using simple natural language instead of code.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Oracle Workflow Automation', 'testro' ),
							'description' => __( 'Automate complete Oracle ERP business processes across multiple modules.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'End-to-End Oracle ERP Validation', 'testro' ),
							'description' => __( 'Validate complete enterprise workflows spanning Oracle applications and integrations.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Multi-Module Testing', 'testro' ),
							'description' => __( 'Execute testing across Finance, HCM, SCM, CRM, and custom Oracle modules simultaneously.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Release Readiness Insights', 'testro' ),
							'description' => __( 'Measure deployment confidence through AI-powered quality analytics.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Rich Execution Evidence', 'testro' ),
							'description' => __( 'Capture detailed logs, screenshots, reports, and execution evidence for every Oracle test.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Secure Environment Connectivity', 'testro' ),
							'description' => __( 'Securely connect enterprise Oracle environments while maintaining governance and compliance.', 'testro' ),
						),
					),
				),

				/* 5. Trust logos ------------------------------------------- */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Enterprise Oracle Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Organizations rely on theTestRo to protect Oracle Cloud and Oracle ERP quality and accelerate every quarterly release.', 'testro' ),
				),

				/* 6. Customer success -------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Enterprise Teams Shipping Reliable Oracle Releases', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo to accelerate Oracle Cloud releases, improve Oracle ERP quality, reduce regression testing effort, increase enterprise automation coverage, and deliver reliable Oracle business workflows.', 'testro' ),
				),

				/* 7. FAQ --------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Oracle Testing FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'oracle-testing',
				),

				/* 8. Final CTA --------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-oracle-testing',
					'title'      => __( 'Automate Oracle Testing with AI-Powered Enterprise Quality Engineering', 'testro' ),
					'intro'      => __( 'Transform Oracle quality assurance with theTestRo\'s AI-powered Oracle Test Automation Platform. Automate Oracle Cloud, Oracle ERP, Oracle EBS, HCM, SCM, CRM, and Database testing while reducing maintenance through self-healing automation, accelerating enterprise releases, and delivering reliable business workflows with confidence.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		'sap-testing' => array(
			'slug'  => 'sap-testing',
			'title' => __( 'SAP Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'SAP Testing | SAP Test Automation | S/4HANA & Fiori QA | theTestRo', 'testro' ),
				'description' => __( 'AI-powered SAP Test Automation for SAP S/4HANA, SAP ECC, SAP Fiori, SuccessFactors, Ariba, and SAP CRM. Automate SAP regression testing and accelerate every enterprise release with theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'SAP Test Automation', 'testro' ),
				'title'    => __( 'SAP Test Automation and Test Management Platform', 'testro' ),
				'subtitle' => __( 'Accelerate SAP releases with theTestRo\'s AI-powered SAP Test Automation and Test Management Platform. Automate testing across SAP S/4HANA, SAP ECC, SAP Fiori, SuccessFactors, Ariba, and SAP CRM using no-code automation, self-healing technology, intelligent analytics, and continuous quality engineering. Reduce regression testing effort, validate mission-critical business processes, and confidently deliver every SAP release.', 'testro' ),
				'badges'   => array(
					__( 'No-Code Automation', 'testro' ),
					__( 'Self-Healing Tests', 'testro' ),
					__( 'S/4HANA & Fiori', 'testro' ),
					__( 'Cloud & On-Premise', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster SAP releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '70%',
						'label' => __( 'Less regression effort', 'testro' ),
						'icon'  => 'refresh',
					),
					array(
						'value' => '98%',
						'label' => __( 'Workflow pass confidence', 'testro' ),
						'icon'  => 'badge-check',
					),
				),
			),

			'sections' => array(

				/* 1. Simplify SAP testing across every enterprise release -- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'simplify-sap-testing',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Simplify SAP Testing Across Every Enterprise Release', 'testro' ),
					'title'   => __( 'AI-Powered Quality for Mission-Critical SAP Workflows', 'testro' ),
					'intro'   => __( 'Enterprise SAP teams use theTestRo to cut regression effort, protect business-critical processes, adapt to upgrades automatically, and ship every SAP release with greater confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Accelerate SAP Regression Testing', 'testro' ),
							'description' => __( 'Reduce manual regression effort through AI-powered automation and reusable test assets.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Validate Mission-Critical Business Processes', 'testro' ),
							'description' => __( 'Ensure every critical SAP workflow functions correctly before deployment.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Reduce Testing Effort During SAP Updates', 'testro' ),
							'description' => __( 'Automatically adapt to SAP upgrades, patches, and feature releases with self-healing automation.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Improve Enterprise Release Confidence', 'testro' ),
							'description' => __( 'Deliver high-quality SAP releases with intelligent validation and continuous testing.', 'testro' ),
						),
					),
				),

				/* 2. End-to-end SAP test automation (grouped bento) -------- */
				array(
					'type'    => 'bento',
					'id'      => 'end-to-end-sap-test-automation',
					'variant' => 'spotlight',
					'eyebrow' => __( 'End-to-End SAP Test Automation', 'testro' ),
					'title'   => __( 'One Intelligent Platform Across Every SAP Capability', 'testro' ),
					'intro'   => __( 'Automate SAP business workflows, generate tests faster, execute at enterprise scale, and maintain stable automation from a single AI-powered quality platform.', 'testro' ),
					'groups'  => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Automate SAP Business Workflows', 'testro' ),
							'description' => __( 'Validate complete business operations across SAP modules.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'coins',
									'title' => __( 'Finance & Accounting', 'testro' ),
								),
								array(
									'icon'  => 'package',
									'title' => __( 'Procurement', 'testro' ),
								),
								array(
									'icon'  => 'git-branch',
									'title' => __( 'Supply Chain', 'testro' ),
								),
								array(
									'icon'  => 'trending-up',
									'title' => __( 'Sales & Distribution', 'testro' ),
								),
								array(
									'icon'  => 'user-check',
									'title' => __( 'Human Resources', 'testro' ),
								),
								array(
									'icon'  => 'database',
									'title' => __( 'Inventory Management', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Generate SAP Tests Faster', 'testro' ),
							'description' => __( 'Build automation quickly using AI-powered capabilities.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'file-text',
									'title' => __( 'Create Tests from Business Requirements', 'testro' ),
								),
								array(
									'icon'  => 'message-text',
									'title' => __( 'Natural Language Test Creation', 'testro' ),
								),
								array(
									'icon'  => 'activity',
									'title' => __( 'Record & Playback', 'testro' ),
								),
								array(
									'icon'  => 'puzzle',
									'title' => __( 'Reusable Test Components', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Execute SAP Tests Reliably', 'testro' ),
							'description' => __( 'Run enterprise-scale SAP automation with confidence.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'zap',
									'title' => __( 'Parallel Test Execution', 'testro' ),
								),
								array(
									'icon'  => 'clock',
									'title' => __( 'Scheduled Test Runs', 'testro' ),
								),
								array(
									'icon'  => 'browsers',
									'title' => __( 'Cross-Browser Testing', 'testro' ),
								),
								array(
									'icon'  => 'layout-grid',
									'title' => __( 'SAP Fiori Validation', 'testro' ),
								),
								array(
									'icon'  => 'cloud',
									'title' => __( 'Cloud & On-Premise Execution', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Maintain Stable SAP Automation', 'testro' ),
							'description' => __( 'Reduce maintenance while improving execution quality.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'heart-pulse',
									'title' => __( 'Self-Healing Tests', 'testro' ),
								),
								array(
									'icon'  => 'refresh',
									'title' => __( 'Automatic UI Adaptation', 'testro' ),
								),
								array(
									'icon'  => 'database',
									'title' => __( 'Dynamic Test Data Management', 'testro' ),
								),
								array(
									'icon'  => 'chart-bar',
									'title' => __( 'Execution Insights & Reports', 'testro' ),
								),
							),
						),
					),
				),

				/* 3. Supported SAP applications ---------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'supported-sap-applications',
					'eyebrow' => __( 'Supported SAP Applications', 'testro' ),
					'title'   => __( 'Validate Every Major SAP Application from One Platform', 'testro' ),
					'intro'   => __( 'Validate every major SAP application from a single AI-powered automation platform. Whether you\'re modernizing SAP S/4HANA, maintaining SAP ECC, or extending SAP Fiori applications, theTestRo enables comprehensive end-to-end quality assurance.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'SAP Quality Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'cloud',
							'title'       => __( 'SAP S/4HANA', 'testro' ),
							'description' => __( 'Automate S/4HANA testing across modules, upgrades, and critical business releases.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'SAP ECC', 'testro' ),
							'description' => __( 'Maintain stable ECC regression coverage while you modernize and migrate.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'SAP Fiori', 'testro' ),
							'description' => __( 'Validate Fiori apps, role-based journeys, and responsive enterprise UX.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'SAP SuccessFactors', 'testro' ),
							'description' => __( 'Cover HCM workflows from hire-to-retire across SuccessFactors processes.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'SAP Ariba', 'testro' ),
							'description' => __( 'Exercise procurement, sourcing, and supplier collaboration journeys.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'SAP CRM', 'testro' ),
							'description' => __( 'Validate customer-facing CRM workflows and cross-system integrations.', 'testro' ),
						),
					),
				),

				/* 4. Everything you can validate --------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'everything-you-can-validate-sap',
					'eyebrow' => __( 'Everything You Can Validate', 'testro' ),
					'title'   => __( 'Complete Confidence Across Your SAP Ecosystem', 'testro' ),
					'intro'   => __( 'Validate every layer of your SAP landscape—from business process workflows and user interfaces to integrations, access controls, and end-to-end scenarios—using one intelligent AI-powered testing platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'SAP Validation Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Business Process Workflows', 'testro' ),
							'description' => __( 'Validate order-to-cash, procure-to-pay, and mission-critical SAP journeys.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'SAP User Interfaces', 'testro' ),
							'description' => __( 'Exercise SAP GUI, Fiori, and role-based enterprise UI experiences.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Cross-Module Transactions', 'testro' ),
							'description' => __( 'Cover multi-module SAP transactions that span finance, logistics, and HR.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Role-Based Access', 'testro' ),
							'description' => __( 'Confirm authorizations, roles, and security controls stay correct.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Third-Party Integrations', 'testro' ),
							'description' => __( 'Exercise connectors and enterprise system integrations reliably.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Database Validation', 'testro' ),
							'description' => __( 'Confirm data integrity across SAP tables, ledgers, and entities.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Integrations', 'testro' ),
							'description' => __( 'Verify SAP APIs, OData services, and connected interfaces.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'End-to-End Business Scenarios', 'testro' ),
							'description' => __( 'Prove complete business scenarios before every SAP release.', 'testro' ),
						),
					),
				),

				/* 5. Secure enterprise deployment -------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'secure-sap-enterprise-deployment',
					'eyebrow' => __( 'Secure Enterprise Deployment', 'testro' ),
					'title'   => __( 'Deploy Securely Across Cloud, On-Premise, and Hybrid', 'testro' ),
					'intro'   => __( 'Deploy theTestRo securely within enterprise environments while maintaining compliance, governance, and scalability across private cloud, on-premise, and hybrid SAP landscapes.', 'testro' ),
					'hub'     => array(
						'icon'  => 'shield-lock',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Secure Deployment', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Private Cloud Deployment', 'testro' ),
							'description' => __( 'Run SAP quality engineering in governed private cloud environments.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'On-Premise Deployment', 'testro' ),
							'description' => __( 'Keep automation inside your data center for controlled SAP estates.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Hybrid Environment', 'testro' ),
							'description' => __( 'Bridge cloud and on-premise SAP systems with unified test execution.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Secure Test Data Management', 'testro' ),
							'description' => __( 'Protect sensitive SAP data while enabling realistic test coverage.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Enterprise Security Controls', 'testro' ),
							'description' => __( 'Apply governance, access controls, and compliance-ready safeguards.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Custom Workflow Integrations', 'testro' ),
							'description' => __( 'Connect SAP testing into your enterprise delivery and ITSM workflows.', 'testro' ),
						),
					),
				),

				/* 6. Benefits for SAP teams -------------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'sap-team-benefits',
					'variant' => 'tint',
					'eyebrow' => __( 'Benefits for SAP Teams', 'testro' ),
					'title'   => __( 'Measurable Impact on Enterprise SAP Release Quality', 'testro' ),
					'intro'   => __( 'SAP delivery, QA, and IT teams use theTestRo to reduce maintenance, accelerate validation, expand coverage, and collaborate from one centralized testing platform.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Reduced Test Maintenance', 'testro' ),
							'description' => __( 'Leverage self-healing automation to minimize ongoing maintenance.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Release Validation', 'testro' ),
							'description' => __( 'Accelerate enterprise release cycles through AI-powered automation.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Higher Test Coverage', 'testro' ),
							'description' => __( 'Increase validation across every SAP module and business process.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Reliable Regression Testing', 'testro' ),
							'description' => __( 'Ensure existing functionality remains stable after every update.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Improved Team Collaboration', 'testro' ),
							'description' => __( 'Enable business users, QA teams, and developers to collaborate from one centralized testing platform.', 'testro' ),
						),
					),
				),

				/* 7. Trust logos ------------------------------------------- */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Enterprise SAP Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Organizations rely on theTestRo to protect SAP quality and accelerate every enterprise release across cloud and on-premise environments.', 'testro' ),
				),

				/* 8. Customer success -------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Enterprise Teams Shipping Reliable SAP Releases', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo to accelerate SAP releases, improve SAP quality, reduce regression testing effort, increase enterprise automation coverage, and deliver reliable business workflows.', 'testro' ),
				),

				/* 9. FAQ --------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'SAP Testing FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'sap-testing',
				),

				/* 10. Final CTA -------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-sap-testing',
					'title'      => __( 'Automate SAP Testing with AI-Powered Enterprise Quality Engineering', 'testro' ),
					'intro'      => __( 'Transform SAP quality assurance with theTestRo\'s AI-powered SAP Test Automation and Test Management Platform. Automate regression testing, validate mission-critical business workflows, reduce maintenance through self-healing automation, and accelerate enterprise SAP releases with confidence across cloud and on-premise environments.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),
		'workday-testing' => array(
			'slug'  => 'workday-testing',
			'title' => __( 'Workday Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Workday Testing | Workday Test Automation | HCM & Payroll QA | theTestRo', 'testro' ),
				'description' => __( 'AI-powered Workday Test Automation for Workday HCM, Financial Management, Payroll, Recruiting, Learning, and Time Tracking. Automate Workday regression testing and accelerate every release with theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'Workday Test Automation', 'testro' ),
				'title'    => __( 'Automate Workday Testing with theTestRo', 'testro' ),
				'subtitle' => __( 'Accelerate Workday releases with theTestRo\'s AI-powered Workday Test Automation Platform. Automate testing across Workday HCM, Financial Management, Payroll, Recruiting, Learning, and Time Tracking using no-code automation, self-healing technology, intelligent analytics, and continuous quality engineering. Reduce regression testing effort, validate mission-critical HR and Finance workflows, and confidently deliver every Workday update.', 'testro' ),
				'badges'   => array(
					__( 'No-Code Automation', 'testro' ),
					__( 'Self-Healing Tests', 'testro' ),
					__( 'HCM & Finance', 'testro' ),
					__( 'CI/CD Ready', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster Workday releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '70%',
						'label' => __( 'Less regression effort', 'testro' ),
						'icon'  => 'refresh',
					),
					array(
						'value' => '98%',
						'label' => __( 'Workflow pass confidence', 'testro' ),
						'icon'  => 'badge-check',
					),
				),
			),

			'sections' => array(

				/* 1. Accelerate Workday testing across every release ------ */
				array(
					'type'    => 'feature-grid',
					'id'      => 'accelerate-workday-testing',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Accelerate Workday Testing Across Every Release', 'testro' ),
					'title'   => __( 'AI-Powered Quality for Mission-Critical HR & Finance Workflows', 'testro' ),
					'intro'   => __( 'Enterprise Workday teams use theTestRo to cut regression effort, protect HR and Finance processes, reduce update risk, and ship every Workday release with greater confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Reduce Regression Testing Time', 'testro' ),
							'description' => __( 'Automate repetitive regression testing and significantly reduce manual validation effort after every Workday update.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Validate HR & Finance Business Processes', 'testro' ),
							'description' => __( 'Ensure mission-critical HR, Payroll, and Financial workflows continue to perform flawlessly across every release.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Minimize Risk During Workday Updates', 'testro' ),
							'description' => __( 'Leverage AI-powered automation to identify issues early and reduce deployment risks.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Deliver Faster Enterprise Releases', 'testro' ),
							'description' => __( 'Accelerate Workday deployments with continuous automated testing and AI-driven quality insights.', 'testro' ),
						),
					),
				),

				/* 2. End-to-end Workday test automation (grouped bento) --- */
				array(
					'type'    => 'bento',
					'id'      => 'end-to-end-workday-test-automation',
					'variant' => 'spotlight',
					'eyebrow' => __( 'End-to-End Workday Test Automation', 'testro' ),
					'title'   => __( 'One Intelligent Platform Across Every Workday Capability', 'testro' ),
					'intro'   => __( 'Validate Workday applications, automate critical business processes, expand enterprise testing coverage, and execute suites efficiently from a single AI-powered quality platform.', 'testro' ),
					'groups'  => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Support for Workday Applications', 'testro' ),
							'description' => __( 'Validate every major Workday application from one centralized AI-powered testing platform.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'user-check',
									'title' => __( 'Workday HCM', 'testro' ),
								),
								array(
									'icon'  => 'chart-bar',
									'title' => __( 'Workday Financial Management', 'testro' ),
								),
								array(
									'icon'  => 'coins',
									'title' => __( 'Workday Payroll', 'testro' ),
								),
								array(
									'icon'  => 'badge-check',
									'title' => __( 'Workday Recruiting', 'testro' ),
								),
								array(
									'icon'  => 'file-text',
									'title' => __( 'Workday Learning', 'testro' ),
								),
								array(
									'icon'  => 'clock',
									'title' => __( 'Workday Time Tracking', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Automate Critical Workday Business Processes', 'testro' ),
							'description' => __( 'Ensure every enterprise workflow functions correctly across departments.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'user-check',
									'title' => __( 'Hire-to-Retire', 'testro' ),
								),
								array(
									'icon'  => 'coins',
									'title' => __( 'Payroll Processing', 'testro' ),
								),
								array(
									'icon'  => 'calendar-sync',
									'title' => __( 'Leave & Time Management', 'testro' ),
								),
								array(
									'icon'  => 'package',
									'title' => __( 'Expense Management', 'testro' ),
								),
								array(
									'icon'  => 'git-branch',
									'title' => __( 'Procure-to-Pay', 'testro' ),
								),
								array(
									'icon'  => 'pie-chart',
									'title' => __( 'Financial Close & Reporting', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Enterprise Testing Capabilities', 'testro' ),
							'description' => __( 'Comprehensively validate enterprise applications through intelligent automation.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'refresh',
									'title' => __( 'Regression Testing', 'testro' ),
								),
								array(
									'icon'  => 'puzzle',
									'title' => __( 'Functional Testing', 'testro' ),
								),
								array(
									'icon'  => 'layers-api',
									'title' => __( 'API Testing', 'testro' ),
								),
								array(
									'icon'  => 'infinity',
									'title' => __( 'End-to-End Workflow Testing', 'testro' ),
								),
								array(
									'icon'  => 'browsers',
									'title' => __( 'Cross-Browser Testing', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Execute & Maintain Tests Efficiently', 'testro' ),
							'description' => __( 'Reduce maintenance while improving execution efficiency.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'zap',
									'title' => __( 'Parallel Test Execution', 'testro' ),
								),
								array(
									'icon'  => 'clock',
									'title' => __( 'Scheduled Test Runs', 'testro' ),
								),
								array(
									'icon'  => 'heart-pulse',
									'title' => __( 'Self-Healing Tests', 'testro' ),
								),
								array(
									'icon'  => 'database',
									'title' => __( 'Dynamic Test Data Management', 'testro' ),
								),
								array(
									'icon'  => 'activity',
									'title' => __( 'Real-Time Execution Reports', 'testro' ),
								),
							),
						),
					),
				),

				/* 3. Everything you can validate -------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'everything-you-can-validate-workday',
					'eyebrow' => __( 'Everything You Can Validate', 'testro' ),
					'title'   => __( 'Complete Confidence Across Your Workday Ecosystem', 'testro' ),
					'intro'   => __( 'Validate every aspect of your Workday implementation—from employee lifecycle management and payroll processing to financial operations, integrations, business rules, reporting, and enterprise data—using one intelligent AI-powered testing platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Workday Validation Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Employee Lifecycle Workflows', 'testro' ),
							'description' => __( 'Validate hire-to-retire journeys across HCM, Learning, and Time Tracking.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'HR & Payroll Transactions', 'testro' ),
							'description' => __( 'Exercise payroll cycles, compensation, and HR transaction accuracy.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Financial Processes', 'testro' ),
							'description' => __( 'Cover expense, procure-to-pay, and financial close workflows.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Role-Based Security', 'testro' ),
							'description' => __( 'Confirm roles, permissions, and security groups stay correct.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Business Rules', 'testro' ),
							'description' => __( 'Verify business process definitions and conditional rule logic.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Workday Integrations', 'testro' ),
							'description' => __( 'Exercise inbound and outbound integrations across the enterprise.', 'testro' ),
						),
						array(
							'icon'        => 'pie-chart',
							'title'       => __( 'Reports & Dashboards', 'testro' ),
							'description' => __( 'Validate Workday reports, analytics, and executive dashboards.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Data Validation', 'testro' ),
							'description' => __( 'Confirm worker, org, and financial data integrity after every update.', 'testro' ),
						),
					),
				),

				/* 4. Enterprise-ready integrations (DevOps pipeline) ------ */
				array(
					'type'    => 'pipeline',
					'id'      => 'workday-enterprise-devops',
					'eyebrow' => __( 'Enterprise-Ready Integrations', 'testro' ),
					'title'   => __( 'Developer → GitHub → CI/CD → AI Workday Testing → Quality Validation → Release', 'testro' ),
					'intro'   => __( 'Integrate Workday testing seamlessly into your DevOps pipeline to automate validation after every deployment, configuration change, or Workday release. Accelerate enterprise software delivery while maintaining continuous quality and compliance.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'code',
							'stage'       => __( 'Developer', 'testro' ),
							'title'       => __( 'Configuration & Delivery', 'testro' ),
							'description' => __( 'Ship Workday configurations and tenant changes into the pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'GitHub', 'testro' ),
							'title'       => __( 'Source Control Triggers', 'testro' ),
							'description' => __( 'Kick off Workday validation from pull requests and release branches.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'stage'       => __( 'CI/CD Pipeline', 'testro' ),
							'title'       => __( 'Pipeline Orchestration', 'testro' ),
							'description' => __( 'Automate Workday QA gates after every deployment or update.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'AI Workday Testing', 'testro' ),
							'title'       => __( 'Intelligent HR & Finance Suites', 'testro' ),
							'description' => __( 'Execute no-code, self-healing Workday suites at enterprise scale.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'stage'       => __( 'Quality Validation', 'testro' ),
							'title'       => __( 'Release Readiness Checks', 'testro' ),
							'description' => __( 'Confirm workflow health, coverage, and risk signals before go-live.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Confident Workday Deployments', 'testro' ),
							'description' => __( 'Promote Workday updates with measurable enterprise quality confidence.', 'testro' ),
						),
					),
				),

				/* 5. Connected integrations ------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'workday-integrations',
					'eyebrow' => __( 'Connected Delivery Ecosystem', 'testro' ),
					'title'   => __( 'Plug Workday Quality into Your Enterprise Toolchain', 'testro' ),
					'intro'   => __( 'Connect theTestRo with the tools Workday delivery teams already use—so every configuration change, tenant update, and release stays under continuous validation.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Connected Delivery', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Link defects and Workday quality signals to delivery work items.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Run continuous Workday suites inside Jenkins pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger Workday regression on every pull request and release.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed Workday quality gates into boards and release pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Alert teams instantly when Workday suites fail or heal.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'CI/CD Pipelines', 'testro' ),
							'description' => __( 'Wire Workday Test Automation into any enterprise CI/CD toolchain.', 'testro' ),
						),
					),
				),

				/* 6. Benefits for Workday teams --------------------------- */
				array(
					'type'    => 'outcomes',
					'id'      => 'workday-team-benefits',
					'variant' => 'tint',
					'eyebrow' => __( 'Benefits for Workday Teams', 'testro' ),
					'title'   => __( 'Measurable Impact on Enterprise Workday Release Quality', 'testro' ),
					'intro'   => __( 'Workday delivery, HRIS, Finance, and QA teams use theTestRo to accelerate validation, cut manual effort, expand coverage, improve release quality, and lower ongoing maintenance.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Release Validation', 'testro' ),
							'description' => __( 'Reduce release cycles with AI-powered automated validation.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Reduced Manual Testing', 'testro' ),
							'description' => __( 'Eliminate repetitive manual testing through intelligent automation.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Higher Test Coverage', 'testro' ),
							'description' => __( 'Validate more Workday business scenarios across every module.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Improved Release Quality', 'testro' ),
							'description' => __( 'Deliver reliable HR and Finance applications with greater confidence.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Lower Maintenance Effort', 'testro' ),
							'description' => __( 'Minimize ongoing maintenance through self-healing automation and reusable test assets.', 'testro' ),
						),
					),
				),

				/* 7. Trust logos ------------------------------------------ */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Enterprise Workday Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Organizations rely on theTestRo to protect Workday quality and accelerate every HCM, Payroll, and Finance release.', 'testro' ),
				),

				/* 8. Customer success ------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Enterprise Teams Shipping Reliable Workday Releases', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo to accelerate Workday releases, improve HR & Finance application quality, reduce regression testing effort, increase enterprise automation coverage, and deliver reliable employee and financial workflows.', 'testro' ),
				),

				/* 9. FAQ -------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'Workday Testing FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'workday-testing',
				),

				/* 10. Final CTA ------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-workday-testing',
					'title'      => __( 'Automate Workday Testing with AI-Powered Enterprise Quality Engineering', 'testro' ),
					'intro'      => __( 'Transform Workday quality assurance with theTestRo\'s AI-powered Workday Test Automation Platform. Automate HR, Payroll, Finance, Recruiting, and enterprise workflows while reducing maintenance through self-healing automation, accelerating releases, and delivering reliable business processes with confidence.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),

		'servicenow-testing' => array(
			'slug'  => 'servicenow-testing',
			'title' => __( 'ServiceNow Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'ServiceNow Testing | AI ServiceNow Test Automation | ITSM QA | theTestRo', 'testro' ),
				'description' => __( 'AI-powered ServiceNow Test Automation for ITSM, ITOM, CSM, HRSD, ITAM, and GRC. Automate ServiceNow regression testing, workflow validation, and enterprise QA with theTestRo.', 'testro' ),
			),

			'hero' => array(
				'eyebrow'  => __( 'ServiceNow Test Automation', 'testro' ),
				'title'    => __( 'ServiceNow Test Automation Platform', 'testro' ),
				'subtitle' => __( 'Accelerate ServiceNow releases with theTestRo\'s AI-powered ServiceNow Test Automation Platform. Automate testing across IT Service Management (ITSM), IT Operations Management (ITOM), Customer Service Management (CSM), HR Service Delivery (HRSD), IT Asset Management (ITAM), and Governance, Risk & Compliance (GRC). Leverage no-code automation, self-healing technology, intelligent analytics, and continuous quality engineering to reduce regression testing effort, validate mission-critical workflows, and confidently deliver every ServiceNow update.', 'testro' ),
				'badges'   => array(
					__( 'No-Code Automation', 'testro' ),
					__( 'Self-Healing Tests', 'testro' ),
					__( 'ITSM & ITOM', 'testro' ),
					__( 'CI/CD Ready', 'testro' ),
				),
				'actions'  => testro_product_default_actions(),
				'metrics'  => array(
					array(
						'value' => '3×',
						'label' => __( 'Faster ServiceNow releases', 'testro' ),
						'icon'  => 'rocket',
					),
					array(
						'value' => '70%',
						'label' => __( 'Less regression effort', 'testro' ),
						'icon'  => 'refresh',
					),
					array(
						'value' => '98%',
						'label' => __( 'Workflow pass confidence', 'testro' ),
						'icon'  => 'badge-check',
					),
				),
			),

			'sections' => array(

				/* 1. Streamline ServiceNow testing for every release ----- */
				array(
					'type'    => 'feature-grid',
					'id'      => 'streamline-servicenow-testing',
					'variant' => 'spotlight',
					'columns' => 4,
					'eyebrow' => __( 'Streamline ServiceNow Testing for Every Release', 'testro' ),
					'title'   => __( 'AI-Powered Quality for Mission-Critical ServiceNow Workflows', 'testro' ),
					'intro'   => __( 'Enterprise ServiceNow teams use theTestRo to accelerate release validation, eliminate manual regression bottlenecks, protect platform stability, and deliver reliable IT and business services with confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Accelerate ServiceNow Release Validation', 'testro' ),
							'description' => __( 'Automate release validation to ensure every ServiceNow deployment is production-ready.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Reduce Manual Regression Testing', 'testro' ),
							'description' => __( 'Eliminate repetitive manual testing through AI-powered automation and reusable test assets.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Ensure Platform Stability Across Updates', 'testro' ),
							'description' => __( 'Confidently validate platform changes, upgrades, and customizations with intelligent automated testing.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Improve Enterprise Service Delivery', 'testro' ),
							'description' => __( 'Deliver reliable IT and business services through continuous quality validation and enterprise automation.', 'testro' ),
						),
					),
				),

				/* 2. End-to-end ServiceNow test automation (grouped bento) */
				array(
					'type'    => 'bento',
					'id'      => 'end-to-end-servicenow-test-automation',
					'variant' => 'spotlight',
					'eyebrow' => __( 'End-to-End ServiceNow Test Automation', 'testro' ),
					'title'   => __( 'One Intelligent Platform Across Every ServiceNow Capability', 'testro' ),
					'intro'   => __( 'Validate every major ServiceNow application, automate critical enterprise workflows, run comprehensive testing capabilities, and maintain stable automation from a single AI-powered quality platform.', 'testro' ),
					'groups'  => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Support for ServiceNow Applications', 'testro' ),
							'description' => __( 'Validate every major ServiceNow application from one centralized AI-powered testing platform.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'wrench',
									'title' => __( 'IT Service Management (ITSM)', 'testro' ),
								),
								array(
									'icon'  => 'server',
									'title' => __( 'IT Operations Management (ITOM)', 'testro' ),
								),
								array(
									'icon'  => 'message-text',
									'title' => __( 'Customer Service Management (CSM)', 'testro' ),
								),
								array(
									'icon'  => 'user-check',
									'title' => __( 'HR Service Delivery (HRSD)', 'testro' ),
								),
								array(
									'icon'  => 'package',
									'title' => __( 'IT Asset Management (ITAM)', 'testro' ),
								),
								array(
									'icon'  => 'shield-lock',
									'title' => __( 'Governance, Risk & Compliance (GRC)', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Automate Critical ServiceNow Workflows', 'testro' ),
							'description' => __( 'Ensure every enterprise workflow functions correctly.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'alert-octagon',
									'title' => __( 'Incident Management', 'testro' ),
								),
								array(
									'icon'  => 'refresh',
									'title' => __( 'Change Management', 'testro' ),
								),
								array(
									'icon'  => 'microscope',
									'title' => __( 'Problem Management', 'testro' ),
								),
								array(
									'icon'  => 'retail',
									'title' => __( 'Service Catalog Requests', 'testro' ),
								),
								array(
									'icon'  => 'file-text',
									'title' => __( 'Knowledge Management', 'testro' ),
								),
								array(
									'icon'  => 'badge-check',
									'title' => __( 'Approval Workflows', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Enterprise Testing Capabilities', 'testro' ),
							'description' => __( 'Comprehensively validate ServiceNow applications through intelligent automation.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'refresh',
									'title' => __( 'Regression Testing', 'testro' ),
								),
								array(
									'icon'  => 'check',
									'title' => __( 'Functional Testing', 'testro' ),
								),
								array(
									'icon'  => 'layers-api',
									'title' => __( 'API Testing', 'testro' ),
								),
								array(
									'icon'  => 'infinity',
									'title' => __( 'End-to-End Workflow Testing', 'testro' ),
								),
								array(
									'icon'  => 'browsers',
									'title' => __( 'Cross-Browser Testing', 'testro' ),
								),
								array(
									'icon'  => 'user-check',
									'title' => __( 'Role-Based User Validation', 'testro' ),
								),
							),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Execute & Maintain Tests Efficiently', 'testro' ),
							'description' => __( 'Reduce maintenance while improving execution quality.', 'testro' ),
							'items'       => array(
								array(
									'icon'  => 'pen-square',
									'title' => __( 'No-Code Test Creation', 'testro' ),
								),
								array(
									'icon'  => 'heart-pulse',
									'title' => __( 'Self-Healing Tests', 'testro' ),
								),
								array(
									'icon'  => 'zap',
									'title' => __( 'Parallel Test Execution', 'testro' ),
								),
								array(
									'icon'  => 'clock',
									'title' => __( 'Scheduled Test Runs', 'testro' ),
								),
								array(
									'icon'  => 'database',
									'title' => __( 'Dynamic Test Data Management', 'testro' ),
								),
								array(
									'icon'  => 'chart-bar',
									'title' => __( 'Execution Reports & Analytics', 'testro' ),
								),
							),
						),
					),
				),

				/* 3. Everything you can validate ------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'everything-you-can-validate-servicenow',
					'eyebrow' => __( 'Everything You Can Validate', 'testro' ),
					'title'   => __( 'One AI Platform Across Your ServiceNow Implementation', 'testro' ),
					'intro'   => __( 'Validate every aspect of your ServiceNow implementation—from forms, workflows, Flow Designer automations, business rules, and catalog items to dashboards, integrations, notifications, and custom applications—using one intelligent AI-powered testing platform.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'ServiceNow Quality Hub', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Forms & UI Policies', 'testro' ),
							'description' => __( 'Exercise ServiceNow forms, fields, and UI policy behavior across roles.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Business Rules', 'testro' ),
							'description' => __( 'Validate business rules, scripts, and server-side automation logic.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Workflows & Flow Designer', 'testro' ),
							'description' => __( 'Cover Flow Designer automations and classic workflow paths end to end.', 'testro' ),
						),
						array(
							'icon'        => 'retail',
							'title'       => __( 'Catalog Items', 'testro' ),
							'description' => __( 'Test service catalog items, request flows, and fulfillment outcomes.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Notifications', 'testro' ),
							'description' => __( 'Confirm email, SMS, and in-platform notification triggers stay correct.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Integrations', 'testro' ),
							'description' => __( 'Exercise REST, SOAP, and third-party connectors reliably.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Dashboards & Reports', 'testro' ),
							'description' => __( 'Verify dashboards, reports, KPIs, and operational insights.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Custom Applications', 'testro' ),
							'description' => __( 'Validate scoped apps, custom modules, and tailored ServiceNow experiences.', 'testro' ),
						),
					),
				),

				/* 4. DevOps pipeline -------------------------------------- */
				array(
					'type'    => 'pipeline',
					'id'      => 'servicenow-enterprise-devops',
					'eyebrow' => __( 'Deployment & DevOps Integration', 'testro' ),
					'title'   => __( 'Developer → GitHub → CI/CD → AI ServiceNow Testing → Quality Validation → Release', 'testro' ),
					'intro'   => __( 'Integrate ServiceNow testing seamlessly into your DevOps pipeline to automate validation after every deployment, platform update, or customization. Accelerate enterprise service delivery while maintaining continuous quality, governance, and release confidence.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'code',
							'stage'       => __( 'Developer', 'testro' ),
							'title'       => __( 'Customization & Delivery', 'testro' ),
							'description' => __( 'Ship ServiceNow customizations and configuration changes into the pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'GitHub', 'testro' ),
							'title'       => __( 'Source Control Triggers', 'testro' ),
							'description' => __( 'Kick off ServiceNow validation from pull requests and release branches.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'stage'       => __( 'CI/CD Pipeline', 'testro' ),
							'title'       => __( 'Pipeline Orchestration', 'testro' ),
							'description' => __( 'Automate ServiceNow QA gates after every deployment or update.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'AI ServiceNow Testing', 'testro' ),
							'title'       => __( 'Intelligent ITSM Suites', 'testro' ),
							'description' => __( 'Execute no-code, self-healing ServiceNow suites at enterprise scale.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'stage'       => __( 'Quality Validation', 'testro' ),
							'title'       => __( 'Release Readiness Checks', 'testro' ),
							'description' => __( 'Confirm workflow health, coverage, and risk signals before go-live.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Release', 'testro' ),
							'title'       => __( 'Confident ServiceNow Deployments', 'testro' ),
							'description' => __( 'Promote ServiceNow updates with measurable platform quality confidence.', 'testro' ),
						),
					),
				),

				/* 5. Connected integrations ------------------------------- */
				array(
					'type'    => 'architecture',
					'id'      => 'servicenow-integrations',
					'eyebrow' => __( 'Connected Delivery Ecosystem', 'testro' ),
					'title'   => __( 'Plug ServiceNow Quality into Your Enterprise Toolchain', 'testro' ),
					'intro'   => __( 'Connect theTestRo with the tools ServiceNow delivery teams already use—so every deployment, platform update, and customization stays under continuous validation.', 'testro' ),
					'hub'     => array(
						'icon'  => 'sparkles',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'Connected Delivery', 'testro' ),
					),
					'items'   => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'CI/CD Pipelines', 'testro' ),
							'description' => __( 'Wire ServiceNow Test Automation into any enterprise CI/CD toolchain.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Run continuous ServiceNow suites inside Jenkins pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub', 'testro' ),
							'description' => __( 'Trigger ServiceNow regression on every pull request and release.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Embed ServiceNow quality gates into boards and release pipelines.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Link defects and ServiceNow quality signals to delivery work items.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Alert teams instantly when ServiceNow suites fail or heal.', 'testro' ),
						),
					),
				),

				/* 6. Benefits for ServiceNow teams ------------------------ */
				array(
					'type'    => 'outcomes',
					'id'      => 'servicenow-team-benefits',
					'variant' => 'tint',
					'eyebrow' => __( 'Benefits for ServiceNow Teams', 'testro' ),
					'title'   => __( 'Measurable Impact on Enterprise ServiceNow Release Quality', 'testro' ),
					'intro'   => __( 'ServiceNow delivery, ITSM, platform, and QA teams use theTestRo to accelerate releases, cut maintenance, expand coverage, improve service reliability, and lower operational risk.', 'testro' ),
					'items'   => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Release Cycles', 'testro' ),
							'description' => __( 'Accelerate ServiceNow releases with AI-powered automated testing.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Reduced Test Maintenance', 'testro' ),
							'description' => __( 'Leverage self-healing automation to minimize ongoing maintenance.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Higher Test Coverage', 'testro' ),
							'description' => __( 'Validate more ServiceNow workflows across every application and module.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Improved Service Reliability', 'testro' ),
							'description' => __( 'Deliver stable, reliable enterprise services with continuous quality validation.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Lower Operational Risk', 'testro' ),
							'description' => __( 'Identify issues early and reduce production incidents through intelligent automation.', 'testro' ),
						),
					),
				),

				/* 7. Trust logos ------------------------------------------ */
				array(
					'type'    => 'clients',
					'eyebrow' => __( 'Trusted by Enterprise ServiceNow Teams', 'testro' ),
					'title'   => __( 'Chosen by Industry Leaders Worldwide', 'testro' ),
					'intro'   => __( 'Organizations rely on theTestRo to protect ServiceNow quality and accelerate every ITSM, ITOM, and enterprise service release.', 'testro' ),
				),

				/* 8. Customer success ------------------------------------- */
				array(
					'type'    => 'testimonials',
					'eyebrow' => __( 'Customer Success Stories', 'testro' ),
					'title'   => __( 'Enterprise Teams Shipping Reliable ServiceNow Releases', 'testro' ),
					'intro'   => __( 'See how organizations use theTestRo to accelerate ServiceNow releases, improve enterprise service quality, reduce regression testing effort, increase automation coverage, and deliver reliable IT and business workflows.', 'testro' ),
				),

				/* 9. FAQ -------------------------------------------------- */
				array(
					'type'    => 'faq',
					'eyebrow' => __( 'ServiceNow Testing FAQs', 'testro' ),
					'title'   => __( 'Frequently Asked Questions', 'testro' ),
					'faqs'    => 'servicenow-testing',
				),

				/* 10. Final CTA ------------------------------------------- */
				array(
					'type'       => 'cta',
					'id'         => 'get-started-servicenow-testing',
					'title'      => __( 'Automate ServiceNow Testing with AI-Powered Enterprise Quality Engineering', 'testro' ),
					'intro'      => __( 'Transform ServiceNow quality assurance with theTestRo\'s AI-powered ServiceNow Test Automation Platform. Automate IT service workflows, validate mission-critical business processes, reduce maintenance through self-healing automation, and accelerate enterprise releases with confidence using intelligent end-to-end testing.', 'testro' ),
					'actions'    => testro_product_default_actions(),
					'assurances' => array(
						__( '14-day free trial', 'testro' ),
						__( 'No credit card required', 'testro' ),
						__( 'Guided onboarding', 'testro' ),
					),
				),
			),
		),
	);

	/**
	 * Filter the registered product pages.
	 *
	 * @param array $pages Product page definitions keyed by slug.
	 */
	return apply_filters( 'testro_product_pages', $pages );
}

/**
 * Resolve the product page definition for a slug, falling back to the queried page.
 *
 * @param string $slug Optional page slug. Defaults to the current post slug.
 * @return array|null
 */
function testro_get_product_page( $slug = '' ) {
	$pages = testro_get_product_pages();

	if ( '' === $slug ) {
		if ( ! is_page() ) {
			return null;
		}
		$page = get_queried_object();
		$slug = ( $page instanceof WP_Post ) ? $page->post_name : '';
	}

	if ( isset( $pages[ $slug ] ) ) {
		return $pages[ $slug ];
	}

	// Resolve pre-migration slugs so SEO/schema keep working during/after rename.
	if ( function_exists( 'testro_get_slug_migration_map' ) ) {
		$map = testro_get_slug_migration_map();
		if ( isset( $map[ $slug ], $pages[ $map[ $slug ] ] ) ) {
			return $pages[ $map[ $slug ] ];
		}
	}

	return null;
}

/**
 * Whether the current request renders a registered product page.
 *
 * @return bool
 */
function testro_is_product_page() {
	if ( ! is_page() ) {
		return false;
	}

	return null !== testro_get_product_page();
}

/**
 * Context-specific FAQ sets.
 *
 * Falls back to the shared homepage FAQ list for unknown contexts so callers
 * always receive a renderable set.
 *
 * @param string $context FAQ context key.
 * @return array[]
 */
function testro_get_faq_set( $context = '' ) {
	$sets = array(
		'ai-test-automation' => array(
			array(
				'question' => __( 'What is an AI test automation platform?', 'testro' ),
				'answer'   => __( 'An AI testing platform uses AI to build, run, and fix automated tests. theTestRo builds tests from plain English, heals them on its own, and tells you why a test failed.', 'testro' ),
			),
			array(
				'question' => __( 'How is this different from regular test automation?', 'testro' ),
				'answer'   => __( 'Old tools need scripts and manual upkeep. AI-powered test automation writes tests from plain language, fixes itself, and gets smarter with every run.', 'testro' ),
			),
			array(
				'question' => __( 'Do I need to code to use theTestRo?', 'testro' ),
				'answer'   => __( 'No. Build tests in plain English, no code needed. Want to write scripts instead? That works too.', 'testro' ),
			),
			array(
				'question' => __( 'Can it handle enterprise-scale testing?', 'testro' ),
				'answer'   => __( 'Yes. Run thousands of tests in parallel, across every browser and device. Built for large teams from day one.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing work?', 'testro' ),
				'answer'   => __( 'Your app\'s UI changes. AI spots the change and fixes the test right away. No manual work. No broken suites.', 'testro' ),
			),
			array(
				'question' => __( 'Does it connect to CI/CD tools?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo works with Jenkins, GitHub Actions, GitLab CI, and Azure DevOps.', 'testro' ),
			),
		),

		'no-code-test-automation' => array(
			array(
				'question' => __( 'What is the best no-code test automation tool for beginners?', 'testro' ),
				'answer'   => __( 'theTestRo is built for teams with zero coding background. Record your actions, or write steps in plain English, and get a working test in minutes.', 'testro' ),
			),
			array(
				'question' => __( 'Is a codeless tool as strong as code-based testing?', 'testro' ),
				'answer'   => __( 'Yes. This kind of automated testing without coding covers complex flows, background waits, and dynamic pages — the same ground scripted tools cover, without writing any code.', 'testro' ),
			),
			array(
				'question' => __( 'Are tests built this way hard to maintain?', 'testro' ),
				'answer'   => __( 'No. Backup selectors, built-in retries, and smart waits keep tests stable as your app changes over time.', 'testro' ),
			),
			array(
				'question' => __( 'Can non-technical team members use this platform?', 'testro' ),
				'answer'   => __( 'Yes. Manual testers, QA staff, and product managers can all build and run tests with no coding skills required.', 'testro' ),
			),
			array(
				'question' => __( 'Does it work inside a CI/CD pipeline?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo connects with Jenkins, GitHub Actions, CircleCI, GitLab, and Azure DevOps, so tests run right inside your existing pipeline. Every test result flows back into the tools your team already checks, so nobody has to log into a separate dashboard to see what broke.', 'testro' ),
			),
			array(
				'question' => __( 'How fast can I build my first test?', 'testro' ),
				'answer'   => __( 'Most teams build their first test in under five minutes. No setup. No install. Record a real workflow once, and theTestRo turns it into a test you can rerun on every release, on every browser, without touching it again.', 'testro' ),
			),
		),

		'automated-web-application-testing' => array(
			array(
				'question' => __( 'What are the best web testing tools for automated testing?', 'testro' ),
				'answer'   => __( 'The best web testing tools bring AI test creation, self-healing, and cross-browser checks into one place. theTestRo does all three. You won\'t need to stitch separate tools together for each job.', 'testro' ),
			),
			array(
				'question' => __( 'Does web test automation require coding skills?', 'testro' ),
				'answer'   => __( 'No. Write test steps in plain English, or build visually by clicking through your app. No scripting needed.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI web testing handle UI changes?', 'testro' ),
				'answer'   => __( 'Self-healing locators and dynamic element detection let tests adjust automatically when your page layout shifts, instead of failing outright.', 'testro' ),
			),
			array(
				'question' => __( 'Does this cover full web application test automation, not just single pages?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo covers full user journeys and multi-step business workflows, not just isolated page checks, so your test suite reflects how people actually use your app.', 'testro' ),
			),
			array(
				'question' => __( 'Can this web testing software run across multiple browsers at once?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo runs cross-browser web testing in parallel across Chrome, Edge, Firefox, and Safari, cutting full regression time down significantly.', 'testro' ),
			),
			array(
				'question' => __( 'Is theTestRo enterprise web testing software?', 'testro' ),
				'answer'   => __( 'Yes. Role-based access, team collaboration, and cloud execution make it a fit for QA teams of any size, big or small.', 'testro' ),
			),
		),

		'automated-api-testing' => array(
			array(
				'question' => __( 'What makes theTestRo the best API testing tool for teams without deep coding skills?', 'testro' ),
				'answer'   => __( 'theTestRo turns a Postman or Swagger spec into working tests automatically. It also lets you edit any step in plain English. No framework knowledge required to get started.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support REST API testing and SOAP together?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo supports modern REST API testing and older SOAP services, so you do not need two tools.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI API testing help with schema changes?', 'testro' ),
				'answer'   => __( 'When an endpoint schema changes, theTestRo detects it and fixes the affected test automatically. It keeps your test suite from breaking until someone notices.', 'testro' ),
			),
			array(
				'question' => __( 'Is this an enterprise API testing platform, or built for smaller teams too?', 'testro' ),
				'answer'   => __( 'Both. Small teams get started fast with the cloud version. Larger orgs can run in a private or on-premise environment with role-based access and dedicated support.', 'testro' ),
			),
			array(
				'question' => __( 'Can I chain API calls into a full end-to-end test?', 'testro' ),
				'answer'   => __( 'Yes. Call an API to set up state. Validate the response. Then run a UI flow. Confirm it renders correctly. Do it all in one test.', 'testro' ),
			),
			array(
				'question' => __( 'How is theTestRo different from a tool like Postman?', 'testro' ),
				'answer'   => __( 'Postman is a strong standalone API client. theTestRo goes further. It is built for automated API testing at scale. It uses AI to generate tests. It also supports self-healing. You can chain API and UI checks in one test.', 'testro' ),
			),
		),

		'automated-cross-browser-testing-tool' => array(
			array(
				'question' => __( 'What makes theTestRo the best cross-browser testing tool for small teams?', 'testro' ),
				'answer'   => __( 'theTestRo removes the need for a local browser lab. Build a test once. Run it across every major browser. Get results back in minutes. No infrastructure to manage yourself.', 'testro' ),
			),
			array(
				'question' => __( 'How does automated cross-browser testing handle browser-specific rendering differences?', 'testro' ),
				'answer'   => __( 'theTestRo\'s AI finds elements based on how they actually look, not one fixed selector. Chrome and Safari render something differently? The same test adapts to both.', 'testro' ),
			),
			array(
				'question' => __( 'Can I test both desktop and mobile browsers in the same run?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo covers desktop and mobile web together. No need for a separate mobile-only test suite.', 'testro' ),
			),
			array(
				'question' => __( 'Is this cross-browser testing platform suitable for regulated or enterprise environments?', 'testro' ),
				'answer'   => __( 'Yes. Role-based access and broad OS coverage make theTestRo a fit for larger, compliance-focused QA teams. Small teams get the same tools too.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support testing legacy browser versions, not just the latest release?', 'testro' ),
				'answer'   => __( 'Yes. Test current releases and older versions your users may still be on. You\'re not only checking for people who already updated.', 'testro' ),
			),
			array(
				'question' => __( 'How is AI cross-browser testing different from just running Selenium across multiple browsers?', 'testro' ),
				'answer'   => __( 'A Selenium setup needs separate driver code and upkeep for each browser. theTestRo\'s self-healing approach adapts one test across every browser on its own. Far less manual work to keep it running.', 'testro' ),
			),
		),

		'test-management-software' => array(
			array(
				'question' => __( 'What is an AI test management tool?', 'testro' ),
				'answer'   => __( 'An AI test management tool uses AI agents to help plan, write, run, and report tests. It also keeps test cases, test runs, and bugs organized in one central place for the QA team.', 'testro' ),
			),
			array(
				'question' => __( 'How is AI-powered test management different from a regular test management platform?', 'testro' ),
				'answer'   => __( 'A regular platform still needs manual test case writing and execution tracking. AI-powered test management handles the repetitive parts. It drafts tests, runs them, and writes bug reports. A person reviews and approves each step.', 'testro' ),
			),
			array(
				'question' => __( 'Can this test case management software import my existing spreadsheets?', 'testro' ),
				'answer'   => __( 'Yes. Upload your CSV or Excel test cases. theTestRo auto-organizes them with clean IDs. You won\'t start from a blank page.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo\'s test management platform integrate with Jira?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo syncs both ways with Jira. Sprint stories, test cases, and bug statuses update automatically in both tools.', 'testro' ),
			),
			array(
				'question' => __( 'Is AI-generated test coverage actually reliable, or does it need review?', 'testro' ),
				'answer'   => __( 'Every AI-generated test case is fully editable before it runs. Review it, tweak a step, or approve it as-is; you stay in control the whole way through.', 'testro' ),
			),
			array(
				'question' => __( 'How does this compare to managing tests through spreadsheets?', 'testro' ),
				'answer'   => __( 'Spreadsheets have no traceability and no version control. They break down as a team grows. theTestRo\'s test case management tool gives you searchable, versioned tests. Full requirement-to-bug traceability is built in from day one.', 'testro' ),
			),
		),

		'self-healing-test-automation-tool' => array(
			array(
				'question' => __( 'What is a self-healing test automation tool?', 'testro' ),
				'answer'   => __( 'A self-healing test automation tool uses AI to spot and fix broken tests on its own when an app\'s UI changes. No person needs to manually update a locator or script.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI self-healing test automation actually work?', 'testro' ),
				'answer'   => __( 'theTestRo tracks multiple signals for each element, not just one selector. The page changes, and it re-identifies the element using the signals that still match, then updates the test on its own.', 'testro' ),
			),
			array(
				'question' => __( 'Will self-healing testing hide real bugs from my team?', 'testro' ),
				'answer'   => __( 'No. theTestRo only heals cosmetic or structural UI changes, like a moved button or an updated class name. A real functional bug still fails the test and gets flagged for review.', 'testro' ),
			),
			array(
				'question' => __( 'Does automated test maintenance replace the need for a QA engineer?', 'testro' ),
				'answer'   => __( 'No. It removes the repetitive part, fixing broken locators, so your QA team can spend that time on real test coverage and edge cases instead.', 'testro' ),
			),
			array(
				'question' => __( 'Can self-healing test scripts work with modern frameworks like React or Angular?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo handles constant re-rendering and shifting DOM structures in React, Angular, and Vue apps.', 'testro' ),
			),
			array(
				'question' => __( 'Does this intelligent test automation tool work with my existing CI/CD setup?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo connects with Jenkins, GitHub Actions, Azure DevOps, and GitLab CI. Self-healing runs as part of your existing pipeline, not as a separate manual step.', 'testro' ),
			),
		),

		'test-development' => array(
			array(
				'question' => __( 'What is test development?', 'testro' ),
				'answer'   => __( 'Test development is the process of planning, designing, writing, and maintaining tests. It verifies that software behaves as expected, from test case design through execution and reporting.', 'testro' ),
			),
			array(
				'question' => __( 'What is an AI-powered test development platform?', 'testro' ),
				'answer'   => __( 'It\'s a platform that uses AI to generate, structure, and update tests on its own. This cuts the manual work of writing and maintaining test scripts by hand.', 'testro' ),
			),
			array(
				'question' => __( 'Do I need coding skills to use this test development tool?', 'testro' ),
				'answer'   => __( 'No. Write tests in plain English, or record a flow directly. Coding is optional, not required.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI test creation handle app changes over time?', 'testro' ),
				'answer'   => __( 'theTestRo flags coverage gaps and outdated logic as your app evolves. Tests stay aligned with real behavior instead of quietly going stale.', 'testro' ),
			),
			array(
				'question' => __( 'Can I customize a test that AI already generated?', 'testro' ),
				'answer'   => __( 'Yes. Add conditional logic, loops, or custom validations on top of any AI-generated test. Its stability stays intact.', 'testro' ),
			),
			array(
				'question' => __( 'Does automated test development reduce ongoing maintenance work?', 'testro' ),
				'answer'   => __( 'Yes. Reusable components, smart maintenance tips, and self-healing logic reduce manual upkeep. This upkeep often grows as a test suite expands.', 'testro' ),
			),
		),

		'test-lab' => array(
			array(
				'question' => __( 'What is AI-powered Test Execution?', 'testro' ),
				'answer'   => __( 'AI-powered Test Execution uses intelligent orchestration, parallel processing, and machine learning insights to run automated tests faster and more reliably. With theTestRo\'s AI-Powered Test Execution Platform, teams execute large suites across browsers, devices, and environments while monitoring progress and diagnosing failures in real time.', 'testro' ),
			),
			array(
				'question' => __( 'Can I execute tests in parallel?', 'testro' ),
				'answer'   => __( 'Yes. Parallel Test Execution lets you run multiple test suites simultaneously across browsers and environments, dramatically reducing total execution time so teams get faster feedback on every release.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support cloud and local execution?', 'testro' ),
				'answer'   => __( 'Absolutely. Use Cloud Test Execution on scalable infrastructure without managing hardware, or run Local Test Execution securely inside your own environments whenever compliance or network constraints require it.', 'testro' ),
			),
			array(
				'question' => __( 'Can tests run automatically in CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Continuous Test Execution integrates with GitHub, Jenkins, Azure DevOps, and other DevOps tools so suites run automatically after every build, deployment, or release—keeping development and QA synchronized.', 'testro' ),
			),
			array(
				'question' => __( 'Which environments are supported?', 'testro' ),
				'answer'   => __( 'Execute across development, staging, and production environments for web applications, mobile apps, APIs, enterprise platforms, and Cross-Browser Test Execution on Chrome, Firefox, Edge, Safari, and more.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo provide execution logs and videos?', 'testro' ),
				'answer'   => __( 'Yes. Every run can include detailed execution logs plus screenshots and video recording, so teams have complete visual evidence when investigating failures or proving release readiness.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI improve execution reliability?', 'testro' ),
				'answer'   => __( 'AI Monitoring and AI Failure Analysis detect anomalies during runs, highlight flaky patterns, and accelerate root-cause diagnosis—so Automated Test Execution stays reliable as applications and infrastructure change.', 'testro' ),
			),
		),

		'ci-cd-integration' => array(
			array(
				'question' => __( 'What is CI/CD Integration?', 'testro' ),
				'answer'   => __( 'CI/CD Integration connects automated testing to continuous integration and continuous delivery pipelines so quality checks run automatically on every commit, build, and deployment. With theTestRo, continuous testing becomes a native quality gate inside your DevOps workflow.', 'testro' ),
			),
			array(
				'question' => __( 'How does theTestRo integrate with DevOps pipelines?', 'testro' ),
				'answer'   => __( 'theTestRo plugs into Jenkins, GitHub Actions, GitLab CI/CD, Azure DevOps, CircleCI, Bamboo, and related tools so pipeline events trigger AI-powered test execution, report results back to the pipeline, and enforce release readiness before promotion.', 'testro' ),
			),
			array(
				'question' => __( 'Can tests run automatically after every code commit?', 'testro' ),
				'answer'   => __( 'Yes. Commit-based and build-based triggers launch the right suites as soon as code lands or a build completes—so developers get continuous feedback without manual test kicks.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support GitHub Actions and Jenkins?', 'testro' ),
				'answer'   => __( 'Absolutely. GitHub Actions and Jenkins are first-class integrations, alongside GitLab CI/CD, Azure DevOps, CircleCI, and Bamboo, so continuous testing fits the CI/CD platforms your teams already run.', 'testro' ),
			),
			array(
				'question' => __( 'Can quality gates prevent failed deployments?', 'testro' ),
				'answer'   => __( 'Yes. Quality gates apply pass/fail criteria, build validation, and release risk assessment so unstable builds are blocked before deployment while approved builds proceed with confidence.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI improve continuous testing?', 'testro' ),
				'answer'   => __( 'AI improves continuous testing through intelligent test generation, smarter suite selection, faster failure analysis, and self-healing maintenance—keeping pipeline feedback focused, reliable, and scalable as applications change.', 'testro' ),
			),
			array(
				'question' => __( 'Can CI/CD pipelines execute tests in parallel?', 'testro' ),
				'answer'   => __( 'Yes. Parallel test execution fans suites across environments and cloud capacity so CI/CD pipelines return results faster without sacrificing coverage on critical release paths.', 'testro' ),
			),
		),
		'playwright-test-automation' => array(
			array(
				'question' => __( 'What is Playwright Export?', 'testro' ),
				'answer'   => __( 'Playwright Export is theTestRo\'s capability to convert AI-powered visual test workflows into production-ready Playwright TypeScript scripts. Teams build automation in a no-code visual builder, then export clean, structured specs developers can run locally, customize in their IDE, and integrate into CI/CD pipelines—without rewriting every scenario by hand.', 'testro' ),
			),
			array(
				'question' => __( 'Can I export tests directly to Playwright?', 'testro' ),
				'answer'   => __( 'Yes. From any visual workflow you author in theTestRo, you can export Playwright-compatible TypeScript with a single action. Exported specs follow modern Playwright Test conventions—including page navigation, locators, assertions, and test structure—so they drop into existing projects immediately.', 'testro' ),
			),
			array(
				'question' => __( 'Are exported scripts editable?', 'testro' ),
				'answer'   => __( 'Absolutely. Exported Playwright scripts are standard TypeScript files your developers can open, refactor, extend, and version-control like any other code. theTestRo generates the starting point from visual automation; engineering teams retain full freedom to customize locators, add helpers, wire fixtures, and evolve suites over time.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo generate TypeScript Playwright tests?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo exports TypeScript Playwright tests aligned with the official @playwright/test runner. Generated code uses modern Playwright APIs—such as page.goto, getByRole, getByLabel, and expect assertions—so teams get developer-ready scripts rather than proprietary syntax.', 'testro' ),
			),
			array(
				'question' => __( 'Can exported Playwright tests run inside CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Exported Playwright suites integrate with Jenkins, GitHub Actions, GitLab CI/CD, Azure DevOps, and related DevOps tools. Trigger runs on every commit or build, execute in parallel across browsers, and gate releases on Playwright quality signals from theTestRo cloud execution.', 'testro' ),
			),
			array(
				'question' => __( 'Does AI maintain exported Playwright scripts?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo\'s AI self-healing detects broken locators when UIs change, updates element strategies automatically, and keeps Playwright scripts running without manual intervention. Healed locators persist into exported specs so maintenance effort stays low across every release.', 'testro' ),
			),
			array(
				'question' => __( 'Can developers customize exported automation?', 'testro' ),
				'answer'   => __( 'Developers can customize every exported Playwright script—adding page objects, shared utilities, data-driven parameters, and project-specific configuration. theTestRo bridges visual authoring for QA with code-first flexibility for engineering, so both teams contribute to the same automation strategy without tool lock-in.', 'testro' ),
			),
		),

		'reporting-analytics' => array(
			array(
				'question' => __( 'What reports does theTestRo provide?', 'testro' ),
				'answer'   => __( 'theTestRo provides AI-powered test reports and analytics across execution summaries, pass/fail trends, coverage, regression performance, team productivity, and release readiness. Detailed execution reports include step-level results, screenshots, video recordings, logs, and environment information so stakeholders share one quality trail.', 'testro' ),
			),
			array(
				'question' => __( 'Can reports be customized?', 'testro' ),
				'answer'   => __( 'Yes. Create customized reports tailored to business needs, with role-based dashboards for QA, developers, managers, and executives. Export reports in multiple formats and roll up multi-project analytics when you need organization-wide visibility.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo generate real-time dashboards?', 'testro' ),
				'answer'   => __( 'Yes. Live execution dashboards update as suites run, showing progress, failures as they happen, coverage, regression status, and team performance—so teams react during the run rather than after static exports arrive.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI analyze test failures?', 'testro' ),
				'answer'   => __( 'AI automatically classifies failures, surfaces root-cause insights, detects recurring error patterns across executions, identifies failure trends that affect automation health, and recommends next steps so engineers start from a diagnosis instead of a raw stack trace.', 'testro' ),
			),
			array(
				'question' => __( 'Can reports be scheduled automatically?', 'testro' ),
				'answer'   => __( 'Yes. Scheduled reports generate and distribute quality summaries to the right stakeholders on a cadence you define, keeping executives and delivery teams aligned without manual spreadsheet assembly.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support multi-project reporting?', 'testro' ),
				'answer'   => __( 'Yes. Multi-project analytics let you monitor testing performance across products and teams from one platform—ideal for enterprise QA organizations that need both project-level detail and portfolio-level readiness.', 'testro' ),
			),
			array(
				'question' => __( 'Can analytics integrate with DevOps pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate reporting with Jenkins, GitHub Actions, Azure DevOps, Jira, Slack, and CI/CD pipelines so execution signals, failure summaries, and release-readiness scores flow into the tools your delivery teams already use.', 'testro' ),
			),
		),
		'regression-test-automation' => array(
			array(
				'question' => __( 'What is automated regression testing?', 'testro' ),
				'answer'   => __( 'Automated regression testing re-validates existing functionality after every code change so new features do not break what already works. With theTestRo, Regression Test Automation runs continuously across web, mobile, and API layers—giving teams faster feedback and higher release confidence than manual retesting.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI improve regression testing?', 'testro' ),
				'answer'   => __( 'AI improves regression testing by generating comprehensive scenarios, selecting the most relevant suites for each change, diagnosing failures faster, and self-healing broken locators. theTestRo turns Continuous Regression Testing into an intelligent loop—more coverage, less maintenance, and clearer release readiness.', 'testro' ),
			),
			array(
				'question' => __( 'Can regression tests run automatically after every build?', 'testro' ),
				'answer'   => __( 'Yes. Commit-based and build-based triggers launch regression packs as soon as a build completes or a pull request lands—so developers get Continuous Regression Testing feedback without manual kicks.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support parallel regression execution?', 'testro' ),
				'answer'   => __( 'Absolutely. Parallel execution fans regression suites across browsers, environments, and cloud capacity so large packs finish faster without sacrificing coverage on critical release paths.', 'testro' ),
			),
			array(
				'question' => __( 'Can regression suites integrate with CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate regression into Jenkins, GitHub, Azure DevOps, Bamboo, and related DevOps tools so pipeline events trigger AI regression, report results back to the pipeline, and enforce quality gates before promotion.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing reduce regression maintenance?', 'testro' ),
				'answer'   => __( 'When UIs change, AI self-healing detects broken locators, updates element strategies automatically, and keeps regression suites running without hand-editing every script—cutting maintenance effort while protecting long-term suite stability.', 'testro' ),
			),
		),
		'ai-automated-sanity-testing' => array(
			array(
				'question' => __( 'What is automated sanity testing?', 'testro' ),
				'answer'   => __( 'Automated Sanity Testing quickly validates critical application functionality after bug fixes or minor code changes—before investing in full regression. With theTestRo, Sanity Test Automation confirms essential workflows stay healthy so teams get fast release confidence on every build.', 'testro' ),
			),
			array(
				'question' => __( 'How is sanity testing different from regression testing?', 'testro' ),
				'answer'   => __( 'Sanity testing focuses on a targeted critical-path pack after a specific change, while regression testing re-validates broader existing functionality across the suite. AI Sanity Testing from theTestRo clears fast Build Validation Testing gates; Continuous Regression Testing then provides deeper coverage when you need it.', 'testro' ),
			),
			array(
				'question' => __( 'Can sanity tests run automatically after every build?', 'testro' ),
				'answer'   => __( 'Yes. Continuous Sanity Testing with commit-based and build-based triggers launches critical packs as soon as a build completes—so developers get Automated Sanity Testing feedback without manual kicks.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support AI-powered sanity testing?', 'testro' ),
				'answer'   => __( 'Absolutely. theTestRo supports AI Sanity Testing with intelligent scenario prioritization, cloud execution, failure insights, and self-healing maintenance—so Continuous Sanity Testing stays fast, focused, and resilient as applications evolve.', 'testro' ),
			),
			array(
				'question' => __( 'Can sanity testing be integrated into CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate Automated Sanity Testing into Jenkins, GitHub, Azure DevOps, Bamboo, and related DevOps tools so pipeline events trigger Build Validation Testing, report gate results, and enforce release readiness before promotion.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing improve sanity test maintenance?', 'testro' ),
				'answer'   => __( 'When UIs change, AI self-healing detects broken locators, updates element strategies automatically, and keeps Sanity Test Automation running without hand-editing every critical check—cutting maintenance effort while protecting Continuous Sanity Testing reliability.', 'testro' ),
			),
		),
		'automated-functional-testing' => array(
			array(
				'question' => __( 'What is AI-powered Functional Testing?', 'testro' ),
				'answer'   => __( 'AI-powered Functional Testing validates complete business workflows, user journeys, APIs, and application functionality using intelligent automation instead of brittle hand-written scripts. With theTestRo, teams create functional scenarios faster, execute continuously across web, mobile, and APIs, and deliver reliable software with AI-driven quality insights.', 'testro' ),
			),
			array(
				'question' => __( 'How does theTestRo automate functional testing?', 'testro' ),
				'answer'   => __( 'theTestRo automates Functional Testing with AI-assisted authoring, low-code capabilities, reusable assets, cloud execution, parallel runs, and self-healing maintenance—so teams validate end-to-end functional behavior across every release without heavy script ownership.', 'testro' ),
			),
			array(
				'question' => __( 'Can functional tests run automatically after every build?', 'testro' ),
				'answer'   => __( 'Yes. Commit-based and build-based triggers launch functional packs as soon as a build completes or a pull request lands—so developers get continuous Functional Testing feedback without manual kicks.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support web, mobile, and API functional testing?', 'testro' ),
				'answer'   => __( 'Absolutely. Run Functional Test Automation across web applications, mobile apps, APIs, cross-browser environments, and enterprise systems from one centralized AI-powered cloud platform.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing reduce test maintenance?', 'testro' ),
				'answer'   => __( 'When UIs change, AI self-healing detects broken locators, updates element strategies automatically, and keeps Functional Testing suites running without hand-editing every script—cutting maintenance effort while protecting long-term suite stability.', 'testro' ),
			),
			array(
				'question' => __( 'Can functional testing integrate with CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate Functional Testing into Jenkins, GitHub, Azure DevOps, Bamboo, and related DevOps tools so pipeline events trigger AI Functional Testing, report results back to the pipeline, and enforce quality gates before promotion.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support data-driven functional testing?', 'testro' ),
				'answer'   => __( 'Yes. Parameterize functional scenarios with multiple datasets, manage dynamic test data across environments, and reuse centralized data sets to expand business-scenario coverage without duplicating cases.', 'testro' ),
			),
		),
		'end-to-end-testing' => array(
			array(
				'question' => __( 'What is AI-powered End-to-End Testing?', 'testro' ),
				'answer'   => __( 'AI-powered End-to-End Testing validates complete business workflows and user journeys across web applications, mobile apps, APIs, databases, and enterprise systems using intelligent automation instead of brittle hand-written scripts. With theTestRo, teams create E2E scenarios faster, execute continuously in the cloud, and deliver reliable software with AI-driven quality insights.', 'testro' ),
			),
			array(
				'question' => __( 'How does theTestRo automate complete business workflows?', 'testro' ),
				'answer'   => __( 'theTestRo automates End-to-End Testing with AI-assisted authoring, reusable workflow components, cross-system validation, cloud execution, parallel runs, and self-healing maintenance—so teams prove complete business processes across every release without heavy script ownership.', 'testro' ),
			),
			array(
				'question' => __( 'Can end-to-end tests run automatically after every build?', 'testro' ),
				'answer'   => __( 'Yes. Commit-based and build-based triggers launch end-to-end packs as soon as a build completes or a pull request lands—so developers get continuous E2E Test Automation feedback without manual kicks.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support web, mobile, API, and backend validation?', 'testro' ),
				'answer'   => __( 'Absolutely. Run End-to-End Test Automation across web applications, mobile apps, APIs, databases, backend services, cross-browser environments, and enterprise systems from one centralized AI-powered cloud platform.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing reduce maintenance?', 'testro' ),
				'answer'   => __( 'When UIs or application flows change, AI self-healing detects broken locators, updates element strategies automatically, and keeps End-to-End Testing suites running without hand-editing every script—cutting maintenance effort while protecting long-term journey stability.', 'testro' ),
			),
			array(
				'question' => __( 'Can end-to-end testing integrate with CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate End-to-End Testing into Jenkins, GitHub, Azure DevOps, Bamboo, and related DevOps tools so pipeline events trigger AI E2E Testing, report results back to the pipeline, and enforce quality gates before promotion.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support enterprise-scale cloud execution?', 'testro' ),
				'answer'   => __( 'Yes. Cloud End-to-End Testing on theTestRo runs enterprise-scale suites through secure cloud infrastructure with parallel execution, scheduled runs, and multi-environment validation—so large business workflow packs finish faster without sacrificing coverage.', 'testro' ),
			),
		),
		'use-cases' => array(
			array(
				'question' => __( 'What software testing use cases does theTestRo support?', 'testro' ),
				'answer'   => __( 'theTestRo supports a full range of software testing use cases including regression testing, smoke testing, sanity testing, functional testing, integration testing, end-to-end testing, frontend testing, and backend testing—all from one AI-powered test automation platform.', 'testro' ),
			),
			array(
				'question' => __( 'Can I automate regression, functional, and end-to-end testing?', 'testro' ),
				'answer'   => __( 'Yes. You can automate regression, functional, and end-to-end testing on theTestRo with AI-assisted authoring, self-healing maintenance, parallel cloud execution, and CI/CD integration so every release path stays continuously validated.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support no-code testing?', 'testro' ),
				'answer'   => __( 'Yes. No-code test creation lets QA analysts, developers, and business users build automated tests without writing code, while still benefiting from AI generation, self-healing, and enterprise-grade execution.', 'testro' ),
			),
			array(
				'question' => __( 'Can all testing use cases run inside CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Every testing use case on theTestRo can run inside CI/CD pipelines such as Jenkins, GitHub Actions, Azure DevOps, and Bamboo—triggering on commits, builds, or schedules and enforcing quality gates before promotion.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI improve software testing?', 'testro' ),
				'answer'   => __( 'AI improves software testing by generating intelligent scenarios faster, self-healing broken locators when applications change, prioritizing relevant suites for each release, classifying failures, and surfacing analytics that improve coverage and release readiness.', 'testro' ),
			),
			array(
				'question' => __( 'Can one platform handle web, API, and enterprise testing?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo unifies web application testing, API testing, enterprise application testing, and cloud-native execution in one AI-powered platform—so teams cover every critical surface without stitching together disconnected tools.', 'testro' ),
			),
		),
		'ai-powered-integration-testing' => array(
			array(
				'question' => __( 'What is AI-powered Integration Testing?', 'testro' ),
				'answer'   => __( 'AI-powered Integration Testing validates how applications, APIs, databases, microservices, and third-party systems work together using intelligent automation instead of brittle hand-written scripts. With theTestRo, teams create no-code integration scenarios, execute Automated Integration Testing at scale, and continuously prove data flow and business rules across the software ecosystem.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate API integration testing?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo automates API Integration Testing across REST, SOAP, GraphQL, and enterprise APIs—covering contracts, authentication, payloads, and end-to-end service interactions. AI-assisted authoring and parallel execution help teams expand API coverage without slowing delivery.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support microservices testing?', 'testro' ),
				'answer'   => __( 'Absolutely. Microservices Testing on theTestRo validates distributed service communication, contracts, event flows, and cross-service business workflows so teams catch integration defects before they reach production.', 'testro' ),
			),
			array(
				'question' => __( 'Can third-party integrations be tested automatically?', 'testro' ),
				'answer'   => __( 'Yes. Automate validation for payment gateways, CRM and ERP platforms, authentication providers, and other external services. theTestRo keeps third-party Integration Testing in the same platform as your internal APIs and microservices so partner connections stay reliable on every release.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI reduce integration test maintenance?', 'testro' ),
				'answer'   => __( 'AI self-healing adapts to changing APIs, payloads, and connected systems so Automated Integration Testing stays green without constant script rework. Reusable assets and intelligent updates further cut maintenance as your integration map evolves.', 'testro' ),
			),
			array(
				'question' => __( 'Can integration tests run within CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Trigger AI Integration Testing from Jenkins, GitHub, Azure DevOps, Bamboo, and related DevOps tools so every build or deployment validates critical connections, reports results to the pipeline, and enforces quality gates before promotion.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support no-code integration testing?', 'testro' ),
				'answer'   => __( 'Yes. No-Code Integration Testing on theTestRo lets QA analysts and engineers build powerful integration workflows with AI-assisted visual automation—no scripting required—while still delivering enterprise-scale execution, analytics, and self-healing maintenance.', 'testro' ),
			),
		),
		'retail-ecommerce' => array(
			array(
				'question' => __( 'How does theTestRo help Retail & E-commerce businesses?', 'testro' ),
				'answer'   => __( 'theTestRo helps retail and e-commerce teams automate quality across storefronts, mobile commerce apps, APIs, payment gateways, POS, OMS/WMS, and omnichannel journeys. AI-powered authoring, self-healing automation, and continuous testing accelerate digital commerce releases while protecting checkout reliability and customer experience.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate checkout and payment testing?', 'testro' ),
				'answer'   => __( 'Yes. Build end-to-end suites that validate cart, promotions, checkout flows, and payment gateway integrations—including authorization paths and failure handling—so revenue-critical transactions stay reliable before every release.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support omnichannel testing?', 'testro' ),
				'answer'   => __( 'Yes. Cover seamless shopping experiences across web, mobile, POS, and in-store systems in unified journeys, so customers encounter consistent quality no matter which channel they start or finish on.', 'testro' ),
			),
			array(
				'question' => __( 'Can APIs and POS systems be tested together?', 'testro' ),
				'answer'   => __( 'Yes. Combine API, UI, and POS coverage in the same platform so inventory, order, and payment services stay aligned with storefront and in-store workflows—ideal for omnichannel order capture and fulfillment scenarios.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support continuous testing for retail applications?', 'testro' ),
				'answer'   => __( 'Yes. Integrate continuous retail testing into CI/CD with Jenkins, GitHub, Azure DevOps, and related pipelines. Parallel execution, quality gates, and AI analytics keep every promotion and storefront update under continuous validation.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI improve retail software quality?', 'testro' ),
				'answer'   => __( 'AI accelerates retail test creation, self-heals broken locators when catalogs and UIs change, classifies failures faster, and surfaces analytics that prioritize checkout, journey, and peak-season risk—so teams maintain higher coverage with less manual maintenance.', 'testro' ),
			),
		),
		'healthcare' => array(
			array(
				'question' => __( 'How does theTestRo support healthcare software testing?', 'testro' ),
				'answer'   => __( 'theTestRo helps healthcare organizations automate quality across EHR/EMR systems, patient portals, telemedicine platforms, APIs, hospital management systems, and end-to-end clinical workflows. AI-powered authoring, self-healing automation, and continuous testing accelerate digital healthcare releases while protecting patient experiences and clinical reliability.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate EHR and EMR testing?', 'testro' ),
				'answer'   => __( 'Yes. Build suites that validate electronic health record workflows—including clinical documentation, orders, results, and related integrations—so core care processes stay reliable before every release. Combine UI and API coverage to exercise the systems clinicians depend on daily.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support HIPAA-ready testing practices?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo supports HIPAA-ready testing practices with secure test data handling, role-based access validation, and audit-ready quality reporting. Teams can automate healthcare applications while maintaining careful controls around sensitive patient information throughout the test lifecycle.', 'testro' ),
			),
			array(
				'question' => __( 'Can healthcare APIs be tested automatically?', 'testro' ),
				'answer'   => __( 'Yes. Automate healthcare API testing—including FHIR and HL7-oriented integrations—alongside UI and end-to-end journeys. Validate request/response contracts, interoperability paths, and service health so clinical systems stay aligned across labs, billing, EHRs, and third-party platforms.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI improve healthcare quality engineering?', 'testro' ),
				'answer'   => __( 'AI accelerates healthcare test creation, self-heals broken automation when clinical UIs change, classifies failures faster, and surfaces analytics that prioritize workflow, interoperability, and release risk—so teams maintain higher coverage with less manual maintenance.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo integrate into healthcare CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate continuous healthcare testing into CI/CD with Jenkins, GitHub, Azure DevOps, and related pipelines. Parallel execution, quality gates, and AI analytics keep every clinical software update under continuous validation before go-live.', 'testro' ),
			),
		),
		'travel-and-hospitality' => array(
			array(
				'question' => __( 'How does theTestRo support Travel & Hospitality testing?', 'testro' ),
				'answer'   => __( 'theTestRo helps travel and hospitality organizations automate quality across booking engines, hotel reservation systems, travel portals, mobile apps, payment gateways, PMS/CRS platforms, and end-to-end traveler journeys. AI-powered authoring, self-healing automation, and continuous testing accelerate digital travel releases while protecting booking reliability and guest experiences.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate booking and reservation testing?', 'testro' ),
				'answer'   => __( 'Yes. Build end-to-end suites that validate flight and hotel search, seat and room selection, booking confirmation, modifications, cancellations, and refunds—so reservation-critical journeys stay reliable before every release. Combine UI and API coverage to exercise the systems travelers and operations teams depend on daily.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support travel APIs and payment gateways?', 'testro' ),
				'answer'   => __( 'Yes. Automate travel API and payment gateway testing alongside UI and end-to-end journeys. Validate request/response contracts, airline and hotel integrations, authorization paths, and failure handling so booking and payment services stay aligned across releases.', 'testro' ),
			),
			array(
				'question' => __( 'Can mobile booking applications be tested?', 'testro' ),
				'answer'   => __( 'Yes. Cover native and responsive mobile booking experiences on real devices and browsers. Teams can validate search, booking, payment, check-in, and loyalty flows so travelers enjoy consistent quality on Android, iOS, and tablets.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI improve travel software quality?', 'testro' ),
				'answer'   => __( 'AI accelerates travel test creation, self-heals broken automation when booking UIs change, classifies failures faster, and surfaces analytics that prioritize reservation, payment, and peak-season risk—so teams maintain higher coverage with less manual maintenance.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo integrate into CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate continuous travel testing into CI/CD with Jenkins, GitHub, Azure DevOps, and related pipelines. Parallel execution, quality gates, and AI analytics keep every booking platform update under continuous validation before go-live.', 'testro' ),
			),
		),
		'banking-finance' => array(
			array(
				'question' => __( 'How does theTestRo support Banking & Financial Services testing?', 'testro' ),
				'answer'   => __( 'theTestRo helps BFSI organizations automate quality across digital banking portals, mobile apps, payment systems, UPI, APIs, core banking, lending, insurance, and end-to-end financial workflows. AI-powered authoring, self-healing automation, and continuous testing accelerate digital banking releases while protecting transaction reliability and regulatory readiness.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate payment and transaction testing?', 'testro' ),
				'answer'   => __( 'Yes. Build suites that validate payment gateways, fund transfers, card and wallet transactions, bill payments, and related settlement flows—so mission-critical money movement stays reliable before every release. Combine UI and API coverage to exercise the systems customers and operations teams depend on daily.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support UPI and digital payment validation?', 'testro' ),
				'answer'   => __( 'Yes. Automate UPI and QR payment journeys alongside broader digital payment validation. Teams can cover initiation, authorization, confirmation, and failure-path scenarios so instant payment experiences remain reliable under continuous change.', 'testro' ),
			),
			array(
				'question' => __( 'Can APIs and core banking systems be tested together?', 'testro' ),
				'answer'   => __( 'Yes. Automate banking API and microservice testing alongside UI and end-to-end journeys that touch core banking. Validate request/response contracts, integration paths, and service health so portals, payments, and enterprise systems stay aligned across releases.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI improve banking software quality?', 'testro' ),
				'answer'   => __( 'AI accelerates banking test creation, self-heals broken automation when financial UIs change, classifies failures faster, and surfaces analytics that prioritize payments, compliance, and release risk—so teams maintain higher coverage with less manual maintenance.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo integrate into banking CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate continuous banking testing into CI/CD with Jenkins, GitHub, Azure DevOps, and related pipelines. Parallel execution, quality gates, and AI analytics keep every financial software update under continuous validation before go-live.', 'testro' ),
			),
		),
		'insurance' => array(
			array(
				'question' => __( 'How does theTestRo support insurance software testing?', 'testro' ),
				'answer'   => __( 'theTestRo helps insurance organizations automate quality across policy administration systems, claims platforms, customer portals, mobile apps, APIs, underwriting engines, and end-to-end insurance workflows. AI-powered authoring, self-healing automation, and continuous testing accelerate digital insurance releases while protecting policyholder experiences and regulatory readiness.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate policy and claims workflows?', 'testro' ),
				'answer'   => __( 'Yes. Build suites that validate quoting, policy issuance, renewals, claims submission, adjudication, settlement, premium calculation, and related servicing flows—so mission-critical insurance journeys stay reliable before every release. Combine UI and API coverage to exercise the systems customers, agents, and operations teams depend on daily.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support insurance compliance testing?', 'testro' ),
				'answer'   => __( 'Yes. Continuously validate quality with audit-ready evidence, secure test data practices, access controls, and reporting that support insurance compliance initiatives. Teams can retain detailed execution records for audits and regulatory reviews across releases.', 'testro' ),
			),
			array(
				'question' => __( 'Can APIs and legacy insurance systems be tested together?', 'testro' ),
				'answer'   => __( 'Yes. Automate insurance API and microservice testing alongside UI and end-to-end journeys that touch legacy policy and claims platforms. Validate request/response contracts, integration paths, and service health so portals, billing, underwriting, and enterprise systems stay aligned across releases.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI improve insurance quality engineering?', 'testro' ),
				'answer'   => __( 'AI accelerates insurance test creation, self-heals broken automation when policy and claims UIs change, classifies failures faster, and surfaces analytics that prioritize claims, compliance, and release risk—so teams maintain higher coverage with less manual maintenance.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo integrate into CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate continuous insurance testing into CI/CD with Jenkins, GitHub, Azure DevOps, and related pipelines. Parallel execution, quality gates, and AI analytics keep every insurance software update under continuous validation before go-live.', 'testro' ),
			),
		),
		'microsoft-dynamics-365-test-automation' => array(
			array(
				'question' => __( 'What is Microsoft Dynamics 365 Test Automation?', 'testro' ),
				'answer'   => __( 'Microsoft Dynamics 365 Test Automation uses AI-powered, no-code workflows to validate Dynamics modules, customizations, and end-to-end ERP processes after every Microsoft update or deployment. theTestRo helps teams automate regression, functional, API, and business-process testing so Finance, Supply Chain, Sales, Customer Service, Commerce, and Human Resources stay reliable at release speed.', 'testro' ),
			),
			array(
				'question' => __( 'Which Dynamics 365 modules does theTestRo support?', 'testro' ),
				'answer'   => __( 'theTestRo supports testing across major Microsoft Dynamics 365 applications, including Finance, Supply Chain Management, Sales, Customer Service, Commerce, and Human Resources—from a single unified AI-powered testing platform.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate Finance and Supply Chain testing?', 'testro' ),
				'answer'   => __( 'Yes. Automate Finance and Supply Chain Management workflows such as financial postings, procure-to-pay, order-to-cash, inventory, and related ERP journeys. Combine UI and API coverage so mission-critical operations stay validated after every Dynamics release.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support no-code Dynamics 365 testing?', 'testro' ),
				'answer'   => __( 'Yes. Business analysts, QA teams, and Dynamics specialists can create automated tests without writing code using natural language and visual authoring—while still supporting advanced scenarios when technical depth is required.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing reduce ERP test maintenance?', 'testro' ),
				'answer'   => __( 'When Microsoft updates or customizations change Dynamics forms and locators, self-healing automation detects the drift, repairs steps automatically, and continues execution. That keeps ERP regression suites green with far less manual maintenance between releases.', 'testro' ),
			),
			array(
				'question' => __( 'Can Microsoft Dynamics 365 testing integrate into Azure DevOps and CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate Dynamics testing into Azure DevOps, GitHub, Jenkins, and other CI/CD pipelines. Trigger suites after deployments or platform updates, apply quality gates, and keep continuous validation in the same toolchain your Dynamics delivery teams already use.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo validate end-to-end ERP business workflows?', 'testro' ),
				'answer'   => __( 'Yes. Build end-to-end suites for Order-to-Cash, Procure-to-Pay, Record-to-Report, inventory, customer service operations, financial workflows, and cross-module scenarios—so business-critical Dynamics processes remain reliable across every Microsoft update.', 'testro' ),
			),
		),
		'salesforce-test-automation' => array(
			array(
				'question' => __( 'What is Salesforce Test Automation?', 'testro' ),
				'answer'   => __( 'Salesforce Test Automation uses AI-powered, no-code workflows to validate Salesforce CRM applications, Lightning Experience, customizations, and end-to-end business processes after every deployment or platform update. theTestRo helps teams automate Salesforce regression testing, functional validation, API checks, and CRM workflow coverage so Sales Cloud, Service Cloud, Experience Cloud, Marketing Cloud, and Commerce Cloud stay reliable at release speed.', 'testro' ),
			),
			array(
				'question' => __( 'Which Salesforce Clouds does theTestRo support?', 'testro' ),
				'answer'   => __( 'theTestRo supports Salesforce testing across Sales Cloud, Service Cloud, Experience Cloud, Marketing Cloud, and Commerce Cloud—from a single unified AI-powered testing platform for Salesforce CRM Testing and QA automation.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate Lightning Experience testing?', 'testro' ),
				'answer'   => __( 'Yes. Automate Salesforce Lightning Testing across Lightning pages, components, and role-based user journeys. Combine UI and API coverage so Lightning Experience stays validated after every Salesforce release or customization.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support no-code Salesforce automation?', 'testro' ),
				'answer'   => __( 'Yes. Business analysts, QA teams, and Salesforce specialists can create automated Salesforce tests without writing code using natural language and visual authoring—while still supporting advanced scenarios when technical depth is required.', 'testro' ),
			),
			array(
				'question' => __( 'Can Salesforce APIs and Apex integrations be validated?', 'testro' ),
				'answer'   => __( 'Yes. Verify Salesforce APIs, Apex integrations, connected services, and third-party connectors alongside UI workflows—so integrations and business logic remain trustworthy across CRM releases.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing reduce Salesforce test maintenance?', 'testro' ),
				'answer'   => __( 'When Salesforce updates or Lightning UI changes break locators, self-healing automation detects the drift, repairs steps automatically, and continues execution. That keeps Salesforce regression suites green with far less manual maintenance between releases.', 'testro' ),
			),
			array(
				'question' => __( 'Can Salesforce testing integrate into Azure DevOps and CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate Salesforce testing into Azure DevOps, GitHub, Jenkins, Jira, Slack, and other CI/CD pipelines. Trigger suites after deployments or customizations, apply quality gates, and keep continuous Salesforce QA Automation in the same toolchain your delivery teams already use.', 'testro' ),
			),
		),
		'oracle-testing' => array(
			array(
				'question' => __( 'What is Oracle Test Automation?', 'testro' ),
				'answer'   => __( 'Oracle Test Automation uses AI-powered, no-code workflows to validate Oracle Cloud, Oracle E-Business Suite (EBS), Oracle ERP modules, and end-to-end enterprise processes after every quarterly update or deployment. theTestRo helps teams automate Oracle regression testing, functional validation, API checks, database verification, and business-process coverage so Oracle Cloud Fusion, HCM, SCM, CRM, and related systems stay reliable at release speed.', 'testro' ),
			),
			array(
				'question' => __( 'Which Oracle applications does theTestRo support?', 'testro' ),
				'answer'   => __( 'theTestRo supports Oracle testing across Oracle Cloud Fusion, Oracle EBS, Oracle ERP, Oracle HCM, Oracle SCM, Oracle CRM, and Oracle Database—from a single unified AI-powered testing platform for enterprise Oracle QA automation.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate Oracle Cloud Fusion and Oracle EBS testing?', 'testro' ),
				'answer'   => __( 'Yes. Automate Oracle Cloud Fusion and Oracle EBS workflows across finance, supply chain, HCM, CRM, and custom extensions. Combine UI and API coverage so mission-critical Oracle applications stay validated after every quarterly update or patch.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support Oracle Database testing?', 'testro' ),
				'answer'   => __( 'Yes. Validate Oracle Database integrity, data flows, and related enterprise checks alongside application workflows—so transactions, ledgers, and cross-system data remain trustworthy across Oracle releases.', 'testro' ),
			),
			array(
				'question' => __( 'Can Oracle APIs and third-party integrations be validated?', 'testro' ),
				'answer'   => __( 'Yes. Verify REST and SOAP APIs, Oracle integrations, and third-party connectors alongside UI workflows—so integrations and business logic remain reliable across Oracle Cloud and EBS releases.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing reduce Oracle test maintenance?', 'testro' ),
				'answer'   => __( 'When Oracle quarterly updates or UI changes break locators, self-healing automation detects the drift, repairs steps automatically, and continues execution. That keeps Oracle regression suites green with far less manual maintenance between releases.', 'testro' ),
			),
			array(
				'question' => __( 'Can Oracle testing integrate into Azure DevOps and CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate Oracle testing into Azure DevOps, GitHub Actions, Jenkins, Jira, Slack, and other CI/CD pipelines. Trigger suites after deployments or quarterly updates, apply quality gates, and keep continuous Oracle QA automation in the same toolchain your delivery teams already use.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo validate complete Oracle ERP business processes?', 'testro' ),
				'answer'   => __( 'Yes. Build end-to-end suites for Order-to-Cash, Procure-to-Pay, Record-to-Report, HCM journeys, supply chain flows, CRM processes, and cross-module scenarios—so business-critical Oracle ERP workflows remain reliable across every quarterly release.', 'testro' ),
			),
		),

		'sap-testing' => array(
			array(
				'question' => __( 'What is SAP Test Automation?', 'testro' ),
				'answer'   => __( 'SAP Test Automation uses AI-powered, no-code workflows to validate SAP applications, Fiori experiences, and end-to-end business processes after every upgrade, patch, or enterprise release. theTestRo helps teams automate SAP regression testing, functional validation, API checks, and business-process coverage so SAP S/4HANA, SAP ECC, SAP Fiori, SuccessFactors, Ariba, and SAP CRM stay reliable at release speed.', 'testro' ),
			),
			array(
				'question' => __( 'Which SAP applications does theTestRo support?', 'testro' ),
				'answer'   => __( 'theTestRo supports SAP testing across SAP S/4HANA, SAP ECC, SAP Fiori, SAP SuccessFactors, SAP Ariba, and SAP CRM—from a single unified AI-powered testing platform for enterprise SAP QA automation.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate SAP S/4HANA and SAP Fiori testing?', 'testro' ),
				'answer'   => __( 'Yes. Automate SAP S/4HANA Testing and SAP Fiori Testing across modules, role-based journeys, and critical business workflows. Combine UI and API coverage so S/4HANA and Fiori stay validated after every upgrade or feature release.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support SAP ECC automation?', 'testro' ),
				'answer'   => __( 'Yes. Maintain SAP ECC automation and regression coverage while you stabilize existing landscapes or prepare for S/4HANA modernization—so mission-critical ECC processes remain trustworthy across updates and migrations.', 'testro' ),
			),
			array(
				'question' => __( 'Can SAP business workflows be validated end-to-end?', 'testro' ),
				'answer'   => __( 'Yes. Build end-to-end suites for finance, procurement, supply chain, sales & distribution, human resources, inventory, and cross-module scenarios—so business-critical SAP workflows remain reliable across every enterprise release.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing reduce SAP test maintenance?', 'testro' ),
				'answer'   => __( 'When SAP upgrades, patches, or UI changes break locators, self-healing automation detects the drift, repairs steps automatically, and continues execution. That keeps SAP regression suites green with far less manual maintenance between releases.', 'testro' ),
			),
			array(
				'question' => __( 'Can SAP testing integrate into enterprise DevOps pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate SAP testing into Azure DevOps, GitHub, Jenkins, Jira, Slack, and other CI/CD pipelines. Trigger suites after deployments or SAP updates, apply quality gates, and keep continuous SAP QA Automation in the same toolchain your delivery teams already use.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support cloud and on-premise SAP environments?', 'testro' ),
				'answer'   => __( 'Yes. Deploy and execute SAP testing across private cloud, on-premise, and hybrid environments while maintaining enterprise security controls, secure test data management, and governance for regulated SAP landscapes.', 'testro' ),
			),
		),
		'workday-testing' => array(
			array(
				'question' => __( 'What is Workday Test Automation?', 'testro' ),
				'answer'   => __( 'Workday Test Automation uses AI-powered, no-code workflows to validate Workday applications and end-to-end HR and Finance business processes after every update, configuration change, or enterprise release. theTestRo helps teams automate Workday regression testing, functional validation, API checks, and business-process coverage so Workday HCM, Financial Management, Payroll, Recruiting, Learning, and Time Tracking stay reliable at release speed.', 'testro' ),
			),
			array(
				'question' => __( 'Which Workday applications does theTestRo support?', 'testro' ),
				'answer'   => __( 'theTestRo supports Workday Testing across Workday HCM, Workday Financial Management, Workday Payroll, Workday Recruiting, Workday Learning, and Workday Time Tracking—from a single unified AI-powered testing platform for enterprise Workday QA.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate Workday HCM and Financial Management testing?', 'testro' ),
				'answer'   => __( 'Yes. Automate Workday HCM Testing and Workday Financial Management Testing across employee lifecycle, organizational, accounting, and financial workflows. Combine UI and API coverage so HCM and Finance stay validated after every Workday update.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support Workday Payroll and Recruiting workflows?', 'testro' ),
				'answer'   => __( 'Yes. Validate Workday Payroll Testing and Workday Recruiting workflows—including pay cycles, compensation transactions, candidate journeys, and offer-to-hire processes—so payroll and talent workflows remain trustworthy across releases.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing reduce Workday test maintenance?', 'testro' ),
				'answer'   => __( 'When Workday updates, UI changes, or configuration drift break locators, self-healing automation detects the change, repairs steps automatically, and continues execution. That keeps Workday regression suites green with far less manual maintenance between releases.', 'testro' ),
			),
			array(
				'question' => __( 'Can Workday testing integrate into Azure DevOps and CI/CD pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate Workday testing into Azure DevOps, GitHub, Jenkins, Jira, Slack, and other CI/CD pipelines. Trigger suites after deployments or Workday updates, apply quality gates, and keep continuous AI Workday Testing in the same toolchain your delivery teams already use.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo validate complete HR and Finance business processes?', 'testro' ),
				'answer'   => __( 'Yes. Build end-to-end suites for Hire-to-Retire, Payroll Processing, Leave & Time Management, Expense Management, Procure-to-Pay, Financial Close & Reporting, and cross-module scenarios—so mission-critical Workday HR and Finance workflows remain reliable across every enterprise release.', 'testro' ),
			),
		),
		'servicenow-testing' => array(
			array(
				'question' => __( 'What is ServiceNow Test Automation?', 'testro' ),
				'answer'   => __( 'ServiceNow Test Automation uses AI-powered, no-code workflows to validate ServiceNow applications, ITSM processes, Flow Designer automations, and end-to-end enterprise service workflows after every deployment or platform update. theTestRo helps teams automate ServiceNow regression testing, functional validation, API checks, and workflow coverage so ITSM, ITOM, CSM, HRSD, ITAM, and GRC stay reliable at release speed.', 'testro' ),
			),
			array(
				'question' => __( 'Which ServiceNow applications does theTestRo support?', 'testro' ),
				'answer'   => __( 'theTestRo supports ServiceNow testing across IT Service Management (ITSM), IT Operations Management (ITOM), Customer Service Management (CSM), HR Service Delivery (HRSD), IT Asset Management (ITAM), and Governance, Risk & Compliance (GRC)—from a single unified AI-powered testing platform for enterprise ServiceNow QA Automation.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo automate ITSM and ITOM testing?', 'testro' ),
				'answer'   => __( 'Yes. Automate ServiceNow ITSM Testing and ITOM Testing across incident, change, problem, service catalog, operations, and related workflows. Combine UI and API coverage so ITSM and ITOM stay validated after every ServiceNow release or customization.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support Flow Designer and Service Catalog testing?', 'testro' ),
				'answer'   => __( 'Yes. Validate Flow Designer automations, classic workflows, service catalog items, request fulfillment, and related business processes—so ServiceNow Workflow Testing covers the automations your enterprise depends on.', 'testro' ),
			),
			array(
				'question' => __( 'How does self-healing reduce ServiceNow test maintenance?', 'testro' ),
				'answer'   => __( 'When ServiceNow updates or UI changes break locators, self-healing automation detects the drift, repairs steps automatically, and continues execution. That keeps ServiceNow regression suites green with far less manual maintenance between releases.', 'testro' ),
			),
			array(
				'question' => __( 'Can ServiceNow testing integrate into CI/CD and Azure DevOps pipelines?', 'testro' ),
				'answer'   => __( 'Yes. Integrate ServiceNow testing into Azure DevOps, GitHub, Jenkins, Jira, Slack, and other CI/CD pipelines. Trigger suites after deployments or customizations, apply quality gates, and keep continuous ServiceNow QA Automation in the same toolchain your delivery teams already use.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo validate complete enterprise service workflows?', 'testro' ),
				'answer'   => __( 'Yes. Build end-to-end suites for incident-to-resolution, change approval, service catalog fulfillment, HR service delivery, customer service journeys, and cross-application scenarios—so mission-critical ServiceNow workflows remain reliable across every enterprise release.', 'testro' ),
			),
		),

		'pricing' => array(
			array(
				'question' => __( 'How is theTestRo pricing calculated?', 'testro' ),
				'answer'   => __( 'Pricing is based on the plan that best matches your team size, execution needs, and enterprise requirements. Starter is designed for small QA teams, Professional adds collaboration and scale features, and Enterprise is tailored for unlimited usage, security, and custom deployment options.', 'testro' ),
			),
			array(
				'question' => __( 'Can I upgrade my plan?', 'testro' ),
				'answer'   => __( 'Yes. You can upgrade as your automation needs grow—from Starter to Professional or Enterprise—without rebuilding your tests. Our team will help you transition smoothly and map the right capabilities to your workflow.', 'testro' ),
			),
			array(
				'question' => __( 'Do you offer a free trial?', 'testro' ),
				'answer'   => __( 'Yes. Start with a free trial on the Starter plan to explore AI test automation, no-code authoring, web and API testing, and core reporting before you commit.', 'testro' ),
			),
			array(
				'question' => __( 'Is enterprise deployment available?', 'testro' ),
				'answer'   => __( 'Absolutely. Enterprise plans support private cloud and on-premise deployment options, SSO, role-based access control, custom integrations, and SLA-backed support for regulated and large-scale environments.', 'testro' ),
			),
			array(
				'question' => __( 'Do you provide onboarding and migration support?', 'testro' ),
				'answer'   => __( 'Yes. Our team helps with onboarding, test migration, and best-practice setup so your QA and engineering teams can adopt theTestRo quickly and start delivering value sooner.', 'testro' ),
			),
			array(
				'question' => __( 'Which payment methods do you accept?', 'testro' ),
				'answer'   => __( 'We support standard business payment options, including invoice-based billing for Professional and Enterprise plans. Contact sales for details on your preferred payment method and billing cycle.', 'testro' ),
			),
		),

		'compare-tools' => array(
			array(
				'question' => __( 'Why choose theTestRo over traditional automation tools?', 'testro' ),
				'answer'   => __( 'theTestRo combines AI-powered automation, no-code test creation, self-healing maintenance, and unified web, API, and cross-browser testing in one platform. That helps teams reduce brittle scripting, lower maintenance effort, and accelerate release cycles compared with traditional, script-heavy toolchains.', 'testro' ),
			),
			array(
				'question' => __( 'Which platforms can I compare with theTestRo?', 'testro' ),
				'answer'   => __( 'This hub compares theTestRo with leading test automation alternatives including BrowserStack, Testsigma, Selenium, Playwright, Mabl, TestGrid, Reflect, Virtuoso, and TestRigor—so you can evaluate fit by authoring model, maintenance, coverage, and enterprise readiness.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support AI-powered automation?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo is an AI test automation platform that helps teams create, execute, analyze, and maintain tests with intelligent automation—including self-healing locators and actionable reporting for faster software delivery.', 'testro' ),
			),
			array(
				'question' => __( 'Can I migrate from Selenium or other automation tools?', 'testro' ),
				'answer'   => __( 'Yes. Teams commonly migrate from Selenium and other automation tools to reduce script ownership and maintenance. theTestRo supports modern CI/CD workflows, and our team can help with onboarding and migration planning so existing coverage transitions smoothly.', 'testro' ),
			),
			array(
				'question' => __( 'Is theTestRo suitable for enterprise teams?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo is built for enterprise test automation with scalable execution, unified quality workflows, CI/CD integration, and deployment options designed for complex organizations that need reliable continuous testing.', 'testro' ),
			),
		),

);

	/**
	 * Filter context-specific FAQ sets.
	 *
	 * @param array  $sets    FAQ sets keyed by context.
	 * @param string $context Requested context.
	 */
	$sets = apply_filters( 'testro_faq_sets', $sets, $context );

	if ( isset( $sets[ $context ] ) ) {
		return $sets[ $context ];
	}

	return testro_get_faqs();
}
