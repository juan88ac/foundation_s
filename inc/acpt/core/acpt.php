<?php
/**
  * Advanced Custom Post Types
  *
  * This is the long description for a DocBlock. This text may contain
  * multiple lines and even some _markdown_.
  *
  * * Markdown style lists function too
  * * Just try this out once
  *
  * The section after the long description contains the tags; which provide
  * structured meta-data concerning the given element.
  *
  * @author  Kevin Dees
  *
  * @since 0.6
  * @version 0.6
  *
  * @global string $acpt_version
  */
class acpt {

	function __construct() {

	}

	public function __get($property) {
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}

	public function __set($property, $value) {
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}

		return $this;
	}

	function make_computer_name($name) {
		$pattern = '/(\s+)/';
		$replacement = '_';
		$computerName = preg_replace($pattern,$replacement,strtolower(trim($name)));
		return $computerName;
	}

	static function set_messages($messages) {
		global $post, $post_ID;
		$post_type = get_post_type( $post_ID );

		$obj = get_post_type_object($post_type);
		$singular = $obj->labels->singular_name;

		// if($obj->public == false) {
		// 	$link = false;
		// } else {
			$link_view = '<a href="%s">View '.strtolower($singular).'</a>';
			$link_pre = '<a target="_blank" href="%s">Preview '.strtolower($singular).'</a>';
		// }

		$messages[$post_type] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __($singular.' updated. ' . $link_view ), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.'),
		3 => __('Custom field deleted.'),
		4 => __($singular.' updated.'),
		5 => isset($_GET['revision']) ? sprintf( __($singular.' restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __($singular.' published. ' . $link_view ), esc_url( get_permalink($post_ID) ) ),
		7 => __('Page saved.'),
		8 => sprintf( __($singular.' submitted. ' . $link_pre ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __($singular.' scheduled for: <strong>%1$s</strong>. ' . $link_pre ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __($singular.' draft updated. ' . $link_pre ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		);
		return $messages;
	}

	static function save_form($postID) {
		if(!empty($_POST['acpt']) && check_admin_referer('actp_nonce_action','acpt_nonce_field')) :
		global $post;
		// called after a post or page is saved
		if($parent_id = wp_is_post_revision($postID)) $postID = $parent_id;
		// Loop through custom fields
		foreach($_POST as $cf_name => $cf_data) {
			// only new meta
			if( preg_match('/^acpt_.*/' , $cf_name) ) { // change to your prefix
				// validate data from custom fields
				$cf_data = trim($_POST[$cf_name]);
				$cf_data = acpt::validate($cf_name, $cf_data);

				$cf_meta = get_post_meta($postID, $cf_name, true);
				if ($cf_data) { // add and update
					if(!$cf_meta) { add_post_meta($postID, $cf_name, $cf_data); }
					elseif($cf_data != $cf_meta) { update_post_meta($postID, $cf_name, $cf_data); }
				} // delete
				elseif($cf_data == "" && isset($cf_meta)) { delete_post_meta($postID, $cf_name); }
			}
		} // end foreach
		endif; // end nonce
	}

	/*
	 * Validate Types
	 *
	 * 0 -> sql
	 * 1 -> text
	 * 2 -> html
	 * 3 -> url
	 * 4 -> img
	 * default - > none
	 * */
	static function validate($key, $value) {

		if( preg_match('/^acpt_validate0.*/' , $key) ) {
			$value = $value;
		}
		else if( preg_match('/^acpt_validate1.*/' , $key) ) {
			$value = sanitize_text_field($value);
		}
		else if( preg_match('/^acpt_validate2.*/' , $key) ) {
			$html = force_balance_tags($value);
			$value = $html;
		}
		else if( preg_match('/^acpt_validate3.*/' , $key) ) {
			$value = esc_url($value);
		}
		else if( preg_match('/^acpt_validate4.*/' , $key) ) {
			$value = esc_url($value);
		}
		else {
			$value = $value;
		}
		return $value;
	}

	static function apply_css() {
		wp_register_style( 'acpt-styles', ACPT_LOCATION . '/acpt/core/css/style.css' );
		wp_enqueue_style( 'acpt-styles' );
	}

	static function upload_scripts() {
		if(function_exists( 'wp_enqueue_media' )){
		    wp_enqueue_media();
		    wp_register_script('upload', ACPT_LOCATION .'/acpt/core/js/upload-3.5.js', array('jquery'));
				wp_enqueue_script('upload');
				wp_enqueue_script('plupload');
				wp_enqueue_script('media-upload');
				wp_enqueue_style('thickbox');
				wp_enqueue_script('thickbox');
		}
		else {
			wp_enqueue_script('plupload');
			wp_enqueue_script('media-upload');
			wp_enqueue_style('thickbox');
			wp_enqueue_script('thickbox');
			wp_register_script('upload', ACPT_LOCATION .'/acpt/core/js/upload.js', array('jquery','media-upload','thickbox'));
			wp_enqueue_script('upload');
		}
	}

}