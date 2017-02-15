<?php
/**
 * Display Functions
 *
 * Display the Love It links on the front end
 *
 * @package     LIP
 * @subpackage  Functions
 * @copyright   Copyright (c) 2013, Pippin Williamson
 * @license     GPL-2.0+
 * @since       1.3.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// checks to see if Love It links should be shown automatically
function magzma_show_links() {
	global $magzma_options, $post;
	if ( ! isset( $magzma_options['show_links'] ) || empty( $magzma_options['post_types'] ) )
		return;

	if ( in_array( get_post_type( $post ), $magzma_options['post_types'] ) ) {
		add_filter( 'the_content', 'magzma_display_love_link' );
	}
}
add_action( 'template_redirect', 'magzma_show_links' );

// adds the Love It link and count to post/page content
function magzma_display_love_link( $content ) {

	global $magzma_options, $post;

	// only show the link when user is logged in and on a singular page
	if ( is_singular() ) {

		// setup the Love It link text
		if ( ! empty( $magzma_options['love_it_text'] ) ) {
			$link_text = $magzma_options['love_it_text'];
		} else {
			$link_text = __( 'Love It', 'magzma' );
		}

		// setup the Already Loved This text
		if ( ! empty( $magzma_options['already_loved'] ) ) {
			$already_loved = $magzma_options['already_loved'];
		} else {
			$already_loved = __( 'You have loved this', 'magzma' );
		}

		$link = magzma_love_it_link( $post->ID, $link_text, $already_loved, false );

		// append our "Love It" link to the item content.
		if ( ! empty( $magzma_options['post_position'] ) && 'top' == $magzma_options['post_position'] ) {
			$content = $link . $content;
		} else {
			$content = $content . $link;
		}
	}
	return $content;
}

function magzma_love_it_link( $post_id = null, $echo = true ) {

	global $user_ID, $post;
	$already_loved = __( '', 'magzma' );
	$link_text = __( '', 'magzma' );

	if ( empty( $post_id ) ) {
		$post_id = get_the_ID();
	}

	// retrieve the total love count for this item
	$love_count = magzma_get_love_count( $post_id );

	ob_start();

	// our wrapper DIV
	echo '<div class="love-it-wrapper">';

	// only show the Love It link if the user has NOT previously loved this item
	if ( ! magzma_user_has_loved_post( $user_ID, $post_id ) ) {
		echo '<a href="#" class="love-it" data-post-id="' . $post_id . '" data-user-id="' .  $user_ID . '">' . $link_text . '</a> <span class="love-count">' . $love_count . '</span>';
	} else {
		// show a message to users who have already loved this item
		echo '<span class="loved"><span class="loved-text has-been-loved">' . $already_loved . '</span> <span class="love-count">' . $love_count . '</span></span>';
	}

	// close our wrapper DIV
	echo '</div>';

	if ( $echo )
		echo apply_filters( 'magzma_links', ob_get_clean() );
	else
		return apply_filters( 'magzma_links', ob_get_clean() );
}