<?php
/*
Plugin Name: Power-Ups for Elementor 
Plugin URI: https://wppug.com/creative-portfolio-plugin-demo/
Description: 
Author: WpPug
Version: 0.2
Author URI: http://wppug.com
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*
 * Elementor Portfolio
 */
if ( ! class_exists('ELPT_portfolio_Post_Types') ) {
	require ('modules/portfolio/elementor-portfolio.php');
}
/*
 * Blogroll
 */
require ('modules/pug-blogroll/pug-blogroll.php');
/*
 * Team
 */
require ('modules/team-addon-for-elementor/team-addon-for-elementor.php');
/*
 * Plugin Options
 */
//require ('panel.php');