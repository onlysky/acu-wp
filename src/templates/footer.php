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
		
		<section class="footer-inner container">
			
			<!-- Footer Webite Information -->
			<div class="site-info section-sml">
				
				<span class="site-copyright">
					Copyright &#169; <?php echo date("Y"); ?> <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></span>
				</span>

				<span class="site-address">
					<?php echo get_theme_mod("address");?>
				</span>

				<span class="site-telephone">
					<a class="site-tel-alt" href="tel:+<?php echo str_replace('-','',get_theme_mod("telephone_alt"));?>"><?php echo str_replace('-','.',get_theme_mod("telephone_alt"));?></a> or <a class="site-tel" href="tel:+<?php echo str_replace('-','',get_theme_mod("telephone"));?>" class="site-tel"><?php echo str_replace('-','.',get_theme_mod("telephone"));?></a> 
				</span>

			</div><!-- .site-info -->
			
			<!-- Footer Menus -->
			<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
			    <section id="footer-sidebar" class="widget-area section-sml" role="complementary">
			    	<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			    </section>
			<?php endif; ?>
			
		</section> <!-- END.footer-inner -->

		<!-- Footer Telephone Number (Mobile Only) -->
		<div class="footer-tel">
			<span>Call Us</span>
			<a class="site-tel" href="tel:+<?php echo str_replace('-','',get_theme_mod("telephone"));?>"><?php echo str_replace('-','.',get_theme_mod("telephone"));?></a>
		</div><!-- END.footer-tel -->

	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
