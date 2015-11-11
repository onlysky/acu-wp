<?php
/**
 * This is the Testimonials page template that displays a list of testimonials.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package onlysky_wp_framework
 */

get_header(); ?>

 	<?php get_template_part( 'page-templates/partials/hero'); ?>
	<div class="container content-sidebar">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'page-templates/partials/content', 'page' ); ?>
							
						<!-- Credit Cards -->
						<?php if( have_rows('credit_card') ): ?>
							<div class="container">
									<div class="credit-card-list-header">
										<span class="credit-card-rate">APR</span>
										<span class="credit-card-rate">Annual Fee</span>
										<span class="credit-card-rate">Cash Back</span>
									</div><!-- END.credit-card-list-header -->
								    <ul class="credit-cards-list">
									    <?php while( have_rows('credit_card') ): the_row(); ?>
									        
											<!-- Credit Card -->
									        <li class="credit-card">
												
												
													<h2 class="credit-card-name"><?php the_sub_field('credit_card_name');?></h2>

												<img class="credit-card-image" src="<?php the_sub_field('credit_card_image');?>" alt="<?php the_sub_field('credit_card_name');?> Image" /> 
												
												<div class="credit-card-rates">
													<div class="credit-card-apr credit-card-rate">
														<?php the_sub_field('credit_card_apr');?>
													</div><!-- END.credit-card-apr -->
													
													<div class="credit-card-fee credit-card-rate">
														<?php the_sub_field('credit_card_fee');?>
													</div><!-- END.credit-card-fee -->
													
													<div class="credit-card-cash-back credit-card-rate">
														<?php the_sub_field('credit_card_cash_back');?>
													</div><!-- END.credit-card-cash-back -->
												</div><!-- END.credit-card-rates -->
												
												<div class="credit-card-details">
													<?php the_sub_field('credit_card_details');?>

													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cum nam velit expedita assumenda voluptas numquam veniam ut, magnam officia praesentium. Suscipit, dolorum. Porro dolores aspernatur, voluptatum laborum ut sapiente.
												</div><!-- END.credit-card-details -->

												<div class="credit-card-info">
													<a href="<?php the_sub_field('credit_card_link_url');?>" title="Apply Now" class="credit-card-apply button">Apply Now</a>
													<span class="credit-card-details-link">Details</span>
												</div><!-- END.credit-card-info -->
												

												

									        </li>
									    <?php endwhile; ?>
								    </ul>
								</div><!-- END.container -->	
							<?php endif; ?>

					<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
		
	</div><!-- END.container content-sidebar -->

<?php get_footer(); ?>
