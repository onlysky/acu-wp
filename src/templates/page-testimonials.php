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
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'page-templates/partials/content', 'page' ); ?>
				
				<!-- Testimonials -->
				<?php if( have_rows('testimonial') ): ?>
					<div class="container">

					    <ul class="testimonials-list js-masonry" data-masonry-options='{ "itemSelector": ".testimonial", "columnWidth": ".testimonial", "gutter": 80, "percentPosition": true}'>
						   	<div class="grid-sizer"></div><!-- END.grid-sizer -->
						    <?php while( have_rows('testimonial') ): the_row(); ?>
						        
								<!-- Testimonial -->
						        <li class="testimonial <?php if ( get_sub_field('testimonial_image') ) { echo 'image-testimonial';} ?>">

						        	<?php if ( get_sub_field('testimonial_image') ) : ?>
						        		
						        		<div class="testimonial-image-container">
						        			<img src="<?php the_sub_field('testimonial_image');?>" alt="<?php the_sub_field('testimonial_name');?> Image" class="testimonial-image" />
						        		</div><!-- END.image-container -->

						        	<?php endif; ?>
									
									<div class="testimonial-content">
										<?php the_sub_field('testimonial_text');?>

							        	<span class="testimonial-name"><?php the_sub_field('testimonial_name');?></span>
							        	<span class="testimonial-location"><?php the_sub_field('testimonial_location');?></span>
							        	
							        	<br />
								        video: <?php the_sub_field('testimonial_video');?>

									</div><!-- END.testimonial-content -->
						        </li>
						    <?php endwhile; ?>
					    </ul>
					</div><!-- END.container -->
				<?php endif; ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
