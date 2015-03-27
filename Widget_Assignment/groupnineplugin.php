<?php
/*
 * Plugin Name: Group Nine Plugin
 * Plugin URI: phoenix.sheridanc.on.ca/~ccit2646
 * Description: Our social media plugin
 * Author: Joe Measures, Sabrina Li, Kevaughan Shiu
 * Version: 1.0
 */

//Adds the options page to the dashboard
function jm_awesome_add_admin_menu(  ) { 

	add_menu_page( 'My Awesome Plugin', 'My Awesome Plugin', 'manage_options', 'my_awesome_plugin', 'my_awesome_plugin_options_page', 'dashicons-hammer', 66 );

}

//Enqueue stylesheet
function register_stylesheets()
{
    //link an external css stylesheet
    wp_register_style('socialmediahub', plugins_url('socialmedstyle.css', __FILE__), array(), null);
    wp_enqueue_style('socialmediahub');
}
add_action('wp_enqueue_scripts','register_stylesheets',99); //added 99 to it because the default is 10 and it seemed like it did not push the css code 

//This sets up the various settings to be changed
function jm_awesome_settings_init(  ) { 

	register_setting( 'plugin_page', 'jm_awesome_settings' );
	
	//Settings
	add_settings_section(
		'jm_awesome_plugin_page_section', 
		__( 'Social Media Settings', 'groupnine' ), 
		'jm_awesome_settings_section_callback', 
		'plugin_page'
	);

	/* ------ Twitter ------ */
	add_settings_field( 
		'jm_twitter_text_field_0', 
		__( 'Twitter Username', 'groupnine' ), 
		'jm_twitter_text_field_0_render', 
		'plugin_page', 
		'jm_awesome_plugin_page_section' 
	);


	add_settings_field( 
		'jm_twitter_radio_field_2', 
		__( 'Twitter Icon', 'groupnine' ), 
		'jm_twitter_radio_field_2_render', 
		'plugin_page', 
		'jm_awesome_plugin_page_section' 
	);

	/* ------ Instagram ------ */
	add_settings_field( 
		'jm_instagram_text_field_0', 
		__( 'Instagram Username', 'groupnine' ), 
		'jm_instagram_text_field_0_render', 
		'plugin_page', 
		'jm_awesome_plugin_page_section' 
	);


	add_settings_field( 
		'jm_instagram_radio_field_2', 
		__( 'Instagram Icon', 'groupnine' ), 
		'jm_instagram_radio_field_2_render', 
		'plugin_page', 
		'jm_awesome_plugin_page_section' 
	);

	/* ------ Facebook ------ */
	add_settings_field( 
		'jm_facebook_text_field_0', 
		__( 'Facebook Username', 'groupnine' ), 
		'jm_facebook_text_field_0_render', 
		'plugin_page', 
		'jm_awesome_plugin_page_section' 
	);


	add_settings_field( 
		'jm_facebook_radio_field_2', 
		__( 'Facebook Icon', 'groupnine' ), 
		'jm_facebook_radio_field_2_render', 
		'plugin_page', 
		'jm_awesome_plugin_page_section' 
	);

	/* ------ Google + ------ */
	add_settings_field( 
		'jm_google_text_field_0', 
		__( 'Google+ Username', 'groupnine' ), 
		'jm_google_text_field_0_render', 
		'plugin_page', 
		'jm_awesome_plugin_page_section' 
	);


	add_settings_field( 
		'jm_google_radio_field_2', 
		__( 'Google+ Icon', 'groupnine' ), 
		'jm_google_radio_field_2_render', 
		'plugin_page', 
		'jm_awesome_plugin_page_section' 
	);

	/* ------ Tumblr ------ */
	add_settings_field( 
		'jm_tumblr_text_field_0', 
		__( 'Tumblr Username', 'groupnine' ), 
		'jm_tumblr_text_field_0_render', 
		'plugin_page', 
		'jm_awesome_plugin_page_section' 
	);


	add_settings_field( 
		'jm_tumblr_radio_field_2', 
		__( 'Tumblr Icon', 'groupnine' ), 
		'jm_tumblr_radio_field_2_render', 
		'plugin_page', 
		'jm_awesome_plugin_page_section' 
	);
}
//Rendering the Options page
/* ------ Twitter ------ */
function jm_twitter_text_field_0_render() { 
	$options = get_option( 'jm_awesome_settings' );
	?>
	<input type="text" name="jm_awesome_settings[jm_twitter_text_field_0]" value="<?php if (isset($options['jm_twitter_text_field_0'])) echo $options['jm_twitter_text_field_0']; ?>">
	<?php
}


