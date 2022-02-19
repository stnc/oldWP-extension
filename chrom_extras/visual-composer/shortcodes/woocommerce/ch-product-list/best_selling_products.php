<?php
/**
 * Visual Composer Element (Best Selleing Products)
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_best_selling_products_f($atts, $content = NULL)
{
    global $CHfw_shortcodes_engine;
    return $CHfw_shortcodes_engine::best_selling_products($atts);
}

add_shortcode('ch_best_selling_products', 'CHfw_best_selling_products_f');