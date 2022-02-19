<?php

// VC element: ch_doctor_search
vc_map(array(
    'name' => __('Doctor Finder 2', 'chfw-lang'),
    'category' => __('CH Content', 'chfw-lang'),
    'description' => __('Find a doctor', 'chfw-lang'),
    'base' => 'ch_doctor_search2',
    'icon' => 'fa fa-search',
    'params' => array(


        array(
            'type' => 'dropdown',
            'heading' => __('Layout', 'chfw-lang'),
            'param_name' => 'layout',
            'description' => __('Select layout.', 'chfw-lang'),
            'value' => array(
                'On the slide ' => 'onSlide',
                'Native' => 'native',
            ),
            'std' => 'native'
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Text Color', 'chfw-lang'),
            'param_name' => 'text_color',
            'description' => __('Set a text color.', 'chfw-lang'),

        ),


        array(
            'type' => 'colorpicker',
            'heading' => __('Background Color', 'chfw-lang'),
            'param_name' => 'background_color',
            'description' => __('Set a background color.', 'chfw-lang'),


        ),


        array(
            'type' => 'colorpicker',
            'heading' => __('Border Color', 'chfw-lang'),
            'param_name' => 'border_color',
            'description' => __('Set a background color.', 'chfw-lang'),

        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Button Color', 'chfw-lang'),
            'param_name' => 'button_color',
            'description' => __('Set a button color.', 'chfw-lang'),

        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Button Text Color', 'chfw-lang'),
            'param_name' => 'button_text_color',
            'description' => __('Set a button text color.', 'chfw-lang'),

        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Button Border Color', 'chfw-lang'),
            'param_name' => 'button_border_color',
            'description' => __('Set a button boder color.', 'chfw-lang'),

        ),


    )
));
	