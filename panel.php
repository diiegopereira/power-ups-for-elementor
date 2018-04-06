<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
   Panel
*/
//Register Settings
function elpug_register_settings(){
	$option_group = 'elpug_powerups';
    register_setting( $option_group, 'elpug_portfolio_switch', $args = array( 'default'      => 1, ) );
	register_setting( $option_group, 'elpug_slider_switch', $args = array( 'default'      => 1, ) );
	register_setting( $option_group, 'elpug_blogroll_switch', $args = array( 'default'      => 1, ) );
	register_setting( $option_group, 'elpug_team_switch', $args = array( 'default'      => 1, ) );
	register_setting( $option_group, 'elpug_testimonials_switch', $args = array( 'default'      => 1, ) );
}
elpug_register_settings();


add_action('admin_menu', 'elpug_setup_menu');
 
function elpug_setup_menu(){

	//Enqueue color picker
	wp_enqueue_style( 'wp-color-picker' );
	//wp_enqueue_script( 'elemenfolio-js', get_template_directory_uri().'/myscript.js', array( 'wp-color-picker','jquery' ), false, true );
	wp_enqueue_script( 'elemenfolio-js', plugin_dir_url( __FILE__ ) .  'js/elemenfolio-admin.js', array( 'wp-color-picker' ), '20151218', true );
	wp_enqueue_style( 'elpug-admin-css', plugin_dir_url( __FILE__ ) . 'css/elpug_admin.css' );

	//Create Admin Page
 	$page_title = 'Power-Ups for Elementor';
    $menu_title = 'Power-Ups for Elementor';
    $capability = 'edit_posts';
    $menu_slug = 'powerups_for_elementor';
    $function = 'elpug_powerups_options_page';
    $icon_url = 'dashicons-layout';
    $position = 99;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

    //Create Settings
    $option_group = 'elpug_powerups';

	// Color Section
	$settings_section = 'elpug_main';
	$page = 'elpug_powerups';
	add_settings_section( $settings_section, __( 'Enable/Disable Modules', 'elpug_powerups' ), 'elpug_settings_modules_callback', $page );
	add_settings_field( 'elpug_portfolio_switch', __('Portolio Module', 'elpug_powerups'), 'elpug_portfolio_switch_callback', $page, 'elpug_main' );
	add_settings_field( 'elpug_slider_switch', __('Slider Module', 'elpug_powerups'), 'elpug_slider_switch_callback', $page, 'elpug_main' );
	add_settings_field( 'elpug_blogroll_switch', __('Post Carousel Module', 'elpug_powerups'), 'elpug_blogroll_switch_callback', $page, 'elpug_main' );
	add_settings_field( 'elpug_team_switch', __('Team Module', 'elpug_powerups'), 'elpug_team_switch_callback', $page, 'elpug_main' );
	add_settings_field( 'elpug_testimonials_switch', __('Testimonials Module', 'elpug_powerups'), 'elpug_testimonials_switch_callback', $page, 'elpug_main' );

	//Shortcode Section
	//add_settings_section( 'elpug_howto', __( 'How to display the portfolio grid', 'elpug_powerups' ), 'elpug_shortcode_callback', $page );
}

// ================================ Fields Callback ===============================
//Section Callback 
function elpug_settings_modules_callback(){

	echo esc_html('In this section you can disable modules that you are not using or that you do not need to improve the performance of your website.', 'elpug');

}	

//Portfolio
function elpug_portfolio_switch_callback(){
	?>
	<label class="elpug-admin-switch">
		<input type="checkbox" name="elpug_portfolio_switch" value="1"  <?php checked(1, get_option('elpug_portfolio_switch'), true); ?> >
		<span class="elpug-admin-slider round"></span>
	</label>
	
	<?php
}	

//Slider
function elpug_slider_switch_callback(){
	
	?>

	<label class="elpug-admin-switch">
		<input type="checkbox" name="elpug_slider_switch" value="1"  <?php checked(1, get_option('elpug_slider_switch'), true); ?> >
		<span class="elpug-admin-slider round"></span>
	</label>
	
	<?php
}	

//Blogroll
function elpug_blogroll_switch_callback(){
	
	?>

	<label class="elpug-admin-switch">
		<input type="checkbox" name="elpug_blogroll_switch" value="1"  <?php checked(1, get_option('elpug_blogroll_switch'), true); ?> >
		<span class="elpug-admin-slider round"></span>
	</label>
	
	<?php
}

//Team
function elpug_team_switch_callback(){
	
	?>

	<label class="elpug-admin-switch">
		<input type="checkbox" name="elpug_team_switch" value="1"  <?php checked(1, get_option('elpug_team_switch'), true); ?> >
		<span class="elpug-admin-slider round"></span>
	</label>
	
	<?php
}

//Testimonials
function elpug_testimonials_switch_callback(){
	
	?>

	<label class="elpug-admin-switch">
		<input type="checkbox" name="elpug_testimonials_switch" value="1"  <?php checked(1, get_option('elpug_testimonials_switch'), true); ?> >
		<span class="elpug-admin-slider round"></span>
	</label>
	
	<?php
}



//==================================== Page ====================================
function elpug_powerups_options_page() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Power-Ups for Elementor Portfolio- Settings', 'elpug' ) ?></h1>
		<form action="options.php" method="post">
			<hr/><br/>		
			<?php do_settings_sections( 'elpug_powerups' ); ?>
			<?php settings_fields( 'elpug_powerups' ); ?>
			<input name="Submit" type="submit" value="<?php esc_attr_e( 'Save Changes', 'elpug' ); ?>" class="button button-primary" />
			<br/><br/><br/><hr/><br/>
			<h2><?php esc_html_e( 'How to use the Power-Up Elements', 'elpug' ); ?></h2>
			<div ><p><strong><?php esc_html_e( 'The widgets will be available in Elementor editor page, on the "Power-Ups for Elementor" category. Just drag it to your page and select the customization options :)', 'elpug' ); ?></strong></p></div>			
		</form>
	</div>
	<div>
		
	</div>
<?php
}