<?php
/**
 * Visual Composer Element (Feture Box )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_func_feature( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title'                       => '',
		'title_border'                => 'border',
		'icon_type'                   => 'icon',
		'icon'                        => '',
		'icon_style'                  => 'simple',
		'icon_background_color'       => '',
		'icon_background_hover_color' => '',
		'icon_border_color'           => '',
		'icon_border_hover_color'     => '#000',
		'icon_color'                  => '#000',
		'icon_hover_color'            => '#000',
		'image_id'                    => '',
		'image_style'                 => 'default',
		'layout'                      => 'default',
		'link'                        => '',
		'icon_size'                   => 'medium',
		'color'                       => '',
		'bg_radius'                       => '',
		'icon_border_size'            => '2',
		'title_border_color'          => '',
		'title_layout'                => '',
		'icon_library_type'           => '',
		'icon_fontawesome'            => '',
		'icon_openiconic'             => '',
		'icon_typicons'               => '',
		'icon_entypo'                 => '',
		'icon_linecons'               => '',
	), $atts ) );
	/* echo '<pre>';
		 print_r($atts);
		 echo '</pre>';*/

	$icon_style_class = "";
	$icon_size        = esc_attr( $icon_size );

	switch ( $layout ) {
		case 'default':
			$layout = 'layout-simple layout-simple-' . $icon_size;
			break;
		case 'centered':
			$layout = 'layout-centered layout-centered-' . $icon_size;
			break;
		case 'icon_right':
			$layout = 'layout-icon_right layout-icon_right-' . $icon_size;
			break;
		case 'icon_right_top':
			$layout = 'layout-icon_right layout-icon_right_top-' . $icon_size;
			break;
		case 'icon_left':
			$layout = 'layout-icon_left layout-icon_left-' . $icon_size;
			break;
		case 'icon_left_top':
			$layout = 'layout-icon_left layout-icon_left_top-' . $icon_size;
			break;
		default:
			$layout = 'layout-simple layout-simple-' . $icon_size;
	}


	switch ( $icon_library_type ) {
		case 'fontawesome':
			$icon = $icon_fontawesome;
			break;
		case 'openiconic':
			$icon = $icon_openiconic;
			break;
		case 'typicons':
			$icon = $icon_typicons;
			break;
		case 'entypo':
			$icon = $icon_entypo;
			break;
		case 'linecons':
			$icon = $icon_linecons;
			break;
		default:
			$icon = $icon_fontawesome;
	}

	switch ( $bg_radius) {
		case 'none':
			$radius = 'none';
			break;
		case 'y10':
			$radius = 'radius10';
			break;
		case 'radius':
			$radius = 'radius';
			break;
		default:
			$radius = 'none';
	}

	$image_center_style    = '';
	$color_service_feature = '';
	if ( $icon_type === 'icon' ) {
		if ( strlen( $icon ) > 0 ) {
			// Enqueue font icon styles
			wp_enqueue_style( 'pe-icons-filled', CHfw_THEME_URL . '/assets/fonts/font-icons/pe-icon-7-filled/css/pe-icon-7-filled.css' );
			wp_enqueue_style( 'pe-icons-stroke', CHfw_THEME_URL . '/assets/fonts/font-icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css' );

			// Background/border color
			$icon_background_color_style              = '';
			$icon_background_hover_color_style        = '';
			$icon_background_hover_color_style_border = '';
			if ( $icon_style == 'background' ) {
				if ( strlen( $icon_background_color ) > 0 ) {
					$icon_background_color_style = ' background-color: ' . esc_attr( $icon_background_color ) . ';';
					/*   $icon_background_hover_color_style = "onmouseover=\"this.style.background='" . $icon_background_hover_color . "'\"
					   onmouseout=\"this.style.background='".$icon_background_color."'\" ";*/

					$icon_background_hover_color_style = 'onmouseover="this.style.background=\'' . esc_attr( $icon_background_hover_color ) . '\'; this.style.color=\'' . esc_attr( $icon_hover_color ) . '\' "
            onmouseout="this.style.background=\'' . $icon_background_color . '\'; this.style.color = \'' . esc_attr( $icon_color ) . '\' "
                    ';


				}

				$icon_border_color_style = ' border: 2px solid ' . esc_attr( $icon_border_color ) . ';';


			} elseif ( $icon_style == 'border' ) {
				if ( strlen( $icon_border_color ) > 0 ) {
					$icon_background_hover_color_style_border = ' border: ' . esc_attr( $icon_border_size ) . 'px solid ' . esc_attr( $icon_border_color ) . ';';
				}
			}


			$icon_border_color_style = '';
			$title_border            = $title_border == 'border' ? ' ' : '  border-none ';
			$icon_style_class        = $icon_style == 'simple' ? ' icon-border-none' : ' icon-border';
			// Icon color
			$icon_color_style = '';
			if ( strlen( $icon_color ) > 0 ) {
				$icon_color_style = ' color: ' . esc_attr( $icon_color ) . ';';
			};

			$icon = '<i ' . $icon_background_hover_color_style . ' style="' . $icon_background_hover_color_style_border . $icon_background_color_style . $icon_color_style . $icon_border_color_style . '" class="fas font-' . esc_attr( $icon_size ) . ' ' . $icon .' '.$radius. '"></i>';
		}
	} else {
		if ( strlen( $image_id ) > 0 ) {
			$image_src = wp_get_attachment_image_src( intval( $image_id ), 'thumbnail' );
			$icon      = '<img class="' . esc_attr( $image_style ) . '" src="' . esc_url( $image_src[0] ) . '" alt="' . esc_attr( $title ) . '" />';
		}
	}

	if ( strlen( $color ) > 0 ) {
		$color_service_feature = 'color:' . $color . '';
	}
	$title_border_color_style = '';
	if ( strlen( $title_border_color ) > 0 ) {
		$title_border_color_style = 'border-bottom-color:' . esc_attr( $title_border_color ) . ';';
	}

	//$subtitle = ( strlen( $subtitle ) > 0 ) ? '<h3>' . esc_attr( $subtitle ) . '</h3>' : '';
	$title = ( strlen( $title ) > 0 ) ? '<h3 style="' . $title_border_color_style . $color_service_feature . '">' . esc_attr( $title ) . '</h3>' : '';
	// Button
	if ( strlen( $link ) > 0 ) {
		$link   = vc_build_link( $link );
		$button = '<a href="' . esc_url( $link['url'] ) . '" title="' . esc_attr( $link['title'] ) . '" class="link"><span class="link_title">' . esc_attr( $link['title'] ) . '</span></a>';
	} else {
		$button = '';
	}

	return '
                            <div class="services-box   ' . esc_attr( $layout ) . ' ' . $title_border . $icon_style_class . '">
                                <div class="service-icon" >
                                    <span class="boxing">
                                    ' . $icon . '
                                    </span>
                                </div>

                                <div class="service-feature" style="' . $color_service_feature . '">
                                    <div class="title title_layout-' . esc_attr( $title_layout ) . '">' . $title . ' </div>
                                    <div class="fet-content">
                                     ' . wpb_js_remove_wpautop( $content, true ) . $button . '
                                  </div>
                                    <div class="clearfix"></div>
                                </div>

                 </div>';
}

add_shortcode( 'ch_feature_box', 'CHfw_func_feature' );
