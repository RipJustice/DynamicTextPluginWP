=== Dynamic Text ===

Contributors: ripjustice

Tags:plugin, shortcode, page, post, content, text, localization

Tested up to: 4.4.1

License: GPLv3

License URI: http://www.gnu.org/licenses/gpl-3.0.txt


Dynamic Text is a localization plugin that allows you to have dynamic text and content on your Wordpress pages and posts. To use this plugin, set
an unlimited number of domain urls can be entered on the settings page. Each domain can be called using the shortcode [dynamic_text][/dynamic_text] with the 
appropriate domain attribute set. Please refer to the description or plugin saettings page for detailed instructions and examples.


== Description ==

You can now nest shortcodes from other themes and plugins within Dynamic Text!

This is effectively a localization plugin that allows you to have dynamic text, pictures and really any content on your Wordpress pages and posts that changes depending on the content of your url (domain). To use this plugin, you can use this settings page to create an unlimited number of domains. Each domain is associated with the title for the domain, which is always DynamicDomain_"number associated with your domain or url content". These titles are used as attribute values for the shortcode associated with this plugin and will be listed right next to the domain you enter on this page. The shortcode itself is [dynamic_text][/dynamic_text] and the attribute is "domain." Your content goes in-between the shortcode. To add additional domains, click the "Add New Domain" button on this page. To save your domains or to change previously set domains, click the "Save Domain Names" button. 

Examples:

*If you save the domain "test.com" as DynamicDomain_1 and want content to show up only when "test.com" is in the url for your page, then you would enter the following: [dynamic_text domain="DynamicDomain_1"]Your content goes right here[/dynamic_text]

*If you save the domain "mydomain.com" as DynamicDomain_2 and want content to show up only when "mydomain.com" is in the url for your page, then you would enter the following: [dynamic_text domain="DynamicDomain_2"]Your content goes right here[/dynamic_text]

*If you save the word "door" as DynamicDomain_3 and want content to show up only when "door" is in the url for your page, then you would enter the following: [dynamic_text domain="DynamicDomain_3"]Your content goes right here[/dynamic_text]

*If you have a shortcode from any other plugin or theme that you want to only have work for a particular domain you can simply nest the shortcode between the dynamic text shortcode with the appropriate domain set like so: [dynamic_text domain="DynamicDomain_2"][Your other shortcode goes here][/dynamic_text]

While this is plugin can be used strictly for localization, you can also use this plugin to swap content on your site based on any phrase contained in the url. In the case of localization, rather than having to set up separate wordpress sites for different countries you can instead use this plugin to have a central site and swap the content based upon the domain being used to access the site (so someone hitting the site from the UK and using .uk could see different content on the site than someone reaching it from the US using a .us extension). Alternately, if you just want page content to swap on a page depending on terms contained in the url, you can use this plugin for that as well. Additionally, you could combine this plugin with a custom theme then use the plugin to swap out content on templates in your theme depending on the domain used to reach the site. In that case, you could setup 1 website but have it appear to be an unlimited number of separate websites depending on the domain used to reach the site, with a completely different look and completely different content displayed per domain using the combination of this plugin and your custom theme.

== Installation ==

1. Upload `Dynamic Text Plugin.zip` to the `/wp-content/plugins/` directory via the 'Plugins' menu in Wordpress

2. Activate the plugin through the 'Plugins' menu in WordPress

3. Navigate to the "Dynamic Text Domain Settings" page located in the Wordpress Admin menu under "Dynamic Text"

4. Set your domain names

5. Place your short code and content where applicable, referring to the "Description" section of this readme for proper usage.

== Frequently Asked Questions ==

= Why did you make this plugin? =

Because I have worked with companies that have had Wordpress sites intended for the US and other countries, and this is 

a nice way to swap content out based on the domain used when landing on the site. Usually if you wanted a .com and a .US version of a site, you would have to set up two separate wordpress sites. 

This plugin makes it so you can use one site instead and simply swap out page content depending on the domain associated with the site when a page loads.

= I've got my content between shortcodes but am not seeing any content when I load the page =

Make sure you've chosen the right domain name for the page you are viewing, otherwise you will not see the content. This is the intended behavior
of the plugin.

== Screenshots ==

1. Domain Settings Page

2. Shortcode Examples

3. How the plugin is displayed in your Plugins section

== Changelog ==

= 2.1.1 =

Changed html and styling for the settings page to make it more responsive on mobile devices, added the ability to delete/reset option 1 and changed the underlying code to be more object-oriented

= 2.1 =

Shortcodes from other themes and plugins can now be nested inside Dynamic Text. Also added individual delete buttons for saved domain info and changed the shortcode function to include parsing page data in addition to domain date (this allows the plugin to work based on any string in the url now rather than just the domain)

= 2.0 =

Completely overhauled the entire plugin, consolidating the shortcode names and functions into 1 and allowing for attributes to instead dictate behavior. The plugin also now allows for an unlimited number of domains. 

= 1.0 =

This is the first version of this plugin.

== Upgrade Notice ==

= 2.0 =
Uninstall the old version of the plugin, then install the new version. You will need to re-save your domains and add the new version of the shortcode as this version is quite different from the last one.