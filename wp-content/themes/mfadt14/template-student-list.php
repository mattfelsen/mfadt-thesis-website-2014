<?php
/*
Template Name: People List
*/

get_header();

$args = array ('post_type' => 'student', 'posts_per_page' => '-1', 'orderby' => 'rand');
$query = new WP_Query( $args );

?>


<!-- html goes here -->
<div class="container">
	<h1>People</h1>

	<?php
	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
		$project = $wpdb->get_row("SELECT post_title, post_name FROM wp_posts WHERE id = '".wpcf_pr_post_get_belongs(get_the_ID(), 'project')."'");
	?>
	
	<div class="four columns">
		<h4><a href="project/<?= $project->post_name ?>"><?php the_title(); ?></a></h4>
		<p><?= $project->post_title ?></p>
	</div>
	
	<?php endwhile; endif; ?>

</div>

<?php

// Restore original Post Data
wp_reset_postdata();

get_footer();

?>