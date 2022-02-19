<?php
/**
 * Visual Composer Element (product sliders )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */

function CHfw_shortcode_products_slider($atts, $content = NULL)
{

    global $post;
    $rnd=rand(100, 1500);
    $products_slider_id = 'products-slider'.$post->ID.'_'.$rnd;

    extract(shortcode_atts(array(
        'title' => 'Products',
        'slide_to_standard_piece'=>'4',
        'slide_to_1024_piece'=>'3',
        'slide_to_768_piece'=>'3',
        'slide_to_600_piece'=>'3',
        'slide_to_480_piece'=>'2',
        'slide_to_375_piece'=>'2',
        'slide_to_320_piece'=>'1',
        'speed' => '500',
        'autoplay' => '',
    ), $atts));

    if (strlen($autoplay) > 0) {
        $autoplay = 'true';
    } else {
        $autoplay = 'false';
    }

    $arrays_values = '{"speed":' . esc_attr($speed) . ', "autoplay":' . esc_attr($autoplay) . ',     "vertical":false,    "slide_to_standard_piece":' . esc_attr($slide_to_standard_piece) . ',    "slide_to_1024_piece":' . esc_attr($slide_to_1024_piece) . ',    "slide_to_768_piece":' . esc_attr($slide_to_768_piece) . ',     "slide_to_600_piece":' . esc_attr($slide_to_600_piece) . ',     "slide_to_480_piece":' . esc_attr($slide_to_480_piece) . ',     	 "slide_to_375_piece":' . esc_attr($slide_to_375_piece) . ',     	     "slide_to_320_piece":' . esc_attr($slide_to_320_piece) . '}';


    if (strlen($title) > 0) {
        $title =     '<h2>'.esc_attr($title).'</h2>';
    } else {
        $title ='';
    }


    $output = '
    <div class="slider-product">
    '.$title.'
    <div id="' . $products_slider_id . '">
    ' . do_shortcode($content) . '
    </div>
    </div>
    ';


    add_action('wp_footer', function () use ($products_slider_id, $arrays_values) {
        $products_slider_id ='#'.$products_slider_id.' .ul-products';
        ?>

        <script type="text/javascript">
            <?php
             echo  'slick_slider_init(\''.$products_slider_id.'\',\''.$arrays_values.'\');' ?>
        </script>
        <?php
    }, 20);


    return $output;


}
add_shortcode('ch_products_slider', 'CHfw_shortcode_products_slider');