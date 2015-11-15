<?php
/**
 * Template part for displaying post teasers.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package onlysky_wp_framework
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
	
		<!-- Post Thumbnail -->
		<div class="entry-thumbnail">
			<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" style="background-image:url(<?php if ( has_post_thumbnail()) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); } else { echo (get_stylesheet_directory_uri() . '/img/acu-placeholder.jpg');} ?>);">
			</a>
		</div><!-- END.entry-image -->
	
	<!-- Post Exceprt -->
	<div class="entry-excerpt">
		<?php 
			if(!$post->post_excerpt) {
				echo '<p>';
				echo wp_trim_words( get_the_content(), 20, '...' );
				echo '</p>';
			} 
			else {
				the_excerpt();
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<a class="read-more" href="<?php the_permalink(); ?>" title="Continue reading '<?php the_title_attribute(); ?>'">Read More</a>
		<?php //onlysky_wp_framework_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->