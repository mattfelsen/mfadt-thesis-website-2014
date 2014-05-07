<?php
/*
Template Name: Faculty Detail
*/

get_header();
the_post();

// set up post IDs of students for given faculty
$faculty_name = get_the_title();
$student_ids = $wpdb->get_col("
	SELECT post_id
	FROM wp_postmeta
	WHERE meta_value = '$faculty_name'
	AND (
		   meta_key = 'wpcf-thesis-faculty-fall'
		OR meta_key = 'wpcf-thesis-faculty-spring'
		OR meta_key = 'wpcf-writing-faculty-fall'
		OR meta_key = 'wpcf-writing-faculty-spring'
	)
	GROUP BY post_id"
);

// grab student/project info from post IDs
$args = array (
	'post_type' => 'project',
	'post__in' => $student_ids,
	'posts_per_page' => '-1',
	'orderby' => 'rand',
);
$query = new WP_Query( $args );

?>

<div class="container">
	<h2><?php the_title(); ?></h2>

	<div>
		<?php the_content(); ?>
	</div>

	<div>
		<?php the_post_thumbnail(); ?>
	</div>
</div>

<section id="projects" class="container">
	<h1 class="sixteen columns">Students</h1>

	<?php

	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

		// Set up student/s name
		$students_list = array();
		$students = types_child_posts('student');
		foreach ($students as $student) { $students_list[] = $student->post_title; }
		$students = join(" + ", $students_list);

	?>

	<div class="masonry columns">
		<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
		<h5><a href="project/<?= the_permalink() ?>"><?= $students ?></a></h5>

		<a href="<?php the_permalink() ?>">
		
		<? if (has_post_thumbnail()) : ?>
		<img class="projectThumb" src="<? $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); print $src[0]; ?>">
		<? else: ?>
		<img class="projectThumb" src="assets/img/no-thumbnail-<? $r=rand(0,3);if($r>2)$o='sm';elseif($r>1)$o='md';else $o='lg'; print $o; ?>.jpg">
		<?php endif; ?>

		</a>
	</div>

	<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>