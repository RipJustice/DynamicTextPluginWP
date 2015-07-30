=== Dynamic Text ===
Contributor: ripjustice
Tags:plugin, shortcode, page, post, content, text
Tested up to: 4.2.3
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

Dynamic Text allows you to have dynamic text and content on your Wordpress pages and posts. To use this plugin, set up to 
4 different domain names that are associated with 4 separate short codes. 

== Description ==

Dynamic Text allows you to have dynamic text and content on your Wordpress pages and posts. To use this plugin, set up to 
4 different domain names that are associated with 4 separate short codes. 

This plugin works as follows:            
            	
1.Domain 1 sets the domain for the shortcode set "[dynamic_text_one][/dynamic_text_one]"
2.Domain 2 sets the domain for the shortcode set "[dynamic_text_two][/dynamic_text_two]"
3.Domain 3 sets the domain for the shortcode set "[dynamic_text_three][/dynamic_text_three]"
4.Domain 4 sets the domain for the shortcode set "[dynamic_text_four][/dynamic_text_four]"
            	            
This is plugin is intended for situations where you need to effectively have 2 or more sites with the same template but different content. 
Rather than have to set up three separate wordpress sites your can use this plugin to have a central site and instead swap content based upon 
the domain being used to access the site.

Example:
               
If you currently run the wordpress site "thisisatest.com" but want to also have a ".us" 
version with the same look and feel but different content, then go to the Dynamic Text Admin page, set Domain 1 to "thisisatest.com" and set Domain 2 to "thisisatest.us". From 
that point forward, any content you place between the shortcode [dynamic_text_one][/dynamic_text_one] will only display when a user views your 
site from the domain "thisisatest.com" whereas any content you place between the shortcode [dynamic_text_two][/dynamic_text_two] will only display 
when a user visits your site from "thisisatest.us". 

== Installation ==

1. Upload `Dynamic Text Plugin.zip` to the `/wp-content/plugins/` directory via the 'Plugins' menu in Wordpress
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Navigate to the "Dynamic Text Domain Settings" page located in the Wordpress Admin menu under "Dynamic Text"
4. Set your domain names
5. Place your short code and content where applicable, referring to the "Description" section of this readme for proper usage.

== Frequently Asked Questions ==

= why did you make this plugin? =

Because I have worked with companies that have had Wordpress sites intended for the US and other countries, and this is 
a nice way to swap content out based on the domain used when landing on the site. Usually if you wanted a .com and a .US version of a site, you would have to set up two separate wordpress sites. 
This plugin makes it so you can use one site instead and simply swap out page content depending on the domain associated with the site when a page loads.

= I've got my content between shortcodes but am not seeing any content when I load the page =

Make sure you've chosen the right domain name for the page you are viewing, otherwise you will not see the content. This is the intended behavior
of the plugin.

= I've got my content between shortcodes but am getting an "Empty delimiter" error message =

You are getting this message because you have not yet set a domain name for the shortcode you are using. Set a domain name via the "Dynamic Text Domain Settings" page
and this error message will go away.

== Screenshots ==

1. dt_ss_1.png

2. dt_ss_2.png

3. dt_ss_3.png

== Changelog ==

= 1.0 =
This is the first version of this plugin.

== Upgrade Notice ==

= 1.0 =
There is currently no need to upgrade given this pluigin is simply a version 1.0 at the moment