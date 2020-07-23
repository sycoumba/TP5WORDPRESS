<?php
/*
Plugin Name: KP Fastest Tidio Chat
Description: The fastest way to implement Tidio chat in your WordPress website.
Version: 1.0.1
Contributors: kreativopro
Author: Kreativo Pro
Author URI: https://www.kreativopro.com/
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: kp-fastest-tidio-chat
Domain Path:  /languages
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}



// Define KPFTC_URL as a PHP Constant
define( 'KPFTC_URL', plugin_dir_url( __FILE__ ) );

// Define KPFTC_BASENAME as a PHP Constant
define ( 'KPFTC_BASENAME', plugin_basename( __FILE__ ) );



// Initiate Admin Settings
include( plugin_dir_path( __FILE__ ) . 'includes/kpftc-admin-settings.php');

// Frontend and Backend CSS
include( plugin_dir_path( __FILE__ ) . 'includes/kpftc-styles.php');

// Design of Plugin Settings Page
include( plugin_dir_path( __FILE__ ) . 'includes/kpftc-admin-page.php');

// Setting Sections and Fields
include( plugin_dir_path( __FILE__ ) . 'includes/kpftc-sections-fields.php');

// Frontend Header Code
include( plugin_dir_path( __FILE__ ) . 'includes/kpftc-frontend.php');

// Backend Footer Code
include( plugin_dir_path( __FILE__ ) . 'includes/kpftc-admin-footer.php');

?>