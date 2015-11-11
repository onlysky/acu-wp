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
			
			<!-- Footer Social Links -->
			<?php if ( is_active_sidebar( 'footer-top-sidebar' ) ) : ?>
			    <section id="footer-top-sidebar" class="widget-area section-sml" role="complementary">
			    	<?php dynamic_sidebar( 'footer-top-sidebar' ); ?>
			    </section>
			<?php endif; ?>

			<!-- Footer Webite Information -->
			<div class="site-info section-sml">
				
				<span class="site-copyright">
					Copyright &#169; <?php echo date("Y"); ?> <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></span>
				</span>

				<span class="site-address">
					<?php if(get_theme_mod("address")) : ?>
						<?php echo get_theme_mod("address");?>
					<?php endif;?>
				</span>

				<span class="site-telephone">
					<?php if(get_theme_mod("telephone_alt")) : ?>
						<a class="site-tel-alt" href="tel:+<?php echo str_replace('-','',get_theme_mod("telephone_alt"));?>"><?php echo str_replace('-','.',get_theme_mod("telephone_alt"));?></a> or 
					<?php endif;?>
					<?php if(get_theme_mod("telephone")) : ?>
						<a class="site-tel" href="tel:+<?php echo str_replace('-','',get_theme_mod("telephone"));?>" class="site-tel"><?php echo str_replace('-','.',get_theme_mod("telephone"));?></a>
					<?php endif;?>
				</span>

			</div><!-- .site-info -->
			
			<!-- Footer Menus -->
			<?php if ( is_active_sidebar( 'footer-bottom-sidebar' ) ) : ?>
			    <section id="footer-bottom-sidebar" class="widget-area section-sml" role="complementary">
			    	<?php dynamic_sidebar( 'footer-bottom-sidebar' ); ?>
			    </section>
			<?php endif; ?>
			
		</section> <!-- END.footer-inner -->

		<!-- Footer Telephone Number (Mobile Only) -->
		<?php if(get_theme_mod("telephone")) : ?>
			<div class="footer-tel">
				<span>Call Us</span>
				<a class="site-tel" href="tel:+<?php echo str_replace('-','',get_theme_mod("telephone"));?>"><?php echo str_replace('-','.',get_theme_mod("telephone"));?></a>
			</div><!-- END.footer-tel -->
		<?php endif;?>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
