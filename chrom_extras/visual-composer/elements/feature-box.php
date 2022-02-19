<?php

vc_map( array(
	'name'        => __( 'Feature Box', 'chfw-lang' ),
	'category'    => __( 'CH Content', 'chfw-lang' ),
	'description' => __( 'Feature box with image or icon.', 'chfw-lang' ),
	'base'        => 'ch_feature_box',
	'icon'        => 'fa fa-keyboard-o',
	'params'      => array(


		array(
			'type'        => 'textfield',
			'heading'     => __( 'Title', 'chfw-lang' ),
			'param_name'  => 'title',
			'description' => __( 'Enter a feature title.', 'chfw-lang' )
		),

		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Title layout', 'chfw-lang' ),
			'param_name'  => 'title_layout',
			'description' => __( 'Select title layout', 'chfw-lang' ),
			'value'       => array(
				__( 'Left', 'chfw-lang' )   => 'left',
				__( 'Right', 'chfw-lang' )  => 'right',
				__( 'Center', 'chfw-lang' ) => 'center'

			),
			'std'         => 'center'
		),

		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Color', 'chfw-lang' ),
			'param_name'  => 'color',
			'description' => __( 'Select text color.', 'chfw-lang' ),
		),

		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Title Border', 'chfw-lang' ),
			'param_name'  => 'title_border',
			'description' => __( 'Select title border  type.', 'chfw-lang' ),
			'value'       => array(
				__( 'None', 'chfw-lang' )   => 'none',
				__( 'Border', 'chfw-lang' ) => 'border'
			),
			'std'         => 'border'
		),

		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Title Border Color', 'chfw-lang' ),
			'param_name'  => 'title_border_color',
			'description' => __( 'Select border color.', 'chfw-lang' ),
			'value'       => '2',
			'dependency'  => array(
				'element' => 'title_border',
				'value'   => 'border'
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Layout', 'chfw-lang' ),
			'param_name'  => 'layout',
			'group'       => __( 'Icon', 'js_composer' ),
			'description' => __( 'Select a layout.', 'chfw-lang' ),
			'value'       => array(
				__( 'Default', 'chfw-lang' )   => 'default',
				__( 'Centered', 'chfw-lang' )  => 'centered',
				__( 'Right', 'chfw-lang' )     => 'icon_right',
				__( 'Right Top', 'chfw-lang' ) => 'icon_right_top',
				__( 'Left', 'chfw-lang' )      => 'icon_left',
				__( 'Left Top', 'chfw-lang' )  => 'icon_left_top'
			),
			'std'         => 'default'
		),
		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Icon Size', 'chfw-lang' ),
			'param_name'  => 'icon_size',
			'description' => __( 'Select icon size.', 'chfw-lang' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => array( 'icon' )
			),
			'value'       => array(
				__( 'Small', 'chfw-lang' )  => 'small',
				__( 'Medium', 'chfw-lang' ) => 'medium',
				__( 'Large', 'chfw-lang' )  => 'large'

			),
			'std'         => 'medium'
		),

		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Icon Type', 'chfw-lang' ),
			'param_name'  => 'icon_type',
			'description' => __( 'Select icon type.', 'chfw-lang' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'value'       => array(
				__( 'Font Icon', 'chfw-lang' ) => 'icon',
				__( 'Image', 'chfw-lang' )     => 'image_id'
			),
			'std'         => 'icon'
		),


		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Icon library', 'js_composer' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'value'       => array(
				__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
				__( 'Open Iconic', 'js_composer' )  => 'openiconic',
				__( 'Typicons', 'js_composer' )     => 'typicons',
				__( 'Entypo', 'js_composer' )       => 'entypo',
				__( 'Linecons', 'js_composer' )     => 'linecons',
			),
			'admin_label' => true,
			'param_name'  => 'icon_library_type',
			'description' => __( 'Select icon library.', 'js_composer' ),

			'dependency' => array(
				'element' => 'icon_type',
				'value'   => 'icon'
			)
		),
		array(
			'type'       => 'iconpicker',
			'heading'    => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_fontawesome',
			'group'      => __( 'Icon', 'js_composer' ),
			'value'      => 'fa fa-adjust', // default value to backend editor admin_label
			'settings'   => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'dependency' => array(
				'element' => 'icon_library_type',
				'value'   => 'fontawesome',
			),

			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', 'js_composer' ),
			'param_name'  => 'icon_openiconic',
			'group'       => __( 'Icon', 'js_composer' ),
			'value'       => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
			'settings'    => array(
				'emptyIcon'    => false, // default true, display an "EMPTY" icon?
				'type'         => 'openiconic',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_library_type',
				'value'   => 'openiconic',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', 'js_composer' ),
			'param_name'  => 'icon_typicons',
			'group'       => __( 'Icon', 'js_composer' ),
			'value'       => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
			'settings'    => array(
				'emptyIcon'    => false, // default true, display an "EMPTY" icon?
				'type'         => 'typicons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_library_type',
				'value'   => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type'       => 'iconpicker',
			'heading'    => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_entypo',
			'group'      => __( 'Icon', 'js_composer' ),
			'value'      => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
			'settings'   => array(
				'emptyIcon'    => false, // default true, display an "EMPTY" icon?
				'type'         => 'entypo',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_library_type',
				'value'   => 'entypo',
			),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', 'js_composer' ),
			'param_name'  => 'icon_linecons',
			'group'       => __( 'Icon', 'js_composer' ),
			'value'       => 'vc_li vc_li-heart', // default value to backend editor admin_label
			'settings'    => array(
				'emptyIcon'    => false, // default true, display an "EMPTY" icon?
				'type'         => 'linecons',
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_library_type',
				'value'   => 'linecons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),


		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Icon Style', 'chfw-lang' ),
			'param_name'  => 'icon_style',
			'description' => __( 'Select an icon style.', 'chfw-lang' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'value'       => array(
				'Simple'     => 'simple',
				'Background' => 'background',
				'Border'     => 'border'
			),
			'std'         => 'simple',
		),


		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Icon color', 'js_composer' ),
			'param_name'  => 'icon_color',
			'group'       => __( 'Icon', 'js_composer' ),
			'description' => __( 'Select icon color.', 'js_composer' ),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => array( 'icon' )
			)
		),

		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Icon Hover Color', 'chfw-lang' ),
			'param_name'  => 'icon_hover_color',
			'description' => __( 'Select icon color.', 'chfw-lang' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => array( 'icon' )
			)
		),

			array(
					'type'        => 'dropdown',
					'heading'     => __( 'Icon style', 'chfw-lang' ),
					'param_name'  => 'bg_radius',
					'description' => __( 'Select an icon style.', 'chfw-lang' ),
					'group'       => __( 'Icon', 'js_composer' ),
					'value'       => array(
							'Default'     => 'none',
							'Rounded' => 'y10',
							'Round'     => 'radius'
					),
					'std'         => 'none',
			),
		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Icon Background Color', 'chfw-lang' ),
			'param_name'  => 'icon_background_color',
			'description' => __( 'Select icon background color.', 'chfw-lang' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'dependency'  => array(
				'element' => 'icon_style',
				'value'   => array( 'background' )
			)
		),


		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Icon Background Hover Color', 'chfw-lang' ),
			'param_name'  => 'icon_background_hover_color',
			'description' => __( 'Select icon background hover color.', 'chfw-lang' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'dependency'  => array(
				'element' => 'icon_style',
				'value'   => array( 'background' )
			)
		),

		array(
			'type'        => 'textfield',
			'heading'     => __( 'Border Size', 'chfw-lang' ),
			'param_name'  => 'icon_border_size',
			'description' => __( 'Select icon border size.(px)', 'chfw-lang' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'dependency'  => array(
				'element' => 'icon_style',
				'value'   => array( 'background', 'border' )
			)
		),

		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Border Color', 'chfw-lang' ),
			'param_name'  => 'icon_border_color',
			'description' => __( 'Select icon border color.', 'chfw-lang' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'dependency'  => array(
				'element' => 'icon_style',
				'value'   => array( 'background', 'border' )
			)
		),

		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Border Hover Color', 'chfw-lang' ),
			'param_name'  => 'icon_border_hover_color',
			'description' => __( 'Select icon border color.', 'chfw-lang' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'dependency'  => array(
				'element' => 'icon_style',
				'value'   => array( 'background', 'border' )
			)
		),


		array(
			'type'        => 'attach_image',
			'heading'     => __( 'Image', 'chfw-lang' ),
			'param_name'  => 'image_id',
			'description' => __( 'Select image from the media library.', 'chfw-lang' ),
			'group'       => __( 'Icon', 'js_composer' ),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => array( 'image_id' )
			)
		),
		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Image Style', 'chfw-lang' ),
			'param_name'  => 'image_style',
			'description' => __( 'Select an image style.', 'chfw-lang' ),
			'value'       => array(
				__( 'Default', 'chfw-lang' ) => 'default',
				__( 'Rounded', 'chfw-lang' ) => 'img-circle '
			),
			'std'         => 'default',
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => array( 'image_id' )
			)
		),


		array(
			'type'        => 'textarea_html',
			//'holder' 		=> 'div',
			'heading'     => __( 'Description', 'chfw-lang' ),
			'param_name'  => 'content',
			// Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
			'description' => __( 'Enter a feature description.', 'chfw-lang' )
		),
		array(
			'type'        => 'vc_link',
			'heading'     => __( 'Link', 'chfw-lang' ),
			'param_name'  => 'link',
			'description' => __( 'Add a link after the description.', 'chfw-lang' )
		)
	)
) );
	