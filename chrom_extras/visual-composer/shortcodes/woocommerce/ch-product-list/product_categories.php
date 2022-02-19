<?php
/**
 * Visual Composer Element ( Products cat)
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_product_categories_f($atts, $content = NULL)
{
    global $CHfw_shortcodes_engine;
    return $CHfw_shortcodes_engine::product_category($atts);
}

add_shortcode('ch_product_category', 'CHfw_product_categories_f');