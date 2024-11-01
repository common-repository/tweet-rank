=== Plugin Name ===
Contributors: lennarz
Donate link: http://www.tweet-rank.de
Tags: twitter, ranking, twitter tools
Requires at least: 1.5
Tested up to: 2.7
Stable tag: trunk

Here is a short description of the plugin.  This should be no more than 150 chars.  No markup here.

== Description ==

Integrate follower graph in your sidebar to display changes of the number of your followers you have on Twitter

== Installation ==

1. Upload `tweet-rank.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Just enter following Code, in your wordpress sidebar or do it per widget

   `
   if (function_exists("show_tweet_rank")) {        	
   	show_tweet_rank("tweet_rank", "260", "180");  
   }  
   `

4. Dont forget submitting parameters username, height, width
      	// parameter1: username as string
      	// parameter2: width as string
      	// parameter3: height as string


== Development Blog ==

[tweet-rank WordPress Plugins Development Blog](http://www.tweet-rank.de/ "Tweet-Rank WordPress Plugin Development Blog")


== Screenshots ==

[Tweet-Rank Screenshots](http://www.tweet-rank.de/screenshot-1.jpg "Tweet-Rank Screenshot")

