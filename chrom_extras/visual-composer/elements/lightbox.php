<?php
vc_map(array(
    'name' => __('Lightbox', 'chfw-lang'),
    'category' => __('CH Content', 'chfw-lang'),
    'description' => __('Lightbox modal with custom content', 'chfw-lang'),
    'base' => 'ch_lightbox',
    'icon' => 'fa fa-square-o',
    'params' => array(


        array(
            'type' => 'dropdown',
            'heading' => __('Link Type', 'chfw-lang'),
            'param_name' => 'link_type',
            'description' => __('Select lightbox link type.', 'chfw-lang'),
            'value' => array(
           /*   __('Link', 'chfw-lang')=> 'link', v2*/
                __('Button', 'chfw-lang') => 'btn',
                 __('Image', 'chfw-lang') => 'image'
            ),
            'std' => 'link'
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Title', 'chfw-lang'),
            'param_name' => 'title',
            'description' => __('Enter a lightbox link/button title.', 'chfw-lang')
        ),
        // Dependency: link_type - btn
        array(
            'type' => 'dropdown',
            'heading' => __('Button Style', 'chfw-lang'),
            'param_name' => 'button_style',
            'description' => __('Select button style.', 'chfw-lang'),
            'value' => array(
                 __('Filled', 'chfw-lang') => 'filled',
                 __('Filled Rounded', 'chfw-lang')=> 'filled_rounded',
                 __('Border', 'chfw-lang') => 'border',
                 __('Border Rounded', 'chfw-lang') => 'border_rounded',
                 __('Link', 'chfw-lang') => 'link'
            ),
            'std' => 'filled',
            'dependency' => array(
                'element' => 'link_type',
                'value' => array('btn')
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Button Align', 'chfw-lang'),
            'param_name' => 'button_align',
            'value' => array(
                  __('Left', 'chfw-lang') => 'left',
                  __('Right', 'chfw-lang') => 'right'
            ),
            'std' => 'center',
            'dependency' => array(
                'element' => 'link_type',
                'value' => array('btn')
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Button Size', 'js_composer'),
            'param_name' => 'button_size',
            'description' => __('Select button size.', 'chfw-lang'),
            'value' => array(
                  __('Mini', 'chfw-lang')=> 'xs',
                  __('Small', 'chfw-lang') => 'sm',
                  __('Normal', 'chfw-lang')=> 'md',
                  __('Large', 'chfw-lang')=> 'lg'
            ),
            'std' => 'lg',
            'dependency' => array(
                'element' => 'link_type',
                'value' => array('btn','link')
            )
        ),
        array(
            'type' => 'colorpicker',
            'heading' => __('Button Color', 'js_composer'),
            'param_name' => 'button_color',
            'description' => __('Select button color.', 'chfw-lang'),
            'dependency' => array(
                'element' => 'link_type',
                'value' => array('btn')
            )
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __('Button Hover Color', 'chfw-lang'),
            'param_name' => 'color_hover_color',
            'description' => __('Button color.', 'chfw-lang'),
            'dependency' => array(
                'element' => 'link_type',
                'value' => array('btn')
            )
        ),

        array(
            'type' => 'colorpicker',
            'heading' => __(' Background Color', 'chfw-lang'),
            'param_name' => 'background_color',
            'description' => __('Select  background color.', 'chfw-lang'),
            'std' => '#000',
            'dependency' => array(
                'element' => 'link_type',
                'value' => array('btn')
            )
        ),
        array(
            'type' => 'colorpicker',
            'heading' => __('Background Hover Color', 'chfw-lang'),
            'param_name' => 'background_hover_color',
            'description' => __('Select background hover color.', 'chfw-lang'),
            'dependency' => array(
                'element' => 'link_type',
                'value' => array('btn')
            )
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
            ),
            'dependency' => array(
                'element' => 'link_type',
                'value' => array('btn')
            )
        ),

        // /Dependency
        // Dependency: link_type - image
        array(
            'type' => 'attach_image',
            'heading' => __('Link Image', 'chfw-lang'),
            'param_name' => 'link_image_id',
            'description' => __('Select image from the media library.', 'chfw-lang'),
            'dependency' => array(
                'element' => 'link_type',
                'value' => array('image')
            )
        ),
        // /Dependency
        array(
            'type' => 'dropdown',
            'heading' => __('Lightbox Type', 'chfw-lang'),
            'param_name' => 'content_type',
            'description' => __('Select content type.', 'chfw-lang'),
            'value' => array(
                 __('Image', 'chfw-lang')  => 'image',
                 __('Video', 'chfw-lang') => 'iframe',
               /*  __('HTML', 'chfw-lang') => 'inline'*/
            ),
            'std' => 'image'
        ),
        // Dependency: content_type - image
        array(
            'type' => 'attach_image',
            'heading' => __('Lightbox Image', 'chfw-lang'),
            'param_name' => 'content_image_id',
            'description' => __('Select image from the media library.', 'chfw-lang'),
            'dependency' => array(
                'element' => 'content_type',
                'value' => array('image')
            )
        ),
        // /Dependency
        // Dependency: content_type - iframe, inline
        array(
            'type' => 'textfield',
            'heading' => __('Lightbox Source', 'chfw-lang'),
            'param_name' => 'content_url',
            'description' => '
					Insert a Video URL or CSS selector for HTML content:
					<br /><br />
					<strong>YouTube video:</strong> http://www.youtube.com/watch?v=XXXXXXXXXXX
					<br />
					<strong>CSS selector:</strong> #info
				',
            'dependency' => array(
                'element' => 'content_type',
                'value' => array('iframe', 'inline')
            )
        ),





    )

));
	