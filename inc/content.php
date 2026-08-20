<?php
/**
 * Structured content helpers for marketing sections.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Asset URL helper.
 *
 * @param string $path Relative path under assets/.
 * @return string
 */
function testro_asset( $path ) {
	return TESTRO_URI . '/assets/' . ltrim( $path, '/' );
}

/**
 * Resolve WebP URL for a theme image when a sibling exists under images/webp/.
 *
 * @param string $path Relative path under assets/ (e.g. images/logo.png).
 * @return string
 */
function testro_asset_webp( $path ) {
	$path     = ltrim( $path, '/' );
	$original = testro_asset( $path );

	if ( ! preg_match( '/\.(png|jpe?g)$/i', $path ) ) {
		return $original;
	}

	$base = preg_replace( '/\.(png|jpe?g)$/i', '', basename( $path ) );
	$webp = 'images/webp/' . $base . '.webp';
	$file = TESTRO_DIR . '/assets/' . $webp;

	return file_exists( $file ) ? testro_asset( $webp ) : $original;
}

/**
 * Resolve AVIF URL for a theme image when a sibling exists under images/avif/.
 *
 * @param string $path Relative path under assets/ (e.g. images/logo.png).
 * @return string
 */
function testro_asset_avif( $path ) {
	$path     = ltrim( $path, '/' );
	$original = testro_asset( $path );

	if ( ! preg_match( '/\.(png|jpe?g|webp)$/i', $path ) ) {
		return $original;
	}

	$base = preg_replace( '/\.(png|jpe?g|webp)$/i', '', basename( $path ) );
	$avif = 'images/avif/' . $base . '.avif';
	$file = TESTRO_DIR . '/assets/' . $avif;

	return file_exists( $file ) ? testro_asset( $avif ) : $original;
}

/**
 * Resolve a theme asset URL or relative path to relative assets/ path.
 *
 * @param string $src URL or relative path.
 * @return string Relative path under assets/, or empty.
 */
function testro_asset_relative( $src ) {
	$src = (string) $src;
	if ( '' === $src ) {
		return '';
	}
	if ( 0 === strpos( $src, 'images/' ) || 0 === strpos( $src, 'videos/' ) ) {
		return ltrim( $src, '/' );
	}
	$prefix = TESTRO_URI . '/assets/';
	if ( 0 === strpos( $src, $prefix ) ) {
		return ltrim( substr( $src, strlen( $prefix ) ), '/' );
	}
	$path = wp_parse_url( $src, PHP_URL_PATH );
	if ( is_string( $path ) && preg_match( '#/assets/(.+)$#', $path, $m ) ) {
		return $m[1];
	}
	return '';
}

/**
 * Render an optimized <picture> (AVIF → WebP → fallback) or plain <img>.
 *
 * Sets title from alt when omitted (filter: testro_image_title).
 *
 * @param string $src   Relative assets path or full theme asset URL.
 * @param string $alt   Alt text.
 * @param array  $attrs Extra img attributes (width, height, class, loading, fetchpriority…).
 * @return string
 */
function testro_picture( $src, $alt = '', $attrs = array() ) {
	$relative = testro_asset_relative( $src );
	if ( '' === $relative ) {
		$defaults = array(
			'src'      => $src,
			'alt'      => $alt,
			'loading'  => 'lazy',
			'decoding' => 'async',
		);
		$merged = array_merge( $defaults, $attrs );
		if ( ! isset( $merged['title'] ) && '' !== (string) $alt ) {
			$title = apply_filters( 'testro_image_title', $alt, $src );
			if ( '' !== (string) $title ) {
				$merged['title'] = $title;
			}
		}
		$out = '<img';
		foreach ( $merged as $key => $value ) {
			if ( null === $value || false === $value ) {
				continue;
			}
			if ( true === $value ) {
				$out .= ' ' . esc_attr( $key );
				continue;
			}
			$out .= sprintf( ' %s="%s"', esc_attr( $key ), esc_attr( (string) $value ) );
		}
		return $out . ' />';
	}

	$fallback = testro_asset( $relative );
	$webp_url = testro_asset_webp( $relative );
	$avif_url = testro_asset_avif( $relative );
	$has_webp = ( $webp_url !== $fallback );
	$has_avif = ( $avif_url !== $fallback );

	$defaults = array(
		'alt'      => $alt,
		'loading'  => 'lazy',
		'decoding' => 'async',
	);
	$attrs = array_merge( $defaults, $attrs );

	if ( ! isset( $attrs['title'] ) && '' !== (string) $alt ) {
		$title = apply_filters( 'testro_image_title', $alt, $relative );
		if ( '' !== (string) $title ) {
			$attrs['title'] = $title;
		}
	}

	$img_attrs = '';
	foreach ( $attrs as $key => $value ) {
		if ( null === $value || false === $value ) {
			continue;
		}
		if ( true === $value ) {
			$img_attrs .= ' ' . esc_attr( $key );
			continue;
		}
		$img_attrs .= sprintf( ' %s="%s"', esc_attr( $key ), esc_attr( (string) $value ) );
	}

	$img_src = $has_webp ? $webp_url : $fallback;

	if ( ! $has_webp && ! $has_avif ) {
		return sprintf( '<img src="%s"%s />', esc_url( $img_src ), $img_attrs );
	}

	$sources = '';
	if ( $has_avif ) {
		$sources .= sprintf( '<source srcset="%s" type="image/avif" />', esc_url( $avif_url ) );
	}
	if ( $has_webp ) {
		$sources .= sprintf( '<source srcset="%s" type="image/webp" />', esc_url( $webp_url ) );
	}

	return sprintf(
		'<picture>%s<img src="%s"%s /></picture>',
		$sources,
		esc_url( $img_src ),
		$img_attrs
	);
}

/**
 * List of theme marketing images for the image sitemap.
 *
 * @return array[] Each item: url, title, caption.
 */
function testro_get_sitemap_images() {
	$paths = array(
		array( 'images/testrologo.png', 'theTestRo', 'theTestRo Intelligence-powered no-code test automation logo' ),
		array( 'images/testro-logo.png', 'theTestRo wordmark', 'theTestRo brand wordmark' ),
		array( 'images/functional.png', 'Functional Automation Testing', 'Functional web automation testing with theTestRo' ),
		array( 'images/APi.png', 'API Automation Testing', 'API automation testing with theTestRo' ),
		array( 'images/functional-api.png', 'Functional + API Testing', 'Combined functional and API automation' ),
	);

	$items = array();
	foreach ( $paths as $row ) {
		$items[] = array(
			'url'     => testro_asset_webp( $row[0] ),
			'title'   => $row[1],
			'caption' => $row[2],
		);
	}

	if ( function_exists( 'testro_get_clients' ) ) {
		foreach ( testro_get_clients() as $client ) {
			$rel = testro_asset_relative( $client['logo'] );
			if ( ! $rel ) {
				continue;
			}
			$items[] = array(
				'url'     => testro_asset_webp( $rel ),
				'title'   => $client['name'],
				'caption' => $client['name'] . ' — theTestRo customer',
			);
		}
	}

	return $items;
}

/**
 * Hero carousel slides.
 *
 * @return array
 */
function testro_get_hero_slides() {
	return array(
		array(
			'badges'          => array( 'Self-Healing', 'Schedule Tests', 'Data Driven', 'API Testing' ),
			'pill'            => 'AI-Powered Test Automation',
			'title'           => 'Best Test Automation Platform for Modern Software Testing',
			'subtitle'        => 'theTestRo is a Best test automation platform. It helps teams test web, API, mobile, and cross-browser apps fast. Build, run, and scale your tests in one place. No slowdowns. No extra tools.',
			'cta'             => 'Start Testing',
			'cta_secondary'   => 'Get a Demo',
			'supporting_line' => 'No credit card needed. Set up your first test in minutes.',
		),
	);
}

