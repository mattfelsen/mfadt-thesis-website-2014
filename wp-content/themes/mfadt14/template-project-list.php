<?php
/*
Template Name: Project List
*/

get_header();

$query = "SELECT p.post_title AS title, p.post_name AS slug, s.post_title AS student FROM wp_posts p, wp_posts s, wp_postmeta m WHERE m.meta_key = 'wpcf-student-name' AND s.post_name = m.meta_value AND p.post_type = 'project' AND p.post_status = 'publish';";
$result = $wpdb->get_results($query);

// Old native WP_Query call for posts
// Deprecated in favor of the raw call above
// Might want to bring this back at some point so that functions like the_permalink() work again
// $args = array (
// 	'post_type' => 'project',
// 	'posts_per_page' => '-1',
// 	'orderby' => 'rand',
// 	'meta_key' => 'wpcf-student-name'
// );
// $query = new WP_Query( $args );

?>

<!-- html goes here -->
<div class="sixteen columns mainContainer">
	<h1>Projects</h1>
	
	<?php //if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
	<?php foreach ($result as $project) { ?>
	
	<div class="four columns">
		<!-- <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4> -->
		<h4><a href="projects/<?= $project->slug  ?>"><?= $project->title ?></a></h4>
		<?= $project->student ?>
	</div>
	


	<?php } ?>
	<?php //endwhile; endif; ?>
</div>

<?php get_footer(); ?>