<?php
/**
 * Visual Composer Element (product categories )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
	function CHfw_shortcode_product_categories( $atts, $content = NULL ) {
		global $woocommerce_loop;
		
		// Columns (large column is set via shortcode attribute)
		$woocommerce_loop['columns_small'] = '1';
		$woocommerce_loop['columns_medium'] = '2';
		
		if ( isset( $atts['packery'] ) && $atts['packery'] === '1' ) {
			
			$packery_class = 'packery-enabled ch-loader';
		} else {
			$packery_class = '';
		}
		
		return '<div class="ch-product-categories ch_fwgrid ' . $packery_class . '">' . WC_Shortcodes::product_categories( $atts ) . '</div>';
	}
	
	add_shortcode( 'ch_product_categories', 'CHfw_shortcode_product_categories' );
	