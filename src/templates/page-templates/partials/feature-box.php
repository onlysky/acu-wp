<?php
/**
 * Feature Box
 * 
 * The template for displaying feature box sections on pages and home page
 * Uses Advanced Custom Fields Plugin
 * 
 * @link http://www.advancedcustomfields.com/
 *
 * @package onlysky_wp_framework
 */
?>

<!-- Feature Box -->
<article class="feature-box <?php the_sub_field('feature_color'); ?>">

	<a id="<?php the_sub_field('feature_box_button_id'); ?>" href="<?php if (get_sub_field('feature_button_link_type') == 'wp-page' ){ the_sub_field('feature_button_link_page'); } else { the_sub_field('feature_button_link_url'); } ?>" title="<?php the_sub_field('feature_button_text'); ?>">

		<div class="feature-box-image-container">
			<div class="feature-box-image" style="background-image:url(<?php if(get_sub_field('feature_image')){echo the_sub_field('feature_image');} else {echo (get_template_directory_uri() . '/img/acu-placeholder.jpg');} ?>);"></div><!-- END.feature-box-image -->
		</div><!-- END.feature-box-image-container -->
		
		<div class="feature-box-inner">
			<h2><?php the_sub_field('feature_title'); ?></h2>

			<div class="feature-box-content">
				<?php the_sub_field('feature_content'); ?>
			</div><!-- END.feature-box-content -->
			
			<span class="feature-box-button button button-gold"><?php the_sub_field('feature_button_text'); ?></span>

		</div><!-- END.feature-box-inner -->
	</a>
</article><!-- END.feature-box -->