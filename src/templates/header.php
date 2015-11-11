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
		<a class="login-button" href="/login" title="Secure Login">Log In</a>
		
		<!-- Desktop Header Elements -->
		<div class="header-desktop">

			<!-- Desktop Login -->
			<span class="header-login">
				<input type="text" placeholder="Username"/>
				<input type="password" placeholder="Password" />
				<input id="login-submit" type="submit" value="Log In" />
			</span>
			
			<!-- Join Us Button -->
			<a href="/join" class="header-join button button-gold">Join Us</a>
			
			<!-- Search Button -->
			<a href="/search" class="header-search">Search</a>

		</div>
	
	</header><!-- #masthead -->

	<!-- Main Navigation Menu -->
	<nav id="site-navigation" class="main-navigation" role="navigation">
		
		<div class="site-nav-inner">

			<!-- Primary Menu -->
			<div class="site-nav-primary-menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div><!-- END.site-nav-primary-menu -->
			
			<!-- Social Icon Links -->
			<div class="site-nav-social">
				
			</div><!-- END.site-nav-social -->
			
			<!-- Call Us Telephone -->
			<?php if(get_theme_mod("telephone")) : ?>
				<div class="site-nav-tel">
					<span>Call Us</span>
					<a class="site-tel" href="tel:+<?php echo str_replace('-','',get_theme_mod("telephone"));?>"><?php echo str_replace('-','.',get_theme_mod("telephone"));?></a>
				</div><!-- END.site-nav-tel -->
			<?php endif;?>

		</div><!-- END.site-nav-inner -->
	</nav><!-- #site-navigation -->

	<div class="menu-cover"></div><!-- END.menu-cover -->

	<div id="content" class="site-content">
