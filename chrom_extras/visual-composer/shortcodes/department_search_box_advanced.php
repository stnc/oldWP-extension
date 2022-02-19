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
		'image_id' => '',
		'signature' => '',
		'signature_position' => '',
		'web_site' => '',
		'point' => '100',
		'company' => '',
		'description' => ''
	), $atts));



	$firstname = isset($_GET['firstname']) ? sanitize_text_field($_GET['firstname']) : false;
	$departmans = isset($_GET['departmans']) ? sanitize_text_field($_GET['departmans']) : false;
	$subDepartman = isset($_GET['subDepartman']) ? sanitize_text_field($_GET['subDepartman']) : false;
	$location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : false;
	$languages = array();
	if (isset($_GET['language']) && $_GET['language'] != "") {
		foreach ($_GET['language'] as $lng) {
			$languages[] = sanitize_text_field($lng);
		}
	}
	/*
		$image_class = $image_output = '';
		if (strlen($image_id) > 0) {
			$image_src = wp_get_attachment_image_src($image_id, 'thumbnail');
			$image_output = '<img src="' . esc_url($image_src[0]) . '" alt="Author image" />';
		}


		$company = (isset($atts['company'])) ? esc_attr($atts['company']) : '';
		$signature = (isset($atts['signature'])) ? esc_attr($atts['signature']) : '';
		$signature_position = (isset($atts['signature_position'])) ? esc_attr($atts['signature_position']) : '';
		$web_site = (isset($atts['web_site'])) ? esc_attr($atts['web_site']) : '';
	*/

	$search_field_component = new SearchProcess_Component();

	wp_register_style('chosen_CSS', get_template_directory_uri() . '/assets/css/third-party/chosen.min.css', '', '1.8.2', 'all');
	wp_enqueue_style('chosen_CSS');

	wp_register_script('jq_chosen', get_template_directory_uri() . '/assets/js/third-party/chosen.min.jquery.js', array('jquery'), '2.6', true);
	wp_enqueue_script('jq_chosen');

	wp_register_script('jq_chained', get_template_directory_uri() . '/assets/js/third-party/jquery.chained.min.js', array('jquery'), '2.6', true);
	wp_enqueue_script('jq_chained');

	wp_register_script('jq_autocomplete', get_template_directory_uri() . '/assets/js/third-party/jquery.autocomplete.js', array('jquery'), '2.6', true);
	wp_enqueue_script('jq_autocomplete');

	?>

    <section class="Find-Doctors-Page">
        <div class="chfw-advanced-search">
            <div class="row">
                <div class="col-md-12">
                    <div class="row chfw-advanced-searchBorder">
                        <h1 class="find_h1"><i class="fa fa-user-md" aria-hidden="true"></i>
							<?php echo __("Find A Doctor", 'chfw-lang') ?>
                        </h1>
                        <form action="/find-a-doctor/" method="get">
                            <label class="search-doctor-by">
								<?php echo __("Search by disease, expertise, or doctor's last name", 'chfw-lang') ?>
                            </label>
                            <div class="input-group stylish-input-group">
                                <input type="text" id="advanced-search-input"
                                       value="<?php echo $firstname ?>" name="firstname"
                                       class="form-control"
                                       placeholder="<?php echo __("Search", 'chfw-lang') ?>">
                                <span class="input-group-addon">
                                                    <button type="submit">
                                                       <i class="fa fa-search" aria-hidden="true"></i>
                                                    </button>
                                             </span>
                            </div>
                            <div class="collabse">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> <?php echo __("Departmen", 'chfw-lang') ?></label>
										<?php if (!empty($search_field_component->DepartmanRootList())) : ?>
                                            <select name="departmans" id="Departmans"
                                                    class="sub-menu">
												<?php
												foreach ($search_field_component->DepartmanRootList() as $DepartmanRootList) {
													if (isset($_GET['departmans']) && sanitize_text_field($_GET['departmans']) == $DepartmanRootList->term_id) {
														echo '<option  selected="selected" value="' . $DepartmanRootList->term_id . '">' . $DepartmanRootList->name . '</option>';

													} else {
														echo '<option  value="' . $DepartmanRootList->term_id . '">' . $DepartmanRootList->name . '</option>';
													}
												}
												?>
                                            </select>
										<?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo __("Program and services", 'chfw-lang') ?></label>
										<?php
										if (!empty($search_field_component->DepartmanAndRelationCategoriesListAll())) : ?>
                                            <select id="subDepartmans" name="subDepartman"
                                                    class="sub-menu">
												<?php
												foreach ($search_field_component->DepartmanAndRelationCategoriesListAll() as $depRelCat) {
													if (isset($_GET['subDepartman']) && sanitize_text_field($_GET['subDepartman']) == $depRelCat['id']) {
														echo '<option selected="selected" class="' . $depRelCat['catID'] . '" value="' . $depRelCat['id'] . '">' . $depRelCat['title'] . '</option>';
													} else {
														echo '<option class="' . $depRelCat['catID'] . '" value="' . $depRelCat['id'] . '">' . $depRelCat['title'] . '</option>';

													}
												}
												?>
                                            </select>
										<?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo __("Languge", 'chfw-lang') ?></label>
										<?php
										if (!empty($search_field_component->langugeList())) : ?>
                                            <select
                                                    data-placeholder="<?php echo __("Choose a languges...", 'chfw-lang') ?>"
                                                    id="Languges"
                                                    name="language[]" multiple
                                                    class="chosen-select sub-menu">
												<?php

												foreach ($search_field_component->langugeList() as $lang) {
													if (in_array($lang->slug, $languages)) {
														$ch_yes = 'selected="selected"';
														echo '<option ' . $ch_yes . '  value="' . $lang->slug . '">' . $lang->name . '</option>';
													} else {
														echo '<option  value="' . $lang->slug . '">' . $lang->name . '</option>';
													}
												}
												?>
                                            </select>
										<?php endif ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo __("Location", 'chfw-lang') ?></label>
										<?php if (!empty($search_field_component->CHfw_hospitalList())) : ?>
                                            <select id="locations" name="location"
                                                    class="sub-menu">
												<?php
												foreach ($search_field_component->CHfw_hospitalList() as $DepartmanRootList) {
													if (isset($_GET['location']) && sanitize_text_field($_GET['location']) == $DepartmanRootList['id']) {
														echo '<option  selected="selected" value="' . $DepartmanRootList['id'] . '">' . $DepartmanRootList['title'] . '</option>';
													} else {
														echo '<option  value="' . $DepartmanRootList['id'] . '">' . $DepartmanRootList['title'] . '</option>';
													}
												}
												?>
                                            </select>
										<?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo __("Gender", 'chfw-lang') ?></label>
                                        <select id="gender" name="gender" class="sub-menu">
                                            <option value=""><?php echo __("All", 'chfw-lang') ?></option>
											<?php if (isset($_GET['gender']) && sanitize_text_field($_GET['gender']) == "male") : ?>
                                                <option selected="selected" value="male">
													<?php echo __("Male", 'chfw-lang') ?>
                                                </option>
											<?php else: ?>
                                                <option value="male">
													<?php echo __("Male", 'chfw-lang') ?>
                                                </option>
											<?php endif; ?>
											<?php if (isset($_GET['gender']) && sanitize_text_field($_GET['gender']) == "female") : ?>
                                                <option selected="selected" value="female">
													<?php echo __("Female", 'chfw-lang') ?>
                                                </option>
											<?php else: ?>
                                                <option value="female">
													<?php echo __("Female", 'chfw-lang') ?>
                                                </option>
											<?php endif; ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input type="submit" class="advandedButton"
                                               value="Search">
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        jQuery(function () {

            jQuery("#subDepartmans").chained("#Departmans");
            jQuery('#Departmans,#subDepartmans').chosen({width: '210px'});
            jQuery('#locations').chosen({width: '210px'});
            jQuery('#Languges').chosen({width: '210px'});
            jQuery('#gender').chosen({width: '210px'});

            jQuery('#Departmans,#subDepartmans').on('change', function () {
                jQuery('#Departmans,#subDepartmans').trigger('chosen:updated');
            });


            jQuery('#advanced-search-input').autocomplete({
                serviceUrl: '/wp-admin/admin-ajax.php?action=CHfw_StaffFindAjax',
                onSelect: function (suggestion) {
                    window.location.href = suggestion.data;
                },

            });
        });
    </script>
	<?php
}

add_shortcode('ch_search', 'CHfw_serach');