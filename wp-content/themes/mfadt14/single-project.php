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
				<div class="studentBio"><p><?= $student->fields['biography'] ?></p></div>
	<!-- 			<img class="headshotRegular" src="<?= $student->fields['headshot'] ?>" /> -->
			</div>
		</div>
		<div class="student-info-symposium">
			<h5>Symposium</h5>	
			<div class="date-time">
				<?= types_render_field('date', array("format"=>"D. F j, ga")) ?>
				<p><?= types_render_field('symposium-group-choices') ?></p>
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
			<img class="theImage" src="http://54.235.78.70/3Dtest/portrait01.jpg"/>
		</div>
		
		<div class="clear"></div>
	</section>
	<?php } ?>


	<section class="project">
		<div class="project-info-text">
			<h3><?php the_title(); ?></h3>
			<h4><?= types_render_field('short-description') ?></h4>
			
			<p ><?= types_render_field('long-description') ?></p>
			<!-- follow the same format of "Project Website" rather than displaying URL target="_blank" -->
			<p><a href="<?= types_render_field('project-website', array('output' => 'raw')) ?>" target="_blank">View Project Website</a></p>
			
			<div class="project-meta">
				<p class="category">Filed under: <?php the_category(','); ?> </p> 
				<p class="tag"><?php the_tags('Tagged with: '); ?></p>
			</div>

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

		
		<div class="project-info-image">
			<?= $media ?>
			</div>
		<div class="clear"></div>
		</div>	
	</section>
	

</div>

<?php get_footer(); ?>
