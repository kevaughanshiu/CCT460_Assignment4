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
    //link an external css stylesheet
    wp_register_style('socialmediahub', plugins_url('socialmedstyle.css', __FILE__), array(), null);
    wp_enqueue_style('socialmediahub');
}
add_action('wp_enqueue_scripts','register_stylesheets',99); //added 99 to it because the default is 10 and it seemed like it did not push the css code 


class socialmediahub extends WP_Widget
{
  //provided description of what the plugin/widget is
	function socialmediahub()
	{
		$widget_option = array(
			'classname' => 'socialmediahub',
			'description' => 'Social media links for user');
		parent::WP_Widget('socialmediahub', 'Social Media Hub', $widget_option);
	}
  //Conditions to print. Allows only the user to type their usernames instead of the entire "http://twitter.com/[username]"etc.
	function widget($args, $instance)
	{
		//tells the computer if something is in the textbox then use what was inputted in the textbox and apply it at the end of the website or *special case: tumblr is inbetween*
    extract($args, EXTR_SKIP);
		$title = 'Follow Me Here';
		$twitter=($instance['twitter']) ? 'http://twitter.com/' . $instance['twitter'] : 'N/A';
    $instagram=($instance['instagram']) ? 'http://www.instagram.com/' . $instance['instagram'] : 'N/A';
    $facebook=($instance['facebook']) ? 'http://www.facebook.com/' . $instance['facebook'] : 'N/A';
    $google=($instance['google']) ? 'http://www.google.com/+' . $instance['google'] : 'N/A';
    $tumblr=($instance['tumblr']) ? 'http://' . $instance['tumblr'] . '.tumblr.com' : 'N/A';
    //was not able to figure out how to make it not display at all if there was nothing inputted in the textbox
?>
 <!--what shows up on the fron of the website, it shows the icon and makes it a clickable icon to direct them to the social media pages --> 
	<div class ="frontface">
		<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title ?>
		<a href="<?php echo $twitter?>"><img src="http://i.imgur.com/Mv8pCdy.png" style="width:50px; height:50px"></a><br/>
        <a href="<?php echo $instagram?>"><img src="http://i.imgur.com/VGWFXae.png" style="width:50px; height:50px"></a><br/>
        <a href="<?php echo $facebook?>"><img src="http://i.imgur.com/jeEPz6J.png" style="width:50px; height:50px"></a><br/>
        <a href="<?php echo $google?>"><img src="http://i.imgur.com/Fd7pXPC.png" style="width:50px; height:50px"></a><br/>
        <a href="<?php echo $tumblr?>"><img src="http://i.imgur.com/HDHpL0K.png" style="width:50px; height:50px"></a><br/>

        <?php echo $after_widget; ?>	
    </div>

<?php
	}
	function form($instance)
	{

?>
<!--backhouse form for the user to put their social media links in-->
	<label for="<?php echo $this->get_field_id('twitter');?>">
               Twitter Username: 

                    <input id="<?php echo $this->get_field_id('twitter');?>"
                    name="<?php echo $this->get_field_name('twitter'); ?>"
                    value="<?php echo esc_attr($instance['twitter']);?>" /> 
                <!--used radio buttons to allow user to choose a specific icon out of the two, was not able to figure out how to add boolean if/else if function-->    
                 <p>
                    <label for="radio1">Choose:</label>
                    <input name="radio1" type="radio" value="twitter1" checked="checked" id="twitter1"/>
                        <img src="http://i.imgur.com/FfOQSXU.png" style="width:30px; height:30px">
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
                        <img src="http://i.imgur.com/oJ1p1BR.png" style="width:30px; height:30px">
                    <input name="radio2" type="radio" value="instagram2" id="instagram2"/>
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
                    <label for="radio3">Choose:</label>
                    <input name="radio3" type="radio" value="facebook1" checked="checked" id="facebook1"/>
                        <img src="http://i.imgur.com/BxfLpwK.png" style="width:30px; height:30px">
                    <input name="radio3" type="radio" value="facebook2" id="facebook2"/>
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
                    <label for="radio4">Choose:</label>
                    <input name="radio4" type="radio" value="google1" checked="checked" id="google1"/>
                      <img src="http://i.imgur.com/hZM0U57.png" style="width:30px; height:30px">
                    <input name="radio4" type="radio" value="google2" id="google2"/>
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
                    <label for="radio5">Choose:</label>
                    <input name="radio5" type="radio" value="tumblr1" checked="checked" id="tumblr1"/>
                      <img src="http://i.imgur.com/et6kEzp.png" style="width:30px; height:30px">
                    <input name="radio5" type="radio" value="tumblr2" id="tumblr2"/>
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