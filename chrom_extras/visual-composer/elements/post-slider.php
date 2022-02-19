<?php
/* Get post categories */
function get_post_categories() {
	$args = array(
		'type'         => 'post',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'name',
		'order'        => 'ASC',
		'hide_empty'   => 1,
		'hierarchical' => 1,
		'exclude'      => '',
		'include'      => '',
		'number'       => '',
		'taxonomy'     => 'category',
		'pad_counts'   => false
	);

	$categories = get_categories( $args );

//	$return = array( 'All' => '' );
    $return = array();
	foreach ( $categories as $category ) {
		$return[ htmlspecialchars_decode( $category->name ) ] = $category->slug;
	}

	return $return;
}


vc_map(array(
    'name' => __('Post Slider', 'chfw-lang'),
    'category' => __('CH Content', 'chfw-lang'),
    'description' => __('Select the posts, which will be display in your blog', 'chfw-lang'),
    'base' => 'ch_post_slider',
    'icon' => 'fa fa-film',
    "is_container" => false,
    'icon_class'=>'no-padding',
    'cells' => '16_16_16_12',
    'js_view'                 => 'ViewTestElement',
    'params' => array(

        array(
            'type' => 'dropdown',
            'heading' => __('Display Pattern', 'chfw-lang'),
            'param_name' => 'display_pattern',
            'description' => __('Select display pattern', 'chfw-lang'),
            'value' => array(
                'Post ID' => 'post_id',
                'Category'=> 'category',
            ),
            'std' => 'category'
        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Category', 'chfw-lang'),
            'param_name' => 'category',
            'description' => __('Filter by post category.', 'chfw-lang'),
            'value' => get_post_categories(),
            'dependency' => array(
                'element' => 'display_pattern',
                'value' => 'category'
            )
        ),
        array(
            'type' => 'textfield',
            'param_name' => 'post_in_id',
            'heading' => __('Enter ID numbers', 'chfw-lang'),
            'description' => __('Enter ID numbers, separated by commas', 'chfw-lang'),
            'dependency' => array(
                'element' => 'display_pattern',
                'value' => 'post_id'
            )
        ),
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
            'heading' => __('Excerpt Length', 'chfw-lang'),
            'param_name' => 'post_excerpt_lenght',
            'description' => __('Change excerpt length of words (By default, excerpt length is set to 55 words)', 'chfw-lang'),

        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Posts', 'chfw-lang'),
            'param_name' => 'num_posts',
            'description' => __('Enter max number of posts to display.', 'chfw-lang'),
            'value' => '4'
        ),






        /*  array(
              'type' => 'checkbox',
              'heading' => __('Post Excerpt', 'chfw-lang'),
              'param_name' => 'post_excerpt',
              'description' => __('Display post excerpt.', 'chfw-lang'),
              'value' => array(
                  __('Enable', 'chfw-lang') => '1'
              ),
              'std' => '1'
          )*/
        /*
			v3 array(
				  'type' => 'dropdown',
				  'heading' => __('Slider view type', 'chfw-lang'),
				  'param_name' => 'slider_type',
				  'description' => __('Vertical slide mode', 'chfw-lang'),
				  'group' => __( 'Slider Setting', 'chfw-lang' ),
				  'value' => array(
					  'Horizontal' => 'horizontal',
					  'Vertical' => 'vertical',
				  ),

			  ),*/

        array(
            'type' => 'dropdown',
            'heading' => __('Slide To Scroll ', 'chfw-lang'),
            'param_name' => 'slide_to_scroll',
            'description' => __(' of slides to scroll at a time', 'chfw-lang'),
            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'value' => array(
                '2' => '2',
                '3' => '3',
                '4' => '4',
            ),

        ),

        array(
            'type' => 'checkbox',
            'heading' => __('Slide Autoplay', 'chfw-lang'),
            'param_name' => 'autoplay',
            'description' => __('Enables auto play of slides', 'chfw-lang'),
            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'value' => array(
                __('Enable', 'chfw-lang') => 1
            ),
            'std' => 1,
        ),

        array(
            'type' => 'checkbox',
            'heading' => __('Slide To infinite', 'chfw-lang'),
            'param_name' => 'infinite',
            'description' => __('Infinite looping', 'chfw-lang'),
            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'value' => array(
                __('Enable', 'chfw-lang') => 1
            ),
            'std' => 1,

        ),


        array(
            'type' => 'checkbox',
            'heading' => __('Slide arrows', 'chfw-lang'),
            'param_name' => 'arrows',
            'description' => __('Enable Next/Prev arrows', 'chfw-lang'),
            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'value' => array(
                __('Enable', 'chfw-lang') => 1
            ),
            'std' => 1,

        ),

        array(
            'type' => 'checkbox',
            'heading' => __('Select Slide Dot', 'chfw-lang'),
            'param_name' => 'dots',
            'description' => __('Select indicator dot for current slide', 'chfw-lang'),
            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'value' => array(
                __('Enable', 'chfw-lang') => 1
            ),
            'std' => 1,

        ),

        array(
            'type' => 'textfield',
            'heading' => __('Time interval of auto play', 'chfw-lang'),
            'param_name' => 'autoplay_speed',
            'description' => __('Enter time interval of auto play  (eq 1000 value = 1 second)', 'chfw-lang'),
            'group' => __( 'Slider Setting', 'chfw-lang' ),

        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of slides in default display', 'chfw-lang'),
            'param_name' => 'slide_to_standard_piece',
            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'std' => 4,
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 1024px', 'chfw-lang'),
            'param_name' => 'slide_to_1024_piece',

            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'std' => 3,
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 768px', 'chfw-lang'),
            'param_name' => 'slide_to_768_piece',

            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'std' => 3,
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 600px', 'chfw-lang'),
            'param_name' => 'slide_to_600_piece',

            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'std' => 3,
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 480px', 'chfw-lang'),
            'param_name' => 'slide_to_480_piece',

            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'std' => '2',
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 375px', 'chfw-lang'),
            'param_name' => 'slide_to_375_piece',

            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'std' => '2',

        ),
        array(
            'type' => 'textfield',
            'heading' => __('Number of Slides to display in 320px', 'chfw-lang'),
            'param_name' => 'slide_to_320_piece',

            'group' => __( 'Slider Setting', 'chfw-lang' ),
            'std' => '1',
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
     /*  array(
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

         //  getVcShared( 'separator widths' ),

             'description' => __( 'Separator element width in percents.', 'js_composer' ),
             'group' => __( 'Separator & Title Setting', 'js_composer' ),
         ),*/
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'js_composer' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'js_composer' ),
            'group' => __( 'Separator & Title Setting', 'js_composer' ),
        ),



    )
));
	