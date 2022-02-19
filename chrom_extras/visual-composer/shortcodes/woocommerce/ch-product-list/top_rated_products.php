<?php
/**
 * Visual Composer Element (Top rated Products )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_top_rated_products_f($atts, $content = NULL)
{
    global $CHfw_shortcodes_engine;
    return $CHfw_shortcodes_engine::top_rated_products($atts);
}

add_shortcode('ch_top_rated_products', 'CHfw_top_rated_products_f');