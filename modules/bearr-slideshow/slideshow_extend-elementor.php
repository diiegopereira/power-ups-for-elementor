<?php
/**
 * Visual Composer - Extend
 *
 *
 * @package PandoExtra
 */
namespace PandoExtra;  //main namespace


use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

// Notice if the Elementor is not active
if ( ! class_exists('Elementor\Widget_Base') ) {
    return;
}


// ======================= Add a custom category for panel widgets
add_action( 'elementor/init', function() {
   \Elementor\Plugin::$instance->elements_manager->add_category( 
    'pando-elements',                 // the name of the category
    [
      'title' => esc_html__( 'PANDO ELEMENTS', 'pando' ),
      'icon' => 'fa fa-header', //default icon
    ],
    1 // position
   );
} );

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
    global $Pando_Slideshow;              //include the widgets here
    require VOID_ELEMENTS_DIR . '/helper/helper.php';
    foreach($Pando_Slideshow as $key => $value){
        require VOID_ELEMENTS_DIR . '/widgets/'.$value;
    }
  }

  /**
   * Register Widget
   *
   * @since 1.0.0
   *
   * @access private
   */
  private function register_widget() {    
  //this is where we create objects for each widget the above  ->use voidgrid\Widgets\Hello_World; is needed

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Pando_Slideshow() );
  }
}

new Plugin();

//======================== Registering the Widget =====================
/**
 * @since 1.0.0
 */

class Pando_Slideshow extends Widget_Base { 

  public function get_name() {
    return 'pando_slideshow';
  }

  public function get_title() {
    return 'pando Slideshow';   // title to show on elementor
  }

  public function get_icon() {
    return 'eicon-posts-grid';    
  }

  public function get_categories() {
    return [ 'pando-elements' ];    // category of the widget
  }

  public function is_reload_preview_required() {
    return true;   
  }

  public function get_script_depends() {    //load the dependent scripts defined in the voidgrid-elements.php
    //return [ 'void-grid-equal-height-js', 'void-grid-custom-js' ];
  }

  /**
   * A list of scripts that the widgets is depended in
   * @since 1.3.0
   **/
  protected function _register_controls() {
    
    //start of a control box
    $this->start_controls_section(
      'section_content',
      [
        'label' => esc_html__( 'Slideshow Settings', 'pando' ),   //section name for controler view
      ]
    );

    $this->add_control(
      'refer_wp_org',
      [
        'raw' => __( 'For more detail about following filters please refer <a href="https://codex.wordpress.org/Template_Tags/get_posts" target="_blank">here</a>', 'pando' ),
        'type' => Controls_Manager::RAW_HTML,
        'classes' => 'elementor-descriptor',
      ]
    );     
      
    $this->end_controls_section();
       

  }


  protected function render() {       //to show on the fontend 
    $settings = $this->get_settings();
       
    echo'<div class="elementor-shortcode">';
            echo do_shortcode('[pando-slider]');    
    echo'</div>';
  }

}

$current_url=esc_url("//".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);