/**
 * Stats row.
 *
 * @return array
 */
function testro_get_stats() {
	return array(
		array(
			'value'       => '10M+',
			'label'       => 'Test Runs',
			'description' => '',
		),
		array(
			'value'       => '99.9%',
			'label'       => 'Uptime',
			'description' => '',
		),
		array(
			'value'       => '50%',
			'label'       => 'Faster Test Cycles',
			'description' => '',
		),
	);
}

/**
 * Client logos / ratings.
 *
 * @return array
 */
function testro_get_clients() {
	return array(
		array(
			'name'     => 'Optimworks',
			'logo'     => testro_asset( 'images/optimworks-logo.png' ),
			'rating'   => '5',
			'features' => array(
				array(
					'text'           => 'Record tests instantly with Intelligence-powered automation',
					'highlight'      => 'Intelligence-powered',
					'highlight_word' => 'automation',
				),
				array(
					'text'           => 'Run regression suites 3x faster',
					'highlight'      => '3x',
					'highlight_word' => 'faster',
				),
			),
		),
		array(
			'name'     => 'Graduway',
			'logo'     => testro_asset( 'images/graduway.png' ),
			'rating'   => '5',
			'features' => array(
				array(
					'text'           => 'Seamless integration with existing test frameworks',
					'highlight'      => 'Seamless',
					'highlight_word' => 'integration',
				),
				array(
					'text'           => 'Boost QA productivity with smart workflows',
					'highlight'      => 'Boost',
					'highlight_word' => 'productivity',
				),
			),
		),
		array(
			'name'     => 'Finfolio',
			'logo'     => testro_asset( 'images/finfolio_logo.png' ),
			'rating'   => '5',
			'features' => array(
				array(
					'text'           => 'End-to-end test coverage for financial platforms',
					'highlight'      => 'End-to-end',
					'highlight_word' => 'coverage',
				),
				array(
					'text'           => 'Secure and reliable automation pipelines',
					'highlight'      => 'Secure',
					'highlight_word' => 'automation',
				),
			),
		),
		array(
			'name'     => 'GlobeCar',
			'logo'     => testro_asset( 'images/globecar-logo.png' ),
			'rating'   => '4.8',
			'features' => array(
				array(
					'text'           => 'Automate booking flow testing with precision',
					'highlight'      => 'Automate',
					'highlight_word' => 'testing',
				),
				array(
					'text'           => 'Ensure zero downtime with continuous validation',
					'highlight'      => 'zero downtime',
					'highlight_word' => 'validation',
				),
			),
		),
		array(
			'name'     => 'urbuddi',
			'logo'     => testro_asset( 'images/urbuddi-logo.png' ),
			'rating'   => '5',
			'features' => array(
				array(
					'text'           => 'Auto-generate test cases from recorded actions',
					'highlight'      => 'Auto-generate',
					'highlight_word' => 'test cases',
				),
				array(
					'text'           => 'Self-healing tests with 99% execution stability',
					'highlight'      => '99%',
					'highlight_word' => 'stability',
				),
			),
		),
		array(
			'name'     => 'Aura',
			'logo'     => testro_asset( 'images/aura.png' ),
			'rating'   => '5',
			'features' => array(
				array(
					'text'           => 'Reduce test maintenance by 60%',
					'highlight'      => '60%',
					'highlight_word' => 'maintenance',
				),
				array(
					'text'           => 'Smart replay across application updates',
					'highlight'      => 'Smart',
					'highlight_word' => 'replay',
				),
			),
		),
		array(
			'name'     => 'Sevaki',
			'logo'     => testro_asset( 'images/sevaki-logo.png' ),
			'rating'   => '5',
			'features' => array(
				array(
					'text'           => 'Execute tests across browsers instantly',
					'highlight'      => 'cross-browser',
					'highlight_word' => 'execution',
				),
				array(
					'text'           => 'CI/CD ready automation workflows',
					'highlight'      => 'CI/CD',
					'highlight_word' => 'automation',
				),
			),
		),
		array(
			'name'     => 'Xcally',
			'logo'     => testro_asset( 'images/Xcally-logo.png' ),
			'rating'   => '4.8',
			'features' => array(
				array(
					'text'           => 'Accelerate release cycles with stable automation',
					'highlight'      => 'Accelerate',
					'highlight_word' => 'release',
				),
				array(
					'text'           => 'Unified reporting for stakeholders',
					'highlight'      => 'Unified',
					'highlight_word' => 'reporting',
				),
			),
		),
	);
}

/**
 * Service cards.
 *
 * @return array
 */
function testro_get_services() {
	return array(
		array(
			'title'            => 'Functional Automation Testing',
			'description'      => 'Automatically tests user workflows to ensure features work across web and mobile.',
			'main_title'       => 'Functional Automation Testing delivering quality, reliability & confidence.',
			'main_description' => 'Next-generation test automation that drives speed, accuracy, and reliability. Built to help teams deliver better software, faster.',
			'image'            => testro_asset( 'images/functional.png' ),
		),
		array(
			'title'            => 'API Automation Testing',
			'description'      => 'Ensure APIs are reliable, secure, and perform correctly through automated validation.',
			'main_title'       => 'API Automation Testing delivering speed, accuracy & reliability.',
			'main_description' => 'Every feature is carefully validated to ensure consistent, reliable, and expected behavior across all user workflows.',
			'image'            => testro_asset( 'images/APi.png' ),
		),
		array(
			'title'            => 'Functional + API',
			'description'      => 'Ensures end-to-end quality by validating backend APIs and frontend functionality together.',
			'main_title'       => 'Functional + API Automation Testing delivering consistency, performance & scalability.',
			'main_description' => 'Application performance and usability are validated across devices, platforms, screen sizes, and real-world conditions.',
			'image'            => testro_asset( 'images/functional-api.png' ),
		),
	);
}

/**
 * Why TestRo feature cards (Lucide icon keys match reference site).
 *
 * @return array
 */
function testro_get_why_features() {
	return array(
		array(
			'icon'        => 'gauge',
			'title'       => 'Faster test creation',
			'description' => 'build tests in minutes with no-code tools',
		),
		array(
			'icon'        => 'shield',
			'title'       => 'Self-healing tests',
			'description' => 'AI fixes broken tests before they fail your build',
		),
		array(
			'icon'        => 'devices',
			'title'       => 'Full test coverage',
			'description' => 'web, API, mobile, and cross-browser in one place',
		),
		array(
			'icon'        => 'focus',
			'title'       => 'Real scale',
			'description' => 'run tests in parallel across real browsers and devices',
		),
		array(
			'icon'        => 'code',
			'title'       => 'Faster releases',
			'description' => 'testing runs right inside your CI/CD pipeline',
		),
	);
}

/**
 * Inline Lucide-style SVG for a Why card icon.
 *
 * @param string $icon Icon key from testro_get_why_features().
 * @return string Safe SVG markup.
 */
function testro_get_why_icon_svg( $icon ) {
	$icons = array(
		'gauge'   => '<path d="m12 14 4-4"/><path d="M3.34 19a10 10 0 1 1 17.32 0"/>',
		'code'    => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>',
		'focus'   => '<circle cx="12" cy="12" r="3"/><path d="M3 7V5a2 2 0 0 1 2-2h2"/><path d="M17 3h2a2 2 0 0 1 2 2v2"/><path d="M21 17v2a2 2 0 0 1-2 2h-2"/><path d="M7 21H5a2 2 0 0 1-2-2v-2"/>',
		'shield'  => '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
		'devices' => '<path d="M18 8V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h8"/><path d="M10 19v-3.96 3.15"/><path d="M7 19h5"/><rect width="6" height="10" x="16" y="12" rx="2"/>',
	);

	$paths = isset( $icons[ $icon ] ) ? $icons[ $icon ] : $icons['gauge'];

	return '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths . '</svg>';
}

