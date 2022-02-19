<?php
/**
 * Visual Composer Element (Sale Products )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_sale_products_f($atts, $content = NULL)
{
    global $CHfw_shortcodes_engine;
    return $CHfw_shortcodes_engine::sale_products($atts);
}

add_shortcode('ch_sale_products', 'CHfw_sale_products_f');