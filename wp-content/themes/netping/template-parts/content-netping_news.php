<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NetPing_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-meta">
		<span class="post-cat">
			<?php 
			$post_cats = get_the_terms( get_the_ID(), 'news_categories' ); 
			if ($post_cats) {
				foreach ( $post_cats as $cat ) {
					echo '<a href="' . get_category_link($cat->term_id) . '">' . $cat->name . '</a>';
				}
			}
			?>
		</span>
		<span class="post-date"><?php echo get_the_date( 'j F Y' ); ?></span>
	</div><!-- .entry-meta -->
	
	<div class="post-wrapper">
		<?php 
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} 
		?>
		<?php netping_post_thumbnail(); ?>
		<div class="entry-wrapper">
			<?php
			if ( !is_singular() ) :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<div class="entry-content">
				<?php
				if ( is_singular() ) :
					the_content();
				else :
					the_excerpt();
				endif;
				?>
			</div><!-- .entry-content -->
			<?php if ( !is_singular() ) : ?>
				<a href="<?php esc_url( the_permalink() ); ?>" class="button readmore-button">Читать дальше →</a>
			<?php endif; ?>
		</div><!-- .entry-wrapper -->
	</div><!-- .post-wrapper -->

	<footer class="entry-footer">
		<?php
		$tags_list = get_the_term_list( get_the_ID(), 'news_tags', '<span class="tags-links">', ' ', '</span>' );
		if ( $tags_list ) {
			echo $tags_list;
		}
		?>
		<?php if ( is_singular() ): ?>
			<div class="post-navi row">
				<a href="<?php echo get_post_type_archive_link('netping_news') ?>" class="back-link">К списку новостей</a>
				<script src="https://yastatic.net/share2/share.js"></script>
				<div class="ya-share2" data-curtain data-shape="round" data-limit="0" data-more-button-type="long" data-popup-position="outer" data-services="vkontakte,facebook,telegram,twitter" async>Поделиться</div>
			</div>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
