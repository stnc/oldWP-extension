<?php

vc_map(array(
    'name' => __('Post', 'chfw-lang'),
    'category' => __('CH Content', 'chfw-lang'),
    'description' => __('Select the posts, which will be display in your blog', 'chfw-lang'),
    'base' => 'ch_post',
    'icon' => 'fa fa-pencil-square-o',
    "is_container" => false,
    'icon_class'=>'no-padding',
    'cells' => '16_16_16_12',
    'js_view'                 => 'ViewTestElement',
    'params' => array(


        array(
            'type' => 'dropdown',
            'heading' => __('Display Type', 'chfw-lang'),
            'param_name' => 'display_type',
            'description' => __('Select display type', 'chfw-lang'),
            'value' => array(
                'Big' => 'posts-big',
                'Medium' => 'posts-medium',
                'Minimal' => 'posts-minimal',
            ),
            'std' => 'posts-minimal'
        ),

        array(
            'type' => 'textfield',
            'param_name' => 'post_in_id',
            'heading' => __('Enter ID numbers', 'chfw-lang'),
            'description' => __('Enter ID numbers, separated by commas', 'chfw-lang'),

        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Number of display', 'chfw-lang'),
            'param_name' => 'num_display_count',
            'description' => __('Enter max number of posts to display.', 'chfw-lang'),
            'value' => array(
                 'Display 1'=> '12',
                 'Display 2' => '6',
                 'Display 3' =>'4',
                 'Display 4' =>'3',
            ),
            'std' => '6'
        ),



        array(
            'type' => 'textfield',
            'heading' => __('Excerpt Length', 'chfw-lang'),
            'param_name' => 'post_excerpt_lenght',
            'description' => __('Change excerpt length of words (By default, excerpt length is set to 55 words)', 'chfw-lang'),

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
             'value' => array(
                 '100%' => '',
                 '90%' => '90',
                 '80%' => '80',
                 '70%' => '70',
                 '60%' => '60',
                 '50%' => '50',
                 '40%' => '40',
                 '30%' => '30',
                 '20%' => '20',
                 '10%' => '10',
                 '0%' => '0',
             ),
             /*getVcShared( 'separator widths' ),*/

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
	