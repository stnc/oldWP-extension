<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}


class CHfw_products_shortcodes_engine {

	
	/**
	 * List products with an attribute shortcode.
	 * Example [product_attribute attribute='color' filter='black'].
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public static function V2_product_attribute( $atts ) {
		$atts = shortcode_atts( array(
			'per_page'  => '12',
			'columns'   => '4',
			'orderby'   => 'title',
			'order'     => 'asc',
			'border'    => 0,
			'attribute' => '',
			'filter'    => ''
		), $atts );

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $atts['per_page'],
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'meta_query'          => WC()->query->get_meta_query(),
			'tax_query'           => array(
				array(
					'taxonomy' => strstr( $atts['attribute'], 'pa_' ) ? sanitize_title( $atts['attribute'] ) : 'pa_' . sanitize_title( $atts['attribute'] ),
					'terms'    => array_map( 'sanitize_title', explode( ',', $atts['filter'] ) ),
					'field'    => 'slug'
				)
			)
		);

		return self::product_loop( $query_args, $atts, 'product_attribute' );
	}

	/**
	 * Loop over found products.
	 *
	 * @param  array $query_args
	 * @param  array $atts
	 * @param  string $loop_name
	 *
	 * @return string
	 */
	private static function product_loop( $query_args, $atts, $loop_name ) {
		global $woocommerce_loop, $CHfw_rdx_options;
		global $product;
		if ( isset( $CHfw_rdx_options['placeholder_image_shop']['url'] ) && $CHfw_rdx_options['placeholder_image_shop']['url'] != '' ) {
			$CHfw_placeholder_image = $CHfw_rdx_options['placeholder_image_shop']['url'];
		} else {
			// $CHfw_placeholder_image = get_template_directory_uri() . '/assets/placeholder1_catalog_image.jpg';
			$CHfw_placeholder_image = wc_placeholder_img_src();
		}

		$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $query_args, $atts, $loop_name ) );

		$columns                     = absint( $atts['columns'] );
		$woocommerce_loop['columns'] = $columns;

		ob_start();
		$_the_title = '';
		if ( $atts['title'] != "" ) {
			$_the_title = '<h4><span>' . esc_attr( $atts['title'] ) . '</span></h4>';
		}
		$bordered = '';
		if ( $atts['border'] != 0 ) {
			$bordered = 'bordered';
		}

		if ( $products->have_posts() ) :
			?>
			<section class="vc-product-list-container <?php echo $bordered; ?> woocommerce ">
				<h2 class="vc-product-heading clearfix">
					<?php

					echo $_the_title ?>
				</h2>
				<ul class="vc-product-list products-vertical-slider ">
					<?php while ( $products->have_posts() ) :
					$products->the_post();
					$_product = wc_get_product( get_the_ID() );
					//https://wordpress.org/support/topic/display-woocommerce-recent-products-on-home-page
					?>
					<li>
						<a href="<?php the_permalink() ?>">
							<?php
							if ( has_post_thumbnail() ) {

								$product_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'shop_thumbnail' );
								if ( ! empty( $product_thumbnail ) ) {
									echo '<img src="' . esc_url( $product_thumbnail[0] ) . '" alt="' . $products->name . '" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" />';
								} else {
									echo '<img src="' . esc_url( $CHfw_placeholder_image ) . '" alt="' . $products->name . '" class="attachment-shop_thumbnail  placeholderimg size-shop_thumbnail wp-post-image" />';
								}
							} elseif ( wc_placeholder_img_src() ) {
								echo '<img src="' . esc_url( $CHfw_placeholder_image ) . '" alt="' . $products->name . '" class="attachment-shop_thumbnail placeholderimg1 size-shop_thumbnail wp-post-image" />';
							} else {
								echo '<img src="' . esc_url( $CHfw_placeholder_image ) . '" alt="' . $products->name . '" class="attachment-shop_thumbnail placeholderimg2 size-shop_thumbnail wp-post-image" />';
							}
							?>
							<span class="product-title"><?php echo get_the_title(); ?></span>
						</a>
						<?php
						echo $product_price = WC()->cart->get_product_price( $_product );
						?>
						<div class="vc-product-list-star-rating">
							<?php woocommerce_template_loop_rating(); ?>
						</div>
						<?php endwhile; // end of the loop.
						?>
				</ul>
			</section>
		<?php endif;
		wp_reset_postdata();
		return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
	}

	/**
	 * Recent Products shortcode.
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public static function recent_products( $atts ) {
		$atts = shortcode_atts( array(
			'title'    => 'Recent Products',
			'per_page' => '12',
			'columns'  => '4',
			'orderby'  => 'date',
			'order'    => 'desc',
			'border'   => 0,
			'category' => '',  // Slugs
			'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
		), $atts );

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $atts['per_page'],
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'meta_query'          => WC()->query->get_meta_query()
		);

		$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

		return self::product_loop( $query_args, $atts, 'recent_products' );
		//  return $query_args;
	}

	/**
	 * Adds a tax_query index to the query to filter by category.
	 *
	 * @param array $args
	 * @param string $category
	 * @param string $operator
	 *
	 * @return array;
	 * @access private
	 */
	private static function _maybe_add_category_args( $args, $category, $operator ) {
		if ( ! empty( $category ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_cat',
					'terms'    => array_map( 'sanitize_title', explode( ',', $category ) ),
					'field'    => 'slug',
					'operator' => $operator
				)
			);
		}

		return $args;
	}

	/**
	 * List multiple products shortcode.
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public static function products( $atts ) {
		$atts = shortcode_atts( array(
			'title'   => 'Products',
			'columns' => '4',
			'orderby' => 'title',
			'order'   => 'asc',
			'border'  => 0,
			'ids'     => '',
			'skus'    => ''
		), $atts );

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'posts_per_page'      => - 1,
			'meta_query'          => WC()->query->get_meta_query()
		);

		if ( ! empty( $atts['skus'] ) ) {
			$query_args['meta_query'][] = array(
				'key'     => '_sku',
				'value'   => array_map( 'trim', explode( ',', $atts['skus'] ) ),
				'compare' => 'IN'
			);
		}

		if ( ! empty( $atts['ids'] ) ) {
			$query_args['post__in'] = array_map( 'trim', explode( ',', $atts['ids'] ) );
		}

		return self::product_loop( $query_args, $atts, 'products' );
		//return $query_args;
	}

	/**
	 * List products in a category shortcode.
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public static function product_category( $atts ) {
		$atts = shortcode_atts( array(
			'title'    => '',
			'per_page' => '12',
			'columns'  => '4',
			'orderby'  => 'title',
			'order'    => 'desc',
			'border'   => 0,
			'category' => '',  // Slugs
			'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
		), $atts );

		if ( ! $atts['category'] ) {
			return '';
		}

		// Default ordering args
		$ordering_args = WC()->query->get_catalog_ordering_args( $atts['orderby'], $atts['order'] );
		$meta_query    = WC()->query->get_meta_query();
		$query_args    = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'border'              => 0,
			'orderby'             => $ordering_args['orderby'],
			'order'               => $ordering_args['order'],
			'posts_per_page'      => $atts['per_page'],
			'meta_query'          => $meta_query
		);

		$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

		if ( isset( $ordering_args['meta_key'] ) ) {
			$query_args['meta_key'] = $ordering_args['meta_key'];
		}

		$return = self::product_loop( $query_args, $atts, 'product_cat' );

		// Remove ordering query arguments
		WC()->query->remove_ordering_args();

		return $return;
	}

	/**
	 * Display a single product.
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public static function product( $atts ) {
		if ( empty( $atts ) ) {
			return '';
		}

		$meta_query = WC()->query->get_meta_query();

		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => 1,
			'no_found_rows'  => 1,
			'border'         => 0,
			'post_status'    => 'publish',
			'meta_query'     => $meta_query
		);

		if ( isset( $atts['sku'] ) ) {
			$args['meta_query'][] = array(
				'title'   => 'Product',
				'key'     => '_sku',
				'value'   => $atts['sku'],
				'compare' => '='
			);
		}

		if ( isset( $atts['id'] ) ) {
			$args['p'] = $atts['id'];
		}

		ob_start();

		$products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $args, $atts ) );

		if ( $products->have_posts() ) : ?>

			<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		<?php endif;

		wp_reset_postdata();

		$css_class = 'woocommerce cls';

		if ( isset( $atts['class'] ) ) {
			$css_class .= ' ' . $atts['class'];
		}

		return '<div class="' . esc_attr( $css_class ) . '">' . ob_get_clean() . '</div>';
	}

	/**
	 * List all products on sale.
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public static function sale_products( $atts ) {
		$atts = shortcode_atts( array(
			'title'    => 'Sale Products',
			'per_page' => '12',
			'columns'  => '4',
			'border'   => 0,
			'orderby'  => 'title',
			'order'    => 'asc'
		), $atts );

		$query_args = array(
			'posts_per_page' => $atts['per_page'],
			'orderby'        => $atts['orderby'],
			'order'          => $atts['order'],
			'no_found_rows'  => 1,
			'post_status'    => 'publish',
			'post_type'      => 'product',
			'meta_query'     => WC()->query->get_meta_query(),
			'post__in'       => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
		);

		return self::product_loop( $query_args, $atts, 'sale_products' );

	}

	/**
	 * List best selling products on sale.
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public static function best_selling_products( $atts ) {
		$atts = shortcode_atts( array(
			'title'    => 'Best Selling Products',
			'per_page' => '12',
			'border'   => 0,
			'columns'  => '4',
			'category' => '',  // Slugs
			'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
		), $atts );

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $atts['per_page'],
			'meta_key'            => 'total_sales',
			'orderby'             => 'meta_value_num',
			'meta_query'          => WC()->query->get_meta_query()
		);

		$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

		return self::product_loop( $query_args, $atts, 'best_selling_products' );

	}

	/**
	 * List top rated products on sale.
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public static function top_rated_products( $atts ) {
		$atts = shortcode_atts( array(
			'title'    => 'Top Rated Products',
			'per_page' => '12',
			'border'   => 0,
			'columns'  => '4',
			'orderby'  => 'title',
			'order'    => 'asc',
			'category' => '',  // Slugs
			'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
		), $atts );

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'posts_per_page'      => $atts['per_page'],
			'meta_query'          => WC()->query->get_meta_query()
		);

		$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

		add_filter( 'posts_clauses', array( __CLASS__, 'order_by_rating_post_clauses' ) );

		$return = self::product_loop( $query_args, $atts, 'top_rated_products' );

		remove_filter( 'posts_clauses', array( __CLASS__, 'order_by_rating_post_clauses' ) );

		return $return;
	}

	/**
	 * woocommerce_order_by_rating_post_clauses function.
	 *wp-content\plugins\woocommerce\includes\class-wc-shortcodes.php /line 741
	 *
	 * @param array $args
	 *
	 * @return array
	 */
	public static function order_by_rating_post_clauses( $args ) {
		global $wpdb;

		$args['where'] .= " AND $wpdb->commentmeta.meta_key = 'rating' ";
		$args['join'] .= "LEFT JOIN $wpdb->comments ON($wpdb->posts.ID               = $wpdb->comments.comment_post_ID) LEFT JOIN $wpdb->commentmeta ON($wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id)";
		$args['orderby'] = "$wpdb->commentmeta.meta_value DESC";
		$args['groupby'] = "$wpdb->posts.ID";

		return $args;
	}

	/**
	 * Output featured products.
	 *
	 * @param array $atts
	 *
	 * @return string
	 */
	public
	static function featured_products(
		$atts
	) {
		$atts = shortcode_atts( array(
			'title'    => 'Featured Products',
			'per_page' => '12',
			'columns'  => '4',
			'border'   => 0,
			'orderby'  => 'date',
			'order'    => 'desc',
			'category' => '',  // Slugs
			'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
		), $atts );

		$meta_query   = WC()->query->get_meta_query();
		$meta_query[] = array(
			'key'   => '_featured',
			'value' => 'yes'
		);

		$query_args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $atts['per_page'],
			'orderby'             => $atts['orderby'],
			'order'               => $atts['order'],
			'meta_query'          => $meta_query
		);

		$query_args = self::_maybe_add_category_args( $query_args, $atts['category'], $atts['operator'] );

		return self::product_loop( $query_args, $atts, 'featured_products' );

	}
}


