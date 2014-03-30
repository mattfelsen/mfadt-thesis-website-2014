<?php
/*
Template Name: Project Detail
*/

get_header();

$students = types_child_posts('student');

?>

<!-- html goes here -->
<div class="sixteen columns mainContainer">
	<?php foreach ($students as $student) { ?>
	<section class="student">
		<h2><?= $student->post_title ?></h2>
		<div><?= $student->fields['biography'] ?></div>
		<div>
			<?= $student->fields['personal-website'] ?><br>
			<?= $student->fields['linkedin'] ?><br>
			@<?= $student->fields['twitter'] ?><br>
		</div>
		<div><?= $student->fields['headshot'] ?></div>
	</section>
	<?php } ?>

	<section class="project">
		<h2><?php the_title(); ?></h2>
		<h3><?= types_render_field('short-description') ?></h3>

		<div class="six columns">
			<p><?= types_render_field('long-description') ?></p>
			<p><?= types_render_field('project-website') ?></p>
			<p>
				<h5>Thesis Faculty</h5>
				Fall: <?= types_render_field('thesis-faculty-fall') ?><br>
				Spring: <?= types_render_field('thesis-faculty-spring') ?><br>
				<h5>Writing & Research Faculty</h5>
				Fall: <?= types_render_field('writing-faculty-fall') ?><br>
				Spring: <?= types_render_field('writing-faculty-spring') ?><br>
			</p>
		</div>
		<div class="eight columns">
			<?= types_render_field('featured-image') ?>
		</div>
	</section>

</div>

<?php get_footer(); ?>