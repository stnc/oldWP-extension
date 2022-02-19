<?php
/**
 * Visual Composer Element (Recent Products )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_recent_products_f($atts, $content = NULL)
{
    global $CHfw_shortcodes_engine;
    return $CHfw_shortcodes_engine::recent_products($atts);
}

add_shortcode('ch_recent_products', 'CHfw_recent_products_f');