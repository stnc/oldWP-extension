<?php
/**
 * Visual Composer Element (Banner )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_counter_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'title'             => '',
		'from'       => '',
		'speed'         => 3000,
		'end'       => '#',
		'text_color'        => '#fff',
		'background_color'        => '#fff',
		'text_hover_color'  => '#fff',
		'background_hover_color'  => '#fff',


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


	return '<b class="timer" id="selman" data-from="0" data-to="9.8" data-speed="3000" data-decimals="2"></b> m/s<sup>2</sup></p>';

}

add_shortcode( 'ch_counter', 'CHfw_counter_shortcode' );
	