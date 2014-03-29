<?php
/*
Template Name: People List
*/

get_header();

$args = array ('post_type' => 'student', 'posts_per_page' => '-1', 'orderby' => 'rand');
$query = new WP_Query( $args );

?>


<!-- html goes here -->
<div class="sixteen columns mainContainer">
	<h1>People</h1>

	<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
	
	<div class="four columns">
		<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
		<?php print types_render_field("personal-website"); ?>
	</div>
	
	<?php endwhile; endif; ?>

</div>

<?php

// Restore original Post Data
wp_reset_postdata();

get_footer();

?>