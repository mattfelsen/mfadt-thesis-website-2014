<?php
	get_header();
	$students = types_child_posts('student');
?>

<!-- html goes here -->
<!-- <div class="sixteen columns mainContainer"> -->
	<section id="students">
		<?php foreach ($students as $student) { ?>
		<div class="container student">
			<div class="four columns">
				<h3><?= $student->post_title ?></h3>
			</div>
			<div class="six columns student-bio">
				<?= $student->fields['biography'] ?>
			</div>
			<div class="three columns student-links">
				<?= $student->fields['personal-website'] ?><br>
				<?= $student->fields['linkedin'] ?><br>
				@<?= $student->fields['twitter'] ?><br>
			</div>
			<div class="three columns student-headshot">
				<?= $student->fields['headshot'] ?>
			</div>
		</div>
		<?php } ?>
	</section>

	<section class="container" id="project">
		<div class="six columns">
		<h2><?php the_title(); ?></h2>
		<h3><?= types_render_field('short-description') ?></h3>
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
		<div class="ten columns">
			<?= types_render_field('featured-image') ?>
			<?= types_render_field('thumbnail') ?>
		</div>
	</section>

<!-- </div> -->

<?php get_footer(); ?>