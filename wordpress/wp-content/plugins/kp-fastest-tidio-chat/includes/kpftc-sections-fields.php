<?php


// Add Settings Sections and Fields in KPFTC Settings Page
function kpftc_settings()
{
	
	// If Plugin Settings Don't Exist, Then Create Them
	kpftc_first_install();
  
	
	// Find KPFTC Setting Section Hook and Add a Section There
	add_settings_section( 'kpftc_settings_section', __( '', 'kpftc' ), 'kpftc_settings_description_callback', 'kpftc' );
	
	
	// Add Enable Checkbox Field in KPFTC Setting Page
	add_settings_field( 'kpftc_settings_enable', __( 'Enable Plugin', 'kpftc'), 'kpftc_settings_enable_callback', 'kpftc', 'kpftc_settings_section' );

	// Add Chat Link Field in KPFTC Setting Page
	add_settings_field( 'kpftc_settings_link', __( 'Tidio Chat ID', 'kpftc'), 'kpftc_settings_link_callback', 'kpftc', 'kpftc_settings_section' );
	
	// Add Chat Delay Time Field in KPFTC Setting Page
	add_settings_field( 'kpftc_settings_time', __( 'Delay Time', 'kpftc'), 'kpftc_settings_time_callback', 'kpftc', 'kpftc_settings_section' );
	
	
	// Register Our Settings and Save Them
	register_setting( 'kpftc_settings', 'kpftc_settings' );
	
}
add_action( 'admin_init', 'kpftc_settings' );



// Setting Section Description Function
function kpftc_settings_description_callback()
{
	echo '<div class="kpftc-desc"><b>Kreativo Pro Fastest Tidio Chat</b> is the fastest Tidio Chat plugin for WordPress. If you are worried about Tidio Chat slowing down your website speed, then this plugin will solve all your problems. Plugin Created by <a href="https://www.kreativopro.com/" target="_blank">Kreativo Pro</a>.</p></div>';
}


// Build Layout For Chat Enable Field
function kpftc_settings_enable_callback()
{
	$options = get_option( 'kpftc_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'enable' ] ) ) {
		$custom_text = $options['enable'];
	}
	
	if ($custom_text == 1)
	{
		echo '<input type="checkbox" id="kpftc_custom_enable" name="kpftc_settings[enable]" checked value="1" />';
	}
	else
	{
		echo '<input type="checkbox" id="kpftc_custom_enable" name="kpftc_settings[enable]" value="1" />';
	}
	
}


// Build Layout For Chat Link Field
function kpftc_settings_link_callback()
{
	$options = get_option( 'kpftc_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'link' ] ) ) {
		$custom_text = esc_html( $options['link'] );
	}

	echo '<input type="text" id="kpftc_custom_link" name="kpftc_settings[link]" value="' . $custom_text . '" style="width:842px;" />';
}


// Build Layout For Chat Delay Time Field
function kpftc_settings_time_callback()
{
	$options = get_option( 'kpftc_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'time' ] ) ) {
		$custom_text = esc_html( $options['time'] );
	}

	echo '<input type="text" id="kpftc_custom_delay" name="kpftc_settings[time]" value="' . $custom_text . '" style="width:842px;" /><br><small><i>Time Delay in Milliseconds. For example: 10 Seconds = 10000 Milliseconds</small><i>';
}