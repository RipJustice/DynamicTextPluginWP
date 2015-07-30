<?php
add_action('admin_menu', 'SetupPage');
add_action('admin_init', 'RegisterSettings');

function SetupPage() {
    add_menu_page(__("Dynamic Text"), __("Dynamic Text"), "manage_options", __FILE__, 'PageContent', plugins_url('/dt_icon.png', __FILE__));
}

function RegisterSettings() {  
    add_option("Domain_1", "", "", "yes");
    add_option("Domain_2", "", "", "yes");
    add_option("Domain_3", "", "", "yes");
    add_option("Domain_4", "", "", "yes");    
    register_setting('dynamic_text_settings', 'Domain_1');
    register_setting('dynamic_text_settings', 'Domain_2');
    register_setting('dynamic_text_settings', 'Domain_3');
    register_setting('dynamic_text_settings', 'Domain_4');
}


function PageContent() {
    if (!current_user_can('manage_options'))
        wp_die(__("You don't have access to this page"));
    ?>
    <div class="wrap">
        <h2><? _e("Dynamic Text Domain Settings") ?></h2>
		<br/>		
        <form method="post" action="options.php">

            <?php settings_fields('dynamic_text_settings'); ?>

            <table class="form-table" style="width:650px;">
                <tr valign="top">
                <th scope="row">Set Your Domains Here:</th>
                </tr>
                <tr valign="top">
                    <th scope="row">Domain 1</th>
                    <td><input type="text" class= "dynamic_t_class" name="Domain_1" value="<?php echo get_option('Domain_1'); ?>"/></td>               
               	    <th>Set To: "<?php echo get_option('Domain_1'); ?>"</th>                    
                </tr>

                <tr valign="top">
                    <th scope="row">Domain 2</th>
                    <td><input type="text" class= "dynamic_t_class" name="Domain_2" value="<?php echo get_option('Domain_2'); ?>"/></td>
                    <th>Set To: "<?php echo get_option('Domain_2'); ?>"</th>  
                </tr>

                <tr valign="top">
                    <th scope="row">Domain 3</th>
                    <td><input type="text" class= "dynamic_t_class" name="Domain_3" value="<?php echo get_option('Domain_3'); ?>"/></td>
                    <th>Set To: "<?php echo get_option('Domain_3'); ?>"</th>  
                </tr>
                <tr valign="top">
                    <th scope="row">Domain 4</th>
                    <td><input type="text" class= "dynamic_t_class" name="Domain_4" value="<?php echo get_option('Domain_4'); ?>"/></td>
                    <th>Set To: "<?php echo get_option('Domain_4'); ?>"</th>  
                </tr>
            </table>

            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Domain Names') ?>" />          

        </form>
        <br/>
        </p>
            <br/>
            <p><strong>Instructions:</strong></p>
            <p>This plugin allows you to have dynamic text and content on your Wordpress pages and posts. To use this plugin, set up to 
            4 different domain names that are associated with 4 separate short codes. This association is as follows:
            <br/>
            	<ul style="list-style-type: circle; margin-left:40px; font-weight:bold;">
            		<li>Domain 1 sets the domain for the shortcode set "[dynamic_text_one][/dynamic_text_one]"</li>
            		<li>Domain 2 sets the domain for the shortcode set "[dynamic_text_two][/dynamic_text_two]"</li>
            		<li>Domain 3 sets the domain for the shortcode set "[dynamic_text_three][/dynamic_text_three]"</li>
            		<li>Domain 4 sets the domain for the shortcode set "[dynamic_text_four][/dynamic_text_four]"</li>
            	</ul>             
            This is plugin is intended for situations where you need to effectively have 2 or more sites with the same template but different content. 
            Rather than have to set up three separate wordpress sites your can use this plugin to have a central site and instead swap content based upon 
            the domain being used to access the site.
       </p>
       <p><strong>Example:</strong></p>
       <p>            
            If you currently run the wordpress site "thisisatest.com" but want to also have a ".us" 
            version with the same look and feel but different content, then set Domain 1 to "thisisatest.com" and set Domain 2 to "thisisatest.us". From 
            that point forward, any content you place between the shortcode [dynamic_text_one][/dynamic_text_one] will only display when a user views your 
            site from the domain "thisisatest.com" whereas any content you place between the shortcode [dynamic_text_two][/dynamic_text_two] will only display 
            when a user visits your site from "thisisatest.us". 
       </p>
    </div>
    <?php
}
?>