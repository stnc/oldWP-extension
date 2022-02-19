<?php
/**
 * Visual Composer Element (Brand  sliders )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */

function CHfw_shortcode_brand_slider($atts, $content = NULL)
{

    global $post;
    $rnd=rand(100, 1500);
    $banner_slider_id = 'banner-slider'.$post->ID.'_'.$rnd;



    extract(shortcode_atts(array(
        'speed' => '500',
        'autoplay' => '',
        'slide_to_standard_piece'=>'6',
        'slide_to_1024_piece'=>'5',
        'slide_to_768_piece'=>'5',
        'slide_to_600_piece'=>'4',
        'slide_to_480_piece'=>'2',
        'slide_to_375_piece'=>'2',
        'slide_to_320_piece'=>'1',
    ), $atts));

    if (strlen($autoplay) > 0) {
        $autoplay = 'true';
    } else {
        $autoplay = 'false';
    }

    $arrays_values = '{"speed":' . esc_attr($speed) . ', "autoplay":' . esc_attr($autoplay) . ', "slide_to_standard_piece":' . esc_attr( $slide_to_standard_piece ) . ',	  "slide_to_1024_piece":' . esc_attr( $slide_to_1024_piece ) . ',"slide_to_768_piece":' . esc_attr( $slide_to_768_piece ) . ',  "slide_to_600_piece":' . esc_attr( $slide_to_600_piece ) . ', "slide_to_480_piece":' . esc_attr( $slide_to_480_piece ) . ',		  "slide_to_375_piece":' . esc_attr( $slide_to_375_piece ) . ',		   "slide_to_320_piece":' . esc_attr( $slide_to_320_piece ) . ' }';


    $output = '
    <div class="slider-product-brand products-container padding_zero">
    <div id="' . $banner_slider_id . '">
    <div class="ul-products">
    ' . do_shortcode($content) . '
    </div>
    </div>
    </div>
    ';


    add_action('wp_footer', function () use ($banner_slider_id, $arrays_values) {
        $banner_slider_id ='#'.$banner_slider_id.' .ul-products';
        ?>
        <script type="text/javascript">
            <?php    echo  'slick_slider_init(\''.$banner_slider_id.'\',\''.$arrays_values.'\');' ?>
        </script>
        <?php
    }, 20);


    return $output;


}


add_shortcode('ch_brand_slider', 'CHfw_shortcode_brand_slider');
	