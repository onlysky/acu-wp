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
	<div class="container content-sidebar page-credit-cards page-content-in-sidebar">
		
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- Credit Card Page Content/Main Sidebar -->
			<div class="credit-cards-content page-content">
				<?php get_template_part( 'page-templates/partials/content', 'page' ); ?>
			</div><!-- END.credit-cards-content -->
		<?php endwhile; // End of the loop. ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				
				<!-- Credit Cards -->
				<?php if( have_rows('credit_card') ): ?>

				    <ul class="credit-cards-list">
					    <?php while( have_rows('credit_card') ): the_row(); ?>
					        
							<!-- Credit Card -->
					        <li class="credit-card">
								
									<h2 class="credit-card-name credit-card-toggle"><?php the_sub_field('credit_card_name');?></h2>

								<img class="credit-card-toggle credit-card-image" src="<?php the_sub_field('credit_card_image');?>" alt="<?php the_sub_field('credit_card_name');?> Image" /> 
								
								<div class="credit-card-rates">
									<div class="credit-card-apr credit-card-rate">
										<span class="credit-card-rate-label">APR</span>
										<span class="credit-card-rate-number"><?php the_sub_field('credit_card_apr');?></span>
									</div><!-- END.credit-card-apr -->
									
									<div class="credit-card-fee credit-card-rate">
										<span class="credit-card-rate-label">Annual Fee</span>
										<span class="credit-card-rate-number"><?php the_sub_field('credit_card_fee');?></span>
									</div><!-- END.credit-card-fee -->
									
									<div class="credit-card-cash-back credit-card-rate">
										<span class="credit-card-rate-label">Cash Back</span>
										<span class="credit-card-rate-number"><?php the_sub_field('credit_card_cash_back');?></span>
									</div><!-- END.credit-card-cash-back -->
								</div><!-- END.credit-card-rates -->
								
								<div class="credit-card-details">
									<?php the_sub_field('credit_card_details');?>
								</div><!-- END.credit-card-details -->

								<div class="credit-card-info">
									<a id="<?php the_sub_field('credit_card_button_id')?>" href="<?php if (get_sub_field('credit_card_link_type') == 'wp-page' ){ the_sub_field('credit_card_link_page'); } else { the_sub_field('credit_card_link_url'); } ?>" title="<?php the_sub_field('credit_card_button_text')?>" class="credit-card-apply button"><?php the_sub_field('credit_card_button_text')?></a>

									<span class="credit-card-toggle credit-card-details-link">Details</span>
								</div><!-- END.credit-card-info -->
					        </li>
					    <?php endwhile; ?>
				    </ul>
				<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
		
	</div><!-- END.container content-sidebar -->

<?php get_footer(); ?>