function jm_twitter_radio_field_2_render() { 
	$options = get_option( 'jm_awesome_settings' );
	?>
	
<input name="jm_awesome_settings[jm_twitter_radio_field_2]" type="radio" value="<img src='http://i.imgur.com/Mv8pCdy.png' style='width:30px; height:30px'>" checked="checked" id="twitter1"/>
        <img src="http://i.imgur.com/Mv8pCdy.png" style="width:30px; height:30px">
        <input name="jm_awesome_settings[jm_twitter_radio_field_2]" type="radio" value="<img src='http://i.imgur.com/FfOQSXU.png' style='width:30x; height:30px'>" id="twitter2"/>
        <img src='http://i.imgur.com/FfOQSXU.png' style='width:30x; height:30px'>
       
	<?php
}

/* ------ Instagram ------ */
function jm_instagram_text_field_0_render() { 
	$options = get_option( 'jm_awesome_settings' );
	?>
	<input type="text" name="jm_awesome_settings[jm_instagram_text_field_0]" value="<?php if (isset($options['jm_instagram_text_field_0'])) echo $options['jm_instagram_text_field_0']; ?>">
	<?php
}


function jm_instagram_radio_field_2_render() { 
	$options = get_option( 'jm_awesome_settings' );
	?>
	
<input name="jm_awesome_settings[jm_instagram_radio_field_2]" type="radio" value="<img src='http://i.imgur.com/VGWFXae.png' style='width:30px; height:30px'>" checked="checked" id="instagram1"/>
        <img src='http://i.imgur.com/VGWFXae.png' style='width:30px; height:30px'>
        <input name="jm_awesome_settings[jm_instagram_radio_field_2]" type="radio" value="<img src='http://i.imgur.com/oJ1p1BR.png' style='width:30x; height:30px'>" id="instagram2"/>
        <img src='http://i.imgur.com/oJ1p1BR.png' style='width:30x; height:30px'>
       
	<?php
}

/* ------ Facebook ------ */
function jm_facebook_text_field_0_render() { 
	$options = get_option( 'jm_awesome_settings' );
	?>
	<input type="text" name="jm_awesome_settings[jm_facebook_text_field_0]" value="<?php if (isset($options['jm_facebook_text_field_0'])) echo $options['jm_facebook_text_field_0']; ?>">
	<?php
}


function jm_facebook_radio_field_2_render() { 
	$options = get_option( 'jm_awesome_settings' );
	?>
	
<input name="jm_awesome_settings[jm_facebook_radio_field_2]" type="radio" value="<img src='http://i.imgur.com/jeEPz6J.png' style='width:30px; height:30px'>" checked="checked" id="facebook1"/>
        <img src='http://i.imgur.com/jeEPz6J.png' style='width:30px; height:30px'>
        <input name="jm_awesome_settings[jm_facebook_radio_field_2]" type="radio" value="<img src='http://i.imgur.com/BxfLpwK.png' style='width:30x; height:30px'>" id="facebook2"/>
        <img src="http://i.imgur.com/BxfLpwK.png" style="width:30x; height:30px">
       
	<?php
}

/* ------ Google + ------ */
function jm_google_text_field_0_render() { 
	$options = get_option( 'jm_awesome_settings' );
	?>
	<input type="text" name="jm_awesome_settings[jm_google_text_field_0]" value="<?php if (isset($options['jm_google_text_field_0'])) echo $options['jm_google_text_field_0']; ?>">
	<?php
}


