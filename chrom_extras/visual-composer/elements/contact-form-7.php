<?php

	/* Helper: Get Contact Form 7 forms */
	function contact_form7_all() {
		$cf7_forms = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
		
		$forms = array();
		
		if ( $cf7_forms ) {
			foreach ( $cf7_forms as $form )
				$forms[$form->post_title] = $form->ID;
		} else {
			$forms[__( 'No contact forms found', 'chfw-lang' )] = 0;
		}
		
		return $forms;
	}
	

	vc_map( array(
		'name' 			=> __( 'Contact Form 7', 'chfw-lang' ),
			'category'		=> __( 'CH Content', 'chfw-lang' ),
		'description'	=> __( 'Include "Contact Form 7" form', 'chfw-lang' ),
		'base' 			=> 'ch_contact_form_seven',
		'icon' 			=> 'fa fa-envelope',
		'params' 		=> array(
			array(
				'type' 			=> 'textfield',
				'heading' 		=> __( 'Form title', 'chfw-lang' ),
				'param_name'	=> 'title',
				'admin_label'	=> true,
				'description'	=> __( 'Form title (leave blank if no title is needed).', 'chfw-lang' )
			),
			array(
				'type' 			=> 'dropdown',
				'heading' 		=> __( 'Select form', 'chfw-lang' ),
				'param_name' 	=> 'id',
				'description'	=> __( 'Select a previously created contact-form from the list.', 'chfw-lang' ),
				'value' 		=> contact_form7_all()
			)
		)
	) );