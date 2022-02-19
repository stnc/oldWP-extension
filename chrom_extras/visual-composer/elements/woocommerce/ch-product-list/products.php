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
vc_map( array(
    'name' => __( 'CH Products', 'js_composer' ),
    'base' => 'ch-products',
    'icon' => 'fa fa-product-hunt',
    'category' => __('CH WooCommerce', 'js_composer'),
    'description' => __( 'Show multiple products by ID or SKU.', 'js_composer' ),
    'params' => array(

        array(
            'type' => 'textfield',
            'heading' => __( 'Title', 'js_composer' ),
            'value' => 'Products',
            'param_name' => 'title',
            'save_always' => true,
        ),

        array(
            'type' => 'textfield',
            'heading' => __( 'Columns', 'js_composer' ),
            'value' => 4,
            'param_name' => 'columns',
            'save_always' => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Order by', 'js_composer' ),
            'param_name' => 'orderby',
            'value' => $order_by_values,
            'std' => 'title',
            'save_always' => true,
            'description' => sprintf( __( 'Select how to sort retrieved products. More at %s. Default by Title', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Sort order', 'js_composer' ),
            'param_name' => 'order',
            'value' => $order_way_values,
            'save_always' => true,
            'description' => sprintf( __( 'Designates the ascending or descending order. More at %s. Default by ASC', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
        ),
        array(
            'type' => 'autocomplete',
            'heading' => __( 'Products', 'js_composer' ),
            'param_name' => 'ids',
            'settings' => array(
                'multiple' => true,
                'sortable' => true,
                'unique_values' => true,
                    // In UI show results except selected. NB! You should manually check values in backend
            ),
            'save_always' => true,
            'description' => __( 'Enter List of Products', 'js_composer' ),
        ),
        array(
            'type' => 'hidden',
            'param_name' => 'skus',
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

get_template_part('includes/plugins/visual-composer/elements/woocommerce/ch-product-list/autocomplete_suggetions_functions');
//Filters For autocomplete param:
//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
add_filter( 'vc_autocomplete_ch-products_ids_callback',     'productIdAutocompleteSuggester', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_ch-products_ids_render', 'productIdAutocompleteRender', 10, 1 ); // Render exact product. Must return an array (label,value)
//For param: ID default value filter
add_filter( 'vc_form_fields_render_field_ch-products_ids_param_value', 'productsIdsDefaultValue', 10, 4 ); // Defines default value for param if not provided. Takes from other param value.