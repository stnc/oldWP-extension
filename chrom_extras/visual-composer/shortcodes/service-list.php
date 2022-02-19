<?php
/**
 * Visual Composer Element (Brand  sliders )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */

function CHfw_shortcode_staff_basic( $atts, $content = null ) {


	extract( shortcode_atts( array(
			'picture_staff'                        => '',
			'title_staff'                          => '',
			'content_staff'                        => '',
			'link_staff'                           => '',

	), $atts ) );



	$icon_background_color_style="";
	$icon_background_hover_color_style ="";
	if ( strlen( $picture_staff ) > 0 )
		$image = wp_get_attachment_image_src( esc_attr($picture_staff), 'full' );
						$output= '<div class="staff-basic">
						        <div class="staff-item"  style="'.$icon_background_hover_color_style.'">
						          <div  class="staff-item-image">
							          <img src=" '. esc_url( $image[0] ) .' " alt=""> </div>
						          <div  class="staff-item-descr">
						            <h3>'.esc_attr($title_staff).'</h3>
						            <p>'.esc_attr($content_staff).'</p>
						          </div>

						        </div>

						</div>';
	return $output;


}


add_shortcode( 'ch_staff_basic', 'CHfw_shortcode_staff_basic' );
	