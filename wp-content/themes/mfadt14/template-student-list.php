<?php
/*
Template Name: People List
*/

get_header();

$args = array ('post_type' => 'student', 'posts_per_page' => '-1', 'orderby' => 'rand');
$query = new WP_Query( $args );

?>


<!-- html goes here -->
<!-- <section id="projects" class="container"> -->

<div class="container">
	<h1>People</h1>

	<?php
	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
		$project = $wpdb->get_row("SELECT post_title, post_name FROM wp_posts WHERE id = '".wpcf_pr_post_get_belongs(get_the_ID(), 'project')."'");
	
 	?>
	<div class="masonry columns">
		<h4><a href="project/<?= $project->post_name ?>"><?php the_title(); ?></a></h4>
		<h5><a href="project/<?= $project->post_name ?>"><?= $project->post_title ?></a></h5>

		<?php 
		$student = get_the_title();
		if ($student == "Mirte Becker")
			$long_title_div = true;
		else
			$long_title_div = false;
		?>
		<?php if ($long_title_div) { ?><div class="longTitleImageCropped"><?php } ?>
		
		<a href="project/<?= $project->post_name ?>">
		  <img class="studentPortraitThumb" src="http://mfadt.parsons.edu/2014/assets/img/students/<?= $post->post_name ?>/1.jpg"/>
		</a>
		
		<?php if ($long_title_div) { ?></div><?php } ?>

	</div>

	<?php endwhile; endif; ?>

</div>

<!-- </section> -->
<?php

// Restore original Post Data
wp_reset_postdata();

get_footer();

?>
