<?php

//Print This Code Just Before </body> in footer.php File of Any Theme.
function kp_fastest_tidio_chat()
{
	$options = get_option( 'kpftc_settings' );
	
	if (isset($options['enable']))
	{
?>

<script>
var tidioScript = document.createElement("script");tidioScript.src = "<?php  echo $options['link']; ?>";
setTimeout(function() {document.body.appendChild(tidioScript)}, <?php  echo $options['time']; ?>);
</script>

<?php
	}
}
add_action('wp_footer', 'kp_fastest_tidio_chat');