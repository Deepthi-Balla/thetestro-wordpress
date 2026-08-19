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
							'name'        => __( 'Chrome', 'testro' ),
							'status'      => __( 'Running', 'testro' ),
							'progress'    => 78,
							'tone'        => 'running',
							'description' => __( 'Test on the browser most of your users already have open.', 'testro' ),
						),
						array(
							'name'        => __( 'Edge', 'testro' ),
							'status'      => __( 'Passed', 'testro' ),
							'progress'    => 100,
							'tone'        => 'passed',
							'description' => __( 'Cover Microsoft\'s default browser without extra setup.', 'testro' ),
						),
						array(
							'name'        => __( 'Firefox', 'testro' ),
							'status'      => __( 'Running', 'testro' ),
							'progress'    => 64,
							'tone'        => 'running',
							'description' => __( 'Catch rendering issues Chrome alone won\'t show you.', 'testro' ),
						),
						array(
							'name'        => __( 'Safari', 'testro' ),
							'status'      => __( 'Visual check', 'testro' ),
							'progress'    => 91,
							'tone'        => 'visual',
							'description' => __( 'Make sure Mac and iPhone users get the same experience.', 'testro' ),
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
							'description' => __( 'Run tests automatically as part of your existing pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub Actions', 'testro' ),
							'description' => __( 'Trigger tests on every push or pull request.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Fit testing right into your existing workflows.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'GitLab', 'testro' ),
							'description' => __( 'Run tests as part of your CI/CD pipeline, no extra setup.', 'testro' ),
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
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Run self-healing tests automatically as part of your build.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'GitHub Actions', 'testro' ),
							'description' => __( 'Trigger self-healing runs on every push or pull request.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Fit self-healing tests right into your existing pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'GitLab CI', 'testro' ),
							'description' => __( 'Run tests without extra setup, right in your CI flow.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'Failed tests can file directly into your existing tickets.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Get notified the moment a test needs attention, right where your team already talks.', 'testro' ),
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

		'test-execution' => array(
			'slug'   => 'test-execution',
			'title'  => __( 'AI-Powered Test Execution Platform', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Execute Automated Tests Across Every Environment with AI', 'testro' ),
				'description' => __( 'Execute automated tests with an AI-powered test execution platform. Run parallel, scheduled, and cross-browser tests to accelerate software delivery.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'AI-Powered Test Execution for Faster Software Releases', 'testro' ),
				'subtitle' => __( 'theTestRo is a test execution platform built to cut waiting time out of testing. Run tests in parallel across real browsers and devices. Get results back fast. Stop letting a slow test run hold up your release.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				/* 1. A Cloud Full of Real Browsers and Devices ------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'real-browsers-and-devices',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'A Cloud Full of Real Browsers and Devices', 'testro' ),
					'intro'         => __( 'Maintaining your own browser and device lab costs time your team doesn\'t have.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Real Devices, Not Emulators', 'testro' ),
							'description' => __( 'Test on actual hardware. Not a simulated approximation that misses real quirks.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Broad Browser Coverage', 'testro' ),
							'description' => __( 'Chrome, Safari, Firefox, and Edge. Every major version your users might have.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Desktop and Mobile Together', 'testro' ),
							'description' => __( 'Cover both in the same run. No switching to a separate tool.', 'testro' ),
						),
					),
					'outro'         => __( 'Automated test execution only means something if it happens on environments that match what your users actually run.', 'testro' ),
				),

				/* 2. How Test Execution Works ------------------------------ */
				array(
					'type'          => 'feature-grid',
					'id'            => 'how-test-execution-works',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'How Test Execution Works', 'testro' ),
					'intro'         => __( 'From Trigger to Result in Four Steps', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Select or Schedule', 'testro' ),
							'description' => __( 'Choose which tests to run, or let a CI/CD trigger start them on its own.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Distribute Across Environments', 'testro' ),
							'description' => __( 'theTestRo spreads tests across cloud devices, local machines, or both.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Run in Parallel', 'testro' ),
							'description' => __( 'Tests run at the same time instead of waiting in a queue.', 'testro' ),
						),
						array(
							'icon'        => 'video',
							'title'       => __( 'Review Results Fast', 'testro' ),
							'description' => __( 'See pass/fail status, logs, and video replays as soon as the run finishes.', 'testro' ),
						),
					),
				),

				/* 3. Who Relies on Fast Test Execution --------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'who-relies-on-fast-test-execution',
					'columns'       => 4,
					'title'         => __( 'Who Relies on Fast Test Execution', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Release Engineers', 'testro' ),
							'description' => __( 'Ship with confidence when a full regression suite finishes in minutes, not hours.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Teams', 'testro' ),
							'description' => __( 'Cover more browsers and devices without adding headcount to manage them.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'DevOps Teams', 'testro' ),
							'description' => __( 'Keep pipelines fast even as test coverage grows. Test time doesn\'t become the bottleneck.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Engineering Managers', 'testro' ),
							'description' => __( 'Get a clear read on release readiness. No need to wait on a status meeting.', 'testro' ),
						),
					),
				),

				/* 4. Cross-Browser and Cross-Device Coverage --------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'cross-browser-cross-device-coverage',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Cross-Browser and Cross-Device Coverage', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Generated Coverage Scenarios', 'testro' ),
							'description' => __( 'theTestRo suggests which browser and OS combinations matter most. Based on your actual traffic patterns.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Native and Hybrid App Support', 'testro' ),
							'description' => __( 'Test apps built with standard frameworks or hybrid tools like Flutter. No separate setup needed.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Version Coverage', 'testro' ),
							'description' => __( 'Test against the newest browser releases and older versions your users may still run.', 'testro' ),
						),
					),
				),

				/* 5. Parallel Test Execution at Scale ---------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'parallel-test-execution-at-scale',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Parallel Test Execution at Scale', 'testro' ),
					'intro'         => __( 'Stop Waiting for Tests to Run One at a Time', 'testro' ),
					'intro_extra'   => __( 'Sequential test runs are the single biggest drag on release speed.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Massively Parallel Runs', 'testro' ),
							'description' => __( 'Run hundreds or thousands of tests at once. Not one after another.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Distributed Across Environments', 'testro' ),
							'description' => __( 'Spread tests across cloud devices, local machines, or a mix of both.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Built-In Inventory Management', 'testro' ),
							'description' => __( 'Track and manage local devices used in parallel runs, all from one dashboard.', 'testro' ),
						),
					),
					'outro'         => __( 'Parallel test execution turns a multi-hour regression suite into a coffee-break-length wait.', 'testro' ),
				),

				/* 6. Custom Test Suites, Scheduled Your Way ---------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'custom-test-suites',
					'columns'       => 3,
					'title'         => __( 'Custom Test Suites, Scheduled Your Way', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Custom Test Suite Builder', 'testro' ),
							'description' => __( 'Group tests by feature, priority, or release stage.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Partial or Full Re-Runs', 'testro' ),
							'description' => __( 'Rerun just the tests that matter after a small fix. No need to run the whole suite every time.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Flexible Scheduling', 'testro' ),
							'description' => __( 'Set tests to run nightly, on a fixed schedule, or triggered by a specific event.', 'testro' ),
						),
					),
				),

				/* 7. Continuous Test Execution in Your Pipeline ------------ */
				array(
					'type'          => 'feature-grid',
					'id'            => 'continuous-test-execution',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Continuous Test Execution in Your Pipeline', 'testro' ),
					'intro'         => __( 'Continuous test execution means tests fire the moment code changes. Not whenever someone remembers to click run.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'CI/CD-Triggered Runs', 'testro' ),
							'description' => __( 'New code merges, and a test run kicks off on its own.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Merge-Time Compatibility Checks', 'testro' ),
							'description' => __( 'Catch a browser-specific or environment-specific issue before it reaches production.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Fits Your Existing Pipeline', 'testro' ),
							'description' => __( 'Connects with Jenkins, GitHub Actions, Azure DevOps, and GitLab. Nothing extra to bolt on.', 'testro' ),
						),
					),
				),

				/* 8. Real-Time Debugging ----------------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'real-time-debugging',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Real-Time Debugging, Not Just a Pass or Fail', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Interactive Debugging', 'testro' ),
							'description' => __( 'Step through a failed run to see exactly where it went wrong.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Visual Regression Checks', 'testro' ),
							'description' => __( 'Catch layout and styling breaks. Fine controls over what counts as a real change.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'One-Click Bug Reports', 'testro' ),
							'description' => __( 'File a bug with logs, screenshots, and repro steps already attached.', 'testro' ),
						),
					),
					'outro'         => __( 'A test that just says "failed" wastes your team\'s time. A test that shows exactly where and why gets fixed in minutes instead of an afternoon.', 'testro' ),
				),

				/* 9. Local and Cloud Execution ----------------------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'local-and-cloud-execution',
					'columns'       => 3,
					'title'         => __( 'Local and Cloud Execution, Working Together', 'testro' ),
					'intro'         => __( 'theTestRo doesn\'t force an all-cloud or all-local setup.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Cloud Device Farm', 'testro' ),
							'description' => __( 'Scale up right away. No provisioning needed on your end.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Local Execution Support', 'testro' ),
							'description' => __( 'Run tests against internal environments the cloud can\'t reach.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Agent-Based Control', 'testro' ),
							'description' => __( 'Manage a mix of local and cloud test runners from one place.', 'testro' ),
						),
					),
				),

				/* 10. Sequential vs. Parallel Execution -------------------- */
				array(
					'type'          => 'comparison',
					'id'            => 'sequential-vs-parallel-execution',
					'title'         => __( 'Sequential vs. Parallel Execution', 'testro' ),
					'intro'         => __( 'What Parallel Execution Actually Saves You', 'testro' ),
					'heading_level' => 5,
					'text_only'     => true,
					'legacy'        => array(
						'label' => __( 'Sequential Execution', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'theTestRo Parallel Execution', 'testro' ),
					),
					'rows'          => array(
						array(
							'aspect' => __( '500 tests at 30 seconds each', 'testro' ),
							'legacy' => __( '~4 hours', 'testro' ),
							'modern' => __( 'Minutes', 'testro' ),
						),
						array(
							'aspect' => __( 'Feedback after a code change', 'testro' ),
							'legacy' => __( 'Hours later', 'testro' ),
							'modern' => __( 'Near real-time', 'testro' ),
						),
						array(
							'aspect' => __( 'Browser coverage', 'testro' ),
							'legacy' => __( 'One at a time', 'testro' ),
							'modern' => __( 'All browsers at once', 'testro' ),
						),
						array(
							'aspect' => __( 'Scaling to more tests', 'testro' ),
							'legacy' => __( 'Wait time grows', 'testro' ),
							'modern' => __( 'Wait time stays flat', 'testro' ),
						),
					),
				),

				/* 11. Execution Insights That Actually Help ---------------- */
				array(
					'type'          => 'feature-grid',
					'id'            => 'execution-insights',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Execution Insights That Actually Help', 'testro' ),
					'intro'         => __( 'An AI test execution platform should tell you more than just which tests failed. It should tell you why the suite is slow, and where.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Execution Trends Over Time', 'testro' ),
							'description' => __( 'See whether your suite is getting faster or slower, release over release.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Flaky Test Detection', 'testro' ),
							'description' => __( 'Spot tests that fail on and off. Get them fixed instead of ignored.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Coverage Gaps by Environment', 'testro' ),
							'description' => __( 'Know which browser or device combinations have the thinnest coverage.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'test-execution',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-executing-tests-faster',
					'title'         => __( 'Start Executing Tests Faster Today', 'testro' ),
					'intro'         => __( 'Stop Letting Test Runs Slow Down Your Releases', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s test platform. Run more tests in less time. Do it across every environment that matters.', 'testro' ),
					'body_extra'    => __( 'Fewer bottlenecks. Faster releases. Real confidence in every green checkmark.', 'testro' ),
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

		'ci-cd-integration' => array(
			'slug'   => 'ci-cd-integration',
			'title'  => __( 'AI-Powered CI/CD Integration for Continuous Test Automation', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Automate CI/CD Testing for Continuous Software Delivery', 'testro' ),
				'description' => __( 'Integrate test automation into your CI/CD pipelines with theTestRo. Automate continuous testing across Jenkins, GitHub, Azure DevOps, and more.', 'testro' ),
			),

			'hero' => array(
				'title'          => __( 'AI-Powered CI/CD Integration for Continuous Test Automation', 'testro' ),
				'subtitle'       => __( 'theTestRo is a CI/CD test automation platform that runs tests the moment code changes. Not whenever someone remembers to trigger them.', 'testro' ),
				'subtitle_extra' => __( 'Connect your pipeline once. After that, we test every commit, build, and merge on its own. No more waiting until the end of a sprint to learn something broke.', 'testro' ),
				'actions'        => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-cicd-testing-means',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'What CI/CD Testing Actually Means', 'testro' ),
					'intro'         => __( 'Testing That Happens With Every Code Change, Not After', 'testro' ),
					'intro_extra'   => __( 'CI/CD testing means running automated tests continuously. Every time we integrate, build, or deploy code. Not saving quality checks for the end of a sprint.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Continuous Integration Testing', 'testro' ),
							'description' => __( 'Every code merge triggers unit and integration tests on its own. Conflicts get caught early.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Continuous Delivery Testing', 'testro' ),
							'description' => __( 'Tests run again as code moves toward deployment. Nothing reaches staging untested.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Feedback in Minutes, Not Days', 'testro' ),
							'description' => __( 'Developers learn about a broken build while the change is still fresh in their mind.', 'testro' ),
						),
					),
					'outro'         => __( 'A real CI/CD test automation platform is supposed to do this. Close the gap between writing code and knowing whether it works.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'how-testro-connects-to-your-pipeline',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'How theTestRo Connects to Your Pipeline', 'testro' ),
					'intro'         => __( 'Set Up Once. Test Automatically After That.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Connect Your CI/CD Tool', 'testro' ),
							'description' => __( 'Link Jenkins, GitHub Actions, GitLab, or another pipeline tool. Just a few clicks.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Set Your Triggers', 'testro' ),
							'description' => __( 'Choose what kicks off a test run. A commit, a pull request, a scheduled time, or a deployment event.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Tests Run on Their Own', 'testro' ),
							'description' => __( 'Code changes, and theTestRo runs the right tests. Nobody clicks a button.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Results Flow Back Automatically', 'testro' ),
							'description' => __( 'Pass/fail status appears right inside your pipeline tool. No separate dashboard to remember and check.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'comparison',
					'id'            => 'manual-vs-cicd-test-automation',
					'title'         => __( 'Manual Testing Cycles vs. CI/CD Test Automation', 'testro' ),
					'heading_level' => 3,
					'text_only'     => true,
					'legacy'        => array(
						'label' => __( 'Manual Testing Cycle', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'theTestRo CI/CD Testing', 'testro' ),
					),
					'rows'          => array(
						array(
							'aspect' => __( 'When tests run', 'testro' ),
							'legacy' => __( 'End of sprint, or before release', 'testro' ),
							'modern' => __( 'Every commit, automatically', 'testro' ),
						),
						array(
							'aspect' => __( 'Who triggers it', 'testro' ),
							'legacy' => __( 'A person, manually', 'testro' ),
							'modern' => __( 'Pipeline events, on their own', 'testro' ),
						),
						array(
							'aspect' => __( 'Feedback speed', 'testro' ),
							'legacy' => __( 'Days', 'testro' ),
							'modern' => __( 'Minutes', 'testro' ),
						),
						array(
							'aspect' => __( 'Bugs caught', 'testro' ),
							'legacy' => __( 'Late, often in staging', 'testro' ),
							'modern' => __( 'Early, at the commit stage', 'testro' ),
						),
						array(
							'aspect' => __( 'Team dependency', 'testro' ),
							'legacy' => __( 'Blocked on QA bandwidth', 'testro' ),
							'modern' => __( 'Runs independent of QA availability', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-benefits-from-cicd-test-automation',
					'columns'       => 4,
					'title'         => __( 'Who Benefits Most From CI/CD Test Automation', 'testro' ),
					'intro'         => __( 'Built for Teams Shipping Fast', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'code',
							'title'       => __( 'Development Teams', 'testro' ),
							'description' => __( 'Get instant feedback on a commit. No context-switching to the next task first.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Teams', 'testro' ),
							'description' => __( 'Spend less time manually triggering runs. More time on exploratory and edge-case testing.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'DevOps Engineers', 'testro' ),
							'description' => __( 'Keep the pipeline itself the single source of truth for release readiness.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Engineering Leadership', 'testro' ),
							'description' => __( 'See release confidence as a real number. Not a gut feeling from a status meeting.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'architecture',
					'id'            => 'native-integrations',
					'title'         => __( 'Native Integrations With the Tools You Already Use', 'testro' ),
					'intro'         => __( 'No Extra Glue Code Required', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects natively with the CI/CD and DevOps tools most teams already run. No custom scripting needed to get started:', 'testro' ),
					'heading_level' => 3,
					'hub'           => array(
						'icon'  => 'infinity',
						'label' => __( 'theTestRo', 'testro' ),
						'sub'   => __( 'CI/CD Integration', 'testro' ),
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
							'icon'  => 'infinity',
							'title' => __( 'GitLab CI', 'testro' ),
						),
						array(
							'icon'  => 'cloud',
							'title' => __( 'Azure DevOps', 'testro' ),
						),
						array(
							'icon'  => 'zap',
							'title' => __( 'CircleCI', 'testro' ),
						),
						array(
							'icon'  => 'layers-api',
							'title' => __( 'Bamboo', 'testro' ),
						),
					),
					'outro'         => __( 'A CI/CD integration that requires custom scripts for every tool just adds another thing to maintain. theTestRo plugs in directly. No developer needs to write connector code first.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'testing-at-every-stage',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Testing at Every Stage, Not Just at the End', 'testro' ),
					'intro'         => __( 'Shift Left. Shift Right. Cover Both Ends.', 'testro' ),
					'intro_extra'   => __( 'Waiting until the end of a sprint to test makes bugs expensive to fix. theTestRo supports testing across the whole pipeline:', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Shift-Left Testing', 'testro' ),
							'description' => __( 'Run tests as early as possible, right when code is committed. Issues surface before they pile up.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Regression Testing on Every Build', 'testro' ),
							'description' => __( 'Confirm new changes haven\'t broken existing features. This happens on its own.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Shift-Right Monitoring', 'testro' ),
							'description' => __( 'Keep testing after deployment too. We catch production issues fast, not users.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'trigger-based-and-scheduled-runs',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Trigger-Based and Scheduled Test Runs', 'testro' ),
					'intro'         => __( 'Run Tests However Your Team Actually Works', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Commit-Triggered Runs', 'testro' ),
							'description' => __( 'A push to a branch kicks off relevant tests on its own.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Pull Request Checks', 'testro' ),
							'description' => __( 'Block a merge until tests pass. Broken code doesn\'t reach the main branch.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Scheduled Regression Runs', 'testro' ),
							'description' => __( 'Set a full suite to run nightly or on a fixed interval, independent of code changes.', 'testro' ),
						),
					),
					'outro'         => __( 'Automated CI/CD pipeline testing works best when it matches how your team ships code. Not a rigid one-size-fits-all schedule.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'built-in-best-practices',
					'columns'       => 3,
					'title'         => __( 'Built-In Best Practices, Not Bolted On', 'testro' ),
					'intro'         => __( 'Smarter Defaults for Faster Pipelines', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Parallel Execution', 'testro' ),
							'description' => __( 'Tests run at the same time across environments. Pipeline speed doesn\'t drop as coverage grows.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Headless Test Runs', 'testro' ),
							'description' => __( 'Don\'t render a full browser UI when you don\'t need it. Less resource use, faster runs.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Smart Test Selection', 'testro' ),
							'description' => __( 'Run only the tests affected by a specific change, not the entire suite every single time.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'real-time-feedback-and-reporting',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Real-Time Feedback and Reporting', 'testro' ),
					'intro'         => __( 'Know the Moment Something Breaks', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Live Pipeline Status', 'testro' ),
							'description' => __( 'See test results right when a run finishes, inside your CI/CD tool.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Failure Alerts', 'testro' ),
							'description' => __( 'Get notified in Slack or your issue tracker the moment a test fails.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Historical Trends', 'testro' ),
							'description' => __( 'Track pass rates and pipeline stability over time. Not just the last run.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'devops-test-automation-at-scale',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'DevOps Test Automation at Scale', 'testro' ),
					'intro'         => __( 'Built for Teams Shipping Multiple Times a Day', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Multi-Branch Support', 'testro' ),
							'description' => __( 'Test across feature branches, release branches, and main. Each one independently.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Environment Management', 'testro' ),
							'description' => __( 'Run the right tests against the right environment on their own. Dev, staging, or production.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Team-Wide Visibility', 'testro' ),
							'description' => __( 'Everyone from developers to QA leads sees the same pipeline status. No need to ask around.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'ci-cd-integration',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-automating-cicd-testing',
					'title'         => __( 'Start Automating CI/CD Testing Today', 'testro' ),
					'intro'         => __( 'Connect Your Pipeline. Let Tests Run Themselves.', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s CI/CD test automation to catch issues on every commit, without slowing down releases. Ship faster. Catch more. Sleep better before every deploy.', 'testro' ),
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

		'playwright-test-automation' => array(
			'slug'   => 'playwright-test-automation',
			'title'  => __( 'Playwright Testing Automation Platform', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Automate Playwright Testing with AI for Faster Releases', 'testro' ),
				'description' => __( 'Create automated tests with theTestRo and export them to Playwright-compatible frameworks. Accelerate Playwright testing with AI-powered test automation.', 'testro' ),
			),

			'hero' => array(
				'title'           => __( 'Playwright Testing Automation Platform', 'testro' ),
				'subtitle'        => __( 'theTestRo is a Playwright testing automation platform that lets you build tests visually or in plain English. Export clean, readable Playwright code whenever you need it. No lock-in.', 'testro' ),
				'subtitle_extra'  => __( 'No black box. Just your test logic, in a format your engineers already know. This is what a modern Playwright testing platform should feel like.', 'testro' ),
				'actions'         => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-playwright-export-actually-means',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'What Playwright Export Actually Means', 'testro' ),
					'intro'         => __( 'Your Tests, Not Trapped Inside a Tool', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'code',
							'title'       => __( 'Real, Runnable Code', 'testro' ),
							'description' => __( 'Export tests to Playwright as actual TypeScript or JavaScript. Not a screenshot of steps.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'No Vendor Lock-In', 'testro' ),
							'description' => __( 'Take your exported tests and run them anywhere Playwright runs. With or without theTestRo.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Two Ways to Build', 'testro' ),
							'description' => __( 'Use theTestRo\'s no-code builder for speed. Or work directly with exported code when you need full control.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what a real Playwright testing automation platform should offer: speed without giving up ownership of your own test suite.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'how-export-works',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'How Export Works', 'testro' ),
					'intro'         => __( 'From No-Code Test to Playwright Script in Four Steps', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Build the Test', 'testro' ),
							'description' => __( 'Record a flow, or describe it in plain English.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Review the Steps', 'testro' ),
							'description' => __( 'Check the test in theTestRo\'s visual editor before exporting anything.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Export to Playwright', 'testro' ),
							'description' => __( 'Click export, and get a clean TypeScript or JavaScript Playwright file.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Commit and Run', 'testro' ),
							'description' => __( 'Drop the file into your repo and run it in your own environment or pipeline.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'comparison',
					'id'            => 'playwright-export-vs-writing-scripts',
					'title'         => __( 'Playwright Export vs. Writing Scripts by Hand', 'testro' ),
					'intro'         => __( 'What You Save With AI-Assisted Generation', 'testro' ),
					'heading_level' => 3,
					'text_only'     => true,
					'legacy'        => array(
						'label' => __( 'Writing Playwright by Hand', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'theTestRo Playwright Export', 'testro' ),
					),
					'rows'          => array(
						array(
							'aspect' => __( 'Time to first test', 'testro' ),
							'legacy' => __( 'Hours', 'testro' ),
							'modern' => __( 'Minutes', 'testro' ),
						),
						array(
							'aspect' => __( 'Coding skill required', 'testro' ),
							'legacy' => __( 'Yes, always', 'testro' ),
							'modern' => __( 'Optional', 'testro' ),
						),
						array(
							'aspect' => __( 'Locator strategy', 'testro' ),
							'legacy' => __( 'Manual, error-prone', 'testro' ),
							'modern' => __( 'AI-assisted, self-healing', 'testro' ),
						),
						array(
							'aspect' => __( 'Reusable components', 'testro' ),
							'legacy' => __( 'Built manually', 'testro' ),
							'modern' => __( 'Generated automatically', 'testro' ),
						),
						array(
							'aspect' => __( 'Ongoing maintenance', 'testro' ),
							'legacy' => __( 'Fully manual', 'testro' ),
							'modern' => __( 'Reduced with self-healing', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-sets-testro-export-apart',
					'variant'       => 'brand',
					'columns'       => 3,
					'title'         => __( 'What Sets theTestRo\'s Export Apart', 'testro' ),
					'intro'         => __( 'Not Every Export Feature Is Built the Same', 'testro' ),
					'intro_extra'   => __( 'A lot of no-code tools claim to "export to code." Not all of them mean the same thing by it.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Full Test Logic, Not Just Steps', 'testro' ),
							'description' => __( 'Exports include assertions, waits, and data handling. Not just a list of clicks.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Editable From Day One', 'testro' ),
							'description' => __( 'Exported code isn\'t a dead end. Open it in your IDE and keep building right away.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Stays in Sync', 'testro' ),
							'description' => __( 'Update the test in theTestRo, and re-export whenever you need the latest version.', 'testro' ),
						),
					),
					'outro'         => __( 'This matters because a lot of "export" features quietly break the moment you touch the code. theTestRo\'s export is built to be a real starting point. Not a one-time snapshot.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-playwright-test-generator',
					'variant'       => 'default',
					'columns'       => 3,
					'title'         => __( 'AI Playwright Test Generator', 'testro' ),
					'intro'         => __( 'Describe It. Get Playwright Code Back.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain English to Playwright', 'testro' ),
							'description' => __( 'Type "Log in and add an item to the cart." Get a working Playwright test back.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Record-and-Generate', 'testro' ),
							'description' => __( 'Click through a flow once. theTestRo\'s Playwright test generator writes the matching script on its own.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'AI Playwright Testing at Any Skill Level', 'testro' ),
							'description' => __( 'Non-coders build tests visually. Engineers export and extend the code directly.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'clean-readable-playwright-code-export',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Clean, Readable Playwright Code Export', 'testro' ),
					'intro'         => __( 'Code Your Engineers Will Actually Want to Maintain', 'testro' ),
					'intro_extra'   => __( 'Generated code is only useful if a person can read it without decoding it first.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'code',
							'title'       => __( 'Human-Readable Output', 'testro' ),
							'description' => __( 'Exported scripts follow standard Playwright conventions. Not auto-generated spaghetti.', 'testro' ),
						),
						array(
							'icon'        => 'crosshair',
							'title'       => __( 'Structured Locators', 'testro' ),
							'description' => __( 'theTestRo exports strong, well-labeled selectors instead of brittle auto-IDs.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Reusable Functions', 'testro' ),
							'description' => __( 'Common steps export as reusable functions. Not duplicated blocks across every test file.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'run-exported-tests-anywhere',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Run Exported Tests Anywhere', 'testro' ),
					'intro'         => __( 'Your Code, Your Infrastructure, Your Choice', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Local Execution', 'testro' ),
							'description' => __( 'Run exported Playwright tests in your own environment. No dependency on theTestRo\'s platform.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Your Existing CI/CD', 'testro' ),
							'description' => __( 'Drop exported tests straight into Jenkins, GitHub Actions, GitLab, or any pipeline already running Playwright.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Version Control Friendly', 'testro' ),
							'description' => __( 'Commit exported tests to your repo like any other code. Full diff visibility on every change.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'scale-playwright-testing',
					'variant'       => 'default',
					'columns'       => 3,
					'title'         => __( 'Scale Playwright Testing Across Real Browsers and Devices', 'testro' ),
					'intro'         => __( 'Beyond What Playwright Offers Alone', 'testro' ),
					'intro_extra'   => __( 'Playwright covers a lot out of the box. theTestRo\'s Playwright test automation adds what it doesn\'t.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Real Device Coverage', 'testro' ),
							'description' => __( 'Run exported Playwright tests against real browsers and devices. Not just local emulation.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Massively Parallel Execution', 'testro' ),
							'description' => __( 'Scale to hundreds of concurrent Playwright runs. No custom scaling logic needed.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Cross-Browser Consistency', 'testro' ),
							'description' => __( 'Validate the same exported test across Chrome, Firefox, Safari, and Edge from one platform.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'self-healing-exported-playwright-tests',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Self-Healing for Exported Playwright Tests', 'testro' ),
					'intro'         => __( 'Locators That Adapt, Even After Export', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'AI-Powered Locator Healing', 'testro' ),
							'description' => __( 'theTestRo\'s self-healing agent spots and fixes broken locators at runtime. Exported tests stay stable.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Fewer Flaky Runs', 'testro' ),
							'description' => __( 'Structural UI changes get absorbed on their own. Your Playwright suite doesn\'t break on every release.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Stability Without Manual Fixes', 'testro' ),
							'description' => __( 'Your engineers spend less time patching selectors after every export.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'unified-debugging-and-reporting',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Unified Debugging and Reporting', 'testro' ),
					'intro'         => __( 'See Exactly What Happened, Every Run', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Trace Viewer Integration', 'testro' ),
							'description' => __( 'Combine theTestRo\'s execution data with Playwright\'s native trace logs in one dashboard.', 'testro' ),
						),
						array(
							'icon'        => 'video',
							'title'       => __( 'Video and Console Logs', 'testro' ),
							'description' => __( 'Every run captures video, network logs, and console output on its own.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Failure Categorization', 'testro' ),
							'description' => __( 'AI groups failures by root cause. Your team debugs the pattern, not each failure one by one.', 'testro' ),
						),
					),
					'outro'         => __( 'Debugging a failed test shouldn\'t mean digging through five different log files to piece together what happened. theTestRo puts everything in one place, exported test or not.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-playwright-export',
					'variant'       => 'default',
					'columns'       => 2,
					'title'         => __( 'Who Uses Playwright Export', 'testro' ),
					'intro'         => __( 'Built for Teams That Want Speed and Ownership', 'testro' ),
					'intro_extra'   => __( 'Different teams get value from Playwright export in different ways, based on their roles in QA and engineering.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Teams Without Deep Coding Skills', 'testro' ),
							'description' => __( 'Build tests visually. Hand off clean Playwright code to engineering when needed.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Engineering Teams Standardizing on Playwright', 'testro' ),
							'description' => __( 'Adopt a single testing framework across the org. Fed by both code and no-code test creation.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Teams Migrating Off Other Tools', 'testro' ),
							'description' => __( 'Move existing manual test cases into Playwright without writing every script from scratch.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Platform Teams Managing CI/CD', 'testro' ),
							'description' => __( 'Keep tests in version control. Run them through the same pipeline as application code.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'playwright-test-automation',
				),

				array(
					'type'          => 'cta',
					'id'            => 'get-started-playwright-export',
					'title'         => __( 'Start Building Playwright Tests Today', 'testro' ),
					'intro'         => __( 'Speed to Build. Freedom to Own.', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s Playwright automation tool to build faster, without giving up control of their test suite. Speed when you need it. Real code when you want it.', 'testro' ),
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

		'reporting-analytics' => array(
			'slug'   => 'reporting-analytics',
			'title'  => __( 'AI-Powered Test Reports & Analytics Platform', 'testro' ),
			'seo'    => array(
				'title'       => __( 'AI-Powered Test Reports & Analytics for Smarter QA', 'testro' ),
				'description' => __( 'Accelerate defect analysis with theTestRo\'s AI-powered test reports and analytics. Track test execution, identify root causes, and improve release quality.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'AI-Powered Test Reporting for Faster Root Cause Analysis', 'testro' ),
				'subtitle' => __( 'theTestRo doesn\'t just tell you a test failed. It tells you why. Screenshots, logs, and AI-driven root cause analysis land in one dashboard. This test reporting platform means your team spends time fixing issues, not hunting for them.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'the-problem-with-most-test-reports',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'The Problem With Most Test Reports', 'testro' ),
					'intro'         => __( 'A Test Fails. Then the Real Work Starts.', 'testro' ),
					'intro_extra'   => __( 'Most test reporting stops at pass or fail. The actual investigation gets left to a person.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Raw Log Dumps', 'testro' ),
							'description' => __( 'Traditional tools hand you logs with no context. No clear starting point either.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Manual Root Cause Hunting', 'testro' ),
							'description' => __( 'Someone has to piece together what actually broke, step by step.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Screenshots Without Answers', 'testro' ),
							'description' => __( 'A picture of a failure isn\'t the same as knowing why it happened.', 'testro' ),
						),
					),
					'outro'         => __( 'theTestRo\'s AI test analytics is built to skip that manual step entirely. Instead of a person spending an afternoon piecing together clues, the platform does that work the moment a test fails.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'how-ai-test-analytics-works',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'How AI Test Analytics Works', 'testro' ),
					'intro'         => __( 'From Test Failure to Root Cause in Four Steps', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'A Test Fails', 'testro' ),
							'description' => __( 'theTestRo captures the moment automatically. No manual screenshot needed.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Evidence Gets Gathered', 'testro' ),
							'description' => __( 'Screenshots, network logs, and console output collect on their own.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI Analyzes the Pattern', 'testro' ),
							'description' => __( 'theTestRo compares this failure against known patterns and past runs.', 'testro' ),
						),
						array(
							'icon'        => 'circle-check',
							'title'       => __( 'You Get an Answer', 'testro' ),
							'description' => __( 'A likely root cause and suggested fix land in your dashboard, ready to review.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-root-cause-analysis',
					'columns'       => 3,
					'title'         => __( 'AI Root Cause Analysis', 'testro' ),
					'intro'         => __( 'Know Why in Seconds, Not Hours', 'testro' ),
					'intro_extra'   => __( 'Every test failure comes with real diagnostic evidence, generated on its own.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Screenshots at the Moment of Failure', 'testro' ),
							'description' => __( 'See the exact UI state when something broke.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Network and Console Logs', 'testro' ),
							'description' => __( 'Check API responses, timing, and JavaScript errors. No digging needed.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI-Suggested Fixes', 'testro' ),
							'description' => __( 'theTestRo flags likely causes and next steps. Not just a red X.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what turns test automation reporting from a chore into something your team actually uses. A red status alone tells you something\'s wrong. It doesn\'t tell you what to do next. theTestRo aims to close that gap every single time a test fails.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'real-time-dashboards',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Real-Time Dashboards for Every Stakeholder', 'testro' ),
					'intro'         => __( 'The Same Data, Framed for Who\'s Looking at It', 'testro' ),
					'intro_extra'   => __( 'Not everyone needs the same view.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Teams', 'testro' ),
							'description' => __( 'See pass rates and trends across every run.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Developers', 'testro' ),
							'description' => __( 'See failed steps and errors, fast.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Leadership', 'testro' ),
							'description' => __( 'See coverage and release readiness. No raw data to dig through.', 'testro' ),
						),
					),
					'outro'         => __( 'One dashboard. Three views. No manual work to set it up. This is what a real test analytics dashboard should offer every team, not just one.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'step-level-execution-details',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Step-Level Execution Details', 'testro' ),
					'intro'         => __( 'See What Happened at Every Single Step', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'clock',
							'title'       => __( 'Full Execution Timeline', 'testro' ),
							'description' => __( 'Review each step in sequence. Not just a final summary.', 'testro' ),
						),
						array(
							'icon'        => 'crosshair',
							'title'       => __( 'Element and Locator Changes', 'testro' ),
							'description' => __( 'See exactly what shifted if a self-healing action kicked in mid-run.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Pass, Fail, and Skip Breakdown', 'testro' ),
							'description' => __( 'Know precisely how many tests ran, and what happened to each one. Test execution reports break this down clearly, not buried in raw logs.', 'testro' ),
						),
					),
					'outro'         => __( 'None of this replaces judgment. It just means your team spends time deciding what to do about a failure, not hunting for basic facts about what happened.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'isolate-issues-by-environment',
					'columns'       => 3,
					'title'         => __( 'Isolate Issues by Environment and Suite', 'testro' ),
					'intro'         => __( 'Find Patterns, Not Just Single Failures', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Environment Insights', 'testro' ),
							'description' => __( 'Spot issues tied to one browser, OS, or device.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Test Suite Grouping', 'testro' ),
							'description' => __( 'Sort results by feature. See where problems pile up.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Compare Builds', 'testro' ),
							'description' => __( 'Check this run against past ones. Catch new bugs fast.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'requirement-traceability',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Requirement Traceability', 'testro' ),
					'intro'         => __( 'Know What\'s Actually Been Tested', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Test-to-Story Links', 'testro' ),
							'description' => __( 'Tie every test back to the story it covers.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'See Gaps Right Away', 'testro' ),
							'description' => __( 'Know what\'s untested before a release ships.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Records Ready for Audit', 'testro' ),
							'description' => __( 'Full traceability makes audits far less painful.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'exportable-reports',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Exportable Reports in the Format You Need', 'testro' ),
					'intro'         => __( 'Share Results However Your Team Works', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'file-text',
							'title'       => __( 'PDF Reports', 'testro' ),
							'description' => __( 'Build summaries for people outside your team.', 'testro' ),
						),
						array(
							'icon'        => 'download',
							'title'       => __( 'Excel and CSV Exports', 'testro' ),
							'description' => __( 'Pull raw data for a deeper look, or for an audit.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Custom Filters', 'testro' ),
							'description' => __( 'Build the exact report you need. No manual formatting.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'comparison',
					'id'            => 'manual-investigation-vs-ai-test-analytics',
					'title'         => __( 'Manual Investigation vs. AI Test Analytics', 'testro' ),
					'intro'         => __( 'What Changes When Reports Explain Themselves', 'testro' ),
					'heading_level' => 4,
					'text_only'     => true,
					'legacy'        => array(
						'label' => __( 'Manual Investigation', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'theTestRo AI Test Analytics', 'testro' ),
					),
					'rows'          => array(
						array(
							'aspect' => __( 'Finding the cause', 'testro' ),
							'legacy' => __( 'A person digs through logs', 'testro' ),
							'modern' => __( 'AI shows it right away', 'testro' ),
						),
						array(
							'aspect' => __( 'Time to root cause', 'testro' ),
							'legacy' => __( 'Hours', 'testro' ),
							'modern' => __( 'Minutes', 'testro' ),
						),
						array(
							'aspect' => __( 'Evidence gathered', 'testro' ),
							'legacy' => __( 'Whatever gets remembered', 'testro' ),
							'modern' => __( 'Screenshots and logs every time', 'testro' ),
						),
						array(
							'aspect' => __( 'Report building', 'testro' ),
							'legacy' => __( 'Manual, one at a time', 'testro' ),
							'modern' => __( 'Ready to export, any format', 'testro' ),
						),
						array(
							'aspect' => __( 'Coverage view', 'testro' ),
							'legacy' => __( 'Old spreadsheet', 'testro' ),
							'modern' => __( 'Live and current', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'getting-started-with-reports',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Getting Started With Reports', 'testro' ),
					'intro'         => __( 'From First Test Run to Your First Report', 'testro' ),
					'intro_extra'   => __( 'Setting up test reporting shouldn\'t be its own project.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Run a Test', 'testro' ),
							'description' => __( 'Execute a single test or a full suite, however you already work.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Reports Build Automatically', 'testro' ),
							'description' => __( 'theTestRo captures results, screenshots, and logs without extra setup.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Pick Your View', 'testro' ),
							'description' => __( 'Switch between the QA, developer, or leadership dashboard depending on who\'s looking.', 'testro' ),
						),
						array(
							'icon'        => 'download',
							'title'       => __( 'Export or Share', 'testro' ),
							'description' => __( 'Send a PDF, drop a CSV into a spreadsheet, or push results straight to Slack.', 'testro' ),
						),
					),
					'outro'         => __( 'No separate reporting tool to configure, and no template to build from scratch every sprint. The reporting layer is part of the platform from the first test you run, not something bolted on afterward.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'alerts-and-collaboration',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Alerts and Collaboration Built In', 'testro' ),
					'intro'         => __( 'Get Results Where Your Team Already Works', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack and Chat Notifications', 'testro' ),
							'description' => __( 'Send test results straight to a channel after every scheduled run.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'One-Click Bug Filing', 'testro' ),
							'description' => __( 'Turn a failure into a Jira or issue-tracker ticket without leaving the report.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Tag Teammates Directly', 'testro' ),
							'description' => __( 'Comment on a specific step or failure. Context never gets lost in a separate thread.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-relies-on-test-reporting',
					'columns'       => 3,
					'title'         => __( 'Who Relies on Test Reporting and Analytics', 'testro' ),
					'intro'         => __( 'Built for Every Role That Touches Quality', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Engineers', 'testro' ),
							'description' => __( 'Debug faster with full context, not a bare pass/fail line.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Engineering Managers', 'testro' ),
							'description' => __( 'Track trends over time. Not just the latest build.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Product and Release Teams', 'testro' ),
							'description' => __( 'Check coverage gaps before shipping a release.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Compliance and Audit Teams', 'testro' ),
							'description' => __( 'Export clear, traceable records whenever needed.', 'testro' ),
						),
						array(
							'icon'        => 'stethoscope',
							'title'       => __( 'Support and Customer Success Teams', 'testro' ),
							'description' => __( 'Pull up exactly what was tested when a customer reports an issue, instead of guessing.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'reporting-analytics',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-making-sense-of-test-data',
					'title'         => __( 'Start Making Sense of Your Test Data', 'testro' ),
					'intro'         => __( 'Stop Investigating Failures. Start Fixing Them.', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s test reporting and analytics to cut debugging time. Ship with real visibility into quality, not guesswork. See what broke, why it broke, and what to do about it, all in one place.', 'testro' ),
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

		'regression-test-automation' => array(
			'slug'   => 'regression-test-automation',
			'title'  => __( 'Regression Test Automation', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Best Automated Regression Testing Software for QA Teams', 'testro' ),
				'description' => __( 'Best automated regression testing software for faster releases. Detect application changes, reduce maintenance, improve coverage, and ensure software quality', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best Automated Regression Testing Software', 'testro' ),
				'subtitle' => __( 'theTestRo brings AI regression testing to every release. Build tests in plain English, run them in parallel across real browsers, and let self-healing keep your suite stable. Ship with confidence, not a maintenance headache.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'the-regression-testing-trap',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'The Regression Testing Trap', 'testro' ),
					'intro'         => __( 'Most Teams Don\'t Have a Testing Problem. They Have a Maintenance Problem.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Maintenance Eats the Budget', 'testro' ),
							'description' => __( 'Most scripted regression suites spend the bulk of QA time on upkeep, not new coverage.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Slow Cycles Can\'t Keep Up', 'testro' ),
							'description' => __( 'Manual regression cycles that take days don\'t fit a team shipping weekly or daily.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'One UI Change Breaks Ten Tests', 'testro' ),
							'description' => __( 'When a small update cascades into a dozen broken scripts, the suite stops being an asset. It becomes the bottleneck.', 'testro' ),
						),
					),
					'outro'         => __( 'Regression test automation is supposed to solve this. Too often, it just moves the problem somewhere else.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-regression-testing-that-fixes-itself',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'AI Regression Testing That Fixes Itself', 'testro' ),
					'intro'         => __( 'Self-Healing Built In, Not Bolted On', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'Automatic Locator Updates', 'testro' ),
							'description' => __( 'theTestRo spots a changed element and updates the test on its own. No manual fix needed.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Multi-Signal Recognition', 'testro' ),
							'description' => __( 'Elements get identified using more than one signal. A single ID change won\'t break the whole step.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Real Maintenance Reduction', 'testro' ),
							'description' => __( 'Less time spent patching broken tests after every release. More time on real coverage.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what ai regression testing should mean: your suite adapts instead of breaking every time the app changes.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'end-to-end-regression-testing',
					'columns'       => 3,
					'title'         => __( 'End to End Regression Testing Across Your Stack', 'testro' ),
					'intro'         => __( 'Web, Mobile, and API, All From One Platform', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Full-Stack Coverage', 'testro' ),
							'description' => __( 'Combine UI and API checks in the same test, for the truest reflection of a real user journey.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser and Cross-Device', 'testro' ),
							'description' => __( 'Run the same regression suite across thousands of browser and device combinations.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Data-Driven Testing', 'testro' ),
							'description' => __( 'Run one test against many input sets, so edge cases get covered without writing duplicate tests.', 'testro' ),
						),
					),
					'outro'         => __( 'End to end regression testing only works if it actually covers the full path. Not just the UI, and not just the API in isolation.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'build-regression-tests-fast',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Build Regression Tests Fast, Without a Script', 'testro' ),
					'intro'         => __( 'From Idea to Working Test in Minutes, Not Days', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Test Creation', 'testro' ),
							'description' => __( 'Describe a flow, and get a working regression test back. No coding required.', 'testro' ),
						),
						array(
							'icon'        => 'video',
							'title'       => __( 'Record-and-Convert', 'testro' ),
							'description' => __( 'Click through a flow once, and theTestRo turns it into a repeatable test automatically.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Any Skill Level Can Contribute', 'testro' ),
							'description' => __( 'Manual testers and engineers both build coverage in the same simple interface.', 'testro' ),
						),
					),
					'outro'         => __( 'A 30-step regression test that takes hours to script by hand can take minutes to build this way. That difference compounds fast across a whole suite.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-root-cause-analysis',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'AI Root Cause Analysis', 'testro' ),
					'intro'         => __( 'Know Why a Test Failed, Not Just That It Did', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Screenshots and Video', 'testro' ),
							'description' => __( 'See the exact moment a step failed. Every time.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Network and Console Logs', 'testro' ),
							'description' => __( 'Check API responses and errors. No digging through separate tools.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Real Bugs, Filtered From Noise', 'testro' ),
							'description' => __( 'AI tells a genuine regression apart from a flaky, unrelated failure.', 'testro' ),
						),
					),
					'outro'         => __( 'No more hours of manual triage. No more "it passed on my machine."', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'parallel-execution-enterprise-scale',
					'columns'       => 3,
					'title'         => __( 'Parallel Execution at Enterprise Scale', 'testro' ),
					'intro'         => __( 'Full Regression Suites in Minutes, Not Overnight', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Massively Parallel Runs', 'testro' ),
							'description' => __( 'Run hundreds of tests at the same time. Not one after another.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Fast Feedback on Every Build', 'testro' ),
							'description' => __( 'A suite that used to take hours reports back before your coffee\'s done.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Scales With Your Suite', 'testro' ),
							'description' => __( 'Wait time stays flat as coverage grows. It doesn\'t climb every sprint.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'automated-regression-testing-best-practices',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Automated Regression Testing Best Practices', 'testro' ),
					'intro'         => __( 'What Actually Makes a Regression Suite Work', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'target',
							'title'       => __( 'Automate the Repeatable, Not Everything', 'testro' ),
							'description' => __( 'Automate stable, high-value flows. Leave true exploratory testing to a person.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Update Shared Components Once', 'testro' ),
							'description' => __( 'Reusable step groups mean a login flow update applies everywhere it\'s used, on its own.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Run Regression on Every Commit', 'testro' ),
							'description' => __( 'Waiting until the end of a sprint to test makes bugs expensive to fix.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Track Trends, Not Just Pass or Fail', 'testro' ),
							'description' => __( 'Watch flakiness and cycle time over time. Not just the latest run.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Keep the Suite Lean', 'testro' ),
							'description' => __( 'Retire tests that no longer add value. The suite stays fast and trustworthy.', 'testro' ),
						),
					),
					'outro'         => __( 'Automated regression testing best practices come down to one idea. Automate on purpose, and keep the suite healthy as it grows.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'cicd-integration-built-in',
					'variant'       => 'tint',
					'title'         => __( 'CI/CD Integration Built In', 'testro' ),
					'intro'         => __( 'Regression That Runs Itself, On Every Build', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with Jenkins, GitHub Actions, GitLab, Azure DevOps, and CircleCI.', 'testro' ),
					'intro_body'    => __( 'A commit or pull request can start a full run on its own. Results gate the deployment before a risky change reaches production.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-regression-testing-by-use-case',
					'columns'       => 4,
					'title'         => __( 'Enterprise Regression Testing, By Use Case', 'testro' ),
					'intro'         => __( 'Regression Testing That Fits How Your Systems Actually Work', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'database',
							'title'       => __( 'ERP and Business Systems', 'testro' ),
							'description' => __( 'Cover complex workflows across finance, payroll, and supply chain. No need to rebuild the suite every upgrade.', 'testro' ),
						),
						array(
							'icon'        => 'retail',
							'title'       => __( 'Retail and E-Commerce', 'testro' ),
							'description' => __( 'Keep coverage steady through fast releases and seasonal traffic spikes.', 'testro' ),
						),
						array(
							'icon'        => 'stethoscope',
							'title'       => __( 'Healthcare and Insurance', 'testro' ),
							'description' => __( 'Generate audit-ready evidence on its own at every run. Screenshots, logs, and step records included.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'SaaS and Software Vendors', 'testro' ),
							'description' => __( 'Run full regression on every pull request. A broken release is a support ticket and a churn risk.', 'testro' ),
						),
					),
					'outro'         => __( 'Enterprise regression testing has to hold up across all of these at once. Not just one team\'s use case.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'reporting-that-actually-helps',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Reporting That Actually Helps', 'testro' ),
					'intro'         => __( 'Comprehensive Results for Every Release', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Real-Time Dashboards', 'testro' ),
							'description' => __( 'Track pass rates and history on every run.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Instant Alerts', 'testro' ),
							'description' => __( 'Get notified in Slack or email the moment a run fails.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Shareable Reports', 'testro' ),
							'description' => __( 'Give the whole team a clear view of release readiness. No manual status update needed.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-regression-testing',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo for Regression Testing', 'testro' ),
					'intro'         => __( 'Built for Every Role in the QA Chain', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'QA Managers', 'testro' ),
							'description' => __( 'Get pass rates, coverage, and stability trends on their own. No spreadsheet needed.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Practitioners and Manual Testers', 'testro' ),
							'description' => __( 'Automate what you already know how to test. No scripting language to learn.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Automation Engineers', 'testro' ),
							'description' => __( 'Spend less time fixing broken locators. More time on real coverage design.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'DevOps Engineers', 'testro' ),
							'description' => __( 'Trigger regression on its own on every commit. Gate deployments on the results.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'regression-test-automation',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-automating-regression-testing',
					'title'         => __( 'Start Automating Regression Testing Today', 'testro' ),
					'intro'         => __( 'Ship Every Release With Confidence', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s regression test automation. Cut maintenance time. Catch real bugs before they reach production.', 'testro' ),
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

		'ai-automated-sanity-testing' => array(
			'slug'   => 'ai-automated-sanity-testing',
			'title'  => __( 'AI Automated Sanity Testing', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Best Tool for Automated Sanity Testing | AI-Powered QA', 'testro' ),
				'description' => __( 'Find the best tool for automated sanity testing to validate critical functionality, reduce manual testing, accelerate releases, and improve software quality.', 'testro' ),
			),

			'hero' => array(
				'title'          => __( 'Best Tool for Automated Sanity Testing', 'testro' ),
				'subtitle'       => __( 'theTestRo brings automated sanity testing to every release. Verify that a fix or new feature works in minutes.', 'testro' ),
				'subtitle_extra' => __( 'No one has to click through the same checks by hand every time.', 'testro' ),
				'actions'        => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-sanity-testing-actually-checks',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'What Sanity Testing Actually Checks', 'testro' ),
					'intro'         => __( 'A Quick Check, Not a Deep One', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'target',
							'title'       => __( 'Focused, Not Exhaustive', 'testro' ),
							'description' => __( 'Sanity tests cover the specific area that changed. Not the whole application.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'A Gate Before Deeper Testing', 'testro' ),
							'description' => __( 'A passing sanity check clears the way for full regression or QA. A failing one stops it there.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Fast by Design', 'testro' ),
							'description' => __( 'These checks should run in minutes, not hours. A team isn\'t blocked waiting on results.', 'testro' ),
						),
					),
					'outro'         => __( 'Automated sanity testing keeps that speed intact, even as a codebase grows and builds ship more often.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-powered-sanity-testing-at-every-build',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'AI-Powered Sanity Testing at Every Build', 'testro' ),
					'intro'         => __( 'Verification That Keeps Up With Your Release Pace', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Runs on Every New Build', 'testro' ),
							'description' => __( 'theTestRo checks the changed area on its own, the moment a new build is ready.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI Flags What to Test', 'testro' ),
							'description' => __( 'Instead of a person guessing which checks matter most, AI points to the areas a recent change likely affects.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Consistent Results, Every Time', 'testro' ),
							'description' => __( 'No variation from one tester\'s judgment to another\'s. The same checks run the same way, every build.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what ai automated sanity testing is supposed to solve. The manual guesswork that comes with deciding what to check and when.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'sanity-smoke-regression-clarified',
					'columns'       => 3,
					'title'         => __( 'Sanity Testing, Smoke Testing, and Regression, Clarified', 'testro' ),
					'intro'         => __( 'Where Sanity Testing Fits in the Bigger Picture', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Smoke Testing Comes First', 'testro' ),
							'description' => __( 'It checks whether a build is stable enough to test at all.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Sanity Testing Comes Next', 'testro' ),
							'description' => __( 'It confirms a specific fix or feature works, after smoke testing passes.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Regression Testing Goes Deeper', 'testro' ),
							'description' => __( 'It checks that the rest of the system still works too. Not just the changed part.', 'testro' ),
						),
					),
					'outro'         => __( 'theTestRo automates all three from the same platform. A team doesn\'t need separate tools for each stage.', 'testro' ),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-automated-sanity-testing-works',
					'title'         => __( 'How Automated Sanity Testing Works', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'A New Build Lands', 'testro' ),
							'description' => __( 'theTestRo detects it automatically, or picks it up from a CI/CD trigger.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'AI Identifies What Changed', 'testro' ),
							'description' => __( 'The relevant sanity checks get selected based on the actual code or fix that shipped.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Checks Run in Minutes', 'testro' ),
							'description' => __( 'theTestRo executes the focused test set, not the whole regression suite.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'A Clear Signal Comes Back', 'testro' ),
							'description' => __( 'Pass or fail, with detail, so the team knows whether to proceed.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'comparison',
					'id'            => 'manual-vs-automated-sanity-testing',
					'title'         => __( 'Manual Sanity Checks vs. Automated Sanity Testing', 'testro' ),
					'intro'         => __( 'What Changes When a Person Isn\'t Doing It By Hand', 'testro' ),
					'heading_level' => 3,
					'text_only'     => true,
					'legacy'        => array(
						'label' => __( 'Manual Sanity Checks', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'Automated Sanity Testing', 'testro' ),
					),
					'rows'          => array(
						array(
							'aspect' => __( 'Speed', 'testro' ),
							'legacy' => __( 'A manual sanity pass takes as long as a person needs.', 'testro' ),
							'modern' => __( 'Automated sanity testing runs in a fixed, predictable window.', 'testro' ),
						),
						array(
							'aspect' => __( 'Consistency', 'testro' ),
							'legacy' => __( 'A tired tester on a Friday afternoon might skip a step.', 'testro' ),
							'modern' => __( 'An automated check never does.', 'testro' ),
						),
						array(
							'aspect' => __( 'Coverage Over Time', 'testro' ),
							'legacy' => __( 'Manual checks tend to shrink under deadline pressure.', 'testro' ),
							'modern' => __( 'Automated ones don\'t.', 'testro' ),
						),
						array(
							'aspect' => __( 'Who Can Do It', 'testro' ),
							'legacy' => __( 'Manual sanity testing needs an available tester.', 'testro' ),
							'modern' => __( 'Automated sanity testing runs whether anyone\'s watching or not.', 'testro' ),
						),
					),
					'outro'         => __( 'Manual sanity checks still have a place, especially for genuinely new, unscripted exploration. But the repeatable part of the job is exactly where automation earns its keep.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'build-sanity-tests-in-plain-english',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Build Sanity Tests in Plain English', 'testro' ),
					'intro'         => __( 'No Scripts, No Waiting on an Engineer', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Test Creation', 'testro' ),
							'description' => __( 'Describe what should happen after a fix. Get a working sanity test back.', 'testro' ),
						),
						array(
							'icon'        => 'video',
							'title'       => __( 'Record-and-Convert', 'testro' ),
							'description' => __( 'Click through the flow once. theTestRo turns it into a repeatable check.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Any Tester Can Build One', 'testro' ),
							'description' => __( 'QA staff without a coding background can build and maintain sanity checks directly.', 'testro' ),
						),
					),
					'outro'         => __( 'A sanity test built this way can be ready before the next standup. Not the next sprint.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'self-healing-keeps-sanity-checks-stable',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Self-Healing Keeps Sanity Checks Stable', 'testro' ),
					'intro'         => __( 'Checks That Don\'t Break Just Because the UI Moved', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'Automatic Adjustment', 'testro' ),
							'description' => __( 'A small UI shift doesn\'t break a check theTestRo can still resolve on its own.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Less Time on False Failures', 'testro' ),
							'description' => __( 'A team spends time on real problems. Not chasing down a test that broke for the wrong reason.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Reliable Over Many Builds', 'testro' ),
							'description' => __( 'A sanity suite stays trustworthy release after release. Not just the week it was written.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'continuous-sanity-testing-in-your-pipeline',
					'columns'       => 3,
					'title'         => __( 'Continuous Sanity Testing in Your Pipeline', 'testro' ),
					'intro'         => __( 'Verification That Happens Without Anyone Asking For It', 'testro' ),
					'intro_extra'   => __( 'Continuous sanity testing means a check runs the moment a build is ready. Not whenever someone remembers to run it by hand.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'CI/CD-Triggered Runs', 'testro' ),
							'description' => __( 'A new build kicks off the relevant sanity checks on its own.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Fast Pass or Fail Signal', 'testro' ),
							'description' => __( 'A team knows within minutes whether a fix actually works.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Fits Existing Tools', 'testro' ),
							'description' => __( 'theTestRo connects with Jenkins, GitHub Actions, GitLab, and Azure DevOps. Nothing extra to bolt on.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'core-sanity-test-scenarios',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Core Sanity Test Scenarios', 'testro' ),
					'intro'         => __( 'What Gets Checked, and Why It Matters', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Fix Verification', 'testro' ),
							'description' => __( 'Confirm the specific bug that was reported is actually fixed.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Critical Path Checks', 'testro' ),
							'description' => __( 'Test login, checkout, or another core flow that touches almost everyone.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Data Flow Checks', 'testro' ),
							'description' => __( 'Confirm inputs and outputs still work right after a backend change.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Integration Checks', 'testro' ),
							'description' => __( 'Check that a change hasn\'t quietly broken a connected system or API.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'UI Spot Checks', 'testro' ),
							'description' => __( 'Confirm buttons, forms, and layout still behave as expected around the change.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'fast-reporting-for-fast-decisions',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Fast Reporting for Fast Decisions', 'testro' ),
					'intro'         => __( 'Know in Minutes Whether to Proceed', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Instant Pass or Fail', 'testro' ),
							'description' => __( 'See results the moment a sanity run finishes. No manual write-up needed.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Clear Failure Detail', 'testro' ),
							'description' => __( 'Screenshots and logs show exactly what broke. A team isn\'t debugging blind.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Shareable With the Team', 'testro' ),
							'description' => __( 'Results post to Slack or email on their own. Nobody has to ask for a status update.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'automated-sanity-testing-best-practices',
					'columns'       => 4,
					'title'         => __( 'Automated Sanity Testing Best Practices', 'testro' ),
					'intro'         => __( 'What Makes a Sanity Suite Actually Useful', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'target',
							'title'       => __( 'Keep It Narrow', 'testro' ),
							'description' => __( 'Sanity tests exist to be fast. Too much scope turns them into a slow regression suite.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Update Checks as Features Change', 'testro' ),
							'description' => __( 'A sanity test tied to an outdated flow gives false confidence. Not real verification.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Run on Every Build, Not Just Before Release', 'testro' ),
							'description' => __( 'Waiting until the end of a sprint defeats the purpose of a quick check.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Pair With Smoke and Regression', 'testro' ),
							'description' => __( 'Sanity testing works best as one layer in a full testing strategy. Not a replacement for the others.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-sanity-testing',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo for Sanity Testing', 'testro' ),
					'intro'         => __( 'Built for Teams That Ship Often', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Teams', 'testro' ),
							'description' => __( 'Verify fixes fast, without pulling focus from deeper testing work.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Developers', 'testro' ),
							'description' => __( 'Confirm a fix actually works before handing it off. No waiting on a full QA cycle.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Release Managers', 'testro' ),
							'description' => __( 'Get a fast go or no-go signal before a build moves forward.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'DevOps Engineers', 'testro' ),
							'description' => __( 'Keep sanity checks running on their own as part of the pipeline. No manual trigger needed.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'ai-automated-sanity-testing',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-automating-sanity-testing',
					'title'         => __( 'Start Automating Sanity Testing Today', 'testro' ),
					'intro'         => __( 'Know a Fix Works, in Minutes', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s automated sanity tests to verify builds faster. Catch broken fixes before they reach a release.', 'testro' ),
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

		'automated-functional-testing' => array(
			'slug'   => 'automated-functional-testing',
			'title'  => __( 'Automated Functional Testing', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Best Automation Tools for Functional Testing', 'testro' ),
				'description' => __( 'Discover the best automation tools for functional testing. Validate business workflows, improve test coverage, accelerate releases, and ensure software quality.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Automated Functional Testing That Ships 10x Faster', 'testro' ),
				'subtitle' => __( 'theTestRo brings AI-powered functional testing to every workflow your app supports. Build tests in plain English. Run them across web, mobile, and API. Let self-healing keep them stable release after release.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'why-teams-choose-testro-for-functional-testing',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Why Teams Choose theTestRo for Functional Testing', 'testro' ),
					'intro'         => __( 'Speed, Stability, and Scale, in One Platform', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Faster Test Authoring', 'testro' ),
							'description' => __( 'Build tests from a user story, a design file, or a plain-English line. No coding, no learning curve.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Continuous Execution', 'testro' ),
							'description' => __( 'Schedule runs across environments, or start them right from your CI/CD pipeline on every build.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'AI-Powered Maintenance', 'testro' ),
							'description' => __( 'Locators update on their own when the UI changes. A test suite doesn\'t quietly fall apart between releases.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what functional test automation should feel like. Fast to build, reliable to run, and light on upkeep.', 'testro' ),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-it-works',
					'title'         => __( 'How It Works', 'testro' ),
					'intro'         => __( 'From Requirement to Passing Test in Four Steps', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'file-text',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Feed in a Requirement', 'testro' ),
							'description' => __( 'Point theTestRo at a Jira story, a Figma file, or just a plain description.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'AI Drafts the Test', 'testro' ),
							'description' => __( 'A working test comes back in seconds, with steps and checks included.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Review and Adjust', 'testro' ),
							'description' => __( 'Check the draft, tweak anything that needs it, and approve it.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'Run and Repeat', 'testro' ),
							'description' => __( 'The test runs on every future build and heals itself when the app changes.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'manual-vs-automated-functional-testing',
					'columns'       => 4,
					'title'         => __( 'Manual Testing vs. Automated Functional Testing', 'testro' ),
					'intro'         => __( 'What Changes When a Test Runs Itself', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Speed', 'testro' ),
							'description' => __( 'A person re-runs the same checks by hand, every time. Automated tests run on demand, day or night.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Consistency', 'testro' ),
							'description' => __( 'Manual results shift with who\'s testing and how tired they are. Automated checks run the same way, every time.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Coverage', 'testro' ),
							'description' => __( 'Available hours cap manual testing. Automation scales to hundreds of scenarios without adding staff.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Cost Over Time', 'testro' ),
							'description' => __( 'A manual process gets more expensive as an app grows. An automated one gets more valuable.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-automated-functional-testing-actually-checks',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'What Automated Functional Testing Actually Checks', 'testro' ),
					'intro'         => __( 'Confirming the App Does What It\'s Supposed To', 'testro' ),
					'intro_extra'   => __( 'Functional testing checks that a feature behaves the way it was designed to. Seen from the user\'s point of view.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'target',
							'title'       => __( 'User Workflows, Not Just Code Paths', 'testro' ),
							'description' => __( 'A functional test checks whether a real task, like checkout or sign-up, works start finishing.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Expected Outcomes, Every Time', 'testro' ),
							'description' => __( 'Given a specific input, does the app give back the right result?', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Coverage Across the Whole Stack', 'testro' ),
							'description' => __( 'UI and API checks together give a truer picture than testing either layer alone.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-functional-testing-at-every-stage',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'AI Functional Testing at Every Stage', 'testro' ),
					'intro'         => __( 'AI Support From Test Creation to Maintenance', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Assisted Test Generation', 'testro' ),
							'description' => __( 'Turn a Jira story, a design file, or a plain description into a working test.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Self-Healing Locators', 'testro' ),
							'description' => __( 'A UI shift doesn\'t break a test theTestRo can still work out on its own.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Smart Failure Diagnose', 'testro' ),
							'description' => __( 'A test fails, and AI helps tell a real bug apart from a flaky, unrelated glitch.', 'testro' ),
						),
					),
					'outro'         => __( 'AI functional testing should deliver this. Less manual scripting, less manual triage, more real test coverage.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'build-end-to-end-functional-tests',
					'columns'       => 3,
					'title'         => __( 'Build End-to-End Functional Tests', 'testro' ),
					'intro'         => __( 'Full Workflows, Not Just Isolated Screens', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Combine UI and API Checks', 'testro' ),
							'description' => __( 'Check a complete user story. Not a single page on its own.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Reusable Test Components', 'testro' ),
							'description' => __( 'Turn common steps like login into blocks you use across every test.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Full Feature Coverage', 'testro' ),
							'description' => __( 'We test every workflow that matters to users. Not just the easy ones to script.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'continuous-functional-testing-in-your-pipeline',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Continuous Functional Testing in Your Pipeline', 'testro' ),
					'intro'         => __( 'Testing That Runs With Every Build, Not After It', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'CI/CD-Triggered Runs', 'testro' ),
							'description' => __( 'A new build kicks off the right tests on its own.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Parallel Execution', 'testro' ),
							'description' => __( 'Run tests across environments and devices at once. Feedback lands in minutes.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Release Cycles', 'testro' ),
							'description' => __( 'Continuous checks mean fewer surprises right before a launch.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'data-driven-functional-testing',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Data-Driven Functional Testing', 'testro' ),
					'intro'         => __( 'One Test, Every Scenario That Matters', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Parameterized Test Runs', 'testro' ),
							'description' => __( 'Run one test against many different inputs. No need to write a new test for each.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Realistic Test Data on Demand', 'testro' ),
							'description' => __( 'Make believable data on its own, or pull it from a spreadsheet.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Broader Coverage, Less Manual Work', 'testro' ),
							'description' => __( 'Your suite covers edge cases without growing in size.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'reporting-built-for-fast-decisions',
					'columns'       => 3,
					'title'         => __( 'Reporting Built for Fast Decisions', 'testro' ),
					'intro'         => __( 'Know What Happened, and Why, Right Away', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'activity',
							'title'       => __( 'Step-Level Detail', 'testro' ),
							'description' => __( 'See logs, screenshots, and video for every step of every run.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Shareable Dashboards', 'testro' ),
							'description' => __( 'Give the whole team the same view of test health. No manual status update needed.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Instant Alerts', 'testro' ),
							'description' => __( 'Receive a Slack or email notification the moment a functional test fails.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'one-platform-for-authoring-management-and-execution',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'One Platform for Authoring, Management, and Execution', 'testro' ),
					'intro'         => __( 'Everything in One Place, Not Five Separate Tools', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Test Authoring', 'testro' ),
							'description' => __( 'Recorder, plain-English tests, an element list, and reusable steps.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Test Management', 'testro' ),
							'description' => __( 'Version control, review flows, role-based access, and test data.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Test Execution', 'testro' ),
							'description' => __( 'Cloud device coverage, local testing, parallel runs, and set schedules.', 'testro' ),
						),
					),
					'outro'         => __( 'Functional testing software split across separate tools just adds friction. theTestRo keeps the full workflow in one spot.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'fits-into-your-existing-workflow',
					'variant'       => 'tint',
					'title'         => __( 'Fits Into Your Existing Workflow', 'testro' ),
					'intro'         => __( 'No New Process to Learn', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with Jira, Jenkins, GitHub Actions, Azure DevOps, and GitLab. Functional testing plugs right into the tools your team already uses. Results flow back where your team already looks. Not into a separate dashboard nobody checks.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-functional-testing-at-scale',
					'columns'       => 3,
					'title'         => __( 'Enterprise Functional Testing at Scale', 'testro' ),
					'intro'         => __( 'Built for Teams Shipping Constantly', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Cross-Team Visibility', 'testro' ),
							'description' => __( 'Every team touching a shared feature sees the same results and coverage.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Role-Based Access', 'testro' ),
							'description' => __( 'Control who can build, edit, and approve tests across a growing org.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Audit-Ready Records', 'testro' ),
							'description' => __( 'Clear links between requirements, tests, and results back up compliance reviews. No extra work needed.', 'testro' ),
						),
					),
					'outro'         => __( 'Enterprise functional testing has to hold up across many teams and releases at once. Not just a single small app.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-functional-testing',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Who Uses theTestRo for Functional Testing', 'testro' ),
					'intro'         => __( 'Built for Every Role That Touches Quality', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Engineers', 'testro' ),
							'description' => __( 'Build wider coverage. No need to write every test by hand.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Manual Testers', 'testro' ),
							'description' => __( 'Turn old test cases into automated ones. No scripting needed.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Developers', 'testro' ),
							'description' => __( 'Confirm a feature works before handing it off for a deeper look.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Engineering Managers', 'testro' ),
							'description' => __( 'Get a clear, current view of coverage across the whole product.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Release Managers', 'testro' ),
							'description' => __( 'Get a fast go or no-go signal before a build ships.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'automated-functional-testing',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-automating-functional-testing',
					'title'         => __( 'Start Automating Functional Testing Today', 'testro' ),
					'intro'         => __( 'Ship Every Feature With Confidence', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo. Build faster. Test more. Maintain less.', 'testro' ),
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

		/* ------------------------------------------------------------------ */
		/* End-to-End Testing                                                 */
		/* ------------------------------------------------------------------ */
		'end-to-end-testing' => array(
			'slug'   => 'end-to-end-testing',
			'title'  => __( 'End-to-End Testing', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Best Automated End-to-End Testing Tool for QA Teams', 'testro' ),
				'description' => __( 'Discover the best automated end-to-end testing tool to validate complete user journeys, automate workflows, accelerate releases, and improve software quality.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Automated End-to-End Testing That Heals Itself', 'testro' ),
				'subtitle' => __( 'theTestRo builds, runs, and maintains end-to-end tests. Your team spends time finding real bugs. Not chasing broken locators. Replace fragile scripts with an AI end-to-end testing platform that adapts as your app changes.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'why-teams-choose-testro-for-end-to-end-testing',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Why Teams Choose theTestRo for End-to-End Testing', 'testro' ),
					'intro'         => __( 'From Days of Regression to Minutes of Automation', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Faster Regression Cycles', 'testro' ),
							'description' => __( 'Turn a regression pass that used to take days into a run that finishes while you grab coffee.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Coverage Without the Repetition', 'testro' ),
							'description' => __( 'Deliver the same experience across browsers, devices, and regions. No need to re-test the same flow by hand five times.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Full Workflows, Not Isolated Screens', 'testro' ),
							'description' => __( 'Test UI actions and the API calls behind them together. Integration issues surface before a release, not after.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-end-to-end-testing-actually-validates',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'What End-to-End Testing Actually Validates', 'testro' ),
					'intro'         => __( 'The Whole Journey, Not Just One Step', 'testro' ),
					'intro_extra'   => __( 'End-to-end testing checks that a complete workflow, not a single screen, works right from starting to finishing.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Real User Scenarios', 'testro' ),
							'description' => __( 'Logging in, completing a purchase, submitting a form. The paths a real person actually takes.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Every Involved Layer', 'testro' ),
							'description' => __( 'We check every involved layer together—UI, APIs, databases, and any connected service.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Confidence Before Release', 'testro' ),
							'description' => __( 'A passing end-to-end test means the whole journey works. Not just a piece of it.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-end-to-end-testing-at-every-stage',
					'columns'       => 3,
					'title'         => __( 'AI End-to-End Testing at Every Stage', 'testro' ),
					'intro'         => __( 'AI Support From First Test to Last Fix', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Generate Tests From What You Already Have', 'testro' ),
							'description' => __( 'Turn a Jira ticket, a design file, or a screenshot into a working test on its own.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Self-Healing During Execution', 'testro' ),
							'description' => __( 'A locator breaks mid-run. theTestRo finds the right element and keeps going.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'Root Cause, Not Just a Red X', 'testro' ),
							'description' => __( 'A test fails, and AI helps figure out if it\'s a real bug, a flaky step, or an environment issue.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what ai end-to-end testing should deliver. Less time maintaining tests. More time spent trusting them.', 'testro' ),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-it-works',
					'title'         => __( 'How It Works', 'testro' ),
					'intro'         => __( 'From Requirement to Passing Test in Four Steps', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'file-text',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Feed in a Requirement', 'testro' ),
							'description' => __( 'Point theTestRo at a Jira ticket, a design file, or a plain-English description.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'AI Builds the Test', 'testro' ),
							'description' => __( 'A working end-to-end test comes back in seconds, spanning UI and API steps.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Review and Approve', 'testro' ),
							'description' => __( 'Check the draft, adjust anything that needs it, and approve it for your suite.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'Run and Let It Heal', 'testro' ),
							'description' => __( 'The test runs on every future build, and adapts on its own when the app changes underneath it.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'manual-vs-automated-end-to-end-testing',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Manual Testing vs. Automated End-to-End Testing', 'testro' ),
					'intro'         => __( 'What Actually Changes When a Test Runs Itself', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Speed', 'testro' ),
							'description' => __( 'A person walks through the same workflow by hand, every time. Automated end-to-end testing runs on demand, day or night.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Consistency', 'testro' ),
							'description' => __( 'Manual results shift depending on who\'s testing and how much time they have. Automated tests run the same steps the same way, every time.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Coverage', 'testro' ),
							'description' => __( 'Available hours and staffing cap manual testing. Automation scales to dozens of workflows without adding headcount.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Confidence Over Time', 'testro' ),
							'description' => __( 'A manual process gets harder to trust as an app grows more complex. An automated one gets more valuable.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'codeless-test-automation-for-the-whole-qa-team',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Codeless Test Automation for the Whole QA Team', 'testro' ),
					'intro'         => __( 'Every Tester Can Build Coverage, Not Just Engineers', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Test Creation', 'testro' ),
							'description' => __( 'Describe a workflow. Get a working test back. No scripting needed.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Onboarding', 'testro' ),
							'description' => __( 'New testers add real coverage in days. Not months.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Less Dependence on a Few Experts', 'testro' ),
							'description' => __( 'Coverage doesn\'t bottleneck on one or two people who know the framework.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'one-platform-instead-of-five-separate-tools',
					'columns'       => 3,
					'title'         => __( 'One Platform Instead of Five Separate Tools', 'testro' ),
					'intro'         => __( 'Stop Managing Tool Sprawl', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Automation, Devices, and APIs Together', 'testro' ),
							'description' => __( 'Web, mobile, and API testing live in one platform. Not three separate subscriptions.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Test Management Built In', 'testro' ),
							'description' => __( 'Requirements, version control, and review flows sit right next to the tests themselves. This is end-to-end testing software built as one system, not five bolted together.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Less Switching, More Doing', 'testro' ),
							'description' => __( 'One end-to-end testing platform means less time moving data between disconnected tools.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'self-healing-tests-that-adapt-to-ui-changes',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Self-Healing Tests That Adapt to UI Changes', 'testro' ),
					'intro'         => __( 'A UI Update Shouldn\'t Mean a Broken Suite', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'Automatic Locator Detection', 'testro' ),
							'description' => __( 'theTestRo spots a changed element during a run and finds the right one on its own.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Execution Continues', 'testro' ),
							'description' => __( 'A test doesn\'t stop cold the moment something shifts. It adapts and keeps going.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Stability That Holds Up Over Time', 'testro' ),
							'description' => __( 'A suite built this way stays reliable release after release. Not just the week it launched.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'cloud-execution-without-the-infrastructure',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Cloud Execution Without the Infrastructure', 'testro' ),
					'intro'         => __( 'Run End-to-End Tests Without Managing Servers', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Zero Setup, Instant Access', 'testro' ),
							'description' => __( 'Start testing with no software to install and no environment to configure.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Scale on Demand', 'testro' ),
							'description' => __( 'Run more tests in parallel during a heavy release week. No extra infrastructure needed.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Built for Distributed Teams', 'testro' ),
							'description' => __( 'One shared workspace, no matter where each tester is working from.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'cross-platform-end-to-end-testing',
					'columns'       => 3,
					'title'         => __( 'Cross-Platform End-to-End Testing', 'testro' ),
					'intro'         => __( 'Web, Mobile, and API, in the Same Workflow', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Real Devices, Not Emulators', 'testro' ),
							'description' => __( 'Test iOS and Android apps on real hardware alongside your web app.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Thousands of Browser and OS Combinations', 'testro' ),
							'description' => __( 'Cover the real spread of environments your users are on.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'One Test, Multiple Layers', 'testro' ),
							'description' => __( 'A single end-to-end test can span UI and API checks. No splitting coverage across separate suites.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-end-to-end-testing-at-scale',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Enterprise End-to-End Testing at Scale', 'testro' ),
					'intro'         => __( 'Built for Organizations With a Lot Riding on Every Release', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Parallel Execution at Volume', 'testro' ),
							'description' => __( 'Run large test suites across environments. No multi-hour wait for results.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Role-Based Access and Governance', 'testro' ),
							'description' => __( 'Control who can build, edit, and approve tests across a growing org.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Audit-Ready Records', 'testro' ),
							'description' => __( 'Clear links between requirements, tests, and results back up compliance reviews. No extra work needed.', 'testro' ),
						),
					),
					'outro'         => __( 'Enterprise end-to-end testing has to hold up across many products, teams, and releases at once. Not just a single small app.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'fits-into-your-existing-workflow',
					'variant'       => 'tint',
					'title'         => __( 'Fits Into Your Existing Workflow', 'testro' ),
					'intro'         => __( 'No New Process to Learn', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with Jira, Jenkins, GitHub Actions, Azure DevOps, and GitLab. End-to-end tests plug right into the pipeline your team already runs. Results land where your team already looks. Not in a separate dashboard nobody checks.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-end-to-end-testing',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo for End-to-End Testing', 'testro' ),
					'intro'         => __( 'Built for Every Role Touching Release Quality', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Engineers', 'testro' ),
							'description' => __( 'Build full-journey coverage without hand-scripting every step.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Manual Testers', 'testro' ),
							'description' => __( 'Turn known workflows into automated tests. No coding background needed.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'DevOps Teams', 'testro' ),
							'description' => __( 'Trigger end-to-end runs on their own as part of the release pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Engineering Managers', 'testro' ),
							'description' => __( 'Get a clear signal on release readiness before code reaches production.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'end-to-end-testing',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-automating-end-to-end-testing',
					'title'         => __( 'Start Automating End-to-End Testing Today', 'testro' ),
					'intro'         => __( 'Ship Full Workflows With Confidence', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo\'s end-to-end test automation. Catch real issues early across every layer of the stack.', 'testro' ),
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

		/* ------------------------------------------------------------------ */
		/* Software Testing Use Cases (hub)                                   */
		/* ------------------------------------------------------------------ */
		'use-cases' => array(
			'slug'   => 'use-cases',
			'title'  => __( 'Software Testing Use Cases', 'testro' ),
			'seo'    => array(
				'title'       => __( 'Software Testing Use Cases | theTestRo', 'testro' ),
				'description' => __( 'Explore software testing use cases including regression, smoke, sanity, functional, integration, end-to-end, frontend, backend, API, and UI testing.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Software Testing Use Cases for Modern QA Teams', 'testro' ),
				'subtitle' => __( 'theTestRo supports every stage of software testing, from a quick sanity check to a full end-to-end run. Explore the software testing use cases your team handles every day, and see how AI makes each one faster.', 'testro' ),
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
					'type'          => 'feature-grid',
					'id'            => 'why-software-testing-use-cases-matter',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Why Software Testing Use Cases Matter', 'testro' ),
					'intro'         => __( 'Every Use Case Solves a Different Problem', 'testro' ),
					'intro_extra'   => __( 'Not every test serves the same purpose. Knowing which one to run, and when, is what separates a fast, reliable release process from a slow, risky one.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Improve Software Quality', 'testro' ),
							'description' => __( 'Catch issues before they reach a real user, not after.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Accelerate Release Cycles', 'testro' ),
							'description' => __( 'Spend less time waiting on manual checks between builds.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Reduce Production Defects', 'testro' ),
							'description' => __( 'Fewer bugs slip through when the right test runs at the right stage.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Increase Test Coverage', 'testro' ),
							'description' => __( 'Cover more of the app without multiplying manual effort.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Enable Continuous Testing', 'testro' ),
							'description' => __( 'Keep quality checks running on their own, not just before a major production release.', 'testro' ),
						),
					),
					'outro'         => __( 'Software testing scenarios differ in scope and timing, but they all point toward the same goal: shipping with confidence.', 'testro' ),
				),

				array(
					'type'          => 'use-case-grid',
					'id'            => 'explore-software-testing-use-cases',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Explore Software Testing Use Cases', 'testro' ),
					'intro'         => __( 'Find the Right Test for the Right Moment', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Regression Testing', 'testro' ),
							'description' => __( 'Confirm that new code hasn\'t broken what already worked. Regression testing is the safety net every release depends on.', 'testro' ),
							'href'        => testro_nav_url( 'regression-test-automation' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'regression',
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Smoke Testing', 'testro' ),
							'description' => __( 'Check that a build is stable enough to test at all. A quick pass before deeper testing begins.', 'testro' ),
							'motif'       => 'smoke',
						),
						array(
							'icon'        => 'circle-check',
							'title'       => __( 'Sanity Testing', 'testro' ),
							'description' => __( 'Verify that a specific fix or feature works, right after a change. Fast, focused, and narrow by design.', 'testro' ),
							'href'        => testro_nav_url( 'ai-automated-sanity-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'sanity',
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Functional Testing', 'testro' ),
							'description' => __( 'Confirm a feature behaves the way it was built to, from a real user\'s point of view.', 'testro' ),
							'href'        => testro_nav_url( 'automated-functional-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'functional',
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Integration Testing', 'testro' ),
							'description' => __( 'Check that separate systems, services, and APIs actually work together. Not just on their own.', 'testro' ),
							'href'        => testro_nav_url( 'ai-powered-integration-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'integration',
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'End-to-End Testing', 'testro' ),
							'description' => __( 'Check a complete workflow, starting to finishing, across UI, APIs, and every connected layer.', 'testro' ),
							'href'        => testro_nav_url( 'end-to-end-testing' ),
							'cta'         => __( 'Learn More', 'testro' ),
							'motif'       => 'e2e',
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Frontend Testing', 'testro' ),
							'description' => __( 'Test what users actually see and click: layout, responsiveness, and every interactive element.', 'testro' ),
							'motif'       => 'frontend',
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Backend Testing', 'testro' ),
							'description' => __( 'Check the logic, data, and services running behind the interface, where most real bugs start.', 'testro' ),
							'motif'       => 'backend',
						),
					),
					'outro'         => __( 'These test automation use cases cover the full path from a single fix to a complete release. All from one platform.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'how-to-pick-the-right-use-case',
					'columns'       => 3,
					'title'         => __( 'How to Pick the Right Use Case', 'testro' ),
					'intro'         => __( 'Matching the Test to the Moment', 'testro' ),
					'intro_extra'   => __( 'Different software testing scenarios exist because different moments call for different checks.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Right After a Fix', 'testro' ),
							'description' => __( 'Sanity testing gives a fast answer without a full test cycle.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Before Deeper Testing Begins', 'testro' ),
							'description' => __( 'Smoke testing confirms a build is stable enough to test at all.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Before Every Release', 'testro' ),
							'description' => __( 'Regression testing protects everything that already worked.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'When Validating a New Feature', 'testro' ),
							'description' => __( 'Functional testing confirms that it does what developers built it to do.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'When Systems Talk to Each Other', 'testro' ),
							'description' => __( 'Integration testing catches broken handoffs between services.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Before a Major Launch', 'testro' ),
							'description' => __( 'End-to-end testing checks the full journey, start to finish.', 'testro' ),
						),
					),
					'outro'         => __( 'Most teams don\'t pick just one. A healthy QA process layers several of these use cases together, running at different points in the pipeline.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'why-choose-thetestro-for-every-testing-use-case',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Why Choose theTestRo for Every Testing Use Case', 'testro' ),
					'intro'         => __( 'One Platform, Every Kind of Test', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Powered Test Automation', 'testro' ),
							'description' => __( 'Build, run, and maintain tests with AI support at every step.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'No-Code Test Creation', 'testro' ),
							'description' => __( 'Write tests in plain English. No scripting background needed.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Tests', 'testro' ),
							'description' => __( 'Tests adjust on their own when the UI changes. No more broken suites.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser Testing', 'testro' ),
							'description' => __( 'Run the same test across every major browser and device combo.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Check endpoints and data flow alongside your UI checks.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Parallel Test Execution', 'testro' ),
							'description' => __( 'Run hundreds of tests at once. Hours turn into minutes.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'CI/CD Integration', 'testro' ),
							'description' => __( 'Trigger tests on their own on every build. No manual step needed.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Reports & Analytics', 'testro' ),
							'description' => __( 'See what passed, what failed, and why. All in one clear dashboard.', 'testro' ),
						),
					),
					'outro'         => __( 'Whatever the use case, theTestRo handles it from the same platform. Not a patchwork of separate tools.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'built-for-the-way-teams-actually-test',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Built for the Way Teams Actually Test', 'testro' ),
					'intro'         => __( 'From a Single Fix to a Full Release Cycle', 'testro' ),
					'intro_extra'   => __( 'A test suite that only handles one use case forces a team to stitch together separate tools for everything else. theTestRo covers the full spread instead.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Start Small', 'testro' ),
							'description' => __( 'A single sanity check or smoke test takes minutes to set up.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Grow the Suite', 'testro' ),
							'description' => __( 'Add regression, functional, and integration coverage as your app grows.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Scale to Full Releases', 'testro' ),
							'description' => __( 'Run a complete end-to-end suite before every major launch, without rebuilding it from scratch each time.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'supported-platforms',
					'columns'       => 4,
					'title'         => __( 'Supported Platforms', 'testro' ),
					'intro'         => __( 'Test Wherever Your Application Lives', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Web Applications', 'testro' ),
							'description' => __( 'Cover every major browser and device your users actually rely on.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'APIs', 'testro' ),
							'description' => __( 'Check REST and other API types alongside your UI tests.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Enterprise Applications', 'testro' ),
							'description' => __( 'Handle complex, multi-system workflows without extra setup.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Cloud Applications', 'testro' ),
							'description' => __( 'Test SaaS products and cloud-hosted systems with the same ease as anything else.', 'testro' ),
						),
					),
					'outro'         => __( 'No matter where your application runs, the same AI-powered engine runs the tests. Your team won\'t need to learn a new tool.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'benefits-of-ai-powered-test-automation',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Benefits of AI-Powered Test Automation', 'testro' ),
					'intro'         => __( 'What Teams Actually Gain', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Faster Test Execution', 'testro' ),
							'description' => __( 'Get results back in minutes. Not hours or days.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Reduced Maintenance', 'testro' ),
							'description' => __( 'Self-healing tests mean less time patching broken scripts.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Higher Test Coverage', 'testro' ),
							'description' => __( 'Cover more scenarios without growing your QA headcount.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Reliable Test Results', 'testro' ),
							'description' => __( 'Fewer false failures. Your team can trust a red status when it happens.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Faster Software Releases', 'testro' ),
							'description' => __( 'Testing stops being the bottleneck between a build and a release.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'Improved QA Productivity', 'testro' ),
							'description' => __( 'Your team spends time on real problems. Not repetitive manual checks.', 'testro' ),
						),
					),
					'outro'         => __( 'Together, these benefits set apart a QA process that keeps up with fast releases from one that plays catch-up.', 'testro' ),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'use-cases',
				),

				array(
					'type'          => 'cta',
					'id'            => 'ready-to-automate-every-testing-use-case',
					'title'         => __( 'Ready to Automate Every Testing Use Case?', 'testro' ),
					'intro'         => __( 'One Platform for Every Test Your Team Runs', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo for all software testing needs. Run quick sanity checks or manage full release cycles without switching tools.', 'testro' ),
					'heading_level' => 5,
					'actions'       => array(
						array(
							'label' => __( 'Schedule a Demo', 'testro' ),
							'style' => 'primary',
							'modal' => 'demo-modal',
						),
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
				'title'       => __( 'Best AI Integration Testing Tool for Enterprise QA', 'testro' ),
				'description' => __( 'Automate integration testing with the best AI integration testing tool. Validate APIs, services, and workflows to accelerate releases and improve quality.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Integration Test Automation That Verifies Real Handoffs', 'testro' ),
				'subtitle' => __( 'theTestRo brings AI integration testing to every connection point in your system. Check that UI, APIs, and services actually work together. Not just on their own. Keep those checks stable as your systems change.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-automated-integration-testing-actually-checks',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'What Automated Integration Testing Actually Checks', 'testro' ),
					'intro'         => __( 'Not Just That Each Piece Works. That They Work Together.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Beyond Isolated Checks', 'testro' ),
							'description' => __( 'Integration tests catch problems that only appear when pieces meet.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Real Data, Real Connections', 'testro' ),
							'description' => __( 'Test requests and workflows the way they truly happen. Not faked in a vacuum.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'A Different Layer Than Unit Testing', 'testro' ),
							'description' => __( 'A unit test confirms one piece works. An integration test confirms the system around it does too.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'types-of-integration-testing',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'The Types of Integration Testing theTestRo Covers', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Component Testing', 'testro' ),
							'description' => __( 'Check how internal parts work together. Like cart, inventory, and payment as one.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API Testing', 'testro' ),
							'description' => __( 'Check endpoints, payloads, status codes, and error handling between services.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'UI-to-API Workflow Testing', 'testro' ),
							'description' => __( 'Confirm a click actually triggers the right backend call and the right result.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Third-Party Testing', 'testro' ),
							'description' => __( 'Check links to payment gateways, CRMs, and other outside systems your app relies on.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Contract Testing', 'testro' ),
							'description' => __( 'Catch a breaking change between services before it hits live use.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Event-Driven Testing', 'testro' ),
							'description' => __( 'Check flows set off by queues, streams, or async events. A UI test often misses these.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-integration-testing-that-adapts',
					'columns'       => 3,
					'title'         => __( 'AI Integration Testing That Adapts', 'testro' ),
					'intro'         => __( 'Tests That Stay Stable as Systems Change', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'Self-Healing Across Integration Points', 'testro' ),
							'description' => __( 'A UI shift or a small API change doesn\'t have to break the whole test.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Assisted Test Generation', 'testro' ),
							'description' => __( 'Describe a flow. Get a working test back. No hand-writing every step.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Fewer False Failures', 'testro' ),
							'description' => __( 'Less time chasing a test that broke for the wrong reason. More time on real coverage.', 'testro' ),
						),
					),
					'outro'         => __( 'AI integration testing should mean this: checks that still work, even when the systems below keep changing.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'build-integration-tests-fast',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Build Integration Tests Fast, No Code Required', 'testro' ),
					'intro'         => __( 'From Flow to Working Test in Minutes', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Test Creation', 'testro' ),
							'description' => __( 'Describe a scenario. theTestRo builds the steps for you.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Reusable Components', 'testro' ),
							'description' => __( 'Common flows like login or data setup become blocks you reuse.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Any Skill Level Can Contribute', 'testro' ),
							'description' => __( 'QA staff with little API knowledge can still build real coverage.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'manual-vs-automated-integration-testing',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'Manual Integration Checks vs. Automated Integration Testing', 'testro' ),
					'intro'         => __( 'What Actually Changes When You Automate', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Speed', 'testro' ),
							'description' => __( 'Manual checks mean doing the same steps by hand, every time. Automated tests run on demand, right inside CI/CD.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Consistency', 'testro' ),
							'description' => __( 'Manual results shift with who\'s testing and how much time they have. Automated tests run the same way, every run.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Coverage', 'testro' ),
							'description' => __( 'Manual testing is limited by time and people. Automation covers more flows and links. No extra headcount needed.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Teamwork', 'testro' ),
							'description' => __( 'Manual findings often live scattered across tickets and docs. Automated results stay tied to the test that made them.', 'testro' ),
						),
					),
					'outro'         => __( 'A manual process that works at a small scale often breaks down as a system grows. It can add more services, more external links, or more weekly releases.', 'testro' ),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-to-automate-integration-testing',
					'title'         => __( 'How to Automate Integration Testing', 'testro' ),
					'intro'         => __( 'From First Test to Full Coverage in Five Steps', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'target',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Identify Integration Points', 'testro' ),
							'description' => __( 'List the key handoffs between modules, APIs, databases, and outside services.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'Define Scenarios and Data', 'testro' ),
							'description' => __( 'Write scenarios that mirror real workflows. Prepare stable, reusable data for each path.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Build the Tests', 'testro' ),
							'description' => __( 'Create tests that check requests, responses, and real outcomes. Not just a status code.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'Run in CI/CD', 'testro' ),
							'description' => __( 'Trigger tests on every commit or deploy. Failures show up while they\'re still cheap to fix.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'stage'       => __( 'Step 5', 'testro' ),
							'title'       => __( 'Monitor and Expand Coverage', 'testro' ),
							'description' => __( 'Review failures, update tests as things change, and grow coverage sprint over sprint.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'integration-testing-best-practices',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Integration Testing Best Practices', 'testro' ),
					'intro'         => __( 'What Separates a Reliable Suite From a Fragile One', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Prioritize High-Risk Connections First', 'testro' ),
							'description' => __( 'Test the links that touch revenue or compliance before the low-stakes ones.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Test Failure Paths, Not Just Success', 'testro' ),
							'description' => __( 'Timeouts, retries, and bad input matter as much as the smooth path.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Keep Test Data Stable', 'testro' ),
							'description' => __( 'A flaky integration test is often a data problem. Not a code problem.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Isolate Outside Dependencies When Needed', 'testro' ),
							'description' => __( 'Mock a third-party service when its own hiccups shouldn\'t block your pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Review and Retire Old Tests', 'testro' ),
							'description' => __( 'A test tied to a connection that no longer exists just adds noise.', 'testro' ),
						),
					),
					'outro'         => __( 'Integration testing best practices come down to testing real handoffs, under real conditions. Without letting the suite grow out of control.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-makes-the-best-integration-testing-framework',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'What Makes the Best Integration Testing Framework', 'testro' ),
					'intro'         => __( 'What to Actually Look For', 'testro' ),
					'intro_extra'   => __( 'Plenty of tools claim to handle integration testing. Not all of them do it the same way.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Coverage Across Layers', 'testro' ),
							'description' => __( 'The best integration testing framework covers UI, API, and data as one. Not just a single layer.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Low Setup Cost', 'testro' ),
							'description' => __( 'A framework that takes weeks to set up delays the coverage you need.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Built-In Stability', 'testro' ),
							'description' => __( 'Self-healing and smart waits matter more here than almost anywhere. Integration points change a lot.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Real CI/CD Fit', 'testro' ),
							'description' => __( 'A framework that doesn\'t plug into your pipeline cleanly turns into a step nobody remembers to run.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'cicd-integration-built-in',
					'title'         => __( 'CI/CD Integration Built In', 'testro' ),
					'intro'         => __( 'Integration Tests That Run on Every Build', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with Jenkins, GitHub Actions, GitLab, and Azure DevOps. A commit or pull request can start the right tests on its own. Code review catches a broken link between services. Not in production.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-integration-testing-at-scale',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Enterprise Integration Testing at Scale', 'testro' ),
					'intro'         => __( 'Built for Systems With Many Moving Parts', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Parallel Execution', 'testro' ),
							'description' => __( 'Run tests across thousands of scenarios. No hours-long wait for results.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Cross-Team Visibility', 'testro' ),
							'description' => __( 'Give every team touching a shared service the same view of health.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Audit-Ready Records', 'testro' ),
							'description' => __( 'Clear links between requirements, tests, and results back up compliance reviews. No extra work needed.', 'testro' ),
						),
					),
					'outro'         => __( 'Enterprise integration testing has to hold up across dozens of services and teams at once. Not just a single app.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-integration-testing',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo for Integration Testing', 'testro' ),
					'intro'         => __( 'Built for Every Role That Touches a Connected System', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Engineers', 'testro' ),
							'description' => __( 'Build integration coverage without needing deep script skills for every API. This is integration test automation built for QA teams, not just developers.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Backend Developers', 'testro' ),
							'description' => __( 'Confirm a new endpoint plays well with the rest of the system before it ships.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'DevOps Teams', 'testro' ),
							'description' => __( 'Trigger integration tests on their own as part of the pipeline. Results gate risky deployments.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Engineering Managers', 'testro' ),
							'description' => __( 'Get a clear view of integration health across services. Not just one team\'s suite.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'ai-powered-integration-testing',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-automating-integration-testing',
					'title'         => __( 'Start Automating Integration Testing Today', 'testro' ),
					'intro'         => __( 'Verify the Handoffs That Actually Break Things', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo. Catch broken connections early. Before they reach production.', 'testro' ),
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

		/* ------------------------------------------------------------------ */
		/* Retail & E-commerce Industry                                       */
		/* ------------------------------------------------------------------ */
		'retail-ecommerce' => array(
			'slug'  => 'retail-ecommerce',
			'title' => __( 'Retail & E-commerce', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Automated Testing Tool for Retail & E-commerce Industry', 'testro' ),
				'description' => __( 'Automate retail and e-commerce testing across web, mobile, APIs, POS systems, and self-checkout kiosks to deliver seamless digital shopping experiences.', 'testro' ),
			),

			'hero' => array(
				'title'          => __( 'Automated Testing Tool for Retail & E-commerce Industry', 'testro' ),
				'subtitle'       => __( 'theTestRo is an automated testing tool for the retail and e-commerce industry. Cover search, cart, checkout, and returns. Test across web, mobile, and in-store systems.', 'testro' ),
				'subtitle_extra' => __( 'Ship faster, even during your busiest sale of the year. This is retail and e-commerce testing built for the speed at which your catalog actually changes.', 'testro' ),
				'actions'        => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'real-challenges-in-retail-testing',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'The Real Challenges in Retail Testing', 'testro' ),
					'intro'         => __( 'Why Retail QA Is Harder Than It Looks', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Traffic Spikes Break Checkout', 'testro' ),
							'description' => __( 'One bottleneck during a big sale sends carts straight to abandonment.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Catalog Changes Break Tests', 'testro' ),
							'description' => __( 'Prices, promotions, and layouts shift constantly. Test upkeep eats more time than real testing.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Device Fragmentation Hides Bugs', 'testro' ),
							'description' => __( 'Shoppers use hundreds of device and browser combos. Thin coverage means bugs slip through.', 'testro' ),
						),
					),
					'outro'         => __( 'Retail test automation has to handle all three. Not just one. A tool built for one problem and not the others leaves real gaps in coverage.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'test-every-customer-touchpoint',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Test Every Customer Touchpoint', 'testro' ),
					'intro'         => __( 'One Platform for Every Channel', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Web and Mobile Together', 'testro' ),
							'description' => __( 'Cover your storefront and app from one platform. Not separate tools for each.', 'testro' ),
						),
						array(
							'icon'        => 'retail',
							'title'       => __( 'POS and Kiosk Testing', 'testro' ),
							'description' => __( 'Check in-store checkout systems and self-service kiosks alongside your digital channels.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API and Backend Sync', 'testro' ),
							'description' => __( 'Confirm inventory, pricing, and order systems stay in sync with what customers see.', 'testro' ),
						),
					),
					'outro'         => __( 'This is real omnichannel retail testing. Every touchpoint, one place to manage it all.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'how-retail-teams-get-started',
					'columns'       => 4,
					'title'         => __( 'How Retail Teams Get Started', 'testro' ),
					'intro'         => __( 'From Sign-Up to Full Coverage in Four Steps', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Connect Your Storefront', 'testro' ),
							'description' => __( 'Point theTestRo at your web, mobile, or in-store systems.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Build Core Flows First', 'testro' ),
							'description' => __( 'Start with search, cart, and checkout. The paths that drive the most revenue.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Layer in Edge Cases', 'testro' ),
							'description' => __( 'Add coupon logic, returns, and BOPIS flows as coverage grows.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Run Before Every Release', 'testro' ),
							'description' => __( 'Trigger a full suite on its own before code ships. Sale season or not.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'comparison',
					'id'            => 'manual-qa-vs-retail-test-automation',
					'title'         => __( 'Manual QA vs. Retail Test Automation', 'testro' ),
					'intro'         => __( 'What Changes When Testing Scales With Your Catalog', 'testro' ),
					'heading_level' => 3,
					'text_only'     => true,
					'legacy'        => array(
						'label' => __( 'Manual Retail QA', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'theTestRo Retail Test Automation', 'testro' ),
					),
					'rows'          => array(
						array(
							'aspect' => __( 'Catalog updates', 'testro' ),
							'legacy' => __( 'Re-test by hand, every time', 'testro' ),
							'modern' => __( 'Self-healing tests adapt on their own', 'testro' ),
						),
						array(
							'aspect' => __( 'Peak sale readiness', 'testro' ),
							'legacy' => __( 'Rushed, last-minute checks', 'testro' ),
							'modern' => __( 'Full regression, run in advance', 'testro' ),
						),
						array(
							'aspect' => __( 'Who can test', 'testro' ),
							'legacy' => __( 'QA team only', 'testro' ),
							'modern' => __( 'QA plus merchandisers and PMs', 'testro' ),
						),
						array(
							'aspect' => __( 'Device coverage', 'testro' ),
							'legacy' => __( 'Limited to what\'s on hand', 'testro' ),
							'modern' => __( 'Real devices, thousands of combos', 'testro' ),
						),
						array(
							'aspect' => __( 'Omnichannel checks', 'testro' ),
							'legacy' => __( 'Separate process per channel', 'testro' ),
							'modern' => __( 'One platform, every touchpoint', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'build-tests-in-plain-english',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Build Tests in Plain English, No Code Needed', 'testro' ),
					'intro'         => __( 'Let Your Whole Team Contribute to Quality', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Test Creation', 'testro' ),
							'description' => __( 'Merchandisers and product managers can build a test with no script needed.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Assisted Test Generation', 'testro' ),
							'description' => __( 'Describe a flow, like "add an item to cart and apply a coupon." Get a working test back.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA Stays in Control', 'testro' ),
							'description' => __( 'Non-technical people add coverage. QA reviews and owns quality overall.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'self-healing-tests-dynamic-storefronts',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Self-Healing Tests for Dynamic Storefronts', 'testro' ),
					'intro'         => __( 'Tests That Keep Up With Every Catalog Update', 'testro' ),
					'intro_extra'   => __( 'E-commerce sites change all the time. New banners, new product pages, seasonal layouts.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'wand',
							'title'       => __( 'Automatic Locator Updates', 'testro' ),
							'description' => __( 'Tests adjust on their own when your storefront\'s UI shifts.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Fewer Broken Tests After Every Release', 'testro' ),
							'description' => __( 'Your team spends less time fixing tests. More time finding real bugs.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Stable Coverage Through Every Redesign', 'testro' ),
							'description' => __( 'A new homepage layout doesn\'t mean rebuilding your whole suite.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'real-device-and-cross-browser',
					'columns'       => 3,
					'title'         => __( 'Real Device and Cross-Browser Coverage', 'testro' ),
					'intro'         => __( 'Test the Devices Your Shoppers Actually Use', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Real Devices, Not Emulators', 'testro' ),
							'description' => __( 'Check performance and UI on real hardware. Not a simulated guess.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Thousands of Browser and OS Combos', 'testro' ),
							'description' => __( 'Cover the full spread of devices your traffic data shows people using. This is retail software testing built around real usage, not guesswork.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Network Condition Testing', 'testro' ),
							'description' => __( 'See how your storefront runs on a slow connection, not just fast office Wi-Fi.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'built-for-peak-sale-events',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Built for Peak Sale Events', 'testro' ),
					'intro'         => __( 'Ready Before Black Friday, Not During It', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Full Regression Before Big Sale Days', 'testro' ),
							'description' => __( 'Run a complete test suite fast, ahead of high-traffic events.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Promo and Coupon Logic Validation', 'testro' ),
							'description' => __( 'Confirm discount codes and pricing rules calculate right under load.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Checkout Flow Stress Points', 'testro' ),
							'description' => __( 'Catch payment and cart issues before a flash sale exposes them to real shoppers.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'core-retail-ecommerce-scenarios',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Core Retail and E-commerce Test Scenarios', 'testro' ),
					'intro'         => __( 'What theTestRo Covers Out of the Box', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Search, Filter, and Catalog Browsing', 'testro' ),
							'description' => __( 'Confirm shoppers can find what they want with no friction.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'Cart, Wishlist, and Checkout', 'testro' ),
							'description' => __( 'Check the full purchase path, from product page to a confirmed order.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Coupons and Promotions', 'testro' ),
							'description' => __( 'Test discount logic. Pricing stays accurate at checkout, every time.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Order Tracking, Returns, and Refunds', 'testro' ),
							'description' => __( 'Check that post-purchase flows work smoothly, from request to resolution.', 'testro' ),
						),
						array(
							'icon'        => 'map-pin',
							'title'       => __( 'BOPIS and Curbside Pickup', 'testro' ),
							'description' => __( 'Test buy-online-pickup-in-store flows and real-time inventory across channels.', 'testro' ),
						),
					),
					'outro'         => __( 'This is real e-commerce website testing. Covering the full purchase journey, not just the homepage.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'visual-regression-promotions',
					'columns'       => 3,
					'title'         => __( 'Visual Regression for Promotions and Layouts', 'testro' ),
					'intro'         => __( 'Catch Broken Layouts Before Customers Do', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Automated Visual Checks', 'testro' ),
							'description' => __( 'Spot layout shifts and broken banners on every deployment.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Smart Change Detection', 'testro' ),
							'description' => __( 'Tell a real bug apart from an intentional promo update. No chasing false alarms.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Design File Comparison', 'testro' ),
							'description' => __( 'Check live pages against your Figma files to catch drift you didn\'t mean to ship.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'fits-existing-workflow',
					'variant'       => 'spotlight',
					'title'         => __( 'Fits Into Your Existing Workflow', 'testro' ),
					'intro'         => __( 'No New Process to Learn', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with the tools retail teams already use. Jenkins, GitHub Actions, Jira, and Slack, among others. Every build gets tested on its own. Results land right where your team already looks.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-in-retail',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo in Retail', 'testro' ),
					'intro'         => __( 'Built for Every Role in Retail QA', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'E-commerce QA Teams', 'testro' ),
							'description' => __( 'Cover checkout, catalog, and payment flows. No growing backlog of manual tests.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Merchandising and Product Teams', 'testro' ),
							'description' => __( 'Check new promotions or layout changes without waiting on engineering.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'DevOps and Release Teams', 'testro' ),
							'description' => __( 'Keep releases on schedule. Even during peak season code freezes.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Enterprise Retail Brands', 'testro' ),
							'description' => __( 'Manage testing across multiple brands, regions, or storefronts from one platform.', 'testro' ),
						),
					),
					'outro'         => __( 'Whatever your role, retail application testing works best when the whole team can pitch in. Not just a handful of automation engineers. A merchandiser who spots a broken promo banner can flag it the same day, instead of waiting for the next QA sprint to catch it.', 'testro' ),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'retail-ecommerce',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-testing-retail-experience',
					'title'         => __( 'Start Testing Your Retail Experience Today', 'testro' ),
					'intro'         => __( 'Ship Faster, Even During Your Busiest Season', 'testro' ),
					'body'          => __( 'Join retail and e-commerce teams already using theTestRo to catch bugs early and keep checkout running. No matter how big the sale.', 'testro' ),
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

		'healthcare' => array(
			'slug'  => 'healthcare',
			'title' => __( 'Healthcare', 'testro' ),
			'seo'   => array(
				'title'       => __( 'AI Testing Automation for Modern Healthcare Industry', 'testro' ),
				'description' => __( 'Deliver reliable digital healthcare experiences with AI test automation for healthcare applications, APIs, patient portals, and enterprise healthcare systems.', 'testro' ),
			),

			'hero' => array(
				'title'          => __( 'AI Testing Automation for Healthcare Industry', 'testro' ),
				'subtitle'       => __( 'theTestRo brings AI testing automation to the healthcare industry, built for systems where a bug isn\'t just an inconvenience, it can delay care.', 'testro' ),
				'subtitle_extra' => __( 'Test EHR and EMR workflows, patient portals, telehealth apps, and clinical APIs from one platform, with compliance built in from day one, not bolted on after. This is AI testing automation for healthcare industry teams who can\'t afford to guess.', 'testro' ),
				'actions'        => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'why-healthcare-software-is-harder',
					'variant'       => 'spotlight',
					'title'         => __( 'Why Healthcare Software Is Harder to Test', 'testro' ),
					'heading_level' => 2,
					'paragraphs'    => array(
						__( 'Healthcare systems carry a weight most other industries don\'t have to think about.', 'testro' ),
						__( 'Patient data is sensitive. A security gap can mean real harm, not just a bad review. Clinical workflows involve many systems talking to each other.', 'testro' ),
						__( 'EHR platforms, lab systems, billing, insurance. A broken handoff between any two can delay a diagnosis or a payment. Healthcare teams often run on legacy infrastructure too. That wasn\'t built with modern testing in mind, which makes automation harder to adopt, not easier.', 'testro' ),
						__( 'This is why generic healthcare software testing tools fall short. Healthcare needs a platform built around these constraints. Not one that treats them as an afterthought, added on once the core product is already built.', 'testro' ),
						__( 'The teams that get this right start with compliance and stability as first-class requirements, not a checklist item at the end of a sprint.', 'testro' ),
					),
					'items'         => array(),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-testro-automates',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'What theTestRo Automates', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'EHR and EMR Testing', 'testro' ),
							'description' => __( 'Automate core flows. Patient registration, order entry, medication management, clinical notes. theTestRo handles tricky logins too. SSO, MFA, Citrix/VDI setups included. Tests don\'t break every time a workflow shifts.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Patient Portal and Telehealth Testing', 'testro' ),
							'description' => __( 'Cover the full virtual-care journey. From login, to booking, to a finished visit. Tests stay steady even as portal screens and telehealth flows change release over release.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Healthcare Mobile App Testing', 'testro' ),
							'description' => __( 'Check real patient journeys on iOS and Android. Appointment scheduling, vitals tracking, lab results, medication reminders, push notifications. All tested on real devices.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Healthcare API Testing', 'testro' ),
							'description' => __( 'Generate and run API tests fast. Check HL7 and FHIR payloads. Confirm clean, accurate data flow between systems. Catch a broken link before it quietly corrupts patient records.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Billing and Claims Testing', 'testro' ),
							'description' => __( 'Automate insurance and claims workflows start to finish. API and database checks confirm billing is accurate.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Wearable and IoT Device Testing', 'testro' ),
							'description' => __( 'Test device pairing, connectivity, and data sync. From wearables and remote monitors to patient apps and clinician dashboards.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'comparison',
					'id'            => 'compliance-built-in',
					'title'         => __( 'Compliance Isn\'t an Add-On, It\'s Built In', 'testro' ),
					'intro'         => __( 'A platform that treats compliance as a separate module will eventually get it wrong. theTestRo builds it into the core instead.', 'testro' ),
					'heading_level' => 3,
					'text_only'     => true,
					'two_column'    => true,
					'first_label'   => __( 'Requirement', 'testro' ),
					'modern'        => array(
						'label' => __( 'How theTestRo Handles It', 'testro' ),
					),
					'rows'          => array(
						array(
							'aspect' => __( 'HIPAA', 'testro' ),
							'modern' => __( 'Clear, audit-ready records and access controls built for regulated teams', 'testro' ),
						),
						array(
							'aspect' => __( 'PHI Protection', 'testro' ),
							'modern' => __( 'PHI gets masked in test steps and reports. Sensitive data never sits exposed', 'testro' ),
						),
						array(
							'aspect' => __( 'GDPR', 'testro' ),
							'modern' => __( 'Ready-made controls for teams working across regions', 'testro' ),
						),
						array(
							'aspect' => __( 'FDA 21 CFR Part 11', 'testro' ),
							'modern' => __( 'Audit trails built to support regulated software delivery', 'testro' ),
						),
						array(
							'aspect' => __( 'Deployment Choice', 'testro' ),
							'modern' => __( 'Run in the cloud, on-premise, or in a private setup. Your call, based on your policy', 'testro' ),
						),
						array(
							'aspect' => __( 'Access Control', 'testro' ),
							'modern' => __( 'Role-based rules for who can view data, edit suites, and run tests', 'testro' ),
						),
					),
					'outro'         => __( 'This matters because healthcare application testing isn\'t just about finding bugs. It\'s about proving you found them the right way. A clean audit trail behind every test, ready the moment an auditor asks for it.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-clinical-workflows',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'AI That Understands Clinical Workflows, Not Just Clicks', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Test Creation', 'testro' ),
							'description' => __( 'QA teams and clinical experts build tests with no scripts. A nurse informaticist can describe a workflow just as easily as an engineer can.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing for Dynamic Dashboards', 'testro' ),
							'description' => __( 'A patient or doctor dashboard changes, and tests adapt on their own. Your whole suite doesn\'t break because one screen moved.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Reusable Components for Repetitive Flows', 'testro' ),
							'description' => __( 'Turn login, patient search, and order entry into building blocks. Update once. It applies everywhere those blocks get used.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what separates real healthcare test automation from a generic tool with a healthcare label slapped on.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'testing-across-every-device',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Testing Across Every Device Patients and Clinicians Use', 'testro' ),
					'intro'         => __( 'Healthcare software gets used on hospital tablets, personal phones, and everything in between. A patient portal that works great on a clinic\'s iPad might fail on an older Android phone. That gap is exactly what real coverage needs to catch.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Real Device Coverage', 'testro' ),
							'description' => __( 'Test on actual hardware. Not emulators that miss real rendering and speed issues.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Accessibility Checks Built In', 'testro' ),
							'description' => __( 'Confirm patient-facing apps meet WCAG standards. Care stays accessible, regardless of ability.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Browser and Cross-OS Testing', 'testro' ),
							'description' => __( 'Cover the mix of browsers and systems your patient population actually uses.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'appointment-spikes-and-peak-load',
					'columns'       => 3,
					'title'         => __( 'Built to Handle Appointment Spikes and Peak Load', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Stress-Test Scheduling and Check-In', 'testro' ),
							'description' => __( 'Run parallel load against search, scheduling, and check-in. A surge in appointments doesn\'t break patient access.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'API Latency Checks', 'testro' ),
							'description' => __( 'Check response times for HL7/FHIR and other key integrations, in every build.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Bottleneck Detection Across the Stack', 'testro' ),
							'description' => __( 'Track timing across EHR tasks. Find out if a slowdown is UI, API, or a downstream system.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'built-for-every-healthcare-it-team',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Built for Every Team in Healthcare IT', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'stethoscope',
							'title'       => __( 'Hospital and Health System QA Teams', 'testro' ),
							'description' => __( 'Cover EHR, patient portal, and billing systems from one platform. Not a different tool for each.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Digital Health Startups', 'testro' ),
							'description' => __( 'Move fast on new features. Still meet the compliance bar larger competitors have already cleared.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Health Insurance and Payer Teams', 'testro' ),
							'description' => __( 'Test claims and billing workflows with the same rigor as clinical systems.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Clinical Informatics Teams', 'testro' ),
							'description' => __( 'Contribute to test coverage directly. No need to learn a scripting language first.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'fits-existing-toolchain',
					'variant'       => 'tint',
					'title'         => __( 'Fits Into the Toolchain You Already Run', 'testro' ),
					'intro'         => __( 'theTestRo connects with Jira, Jenkins, GitHub, Azure DevOps, and healthcare data formats like HL7/FHIR in JSON or XML.', 'testro' ),
					'intro_extra'   => __( 'Trigger tests on their own from your CI/CD pipeline. Keep full traceability between requirements, tests, and results. No manual syncing between tools, and no separate spreadsheet to keep up to date.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'healthcare',
				),

				array(
					'type'          => 'cta',
					'id'            => 'bring-reliable-testing-clinical-workflows',
					'title'         => __( 'Bring Reliable Testing to Every Clinical Workflow', 'testro' ),
					'body'          => __( 'Join healthcare and health-tech teams already using theTestRo to ship safer and faster. Compliance built into every test, not bolted on at the end.', 'testro' ),
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

		'banking-finance' => array(
			'slug'   => 'banking-finance',
			'title'  => __( 'AI Test Automation for Banking & Financial Services', 'testro' ),
			'seo'    => array(
				'title'       => __( 'AI Test Automation for Modern Banking & Financial Services', 'testro' ),
				'description' => __( 'Accelerate banking and financial software testing with AI test automation. Test core banking, payment systems, APIs, web, and mobile applications with confidence.', 'testro' ),
			),

			'hero' => array(
				'title'          => __( 'AI Test Automation for Banking & Financial Services', 'testro' ),
				'subtitle'       => __( 'theTestRo is built for teams that can\'t afford a broken payment flow. Automate onboarding, checks, payments, and core banking journeys across web, mobile, and APIs.', 'testro' ),
				'subtitle_extra' => __( 'Audit-ready evidence is built in from the start. This is banking software testing made for regulated teams. Not a generic tool with a finance label stuck on top.', 'testro' ),
				'actions'        => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'automate-core-banking-journeys',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Automate Core Banking and Payment Journeys', 'testro' ),
					'intro'         => __( 'From Account Opening to Servicing, Covered End to End', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Onboarding Checks', 'testro' ),
							'description' => __( 'Automate customer onboarding. Automate identity checks too. Document checks as well.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Login and Authentication', 'testro' ),
							'description' => __( 'Test secure logins. One-time codes. Multi-step checks. Fingerprint and face scans too.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Payments and Transfers', 'testro' ),
							'description' => __( 'Check real-time transfers and payments. Cover every channel your customers use.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Loans and Servicing', 'testro' ),
							'description' => __( 'Test lending flows. From application through approval. Plus ongoing servicing.', 'testro' ),
						),
					),
					'outro'         => __( 'This is real banking test automation. It covers the full customer journey, not just a login screen.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'how-teams-get-started',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'How Teams Get Started', 'testro' ),
					'intro'         => __( 'From Sign-Up to Full Coverage in Four Steps', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Connect Your Systems', 'testro' ),
							'description' => __( 'Point theTestRo at your web, mobile, and API layers.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Start With Core Journeys', 'testro' ),
							'description' => __( 'Build tests for login, payments, and onboarding first. These carry the most risk.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Add Compliance Checks', 'testro' ),
							'description' => __( 'Layer in audit trails and access controls as your suite grows.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Run Before Every Release', 'testro' ),
							'description' => __( 'Trigger a full suite automatically, so nothing risky ships untested.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-in-banking',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo in Banking and Finance', 'testro' ),
					'intro'         => __( 'Built for Every Team Touching Financial Software', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Bank and Credit Union QA Teams', 'testro' ),
							'description' => __( 'Cover core banking, payments, and servicing from one platform.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'FinTech Product Teams', 'testro' ),
							'description' => __( 'Move fast on new features. Still meet the compliance bar larger banks expect.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Payment Providers', 'testro' ),
							'description' => __( 'Test gateway hookups and transaction paths under real load.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Risk and Compliance Teams', 'testro' ),
							'description' => __( 'Get audit-ready logs. No chasing down evidence after every release.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'security-testing-regulated',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Security Testing Built for Regulated Environments', 'testro' ),
					'intro'         => __( 'Test the Way Banks Actually Operate', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Secure VPN Testing', 'testro' ),
							'description' => __( 'Run tests inside your bank\'s own network. Data never leaves a controlled space.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Biometric Checks', 'testro' ),
							'description' => __( 'Confirm fingerprint and face-scan logins work well. Security doesn\'t get weaker in the process.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Multi-Step Login Testing', 'testro' ),
							'description' => __( 'Check every step of a login with more than one factor. Test it across devices too.', 'testro' ),
						),
					),
					'outro'         => __( 'Financial software testing that skips this layer isn\'t really testing your product. It\'s testing a simpler, safer version of it. Real customers don\'t get that safer version, so your tests shouldn\'t either.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'payment-gateway-and-qr',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Payment Gateway and QR Code Testing', 'testro' ),
					'intro'         => __( 'Every Transaction Path, Validated', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'coins',
							'title'       => __( 'Payment Gateway Testing', 'testro' ),
							'description' => __( 'Confirm payments go through right. Cover card, bank transfer, and digital wallet paths.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'QR Code Payment Checks', 'testro' ),
							'description' => __( 'Test QR-based payments from scan to confirmation.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'What Happens When It Fails', 'testro' ),
							'description' => __( 'Check declined payments, timeouts, and retries. Not just the smooth, happy path.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'reduce-regression-cycles',
					'columns'       => 3,
					'title'         => __( 'Reduce Regression Cycles Without Cutting Corners on Compliance', 'testro' ),
					'intro'         => __( 'Faster Releases, Same Audit Trail', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Parallel Execution', 'testro' ),
							'description' => __( 'Swap week-long regression cycles for runs that finish in hours.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Tests', 'testro' ),
							'description' => __( 'AI keeps suites stable as your UI changes. Maintenance drops a lot.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Records, Ready to Go', 'testro' ),
							'description' => __( 'Every run saves logs and results on its own. No chasing down evidence when it\'s time for a review.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'real-device-and-geolocation',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Real Device and Geolocation Testing', 'testro' ),
					'intro'         => __( 'Test Where Your Customers Actually Bank', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Real Device Coverage', 'testro' ),
							'description' => __( 'Check performance and usability on real hardware. Not a guess.', 'testro' ),
						),
						array(
							'icon'        => 'map-pin',
							'title'       => __( 'Geolocation Testing', 'testro' ),
							'description' => __( 'Test app behavior across regions. A banking app should feel the same in Mumbai or New York.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Network Checks', 'testro' ),
							'description' => __( 'See how payment flows hold up on 3G, 4G, or a shaky connection. Not just fast office Wi-Fi.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-agents-at-every-stage',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'AI Agents at Every Stage of Testing', 'testro' ),
					'intro'         => __( 'Faster Test Authoring, Without Losing Control', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Test Creation', 'testro' ),
							'description' => __( 'QA teams and business staff build tests. No scripts needed.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Assisted Test Generation', 'testro' ),
							'description' => __( 'Turn a requirement into a working test on its own.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Less Manual Upkeep', 'testro' ),
							'description' => __( 'AI updates tests as your app changes. Your suite doesn\'t quietly fall apart between releases.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-security-and-compliance',
					'columns'       => 3,
					'title'         => __( 'Enterprise Security and Compliance', 'testro' ),
					'intro'         => __( 'Certifications That Matter to Regulated Teams', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'SOC 2', 'testro' ),
							'description' => __( 'Built for regulated software teams from the ground up.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'ISO 27001', 'testro' ),
							'description' => __( 'Strong security controls, already in place.', 'testro' ),
						),
						array(
							'icon'        => 'map-pin',
							'title'       => __( 'GDPR', 'testro' ),
							'description' => __( 'Ready for teams working across regions.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Access Control', 'testro' ),
							'description' => __( 'You decide who can create, edit, and run tests.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Deployment Choice', 'testro' ),
							'description' => __( 'Cloud, on-premise, or a private setup. Your call.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Full Traceability', 'testro' ),
							'description' => __( 'Clear logs to back up audits and release checks.', 'testro' ),
						),
					),
					'outro'         => __( 'BFSI testing isn\'t just about catching bugs. It\'s about proving you caught them, with real evidence to show for it.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'built-for-high-transaction-periods',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Built for High-Transaction Periods', 'testro' ),
					'intro'         => __( 'Stay Stable During Payroll Runs and Peak Load', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Full Regression Before Peak Windows', 'testro' ),
							'description' => __( 'Run complete test suites fast. Ahead of payroll cycles and big launches too.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Load Testing', 'testro' ),
							'description' => __( 'Simulate high transaction volume. Confirm your platform holds up before real customers hit it.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API and UI Checked Together', 'testro' ),
							'description' => __( 'Test payment APIs alongside the interface. A backend slowdown doesn\'t quietly break things for the customer.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'core-financial-workflows',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Core Financial Workflows Covered', 'testro' ),
					'intro'         => __( 'Built Around How Financial Products Actually Work', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Digital Banking Portals', 'testro' ),
							'description' => __( 'Cover dashboards, account services, transfers, and bill pay. Web and mobile both.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'API and Partner Integrations', 'testro' ),
							'description' => __( 'Automate APIs straight from a spec. Handle tricky tokens and one-time codes in your tests.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Cross-Channel Journeys', 'testro' ),
							'description' => __( 'Test flows that span the interface and backend together. Not each on its own.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'fits-existing-workflow',
					'title'         => __( 'Fits Into Your Existing Workflow', 'testro' ),
					'intro'         => __( 'No Extra Tools to Manage', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with Jira, Jenkins, GitHub, and Azure DevOps. Trigger test suites right from your build process. Gate releases on the results, so a risky change gets caught before it reaches customers.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'banking-finance',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-automating-banking-tests',
					'title'         => __( 'Start Automating Banking Tests Today', 'testro' ),
					'intro'         => __( 'Ship Faster, Stay Audit-Ready', 'testro' ),
					'body'          => __( 'Join banking and financial teams already using theTestRo. Test critical workflows faster. Skip nothing on security or compliance. This is real banking application testing. Built to hold up under scrutiny, not just a demo.', 'testro' ),
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

		'travel-and-hospitality' => array(
			'slug'  => 'travel-and-hospitality',
			'title' => __( 'Travel & Hospitality', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Travel & Hospitality Testing Solutions for Digital Experiences', 'testro' ),
				'description' => __( 'Deliver seamless travel and hospitality experiences with automated testing for booking engines, travel portals, payment systems, web, mobile, and APIs.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Travel & Hospitality Testing Solutions for Digital Experiences', 'testro' ),
				'subtitle' => __( 'theTestRo is a travel and hospitality testing solution. Built for the full traveler journey. Test search, booking, check-in, and in-trip flows across web, mobile, and kiosks. Catch bugs before a customer does, not after a bad review.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'real-challenges-in-travel-testing',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'The Real Challenges in Travel and Hospitality Testing', 'testro' ),
					'intro'         => __( 'Why This Industry Is Harder to Test Than It Looks', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Apps Run Under Constant Pressure', 'testro' ),
							'description' => __( 'Booking systems run around the clock, worldwide. One crash during a busy search window means lost bookings and bad reviews.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Security Gaps Break Trust Fast', 'testro' ),
							'description' => __( 'A payment glitch at checkout doesn\'t just cost one booking. It spreads on social media and hurts the brand.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Traffic Spikes Around Seasons and Sales', 'testro' ),
							'description' => __( 'Holiday travel, flash sales, and last-minute bookings push systems to their limit. Often with little warning.', 'testro' ),
						),
					),
					'outro'         => __( 'Travel test automation has to handle all three at once. Not just one at a time.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'how-teams-get-started',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'How Teams Get Started', 'testro' ),
					'intro'         => __( 'From Sign-Up to Full Coverage in Four Steps', 'testro' ),
					'numbered'      => true,
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Connect Your Systems', 'testro' ),
							'description' => __( 'Point theTestRo at your web, mobile, and kiosk channels.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Start With Booking Flows First', 'testro' ),
							'description' => __( 'Search, checkout, and payment carry the most risk. Build these tests first.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Add Edge Cases', 'testro' ),
							'description' => __( 'Layer in loyalty, cancellations, and multi-region checks as coverage grows.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Run Before Every Release', 'testro' ),
							'description' => __( 'Trigger a full suite on its own, so nothing risky ships untested.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'comparison',
					'id'            => 'manual-qa-vs-travel-test-automation',
					'title'         => __( 'Manual QA vs. Travel Test Automation', 'testro' ),
					'intro'         => __( 'What Changes Testing Scales With Demand', 'testro' ),
					'heading_level' => 3,
					'text_only'     => true,
					'legacy'        => array(
						'label' => __( 'Manual QA', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'theTestRo', 'testro' ),
					),
					'rows'          => array(
						array(
							'aspect' => __( 'Booking Changes', 'testro' ),
							'legacy' => __( 'Manual QA means re-testing by hand every time.', 'testro' ),
							'modern' => __( 'theTestRo\'s self-healing tests adapt on their own.', 'testro' ),
						),
						array(
							'aspect' => __( 'Peak Season Readiness', 'testro' ),
							'legacy' => __( 'Manual checks are often rushed at the last minute.', 'testro' ),
							'modern' => __( 'theTestRo runs full regression well in advance.', 'testro' ),
						),
						array(
							'aspect' => __( 'Who Can Test', 'testro' ),
							'legacy' => __( 'Manual QA limits testing to the QA team.', 'testro' ),
							'modern' => __( 'theTestRo opens it up to product managers too.', 'testro' ),
						),
						array(
							'aspect' => __( 'Device Coverage', 'testro' ),
							'legacy' => __( 'Manual testing covers whatever\'s on hand.', 'testro' ),
							'modern' => __( 'theTestRo covers real devices at real scale.', 'testro' ),
						),
					),
					'outro'         => __( 'A manual process that worked fine at a smaller scale usually breaks down the moment a travel brand adds a new region or a bigger sale calendar.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'test-every-booking-touchpoint',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Test Every Booking Touchpoint', 'testro' ),
					'intro'         => __( 'One Platform for Every Channel Travelers Use', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Web and Mobile Together', 'testro' ),
							'description' => __( 'Cover your booking site and app from one platform. Not separate tools for each. This covers travel website testing and travel application testing under one roof.', 'testro' ),
						),
						array(
							'icon'        => 'retail',
							'title'       => __( 'Self-Check-In Kiosks', 'testro' ),
							'description' => __( 'Test airport and hotel kiosks right alongside your digital channels.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API and Backend Sync', 'testro' ),
							'description' => __( 'Confirm inventory, pricing, and booking systems stay in sync with what travelers see.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'hotel-and-flight-booking-flow-testing',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'Hotel and Flight Booking Flow Testing', 'testro' ),
					'intro'         => __( 'The Moments That Actually Convert', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Search and Filter Accuracy', 'testro' ),
							'description' => __( 'Confirm travelers can find the right room, flight, or package. No friction along the way.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Hotel Booking Testing', 'testro' ),
							'description' => __( 'Check the full reservation path. From room selection to a confirmed booking.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Seat Maps and Trip Details', 'testro' ),
							'description' => __( 'Confirm seat maps, room layouts, and trip details render right on every device.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Payment and Confirmation Flows', 'testro' ),
							'description' => __( 'Test successful payments, declines, and retries. Not just the smooth path.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'real-device-and-network-condition-testing',
					'columns'       => 3,
					'title'         => __( 'Real Device and Network Condition Testing', 'testro' ),
					'intro'         => __( 'Test Where Travelers Actually Are, Not Just Your Office Wi-Fi', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Real Device Coverage', 'testro' ),
							'description' => __( 'Check performance on real hardware. Not a guess from an emulator.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Airport and In-Flight Network Checks', 'testro' ),
							'description' => __( 'See how booking and check-in hold up on slow airport Wi-Fi. In-flight or abroad too.', 'testro' ),
						),
						array(
							'icon'        => 'map-pin',
							'title'       => __( 'Geolocation Testing', 'testro' ),
							'description' => __( 'Confirm pricing, currency, and content adjust right for travelers in different regions.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'visual-regression-booking-pages',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Visual Regression for Booking Pages and Itineraries', 'testro' ),
					'intro'         => __( 'Catch Broken Layouts Before a Traveler Does', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Automated Visual Checks', 'testro' ),
							'description' => __( 'Spot layout shifts and broken parts. On booking pages and confirmation screens.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Smart Change Detection', 'testro' ),
							'description' => __( 'Tell a real bug apart from a price or count that\'s supposed to change. No chasing false alarms.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Device Consistency', 'testro' ),
							'description' => __( 'Confirm seat maps, room photos, and trip details look right on every screen.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'built-for-peak-season',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Built for Peak Season and High-Traffic Events', 'testro' ),
					'intro'         => __( 'Ready Before the Rush, Not During It', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Full Regression Before Peak Windows', 'testro' ),
							'description' => __( 'Run a complete test suite fast. Ahead of holiday travel and flash sales.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Load and Stress Testing', 'testro' ),
							'description' => __( 'Simulate high booking volume. Confirm your platform holds up before real travelers hit it.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Partner Integration Checks', 'testro' ),
							'description' => __( 'Check connections to airlines, hotel chains, and payment providers under real load. Not in a demo.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'core-travel-hospitality-scenarios',
					'columns'       => 3,
					'title'         => __( 'Core Travel and Hospitality Test Scenarios', 'testro' ),
					'intro'         => __( 'What theTestRo Covers Out of the Box', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Search, Browse, and Compare', 'testro' ),
							'description' => __( 'Confirm travelers can explore options with no friction. Flights, hotels, and packages all covered.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'Booking, Cart, and Checkout', 'testro' ),
							'description' => __( 'Check the full path from selection to a confirmed booking.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Loyalty and Rewards', 'testro' ),
							'description' => __( 'Test point accrual, redemption, and tier status. Web and mobile both.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Check-In and Boarding', 'testro' ),
							'description' => __( 'Cover mobile check-in, digital boarding passes, and kiosk self-service.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Cancellations and Refunds', 'testro' ),
							'description' => __( 'Check that post-booking changes work smoothly, from request to resolution.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-powered-no-code-travel-teams',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'AI-Powered, No-Code Testing for Travel Teams', 'testro' ),
					'intro'         => __( 'Let More of Your Team Contribute to Quality', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Test Creation', 'testro' ),
							'description' => __( 'Product managers and QA staff build tests. No scripts needed.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Tests', 'testro' ),
							'description' => __( 'Booking pages change often. theTestRo adapts tests on its own instead of breaking your whole suite.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Faster Coverage, Less Maintenance', 'testro' ),
							'description' => __( 'Spend less time patching broken tests after every release. More time on real edge cases.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'fits-existing-workflow',
					'variant'       => 'tint',
					'title'         => __( 'Fits Into Your Existing Workflow', 'testro' ),
					'intro'         => __( 'No New Tools to Manage', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with Jira, Jenkins, GitHub Actions, and Slack. The tools travel and hospitality teams already run. Trigger tests on every build automatically.', 'testro' ),
					'intro_body'    => __( 'Get results right where your team already looks. This is hospitality software testing that fits your workflow, not one that forces a new one.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-in-travel',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo in Travel and Hospitality', 'testro' ),
					'intro'         => __( 'Built for Every Role Touching the Traveler Journey', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'OTA and Booking Platform Teams', 'testro' ),
							'description' => __( 'Cover search, booking, and payment flows. No growing pile of manual tests.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Hotel and Resort Chains', 'testro' ),
							'description' => __( 'Test booking systems and loyalty programs across every property and region.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Airlines and Travel Apps', 'testro' ),
							'description' => __( 'Check check-in, boarding, and in-trip flows across devices and networks.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Product and QA Leads', 'testro' ),
							'description' => __( 'Roll out steady test coverage across teams. No months of onboarding needed.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'travel-and-hospitality',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-testing-travel-experience',
					'title'         => __( 'Start Testing Your Travel Experience Today', 'testro' ),
					'intro'         => __( 'Ship Faster, Every Season', 'testro' ),
					'body'          => __( 'Join travel and hospitality teams already using theTestRo. Catch bugs early. Keep bookings running, no matter how big the travel rush.', 'testro' ),
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

		'insurance' => array(
			'slug'  => 'insurance',
			'title' => __( 'Insurance', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Insurance Testing Solutions with No-Code Test Automation', 'testro' ),
				'description' => __( 'Accelerate insurance software testing with no-code test automation. Validate policy administration, claims management, customer portals, APIs, web, and mobile apps.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Insurance Testing Solutions with No-Code Test Automation', 'testro' ),
				'subtitle' => __( 'theTestRo brings insurance testing solutions with no-code test automation. To claims, policy work, and quoting. Build tests in plain English. Catch bugs before a policyholder does. Not after a complaint.', 'testro' ),
				'actions'  => array(
					array(
						'label' => __( 'Start Testing Free', 'testro' ),
						'style' => 'primary',
						'modal' => 'demo-modal',
					),
				),
			),

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'real-challenges-in-insurance-testing',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'The Real Challenges in Insurance Testing', 'testro' ),
					'intro'         => __( 'Why Insurance Software Is Harder to Get Right', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Sensitive Data at Every Step', 'testro' ),
							'description' => __( 'Insurance apps handle personal and money data all the time. A testing gap can mean a real data leak. Not just a bug report.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Complex Business Logic', 'testro' ),
							'description' => __( 'Premium math, endorsements, and claims processing stack rules on top of rules. One wrong branch can quietly cost real money.', 'testro' ),
						),
						array(
							'icon'        => 'trending-up',
							'title'       => __( 'Traffic Spikes at Renewal Time', 'testro' ),
							'description' => __( 'Open enrollment and renewal periods push systems hard. Often with little warning.', 'testro' ),
						),
					),
					'outro'         => __( 'Insurance test automation has to hold up under all three. Not just one at a time.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'test-every-policyholder-touchpoint',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Test Every Policyholder Touchpoint', 'testro' ),
					'intro'         => __( 'One Platform for Every Channel', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Web and Mobile Together', 'testro' ),
							'description' => __( 'Cover your policyholder portal and app from one place. Not separate tools for each.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Agent and Broker Portals', 'testro' ),
							'description' => __( 'Test the tools your agents rely on. Not just the customer-facing side. This is insurance application testing that covers both sides of the business.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'API and Backend Sync', 'testro' ),
							'description' => __( 'Confirm policy, billing, and claims systems stay in sync with what users see.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what real insurance software testing should cover. Every touchpoint, not just the login screen.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'how-insurance-teams-get-started',
					'columns'       => 4,
					'title'         => __( 'How Teams Get Started', 'testro' ),
					'intro'         => __( 'From Sign-Up to Full Coverage in Four Steps', 'testro' ),
					'numbered'      => true,
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'title'       => __( 'Connect Your Systems', 'testro' ),
							'description' => __( 'Point theTestRo at your policyholder portal, agent tools, and APIs.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Start With High-Risk Flows First', 'testro' ),
							'description' => __( 'Claims filing and premium calculations carry the most risk. Build these tests first.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Add Edge Cases', 'testro' ),
							'description' => __( 'Layer in cancellations, endorsements, and multi-region checks as coverage grows.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Run Before Every Release', 'testro' ),
							'description' => __( 'Trigger a full suite on its own, so nothing risky ships untested.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'comparison',
					'id'            => 'manual-qa-vs-insurance-test-automation',
					'title'         => __( 'Manual QA vs. Insurance Test Automation', 'testro' ),
					'intro'         => __( 'What Changes When Testing Scales With Renewal Season', 'testro' ),
					'heading_level' => 3,
					'text_only'     => true,
					'legacy'        => array(
						'label' => __( 'Manual QA', 'testro' ),
					),
					'modern'        => array(
						'label' => __( 'theTestRo', 'testro' ),
					),
					'rows'          => array(
						array(
							'aspect' => __( 'Business Rule Changes', 'testro' ),
							'legacy' => __( 'Manual QA means re-testing by hand every time a rule shifts.', 'testro' ),
							'modern' => __( 'theTestRo\'s self-healing tests adapt on their own.', 'testro' ),
						),
						array(
							'aspect' => __( 'Renewal Season Readiness', 'testro' ),
							'legacy' => __( 'Manual checks are often rushed at the last minute.', 'testro' ),
							'modern' => __( 'theTestRo runs full regression well ahead of time.', 'testro' ),
						),
						array(
							'aspect' => __( 'Who Can Test', 'testro' ),
							'legacy' => __( 'Manual QA limits testing to the QA team.', 'testro' ),
							'modern' => __( 'theTestRo opens it up to business analysts too.', 'testro' ),
						),
						array(
							'aspect' => __( 'Coverage Depth', 'testro' ),
							'legacy' => __( 'Manual testing covers the common cases.', 'testro' ),
							'modern' => __( 'theTestRo covers edge cases at real scale.', 'testro' ),
						),
					),
					'outro'         => __( 'A manual process that worked fine at a smaller policy volume usually breaks down the moment a carrier adds a new product line or a bigger renewal calendar.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'claims-management-testing',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Claims Management Testing', 'testro' ),
					'intro'         => __( 'Where Trust Gets Built or Broken', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'file-text',
							'title'       => __( 'First Notice of Loss', 'testro' ),
							'description' => __( 'Test how a claim gets filed. From the first report through early triage.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'Document Upload and Validation', 'testro' ),
							'description' => __( 'Check how the app handles files in different formats, sizes, and states.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Claims Processing Logic', 'testro' ),
							'description' => __( 'Test the rules that route, calculate, and approve claims. Payouts come out right the first time.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Status Updates and Notifications', 'testro' ),
							'description' => __( 'Confirm policyholders get the right updates as a claim moves along.', 'testro' ),
						),
					),
					'outro'         => __( 'Claims management testing done well means fewer angry calls and fewer manual fixes after the fact.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'policy-administration-testing',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'Policy Administration Testing', 'testro' ),
					'intro'         => __( 'Get the Core Workflows Right, Every Time', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Policy Issuance', 'testro' ),
							'description' => __( 'Test the path. From an application to an active policy.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Renewals', 'testro' ),
							'description' => __( 'Check that coverage and premium changes apply right. Old data stays safe.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Premium Math', 'testro' ),
							'description' => __( 'Check pricing covers every rule and discount. Not just the easy cases.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Cancellations', 'testro' ),
							'description' => __( 'Test these rare flows just as hard as the common ones.', 'testro' ),
						),
					),
					'outro'         => __( 'Policy administration testing that skips the hard cases misses the exact spots that cause the most support calls.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'no-code-test-automation-for-insurance',
					'columns'       => 3,
					'title'         => __( 'No-Code Test Automation for Insurance Teams', 'testro' ),
					'intro'         => __( 'Let More of Your Team Build Tests', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Plain-English Test Creation', 'testro' ),
							'description' => __( 'QA staff and business analysts build tests. No scripts needed.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Tests', 'testro' ),
							'description' => __( 'Insurance portals change often. theTestRo adapts tests on its own. Your whole suite doesn\'t break.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Faster Coverage, Less Maintenance', 'testro' ),
							'description' => __( 'Spend less time patching broken tests. More time on real edge cases and business rules.', 'testro' ),
						),
					),
					'outro'         => __( 'This is no-code test automation for insurance built for teams that can\'t wait on a few automation engineers to cover everything.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'real-device-and-field-condition-testing',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Real Device and Field Condition Testing', 'testro' ),
					'intro'         => __( 'Test Where Your Users Actually Are', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Real Device Coverage', 'testro' ),
							'description' => __( 'Check speed and ease of use on real hardware. Not a guess.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Field Network Conditions', 'testro' ),
							'description' => __( 'See how claims apps do on 3G, 4G, or a weak signal in the field.', 'testro' ),
						),
						array(
							'icon'        => 'map-pin',
							'title'       => __( 'Geolocation and Localization', 'testro' ),
							'description' => __( 'Confirm pricing and content adjust right. For users in different regions.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'visual-regression-quotes-policy-pages',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Visual Regression for Quotes and Policy Pages', 'testro' ),
					'intro'         => __( 'Catch Broken Layouts Before a Policyholder Does', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Automated Visual Checks', 'testro' ),
							'description' => __( 'Spot layout shifts and broken parts. On quote flows and policy pages.', 'testro' ),
						),
						array(
							'icon'        => 'filter-check',
							'title'       => __( 'Smart Change Detection', 'testro' ),
							'description' => __( 'Tell a real bug apart from a rate meant to update. No chasing false alarms.', 'testro' ),
						),
						array(
							'icon'        => 'browsers',
							'title'       => __( 'Cross-Device Consistency', 'testro' ),
							'description' => __( 'Confirm quote wizards look right. On every screen size.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'built-for-open-enrollment',
					'columns'       => 3,
					'title'         => __( 'Built for Open Enrollment and Renewal Season', 'testro' ),
					'intro'         => __( 'Ready Before the Surge, Not During It', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Full Regression Before Peak Windows', 'testro' ),
							'description' => __( 'Run a full suite fast. Ahead of open enrollment and renewal times.', 'testro' ),
						),
						array(
							'icon'        => 'gauge',
							'title'       => __( 'Load and Stress Testing', 'testro' ),
							'description' => __( 'Simulate high traffic. Confirm your platform holds up before real demand hits.', 'testro' ),
						),
						array(
							'icon'        => 'video',
							'title'       => __( 'Real-Time Diagnostics', 'testro' ),
							'description' => __( 'Capture live sessions. Replay them to spot bottlenecks fast. No waiting for a support ticket.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'insurance-api-testing-and-integrations',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Insurance API Testing and Integrations', 'testro' ),
					'intro'         => __( 'Keep Every Connected System in Sync', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Insurance API Testing', 'testro' ),
							'description' => __( 'Check APIs that connect to CRMs, government sites, and payment gateways.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'CI/CD Integration', 'testro' ),
							'description' => __( 'Trigger tests on their own from your pipeline. Risky changes get caught early.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Centralized Test Management', 'testro' ),
							'description' => __( 'Run web, mobile, and API tests from one place. Not scattered across tools.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'security-and-compliance-built-in',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Security and Compliance Built In', 'testro' ),
					'intro'         => __( 'Data Protection That Doesn\'t Slow You Down', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Secure VPN Testing', 'testro' ),
							'description' => __( 'Run tests inside your own network. Data never leaves a controlled space.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Regulatory Alignment', 'testro' ),
							'description' => __( 'Testing built with GDPR and other data rules in mind, from the start.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Multi-Factor Authentication Testing', 'testro' ),
							'description' => __( 'Confirm secure logins and MFA flows work well. Protection stays strong.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-in-insurance',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo in Insurance', 'testro' ),
					'intro'         => __( 'Built for Every Role Touching the Policyholder Journey', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Insurance Carriers', 'testro' ),
							'description' => __( 'Cover policy, billing, and claims from one place.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'InsurTech Startups', 'testro' ),
							'description' => __( 'Move fast on new features. Still meet the bar big carriers expect.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Claims and Underwriting Teams', 'testro' ),
							'description' => __( 'Test the logic that drives right payouts and pricing.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'QA and Product Leads', 'testro' ),
							'description' => __( 'Roll out steady coverage across teams. No months of onboarding needed.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'insurance',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-testing-insurance-platform',
					'title'         => __( 'Start Testing Your Insurance Platform Today', 'testro' ),
					'intro'         => __( 'Ship Faster, Every Renewal Season', 'testro' ),
					'body'          => __( 'Join insurance and InsurTech teams already using theTestRo. Catch bugs early. Keep claims and policy systems running, no matter how big the traffic surge.', 'testro' ),
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

		'microsoft-dynamics-365-test-automation' => array(
			'slug'  => 'microsoft-dynamics-365-test-automation',
			'title' => __( 'Microsoft Dynamics 365 Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Best Microsoft Dynamics 365 Test Automation Tool', 'testro' ),
				'description' => __( 'Automate Microsoft Dynamics 365 testing with the best test automation tool. Validate ERP workflows, reduce regression effort, accelerate releases, and improve quality.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best Microsoft Dynamics 365 Test Automation Tool', 'testro' ),
				'subtitle' => __( 'theTestRo brings AI ERP test automation to Dynamics 365. Build self-healing, plain-English tests that cover every module. Stop losing weeks to manual work every time Microsoft ships an update.', 'testro' ),
				'actions'  => array(
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

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'typical-dynamics-365-testing-challenges',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Typical Dynamics 365 Testing Challenges', 'testro' ),
					'intro'         => __( 'Why D365 Testing Is Harder Than It Looks', 'testro' ),
					'intro_extra'   => __( 'Dynamics 365 is a large, connected suite with updates arriving all the time. Teams testing it run into the same problems again and again.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Heavy Customization', 'testro' ),
							'description' => __( 'Every org sets up D365 its own way. Each customization needs its own test coverage.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Deep Integrations', 'testro' ),
							'description' => __( 'D365 rarely runs on its own. It links to other enterprise systems. A break in one spot can ripple through several.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Frequent Microsoft Updates', 'testro' ),
							'description' => __( 'Quarterly releases can shift the UI or business logic with no warning. Old tests break.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Migration Risk', 'testro' ),
							'description' => __( 'When you move from another CRM or ERP system into D365, you must ensure you don\'t lose important data.', 'testro' ),
						),
					),
					'outro'         => __( 'Dynamics 365 testing has to hold up against all four at once. Not just the easiest one.', 'testro' ),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-teams-get-started',
					'title'         => __( 'How Teams Get Started', 'testro' ),
					'intro'         => __( 'From Sign-Up to Full Coverage in Four Steps', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Connect Your D365 Environment', 'testro' ),
							'description' => __( 'Point theTestRo at your Dynamics 365 instance and any connected systems.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'Start With Critical Workflows First', 'testro' ),
							'description' => __( 'Build tests for the business processes that carry the most risk.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Add Module Coverage Over Time', 'testro' ),
							'description' => __( 'Layer in Finance, Supply Chain, Service, and CE tests as coverage grows.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'Run Before Every Release', 'testro' ),
							'description' => __( 'Trigger the full test suite automatically. This helps your team avoid surprises from quarterly Microsoft updates.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'manual-d365-testing-vs-automated-test-automation',
					'columns'       => 4,
					'title'         => __( 'Manual D365 Testing vs. Automated Test Automation', 'testro' ),
					'intro'         => __( 'What Changes When Testing Doesn\'t Wait on a Person', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Speed', 'testro' ),
							'description' => __( 'Manual regression on a large D365 setup can take weeks. Automated runs finish in days, sometimes hours.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Consistency', 'testro' ),
							'description' => __( 'A manual tester\'s coverage shifts with time and focus. Automated tests run the same steps the same way, every time.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Update Resilience', 'testro' ),
							'description' => __( 'Manual scripts break the moment Microsoft ships a release. Self-healing tests adapt on their own.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Who Can Test', 'testro' ),
							'description' => __( 'Manual testing needs a dedicated engineer for every scripted check. Plain-English tests open coverage up to business users too.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'why-standard-testing-approaches-fall-short',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Why Standard Testing Approaches Fall Short', 'testro' ),
					'intro'         => __( 'Repeatable Testing That Actually Survives Change', 'testro' ),
					'intro_extra'   => __( 'Most test automation breaks the moment Dynamics 365 changes underneath it. theTestRo is built to do the opposite.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'Regression in Months, Not Years', 'testro' ),
							'description' => __( 'Automate large regression suites in a fraction of the time a manual process would take.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Adapts to Monthly and Quarterly Releases', 'testro' ),
							'description' => __( 'Tests continue to work through Microsoft\'s regular update cycle. Not just the version they built it on.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Built for Both Technical and Business Users', 'testro' ),
							'description' => __( 'Plain-English steps mean QA staff and business analysts can both write and read the same tests.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'De-Risked Implementation', 'testro' ),
							'description' => __( 'Rolling out D365 for the first time, or moving into it, tests catch problems before go-live. Not after.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'lifecycle',
					'id'            => 'author-execute-report-maintain',
					'title'         => __( 'Author, Execute, Report, Maintain: The Full Testing Lifecycle', 'testro' ),
					'intro'         => __( 'One Platform Covers Every Stage', 'testro' ),
					'heading_level' => 3,
					'loop_note'     => '',
					'items'         => array(
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Author', 'testro' ),
							'description' => __( 'Build a Dynamics 365 test in plain English. Watch each step check itself as you write it. No app needs to exist yet. You can build tests from requirements or wireframes before development even finishes.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Execute', 'testro' ),
							'description' => __( 'Run tests on your schedule, not just when someone\'s watching. Trigger runs from your CI/CD pipeline the moment new code lands, or set up an automatic schedule for off-hours runs.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Report', 'testro' ),
							'description' => __( 'Get a clear picture of application health and testing progress. A test fails, and root cause analysis tells you why. Not just that it failed.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Maintain', 'testro' ),
							'description' => __( 'Self-healing keeps tests working through dynamic IDs and shifting selectors. No hours hunting down what changed after every D365 update.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'codeless-ai-testing-for-every-dynamics-365-module',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Codeless AI Testing for Every Dynamics 365 Module', 'testro' ),
					'intro'         => __( 'One Platform for the Whole Suite', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Customer Experience', 'testro' ),
							'description' => __( 'Test sales, marketing, and customer flows. No scripts to write.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Service', 'testro' ),
							'description' => __( 'Cover case handling and service work, start to finish.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'Supply Chain', 'testro' ),
							'description' => __( 'Check inventory, buying, and shipping, as they actually run.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Finance', 'testro' ),
							'description' => __( 'Test money flows with the same care regulated systems need.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Small & Medium Business', 'testro' ),
							'description' => __( 'Cover Business Central and other SMB tools from the same platform.', 'testro' ),
						),
					),
					'outro'         => __( 'A no-code approach means testers don\'t need to learn a scripting language for any part of the suite.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'real-time-alignment-with-microsofts-release-cycle',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Real-Time Alignment With Microsoft\'s Release Cycle', 'testro' ),
					'intro'         => __( 'Tests That Don\'t Fall Behind Every Update', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Automatic Updates as Dynamics 365 Changes', 'testro' ),
							'description' => __( 'Test assets adjust to new releases instead of quietly going stale.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'No More Manual Rebuilds', 'testro' ),
							'description' => __( 'A quarterly Microsoft update doesn\'t mean weeks of rewriting scripts.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Confidence With Every Release', 'testro' ),
							'description' => __( 'Know your tests reflect the current version of D365. Not last quarter\'s version.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what real-time Dynamics 365 testing should mean. Staying in step with Microsoft\'s release calendar on its own. Not scrambling after each one.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'self-healing-tests-that-survive-every-update',
					'columns'       => 3,
					'title'         => __( 'Self-Healing Tests That Survive Every Update', 'testro' ),
					'intro'         => __( 'Locator-Free Automation for a System That Never Stops Changing', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'No Fragile Selectors', 'testro' ),
							'description' => __( 'theTestRo finds Dynamics 365 elements. No relying on brittle locators that break at a glance.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Automatic Recovery', 'testro' ),
							'description' => __( 'The system fixes a shifted field or renamed button on its own, right in the middle of a run.', 'testro' ),
						),
						array(
							'icon'        => 'wrench',
							'title'       => __( 'Lower Maintenance Overhead', 'testro' ),
							'description' => __( 'Less time patching tests. More time finding real bugs.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'dynamics-365-regression-testing-at-scale',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Dynamics 365 Regression Testing at Scale', 'testro' ),
					'intro'         => __( 'Full Regression Without the Multi-Week Wait', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Parallel Execution', 'testro' ),
							'description' => __( 'Run large regression suites across environments at the same time. Not one test after the other.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Reusable Test Components', 'testro' ),
							'description' => __( 'Common flows, like logging in or making a record, become blocks reused across every test.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Risk-Based Coverage', 'testro' ),
							'description' => __( 'Put the business flows that matter most first. We check critical paths before anything else.', 'testro' ),
						),
					),
					'outro'         => __( 'Dynamics 365 regression testing built this way turns a multi-week manual cycle into something that wraps up in days.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'cicd-integration-and-continuous-testing',
					'variant'       => 'tint',
					'title'         => __( 'CI/CD Integration and Continuous Testing', 'testro' ),
					'intro'         => __( 'Testing That Runs With Every Deployment', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with Jenkins, GitHub Actions, Azure DevOps, and GitLab. Dynamics 365 tests trigger on their own as part of your existing pipeline. In-sprint automation means shift-left testing becomes real, not just a talking point. We catch issues while a change still stays cheap to fix.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'end-to-end-automation-across-dynamics-365',
					'columns'       => 3,
					'title'         => __( 'End-to-End Automation Across Dynamics 365 and Connected Systems', 'testro' ),
					'intro'         => __( 'Beyond D365 Alone', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Single Tests Across Multiple Systems', 'testro' ),
							'description' => __( 'Check a flow that spans Dynamics 365 and a linked app in one test. Not two separate ones.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Backend and API Coverage', 'testro' ),
							'description' => __( 'Cover the services and links behind Dynamics 365. Not just what shows on screen.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Omnichannel Validation', 'testro' ),
							'description' => __( 'Check the same business step across web and mobile, wherever your users actually work.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-dynamics-365-testing',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo for Dynamics 365 Testing', 'testro' ),
					'intro'         => __( 'Built for Every Team Running on D365', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Enterprise QA Teams', 'testro' ),
							'description' => __( 'Cover a large-scale, custom Dynamics 365 setup. No matching headcount increase needed.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Business Analysts', 'testro' ),
							'description' => __( 'Write and check tests in plain English. No waiting on a dedicated automation engineer.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'IT and Implementation Teams', 'testro' ),
							'description' => __( 'De-risk a new D365 rollout or move with test coverage built in from day one.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'DevOps Engineers', 'testro' ),
							'description' => __( 'Keep Dynamics 365 tests running on their own as part of the release pipeline.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'microsoft-dynamics-365-test-automation',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-automating-dynamics-365-testing',
					'title'         => __( 'Start Automating Dynamics 365 Testing Today', 'testro' ),
					'intro'         => __( 'Stay Ahead of Every D365 Release', 'testro' ),
					'body'          => __( 'Join enterprise teams already using theTestRo. Cut regression time. Catch issues before every release. Not after.', 'testro' ),
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

		'salesforce-test-automation' => array(
			'slug'  => 'salesforce-test-automation',
			'title' => __( 'Salesforce Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Best Automation Tools for Salesforce Testing & QA Automation', 'testro' ),
				'description' => __( 'Discover the best automation tools for Salesforce testing to validate CRM workflows, integrations, and business processes while improving software quality.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best Automation Tools for Salesforce Testing', 'testro' ),
				'subtitle' => __( 'theTestRo is a Salesforce testing tool built for the Lightning platform\'s constant change. Build tests in plain English. Let self-healing keep them passing through every seasonal update, without waiting on an automation engineer.', 'testro' ),
				'actions'  => array(
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

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-makes-salesforce-hard-to-test',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'What Makes Salesforce Hard to Test', 'testro' ),
					'intro'         => __( 'Why Generic Automation Breaks on Salesforce', 'testro' ),
					'intro_extra'   => __( 'Salesforce isn\'t a typical web app. Testing it like one usually leads to trouble.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'refresh',
							'title'       => __( 'A Shifting Lightning DOM', 'testro' ),
							'description' => __( 'The interface structure changes between orgs and with every seasonal release. Old locators break.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Org-Specific Workflows', 'testro' ),
							'description' => __( 'Most of the real risk sits in the custom flows, Apex triggers, and approval routing your org built itself. Not the standard objects.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Multi-Factor Authentication', 'testro' ),
							'description' => __( 'MFA blocks a lot of automated logins. Teams end up turning it off in test setups and never test the real path.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Skill Gaps in Test Authoring', 'testro' ),
							'description' => __( 'Building solid Salesforce coverage has needed script skills a QA team may not have.', 'testro' ),
						),
					),
					'outro'         => __( 'CRM test automation that ignores these four problems isn\'t truly testing Salesforce. They are testing an easier, less accurate version of it.', 'testro' ),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-teams-get-started',
					'title'         => __( 'How Teams Get Started', 'testro' ),
					'intro'         => __( 'From Sign-Up to Full Coverage in Four Steps', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Connect Your Salesforce Org', 'testro' ),
							'description' => __( 'Point theTestRo at your sandbox or production environment.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'Start With High-Risk Flows First', 'testro' ),
							'description' => __( 'Lead-to-cash and case management usually carry the most risk. Build these tests first.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Add Cloud Coverage Over Time', 'testro' ),
							'description' => __( 'Layer in Service Cloud, CPQ, and custom Apex flows as coverage grows.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'Run Before Every Release', 'testro' ),
							'description' => __( 'Trigger a full suite automatically, so a seasonal update never catches your team unprepared.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'manual-salesforce-qa-vs-automated-testing',
					'columns'       => 4,
					'title'         => __( 'Manual Salesforce QA vs. Automated Testing', 'testro' ),
					'intro'         => __( 'What Changes When Testing Doesn\'t Wait on a Person', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Speed', 'testro' ),
							'description' => __( 'Manual regression on a large org can take days. Automated runs finish in hours.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Consistency', 'testro' ),
							'description' => __( 'A manual tester\'s coverage shifts with time and focus. Automated tests run the same way, every single time.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Update Resilience', 'testro' ),
							'description' => __( 'Manual scripts break the moment a seasonal release lands. Self-healing tests adapt on their own.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Who Can Test', 'testro' ),
							'description' => __( 'Manual testing needs a dedicated engineer for every scripted check. Plain-English tests open coverage to admins too.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'record-and-build-tests-without-code',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Record and Build Tests Without Code', 'testro' ),
					'intro'         => __( 'Capture Real Workflows, No Scripting Required', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'video',
							'title'       => __( 'Record Real Salesforce Flows', 'testro' ),
							'description' => __( 'Capture login, form entries, button clicks, and navigation right from a live session. Exactly as they happen in your org.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Every Action Becomes a Test Step', 'testro' ),
							'description' => __( 'Each click turns on its own into a step you can review and reuse. Not a black box you can\'t edit.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Generate Tests From User Stories', 'testro' ),
							'description' => __( 'Upload a user story from a doc, or link it from Jira. Get a starting test case you can refine before it runs.', 'testro' ),
						),
					),
					'outro'         => __( 'This is Salesforce automation testing built so QA staff, admins, and business users can all pitch in. Not just engineers who know Selenium.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'self-healing-for-salesforces-lightning-ui',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Self-Healing for Salesforce\'s Lightning UI', 'testro' ),
					'intro'         => __( 'Tests That Adapt Instead of Breaking', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Locators Resolved at Runtime', 'testro' ),
							'description' => __( 'theTestRo reads Salesforce metadata to find the right element. No relying on one fragile selector.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Survives Seasonal Releases', 'testro' ),
							'description' => __( 'A Spring, Summer, or Winter release doesn\'t mean rebuilding your suite from the ground up.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Stable Across Profiles and Permissions', 'testro' ),
							'description' => __( 'Tests keep working even as role-based layouts and permission sets shift underneath them.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what real AI Salesforce testing should mean. Stability that holds through the exact kind of change that breaks everything else.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'test-every-salesforce-cloud-from-one-platform',
					'columns'       => 4,
					'title'         => __( 'Test Every Salesforce Cloud From One Platform', 'testro' ),
					'intro'         => __( 'Sales, Service, CPQ, and Beyond', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'target',
							'title'       => __( 'Sales Cloud', 'testro' ),
							'description' => __( 'Test lead capture, assignment rules, scoring, and conversion start to finish.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Service Cloud', 'testro' ),
							'description' => __( 'Cover case creation, escalation, agent console work, and customer self-service.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'CPQ', 'testro' ),
							'description' => __( 'Check product bundling, pricing rules, and quote-to-order flow before a bad setup reaches the deal desk.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'Apex, LWC, and Integrations', 'testro' ),
							'description' => __( 'Cover Apex triggers, Lightning Web Components, and the downstream systems Salesforce connects to.', 'testro' ),
						),
					),
					'outro'         => __( 'One plain-English flow can cover all it. No separate siloed suite for every cloud.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'salesforce-api-and-integration-testing',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Salesforce API and Integration Testing', 'testro' ),
					'intro'         => __( 'Check What Happens Behind the Screen', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'REST and SOAP Coverage', 'testro' ),
							'description' => __( 'Test API rules in the same flow as your UI checks. No separate tool needed.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Downstream System Validation', 'testro' ),
							'description' => __( 'Confirm data lands right in connected ERP, marketing, and billing systems.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Middleware and Integration Checks', 'testro' ),
							'description' => __( 'Catch a broken handoff before a customer ever sees it.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'salesforce-regression-testing-across-every-release',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Salesforce Regression Testing Across Every Release', 'testro' ),
					'intro'         => __( 'Ready Before Every Seasonal Update', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Sandbox Preview Regression', 'testro' ),
							'description' => __( 'Run a full check against sandbox previews. Do this before a seasonal release goes live.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Auto-Healing After Each Update', 'testro' ),
							'description' => __( 'The system fixes broken locators on its own after each release. Fixed before your next run.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Release Readiness Signals', 'testro' ),
							'description' => __( 'Dashboards show which areas need attention before a launch. Not after.', 'testro' ),
						),
					),
					'outro'         => __( 'Salesforce regression testing built this way turns three major annual releases into a routine check. Not a scramble.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'debug-failures-with-full-context',
					'columns'       => 3,
					'title'         => __( 'Debug Failures With Full Context', 'testro' ),
					'intro'         => __( 'Know Exactly What Broke, and Why', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Step-by-Step Execution History', 'testro' ),
							'description' => __( 'Review screenshots and logs for every step of every run.', 'testro' ),
						),
						array(
							'icon'        => 'microscope',
							'title'       => __( 'AI Root Cause Analysis', 'testro' ),
							'description' => __( 'A test fails, and AI checks logs, screenshots, and network traces to point at the real failing part.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Rerun and Isolate Fast', 'testro' ),
							'description' => __( 'Edit, duplicate, or rerun a test from your suite. Isolate UI, data, or workflow issues quickly.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-salesforce-testing-at-scale',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Enterprise Salesforce Testing at Scale', 'testro' ),
					'intro'         => __( 'Built for Complex, Multi-Org Environments', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Multi-Org Parallel Execution', 'testro' ),
							'description' => __( 'Run the same test across sandbox, staging, and live orgs at once. No copied scripts.', 'testro' ),
						),
						array(
							'icon'        => 'database',
							'title'       => __( 'Bring Your Own Test Data', 'testro' ),
							'description' => __( 'Connect internal databases. Handle secrets and passwords safely.', 'testro' ),
						),
						array(
							'icon'        => 'server',
							'title'       => __( 'Deploy in Your Own Environment', 'testro' ),
							'description' => __( 'Run in a private cloud or on your own servers when data location matters.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Full Traceability', 'testro' ),
							'description' => __( 'Track outcomes and failure patterns across every test round from one place.', 'testro' ),
						),
					),
					'outro'         => __( 'Enterprise Salesforce testing has to hold up across many orgs, teams, and releases at once. Not just a single sandbox.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'fits-into-your-existing-workflow',
					'variant'       => 'tint',
					'title'         => __( 'Fits Into Your Existing Workflow', 'testro' ),
					'intro'         => __( 'No New Process to Learn', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with Jira, Jenkins, GitHub Actions, Azure DevOps, and Slack. Trigger Salesforce tests on their own as part of your deployment pipeline. Route failures straight into the tools your team already uses.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-salesforce-testing',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo for Salesforce Testing', 'testro' ),
					'intro'         => __( 'Built for Every Role Touching the Platform', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Salesforce Admins', 'testro' ),
							'description' => __( 'Build and keep test coverage. No coding needed.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'QA Engineers', 'testro' ),
							'description' => __( 'Cover tricky org-specific work without hand-scripting every check.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'DevOps Teams', 'testro' ),
							'description' => __( 'Trigger Salesforce tests on their own as part of the release pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Salesforce Architects', 'testro' ),
							'description' => __( 'Get a clear view across a highly customized org setup.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'salesforce-test-automation',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-automating-salesforce-testing',
					'title'         => __( 'Start Automating Salesforce Testing Today', 'testro' ),
					'intro'         => __( 'Keep Coverage Intact Through Every Release', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo. Catch issues before every seasonal release. Not after.', 'testro' ),
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

		'oracle-testing' => array(
			'slug'  => 'oracle-testing',
			'title' => __( 'Oracle Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Best Automated Oracle Testing Tool for Enterprise ERP', 'testro' ),
				'description' => __( 'Automate Oracle ERP testing with the best automated Oracle testing tool. Validate business workflows, integrations, and enterprise applications with confidence.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best Automated Oracle Testing Tool', 'testro' ),
				'subtitle' => __( 'Automate Oracle Cloud Fusion, EBS, HCM, SCM, and ERP testing in plain English. Run across thousands of browsers and real devices. Self-healing keeps tests passing through every quarterly patch. No scripting needed.', 'testro' ),
				'actions'  => array(
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

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'oracle-testing-built-for-a-punishing-release-schedule',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Oracle Testing Built for a Punishing Release Schedule', 'testro' ),
					'intro'         => __( 'Short testing windows, brittle manual scripts, and constant patches put QA teams under real pressure. Oracle\'s applications don\'t sit still. Testing them like a normal web app usually falls apart within a quarter.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'No Scripting or Coding Required', 'testro' ),
							'description' => __( 'No scripting or coding required to build a test.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Broad Oracle Application Coverage', 'testro' ),
							'description' => __( 'Covers Oracle Cloud Fusion, EBS, HCM, SCM, and ERP from one platform.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Fast Regression Execution', 'testro' ),
							'description' => __( 'Full regression suites finish in hours, not weeks.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Through Updates', 'testro' ),
							'description' => __( 'Self-healing tests adjust on their own after every patch or quarterly update.', 'testro' ),
						),
					),
					'outro'         => __( 'theTestRo writes Oracle tests in plain English and keeps them healthy across every Cloud and EBS release. Whether your team automates in-house or leans on outside testing support.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'manual-oracle-testing-vs-ai-oracle-testing',
					'columns'       => 4,
					'title'         => __( 'Manual Oracle Testing vs. AI Oracle Testing', 'testro' ),
					'intro'         => __( 'What Changes When Testing Doesn\'t Wait on a Person', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Speed', 'testro' ),
							'description' => __( 'Manual regression on a large Oracle footprint can take weeks. Automated runs finish in hours.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Consistency', 'testro' ),
							'description' => __( 'A manual tester\'s coverage shifts with time and focus. Automated tests run the same way, every time.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Update Resilience', 'testro' ),
							'description' => __( 'Manual scripts break the moment a patch lands. Self-healing tests adapt on their own.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Who Can Test', 'testro' ),
							'description' => __( 'Manual testing needs a dedicated engineer for every scripted check. Plain-English tests open coverage to business users too.', 'testro' ),
						),
					),
					'outro'         => __( 'Oracle applications carry a lot of business logic in financial close, payroll, and supply chain rules. A manual process that works at a small scale often breaks down when a company adds a module. It can also fail when the company expands into a new region.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'module-coverage-one-platform-for-every-oracle-app',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Module Coverage: One Platform for Every Oracle App', 'testro' ),
					'intro'         => __( 'Test Every Corner of the Oracle Stack', 'testro' ),
					'intro_extra'   => __( 'Test Oracle Cloud Fusion, EBS, HCM, SCM, CRM, and ERP from one platform. No piecing together separate tools for each part.', 'testro' ),
					'intro_body'    => __( 'What\'s covered:', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'  => 'cloud',
							'title' => __( 'Oracle Cloud Fusion', 'testro' ),
						),
						array(
							'icon'  => 'server',
							'title' => __( 'Oracle EBS', 'testro' ),
						),
						array(
							'icon'  => 'package',
							'title' => __( 'HCM and SCM', 'testro' ),
						),
						array(
							'icon'  => 'coins',
							'title' => __( 'Financials and CRM', 'testro' ),
						),
						array(
							'icon'  => 'layers-api',
							'title' => __( 'REST and SOAP APIs', 'testro' ),
						),
						array(
							'icon'  => 'git-branch',
							'title' => __( 'Sandbox all the way to production', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'quarterly-update-testing',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Quarterly Update Testing: Catch Regressions Before They Ship', 'testro' ),
					'intro'         => __( 'Stay Ahead of Oracle\'s Release Cadence', 'testro' ),
					'intro_extra'   => __( 'theTestRo runs full regression suites against staging. Problems appear before they ever touch production.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Day-One Staging Tests', 'testro' ),
							'description' => __( 'Day-one staging tests before an update goes live.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Self-Healing Tests', 'testro' ),
							'description' => __( 'Self-healing tests when a part changes underneath them.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Full Regression Coverage', 'testro' ),
							'description' => __( 'Full regression coverage from sandbox all the way to production.', 'testro' ),
						),
					),
					'outro'         => __( 'Oracle Cloud\'s fast update pace calls for fast regression coverage. A suite that used to take weeks to re-check can run in hours instead.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'cicd-integration-ship-without-the-manual-qa-bottleneck',
					'columns'       => 4,
					'title'         => __( 'CI/CD Integration: Ship Without the Manual QA Bottleneck', 'testro' ),
					'intro'         => __( 'Gate Every Oracle Deployment on Real Results', 'testro' ),
					'intro_extra'   => __( 'Build a release-readiness pipeline. A run that checks itself gates every Oracle deployment. Pass or fail signals your team can trust.', 'testro' ),
					'intro_body'    => __( 'What connects:', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Jenkins and GitHub Actions', 'testro' ),
							'description' => __( 'Run tests automatically on every build.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Fit right into your existing pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira Defect Sync', 'testro' ),
							'description' => __( 'Failed tests file straight into your tickets.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack Alerts', 'testro' ),
							'description' => __( 'Get notified the moment a deployment needs attention.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'database-and-integration-testing',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Database and Integration Testing', 'testro' ),
					'intro'         => __( 'Check Data, Not Just the Interface', 'testro' ),
					'intro_extra'   => __( 'Check Oracle Database flows start to finish. Connect theTestRo to Oracle DB through your setup already in place. Confirm data stays correct, ERP data flows right, and business steps hold up after every change.', 'testro' ),
					'intro_body'    => __( 'Works with:', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'server',
							'title'       => __( 'Jenkins', 'testro' ),
							'description' => __( 'Trigger database checks automatically on every build.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack', 'testro' ),
							'description' => __( 'Get notified the moment a data flow breaks.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira', 'testro' ),
							'description' => __( 'File data-related bugs straight into your tickets.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Run checks right inside your existing pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Webhooks', 'testro' ),
							'description' => __( 'Connect to any tool without extra setup.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'maintenance-and-reporting',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Maintenance and Reporting: Keep the Suite Healthy on Its Own', 'testro' ),
					'intro'         => __( 'Know What Needs Attention Before You Ship', 'testro' ),
					'intro_extra'   => __( 'theTestRo shows failure trends, root causes, and release readiness signs. Your team knows exactly what to check before every Oracle deployment.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'AI-Powered Root Cause Diagnostics', 'testro' ),
							'description' => __( 'AI-powered root cause diagnostics on every failure.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Real-Time Test Reporting and Dashboards', 'testro' ),
							'description' => __( 'Real-time test reporting and dashboards.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Flaky Test Detection', 'testro' ),
							'description' => __( 'Flaky test detection, flagged on its own.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-to-get-started-with-oracle-testing',
					'title'         => __( 'How to Get Started With Oracle Testing', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Start Free', 'testro' ),
							'description' => __( 'Sign up and connect your Oracle environment. No credit card needed. No setup delay either.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'Author Your First Test', 'testro' ),
							'description' => __( 'Describe your Oracle workflow in plain English. theTestRo builds and runs the full test on its own.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Scale With Confidence', 'testro' ),
							'description' => __( 'Run your full Oracle regression suite in parallel. Test across thousands of browsers and real devices before every update.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-makes-oracle-testing-different',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'What Makes Oracle Testing Different From a Standard Web App', 'testro' ),
					'intro'         => __( 'Why Generic Automation Tools Fall Short', 'testro' ),
					'intro_extra'   => __( 'Oracle apps carry deep business logic. A typical web testing tool never handled it.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Heavy Configuration', 'testro' ),
							'description' => __( 'Every org sets up Oracle its own way. Each setup needs its own layer of test coverage.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Complex Approval Chains', 'testro' ),
							'description' => __( 'Financial and procurement flows often route through several approval steps. Each one needs its own check.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Batch and Scheduled Jobs', 'testro' ),
							'description' => __( 'Oracle relies on background jobs as much as screens a user clicks through. Real coverage has to include both.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Cross-Module Dependencies', 'testro' ),
							'description' => __( 'A change in Financials can quietly affect Procurement or HR. Tests need to catch that ripple. Not just the surface change.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'oracle-validation-from-sandbox-to-production',
					'columns'       => 3,
					'title'         => __( 'Oracle Validation, From Sandbox to Production', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Plain-English Test Authoring', 'testro' ),
							'description' => __( 'Describe any Oracle flow in plain English. theTestRo writes the full test on its own. This covers Cloud Fusion, EBS, HCM, and ERP.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Auto-Healing', 'testro' ),
							'description' => __( 'AI agents adapt when Oracle parts change after a patch. Test maintenance drops a lot.', 'testro' ),
						),
						array(
							'icon'        => 'video',
							'title'       => __( 'Rich Execution Evidence', 'testro' ),
							'description' => __( 'Get screenshots, logs, network traces, and video. Root cause investigation moves faster on every failure.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Full Module Coverage', 'testro' ),
							'description' => __( 'Test Oracle ERP, HCM, SCM, CRM, Financials, and Manufacturing. Third-party links included, all in one flow.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Quarterly Update Testing', 'testro' ),
							'description' => __( 'Run full regression suites against staging. Do this before every quarterly update goes live.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Secure Connections', 'testro' ),
							'description' => __( 'Connect to Oracle Cloud, EBS, and on-premise setups through safe channels. No added infrastructure to run.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-oracle-testing',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo for Oracle Testing', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'coins',
							'title'       => __( 'Oracle ERP Teams', 'testro' ),
							'description' => __( 'Cover Financials, SCM, and HCM work. No matching rise in QA headcount needed.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Implementation Partners', 'testro' ),
							'description' => __( 'De-risk an Oracle Cloud move or upgrade with test coverage built in from day one.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'IT and Release Managers', 'testro' ),
							'description' => __( 'Get a clear go or no-go signal before every quarterly deploy.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'QA Engineers', 'testro' ),
							'description' => __( 'Build broad Oracle coverage without hand-scripting every module.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-teams-get-started',
					'title'         => __( 'How Teams Get Started', 'testro' ),
					'intro'         => __( 'From Sign-Up to Full Coverage in Four Steps', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Connect Your Oracle Environment', 'testro' ),
							'description' => __( 'Point theTestRo at your Cloud Fusion, EBS, or on-premise setup.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'Start With High-Risk Flows First', 'testro' ),
							'description' => __( 'Financial close and order-to-cash usually carry the most risk. Build these tests first.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Add Module Coverage Over Time', 'testro' ),
							'description' => __( 'Layer in HCM, SCM, and CRM tests as coverage grows.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'Run Before Every Quarterly Update', 'testro' ),
							'description' => __( 'Trigger a full suite on its own, so a patch never catches your team off guard.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'oracle-testing',
				),

				array(
					'type'          => 'cta',
					'id'            => 'automate-your-oracle-testing-today',
					'title'         => __( 'Automate Your Oracle Testing Today', 'testro' ),
					'intro'         => __( 'Build, run, and maintain your Oracle test cases across Cloud Fusion, EBS, ERP, HCM, and SCM in plain English, at scale.', 'testro' ),
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

		'sap-testing' => array(
			'slug'  => 'sap-testing',
			'title' => __( 'SAP Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Best Automated SAP Testing Tool for Faster ERP Testing', 'testro' ),
				'description' => __( 'Automate SAP ERP testing with the best automated SAP testing tool. Validate business processes, integrations, and enterprise applications with confidence.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best Automated SAP Testing Tool', 'testro' ),
				'subtitle' => __( 'theTestRo brings AI SAP testing to a system that rarely sits still. Build codeless tests aligned with SAP\'s own release schedule. Keep them working through every update, patch, and configuration change.', 'testro' ),
				'actions'  => array(
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

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'why-sap-testing-needs-its-own-approach',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Why SAP Testing Needs Its Own Approach', 'testro' ),
					'intro'         => __( 'SAP sits at the center of some of the most critical business operations in the world. Finance, supply chain, HR, and procurement all depend on it. When something breaks in an SAP setup, the damage doesn\'t stay contained. It ripples across every department that relies on it.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Heavy Customization', 'testro' ),
							'description' => __( 'Organizations set up every SAP landscape differently. Each customization needs its own test coverage.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Constant Releases', 'testro' ),
							'description' => __( 'SAP updates arrive on a regular cadence. Each one can quietly break existing scripts.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Deep Cross-System Integration', 'testro' ),
							'description' => __( 'SAP rarely runs alone. APIs, middleware, and third-party systems add real complexity.', 'testro' ),
						),
						array(
							'icon'        => 'clock',
							'title'       => __( 'Massive Regression Packs', 'testro' ),
							'description' => __( 'A full SAP regression suite run by hand can take weeks. Not hours.', 'testro' ),
						),
					),
					'outro'         => __( 'SAP ERP testing that ignores these four realities isn\'t truly testing your system. Testing a simpler version won\'t hold up in production.', 'testro' ),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-teams-get-started-with-sap-testing',
					'title'         => __( 'How Teams Get Started With SAP Testing', 'testro' ),
					'intro'         => __( 'From Sign-Up to Full Coverage in Four Steps', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Connect Your SAP Landscape', 'testro' ),
							'description' => __( 'Point theTestRo at your SAP environment, whether it\'s ECC, S/4HANA, or a mix of both.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'Start With High-Risk Flows First', 'testro' ),
							'description' => __( 'Order-to-cash and procure-to-pay usually carry the most risk. Build these tests first.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Add Module Coverage Over Time', 'testro' ),
							'description' => __( 'Layer in Financials, HCM, and SCM tests as coverage grows.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'Run Before Every Release', 'testro' ),
							'description' => __( 'Trigger a full suite on its own, so a quarterly SAP update never catches your team off guard.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'four-pillars-of-testros-sap-testing-approach',
					'columns'       => 4,
					'title'         => __( 'Four Pillars of theTestRo\'s SAP Testing Approach', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Speed Digital Assurance', 'testro' ),
							'description' => __( 'Turn a regression pack that used to take weeks into something that runs overnight. Parallel runs across modules, browsers, and devices mean feedback comes back fast. Not eventually.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Empower Business Users', 'testro' ),
							'description' => __( 'Codeless test creation means QA staff and business users can build and read SAP test steps. No deep scripting skills needed. Coverage doesn\'t bottleneck on one or two specialists.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Achieve Continuous Delivery', 'testro' ),
							'description' => __( 'Shift-left testing becomes real, not just a talking point, when tests run on their own inside your CI/CD pipeline. We catch issues while a change still stays cheap to fix.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Real-Time Release Alignment', 'testro' ),
							'description' => __( 'As SAP ships updates, test assets adjust on their own. They don\'t quietly go stale. A quarterly release doesn\'t mean rebuilding your suite from scratch.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'one-platform-for-the-complete-sap-suite',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'One Platform for the Complete SAP Suite', 'testro' ),
					'intro'         => __( 'Every Module, Covered From the Same Place', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Enterprise Resource Planning', 'testro' ),
							'description' => __( 'Core ERP workflows tested start to finish. Not just spot-checked.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Financial Management', 'testro' ),
							'description' => __( 'Test money processes with the accuracy regulated systems need.', 'testro' ),
						),
						array(
							'icon'        => 'package',
							'title'       => __( 'Supply Chain Management', 'testro' ),
							'description' => __( 'Check inventory, buying, and fulfillment as they actually run.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Spend Management', 'testro' ),
							'description' => __( 'Cover purchasing and spend flows alongside the rest of the suite.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Human Capital Management', 'testro' ),
							'description' => __( 'Test HCM steps without a separate tool for HR-specific flows.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'CRM and Customer Experience', 'testro' ),
							'description' => __( 'Extend coverage into customer-facing SAP modules from the same platform. This is SAP application testing that covers the whole business, not just back-office screens.', 'testro' ),
						),
					),
					'outro'         => __( 'A codeless approach covers every one of these modules. No dedicated scripting specialist needed for each.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'manual-sap-testing-vs-ai-sap-testing',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'Manual SAP Testing vs. AI SAP Testing', 'testro' ),
					'intro'         => __( 'What Changes When Testing Doesn\'t Wait on a Person', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Speed', 'testro' ),
							'description' => __( 'Manual regression on a large SAP landscape can take weeks. Automated runs finish in days, sometimes hours.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Consistency', 'testro' ),
							'description' => __( 'A manual tester\'s coverage shifts with time and focus. Automated tests run the same way, every time.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Update Resilience', 'testro' ),
							'description' => __( 'Manual scripts break the moment a release lands. Self-healing tests adapt on their own.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Who Can Test', 'testro' ),
							'description' => __( 'Manual testing needs a dedicated specialist for every scripted check. Codeless tests open coverage to business users too.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'locator-free-automation-for-sap-elements',
					'columns'       => 4,
					'title'         => __( 'Locator-Free Automation for SAP Elements', 'testro' ),
					'intro'         => __( 'Testing That Doesn\'t Break When SAP Changes', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'No Brittle Locators', 'testro' ),
							'description' => __( 'theTestRo finds SAP elements. It doesn\'t rely on one fragile selector.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Business Process Representation', 'testro' ),
							'description' => __( 'Test assets map to real business steps. Not just single screen elements.', 'testro' ),
						),
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Automatic Change Impact', 'testro' ),
							'description' => __( 'A dependency changes, and theTestRo flags it. Your team doesn\'t learn in a failed run.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Reusable Assets', 'testro' ),
							'description' => __( 'Parts tied to real SAP flow get reused across tests. Less duplicate work.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what real automated SAP testing should mean. Stability that survives the kind of change that breaks brittle, script-based approaches.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'end-to-end-automation-across-enterprise-apps',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'End-to-End Automation Across Enterprise Apps', 'testro' ),
					'intro'         => __( 'Beyond SAP Alone', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'One Test, Multiple Systems', 'testro' ),
							'description' => __( 'Check a flow that spans SAP and a connected app in one test. Not two separate ones.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'Backend and Microservices Coverage', 'testro' ),
							'description' => __( 'Test custom apps and back-end services right alongside the SAP interface.', 'testro' ),
						),
						array(
							'icon'        => 'smartphone',
							'title'       => __( 'Omnichannel Validation', 'testro' ),
							'description' => __( 'Check the same business process across web, mobile, and desktop, wherever your users actually work.', 'testro' ),
						),
					),
					'outro'         => __( 'Enterprise SAP testing has to reach past the SAP GUI itself. Real business steps rarely stay in just one system.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'continuous-testing-aligned-with-every-sap-release',
					'variant'       => 'tint',
					'columns'       => 4,
					'title'         => __( 'Continuous Testing Aligned With Every SAP Release', 'testro' ),
					'intro'         => __( 'CI/CD Built In, Not Bolted On', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'rocket',
							'title'       => __( 'In-Sprint Automation', 'testro' ),
							'description' => __( 'Shift-left testing happens as part of development. Not after it.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Coverage Analysis and Traceability', 'testro' ),
							'description' => __( 'Smart planning shows what\'s covered and what isn\'t.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'title'       => __( 'Risk-Based Test Planning', 'testro' ),
							'description' => __( 'Put coverage around the business steps that carry the most risk.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'CI Pipeline Integration', 'testro' ),
							'description' => __( 'Connect to your existing pipeline. Get automated regression runs on every real change.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-sap-testing-at-scale',
					'columns'       => 3,
					'title'         => __( 'Enterprise SAP Testing at Scale', 'testro' ),
					'intro'         => __( 'Built for Large, Complex Landscapes', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Cross-Module Regression', 'testro' ),
							'description' => __( 'Catch the ripple effect when a change in one module quietly affects another.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Role-Based Access', 'testro' ),
							'description' => __( 'Control who can build, edit, and approve tests across a growing org.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Audit-Ready Traceability', 'testro' ),
							'description' => __( 'Clear records connecting requirements, tests, and results back up compliance reviews. No extra manual work.', 'testro' ),
						),
					),
					'outro'         => __( 'Enterprise SAP testing has to hold up across a landscape with dozens of links and years of customization. Not just a clean demo environment.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-sap-testing',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo for SAP Testing', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'SAP QA Teams', 'testro' ),
							'description' => __( 'Cover a large, highly customized SAP footprint. No matching rise in headcount needed.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'Business Process Owners', 'testro' ),
							'description' => __( 'Write and review test steps in plain language. No waiting on a scripting specialist.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Implementation Partners', 'testro' ),
							'description' => __( 'De-risk an S/4HANA move or upgrade with test coverage built in from day one.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'DevOps Engineers', 'testro' ),
							'description' => __( 'Keep SAP tests running on their own as part of the release pipeline.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'sap-testing',
				),

				array(
					'type'          => 'cta',
					'id'            => 'get-started-on-your-sap-codeless-test-automation-journey',
					'title'         => __( 'Get Started on Your SAP Codeless Test Automation Journey', 'testro' ),
					'intro'         => __( 'Join enterprise teams already using theTestRo\'s SAP test automation to cut regression time and catch issues before every release. Not after.', 'testro' ),
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

		'workday-testing' => array(
			'slug'  => 'workday-testing',
			'title' => __( 'Workday Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Best Workday Testing Automation Tool for Enterprise HR', 'testro' ),
				'description' => __( 'Automate Workday testing with the best Workday testing automation tool. Validate HR, payroll, finance, and enterprise workflows while improving software quality.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best Workday Testing Automation Tool', 'testro' ),
				'subtitle' => __( 'Automate Workday HCM, Payroll, Financial Management, and Adaptive Planning testing in plain English. Run across thousands of browsers and real devices. Self-healing keeps tests working through every major software release. No scripting needed.', 'testro' ),
				'actions'  => array(
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

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'workday-testing-that-survives-every-r1-r2-release',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Workday Testing That Survives Every R1/R2 Release', 'testro' ),
					'intro'         => __( 'Fragile manual scripts and biannual releases put HR and Finance QA teams under real pressure. Every Workday customer gets the same two major releases a year, whether they asked for the changes or not. theTestRo writes Workday tests in plain English and keeps them healthy across every release.', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'pen-square',
							'title'       => __( 'No Scripting or Coding Required', 'testro' ),
							'description' => __( 'No scripting or coding required to build a test.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Complete Workday Coverage', 'testro' ),
							'description' => __( 'Covers Workday HCM, Payroll, Financials, and Adaptive Planning from one platform.', 'testro' ),
						),
						array(
							'icon'        => 'zap',
							'title'       => __( 'Fast Regression', 'testro' ),
							'description' => __( 'Full regression suites finish in hours, not weeks.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Through Releases', 'testro' ),
							'description' => __( 'Self-healing tests automatically adjust after every R1/R2 release or configuration change.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'manual-workday-testing-vs-ai-workday-testing',
					'columns'       => 4,
					'title'         => __( 'Manual Workday Testing vs. AI Workday Testing', 'testro' ),
					'intro'         => __( 'What Changes When Testing Doesn\'t Wait on a Person', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Speed', 'testro' ),
							'description' => __( 'Manual regression on a large Workday tenant can take weeks. Automated runs finish in days, sometimes hours.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Consistency', 'testro' ),
							'description' => __( 'A manual tester\'s coverage shifts with time and focus. Automated tests run the same way, every time.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Release Resilience', 'testro' ),
							'description' => __( 'Manual scripts break the moment R1 or R2 lands. Self-healing tests adapt on their own.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Who Can Test', 'testro' ),
							'description' => __( 'Manual testing needs a dedicated engineer for every scripted check. Plain-English tests open coverage to HR and Finance staff too.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'module-coverage-one-platform-for-every-tenant',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Module Coverage: One Platform for Every Tenant', 'testro' ),
					'intro'         => __( 'Test Workday End-to-End', 'testro' ),
					'intro_extra'   => __( 'Test Workday HCM, Payroll, Financial Management, and Adaptive Planning from one platform.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Workday HCM', 'testro' ),
							'description' => __( 'Test hire, transfer, pay change, and benefits sign-up across the full HCM path.', 'testro' ),
						),
						array(
							'icon'        => 'coins',
							'title'       => __( 'Workday Payroll', 'testro' ),
							'description' => __( 'Check gross-to-net math, retro pay, and off-cycle runs. Every pay group covered.', 'testro' ),
						),
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Financial Management', 'testro' ),
							'description' => __( 'Cover buying, expenses, journals, and the financial close in one flow.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Adaptive Planning and Extend', 'testro' ),
							'description' => __( 'Confirm planning models and custom Extend apps work right. From sandbox to production.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'r1-r2-release-testing',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'R1/R2 Release Testing: Catch Regressions Before They Ship', 'testro' ),
					'intro'         => __( 'Stay Ahead of Workday\'s Release Cadence', 'testro' ),
					'intro_extra'   => __( 'theTestRo runs full regression suites against the preview tenant. Problems surface before they ever touch production.', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Day-One Preview Tenant Tests', 'testro' ),
							'description' => __( 'Day-one preview tenant tests before R1 or R2 goes live.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Self-Healing Through Business Process Changes', 'testro' ),
							'description' => __( 'Self-healing tests when business processes change.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'End-to-End Regression Coverage', 'testro' ),
							'description' => __( 'End-to-end regression coverage from sandbox to production.', 'testro' ),
						),
					),
					'outro'         => __( 'Workday\'s biannual release cadence calls for fast regression coverage. A suite that used to take weeks to re-check can run in hours instead.', 'testro' ),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-teams-get-started-with-testro',
					'title'         => __( 'How Teams Get Started With theTestRo', 'testro' ),
					'intro'         => __( 'From Sign-Up to Full Coverage in Four Steps', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Connect Your Workday Tenant', 'testro' ),
							'description' => __( 'Point theTestRo at your sandbox or preview environment.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'Start With High-Risk Flows First', 'testro' ),
							'description' => __( 'Hire-to-retire and payroll runs usually carry the most risk. Build these tests first.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Add Module Coverage Over Time', 'testro' ),
							'description' => __( 'Layer in Financials, Benefits, and Recruiting tests as coverage grows.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'Run Before Every R1 or R2', 'testro' ),
							'description' => __( 'Trigger a full suite on its own, so a major production release never catches your team off guard.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'cicd-integration-ship-without-the-manual-qa-bottleneck',
					'columns'       => 4,
					'title'         => __( 'CI/CD Integration: Ship Without the Manual QA Bottleneck', 'testro' ),
					'intro'         => __( 'Gate Every Workday Deployment on Real Results', 'testro' ),
					'intro_extra'   => __( 'Build a pipeline that checks release readiness. Every Workday deploy runs only after a self-checking run gates it. Pass or fail signals your team can trust.', 'testro' ),
					'intro_body'    => __( 'What connects:', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Jenkins and GitHub Actions', 'testro' ),
							'description' => __( 'Run tests automatically on every build.', 'testro' ),
						),
						array(
							'icon'        => 'cloud',
							'title'       => __( 'Azure DevOps', 'testro' ),
							'description' => __( 'Fit right into your existing pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Jira Defect Sync', 'testro' ),
							'description' => __( 'Failed tests file straight into your tickets.', 'testro' ),
						),
						array(
							'icon'        => 'message-text',
							'title'       => __( 'Slack Alerts', 'testro' ),
							'description' => __( 'Get notified the moment a deployment needs attention.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'workday-integration-testing',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Workday Integration Testing', 'testro' ),
					'intro'         => __( 'Check What Connects to Workday', 'testro' ),
					'intro_extra'   => __( 'Check Workday EIBs, Studio flows, and Core Connectors start to finish. Connect theTestRo to your setup already in place. Test payroll, benefits, and finance data flows after every change.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'database',
							'title'       => __( 'EIB Inbound and Outbound', 'testro' ),
							'description' => __( 'Confirm loads and extracts keep data accurate. Both directions checked.', 'testro' ),
						),
						array(
							'icon'        => 'infinity',
							'title'       => __( 'Workday Studio Orchestrations', 'testro' ),
							'description' => __( 'Test multi-step Studio flows start to finish. Across connected payroll and finance systems.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Core Connectors', 'testro' ),
							'description' => __( 'Check benefits, payroll, and finance connectors stay correct after every setup change.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'Your Automation Stack', 'testro' ),
							'description' => __( 'Trigger and check Workday data flows from Jenkins, Jira, Slack, and Azure DevOps.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'maintenance-and-reporting',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'Maintenance and Reporting: Keep Your Suite Healthy Automatically', 'testro' ),
					'intro'         => __( 'Know What Needs Attention Before You Ship', 'testro' ),
					'intro_extra'   => __( 'theTestRo shows failure trends, root causes, and release readiness signs. Your team knows exactly what to check before every Workday deployment.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'microscope',
							'title'       => __( 'AI-Powered Root Cause Detection', 'testro' ),
							'description' => __( 'AI-powered root cause detection on every failure.', 'testro' ),
						),
						array(
							'icon'        => 'chart-bar',
							'title'       => __( 'Real-Time Test Reporting and Dashboards', 'testro' ),
							'description' => __( 'Real-time test reporting and dashboards.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'Flaky Test Detection', 'testro' ),
							'description' => __( 'Flaky test detection, flagged on its own.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-to-get-started-with-workday-testing',
					'title'         => __( 'How to Get Started With Workday Testing', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Start Free', 'testro' ),
							'description' => __( 'Sign up and connect your Workday tenant. No credit card or setup delay needed.', 'testro' ),
						),
						array(
							'icon'        => 'pen-square',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'Author Your First Test', 'testro' ),
							'description' => __( 'Describe your Workday business process in plain English. theTestRo builds and runs the full test on its own.', 'testro' ),
						),
						array(
							'icon'        => 'rocket',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Scale With Confidence', 'testro' ),
							'description' => __( 'Run your full Workday regression suite in parallel. Test across thousands of browsers and real devices. Do this before every R1 or R2 release.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'workday-validation-from-sandbox-to-production',
					'columns'       => 3,
					'title'         => __( 'Workday Validation, From Sandbox to Production', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Plain-English Test Authoring', 'testro' ),
							'description' => __( 'Describe any Workday business process in plain English. theTestRo writes the full test on its own. This covers HCM, Payroll, and Financials.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Auto-Healing', 'testro' ),
							'description' => __( 'AI agents adapt when Workday steps or setups change after a major platform release. Test maintenance drops a lot.', 'testro' ),
						),
						array(
							'icon'        => 'video',
							'title'       => __( 'Rich Execution Evidence', 'testro' ),
							'description' => __( 'Get screenshots, logs, network traces, and video. Use them to speed up root cause work. Do this for every Workday failure.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Full Module Coverage', 'testro' ),
							'description' => __( 'Test Workday HCM, Payroll, Financial Management, and Adaptive Planning. Third-party links included, all in one flow.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'R1/R2 Release Testing', 'testro' ),
							'description' => __( 'Run full Workday regression suites against preview tenants. Do this before every major release goes live.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Secure Tunnel', 'testro' ),
							'description' => __( 'Connect to Workday tenants through safe channels. No infrastructure overhead to manage.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-workday-testing',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo for Workday Testing', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'user-check',
							'title'       => __( 'HR and Finance QA Teams', 'testro' ),
							'description' => __( 'Cover HCM, Payroll, and Financials. No matching rise in headcount needed.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Workday Implementation Partners', 'testro' ),
							'description' => __( 'De-risk a Workday rollout or tenant move with test coverage built in from day one.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'IT and Release Managers', 'testro' ),
							'description' => __( 'Get a clear go or no-go signal before every major production deployment.', 'testro' ),
						),
						array(
							'icon'        => 'code',
							'title'       => __( 'QA Engineers', 'testro' ),
							'description' => __( 'Build broad Workday coverage without hand-scripting every business process.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'what-makes-workday-testing-different',
					'columns'       => 4,
					'title'         => __( 'What Makes Workday Testing Different From a Standard Web App', 'testro' ),
					'intro'         => __( 'Why Generic Automation Tools Fall Short', 'testro' ),
					'intro_extra'   => __( 'Workday doesn\'t expose stable element IDs the way a typical web app does. That alone breaks most script-based tools.', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Dynamic Rendering', 'testro' ),
							'description' => __( 'Selector-based scripts break more often on Workday than on a hand-built app.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'title'       => __( 'Forced Releases', 'testro' ),
							'description' => __( 'Every Workday customer gets the same two releases a year. Each one comes with a short preview window to test it.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'Module-Specific Scenarios', 'testro' ),
							'description' => __( 'HCM, Payroll, Benefits, and Recruiting each break in different ways. A passing test in one module doesn\'t mean a linked module still works.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Complex Business Rules', 'testro' ),
							'description' => __( 'Pay math, benefits rules, and approval chains carry real logic. A simple click-through test won\'t catch that.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'workday-testing',
				),

				array(
					'type'          => 'cta',
					'id'            => 'automate-your-workday-testing-today',
					'title'         => __( 'Automate Your Workday Testing Today', 'testro' ),
					'intro'         => __( 'Build, run, and maintain your Workday test cases across HCM, Payroll, Financials, and Adaptive Planning in plain English, at scale.', 'testro' ),
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

		'servicenow-testing' => array(
			'slug'  => 'servicenow-testing',
			'title' => __( 'ServiceNow Testing', 'testro' ),
			'seo'   => array(
				'title'       => __( 'Best ServiceNow Testing Automation Tool for Enterprise', 'testro' ),
				'description' => __( 'Automate ServiceNow testing with the best ServiceNow testing automation tool. Validate IT workflows, integrations, and business processes with confidence.', 'testro' ),
			),

			'hero' => array(
				'title'    => __( 'Best ServiceNow Testing Automation Tool', 'testro' ),
				'subtitle' => __( 'theTestRo is a ServiceNow testing tool built for a platform that changes constantly. Describe a workflow in plain English. Let AI generate, run, and heal the test through every release. No scripting required.', 'testro' ),
				'actions'  => array(
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

			'sections' => array(

				array(
					'type'          => 'feature-grid',
					'id'            => 'why-servicenow-testing-feels-broken',
					'variant'       => 'spotlight',
					'columns'       => 4,
					'title'         => __( 'Why ServiceNow Testing Feels Broken', 'testro' ),
					'intro'         => __( 'The Pain Every ServiceNow QA Team Knows', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'alert-octagon',
							'title'       => __( 'Fragile Scripts Break With Every Change', 'testro' ),
							'description' => __( 'A small UI or workflow update can knock out a whole test suite overnight.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'ATF Gaps Leave Portals Untested', 'testro' ),
							'description' => __( 'ServiceNow\'s own test framework covers forms well. Modern portals and custom UIs often fall outside its reach.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Upgrades Disrupt Workflows', 'testro' ),
							'description' => __( 'Major platform releases can shift logic with no warning. Regressions appear that nobody saw coming.', 'testro' ),
						),
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Dynamic Elements Defeat Locators', 'testro' ),
							'description' => __( 'ServiceNow renders UI on the fly. Selector-based scripts break far more often than on a hand-built app.', 'testro' ),
						),
					),
					'outro'         => __( 'ServiceNow test automation that ignores these four realities isn\'t genuinely testing your instance. They are testing a version that stopped matching reality months ago.', 'testro' ),
				),

				array(
					'type'          => 'pipeline',
					'id'            => 'how-teams-get-started',
					'title'         => __( 'How Teams Get Started', 'testro' ),
					'intro'         => __( 'From Sign-Up to Full Coverage in Four Steps', 'testro' ),
					'heading_level' => 2,
					'items'         => array(
						array(
							'icon'        => 'plug',
							'stage'       => __( 'Step 1', 'testro' ),
							'title'       => __( 'Connect Your Instance', 'testro' ),
							'description' => __( 'Point theTestRo at your dev, test, or staging ServiceNow environment.', 'testro' ),
						),
						array(
							'icon'        => 'target',
							'stage'       => __( 'Step 2', 'testro' ),
							'title'       => __( 'Start With High-Risk Flows First', 'testro' ),
							'description' => __( 'Incident and change management usually carry the most risk. Build these tests first.', 'testro' ),
						),
						array(
							'icon'        => 'layout-grid',
							'stage'       => __( 'Step 3', 'testro' ),
							'title'       => __( 'Add Module Coverage Over Time', 'testro' ),
							'description' => __( 'Layer in HR, CSM, and custom app tests as coverage grows.', 'testro' ),
						),
						array(
							'icon'        => 'calendar-sync',
							'stage'       => __( 'Step 4', 'testro' ),
							'title'       => __( 'Run Before Every Upgrade', 'testro' ),
							'description' => __( 'Trigger a full suite on its own, so a platform release never catches your team off guard.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'manual-servicenow-testing-vs-ai-servicenow-testing',
					'columns'       => 4,
					'title'         => __( 'Manual ServiceNow Testing vs. AI ServiceNow Testing', 'testro' ),
					'intro'         => __( 'What Changes When Testing Doesn\'t Wait on a Person', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Speed', 'testro' ),
							'description' => __( 'Manual regression on a large instance can take weeks. Automated runs finish in hours.', 'testro' ),
						),
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Consistency', 'testro' ),
							'description' => __( 'A manual tester\'s coverage shifts with time and focus. Automated tests run the same way, every time.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Update Resilience', 'testro' ),
							'description' => __( 'Manual scripts break the moment an upgrade lands. Self-healing tests adapt on their own.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Who Can Test', 'testro' ),
							'description' => __( 'Manual testing needs a dedicated engineer for every scripted check. Plain-English tests open coverage to HR and service desk staff too.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'every-module-and-workflow-covered',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Every Module and Workflow, Covered', 'testro' ),
					'intro'         => __( 'Total Coverage, Not Just the Common Cases', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'IT Service Management', 'testro' ),
							'description' => __( 'Test incident, problem, change, and request work start to finish. SLA timers and CAB approval routing included.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'HR Service Delivery', 'testro' ),
							'description' => __( 'Cover onboarding, offboarding, leave requests, and HR cases. Built by the HR team itself.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Customer Service Management', 'testro' ),
							'description' => __( 'Check case creation, agent screens, and the customer portal in one run.', 'testro' ),
						),
						array(
							'icon'        => 'activity',
							'title'       => __( 'IT Operations Management', 'testro' ),
							'description' => __( 'Test discovery, event flows, and orchestration work.', 'testro' ),
						),
						array(
							'icon'        => 'shield-check',
							'title'       => __( 'Governance, Risk, and Compliance', 'testro' ),
							'description' => __( 'Cover audits, risk checks, and compliance reports right alongside daily workflows.', 'testro' ),
						),
						array(
							'icon'        => 'puzzle',
							'title'       => __( 'Custom Applications', 'testro' ),
							'description' => __( 'You set up each ServiceNow instance differently. theTestRo adapts to yours. It doesn\'t lean on selectors that break the moment your instance does.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'ai-servicenow-testing-that-adapts',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'AI ServiceNow Testing That Adapts', 'testro' ),
					'intro'         => __( 'Tests That Heal Instead of Break', 'testro' ),
					'heading_level' => 3,
					'items'         => array(
						array(
							'icon'        => 'scan-eye',
							'title'       => __( 'Instance-Aware Element Handling', 'testro' ),
							'description' => __( 'theTestRo finds elements by what they are. Not where they sit on the page.', 'testro' ),
						),
						array(
							'icon'        => 'wand',
							'title'       => __( 'Automatic Repair After Upgrades', 'testro' ),
							'description' => __( 'A major release changes a field or step. theTestRo fixes the test before the next run.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Fewer False Failures', 'testro' ),
							'description' => __( 'Less time chasing a test that broke for the wrong reason. More time on real coverage.', 'testro' ),
						),
					),
					'outro'         => __( 'This is what AI ServiceNow testing should mean. Stability that survives exactly the kind of change that breaks brittle, script-based tools.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'plain-english-test-authoring',
					'columns'       => 3,
					'title'         => __( 'Plain-English Test Authoring', 'testro' ),
					'intro'         => __( 'Anyone Can Build a Test, Not Just Engineers', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'file-text',
							'title'       => __( 'Describe a Workflow, Get a Test', 'testro' ),
							'description' => __( 'Type what should happen. theTestRo builds the working test steps on its own.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'No Engineering Dependency', 'testro' ),
							'description' => __( 'HR staff, service desk agents, and business users can build real coverage directly.', 'testro' ),
						),
						array(
							'icon'        => 'sparkles',
							'title'       => __( 'AI-Generated From What You Already Have', 'testro' ),
							'description' => __( 'Turn a user story, change ticket, or setup update into a test that works.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'workflows-that-go-beyond-servicenow',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Workflows That Go Beyond ServiceNow', 'testro' ),
					'intro'         => __( 'Cross-System Testing, in One Run', 'testro' ),
					'intro_extra'   => __( 'An incident in ServiceNow can create a case in another system. An HR request can write back to a connected HRMS. A test that stops at ServiceNow\'s edge misses exactly where things tend to break.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'refresh',
							'title'       => __( 'Cross-System Data Sync', 'testro' ),
							'description' => __( 'Confirm records made in ServiceNow land right in connected systems, and stay in sync both ways.', 'testro' ),
						),
						array(
							'icon'        => 'layers-api',
							'title'       => __( 'REST and SOAP API Contracts', 'testro' ),
							'description' => __( 'Test inbound and outbound API contracts alongside your UI checks, in the same flow.', 'testro' ),
						),
						array(
							'icon'        => 'plug',
							'title'       => __( 'Webhook and Event-Driven Integrations', 'testro' ),
							'description' => __( 'Check event flows behave right after every release. Not just the parts a user clicks through.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'servicenow-regression-testing-at-every-upgrade',
					'variant'       => 'tint',
					'columns'       => 3,
					'title'         => __( 'ServiceNow Regression Testing at Every Upgrade', 'testro' ),
					'intro'         => __( 'Ready Before the Next Release, Not After', 'testro' ),
					'heading_level' => 4,
					'items'         => array(
						array(
							'icon'        => 'zap',
							'title'       => __( 'Full Regression in Hours', 'testro' ),
							'description' => __( 'Run large regression suites overnight, not over several weeks.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'Self-Healing Through Version Changes', 'testro' ),
							'description' => __( 'Tests stay stable through major platform redesigns. Not just minor patches.', 'testro' ),
						),
						array(
							'icon'        => 'folder-tree',
							'title'       => __( 'Traceability to Requirements', 'testro' ),
							'description' => __( 'Link tests back to user stories and change tickets. Coverage stays lined up with what changed.', 'testro' ),
						),
					),
					'outro'         => __( 'Automated ServiceNow testing built this way turns a dreaded upgrade cycle into a routine check.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'cicd-integration-built-in',
					'columns'       => 4,
					'title'         => __( 'CI/CD Integration Built In', 'testro' ),
					'intro'         => __( 'Testing That Runs With Every Deployment', 'testro' ),
					'intro_extra'   => __( 'theTestRo connects with Jenkins, GitHub Actions, Azure DevOps, and ServiceNow DevOps. Test suites trigger on their own as part of your deployment pipeline. Code review catches a risky change. Not in production.', 'testro' ),
					'heading_level' => 4,
					'items'         => array(),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'enterprise-servicenow-testing-at-scale',
					'variant'       => 'spotlight',
					'columns'       => 3,
					'title'         => __( 'Enterprise ServiceNow Testing at Scale', 'testro' ),
					'intro'         => __( 'Built for Complex, Regulated Environments', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Private Cloud and On-Premise Options', 'testro' ),
							'description' => __( 'Run tests inside your own space when data location matters.', 'testro' ),
						),
						array(
							'icon'        => 'user-check',
							'title'       => __( 'Role-Based Access', 'testro' ),
							'description' => __( 'Control who can build, edit, and approve tests across a growing org.', 'testro' ),
						),
						array(
							'icon'        => 'shield-lock',
							'title'       => __( 'Full Visibility and Ownership', 'testro' ),
							'description' => __( 'Your team keeps full control of automation logic. Data and credentials stay encrypted, with no outside storage.', 'testro' ),
						),
					),
					'outro'         => __( 'Enterprise ServiceNow testing has to hold up across dozens of workflows, teams, and modules at once. Not just a single clean demo instance.', 'testro' ),
				),

				array(
					'type'          => 'feature-grid',
					'id'            => 'who-uses-testro-for-servicenow-testing',
					'columns'       => 4,
					'title'         => __( 'Who Uses theTestRo for ServiceNow Testing', 'testro' ),
					'intro'         => __( 'Built for Every Role Touching the Platform', 'testro' ),
					'heading_level' => 5,
					'items'         => array(
						array(
							'icon'        => 'layout-grid',
							'title'       => __( 'ITSM and Platform QA Teams', 'testro' ),
							'description' => __( 'Cover incident, change, and request work. No matching rise in headcount needed.', 'testro' ),
						),
						array(
							'icon'        => 'heart-pulse',
							'title'       => __( 'HR and Customer Service Teams', 'testro' ),
							'description' => __( 'Build coverage for their own steps. No waiting on engineering.', 'testro' ),
						),
						array(
							'icon'        => 'git-branch',
							'title'       => __( 'DevOps Engineers', 'testro' ),
							'description' => __( 'Trigger ServiceNow tests on their own as part of the release pipeline.', 'testro' ),
						),
						array(
							'icon'        => 'badge-check',
							'title'       => __( 'Platform Owners', 'testro' ),
							'description' => __( 'Get a clear view of test coverage across every module and custom setup.', 'testro' ),
						),
					),
				),

				array(
					'type'          => 'faq',
					'title'         => __( 'Frequently Asked Questions', 'testro' ),
					'heading_level' => 5,
					'faqs'          => 'servicenow-testing',
				),

				array(
					'type'          => 'cta',
					'id'            => 'start-automating-servicenow-testing-today',
					'title'         => __( 'Start Automating ServiceNow Testing Today', 'testro' ),
					'intro'         => __( 'Stop Losing Weeks to Every Upgrade', 'testro' ),
					'body'          => __( 'Join teams already using theTestRo. Catch issues before every release. Not after.', 'testro' ),
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

		'test-execution' => array(
			array(
				'question' => __( 'What is an AI-powered test execution platform?', 'testro' ),
				'answer'   => __( 'It\'s a platform that runs automated tests across browsers and devices. AI guides coverage decisions, catches flaky failures, and speeds up feedback.', 'testro' ),
			),
			array(
				'question' => __( 'How is parallel test execution different from running tests one by one?', 'testro' ),
				'answer'   => __( 'Parallel execution runs many tests at once instead of in sequence. A multi-hour test suite drops down to minutes.', 'testro' ),
			),
			array(
				'question' => __( 'Can I run tests both locally and in the cloud?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo supports local execution alongside its cloud device farm. Internal environments stay covered too.', 'testro' ),
			),
			array(
				'question' => __( 'Does continuous test execution slow down my CI/CD pipeline?', 'testro' ),
				'answer'   => __( 'No. Tests run in parallel and report back fast. Pipeline speed stays intact even as test coverage grows.', 'testro' ),
			),
			array(
				'question' => __( 'What happens when a test fails during execution?', 'testro' ),
				'answer'   => __( 'theTestRo captures logs, screenshots, and a step-by-step replay on its own. Debugging doesn\'t start from a blank screen.', 'testro' ),
			),
			array(
				'question' => __( 'Is this test execution tool suitable for large test suites?', 'testro' ),
				'answer'   => __( 'Yes. Parallel execution and cloud scaling are built for suites with thousands of tests, not just small ones.', 'testro' ),
			),
		),

		'ci-cd-integration' => array(
			array(
				'question' => __( 'What is a CI/CD test automation platform?', 'testro' ),
				'answer'   => __( 'It\'s a platform that runs tests on its own whenever code is committed, built, or deployed. It connects directly to tools like Jenkins or GitHub Actions.', 'testro' ),
			),
			array(
				'question' => __( 'How is CI/CD testing different from regular test automation?', 'testro' ),
				'answer'   => __( 'Regular automation runs when someone triggers it. CI/CD testing runs on its own, tied to pipeline events like commits and merges.', 'testro' ),
			),
			array(
				'question' => __( 'Does continuous testing slow down my deployment pipeline?', 'testro' ),
				'answer'   => __( 'No. Parallel execution and smart test selection keep pipeline speed steady, even as test coverage grows.', 'testro' ),
			),
			array(
				'question' => __( 'Which CI/CD tools does theTestRo integrate with?', 'testro' ),
				'answer'   => __( 'Jenkins, GitHub Actions, GitLab CI, Azure DevOps, CircleCI, and Bamboo. No custom scripting needed.', 'testro' ),
			),
			array(
				'question' => __( 'Can tests block a pull request from merging?', 'testro' ),
				'answer'   => __( 'Yes. Set up pull request checks so a merge is blocked until required tests pass.', 'testro' ),
			),
			array(
				'question' => __( 'Is DevOps test automation only for large engineering teams?', 'testro' ),
				'answer'   => __( 'No. Small teams benefit just as much from instant feedback. Nobody has to manually trigger and check test runs.', 'testro' ),
			),
		),

		'playwright-test-automation' => array(
			array(
				'question' => __( 'What is a Playwright testing automation platform?', 'testro' ),
				'answer'   => __( 'A platform that helps teams build, generate, and run Playwright tests. Often combining no-code test creation with the ability to export real, runnable Playwright code.', 'testro' ),
			),
			array(
				'question' => __( 'Can I really export tests to Playwright, or is it just a preview?', 'testro' ),
				'answer'   => __( 'It\'s real, exportable code. theTestRo generates actual TypeScript or JavaScript Playwright scripts you can run, edit, and commit like any other file.', 'testro' ),
			),
			array(
				'question' => __( 'Do I need coding experience to use the Playwright test generator?', 'testro' ),
				'answer'   => __( 'No. Build tests in plain English or by recording a flow. Coding knowledge helps if you want to extend the exported code, but it\'s not required to start.', 'testro' ),
			),
			array(
				'question' => __( 'Does self-healing still work after I export the code?', 'testro' ),
				'answer'   => __( 'Yes, when tests run through theTestRo\'s execution layer. Locators heal at runtime, keeping exported tests stable across UI changes.', 'testro' ),
			),
			array(
				'question' => __( 'Will exported Playwright code work outside theTestRo?', 'testro' ),
				'answer'   => __( 'Yes. Exported tests are standard Playwright scripts that run in your own environment. No dependency on theTestRo to execute them.', 'testro' ),
			),
			array(
				'question' => __( 'How is this different from just using Playwright directly?', 'testro' ),
				'answer'   => __( 'Playwright still requires writing every test by hand. theTestRo adds AI test generation, self-healing, and real-device scaling on top. You still get clean, exportable code at the end.', 'testro' ),
			),
		),

		'reporting-analytics' => array(
			array(
				'question' => __( 'What is an AI-powered test reports and analytics platform?', 'testro' ),
				'answer'   => __( 'It\'s a platform that turns raw test results into clear insights. AI explains why a test failed. Not just a pass or fail status.', 'testro' ),
			),
			array(
				'question' => __( 'How is AI test analytics different from standard test reports?', 'testro' ),
				'answer'   => __( 'Standard reports show results. AI test analytics adds root cause analysis, failure patterns, and suggested fixes on top of the raw data.', 'testro' ),
			),
			array(
				'question' => __( 'Can I export test reports for compliance or executive review?', 'testro' ),
				'answer'   => __( 'Yes. Generate PDF summaries for stakeholders, or export detailed Excel and CSV data for audits and deeper analysis.', 'testro' ),
			),
			array(
				'question' => __( 'Does this test reporting software show why a test failed, not just that it did?', 'testro' ),
				'answer'   => __( 'Yes. Every failure includes screenshots, logs, and AI-suggested root causes. Debugging doesn\'t start from scratch.', 'testro' ),
			),
			array(
				'question' => __( 'Can different teams see different views of the same test data?', 'testro' ),
				'answer'   => __( 'Yes. QA, development, and leadership each get a dashboard suited to what they actually need to know.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo integrate with tools like Jira or Slack for reporting?', 'testro' ),
				'answer'   => __( 'Yes. File bugs right from a failed test. Results go to Slack or chat channels on their own after each run.', 'testro' ),
			),
		),

		'regression-test-automation' => array(
			array(
				'question' => __( 'What is AI regression testing?', 'testro' ),
				'answer'   => __( 'It\'s the use of AI to build, run, and maintain regression tests. This includes self-healing broken locators and generating root cause analysis on its own. No more relying on brittle scripts.', 'testro' ),
			),
			array(
				'question' => __( 'Is regression testing functional or nonfunctional?', 'testro' ),
				'answer'   => __( 'Regression testing is mostly functional. It confirms existing features still work right after a change. It can include nonfunctional checks like performance when needed.', 'testro' ),
			),
			array(
				'question' => __( 'What is end to end regression testing?', 'testro' ),
				'answer'   => __( 'It\'s regression testing that covers a full user journey. UI and API together. Not testing each layer on its own.', 'testro' ),
			),
			array(
				'question' => __( 'How is Regression Test Automation different from manual regression testing?', 'testro' ),
				'answer'   => __( 'Automation runs tests on its own, on a schedule or trigger. Manual regression means a person re-runs the same checks by hand, every time.', 'testro' ),
			),
			array(
				'question' => __( 'Does Enterprise Regression Testing scale to thousands of test cases?', 'testro' ),
				'answer'   => __( 'Yes. Parallel execution and self-healing are built for large suites, not just small ones. Coverage can grow without maintenance growing with it.', 'testro' ),
			),
			array(
				'question' => __( 'What are the most important automated regression testing best practices?', 'testro' ),
				'answer'   => __( 'Automate high-value, stable flows first. Reuse shared components. Run tests on every commit. Retire tests that no longer add value.', 'testro' ),
			),
		),

		'ai-automated-sanity-testing' => array(
			array(
				'question' => __( 'What is automated sanity testing?', 'testro' ),
				'answer'   => __( 'The use of automated tools to quickly check that a specific fix or feature works after a change. No person needs to check it by hand.', 'testro' ),
			),
			array(
				'question' => __( 'How is sanity test automation different from regression testing?', 'testro' ),
				'answer'   => __( 'Sanity testing checks a narrow, specific change. Regression testing checks the whole system to confirm nothing else broke.', 'testro' ),
			),
			array(
				'question' => __( 'What does AI automated sanity testing add over basic automation?', 'testro' ),
				'answer'   => __( 'AI can flag which areas a recent change likely affects, self-heal checks when the UI shifts, and cut false failures that waste a team\'s time.', 'testro' ),
			),
			array(
				'question' => __( 'Is sanity testing software useful for small teams, not just large ones?', 'testro' ),
				'answer'   => __( 'Yes. Any team pushing frequent builds benefits from a fast, repeatable way to confirm a fix works before moving forward.', 'testro' ),
			),
			array(
				'question' => __( 'Does continuous sanity testing slow down a CI/CD pipeline?', 'testro' ),
				'answer'   => __( 'No. Sanity checks are built to be fast and focused. They add minutes, not hours, to a pipeline run.', 'testro' ),
			),
			array(
				'question' => __( 'Can automated software testing tools like theTestRo handle sanity, smoke, and regression together?', 'testro' ),
				'answer'   => __( 'Yes. All three run from the same platform. A team isn\'t managing separate tools for each stage of testing.', 'testro' ),
			),
		),

		'automated-functional-testing' => array(
			array(
				'question' => __( 'What is automated functional testing?', 'testro' ),
				'answer'   => __( 'The use of automated tools checks that app features and workflows behave as expected. No need to check them by hand every time.', 'testro' ),
			),
			array(
				'question' => __( 'How does automated functional testing fit into modern development?', 'testro' ),
				'answer'   => __( 'It runs all the time inside CI/CD pipelines. We catch problems early. This supports frequent releases without adding to manual QA work.', 'testro' ),
			),
			array(
				'question' => __( 'How is AI functional testing different from standard automation?', 'testro' ),
				'answer'   => __( 'AI helps build tests from requirements or designs. It self-heals locators when the UI changes. This cuts the upkeep that scripted tests usually need.', 'testro' ),
			),
			array(
				'question' => __( 'Is functional testing software useful for small teams, not just large ones?', 'testro' ),
				'answer'   => __( 'Yes. Any team that wants reliable test coverage can benefit from AI-assisted test creation and maintenance. It works well even if the team does not have a large QA staff.', 'testro' ),
			),
			array(
				'question' => __( 'Does continuous functional testing slow down release cycles?', 'testro' ),
				'answer'   => __( 'No. It runs in parallel and reports back fast. It speeds up releases by catching issues early instead of at the end of a sprint.', 'testro' ),
			),
			array(
				'question' => __( 'Can enterprise functional testing scale across many teams and products?', 'testro' ),
				'answer'   => __( 'Yes. Role-based access, shared reporting, and parallel runs support orgs that run many teams and releases at once.', 'testro' ),
			),
		),

		'end-to-end-testing' => array(
			array(
				'question' => __( 'What is automated end-to-end testing?', 'testro' ),
				'answer'   => __( 'The use of automated tools to check a complete application workflow. From a user\'s first action through to the final result. Across UI, APIs, and connected systems.', 'testro' ),
			),
			array(
				'question' => __( 'How is AI end-to-end testing different from traditional automation?', 'testro' ),
				'answer'   => __( 'Traditional automation needs a person to write and maintain code. AI end-to-end testing lets teams build tests in plain English. AI handles healing broken locators and flagging root causes on its own.', 'testro' ),
			),
			array(
				'question' => __( 'What happens when an end-to-end test fails?', 'testro' ),
				'answer'   => __( 'theTestRo checks whether the failure is a real bug, a flaky step, or an environment issue. A team isn\'t chasing false alarms every time something turns red.', 'testro' ),
			),
			array(
				'question' => __( 'How long does it take to set up an end-to-end testing platform?', 'testro' ),
				'answer'   => __( 'With theTestRo, a team can build and run its first automated test in well under an hour. No software installation or infrastructure setup needed.', 'testro' ),
			),
			array(
				'question' => __( 'Does cross-platform end-to-end testing cover mobile apps too?', 'testro' ),
				'answer'   => __( 'Yes. Test iOS and Android apps on real devices alongside your web app, in the same workflow. No separate tool needed.', 'testro' ),
			),
			array(
				'question' => __( 'How does enterprise end-to-end testing fit into CI/CD?', 'testro' ),
				'answer'   => __( 'Tests trigger on their own after a build or deployment to staging. We catch a broken workflow before it reaches production. Not after.', 'testro' ),
			),
		),

		'use-cases' => array(
			array(
				'question' => __( 'What are software testing use cases?', 'testro' ),
				'answer'   => __( 'They\'re the different scenarios a QA team handles, like regression, functional, or end-to-end testing. Each one answers a specific question about whether software works right.', 'testro' ),
			),
			array(
				'question' => __( 'How do I know which testing use case applies to my situation?', 'testro' ),
				'answer'   => __( 'It depends on timing and scope. A quick fix calls for sanity testing. A full release calls for regression or end-to-end testing. Most teams use several use cases together.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo handle multiple test automation use cases from one platform?', 'testro' ),
				'answer'   => __( 'Yes. Regression, functional, integration, end-to-end, and more all run from the same platform. No switching tools for each one.', 'testro' ),
			),
			array(
				'question' => __( 'Are these automated testing use cases suitable for small teams?', 'testro' ),
				'answer'   => __( 'Yes. AI-assisted test creation and self-healing help a small team cover the same ground. A much larger team would need to do it by hand.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support QA testing use cases across web, mobile, and API?', 'testro' ),
				'answer'   => __( 'Yes. Every use case on this page runs across web, mobile, and API, from a single test suite.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI change these common software testing scenarios?', 'testro' ),
				'answer'   => __( 'AI speeds up test creation. It keeps tests stable as the app changes. It helps spot real bugs versus flaky failures. This works across every use case listed here.', 'testro' ),
			),
		),

		'ai-powered-integration-testing' => array(
			array(
				'question' => __( 'What is Integration Test Automation?', 'testro' ),
				'answer'   => __( 'The use of automated tools to check that separate parts, services, or systems work right together. Not just testing each one on its own.', 'testro' ),
			),
			array(
				'question' => __( 'How is AI Integration Testing different from standard integration testing?', 'testro' ),
				'answer'   => __( 'AI adds self-healing to keep tests stable as systems change. It can also build test steps from a plain-English description. No need to script every step by hand.', 'testro' ),
			),
			array(
				'question' => __( 'What should Integration Testing Software actually cover?', 'testro' ),
				'answer'   => __( 'It should cover UI-to-API flows, service-to-service calls, third-party links, and event-driven flows. Not just one layer of the stack.', 'testro' ),
			),
			array(
				'question' => __( 'Does Enterprise Integration Testing scale across microservices?', 'testro' ),
				'answer'   => __( 'Yes. Parallel execution and contract-style checks are built for systems with many services and teams. Not just one big app.', 'testro' ),
			),
			array(
				'question' => __( 'What are the most important integration testing best practices?', 'testro' ),
				'answer'   => __( 'Focus on high-risk connections first. Test failure paths as well as success paths. Keep test data stable. Retire tests tied to connections that no longer exist.', 'testro' ),
			),
			array(
				'question' => __( 'What makes a platform the best integration testing framework for a growing team?', 'testro' ),
				'answer'   => __( 'Coverage across UI, API, and data together. Low setup cost. Built-in stability through self-healing. A clean fit into your CI/CD pipeline.', 'testro' ),
			),
		),

		'retail-ecommerce' => array(
			array(
				'question' => __( 'What is retail test automation?', 'testro' ),
				'answer'   => __( 'It\'s the use of automated tools to test retail and e-commerce systems. This covers search, checkout, payments, and backend sync, instead of relying on manual QA alone.', 'testro' ),
			),
			array(
				'question' => __( 'How does e-commerce test automation help during Black Friday or flash sales?', 'testro' ),
				'answer'   => __( 'It lets teams run full regression suites fast before high-traffic events. This catches checkout and pricing issues before real customers hit them.', 'testro' ),
			),
			array(
				'question' => __( 'Can this tool test omnichannel flows like BOPIS?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo covers buy-online-pickup-in-store flows. It checks inventory across web, mobile, and in-store systems.', 'testro' ),
			),
			array(
				'question' => __( 'Do I need developers to build retail tests?', 'testro' ),
				'answer'   => __( 'No. Merchandisers and product managers can build tests in plain English. QA reviews and maintains overall quality.', 'testro' ),
			),
			array(
				'question' => __( 'Does this handle frequent catalog and pricing changes?', 'testro' ),
				'answer'   => __( 'Yes. Self-healing tests adjust on their own when your storefront\'s UI or catalog changes. Less manual test maintenance.', 'testro' ),
			),
			array(
				'question' => __( 'Is theTestRo suitable for enterprise retail brands with multiple storefronts?', 'testro' ),
				'answer'   => __( 'Yes. Manage testing across multiple brands, regions, or channels from one platform.', 'testro' ),
			),
		),

		'healthcare' => array(
			array(
				'question' => __( 'What is AI testing automation for the healthcare industry?', 'testro' ),
				'answer'   => __( 'It\'s the use of AI to test clinical software, EHR systems, patient portals, and APIs. Faster and more accurate than manual QA. Built to meet healthcare compliance needs from the start.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support EHR testing for platforms like Epic or Cerner?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo automates core EHR and EMR flows, including registration, orders, and documentation. Even through SSO, MFA, or Citrix/VDI setups.', 'testro' ),
			),
			array(
				'question' => __( 'How does healthcare software testing handle HIPAA compliance?', 'testro' ),
				'answer'   => __( 'Through PHI masking, role-based access, audit trails, and flexible deployment options. Sensitive data stays protected throughout testing.', 'testro' ),
			),
			array(
				'question' => __( 'Can theTestRo validate HL7 and FHIR data for healthcare API testing?', 'testro' ),
				'answer'   => __( 'Yes. Generate API tests from specs or imports. Validate HL7/FHIR payloads to confirm accurate data exchange between systems.', 'testro' ),
			),
			array(
				'question' => __( 'Is healthcare mobile app testing included, or a separate product?', 'testro' ),
				'answer'   => __( 'It\'s part of the same platform. Test web, mobile, and APIs together. No switching tools for each layer.', 'testro' ),
			),
			array(
				'question' => __( 'How fast can a healthcare team see results from test automation?', 'testro' ),
				'answer'   => __( 'Most teams cut manual regression effort by 60 to 80 percent. Measurable release-cycle improvements often show up within a few months.', 'testro' ),
			),
		),

		'travel-and-hospitality' => array(
			array(
				'question' => __( 'What is travel test automation?', 'testro' ),
				'answer'   => __( 'It\'s the use of automated tools to test booking systems, checkout flows, and travel apps. It covers functionality, payments, and performance, instead of relying on manual QA alone.', 'testro' ),
			),
			array(
				'question' => __( 'Does this handle hotel booking testing specifically?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo checks the full hotel booking path, including search, room selection, payment, and confirmation.', 'testro' ),
			),
			array(
				'question' => __( 'Can this tool test airport kiosk and check-in flows?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo covers self-check-in kiosks alongside web and mobile channels. Every touchpoint gets tested.', 'testro' ),
			),
			array(
				'question' => __( 'How does travel software testing handle peak season traffic?', 'testro' ),
				'answer'   => __( 'Load and stress testing simulate high booking volume ahead of time. Systems hold up when real demand hits.', 'testro' ),
			),
			array(
				'question' => __( 'Is hospitality mobile app testing included, or a separate product?', 'testro' ),
				'answer'   => __( 'It\'s part of the same platform. Test web, mobile, and kiosk flows together. No switching tools for each layer.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo test how bookings behave on slow or airport Wi-Fi?', 'testro' ),
				'answer'   => __( 'Yes. Network condition testing checks how booking and check-in flows perform under real-world connection speeds.', 'testro' ),
			),
		),

		'banking-finance' => array(
			array(
				'question' => __( 'Why does banking software need specialized test automation?', 'testro' ),
				'answer'   => __( 'Banking platforms handle money and sensitive data. Testing must cover compliance, audit trails, and security. Not just basic checks.', 'testro' ),
			),
			array(
				'question' => __( 'Can this tool handle payment gateway testing?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo checks payment gateway transactions across card, transfer, and digital wallet paths. QR-based payments too.', 'testro' ),
			),
			array(
				'question' => __( 'Does theTestRo support biometric and multi-step login testing?', 'testro' ),
				'answer'   => __( 'Yes. Test fingerprint, face-scan, and multi-step login flows across devices. All part of your regular test suite.', 'testro' ),
			),
			array(
				'question' => __( 'How does FinTech testing stay compliant while using AI?', 'testro' ),
				'answer'   => __( 'theTestRo\'s AI agents work within role-based access controls and audit-ready logs. Automation speeds up testing. Your governance rules stay intact.', 'testro' ),
			),
			array(
				'question' => __( 'Can BFSI testing run inside our bank\'s VPN or private network?', 'testro' ),
				'answer'   => __( 'Yes. Tests can run inside a secure VPN or private setup. Sensitive data never leaves a controlled network.', 'testro' ),
			),
			array(
				'question' => __( 'How fast can a banking team see results from test automation?', 'testro' ),
				'answer'   => __( 'Most teams cut regression cycles from days to hours. Faster test authoring and less manual upkeep. Often within the first few months.', 'testro' ),
			),
		),

		'insurance' => array(
			array(
				'question' => __( 'What is insurance test automation?', 'testro' ),
				'answer'   => __( 'It\'s the use of automated tools to test insurance systems. This covers policy work, claims, and APIs. Not relying on manual QA alone.', 'testro' ),
			),
			array(
				'question' => __( 'Does this handle claims management testing specifically?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo checks the full claims path. Document uploads, processing logic, and status updates all included.', 'testro' ),
			),
			array(
				'question' => __( 'Can no-code test automation for insurance really replace scripted testing?', 'testro' ),
				'answer'   => __( 'For most workflows, yes. QA staff and analysts build tests in plain English. Advanced teams can still extend tests with code when needed.', 'testro' ),
			),
			array(
				'question' => __( 'How does insurance software testing handle sensitive data?', 'testro' ),
				'answer'   => __( 'Tests can run inside a secure VPN or private setup. Sensitive data never leaves a controlled network.', 'testro' ),
			),
			array(
				'question' => __( 'Is insurance API testing included, or a separate product?', 'testro' ),
				'answer'   => __( 'It\'s part of the same platform. Test web, mobile, and APIs together. No switching tools for each layer.', 'testro' ),
			),
			array(
				'question' => __( 'How does policy administration testing handle renewal season traffic?', 'testro' ),
				'answer'   => __( 'Load and stress testing simulate high volume ahead of time. Systems hold up when open enrollment or renewal demand hits.', 'testro' ),
			),
		),

		'microsoft-dynamics-365-test-automation' => array(
			array(
				'question' => __( 'What is Microsoft Dynamics 365 test automation?', 'testro' ),
				'answer'   => __( 'The use of automated tools to test Dynamics 365 workflows, setups, and links. Not relying on manual QA to catch issues after every update.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI ERP test automation handle Microsoft\'s frequent updates?', 'testro' ),
				'answer'   => __( 'Self-healing tests adapt to UI and logic changes on their own. A quarterly release doesn\'t mean rebuilding test scripts from scratch.', 'testro' ),
			),
			array(
				'question' => __( 'Can Dynamics 365 testing cover customizations, not just standard features?', 'testro' ),
				'answer'   => __( 'Yes. We build tests around real business steps, not fixed scripts. They extend naturally to custom fields, flows, and setups.', 'testro' ),
			),
			array(
				'question' => __( 'Does this support Dynamics 365 regression testing at enterprise scale?', 'testro' ),
				'answer'   => __( 'Yes. Parallel runs and reusable parts support large, complex regression suites. Not just a handful of test cases.', 'testro' ),
			),
			array(
				'question' => __( 'Is coding required to test Dynamics 365 with theTestRo?', 'testro' ),
				'answer'   => __( 'No. Tests are built in plain English. Both technical QA staff and business users can pitch in.', 'testro' ),
			),
			array(
				'question' => __( 'Does Microsoft ERP testing extend to systems connected to Dynamics 365?', 'testro' ),
				'answer'   => __( 'Yes. Tests can span Dynamics 365 and the other systems it links to. One run covers a full business step.', 'testro' ),
			),
		),

		'salesforce-test-automation' => array(
			array(
				'question' => __( 'What is Salesforce test automation?', 'testro' ),
				'answer'   => __( 'The use of automated tools to test Salesforce workflows, setups, and links. Not relying on manual QA to catch issues after every release.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI Salesforce testing handle the Lightning UI changing constantly?', 'testro' ),
				'answer'   => __( 'Self-healing locators find elements from Salesforce metadata at runtime. A shifted part won\'t break the test the way a fixed locator would.', 'testro' ),
			),
			array(
				'question' => __( 'Can this Salesforce testing tool cover custom org workflows, not just standard objects?', 'testro' ),
				'answer'   => __( 'Yes. Tests can cover Apex triggers, custom approval routing, and org-specific flows. They work alongside standard Sales and Service Cloud objects.', 'testro' ),
			),
			array(
				'question' => __( 'Does this support Salesforce regression testing across seasonal releases?', 'testro' ),
				'answer'   => __( 'Yes. Regression suites run against sandbox previews ahead of each release. Auto-healing keeps the suite steady afterward.', 'testro' ),
			),
			array(
				'question' => __( 'Is coding required for CRM test automation with theTestRo?', 'testro' ),
				'answer'   => __( 'No. Tests are built in plain English. Admins and business users can pitch in right alongside QA engineers.', 'testro' ),
			),
			array(
				'question' => __( 'Does enterprise Salesforce testing support multiple orgs at once?', 'testro' ),
				'answer'   => __( 'Yes. The same test can run in parallel across sandbox, staging, and live orgs. No copied scripts.', 'testro' ),
			),
		),

		'oracle-testing' => array(
			array(
				'question' => __( 'What is Oracle test automation?', 'testro' ),
				'answer'   => __( 'The use of automated tools tests Oracle apps like Cloud Fusion, EBS, HCM, and SCM. Not relying on manual QA to catch issues after every update.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI Oracle testing handle quarterly updates?', 'testro' ),
				'answer'   => __( 'Self-healing tests adapt to changes on their own. A quarterly patch doesn\'t mean rebuilding test scripts from scratch each time.', 'testro' ),
			),
			array(
				'question' => __( 'Does Oracle ERP testing cover both Cloud and EBS applications?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo covers Oracle Cloud Fusion and Oracle EBS from the same platform. HCM, SCM, Financials, and CRM too.', 'testro' ),
			),
			array(
				'question' => __( 'Do you need to code for Oracle automation testing?', 'testro' ),
				'answer'   => __( 'No. Tests are built in plain English. QA staff without a scripting background can build and keep coverage.', 'testro' ),
			),
			array(
				'question' => __( 'Can enterprise Oracle testing check data, not just the interface?', 'testro' ),
				'answer'   => __( 'Yes. Database and integration testing checks data stays correct. We check business steps too, alongside UI-level checks.', 'testro' ),
			),
			array(
				'question' => __( 'Does Oracle application testing fit into an existing CI/CD pipeline?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo connects with Jenkins, GitHub Actions, Azure DevOps, and Jira. Automated regression results gate deployments.', 'testro' ),
			),
		),

		'sap-testing' => array(
			array(
				'question' => __( 'What is SAP test automation?', 'testro' ),
				'answer'   => __( 'The use of automated tools to test SAP workflows, setups, and links. Not relying on manual QA to catch issues after every release.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI SAP testing handle frequent SAP updates?', 'testro' ),
				'answer'   => __( 'Test assets adjust to new releases on their own. A quarterly SAP update doesn\'t mean rebuilding scripts from scratch each time.', 'testro' ),
			),
			array(
				'question' => __( 'Can SAP ERP testing cover customizations, not just standard configurations?', 'testro' ),
				'answer'   => __( 'Yes. Tests map to real business processes, not fixed scripts. They extend naturally to custom fields, workflows, and setups.', 'testro' ),
			),
			array(
				'question' => __( 'Does automated SAP testing support large, complex regression suites?', 'testro' ),
				'answer'   => __( 'Yes. Large regression packs use parallel execution and reusable assets. Not just a handful of test cases.', 'testro' ),
			),
			array(
				'question' => __( 'Is coding required to test SAP with theTestRo?', 'testro' ),
				'answer'   => __( 'No. Tests are built through a codeless approach. Both QA staff and business users can pitch in.', 'testro' ),
			),
			array(
				'question' => __( 'Does enterprise SAP testing extend to systems connected to SAP?', 'testro' ),
				'answer'   => __( 'Yes. Tests can span SAP and the other systems it links to. One run covers a full business process.', 'testro' ),
			),
		),

		'workday-testing' => array(
			array(
				'question' => __( 'What is Workday test automation?', 'testro' ),
				'answer'   => __( 'The use of automated tools to test Workday business steps across HCM, Payroll, Financials, and Adaptive Planning. Not relying on manual QA to catch issues after every release.', 'testro' ),
			),
			array(
				'question' => __( 'How does AI Workday testing handle R1 and R2 releases?', 'testro' ),
				'answer'   => __( 'Self-healing tests adapt to changes in business processes automatically. A major release doesn\'t mean rebuilding test scripts from scratch each time.', 'testro' ),
			),
			array(
				'question' => __( 'Does Workday ERP testing cover payroll and financial processes, not just HCM?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo covers Workday HCM, Payroll, Financial Management, and Adaptive Planning from the same platform.', 'testro' ),
			),
			array(
				'question' => __( 'Do I need to write code for Workday automation testing?', 'testro' ),
				'answer'   => __( 'No. Tests are built in plain English. QA staff without a scripting background can build and keep coverage.', 'testro' ),
			),
			array(
				'question' => __( 'Can enterprise Workday testing check integrations, not just the interface?', 'testro' ),
				'answer'   => __( 'Yes. Integration testing covers EIBs, Workday Studio flows, and Core Connectors alongside UI-level checks.', 'testro' ),
			),
			array(
				'question' => __( 'Does Workday application testing fit into an existing CI/CD pipeline?', 'testro' ),
				'answer'   => __( 'Yes. theTestRo connects with Jenkins, GitHub Actions, Azure DevOps, and Jira. Automated regression results gate deployments.', 'testro' ),
			),
		),

		'servicenow-testing' => array(
			array(
				'question' => __( 'What is ServiceNow test automation?', 'testro' ),
				'answer'   => __( 'It\'s the use of automated tools to test ServiceNow workflows, integrations, and customizations. Not relying on manual QA or ServiceNow\'s own ATF alone to catch issues.', 'testro' ),
			),
			array(
				'question' => __( 'Why do ServiceNow test scripts break so often?', 'testro' ),
				'answer'   => __( 'ServiceNow renders UI dynamically. Selector-based scripts lose track of elements more easily than on a typical web app. Self-healing tests solve this by finding elements differently.', 'testro' ),
			),
			array(
				'question' => __( 'Does this ServiceNow testing tool cover custom applications, not just standard modules?', 'testro' ),
				'answer'   => __( 'Yes. Tests adapt to your instance\'s real setup. They extend naturally to custom tables, scripts, and forms.', 'testro' ),
			),
			array(
				'question' => __( 'How does ITSM test automation handle SLA timers and approval routing?', 'testro' ),
				'answer'   => __( 'Tests check SLA start, pause, and breach behavior across priority levels. Someone also checks the CAB approval routing before a change reaches production.', 'testro' ),
			),
			array(
				'question' => __( 'Do I need to write code to automate ServiceNow testing?', 'testro' ),
				'answer'   => __( 'No. Tests are built in plain English. QA staff, HR teams, and service desk agents can all pitch in on coverage.', 'testro' ),
			),
			array(
				'question' => __( 'Can enterprise ServiceNow testing run in a private or on-premise environment?', 'testro' ),
				'answer'   => __( 'Yes. Deployment options include private cloud and on-premise setups for teams with strict data rules.', 'testro' ),
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
