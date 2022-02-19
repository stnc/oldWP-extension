<?php

/*buttton vc*/
vc_map(array(
    'name' => __('Button', 'chfw-lang'),
    'category' => __('CH Content', 'chfw-lang'),
    'description' => __('Eye catching button', 'chfw-lang'),
    'base' => 'ch_button',
    'icon' => 'fa fa-stop',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => __('Title', 'chfw-lang'),
            'param_name' => 'title',
            'description' => __('Enter a button title.', 'chfw-lang'),
            'value' => __('Button with Text', 'chfw-lang')
        ),
        array(
            'type' => 'vc_link',
            'heading' => __('URL (Link)', 'chfw-lang'),
            'param_name' => 'link',
            'description' => __('Set a button link.', 'chfw-lang')
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Style', 'chfw-lang'),
            'param_name' => 'style',
            'description' => __('Select button style.', 'chfw-lang'),
            'value' => array(
                 __('Filled', 'chfw-lang') => 'filled',
                 __('Filled Rounded', 'chfw-lang')=> 'filled_rounded',
                 __('Border', 'chfw-lang') => 'border',
                 __('Border Rounded', 'chfw-lang') => 'border_rounded',
                 __('Link', 'chfw-lang') => 'link'

            ),
            'std' => 'filled'
        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Align', 'chfw-lang'),
            'param_name' => 'align',
            'description' => __('Select layout align.', 'chfw-lang'),
            'value' => array(
                    __('Center', 'chfw-lang')=> 'center',
                    __('Left', 'chfw-lang') => 'left',
                    __('Right', 'chfw-lang')=> 'right',
            ),
            'std' => 'center'
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __(' Background Color', 'chfw-lang'),
            'param_name' => 'background_color',
            'description' => __('Select  background color.', 'chfw-lang'),
            'std' => '#000'
        ),
        array(
            'type' => 'colorpicker',
            'heading' => __('Background Hover Color', 'chfw-lang'),
            'param_name' => 'background_hover_color',
            'description' => __('Select background hover color.', 'chfw-lang'),
        ),
        array(
            'type' => 'colorpicker',
            'heading' => __('Border Color', 'chfw-lang'),
            'param_name' => 'border_color',
            'description' => __('Select  background color.', 'chfw-lang'),
             'dependency' => array(
                     'element' => 'style',
                     'value' => 'border'
                 )
        ),
        array(
            'type' => 'colorpicker',
            'heading' => __('Color', 'chfw-lang'),
            'param_name' => 'color',
            'description' => __('Button color.', 'chfw-lang'),
             'std' => '#fff',
         /*   'dependency' => array(
                'element' => 'style',
                'value' => 'link'
            )*/
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Color Hover Color', 'chfw-lang'),
            'param_name' => 'color_hover_color',
            'description' => __('Button color.', 'chfw-lang')
        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Size', 'chfw-lang'),
            'param_name' => 'size',
            'description' => __('Select button size.', 'chfw-lang'),
            'value' => array(
                 __('Large', 'chfw-lang') => 'lg',
                 __('Medium', 'chfw-lang') => 'md',
                 __('Small', 'chfw-lang')=> 'sm',
                  __('Extra Small', 'chfw-lang')=> 'xs'
            ),
            'std' => 'md'
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Icon Align', 'chfw-lang'),
            'param_name' => 'icon_align',
            'description' => __('Select button alignment.', 'chfw-lang'),
            'value' => array(
                 __('Left', 'chfw-lang') => 'left',
                  __('Right', 'chfw-lang') => 'right'
            ),
            'std' => 'left'
        ),

        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', 'chfw-lang'),
            'param_name' => 'icon',
            'description' => __('Select icon from library.', 'chfw-lang'),
            'value' => 'pe-7s-close',  // Default value to backend editor admin_label
            'settings' => array(
                'type' => 'pixeden', // Default type for icons
                'emptyIcon' => false, // Default true, display an "EMPTY" icon?
                'iconsPerPage' => 3000 // Default 100, how many icons per/page to display, we use (big number) to display all icons in single page
            )
        ),



    )
));
	