function jm_google_radio_field_2_render() { 
	$options = get_option( 'jm_awesome_settings' );
	?>
	
<input name="jm_awesome_settings[jm_google_radio_field_2]" type="radio" value="<img src='http://i.imgur.com/Fd7pXPC.png' style='width:30px; height:30px'>" checked="checked" id="google1"/>
        <img src='http://i.imgur.com/Fd7pXPC.png' style='width:30px; height:30px'>
        <input name="jm_awesome_settings[jm_google_radio_field_2]" type="radio" value="<img src='http://i.imgur.com/hZM0U57.png' style='width:30x; height:30px'>" id="google2"/>
        <img src="http://i.imgur.com/hZM0U57.png" style="width:30x; height:30px">
       
	<?php
}

/* ------ Tumblr ------ */
function jm_tumblr_text_field_0_render() { 
	$options = get_option( 'jm_awesome_settings' );
	?>
	<input type="text" name="jm_awesome_settings[jm_tumblr_text_field_0]" value="<?php if (isset($options['jm_tumblr_text_field_0'])) echo $options['jm_tumblr_text_field_0']; ?>">
	<?php
}


function jm_tumblr_radio_field_2_render() { 
	$options = get_option( 'jm_awesome_settings' );
	?>
	
<input name="jm_awesome_settings[jm_tumblr_radio_field_2]" type="radio" value="<img src='http://i.imgur.com/HDHpL0K.png' style='width:30px; height:30px'>" checked="checked" id="tumblr1"/>
        <img src='http://i.imgur.com/HDHpL0K.png' style='width:30px; height:30px'>
        <input name="jm_awesome_settings[jm_tumblr_radio_field_2]" type="radio" value="<img src='http://i.imgur.com/et6kEzp.png' style='width:30x; height:30px'>" id="tumblr2"/>
        <img src="http://i.imgur.com/et6kEzp.png" style="width:30x; height:30px">
       
	<?php
}
//END OF INPUTS

function jm_awesome_settings_section_callback() { 
	echo __( 'Add your social media profiles to any of your pages!', 'groupnine' );
}

//builds the form for it to be used
function my_awesome_plugin_options_page() { 
	?>
	<form action="options.php" method="post">
		
		<h2>The Kase Plugin</h2>
		
		<?php
		settings_fields( 'plugin_page' );
		do_settings_sections( 'plugin_page' );
		submit_button();
		?>
		
	</form>
	<?php

}

add_action( 'admin_menu', 'jm_awesome_add_admin_menu' );
add_action( 'admin_init', 'jm_awesome_settings_init' );	


//This calls the users inputs and uses them for the social media buttons
function my_awesome_plugin_callit(){
	$options = get_option( 'jm_awesome_settings' );
	//echo '<img src="' .  .  '" />';
	if (isset($options['jm_twitter_radio_field_2']) && isset($options['jm_twitter_text_field_0']) ) {
		echo "<a href='http://twitter.com/" . $options['jm_twitter_text_field_0']  . " '> " . $options['jm_twitter_radio_field_2'] . "</a>";
	}
	if (isset($options['jm_instagram_radio_field_2']) && isset($options['jm_instagram_text_field_0']) ) {
		echo "<a href='http://instagram.com/" . $options['jm_instagram_text_field_0']  . " '> " . $options['jm_instagram_radio_field_2'] . "</a>";
	}
	if (isset($options['jm_facebook_radio_field_2']) && isset($options['jm_facebook_text_field_0']) ) {
		echo "<a href='http://facebook.com/" . $options['jm_facebook_text_field_0']  . " '> " . $options['jm_facebook_radio_field_2'] . "</a>";
	}
	if (isset($options['jm_google_radio_field_2']) && isset($options['jm_google_text_field_0']) ) {
		echo "<a href='http://google.com/" . $options['jm_google_text_field_0']  . " '> " . $options['jm_google_radio_field_2'] . "</a>";
	}
	if (isset($options['jm_tumblr_radio_field_2']) && isset($options['jm_tumblr_text_field_0']) ) {
		echo "<a href='http://" . $options['jm_tumblr_text_field_0']  . ".tumblr.com'> " . $options['jm_tumblr_radio_field_2'] . "</a>";
	}

}		

//SHORT CODE
function kase_short() {
	return my_awesome_plugin_callit();

}
add_shortcode('kase_short', 'kase_short');

?>