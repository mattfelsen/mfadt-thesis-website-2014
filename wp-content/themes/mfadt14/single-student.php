<?php

$project = $wpdb->get_var("SELECT post_name FROM wp_posts WHERE id = '".wpcf_pr_post_get_belongs(get_the_ID(), 'project')."'");

wp_redirect("project/$project");
exit;

?>