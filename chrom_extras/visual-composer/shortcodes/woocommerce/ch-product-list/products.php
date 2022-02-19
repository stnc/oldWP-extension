<?php
/**
 * Visual Composer Element ( Products )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_products_f($atts, $content = NULL)
{
    global $CHfw_shortcodes_engine;
    return $CHfw_shortcodes_engine::products($atts);
}

add_shortcode('ch-products', 'CHfw_products_f');