<?php
/**
 * Visual Composer Element (Brand  sliders )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */

function CHfw_shortcode_service_box( $atts, $content = null ) {


	extract( shortcode_atts( array(
		'picture_staff'                          => '',
		'title_staff'                            => '',
		'content_staff'                          => '',
		'content_fade_and_slide_in_bottom_staff' => '',
		'link_staff'                             => '',
		'layout'                                 => 'top',
		'background_color'                       => '',
		'background_hover_color'                 => '',
		'text_color'                             => '#fff',
		'text_box_position'                      => 'service-desc-center',
	), $atts ) );


	$link     = "";
	$link_end = "";
	if ( strlen( $link_staff ) > 0 ) {
		$link_staff_ = vc_build_link( $link_staff );
		$link        = ' <a href=" ' . esc_url( $link_staff_['url'] ) . '" class="">';
		$link_end    = "</a>";
		$my_link     = esc_url( $link_staff_['url'] );
	} else {
		$my_link = '#';
	}

	if ( strlen( $text_color ) > 0 ) {
		$text_color = 'color:' . $text_color . ';';
	}


	$background_color_css = "";
	if ( strlen( $background_color ) > 0 ) {
		$background_color     = $background_color;
		$background_color_css = 'background-color:' . $background_color . ';';

	}

	if ( strlen( $background_hover_color ) > 0 ) {
		$background_hover_color = $background_hover_color;
	}

	if ( strlen( $picture_staff ) > 0 ) {
		$image = wp_get_attachment_image_src( esc_attr( $picture_staff ), 'full' );
	}


	if ( strlen( $layout ) > 0 ) {
		if ( $layout == "top" ) {
			$output = '<div class="staff-basic">
						        <div class="staff-item" data-bgColor="' . $background_color . '"  data-bgHoverColor="' . $background_hover_color . '" >
						          <div  class="staff-item-image">
							      ' . $link . ' <img src=" ' . esc_url( $image[0] ) . ' " alt="' . esc_attr( $title_staff ) . '">' . $link_end . '
							       </div>
						          <div  class="staff-item-descr" style=" ' . $background_color_css . '">
						            <h3 style="' . $text_color . '">' . esc_attr( $title_staff ) . '</h3>
						            <p style="' . $text_color . '">' . esc_attr( $content_staff ) . '</p>
						          </div>
						        </div>
						</div>';
		} elseif ( $layout == "bottom" ) {
			$output = '  <div class="services-boxes-basic">
					<div class="">
                        <div class="service">
	                               ' . $link . ' <img class="photo img-responsive" src=" ' . esc_url( $image[0] ) . ' " alt="' . esc_attr( $title_staff ) . '">' . $link_end . '
	                          <a data-bgColor="' . $background_color . '"  data-bgHoverColor="' . $background_hover_color . '"  style="' . $text_color . $background_color_css . '"  href="' . $my_link . '" class="service-desc ' . $text_box_position . ' h4">' . esc_attr( $title_staff ) . '</a>
                         </div>
                     </div>
	        </div>';
		} elseif ( $layout == "fadeBox" ) {
			$output = '<div class="services-box-fadebox-wrapper" >
                        <div class="services-box-content-block" >
                            <img src = "' . esc_url( $image[0] ) . '" alt = "service image" class="img img-responsive" >
                            <div class="services-box-content-block_overlay text-center" >
                                <h6><a  style="' . $text_color . '" href = "' . $my_link . '"> ' . esc_attr( $title_staff ) . ' </a ></h6>
                                <div class="divider" ></div>
						<p  style="' . $text_color . '">' . esc_attr( $content_fade_and_slide_in_bottom_staff ) . '</p >
                            </div>
                       </div>
                    </div >';
		} elseif ( $layout == "slideInBottom" ) {
			$output = '<div class="services-box-SlideInBottom-wrap">
					<div class="services-box-content-block" data-bgHoverColor="' . $background_hover_color . '">
						<figure>
							 <img src = "' . esc_url( $image[0] ) . '" alt = "service image" class="img img-responsive" >
							<figcaption>
								 <h4><a  style="' . $text_color . '" href = "' . $my_link . '"> ' . esc_attr( $title_staff ) . ' </a ></h4>
								<span><p  style="' . $text_color . '">' . esc_attr( $content_fade_and_slide_in_bottom_staff ) . '</p ></span>
							</figcaption>
						</figure>
					</div>
				</div>';
		}
	}
	return $output;
}


add_shortcode( 'ch_service_box', 'CHfw_shortcode_service_box' );
	