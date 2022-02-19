<?php

/**
 * Visual Composer Element (testimonial )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
Class SearchProcess2_Component
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
            $out .= '<select name="departmans" id="Departmans"   title="subDepartman" class="sub-menu selectpicker" data-width="150px">';
            $out .= '<option value="">' . __("Select Departman", "chfw-lang") . '</option>';
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
            $out .= '<select id="subDepartmans" name="subDepartman" data-width="180px"  title="subDepartman" class="sub-menu selectpicker">';
            $out .= '<option value=""> ' . __("Program and services", "chfw-lang") . '</option>';
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
            $out .= '<select data-width="150px" title="Select Languages" id="Languges" name="language[]" multiple class="sub-menu selectpicker">';
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
            $out .= '<select  data-width="150px" id="locations" name="location" class="sub-menu selectpicker">';
            $out .= '<option value=""> ' . __('Select Location ', 'chfw-lang') . '</option>';
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

function CHfw_StaffProgramAndServices_Component2($id)
{
    $var = get_post_meta($id, 'CHfw_DrAndDep_program_and_services', true);

    $vars = explode(',', $var);

    return CHfw_get_the_title_Custom_Component2($vars);
}

/*@uses  StaffProgramAndServices () top func*/
function CHfw_get_the_title_Custom_Component2($post = 0, $returnType = 'string')
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

function CHfw_serach2($atts, $content = NULL)
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


    $text_color = (isset($atts['text_color'])) ? esc_attr($atts['text_color']) : '#000';
    $background_color = (isset($atts['background_color'])) ? esc_attr($atts['background_color']) : '#f2f2f2';
    $border_color = (isset($atts['border_color'])) ? esc_attr($atts['border_color']) : '#ddd';
    $button_color = (isset($atts['button_color'])) ? esc_attr($atts['button_color']) : '#000';
    $button_text_color = (isset($atts['button_text_color'])) ? esc_attr($atts['button_text_color']) : '#fff';
    $button_border_color = (isset($atts['button_border_color'])) ? esc_attr($atts['button_border_color']) : '#fff';
    $layout = (isset($atts['layout'])) ? esc_attr($atts['layout']) : 'native';

    /*Component elemnents*/

    $firstname = isset($_GET['firstname']) ? sanitize_text_field($_GET['firstname']) : false;
    $departmans = isset($_GET['departmans']) ? sanitize_text_field($_GET['departmans']) : false;
    $subDepartman = isset($_GET['subDepartman']) ? sanitize_text_field($_GET['subDepartman']) : false;
    $location = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : false;

    $search_field_component = new SearchProcess2_Component();


    $DepartmanRootListHTML = $search_field_component->DepartmanRootListHTML($search_field_component->DepartmanRootList());
    $DepartmanAndRelationCategoriesListAllHTML = $search_field_component->DepartmanAndRelationCategoriesListAllHTML($search_field_component->DepartmanAndRelationCategoriesListAll());
    $langugeListHTML = $search_field_component->langugeListHTML($search_field_component->langugeList());
    $CHfw_hospitalListHTML = $search_field_component->CHfw_hospitalListHTML($search_field_component->CHfw_hospitalList());

    if (isset($atts['layout']) && $atts['layout'] == "native") {
        $layoutCSS = "native";
        $containerLay = "block-";
    } elseif (isset($atts['layout']) && $atts['layout'] == "onSlide") {
        $layoutCSS = "onSlide";
        $containerLay = "container";
    } else {
        $layoutCSS = "native";
        $containerLay = "block-";
    }


    wp_register_style('bootstrap-select-cs', get_template_directory_uri() . '/assets/css/third-party/bootstrap-select.min.css', '', '1.8.2', 'all');
    wp_enqueue_style('bootstrap-select-cs');

    wp_register_script('bootstrap-custom-js', get_template_directory_uri() . '/assets/js/third-party/bootstrap.custom.min.js', array('jquery'), '2.6', true);
    wp_enqueue_script('bootstrap-custom-js');

    wp_register_script('bootstrap-select-js', get_template_directory_uri() . '/assets/js/third-party/bootstrap-select.min.js', array('jquery'), '2.6', true);
    wp_enqueue_script('bootstrap-select-js');

    wp_register_script('jq_chained', get_template_directory_uri() . '/assets/js/third-party/jquery.chained.min.js', array('jquery'), '2.6', true);
    wp_enqueue_script('jq_chained');

    wp_register_script('jq_autocomplete', get_template_directory_uri() . '/assets/js/third-party/jquery.autocomplete.js', array('jquery'), '2.6', true);
    wp_enqueue_script('jq_autocomplete');
    $out = "";
    ?>

    <section class="Find-Doctors-Page SearchComponent chfw-advanced-searchV2 <?php echo $layoutCSS ?>">
        <div class="chfw-advanced-search">
            <div class="<?php echo $containerLay ?>">
                <div class="col-xs-12 chfw-advanced-searchBorder">

                    <form action="/find-a-doctor/" method="get">
                        <div class="collabse">


                            <div class="col-1 col-md-10 col-sm-12 col-xs-12 col-ms-12">
                                <div class="col-md-2 col-sm-4 col-xs-4 col-ms-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label>  <?php echo __("Doctor", "chfw-lang") ?></label>

                                            <input type="text" id="advanced-search-input"
                                                   value="<?php echo $firstname ?>" name="firstname"
                                                   class="form-control"
                                                   placeholder="<?php echo __("Doctor", "chfw-lang") ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-4 col-xs-4 col-ms-12">
                                    <div class="form-group">
                                        <label><?php echo __("Departmen", 'chfw-lang') ?></label>
                                        <?php echo $DepartmanRootListHTML ?>
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-4 col-xs-4 col-ms-12">
                                    <div class="form-group">
                                        <label><?php echo __("Program and services", "chfw-lang") ?></label>
                                        <?php echo $DepartmanAndRelationCategoriesListAllHTML ?>
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-4 col-xs-4 col-ms-12">
                                    <div class="form-group">
                                        <label>    <?php echo __("Gender", "chfw-lang") ?></label>
                                        <select id="gender" name="gender" data-width="135px" class="sub-menu selectpicker ">
                                            <option value=""> <?php echo __("Select Gender", "chfw-lang") ?></option>
                                            <?php echo $search_field_component->selectOptions() ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-4 col-xs-4 col-ms-12">
                                    <div class="form-group">
                                        <label><?php echo __("Languge", "chfw-lang") ?></label>
                                        <?php echo $langugeListHTML ?>
                                    </div>
                                </div>

                                <div class="col-md-2 col-sm-4 col-xs-4 col-ms-12">
                                    <div class="form-group">
                                        <label><?php echo __("Location", "chfw-lang") ?></label>
                                        <?php echo $CHfw_hospitalListHTML ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-2 col-md-2 col-sm-12 col-xs-12 col-ms-12">

                                <div class="form-group find-btn">
                                    <?php echo wp_nonce_field("submit_find_doctor") ?>
                                    <button type="submit" class="advandedButton"><i
                                                class="fa fa-search" aria-hidden="true"></i><span><?php echo __("Find a doctor", "chfw-lang") ?></span>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!---Componenet end-->

	<style>

