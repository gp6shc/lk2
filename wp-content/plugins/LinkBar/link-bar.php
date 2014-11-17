<?php
    /*
    Plugin Name: Link Bar
    Plugin URI: http://sachsmedia.com
    Description: Adds a simple, clean, and custom bar of share links to any page or post through shortcodes.
    Author: Mike
    Author URI: http://example.com
    Version: 0.1
    */
defined('ABSPATH') or die("Nope.");

function myplugin_activate() {
	update_option("lb_icon_width", "54");
	update_option("lb_icon_height", "54");
	update_option("lb_icon_radius", "50%");
	update_option("lb_icon_margin", "2");
	update_option("lb_icon_scale", "50");
	update_option("lb_default_bg", "#D3D3D3");
	update_option("lb_default_fill", "#FFFFFF");
}
register_activation_hook( __FILE__, 'myplugin_activate' );

if( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ) {
  require 'LB-admin.php';
  require 'LB-generator.php';
}else{
  require 'LB-generator.php';
}

?>