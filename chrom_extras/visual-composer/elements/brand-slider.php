<?php

/*brand  sider vc*/
vc_map(array(
    'name' => __('Brand Slider', 'chfw-lang'),
    'category'		=> __( 'CH Content', 'chfw-lang' ),
    'description' => __('Create a Brand slider', 'chfw-lang'),
    'base' => 'ch_brand_slider',
    'icon' => 'fa fa-picture-o',
    'as_parent' => array('only' => 'vc_single_image'),
    'controls' => 'full',
    'content_element' => true,
    'show_settings_on_create' => false,
    "is_container" => true,
    'icon_class'=>'no-padding',
    'cells' => '16_16_16_12',
    'js_view' => 'VcColumnView',
    'category' => __('CH Content', 'chfw-lang'),
    'params' => array(


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
            'std' => 6,
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 1024px', 'chfw-lang'),
            'param_name' => 'slide_to_1024_piece',

            'std' => 5,

        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 768px', 'chfw-lang'),
            'param_name' => 'slide_to_768_piece',

            'std' =>5,


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

            'std' => 2,


        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 375px', 'chfw-lang'),
            'param_name' => 'slide_to_375_piece',

            'std' => 2,


        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 320px', 'chfw-lang'),
            'param_name' => 'slide_to_320_piece',

            'std' => 1,


        ),


    )
));


// Extend element with the WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_CH_Brand_Slider extends WPBakeryShortCodesContainer
    {
    }
}
