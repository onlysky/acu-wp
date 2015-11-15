<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package onlysky_wp_framework
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<a class="search-results-link" href="<?php the_permalink();?>"><?php the_permalink();?></a>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php onlysky_wp_framework_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			<?php //onlysky_wp_framework_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->

