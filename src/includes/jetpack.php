<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package onlysky_wp_framework
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function onlysky_wp_framework_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'onlysky_wp_framework_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function onlysky_wp_framework_jetpack_setup
add_action( 'after_setup_theme', 'onlysky_wp_framework_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function onlysky_wp_framework_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function onlysky_wp_framework_infinite_scroll_render
