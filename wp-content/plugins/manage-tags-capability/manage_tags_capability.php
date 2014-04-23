<?php
/*
Plugin Name: Manage Tags Capability
Plugin URI: http://wordpress.org/extend/plugins/manage-tags-capability/
Description: This plugin adds a bit more functionality to the manage_categories capability. If a user cannot manage categories, then they will see a custom box for post tags that lists all existing post tags for selection but does not allow the user to add new post tags.
Version: 1.1.1
Author: B.J. Allen, Leia Scofield
Author URI: http://rd2inc.com
Requires: WordPress Version 2.6 or above
*/

class manage_tags_capability {
	protected $post_types;
	
	public function __construct() {
		if ( !current_user_can( 'manage_categories' ) ) {
			$this->post_types = apply_filters( 'rd2_mtc_post_types', array( 'post' ) );
			
			add_action( 'do_meta_boxes', array( $this, 'remove_default_tag_box' ) );
			add_action( 'admin_menu', array( $this, 'add_restricted_tag_box' ) );
			add_action( 'save_post', array( $this, 'save_post_tags' ) );
		}
	}
	
	public function remove_default_tag_box() {
		if ( !function_exists( 'remove_meta_box' )) return;
		if( !$this->post_types ) return;
		
		foreach( array( 'normal', 'advanced', 'side' ) as $context ) {
			foreach( $this->post_types as $type ) {
				remove_meta_box( 'tagsdiv-post_tag', $type, $context );
			}
		}
	}

	public function add_restricted_tag_box() {
		if ( !function_exists( 'add_meta_box' )) return;
		if( !$this->post_types ) return;
		
		foreach( $this->post_types as $type ) {
			add_meta_box(
				'restricted_tag_box',
				__( 'Tags', 'manage_tags_capability' ),
				array( $this, 'print_restricted_tag_box' ),
				$type,
				'side'
			);
		}
	}
	
	public function print_restricted_tag_box( $post ) {
		$all_post_tags = get_terms( 'post_tag', array( 'get' => 'all' ) );
		$assigned_tags = wp_get_object_terms( $post->ID, 'post_tag' );
		$rd2_mtc_nonce = wp_create_nonce( plugin_basename(__FILE__) );

		$assigned_ids = array();
		foreach ($assigned_tags as $assigned_tag) {
			$assigned_ids[] = $assigned_tag->term_id;
		}

		require_once( WP_PLUGIN_DIR . '/manage-tags-capability/views/meta_box.php' );
	}

	public function save_post_tags( $post_id ) {	
		// bail conditions
		if ( !isset( $_POST['post_type'] ) || !in_array( $_POST['post_type'], $this->post_types ) ) return $post_id;
		if ( !wp_verify_nonce( $_POST['rd2_mtc_nonce'], plugin_basename(__FILE__) ) ) return $post_id;
		if ( ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) ) return $post_id;
		if ( !current_user_can( 'edit_post', $post_id ) ) return $post_id;

		$selected_tags = ( is_array( $_POST['rd2_mtc_tags'] ) ) ? implode( ",", $_POST['rd2_mtc_tags'] ) : array();
		wp_set_post_tags( $post_id, $selected_tags );
	}
	
} // end manage_tags_capability

add_action( 'set_current_user', 'rd2_mtc_init' );
function rd2_mtc_init()
{
	$manage_tags_capability = new manage_tags_capability();
}