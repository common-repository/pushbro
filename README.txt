=== Push Bro – Free Web Push Notifications for User Engagement and Retargeting ===
Tags: push notifications,   chrome push notifications,  Mobile Web Notifications,    user engagement web notifications,   web push notifications, website push notifications
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html 


Welcome to Push Bro – this is very simple WordPress plugin that helps turn your website visitors into web push notification subscribers. 

== Description ==

Pushbro wordpress plugin adds javascript code required to enable Pushbro service on your wordpress site. You need active pushbro account.
Build your web push subscriber list with much more speed as compared to that of Email. Push Bro’s WordPress plugin simplifies user engagement and retargeting for you. This plugin helps you boost your website traffic, leads and sales.
Web push notifications are clickable messages sent directly to your subscribers’ browsers (even when they are not on your website). These work on all devices — desktops, tablets and even mobile phones — so you don’t even have to invest in building a mobile app for your business. 


== Installation ==
Wordpress : Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

WordpressMu : Same as above

== Frequently Asked Questions ==
= How can i check that plugin is working correctly? =
Check page html source. You shold see line <script type='text/javascript' src='https://cdn.pushbro.com/js/xxx.js?ver=1.0.0'></script> where 'xxx' is 32-digit hexadecimal number. If you see 'default.js' instead - you have entered incorrect subdomain in the plugin settings

= If I use this plugin, do I need to enter any other code on my website? =
No, this plugin is sufficient by itself

== ChangeLog ==

= 1.0.0 =
* First Version


== Configuration ==

Enter your Pushbro subdomain from your account settings page into field labeld 'Pushbro Subdomain'

== Adding to your template ==

header code :
`<?php wp_head();?>`

footer code : 
`<?php wp_footer();?>`