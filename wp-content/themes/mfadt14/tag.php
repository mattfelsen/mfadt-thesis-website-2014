<?php get_header(); ?>

<div class="container">
	<h3>Tag: <?= single_tag_title(); ?></h3>
</div>

<section id="projects" class="container">

	<?php

	$args = array ('post_type' => 'project', 'posts_per_page' => '-1', 'orderby' => 'rand', 'tag' => get_query_var('tag'));
	$query = new WP_Query( $args );

	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

		// Set up student/s name
		$students_list = array();
		$students = types_child_posts('student');
		foreach ($students as $student) { $students_list[] = $student->post_title; }
		$students = join(" + ", $students_list);

		// set up image dimensions
		$info = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large');
		$image_src = $info[0];
		$image_w = 268;
		$image_h = intval($info[2] / ($info[1] / 268));

	?>

	<div class="masonry columns">
		<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
		<h5><a href="<?php the_permalink() ?>"><?= $students ?></a></h5>

		<a href="<?php the_permalink() ?>"><? if (has_post_thumbnail()) : ?>
		<img class="projectThumb" src="<?= $image_src ?>" style="<?= "width: ${image_w}px; height: ${image_h}px;" ?>">
		<? else: ?>
		<img class="projectThumb" src="assets/img/no-thumbnail-<? $r=rand(0,3);if($r>2)$o='sm';elseif($r>1)$o='md';else $o='lg'; print $o; ?>.jpg">
		<?php endif; ?></a>
	</div>

	<?php endwhile; endif; ?>
</section>


<?php get_footer(); ?>


