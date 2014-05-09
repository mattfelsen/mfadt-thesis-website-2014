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

$thesis_fall_slug = strtolower(str_replace(' ', '-', $thesis_fall));
$thesis_spring_slug = strtolower(str_replace(' ', '-', $thesis_spring));
$writing_fall_slug = strtolower(str_replace(' ', '-', $writing_fall));
$writing_spring_slug = strtolower(str_replace(' ', '-', $writing_spring));


// Set up media 
$media = types_render_field('media', array('width' => 600, 'output' => 'raw'));
$media = split(' ', $media);

foreach ($media as $i => $url) {
	$parse = parse_url($url);

	if ($parse['host'] == 'youtu.be') {
		$media[$i] = '<iframe width="558" height="314" src="http://www.youtube.com/embed'.$parse['path'].'" frameborder="0" allowfullscreen></iframe>';
	} elseif ($parse['host'] == 'vimeo.com') {
		$media[$i] = '<iframe src="//player.vimeo.com/video'.$parse['path'].'" width="558" height="314" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	} else {
		$media[$i] = '<img src="'.$url.'" />';
	}
}
$media = join(' ', $media);

?>

<!-- html goes here -->
<div class="container projectPersonPageContainer container-page">
	<?php foreach ($students as $student) { ?>

	<section class="student">
		<div class="student-info-text">
			<h3 class="studentName"><?= $student->post_title ?></h3>	
			<div class="studentInfoHolder">
				<div class="studentBio"><p><?= substr($student->fields['biography'], 0, 593); ?></p></div>
			</div>
		</div>
		<div class="student-info-symposium">
			<h5>Symposium</h5>	
			<div class="date-time">
				<?= types_render_field('symposium-date', array("format"=>"D. F j, g:ia")) ?>
				<p><?= types_render_field('symposium-group') ?></p>
			</div>
			
		</div>
		<div class="student-info-social">
			<div class="studentContactInfo">
				<h5>Learn more:</h5>
				<div class="social-icons">
					<?php 

					$personalWebsite = $student->fields['personal-website'];
					$twitter = $student->fields['twitter'];					
					$linkedin = $student->fields['linkedin'];

					if ($personalWebsite != "") {
						echo "<a href='$personalWebsite' target='_blank'><i class='fa fa-desktop'></i></a>";
					}

					if ($twitter != "") {	
						echo "<a href='https://twitter.com/$twitter' target='_blank'><i class='fa fa-twitter'></i></a>";
					}

					if ($linkedin != "") {
						echo "<a href='$linkedin' target='_blank'><i class='fa fa-linkedin'></i></a>";
					}

					?>
				</div>
			</div>
		</div>
		<div class="student-info-image">
			<img class="theImage" data-slug="<?= $student->post_name ?>" src="http://mfadt.parsons.edu/2014/assets/img/students/<?= $student->post_name ?>/1.jpg"/>
		</div>
		
		<div class="clear"></div>
	</section>
	<?php } ?>


	<section class="project">
		<div class="project-info-text">
			<h3><?php the_title(); ?><a href="<?= types_render_field('project-website', array('output' => 'raw')) ?>" target="_blank"><i class='fa fa-external-link'></i></a></h3>
			<h4><?= types_render_field('short-description') ?></h4>
			
			<p ><?= types_render_field('long-description') ?></p>
			
			<div class="project-meta">
				<p class="category">Filed under: <?php the_category(','); ?> </p> 
				<p class="tag"><?php the_tags('Tagged with: '); ?></p>
			</div>

			<div class="facultyNamesContainer">
				<h5>Thesis Faculty</h5>
				<?php if ($thesis_fall == $thesis_spring) : ?>
					<p class="facultyNames"><a href="faculty/<?= $thesis_fall_slug ?>"><?= $thesis_fall ?></a></p><br>
				<?php else: ?>
					<p class="facultyNames">Fall: <a href="faculty/<?= $thesis_fall_slug ?>"><?= $thesis_fall ?></a></p>
					<p class="facultyNames">Spring: <a href="faculty/<?= $thesis_spring_slug ?>"><?= $thesis_spring ?></a></p><br>
				<?php endif; ?>
			
				<h5>Writing & Research Faculty</h5>
				<?php if ($writing_fall == $writing_spring) : ?>
					<p class="facultyNames"><a href="faculty/<?= $writing_fall_slug ?>"><?= $writing_fall ?></a></p><br>
				<?php else: ?>
					<p class="facultyNames">Fall: <a href="faculty/<?= $writing_fall_slug ?>"><?= $writing_fall ?></a></p>
					<p class="facultyNames">Spring: <a href="faculty/<?= $writing_spring_slug ?>"><?= $writing_spring ?></a></p><br>
				<?php endif; ?>
					</p>
			</div>
				
		</div>

		
		<div class="project-info-image">
			<?= $media ?>
			</div>
		<div class="clear"></div>
		</div>	
	</section>
	

</div>

<?php get_footer(); ?>
