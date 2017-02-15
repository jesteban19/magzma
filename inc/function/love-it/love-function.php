<?php
/**
 * Love Functions
 *
 * Core functions that process loved items.
 *
 * @package     LIP
 * @subpackage  Functions
 * @copyright   Copyright (c) 2013, Pippin Williamson
 * @license     GPL-2.0+
 * @since       1.3.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// check whether a user has loved a post / iamge
function magzma_user_has_loved_post( $user_id, $post_id ) {

	$loved = get_user_option( 'li_user_loves', $user_id );
	if ( is_array( $loved ) && in_array( $post_id, $loved ) ) {
		return true; // user has loved post
	}
	return false; // user has not loved post
}

// increments a love count
function magzma_mark_post_as_loved( $post_id, $user_id ) {

	$love_count = get_post_meta( $post_id, '_li_love_count', true );
	if ( $love_count )
		$love_count = $love_count + 1;
	else
		$love_count = 1;

	if ( update_post_meta( $post_id, '_li_love_count', $love_count ) ) {
		if ( is_user_logged_in() ) {
			magzma_store_loved_id_for_user( $user_id, $post_id );
		}
		return true;
	}

	return false;
}

// adds the loved ID to the users meta so they can't love it again
function magzma_store_loved_id_for_user( $user_id, $post_id ) {
	$loved = get_user_option( 'li_user_loves', $user_id );
	if ( is_array( $loved ) ) {
		$loved[] = $post_id;
	} else {
		$loved = array( $post_id );
	}
	update_user_option( $user_id, 'li_user_loves', $loved );
}

// returns a love count for a post
function magzma_get_love_count( $post_id ) {
	$love_count = get_post_meta( $post_id, '_li_love_count', true );
	if ( $love_count )
		return $love_count;
	return 0;
}

// processes the ajax request
function magzma_process_love() {
	if ( isset( $_POST['item_id'] ) && wp_verify_nonce( $_POST['love_it_nonce'], 'love-it-nonce' ) ) {
		if ( magzma_mark_post_as_loved( $_POST['item_id'], $_POST['user_id'] ) ) {
			$response = array( 'code' => '1' );
		} else {
			$response = array( 'code' => '2' );
		}
		echo json_encode( $response );
	}
	die();
}
add_action( 'wp_ajax_love_it', 'magzma_process_love' );
add_action( 'wp_ajax_nopriv_love_it', 'magzma_process_love' );

/**
 * Scripts
 *
 * Register and localize scripts and styles
 *
 * @package     LIP
 * @subpackage  Functions
 * @copyright   Copyright (c) 2013, Pippin Williamson
 * @license     GPL-2.0+
 * @since       1.3.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

function magzma_front_end_js() {

	global $magzma_options;

	wp_enqueue_script( 'love-it', get_template_directory_uri() . '/js/love-it.js', array( 'jquery' ) );

	if ( ! is_user_logged_in() ) {
		wp_enqueue_script( 'jquery-coookies', get_template_directory_uri() . '/js/cookies.js', array( 'jquery' ) );
	}

	if ( ! empty( $magzma_options['already_loved'] ) ) {
			$already_loved = trim( $magzma_options['already_loved'] );
		} else {
			$already_loved = __( '', 'magzma' );
		}

	wp_localize_script( 'love-it', 'love_it_vars',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'love-it-nonce' ),
			'loved' => $already_loved,
			'already_loved_message' => __( 'You have already loved this item.', 'magzma' ),
			'error_message' => __( 'Sorry, there was a problem processing your request.', 'magzma' ),
			'logged_in' => is_user_logged_in() ? 'true' : 'false'
		)
	);
}
add_action( 'wp_enqueue_scripts', 'magzma_front_end_js' );

function magzma_custom_css() {
	global $magzma_options;
	if ( ! empty( $magzma_options['custom_css'] ) ) {
		echo '<style type="text/css">' . sanitize_text_field( $magzma_options['custom_css'] ) . '</style>';
	}
}
add_action( 'wp_head', 'magzma_custom_css' );