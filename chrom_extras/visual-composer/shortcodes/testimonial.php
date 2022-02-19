<?php
/**
 * Visual Composer Element (testimonial )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_testimonial($atts, $content = NULL)
{
    extract(shortcode_atts(array(
        'image_id' => '',
        'signature' => '',
        'signature_position' => '',
        'web_site' => '',
        'point' => '100',
        'company' => '',
        'description' => ''
    ), $atts));


    $image_class = $image_output = '';
    if (strlen($image_id) > 0) {
        $image_src = wp_get_attachment_image_src($image_id, 'thumbnail');
        $image_output = '<img src="' . esc_url($image_src[0]) . '" alt="Author image" />';
    }


    $company = (isset($atts['company'])) ? esc_attr($atts['company']) : '';
    $signature = (isset($atts['signature'])) ? esc_attr($atts['signature']) : '';
    $signature_position = (isset($atts['signature_position'])) ? esc_attr($atts['signature_position']) : '';
    $web_site = (isset($atts['web_site'])) ? esc_attr($atts['web_site']) : '';

    return ' <div class="wow-testimonials">
                              <p>' . strip_tags(wpb_js_remove_wpautop($description, true)) . '</p>
                                <div class="ch-user">
                                   ' . $image_output . '
                                    <ul class="ch-user-info">
                                        <li class="testimonial-name">' . $signature . '</li>
                                        <li class="testimonial-role">' . $signature_position . ', ' . $company . '</li>
                                        <li class="testimonial-website"><a href="' . $web_site . '">' . $web_site . '</a></li>
                                        <li class="testimonial-rating clearfix">
                                            <div class="star-rating"><span style="width:' . esc_attr($point) . '%"></span></div>
                                        </li>
                                    </ul>
                                </div>
                        </div>';


}

add_shortcode('ch_testimonial', 'CHfw_testimonial');