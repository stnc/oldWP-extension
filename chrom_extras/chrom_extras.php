<?php
/*
Plugin Name: Chrom Themes Extras
Plugin URI:
Description: Theme Extras and shortcode library
Version:  1.11.97
Author: Chrom Themes
Text Domain: chrom_extras
Domain Path: /languages/
*/
include ('chrom_extras_file.php');
register_activation_hook(__FILE__, 'CHfw_extras_activate');
add_action('admin_init', 'CHfw_extras_redirect');

function CHfw_extras_activate() {
  add_option('CHfw_extras_do_activation_redirect', true);
}

function CHfw_extras_redirect() {
  if (get_option('CHfw_extras_do_activation_redirect', false)) {
    delete_option('CHfw_extras_do_activation_redirect');
     wp_redirect(admin_url("admin.php?page=pt-one-click-demo-import"));
    exit;
 }
}
