<?php

$order_by_values = array(
    '',
    __('Date', 'js_composer') => 'date',
    __('ID', 'js_composer') => 'ID',
    __('Title', 'js_composer') => 'title',
    __('Modified', 'js_composer') => 'modified',
    __('Random', 'js_composer') => 'rand',
    __('Comment count', 'js_composer') => 'comment_count',
    __('Menu order', 'js_composer') => 'menu_order',
);
$order_way_values = array(
    '',
    __('Descending', 'js_composer') => 'DESC',
    __('Ascending', 'js_composer') => 'ASC',
);

$args = array(
    'type' => 'post',
    'child_of' => 0,
    'parent' => '',
    'orderby' => 'id',
    'order' => 'ASC',
    'hide_empty' => false,
    'hierarchical' => 1,
    'exclude' => '',
    'include' => '',
    'number' => '',
    'taxonomy' => 'product_cat',
    'pad_counts' => false,

);
$categories = get_categories($args);

$product_categories_dropdown = array();

/**
 * Get lists of categories.
 * @since 4.5.3
 *
 * @param $parent_id
 * @param $pos
 * @param array $array
 * @param $level
 * @param array $dropdown - passed by  reference
 */
function getCategoryChildsFull($parent_id, $pos, $array, $level, &$dropdown)
{

    for ($i = $pos; $i < count($array); $i++) {
        if ($array[$i]->category_parent == $parent_id) {
            $name = str_repeat("- ", $level) . $array[$i]->name;
            $value = $array[$i]->slug;
            $dropdown[] = array('label' => $name, 'value' => $value);
            getCategoryChildsFull($array[$i]->term_id, $i, $array, $level + 1, $dropdown);
        }
    }
}

getCategoryChildsFull(0, 0, $categories, 0, $product_categories_dropdown);

/**
 * @shortcode product_category
 * @description Show multiple products in a category by slug.
 *
 * @param per_page integer
 * @param columns integer
 * @param orderby array
 * @param order array
 * @param category string
 * Go to: WooCommerce > Products > Categories to find the slug column.
 */
vc_map(array(
    'name' => __('CH Product category', 'js_composer'),
    'base' => 'ch_product_category',
    'icon' => 'fa fa-shopping-cart',
    'category' => __('CH WooCommerce', 'js_composer'),
    'description' => __('Show multiple products in a category', 'js_composer'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => __('Title', 'js_composer'),
            'param_name' => 'title',
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Per page', 'js_composer'),
            'value' => 12,
            'save_always' => true,
            'param_name' => 'per_page',
            'description' => __('How much items per page to show', 'js_composer'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Columns', 'js_composer'),
            'value' => 4,
            'save_always' => true,
            'param_name' => 'columns',
            'description' => __('How much columns grid', 'js_composer'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Order by', 'js_composer'),
            'param_name' => 'orderby',
            'value' => $order_by_values,
            'save_always' => true,
            'description' => sprintf(__('Select how to sort retrieved products. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Sort order', 'js_composer'),
            'param_name' => 'order',
            'value' => $order_way_values,
            'save_always' => true,
            'description' => sprintf(__('Designates the ascending or descending order. More at %s.', 'js_composer'), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>')
        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Category', 'js_composer'),
            'value' => $product_categories_dropdown,
            'param_name' => 'category',
            'save_always' => true,
            'description' => __('Product category list', 'js_composer'),
        ),

        array(
            'type' => 'checkbox',
            'heading' => __('Border', 'chfw-lang'),
            'param_name' => 'border',
            'description' => __('Enable border', 'chfw-lang'),
            'value' => array(
                __('Enable', 'chfw-lang') => 1
            ),
        ),
    )
));

