<?php
/**
 * Visual Composer Element (contact form 7 )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
	function CHfw_contact_form_7( $atts, $content = NULL ) {
		extract( shortcode_atts( array(
			'title'	=> '',
			'id'	=> ''
		), $atts ) );
		
		$title_attr = ( strlen( $title ) > 0 ) ? ' title="'.$title.'"' :  ' title="Contact form"';
		
		$shortcode = '[contact-form-7 id="' . intval( $id ) . '"' . $title_attr . ']';
		
		return do_shortcode( $shortcode );
	}
	
	add_shortcode( 'ch_contact_form_seven','CHfw_contact_form_7' );