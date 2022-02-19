<?php
/**
 * Visual Composer Element (ISoTope )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_shortcode_shortcode_isotope_product_slider( $atts, $content = null ) {
	global $CHfw_rdx_options, $class_ch_place_holder_image_size;
	wp_enqueue_script( 'CHfw_isotope', CHfw_THEME_URL . '/assets/js/third-party/isotope.pkgd.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'CHfw_isotope' );
	$shop_page_url = get_permalink( get_option( 'woocommerce_shop_page_id' ) );
	$toolkit       = new CHfw_studioToolkit_class();
	$cats_key      = explode( ',', $atts['categories'] );

	foreach ( $cats_key as $key => $cat ) {
		/* $cats_value[] = $toolkit->clean_file_name($cat);  //   $new_data = array_combine($cats_value, $cats_key);*/
		$cats_value_['key'][ $key ]   = $toolkit->seo_friendly_url( $cat );
		$cats_value_['value'][ $key ] = $cat;
	}
	$query_args = array(
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'product_cat'         => esc_attr( $atts['categories'] ),
		'posts_per_page'      => esc_attr( $atts['per_page'] ),
		'orderby'             => esc_attr( $atts['orderby'] ),
		'order'               => esc_attr( $atts['order'] ),
		'meta_query'          => WC()->query->get_meta_query()
	);

	$availability_control = false;

	$discountPercentage     = '';
	$new_badge              = '';
	$CHfw_placeholder_image = '';


	if ( isset( $CHfw_rdx_options['placeholder_image_catalog']['url'] ) && $CHfw_rdx_options['placeholder_image_catalog']['url'] != '' ) {
		$CHfw_placeholder_image = $CHfw_rdx_options['placeholder_image_catalog']['url'];
	} else {
		$CHfw_placeholder_image = wc_placeholder_img_src();
	}


	$products                    = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $query_args, $atts, 'magic_engine___' ) );
	$columns                     = absint( $atts['columns'] );
	$woocommerce_loop['columns'] = $columns;

	if ( empty( $woocommerce_loop['loop'] ) ) {
		$woocommerce_loop['loop'] = 0;
	}

	ob_start();

	if ( $products->have_posts() ):?>
<div class="isotope-filter">
<div class="filter-action filter-action-center">
     <ul data-filter-key="filter">
   <?php
 $cats_value_count=count($cats_value_['key']);
 for ($i=0;$i<$cats_value_count;$i++){
   if ($i==0){
     $current_class='current';
   } else {
    $current_class='';
   }
   ?>
         <li> <a href="#" data-filter-value="<?php    echo $cats_value_['key'][$i]; ?>" class="<?php echo  $current_class ?>">  <?php  echo $cats_value_['value'][$i];   ?></a> </li>
    <?php }  ?>
    </ul>
   </div>
</div>

<script type="text/javascript">
jQuery(window).load(function(){
   var $container = jQuery('.marketing .products-container .ul-products');
      var first_selector= jQuery('.filter-action ul li .current').attr('data-filter-value');
    $container.isotope({
        filter:  '.product_cat-'+first_selector,
        animationOptions: {
                duration: 750,
                easing: 'linear',
                layoutMode: 'fitRows',
                percentPosition: true,
                queue: false
        }
    });

    jQuery('.filter-action ul li a').click(function(){
        jQuery('.filter-action ul li .current').removeClass('current');
        jQuery(this).addClass('current');
        var selector = '.product_cat-'+jQuery(this).attr('data-filter-value');

        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                layoutMode: 'fitRows',
                percentPosition: true,
                queue: false
            }
         });
         return false;
    });
});
   <?php
