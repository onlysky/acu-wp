<?php
/**
 * Only Sky WP Theme Customizer.
 *
 * @package onlysky_wp_framework
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function onlysky_wp_framework_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	//$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*Custom Customizer Fields*/
/*	
	// Contact Section
	$wp_customize->add_section("contact", array(
		"title" => __("Contact Info", "customizer_contact_sections"),
		"priority" => 30,
	));

	// Telephone Number
	$wp_customize->add_setting("telephone", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"telephone",
		array(
			"label" => __("Site Telephone Number", "customizer_telephone_label"),
			"section" => "contact",
			"settings" => "telephone",
			"type" => "text",
		)
	));

	// Alternative Telephone Number
	$wp_customize->add_setting("telephone_alt", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"telephone_alt",
		array(
			"label" => __("Alternative Telephone Number", "customizer_telephone_alt_label"),
			"section" => "contact",
			"settings" => "telephone_alt",
			"type" => "text",
		)
	));

	// Address
	$wp_customize->add_setting("address", array(
		"default" => "",
		"transport" => "postMessage",
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"address",
		array(
			"label" => __("Address", "customizer_address_label"),
			"section" => "contact",
			"settings" => "address",
			"type" => "textarea",
		)
	));
*/
}
add_action( 'customize_register', 'onlysky_wp_framework_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function onlysky_wp_framework_customize_preview_js() {
	wp_enqueue_script( 'onlysky_wp_framework_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'onlysky_wp_framework_customize_preview_js' );