/**
 * Features tabs (NLP / API / Schedulers / Reports).
 *
 * @return array
 */
function testro_get_feature_tabs() {
	return array(
		array(
			'id'          => 'nlp',
			'label'       => 'NLP Test Steps',
			'title'       => 'NLP (Natural Language Processing) Test Steps',
			'description' => "Write test steps in plain English. Testro's Intelligence understands and executes them automatically.",
			'video'       => testro_asset( 'videos/nlps.mp4' ),
			'bullets'     => array(
				'No coding required – write in plain English',
				'Intelligence-powered test execution',
				'Automatic element detection',
				'Self-healing test scripts',
			),
			'cta'         => 'Start your free trial now',
		),
		array(
			'id'          => 'api',
			'label'       => 'API Integration',
			'title'       => 'Powerful API Integration',
			'description' => 'Integrate seamlessly with your existing systems and automate workflows effortlessly.',
			'video'       => testro_asset( 'videos/api_integration.mp4' ),
			'bullets'     => array(
				'REST & GraphQL support',
				'Webhook automation',
				'Secure authentication',
				'Real-time data sync',
			),
			'cta'         => 'Start your free trial now',
		),
		array(
			'id'          => 'schedulers',
			'label'       => 'Schedulers',
			'title'       => 'Smart Test Scheduling',
			'description' => 'Automate your testing pipelines with flexible scheduling options.',
			'video'       => testro_asset( 'videos/schedulers.mp4' ),
			'bullets'     => array(
				'Cron-based scheduling',
				'CI/CD integration',
				'Failure alerts',
				'Execution history tracking',
			),
			'cta'         => 'Start your free trial now',
		),
		array(
			'id'          => 'reports',
			'label'       => 'Reports',
			'title'       => 'Advanced Reporting & Insights',
			'description' => 'Get detailed reports and actionable insights to improve software quality.',
			'video'       => testro_asset( 'videos/reports.mp4' ),
			'bullets'     => array(
				'Real-time dashboards',
				'Exportable reports',
				'Trend analytics',
				'Team performance tracking',
			),
			'cta'         => 'Start your free trial now',
		),
	);
}

/**
 * How it works steps.
 *
 * @return array
 */
function testro_get_how_it_works() {
	return array(
		array(
			'step'        => 'Step 1',
			'title'       => 'Record or Build',
			'description' => 'Capture your workflow, or build a test with our no-code editor.',
			'tx'          => '-16rem',
			'ty'          => '2.5rem',
			'rotate'      => '-6deg',
		),
		array(
			'step'        => 'Step 2',
			'title'       => 'Enhance with AI',
			'description' => 'Let AI add checks, fixes, and edge cases.',
			'tx'          => '-5rem',
			'ty'          => '-1.5rem',
			'rotate'      => '-3deg',
		),
		array(
			'step'        => 'Step 3',
			'title'       => 'Run at Scale',
			'description' => 'Test in parallel across browsers, devices, and environments.',
			'tx'          => '5rem',
			'ty'          => '-1.5rem',
			'rotate'      => '3deg',
		),
		array(
			'step'        => 'Step 4',
			'title'       => 'Analyze & Ship',
			'description' => 'Review results, fix bugs fast, and ship with confidence.',
			'tx'          => '16rem',
			'ty'          => '2.5rem',
			'rotate'      => '6deg',
		),
	);
}

/**
 * Pricing plans.
 *
 * Base subscription prices are fixed. Cloud infrastructure cost is calculated
 * separately as Parallel Executions × $99 and never alters the card header price.
 *
 * Spec flags:
 * - highlight: blue value emphasis (#388EFF)
 * - highlight_text: gradient text on label + value (Playwright row)
 * - selector: interactive Parallel Execution quantity control
 *
 * @return array
 */
function testro_get_pricing_plans() {
	$shared_features = array(
		'Reusable Components',
		'Variables Support',
		'Custom Locators',
		'Advanced Assertions',
		'Advanced Waits',
		'Self-Healing',
		'Debugging',
		'Custom Coding',
	);

	$infra_unit_cost = 99;

	return array(
		array(
			'id'              => 'free',
			'name'            => 'Free',
			'badge'           => '14 Day Free Trial',
			'badge_icon'      => 'clock',
			'tagline'         => 'Explore TestRo with no commitment',
			'price_monthly'   => 0,
			'price_label'     => '$0',
			'billing_note'    => 'Start free, upgrade anytime',
			'billing_dynamic' => false,
			'cta'             => 'Free Trial',
			'cta_type'        => 'demo',
			'included'        => array(
				array( 'label' => 'Projects', 'value' => '1' ),
				array( 'label' => 'Users', 'value' => '1' ),
				array( 'label' => 'Storage', 'value' => '5 GB' ),
				array( 'label' => 'Report Retention', 'value' => '1 month' ),
				array(
					'label'          => 'Instant Playwright Code Generation',
					'value'          => '1',
					'highlight_text' => true,
				),
			),
			'infrastructure'  => array(
				array( 'label' => 'Parallel Execution', 'value' => '1' ),
				array( 'label' => 'Scheduler Minutes', 'value' => '100 / month' ),
				array( 'label' => 'Execution Mode', 'value' => 'Sequential' ),
			),
			'features'        => $shared_features,
			'features_mt'     => true,
		),
		array(
			'id'                => 'basic',
			'name'              => 'Basic',
			'badge'             => '',
			'tagline'           => 'Scale testing across projects and teams',
			'price_monthly'     => 199,
			'price_yearly'      => 149,
			'price_label'       => '$199',
			'billing_note'      => '(billed month-to-month)',
			'billing_dynamic'   => true,
			'cta'               => 'Get Started',
			'cta_type'          => 'demo',
			'infra_unit_cost'   => $infra_unit_cost,
			'parallel_default'  => 1,
			'included'          => array(
				array( 'label' => 'Projects', 'value' => '10' ),
				array( 'label' => 'Users', 'value' => '3' ),
				array( 'label' => 'Storage', 'value' => '30 GB' ),
				array( 'label' => 'Report Retention', 'value' => '6 months' ),
				array(
					'label'          => 'Instant Playwright Code Generation',
					'value'          => '10',
					'highlight_text' => true,
				),
			),
			'infrastructure'    => array(
				array(
					'label'    => 'Parallel Execution',
					'value'    => '1',
					'selector' => true,
				),
				array(
					'label'     => 'Scheduler Minutes',
					'value'     => 'Unlimited',
					'highlight' => true,
				),
				array( 'label' => 'Execution Mode', 'value' => 'Seq & Parallel' ),
			),
			'features'          => $shared_features,
		),
		array(
			'id'                => 'enterprise',
			'name'              => 'Enterprise',
			'badge'             => 'Recommended',
			'badge_icon'        => 'sparkles',
			'tagline'           => 'For growing teams in QA & DevOps',
			'price_monthly'     => 399,
			'price_yearly'      => 349,
			'price_label'       => '$399',
			'billing_note'      => '(billed month-to-month)',
			'billing_dynamic'   => true,
			'cta'               => 'Get Started',
			'cta_type'          => 'demo',
			'recommended'       => true,
			'infra_unit_cost'   => $infra_unit_cost,
			'parallel_default'  => 1,
			'included'          => array(
				array(
					'label'     => 'Projects',
					'value'     => 'Unlimited',
					'highlight' => true,
				),
				array( 'label' => 'Users', 'value' => '10' ),
				array( 'label' => 'Storage', 'value' => '50 GB' ),
				array(
					'label'     => 'Report Retention',
					'value'     => 'Unlimited',
					'highlight' => true,
				),
				array(
					'label'          => 'Instant Playwright Code Generation',
					'value'          => 'Unlimited',
					'highlight_text' => true,
				),
			),
			'infrastructure'    => array(
				array(
					'label'    => 'Parallel Execution',
					'value'    => '1',
					'selector' => true,
				),
				array(
					'label'     => 'Scheduler Minutes',
					'value'     => 'Unlimited',
					'highlight' => true,
				),
				array( 'label' => 'Execution Mode', 'value' => 'Seq & Parallel' ),
			),
			'features'          => $shared_features,
		),
		array(
			'id'              => 'custom',
			'name'            => 'Custom',
			'badge'           => '',
			'tagline'         => 'Build exactly your usage needs & requirements',
			'price_monthly'   => null,
			'price_label'     => "Let's talk",
			'billing_note'    => 'Fully custom pricing',
			'billing_dynamic' => false,
			'cta'             => 'Request a Quote',
			'cta_type'        => 'demo',
			'is_custom'       => true,
			'included_list'   => array(
				array( 'label' => 'Tailored to Your Needs', 'icon' => 'settings' ),
				array( 'label' => 'Customizable Limits Your Way', 'icon' => 'pencil' ),
				array( 'label' => 'High Parallel Execution', 'icon' => 'zap' ),
				array( 'label' => 'Flexible Execution and Scaling', 'icon' => 'layers' ),
				array( 'label' => 'Priority Support', 'icon' => 'headset' ),
				array( 'label' => 'Custom Billing and Invoicing', 'icon' => 'file-text' ),
				array( 'label' => 'Automation Script Development Support', 'icon' => 'file-code' ),
			),
			'features'        => array(),
		),
	);
}

