<?php
/**
 * Meta Boxes Configurations
 *
 *
 * @package bearr
 */


add_filter( 'rwmb_meta_boxes', 'bearr_slideshow_meta_boxes' );
function bearr_slideshow_meta_boxes( $meta_boxes ) {
	$prefix = 'bearr_';

	/*Slider*/
    $meta_boxes[] = array(
        'title'      => __( 'Slide Content', 'bearr' ),
        'post_types' => 'slider',
        'fields'     => array(    
        	array(
                'id'   => $prefix. 'slide_title',
                'name' => __( 'Slide Title', 'bearr' ),
                'type' => 'text',
            ),     	
            array(
                'id'   => $prefix. 'slide_text',
                'name' => __( 'Slide Text', 'bearr' ),
                'type' => 'textarea',
            ),             
            array(
                'id'   => $prefix. 'slide_link_text',
                'name' => __( 'Button Text', 'bearr' ),
                'desc' => 'example: See More',
                'type' => 'text',
            ),
             array(
                'id'   => $prefix. 'slide_link',
                'name' => __( 'Link', 'bearr' ),
                'desc' => 'example: http://www.google.com',
                'type' => 'text',
            ),
            array(
                'id'   => $prefix. 'slide_text_align',
                'name' => __( 'Content Align', 'bearr' ),
                'type' => 'radio',
                'std'   => 'center',
                'inline' => false,
                'options' => array(
                    'left' => __( 'Left', 'bearr' ),
                    'center' => __( 'Center', 'bearr' ),
                    'right' => __( 'Right', 'bearr' ),
                ),
            ),
             array(
                'id'   => $prefix. 'slide_overlay',
                'name' => __( 'Image Overlay', 'bearr' ),
                'type' => 'radio',
                'std'   => 'center',
                'inline' => false,
                'options' => array(
                    'overlay-none' => __( 'None', 'bearr' ),
                    'overlay-black' => __( 'Black Mask', 'bearr' ),
                    'overlay-gradient' => __( 'Gradient Mask', 'bearr' ),
                ),
            ),
            array(
                'id'   => $prefix. 'slide_image',
                'name' => __( 'Image', 'bearr' ),
                'desc' => 'Minimum: 1360 x 720 pixels / Recommended: 1920 x 1080 pixels',
                'required'  => true,
                'type' => 'image_upload',
                'max_file_uploads' => 1,
            ), 
            array(
                'id'   => $prefix. 'slide_video_mp4',
                'name' => __( 'Video Background (MP4 Format)', 'bearr' ),
                'desc' => '<strong>To use only image background, leave it empty.</strong><br/>Upload your WebM video file here.<br/> This will be automatically played on load so make sure to use this responsibly for enhancing your design, rather than annoy your user. e.g. A video loop with no sound.<br/> You must include this format & the webm format to render your video with cross browser compatibility.<br/> OGV is optional. <br/>Video must be in a 16:9 aspect ratio.',
                'required'  => true,
                'type' => 'file_input',
                'max_file_uploads' => 1,
            ),
            array(
                'id'   => $prefix. 'slide_video_webm',
                'name' => __( 'Video Background (WEBM Format)', 'bearr' ),
                'desc' => '<strong>To use only image background, leave it empty.</strong><br/>Upload your WebM video file here.<br/> See the note above for recommendations on how to properly use your video background.',
                'required'  => true,
                'type' => 'file_input',
                'max_file_uploads' => 1,
            ),
             array(
                'id'   => $prefix. 'slide_video_ogv',
                'name' => __( 'Video Background (OGV Format)', 'bearr' ),
                'desc' => '<strong>To use only image background, leave it empty.</strong><br/>Upload your OGV video file here.<br/> See the note above for recommendations on how to properly use your video background.',
                'required'  => true,
                'type' => 'file_input',
                'max_file_uploads' => 1,
            ),
            array(
                'id'   => $prefix. 'slide_extra',
                'name' => __( 'Extra Content (Like Shortcodes)', 'bearr' ),
                'desc' => 'Extra content displayed below the slide content. {Example: A countdown shortcode.).',
                'type' => 'textarea',
            ),            
        ),
    );	

    return $meta_boxes;
}