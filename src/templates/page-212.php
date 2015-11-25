<?php
/**
 * This is the Auto loans page template 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package onlysky_wp_framework
 */

get_header(); ?>

 	<?php get_template_part( 'page-templates/partials/hero'); ?>
	<div class="container content-sidebar page-auto-loans page-content-in-sidebar">
		
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- Credit Card Page Content/Main Sidebar -->
			<div class="auto-loans-content page-content">
				<?php get_template_part( 'page-templates/partials/content', 'page' ); ?>
			</div><!-- END.credit-cards-content -->
		<?php endwhile; // End of the loop. ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">						
						<!-- Auto Loans Box -->
						<?php if( have_rows('auto_loans_box') ): ?>
							<section class="auto-loans-boxes">
								<?php while( have_rows('auto_loans_box') ): the_row(); ?>
									<!-- Auto Loans Box -->
									<?php get_template_part( 'page-templates/partials/auto-loans-box'); ?>
								<?php endwhile; ?>
							</section>
						<?php endif; ?>
						
						<!-- Auto Loans Calculator -->
						<?php get_template_part( 'page-templates/partials/auto-loans-calculator'); ?>				
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
		
	</div><!-- END.container content-sidebar -->
	<?php 
		wp_enqueue_script( 'onlysky_wp_framework-wnumb', get_template_directory_uri() . '/js/vendor/wNumb.js', array('jquery'), '1.1', true );
		wp_enqueue_script( 'onlysky_wp_framework-nouislider', get_template_directory_uri() . '/js/vendor/noui-slider/nouislider.min.js', array('jquery'), '1.1', true );
		wp_enqueue_script( 'onlysky_wp_framework-auto-loans-calc', get_template_directory_uri() . '/js/auto-loans-calc.js', array('jquery'), '1.1', true );
	?>
<?php get_footer(); ?>
