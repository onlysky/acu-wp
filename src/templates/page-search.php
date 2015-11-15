<?php
/**
 * The template for displaying search page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package onlysky_wp_framework
 */

get_header(); ?>

<div class="container">

	<section id="primary" class="content-area section-sml">
		<main id="main" class="site-main" role="main">

		<?php get_search_form(); ?>

		</main><!-- #main -->
	</section><!-- #primary -->

</div><!-- END.container -->

<?php get_footer(); ?>