/* ==========================================================================
									14-18. #VC Fİnd A Doctor 2
   ========================================================================== */

.chfw-advanced-searchV2 .chfw-advanced-search .form-group .input-group {
    width: 165px;
    padding: 0 15px;
}

.chfw-advanced-searchV2 .chfw-advanced-search .form-group {
    /*   display: block;*/
    /* float: left;*/
    margin: 0;
}

.chfw-advanced-searchV2 .chfw-advanced-search .form-group.find-btn {
    float: right;
    margin: 0;
}

.SearchComponent.chfw-advanced-searchV2 .input-group,
.SearchComponent.chfw-advanced-searchV2 .bootstrap-select.sub-menu {
    margin: 10px 0;
}

.SearchComponent.chfw-advanced-searchV2 .col-1,
.SearchComponent.chfw-advanced-searchV2 .col-2 {
    padding: 0 !important;
}

.bootstrap-select.sub-menu {
    padding: 0 15px;
}

.SearchComponent.chfw-advanced-searchV2 .bootstrap-select.sub-menu .dropdown-toggle.btn-default {

    border: none !important;
    border-bottom: 1px solid !important;
    border-color: #ccc !important;
    border-radius: 0 !important;
    padding: 5px 0 5px 5px !important;
}

.SearchComponent.chfw-advanced-searchV2 .bootstrap-select.sub-menu .dropdown-menu.open {
    border-radius: 0px !important;
    left: 15px !important;
    top: 30px !important;
}

