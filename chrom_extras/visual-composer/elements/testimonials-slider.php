<?php

// VC element: testimonial_slider
vc_map(array(
    'name' => __('Testimonial Slider', 'chfw-lang'),
    'category'		=> __( 'CH Content', 'chfw-lang' ),
    'description' => __('Create a testimonial slider', 'chfw-lang'),
    'base' => 'ch_testimonial_slider',
    'icon' => 'fa fa-users',
    'as_parent' => array('only' => 'ch_testimonial'),
    'controls' => 'full',
    'content_element' => true,
    'show_settings_on_create' => false,
    'js_view' => 'VcColumnView',
    'params' => array(

        array(
            'type' => 'textfield',
            'heading' => __('Timeout', 'chfw-lang'),
            'param_name' => 'timeout',
            'description' => __('Integer: Time between slide transitions, in milliseconds (1 second = 1000 milliseconds).', 'chfw-lang'),
            'std' => '4000',

        ),
        array(
            'type' => 'textfield',
            'heading' => __('Speed', 'chfw-lang'),
            'param_name' => 'speed',
            'description' => __('Integer: Speed of the transition, in milliseconds (1 second = 1000 milliseconds).', 'chfw-lang'),
            'std' => '500',
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Autoplay', 'chfw-lang'),
            'param_name' => 'autoplay',

        ),

        array(
            'type' 			=> 'checkbox',
            'heading' 		=> __( 'Autoplay', 'chfw-lang' ),
            'param_name' 	=> 'autoplay',
            'description'	=> __( 'Enable Autoplay', 'chfw-lang' ),
            'value'			=> array(
                __( 'Enable', 'chfw-lang' )	=> '1'
            ),
            'std' => '500',
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Background Color', 'chfw-lang'),
            'param_name' => 'background_color',
            'description' => __('Set a background color.', 'chfw-lang')
        ),
        array(
            'type' => 'colorpicker',
            'heading' => __('Text Color', 'chfw-lang'),
            'param_name' => 'text_color',
            'description' => __('Set a text color.', 'chfw-lang')
        )
    )
));


// Extend element with the WPBakeryShortCodesContainer class to inherit all required functionality
if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_CH_Testimonial_Slider extends WPBakeryShortCodesContainer
    {
    }
}
