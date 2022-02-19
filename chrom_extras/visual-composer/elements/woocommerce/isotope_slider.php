<?php

$order_by_values = array(
	__( 'Date', 'js_composer' )          => 'date',
	__( 'ID', 'js_composer' )            => 'ID',
	__( 'Title', 'js_composer' )         => 'title',
	__( 'Modified', 'js_composer' )      => 'modified',
	__( 'Random', 'js_composer' )        => 'rand',
	__( 'Comment count', 'js_composer' ) => 'comment_count',
	__( 'Menu order', 'js_composer' )    => 'menu_order',
);

$order_way_values = array(
	__( 'Descending', 'js_composer' ) => 'DESC',
	__( 'Ascending', 'js_composer' )  => 'ASC',
);

/*
$effect_list = array(
    __('Bounce', 'js_composer') => 'bounce',
    __('Flash', 'js_composer') => 'flash',
    __('Pulse', 'js_composer') => 'Pulse',
    __('Rubber Band', 'js_composer') => 'rubber-band',
    __('Shake', 'js_composer') => 'shake',
    __('Swing', 'js_composer') => 'Swing',
    __('Tada', 'js_composer') => 'Tada',
    __('Wobble', 'js_composer') => 'Wobble',
    __(' Bounce In', 'js_composer') => 'bounce-in',
    __('Bounce In Down', 'js_composer') => ' bounce-in-down',
    __(' Bounce In Left', 'js_composer') => 'bounce-in-left',
    __('Bounce In Right', 'js_composer') => ' bounce-in-right',
    __('bounce-in-up', 'js_composer') => ' bounce-in-up',
    __(' Fade In', 'js_composer') => 'fade-in',
    __('Fade In Down', 'js_composer') => 'fade-in-down ',
    __(' Fade In Left', 'js_composer') => 'fade-in-left',
    __(' Fade In Right', 'js_composer') => 'fade-in-right',
    __('Fade In Up ', 'js_composer') => 'fade-in-up',
    __('flip', 'js_composer') => 'flip',
    __('Flip In X', 'js_composer') => 'flip-in-x',
    __('flip in Y', 'js_composer') => 'flip-in-Y',
    __('Light Speed In', 'js_composer') => 'light-speed-in',
    __('Roll In', 'js_composer') => 'roll-in',
    __('Rotate In', 'js_composer') => 'rotate-in',
    __('Rotate In Down Left', 'js_composer') => 'rotate-in-down-left',
    __('rotate-in-down-right', 'js_composer') => 'Rotate In Down Right',
    __('Rotate In Up Right', 'js_composer') => 'rotate-in-up-right',
    __('rotate-in-up-left', 'js_composer') => 'rotate-in-up-left',
    __('Slide In Down', 'js_composer') => 'slide-in-down',
    __('Slide In Left', 'js_composer') => 'slide-in-left',
    __('Slide In Right', 'js_composer') => 'slide-in-right',
    __('Slide In Up', 'js_composer') => 'slide-in-up',
    __('Zoom In', 'js_composer') => 'zoom-in',
    __('Zoom In Down', 'js_composer') => 'zoom-in-down',
    __('Zoom In Left', 'js_composer') => 'zoom-in-left',
    __('Zoom In Right', 'js_composer') => 'zoom-in-right',
    __('Zoom In Up', 'js_composer') => 'zoom-in-up',

);
*/

/*

 $categories = get_categories($args);

$product_categories_dropdown = array();

/**
 * Get lists of categories.
 * @since 4.5.3
 *
 * @param $parent_id
 * @param $pos
 * @param array $array
 * @param $level
 * @param array $dropdown - passed by  reference
 */
/*
function getCategoryChildsFull_($parent_id, $pos, $array, $level, &$dropdown)
{

    for ($i = $pos; $i < count($array); $i++) {
        if ($array[$i]->category_parent == $parent_id) {
            $name = str_repeat("- ", $level) . $array[$i]->name;
            $value = $array[$i]->slug;
            $dropdown[] = array('label' => $name, 'value' => $value);
            getCategoryChildsFull($array[$i]->term_id, $i, $array, $level + 1, $dropdown);
        }
    }
}

getCategoryChildsFull_(0, 0, $categories, 0, $product_categories_dropdown);
*/
// Set the options array

//$arr = get_categories();

$args = array(
	'type'         => 'post',
	'child_of'     => 0,
	'parent'       => '',
	'orderby'      => 'id',
	'order'        => 'ASC',
	'hide_empty'   => false,
	'hierarchical' => 1,
	'exclude'      => '',
	'show_count'   => 0,
	'include'      => '',
	'number'       => '',
	'taxonomy'     => 'product_cat',
	'pad_counts'   => false,
);

$arr = get_categories( $args );
//$options_array=array('ALL'=>'all');
$options_array=array();
if ( ! empty( $arr ) ) {
	if ( is_array( $arr ) ) {
		foreach ( $arr as $val ) {
			$options_array[ htmlspecialchars( $val->cat_name ) ] = $val->cat_name;;
		}
	}
}

/**
 * @shortcode product_category
 * @description Show multiple products in a category by slug.
 *
 * @param per_page integer
 * @param columns integer
 * @param orderby array
 * @param order array
 * @param category string
 * Go to: WooCommerce > Products > Categories to find the slug column.
 */
vc_map( array(
	'name'        => __( 'CH ISOTOPE Slider', 'js_composer' ),
	'base'        => 'ch_isotope_slider',
	'icon'        => 'fa fa-bars',
	'category'    => __( 'CH WooCommerce', 'js_composer' ),
	'description' => __( 'Show multiple products in a category', 'js_composer' ),
	'params'      => array(

		array(
			'type'        => 'textfield',
			'heading'     => __( 'Per page', 'js_composer' ),
			'value'       => 40,
			'save_always' => true,
			'param_name'  => 'per_page',
			'description' => __( 'How much items per page to show', 'js_composer' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => __( 'Columns', 'js_composer' ),
			'value'       => 4,
			'save_always' => true,
			'param_name'  => 'columns',
			'description' => __( 'How much columns grid', 'js_composer' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Order by', 'js_composer' ),
			'param_name'  => 'orderby',
			'value'       => $order_by_values,
			'save_always' => true,
			'description' => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Sort order', 'js_composer' ),
			'param_name'  => 'order',
			'value'       => $order_way_values,
			'save_always' => true,
			'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
		),



		array(
			"type"       => "checkbox",
			"class"      => "",
			"heading"    => __( "Categories", "js_composer" ),
			"param_name" => "categories",
			"value"      => $options_array
		)

	)
) );

