<?php

// VC element: sTestimonial
vc_map(array(
    'name' => __('Testimonial', 'chfw-lang'),
    'category'		=> __( 'CH Content', 'chfw-lang' ),
    'description' => __('User testimonial', 'chfw-lang'),
    'base' => 'ch_testimonial',
    'icon' => 'fa fa-user',
    'params' => array(
        array(
            'type' => 'attach_image',
            'heading' => __('Image', 'chfw-lang'),
            'param_name' => 'image_id',
            'description' => __('Author image.', 'chfw-lang')
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Signature', 'chfw-lang'),
            'param_name' => 'signature',
            'description' => __('Author signature.', 'chfw-lang')
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Signature Position', 'chfw-lang'),
            'param_name' => 'signature_position',
            'description' => __('Author Signature Position', 'chfw-lang')
        ),

        array(
            'type' => 'textfield',
            'heading' => __('web Site', 'chfw-lang'),
            'param_name' => 'web_site',
            'description' => __('Web Site Url', 'chfw-lang')
        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Point', 'chfw-lang'),
            'param_name' => 'point',
            'description' => __('Select a point', 'chfw-lang'),
            'value' => array(
                'One' => '20',
                'Two' => '40',
                'Three' => '60',
                'Four' => '80',
                'Five' => '100',
            ),
            'std' => '100'
        ),

        array(
            'type' => 'textfield',
            'heading' => __('Company', 'chfw-lang'),
            'param_name' => 'company',
            'description' => __('Company signature.', 'chfw-lang')
        ),


        array(
            'type' => 'textarea',
            'heading' => __('Description', 'chfw-lang'),
            'param_name' => 'description',
            'description' => __('Testimonial description.', 'chfw-lang')
        )
    )
));
