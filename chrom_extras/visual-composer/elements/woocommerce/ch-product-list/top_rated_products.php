<?php

$order_by_values = array(
    '',
    __( 'Date', 'js_composer' ) => 'date',
    __( 'ID', 'js_composer' ) => 'ID',
    __( 'Author', 'js_composer' ) => 'author',
    __( 'Title', 'js_composer' ) => 'title',
    __( 'Modified', 'js_composer' ) => 'modified',
    __( 'Random', 'js_composer' ) => 'rand',
    __( 'Comment count', 'js_composer' ) => 'comment_count',
    __( 'Menu order', 'js_composer' ) => 'menu_order',
);
$order_way_values = array(
    '',
    __( 'Descending', 'js_composer' ) => 'DESC',
    __( 'Ascending', 'js_composer' ) => 'ASC',
);



/**
 * @shortcode top_rated_products
 * @description List top rated products on sale.
 *
 * @param per_page integer
 * @param columns integer
 * @param orderby array
 * @param order array
 */
vc_map( array(
    'name' => __( 'CH Top Rated Products', 'js_composer' ),
    'base' => 'ch_top_rated_products',
    'icon' => 'fa fa-shopping-cart',
    'category' => __('CH WooCommerce', 'js_composer'),
    'description' => __( 'List all products on sale', 'js_composer' ),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => __('Title', 'js_composer'),
            'param_name' => 'title',
            'description' => __('Title', 'js_composer'),
            'std'=>__('Top Rated Products', 'js_composer'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Per page', 'js_composer' ),
            'value' => 4,
            'param_name' => 'per_page',
            'save_always' => true,
            'description' => __( 'How much items per page to show', 'js_composer' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Columns', 'js_composer' ),
            'value' => 4,
            'param_name' => 'columns',
            'save_always' => true,
            'description' => __( 'How much columns grid', 'js_composer' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Order by', 'js_composer' ),
            'param_name' => 'orderby',
            'value' => $order_by_values,
            'save_always' => true,
            'description' => sprintf( __( 'Select how to sort retrieved products. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Sort order', 'js_composer' ),
            'param_name' => 'order',
            'value' => $order_way_values,
            'save_always' => true,
            'description' => sprintf( __( 'Designates the ascending or descending order. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
        ),
        array(
            'type' => 'checkbox',
            'heading' => __('Border', 'chfw-lang'),
            'param_name' => 'border',
            'description' => __('Enable border', 'chfw-lang'),
            'value' => array(
                __('Enable', 'chfw-lang') => 1
            ),
        ),
    )
) );