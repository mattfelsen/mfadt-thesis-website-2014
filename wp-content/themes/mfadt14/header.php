<!DOCTYPE html>
<html <?php language_attributes(); ?>
	>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<base href="<?= site_url() ;?>/"></base>
	<link rel="shortcut icon" href="assets/favicon.ico">
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="assets/css/skeleton.css">
	<link rel="stylesheet" href="assets/css/layout.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?></head>
<body <?php body_class(); ?>>
	<div id="blurPanel"></div>
	<div id="wrapper" class="container">
		<nav class="topMenu">
			<div class="sixteen columns">
				<?php wp_nav_menu( array( 'theme_location' =>'main-menu' ) ); ?>
				<?php get_search_form(); ?>
				<div class="clear"></div>
			</div>
		</nav>