<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package onlysky_wp_framework
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
	<div class="entry-featured-image">
		<?php if ( has_post_thumbnail() ) {the_post_thumbnail();}?>
	</div><!-- END.entry-featured-image -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onlysky_wp_framework' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<div class="entry-meta">
			<?php onlysky_wp_framework_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php // onlysky_wp_framework_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

