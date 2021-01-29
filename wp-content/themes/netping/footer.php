<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NetPing_theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="col-full">
			<!-- <div class="footer-widgets"> -->
				<?php get_sidebar( 'footer' ); ?>
			<!-- </div> -->
			<div class="site-info row">
				<div class="site-info-block">
					<?php the_custom_logo( ) ?>
				</div>
				<div class="site-info-block">ООО “Алентис Электроникс” © 2005-2020</div>
				<div class="site-info-block"><a href="#">Политика в отношении защиты и обработки персональных данных</a></div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- форма обратный звонок-->
<div id="open_callback_modal" class="modalDialog" tabindex="-1">
	<a href="#close" class="background_close"></a>
	<div>
		<a href="#close" title="Закрыть" class="close">&times;</a>
		<?php echo do_shortcode('[contact-form-7 id="4" title="Свяжитесь с нами"]'); ?>
	</div>
</div>
<!-- /форма обратный звонок -->

<!-- форма обращение в техподдержку-->
<div id="open_support_modal" class="modalDialog" tabindex="-1">
	<a href="#close" class="background_close"></a>
	<div>
		<a href="#close" title="Закрыть" class="close">&times;</a>
		<?php echo do_shortcode('[contact-form-7 id="33" title="Обращение в техподдержку"]'); ?>
	</div>
</div>
<!-- /форма обращение в техподдержку -->

<!-- форма thank you-->
<div id="open_thankyou_modal" class="modalDialog" tabindex="-1">
	<a href="#close" class="background_close"></a>
	<div>
		<a href="#close" title="Закрыть" class="close">&times;</a>
		<div>Ваша заявка отправлена. Мы свяжемся с вами при первой возможности.</div>
	</div>
</div>
<!-- /форма thank you -->


</body>
</html>
