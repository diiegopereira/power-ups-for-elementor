<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */


/*-----------------------------------------------------------------------------------*/
/*	Testimonial Carousel
/*-----------------------------------------------------------------------------------*/
function pando_testimonials_carousel_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		//"ids" => '',
		"text_color" => ''
	), $atts));

	//$testimonial_ids = explode(",", $ids);
	$testimonial_color = $text_color;	

	//JS Scripts
	wp_enqueue_style( 'owl-carousel-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'owl-carousel-theme-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.theme.default.min.css' );
	wp_enqueue_script( 'owl-carousel-js', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/owl.carousel.min.js', array('jquery'), '20151215', true );
	
	//CSS
	//Custom CSS
	wp_enqueue_style( 'bearr-testimonials-css', plugin_dir_url( __FILE__ ) .  '/css/bearr_testimonials_css.css' );

	//JS
	wp_enqueue_script( 'bearr-custom-testimonials-js', plugin_dir_url( __FILE__ ) . 'js/custom-testimonials.js', array('jquery'), '20151215', true );


	//Output	
	$output = '';
	$output .= '<div class="section-testimonials ' .$testimonial_color .'"><div class="">';
		$output .= '<div class="owl-carousel testimonial-carousel common-carousel owl-theme">';

			global $post;
	
			$args = array(
				'post_type' => 'pandotestimonials',
				'posts_per_page' => 24,
				//'p' => $id
			);
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) :
			while ($my_query->have_posts()) : $my_query->the_post();

			$testimonial_pictures = rwmb_meta( 'bearr_testimonial_image', '' );
			foreach ( $testimonial_pictures as $testimonial_picture ) {
			   $testimonial_image = $testimonial_picture['url'];
			}
			$testimonial_desc = rwmb_meta( 'bearr_testimonial_desc' );	
			$testimonial_name = rwmb_meta( 'bearr_testimonial_name' );
			
			
			$output .='<div class="testimonial-item"><blockquote>';


				if (!empty($testimonial_image)) {
					$output .='<div class="testimonial-image">';

						$output .='<img src="'.$testimonial_image.'" alt="'.esc_html($testimonial_name).'"/>';

					$output .='</div>';
				}

				$output .='<p>'.wp_kses_post($testimonial_desc).'</p>';

				$output .='<footer>';
					$output .='<cite>'.esc_html($testimonial_name).'</cite>';
				$output .='</footer>';

			$output .='</blockquote></div>';

			endwhile; else:
			$output ='';
			$output .= "nothing found.";
			endif;

			//Reset Query
		    wp_reset_query();

		$output .= '</div>';
	$output .= '</div></div>';
	return $output;
}

add_shortcode("pando-testimonials-carousel", "pando_testimonials_carousel_shortcode");

