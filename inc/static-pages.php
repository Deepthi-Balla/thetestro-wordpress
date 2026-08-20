<?php
/**
 * Static / marketing pages registry and seeder (flat production permalinks).
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registry of non-product marketing pages keyed by production slug.
 *
 * @return array<string, array<string, mixed>>
 */
function testro_get_static_pages() {
	$cta = function_exists( 'testro_product_default_actions' ) ? testro_product_default_actions() : array();

	$stub = function ( $title, $subtitle, $eyebrow = '' ) use ( $cta ) {
		return array(
			'hero' => array(
				'eyebrow'  => $eyebrow ? $eyebrow : __( 'theTestRo', 'testro' ),
				'title'    => $title,
				'subtitle' => $subtitle,
				'actions'  => $cta,
			),
		);
	};

	return array(
		'pricing' => array(
			'title'    => __( 'Pricing', 'testro' ),
			'template' => 'page-templates/template-pricing.php',
			'seo'      => array(
				'title'       => __( 'Test Automation Platform Pricing & Plans for Every Team', 'testro' ),
				'description' => __( 'Explore flexible test automation pricing plans for teams of every size. Scale AI-powered testing with enterprise features, flexible plans, and expert support.', 'testro' ),
			),
			'faqs'     => 'pricing',
			'stub'     => false,
		),
		'contact-us' => array(
			'title'    => __( 'Contact Us', 'testro' ),
			'template' => 'page-templates/template-contact.php',
			'seo'      => array(
				'title'       => __( 'Contact Test Automation Experts | Book a Demo Today', 'testro' ),
				'description' => __( 'Contact our test automation experts to schedule a personalized demo, discuss your QA goals, explore AI-powered testing, and accelerate software delivery.', 'testro' ),
			),
			'stub'     => false,
		),
		'case-studies' => array(
			'title'    => __( 'Case Studies', 'testro' ),
			'template' => 'page-templates/template-case-studies.php',
			'seo'      => array(
				'title'       => __( 'Test Automation Case Studies & Customer Success Stories', 'testro' ),
				'description' => __( 'Explore test automation case studies showcasing how teams accelerated releases, improved software quality, reduced QA effort, and achieved measurable business results.', 'testro' ),
			),
			'stub'     => false,
		),
		'why-choose-thetestro' => array(
			'title'    => __( 'Why Choose theTestRo', 'testro' ),
			'template' => 'page-templates/template-why-testro.php',
			'seo'      => array(
				'title'       => __( 'Why Choose theTestRo for AI Test Automation', 'testro' ),
				'description' => __( 'Discover why teams choose theTestRo for AI-powered test automation. Accelerate testing with no-code automation, self-healing tests, and enterprise scalability.', 'testro' ),
			),
			'stub'     => false,
		),
		'webinars' => array(
			'title'    => __( 'Webinars', 'testro' ),
			'template' => 'page-templates/template-webinars.php',
			'seo'      => array(
				'title'       => __( 'Webinars | theTestRo', 'testro' ),
				'description' => __( 'Join live and on-demand test automation webinars to learn AI testing, QA best practices, DevOps strategies, product updates, and expert testing insights.', 'testro' ),
			),
			'stub'     => false,
		),
		'partners' => array(
			'title'    => __( 'Partners', 'testro' ),
			'template' => 'page-templates/template-partners.php',
			'seo'      => array(
				'title'       => __( 'AI Test Automation Partner Program | Grow with theTestRo', 'testro' ),
				'description' => __( 'Join the theTestRo Partner Program to deliver AI-powered test automation solutions, expand your services, accelerate customer success, and grow your business.', 'testro' ),
			),
			'faqs'     => 'partners',
			'stub'     => false,
		),
		'awards-news' => array(
			'title'    => __( 'Awards & News', 'testro' ),
			'template' => 'page-templates/template-awards-news.php',
			'seo'      => array(
				'title'       => __( 'Test Automation Awards, News & Product Updates', 'testro' ),
				'description' => __( "Explore the latest awards, company news, product announcements, press releases, and industry recognition from theTestRo's AI test automation platform.", 'testro' ),
			),
			'stub'     => false,
		),
		'compare-test-automation-tools' => array(
			'title'    => __( 'Compare Test Automation Tools', 'testro' ),
			'template' => 'page-templates/template-compare-tools.php',
			'seo'      => array(
				'title'       => __( 'Compare Test Automation Tools & Find the Best Platform', 'testro' ),
				'description' => __( 'Compare theTestRo with leading test automation platforms. Evaluate AI capabilities, automation features, integrations, and pricing to choose the right solution.', 'testro' ),
			),
			'stub'     => false,
		),
		'use-cases' => array(
			'title'    => __( 'Software Testing Use Cases', 'testro' ),
			'template' => 'page-templates/template-use-cases.php',
			'seo'      => array(
				'title'       => __( 'Software Testing Use Cases | AI Test Automation Hub | theTestRo', 'testro' ),
				'description' => __( 'Explore software testing use cases for modern QA teams. Automate regression, functional, integration, end-to-end, frontend, and backend testing with AI-powered test automation from theTestRo.', 'testro' ),
			),
			'stub'     => false,
		),
	);
}

/**
 * Resolve a static page definition by slug.
 *
 * @param string $slug Optional slug. Defaults to queried page.
 * @return array<string, mixed>|null
 */
function testro_get_static_page( $slug = '' ) {
	$pages = testro_get_static_pages();

	if ( '' === $slug ) {
		if ( ! is_page() ) {
			return null;
		}
		$page = get_queried_object();
		$slug = ( $page instanceof WP_Post ) ? $page->post_name : '';
	}

	return isset( $pages[ $slug ] ) ? $pages[ $slug ] : null;
}

/**
 * Seed missing static marketing pages at flat production slugs.
 */
function testro_maybe_seed_static_pages() {
	if ( (int) get_option( 'testro_static_pages_version', 0 ) >= 6 ) {
		return;
	}

	foreach ( testro_get_static_pages() as $slug => $page ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			$page_id = (int) $existing->ID;
		} else {
			$page_id = wp_insert_post(
				array(
					'post_title'  => isset( $page['title'] ) ? $page['title'] : $slug,
					'post_name'   => $slug,
					'post_status' => 'publish',
					'post_type'   => 'page',
					'post_author' => 1,
				),
				true
			);
			if ( is_wp_error( $page_id ) ) {
				continue;
			}
		}

		if ( ! empty( $page['template'] ) ) {
			update_post_meta( $page_id, '_wp_page_template', $page['template'] );
		}

		$is_stub = ! isset( $page['stub'] ) || $page['stub'];
		if ( $is_stub ) {
			update_post_meta( $page_id, '_testro_page_stub', 1 );
		} else {
			delete_post_meta( $page_id, '_testro_page_stub' );
		}

		if ( in_array( $slug, array( 'use-cases', 'compare-test-automation-tools', 'webinars', 'case-studies' ), true ) && ! empty( $page['title'] ) ) {
			wp_update_post(
				array(
					'ID'         => $page_id,
					'post_title' => $page['title'],
				)
			);
		}
	}

	update_option( 'testro_static_pages_version', 6, true );
}
add_action( 'init', 'testro_maybe_seed_static_pages', 25 );