/**
 * Marketing pricing plans for the dedicated /pricing/ page.
 *
 * Distinct from homepage numeric plans in testro_get_pricing_plans().
 *
 * @return array<int, array<string, mixed>>
 */
function testro_get_page_pricing_plans() {
	return array(
		array(
			'id'         => 'starter',
			'name'       => __( 'Starter', 'testro' ),
			'tagline'    => __( 'Best for small QA teams', 'testro' ),
			'best_for'   => __( 'Small QA teams', 'testro' ),
			'cta'        => __( 'Start Free Trial', 'testro' ),
			'features'   => array(
				__( 'AI Test Automation', 'testro' ),
				__( 'No-Code Testing', 'testro' ),
				__( 'Web Testing', 'testro' ),
				__( 'API Testing', 'testro' ),
				__( 'Cross-Browser Testing', 'testro' ),
				__( 'Basic Reporting', 'testro' ),
				__( 'Email Support', 'testro' ),
			),
			'card_bg'    => 'default-pricing-card-background',
		),
		array(
			'id'           => 'professional',
			'name'         => __( 'Professional', 'testro' ),
			'tagline'      => __( 'For growing QA and engineering teams', 'testro' ),
			'badge'        => __( 'Recommended', 'testro' ),
			'badge_icon'   => 'sparkles',
			'recommended'  => true,
			'includes_note'=> __( 'Includes everything in Starter, plus:', 'testro' ),
			'cta'          => __( 'Contact Sales', 'testro' ),
			'features'     => array(
				__( 'Parallel Execution', 'testro' ),
				__( 'Self-Healing Automation', 'testro' ),
				__( 'CI/CD Integration', 'testro' ),
				__( 'Advanced Reports', 'testro' ),
				__( 'Team Collaboration', 'testro' ),
				__( 'Priority Support', 'testro' ),
			),
			'card_bg'      => 'enterprise-pricing-card-background',
		),
		array(
			'id'           => 'enterprise',
			'name'         => __( 'Enterprise', 'testro' ),
			'tagline'      => __( 'For large organizations and regulated teams', 'testro' ),
			'includes_note'=> __( 'Includes everything in Professional, plus:', 'testro' ),
			'cta'          => __( 'Get Custom Pricing', 'testro' ),
			'features'     => array(
				__( 'Unlimited Projects', 'testro' ),
				__( 'Unlimited Test Execution', 'testro' ),
				__( 'SSO', 'testro' ),
				__( 'Role-Based Access Control', 'testro' ),
				__( 'Private Cloud / On-Premise', 'testro' ),
				__( 'Dedicated Customer Success Manager', 'testro' ),
				__( 'Enterprise Security', 'testro' ),
				__( 'Custom Integrations', 'testro' ),
				__( 'SLA Support', 'testro' ),
			),
			'card_bg'      => 'custom-pricing-card-background',
		),
	);
}

/**
 * Capabilities shared across all marketing pricing plans.
 *
 * @return array<int, array{icon:string,title:string,description:string}>
 */
function testro_get_pricing_includes() {
	return array(
		array(
			'icon'        => 'sparkles',
			'title'       => __( 'AI-Powered Test Automation', 'testro' ),
			'description' => __( 'Create and maintain reliable automated tests with built-in AI assistance.', 'testro' ),
		),
		array(
			'icon'        => 'pen-square',
			'title'       => __( 'No-Code Test Creation', 'testro' ),
			'description' => __( 'Author automation visually without writing scripts for every scenario.', 'testro' ),
		),
		array(
			'icon'        => 'folder-tree',
			'title'       => __( 'Test Management', 'testro' ),
			'description' => __( 'Organize suites, runs, and coverage in one shared workspace.', 'testro' ),
		),
		array(
			'icon'        => 'chart-bar',
			'title'       => __( 'Test Reporting', 'testro' ),
			'description' => __( 'Track results, failures, and release readiness with clear insights.', 'testro' ),
		),
		array(
			'icon'        => 'shield-check',
			'title'       => __( 'Enterprise Security', 'testro' ),
			'description' => __( 'Protect sensitive test data with secure, enterprise-ready controls.', 'testro' ),
		),
		array(
			'icon'        => 'refresh',
			'title'       => __( 'Product Updates', 'testro' ),
			'description' => __( 'Get continuous platform improvements as your automation needs grow.', 'testro' ),
		),
		array(
			'icon'        => 'file-text',
			'title'       => __( 'Documentation', 'testro' ),
			'description' => __( 'Access guides and resources that help teams onboard and scale faster.', 'testro' ),
		),
		array(
			'icon'        => 'message-text',
			'title'       => __( 'Customer Support', 'testro' ),
			'description' => __( 'Get help from theTestRo experts when your team needs it most.', 'testro' ),
		),
	);
}

/**
 * Why choose theTestRo benefits for the pricing page.
 *
 * @return array<int, array{icon:string,title:string,description:string}>
 */
function testro_get_pricing_benefits() {
	return array(
		array(
			'icon'        => 'sparkles',
			'title'       => __( 'AI-Powered Automation', 'testro' ),
			'description' => __( 'Accelerate authoring and maintenance with intelligence built into every workflow.', 'testro' ),
		),
		array(
			'icon'        => 'zap',
			'title'       => __( 'Faster Test Execution', 'testro' ),
			'description' => __( 'Run suites in parallel and shrink feedback cycles across browsers and pipelines.', 'testro' ),
		),
		array(
			'icon'        => 'heart-pulse',
			'title'       => __( 'Reduced Maintenance', 'testro' ),
			'description' => __( 'Self-healing automation keeps tests stable as your application changes.', 'testro' ),
		),
		array(
			'icon'        => 'trending-up',
			'title'       => __( 'Enterprise Scalability', 'testro' ),
			'description' => __( 'Scale projects, users, and execution volume without re-architecting your stack.', 'testro' ),
		),
		array(
			'icon'        => 'git-branch',
			'title'       => __( 'Continuous Testing', 'testro' ),
			'description' => __( 'Embed quality gates into CI/CD so every release ships with confidence.', 'testro' ),
		),
		array(
			'icon'        => 'badge-check',
			'title'       => __( 'Higher Software Quality', 'testro' ),
			'description' => __( 'Catch defects earlier and deliver more reliable experiences to your users.', 'testro' ),
		),
	);
}

