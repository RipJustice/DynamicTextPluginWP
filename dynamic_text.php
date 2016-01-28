<?php
/*
Plugin Name: Dynamic Text
Plugin URI: http://mullenwebsites.com/dynamic-text-wordpress-plugin/
Description: Insert dynamic text & other content into your wordpress pages & posts
Version: 2.1.1
License: GPLv3
Date: 1/27/2016
Author: Stephen B. Mullen
Author URI: https://www.linkedin.com/pub/stephen-mullen/30/47b/655
Version Notes: 2.1.1 Changed html and styling for the settings page to make it more responsive on mobile devices, added the ability to delete/reset option 1 and changed the underlying code to be more object-oriented
2.1 Shortcodes from other themes and plugins can now be nested inside Dynamic Text. Also added individual delete buttons for saved domain info and changed the shortcode function to include parsing page data in addition to domain date (this allows the plugin to work based on any string in the url now rather than just the domain)
2.0 Completely overhauled the entire plugin, consolidating the shortcode names and functions into 1 and allowing for attributes to instead dictate behavior. The plugin also now allows for an unlimited number of domains
1.0 First version released 7/27/2015, allowing you to set up to 4 different domains associated with 4 separate shortcodes and functions
*/

/*
Copyright 2015, Stephen B Mullen
*/

require 'dynamic_text_options.php';



function dynamic_text_function($atts, $content = null) {
	ob_start();//start buffer
	$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
	$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
	$dtdomchoices = shortcode_atts( array(//pull shortcode attribute
        'domain' => '',        
    ), $atts );
	$dtcollection=dbPull();//pull dynamic domain db info	
	foreach ($dtcollection as $dtkey => $dtvalue){
		$urlkey = get_option($dtkey);
		$dt_dom1 = strtolower($urlkey);
		if ($dtdomchoices['domain']===$dtkey){//match db data against attribute
			if ($dt_dom1 === "") {//error catch if no option value exists
				echo "";
			}elseif (strpos($escaped_url, "$dt_dom1") === false) {//mismatch catch
				echo "";
			}else{//return content if match is found
				return do_shortcode($content);
			}
		}	
	}
	return ob_get_clean();//end buffer
}

add_shortcode('dynamic_text', 'dynamic_text_function');
?>