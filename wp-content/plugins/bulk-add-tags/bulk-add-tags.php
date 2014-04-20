<?php
/*
	Plugin Name: Bulk Add Tags
	Plugin URI: http://wpreader.com
	Description: Bulk Add Tags sets up additional functionality on the 'Post Tags' page that allows you to add post tags in bulk.
	Version: 0.2
	Author: Anton Samper Rivaya
	Author URI: http://aeser.co.uk
	License: GPL2
	
	Copyright 2011  Anton Samper Rivaya  (email : anton@aeser.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function wpr_bulk_add_tags( $hook ) {

	if( $hook == 'edit-tags.php' && $_GET['taxonomy'] == 'post_tag' ) {
	
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_script( 'thickbox' );
		
		wp_register_script( 'wpr-bulk-add-tags', plugins_url('/bulk-add-tags.js', __FILE__) );
		wp_enqueue_script( 'wpr-bulk-add-tags' );
		
		$plugin_url = WP_PLUGIN_URL."/bulk-add-tags/";
		
		wp_localize_script( 'wpr-bulk-add-tags', 'wpr_bat_vars', array( 'plugin_url' => $plugin_url ) );
    
  }
}
add_action('admin_enqueue_scripts','wpr_bulk_add_tags',10,1);

?>