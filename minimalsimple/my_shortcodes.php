<?php
/*
Plugin Name: Kase Shortcode
Description: This plugin is used to show your social media buttons on your posts
Version: 1.0
Author: Sabrina Li, Joe Measures, Kevaughan Shiu
*/


function kase_short($atts, $content = null){
	extract(shortcode_atts(array(
		'class' => ''
	), $atts));
	
	return '<div class="kasesc">' . do_shortcode($content) . '</div>';
}
function kase_short_register() {
	add_shortcode('kase_short_sc', 'kase_short');
}

add_action('init', 'kase_short_register');

?>