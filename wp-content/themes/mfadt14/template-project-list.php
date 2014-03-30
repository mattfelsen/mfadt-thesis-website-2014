<?php
/*
Template Name: Project List
*/

get_header();

$args = array ('post_type' => 'project', 'posts_per_page' => '-1', 'orderby' => 'rand');
$query = new WP_Query( $args );

?>

<!-- html goes here -->
<div class="sixteen columns mainContainer">
	<h1>Projects</h1>
	
	<?php

	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

		$students_list = array();
		$students = types_child_posts('student');
		foreach ($students as $student) { $students_list[] = $student->post_title; }
		$students = join(" + ", $students_list);
		
	?>
	
	<div class="four columns">
		<?= types_render_field('thumbnail-image'); ?>
		<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
		<p><?= $students ?></p>
	</div>
	
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>