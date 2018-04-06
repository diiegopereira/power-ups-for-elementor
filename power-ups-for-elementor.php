<?php
/*
Plugin Name: Power-Ups for Elementor 
Plugin URI: https://elementor.wppug.com/power-ups-for-elementor/
Description: Add new addons, widgets and features for Elementor page builder, like Slider, Team, Testimonials, Post Carousel and Portfolio.
Author: WpPug
Version: 1.0.5
Author URI: https://wppug.com
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'elementor/init', function() {
   \Elementor\Plugin::$instance->elements_manager->add_category( 
   	'elpug-elements',
   	[
   		'title' => __( 'Power-Ups for Elementor', 'elpug' ),
   		'icon' => 'fa fa-plug', //default icon
   	],
   	2 // position
   );
} );

/*
 * Plugin Options
 */
require ('panel.php');

/*
 * Elementor Portfolio
 */
if ( ! class_exists('ELPT_portfolio_Post_Types') ) {

   if ( get_option("elpug_portfolio_switch") == 1) {
      require ('modules/portfolio/elementor-portfolio.php');
   }
	
}
/*
 * Slider
 */
if ( ! function_exists('elpug_slider_module') ) {
   if ( get_option("elpug_slider_switch") == 1) {
	  require ('modules/slider-addon-for-elementor/slider-addon-for-elementor.php');
   }
}
/*
 * Blogroll
 */
if ( ! function_exists('elpug_blogroll_module') ) {
   if ( get_option("elpug_blogroll_switch") == 1) {
	  require ('modules/pug-blogroll/pug-blogroll.php');
   }
}

/*
 * Team
 */
if ( ! function_exists('elpug_team_module') ) {
   if ( get_option("elpug_team_switch") == 1) {
	  require ('modules/team-addon-for-elementor/team-addon-for-elementor.php');
   }
}

/*
 * Testimonials
 */
if ( ! function_exists('elpug_testimonials_module') ) {
   if ( get_option("elpug_testimonials_switch") == 1) {
	  require ('modules/testimonial-addon-for-elementor/testimonial-addon-for-elementor.php');
   }
}
