=== Plugin Name ===
Contributors: onico0
Donate link: 
Tags: FluxBB, punBB
Requires at least: 4.7
Tested up to: 4.8.1
Stable tag: 0.3

This plugin grabs your recent FluxBB topics for you to display in WordPress using widgets or shortcodes.

== Description ==

This plugin grabs your recent FluxBB topics for you to display in WordPress using widgets or shortcodes.

Formerly punbb_recent_topics by IG based on the plugin made by Nick [LINICKX] Bettison (release in April 2008).

I just took the pluging made for punBB forum and I adapted to work with FluxBB forums (2017).
This plugin grabs your recent FluxBB forum topics for you to display in WordPress, you can display them either in you widgets, in a post, a page or in your theme with fluxbb shortcode.

Do you have a FluxBB forum, do you want to drag your blog readers into your forum ? Then this plugin might just help, you can include somewhere in wordpress a list of recent FluxBB threads (topics) in sidebar, footer (widgets), in a page, a post, and even in your theme.

For any issue, please, contact me at <a href="https://www.mister-wp.com">https://www.mister-wp.com</a>. If this plugin is useful for you and you need some updates, I will be happy to improve it in the futur.

== Installation ==

1. unzip recent_fluxbb_topics.zip in your /wp-content/plugins/ directory. (You'll have a new directory, with this plugin in /wp-content/plugins/recent_fluxbb_topics)
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure the plugin, you need to tell WordPress about FluxBB, this is done in the WordPress menu 'Options' -> ‘FluxBB Recent Topics Settings’
	The following Settings are required:
		* The name of your FluxBB database 
		* The name of the table where topics are held (the default is fluxbb_topics )
		* The full url of your forum for links (e.g. https://forum.example.com)
		* The number of topics to show. (If left blank you get 5)
4. Hit 'Update Options"
5. 	To output the list of topics in a page or post... 
		* create a new page/post, type [fluxbb] or [fluxbb limit="10"] (change 10 by the limit you want) , hit 'Publish' or 'Create new page'
5. 	You can also use it as a widget, it’s new !

== Changelog ==
 
= 0.3 =
* allow users to hide the time 
 
= 0.2 =
* fix a bug about shortcode limit conflict with widget
* fix missing translated month display  
* adding time adjustment (you can now add or subtract few hours) 
* adding URL suffix support, for Reverse Messages Order users
 
= 0.1 =
* Initial version