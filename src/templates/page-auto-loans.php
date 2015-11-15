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
									<article class="feature-box auto-loans-box <?php the_sub_field('auto_loans_box_color'); ?>">
										
										<div class="feature-box-image-container">
											<div class="feature-box-image" style="background-image:url(<?php if(get_sub_field('auto_loans_box_image')){echo the_sub_field('auto_loans_box_image');} else {echo (get_template_directory_uri() . '/img/acu-placeholder.jpg');} ?>);"></div><!-- END.feature-box-image -->
										</div><!-- END.feature-box-image-container -->
										
										<div class="feature-box-inner">
											<h2><a href="<?php if (get_sub_field('auto_loans_box_button_link_type') == 'wp-page' ){ the_sub_field('auto_loans_box_button_link_page'); } else { the_sub_field('auto_loans_box_button_link'); } ?>" title="<?php the_sub_field('auto_loans_box_button_text'); ?>"><?php the_sub_field('auto_loans_box_title'); ?></a></h2>
											
											<?php if(get_sub_field('auto_loans_box_content_type') == 'paragraph'): ?>
												<div class="feature-box-content">
													<?php the_sub_field('auto_loans_box_content'); ?>
												</div><!-- END.feature-box-content -->
											<?php elseif(get_sub_field('auto_loans_box_content_type') == 'rate'): ?>
												<div class="auto-loan-box-rate-container">
													
													<span class="auto-loan-box-rate-header">
														 <?php the_sub_field('auto_loans_box_rate_header'); ?>
													</span>

													<div class="auto-loan-box-rate">
														<span class="auto-loan-box-rate-number"><?php the_sub_field('auto_loans_box_rate'); ?></span>

														<span class="auto-loan-box-rate-type"><?php the_sub_field('auto_loans_box_rate_type'); ?></span>

														<span class="auto-loan_box-rate-extra"><?php the_sub_field('auto_loans_box_rate_extra'); ?></span>
													</div><!-- END.auto-loan-box-rate -->

												</div><!-- END.auto-loan-box-rate -->
											<?php endif;?>
											
											<a href="<?php if (get_sub_field('auto_loans_box_button_link_type') == 'wp-page' ){ the_sub_field('auto_loans_box_button_link_page'); } else { the_sub_field('auto_loans_box_button_link'); } ?>" title="<?php the_sub_field('auto_loans_box_button_text'); ?>" class="feature-box-button button button-gold"><?php the_sub_field('auto_loans_box_button_text'); ?></a>
											
										</div><!-- END.feature-box-inner -->
									</article><!-- END.feature-box -->

								<?php endwhile; ?>
							</section>
						<?php endif; ?>				
			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
		
	</div><!-- END.container content-sidebar -->
<?php get_footer(); ?>
