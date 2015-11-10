<?php
/**
 * 
 * The template for displaying the home page / front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package onlysky_wp_framework
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'page-templates/partials/hero'); ?>
			
			<div class="container">
					<section class="home-content section-sml">
						<?php the_content(); ?>
					</section>
				
				<?php endwhile; // End of the loop. ?>
			
				<!-- Homepage Feature -->
				<section class="home-features">
					<?php if( have_rows('homepage_feature') ): ?>
						    <?php while( have_rows('homepage_feature') ): the_row(); ?>
						    	<?php get_template_part( 'page-templates/partials/feature-box'); ?>
						    <?php endwhile; ?>
					<?php endif; ?>
				</section>


				<!-- Homepage Latests News Posts -->
				<section class="home-posts">
					<?php 
						$latest_news_args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => 2,
							'category_name' => 'news'
						);
						$latest_news = new WP_Query($latest_news_args); 
						while( $latest_news->have_posts() ) : $latest_news->the_post(); 
					?>
						<?php get_template_part( 'page-templates/partials/content-post-teaser'); ?>
					<?php endwhile; ?>
				</section>
				
				<!-- Homepage Quick Navigation -->
				<nav id="home-quick-nav" class="quick-nav" role="navigation">
					<h3>"I want to..."</h3>	
					<?php wp_nav_menu( array( 'theme_location' => 'home_quick_nav', 'menu_id' => 'home-quick-nav-menu' ) ); ?>
				</nav>

			</div><!-- END .container -->
				
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>