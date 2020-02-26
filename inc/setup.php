<?php
/**
 * Theme basic setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*
 * Sets the post excerpt length to 30 characters.
 */
function base_theme_excerpt_length($length)
{
	return 30;
}
add_filter('excerpt_length', 'base_theme_excerpt_length');

/*
 * Returns a "Continue Reading" link for excerpts
 */
function base_theme_read_more_link()
{
	return '<div class="card-footer"><a class="btn btn-secondary understrap-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More',
	'understrap' ) . '</a></div>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and base_theme_read_more_link().
 */
function base_theme_auto_excerpt_more($more)
{
	return ' &hellip;' . base_theme_read_more_link();
}
add_filter('excerpt_more', 'base_theme_auto_excerpt_more');

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 */
function base_theme_custom_excerpt_more($output)
{
	if (has_excerpt() && !is_attachment()) {
		$output .= base_theme_read_more_link();
	}
	return $output;
}
add_filter('get_the_excerpt', 'base_theme_custom_excerpt_more');