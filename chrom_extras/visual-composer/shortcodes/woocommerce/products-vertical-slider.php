<?php
/**
 * Visual Composer Element (product vertical sliders )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_shortcode_products_vertical_slider( $atts, $content = null ) {
	global $post;
	$rnd                = rand( 100, 1500 );
	$products_slider_id = 'products-slider' . $post->ID . '_' . $rnd;


	extract( shortcode_atts( array(
		'slide_to_standard_piece' => '6',
		'slide_to_1024_piece'     => '6',
		'slide_to_768_piece'      => '6',
		'slide_to_600_piece'      => '4',
		'slide_to_480_piece'      => '3',
		'slide_to_375_piece'      => '3',
		'slide_to_320_piece'      => '3',
		'speed'                   => '2000',
		'autoplay'                => '',
		'title'                   => '',
		'title_align'             => '',
		'color'                   => '',
		'accent_color'            => '',
		'style'                   => '',
		'border_width'            => '',
		'el_width'                => '',
		'el_class'                => '',
	), $atts ) );

	if ( strlen( $autoplay ) > 0 ) {
		$autoplay = 'true';
	} else {
		$autoplay = 'false';
	}


	$arrays_values = '{"speed":"' . esc_attr( $speed ) . '", "vertical":true, "autoplay":' . esc_attr( $autoplay ) . ', "slide_to_standard_piece":"' . esc_attr( $slide_to_standard_piece ) . '",	  "slide_to_1024_piece":"' . esc_attr( $slide_to_1024_piece ) . '","slide_to_768_piece":"' . esc_attr( $slide_to_768_piece ) . '",  "slide_to_600_piece":"' . esc_attr( $slide_to_600_piece ) . '", "slide_to_480_piece":"' . esc_attr( $slide_to_480_piece ) . '",		  "slide_to_375_piece":"' . esc_attr( $slide_to_375_piece ) . '",		   "slide_to_320_piece":"' . esc_attr( $slide_to_320_piece ) . '"}';


	$shortcode_params = ( strlen( $title ) > 0 ) ? ' title="' . esc_attr( $title ) . '"' : '';
	$shortcode_params .= ( strlen( $title_align ) > 0 ) ? ' title_align="' . esc_attr( $title_align ) . '"' : '';
	$shortcode_params .= ( strlen( $color ) > 0 ) ? ' color="' . esc_attr( $color ) . '"' : '';
	$shortcode_params .= ( strlen( $accent_color ) > 0 ) ? ' accent_color="' . esc_attr( $accent_color ) . '"' : '';
	$shortcode_params .= ( strlen( $style ) > 0 ) ? ' style="' . esc_attr( $style ) . '"' : '';
	$shortcode_params .= ( strlen( $border_width ) > 0 ) ? ' border_width="' . esc_attr( $border_width ) . '"' : '';
	$shortcode_params .= ( strlen( $el_width ) > 0 ) ? ' el_width="' . esc_attr( $el_width ) . '"' : '';
	$shortcode_params .= ( strlen( $el_class ) > 0 ) ? ' el_class="' . esc_attr( $el_class ) . '"' : '';


	/*
	[vc_text_separator title="Titlesdfdfsdf" title_align="separator_align_right" align="align_right" color="peacoc" style="dashed" border_width="5" el_width="90" el_class="font-bold font-size20"]

	 * */

	if ( strlen( $title ) > 0 ) {
		$title_ = do_shortcode( '[vc_text_separator ' . $shortcode_params . ']' );
		/*  $title =     '<h2>'.$title.'</h2>';*/
	} else {
		$title_ = '';
	}

	$output = '
    <div class="products-vertical-slider-container slider-product">
    ' . $title_ . '
    <div id="' . $products_slider_id . '">
    ' . do_shortcode( $content ) . '
    </div>
    </div>
    ';


	add_action( 'wp_footer', function () use ( $products_slider_id, $arrays_values ) {
		$products_slider_id = '#' . $products_slider_id . ' .vc-product-list';
		?>
		<script type="text/javascript">
			<?php    echo  'slick_slider_init(\''.$products_slider_id.'\',\''.$arrays_values.'\');' ?>
			<?php    //echo  'jQuery(window).on("load", function(){ slick_slider_init(\''.$products_slider_id.'\',\''.$arrays_values.'\');  });' ?>
		</script>
		<?php
	}, 20 );
	return $output;
}

add_shortcode( 'ch_products_vertical_slider', 'CHfw_shortcode_products_vertical_slider' );
	