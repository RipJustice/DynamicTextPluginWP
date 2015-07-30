<?php
/*
Plugin Name: Dynamic Text
Plugin URI: Forthcoming
Description: Insert dynamic text & other content into your wordpress pages & posts
Version: 1
Date: 7/27/2015
Author: Stephen B. Mullen
Author URI: https://www.linkedin.com/pub/stephen-mullen/30/47b/655
*/

/*
Copyright 2015, Stephen B Mullen
*/

require 'dynamic_text_options.php';


function dynamic_text_function_one ($atts, $content = null) {
		
		$dt_dom1 = get_option('Domain_1'); 
		
  		if (strpos($_SERVER['HTTP_HOST'], "$dt_dom1") === false) {
			echo "";
		}else{
			echo "$content";
		}

	
}

function dynamic_text_function_two ($atts, $content = null) { 
		
		$dt_dom2 = get_option('Domain_2');
		
  		if (strpos($_SERVER['HTTP_HOST'], "$dt_dom2") === false) {
			echo "";
		}else{
			echo "$content";
		}

	
}

function dynamic_text_function_three ($atts, $content = null) {

	$dt_dom3 = get_option('Domain_3');

	if (strpos($_SERVER['HTTP_HOST'], "$dt_dom3") === false) {
		echo "";
	}else{
		echo "$content";
	}


}

function dynamic_text_function_four ($atts, $content = null) {

	$dt_dom4 = get_option('Domain_4');

	if (strpos($_SERVER['HTTP_HOST'], "$dt_dom4") === false) {
		echo "";
	}else{
		echo "$content";
	}


}



add_shortcode('dynamic_text_one', 'dynamic_text_function_one');
add_shortcode('dynamic_text_two', 'dynamic_text_function_two');
add_shortcode('dynamic_text_three', 'dynamic_text_function_three');
add_shortcode('dynamic_text_four', 'dynamic_text_function_four');
?>