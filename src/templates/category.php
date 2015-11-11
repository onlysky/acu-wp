<?php
/**
 * Categories / Posts Index Template
 * Description: This template displays post categories and is used primarily to display the News Index, and any subcategory indicies for post categories.
 *
 * @package onlysky_wp_framework
 */

get_header(); ?>
<div class="container content-sidebar">
	<div id="primary" class="content-area">
		<main id="main" class="site-main posts-index" role="main">

		<!-- Category Header & Subheader -->
		<h1 class="post-title"><?php single_cat_title( '', true ); ?></h1><!-- END.page-title -->
		<?php if(category_description()):?>
			<h2 class="page-subhead"><?php echo category_description(); ?></h2><!-- END.page-subhead -->
		<?php endif;?>
		

		<?php
		//!TODO STICKY POSTS
		/*
		  $count_stickies = count( get_option( 'sticky_posts' ) );

		  echo 'posts per page: '.$posts_per_page;
		  echo '</br>sticky posts: '.$count_stickies;

		    $sticky_posts = array (
			    'post__in' => get_option('sticky_posts'),
			);



			$wp_query = new WP_Query();
			$wp_query->query('showposts='.$posts_per_page.'&post_type=post&paged=true&cat='.$cat_id);
			*/
		?>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'page-templates/partials/content-post-teaser'); ?>

			<?php endwhile; ?>
			
			<?php the_posts_pagination(); ?> 

			
		<?php else : ?>

			<?php get_template_part( 'page-templates/partials/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
	
</div><!-- END.container content-sidebar -->
<?php get_footer(); ?>