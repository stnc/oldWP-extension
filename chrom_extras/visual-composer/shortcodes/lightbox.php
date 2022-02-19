<?php
/**
 * Visual Composer Element (Lightbox )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_lightbox_shortcode( $atts, $content = null ) {


	extract( shortcode_atts( array(
		'link_type'              => 'link',
		'title'                  => 'View',
		'button_style'           => 'filled',
		'button_align'           => 'left',
		'button_size'            => 'lg',
		'button_color'           => '',
		'link_image_id'          => '',
		'content_type'           => 'image',
		'content_image_id'       => '',
		'content_url'            => '',
		'icon'                   => '',
		'color_hover_color'      => '',
		'background_color'       => '#000',
		'background_hover_color' => '',
		'border_color'           => '',

	), $atts ) );

	$link_icon = ( $content_type == 'iframe' ) ? '<i class="ch-font ch-font-play-filled"></i><i class="lighbox-video-play fa fa-play"></i>' : '';

	// Text/Button/Image
	//link denenecek ayrıca butona ek class ozelliği yazılıacak
	if ( $link_type == 'btn' ) {
		$shortcode_params = ' title="' . esc_attr( $title ) . '" icon_align="' . esc_attr( $button_align ) . '" size="' . esc_attr( $button_size ) . '"  style="' . esc_attr( $button_style ) . '"';
		$shortcode_params .= ( strlen( $button_color ) > 0 ) ? ' color="' . esc_attr( $button_color ) . '"' : '';
		$shortcode_params .= ( strlen( $background_color ) > 0 ) ? ' background_color="' . esc_attr( $background_color) . '"' : '';
		$shortcode_params .= ( strlen( $background_hover_color ) > 0 ) ? ' background_hover_color="' . esc_attr( $background_hover_color ) . '"' : '';
		$shortcode_params .= ( strlen( $border_color ) > 0 ) ? ' border_color="' . esc_attr( $border_color ) . '"' : '';
		$shortcode_params .= ( strlen( $color_hover_color ) > 0 ) ? ' color_hover_color="' . esc_attr( $color_hover_color ) . '"' : '';
		$shortcode_params .= ( strlen( $content_url ) > 0 ) ? ' link="' . esc_attr( $content_url ) . '"' : '';
		$shortcode_params .= ( strlen( $icon ) > 0 ) ? ' icon="' . esc_attr( $icon ) . '"' : '';
		$link = do_shortcode( '[ch_button ' . $shortcode_params . ']' );
	} elseif ( $link_type == 'image' ) {
		$image_src = wp_get_attachment_image_src( $link_image_id, 'large' );
		$link      = '<img alt="' . esc_attr( $title ) . '" src="' . esc_url( $image_src[0] ) . '" />' .
		             $link_icon . '<div class="ch-image-overlay"></div>
			';
	} else {
		$link = '<a class="ch-lightbox sc-btn sc-btn-md " href="' . esc_url( $content_url ) . '">' . esc_attr( $title ) . '</a>';
	}


	// Content
	if ( $content_type != 'image' ) {
		$data_attr = 'data-mfp-src="' . esc_url( $content_url ) . '"';
	} else {
		$image_src = wp_get_attachment_image_src( $content_image_id, 'full' );
		$data_attr = 'data-mfp-src="' . esc_url( $image_src[0] ) . '"';
	}

	return '
			<div class="ch-lightbox" data-mfp-type="' . esc_attr( $content_type ) . '" ' . $data_attr . '>' .
	       $link . '
			</div>';
}

add_shortcode( 'ch_lightbox', 'CHfw_lightbox_shortcode' );
	