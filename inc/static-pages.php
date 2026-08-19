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
				'title'       => __( 'Pricing | Simple, Scalable Plans | theTestRo', 'testro' ),
				'description' => __( 'Simple, scalable pricing for enterprise test automation. Compare Starter, Professional, and Enterprise plans—or get custom pricing for your team.', 'testro' ),
			),
			'stub'     => false,
		),
		'contact-us' => array(
			'title'    => __( 'Contact Us', 'testro' ),
			'template' => 'page-templates/template-contact.php',
			'seo'      => array(
				'title'       => __( 'Contact Us | theTestRo', 'testro' ),
				'description' => __( 'Get in touch with theTestRo. Request a demo or talk to our team about AI test automation.', 'testro' ),
			),
			'stub'     => false,
		),
		'case-studies' => array(
			'title'    => __( 'Case Studies', 'testro' ),
			'template' => 'page-templates/template-case-studies.php',
			'seo'      => array(
				'title'       => __( 'theTestRo Case Studies | Customer Success Stories', 'testro' ),
				'description' => __( 'Explore theTestRo case studies and see how QA and engineering teams accelerate releases with AI-powered, no-code test automation.', 'testro' ),
			),
			'stub'     => false,
		),
		'why-choose-thetestro' => array(
			'title'    => __( 'Why Choose theTestRo', 'testro' ),
			'template' => 'page-templates/template-why-testro.php',
			'seo'      => array(
				'title'       => __( 'Why Choose theTestRo | AI Test Automation Platform', 'testro' ),
				'description' => __( 'See why teams choose theTestRo—AI-powered, no-code test automation with self-healing, unified workflows, and enterprise-ready scale.', 'testro' ),
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
				'title'       => __( 'Partners | Become a theTestRo Partner', 'testro' ),
				'description' => __( 'Become a theTestRo partner. Grow your business by delivering AI-powered test automation solutions to enterprise customers.', 'testro' ),
			),
			'stub'     => false,
		),
		'awards-news' => array_merge(
			array(
				'title'    => __( 'Awards & News', 'testro' ),
				'template' => 'page-templates/template-stub.php',
				'seo'      => array(
					'title'       => __( 'Awards & News | theTestRo', 'testro' ),
					'description' => __( 'Latest awards, recognition, and news from theTestRo.', 'testro' ),
				),
				'stub'     => true,
			),
			$stub(
				__( 'Awards & News', 'testro' ),
				__( 'Recognition and updates from the theTestRo team.', 'testro' ),
				__( 'Why theTestRo', 'testro' )
			)
		),
		'compare-test-automation-tools' => array(
			'title'    => __( 'Compare Test Automation Tools', 'testro' ),
			'template' => 'page-templates/template-compare-tools.php',
			'seo'      => array(
				'title'       => __( 'theTestRo vs Test Automation Tools | Compare Alternatives', 'testro' ),
				'description' => __( 'Compare theTestRo with leading test automation tools and Selenium alternatives. See why teams choose AI-powered, no-code enterprise test automation.', 'testro' ),
			),
			'stub'     => false,
			'faqs'     => 'compare-tools',
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
	if ( (int) get_option( 'testro_static_pages_version', 0 ) >= 5 ) {
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

	update_option( 'testro_static_pages_version', 5, true );
}
add_action( 'init', 'testro_maybe_seed_static_pages', 25 );
