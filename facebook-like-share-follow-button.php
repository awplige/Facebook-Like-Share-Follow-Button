<?php
/*
Plugin Name: Facebook Like Share Follow Button 
Plugin URI: http://awplife.com/
Description: This is Facebook Like Share Follow Buttons Widget.
Version: 0.1.9
Author: A WP Life
Author URI: http://awplife.com/
License: GPLv2 or later
Text Domain: NSMW_TXTDM
Domain Path: /languages

Facebook Like Share Follow Buttons is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Facebook Like Share Follow Buttons is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with User Registration. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

define( 'FBSB_PLUGIN_PATH', plugin_dir_url( __FILE__ ) );

add_action( 'widgets_init', function(){
	register_widget( 'FbSocialShareButton' );
	register_widget( 'FbSocialFollowButton' );
	register_widget( 'FbSocialLikeButton' );
	register_widget( 'FbSocialFacebookButtons' );
});

require("facebook-like-button.php");
require("facebook-share-button.php");
require("facebook-follow-button.php");
require("facebook-all-buttons.php");
require("facebook-button-setting-page.php");

//Default settings
register_activation_hook( __FILE__, 'fb_btn_defaultsettings' );
function fb_btn_defaultsettings() {
	$fbdefaultdettings = array(
		//like button
		"like_btn_layout" 	 	 => "button",
		"like_btn_action" 	 	 => "like",
		"like_btn_type"		 	 => "large",
		"like_show_faces"  	 	 => "true",
		"like_btn_page_show" 	 => "like_after_page",	
		"like_btn_post_show" 	 => "like_after_post",
		"like_btn_lang" 	 	 => "en_US",
		//share button
		"share_btn_layout" 	     => "button",
		"share_btn_size" 	     => "large",
		"share_btn_mobile_frame" => "true",
		"share_btn_page_show"    => "share_after_page",	
		"share_btn_post_show"    => "share_after_post",
		"share_btn_lang"         => "en_US",
		//follow button
		"follow_btn_url" 	     => "http://www.awplife.com",
		"follow_btn_layout" 	 => "button",
		"follow_btn_size" 	     => "large",
		"follow_btn_show_faces"  => "true",
		"follow_btn_page_show"   => "follow_after_page",	
		"follow_btn_post_show"   => "follow_after_post",
		"follow_btn_lang"        => "en_US",
		
	);
	add_option( 'fb_like_buttons_settings', $fbdefaultdettings );
}

//Adding Facebook Buttons After Page Content
function add_fbsocialbuttons_after_page_content($content){
	if (!is_single()  && get_post_type( $post = get_post() ) == "page") {
		
		//get setting of buttons
		$all_settings = get_option('fb_like_buttons_settings');
		//print_r($all_settings);
		echo "<div class='row'>";
		//show fb like button
		if(isset($all_settings['like_btn_page_show'])) {
			//$like_url 			= $all_settings['like_url'];
			//$like_width 		= $all_settings['like_width'];
			$like_btn_layout 	= $all_settings['like_btn_layout'];
			$like_btn_action 	= $all_settings['like_btn_action'];
			$like_btn_type		= $all_settings['like_btn_type'];
			$like_show_faces 	= $all_settings['like_show_faces'];
			$like_btn_page_show = $all_settings['like_btn_page_show'];
			$like_btn_post_show = $all_settings['like_btn_post_show'];
			$like_btn_lang 		= $all_settings['like_btn_lang'];
			
			
				$like_page_script .= "<div class='col-md-2 col-sm-4 col-xs-4'><div id='fb-root'></div>
				<script>
					(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = '//connect.facebook.net/$like_btn_lang/sdk.js#xfbml=1&version=v2.7';
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
					
				
				</script>
				
				<div class='fb-like'
					data-href='' 
					data-layout=$like_btn_layout 
					data-action=$like_btn_action 
					data-size=$like_btn_type
					data-show-faces=$like_show_faces 
					data-share='false'>
				</div></div>";
			
			if($all_settings['like_btn_page_show'] == "like_before_page") {
				$content = $like_page_script.$content;
			}
			
			//after
			if($all_settings['like_btn_page_show'] == "like_after_page") {
				$content .= $like_page_script;
			}
					

		}		
		
		//fb share button
		if(isset($all_settings['share_btn_page_show'])) {
			$share_btn_url          = get_permalink( $post->ID );
			$share_btn_layout       = $all_settings['share_btn_layout'];
			$share_btn_size 		= $all_settings['share_btn_size'];
			$share_btn_mobile_frame = $all_settings['share_btn_mobile_frame'];
			$share_btn_page_show 	= $all_settings['share_btn_page_show'];
			$share_btn_post_show  	= $all_settings['share_btn_post_show'];
			$share_btn_lang  		= $all_settings['share_btn_lang'];
			
		
				$share_page_script .= "<div class='col-md-2 col-sm-4 col-xs-4'>
				<div id='fb-root'></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = '//connect.facebook.net/$share_btn_lang/sdk.js#xfbml=1&version=v2.7';
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
				
				<div class='fb-share-button'
				data-href=$share_btn_url 
				data-layout=$share_btn_layout 
				data-size=$share_btn_size
				data-mobile-iframe=$share_btn_mobile_frame>
				<a class='fb-xfbml-parse-ignore' 
				target='_blank' 
				href='https://www.facebook.com/sharer/sharer.php?u=".urlencode($share_btn_url)."&amp;src=sdkpreparse'>Share</a>
				</div></div>";
			
			if($all_settings['share_btn_page_show'] == "share_before_page") {
				$content = $share_page_script.$content;
			}
			
			//after
			if($all_settings['share_btn_page_show'] == "share_after_page") {
				$content .= $share_page_script;
			}			
		}
		//fb follow button
		if(isset($all_settings['follow_btn_page_show'])) {
			$follow_btn_url	 		=  $all_settings['follow_btn_url'];
			$follow_btn_layout		=  $all_settings['follow_btn_layout'];
			$follow_btn_size	 	=  $all_settings['follow_btn_size'];
			//$follow_btn_width 		=  $all_settings['follow_btn_width'];
			//$follow_btn_height 		=  $all_settings['follow_btn_height'];
			$follow_btn_show_faces 	=  $all_settings['follow_btn_show_faces'];
			$follow_btn_page_show  	=  $all_settings['follow_btn_page_show'];
			$follow_btn_post_show  	=  $all_settings['follow_btn_post_show'];
			$follow_btn_lang  		=  $all_settings['follow_btn_lang'];
			
			
				$follow_page_script .= "<div class='col-md-2 col-sm-4 col-xs-4'><div id='fb-root'>
				</div><script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = '//connect.facebook.net/$follow_btn_lang/sdk.js#xfbml=1&version=v2.7';
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			
			
			</script>
			<div class='fb-follow' 
			data-href=$follow_btn_url 
			data-layout=$follow_btn_layout 
			data-size=$follow_btn_size 
			data-show-faces=$follow_btn_show_faces>
			</div></div>";
		

		
			if($all_settings['follow_btn_page_show'] == "follow_before_page") {
				$content = $follow_page_script.$content;
			}
			
			//after
			if($all_settings['follow_btn_page_show'] == "follow_after_page") {
				$content .= $follow_page_script;
			}		
			
		}
		echo"</div>";
	}
	return $content;
}
add_action( "the_content", "add_fbsocialbuttons_after_page_content" );

//Adding Facebook Buttons Before Post Content
function add_fbsocialbuttons_after_post_content($content){
	if (is_single() && get_post_type( $post = get_post() ) == "post") {
		
		$like_post_script = "";
		$share_post_script = "";
		$follow_post_script = "";
		
		//fb like button
		//get setting of buttons
		$all_settings = get_option('fb_like_buttons_settings');
		echo "<div class='row'>";
		//show fb like button
		if(isset($all_settings['like_btn_post_show'])) {
			$like_btn_layout	= $all_settings['like_btn_layout'];
			$like_btn_action 	= $all_settings['like_btn_action'];
			$like_btn_type 		= $all_settings['like_btn_type'];
			$like_show_faces 	= $all_settings['like_show_faces'];
			$like_btn_page_show = $all_settings['like_btn_page_show'];
			$like_btn_post_show = $all_settings['like_btn_post_show'];
			$like_btn_lang 	    = $all_settings['like_btn_lang'];
			
			
				$like_post_script .= "<div class='col-md-2 col-sm-4 col-xs-4'><div id='fb-root'></div>
				<script>
					(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = '//connect.facebook.net/$like_btn_lang/sdk.js#xfbml=1&version=v2.7';
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
					
					
				</script>
				
				<div class='fb-like'
					data-href='' 
					data-layout=$like_btn_layout 
					data-action=$like_btn_action 
					data-size=$like_btn_type
					data-show-faces=$like_show_faces 
					data-share='false'>
				</div></div>";
			
			if($all_settings['like_btn_post_show'] == "like_before_post") {
				$content = $like_post_script.$content;
			}
			
			//after
			if($all_settings['like_btn_post_show'] == "like_after_post") {
				$content .= $like_post_script;
			}		
		}		
		//fb share button
		if(isset($all_settings['share_btn_post_show'])) {
			$share_btn_url 			= get_permalink( $post->ID );
			$share_btn_layout		= $all_settings['share_btn_layout'];
			$share_btn_size			= $all_settings['share_btn_size'];
			$share_btn_mobile_frame = $all_settings['share_btn_mobile_frame'];
			$share_btn_page_show 	= $all_settings['share_btn_page_show'];
			$share_btn_post_show 	= $all_settings['share_btn_post_show'];
			$share_btn_lang 		= $all_settings['share_btn_lang'];
			
			
				$share_post_script .= "<div class='col-md-2 col-sm-4 col-xs-4'><div id='fb-root'></div>
				<script>
					(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = '//connect.facebook.net/$share_btn_lang/sdk.js#xfbml=1&version=v2.7';
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
					
					//tooltip
					jQuery(document).ready(function(){
							jQuery('[data-toggle='tooltip']').tooltip();   
					}); 
				</script>
				
				<div class='fb-share-button' 
				data-href = $share_btn_url 
				data-layout = $share_btn_layout 
				data-size = $share_btn_size 
				data-mobile-iframe = $share_btn_mobile_frame>
				<a class='fb-xfbml-parse-ignore' 
				target='_blank' 
				href='https://www.facebook.com/sharer/sharer.php?u=".urlencode($share_btn_url)."&amp;src=sdkpreparse'>Share</a>
				</div></div>";
		
			if($all_settings['share_btn_post_show'] == "share_before_post") {
				$content = $share_post_script.$content;
			}
			
			//after
			if($all_settings['share_btn_post_show'] == "share_after_post") {
				$content .= $share_post_script;
			}		
		}
		
		//fb follow button
		if(isset($all_settings['follow_btn_post_show'])) {
			$follow_btn_url	 		=  $all_settings['follow_btn_url'];
			$follow_btn_layout		=  $all_settings['follow_btn_layout'];
			$follow_btn_size	 	=  $all_settings['follow_btn_size'];
			$follow_btn_show_faces 	=  $all_settings['follow_btn_show_faces'];
			$follow_btn_page_show  	=  $all_settings['follow_btn_page_show'];
			$follow_btn_post_show  	=  $all_settings['follow_btn_post_show'];
			$follow_btn_lang  		=  $all_settings['follow_btn_lang'];
			
			
				$follow_post_script .= "<div class='col-md-2 col-sm-4 col-xs-4'><div id='fb-root'></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = '//connect.facebook.net/$follow_btn_lang/sdk.js#xfbml=1&version=v2.7';
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
				
				
				</script>
				<div class='fb-follow'  
				data-href=$follow_btn_url
				data-layout=$follow_btn_layout 
				data-size=$follow_btn_size 
				data-show-faces=$follow_btn_show_faces>
				</div></div>";
		

		
			if($all_settings['follow_btn_post_show'] == "follow_before_post") {
				$content = $follow_post_script.$content;
			}
			
			//after
			if($all_settings['follow_btn_post_show'] == "follow_after_post") {
				$content .= $follow_post_script;
			}
		}		
		echo"</div>";
	}
	return $content;
}
add_action( "the_content", "add_fbsocialbuttons_after_post_content" );
?>