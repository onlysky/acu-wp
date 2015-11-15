<?php
/**
 * Main Menu
 * 
 * Template part for Main Menu
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package onlysky_wp_framework
 */

?>

<nav id="site-navigation" class="main-navigation" role="navigation">
	
	<div class="site-nav-inner">
		
		<!-- Main Menu Widget Area -->
		<?php if ( is_active_sidebar( 'menu-sidebar' ) ) : ?>
		    <section id="menu-sidebar" class="widget-area" role="complementary">
		    	<?php dynamic_sidebar( 'menu-sidebar' ); ?>
		    </section>
		<?php endif; ?>

	</div><!-- END.site-nav-inner -->
</nav><!-- #site-navigation -->

<div class="menu-cover"></div><!-- END.menu-cover -->