<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package onlysky_wp_framework
 */

get_header(); ?>

	<?php get_template_part( 'page-templates/partials/hero'); ?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				// If custom 404 page content exists, get the content
				$the_page    = null;
				$errorpageid = get_option( '404pageid', 0 ); 
				if ($errorpageid !== 0) {
				    // Typecast to an integer
				    $errorpageid = (int) $errorpageid;
				    // Get our page
				    $the_page = get_page($errorpageid);
				}
			?>

			<section class="error-404 not-found">
				
				<?php if ($the_page == NULL || isset($the_page->post_content) && trim($the_page->post_content == '')): ?>
					<header class="page-header">
						<h1 class="post-title"><?php esc_html_e( 'Let&rsquo;s try that again.', 'onlysky_wp_framework' ); ?></h1>
					</header><!-- .page-header -->

				
					<div class="page-content">
						
					        <p>The page you're looking for is not here.</p>
					        <p>
					        	<a href="<?php echo site_url(); ?>" title="Home" class="read-more">Go to our home page</a> <br />
								<a href="/search" title="Search our website" class="read-more">Search for content</a>
					        </p>
					   
						<!-- <?php get_search_form(); ?> -->

					</div><!-- .page-content -->
				<?php else: ?>
					<div class="page-content">
						<?php echo apply_filters( 'the_content', $the_page->post_content ); ?>
					</div><!-- .page-content -->
				<?php endif; ?>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>


