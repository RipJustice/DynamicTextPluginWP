<?php
Class DynamicTxtOptions {  
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'SetupPage' ) );
		add_action( 'admin_init', array( $this, 'RegisterSettings' ) );
		add_action( 'admin_init', array( $this, 'delSingleVal' ) );
		add_action( 'admin_init', array( $this, 'delMultiVal' ) );
	}    
    public function SetupPage() {
    	add_menu_page(__("Dynamic Text"), __("Dynamic Text"), "manage_options", __FILE__, 'PageContent', plugins_url('/dt_icon.png', __FILE__));
    }    
    public function RegisterSettings() { //register domain options and settings    
    	add_option("placeholderdd", "", "", "yes");//added to avoid a "no options page found" bug when resetting DynamicDomain_1
    	register_setting('dynamic_text_settings', 'placeholderdd');//added to avoid a "no options page found" bug when resetting DynamicDomain_1
    	if (!get_option( 'DynamicDomain_1')){//generate first domain automatically
    		add_option("DynamicDomain_1", "Change Me", "", "yes");
    		register_setting('dynamic_text_settings', 'DynamicDomain_1');
    	}else{    		
            foreach ($_POST as $key => $value) {//add additional domains to database
                if (strpos($key,'DynamicDomain') !== false && $value !==""){                
                    add_option($key, "", "", "yes");
                    register_setting('dynamic_text_settings', $key);                
                }
            }
    	}        
    }   
    public function delSingleVal(){//Delete single option
    	if(isset($_POST[wipeout])){     			
    			$wipedta = $_POST[wipeout];    			
	    		delete_option($wipedta);
	    		unregister_setting('dynamic_text_settings', $wipedta);     			
    	}elseif(isset($_POST[wipeout2])){//update DynamicDomain1 if that is the chosen option   			
    			$wipedta = $_POST[wipeout2];    			
	    		update_option('DynamicDomain_1', 'Change Me');
	    		unregister_setting('dynamic_text_settings', $wipedta);     			
    	}
    }
    public function delMultiVal(){//Delete all options
        if (isset($_POST[deleteme])){//reset all domains if the option button is pressed
            $datadynamic=dbPull();
            foreach ($datadynamic as $key => $value) {                            
                delete_option($key);
                unregister_setting('dynamic_text_settings', $key);
                add_option("DynamicDomain_1", "Change Me", "", "yes");    
                register_setting('dynamic_text_settings', 'DynamicDomain_1');                       
            }
        }

    }
}
function dbPull(){ //pull domain settings from database
	global $wpdb;
	$table_name = $wpdb->prefix . "options";
	$sql = "SELECT  `option_name` FROM " . $table_name . " WHERE  `option_name` LIKE  '%DynamicDomain_%'";
	$doms = $wpdb->get_results($sql,OBJECT_K);
	return $doms;
}
$wpdtxt = new DynamicTxtOptions();
function PageContent() { //generate page content
    if (!current_user_can('manage_options')){
        wp_die(__("You don't have access to this page"));
	}?>
    <div class="wrap">
        <h2 style="font-weight:bold;"><? _e("Dynamic Text Domain Settings") ?></h2>
		<br/>
		<div>	
        <form method="post" class="sec1" action="options.php">
			<div class="dtxtheader">SET YOUR DOMAINS HERE</div>
            <?php settings_fields('dynamic_text_settings');?>

            <table class="form-table" style="max-width:725px;" id="newtabs">                
		<?php		
        $gens=dbPull(); 
		ksort($gens,SORT_NATURAL);           
        foreach ($gens as $gen => $genvalue){ //automatically generate rows for existing domain information?>                               
                <tr valign="top" class="generated">
                    <th scope="row" class="title"><?php echo $gen; ?></th>
                    <td><input type="text" class= "dynamic_t_class" name="<?php echo $gen; ?>" value="<?php echo get_option($gen); ?>"/></td>               
                    <th>Set To: "<?php echo get_option($gen); ?>"</th>                    
                    <?php if ($gen !== "DynamicDomain_1"){?>
                    <td><input type="submit" class="button-primary dtxtbtn delbtn <?php echo $gen; ?>" value="<?php _e('Delete ' .$gen) ?>" /></td> 
                    <?php
        				}else{?>
        					<td><input type="submit" class="button-primary dtxtbtn delbtn2 <?php echo $gen; ?>" value="<?php _e('Delete ' .$gen) ?>" /></td> 
        					<!-- td><input type="submit" style="visibility:hidden;"/></td--> 
        		  <?php }?>                   
                </tr>                     
        <?php             
        } ?>                                          
           </table>			    
            <div class="submit" id="sub1">
               <input type="button" id="newdom" class="button-primary dtxtbtn" value="<?php _e('Add New Domain') ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;<br class="hidden"><input type="submit" class="button-primary dtxtbtn" value="<?php _e('Save Domain Names') ?>" />
            </div>        
		</form>        
        <form method="post" class="sec2" action="">
            <?php settings_fields('dynamic_text_settings');?>	
        <div class="submit sec2sub">
            <input type="hidden" name="deleteme"/>
            <input type="submit" class="button-primary dtxtbtn" value="<?php _e('Reset All Domains') ?>"/>
        </div>
        </form>	
        </div>
            <br/>
        <div>
        <p><h2>You can now nest shortcodes from other themes and plugins within Dynamic Text!</h2></p>
        <p><strong>Instructions:</strong></p>
        <p>This is effectively a localization plugin that allows you to have dynamic text, pictures and really any content on your Wordpress pages 
        and posts that changes depending on the content of your url (domain). To use this plugin, you can use this settings page to create an 
        unlimited number of domains. Each domain is associated with the title for the domain, which is always DynamicDomain_"number associated with 
        your domain or url content". These titles are used as attribute values for the shortcode associated with this plugin and will be listed 
        right next to the domain you enter on this page. The shortcode itself is <strong>[dynamic_text][/dynamic_text]</strong> and the attribute is "<strong>domain</strong>." Your 
        content goes in-between the shortcode. To add additional domains, click the "Add New Domain" button on this page. To save your domains or to change previously set domains, click the "Save 
        Domain Names" button.
        <br/><br/>
        <strong>Examples:</strong>
        <br/>
            <ul style="list-style-type: circle; margin-left:40px; font-weight:bold;">
            	<li>If you save the domain "test.com" as DynamicDomain_1 and want content to show up only when "test.com" is in the url for your page, 
            	then you would enter the following: [dynamic_text domain="DynamicDomain_1"]Your content goes right here[/dynamic_text] </li>
            	<li>If you save the domain "mydomain.com" as DynamicDomain_2 and want content to show up only when "mydomain.com" is in the url for 
            	your page, then you would enter the following: [dynamic_text domain="DynamicDomain_2"]Your content goes right here[/dynamic_text] </li>
            	<li>If you save the word "door" as DynamicDomain_3 and want content to show up only when "door" is in the url for your page, then you 
            	would enter the following: [dynamic_text domain="DynamicDomain_3"]Your content goes right here[/dynamic_text]</li>   
            	<li>If you have a shortcode from any other plugin or theme that you want to only have work for a particular domain you can simply nest the shortcode 
            	between the dynamic text shortcode with the appropriate domain set like so: [dynamic_text domain="DynamicDomain_2"][Your other shortcode goes here][/dynamic_text]</li>           	
            </ul>             
        While this is plugin can be used strictly for localization, you can also use this plugin to swap content on your site based on any phrase 
        contained in the url. In the case of localization, rather than having to set up separate wordpress sites for different countries you can 
        instead use this plugin to have a central site and swap the content based upon the domain being used to access the site (so someone hitting 
        the site from the UK and using .uk could see different content on the site than someone reaching it from the US using a .us extension). 
        Alternately, if you just want page content to swap on a page depending on terms contained in the url, you can use this plugin for that as 
        well. Additionally, you could combine this plugin with a custom theme then use the plugin to swap out content on templates in your theme 
        depending on the domain used to reach the site. In that case, you could setup 1 website but have it appear to be an unlimited number of 
        separate websites depending on the domain used to reach the site, with a completely different look and completely different content displayed 
        per domain using the combination of this plugin and your custom theme. 
        </p>
    </div>       	
    </div>
    <style>
    input[type="text"]{
    	box-shadow: inset 1px 1px 6px #020202;
    	border-radius: 5px;
    }
    .dtxtheader{
    	background-color: #0073AA;
    	color:#fff;
	    margin: -10px;
	    margin-bottom: 15px;
	    text-align: center;
	    display: block;
	    border-bottom: 2px solid #0073AA;
	    padding: 20px;
	    font-weight: bold;
	    font-size: 16px;
    }
    .sec1{
    	border: 5px solid #0073aa; 
    	padding: 10px; 
    	border-radius: 10px 10px 0px 0px; 
    	background-color: #fff; 
    	max-width: 725px; 
    	border-bottom: 0px;
    }
    .sec2{
    	border: 5px solid #0073aa;
    	border-top: 0px; 
    	padding: 10px; 
    	border-radius: 0px 0px 10px 10px;
    	background-color: #D6D6D6; 
    	max-width: 725px;
    	margin-top: -20px;
    }
    .submit{
    	margin:auto;
    	display:block;
    	text-align:center;
		background-color: #D6D6D6;
    	margin: 20px -10px 0px -10px;    	
    }
	.sec2sub{
		margin-top:-18px;
	}
	.dtxtbtn {
		text-shadow: none !important;
	    box-shadow: none !important;
	    -webkit-box-shadow: none !important;
	    border: none !important;
	    background: #0085ba !important;
	    border-radius: 10px !important;
	    font-weight: bold;
		color:#fff !important;
	}
	.dtxtbtn:hover{
		background:#008ec2 !important;
	}
	#sub1{
		border-top: 2px solid #0073AA;
	}
	.hidden{
		display:none;
	}
	@media (max-width:356px){
		.hidden{
			display:block;
		}
		.button-primary {
			margin: auto !important;
    		text-align: center;
    		display: block  !important;
		}
	}
    </style>
    <script type="text/javascript">
    jQuery(document).ready(function($) {    	
		var txt = $( ".title:last" ).text();
	    var extractxt = txt.slice(14,20);
		var domnum = parseInt(extractxt);
	   	$("#newdom").click(function(){	//create new rows on button press	
		++domnum;  	    	
	        $("#newtabs").append('<tr valign="top" class="generated"><th scope="row">DynamicDomain_'+domnum+'</th><td><input type="text" class= "dynamic_t_class" name="DynamicDomain_'+domnum+'" value=""/></td><th>Set To: ""</th><td><input type="submit" class="button-primary dtxtbtn delbtn DynamicDomain_'+domnum+'" value="Delete DynamicDomain_'+domnum+'" /></td></tr>');		
	    })
		$(".delbtn").click(function(){//add hidden field on single option delete button click
			var btname = $(this).val();
			var inputname = btname.slice(7,27);
			$('.'+inputname).append('<input type="hidden" name="wipeout" value="'+inputname+'"/>');			
		})
		$(".delbtn2").click(function(){//add hidden field on option one delete button click
			var btname = $(this).val();
			var inputname = btname.slice(7,27);
			$('.'+inputname).append('<input type="hidden" name="wipeout2" value="'+inputname+'"/>');			
		})
    })
    </script>
    <?php
}
?>