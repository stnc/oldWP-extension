<?php
/**
 * Visual Composer Element (Banner )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_banner_shortcode($atts, $content = null)
{
    extract(shortcode_atts(array(
        'title' => '',
        'subtitle' => '',
        'title_size' => 'small',
        'link_source' => 'custom',
        'custom_link' => '',
        'shop_link_title' => '',
        'shop_link' => '',
        'link_type' => 'banner_link',
        'text_color' => '#fff',
        'banner_position' => 'h_center-v_center',
        'text_alignment' => 'align_left',
        'image_id' => '',
        'image_type' => 'fluid',
        'height' => '',
        'background_color' => '',
        'text_border' => 0,
        'text_border_color' => '#fff',
        'transparan_effect' => 0,
        'zoom_effect' => '',
        'class' => '',
    ), $atts));


    $layout = 'medium';

    $banner_class = ($layout == 'boxed-full-parent') ? 'content-boxed full-width-parent ' : 'content-' . esc_attr($layout) . ' ';

    // Background color
    $background_color_style = (strlen($background_color) > 0) ? 'background-color: ' . esc_attr($background_color) . ';' : '';


    $zoom_effect_val = '';
    if ($zoom_effect == 1) {
        $zoom_effect_val = 'img-zoom';
    }

    // Image
    $image_output = '';
    if (strlen($image_id) > 0) {
        $image = wp_get_attachment_image_src(esc_attr($image_id), 'full');

        if ($image_type == 'fluid') {
            $height_style = ''; // Remove the banner height if a regular image is used
            $banner_class .= 'image-type-fluid';
            $image_output .= '<img alt="' . esc_attr($title) . '" class="' . $zoom_effect_val . '" src="' . esc_url($image[0]) . '" />';


        } else {
            // Image height style
            $height = intval($height);
            $height_style = ($height > 0) ? 'height: ' . $height . 'px; ' : '';

            $banner_class .= 'image-type-css';
            $image_output .= '<div class="chr-banner-image " style="' . $height_style . 'background-image: url(' . esc_url($image[0]) . ');"></div>';
        }

        $banner_height_style = '';
    } else {
        // No image class
        $banner_class .= 'image-type-none';

        // Banner height style
        $height = intval($height);
        $banner_height_style = ($height > 0) ? 'height: ' . $height . 'px; ' : '';
    }

    if (strlen($text_color) > 0) {
        $style_color = 'style="color:' . esc_attr($text_color) . ';"';
    }


    // Text
    $content_output = '';

    $text_link = '';
    // Link
    $link_is_custom = ($link_source == 'custom') ? true : false;
    $link = isset($link_is_custom) ? $custom_link : esc_url($shop_link);
    $banner_link_open_output = $banner_link_close_output = '';
    $link_class = '';
    if (strlen($link) > 0) {
        if ($link_is_custom) {
            $banner_link = vc_build_link($link);
        } else {
            $link_class = ' chr-banner-shop-link';
            $banner_link = array('title' => esc_attr($shop_link_title), 'url' => htmlspecialchars($link));
        }

        if ($link_type === 'banner_link') {
            $banner_link_open_output = '<a href="' . esc_url($banner_link['url']) . '" class="chr-banner-link chr-banner-link-full' . $link_class . '">';
            $banner_link_close_output = '</a>';
        } else {
            if ($banner_link['url'] != '')
                //$text_link = '<a href="' . esc_url( $banner_link['url'] ) . '" class="chr-banner-link' . $link_class . '">' . $banner_link['title'] . '</a>';
                $subtitle = '<a href="' . esc_url($banner_link['url']) . '" ' . $style_color . ' class="chr-banner-link' . $link_class . '">' . $subtitle . '</a>';
        }
    }
    $content_output .= (strlen($title) > 0) ? '<h2 ' . $style_color . ' class="' . esc_attr($title_size) . '">' . ($title) . '</h2>' : '';
    $content_output .= (strlen($subtitle) > 0) ? '<h3 ' . $style_color . ' class="">' . $subtitle . '</h3>' : '';

    $text_border_class = '';
    $text_border_color_ = '';
    if (strlen($text_border) > 0) {
        $text_border_class = "text_border";
        $text_border_color_ = ($text_border_color == '#fff') ? '#fff' : $text_border_color;
        $text_border_color_ = 'border-color:' . $text_border_color_;
    }


    $transparan_effect_ = '';
    if (strlen($transparan_effect) > 0) {
        $transparan_effect_ = '<span class="bg_transparan" style="background-color: rgba(0,0,0,0.3);"></span>';
    }

    // Display banner content?
    if (strlen($content_output) > 0) {
        // Text position array
        $banner_position = explode('-', $banner_position);
        // Text width
        $text_styles = '';

        // Content markup
        $content_output = '
				<div class="chr-banner-content">
					<div class="chr-banner-content-inner">
						<div class="chr-banner-text ' . $banner_position [0] . ' ' . $banner_position [1] . ' ' . esc_attr($text_alignment) . '" style="' . $text_styles . '">
							<div data-bgcolor="'.$background_color_style.'" data-borderColor="'. $text_border_color_ . '" class="chr-banner-text-inner ' . $text_border_class . '">' . $content_output . '</div>
						</div>
					</div>
				</div>';
    }


    // Banner markup
    $banner_output = '
			<div class="chr-banner  ' . $banner_class . ' ' . $class . '" style="' . $banner_height_style . '">' .
        $banner_link_open_output .
        $image_output .
        $transparan_effect_ .
        $content_output .
        $banner_link_close_output . '
			</div>';

    return $banner_output;
}

add_shortcode('ch_banner', 'CHfw_banner_shortcode');



	