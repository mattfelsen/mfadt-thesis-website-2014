<input type="hidden" name="rd2_mtc_nonce" id="rd2_mtc_nonce" value="<?php echo $rd2_mtc_nonce ?>" />

<ul id="rd2_mtc_tag_list" style="height: 150px; overflow: auto; border: 1px solid #dfdfdf; margin: 1em 0; padding: .5em;">

<?php foreach($all_post_tags as $tag) : ?>
	<li>
		<input type="checkbox" value="<?php echo $tag->name; ?>" name="rd2_mtc_tags[]" id="tagged_<?php echo $tag->term_id; ?>" <?php if ( in_array( $tag->term_id, $assigned_ids ) ) echo ' checked="true"'; ?>/>
		<label for="tagged_<?php echo $tag->term_id; ?>"><?php echo $tag->name; ?></label>
	</li>
<?php endforeach; ?>
</ul>
<p>New tags can be added by an administrator.</p>