<?php
/**
 * Facebook Share Button Widget
 */
class FbSocialShareButton extends WP_Widget {
	
	// Constructor
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'Facebook Share Button',
			'description' => 'This is facebook share widget you can add this in a widget area or wherever you want it is very easy to use. ',
		);
		parent::__construct( 'FbSocialShareButton', 'Facebook Share Button', $widget_ops );
	}
	
	// Outputs Of the Widget
	public function widget( $args, $instance ) {
		//print_r($instance);
		$url_type = "dynamic";
		if($url_type == "dynamic") {
			$url = $_SERVER['REQUEST_URI'];
		} else {
			$url = ! empty( $instance['url'] ) ? $instance['url'] : __( 'http://www.awplife.com', 'text_domain' );
		}
		$url = ! empty( $instance['url'] ) ? $instance['url'] : __( '', 'text_domain' );
		$url_type = ! empty( $instance['url_type'] ) ? $instance['url_type'] : __( '', 'text_domain' );
		$layout = ! empty( $instance['layout'] ) ? $instance['layout'] : __( '', 'text_domain' );
		$button_size = ! empty( $instance['button_size'] ) ? $instance['button_size'] : __( '', 'text_domain' );
		$mobile_frame = ! empty( $instance['mobile_frame'] ) ? $instance['mobile_frame'] : __( '', 'text_domain' );
		$language = ! empty( $instance['language'] ) ? $instance['language'] : __( 'en_US', 'text_domain' );
		
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		?>
		<div id="fb-root"></div>
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/<?php echo $language; ?>/sdk.js#xfbml=1&version=v2.7";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			
			//tooltip
			jQuery(document).ready(function(){
					jQuery('[data-toggle="tooltip"]').tooltip();   
			}); 
		</script>
		<div class="fb-share-button" data-toggle="tooltip" title="Share on facebook!"  data-href="<?php echo $url; ?>" data-layout="<?php echo $layout; ?>" data-size="<?php echo $button_size; ?>" data-mobile-iframe="<?php echo $mobile_frame; ?>">
			<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($url); ?>&amp;src=sdkpreparse">Share</a>
		</div>
		<?php
		echo $args['after_widget'];
	}
	
	// Widget Form For Admin
	public function form( $instance ) {
		wp_enqueue_script( 'jquery');
		//print_r($instance);
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Share', 'text_domain' );
		$url_type = ! empty( $instance['url_type'] ) ? $instance['url_type'] : __( 'dynamic', 'text_domain' );
		$url = ! empty( $instance['url'] ) ? $instance['url'] : __( 'http://www.awplife.com', 'text_domain' );
		$layout = ! empty( $instance['layout'] ) ? $instance['layout'] : __( 'box_count', 'text_domain' );
		$button_size = ! empty( $instance['button_size'] ) ? $instance['button_size'] : __( 'large', 'text_domain' );
		$mobile_frame = ! empty( $instance['mobile_frame'] ) ? $instance['mobile_frame'] : __( 'true', 'text_domain' );
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
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'url_type' ); ?>"><?php _e( 'Share URL' ); ?></label><br>
			<input class="widefat dynamic" id="<?php echo $this->get_field_id( 'url_type' ); ?>" name="<?php echo $this->get_field_name( 'url_type' ); ?>" <?php if($url_type == 'dynamic') echo "checked=checked" ?> type="radio" value="dynamic"> Dynamic &nbsp;&nbsp;
			<input class="widefat static" id="<?php echo $this->get_field_id( 'url_type' ); ?>" name="<?php echo $this->get_field_name( 'url_type' ); ?>" <?php if($url_type == 'static') echo "checked=checked" ?> type="radio" value="static"> Static
		</p>
		<p class="url-feild" <?php if($url_type == "dynamic") { ?> style="display:none"; <?php } ?>>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php _e('Url to share'); ?> <input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo $url; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>"><?php _e( esc_attr( 'Button Layout' ) ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
				<option value="box_count" <?php if($layout == 'box_count' ) echo "selected=selected"; ?> >Box Count</option>
				<option value="button_count" <?php if($layout == 'button_count' ) echo "selected=selected"; ?>>Button Count</option>
				<option value="button" <?php if($layout == 'button' ) echo "selected=selected"; ?>>Button</option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'button_size' ) ); ?>"><?php _e( esc_attr( 'Button Size' ) ); ?></label> 
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_size' ) ); ?>">
				<option value="small" <?php if($button_size == 'small' ) echo "selected=selected"; ?> >Small</option>
				<option value="large" <?php if($button_size == 'large' ) echo "selected=selected"; ?>>Large</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'mobile_frame' ); ?>"><?php _e( 'Enable Mobile Frame' ); ?></label><br>
			<input class="widefat" id="<?php echo $this->get_field_id( 'mobile_frame' ); ?>" name="<?php echo $this->get_field_name( 'mobile_frame' ); ?>" <?php if($mobile_frame == 'true') echo "checked=checked" ?> type="radio" value="true"> Yes &nbsp;&nbsp;
			<input class="widefat" id="<?php echo $this->get_field_id( 'mobile_frame' ); ?>" name="<?php echo $this->get_field_name( 'mobile_frame' ); ?>" <?php if($mobile_frame == 'false') echo "checked=checked" ?> type="radio" value="false"> No
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
		//print_r($new_instance);
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : 'Share';
		$instance['url_type'] = ( ! empty( $new_instance['url_type'] ) ) ? strip_tags( $new_instance['url_type'] ) : 'dynamic';
		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : 'https://www.facebook.com/awplife';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? strip_tags( $new_instance['layout'] ) : 'button_count';
		$instance['button_size'] = ( ! empty( $new_instance['button_size'] ) ) ? strip_tags( $new_instance['button_size'] ) : 'small';
		$instance['mobile_frame'] = ( ! empty( $new_instance['mobile_frame'] ) ) ? strip_tags( $new_instance['mobile_frame'] ) : 'false';
		$instance['language'] = ( ! empty( $new_instance['language'] ) ) ? strip_tags( $new_instance['language'] ) : 'en_US';
		return $instance;
	}
}
?>