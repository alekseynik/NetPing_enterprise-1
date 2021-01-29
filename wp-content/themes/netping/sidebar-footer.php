<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NetPing_theme
 */

// if ( ! is_active_sidebar( 'sidebar-col-1' ) ) {
// 	return;
// }
// ?>

<div class="footer-widgets row">
	<?php 
	if ( is_active_sidebar( 'footer-col-1' ) ) {
		?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'footer-col-1' ); ?>
		</div>
		<?php
	}

	if ( is_active_sidebar( 'footer-col-2' ) ) {
		?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'footer-col-2' ); ?>
		</div>
		<?php
	}

	if ( is_active_sidebar( 'footer-col-3' ) ) {
		?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'footer-col-3' ); ?>
		</div>
		<?php
	}
	
	?>
</div><!-- #secondary -->
