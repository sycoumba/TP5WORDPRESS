<?php

// Change WordPress Admin Branding on KPFTC Plugin Page
function kpftc_change_admin_footer ( $hooks )
{
	if( 'settings_page_kpftc' == KPFTC_SLUG )
		echo 'Get WordPress Help: <a href="https://www.kreativopro.com/" target="_blank"><b>Kreativo Pro</b></a></p>';
	else
		echo $hooks;
}
add_filter('admin_footer_text', 'kpftc_change_admin_footer');