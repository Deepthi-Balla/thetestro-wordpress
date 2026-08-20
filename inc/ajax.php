<?php
/**
 * AJAX form handlers.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Verify nonce and return JSON error on failure.
 */
function testro_ajax_verify_nonce() {
	if ( ! check_ajax_referer( 'testro_nonce', 'nonce', false ) ) {
		wp_send_json_error(
			array( 'message' => __( 'Security check failed. Please refresh and try again.', 'testro' ) ),
			403
		);
	}
}

/**
 * Contact / Talk to Us form handler.
 */
function testro_ajax_contact() {
	testro_ajax_verify_nonce();

	$first_name = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
	$last_name  = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
	$email      = isset( $_POST['work_email'] ) ? sanitize_email( wp_unslash( $_POST['work_email'] ) ) : '';
	$company    = isset( $_POST['company'] ) ? sanitize_text_field( wp_unslash( $_POST['company'] ) ) : '';
	$message    = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $first_name || '' === $last_name || ! is_email( $email ) || '' === $message ) {
		wp_send_json_error(
			array( 'message' => __( 'Please fill in all required fields with a valid email.', 'testro' ) ),
			400
		);
	}

	$to      = 'support@thetestro.com';
	$subject = sprintf( '[theTestRo Contact] %s %s', $first_name, $last_name );
	$body    = "New contact form submission:\n\n";
	$body   .= 'First Name: ' . $first_name . "\n";
	$body   .= 'Last Name: ' . $last_name . "\n";
	$body   .= 'Work Email: ' . $email . "\n";
	$body   .= 'Company: ' . $company . "\n\n";
	$body   .= "Message:\n" . $message . "\n";

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $first_name . ' ' . $last_name . ' <' . $email . '>',
	);

	$sent = wp_mail( $to, $subject, $body, $headers );

	if ( ! $sent ) {
		wp_send_json_error(
			array( 'message' => __( 'Unable to send your message right now. Please try again later.', 'testro' ) ),
			500
		);
	}

	$response = array( 'message' => __( 'Thank you! We will get back to you soon.', 'testro' ) );
	if ( function_exists( 'testro_get_thankyou_url' ) ) {
		$redirect = testro_get_thankyou_url( 'contact' );
		if ( $redirect ) {
			$response['redirect'] = $redirect;
		}
	}
	wp_send_json_success( $response );
}
add_action( 'wp_ajax_testro_contact', 'testro_ajax_contact' );
add_action( 'wp_ajax_nopriv_testro_contact', 'testro_ajax_contact' );

/**
 * Newsletter signup handler.
 */
function testro_ajax_newsletter() {
	testro_ajax_verify_nonce();

	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';

	if ( ! is_email( $email ) ) {
		wp_send_json_error(
			array( 'message' => __( 'Please enter a valid email address.', 'testro' ) ),
			400
		);
	}

	$to      = 'support@thetestro.com';
	$subject = '[theTestRo Newsletter] New subscriber';
	$body    = "New newsletter subscription:\n\nEmail: {$email}\n";
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $email,
	);

	$sent = wp_mail( $to, $subject, $body, $headers );

	if ( ! $sent ) {
		wp_send_json_error(
			array( 'message' => __( 'Unable to subscribe right now. Please try again later.', 'testro' ) ),
			500
		);
	}

	$response = array( 'message' => __( 'You are subscribed. Thank you!', 'testro' ) );
	if ( function_exists( 'testro_get_thankyou_url' ) ) {
		$redirect = testro_get_thankyou_url( 'newsletter' );
		if ( $redirect ) {
			$response['redirect'] = $redirect;
		}
	}
	wp_send_json_success( $response );
}
add_action( 'wp_ajax_testro_newsletter', 'testro_ajax_newsletter' );
add_action( 'wp_ajax_nopriv_testro_newsletter', 'testro_ajax_newsletter' );

/**
 * Contact Sales / demo modal handler.
 */
function testro_ajax_demo() {
	testro_ajax_verify_nonce();

	$first_name   = isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '';
	$last_name    = isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '';
	$organization = isset( $_POST['organization_name'] ) ? sanitize_text_field( wp_unslash( $_POST['organization_name'] ) ) : '';
	$email        = isset( $_POST['work_email'] ) ? sanitize_email( wp_unslash( $_POST['work_email'] ) ) : '';
	$requirements = isset( $_POST['primary_requirements'] ) ? sanitize_textarea_field( wp_unslash( $_POST['primary_requirements'] ) ) : '';

	if (
		'' === $first_name
		|| '' === $last_name
		|| ! is_email( $email )
		|| '' === $organization
		|| '' === $requirements
	) {
		wp_send_json_error(
			array( 'message' => __( 'Please fill in all required fields with a valid work email.', 'testro' ) ),
			400
		);
	}

	$to      = 'support@thetestro.com';
	$subject = sprintf( '[theTestRo Demo Request] %s %s — %s', $first_name, $last_name, $organization );
	$body    = "New Contact Sales / demo request:\n\n";
	$body   .= 'First Name: ' . $first_name . "\n";
	$body   .= 'Last Name: ' . $last_name . "\n";
	$body   .= 'Organization: ' . $organization . "\n";
	$body   .= 'Work Email: ' . $email . "\n\n";
	$body   .= "Primary Requirements:\n" . $requirements . "\n";

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $first_name . ' ' . $last_name . ' <' . $email . '>',
	);

	$sent = wp_mail( $to, $subject, $body, $headers );

	if ( ! $sent ) {
		wp_send_json_error(
			array( 'message' => __( 'Unable to send your request right now. Please try again later.', 'testro' ) ),
			500
		);
	}

	wp_send_json_success(
		array( 'message' => __( 'Thanks! Our team will contact you shortly.', 'testro' ) )
	);
}
add_action( 'wp_ajax_testro_demo', 'testro_ajax_demo' );
add_action( 'wp_ajax_nopriv_testro_demo', 'testro_ajax_demo' );
