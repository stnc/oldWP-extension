<?php
/**
 * Visual Composer Element (Banner )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_menuBuilder_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'title'             => '',
		'link_source'       => 'custom',
		'font_size'         => '12',
		'custom_link'       => '#',
		'text_color'        => '#fff',
		'background_color'        => '#fff',
		'text_hover_color'  => '#fff',
		'background_hover_color'  => '#fff',
		'text_alignment'    => 'align_left',
		'class'             => '',
		'icon_hover_color'  => '',
		'icon_fontawesome'  => '',
		//Coming soon
		'icon_color'        => '',
		'icon_library_type' => '',
		'icon_linecons'     => '',
		'icon_entypo'       => '',
		'icon_typicons'     => '',
		'icon_openiconic'   => '',

	), $atts ) );

	if ( strlen( $title ) <= 0 ) {
		$title = '';
	}
	if ( strlen( $icon_fontawesome ) <= 0 ) {
		$icon_fontawesome = '';
	}

	if ( strlen( $font_size ) <= 0 ) {
		$font_size = '';
	}

	if ( strlen( $custom_link ) <= 0 ) {
		$custom_link = '';
	}

	$font_size_i = $font_size+5;
	return '<div style="background-color:' . $background_color .' " data-bgColor="' . $background_color . '"  data-bgHoverColor="' . $background_hover_color . '"
	data-textColor="' . $text_color . '"  data-textHoverColor="' . $text_hover_color . '"  class="menu-builder-list">
			  <a href="' . $custom_link . '" title="' . $title . '" style="color:' . $text_color .' "  class="menu-builder-a font-size'. $font_size . '">
			  <i class="'. $icon_fontawesome .' font-size'. $font_size_i .'" aria-hidden="true"></i>' . $title . '</a>
			</div>';

}

add_shortcode( 'ch_menu_builder', 'CHfw_menuBuilder_shortcode' );
	