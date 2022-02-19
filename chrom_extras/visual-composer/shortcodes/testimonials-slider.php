<?php
/**
 * Visual Composer Element (testimonial slider )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_testimonial_slider( $atts, $content = null ) {
	global $post;


	extract( shortcode_atts( array(
		'text_color'       => '',
		'timeout'          => '4000',
		'speed'            => '500',
		'autoplay'         => 'true',
		'background_color' => '',
	), $atts ) );

	if ( strlen( $autoplay ) > 0 ) {
		$autoplay = 'true';
	} else {
		$autoplay = 'false';
	}

	/* if (strlen($text_color) > 0) {
		 $text_color_cls = '';
	 } else {
		 $text_color_cls = $text_color;
	 }
 */
	$rnd       = rand( 100, 1500 );
	$slider_id = 'testimonial-sld' . $post->ID . '_' . $rnd;
	// $arrays_values = '{"speed":"' . esc_attr($speed) . '", "timeout":"' . esc_attr($timeout) . '","autoplay":"' . esc_attr($autoplay) . '"}';

	$output_style1             = '';
	$output_style2             = '';
	$style_enable_text_disable = true;
	$style_enable_bg_disable   = true;
	if ( strlen( $text_color ) > 0 ) {
		// die("gir");
		$text_color_style = '.testimonials-slider-container .' . $slider_id . '.testimonials-slider .wow-testimonials p, .testimonials-slider-container .' . $slider_id . '.testimonials-slider .ch-user-info li  { color: ' . esc_attr( $text_color ) . ';}';
	} else {
		$text_color_style = '';
		// die("girmez");
		$style_enable_text_disable = false;
	}

	if ( strlen( $background_color ) > 0 ) {
		$background_color_css = '.testimonials-slider-container .' . $slider_id . '.testimonials-slider  {  background-color: ' . esc_attr( $background_color ) . ';}';
	} else {
		$background_color_css    = '';
		$style_enable_bg_disable = false;
	}


	if ( $style_enable_text_disable ) {
		$output_style1 = '<style> ' . $text_color_style . '</style>';
	}

	if ( $style_enable_bg_disable ) {
		$output_style2 = '<style> ' . $background_color_css . '</style>';
	}


	$output = $output_style1 . $output_style2 . '<div class="testimonials-slider-all">
    <div class="testimonials-slider-container">
    <div class="' . $slider_id . ' testimonials-slider">
        ' . do_shortcode( $content ) . '
    </div>
    </div>
    </div>
    ';

	add_action( 'wp_footer', function () use ( $slider_id ) {
		$my_slider_id = '.testimonials-slider-container .' . $slider_id . '.testimonials-slider';
		?>
		<script type="text/javascript">
			<?php
			 echo  'slick_slider_gallery_init(\''.$my_slider_id.'\');' ?>
		</script>
		<?php
	}, 20 );

	return $output;
}


add_shortcode( 'ch_testimonial_slider', 'CHfw_testimonial_slider' );
	