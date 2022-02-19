<?php

/*products sider vc*/
vc_map(array(
    'name' => __('Products Slider (Vertical)', 'chfw-lang'),
    'category' => __('Content', 'chfw-lang'),
    'description' => __('Create a vertical slider for products', 'chfw-lang'),
    'base' => 'ch_products_vertical_slider',
    'icon' => 'fa fa-address-card-o',
    'as_parent' => array('only' => 'ch_recent_products,ch_featured_products,ch_sale_products,ch_best_selling_products,ch_top_rated_products,ch_products,ch_product_category'),
    'category' => __('CH WooCommerce', 'js_composer'),
    'controls' => 'full',
    'content_element' => true,
    'show_settings_on_create' => true,
  'js_view' => 'VcColumnView',
    'params' => array(


        array(
            'type' => 'textfield',
            'heading' => __('Speed', 'chfw-lang'),
            'param_name' => 'speed',
            'description' => __('Integer: Speed of the transition, in milliseconds (1 second = 1000 milliseconds).', 'chfw-lang'),
            'std' => '2000',
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

            'std' => 3,
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 1024px', 'chfw-lang'),
            'param_name' => 'slide_to_1024_piece',

            'std' =>6,
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 768px', 'chfw-lang'),
            'param_name' => 'slide_to_768_piece',

            'std' => 4,
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 600px', 'chfw-lang'),
            'param_name' => 'slide_to_600_piece',

            'std' => 4,
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 480px', 'chfw-lang'),
            'param_name' => 'slide_to_480_piece',

            'std' => 3,
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 375px', 'chfw-lang'),
            'param_name' => 'slide_to_375_piece',

            'std' => 3,

        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 320px', 'chfw-lang'),
            'param_name' => 'slide_to_320_piece',

            'std' => 3,

        ),


        array(
            'type' => 'textfield',
            'heading' => __( 'Title', 'js_composer' ),
            'param_name' => 'title',
            'holder' => 'div',
            'value' => __( 'Title', 'js_composer' ),
            'description' => __( 'Add text to separator.', 'js_composer' ),
            'group' => __( 'Separator & Title Setting', 'js_composer' ),
        ),


        array(
            'type' => 'dropdown',
            'heading' => __( 'Title position', 'js_composer' ),
            'param_name' => 'title_align',
            'value' => array(
                __( 'Center', 'js_composer' ) => 'separator_align_center',
                __( 'Left', 'js_composer' ) => 'separator_align_left',
                __( 'Right', 'js_composer' ) => 'separator_align_right',
            ),
            'description' => __( 'Select title location.', 'js_composer' ),
            'group' => __( 'Separator & Title Setting', 'js_composer' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Separator alignment', 'js_composer' ),
            'param_name' => 'align',
            'value' => array(
                __( 'Center', 'js_composer' ) => 'align_center',
                __( 'Left', 'js_composer' ) => 'align_left',
                __( 'Right', 'js_composer' ) => 'align_right',
            ),
            'description' => __( 'Select separator alignment.', 'js_composer' ),
            'group' => __( 'Separator & Title Setting', 'js_composer' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Color', 'js_composer' ),
            'param_name' => 'color',
            'value' => array_merge( getVcShared( 'colors' ), array( __( 'Custom color', 'js_composer' ) => 'custom' ) ),
            'std' => 'grey',
            'description' => __( 'Select color of separator.', 'js_composer' ),
            'param_holder_class' => 'vc_colored-dropdown',
            'group' => __( 'Separator & Title Setting', 'js_composer' ),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => __( 'Custom Color', 'js_composer' ),
            'param_name' => 'accent_color',
            'description' => __( 'Custom separator color for your element.', 'js_composer' ),
            'dependency' => array(
                'element' => 'color',
                'value' => array( 'custom' ),
            ),
            'group' => __( 'Separator & Title Setting', 'js_composer' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Style', 'js_composer' ),
            'param_name' => 'style',
            'value' => getVcShared( 'separator styles' ),
            'description' => __( 'Separator display style.', 'js_composer' ),
            'group' => __( 'Separator & Title Setting', 'js_composer' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Border width', 'js_composer' ),
            'param_name' => 'border_width',
            'value' => getVcShared( 'separator border widths' ),
            'description' => __( 'Select border width (pixels).', 'js_composer' ),
            'group' => __( 'Separator & Title Setting', 'js_composer' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Element width', 'js_composer' ),
            'param_name' => 'el_width',
            'value' => getVcShared( 'separator widths' ),
            'description' => __( 'Separator element width in percents.', 'js_composer' ),
            'group' => __( 'Separator & Title Setting', 'js_composer' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
            'group' => __( 'Separator & Title Setting', 'js_composer' ),
        ),

    )
));


// Extend element with the WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_CH_Products_Vertical_Slider extends WPBakeryShortCodesContainer
    {
    }
}
