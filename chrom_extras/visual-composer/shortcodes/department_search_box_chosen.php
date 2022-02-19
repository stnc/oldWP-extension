<?php

/**
 * Visual Composer Element (testimonial )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
Class SearchProcess_Component
{
	/**
	 * language list
	 * @return array
	 * */
	public function langugeList()
	{

		return get_categories(
			array(
				'parent' => 0,
				'taxonomy' => 'staff_languages',
				'post_type' => 'staff',
			)
		);
	}

	/**
	 * Location and Hospital list
	 * @return array
	 * */
	public function CHfw_hospitalList()
	{
		$i = 0;
		$hospitalList = array();
		$args = array(
			'post_type' => 'locations',
			'parent' => 0,
			'hide_empty' => 0,
			'posts_per_page' => -1,
			"post_status" => "publish",
		);
		$wp_query_prog_services = new WP_Query($args);
		if ($wp_query_prog_services->have_posts()) {
			while ($wp_query_prog_services->have_posts()) {
				$i++;
				$wp_query_prog_services->the_post();
				unset($previousday);
				$hospitalList[$i]["id"] = get_the_ID();
				$hospitalList[$i]["title"] = get_the_title();
				$hospitalList[$i]["link"] = get_the_permalink() . '?ref=r';
			}
			wp_reset_postdata();
			return $hospitalList;
		}
	}

	/**
	 * Departman root list
	 * @return array
	 * */
	public function DepartmanRootList()
	{
		return get_categories(
			array(
				'parent' => 0,
				'taxonomy' => 'mp-event_category',
				'post_type' => 'mp-event',
			)
		);
	}

	/**
	 * Departman And Relation Category List
	 *
	 * @param array $categories
	 * @param int $postId
	 * @return array
	 * */
	public function DepartmanAndRelationCategoriesListAll()
	{
		$only_root = false;
		$only_root2 = true;
		$i = 0;
		if ($only_root) {
			$list_child_terms_args = array(
				'parent' => 0,
				'taxonomy' => 'mp-event_category',
				'post_type' => 'mp-event',
			);

		} else {
			$list_child_terms_args = array(

				'taxonomy' => 'mp-event_category',
				'post_type' => 'mp-event',
			);

		}

		$newResult = array();
		$newResult2 = get_categories($list_child_terms_args);

		foreach ($newResult2 as $newRes) {
			$newResult[] = $newRes->slug;
		}


		if (!$newResult == "") {
			$args = array(
				'post_type' => 'mp-event',
				'child_of' => 1,
				'parent' => 1,
				'hide_empty' => 0,
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC',
				"post_status" => "publish",
				'tax_query' => array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'mp-event_category',
						'field' => 'slug',
						'terms' => $newResult,
						'include_children' => false,
					),
				)
			);
			$wp_query_prog_services = new WP_Query($args);

			if ($wp_query_prog_services->have_posts()) {
				while ($wp_query_prog_services->have_posts()) {
					$wp_query_prog_services->the_post();
					get_post_format();
					unset($previousday);

					$i++;
					$SubDepartmansList[$i]['title'] = get_the_title();
					$SubDepartmansList[$i]['id'] = get_the_ID();
					$SubDepartmansList[$i]['slug'] = $wp_query_prog_services->post->post_name;
					$SubDepartmansList[$i]['catID'] = $this->DepartmanAndRelationCategoriesListAll_cat_find($wp_query_prog_services->post->ID);
				}
				wp_reset_postdata();
				return $SubDepartmansList;
			}
		}
	}

	public function DepartmanAndRelationCategoriesListAll_cat_find($id)
	{
		$d = $this->CHfw_get_the_categoryMpEvent($id);
		//print_r($d);
		return ($d[0]->category_parent);
	}

	/**
	 * Retrieve post categories only mp-event_category orginal get_the_category()
	 * @param int $id
	 * @return array
	 * */
	public function CHfw_get_the_categoryMpEvent($id = false)
	{
		$categories = get_the_terms($id, 'mp-event_category');
		if (!$categories || is_wp_error($categories))
			$categories = array();

		$categories = array_values($categories);

		foreach (array_keys($categories) as $key) {
			_make_cat_compat($categories[$key]);
		}
		return apply_filters('get_the_categories', $categories, $id);
	}

	public function DepartmanRootListHTML($list)
	{
		$out = "";
		if (!empty($list)) :
			$out .= '<select name="departmans" id="Departmans" class="sub-menu">';
			foreach ($list as $DepartmanRootList) {
				if (isset($_GET['departmans']) && sanitize_text_field($_GET['departmans']) == $DepartmanRootList->term_id) {
					$out .= '<option  selected="selected" value="' . $DepartmanRootList->term_id . '">' . $DepartmanRootList->name . '</option>';

				} else {
					$out .= '<option  value="' . $DepartmanRootList->term_id . '">' . $DepartmanRootList->name . '</option>';
				}
			}

			$out .= '</select>';
		endif;
		return $out;
	}

	public function DepartmanAndRelationCategoriesListAllHTML($list)
	{

		$out = "";
		if (!empty($list)):
			$out .= '<select id="subDepartmans" name="subDepartman" class="sub-menu">';
			foreach ($list as $depRelCat) {
				if (isset($_GET['subDepartman']) && sanitize_text_field($_GET['subDepartman']) == $depRelCat['id']) {
					$out .= '<option selected="selected" class="' . $depRelCat['catID'] . '" value="' . $depRelCat['id'] . '">' . $depRelCat['title'] . '</option>';
				} else {
					$out .= '<option class="' . $depRelCat['catID'] . '" value="' . $depRelCat['id'] . '">' . $depRelCat['title'] . '</option>';

				}
			}
			$out .= '</select>';
		endif;
		return $out;
	}

	public function selectOptions()
	{
		$out = "";
		if (isset($_GET['gender']) && sanitize_text_field($_GET['gender']) == "male") :
			$out .= '<option selected="selected" value="male">';
			$out .= __("Male", "chfw-lang");
			$out .= '</option>';
		else:
			$out .= '<option value="male">';
			$out .= __('Male', 'chfw-lang');
			$out .= '</option>';
		endif;
		if (isset($_GET['gender']) && sanitize_text_field($_GET['gender']) == "female") :
			$out .= '<option selected="selected" value="female">';
			$out .= __("Female", "chfw-lang");
			$out .= '</option>';
		else:
			$out .= '<option value="female">';
			$out .= __("Female", 'chfw-lang');
			$out .= '</option>';
		endif;
		return $out;
	}

	public function langugeListHTML($list)
	{
		$out = "";
		$languages = array();
		if (isset($_GET['language']) && $_GET['language'] != "") {
			foreach ($_GET['language'] as $lng) {
				$languages[] = sanitize_text_field($lng);
			}
		}
		if (!empty($list)):
			$out .= '<select data-placeholder=" ' . __("Choose a languges...", "chfw-lang") . '" id="Languges" name="language[]"multiple class="chosen-select sub-menu">';
			foreach ($list as $lang) {
				if (in_array($lang->slug, $languages)) {
					$ch_yes = 'selected="selected"';
					$out .= '<option ' . $ch_yes . '  value="' . $lang->slug . '">' . $lang->name . '</option>';
				} else {
					$out .= '<option  value="' . $lang->slug . '">' . $lang->name . '</option>';
				}
			}
			$out .= '</select>';
		endif;
		return $out;
	}

	public function CHfw_hospitalListHTML($list)
	{
		$out = "";

		if (!empty($list)):
			$out .= '<select id="locations" name="location" class="sub-menu">';
			foreach ($list as $DepartmanRootList) {
				if (isset($_GET['location']) && sanitize_text_field($_GET['location']) == $DepartmanRootList['id']) {
					$out .= '<option  selected="selected" value="' . $DepartmanRootList['id'] . '">' . $DepartmanRootList['title'] . '</option>';
				} else {
					$out .= '<option  value="' . $DepartmanRootList['id'] . '">' . $DepartmanRootList['title'] . '</option>';
				}
			}
			$out .= '</select>';
		endif;
		return $out;
	}


}

