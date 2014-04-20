=== Manage Tags Capability ===
Contributors: rd2inc, bjallen, Leia Scofield, iandunn
Donate link: http://www.rd2inc.com
Tags: admin, meta-box, meta, post, tags, roles, capability, moderation
Requires at least: 2.6
Tested up to: 3.2.1
Stable tag: 1.1.1

Prevents lower-level users from creating new tags when editing a post, but still allows them to choose from a list of existing tags.

== Description ==

This plugin is perfect for blogs with multiple contributing users that need to limit lower-level writers, like authors or contributors, to tags set by administrators or editors.

Why do you need Manage Tags Capability?

By default, WordPress allows any user to add any tag they want to their posts. This could lead to your site having a large database of tags with only one or two posts associated with them. Also, if you aren’t constantly monitoring the tags used on your site, you could find that your authors have used inappropriate tags.

Manage Tags Capability solves these issues by removing the form field for adding tags and replacing it with a checkbox list of all existing tags for specific user levels.

How does Manage Tags Capability work?

Manage Tag Capability limits managing and adding tags to only those user roles with the built-in manage_categories capability. By default, this is editors and admins. Their process is unchanged. For all other roles, the default tag box will be replaced with a checkbox list of existing tags (similar to the category checkboxes) when adding or editing posts.

As a side benefit, users without manage_categories capability will have all existing tags exposed to them. By default, WordPress only allows you to choose from the most used tags. Manage Tags Capability lists all existing tags in its checkbox list, exposing all potential tags to users without the manage_categories capability.

== Installation ==

1. Download the Manage Tags Capability zip file.
1. Unzip and upload the folder to your wp-content/plugins directory.
1. Activate the plugin from your WordPress Admin > Plugins menu.

== Screenshots ==

1. For roles without the built-in manage_categories capability, the default tag box will be replaced with a checkbox list of existing tags (similar to the category checkboxes) when adding or editing posts.

== Changelog ==

= 1.1.1 =
* added support for custom post types

= 1.1 =
* changed the argument in the get_terms query to get=>all rather than just hide_empty=>0 to ensure all tags are returned
* expanded readme info and added screenshot
* tested against WP 2.9.1

= 1.0 =
* initial release

== Frequently Asked Questions ==

= Are there any settings? =
There are currently no settings for Manage Tags Capability. Once the plugin is activated, it will modify the tags menu on posts for users without manage_categories ability.

To modify the default settings for the manage_categories ability, you can add a plugin like Capabilities Manager to turn the manage_categories capability on and off for specific user levels.

= Are custom post types supported? =
Yes. If you want the plugin to affect a custom post type, just add this code to your theme or plugin:

`
function add_mtc_post_types( $types )
{
	$types[] = 'your-post-type-slug';
	
	return $types;
}
add_filter( 'rd2_mtc_post_types', 'add_mtc_post_types' );
`

== Upgrade Notice ==

= 1.1.1 =
MTC 1.1.1 adds support for custom post types.