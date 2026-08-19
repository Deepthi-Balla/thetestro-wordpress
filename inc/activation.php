<?php
/**
 * Theme activation: seed pages and reading settings.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Create core pages and set front page display.
 */
function testro_seed_pages() {
	$pages = array(
		'home'    => array(
			'title'   => 'Home',
			'slug'    => 'home',
			'content' => '',
		),
		'terms'   => array(
			'title'   => 'Terms & Conditions',
			'slug'    => 'terms-conditions',
			'content' => '<!-- wp:paragraph --><p>Terms &amp; Conditions content goes here.</p><!-- /wp:paragraph -->',
			'template'=> 'page-templates/template-legal.php',
		),
		'privacy' => array(
			'title'   => 'Privacy Notice',
			'slug'    => 'privacy-notice',
			'content' => '<!-- wp:paragraph --><p>Privacy Notice content goes here.</p><!-- /wp:paragraph -->',
			'template'=> 'page-templates/template-legal.php',
		),
		'blog'    => array(
			'title'   => 'Blog',
			'slug'    => 'blog',
			'content' => '',
		),
		'ty_contact' => array(
			'title'    => 'Thank You',
			'slug'     => 'thank-you-contact',
			'content'  => '<!-- wp:paragraph --><p>Thanks for reaching out. Our team will get back to you shortly.</p><!-- /wp:paragraph -->',
			'template' => 'page-templates/template-thank-you.php',
		),
		'ty_demo' => array(
			'title'    => 'Demo Request Received',
			'slug'     => 'thank-you-demo',
			'content'  => '<!-- wp:paragraph --><p>Thanks for requesting a demo. We will contact you soon to schedule a walkthrough.</p><!-- /wp:paragraph -->',
			'template' => 'page-templates/template-thank-you.php',
		),
		'ty_newsletter' => array(
			'title'    => 'You Are Subscribed',
			'slug'     => 'thank-you-newsletter',
			'content'  => '<!-- wp:paragraph --><p>Thanks for subscribing. Watch your inbox for product updates and tips.</p><!-- /wp:paragraph -->',
			'template' => 'page-templates/template-thank-you.php',
		),
	);

	$created = array();

	foreach ( $pages as $key => $page ) {
		$existing = get_page_by_path( $page['slug'] );

		if ( $existing ) {
			$created[ $key ] = (int) $existing->ID;
			continue;
		}

		$page_id = wp_insert_post(
			array(
				'post_title'   => $page['title'],
				'post_name'    => $page['slug'],
				'post_content' => isset( $page['content'] ) ? $page['content'] : '',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_author'  => 1,
			),
			true
		);

		if ( ! is_wp_error( $page_id ) ) {
			$created[ $key ] = (int) $page_id;
			if ( ! empty( $page['template'] ) ) {
				update_post_meta( $page_id, '_wp_page_template', $page['template'] );
			}
		}
	}

	if ( ! empty( $created['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $created['home'] );
	}

	if ( ! empty( $created['blog'] ) ) {
		update_option( 'page_for_posts', $created['blog'] );
	}

	flush_rewrite_rules();

	return $created;
}
add_action( 'after_switch_theme', 'testro_seed_pages' );

/**
 * Ensure thank-you pages exist on already-activated installs.
 */
function testro_maybe_seed_thankyou_pages() {
	if ( get_option( 'testro_thankyou_pages_seeded' ) ) {
		return;
	}

	$slugs = array(
		'thank-you-contact'    => array(
			'title'   => 'Thank You',
			'content' => '<!-- wp:paragraph --><p>Thanks for reaching out. Our team will get back to you shortly.</p><!-- /wp:paragraph -->',
		),
		'thank-you-demo'       => array(
			'title'   => 'Demo Request Received',
			'content' => '<!-- wp:paragraph --><p>Thanks for requesting a demo. We will contact you soon to schedule a walkthrough.</p><!-- /wp:paragraph -->',
		),
		'thank-you-newsletter' => array(
			'title'   => 'You Are Subscribed',
			'content' => '<!-- wp:paragraph --><p>Thanks for subscribing. Watch your inbox for product updates and tips.</p><!-- /wp:paragraph -->',
		),
	);

	foreach ( $slugs as $slug => $page ) {
		if ( get_page_by_path( $slug ) ) {
			continue;
		}
		$page_id = wp_insert_post(
			array(
				'post_title'   => $page['title'],
				'post_name'    => $slug,
				'post_content' => $page['content'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_author'  => 1,
			),
			true
		);
		if ( ! is_wp_error( $page_id ) ) {
			update_post_meta( $page_id, '_wp_page_template', 'page-templates/template-thank-you.php' );
		}
	}

	update_option( 'testro_thankyou_pages_seeded', 1, true );
}
add_action( 'init', 'testro_maybe_seed_thankyou_pages', 20 );

/**
 * Ensure every registered product page exists at its flat production slug
 * and uses the correct page template.
 */
function testro_maybe_seed_product_pages() {
	if ( ! function_exists( 'testro_get_product_pages' ) ) {
		return;
	}

	$version = (int) get_option( 'testro_product_pages_seeded', 0 );
	if ( $version >= 32 ) {
		return;
	}

	foreach ( testro_get_product_pages() as $slug => $product ) {
		$existing = get_page_by_path( $slug );

		if ( ! $existing && 'test-execution' === $slug ) {
			$existing = get_page_by_path( 'test-lab' );
			if ( $existing ) {
				wp_update_post(
					array(
						'ID'        => (int) $existing->ID,
						'post_name' => 'test-execution',
					)
				);
				$existing = get_post( $existing->ID );
			}
		}

		if ( ! $existing ) {
			$page_title = ! empty( $product['title'] )
				? $product['title']
				: ( isset( $product['hero']['title'] ) ? $product['hero']['title'] : $slug );
			$page_id = wp_insert_post(
				array(
					'post_title'  => $page_title,
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
		} else {
			$page_id = (int) $existing->ID;
		}

		$template = get_post_meta( $page_id, '_wp_page_template', true );
		$desired  = 'page-templates/template-product.php';

		if ( 'no-code-test-automation' === $slug && locate_template( 'page-templates/template-no-code-test-automation.php' ) ) {
			$desired = 'page-templates/template-no-code-test-automation.php';
		} elseif ( 'ai-test-automation' === $slug && locate_template( 'page-templates/template-ai-test-automation.php' ) ) {
			$desired = 'page-templates/template-ai-test-automation.php';
		} elseif ( 'automated-web-application-testing' === $slug && locate_template( 'page-templates/template-web-testing.php' ) ) {
			$desired = 'page-templates/template-web-testing.php';
		} elseif ( 'automated-api-testing' === $slug && locate_template( 'page-templates/template-api-testing.php' ) ) {
			$desired = 'page-templates/template-api-testing.php';
		} elseif ( 'automated-cross-browser-testing-tool' === $slug && locate_template( 'page-templates/template-cross-browser-testing.php' ) ) {
			$desired = 'page-templates/template-cross-browser-testing.php';
		} elseif ( 'test-management-software' === $slug && locate_template( 'page-templates/template-ai-test-management.php' ) ) {
			$desired = 'page-templates/template-ai-test-management.php';
		} elseif ( 'self-healing-test-automation-tool' === $slug && locate_template( 'page-templates/template-self-healing-automation.php' ) ) {
			$desired = 'page-templates/template-self-healing-automation.php';
		} elseif ( 'test-development' === $slug && locate_template( 'page-templates/template-test-development.php' ) ) {
			$desired = 'page-templates/template-test-development.php';
		} elseif ( 'test-execution' === $slug && locate_template( 'page-templates/template-test-execution.php' ) ) {
			$desired = 'page-templates/template-test-execution.php';
		} elseif ( 'ci-cd-integration' === $slug && locate_template( 'page-templates/template-ci-cd-integration.php' ) ) {
			$desired = 'page-templates/template-ci-cd-integration.php';
		} elseif ( 'playwright-test-automation' === $slug && locate_template( 'page-templates/template-playwright-export.php' ) ) {
			$desired = 'page-templates/template-playwright-export.php';
		} elseif ( 'reporting-analytics' === $slug && locate_template( 'page-templates/template-reports-analytics.php' ) ) {
			$desired = 'page-templates/template-reports-analytics.php';
		} elseif ( 'regression-test-automation' === $slug && locate_template( 'page-templates/template-regression-test-automation.php' ) ) {
			$desired = 'page-templates/template-regression-test-automation.php';
		} elseif ( 'ai-automated-sanity-testing' === $slug && locate_template( 'page-templates/template-ai-automated-sanity-testing.php' ) ) {
			$desired = 'page-templates/template-ai-automated-sanity-testing.php';
		} elseif ( 'ai-powered-integration-testing' === $slug && locate_template( 'page-templates/template-ai-powered-integration-testing.php' ) ) {
			$desired = 'page-templates/template-ai-powered-integration-testing.php';
		} elseif ( 'automated-functional-testing' === $slug && locate_template( 'page-templates/template-automated-functional-testing.php' ) ) {
			$desired = 'page-templates/template-automated-functional-testing.php';
		} elseif ( 'end-to-end-testing' === $slug && locate_template( 'page-templates/template-end-to-end-testing.php' ) ) {
			$desired = 'page-templates/template-end-to-end-testing.php';
		} elseif ( 'use-cases' === $slug && locate_template( 'page-templates/template-use-cases.php' ) ) {
			$desired = 'page-templates/template-use-cases.php';
		} elseif ( 'retail-ecommerce' === $slug && locate_template( 'page-templates/template-retail-ecommerce.php' ) ) {
			$desired = 'page-templates/template-retail-ecommerce.php';
		} elseif ( 'healthcare' === $slug && locate_template( 'page-templates/template-healthcare.php' ) ) {
			$desired = 'page-templates/template-healthcare.php';
		} elseif ( 'banking-finance' === $slug && locate_template( 'page-templates/template-banking-finance.php' ) ) {
			$desired = 'page-templates/template-banking-finance.php';
		} elseif ( 'travel-and-hospitality' === $slug && locate_template( 'page-templates/template-travel-and-hospitality.php' ) ) {
			$desired = 'page-templates/template-travel-and-hospitality.php';
		} elseif ( 'insurance' === $slug && locate_template( 'page-templates/template-insurance.php' ) ) {
			$desired = 'page-templates/template-insurance.php';
		} elseif ( 'microsoft-dynamics-365-test-automation' === $slug && locate_template( 'page-templates/template-microsoft-dynamics-365.php' ) ) {
			$desired = 'page-templates/template-microsoft-dynamics-365.php';
		} elseif ( 'salesforce-test-automation' === $slug && locate_template( 'page-templates/template-salesforce-testing.php' ) ) {
			$desired = 'page-templates/template-salesforce-testing.php';
		} elseif ( 'oracle-testing' === $slug && locate_template( 'page-templates/template-oracle-testing.php' ) ) {
			$desired = 'page-templates/template-oracle-testing.php';
		} elseif ( 'sap-testing' === $slug && locate_template( 'page-templates/template-sap-testing.php' ) ) {
			$desired = 'page-templates/template-sap-testing.php';
		} elseif ( 'workday-testing' === $slug && locate_template( 'page-templates/template-workday-testing.php' ) ) {
			$desired = 'page-templates/template-workday-testing.php';
		} elseif ( 'servicenow-testing' === $slug && locate_template( 'page-templates/template-servicenow-testing.php' ) ) {
			$desired = 'page-templates/template-servicenow-testing.php';
		}

		if ( ! $template || 'default' === $template || ! locate_template( $template ) || $template !== $desired ) {
			update_post_meta( $page_id, '_wp_page_template', $desired );
		}

		if ( 'retail-ecommerce' === $slug || 'healthcare' === $slug || 'banking-finance' === $slug || 'travel-and-hospitality' === $slug || 'insurance' === $slug || 'microsoft-dynamics-365-test-automation' === $slug || 'salesforce-test-automation' === $slug || 'oracle-testing' === $slug || 'sap-testing' === $slug || 'workday-testing' === $slug || 'servicenow-testing' === $slug || 'regression-test-automation' === $slug || 'ai-automated-sanity-testing' === $slug || 'ai-powered-integration-testing' === $slug || 'automated-functional-testing' === $slug || 'end-to-end-testing' === $slug || 'use-cases' === $slug ) {
			delete_post_meta( $page_id, '_testro_page_stub' );
		}
	}

	update_option( 'testro_product_pages_seeded', 32, true );
}
add_action( 'init', 'testro_maybe_seed_product_pages', 20 );
