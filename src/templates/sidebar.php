<?php
/**
 * The sidebar containing the main widget area for Pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package onlysky_wp_framework
 */

//if ( ! is_active_sidebar( 'page-sidebar' ) ) {return;}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php 
		if ( is_page() ) {if( function_exists('dynamic_sidebar') && dynamic_sidebar('page-sidebar') );}
		elseif (is_single()){if( function_exists('dynamic_sidebar') && dynamic_sidebar('post-sidebar') );}
	    else {if( function_exists('dynamic_sidebar') && dynamic_sidebar('index-sidebar') ); } 
	?>
</div><!-- #secondary -->


