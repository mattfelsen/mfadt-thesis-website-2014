<?php get_header(); ?>

<!-- html goes here -->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>

<!-- html goes here -->
<div class="sixteen columns mainContainer">
	<h1><?php the_title(); ?></h1>
	<h3><?= types_render_field('short-description') ?></h3>

<<<<<<< HEAD
	<div class="four columns">
		<h4>Project description and stuff. Hook me up to the database!</h4>
=======
	<div class="six columns">
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
	<div class="eight columns">
		<?= types_render_field('featured-image') ?>
>>>>>>> upstream/develop
	</div>

</div>

<?php get_footer(); ?>