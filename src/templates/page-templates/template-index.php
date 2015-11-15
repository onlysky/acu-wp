<?php
/**
 * Template Name: Visual Index
 * 
 * This is the Visual Index page template for displaying index boxes
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
						
						<!-- Index -->
						<?php if( have_rows('index_item') ): ?>
							
								<ul class="index-list">

									<?php while( have_rows('index_item') ): the_row(); ?>
						
									<li class="index-item">
										<article>
											<header class="entry-header">
												<h1><a href="<?php if (get_sub_field('index_item_link_type') == 'wp-page' ){ the_sub_field('index_item_link_page'); } else { the_sub_field('index_item_link_url'); } ?>" title="<?php the_sub_field('index_item_name');?>"><?php the_sub_field('index_item_name');?></a></h1>
											</header><!-- .entry-header -->
											
											<!-- Item Image -->
											<div class="entry-thumbnail">
												<a title="<?php the_sub_field('index_item_name');?>" href="<?php if (get_sub_field('index_item_link_type') == 'wp-page' ){ the_sub_field('index_item_link_page'); } else { the_sub_field('index_item_link_url'); } ?>" style="background-image:url(<?php if ( get_sub_field('index_item_image')) { echo get_sub_field('index_item_image'); } else { echo (get_template_directory_uri() . '/img/acu-placeholder.jpg');} ?>);">
												</a>
											</div><!-- END.entry-image -->
											
											<!-- Item Content -->
											<div class="entry-excerpt">
												<?php the_sub_field('index_item_content');?>
											</div><!-- .entry-content -->

											<footer class="entry-footer">
												<a class="read-more" href="<?php if (get_sub_field('index_item_link_type') == 'wp-page' ){ the_sub_field('index_item_link_page'); } else { the_sub_field('index_item_link_url'); } ?>" title="<?php the_sub_field('index_item_link_text');?>"><?php the_sub_field('index_item_link_text');?></a>
											</footer><!-- .entry-footer -->
										</article><!-- #post-## -->
									</li><!-- END.index-item -->

								<?php endwhile; ?>	
										
								</ul><!-- END.index-list -->
							
						<?php endif;?>

					<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- END.container -->
<?php get_footer(); ?>
