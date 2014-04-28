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

// Set up category name
$category = get_the_category();
$category = $category[0]->cat_name;

// Set up tags
$a = array();
$tags = get_the_tags();
foreach($tags as $t) {
	$a[] = $t->name;
}
$tags = join(', ', $a);

?>

<!-- html goes here -->
<div class="fakeBody">
<div class="container projectPersonPageContainer">
	<?php foreach ($students as $student) { ?>
	<section class="student">
		<h2 class="studentName"><?= $student->post_title ?></h2>
		<div class="studentInfoHolder">
			<div class="studentBio"><p><?= $student->fields['biography'] ?></p></div>
			<img id="theImage" src="http://54.235.78.70/3Dtest/portrait01.jpg"/>

			<div class="studentContactInfo">
				<a href="<?= $student->fields['personal-website'] ?>" target="_blank"><div class="personalWebsiteLink"></div></a>
				<a href="<?= $student->fields['linkedin'] ?>" target="_blank"><div class="linkedInLink"></div></a>
				<a href="https://twitter.com/<?= $student->fields['twitter'] ?>" target="_blank"><div class="twitterLink"></div></a>			</div>

<!-- 			<img class="headshotRegular" src="<?= $student->fields['headshot'] ?>" /> -->
		</div>
	</section>
	<?php } ?>

	<hr>

	<section class="project">
		<h2><?php the_title(); ?></h2>
		<div class="projectInfoHolder">
			<div class="projectTextHolder">
				<h3><?= types_render_field('short-description') ?></h3>
				<!-- <?= $category ?> -->
				<!-- <?= $tags ?> -->
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
			<div class="projectImageHolder">
			<center><?= types_render_field('media', array('width' => 600)) ?></center>
			</div>
		</div>	
	</section>
	
	
	<hr>

</div>
</div>

<?php get_footer(); ?>
