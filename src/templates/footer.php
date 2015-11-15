<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package onlysky_wp_framework
 */

?>

	</div><!-- #content -->

	<!-- Website Footer -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<section class="footer-inner">
			
			<!-- Footer Widget Area -->
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
			    <section id="footer-sidebar" class="widget-area" role="complementary">
			    	<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			    </section>
			<?php endif; ?>
			
		</section> <!-- END.footer-inner -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
