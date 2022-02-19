<?php
/**
 * Visual Composer Element (Fetures Products)
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_featured_products_f($atts, $content = NULL)
{
    global $CHfw_shortcodes_engine;
    return $CHfw_shortcodes_engine::featured_products($atts);
}

add_shortcode('ch_featured_products', 'CHfw_featured_products_f');