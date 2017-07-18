<?php
/*
Plugin Name: Spin2Win PopUp (WooCommerce Coupon Code)
Plugin URI:  https://developer.wordpress.org/plugins/spin2win-popup/
Description: Spin2Win popup plugins provide popup model. Spin2Win Wheel is a responsive, flexible, customisable, resolution independent spin wheel game whose outcomes you control.
Version:     20170906
Author:      spiderbuzz, cyberkishor
Author URI:  https://developer.wordpress.org/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: spin2win-popup-plugin
Domain Path: /languages
*/
/**
* Restricting user to access this file directly (Security Purpose).
**/
if( ! defined( "ABSPATH" ) ) {
  die( "Sorry You Don't Have Permission To Access This Page." );
  exit;
}

/**
* Defining constant variable for plugin version, plugin path, plugin url and plugin domian name
**/

define( "SPIN2WINP_PLUGIN_VERSION", 1.0 );
define( "SPIN2WINP_PLUGIN_DIR", plugin_dir_path( __FILE__ ) );
define( "SPIN2WINP_PLUGIN_URL", plugins_url( '/', __FILE__ ) );
define( "SPIN2WINP_TEXT_DOMAIN", "spin2win-popup-plugin" );
require_once SPIN2WINP_PLUGIN_DIR.'spin2win-class.php';
if( is_admin() ) {
  new SPIN2WIN_AdminClass;
}
else {
  new SPIN2WIN_PublicClass;
}
register_activation_hook( __FILE__, array( 'SPIN2WIN_AdminClass', 'spin2win_setDefault_values' ) );
register_deactivation_hook( __FILE__, array( 'SPIN2WIN_AdminClass', 'spin2win_deleteDefault_values' ) );

//ajax setup for mailchimp
add_action( 'wp_ajax_mailchimp_subscription', array('SPIN2WIN_PublicClass','spin2win_mailchimp_subscription' ));
add_action( 'wp_ajax_nopriv_mailchimp_subscription', array('SPIN2WIN_PublicClass','spin2win_mailchimp_subscription' ));