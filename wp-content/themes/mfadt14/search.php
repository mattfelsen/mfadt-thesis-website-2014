<?php get_header(); ?>

<section class="container" id="content" role="main">

<?php if ( have_posts() ) : ?>
<header class="header">
  <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'blankslate' ), get_search_query() ); ?></h1>
</header>

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
    $project = $wpdb->get_row("SELECT post_title FROM wp_posts WHERE id = '".wpcf_pr_post_get_belongs(get_the_ID(), 'project')."'");
    $title = $project->post_title;
  }

  if ($type == "project") {
    $title = get_the_title();

    // get student details
    $students_list = array();
    $students = types_child_posts('student');
    foreach ($students as $student) { $students_list[] = $student->post_title; }
    $student = join(" + ", $students_list);
  }

?>

<?php // get_template_part( 'entry' ); ?>
<div class="four columns">
  <a href="<? the_permalink(); ?>">
    <h4><?= $title; ?></h4>
    <p><?= $student ?></p>

    <!--
    <? if (has_post_thumbnail()) : ?>
    <img class="projectThumb" src="<? $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); print $src[0]; ?>">
    <? else: ?>
    <img class="projectThumb" src="assets/img/no-thumbnail-<? $r=rand(0,3);if($r>2)$o='sm';elseif($r>1)$o='md';else $o='lg'; print $o; ?>.jpg">
    <?php endif; ?>
    -->
  </a>
</div>

<?php endwhile; ?>

<?php get_template_part( 'nav', 'below' ); ?>

<?php else : ?>

<article id="post-0" class="post no-results not-found sixteen columns">
  <header class="header">
    <h2 class="entry-title"><?php _e( 'Nothing Found', 'blankslate' ); ?></h2>
  </header>
  <section class="entry-content">
    <p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'blankslate' ); ?></p>
  </section>
</article>

<?php endif; ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
