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

		<div class="six columns">
			<p ><?= types_render_field('long-description') ?></p>
<!-- 			follow the same format of "Project Website" rather than displaying URL target="_blank" -->
			<p><?= types_render_field('project-website') ?></p>
			<p>
				<h5>Thesis Faculty</h5>
				<p class="facultyNames">Fall: <?= types_render_field('thesis-faculty-fall') ?></p>
				<p class="facultyNames">Spring: <?= types_render_field('thesis-faculty-spring') ?></p><br>
				<h5>Writing & Research Faculty</h5>
				<p class="facultyNames">Fall: <?= types_render_field('writing-faculty-fall') ?></p>
				<p class="facultyNames">Spring: <?= types_render_field('writing-faculty-spring') ?></p>
			</p>
		</div>
		<div class="eight columns">
			<?= types_render_field('featured-image') ?>
		</div>
	</section>

</div>

<?php get_footer(); ?>