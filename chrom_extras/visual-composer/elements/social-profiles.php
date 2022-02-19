<?php

vc_map(array(
    'name' => __('Social Profiles', 'chfw-lang'),
    'category' => __('CH Content', 'chfw-lang'),
    'description' => __('Social media profile icons', 'chfw-lang'),
    'base' => 'ch_social_profiles',
    'icon' => 'fa fa-share-square',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => 'Facebook',
            'param_name' => 'social_profile_facebook',
            'description' => __('Enter your Facebook profile URL.', 'chfw-lang')
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Instagram',
            'param_name' => 'social_profile_instagram',
            'description' => __('Enter your Instagram profile URL.', 'chfw-lang')
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Twitter',
            'param_name' => 'social_profile_twitter',
            'description' => __('Enter your Twitter profile URL.', 'chfw-lang')
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Google+',
            'param_name' => 'social_profile_googleplus',
            'description' => __('Enter your Google+ profile URL.', 'chfw-lang')
        ),
        array(
            'type' => 'textfield',
            'heading' => 'LinedIn',
            'param_name' => 'social_profile_linkedin',
            'description' => __('Enter your LinkedIn profile URL.', 'chfw-lang')
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Pinterest',
            'param_name' => 'social_profile_pinterest',
            'description' => __('Enter your Pinterest profile URL.', 'chfw-lang')
        ),
        array(
            'type' => 'textfield',
            'heading' => 'RSS',
            'param_name' => 'social_profile_rss',
            'description' => __('Enter your RSS feed URL.', 'chfw-lang')
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Tumblr',
            'param_name' => 'social_profile_tumblr',
            'description' => __('Enter your Tumblr profile URL.', 'chfw-lang')
        ),
        array(
            'type' => 'textfield',
            'heading' => 'Github',
            'param_name' => 'social_profile_github',
            'description' => __('Enter your Github profile URL.', 'chfw-lang')
        ),
        array(
            'type' => 'textfield',
            'heading' => 'YouTube',
            'param_name' => 'social_profile_youtube',
            'description' => __('Enter your YouTube profile URL.', 'chfw-lang')
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Icon Size', 'chfw-lang'),
            'param_name' => 'icon_size',
            'description' => __('Select icon size.', 'chfw-lang'),
            'value' => array(
                __('Small', 'chfw-lang') => 'small',
                __('Medium', 'chfw-lang') => 'medium',
                __('Large', 'chfw-lang')=> 'large'
            ),
            'std' => 'medium'
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Style', 'chfw-lang'),
            'param_name' => 'style',
            'description' => __('Select style', 'chfw-lang'),
            'value' => array(
                 __('Standart', 'chfw-lang') => 'standart',
                  __('Rounded', 'chfw-lang') => 'rounded',
            ),
            'std' => 'standart'
        )
        /*	array(
                'type' 			=> 'dropdown',
                'heading' 		=> __( 'Icon Alignment', 'chfw-lang' ),
                'param_name' 	=> 'alignment',
                'description'	=> __( 'Select icon alignment.', 'chfw-lang' ),
                'value' 		=> array(
                    'center'	=> 'center',
                    'Left'		=> 'left',
                    'Right'		=> 'right'
                ),
                'std' 			=> 'center'
            )*/
    )
));
	