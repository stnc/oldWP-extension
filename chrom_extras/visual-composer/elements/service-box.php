<?php

// VC element: banner
vc_map( array(
	'name'        => __( 'Service Box', 'chfw-lang' ),
	'category'    => __( 'CH Content', 'chfw-lang' ),
	'description' => __( 'Service Box', 'chfw-lang' ),
	'base'        => 'ch_service_box',
	'icon'        => 'fa fa-server',
	'params'      => array(


		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Layout', 'chfw-lang' ),
			'param_name'  => 'layout',
			'description' => __( 'Select layout.', 'chfw-lang' ),
			'value'       => array(
				'Top'             => 'top',
				'Bottom'          => 'bottom',
				'Fade Box'        => 'fadeBox',
				'Slide in Bottom' => 'slideInBottom',
			),
			'std'         => 'top'
		),

		array(
			'type'        => 'attach_image',
			'heading'     => __( 'Image', 'chfw-lang' ),
			'param_name'  => 'picture_staff',
			'description' => __( 'Add a banner image.', 'chfw-lang' )
		),

		array(
			'type'        => 'vc_link',
			'heading'     => __( 'Link (URL)', 'chfw-lang' ),
			'param_name'  => 'link_staff',
			'description' => __( 'Set a custom banner link.', 'chfw-lang' ),
		),

		array(
			'type'        => 'textfield',
			'heading'     => __( 'Title', 'chfw-lang' ),
			'param_name'  => 'title_staff',
			'description' => __( 'Enter a banner title.', 'chfw-lang' )
		),

		array(
			'type'        => 'textarea',
			'heading'     => __( 'Content', 'chfw-lang' ),
			'param_name'  => 'content_fade_and_slide_in_bottom_staff',
			'description' => __( 'Enter a content.', 'chfw-lang' ),
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array( 'fadeBox','slideInBottom' )

			)
		),

		array(
			'type'        => 'textfield',
			'heading'     => __( 'Content', 'chfw-lang' ),
			'param_name'  => 'content_staff',
			'description' => __( 'Enter a content.', 'chfw-lang' ),
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array( 'top' )
			)
		),


		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Text Position', 'chfw-lang' ),
			'param_name'  => 'text_box_position',
			'description' => __( 'Select text position.', 'chfw-lang' ),
			'value'       => array(
				'Center'            => 'service-desc-center',
				'Right'             => 'service-desc-right',
				'Right Out'         => 'service-desc-right-out',
				'Left'              => 'service-desc-left',
				'Left Out'          => 'service-desc-left-out',
				'Full width bottom' => 'service-desc-full-bottom'
			),
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array( 'bottom' )
			),
			'std'         => 'service-desc-center'
		),

		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Background Color', 'chfw-lang' ),
			'param_name'  => 'background_color',
			'description' => __( 'Set a background color.', 'chfw-lang' ),
			'group'       => __( 'Style Setting', 'chfw-lang' ),
			'dependency'  => array(
					'element' => 'layout',
					'value'   => array( 'top','bottom','slideInBottom' )
			),
		),

		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Background Hover Color', 'chfw-lang' ),
			'param_name'  => 'background_hover_color',
			'description' => __( 'Set a background hover color.', 'chfw-lang' ),
			'group'       => __( 'Style Setting', 'chfw-lang' ),
			'dependency'  => array(
					'element' => 'layout',
					'value'   => array( 'top','bottom','slideInBottom' )
			),
		),

		array(
			'type'        => 'colorpicker',
			'heading'     => __( 'Text Color', 'chfw-lang' ),
			'param_name'  => 'text_color',
			'description' => __( 'Set a text color.', 'chfw-lang' ),
			'group'       => __( 'Style Setting', 'chfw-lang' ),
		),

	)
) );
	