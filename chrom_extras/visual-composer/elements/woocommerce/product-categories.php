<?php
	
	// VC element: product_categories
	vc_map(array(
	   'name'			=> __( 'Product Categories', 'chfw-lang' ),
	   'category' => __('CH WooCommerce', 'js_composer'),
	   'description'	=> __( 'Product Categories', 'chfw-lang' ),
	   'base'			=> 'ch_product_categories',
	   'icon'			=> 'fa fa-cart-arrow-down',
	   'params'			=> array(
	   		array(
				'type' 			=> 'textfield',
				'heading' 		=> __( 'Categories to Display', 'chfw-lang' ),
				'param_name' 	=> 'number',
				'description'	=> __( 'Enter the number of product categories you want to display.', 'chfw-lang' )
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> __( 'Columns', 'chfw-lang' ),
				'param_name' 	=> 'columns',
				'description'	=> __( 'Select column number.', 'chfw-lang' ),
				'value' 		=> array(
					'1'	=> '1',
					'2'	=> '2',
					'3'	=> '3',
					'4'	=> '4',
					'5'	=> '5'
				),
				'std'			=> '4'
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> __( 'Order By', 'chfw-lang' ),
				'param_name' 	=> 'orderby',
				'description'	=> __( 'Select categories in order.', 'chfw-lang' ),
				'value'			=> array(
					'None'			=> 'none',
					'ID'			=> 'ID',
					'Name'			=> 'name',
					'Date'			=> 'date',
					'Menu Order'	=> 'menu_order',
					'Random'		=> 'rand'
				),
				'std'			=> 'name'
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> __( 'Order', 'chfw-lang' ),
				'param_name' 	=> 'order',
				'description'	=> __( 'Select order of categories.', 'chfw-lang' ),
				'value'			=> array(
					'Descending'	=> 'desc',
					'Ascending'		=> 'asc'
				),
				'std'			=> 'desc'
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> __( 'Hide Empties', 'chfw-lang' ),
				'param_name' 	=> 'hide_empty',
				'description'	=> __( 'Hide empty categories.', 'chfw-lang' ),
				'value'			=> array(
					'Yes'	=> '1',
					'No'	=> '0'
				),
				'std'			=> '0'
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> __( 'Parent', 'chfw-lang' ),
				'param_name' 	=> 'parent',
				'description'	=> __( 'Enter 0 to  display only top level categories.', 'chfw-lang' )
			),
			array(
				'type' 			=> 'textfield',
				'heading' 		=> __( "ID's", 'chfw-lang' ),
				'param_name' 	=> 'ids',
				'description'	=> __( "Delimit the IDs for category names  by entering comma.", 'chfw-lang' )
			),
			array(
				'type' 			=> 'checkbox',
				'heading' 		=> __( 'Packery Grid', 'chfw-lang' ),
				'param_name' 	=> 'packery',
				'description'	=> __( 'Enable packery grid layout.', 'chfw-lang' ),
				'value'			=> array(
					__( 'Enable', 'chfw-lang' ) => '1'
				)
			)
	   )
	));
	