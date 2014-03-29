<?php get_header(); ?>

<!-- html goes here -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

<!-- html goes here -->
<div class="sixteen columns mainContainer">
	<h1><?php the_title(); ?></h1>

	<div class="four columns">
		<h4>Project description and stuff. Hook me up to the database!</h4>
	</div>

</div>

<?php get_footer(); ?>