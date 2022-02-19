<?php
/**
 * Visual Composer Element (Button )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */

/*http://tympanus.net/Development/CreativeButtons/
http://bull.dev/elements/feature-boxes/
	*/
function CHfw_shortcode_button( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'title'                  => __( 'Button with Text', 'chfw-lang' ),
		'link'                   => '',
		'style'                  => 'filled',
		'color'                  => '#fff',
		'size'                   => 'md',
		'icon_align'             => 'left',
		'icon'                   => '',
		'color_hover_color'      => '',
		'background_color'       => '#000',
		'background_hover_color' => '',
		'border_color'           => '',
		'align'                  => 'center',
		'class'                  => '',
		/*left olayı gelcek */

	), $atts ) );


	$link     = ( $link == '||' ) ? '' : $link;
	$link     = vc_build_link( $link );
	$a_href   = esc_url( $link['url'] );
	$a_title  = esc_attr( $link['title'] );
	$a_target = esc_attr( $link['target'] );


	$button_class = 'sc-btn sc-btn-' . esc_attr( $size );

	$button_style = $bg_style = '';

	if ( strlen( $align ) > 0 ) {
		$align = esc_attr( $align );
	} else {
		$align = 'center';
	}


	$onmouseover            = '';
	$onmouseout             = '';
	$background_color       = isset( $atts ['background_color '] ) ? esc_attr( $background_color ) : esc_attr( $background_color  );
	$background_hover_color = isset( $atts ['background_hover_color '] ) ? esc_attr( $background_hover_color ) : esc_attr( $background_hover_color  );
	$border_color           = isset( $atts ['border_color '] ) ? esc_attr( $border_color ) : esc_attr( $border_color  );
	if ( strlen( $style ) > 0 ) {
		if ( $style === 'filled_rounded' ) {

			$bg_color          = '';
			$button_color      = ' color:' . esc_attr( $color ) . ';';
			$color_hover_color = isset( $atts ['color_hover_color'] ) ? esc_attr( $color_hover_color ) : esc_attr( $color );
			if ( strlen( $background_hover_color ) > 0 ) {
				$onmouseover = 'onmouseover="this.style.background=\'' . $background_hover_color . '\'; this.style.color=\'' . $color_hover_color . '\' "';
				$onmouseout  = 'onmouseout="this.style.background=\'' . $background_color . '\'; this.style.color=\'' . esc_attr( $color ) . '\' "';
			}
			$bg_color = ' background-color:' . $background_color . ';';
			$bg_style = ' style="' . $bg_color . $button_color . '"';

		} elseif ( $style === 'border' ) {
			$bg_color          = '';
			$button_color      = ' color:' . esc_attr( $color ) . ';';
			$border_color      = ' border:2px solid ' . $border_color . ';';
			$color_hover_color = isset( $atts ['color_hover_color'] ) ? esc_attr( $color_hover_color ) : esc_attr( $color );
			if ( strlen( $background_hover_color ) > 0 ) {
				$onmouseover = 'onmouseover="this.style.background=\'' . $background_hover_color . '\'; this.style.color=\'' . $color_hover_color . '\' "';
				$onmouseout  = 'onmouseout="this.style.background=\'' . $background_color . '\'; this.style.color=\'' . esc_attr( $color ) . '\' "';
			}
			$bg_color = ' background-color:' . $background_color . ';';
			$bg_style = ' style="' . $bg_color . $button_color . $border_color . '"';
			$button_class .= ' sc-btn-radius-none';
		} elseif ( $style === 'border_rounded' ) {
			$bg_color          = '';
			$button_color      = ' color:' . esc_attr( $color ) . ';';
			$border_color      = ' border:1px solid ' . $border_color . ';';
			$color_hover_color = isset( $atts ['color_hover_color'] ) ? esc_attr( $color_hover_color ) : esc_attr( $color );
			if ( strlen( $background_hover_color ) > 0 ) {
				$onmouseover = 'onmouseover="this.style.background=\'' . $background_hover_color . '\'; this.style.color=\'' . $color_hover_color . '\' "';
				$onmouseout  = 'onmouseout="this.style.background=\'' . $background_color . '\'; this.style.color=\'' . esc_attr( $color ) . '\' "';
			}
			$bg_color = ' background-color:' . $background_color . ';';
			$bg_style = ' style="' . $bg_color . $button_color . $border_color . '"';
		} elseif ( $style === 'link' ) {
			$bg_color     = '';
			$button_color = ' color:' . esc_attr( $color ) . ';';
			$border_color = ' border:2px solid ' . $border_color . ';';
			$bg_style     = ' style="' . $button_color . '"';
		} //filled
		else {
			$bg_color          = '';
			$button_color      = ' color:' . esc_attr( $color ) . ';';
			$color_hover_color = isset( $atts ['color_hover_color'] ) ? esc_attr( $color_hover_color ) : esc_attr( $color );
			if ( strlen( $background_hover_color ) > 0 ) {
				$onmouseover = 'onmouseover="this.style.background=\'' . $background_hover_color . '\'; this.style.color=\'' . $color_hover_color . '\' "';
				$onmouseout  = 'onmouseout="this.style.background=\'' . $background_color . '\'; this.style.color=\'' . esc_attr( $color ) . '\' "';
			}
			$bg_color = "background-color:" . $background_color . ";";
			$bg_style = ' style="' . $bg_color . $button_color . '" ';
			$button_class .= ' sc-btn-radius-none';
		}
	}
	$icons       = '';
	$icons_left  = '';
	$icons_right = '';
	if ( strlen( $icon ) > 0 ) {
		wp_enqueue_style( 'pe-icons-filled', CHfw_THEME_URL . '/assets/fonts/font-icons/pe-icon-7-filled/css/pe-icon-7-filled.css' );
		wp_enqueue_style( 'pe-icons-stroke', CHfw_THEME_URL . '/assets/fonts/font-icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css' );

		if ( $icon_align == 'left' ) {
			$icons_left = '<i class="fas ' . esc_attr( $icon ) . '"></i> ';
		} else {
			$icons_right = '<i class="fas ' . esc_attr( $icon ) . '"></i> ';
		}
	}
	$tarf = "";
	if ( strlen( $a_target ) > 0 ) {
		$tarf = 'target="' . $a_target . '"';
	}


	$output = ' <div class="vc-ch-button_' . $align . '"> <a ' . $onmouseover . ' ' . $onmouseout . ' ' . $tarf . '   href="' . $a_href . '" title="' . $a_title . '" ' . $bg_style . '
     class="' . esc_attr( $class ) . ' ' . $button_class . '"> ' . $icons_left . ' ' . esc_attr( $title ) . ' ' . $icons_right . ' </a></div>';


	return $output;
}

add_shortcode( 'ch_button', 'CHfw_shortcode_button' );
