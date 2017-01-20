<?php
//Facebook Like Share Follow Buttons
class FbSocialFacebookButtons extends WP_Widget {
	
    // Constructor
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'Facebook Like Share Follow Button',
			'description' => 'This is facebook like share follow widget you can add this in a widget area or wherever you want it is very easy to use.',
		);
		parent::__construct( 'FbSocialFacebookButtons', 'Facebook Like Share Follow Button', $widget_ops );
	}
	
	// Outputs Of the Widget
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		//print_r($instance);
		//facbook like button
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'text_domain' );
		
		$like_button_url = ! empty( $instance['like_button_url'] ) ? $instance['like_button_url'] : __( 'https://www.facebook.com/awplife', 'text_domain' );
		$like_button_width = ! empty( $instance['like_button_width'] ) ? $instance['like_button_width'] : __( 360, 'text_domain' );
		$like_button_layout = ! empty( $instance['like_button_layout'] ) ? $instance['like_button_layout'] : __( 'standard', 'text_domain' );
		$like_button_action_type = ! empty( $instance['like_button_action_type'] ) ? $instance['like_button_action_type'] : __( 'like', 'text_domain' );
		$like_button_button_size = ! empty( $instance['like_button_button_size'] ) ? $instance['like_button_button_size'] : __( 'large', 'text_domain' );
		$like_button_show_faces = ! empty( $instance['like_button_show_faces'] ) ? $instance['like_button_show_faces'] : __( 'true', 'text_domain' );
		
		//facbook share button
		$share_button_url_type = "dynamic";
		if($share_button_url_type == "dynamic") {
			$share_button_url = $_SERVER['REQUEST_URI'];
		} else {
			$share_button_url = ! empty( $instance['share_button_url'] ) ? $instance['share_button_url'] : __( 'http://www.awplife.com', 'text_domain' );
		}
		$share_button_url = ! empty( $instance['share_button_url'] ) ? $instance['share_button_url'] : __( '', 'text_domain' );
		$share_button_url_type = ! empty( $instance['share_button_url_type'] ) ? $instance['share_button_url_type'] : __( '', 'text_domain' );
		$share_button_layout = ! empty( $instance['share_button_layout'] ) ? $instance['share_button_layout'] : __( '', 'text_domain' );
		$share_button_button_size = ! empty( $instance['share_button_button_size'] ) ? $instance['share_button_button_size'] : __( '', 'text_domain' );
		$share_button_mobile_frame = ! empty( $instance['share_button_mobile_frame'] ) ? $instance['share_button_mobile_frame'] : __( '', 'text_domain' );
		
		//facbook follow button
		$follow_button_url = ! empty( $instance['follow_button_url'] ) ? $instance['follow_button_url'] : __( 'https://www.facebook.com/awplife', 'text_domain' );
		$follow_button_width = ! empty( $instance['follow_button_width'] ) ? $instance['follow_button_width'] : __( 360, 'text_domain' );
		$follow_button_height = ! empty( $instance['follow_button_height'] ) ? $instance['follow_button_height'] : __( '', 'text_domain' );
		$follow_button_layout_style = ! empty( $instance['follow_button_layout_style'] ) ? $instance['follow_button_layout_style'] : __( 'standard', 'text_domain' );
		$follow_button_button_size = ! empty( $instance['follow_button_button_size'] ) ? $instance['follow_button_button_size'] : __( 'large', 'text_domain' );
		$follow_button_show_faces = ! empty( $instance['follow_button_show_faces'] ) ? $instance['follow_button_show_faces'] : __( 'true', 'text_domain' );
		
		$language = ! empty( $instance['language'] ) ? $instance['language'] : __( 'en_US', 'text_domain' );
		
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] )) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		?>
		<script>
			jQuery(document).ready(function(){
				jQuery('[data-toggle="tooltip"]').tooltip();   
			}); 
		</script>
		<style>
		.facebook-widget{
			margin-top:20px;
			margin-bottom:20px;
		}
		</style>
		<div id="fb-root" class="facebook-widget"></div>
		<!--facbook like button-->
		<script>
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/<?php echo $language; ?>/sdk.js#xfbml=1&version=v2.7";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		
		<div class="fb-like" data-toggle="tooltip" title="Like my facebook page!" 
			data-href="<?php echo $like_button_url; ?>" 
			data-layout="<?php echo $like_button_layout; ?>" 
			data-action="<?php echo $like_button_action_type; ?>" 
			data-size="<?php echo $like_button_button_size; ?>" 
			data-show-faces="<?php echo $like_button_show_faces; ?>"
			data-share="false">
		</div>
		
		<!--facbook share button-->
	
		<div id="fb-root" class="facebook-widget"></div>
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/<?php echo $language; ?>/sdk.js#xfbml=1&version=v2.7";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class="fb-share-button" data-toggle="tooltip" title="Share on facebook!"  data-href="<?php echo $share_button_url; ?>" data-layout="<?php echo $share_button_layout; ?>" data-size="<?php echo $share_button_button_size; ?>" data-mobile-iframe="<?php echo $share_button_mobile_frame; ?>">
			<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($share_button_url); ?>&amp;src=sdkpreparse">Share</a>
		</div>
		
		<!--facbook follow button-->

		<div id="fb-root" class="facebook-widget"></div>
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/<?php echo $language; ?>/sdk.js#xfbml=1&version=v2.7";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class="fb-follow" data-toggle="tooltip" title="Follow me on facebook!" 
		data-href="<?php echo $follow_button_url; ?>" 
		data-layout="<?php echo $follow_button_layout_style; ?>" 
		data-size="<?php echo $follow_button_button_size; ?>" 
		data-show-faces="<?php echo $follow_button_show_faces; ?>">
		</div>
		
		<?php
		echo $args['after_widget'];
	}
	
	// Widget Form For Admin
	public function form( $instance ) {
		wp_enqueue_style ( 'nsmw-bootstrap-css', FBSB_PLUGIN_PATH . 'css/output-bootstrap.css');
		wp_enqueue_script( 'jquery');
		//print_r($instance);
		//facbook like button
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'text_domain' );
		$like_button_url = ! empty( $instance['like_button_url'] ) ? $instance['like_button_url'] : __( 'https://www.facebook.com/awplife', 'text_domain' );
		$like_button_width = ! empty( $instance['like_button_width'] ) ? $instance['like_button_width'] : __( 360, 'text_domain' );
		$like_button_layout = ! empty( $instance['like_button_layout'] ) ? $instance['like_button_layout'] : __( 'standard', 'text_domain' );
		$like_button_action_type = ! empty( $instance['like_button_action_type'] ) ? $instance['like_button_action_type'] : __( 'like', 'text_domain' );
		$like_button_button_size = ! empty( $instance['like_button_button_size'] ) ? $instance['like_button_button_size'] : __( 'large', 'text_domain' );
		$like_button_show_faces = ! empty( $instance['like_button_show_faces'] ) ? $instance['like_button_show_faces'] : __( 'true', 'text_domain' );
		
		//facbook share button
		$share_button_url = ! empty( $instance['share_button_url'] ) ? $instance['share_button_url'] : __( '', 'text_domain' );
		$share_button_url_type = ! empty( $instance['share_button_url_type'] ) ? $instance['share_button_url_type'] : __( '', 'text_domain' );
		$share_button_layout = ! empty( $instance['share_button_layout'] ) ? $instance['share_button_layout'] : __( '', 'text_domain' );
		$share_button_button_size = ! empty( $instance['share_button_button_size'] ) ? $instance['share_button_button_size'] : __( '', 'text_domain' );
		$share_button_mobile_frame = ! empty( $instance['share_button_mobile_frame'] ) ? $instance['share_button_mobile_frame'] : __( '', 'text_domain' );
		
		//facbook follow button
		$follow_button_url = ! empty( $instance['follow_button_url'] ) ? $instance['follow_button_url'] : __( 'https://www.facebook.com/awplife', 'text_domain' );
		$follow_button_width = ! empty( $instance['follow_button_width'] ) ? $instance['follow_button_width'] : __( 360, 'text_domain' );
		$follow_button_height = ! empty( $instance['follow_button_height'] ) ? $instance['follow_button_height'] : __( '', 'text_domain' );
		$follow_button_layout_style = ! empty( $instance['follow_button_layout_style'] ) ? $instance['follow_button_layout_style'] : __( 'standard', 'text_domain' );
		$follow_button_button_size = ! empty( $instance['follow_button_button_size'] ) ? $instance['follow_button_button_size'] : __( 'large', 'text_domain' );
		$follow_button_show_faces = ! empty( $instance['follow_button_show_faces'] ) ? $instance['follow_button_show_faces'] : __( 'true', 'text_domain' );
		
		$language = ! empty( $instance['language'] ) ? $instance['language'] : __( 'en_US', 'text_domain' );
		?>
		<script>
			jQuery(".static").click(function(){
				jQuery(".url-feild").show();
			});
			jQuery(".dynamic").click(function(){
				jQuery(".url-feild").hide();
			});
		</script>
		<style>
			.fb-heading{
				color:#0073AA;
			}
		</style>
		<!--facbook like button-->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</label>
		</p>
		<h2 class="fb-heading">Facebook Like Button Settings</h2>
		<hr>
		<p>
			<label for="<?php echo $this->get_field_id('like_button_url'); ?>"><?php _e('Share Url'); ?> <input class="widefat" id="<?php echo $this->get_field_id('like_button_url'); ?>" name="<?php echo $this->get_field_name('like_button_url'); ?>" type="text" value="<?php echo $like_button_url; ?>" />
			</label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('like_button_width'); ?>"><?php _e('Width'); ?> <input class="widefat" id="<?php echo $this->get_field_id('like_button_width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $like_button_width; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'like_button_layout' ) ); ?>"><?php _e( esc_attr( 'Button Layout' ) ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'like_button_layout' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'like_button_layout' ) ); ?>">
				<option value="standard" <?php if($like_button_layout == 'standard' ) echo "selected=selected"; ?> >standard</option>
				<option value="box_count" <?php if($like_button_layout == 'box_count' ) echo "selected=selected"; ?>>Box count</option>
				<option value="button_count" <?php if($like_button_layout == 'button_count' ) echo "selected=selected"; ?>>Button count</option>
				<option value="button" <?php if($like_button_layout == 'button' ) echo "selected=selected"; ?>>Button</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'like_button_action_type' ) ); ?>"><?php _e( esc_attr( 'Button Action Type' ) ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'like_button_action_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'like_button_action_type' ) ); ?>">
				<option value="like" <?php if($like_button_action_type == 'like' ) echo "selected=selected"; ?> >Like</option>
				<option value="recommend" <?php if($like_button_action_type == 'recommend' ) echo "selected=selected"; ?>>Recommend</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'like_button_button_size' ) ); ?>"><?php _e( esc_attr( 'Button Size' ) ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'like_button_button_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'like_button_button_size' ) ); ?>">
				<option value="small" <?php if($like_button_button_size == 'small' ) echo "selected=selected"; ?> >Small</option>
				<option value="large" <?php if($like_button_button_size == 'large' ) echo "selected=selected"; ?>>Large</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'like_button_show_faces' ); ?>"><?php _e( 'Enable Show Faces' ); ?></label><br>
			<input class="widefat" id="<?php echo $this->get_field_id( 'like_button_show_faces' ); ?>" name="<?php echo $this->get_field_name( 'like_button_show_faces' ); ?>" <?php if($like_button_show_faces == 'true') echo "checked=checked" ?> type="radio" value="true"> Yes &nbsp;&nbsp;
			<input class="widefat" id="<?php echo $this->get_field_id( 'like_button_show_faces' ); ?>" name="<?php echo $this->get_field_name( 'like_button_show_faces' ); ?>" <?php if($like_button_show_faces == 'false') echo "checked=checked" ?> type="radio" value="false"> No
		</p>
		<br>
		
		<!--facbook share button-->
		<h2 class="fb-heading">Facebook Share Button Settings</h2>
		<hr>
		<p>
			<label for="<?php echo $this->get_field_id( 'share_button_url_type' ); ?>"><?php _e( 'Share URL' ); ?></label><br>
			<input class="widefat dynamic" id="<?php echo $this->get_field_id( 'share_button_url_type' ); ?>" name="<?php echo $this->get_field_name( 'share_button_url_type' ); ?>" <?php if($share_button_url_type == 'dynamic') echo "checked=checked" ?> type="radio" value="dynamic"> Dynamic &nbsp;&nbsp;
			<input class="widefat static" id="<?php echo $this->get_field_id( 'share_button_url_type' ); ?>" name="<?php echo $this->get_field_name( 'share_button_url_type' ); ?>" <?php if($share_button_url_type == 'static') echo "checked=checked" ?> type="radio" value="static"> Static
		</p>
		<p class="url-feild" <?php if($share_button_url_type == "dynamic") { ?> style="display:none"; <?php } ?>>
			<label for="<?php echo $this->get_field_id('share_button_url'); ?>"><?php _e('Url to share:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('share_button_url'); ?>" name="<?php echo $this->get_field_name('share_button_url'); ?>" type="text" value="<?php echo $share_button_url; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'share_button_layout' ) ); ?>"><?php _e( esc_attr( 'Button Layout' ) ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'share_button_layout' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'share_button_layout' ) ); ?>">
				<option value="box_count" <?php if($share_button_layout == 'box_count' ) echo "selected=selected"; ?> >Box Count</option>
				<option value="button_count" <?php if($share_button_layout == 'button_count' ) echo "selected=selected"; ?>>Button Count</option>
				<option value="button" <?php if($share_button_layout == 'button' ) echo "selected=selected"; ?>>Button</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'share_button_button_size' ) ); ?>"><?php _e( esc_attr( 'Button Size' ) ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'share_button_button_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'share_button_button_size' ) ); ?>">
				<option value="small" <?php if($share_button_button_size == 'small' ) echo "selected=selected"; ?> >Small</option>
				<option value="large" <?php if($share_button_button_size == 'large' ) echo "selected=selected"; ?>>Large</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'share_button_mobile_frame' ); ?>"><?php _e( 'Enable Mobile Frame' ); ?></label><br>
			<input class="widefat" id="<?php echo $this->get_field_id( 'share_button_mobile_frame' ); ?>" name="<?php echo $this->get_field_name( 'share_button_mobile_frame' ); ?>" <?php if($share_button_mobile_frame == 'true') echo "checked=checked" ?> type="radio" value="true"> Yes &nbsp;&nbsp;
			<input class="widefat" id="<?php echo $this->get_field_id( 'share_button_mobile_frame' ); ?>" name="<?php echo $this->get_field_name( 'share_button_mobile_frame' ); ?>" <?php if($share_button_mobile_frame == 'false') echo "checked=checked" ?> type="radio" value="false"> No
		</p>
		<br>
		
		<!--facbook follow button-->
		<h2 class="fb-heading">Facebook Follow Button</h2>
		<hr>
		<p>
			<label for="<?php echo $this->get_field_id('follow_button_url'); ?>"><?php _e('Share Url'); ?> <input class="widefat" id="<?php echo $this->get_field_id('follow_button_url'); ?>" name="<?php echo $this->get_field_name('follow_button_url'); ?>" type="text" value="<?php echo $follow_button_url; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'follow_button_layout_style' ) ); ?>"><?php _e( esc_attr( 'Button Layout Style:' ) ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'follow_button_layout_style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'follow_button_layout_style' ) ); ?>">
				<option value="standard" <?php if($follow_button_layout_style == 'standard' ) echo "selected=selected"; ?> >Standerd</option>
				<option value="box_count" <?php if($follow_button_layout_style == 'box_count' ) echo "selected=selected"; ?>>Box count</option>
				<option value="button_count" <?php if($follow_button_layout_style == 'button_count' ) echo "selected=selected"; ?>>Button count</option>
				<option value="button" <?php if($follow_button_layout_style == 'button' ) echo "selected=selected"; ?>>Button</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'follow_button_button_size' ) ); ?>"><?php _e( esc_attr( 'Button Size' ) ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'follow_button_button_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'follow_button_button_size' ) ); ?>">
				<option value="small" <?php if($follow_button_button_size == 'small' ) echo "selected=selected"; ?> >Small</option>
				<option value="large" <?php if($follow_button_button_size == 'large' ) echo "selected=selected"; ?>>Large</option>
			</select>
		</p>		
		<p>
			<label for="<?php echo $this->get_field_id('follow_button_width'); ?>"><?php _e('Width'); ?> <input class="widefat" id="<?php echo $this->get_field_id('follow_button_width'); ?>" name="<?php echo $this->get_field_name('follow_button_width'); ?>" type="text" value="<?php echo $follow_button_width; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('follow_button_height'); ?>"><?php _e('Height'); ?> <input class="widefat" id="<?php echo $this->get_field_id('follow_button_height'); ?>" name="<?php echo $this->get_field_name('follow_button_height'); ?>" type="text" value="<?php echo $follow_button_height; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'follow_button_show_faces' ); ?>"><?php _e( 'Enable Show Faces' ); ?></label><br>
			<input class="widefat" id="<?php echo $this->get_field_id( 'follow_button_show_faces' ); ?>" name="<?php echo $this->get_field_name( 'follow_button_show_faces' ); ?>" <?php if($follow_button_show_faces == 'true') echo "checked=checked" ?> type="radio" value="true"> Yes &nbsp;&nbsp;
			<input class="widefat" id="<?php echo $this->get_field_id( 'follow_button_show_faces' ); ?>" name="<?php echo $this->get_field_name( 'follow_button_show_faces' ); ?>" <?php if($follow_button_show_faces == 'false') echo "checked=checked" ?> type="radio" value="false"> No
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'language' ); ?>"><?php _e( 'Widget Defalut Language' ); ?></label><br>
			<select id="<?php echo $this->get_field_id( 'language' ); ?>" name="<?php echo $this->get_field_name( 'language' ); ?>">
				<option value="en_US" <?php if ($language == 'en_US') echo ' selected="selected"'; ?>>English (US)</option>
				<option value="en_GB" <?php if ($language == 'en_GB') echo ' selected="selected"'; ?>>English (UK)</option>
				<option value="af_ZA" <?php if ($language == 'af_ZA') echo ' selected="selected"'; ?>>Afrikaans</option>
				<option value="ar_AR" <?php if ($language == 'ar_AR') echo ' selected="selected"'; ?>>Arabic</option>
				<option value="hy_AM" <?php if ($language == 'hy_AM') echo ' selected="selected"'; ?>>Armenian</option>
				<option value="bg_BG" <?php if ($language == 'bg_BG') echo ' selected="selected"'; ?>>Bulgarian</option>
				<option value="br_FR" <?php if ($language == 'br_FR') echo ' selected="selected"'; ?>>Breton</option>
				<option value="cs_CZ" <?php if ($language == 'cs_CZ') echo ' selected="selected"'; ?>>Czech</option>
				<option value="zh_CN" <?php if ($language == 'zh_CN') echo ' selected="selected"'; ?>>Chinese (Simplified China)</option>
				<option value="zh_HK" <?php if ($language == 'zh_HK') echo ' selected="selected"'; ?>>Chinese (Traditional Hong Kong)</option>
				<option value="zh_TW" <?php if ($language == 'zh_TW') echo ' selected="selected"'; ?>>Chinese (Traditional Taiwan)</option>
				<option value="da_DK" <?php if ($language == 'da_DK') echo ' selected="selected"'; ?>>Danish</option>
				<option value="nl_NL" <?php if ($language == 'nl_NL') echo ' selected="selected"'; ?>>Dutch</option>
				<option value="fr_FR" <?php if ($language == 'fr_FR') echo ' selected="selected"'; ?>>French (France)</option>
				<option value="fr_CA" <?php if ($language == 'fr_CA') echo ' selected="selected"'; ?>>French (Canada)</option>
				<option value="de_DE" <?php if ($language == 'de_DE') echo ' selected="selected"'; ?>>German</option>
				<option value="he_IL" <?php if ($language == 'he_IL') echo ' selected="selected"'; ?>>Hebrew</option>
				<option value="hi_IN" <?php if ($language == 'hi_IN') echo ' selected="selected"'; ?>>Hindi</option>
				<option value="hu_HU" <?php if ($language == 'hu_HU') echo ' selected="selected"'; ?>>Hungarian</option>
				<option value="ga_IE" <?php if ($language == 'ga_IE') echo ' selected="selected"'; ?>>Irish</option>
				<option value="id_ID" <?php if ($language == 'id_ID') echo ' selected="selected"'; ?>>Indonesian</option>
				<option value="it_IT" <?php if ($language == 'it_IT') echo ' selected="selected"'; ?>>Italian</option>
				<option value="ja_JP" <?php if ($language == 'ja_JP') echo ' selected="selected"'; ?>>Japanese</option>
				<option value="kk_KZ" <?php if ($language == 'kk_KZ') echo ' selected="selected"'; ?>>Kazakh</option>
				<option value="ko_KR" <?php if ($language == 'ko_KR') echo ' selected="selected"'; ?>>Korean</option>
				<option value="la_VA" <?php if ($language == 'la_VA') echo ' selected="selected"'; ?>>Latin</option>
				<option value="ne_NP" <?php if ($language == 'ne_NP') echo ' selected="selected"'; ?>>Nepali</option>
				<option value="fa_IR" <?php if ($language == 'fa_IR') echo ' selected="selected"'; ?>>Persian</option>			
				<option value="pl_PL" <?php if ($language == 'pl_PL') echo ' selected="selected"'; ?>>Polish</option>
				<option value="pt_PT" <?php if ($language == 'pt_PT') echo ' selected="selected"'; ?>>Portuguese </option>
				<option value="ro_RO" <?php if ($language == 'ro_RO') echo ' selected="selected"'; ?>>Romanian</option>
				<option value="ru_RU" <?php if ($language == 'ru_RU') echo ' selected="selected"'; ?>>Russian</option>
				<option value="es_LA" <?php if ($language == 'es_LA') echo ' selected="selected"'; ?>>Spanish</option>
				<option value="es_CL" <?php if ($language == 'es_CL') echo ' selected="selected"'; ?>>Spanish (Chile)</option>
				<option value="es_CO" <?php if ($language == 'es_CO') echo ' selected="selected"'; ?>>Spanish (Colombia)</option>
				<option value="es_ES" <?php if ($language == 'es_ES') echo ' selected="selected"'; ?>>Spanish (Spain)</option>
				<option value="es_MX" <?php if ($language == 'es_MX') echo ' selected="selected"'; ?>>Spanish (Mexico)</option>
				<option value="es_VE" <?php if ($language == 'es_VE') echo ' selected="selected"'; ?>>Spanish (Venezuela)</option>
				<option value="sr_RS" <?php if ($language == 'sr_RS') echo ' selected="selected"'; ?>>Serbian</option>
				<option value="sv_SE" <?php if ($language == 'sv_SE') echo ' selected="selected"'; ?>>Swedish</option>
				<option value="th_TH" <?php if ($language == 'th_TH') echo ' selected="selected"'; ?>>Thai</option>
				<option value="tr_TR" <?php if ($language == 'tr_TR') echo ' selected="selected"'; ?>>Turkish</option>
				<option value="ur_PK" <?php if ($language == 'ur_PK') echo ' selected="selected"'; ?>>Urdu</option>
			</select>
		</p>
		<?php 
	}

	/**
	 * Processing On Save
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		//facebook like button
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : 'Follow';
		$instance['like_button_url'] = ( ! empty( $new_instance['like_button_url'] ) ) ? strip_tags( $new_instance['like_button_url'] ) : 'https://www.facebook.com/awplife';
		$instance['like_button_width'] = ( ! empty( $new_instance['like_button_width'] ) ) ? strip_tags( $new_instance['like_button_width'] ) : 360;
		$instance['like_button_layout'] = ( ! empty( $new_instance['like_button_layout'] ) ) ? strip_tags( $new_instance['like_button_layout'] ) : 'standard';
		$instance['like_button_action_type'] = ( ! empty( $new_instance['like_button_action_type'] ) ) ? strip_tags( $new_instance['like_button_action_type'] ) : 'like';
		$instance['like_button_button_size'] = ( ! empty( $new_instance['like_button_button_size'] ) ) ? strip_tags( $new_instance['like_button_button_size'] ) : 'large';
		$instance['like_button_show_faces'] = ( ! empty( $new_instance['like_button_show_faces'] ) ) ? strip_tags( $new_instance['like_button_show_faces'] ) : 'true';
		
		//facebook share button
		/* $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : 'Share'; */
		$instance['share_button_url_type'] = ( ! empty( $new_instance['share_button_url_type'] ) ) ? strip_tags( $new_instance['share_button_url_type'] ) : 'dynamic';
		$instance['share_button_url'] = ( ! empty( $new_instance['share_button_url'] ) ) ? strip_tags( $new_instance['share_button_url'] ) : 'https://www.facebook.com/awplife';
		$instance['share_button_layout'] = ( ! empty( $new_instance['share_button_layout'] ) ) ? strip_tags( $new_instance['share_button_layout'] ) : 'button_count';
		$instance['share_button_button_size'] = ( ! empty( $new_instance['share_button_button_size'] ) ) ? strip_tags( $new_instance['share_button_button_size'] ) : 'small';
		$instance['share_button_mobile_frame'] = ( ! empty( $new_instance['share_button_mobile_frame'] ) ) ? strip_tags( $new_instance['share_button_mobile_frame'] ) : 'false';
		
		//facebook follow button
		/* $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : 'Follow'; */
		$instance['follow_button_url'] = ( ! empty( $new_instance['follow_button_url'] ) ) ? strip_tags( $new_instance['follow_button_url'] ) : 'https://www.facebook.com/awplife';
		$instance['follow_button_width'] = ( ! empty( $new_instance['follow_button_width'] ) ) ? strip_tags( $new_instance['follow_button_width'] ) : 360;
		$instance['follow_button_height'] = ( ! empty( $new_instance['follow_button_height'] ) ) ? strip_tags( $new_instance['follow_button_height'] ) : '';
		$instance['follow_button_layout_style'] = ( ! empty( $new_instance['follow_button_layout_style'] ) ) ? strip_tags( $new_instance['follow_button_layout_style'] ) : 'standard';
		$instance['follow_button_button_size'] = ( ! empty( $new_instance['follow_button_button_size'] ) ) ? strip_tags( $new_instance['follow_button_button_size'] ) : 'large';
		$instance['follow_button_show_faces'] = ( ! empty( $new_instance['follow_button_show_faces'] ) ) ? strip_tags( $new_instance['follow_button_show_faces'] ) : 'true';
		
		$instance['language'] = ( ! empty( $new_instance['language'] ) ) ? strip_tags( $new_instance['language'] ) : 'en_US';
		return $instance;
	}
}
?>