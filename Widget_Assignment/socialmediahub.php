<?php
/*  Plugin Name: Social Media Hub
	Plugin URL: http://phoenix.sheridanc.on.ca/~ccit2646
	Description: Allows social media links to appear on the sidebar
	Version: 1.0
	Authors: Sabrina Li, Joe Measures, Kevaughan Shiu
	Author's URL: http://phoenix.sheridanc.on.ca/~ccit2646
*/

//registering Widget
function socialmediahub_init()
{
	register_widget("socialmediahub");
}	
add_action('widgets_init','socialmediahub_init');



function register_stylesheets()
{
	  // Register style sheet.
    add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );
    /**
     * Register style sheet.
     */
    function register_plugin_styles() 
    {
      wp_register_style('socialmediahub', plugins_url('socialmedstyle.css', FILE), array(), null);
      wp_enqueue_style( 'my-plugin' );
    }
  }





class socialmediahub extends WP_Widget
{

	function socialmediahub()
	{
		$widget_option = array(
			'classname' => 'socialmediahub',
			'description' => 'Social media links for user');
		parent::WP_Widget('socialmediahub', 'Social Media Hub', $widget_option);
	}

	function widget($args, $instance)
	{
		extract($args, EXTR_SKIP);
		$title = 'Follow Me Here';
		$twitter=($instance['twitter']) ? 'http://twitter.com/' . $instance['twitter'] : 'N/A';
    $instagram=($instance['instagram']) ? 'http://www.instagram.com/' . $instance['instagram'] : 'N/A';
    $facebook=($instance['facebook']) ? 'http://www.facebook.com/' . $instance['facebook'] : 'N/A';
    $google=($instance['google']) ? 'http://www.google.com/+' . $instance['google'] : 'N/A';
    $tumblr=($instance['tumblr']) ? 'http://' . $instance['tumblr'] . '.tumblr.com' : 'N/A';
?>

	<div class ="frontface">
		<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title ?>
		<a href="<?php echo $twitter?>"><img src="http://i.imgur.com/Mv8pCdy.png" style="width:25x; height:25px"></a><br/>
        <a href="<?php echo $instagram?>"><img src="http://i.imgur.com/VGWFXae.png" style="width:25x; height:25px"></a><br/>
        <a href="<?php echo $facebook?>"><img src="http://i.imgur.com/jeEPz6J.png" style="width:25x; height:25px"></a><br/>
        <a href="<?php echo $google?>"><img src="http://i.imgur.com/Fd7pXPC.png" style="width:25x; height:25px"></a><br/>
        <a href="<?php echo $tumblr?>"><img src="http://i.imgur.com/HDHpL0K.png" style="width:25x; height:25px"></a><br/>

        <?php echo $after_widget; ?>	
    </div>

<?php
	}
	function form($instance)
	{

?>
	<label for="<?php echo $this->get_field_id('twitter');?>">
               Twitter Username: 

                    <input id="<?php echo $this->get_field_id('twitter');?>"
                    name="<?php echo $this->get_field_name('twitter'); ?>"
                    value="<?php echo esc_attr($instance['twitter']);?>" /> 
                 <p>
                    <label for="radio1">Choose:</label>
                    <input name="radio1" type="radio" value="twitter1" checked="checked" id="twitter1"/>
                    <input name="radio1" type="radio" value="twitter2" id="twitter2"/>
                    <img src="http://i.imgur.com/Mv8pCdy.png" style="width:30x; height:30px">
                 </p>   
          </label> 
          <br/>
            <label for="<?php echo $this->get_field_id('instagram');?>">
               Instagram Username:
                    <input id="<?php echo $this->get_field_id('instagram');?>"
                    name="<?php echo $this->get_field_name('instagram'); ?>"
                    value="<?php echo esc_attr($instance['instagram']);?>" />
                   <p>
                    <label for="radio2">Choose:</label>
                    <input name="radio2" type="radio" value="instagram1" checked="checked" id="instagram1"/>
                    <input name="radio2" type="radio" value="instagram2" id="instagram"/>
                    <img src="http://i.imgur.com/VGWFXae.png" style="width:30x; height:30px">
                 </p>   
          </label>
          <br/>
          <label for="<?php echo $this->get_field_id('facebook');?>">
               Facebook URL:
                    <input id="<?php echo $this->get_field_id('facebook');?>"
                    name="<?php echo $this->get_field_name('facebook'); ?>"
                    value="<?php echo esc_attr($instance['facebook']);?>" />
                    <p>
                    <label for="radio2">Choose:</label>
                    <input name="radio2" type="radio" value="instagram1" checked="checked" id="instagram1"/>
                    <input name="radio2" type="radio" value="instagram2" id="instagram"/>
                    <img src="http://i.imgur.com/jeEPz6J.png" style="width:30x; height:30px">
                 </p> 
          </label>
          <br/>
          <label for="<?php echo $this->get_field_id('google');?>">
               Google+ URL:
                    <input id="<?php echo $this->get_field_id('google');?>"
                    name="<?php echo $this->get_field_name('google'); ?>"
                    value="<?php echo esc_attr($instance['google']);?>" />
                    <p>
                    <label for="radio2">Choose:</label>
                    <input name="radio2" type="radio" value="instagram1" checked="checked" id="instagram1"/>
                    <input name="radio2" type="radio" value="instagram2" id="instagram"/>
                    <img src="http://i.imgur.com/Fd7pXPC.png" style="width:30x; height:30px">
                 </p> 
          </label>
          <br/>
          <label for="<?php echo $this->get_field_id('tumblr');?>">
               Tumblr URL:
                    <input id="<?php echo $this->get_field_id('tumblr');?>"
                    name="<?php echo $this->get_field_name('tumblr'); ?>"
                    value="<?php echo esc_attr($instance['tumblr']);?>" />
                    <p>
                    <label for="radio2">Choose:</label>
                    <input name="radio2" type="radio" value="instagram1" checked="checked" id="instagram1"/>
                    <input name="radio2" type="radio" value="instagram2" id="instagram"/>
                    <img src="http://i.imgur.com/HDHpL0K.png" style="width:30x; height:30px">
                 </p> 
          </label>
          <br/>

<?php          		
	}
}

//Add Shortcode
function kase_thanks_short() {
  return "<h3>Thanks for Following!</h3>";
}
add_shortcode ('kase_thanks_short', 'kase_thanks_short');

?>