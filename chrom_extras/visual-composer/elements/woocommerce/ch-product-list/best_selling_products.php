<?php



vc_map( array(
    'name' => __( 'CH Best Selling Products', 'js_composer' ),
    'base' => 'ch_best_selling_products',
    'icon' => 'fa fa-shopping-cart',
    'category' => __('CH WooCommerce', 'js_composer'),
    'description' => __( 'List best selling products on sale', 'js_composer' ),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => __('Title', 'js_composer'),
            'param_name' => 'title',
            'description' => __('Title', 'js_composer'),
            'std'=>__('Best Selling products', 'js_composer'),
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
