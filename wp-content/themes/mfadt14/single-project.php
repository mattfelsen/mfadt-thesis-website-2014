<?php

/*
Template Name: Project Detail
*/

get_header();

// Grab student/s from the database
$students = types_child_posts('student');

// Set up fall & spring faculty
$thesis_fall = types_render_field('thesis-faculty-fall');
$thesis_spring = types_render_field('thesis-faculty-spring');
$writing_fall = types_render_field('writing-faculty-fall');
$writing_spring = types_render_field('writing-faculty-spring');

?>

<!-- html goes here -->
<div class="container">
	<?php foreach ($students as $student) { ?>
	<section class="student">
		<h2 class="studentName"><?= $student->post_title ?></h2>
		<div class="studentInfoHolder">
			<div class="studentBio"><p><?= $student->fields['biography'] ?></p></div>
			<div class="studentContactInfo">
				<a href="<?= $student->fields['personal-website'] ?>" target="_blank"><div class="personalWebsiteLink"></div></a>
				<a href="<?= $student->fields['linkedin'] ?>" target="_blank"><div class="linkedInLink"></div></a>
				<a href="https://twitter.com/<?= $student->fields['twitter'] ?>" target="_blank"><div class="twitterLink"></div></a>			</div>
			<img class="headshotRegular" src="<?= $student->fields['headshot'] ?>" />
		</div>
	</section>
	<?php } ?>

	<br>
	<hr>

	<section class="project">
		<h2><?php the_title(); ?></h2>
		<h3><?= types_render_field('short-description') ?></h3>
		<!-- <? the_category(); ?> -->
		<!-- <?= join(', ', get_the_tags()); ?> -->

		<div class="six columns">
			<p ><?= types_render_field('long-description') ?></p>
			<!-- follow the same format of "Project Website" rather than displaying URL target="_blank" -->
			<p><a href="<?= types_render_field('project-website', array('output' => 'raw')) ?>" target="_blank">View Project Website</a></p>

			<p>
				<h5>Thesis Faculty</h5>

				<?php if ($thesis_fall == $thesis_spring) : ?>
				<p class="facultyNames"><?= $thesis_fall ?></p><br>
				<?php else: ?>
				<p class="facultyNames">Fall: <?= $thesis_fall ?></p>
				<p class="facultyNames">Spring: <?= $thesis_spring ?></p><br>
				<?php endif; ?>

				<h5>Writing & Research Faculty</h5>
				<?php if ($thesis_fall == $thesis_spring) : ?>
				<p class="facultyNames"><?= $writing_fall ?></p><br>
				<?php else: ?>
				<p class="facultyNames">Fall: <?= $writing_fall ?></p>
				<p class="facultyNames">Spring: <?= $writing_spring ?></p><br>
				<?php endif; ?>
			</p>
		</div>
		<div class="eight columns">
			<?= types_render_field('media', array('width' => 600)) ?>
		</div>
	</section>

<!-- </div> -->

<?php get_footer(); ?>
