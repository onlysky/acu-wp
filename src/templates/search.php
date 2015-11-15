<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package onlysky_wp_framework
 */

get_header(); ?>
<div class="container">
	<section id="primary" class="content-area section-sml">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			
			<?php get_search_form(); ?>
			
			<!--
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'onlysky_wp_framework' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
			 -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'page-templates/partials/content', 'search' );
				?>

			<?php endwhile; ?>
			
			<?php the_posts_pagination( array(
		        'prev_text'          => __( '&lsaquo; Previous Results', 'cm' ),
		        'next_text'          => __( 'Next Results &rsaquo;', 'cm' ),
		        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'cm' ) . ' </span>',
		    ) );
		    ?>

		<?php else : ?>

			<?php get_template_part( 'page-templates/partials/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
</div><!-- END.container -->

<?php get_footer(); ?>
