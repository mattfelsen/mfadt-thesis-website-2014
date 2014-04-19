<!DOCTYPE html>
<html <?php language_attributes(); ?>
	>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<base href="<?= home_url() ;?>/"></base>
	<link rel="shortcut icon" href="assets/favicon.ico">
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="assets/css/skeleton.css">
	<link rel="stylesheet" href="assets/css/layout.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,100italic,300italic,400italic,700italic' rel='stylesheet' type='text/css'>

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