/**
 * Lucide-style SVG icons used in the pricing section.
 *
 * @param string $icon Icon key.
 * @param string $class Optional CSS class list.
 * @return string Safe SVG markup.
 */
function testro_get_pricing_icon_svg( $icon, $class = '' ) {
	$icons = array(
		'clock'     => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
		'sparkles'  => '<path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/><path d="M20 3v4"/><path d="M22 5h-4"/><path d="M4 17v2"/><path d="M5 18H3"/>',
		'check'     => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
		'settings'  => '<path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/>',
		'pencil'    => '<path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/><path d="m15 5 4 4"/>',
		'zap'       => '<path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"/>',
		'layers'    => '<path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"/><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"/>',
		'headset'   => '<path d="M3 11h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5Zm0 0a9 9 0 1 1 18 0m0 0v5a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3Z"/><path d="M21 16v2a4 4 0 0 1-4 4h-5"/>',
		'file-text' => '<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/>',
		'file-code' => '<path d="M10 12.5 8 15l2 2.5"/><path d="m14 12.5 2 2.5-2 2.5"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"/>',
	);

	$paths = isset( $icons[ $icon ] ) ? $icons[ $icon ] : $icons['check'];
	$class = trim( (string) $class );
	$attr  = $class ? ' class="' . esc_attr( $class ) . '"' : '';

	// Filled blue circle + white check (matches reference lucide-circle-check).
	if ( 'check' === $icon ) {
		return '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="#3B82F6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"' . $attr . ' aria-hidden="true" focusable="false">' . $paths . '</svg>';
	}

	return '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"' . $attr . ' aria-hidden="true" focusable="false">' . $paths . '</svg>';
}

/**
 * Resolve yearly (per-month) price for a plan.
 *
 * Prefers an explicit price_yearly when set; otherwise applies the default 20% discount.
 *
 * @param int|null $monthly Monthly price.
 * @param array    $plan    Optional plan array that may include price_yearly.
 * @return int|null
 */
function testro_yearly_price( $monthly, $plan = array() ) {
	if ( isset( $plan['price_yearly'] ) && is_numeric( $plan['price_yearly'] ) ) {
		return (int) $plan['price_yearly'];
	}
	if ( null === $monthly || ! is_numeric( $monthly ) ) {
		return null;
	}
	return (int) round( $monthly * 0.8 );
}

/**
 * Render a What's Included / Infrastructure label–value row.
 *
 * @param array $row Row data.
 */
function testro_pricing_render_inc_row( $row ) {
	$label       = isset( $row['label'] ) ? $row['label'] : '';
	$value       = isset( $row['value'] ) ? $row['value'] : '';
	$is_hl       = ! empty( $row['highlight'] );
	$is_hl_text  = ! empty( $row['highlight_text'] );
	$is_selector = ! empty( $row['selector'] );

	$label_class = 'testro-pricing__inc-label' . ( $is_hl_text ? ' gradient-text' : '' );
	$value_class = 'testro-pricing__inc-value';
	if ( $is_hl_text ) {
		$value_class .= ' gradient-text is-semibold';
	} elseif ( $is_hl ) {
		$value_class .= ' is-highlight';
	}
	?>
	<li<?php echo $is_selector ? ' class="testro-pricing__inc-row--selector"' : ''; ?>>
		<span class="<?php echo esc_attr( $label_class ); ?>"<?php echo $is_hl_text ? ' style="--font-size: 14px;"' : ''; ?>><?php echo esc_html( $label ); ?></span>
		<?php if ( $is_selector ) : ?>
			<?php
			$default = isset( $row['value'] ) && is_numeric( $row['value'] ) ? max( 1, (int) $row['value'] ) : 1;
			?>
			<div
				class="testro-pricing__qty"
				data-parallel-qty
				data-min="1"
				data-value="<?php echo esc_attr( (string) $default ); ?>"
			>
				<button
					type="button"
					class="testro-pricing__qty-btn"
					data-qty-action="dec"
					aria-label="<?php esc_attr_e( 'Decrease parallel executions', 'testro' ); ?>"
				>−</button>
				<span
					class="testro-pricing__qty-value"
					data-qty-value
					aria-live="polite"
				><?php echo esc_html( (string) $default ); ?></span>
				<button
					type="button"
					class="testro-pricing__qty-btn"
					data-qty-action="inc"
					aria-label="<?php esc_attr_e( 'Increase parallel executions', 'testro' ); ?>"
				>+</button>
			</div>
		<?php else : ?>
			<span class="<?php echo esc_attr( $value_class ); ?>"<?php echo $is_hl_text ? ' style="--font-size: 14px;"' : ''; ?>><?php echo esc_html( $value ); ?></span>
		<?php endif; ?>
	</li>
	<?php
}

/**
 * Highlight brand name "theTestRo" inside testimonial copy.
 *
 * @param string $text Plain text quote.
 * @return string Escaped HTML with brand spans.
 */
function testro_highlight_brand_name( $text ) {
	$text = (string) $text;
	if ( '' === $text ) {
		return '';
	}

	$escaped = esc_html( $text );
	return preg_replace(
		'/\btheTestRo\b/',
		'<span class="testro-brand-highlight">theTestRo</span>',
		$escaped,
		1
	);
}

/**
 * Render 0–5 star icons for a testimonial rating (supports half stars).
 *
 * @param float|int|string $rating Rating value.
 * @return string Safe HTML.
 */
function testro_render_testimonial_stars( $rating ) {
	$rating = max( 0, min( 5, (float) $rating ) );
	$uid    = wp_unique_id( 'testro-star-' );
	$html   = '';

	for ( $i = 1; $i <= 5; $i++ ) {
		$remainder = $rating - ( $i - 1 );
		$mod       = ' is-empty';
		$fill      = 'currentColor';

		if ( $remainder >= 0.75 ) {
			$mod = ' is-full';
		} elseif ( $remainder >= 0.25 ) {
			$mod  = ' is-half';
			$fill = 'url(#' . esc_attr( $uid . '-' . $i ) . ')';
		}

		$html .= '<svg class="testro-testimonials__star' . $mod . '" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" focusable="false">';
		if ( ' is-half' === $mod ) {
			$html .= '<defs><linearGradient id="' . esc_attr( $uid . '-' . $i ) . '" x1="0" x2="1" y1="0" y2="0">';
			$html .= '<stop offset="50%" stop-color="#2563eb"/><stop offset="50%" stop-color="#dbeafe"/>';
			$html .= '</linearGradient></defs>';
		}
		$html .= '<path fill="' . esc_attr( $fill ) . '" d="M12 2.5l2.9 6.1 6.6.8-4.9 4.5 1.3 6.5L12 17.4 6.1 20.4l1.3-6.5L2.5 9.4l6.6-.8L12 2.5z"/>';
		$html .= '</svg>';
	}

	return $html;
}

/**
 * Testimonials.
 *
 * @return array
 */
