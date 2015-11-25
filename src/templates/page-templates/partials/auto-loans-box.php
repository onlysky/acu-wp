<?php
/**
 * Auto Loans Feature Box
 * 
 * The template for displaying feature box sections on pages and home page
 * Uses Advanced Custom Fields Plugin
 * 
 * @link http://www.advancedcustomfields.com/
 *
 * @package onlysky_wp_framework
 */
?>

<article class="feature-box auto-loans-box <?php the_sub_field('auto_loans_box_color'); ?>">
	<a id="<?php the_sub_field('auto_loans_box_button_ID'); ?>" href="<?php if (get_sub_field('auto_loans_box_button_link_type') == 'wp-page' ){ the_sub_field('auto_loans_box_button_link_page'); } else { the_sub_field('auto_loans_box_button_link'); } ?>" title="<?php the_sub_field('auto_loans_box_button_text'); ?>">
		
		<div class="feature-box-image-container">
			<div class="feature-box-image" style="background-image:url(<?php if(get_sub_field('auto_loans_box_image')){echo the_sub_field('auto_loans_box_image');} else {echo (get_template_directory_uri() . '/img/acu-placeholder.jpg');} ?>);"></div><!-- END.feature-box-image -->
		</div><!-- END.feature-box-image-container -->

		<div class="feature-box-inner">
			<h2><?php the_sub_field('auto_loans_box_title'); ?></h2>
			
			<?php if(get_sub_field('auto_loans_box_content_type') == 'paragraph'): ?>
				<div class="feature-box-content">
					<?php the_sub_field('auto_loans_box_content'); ?>
				</div><!-- END.feature-box-content -->
			<?php elseif(get_sub_field('auto_loans_box_content_type') == 'rate'): ?>
				<div class="auto-loan-box-rate-container">
					<span class="auto-loan-box-rate-header">
						 <?php the_sub_field('auto_loans_box_rate_header'); ?>
					</span>

					<div class="auto-loan-box-rate">
						<span class="auto-loan-box-rate-number"><?php the_sub_field('auto_loans_box_rate'); ?></span>

						<span class="auto-loan-box-rate-type"><?php the_sub_field('auto_loans_box_rate_type'); ?></span>

						<span class="auto-loan_box-rate-extra"><?php the_sub_field('auto_loans_box_rate_extra'); ?></span>
					</div><!-- END.auto-loan-box-rate -->

				</div><!-- END.auto-loan-box-rate -->
			<?php endif;?>
			<span class="feature-box-button button button-gold"><?php the_sub_field('auto_loans_box_button_text'); ?></span>
		</div><!-- END.feature-box-inner -->
	</a>
</article><!-- END.feature-box -->