/*
//dont delete
        var effect = 'animate-ch-bounce-in';
        var temporary_div = '#tempdom';
        jQuery(document).ready(function ($) {
            var $data = jQuery('.marketing ul.ul-products').clone();
            jQuery($data).appendTo('#tempdom');
               var  $filterType_first = jQuery('.isotope-filter .filter-action ul li a.current').attr("data-filter-value");
                 var $data_first = jQuery(temporary_div+' ul').clone();
               var  $filteredData_first = $data_first.find('li.product_cat-'+$filterType_first+'');
                jQuery(".marketing ul li").remove();
                jQuery($filteredData_first).appendTo(".marketing ul");
                jQuery('.marketing ul li').addClass(effect);
            jQuery('.isotope-filter .filter-action ul li a').on('click', function () {
                 var $data = jQuery(temporary_div+' ul').clone();
                jQuery('.isotope-filter .filter-action ul li a').removeClass('current');
                jQuery(this).addClass('current');
                var  $filterType = jQuery(this).attr("data-filter-value");
              //   $filteredData = $data.find('li[data-type=' + $filterType + ']');
               var  $filteredData = $data.find('li.product_cat-'+$filterType+'');
                jQuery(".marketing ul li").remove();
                jQuery($filteredData).appendTo(".marketing ul");
                jQuery('.marketing ul li').addClass(effect);
            });
        });
*/  ?>
</script>

    <div class="marketing">
        <div class="col-lg-12 ch_fwgrid padding-none">
            <div class="products-container padding_zero">
			<ul class="ul-products products grid-sc-xs-1 grid-sc-sm-2 grid-sc-m-3 grid-sc-l-<?php echo $columns;?>">
        <?php
        while ($products->have_posts()):
            $products->the_post();
            global $product, $post;
            $availability = $product->get_availability();

            $woocommerce_loop['loop']++;

            $classes = array();
            if (0 == ($woocommerce_loop['loop'] - 1) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns']) {
                $classes[] = 'first';
            }
            if (0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns']) {
                $classes[] = 'last';
            }
    ?>
        <li  <?php   post_class($classes);?>>
            <div class="item-area">
                <div class="product-image-area">
               <?php  if (isset($CHfw_rdx_options['quick_view_enable']) && $CHfw_rdx_options['quick_view_enable'] == 1) { ?>
                <a href="<?php echo $shop_page_url?>?wc-ajax=chfw_quickview_ajax_request&product_id=<?php echo  $product->get_id() ?>"
                   class="quickview-icon qucikview-ajax-popup"><span>  <?php _e('Quick View', 'chfw-lang') ?> </span></a>
            <?php } ?>

                    <?php
            do_action('woocommerce_before_shop_loop_item');?>

                    <a class="product-image" href="<?php the_permalink();?>">
                        <?php
            // $discountPercentage setting

            if (!$availability_control) {
                if (isset($CHfw_rdx_options['discount_percentage']) && $CHfw_rdx_options['discount_percentage'] != 0) {
                    // https://wordpress.org/support/topic/get-product-price-in-custom-loop
                    $regular_price = get_post_meta(get_the_ID(), '_regular_price', true);
                    $sale_price    = get_post_meta(get_the_ID(), '_sale_price', true);
                    if ($sale_price != '') {
                        $discountPercentage = round((($regular_price - $sale_price) / $regular_price) * 100);
                        $discountPercentage = $discountPercentage . '%';
                        $discountPercentage = '<span class="sale-product-discount-icon">' . $discountPercentage . '</span>';
                        $discountPercentage = ' <div class="product-label product-label-discount"> ' . $discountPercentage . ' </div>';
                    }
                }
                // new badge setting

                if (!$availability_control) {
                    if (isset($CHfw_rdx_options['new_badge']) && $CHfw_rdx_options['new_badge'] != 0) {
                        if ($discountPercentage != '') {
                            $class_top = 'top: 35px;';
                        } else {
                            $class_top = 'top: 5px;';
                            ;
                        }

                        $now            = time();
                        $diff           = (get_the_time('U') > $now) ? get_the_time('U') - $now : $now - get_the_time('U');
                        $val            = floor($diff / 86400);
                        $days           = floor(get_the_time('U') / (86400));
                        $new_badge_time = $CHfw_rdx_options['new_badge_time'];
                        if ($new_badge_time >= $val) {
                            $new_badge = '<span class="new-product-icon">' . __('NEW!', 'woocommerce') . '</span>';
                            $new_badge = ' <div style="right:5px; ' . $class_top . ' " class="product-label product-label-new">
            ' . $new_badge . '
            </div>';
                        }
                    }
                }
            }

            // echo $img = get_the_post_thumbnail( get_the_ID(), array( 150, 150 ) ) ;

            if (has_post_thumbnail()) {

                $hover_image       = '';
                $gallery_image_ids = $product->get_gallery_image_ids();
                if ($gallery_image_ids) {
                    $hover_image_id  = reset($gallery_image_ids); // Get first gallery image id
                    $hover_image_src = wp_get_attachment_image_src($hover_image_id, 'shop_catalog');

                    // Make sure the first image is found (deleted image id's can can still be assigned to the gallery)
                    if ($hover_image_src) {

                        $hover_image = '<img alt="'. $product->get_title().'" src="' . esc_url($hover_image_src[0]) . '" width="' . esc_attr($hover_image_src[1]) . '" height="' . esc_attr($hover_image_src[2]) . '" class="hoverImage img-responsive" />';
                    }

                    echo get_the_post_thumbnail($post->ID, 'shop_catalog', array( 'class' => 'defaultImage img-responsive' ));

                } else {
                    $product_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'shop_catalog');
                    if (!empty($product_thumbnail)) {
                        echo '<img alt="'. $product->get_title().'" src="' . esc_url($product_thumbnail[0]) . '" class="img-responsive" />';
                    } else {
                        echo '<img alt="'. $product->get_title().'" src="' . esc_url($CHfw_placeholder_image) . '" class="img-responsive" />';
                    }

                }


                echo $hover_image;
            } elseif (wc_placeholder_img_src()) {
                echo '<img alt="'. $product->get_title().'" src="' . esc_url($CHfw_placeholder_image) . '" class="attachment-shop-catalog img-responsive" />';
            } else {
                echo '<img alt="'. $product->get_title().'" src="' . esc_url($CHfw_placeholder_image) . '" class="attachment-shop-catalog img-responsive" />';
            }
                ?>
                    </a>
                    <?php

            echo $new_badge . $discountPercentage;


            if (!$availability_control) {
                if ($product->is_on_sale()):
                    echo apply_filters('woocommerce_sale_flash', '<div  class="product-label product-label-sale">
                     <span class="onsale">' . __('Sale!', 'woocommerce') . '</span></div>', $post, $product);
                endif;
            }


            if ($availability['availability'] == 'Out of stock') {
                echo '<div id="out-of-stok-id" class="product-label product-label-out-of-stok" ><span class="stock ' . esc_attr($availability['class']) . '">' . esc_html($availability['availability']) . '</span></div>';
            }

?>
                    <div class="product-hover-box-list-wrap">
                        <ul>
                            <li>
                                <?php
            include get_template_directory() . '/woocommerce/loop/add-to-cart.php';
            ?>
                            </li>

                             <?php if (isset($CHfw_rdx_options['quick_view_enable']) && $CHfw_rdx_options['quick_view_enable'] == 1) { ?>
                        <li><a href="<?php echo $shop_page_url?>?wc-ajax=chfw_quickview_ajax_request&product_id=<?php echo  $product->get_id() ?>"
                               class="qucikview-ajax-popup"
                               data-title="<?php _e('Quick view', 'chfw-lang') ?>">
                                <i class="fa fa-search"></i></a></li>
                    <?php } ?>
            <?php if (in_array('yith-woocommerce-wishlist/init.php', apply_filters('active_plugins', get_option('active_plugins')))) {?>
                                <?php
                echo do_shortcode('[yith_wcwl_add_to_wishlist]');?> </li>
                        <?php    } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="details-area">
                <p class="price">
                 	<a href="<?php the_permalink() ?>"><?php echo wc_price($product->get_price()); ?></a>
                 </p>

                    <?php
            /**
             * ajax
             * https://gist.github.com/webaware/6260326
             *
             * woocommerce_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
            do_action('woocommerce_shop_loop_item_title');?>
                </a>
                <?php
            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            //  do_action('woocommerce_after_shop_loop_item_title');


            /**
             * woocommerce_after_shop_loop_item hook
             *
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            //   do_action('woocommerce_after_shop_loop_item');

?>


            </div>
        </li>

        <?php
        endwhile; // end of the loop.
        echo '</ul></div></div></div>';
	endif;
	wp_reset_postdata();

	return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
}

add_shortcode( 'ch_isotope_slider', 'CHfw_shortcode_shortcode_isotope_product_slider' );