function testro_get_testimonials() {
	$male   = testro_asset_webp( 'images/male-avatar.png' );
	$female = testro_asset_webp( 'images/female-avatar.png' );

	return array(
		array(
			'name'   => 'Alex Morgan',
			'role'   => 'QA Lead',
			'avatar' => $male,
			'rating' => 5,
			'quote'  => 'As a startup, we don’t have the budget to hire a full automation team. theTestRo gave us automation without writing a single line of code.The self-healing locators drastically reduced our test maintenance effort.We now run scheduled regression suites every night without manual intervention.I highly recommend theTestRo to growing teams looking for reliable, low-maintenance automation',
		),
		array(
			'name'   => 'Sarah Johnson',
			'role'   => 'Software Engineer',
			'avatar' => $female,
			'rating' => 5,
			'quote'  => 'Automation maintenance used to consume a large portion of our QA bandwidth. Since adopting theTestRo, test stability has improved dramatically.The NLP-based steps make test creation simple, even for non-technical team members.The reporting provides excellent visibility for management.This tool has become an essential part of our QA strategy',
		),
		array(
			'name'   => 'Michael Chen',
			'role'   => 'Product Manager',
			'avatar' => $male,
			'rating' => 4,
			'quote'  => 'We previously relied on traditional script-based automation frameworks that required significant development effort and ongoing maintenance. After switching to theTestRo, we were able to build and deploy automation scenarios nearly 30X faster compared to our earlier approach. The no-code framework, API integration, and built-in scheduling streamlined our entire testing workflow. It’s a powerful solution for teams that need speed without sacrificing reliability.',
		),
		array(
			'name'   => 'Emily Davis',
			'role'   => 'DevOps Engineer',
			'avatar' => $female,
			'rating' => 4.5,
			'quote'  => 'theTestRo reduced our dependency on engineering resources for test automation.The NLP-driven test steps are intuitive and easy to manage.Automated scheduling ensures our regression tests run consistently before every release.I confidently endorse theTestRo for teams aiming to accelerate releases with better quality assurance.',
		),
		array(
			'name'   => 'James Wilson',
			'role'   => 'Tech Lead',
			'avatar' => $male,
			'rating' => 5,
			'quote'  => "I don't come from a technical background, but with theTestRo, I was able to create automation flows using simple English instructions.The self-healing capability makes the tool feel intelligent and resilient.It has completely transformed our testing process.I would absolutely suggest theTestRo to teams transitioning from manual to automated testing",
		),
	);
}

/**
 * YouTube video embeds.
 *
 * @return array
 */
function testro_get_videos() {
	return array(
		array(
			'id'    => 'kBMYLuvBkt8',
			'title' => 'theTestRo overview',
		),
		array(
			'id'    => 'OTB5nigmfBc',
			'title' => 'theTestRo features demo',
		),
		array(
			'id'    => 'coDsNoKCQYk',
			'title' => 'theTestRo walkthrough',
		),
	);
}

/**
 * Webinars hub content — upcoming CTAs and on-demand sessions.
 *
 * On-demand items reuse existing published product videos rather than inventing
 * fictional webinars. Upcoming is invite-only via demo/contact until live sessions exist.
 *
 * @return array{
 *   eyebrow:string,
 *   title:string,
 *   intro:string,
 *   upcoming:array<int,array<string,mixed>>,
 *   on_demand:array<int,array<string,mixed>>,
 *   topics:array<int,array<string,string>>
 * }
 */
function testro_get_webinars() {
	$videos    = testro_get_videos();
	$on_demand = array();

	$video_copy = array(
		'kBMYLuvBkt8' => __( 'Watch this on-demand software testing webinar for an overview of how theTestRo supports AI-powered, no-code automation.', 'testro' ),
		'OTB5nigmfBc' => __( 'See a product demo covering QA automation capabilities, self-healing tests, and practical test automation workflows.', 'testro' ),
		'coDsNoKCQYk' => __( 'Follow a guided walkthrough designed as practical test automation training for teams evaluating the platform.', 'testro' ),
	);

	foreach ( $videos as $video ) {
		$video_id = isset( $video['id'] ) ? (string) $video['id'] : '';
		$on_demand[] = array(
			'status'      => __( 'On demand', 'testro' ),
			'title'       => $video['title'],
			'description' => isset( $video_copy[ $video_id ] )
				? $video_copy[ $video_id ]
				: __( 'Watch this recorded session to see how AI-powered, no-code automation fits into modern QA workflows.', 'testro' ),
			'video_id'    => $video_id,
			'cta'         => __( 'Watch Now', 'testro' ),
			'href'        => 'https://www.youtube.com/watch?v=' . rawurlencode( $video_id ),
		);
	}

	$ai_url         = function_exists( 'testro_nav_url' ) ? testro_nav_url( 'ai-test-automation' ) : home_url( '/ai-test-automation/' );
	$functional_url = function_exists( 'testro_nav_url' ) ? testro_nav_url( 'automated-functional-testing' ) : home_url( '/automated-functional-testing/' );
	$regression_url = function_exists( 'testro_nav_url' ) ? testro_nav_url( 'regression-test-automation' ) : home_url( '/regression-test-automation/' );
	$nocode_url     = function_exists( 'testro_nav_url' ) ? testro_nav_url( 'no-code-test-automation' ) : home_url( '/no-code-test-automation/' );

	return array(
		'eyebrow'   => __( 'Explore & Learn', 'testro' ),
		'title'     => __( 'Webinars', 'testro' ),
		'intro'     => __( 'Explore live and on-demand webinars covering AI testing, QA automation, software testing best practices, DevOps strategies, product updates, and expert insights from theTestRo.', 'testro' ),
		'upcoming'  => array(
			array(
				'status'      => __( 'Upcoming', 'testro' ),
				'title'       => __( 'AI Test Automation Live Sessions', 'testro' ),
				'description' => __( 'Join upcoming AI testing webinars and live conversations on AI-powered testing, no-code automation, and continuous quality. Register to get notified about the next live session.', 'testro' ),
				'cta'         => __( 'Register Interest', 'testro' ),
				'modal'       => 'demo-modal',
			),
		),
		'on_demand' => $on_demand,
		'topics'    => array(
			array(
				'icon'        => 'sparkles',
				'title'       => __( 'AI Testing Webinars', 'testro' ),
				'description' => __( 'Sessions on AI-powered testing, AI-assisted test creation, and self-healing strategies that keep suites stable as apps change.', 'testro' ),
				'cta'         => array(
					'label' => __( 'Explore AI-powered test automation', 'testro' ),
					'href'  => $ai_url,
				),
			),
			array(
				'icon'        => 'layout-grid',
				'title'       => __( 'Software Testing Webinars', 'testro' ),
				'description' => __( 'Software testing insights covering functional, regression, and quality engineering practices for modern delivery teams.', 'testro' ),
				'cta'         => array(
					'label' => __( 'Explore automated functional testing', 'testro' ),
					'href'  => $functional_url,
				),
			),
			array(
				'icon'        => 'pen-square',
				'title'       => __( 'QA Automation Webinars', 'testro' ),
				'description' => __( 'QA automation and continuous testing sessions focused on automation strategy, coverage, and release-ready workflows.', 'testro' ),
				'cta'         => array(
					'label' => __( 'Explore regression test automation', 'testro' ),
					'href'  => $regression_url,
				),
			),
			array(
				'icon'        => 'video',
				'title'       => __( 'Test Automation Training', 'testro' ),
				'description' => __( 'Practical test automation training through demos, walkthroughs, and expert-led guidance your team can apply immediately.', 'testro' ),
				'cta'         => array(
					'label' => __( 'Explore no-code test automation', 'testro' ),
					'href'  => $nocode_url,
				),
			),
		),
	);
}

/**
 * FAQ items.
 *
 * @return array
 */
