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
	<div id="blurPanel"></div>
	<div id="wrapper" class="container">
		<nav class="topMenu sixteen columns">
			<?php wp_nav_menu( array( 'theme_location' =>'main-menu' ) ); ?>
			<?php get_search_form(); ?>
			<div class="clear"></div>
		</nav>
		<div id="container">