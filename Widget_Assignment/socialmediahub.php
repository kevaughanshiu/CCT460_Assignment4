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
/*function register_stylesheets()
{
	//link an external CSS stylesheet
	wp_register_style('socialmediahub', plugins_url('socialmedstyle.css', FILE), array(), null);

}*/
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
		$twitter=($instance['twitter']) ? $instance['twitter'] : 'N/A';
    $instagram=($instance['instagram']) ? $instance['instagram'] : 'N/A';
    $facebook=($instance['facebook']) ? $instance['facebook'] : 'N/A';
    $google=($instance['google']) ? $instance['google'] : 'N/A';
    $tumblr=($tumblr['tumblr']) ? $tumblr['tumblr'] : 'N/A';
?>

	<div class ="frontface">
		<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title ?>
		<a href="<?php echo $twitter?>">Twitter</a><br/>
        <a href="<?php echo $instagram?>">Instagram</a><br/>
        <a href="<?php echo $facebook?>">Facbook</a><br/>
        <a href="<?php echo $google?>">Google+</a><br/>

        <?php echo $after_widget; ?>	
    </div>

<?php
	}
	function form($instance)
	{

?>
	<label for="<?php echo $this->get_field_id('twitter');?>">
               Twitter URL: 

                    <input id="<?php echo $this->get_field_id('twitter');?>"
                    name="<?php echo $this->get_field_name('twitter'); ?>"
                    value="<?php echo esc_attr($instance['twitter']);?>" /> 
                 <p>
                    <label for="radio">Choose:</label>
                    <input name="radio" type="radio" value="twitter1" checked="checked" tabindex="6" id="twitter1"/>
                    <img src="wp-content/plugins/Widget_Assignment/icons/twitter.png">
                 </p>   
          </label> 
          <br/>
            <label for="<?php echo $this->get_field_id('instagram');?>">
               Instagram URL:
                    <input id="<?php echo $this->get_field_id('instagram');?>"
                    name="<?php echo $this->get_field_name('instagram'); ?>"
                    value="<?php echo esc_attr($instance['instagram']);?>" />
                   <p>
                    <label for="radio">Choose:</label>
                    <input name="radio" type="radio" value="instagram1" checked="checked" tabindex="6" id="instagram1"/>
                    <img src="wp-content/plugins/Widget_Assignment/icons/instagram.png">
                 </p>   
          </label>
          <br/>
          <label for="<?php echo $this->get_field_id('facebook');?>">
               Facebook URL:
                    <input id="<?php echo $this->get_field_id('facebook');?>"
                    name="<?php echo $this->get_field_name('facebook'); ?>"
                    value="<?php echo esc_attr($instance['facebook']);?>" />
          </label>
          <br/>
          <label for="<?php echo $this->get_field_id('google');?>">
               Google+ URL:
                    <input id="<?php echo $this->get_field_id('google');?>"
                    name="<?php echo $this->get_field_name('google'); ?>"
                    value="<?php echo esc_attr($instance['google']);?>" />
          </label>
          <br/>
          <label for="<?php echo $this->get_field_id('tumblr');?>">
               Tumblr URL:
                    <input id="<?php echo $this->get_field_id('tumblr');?>"
                    name="<?php echo $this->get_field_name('tumblr'); ?>"
                    value="<?php echo esc_attr($instance['tumblr']);?>" />
          </label>
          <br/>

<?php          		
	}
}

?>