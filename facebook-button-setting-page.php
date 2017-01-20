<?php
// Setting Page
add_action( 'admin_menu', 'fb_social_button_menu' );
function fb_social_button_menu () {
	add_menu_page ( 'Facebook Setting', 'Facebook Setting', 'administrator', 'facebook-button-setting', 'fb_social_button_setting', 'dashicons-facebook-alt' );
	add_submenu_page ( 'facebook-button-setting', 'Document Page', 'Docs', 'administrator', 'documment page', 'fb_social_button_doc', 'dashicons-clipboard' );
}

function fb_social_button_setting (){
	
	wp_enqueue_style( 'fb-bootstrap-css',FBSB_PLUGIN_PATH.'css/fb-buttons-bootstrap.css' );
	wp_enqueue_style( 'fb-font-awesome-css',FBSB_PLUGIN_PATH.'css/font-awesome.css' );
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'bootstrap-js', FBSB_PLUGIN_PATH.'js/bootstrap.js', '(jquery)');	
	
	//toggle button CSS
	wp_enqueue_style('awl-toogle-button-css', FBSB_PLUGIN_PATH . 'css/toogle-button.css');
	
	//get values from database
	//fb like button
	$fb_like_buttons_settings = get_option("fb_like_buttons_settings");
	//print_r($fb_like_buttons_settings);
	
	
	//$like_btn_layout = ;
	if(isset($fb_like_buttons_settings['like_btn_layout'])){
		$like_btn_layout = $fb_like_buttons_settings['like_btn_layout'];
	} else { $like_btn_layout = 'button'; }
	
	if(isset($fb_like_buttons_settings['like_btn_action'])){
		$like_btn_action = $fb_like_buttons_settings['like_btn_action'];
	} else { $like_btn_action = 'like'; }
	
	if(isset($fb_like_buttons_settings['like_btn_type'])){
		$like_btn_type = $fb_like_buttons_settings['like_btn_type'];
	} else { $like_btn_type = 'large'; }
	
	if(isset($fb_like_buttons_settings['like_show_faces'])){
		$like_show_faces = $fb_like_buttons_settings['like_show_faces'];
	} else { $like_show_faces = 'true'; }
	
	if(isset($fb_like_buttons_settings['like_btn_page_show'])){
		$like_btn_page_show = $fb_like_buttons_settings['like_btn_page_show'];
	} else { $like_btn_page_show = 'like_after_page'; }
	
	if(isset($fb_like_buttons_settings['like_btn_post_show'])){
		$like_btn_post_show = $fb_like_buttons_settings['like_btn_post_show'];
	} else { $like_btn_post_show = 'like_after_post'; }
	
	if(isset($fb_like_buttons_settings['like_btn_lang'])){
		$like_btn_lang = $fb_like_buttons_settings['like_btn_lang'];
	} else { $like_btn_lang = 'en_US'; }

	
	//fb share button
	if(isset($fb_like_buttons_settings['share_btn_layout'])){
		$share_btn_layout = $fb_like_buttons_settings['share_btn_layout'];
	} else { $share_btn_layout = 'button'; }
	
	if(isset($fb_like_buttons_settings['share_btn_size'])){
		$share_btn_size = $fb_like_buttons_settings['share_btn_size'];
	} else { $share_btn_size = 'large'; }
	
	if(isset($fb_like_buttons_settings['share_btn_mobile_frame'])){
		$share_btn_mobile_frame = $fb_like_buttons_settings['share_btn_mobile_frame'];
	} else { $share_btn_mobile_frame = 'true'; }
	
	if(isset($fb_like_buttons_settings['share_btn_page_show'])){
		$share_btn_page_show = $fb_like_buttons_settings['share_btn_page_show'];
	} else { $share_btn_page_show = 'share_after_page'; }
	
	if(isset($fb_like_buttons_settings['share_btn_post_show'])){
		$share_btn_post_show = $fb_like_buttons_settings['share_btn_post_show'];
	} else { $share_btn_post_show = 'share_after_post'; }
	
	if(isset($fb_like_buttons_settings['share_btn_lang'])){
		$share_btn_lang = $fb_like_buttons_settings['share_btn_lang'];
	} else { $share_btn_lang = 'en_US'; }
	
	
	//follow button
	if(isset($fb_like_buttons_settings['follow_btn_url'])){
		$follow_btn_url = $fb_like_buttons_settings['follow_btn_url'];
	} else { $follow_btn_url = 'https://www.facebook.com/awplife/'; }
	
	if(isset($fb_like_buttons_settings['follow_btn_layout'])){
		$follow_btn_layout = $fb_like_buttons_settings['follow_btn_layout'];
	} else { $follow_btn_layout = 'button'; }
	
	if(isset($fb_like_buttons_settings['follow_btn_size'])){
		$follow_btn_size = $fb_like_buttons_settings['follow_btn_size'];
	} else { $follow_btn_size = 'large'; }
	
	if(isset($fb_like_buttons_settings['follow_btn_show_faces'])){
		$follow_btn_show_faces = $fb_like_buttons_settings['follow_btn_show_faces'];
	} else { $follow_btn_show_faces = 'true'; }
	
	if(isset($fb_like_buttons_settings['follow_btn_page_show'])){
		$follow_btn_page_show = $fb_like_buttons_settings['follow_btn_page_show'];
	} else { $follow_btn_page_show = 'follow_after_page'; }
	
	if(isset($fb_like_buttons_settings['follow_btn_post_show'])){
		$follow_btn_post_show = $fb_like_buttons_settings['follow_btn_post_show'];
	} else { $follow_btn_post_show = 'follow_after_post'; }
	
	if(isset($fb_like_buttons_settings['follow_btn_lang'])){
		$follow_btn_lang = $fb_like_buttons_settings['follow_btn_lang'];
	} else { $follow_btn_lang = 'en_US'; }
	