function testro_get_faqs() {
	return array(
		array(
			'question' => 'What is theTestRo?',
			'answer'   => 'theTestRo is an AI test automation platform for web, API, mobile, and cross-browser testing — built for teams of any size.',
		),
		array(
			'question' => 'How is theTestRo different from other test automation platforms?',
			'answer'   => 'theTestRo combines cross-browser testing, AI test creation, and no-code tools in one platform. No need to juggle Reflect, BrowserStack, and mabl separately.',
		),
		array(
			'question' => 'Does theTestRo require coding skills?',
			'answer'   => 'No. Use the no-code builder, or write scripts if your team prefers code. Either way works.',
		),
		array(
			'question' => "How does theTestRo's AI reduce test maintenance?",
			'answer'   => 'AI fixes broken locators on its own when your UI changes, and flags the likely cause the moment a test fails.',
		),
		array(
			'question' => 'Does theTestRo integrate with CI/CD pipelines?',
			'answer'   => 'Yes. It connects with Jenkins, GitHub Actions, GitLab CI, Azure DevOps, and more.',
		),
		array(
			'question' => 'Can enterprises scale test automation with theTestRo?',
			'answer'   => 'Yes. Run large test suites in parallel, manage user roles, and support many teams — built for enterprise use from day one.',
		),
	);
}

/**
 * Homepage product overview content.
 *
 * @return array{eyebrow:string,title:string,intro:string,highlights:array<int,array{title:string,description:string}>}
 */
function testro_get_overview() {
	return array(
		'title'      => 'Product Overview',
		'headline'   => 'One Platform. Every Test You Need.',
		'paragraphs' => array(
			'TheTestRo brings all your testing into one place. Web API. Mobile. Cross-browser. No more juggling five different tools.',
			'Like to write code? Great, you can. Prefer no-code? That works too. theTestRo fits how your team already works.',
			'Small QA team or large company — theTestRo scales with you. Run tests side by side. Link it to your CI/CD flow. See all your results in one place.',
			'This is what a true enterprise test automation platform should feel like.',
		),
	);
}

/**
 * Interactive key feature cards linking to product/feature pages.
 *
 * @return array<int, array{title:string,description:string,href:string,icon:string}>
 */
function testro_get_key_features() {
	return array(
		array(
			'title'       => 'No-Code & Low-Code Builder',
			'description' => 'Build tests visually. No scripting needed.',
			'href'        => testro_nav_url( 'no-code-test-automation' ),
			'icon'        => 'blocks',
		),
		array(
			'title'       => 'Cross-Browser & Cross-Device Testing',
			'description' => 'Test on real browsers and real devices.',
			'href'        => testro_nav_url( 'automated-cross-browser-testing-tool' ),
			'icon'        => 'browsers',
		),
		array(
			'title'       => 'API Test Automation',
			'description' => 'Test REST and GraphQL APIs alongside your UI tests.',
			'href'        => testro_nav_url( 'automated-api-testing' ),
			'icon'        => 'api',
		),
		array(
			'title'       => 'Parallel Test Execution',
			'description' => 'Run thousands of tests at once in the cloud.',
			'href'        => testro_nav_url( 'test-execution' ),
			'icon'        => 'play',
		),
		array(
			'title'       => 'CI/CD Integrations',
			'description' => 'Works with Jenkins, GitHub Actions, GitLab, and Azure DevOps.',
			'href'        => testro_nav_url( 'ci-cd-integration' ),
			'icon'        => 'cicd',
		),
		array(
			'title'       => 'Reporting & Analytics',
			'description' => 'See live dashboards, video replays, and root-cause data.',
			'href'        => testro_nav_url( 'reporting-analytics' ),
			'icon'        => 'chart',
		),
		array(
			'title'       => 'Test Data Management',
			'description' => 'Manage test data safely across every environment.',
			'href'        => testro_nav_url( 'test-management-software' ),
			'icon'        => 'board',
		),
	);
}

/**
 * AI capabilities section data.
 *
 * @return array{eyebrow:string,title:string,intro:string,steps:array<int,array{icon:string,label:string}>,items:array<int,array{icon:string,title:string,description:string}>}
 */
function testro_get_ai_capabilities() {
	return array(
		'title'  => 'AI Capabilities',
		'intro'  => "theTestRo's AI does more than run scripts. It thinks ahead.",
		'outro'  => 'This is what makes theTestRo a true AI test automation platform — not just automation with AI added on top.',
		'steps'  => array(
			array(
				'icon'  => 'sparkles',
				'label' => 'Observe product signals',
			),
			array(
				'icon'  => 'wand',
				'label' => 'Generate & adapt tests',
			),
			array(
				'icon'  => 'activity',
				'label' => 'Learn from every run',
			),
		),
		'items'  => array(
			array(
				'icon'        => 'heart-pulse',
				'title'       => 'Self-Healing Tests',
				'description' => 'When your UI changes, AI fixes broken tests on its own.',
			),
			array(
				'icon'        => 'sparkles',
				'title'       => 'AI Test Generation',
				'description' => 'Type a scenario in plain English. AI builds the test for you.',
			),
			array(
				'icon'        => 'wrench',
				'title'       => 'Smart Test Maintenance',
				'description' => 'AI flags old, risky, or repeat tests for you.',
			),
			array(
				'icon'        => 'microscope',
				'title'       => 'Visual AI Testing',
				'description' => 'AI spots layout bugs and visual glitches fast.',
			),
			array(
				'icon'        => 'filter-check',
				'title'       => 'Failure Insights',
				'description' => 'When a test fails, AI tells you why.',
			),
		),
	);
}

/**
 * Industries + ERP solutions for homepage tabs.
 *
 * @return array{eyebrow:string,title:string,intro:string,groups:array<string,array{label:string,items:array<int,array{label:string,href:string,icon:string}>}>}
 */
function testro_get_industries() {
	return array(
		'title'    => 'Solutions by Industry',
		'headline' => 'Built for Your Industry',
		'groups'   => array(
			'industry' => array(
				'label' => 'By Industry',
				'items' => array(
					array(
						'label'       => 'E-commerce & Retail',
						'description' => 'Test checkout and payments, even under heavy load.',
						'href'        => testro_nav_url( 'retail-ecommerce' ),
						'icon'        => 'retail',
					),
					array(
						'label'       => 'Banking & Finance',
						'description' => 'Run safe, secure tests for strict systems.',
						'href'        => testro_nav_url( 'banking-finance' ),
						'icon'        => 'bank',
					),
					array(
						'label'       => 'Healthcare',
						'description' => 'Test patient portals. Meet every rule, every time.',
						'href'        => testro_nav_url( 'healthcare' ),
						'icon'        => 'health',
					),
					array(
						'label'       => 'SaaS & Technology',
						'description' => 'Keep up with fast product launches.',
						'href'        => testro_nav_url( 'use-cases' ),
						'icon'        => 'spark',
					),
					array(
						'label'       => 'Enterprise IT',
						'description' => 'Manage testing across every team, at scale.',
						'href'        => testro_nav_url( 'use-cases' ),
						'icon'        => 'erp',
					),
				),
			),
		),
	);
}

/**
 * Homepage benefits / KPI outcomes.
 *
 * @return array{eyebrow:string,title:string,intro:string,items:array<int,array{icon:string,title:string,description:string,metric?:string}>}
 */
function testro_get_benefits() {
	return array(
		'title'    => 'Benefits / Why Choose theTestRo',
		'headline' => 'The Real Impact of theTestRo',
		'items'    => array(
			array(
				'icon'        => 'clock',
				'title'       => 'Cut QA time by up to 50%',
				'description' => 'with fast, AI-driven testing.',
			),
			array(
				'icon'        => 'refresh',
				'title'       => 'Spend less time fixing tests',
				'description' => 'self-healing does it for you.',
			),
			array(
				'icon'        => 'rocket',
				'title'       => 'Ship faster',
				'description' => 'with testing built right into your CI/CD flow.',
			),
			array(
				'icon'        => 'layout-grid',
				'title'       => 'Lower your costs',
				'description' => 'one platform, not five.',
			),
			array(
				'icon'        => 'badge-check',
				'title'       => 'Build more trust',
				'description' => 'with deeper, more reliable test coverage.',
			),
		),
	);
}

