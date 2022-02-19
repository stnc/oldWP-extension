<?php
// Exit if accessed directly
/*product attribute not install*/
if (!defined('ABSPATH')) {
	exit();
}
$CHfw_woocommerce_enabled = (class_exists('WooCommerce')) ? true : false;
//my shortcode 
include("metabox/chrom-extras-wordpress-shortcode.php");
//metabox 
include("metabox/chrom-extras-wordpress-metabox-container_condition.php");
include("metabox/chrom-extras-wordpress-metabox-container_treatments.php");
include("metabox/chrom-extras-wordpress-metabox-container_provider.php");
include("metabox/chrom-extras-wordpress-metabox-container_res_family.php");
include("metabox/chrom-extras-register_type.php");
/*-----------------------------------------------------------------------------------*/
/*Include external shortcodes
/*-----------------------------------------------------------------------------------*/
function CHfw_ch_vc_register_shortcodes()
{
	global $CHR_cf7_enabled, $CHfw_woocommerce_enabled;
	include('visual-composer/shortcodes/testimonial.php');
	include('visual-composer/shortcodes/banner.php');
	include('visual-composer/shortcodes/menu-builder.php');
	include('visual-composer/shortcodes/testimonials-slider.php');
	include('visual-composer/shortcodes/button.php');
	include('visual-composer/shortcodes/contact-form-7.php');
	include('visual-composer/shortcodes/feature-box.php');
	include('visual-composer/shortcodes/lightbox.php');
	include('visual-composer/shortcodes/post-slider.php');
	include('visual-composer/shortcodes/social-profiles.php');
	include('visual-composer/shortcodes/brand-slider.php');
	include('visual-composer/shortcodes/post.php');
	include('visual-composer/shortcodes/service-box.php');
	include('visual-composer/shortcodes/department_search_box.php');
	include('visual-composer/shortcodes/department_search_box2.php');
	// inc_lude('visual-composer/shortcodes/populer_post_list.php');

	if ($CHfw_woocommerce_enabled) {
		// Include external WooCommerce shortcodes
		include('visual-composer/shortcodes/woocommerce/ch-product-list/products.php');
		include('visual-composer/shortcodes/woocommerce/ch-product-list/recent_products.php');
		include('visual-composer/shortcodes/woocommerce/ch-product-list/product_categories.php');
		include('visual-composer/shortcodes/woocommerce/ch-product-list/featured_products.php');
		include('visual-composer/shortcodes/woocommerce/ch-product-list/sale_products.php');
		include('visual-composer/shortcodes/woocommerce/ch-product-list/best_selling_products.php');
		include('visual-composer/shortcodes/woocommerce/ch-product-list/top_rated_products.php');
		include('visual-composer/shortcodes/woocommerce/isotope_slider.php');
		include('visual-composer/shortcodes/woocommerce/product-categories.php');
		include('visual-composer/shortcodes/woocommerce/products-slider.php');
		include('visual-composer/shortcodes/woocommerce/products-vertical-slider.php');
	}
}

add_action('init', 'CHfw_ch_vc_register_shortcodes');
//vc shortcode
function CHfw_vc_register_elements()
{

	global $CHfw_woocommerce_enabled;
	include('visual-composer/elements/banner.php');
	include('visual-composer/elements/menu-builder.php');
	include('visual-composer/elements/testimonial.php');
	include('visual-composer/elements/testimonials-slider.php');
	include('visual-composer/elements/brand-slider.php');
	include('visual-composer/elements/button.php');
	include('visual-composer/elements/contact-form-7.php');
	include('visual-composer/elements/feature-box.php');

	include('visual-composer/elements/lightbox.php');
	include('visual-composer/elements/post-slider.php');
	include('visual-composer/elements/post.php');
	include('visual-composer/elements/social-profiles.php');
	include('visual-composer/elements/service-box.php');
	include('visual-composer/elements/department_search_box.php');
	include('visual-composer/elements/department_search_box2.php');
	//    inc_lude(  'visual-composer/elements/populer_post_list.php');

	if ($CHfw_woocommerce_enabled) {
		// Include external WooCommerce elements

		include('visual-composer/elements/woocommerce/product-categories.php');
		include('visual-composer/elements/woocommerce/ch-product-list/products.php');
		include('visual-composer/elements/woocommerce/ch-product-list/recent_products.php');
		include('visual-composer/elements/woocommerce/ch-product-list/product_categories.php');
		include('visual-composer/elements/woocommerce/ch-product-list/featured_products.php');
		include('visual-composer/elements/woocommerce/ch-product-list/sale_products.php');
		include('visual-composer/elements/woocommerce/ch-product-list/best_selling_products.php');
		include('visual-composer/elements/woocommerce/ch-product-list/top_rated_products.php');
		include('visual-composer/elements/woocommerce/isotope_slider.php');
		include('visual-composer/elements/woocommerce/products-slider.php');
		include('visual-composer/elements/woocommerce/products-vertical-slider.php');
	}
}

add_action('vc_build_admin_page', 'CHfw_vc_register_elements'); // Note: Using the "vc_build_admin_page" action so external elements are added before default WooCommerce elements


/* --------------------------------------------------------------
 * alternative get template part
 * uses includes/plugins/visual-composer/shortcodes/post-slider.php
 * uses includes/plugins/visual-composer/shortcodes/post.php
-------------------------------------------------------------- */
function CHfw_Staff_get_template_part($pathname, $ch_get_template_part_values = '')
{
	include $pathname . '.php';
}


