<?php
/**
 *	Template Name: Landing Page
 * 
 *  The template for displaying Landing Pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package onlysky_wp_framework
 */

get_header(); ?>
	<?php get_template_part( 'page-templates/partials/hero'); ?>
	<?php if( get_field(landing_page_cta) ): ?>
		<div class="landing-page-cta">
			<div class="container">
				<?php the_field(landing_page_cta);?>
			</div><!-- END.container --> 
		</div><!-- END.landing-page-cta -->
	<?php endif;?>
	<div class="container content-sidebar">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'page-templates/partials/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>
				
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
		
	</div><!-- END.container content-sidebar -->
	<?php if( get_field(landing_page_form) ): ?>
		<div id="landing-page-form" class="landing-page-form-container">
			<div class="container">
				<div class="section-sml">
					<?php echo do_shortcode('[gravityform id="'.get_field('landing_page_form').'"  title=false description=false ajax=true] ');?>
				</div><!-- END.section-sml -->
			</div><!-- END.container -->
		</div><!-- END.landing-page-form-container -->
	<?php endif;?>
<?php get_footer(); ?>
