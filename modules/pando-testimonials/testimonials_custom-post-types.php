<?php
/**
 * Testimonials: Custom Post Types
 *
 *
 * @package bearr
 */
class PANDO_testimonials_Post_Types {
	
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{
		$args = array();	

		// Testimonials
		$args['post-type-testimonials'] = array(
			'labels' => array(
				'name' => __( 'Testimonials', 'amore' ),
				'singular_name' => __( 'Testimonial', 'amore' ),
				'add_new' => __( 'Add New', 'amore' ),
				'add_new_item' => __( 'Add New Testimonial', 'amore' ),
				'edit_item' => __( 'Edit Testimonial', 'amore' ),
				'new_item' => __( 'New Testimonial', 'amore' ),
				'view_item' => __( 'View Testimonial', 'amore' ),
				'search_items' => __( 'Search Through Testimonials', 'amore' ),
				'not_found' => __( 'No testimonials found', 'amore' ),
				'not_found_in_trash' => __( 'No testimonials found in Trash', 'amore' ),
				'parent_item_colon' => __( 'Parent Testimonial:', 'amore' ),
				'menu_name' => __( 'Testimonials', 'amore' ),				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a Testimonial', 'amore' ),
	        'supports' => array( 'title'),
	        'menu_icon' =>  'dashicons-testimonial',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => true,
	        'query_var' => true,
	        'rewrite' => true 
		);	

		// Register post type: name, arguments
		register_post_type('pandotestimonials', $args['post-type-testimonials']);
	}
}

function bearr_testimonials_types() { new PANDO_testimonials_Post_Types(); }

add_action( 'init', 'bearr_testimonials_types' );