$CHfw_shortcodes_engine = new CHfw_products_shortcodes_engine;


/**
 * Ajax Filter Reset Function
 * @author Chrom Themes
 */
function CHfw_ajax_reset_filter_def( $atts) {

	global $wo_ch_filter;

	$before_title='';
	$after_title='';
	$before_widget ='';
	$after_widget ='';
	$instance=array (
		'title'=>'',
		'label'=>'Reset All Filters ',
	);

	$_chosen_attributes =   $wo_ch_filter->get_layered_nav_chosen_attributes();

	// extract( $args );

	$_attributes_array = $wo_ch_filter->yit_wcan_get_product_taxonomy();

	if ( apply_filters( 'yith_wcan_show_widget', ! is_post_type_archive( 'product' ) && ! is_tax( $_attributes_array ) ) ) {
		return;
	}

	// Price
 	$min_price = isset( $_GET['min_price'] ) ? esc_attr( $_GET['min_price'] ) : 0;
	$max_price = isset( $_GET['max_price'] ) ? esc_attr( $_GET['max_price'] ) : 0;

	ob_start();

	if ( count( $_chosen_attributes ) > 0 || $min_price > 0 || $max_price > 0 || apply_filters( 'yith_woocommerce_reset_filters_attributes', false ) ) {
		$title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'], $instance, '12122' ) : '';
		$label = isset( $instance['label'] ) ? apply_filters( 'yith-wcan-reset-navigation-label', $instance['label'], $instance, '122324' ) : '';

		$link = '';

		//clean the url
		if( ! isset( $_GET['source_id'] ) ){
			//$link = yit_curPageURL();
			$link = $wo_ch_filter->yit_get_woocommerce_layered_nav_link();
			foreach ( (array) $_chosen_attributes as $taxonomy => $data ) {
				$taxonomy_filter = str_replace( 'pa_', '', $taxonomy );
				$link            = remove_query_arg( 'filter_' . $taxonomy_filter, $link );
			}

			$link = remove_query_arg( array( 'min_price', 'max_price', 'product_tag' ), $link );
		}

		else{
			//Start filter from Product category Page
			$term = get_term_by( 'id', $_GET['source_id'], 'product_cat' );
			$link = get_term_link( $term, $term->taxonomy  );
		}


		$link = apply_filters( 'yith_woocommerce_reset_filter_link', $link );

		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		$button_class = apply_filters( 'yith-wcan-reset-navigation-button-class', "yith-wcan-reset-navigation button" );
		echo "<div class='yith-wcan'><a class='{$button_class}' href='{$link}'>" .  $label  . "</a></div>";
		echo $after_widget;
		echo ob_get_clean();
	}
	else {
		ob_end_clean();
		printf( '%s%s', str_replace( '>',  ' style="display:none">', $before_widget ), $after_widget );
	}
}


add_shortcode('woo_ajax_reset_filter', 'CHfw_ajax_reset_filter_def');

