<?php
/*
Template Name: Faculty Detail
*/

get_header();

the_post();

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

<!-- html goes here -->

<?php get_footer(); ?>