.SearchComponent.chfw-advanced-searchV2 #advanced-search-input {
    border: none !important;
    border-bottom: 1px solid !important;
    border-color: #ccc !important;
    border-radius: 0 !important;
    padding: 5px 0 5px 5px !important;
    margin-top: -7px;
}

.SearchComponent.chfw-advanced-searchV2 .form-group label{
    padding: 0 15px;
}
.SearchComponent.chfw-advanced-searchV2 .advandedButton {
    width: 100% !important;
}

.SearchComponent.chfw-advanced-searchV2 .chfw-advanced-searchBorder {
    box-shadow: 0 5px 11px 0 rgba(0, 0, 0, .18), 0 4px 15px 0 rgba(0, 0, 0, .15);
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    padding: 0;
}

.Find-Doctors-Page.chfw-advanced-searchV2 .advandedButton {
    padding: 14px 24px 9px;
    color: #FFFFFF;
    border: 1px solid #fff;
    background: #FF005E;
    -webkit-border-top-right-radius: 5px;
    -webkit-border-bottom-right-radius: 5px;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;

}

.SearchComponent.chfw-advanced-searchV2 #advanced-search-input,
.SearchComponent.chfw-advanced-searchV2 .bootstrap-select.sub-menu .dropdown-toggle.btn-default {
    font-size: 12px !important;
}

.SearchComponent.chfw-advanced-searchV2.onSlide {
    position: absolute;
    top: 580px;
    z-index: 999;
    width: 100%;
}



.SearchComponent.chfw-advanced-searchV2.native .form-group label ,
.SearchComponent.chfw-advanced-searchV2.onSlide .form-group label {
    display: none;
}

@media only screen and ( min-width: 280px) and (max-width: 980px) {
    .Find-Doctors-Page.chfw-advanced-searchV2.onSlide .advandedButton {
        text-align: center;
        margin: auto;
        -webkit-border-radius: 0px !important;
        -webkit-border-right-radius: 0px !important;
        border-right-radius: 0px !important;
        border-right-radius: 0px !important;
        /*margin-bottom: 10px;*/
    }

    .SearchComponent.chfw-advanced-searchV2.onSlide .col-2,
    .chfw-advanced-searchV2.onSlide .chfw-advanced-search .form-group.find-btn {
        float: none !important;
        text-align: center;
        margin: auto;

    }
}

@media only screen and ( min-width: 690px) and (max-width: 980px) {
    .SearchComponent.chfw-advanced-searchV2.onSlide {
        top: 300px;
    }
}

@media only screen and ( min-width: 320px) and (max-width: 690px) {
    .SearchComponent.chfw-advanced-searchV2.onSlide {
        top: 250px;
    }
}

@media only screen and ( min-width: 320px) and (max-width: 420px) {
    .SearchComponent.chfw-advanced-searchV2.onSlide {
        top: 30px;
    }
}

@media only screen and ( min-width: 280px) and (max-width: 420px) {
    .chfw-advanced-searchV2.onSlide .chfw-advanced-search .form-group .input-group,
    .SearchComponent.chfw-advanced-searchV2.onSlide .bootstrap-select.sub-menu {
        width: 100% !important;
    }
}

</style>


	
    <?php
    $out .= '
<script>
      jQuery( ".SearchComponent.Find-Doctors-Page .find_h1, .SearchComponent.Find-Doctors-Page .collabse label" ).css( "color", "' . $text_color . '" );
      jQuery( ".SearchComponent.Find-Doctors-Page .chfw-advanced-searchBorder" ).css( "background-color", "' . $background_color . '" );
      jQuery( ".SearchComponent.Find-Doctors-Page .chfw-advanced-searchBorder" ).css( "border-color", "' . $border_color . '" );
      jQuery( ".SearchComponent.Find-Doctors-Page .advandedButton" ).css( "color", "' . $button_text_color . '" );
      jQuery( ".SearchComponent.Find-Doctors-Page .advandedButton" ).css( "background-color", "' . $button_color . '" );
      jQuery( ".SearchComponent.Find-Doctors-Page .advandedButton" ).css( "border-color", "' . $button_border_color . '" );
     
   jQuery(function () {

  //   jQuery(".selectpicker").addClass("col-lg-12").selectpicker("setStyle");
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

add_shortcode('ch_doctor_search2', 'CHfw_serach2');