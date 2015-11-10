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
	
	<div class="feature-box-image-container">
		<div class="feature-box-image" style="background-image:url(<?php if(get_sub_field('feature_image')){echo the_sub_field('feature_image');} else {echo (get_template_directory_uri() . '/img/acu-placeholder.jpg');} ?>);"></div><!-- END.feature-box-image -->
	</div><!-- END.feature-box-image-container -->
	
	<div class="feature-box-inner">
		<h2><?php the_sub_field('feature_title'); ?></h2>

		<div class="feature-box-content">
			<?php the_sub_field('feature_content'); ?>
		</div><!-- END.feature-box-content -->
		
		<a href="<?php the_sub_field('button_link'); ?>" title="<?php the_sub_field('button_text'); ?>" class="feature-box-button button button-gold"><?php the_sub_field('button_text'); ?></a>
		
	</div><!-- END.feature-box-inner -->
</article><!-- END.feature-box -->