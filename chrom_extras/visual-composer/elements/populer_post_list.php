<?php

vc_map(array(
    'name' => __('Populer Post List', 'chfw-lang'),
    'category' => __('CH Content', 'chfw-lang'),
    'description' => __('Display posts list', 'chfw-lang'),
    'base' => 'ch_populer_post_list',
    'icon' => 'fa fa-th-list',
   /* "is_container" => false,
    'icon_class'=>'no-padding',
    'cells' => '16_16_16_12',
    'js_view'                 => 'ViewTestElement',*/
    'params' => array(

        array(
            'type' => 'checkbox',
            'heading' => __('Display item author?', 'chfw-lang'),
            'param_name' => 'author_show',
            "value" => array(
                "" => "true"
            ),
            'std' => 0,
        ),

        array(
            'type' => 'checkbox',
            'heading' => __('Display item dates?', 'chfw-lang'),
            'param_name' => 'date_show',
            "value" => array(
                "" => "true"
            ),
            'std' => 0,
        ),
        array(
            'type' => 'checkbox',
            'heading' => __('Display item comments?', 'chfw-lang'),
            'param_name' => 'comments_show',
            "value" => array(
                "" => "true"
            ),
            'std' => 0,
        ),
        array(
            'type' => 'checkbox',
            'heading' => __('Display item picture?', 'chfw-lang'),
            'param_name' => 'picture_show',
            "value" => array(
                "" => "true"
            ),
            'std' => 0,
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Posts', 'chfw-lang'),
            'param_name' => 'num_posts',
            'description' => __('Enter max number of posts to display.', 'chfw-lang'),
            'value' => '4'
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
	