/**
 * Homepage case study cards.
 *
 * @return array{eyebrow:string,title:string,intro:string,items:array<int,array{client:string,summary:string,metrics:string[],logo?:string}>}
 */
function testro_get_case_studies() {
	$clients = testro_get_clients();
	$by_name = array();
	foreach ( $clients as $client ) {
		if ( ! empty( $client['name'] ) ) {
			$by_name[ $client['name'] ] = $client;
		}
	}

	$stories = array(
		array(
			'client'  => 'Graduway',
			'summary' => __( 'Unified regression automation across alumni platforms and cut release risk with AI-assisted suites.', 'testro' ),
			'metrics' => array( '3× faster QA cycles', 'Cross-team adoption' ),
		),
		array(
			'client'  => 'Finfolio',
			'summary' => __( 'Secured financial workflows with end-to-end coverage and reliable parallel execution.', 'testro' ),
			'metrics' => array( 'E2E finance coverage', 'Audit-ready reports' ),
		),
		array(
			'client'  => 'Aura',
			'summary' => __( 'Slashed locator maintenance with self-healing automation as the product UI evolved weekly.', 'testro' ),
			'metrics' => array( '60% less maintenance', '99% run stability' ),
		),
		array(
			'client'  => 'Xcally',
			'summary' => __( 'Accelerated release cadence with stable automation and stakeholder-ready reporting.', 'testro' ),
			'metrics' => array( 'Faster releases', 'Unified reporting' ),
		),
	);

	foreach ( $stories as &$story ) {
		$name = $story['client'];
		if ( isset( $by_name[ $name ]['logo'] ) ) {
			$story['logo'] = $by_name[ $name ]['logo'];
		}
	}
	unset( $story );

	return array(
		'eyebrow' => __( 'Customer success', 'testro' ),
		'title'   => __( 'Case studies that prove the outcomes', 'testro' ),
		'intro'   => __( 'Teams across industries use theTestRo to ship faster with fewer flaky failures and clearer quality signals.', 'testro' ),
		'items'   => $stories,
	);
}

/**
 * Homepage resources cards. Prefers latest blog posts when available.
 *
 * @return array{eyebrow:string,title:string,intro:string,items:array<int,array{title:string,description:string,href:string,icon:string,meta?:string}>}
 */
function testro_get_resources() {
	$blog_url = testro_nav_url( 'blog' );

	return array(
		'title'    => 'Latest Blogs & Resources',
		'headline' => 'Learn About AI-Driven Testing',
		'cta'      => array(
			'label' => 'Visit the Blog',
			'href'  => $blog_url,
		),
		'items'    => array(
			array(
				'title'       => 'AI Test Automation: What It Means in 2026',
				'description' => 'Explore how AI is reshaping test creation, maintenance, and release confidence.',
				'href'        => $blog_url,
				'icon'        => 'blog',
				'meta'        => 'Read More',
			),
			array(
				'title'       => 'No-Code vs. Low-Code Testing: Which Fits Your Team?',
				'description' => 'Compare approaches so you can pick the right balance of speed and control.',
				'href'        => $blog_url,
				'icon'        => 'blocks',
				'meta'        => 'Read More',
			),
			array(
				'title'       => 'How to Build a Continuous Testing Strategy',
				'description' => 'Learn how to embed testing into CI/CD and ship with fewer surprises.',
				'href'        => $blog_url,
				'icon'        => 'cicd',
				'meta'        => 'Read More',
			),
		),
	);
}

/**
 * Awards & News hub sections grouped by category.
 *
 * Each section renders only when it contains items. Populate sections here
 * or via the `testro_awards_news_data` filter as real awards and news are added.
 *
 * @return array{
 *   sections: array<int, array{
 *     id: string,
 *     title: string,
 *     intro?: string,
 *     items: array<int, array{
 *       title: string,
 *       description: string,
 *       href: string,
 *       date?: string,
 *       image?: string,
 *       image_alt?: string,
 *       cta_label?: string
 *     }>
 *   }>
 * }
 */
function testro_get_awards_news() {
	$data = array(
		'sections' => array(),
	);

	/**
	 * Filter Awards & News hub section data.
	 *
	 * @param array<string, mixed> $data Hub data with `sections` key.
	 */
	return apply_filters( 'testro_awards_news_data', $data );
}

/**
 * Resolve a legal page URL by slug with fallback.
 *
 * @param string $slug Page slug.
 * @return string
 */
function testro_get_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	if ( $page ) {
		return get_permalink( $page );
	}
	return home_url( '/' . trailingslashit( $slug ) );
}

/**
 * Breadcrumb markup for inner pages.
 *
 * @return void
 */
function testro_the_breadcrumbs() {
	if ( is_front_page() ) {
		return;
	}

	$items = array(
		array(
			'label' => __( 'Home', 'testro' ),
			'url'   => home_url( '/' ),
		),
	);

	if ( is_singular( 'post' ) ) {
		$blog_id = (int) get_option( 'page_for_posts' );
		if ( $blog_id ) {
			$items[] = array(
				'label' => get_the_title( $blog_id ),
				'url'   => get_permalink( $blog_id ),
			);
		}
		$items[] = array(
			'label' => get_the_title(),
			'url'   => '',
		);
	} elseif ( is_page() ) {
		$ancestors = array_reverse( get_post_ancestors( get_the_ID() ) );
		foreach ( $ancestors as $ancestor_id ) {
			$items[] = array(
				'label' => get_the_title( $ancestor_id ),
				'url'   => get_permalink( $ancestor_id ),
			);
		}
		$items[] = array(
			'label' => get_the_title(),
			'url'   => '',
		);
	} elseif ( is_home() ) {
		$blog_id = (int) get_option( 'page_for_posts' );
		$items[] = array(
			'label' => $blog_id ? get_the_title( $blog_id ) : __( 'Blog', 'testro' ),
			'url'   => '',
		);
	} elseif ( is_search() ) {
		$items[] = array(
			'label' => __( 'Search', 'testro' ),
			'url'   => '',
		);
	} elseif ( is_404() ) {
		$items[] = array(
			'label' => __( 'Not Found', 'testro' ),
			'url'   => '',
		);
	} elseif ( is_year() || is_month() || is_day() ) {
		$year = (int) get_query_var( 'year' );
		if ( $year ) {
			$items[] = array(
				'label' => (string) $year,
				'url'   => ( is_month() || is_day() ) ? get_year_link( $year ) : '',
			);
		}
		if ( is_month() || is_day() ) {
			$month = (int) get_query_var( 'monthnum' );
			if ( $year && $month ) {
				$items[] = array(
					'label' => date_i18n( 'F', mktime( 0, 0, 0, $month, 1, $year ) ),
					'url'   => is_day() ? get_month_link( $year, $month ) : '',
				);
			}
		}
		if ( is_day() ) {
			$day = (int) get_query_var( 'day' );
			if ( $day ) {
				$items[] = array(
					'label' => (string) $day,
					'url'   => '',
				);
			}
		}
	} elseif ( is_archive() ) {
		$items[] = array(
			'label' => get_the_archive_title(),
			'url'   => '',
		);
	}

	echo '<nav class="testro-breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumb', 'testro' ) . '"><ol class="testro-breadcrumbs__list">';
	$last = count( $items ) - 1;
	foreach ( $items as $i => $item ) {
		echo '<li class="testro-breadcrumbs__item">';
		if ( $i < $last && ! empty( $item['url'] ) ) {
			printf(
				'<a href="%s">%s</a>',
				esc_url( $item['url'] ),
				esc_html( wp_strip_all_tags( $item['label'] ) )
			);
		} else {
			printf(
				'<span aria-current="page">%s</span>',
				esc_html( wp_strip_all_tags( $item['label'] ) )
			);
		}
		echo '</li>';
	}
	echo '</ol></nav>';
}
