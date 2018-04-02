<?php
namespace PandoExtra;

use PandoExtra\Widgets\Pando_Slideshow;
use PandoExtra\Widgets\Pando_Clients;
use PandoExtra\Widgets\Pando_Blogroll;
use PandoExtra\Widgets\Pando_Team;
use PandoExtra\Widgets\Pando_Testimonials;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );

		add_action( 'elementor/frontend/after_register_scripts', function() {
			//wp_register_script( 'hello-world', plugins_url( '/assets/js/hello-world.js', ELEMENTOR_Pando_Slideshow__FILE__ ), [ 'jquery' ], false, true );
			wp_enqueue_script( 'owl-carousel', plugin_dir_url( __FILE__ ) . '../pando-js/vendor/owl.carousel/owl.carousel.min.js', array('jquery'), '20151215', true );
			wp_enqueue_script( 'bearr-custom-clients-carousel-elementor-js', plugin_dir_url( __FILE__ ) . '../bearr-clients/js/custom-clients-elementor.js', array('jquery'), '20151215', true );
			wp_enqueue_script( 'bearr-custom-slider-elementor-js', plugin_dir_url( __FILE__ ) . '../bearr-slideshow/js/custom-slider-elementor.js', array('jquery'), '20151215', true ); 
			wp_enqueue_script( 'bearr-custom-blogroll-elementor-js', plugin_dir_url( __FILE__ ) . '../bearr-blogroll/js/custom-blogroll-elementor.js', array('jquery'), '20151215', true );
			wp_enqueue_script( 'bearr-custom-team-elementor-js', plugin_dir_url( __FILE__ ) . '../bearr-team/js/custom-team-elementor.js', array('jquery'), '20151215', true ); 
			wp_enqueue_script( 'bearr-custom-testimonials-elementor-js', plugin_dir_url( __FILE__ ) . '../pando-testimonials/js/custom-testimonials-elementor.js', array('jquery'), '20151215', true ); 				
		} );
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}

	/**
	 * Includes
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function includes() {
		require __DIR__ . '/widgets/pando-slideshow.php';
		require __DIR__ . '/widgets/pando-clients.php';
		require __DIR__ . '/widgets/pando-blogroll.php';
		require __DIR__ . '/widgets/pando-team.php';
		require __DIR__ . '/widgets/pando-testimonials.php';
	}

	/**
	 * Register Widget
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Pando_Slideshow() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Pando_Clients() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Pando_Blogroll() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Pando_Team() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Pando_Testimonials() );
	}
}

new Plugin();