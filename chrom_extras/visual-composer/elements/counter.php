<?php
for ($i = 5; $i <= 30; $i++) {
    $dp['font-size' . $i] = 'font-size' . $i;
}
// VC element: banner
vc_map(array(
    'name' => __('Counter', 'chfw-lang'),
    'category' => __('CH Content', 'chfw-lang'),
    'description' => __('Counter', 'chfw-lang'),
    'base' => 'ch_counter',
    'icon' => 'fa fa-bars',
    'params' => array(

        array(
            'type' => 'textfield',
            'heading' => __('Title', 'chfw-lang'),
            'param_name' => 'title',
            'description' => __('Enter a menu title.', 'chfw-lang')
        ),

        array(
            'type' => 'vc_link',
            'heading' => __('Link (URL)', 'chfw-lang'),
            'param_name' => 'custom_link',
            'description' => __('Set a custom banner link.', 'chfw-lang'),
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
            'type' => 'dropdown',
            'heading' => __('Font Size', 'chfw-lang'),
            'param_name' => 'font_size',
            'description' => __('Select font size.', 'chfw-lang'),
            'value' => $dp,
            'std' => 'font-size12',
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Text Color', 'chfw-lang'),
            'param_name' => 'text_color',
            'description' => __('Set a text color.', 'chfw-lang'),
            'group' => __('Style Setting', 'chfw-lang'),
            'std' => '#fff'
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Text Hover Color', 'chfw-lang'),
            'param_name' => 'text_hover_color',
            'description' => __('Set a text color.', 'chfw-lang'),
            'group' => __('Style Setting', 'chfw-lang'),
            'std' => '#fff'
        ),



        array(
            'type' => 'colorpicker',
            'heading' => __('Background Color', 'chfw-lang'),
            'param_name' => 'background_color',
            'description' => __('Set a background color.', 'chfw-lang'),
            'group' => __('Style Setting', 'chfw-lang'),
            'std' => '#fff'
        ),
        array(
            'type' => 'colorpicker',
            'heading' => __('Background Hover Color', 'chfw-lang'),
            'param_name' => 'background_hover_color',
            'description' => __('Set a background color.', 'chfw-lang'),
            'group' => __('Style Setting', 'chfw-lang'),
            'std' => '#fff'
        ),

        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', 'js_composer'),
            'param_name' => 'icon_fontawesome',
            'group' => __('Icon', 'js_composer'),
            'value' => 'fa fa-adjust', // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                'iconsPerPage' => 4000,
            ),
            'description' => __('Select icon from library.', 'js_composer'),
        ),


        array(
            'type' => 'colorpicker',
            'heading' => __('Icon color', 'js_composer'),
            'param_name' => 'icon_color',
            'group' => __('Icon', 'js_composer'),
            'description' => __('Select icon color.', 'js_composer'),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => array('icon')
            )
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Icon Hover Color', 'chfw-lang'),
            'param_name' => 'icon_hover_color',
            'description' => __('Select icon color.', 'chfw-lang'),
            'group' => __('Icon', 'js_composer'),
            'dependency' => array(
                'element' => 'icon_type',
                'value' => array('icon')
            )
        ),

    )
));
	