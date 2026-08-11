<?php
/**
 * Theme Customizer options.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function testro_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'testro_contact',
		array(
			'title'    => __( 'TestRo Contact & Social', 'testro' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'testro_phone',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'testro_phone',
		array(
			'label'   => __( 'Phone', 'testro' ),
			'section' => 'testro_contact',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'testro_email',
		array(
			'default'           => 'support@thetestro.com',
			'sanitize_callback' => 'sanitize_email',
		)
	);
	$wp_customize->add_control(
		'testro_email',
		array(
			'label'   => __( 'Email', 'testro' ),
			'section' => 'testro_contact',
			'type'    => 'email',
		)
	);

	$wp_customize->add_setting(
		'testro_linkedin',
		array(
			'default'           => 'https://www.linkedin.com/company/thetestro/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'testro_linkedin',
		array(
			'label'   => __( 'LinkedIn URL', 'testro' ),
			'section' => 'testro_contact',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'testro_youtube',
		array(
			'default'           => 'https://www.youtube.com/@thetestro',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'testro_youtube',
		array(
			'label'   => __( 'YouTube URL', 'testro' ),
			'section' => 'testro_contact',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'testro_banner_text',
		array(
			'default'           => "Boost Testing Efficiency with theTestRo's Smart Automation",
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'testro_banner_text',
		array(
			'label'   => __( 'Top Banner Text', 'testro' ),
			'section' => 'testro_contact',
			'type'    => 'text',
		)
	);

	$wp_customize->add_section(
		'testro_seo',
		array(
			'title'       => __( 'TestRo SEO & Analytics', 'testro' ),
			'description' => __( 'Paste real production IDs below. Leave blank to omit scripts/meta. Web Vitals are reported to GA/GTM when an ID is set.', 'testro' ),
			'priority'    => 35,
		)
	);

	$wp_customize->add_setting(
		'testro_meta_keywords',
		array(
			'default'           => 'test automation, Intelligence testing, no-code testing, Playwright, API testing, self-healing locators, theTestRo',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'testro_meta_keywords',
		array(
			'label'       => __( 'Meta keywords', 'testro' ),
			'description' => __( 'Comma-separated. Google ignores these; other crawlers may still read them. Leave blank to omit.', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'testro_twitter',
		array(
			'default'           => '@testro_ai',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'testro_twitter',
		array(
			'label'       => __( 'Twitter / X handle', 'testro' ),
			'description' => __( 'Used for twitter:site (e.g. @testro_ai).', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'testro_theme_color',
		array(
			'default'           => '#003e81',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		'testro_theme_color',
		array(
			'label'   => __( 'Theme color', 'testro' ),
			'section' => 'testro_seo',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'testro_ga_id',
		array(
			'default'           => 'G-B1SLQ5SRNV',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'testro_ga_id',
		array(
			'label'       => __( 'Google Analytics Measurement ID', 'testro' ),
			'description' => __( 'Required for GA4 + Web Vitals events (e.g. G-XXXXXXXXXX). Ignored when GTM Container ID is set — configure GA inside GTM instead.', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'testro_gtm_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'testro_gtm_id',
		array(
			'label'       => __( 'Google Tag Manager Container ID', 'testro' ),
			'description' => __( 'e.g. GTM-XXXXXXX. When set, replaces direct gtag output. Web Vitals push to dataLayer.', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'testro_meta_pixel_id',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'testro_meta_pixel_id',
		array(
			'label'       => __( 'Meta Pixel ID', 'testro' ),
			'description' => __( 'Optional Facebook/Meta Pixel ID. Leave empty to disable.', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'testro_gsc_verification',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'testro_gsc_verification',
		array(
			'label'       => __( 'Google Search Console verification', 'testro' ),
			'description' => __( 'Content value from the google-site-verification meta tag.', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'testro_bing_verification',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'testro_bing_verification',
		array(
			'label'       => __( 'Bing Webmaster verification', 'testro' ),
			'description' => __( 'Content value from the msvalidate.01 meta tag.', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'testro_form_redirects',
		array(
			'default'           => true,
			'sanitize_callback' => 'testro_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'testro_form_redirects',
		array(
			'label'       => __( 'Redirect forms to thank-you pages', 'testro' ),
			'description' => __( 'After successful AJAX submit, send users to dedicated thank-you URLs (better for conversion tracking).', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'testro_thankyou_contact',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'testro_thankyou_contact',
		array(
			'label'       => __( 'Contact thank-you URL', 'testro' ),
			'description' => __( 'Optional override. Defaults to /thank-you-contact/ when that page exists.', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'url',
		)
	);

	$wp_customize->add_setting(
		'testro_thankyou_demo',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'testro_thankyou_demo',
		array(
			'label'       => __( 'Demo thank-you URL', 'testro' ),
			'description' => __( 'Optional override. Defaults to /thank-you-demo/ when that page exists.', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'url',
		)
	);

	$wp_customize->add_setting(
		'testro_thankyou_newsletter',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'testro_thankyou_newsletter',
		array(
			'label'       => __( 'Newsletter thank-you URL', 'testro' ),
			'description' => __( 'Optional override. Defaults to /thank-you-newsletter/ when that page exists.', 'testro' ),
			'section'     => 'testro_seo',
			'type'        => 'url',
		)
	);
}
add_action( 'customize_register', 'testro_customize_register' );

/**
 * Sanitize checkbox theme mod.
 *
 * @param mixed $value Raw value.
 * @return bool
 */
function testro_sanitize_checkbox( $value ) {
	return (bool) $value;
}

/**
 * Get a theme mod with fallback.
 *
 * @param string $key     Setting key without prefix.
 * @param mixed  $default Default value.
 * @return mixed
 */
function testro_get_option( $key, $default = '' ) {
	return get_theme_mod( 'testro_' . $key, $default );
}
