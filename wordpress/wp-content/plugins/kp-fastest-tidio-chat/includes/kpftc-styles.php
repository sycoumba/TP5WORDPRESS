<?php

// Load This CSS on Our Plugin Setting Page
function kpftc_admin_style( $hook )
{	
	// Define KPFTC_SLUG as a PHP Constant
	define ( 'KPFTC_SLUG', $hook );
	
	wp_register_style( 'kpftc-admin', KPFTC_URL . 'assets/css/kpftc-backend.css');
	
	if( 'settings_page_kpftc' == KPFTC_SLUG )
		wp_enqueue_style( 'kpftc-admin' );
}
add_action( 'admin_enqueue_scripts', 'kpftc_admin_style' );