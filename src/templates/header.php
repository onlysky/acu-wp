
<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package onlysky_wp_framework
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'onlysky_wp_framework' ); ?></a>
	
	<header id="masthead" class="site-header" role="banner">

		<!-- Nav Button -->
		<button class="nav-menu-button button-reset" title="Navigation Menu"> 
			<span class="nav-menu-button-bars">
				<span id="bar-1"></span>
				<span id="bar-2"></span>
				<span id="bar-3"></span>
				<span id="bar-4"></span>
			</span>
			<span class="nav-menu-text">Menu</span>
		</button>
		
		<!-- Site Logo -->
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
		</div><!-- .site-branding -->

		<!-- Mobile Login -->
		<a class="login-button" href="https://mcw.youracu.org/cgi-bin/mcw000.cgi?MCWSTART" title="Secure Login">Log In</a>
		<!-- Desktop Header Elements -->
		<div class="header-desktop">

			<!-- Desktop Login -->
			<span class="header-login">
				<input class="input-username" type="text" placeholder="Username"/>
				<input class="input-password" type="password" placeholder="Password" />
				<input id="login-submit" type="submit" value="Log In" />
			</span>
			
			<!-- Join Us Button -->
			<a href="/join-us" class="header-join button button-gold">Join Us</a>
			
			<!-- Search Button -->
			<a href="/search" title="Search our website" class="header-search">Search</a>

		</div>
	
	</header><!-- #masthead -->
	
	<!-- Main Navigation Menu -->
	<?php get_template_part( 'page-templates/partials/main-menu'); ?>

	<div id="content" class="site-content">
