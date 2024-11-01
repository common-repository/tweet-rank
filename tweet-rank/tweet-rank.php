<?php
/*
Plugin Name: Tweet-rank
Version:     1.1
Plugin URI:  http://www.tweet-rank.de
Description: Integrate tweet-rank.de statistics on your blog to display changes of the number of your followers you have on Twitter
Author:      Hendrik Lennarz
Author URI:  http://www.vonunterwegsgesendet.de
*/
define(TWEET_RANK_WIDGET_ID, "widget_tweet_rank"); 
/*
Just enter following Code, where you wanna see your follower-graph...

   <?php  
   if (function_exists("show_tweet_rank")) {  
      	// parameter1: username as string
      	// parameter2: width as string
      	// parameter3: height as string
      	// f.i. show_tweet_rank("lennarz");  
   		show_tweet_rank("lennarz", "260", "180");  
   }  
   ?>  

*/
function show_tweet_rank($username = "lennarz", $width = "260", $height = "180", $bgcolor = "#ffffff", $count = 10)
{
$url = "http://www.tweet-rank.de/wp-content/themes/defusion/tr_service.php?username=".$username."&height=".$height."&width=".$width."&bgcolor=".$bgcolor;
echo file_get_contents($url);
}

function widget_tweet_rank($args) {
  extract($args, EXTR_SKIP);
  $options = get_option(TWEET_RANK_WIDGET_ID);

  $username = $options["username"];
  $height = $options["height"];
  $width = $options["width"];

  echo $before_widget;
  show_tweet_rank($username, $width, $height);
  echo $after_widget;
}
    

function widget_tweet_rank_init() {
  wp_register_sidebar_widget(TWEET_RANK_WIDGET_ID, 
  	__('Tweet-Rank'), 'widget_tweet_rank');
  wp_register_widget_control(TWEET_RANK_WIDGET_ID,   
    __('Tweet-Rank'), 'widget_tweet_rank_control');
}

// Register widget to WordPress
add_action("plugins_loaded", "widget_tweet_rank_init");
    
function widget_tweet_rank_control() {
  $options = get_option(TWEET_RANK_WIDGET_ID);
  if (!is_array($options)) {
    $options = array();
  }

  $widget_data = $_POST[TWEET_RANK_WIDGET_ID];
  if ($widget_data['submit']) {
    $options['username'] = $widget_data['username'];
    $options['height'] = $widget_data['height'];
    $options['width'] = $widget_data['width'];

    update_option(TWEET_RANK_WIDGET_ID, $options);
  }

  // Render form
  $username = $options['username'];
  $height = $options['height'];
  $width = $options['width'];
  
  // The HTML form will go here
  
  ?>
<p>
  <label for="<?php echo TWEET_RANK_WIDGET_ID;?>-username">
    Twitter-Username:
  </label>
  <input class="widefat" 
    type="text"
    name="<?php echo TWEET_RANK_WIDGET_ID; ?>[username]" 
    id="<?php echo TWEET_RANK_WIDGET_ID; ?>-username" 
    value="<?php echo $username; ?>"/>
</p>
<p>
  <label for="<?php echo TWEET_RANK_WIDGET_ID;?>-height">
    Height [optimal: 180]:
  </label>
  <input class="widefat" type="text" 
    name="<?php echo TWEET_RANK_WIDGET_ID; ?>[height]" 
    id="<?php echo TWEET_RANK_WIDGET_ID; ?>-height" 
    value="<?php echo $height; ?>"/>
</p>
<p>
  <label for="<?php echo TWEET_RANK_WIDGET_ID;?>-width">
    Width [optimal: 260]:
  </label>
    <input class="widefat" type="text" 
    name="<?php echo TWEET_RANK_WIDGET_ID; ?>[width]" 
    id="<?php echo TWEET_RANK_WIDGET_ID; ?>-width" 
    value="<?php echo $width; ?>"/>
</p>
<input type="hidden" 
  name="<?php echo TWEET_RANK_WIDGET_ID; ?>[submit]" 
  value="1"/>
<?php
  
}


?>