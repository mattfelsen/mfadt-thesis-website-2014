<?php

add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
    load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    global $content_width;
    if ( ! isset( $content_width ) ) $content_width = 640;
    register_nav_menus(
    array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
    );
}

add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
    wp_enqueue_script( 'jquery' );
}

add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
    if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
    if ( $title == '' ) {
        return '&rarr;';
        } else {
        return $title;
    }
}

add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
    return $title . esc_attr( get_bloginfo( 'name' ) );
}

add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
    register_sidebar( array (
    'name' => __( 'Sidebar Widget Area', 'blankslate' ),
    'id' => 'primary-widget-area',
    'before_widget' => '&lt;li id="%1$s" class="widget-container %2$s"&gt;',
    'after_widget' => "</li>",
    'before_title' => '&lt;h3 class="widget-title"&gt;',
    'after_title' => '&lt;/h3&gt;',
    ) );
}

function blankslate_custom_pings( $comment )
{
    $GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}

add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

//
// Hide certain meta boxes on the admin edit screen.
// - get rid of WP Types's silly marketing box for their Views plugin
// - get rid of Categories & Tags if the user is an author (i.e. not an admin)
//
add_action( 'admin_menu',    'remove_meta_boxes_admin_menu' );
add_action( 'do_meta_boxes', 'remove_meta_boxes_do_meta' );
function remove_meta_boxes_admin_menu()
{
	if (wp_get_current_user()->roles[0] == "author") {
		remove_meta_box('categorydiv', 'project', 'normal');
		//remove_meta_box('tagsdiv-post_tag', 'project', 'normal');
	}
}
function remove_meta_boxes_do_meta()
{
	remove_meta_box('wpcf-marketing', 'project', 'side');
}

//
// Change Featured Image meta box to say Project Thumbnail instead
//
add_action( 'add_meta_boxes', 'change_project_featured_image_metabox_title' ); // , 10, 2 );
function change_project_featured_image_metabox_title( $post_type, $post ) {
    if ( $post_type === 'project' ) {
        //remove original featured image metabox
        remove_meta_box( 'postimagediv', 'project', 'side' );

        //add our customized metabox
        add_meta_box( 'postimagediv', __('Project Thumbnail'), 'post_thumbnail_meta_box', 'project', 'side', 'low' );
    }
}

// 
// Change the tags side meta box to work like categories (i.e. show a list of tags with checkboxes)
// instead of the default empty text box which autocompletes, but isn't helpful for tag discovery.
// The "Manage Tags Capability" plugin takes care of this, but doesn't affect custom post types by
// default. This adds the plugin code to custom projects
//
function add_mtc_post_types( $types )
{
    $types[] = 'project';
    return $types;
}
add_filter( 'rd2_mtc_post_types', 'add_mtc_post_types' );

