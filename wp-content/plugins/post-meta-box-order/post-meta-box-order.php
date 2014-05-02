<?php
/*
Plugin Name: Post Meta Box Order
Plugin URI: http://github.com/LettoBlog/post-meta-box-order
Description: Easily change the order of the meta boxes on the posts screen.
Author: Mustafa Uysal, LettoBlog
Version: 1.0
Author URI: http://lettoblog.com
Network: true
License: GPLv2 or later
*/

// If you want to force users? set it true
$force_override = true;


//----------------------------------------Config----------------------------------------//

/**
 * Change this if you update the metabox order and want all users to have
 * the new order instead of just new users.
 * Note that this will overwrite the meta boxes order users have
 */
$posts_widgets_order_hash = '079e54b7679111af34baf06e89439bfgg';


/**
 * Default meta boxes
 * submitdiv - publish
 * categorydiv - category
 * tagsdiv-post_tag - tags
 * postimagediv -  featured image
 * authordiv - author
 * postexcerpt -  excerpt
 * commentstatusdiv - Discussion
 * ........
 *
 * If you want to order any plugin's meta box use meta box's $id
 */


//Left Cloumn
$posts_widgets_order_left_column[] = 'postexcerpt';
$posts_widgets_order_left_column[] = 'commentstatusdiv';
$posts_widgets_order_left_column[] = 'wpcf-group-project-details';
$posts_widgets_order_left_column[] = 'wpcf-group-images-video';
$posts_widgets_order_left_column[] = 'wpcf-group-symposium';
$posts_widgets_order_left_column[] = 'authordiv';


//Right Cloumn
$posts_widgets_order_right_column[] = 'submitdiv';
$posts_widgets_order_right_column[] = 'categorydiv';
$posts_widgets_order_right_column[] = 'tagsdiv-post_tag';
$posts_widgets_order_right_column[] = 'postimagediv';


add_action('init', 'posts_widgets_order');

function posts_widgets_order() {
    global $wpdb, $user_ID, $posts_widgets_order_left_column, $posts_widgets_order_right_column, $posts_widgets_order_hash, $force_override;


    if ( !empty( $user_ID ) ) {
        $posts_widget_order_updated = get_user_option('meta-box-order_project_hash', $user_ID);

        if ( ($posts_widget_order_updated != $posts_widgets_order_hash) || ( $force_override === true ) ) {

            $left_column = '';
            foreach ( $posts_widgets_order_left_column as $posts_widgets_order_left_column_widget ) {
                $left_column .= $posts_widgets_order_left_column_widget . ',';
            }
            $left_column = rtrim($left_column, ',');

            $right_column = '';
            foreach ( $posts_widgets_order_right_column as $posts_widgets_order_right_column_widget ) {
                $right_column .= $posts_widgets_order_right_column_widget . ',';
            }
            $right_column = rtrim($right_column, ',');

            $posts_widget_order = array();

            $posts_widget_order['side'] = $right_column;
            $posts_widget_order['normal'] = $left_column;

            update_user_option($user_ID, 'meta-box-order_project', $posts_widget_order, true);
            update_user_option($user_ID, 'meta-box-order_project_hash', $posts_widgets_order_hash, true);
        }
    }
}