?>
	<style>
		
		.like{
			font-size:18px;
		}
		.content{
			
		}
		.fb-button-heading{
			font-waight:bold;
		}
		.fb_icons{
			color:#0073AA;
		}
		.content{
			font-family: 'Josefin Sans', sans-serif !important;
		}
		.fb-menu li a{
			text-decoration: none !important;
		}
		.fb-button-page{
			background-color:#FFFFFF;
			margin-bottom: 20px;
			min-height: 20px;
			padding: 19px;
					
			 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

		}
		.fb-button-heading{
			margin-top:20px;
			
		}
	</style>

	<div class="container text-left" id="fb-button-div">
	<div class="panel panel-default fb-button-heading">
		<h2 class="text-center">Facebook Buttons Setting</h2>
	</div>
	<div class="fb-button-page">
		<ul class="nav nav-pills fb-menu">
			<li class="active"><a data-toggle="pill" href="#fb-btn-like">Facebook Like Button Setting</a></li>
			<li><a data-toggle="pill" href="#fb-btn-share">Facebook Share Button Setting</a></li>
			<li><a data-toggle="pill" href="#fb-btn-follow">Facebook Follow Button Setting</a></li>
		</ul>
		
		<form id="fb-setting-form">
			<div class="tab-content">
				<!-- Facebook Like Button -->
				<div id="fb-btn-like" class="tab-pane fade in active">
					
					<div class="row">
						<p class="col-xs-3">
							<label for=""> Button Layout</label> 
							<select class="widefat" id="like_btn_layout" name="like_btn_layout">
								<option value="standard" <?php if($like_btn_layout == "standard") echo "selected=selected"; ?>>standard</option>
								<option value="box_count" <?php if($like_btn_layout == "box_count") echo "selected=selected"; ?>>Box count</option>
								<option value="button_count" <?php if($like_btn_layout == "button_count") echo "selected=selected"; ?>>Button count</option>
								<option value="button" <?php if($like_btn_layout == "button") echo "selected=selected"; ?>>Button</option>
							</select>
						</p>
					</div>
					<div class="row">
						<p class="col-xs-3">
							<label for="">Button Action Type</label> 
							<?php echo $like_btn_action; ?>
							<select class="widefat" id="like_btn_action" name="like_btn_action">
								<option value="like" <?php if($like_btn_action == "like") echo "selected=selected"; ?>>Like</option>
								<option value="recommend" <?php if($like_btn_action == "recommend") echo "selected=selected"; ?>>Recommend</option>
							</select>
						</p>
					</div>
					<div class="row">
						<p class="col-xs-3">
							<label for="">Button Type</label> 
							<select class="widefat" id="like_btn_type" name="like_btn_type">
								<option value="small" <?php if($like_btn_type == "small") echo "selected=selected"; ?>>Small</option>
								<option value="large" <?php if($like_btn_type == "large") echo "selected=selected"; ?>>Large</option>
							</select>
						</p>
					</div>
					<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="">Enable Show Faces</label><br>
						<p class="col-xs-6 switch-field em_size_field">
							<input class="widefat" id="like_show_faces1" name="like_show_faces" type="radio" value="true" <?php if($like_show_faces == true) echo "checked=checked"; ?>>
							<label for="like_show_faces1"><?php _e('Yes', 'text_domain'); ?></label>
							<input class="widefat" id="like_show_faces2" name="like_show_faces" type="radio" value="false" <?php if($like_show_faces == false) echo "checked=checked"; ?>>
							<label for="like_show_faces2"><?php _e('No', 'text_domain'); ?></label>
						</p>
					</div>	
					
					<div class=" row">&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="">Show Button On Page</label><br>
						<p class="col-xs-6 switch-field em_size_field">	
							<input class="widefat" id="like_btn_page_show1" name="like_btn_page_show" type="radio" value="like_before_page" <?php if($like_btn_page_show == 'like_before_page') echo "checked=checked"; ?>>
							<label for="like_btn_page_show1"><?php _e('Before Content', 'text_domain'); ?></label>
							<input class="widefat" id="like_btn_page_show2" name="like_btn_page_show" type="radio" value="like_after_page" <?php if($like_btn_page_show == 'like_after_page') echo "checked=checked"; ?>>
							<label for="like_btn_page_show2"><?php _e('After Content', 'text_domain'); ?></label>
							<input class="widefat" id="like_btn_page_show3" name="like_btn_page_show" type="radio" value="like_dont_page" <?php if($like_btn_page_show == 'like_dont_page') echo "checked=checked"; ?>>
							<label for="like_btn_page_show3"><?php _e('dont Show', 'text_domain'); ?></label>
						</p>
					</div>
					<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="">Show Button On Post</label><br>
						<p class="col-xs-6 switch-field em_size_field">
							<input class="widefat" id="like_btn_post_show1" name="like_btn_post_show" type="radio" value="like_before_post" <?php if($like_btn_post_show == 'like_before_post') echo "checked=checked"; ?>>
							<label for="like_btn_post_show1"><?php _e('Before Content', 'text_domain'); ?></label>
							<input class="widefat" id="like_btn_post_show2" name="like_btn_post_show" type="radio" value="like_after_post" <?php if($like_btn_post_show == 'like_after_post') echo "checked=checked"; ?>>
							<label for="like_btn_post_show2"><?php _e('After Content', 'text_domain'); ?></label>
							<input class="widefat" id="like_btn_post_show3" name="like_btn_post_show" type="radio" value="like_dont_post" <?php if($like_btn_post_show == 'like_dont_post') echo "checked=checked"; ?>>
							<label for="like_btn_post_show3"><?php _e('dont Show', 'text_domain'); ?></label>
						</p>
					</div>
					<div class="row">
						<p class="col-xs-3">
							<label for="">Default Language</label><br>
							<select id="like_btn_lang" name="like_btn_lang">
								<option value="en_US" <?php if ($like_btn_lang == 'en_US') echo "selected=selected"; ?>>English (US)</option>
								<option value="en_GB" <?php if ($like_btn_lang == 'en_GB') echo "selected=selected"; ?>>English (UK)</option>
								<option value="af_ZA" <?php if ($like_btn_lang == 'af_ZA') echo "selected=selected"; ?>>Afrikaans</option>
								<option value="ar_AR" <?php if ($like_btn_lang == 'ar_AR') echo "selected=selected"; ?>>Arabic</option>
								<option value="hy_AM" <?php if ($like_btn_lang == 'hy_AM') echo "selected=selected"; ?>>Armenian</option>
								<option value="bg_BG" <?php if ($like_btn_lang == 'bg_BG') echo "selected=selected"; ?>>Bulgarian</option>
								<option value="br_FR" <?php if ($like_btn_lang == 'br_FR') echo "selected=selected"; ?>>Breton</option>
								<option value="cs_CZ" <?php if ($like_btn_lang == 'cs_CZ') echo "selected=selected"; ?>>Czech</option>
								<option value="zh_CN" <?php if ($like_btn_lang == 'zh_CN') echo "selected=selected"; ?>>Chinese (Simplified China)</option>
								<option value="zh_HK" <?php if ($like_btn_lang == 'zh_HK') echo "selected=selected"; ?>>Chinese (Traditional Hong Kong)</option>
								<option value="zh_TW" <?php if ($like_btn_lang == 'zh_TW') echo "selected=selected"; ?>>Chinese (Traditional Taiwan)</option>
								<option value="da_DK" <?php if ($like_btn_lang == 'da_DK') echo "selected=selected"; ?>>Danish</option>
								<option value="nl_NL" <?php if ($like_btn_lang == 'nl_NL') echo "selected=selected"; ?>>Dutch</option>
								<option value="fr_FR" <?php if ($like_btn_lang == 'fr_FR') echo "selected=selected"; ?>>French (France)</option>
								<option value="fr_CA" <?php if ($like_btn_lang == 'fr_CA') echo "selected=selected"; ?>>French (Canada)</option>
								<option value="de_DE" <?php if ($like_btn_lang == 'de_DE') echo "selected=selected"; ?>>German</option>
								<option value="he_IL" <?php if ($like_btn_lang == 'he_IL') echo "selected=selected"; ?>>Hebrew</option>
								<option value="hi_IN" <?php if ($like_btn_lang == 'hi_IN') echo "selected=selected"; ?>>Hindi</option>
								<option value="hu_HU" <?php if ($like_btn_lang == 'hu_HU') echo "selected=selected"; ?>>Hungarian</option>
								<option value="ga_IE" <?php if ($like_btn_lang == 'ga_IE') echo "selected=selected"; ?>>Irish</option>
								<option value="id_ID" <?php if ($like_btn_lang == 'id_ID') echo "selected=selected"; ?>>Indonesian</option>
								<option value="it_IT" <?php if ($like_btn_lang == 'it_IT') echo "selected=selected"; ?>>Italian</option>
								<option value="ja_JP" <?php if ($like_btn_lang == 'ja_JP') echo "selected=selected"; ?>>Japanese</option>
								<option value="kk_KZ" <?php if ($like_btn_lang == 'kk_KZ') echo "selected=selected"; ?>>Kazakh</option>
								<option value="ko_KR" <?php if ($like_btn_lang == 'ko_KR') echo "selected=selected"; ?>>Korean</option>
								<option value="la_VA" <?php if ($like_btn_lang == 'la_VA') echo "selected=selected"; ?>>Latin</option>
								<option value="ne_NP" <?php if ($like_btn_lang == 'ne_NP') echo "selected=selected"; ?>>Nepali</option>
								<option value="fa_IR" <?php if ($like_btn_lang == 'fa_IR') echo "selected=selected"; ?>>Persian</option>			
								<option value="pl_PL" <?php if ($like_btn_lang == 'pl_PL') echo "selected=selected"; ?>>Polish</option>
								<option value="pt_PT" <?php if ($like_btn_lang == 'pt_PT') echo "selected=selected"; ?>>Portuguese </option>
								<option value="ro_RO" <?php if ($like_btn_lang == 'ro_RO') echo "selected=selected"; ?>>Romanian</option>
								<option value="ru_RU" <?php if ($like_btn_lang == 'ru_RU') echo "selected=selected"; ?>>Russian</option>
								<option value="es_LA" <?php if ($like_btn_lang == 'es_LA') echo "selected=selected"; ?>>Spanish</option>
								<option value="es_CL" <?php if ($like_btn_lang == 'es_CL') echo "selected=selected"; ?>>Spanish (Chile)</option>
								<option value="es_CO" <?php if ($like_btn_lang == 'es_CO') echo "selected=selected"; ?>>Spanish (Colombia)</option>
								<option value="es_ES" <?php if ($like_btn_lang == 'es_ES') echo "selected=selected"; ?>>Spanish (Spain)</option>
								<option value="es_MX" <?php if ($like_btn_lang == 'es_MX') echo "selected=selected"; ?>>Spanish (Mexico)</option>
								<option value="es_VE" <?php if ($like_btn_lang == 'es_VE') echo "selected=selected"; ?>>Spanish (Venezuela)</option>
								<option value="sr_RS" <?php if ($like_btn_lang == 'sr_RS') echo "selected=selected"; ?>>Serbian</option>
								<option value="sv_SE" <?php if ($like_btn_lang == 'sv_SE') echo "selected=selected"; ?>>Swedish</option>
								<option value="th_TH" <?php if ($like_btn_lang == 'th_TH') echo "selected=selected"; ?>>Thai</option>
								<option value="tr_TR" <?php if ($like_btn_lang == 'tr_TR') echo "selected=selected"; ?>>Turkish</option>
								<option value="ur_PK" <?php if ($like_btn_lang == 'ur_PK') echo "selected=selected"; ?>>Urdu</option>
							</select>
						</p>
					</div>
					<input type="hidden" id="fb_action" name="fb_action" value="save_setting">
				</div>
				<!-- Facebook Share Button -->
				<div id="fb-btn-share" class="tab-pane fade">
					<div class="row">
						<p class="col-xs-3">
							<label for="">Button Layout</label> 
							<select class="widefat" id="share_btn_layout" name="share_btn_layout">
								<option value="box_count" <?php if ($share_btn_layout == 'box_count') echo 'selected="selected"'; ?>>Box Count</option>
								<option value="button_count" <?php if ($share_btn_layout == 'button_count') echo 'selected="selected"'; ?>>Button Count</option>
								<option value="button" <?php if ($share_btn_layout == 'button') echo 'selected="selected"'; ?>>Button</option>
							</select>
						</p>
					</div>
					<div class="row">
						<p class="col-xs-3">
							<label for="">Button Size</label> 
							<select class="widefat" id="share_btn_size" name="share_btn_size">
								<option value="small" <?php if ($share_btn_size == 'small') echo 'selected="selected"'; ?>>Small</option>
								<option value="large" <?php if ($share_btn_size == 'large') echo 'selected="selected"'; ?>>Large</option>
							</select>
						</p>
					</div>
					<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="">Enable Mobile Frame</label><br>
						<p class="col-xs-6 switch-field em_size_field">	
							<input class="widefat" id="share_btn_mobile_frame1" name="share_btn_mobile_frame" type="radio" value="true" <?php if($share_btn_mobile_frame == true) echo "checked=checked"; ?>>
							<label for="share_btn_mobile_frame1"><?php _e('Yes', 'text_domain'); ?></label>
							<input class="widefat" id="share_btn_mobile_frame2" name="share_btn_mobile_frame" type="radio" value="false" <?php if($share_btn_mobile_frame == false) echo "checked=checked"; ?>>
							<label for="share_btn_mobile_frame2"><?php _e('No', 'text_domain'); ?></label>
						</p>
					</div>
					<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="">Show Button On Page </label><br>
						<p class="col-xs-6 switch-field em_size_field">	
							<input class="widefat" id="share_btn_page_show1" name="share_btn_page_show" type="radio" value="share_before_page" <?php if($share_btn_page_show == 'share_before_page') echo "checked=checked"; ?>>
							<label for="share_btn_page_show1"><?php _e('Before Content', 'text_domain'); ?></label>
							<input class="widefat" id="share_btn_page_show2" name="share_btn_page_show" type="radio" value="share_after_page" <?php if($share_btn_page_show == 'share_after_page') echo "checked=checked"; ?>>
							<label for="share_btn_page_show2"><?php _e('After Content', 'text_domain'); ?></label>
							<input class="widefat" id="share_btn_page_show3" name="share_btn_page_show" type="radio" value="share_dont_page" <?php if($share_btn_page_show == 'share_dont_page') echo "checked=checked"; ?>>
							<label for="share_btn_page_show3"><?php _e('Dont Show', 'text_domain'); ?></label>
						</p>
					</div>
					<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="">Show Button On Post</label><br>
						<p class="col-xs-6 switch-field em_size_field">
							<input class="widefat" id="share_btn_post_show1" name="share_btn_post_show" type="radio" value="share_before_post" <?php if($share_btn_post_show == 'share_before_post') echo "checked=checked"; ?>>
							<label for="share_btn_post_show1"><?php _e('Before Content', 'text_domain'); ?></label>
							<input class="widefat" id="share_btn_post_show2" name="share_btn_post_show" type="radio" value="share_after_post" <?php if($share_btn_post_show == 'share_after_post') echo "checked=checked"; ?>>
							<label for="share_btn_post_show2"><?php _e('After Content', 'text_domain'); ?></label>
							<input class="widefat" id="share_btn_post_show3" name="share_btn_post_show" type="radio" value="share_dont_post" <?php if($share_btn_post_show == 'share_dont_post') echo "checked=checked"; ?>>
							<label for="share_btn_post_show3"><?php _e('Dont Show', 'text_domain'); ?></label>
						</p>
					</div>
					<div class="row">
						<p class="col-xs-3">
							<label for="">Default Language</label><br>
							<select id="share_btn_lang" name="share_btn_lang">
								<option value="en_US" <?php if ($share_btn_lang == 'en_US') echo "selected=selected"; ?>>English (US)</option>
								<option value="en_GB" <?php if ($share_btn_lang == 'en_GB') echo "selected=selected"; ?>>English (UK)</option>
								<option value="af_ZA" <?php if ($share_btn_lang == 'af_ZA') echo "selected=selected"; ?>>Afrikaans</option>
								<option value="ar_AR" <?php if ($share_btn_lang == 'ar_AR') echo "selected=selected"; ?>>Arabic</option>
								<option value="hy_AM" <?php if ($share_btn_lang == 'hy_AM') echo "selected=selected"; ?>>Armenian</option>
								<option value="bg_BG" <?php if ($share_btn_lang == 'bg_BG') echo "selected=selected"; ?>>Bulgarian</option>
								<option value="br_FR" <?php if ($share_btn_lang == 'br_FR') echo "selected=selected"; ?>>Breton</option>
								<option value="cs_CZ" <?php if ($share_btn_lang == 'cs_CZ') echo "selected=selected"; ?>>Czech</option>
								<option value="zh_CN" <?php if ($share_btn_lang == 'zh_CN') echo "selected=selected"; ?>>Chinese (Simplified China)</option>
								<option value="zh_HK" <?php if ($share_btn_lang == 'zh_HK') echo "selected=selected"; ?>>Chinese (Traditional Hong Kong)</option>
								<option value="zh_TW" <?php if ($share_btn_lang == 'zh_TW') echo "selected=selected"; ?>>Chinese (Traditional Taiwan)</option>
								<option value="da_DK" <?php if ($share_btn_lang == 'da_DK') echo "selected=selected"; ?>>Danish</option>
								<option value="nl_NL" <?php if ($share_btn_lang == 'nl_NL') echo "selected=selected"; ?>>Dutch</option>
								<option value="fr_FR" <?php if ($share_btn_lang == 'fr_FR') echo "selected=selected"; ?>>French (France)</option>
								<option value="fr_CA" <?php if ($share_btn_lang == 'fr_CA') echo "selected=selected"; ?>>French (Canada)</option>
								<option value="de_DE" <?php if ($share_btn_lang == 'de_DE') echo "selected=selected"; ?>>German</option>
								<option value="he_IL" <?php if ($share_btn_lang == 'he_IL') echo "selected=selected"; ?>>Hebrew</option>
								<option value="hi_IN" <?php if ($share_btn_lang == 'hi_IN') echo "selected=selected"; ?>>Hindi</option>
								<option value="hu_HU" <?php if ($share_btn_lang == 'hu_HU') echo "selected=selected"; ?>>Hungarian</option>
								<option value="ga_IE" <?php if ($share_btn_lang == 'ga_IE') echo "selected=selected"; ?>>Irish</option>
								<option value="id_ID" <?php if ($share_btn_lang == 'id_ID') echo "selected=selected"; ?>>Indonesian</option>
								<option value="it_IT" <?php if ($share_btn_lang == 'it_IT') echo "selected=selected"; ?>>Italian</option>
								<option value="ja_JP" <?php if ($share_btn_lang == 'ja_JP') echo "selected=selected"; ?>>Japanese</option>
								<option value="kk_KZ" <?php if ($share_btn_lang == 'kk_KZ') echo "selected=selected"; ?>>Kazakh</option>
								<option value="ko_KR" <?php if ($share_btn_lang == 'ko_KR') echo "selected=selected"; ?>>Korean</option>
								<option value="la_VA" <?php if ($share_btn_lang == 'la_VA') echo "selected=selected"; ?>>Latin</option>
								<option value="ne_NP" <?php if ($share_btn_lang == 'ne_NP') echo "selected=selected"; ?>>Nepali</option>
								<option value="fa_IR" <?php if ($share_btn_lang == 'fa_IR') echo "selected=selected"; ?>>Persian</option>			
								<option value="pl_PL" <?php if ($share_btn_lang == 'pl_PL') echo "selected=selected"; ?>>Polish</option>
								<option value="pt_PT" <?php if ($share_btn_lang == 'pt_PT') echo "selected=selected"; ?>>Portuguese </option>
								<option value="ro_RO" <?php if ($share_btn_lang == 'ro_RO') echo "selected=selected"; ?>>Romanian</option>
								<option value="ru_RU" <?php if ($share_btn_lang == 'ru_RU') echo "selected=selected"; ?>>Russian</option>
								<option value="es_LA" <?php if ($share_btn_lang == 'es_LA') echo "selected=selected"; ?>>Spanish</option>
								<option value="es_CL" <?php if ($share_btn_lang == 'es_CL') echo "selected=selected"; ?>>Spanish (Chile)</option>
								<option value="es_CO" <?php if ($share_btn_lang == 'es_CO') echo "selected=selected"; ?>>Spanish (Colombia)</option>
								<option value="es_ES" <?php if ($share_btn_lang == 'es_ES') echo "selected=selected"; ?>>Spanish (Spain)</option>
								<option value="es_MX" <?php if ($share_btn_lang == 'es_MX') echo "selected=selected"; ?>>Spanish (Mexico)</option>
								<option value="es_VE" <?php if ($share_btn_lang == 'es_VE') echo "selected=selected"; ?>>Spanish (Venezuela)</option>
								<option value="sr_RS" <?php if ($share_btn_lang == 'sr_RS') echo "selected=selected"; ?>>Serbian</option>
								<option value="sv_SE" <?php if ($share_btn_lang == 'sv_SE') echo "selected=selected"; ?>>Swedish</option>
								<option value="th_TH" <?php if ($share_btn_lang == 'th_TH') echo "selected=selected"; ?>>Thai</option>
								<option value="tr_TR" <?php if ($share_btn_lang == 'tr_TR') echo "selected=selected"; ?>>Turkish</option>
								<option value="ur_PK" <?php if ($share_btn_lang == 'ur_PK') echo "selected=selected"; ?>>Urdu</option>
							</select>
						</p>
					</div>
				</div>

				<!-- Facebook Follow Button -->
				<div id="fb-btn-follow" class="tab-pane fade">
					
					<div class="row">
						<p class="col-xs-3">
							<label for="">Your Facebook Profile Url <input class="widefat" id="follow_btn_url" name="follow_btn_url" type="text" value="<?php echo $follow_btn_url; ?>" />
							</label>
						</p>
					</div>
					<div class="row">
						<p class="col-xs-3">
							<label for="">Button Layout Style</label> 
							<select class="widefat" id="follow_btn_layout" name="follow_btn_layout">
								<option value="standard" <?php if ($follow_btn_layout == 'standard') echo 'selected="selected"'; ?>>Standerd</option>
								<option value="box_count" <?php if ($follow_btn_layout == 'box_count') echo 'selected="selected"'; ?>>Box count</option>
								<option value="button_count" <?php if ($follow_btn_layout == 'button_count') echo 'selected="selected"'; ?>>Button count</option>
								<option value="button" <?php if ($follow_btn_layout == 'button') echo 'selected="selected"'; ?>>Button</option>
							</select>
						</p>
					</div>
					<div class="row">
						<p class="col-xs-3">
							<label for="">Button Size</label> 
							<select class="widefat" id="follow_btn_size" name="follow_btn_size">
								<option value="small" <?php if ($follow_btn_size == 'small') echo 'selected="selected"'; ?>>Small</option>
								<option value="large" <?php if ($follow_btn_size == 'large') echo 'selected="selected"'; ?>>Large</option>
							</select>
						</p>
					</div>			
					<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="">Enable Show Faces</label><br>
						<p class="col-xs-6 switch-field em_size_field">
							<input class="widefat" id="follow_btn_show_faces1" name="follow_btn_show_faces" type="radio" value="true" <?php if($follow_btn_show_faces == true) echo "checked=checked"; ?>>
							<label for="follow_btn_show_faces1"><?php _e('Yes', 'text_domain'); ?></label>
							<input class="widefat" id="follow_btn_show_faces2" name="follow_btn_show_faces" type="radio" value="false" <?php if($follow_btn_show_faces == false) echo "checked=checked"; ?>>
							<label for="follow_btn_show_faces2"><?php _e('No', 'text_domain'); ?></label>
						</p>
					</div>
					<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="">Show Button On Page</label><br>
						<p class="col-xs-6 switch-field em_size_field">
							<input class="widefat" id="follow_btn_page_show1" name="follow_btn_page_show" type="radio" value="follow_before_page" <?php if($follow_btn_page_show == 'follow_before_page') echo "checked=checked"; ?>>
							<label for="follow_btn_page_show1"><?php _e('Before Content', 'text_domain'); ?></label>
							<input class="widefat" id="follow_btn_page_show2" name="follow_btn_page_show" type="radio" value="follow_after_page" <?php if($follow_btn_page_show == 'follow_after_page') echo "checked=checked"; ?>>
							<label for="follow_btn_page_show2"><?php _e('After Content', 'text_domain'); ?></label>
							<input class="widefat" id="follow_btn_page_show3" name="follow_btn_page_show" type="radio" value="follow_dont_page" <?php if($follow_btn_page_show == 'follow_dont_page') echo "checked=checked"; ?>>
							<label for="follow_btn_page_show3"><?php _e('Dont Show', 'text_domain'); ?></label>
						</p>
					</div>
					<div class="row">&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="">Show Button On Post</label><br>
						<p class="col-xs-6 switch-field em_size_field">	
							<input class="widefat" id="follow_btn_post_show1" name="follow_btn_post_show" type="radio" value="follow_before_post" <?php if($follow_btn_post_show == 'follow_before_post') echo "checked=checked"; ?>>
							<label for="follow_btn_post_show1"><?php _e('Before Content', 'text_domain'); ?></label>
							<input class="widefat" id="follow_btn_post_show2" name="follow_btn_post_show" type="radio" value="follow_after_post" <?php if($follow_btn_post_show == 'follow_after_post') echo "checked=checked"; ?>>
							<label for="follow_btn_post_show2"><?php _e('After Content', 'text_domain'); ?></label>
							<input class="widefat" id="follow_btn_post_show3" name="follow_btn_post_show" type="radio" value="follow_dont_post" <?php if($follow_btn_post_show == 'follow_dont_post') echo "checked=checked"; ?>>
							<label for="follow_btn_post_show3"><?php _e('Dont Show', 'text_domain'); ?></label>
						</p>
					</div>
						<div class="row">
						<p class="col-xs-3">
							<label for="">Default Language</label><br>
							<select id="follow_btn_lang" name="follow_btn_lang">
								<option value="en_US" <?php if ($follow_btn_lang == 'en_US') echo "selected=selected"; ?>>English (US)</option>
								<option value="en_GB" <?php if ($follow_btn_lang == 'en_GB') echo "selected=selected"; ?>>English (UK)</option>
								<option value="af_ZA" <?php if ($follow_btn_lang == 'af_ZA') echo "selected=selected"; ?>>Afrikaans</option>
								<option value="ar_AR" <?php if ($follow_btn_lang == 'ar_AR') echo "selected=selected"; ?>>Arabic</option>
								<option value="hy_AM" <?php if ($follow_btn_lang == 'hy_AM') echo "selected=selected"; ?>>Armenian</option>
								<option value="bg_BG" <?php if ($follow_btn_lang == 'bg_BG') echo "selected=selected"; ?>>Bulgarian</option>
								<option value="br_FR" <?php if ($follow_btn_lang == 'br_FR') echo "selected=selected"; ?>>Breton</option>
								<option value="cs_CZ" <?php if ($follow_btn_lang == 'cs_CZ') echo "selected=selected"; ?>>Czech</option>
								<option value="zh_CN" <?php if ($follow_btn_lang == 'zh_CN') echo "selected=selected"; ?>>Chinese (Simplified China)</option>
								<option value="zh_HK" <?php if ($follow_btn_lang == 'zh_HK') echo "selected=selected"; ?>>Chinese (Traditional Hong Kong)</option>
								<option value="zh_TW" <?php if ($follow_btn_lang == 'zh_TW') echo "selected=selected"; ?>>Chinese (Traditional Taiwan)</option>
								<option value="da_DK" <?php if ($follow_btn_lang == 'da_DK') echo "selected=selected"; ?>>Danish</option>
								<option value="nl_NL" <?php if ($follow_btn_lang == 'nl_NL') echo "selected=selected"; ?>>Dutch</option>
								<option value="fr_FR" <?php if ($follow_btn_lang == 'fr_FR') echo "selected=selected"; ?>>French (France)</option>
								<option value="fr_CA" <?php if ($follow_btn_lang == 'fr_CA') echo "selected=selected"; ?>>French (Canada)</option>
								<option value="de_DE" <?php if ($follow_btn_lang == 'de_DE') echo "selected=selected"; ?>>German</option>
								<option value="he_IL" <?php if ($follow_btn_lang == 'he_IL') echo "selected=selected"; ?>>Hebrew</option>
								<option value="hi_IN" <?php if ($follow_btn_lang == 'hi_IN') echo "selected=selected"; ?>>Hindi</option>
								<option value="hu_HU" <?php if ($follow_btn_lang == 'hu_HU') echo "selected=selected"; ?>>Hungarian</option>
								<option value="ga_IE" <?php if ($follow_btn_lang == 'ga_IE') echo "selected=selected"; ?>>Irish</option>
								<option value="id_ID" <?php if ($follow_btn_lang == 'id_ID') echo "selected=selected"; ?>>Indonesian</option>
								<option value="it_IT" <?php if ($follow_btn_lang == 'it_IT') echo "selected=selected"; ?>>Italian</option>
								<option value="ja_JP" <?php if ($follow_btn_lang == 'ja_JP') echo "selected=selected"; ?>>Japanese</option>
								<option value="kk_KZ" <?php if ($follow_btn_lang == 'kk_KZ') echo "selected=selected"; ?>>Kazakh</option>
								<option value="ko_KR" <?php if ($follow_btn_lang == 'ko_KR') echo "selected=selected"; ?>>Korean</option>
								<option value="la_VA" <?php if ($follow_btn_lang == 'la_VA') echo "selected=selected"; ?>>Latin</option>
								<option value="ne_NP" <?php if ($follow_btn_lang == 'ne_NP') echo "selected=selected"; ?>>Nepali</option>
								<option value="fa_IR" <?php if ($follow_btn_lang == 'fa_IR') echo "selected=selected"; ?>>Persian</option>			
								<option value="pl_PL" <?php if ($follow_btn_lang == 'pl_PL') echo "selected=selected"; ?>>Polish</option>
								<option value="pt_PT" <?php if ($follow_btn_lang == 'pt_PT') echo "selected=selected"; ?>>Portuguese </option>
								<option value="ro_RO" <?php if ($follow_btn_lang == 'ro_RO') echo "selected=selected"; ?>>Romanian</option>
								<option value="ru_RU" <?php if ($follow_btn_lang == 'ru_RU') echo "selected=selected"; ?>>Russian</option>
								<option value="es_LA" <?php if ($follow_btn_lang == 'es_LA') echo "selected=selected"; ?>>Spanish</option>
								<option value="es_CL" <?php if ($follow_btn_lang == 'es_CL') echo "selected=selected"; ?>>Spanish (Chile)</option>
								<option value="es_CO" <?php if ($follow_btn_lang == 'es_CO') echo "selected=selected"; ?>>Spanish (Colombia)</option>
								<option value="es_ES" <?php if ($follow_btn_lang == 'es_ES') echo "selected=selected"; ?>>Spanish (Spain)</option>
								<option value="es_MX" <?php if ($follow_btn_lang == 'es_MX') echo "selected=selected"; ?>>Spanish (Mexico)</option>
								<option value="es_VE" <?php if ($follow_btn_lang == 'es_VE') echo "selected=selected"; ?>>Spanish (Venezuela)</option>
								<option value="sr_RS" <?php if ($follow_btn_lang == 'sr_RS') echo "selected=selected"; ?>>Serbian</option>
								<option value="sv_SE" <?php if ($follow_btn_lang == 'sv_SE') echo "selected=selected"; ?>>Swedish</option>
								<option value="th_TH" <?php if ($follow_btn_lang == 'th_TH') echo "selected=selected"; ?>>Thai</option>
								<option value="tr_TR" <?php if ($follow_btn_lang == 'tr_TR') echo "selected=selected"; ?>>Turkish</option>
								<option value="ur_PK" <?php if ($follow_btn_lang == 'ur_PK') echo "selected=selected"; ?>>Urdu</option>
							</select>
						</p>
					</div>
				</div>
				<div id="loading_icon" name="loading_icon" style="display:none;"> 
					<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
					<span class="">Please wait...</span>
				</div>
				<button type="button" id="save_setting" class="btn btn-info" onclick="SaveSettings();">Save</button>
			</div>
		</form>
		<br><br>
		<p class="">
		<h2><strong>Try Our Other Plugins:</strong></h2>
			<br>
			<a href="https://wordpress.org/plugins/portfolio-filter-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Portfolio Filter Gallery</a>
			<a href="https://wordpress.org/plugins/new-grid-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Grid Gallery</a>
			<a href="https://wordpress.org/plugins/new-image-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Image Gallery</a>
			<a href="https://wordpress.org/plugins/new-photo-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Photo Gallery</a>
			<a href="https://wordpress.org/plugins/responsive-slider-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Responsive Slider Gallery</a>
			<a href="https://wordpress.org/plugins/new-contact-form-widget/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Contact Form Widget</a>
			<a href="https://wordpress.org/plugins/slider-responsive-slideshow/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Slider Responsive Slideshow</a><br><br>
			<a href="https://wordpress.org/plugins/new-video-gallery/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Video Gallery</a>
			<a href="https://wordpress.org/plugins/facebook-likebox-widget-and-shortcode/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Facebook Likebox Plugin</a>
			<a href="https://wordpress.org/plugins/new-google-plus-badge/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Google Plus Badge</a>
			<a href="https://wordpress.org/plugins/new-social-media-widget/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Social Media</a>
			<a href="https://wordpress.org/plugins/media-slider/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Media Slider</a>
			<a href="https://wordpress.org/plugins/weather-effect/" target="_blank" class="button button-primary load-customize hide-if-no-customize">Weather Effect</a>
		</p>
		<h1><strong>Buy Our Other Plugins & Get 20% OFF Promo Code - "WINTER20%OFF" </strong></h1>
		</div>	
	</div>

	<script>
		function SaveSettings() {
			jQuery("#loading_icon").show();
			jQuery("#save_setting").hide();
			jQuery.ajax({
				dataType : 'html',
				type: 'POST',
				url : location.href,
				cache: false,
				data : jQuery('#fb-setting-form').serialize() + '&fb_action=save_setting',
				complete : function() {  },
				success: function(data) {
					jQuery("#loading_icon").hide();
					jQuery('#result-msg').html(jQuery(data).find('div#setting-result'));
					jQuery("div#setting-result").fadeOut( 5000, "linear" );
					jQuery("#save_setting").show();
				}
			});
		}
	</script>
	<?php
	
	
	//save settings
	if(isset($_POST['fb_action'])){
		//print_r($_POST);
		/* $fbnewsettings = array(
			
			"like_btn_layout" 	  	 => $_POST['like_btn_layout'],
			"like_btn_action" 	  	 => $_POST['like_btn_action'],
			"like_btn_type" 	  	 => $_POST['like_btn_type'],
			"like_show_faces" 	  	 => $_POST['like_show_faces'],
			"like_btn_page_show"  	 => $_POST['like_btn_page_show'],
			"like_btn_post_show"  	 => $_POST['like_btn_post_show'],
			"like_btn_lang"	  	  	 => $_POST['like_btn_lang'],
			
			"share_btn_layout"	     => $_POST['share_btn_layout'],
			"share_btn_size" 	 	 => $_POST['share_btn_size'],
			"share_btn_mobile_frame" => $_POST['share_btn_mobile_frame'],
			"share_btn_page_show" 	 => $_POST['share_btn_page_show'],
			"share_btn_post_show" 	 => $_POST['share_btn_post_show'],
			"share_btn_lang"	  	 => $_POST['share_btn_lang'],
			
			"follow_btn_url" 	     => $_POST['follow_btn_url'],
			"follow_btn_layout"      => $_POST['follow_btn_layout'],
			"follow_btn_size" 	     => $_POST['follow_btn_size'],
			"follow_btn_show_faces"  => $_POST['follow_btn_show_faces'],
			"follow_btn_page_show"   => $_POST['follow_btn_page_show'],	
			"follow_btn_post_show"   => $_POST['follow_btn_post_show'],
			"follow_btn_lang"	  	 => $_POST['follow_btn_lang'],			
		); */
		//print_r($fbnewsettings);
		if(update_option('fb_like_buttons_settings', $_POST)) {
			echo "yes";
		} else {
			echo "no";
		}
	} // end of save if	
} // end of setting page fuction

//doc page
function fb_social_button_doc(){
	require('docs.php');
} // end of doc page fuction
?>