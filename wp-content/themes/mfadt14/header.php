<!DOCTYPE html>
<html <?php language_attributes(); ?>
	>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<base href="<?= home_url() ;?>/"></base>
	<link rel="shortcut icon" href="assets/favicon.ico">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="assets/css/skeleton.css">
	<link rel="stylesheet" href="assets/css/layout.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,100italic,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>

	<meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@mfadt">
    <meta name="twitter:title" content="MFAD+T Thesis Show 2014">
    <meta name="twitter:description" content="Join us this May for a week-long exhibition of 70+ projects by emerging artists, designers, coders, makers, hackers, educators, and thinkers.">
    <meta name="twitter:creator" content="@mfadt">
    <meta name="twitter:image:src" content="http://mfadt.parsons.edu/2014/assets/img/hero/embed.jpg">
    <meta name="twitter:domain" content="mfadt.parsons.edu">

    <meta property="og:site_name" content="MFAD+T Thesis Show 2014">
    <meta property="og:title" content="Join us this May for a week-long exhibition of 70+ projects by emerging artists, designers, coders, makers, hackers, educators, and thinkers.">
    <meta property="og:url" content="http://mfadt.parsons.edu">
    <meta property="og:image" content="http://mfadt.parsons.edu/2014/assets/img/hero/embed.jpg">
    <meta property="og:description" content="Symposium: May 16-17. Exhibition: May 17-25. Reception: May 21.">

	<?php wp_head(); ?></head>
<body <?php body_class(); ?>>
	<nav>
		<div class="container">
			<a href="#"><img alt="logo" class="nav-logo-for-mobile" src="assets/img/hero/dtlogo-black.png"></a>
			<!-- Hamburger Icon -->
			<img class="nav-hamburger" src="assets/img/nav/menu-64.png">
			<div class="sixteen columns nav-list">
				<a href="#"><img alt="logo" class="nav-logo" src="assets/img/hero/dtlogo-black.png"></a>
				<?php wp_nav_menu( array( 'theme_location' =>'main-menu' ) ); ?>
				<?php get_search_form(); ?>
			</div>
		</div>
	</nav>
	<div class="in-between"></div>
