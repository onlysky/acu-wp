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
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'page-templates/partials/content', 'page' ); ?>
					
					<!-- Testimonials -->
					<?php if( have_rows('testimonial') ): ?>
	
						    <ul class="testimonials-list js-masonry" data-masonry-options='{ "itemSelector": ".testimonial", "columnWidth": ".testimonial", "gutter": ".gutter-sizer",  "percentPosition": true}'>
							    <?php while( have_rows('testimonial') ): the_row(); ?>
							        <div class="gutter-sizer"></div><!-- END.gutter-sizer -->
									<!-- Testimonial -->
							        <li class="testimonial <?php if ( get_sub_field('testimonial_image') ) { echo 'image-testimonial';} ?>">

							        	<?php if ( get_sub_field('testimonial_image') ) : ?>
							        		
							        		<div class="testimonial-image-container <?php include_once ABSPATH . 'wp-admin/includes/plugin.php';if ( is_plugin_active( 'wp-video-lightbox/wp-video-lightbox.php' ) ) { if(get_sub_field('testimonial_video')){echo 'testimonial-image-with-video';}}?>">
							        			<?php
													if ( is_plugin_active( 'wp-video-lightbox/wp-video-lightbox.php' ) ) {
													   if(get_sub_field('testimonial_video')){
								        					echo do_shortcode('[video_lightbox_youtube video_id="'.get_sub_field('testimonial_video').'&rel=0" width="640" height="480" auto_thumb="1"] ');
								        				}
													}
							        			?>
							        			<img src="<?php the_sub_field('testimonial_image');?>" alt="<?php the_sub_field('testimonial_name');?> Image" class="testimonial-image" />
							        		</div><!-- END.image-container -->

							        	<?php endif; ?>
										
										<div class="testimonial-content">
											<?php the_sub_field('testimonial_text');?>

								        	<span class="testimonial-name"><?php the_sub_field('testimonial_name');?></span>
								        	<span class="testimonial-location"><?php the_sub_field('testimonial_location');?></span>

										</div><!-- END.testimonial-content -->
							        </li>
							    <?php endwhile; ?>
						    </ul>
						
					<?php endif; ?>

				<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- END.container -->
	<?php 
		wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/vendor/masonry.min.js', array('jquery'), '1.1', true );
	?>

<?php get_footer(); ?>
