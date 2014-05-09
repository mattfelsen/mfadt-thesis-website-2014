<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<section id="projects" class="container">

  <?php

  while (have_posts()) : the_post();

    // check the result type here and set up the data in a consistent way,
    // regardless of whether the search result is on a student name or
    // project title

    $type = get_post_type(get_the_ID());

    if ($type != "project" && $type != "student")
      continue;

    $real_result = true;

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
    <h5><a href="<?php the_permalink() ?>"><?= $student ?></a></h5>

    <a href="<?php the_permalink() ?>">
    <img class="projectThumb" src="<? $src = wp_get_attachment_image_src(get_post_thumbnail_id($project_id), 'large'); print $src[0]; ?>">
    </a>
  </div>

  <?php endwhile; ?>

</section>

<?php endif; if (!have_posts() || !$real_result) : ?>
<div class="container">
  <div class="search-nope">
    <style>
      body {
        background: white;
      }
    </style>
    <img src="http://mfadt.parsons.edu/2014/assets/img/students/ricardo-vega-mora/44.jpg">
    <h1>"I can't find <?= get_search_query(); ?> on the bookshelf."<blockquote>Socrates</blockquote></h1>

  </div>
</div>

<?php endif; ?>

<?php get_footer(); ?>
