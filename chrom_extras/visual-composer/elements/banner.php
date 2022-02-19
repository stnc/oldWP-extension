<?php

// VC element: banner
vc_map(array(
    'name' => __('Banner', 'chfw-lang'),
    'category' => __('CH Content', 'chfw-lang'),
    'description' => __('Responsive banner', 'chfw-lang'),
    'base' => 'ch_banner',
    'icon' => 'fa fa-cube',
    'params' => array(

        array(
            'type' => 'textfield',
            'heading' => __('Title', 'chfw-lang'),
            'param_name' => 'title',
            'description' => __('Enter a banner title.', 'chfw-lang')
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Title Size', 'chfw-lang'),
            'param_name' => 'title_size',
            'description' => __('Select a title size.', 'chfw-lang'),
            'value' => array(
                'Small' => 'small',
                'Medium' => 'medium',
                'Large' => 'large'
            ),
            'std' => 'small'
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Subtitle', 'chfw-lang'),
            'param_name' => 'subtitle',
            'description' => __('Enter a banner subtitle.', 'chfw-lang')
        ),





        array(
            'type' => 'dropdown',
            'heading' => __('Banner Position', 'chfw-lang'),
            'param_name' => 'banner_position',
            'description' => __('Select banner position.', 'chfw-lang'),
            'value' => array(
                'Center' => 'h_center-v_center',
                'Top Left' => 'h_left-v_top',
                'Top Center' => 'h_center-v_top',
                'Top Right' => 'h_right-v_top',
                'Center Left' => 'h_left-v_center',
                'Center Right' => 'h_right-v_center',
                'Bottom Left' => 'h_left-v_bottom',
                'Bottom Center' => 'h_center-v_bottom',
                'Bottom Right' => 'h_right-v_bottom'
            ),
            'std' => 'h_center-v_center'
        ),



        array(
            'type' => 'vc_link',
            'heading' => __('Link (URL)', 'chfw-lang'),
            'param_name' => 'custom_link',
            'description' => __('Set a custom banner link.', 'chfw-lang'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Link Type', 'chfw-lang'),
            'param_name' => 'link_type',
            'description' => __('Select a link type.', 'chfw-lang'),
            'value' => array(
                'Banner Link' => 'banner_link',
                'Text Link' => 'text_link'
            ),
            'std' => 'banner_link'
        ),


        array(
            'type' => 'dropdown',
            'heading' => __('Text Alignment', 'chfw-lang'),
            'param_name' => 'text_alignment',
            'description' => __('Select text alignment.', 'chfw-lang'),
            'value' => array(
                'Left' => 'align_left',
                'Center' => 'align_center',
                'Right' => 'align_right'
            ),
            'std' => 'align_left'
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Class', 'chfw-lang'),
            'param_name' => 'class',
            'description' => __('Class', 'chfw-lang'),
        ),

        array(
            'type' => 'attach_image',
            'heading' => __('Image', 'chfw-lang'),
            'param_name' => 'image_id',
            'group' => __( 'Style Setting', 'chfw-lang' ),
            'description' => __('Add a banner image.', 'chfw-lang')
        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Image Type', 'chfw-lang'),
            'param_name' => 'image_type',
            'group' => __( 'Style Setting', 'chfw-lang' ),
            'description' => __('Select the banner image type.', 'chfw-lang'),
            'value' => array(
                'Fluid Image' => 'fluid',
                'CSS Background Image' => 'css'
            ),
            'std' => 'fluid'
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Banner Height', 'chfw-lang'),
            'param_name' => 'height',
            'group' => __( 'Style Setting', 'chfw-lang' ),
            'description' => __('Enter banner height (numbers only).', 'chfw-lang'),
            'dependency' => array(
                'element' => 'image_type',
                'value' => array('css')
            )
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Text Color', 'chfw-lang'),
            'param_name' => 'text_color',
            'description' => __('Set a text color.', 'chfw-lang'),
            'group' => __( 'Style Setting', 'chfw-lang' ),
            'std' => '#fff'
        ),

        array(
            'type' => 'checkbox',
            'heading' => __('Text Border', 'chfw-lang'),
            'param_name' => 'text_border',
            'description' => __('Enables Text Border', 'chfw-lang'),
            'group' => __( 'Style Setting', 'chfw-lang' ),
            "value" => array(
                "" => "true"
            ),
            'std' => 0,
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Text Border Color', 'chfw-lang'),
            'param_name' => 'text_border_color',
            'description' => __('Set a Text Border color.', 'chfw-lang'),
            'group' => __( 'Style Setting', 'chfw-lang' ),
            "dependency" => array(
                "element" => "text_border",
                "not_empty" => true
            ),
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Background Color', 'chfw-lang'),
            'param_name' => 'background_color',
            'description' => __('Set a background color.', 'chfw-lang'),
            'group' => __( 'Style Setting', 'chfw-lang' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => __('Picture zoom effect ', 'chfw-lang'),
            'param_name' => 'zoom_effect',
            'description' => __('Enables picture zoom effect ', 'chfw-lang'),
            'group' => __( 'Style Setting', 'chfw-lang' ),
            'value' => array(
                __('Enable', 'chfw-lang') => 1
            ),
            'std' => 0,
        ),

        array(
            'type' => 'checkbox',
            'heading' => __('Enable Picture transparant effect?', 'chfw-lang'),
            'param_name' => 'transparan_effect',
            'description' => __('Enables transparant effect', 'chfw-lang'),
            'group' => __( 'Style Setting', 'chfw-lang' ),
            'value' => array(
                __('Enable', 'chfw-lang') => 1
            ),
            'std' => 0,
        ),

    )
));
	