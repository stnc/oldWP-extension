<?php
/**
 * Visual Composer Element (social profiles )
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
function CHfw_social_profiles_fu($atts, $content = NULL)
{
    extract(shortcode_atts(array(
        'social_profile_facebook' => '',
        'social_profile_instagram' => '',
        'social_profile_twitter' => '',
        'social_profile_googleplus' => '',
        'social_profile_linkedin' => '',
        'social_profile_pinterest' => '',
        'social_profile_rss' => '',
        'social_profile_tumblr' => '',
        'social_profile_github' => '',
        'social_profile_youtube' => '',
        'icon_size' => 'medium',
        'style' => 'standart',//bunda kaldım-------
       /* 'alignment' => 'center'*/
    ), $atts));

    $social_profiles = array(
        'facebook' => array('title' => 'Facebook', 'url' => esc_url($social_profile_facebook), 'icon_color' => 'sc_fw-facebook', 'icon' => 'fa-facebook'),
        'instagram' => array('title' => 'Instagram', 'url' => esc_url($social_profile_instagram), 'icon_color' => 'sc_fw-instagram', 'icon' => 'fa-instagram'),
        'twitter' => array('title' => 'Twitter', 'url' => esc_url($social_profile_twitter), 'icon_color' => 'sc_fw-twitter', 'icon' => 'fa-twitter'),
        'google-plus' => array('title' => 'Google+', 'url' =>esc_url( $social_profile_googleplus), 'icon_color' => 'sc_fw-google-plus', 'icon' => 'fa-google-plus'),
        'linkedin' => array('title' => 'LinkedIn', 'url' => esc_url($social_profile_linkedin), 'icon_color' => 'sc_fw-linkedin', 'icon' => 'fa-linkedin'),
        'pinterest' => array('title' => 'Pinterest', 'url' => esc_url($social_profile_pinterest), 'icon_color' => 'sc_fw-pinterest', 'icon' => 'fa-pinterest'),
        'rss' => array('title' => 'RSS', 'url' =>esc_url( $social_profile_rss), 'icon_color' => 'sc_fw-rss', 'icon' => 'fa-rss'),
        'tumblr' => array('title' => 'Tunblr', 'url' => esc_url($social_profile_tumblr), 'icon_color' => 'sc_fw-tumblr', 'icon' => 'fa-tumblr'),
        'github' => array('title' => 'Github', 'url' => esc_url($social_profile_github), 'icon_color' => 'sc_fw-github', 'icon' => 'fa-github'),
        'youtube' => array('title' => 'YouTube', 'url' =>esc_url( $social_profile_youtube), 'icon_color' => 'sc_fw-youtube', 'icon' => 'fa-youtube')
    );

    $output = '';
    foreach ($social_profiles as $key => $row) {
        if ($row['url'] !== '') {
            $output .= '<li><a href="' . $row['url'] . '" target="_blank" title="' . esc_attr($row['title']) . '" class="'.$style.' sc_fw-social-btn ' . esc_attr($row['icon_color']) .  '">
           <i class="fa ' . $row['icon'] . '"></i></a></li>';
        }
    }

    return '<div class="social-profiles icon-size-' . esc_attr($icon_size) . ' ">  <ul>' . $output . '</ul></div>';
}

add_shortcode('ch_social_profiles', 'CHfw_social_profiles_fu');