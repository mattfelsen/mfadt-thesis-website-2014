<?php
/*
Template Name: Project List
*/

get_header();

$args = array ('post_type' => 'project', 'posts_per_page' => '-1', 'orderby' => 'rand');
$query = new WP_Query( $args );

?>

<!-- html goes here -->
	<h1>Projects</h1>
<div class="sixteen columns mainContainer">


	<?php

	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

		$students_list = array();
		$students = types_child_posts('student');
		foreach ($students as $student) { $students_list[] = $student->post_title; }
		$students = join(" + ", $students_list);

	?>

	<div class="masonry columns">
		<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
		<p><?= $students ?></p>
		<!-- <? the_category(); ?> -->
		<!-- <?= join(', ', get_the_tags()); ?> -->

	  <? if (has_post_thumbnail()) : ?>
		<img class="projectThumb" src="<? $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); print $src[0]; ?>">
		<? else: ?>
		<img class="projectThumb" src="assets/img/no-thumbnail-<? $r=rand(0,3);if($r>2)$o='sm';elseif($r>1)$o='md';else $o='lg'; print $o; ?>.jpg">
		<?php endif; ?>

	</div>

	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
