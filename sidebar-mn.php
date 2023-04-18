<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package holy-trinity-parish-website
 */

if ( ! is_active_sidebar( 'sidebar-mn' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area sidebar">
	<div class="sidebar-sticky">
		<?php dynamic_sidebar( 'sidebar-mn' ); ?>
	</div>
</aside><!-- #secondary -->
