<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<div class="container">
  <h3><?php printf( __( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></h3>
</div>

<section id="projects" class="container">

  <?php

  while (have_posts()) : the_post();

    // check the result type here and set up the data in a consistent way,
    // regardless of whether the search result is on a student name or
    // project title

    $type = get_post_type(get_the_ID());

    if ($type != "project" && $type != "student")
      continue;

    if ($type == "student") {
      $student = get_the_title();

      // get project details
      $project = $wpdb->get_row("SELECT id, post_title FROM wp_posts WHERE id = '".wpcf_pr_post_get_belongs(get_the_ID(), 'project')."'");
      $project_id = $project->id;
      $title = $project->post_title;
    }

    if ($type == "project") {
      $project_id = get_the_id();
      $title = get_the_title();

      // get student details
      $students_list = array();
      $students = types_child_posts('student');
      foreach ($students as $student) { $students_list[] = $student->post_title; }
      $student = join(" + ", $students_list);
    }

  ?>

  <div class="masonry columns">
    <h4><a href="<?php the_permalink() ?>"><?= $title ?></a></h4>
    <h5><?= $student ?></h5>

    <a href="<?php the_permalink() ?>">
    <img class="projectThumb" src="<? $src = wp_get_attachment_image_src(get_post_thumbnail_id($project_id), 'large'); print $src[0]; ?>">
    </a>
  </div>

  <?php endwhile; ?>

</section>

<?php else : ?>

<div class="container">
  <h3><?php _e( 'Nothing Found', 'blankslate' ); ?></h3>
  <?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?>
</div>

<?php endif; ?>

<?php get_footer(); ?>