function CHfw_StaffProgramAndServices_Component($id)
{
	$var = get_post_meta($id, 'CHfw_DrAndDep_program_and_services', true);

	$vars = explode(',', $var);

	return CHfw_get_the_title_Custom_Component($vars);
}

/*@uses  StaffProgramAndServices () top func*/
function CHfw_get_the_title_Custom_Component($post = 0, $returnType = 'string')
{

	$arrays_key = array();
	$i = 0;
	$args = array(
		'post_type' => 'mp-event',
		'post__in' => $post,
		'hide_empty' => 0,
		'posts_per_page' => -1,
		"post_status" => "publish",
	);
	$arrays_keyString = "";
	$wp_query_ = new WP_Query($args);

	if ($wp_query_->have_posts()) {
		while ($wp_query_->have_posts()) {
			$i++;
			$wp_query_->the_post();
			unset($previousday);
			if ($returnType == 'string') {
				$arrays_keyString .= get_the_title() . ',';
			}
			$arrays_key[$i]["title"] = get_the_title();
		}
	}
	unset($wp_query_);
	if ($returnType == 'array') {
		return $arrays_key;
	} else {
		return substr($arrays_keyString, 0, -1);;
	}
}

function CHfw_serach($atts, $content = NULL)
{
	extract(shortcode_atts(array(
		'title' => '',
		'text_color' => '',
		'background_color' => '',
		'border_color' => '',
		'button_color' => '',
		'button_text_color' => '',
		'button_border_color' => '',

	), $atts));


	$title = (isset($atts['title'])) ? esc_attr($atts['title']) : 'FIND A DOCTOR';
	$text_color = (isset($atts['text_color'])) ? esc_attr($atts['text_color']) : '#000';
	$background_color= (isset($atts['background_color'])) ? esc_attr($atts['background_color']) : '#f2f2f2';
	$border_color = (isset($atts['border_color'])) ? esc_attr($atts['border_color']) : '#ddd';
	$button_color = (isset($atts['button_color'])) ? esc_attr($atts['button_color']) : '#000';
	$button_text_color = (isset($atts['button_text_color'])) ? esc_attr($atts['button_text_color']) : '#fff';
	$button_border_color = (isset($atts['button_border_color'])) ? esc_attr($atts['button_border_color']) : '#fff';

	/*Component elemnents*/

	$firstname = isset($_GET['firstname']) ? sanitize_text_field($_GET['firstname']) : false;
	$departmans = isset($_GET['departmans']) ? sanitize_text_field($_GET['departmans']) : false;
	$subDepartman = isset($_GET['subDepartman']) ? sanitize_text_field($_GET['subDepartman']) : false;
	$location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : false;

	$search_field_component = new SearchProcess_Component();


	$DepartmanRootListHTML = $search_field_component->DepartmanRootListHTML($search_field_component->DepartmanRootList());
	$DepartmanAndRelationCategoriesListAllHTML = $search_field_component->DepartmanAndRelationCategoriesListAllHTML($search_field_component->DepartmanAndRelationCategoriesListAll());
	$langugeListHTML = $search_field_component->langugeListHTML($search_field_component->langugeList());
	$CHfw_hospitalListHTML = $search_field_component->CHfw_hospitalListHTML($search_field_component->CHfw_hospitalList());


	wp_register_style('chosen_CSS', get_template_directory_uri() . '/assets/css/third-party/chosen.min.css', '', '1.8.2', 'all');
	wp_enqueue_style('chosen_CSS');

	wp_register_script('jq_chosen', get_template_directory_uri() . '/assets/js/third-party/chosen.min.jquery.js', array('jquery'), '2.6', true);
	wp_enqueue_script('jq_chosen');

	wp_register_script('jq_chained', get_template_directory_uri() . '/assets/js/third-party/jquery.chained.min.js', array('jquery'), '2.6', true);
	wp_enqueue_script('jq_chained');

	wp_register_script('jq_autocomplete', get_template_directory_uri() . '/assets/js/third-party/jquery.autocomplete.js', array('jquery'), '2.6', true);
	wp_enqueue_script('jq_autocomplete');

	$out = '
<section class="Find-Doctors-Page SearchComponent">
    <div class="chfw-advanced-search">
        <div class="row">
            <div class="col-md-12">
                <div class="row chfw-advanced-searchBorder">
                    <form action="/find-a-doctor/" method="get">
                        <div class="collabse">

                            <div class="col-md-3">
                                <h1 class="find_h1"><i class="fa fa-user-md" aria-hidden="true"></i>
                                    ' . $title . '
                                </h1>
                                <div class="findInput">
                                    <label> ' . __("Doctor", "chfw-lang") . '</label>
                                    <div class="input-group stylish-input-group">
                                        <input type="text" id="advanced-search-input"
                                               value="' . $firstname . '" name="firstname"
                                               class="form-control"
                                               placeholder="' . __(" Search", "chfw-lang") . '">
                                        <span class="input-group-addon">
                                                 
                                                       <i class="fa fa-search" aria-hidden="true"></i>
                                             
                                             </span>
                                    </div>
                                </div>
                            </div>
                            ';
	$out .= '<div class="col-md-3">
                                <div class="form-group">
                                    <label>' . __("Departmen", 'chfw-lang') . '</label>
									' . $DepartmanRootListHTML . '
                                </div>
                                <div class="form-group">
                        		 <label>' . __("Program and services", "chfw-lang") . '</label>
								' . $DepartmanAndRelationCategoriesListAllHTML . '
                                </div>
                                <hr>
                        </div>';

	$out .= '
                          <div class="col-md-3">

                                <div class="form-group">
                                    <label>' . __("Gender", "chfw-lang") . '</label>
                                    <select id="gender" name="gender" class="sub-menu">
                                        <option value="">' . __("All", "chfw-lang") . '</option>
										' . $search_field_component->selectOptions() . '
                                    </select>
                                </div>       
                                 <div class="form-group">
                                    <label>' . __("Languge", "chfw-lang") . '</label>
								' . $langugeListHTML . '
                                </div>
                            </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                    <label>'.__("Location", "chfw-lang").'</label>
								' . $CHfw_hospitalListHTML . '
                                </div>
                                <div class="form-group">
                                   ' . wp_nonce_field("submit_find_doctor") . '
                                    <button type="submit" class="advandedButton"><i
                                                class="fa fa-search" aria-hidden="true"></i><span>' . __("Search", "chfw-lang") . '</span>
                                    </button>
                                </div>


                            </div>
                            ';

	$out .= '
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!---Componenet end-->';
	$out .= '
<script>
    var _autoWidth = "250px";
      jQuery( ".SearchComponent.Find-Doctors-Page .advandedButton " ).css( "width", _autoWidth );
      jQuery( ".SearchComponent.Find-Doctors-Page .find_h1, .SearchComponent.Find-Doctors-Page .collabse label" ).css( "color", "' . $text_color . '" );
      jQuery( ".SearchComponent.Find-Doctors-Page .chfw-advanced-searchBorder" ).css( "background-color", "' . $background_color . '" );
      jQuery( ".SearchComponent.Find-Doctors-Page .chfw-advanced-searchBorder" ).css( "border-color", "' . $border_color . '" );
      jQuery( ".SearchComponent.Find-Doctors-Page .advandedButton" ).css( "color", "' .  $button_text_color . '" );
      jQuery( ".SearchComponent.Find-Doctors-Page .advandedButton" ).css( "background-color", "' . $button_color . '" );
      jQuery( ".SearchComponent.Find-Doctors-Page .advandedButton" ).css( "border-color", "' . $button_border_color . '" );
    jQuery(function () {
        jQuery(".SearchComponent.Find-Doctors-Page #subDepartmans").chained(".SearchComponent.Find-Doctors-Page #Departmans");
        jQuery(".SearchComponent.Find-Doctors-Page #Departmans,#subDepartmans") . chosen({width: _autoWidth});
        jQuery(".SearchComponent.Find-Doctors-Page #locations") . chosen({width: _autoWidth});
        jQuery(".SearchComponent.Find-Doctors-Page #Languges") . chosen({width: _autoWidth});
        jQuery(".SearchComponent.Find-Doctors-Page #gender") . chosen({width: _autoWidth});

        jQuery(".SearchComponent.Find-Doctors-Page #Departmans, .SearchComponent.Find-Doctors-Page #subDepartmans") . on("change", function () {
	        jQuery(".SearchComponent.Find-Doctors-Page #Departmans, .SearchComponent.Find-Doctors-Page #subDepartmans") . trigger("chosen:updated");
        });
        jQuery(".SearchComponent.Find-Doctors-Page #advanced-search-input") . autocomplete({
            serviceUrl: "/wp-admin/admin-ajax.php?action=CHfw_StaffFindAjax",
            onSelect: function (suggestion) {
	window . location . href = suggestion . data;
},
        });
    });
</script>';
	return $out;
}

add_shortcode('ch_doctor_search', 'CHfw_serach');