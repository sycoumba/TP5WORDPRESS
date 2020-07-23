<?php


// Add Links to plugins.php Page and Rearrange Settings Links
function kpftc_setting_links( $actions, $plugin_file ) 
{
	static $plugin;

	if (!isset($plugin))
		$plugin = KPFTC_BASENAME;
	
	if ($plugin == $plugin_file)
	{
		$settings = array('settings' => '<a href="options-general.php?page=kpftc">' . __('Settings', 'General') . '</a>');
		$site_link = array('support' => '<a href="https://www.kreativopro.com/" target="_blank">Get WordPress Support</a>');
		
    	$actions = array_merge($settings, $actions);
		$actions = array_merge($site_link, $actions);
	}
		
	return $actions;
}
add_filter( 'plugin_action_links', 'kpftc_setting_links', 10, 2 );



// Register KPFTC Chat Page Settings in WordPress General Settings Page
function kpftc_register_options_page()
{
  add_options_page('KP Fastest Tidio Chat', 'KP Fastest Tidio Chat', 'manage_options', 'kpftc', 'kpftc_options_page');
}
add_action('admin_menu', 'kpftc_register_options_page');



// Add Settings If Plugin Has Been Activated For the First Time
function kpftc_first_install()
{
	$options = [];
	$options['link']	= "//code.tidio.co/xwbyttpq6abupb9ctmutbsvnbvy8bxh4.js";
	$options['enable']	= 1;
	$options['time']	= 10000;
  
	if( !get_option( 'kpftc_settings' ) )
		update_option( 'kpftc_settings', $options );
}