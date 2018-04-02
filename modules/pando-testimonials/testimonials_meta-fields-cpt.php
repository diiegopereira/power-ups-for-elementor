<?php
/**
 * Meta Boxes Configurations
 *
 *
 * @package bearr
 */


add_filter( 'rwmb_meta_boxes', 'bearr_testimonials_meta_boxes' );
function bearr_testimonials_meta_boxes( $meta_boxes ) {
	$prefix = 'bearr_';	

	/*Testimonials*/
    $meta_boxes[] = array(
        'title'      => __( 'Testimonial Details', 'bearr' ),
        'post_types' => 'pandotestimonials',
        'fields'     => array(
            array(
                'id'   => $prefix. 'testimonial_image',
                'name' => __( 'Image', 'bearr' ),
                'desc' => 'Recommended: 120 x 120 pixels',
                'required'  => false,
                'type' => 'image_upload',
                'max_file_uploads' => 1,
            ), 
            array(
                'id'   => $prefix. 'testimonial_desc',
                'name' => __( 'Testimonial Text', 'bearr' ),
                'type' => 'textarea',
            ),
            array(
                'id'   => $prefix. 'testimonial_name',
                'name' => __( 'By who?', 'bearr' ),
                'type' => 'text',
            )         
        ),
    );

    return $meta_boxes;
}