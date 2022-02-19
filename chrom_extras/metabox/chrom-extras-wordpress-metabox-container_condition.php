<?php

// Exit if accessed directly
/*product attribute not install*/
if (!defined('ABSPATH')) {
	exit();
}

function CHfw__conditions_selected_get_meta_simple($value)
{
	global $post;

	return get_post_meta($post->ID, $value, true);
}

function CHfw_mpevent_conditions_selected_get_meta($value)
{
	global $post;

	$field = get_post_meta($post->ID, $value, true);
	if (!empty($field)) {
		return is_array($field) ? stripslashes_deep($field) : stripslashes(wp_kses_decode_entities($field));
	} else {
		return false;
	}
}

function CHfw__mpevent_conditions_selected_add_meta_box()
{
	add_meta_box(
		'_mpevent_conditions_selected-mpevent-department-selected',
		__('Departman Select', '_mpevent_conditions_selected'),
		'CHfw__mpevent_conditions_selected_html',
		'conditions',
		'side',
		'high'
	);
}


function CHfw__mpevent_conditions_selected_html($post)
{
	wp_nonce_field('__mpevent_conditions_selected_nonce', '_mpevent_conditions_selected_nonce'); ?>


    <label for="CHfw_DrAndDep_Select_Departman_Condition">
		<?php _e('Department:', 'CHfw-staff'); ?>
		<?php
		//only root categories
		$myposts_display_conditions_department = get_categories(
			array(
				'child_of' => 0,//root
				'taxonomy' => 'mp-event_category',
				'post_type' => 'mp-event',
				'parent' => 0,
				'orderby' => 'name',
				'order' => 'ASC',
				'hide_empty' => 1,
				'hierarchical' => 1,
				'exclude' => '',
				'include' => '',
				'number' => 0,
				'pad_counts' => true,
			)
		);
		?>
    </label>
    <br>
	<?php ?>
    <select name="CHfw_DrAndDep_Select_Departman_Condition" id="CHfw_DrAndDep_Select_Departman_Condition">
		<?php
		$data_s = "";
		if (!empty($myposts_display_conditions_department)):
			foreach ($myposts_display_conditions_department as $mypost):

				if (CHfw__conditions_selected_get_meta_simple('CHfw_DrAndDep_Select_Departman_Condition') == $mypost->term_id) {
					$data_s = $mypost->term_id;
				}
				?>
                <option
                        value="<?php echo $mypost->term_id ?>" <?php echo (CHfw__conditions_selected_get_meta_simple('CHfw_DrAndDep_Select_Departman_Condition') == $mypost->term_id) ? 'selected' : '' ?>><?php echo $mypost->name ?>
                </option>
			<?php endforeach;
		endif ?>
    </select>


    <br>
    <label for="CHfw_DrAndDep_proAndServices_SubConditions">
		<?php _e('Programs and Services:', 'CHfw-staff'); ?>
    </label>
    <br>
	<?php
	$ch_yes = "";
	if ($data_s != '') {
		$list_child_terms_args = array(
			'taxonomy' => 'mp-event_category',
			'use_desc_for_title' => 0, // best practice: don't use title attributes ever
			'child_of' => $data_s // show only child terms of the current page's
		);
		$root_categories = get_categories($list_child_terms_args);
		if (!empty($root_categories)) {
			$mp_events = array(
				'offset' => 1,
				'post_type' => 'mp-event',
				'posts_per_page' => -1,
				'numberposts' => -1,
				"orderby" => "post_date",
				"order" => "DESC",
				"post_status" => "publish",
				'parent' => 0,
				'tax_query' => array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'mp-event_category',
						'field' => 'term_id',
						'terms' => $root_categories[0]->term_id,
						'include_children' => true,
					),

				)
			);
			$myposts_display_conditions_department = get_posts($mp_events);
			$list_departmen_db = CHfw__conditions_selected_get_meta_simple('CHfw_DrAndDep_proAndServices_SubConditions');

		}
	}
	?>
    <select name="CHfw_DrAndDep_proAndServices_SubConditions"  id="CHfw_DrAndDep_proAndServices_SubConditions">
		<?php foreach ($myposts_display_conditions_department as $cal) :
			if ($cal->ID== $list_departmen_db)
				$ch_yes = "selected";

			?>
            <option value="<?php echo $cal->ID ?>" <?php echo $ch_yes ?>><?php echo $cal->post_title ?></option>
		<?php endforeach ?>
    </select>
<?php } ?>
<?php
function CHfw_mpevent_conditions_selected_save($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	//departman   save
	if (isset($_POST['CHfw_DrAndDep_Select_Departman_Condition'])) {
		update_post_meta($post_id, 'CHfw_DrAndDep_Select_Departman_Condition', sanitize_text_field($_POST['CHfw_DrAndDep_Select_Departman_Condition']));
	}

	//services save
	if (isset($_POST['CHfw_DrAndDep_proAndServices_SubConditions'])) {
		update_post_meta($post_id, 'CHfw_DrAndDep_proAndServices_SubConditions', sanitize_text_field($_POST['CHfw_DrAndDep_proAndServices_SubConditions']));
	}


}


add_action('add_meta_boxes', 'CHfw__mpevent_conditions_selected_add_meta_box');
add_action('save_post', 'CHfw_mpevent_conditions_selected_save');


/*Deparmant ajax request */
function CHfw_mp_DepartmanCondition_ajax_request()
{

	// The $_REQUEST contains all the data sent via ajax
	if (isset($_REQUEST)) {

		$value = $_REQUEST['value'];


		$list_child_terms_args = array(
			'taxonomy' => 'mp-event_category',
			'use_desc_for_title' => 0, // best practice: don't use title attributes ever
			'child_of' => $value // show only child terms of the current page's
		);
		$root_categories = get_categories($list_child_terms_args);
        
		$mp_events = array(
			'offset' => 1,
			'post_type' => 'mp-event',
			'posts_per_page' => -1,
			'numberposts' => -1,
			"orderby" => "post_date",
			"order" => "DESC",
			"post_status" => "publish",
			'parent' => 0,
			'tax_query' => array(
				'relation' => 'OR',
				array(
					'taxonomy' => 'mp-event_category',
					'field' => 'term_id',
					'terms' => $root_categories[0]->term_id,
					'include_children' => true,
				),
			)
		);
		$myposts_display_conditions_department = get_posts($mp_events);
		?>
		<?php foreach ($myposts_display_conditions_department as $mypost) { ?>
            <option value="<?php echo $mypost->ID ?>"><?php echo $mypost->post_title ?></option>
		<?php } ?>

		<?php
	}
	// Always die in functions echoing ajax content
	die();
}
add_action('wp_ajax_CHfw_mp_DepartmanCondition_ajax_request', 'CHfw_mp_DepartmanCondition_ajax_request');
// If you wanted to also use the function for non-logged in users (in a theme for example)
add_action('wp_ajax_nopriv_CHfw_mp_DepartmanCondition_ajax_request', 'CHfw_mp_DepartmanCondition_ajax_request');



