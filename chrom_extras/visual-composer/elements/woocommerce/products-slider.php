<?php

/*products sider vc*/
vc_map(array(
    'name' => __('Product Slider (Horizontal)', 'chfw-lang'),
    'category' => __('Content', 'chfw-lang'),
    'description' => __('Create a slider for products', 'chfw-lang'),
    'base' => 'ch_products_slider',
    'icon' => 'fa fa-film',
    'as_parent' => array('only' => 'recent_products,featured_products,sale_products,best_selling_products,top_rated_products,products,product_category'),
    'category' => __('CH WooCommerce', 'js_composer'),
    'controls' => 'full',
    'content_element' => true,
    'show_settings_on_create' => true,
  'js_view' => 'VcColumnView',
    'params' => array(

        array(
            'type' => 'textfield',
            'heading' => __('Title', 'chfw-lang'),
            'param_name' => 'title',
            'description' => __('Title', 'chfw-lang'),
            'std' => 'Products',

        ),
        array(
            'type' => 'textfield',
            'heading' => __('Speed', 'chfw-lang'),
            'param_name' => 'speed',
            'description' => __('Integer: Speed of the transition, in milliseconds (1 second = 1000 milliseconds).', 'chfw-lang'),
            'std' => '500',
        ),


        array(
            'type' => 'checkbox',
            'heading' => __('Autoplay', 'chfw-lang'),
            'param_name' => 'autoplay',
            'description' => __('Enable Autoplay', 'chfw-lang'),
            'value' => array(
                __('Enable', 'chfw-lang') => '1'
            ),
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of slides in default display', 'chfw-lang'),
            'param_name' => 'slide_to_standard_piece',

            'std' => 4,
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 1024px', 'chfw-lang'),
            'param_name' => 'slide_to_1024_piece',

            'std' => 3,
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 768px', 'chfw-lang'),
            'param_name' => 'slide_to_768_piece',

            'std' => 3,
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 600px', 'chfw-lang'),
            'param_name' => 'slide_to_600_piece',

            'std' => 3,
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 480px', 'chfw-lang'),
            'param_name' => 'slide_to_480_piece',

            'std' => '2',
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 375px', 'chfw-lang'),
            'param_name' => 'slide_to_375_piece',

            'std' => '2',

        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 320px', 'chfw-lang'),
            'param_name' => 'slide_to_320_piece',

            'std' => '1',
        ),

    )
));


// Extend element with the WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_CH_Products_Slider extends WPBakeryShortCodesContainer
    {
    }
}
