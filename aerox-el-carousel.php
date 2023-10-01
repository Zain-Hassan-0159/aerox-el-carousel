<?php

/**
 * Plugin Name:       Aerox Carousel
 * Description:       Aerox Carousel Widget is created by Zain Hassan.
 * Version:           1.0.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       aerox-el-carousel
*/

if(!defined('ABSPATH')){
exit;
}

function aerox_el_category( $elements_manager ) {

	$elements_manager->add_category(
		'aerox-el-widgets',
		[
			'title' => esc_html__( 'Aerox Widgets', 'aerox-el-carousel' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'aerox_el_category' );


function register_aerox_custom_el_widgets( $widgets_manager ) {
	require_once( __DIR__ . '/inc/widget.php' );
	$widgets_manager->register( new \Aerox_El_Carousel );

}
add_action( 'elementor/widgets/register', 'register_aerox_custom_el_widgets' );

function aerox_register_dependencies_scripts() {

	/* Scripts */
	wp_register_script( 'slick-js-min', plugins_url( 'inc/assets/js/slick.min.js', __FILE__ ));
		

	/* Styles */
	wp_register_style( 'slick-css', plugins_url( 'inc/assets/css/slick.css', __FILE__ ) );

}
add_action( 'wp_enqueue_scripts', 'aerox_register_dependencies_scripts' );

