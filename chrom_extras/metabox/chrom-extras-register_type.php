<?php

// Exit if accessed directly
/*product attribute not install*/
if (!defined('ABSPATH')) {
	exit();
}

/*
 * Conditons
 * */
function CHfw_create_conditions()
{
	$args = array(
		'labels' => array(
			'all_items' => 'Conditions',
			'menu_name' => 'Conditions',
			'singular_name' => 'Condition',
			'name' => 'Conditions',
			'add_new' => __('Add Condition', 'CHfw-staff'),
			'add_new_item' => __('Add New Condition', 'CHfw-staff'),
			'edit' => __('Edit', 'CHfw-staff'),
			'edit_item' => __('Edit Condition ', 'CHfw-staff'),
			'new_item' => __('New Condition', 'CHfw-staff'),
			'view' => __('View Condition', 'CHfw-staff'),
			'view_item' => __('View Condition', 'CHfw-staff'),
			'search_term' => __('Search Condition', 'CHfw-staff'),
			'parent' => __('Parent Condition', 'CHfw-staff'),
			'search_items' => __('Search Condition', 'CHfw-staff'),
			'not_found' => __('No Condition found.', 'CHfw-staff'),
			'not_found_in_trash' => __('No Condition found in trash.', 'CHfw-staff'),

		),
		'supports' => array(
			'title',
			'excerpt',
			'editor',
			'thumbnail',
		),
		'show_in_menu' => false,
		'show_in_admin_bar' => true,
		'has_archive' => true,
		'public' => true
	);
	register_post_type('conditions', $args);
}

add_action('init', 'CHfw_create_conditions', 0);


/*
 * Treatment
 * */
function CHfw_create_treatments()
{
	$args = array(
		'labels' => array(
			'all_items' => 'Treatments',
			'menu_name' => 'Treatments',
			'singular_name' => 'Treatment',
			'name' => 'Treatments',
			'add_new' => __('Add Treatment', 'CHfw-staff'),
			'add_new_item' => __('Add New Treatment', 'CHfw-staff'),
			'edit' => __('Edit', 'CHfw-staff'),
			'edit_item' => __('Edit Treatment ', 'CHfw-staff'),
			'new_item' => __('New Treatment', 'CHfw-staff'),
			'view' => __('View Treatment', 'CHfw-staff'),
			'view_item' => __('View Treatment', 'CHfw-staff'),
			'search_term' => __('Search Treatment', 'CHfw-staff'),
			'parent' => __('Parent Treatment', 'CHfw-staff'),
			'search_items' => __('Search Treatment', 'CHfw-staff'),
			'not_found' => __('No Treatment found.', 'CHfw-staff'),
			'not_found_in_trash' => __('No Treatment found in trash.', 'CHfw-staff'),

		),
		'supports' => array(
			'title',
			'excerpt',
			'editor',
			'thumbnail',
		),
		'show_in_menu' => false,
		'show_in_admin_bar' => true,
		'has_archive' => true,
		'public' => true
	);
	register_post_type('treatments', $args);
}

add_action('init', 'CHfw_create_treatments', 0);


/*
 * Treatment
 * */
function CHfw_create_providers()
{
	$args = array(
		'labels' => array(
			'all_items' => 'Providers',
			'menu_name' => 'Providers',
			'singular_name' => 'Provider',
			'name' => 'Providers',
			'add_new' => __('Add Provider', 'CHfw-staff'),
			'add_new_item' => __('Add New Provider', 'CHfw-staff'),
			'edit' => __('Edit', 'CHfw-staff'),
			'edit_item' => __('Edit Provider ', 'CHfw-staff'),
			'new_item' => __('New Provider', 'CHfw-staff'),
			'view' => __('View Provider', 'CHfw-staff'),
			'view_item' => __('View Provider', 'CHfw-staff'),
			'search_term' => __('Search Provider', 'CHfw-staff'),
			'parent' => __('Parent Provider', 'CHfw-staff'),
			'search_items' => __('Search Provider', 'CHfw-staff'),
			'not_found' => __('No Provider found.', 'CHfw-staff'),
			'not_found_in_trash' => __('No Provider found in trash.', 'CHfw-staff'),

		),
		'supports' => array(
			'title',
			'excerpt',
			'editor',
			'thumbnail',
		),
		'show_in_menu' => false,
		'show_in_admin_bar' => true,
		'has_archive' => true,
		'public' => true
	);
	register_post_type('providers', $args);
}

add_action('init', 'CHfw_create_providers', 0);


/*
 * Resource Family
 * */

function CHfw_create_resource_family()
{
	$args = array(
		'labels' => array(
			'all_items' => 'Resource Family',
			'menu_name' => 'Providers',
			'singular_name' => 'Resource Family',
			'name' => 'Resource Family',
			'add_new' => __('Add Resource Family', 'CHfw-staff'),
			'add_new_item' => __('Add New Resource Family', 'CHfw-staff'),
			'edit' => __('Edit', 'CHfw-staff'),
			'edit_item' => __('Edit Resource Family ', 'CHfw-staff'),
			'new_item' => __('New Resource Family', 'CHfw-staff'),
			'view' => __('View Resource Family', 'CHfw-staff'),
			'view_item' => __('View Resource Family', 'CHfw-staff'),
			'search_term' => __('Search Resource Family', 'CHfw-staff'),
			'parent' => __('Parent Resource Family', 'CHfw-staff'),
			'search_items' => __('Search Resource Family', 'CHfw-staff'),
			'not_found' => __('No Resource Family found.', 'CHfw-staff'),
			'not_found_in_trash' => __('No Resource Family found in trash.', 'CHfw-staff'),

		),
		'supports' => array(
			'title',
			'excerpt',
			'editor',
			'thumbnail',
		),
		'show_in_menu' => false,
		'show_in_admin_bar' => true,
		'has_archive' => true,
		'public' => true
	);
	register_post_type('resource_family', $args);
}

add_action('init', 'CHfw_create_resource_family', 0);