<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NetPing_theme
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="col-full">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="row">
				<div class="articles-wrapper">
					<div class="posts-filtering">
						<div class="tag-wrapper">
							<label for="cat">Тип публикации: </label>
							<?php wp_dropdown_categories(array(
								'show_option_none'  => 'Любой',
								'option_none_value' => 'news',
								'taxonomy'          => 'news_categories',
								'selected'          => get_query_var( 'term' ),
								'value_field'       => 'slug',
							)); ?>
						</div>

						<script type="text/javascript">
							var dropdown = document.getElementById("cat");
						
							function onCatChange() {
								var get_params = (window.location.search) ? window.location.search : '';
						
								if ( dropdown.options[dropdown.selectedIndex].value == 'news' ) {
									location.href = "<?php echo esc_url( home_url( '/' ) ); ?>"+dropdown.options[dropdown.selectedIndex].value+get_params;
								}
								else if ( dropdown.options[dropdown.selectedIndex].value != 0  ) {
									location.href = "<?php echo esc_url( home_url( '/' ) ); ?>news_cat/"+dropdown.options[dropdown.selectedIndex].value+get_params
								}
							}
							dropdown.onchange = onCatChange;

							function removeUrlParameter(paramKey) {
								var r = new URL(window.location.href);
								r.searchParams.delete(paramKey);
								location.href = r.href;
							}
						</script>

<?php
							if ( $_SERVER['QUERY_STRING'] ) {
								foreach ($_GET as $key => $value ) {
									if ('news_tags' === $key ) {
										$tag = get_term_by('slug', $value,'news_tags');
										?>
										<div class="tag-wrapper">
											<span> <?php echo $tag->name ?> </span>
											<span class="tag-remove" onclick='removeUrlParameter("<?php echo $key; ?>")'>&times;</span>
										</div>
										<?php
									}
								}
							} elseif ( is_tax('news_tags') ) {
								$news_archive_link = get_post_type_archive_link( 'netping_news' );
								?>
								<div class="tag-wrapper">
									<span> <?php echo get_queried_object()->name ?> </span>
									<a href="<?php echo $news_archive_link; ?>" class="tag-remove">&times;</a>
								</div>
								
								<?php
							}
							?>
					</div>


					<?php
					$args = array(
						'post_type'      => 'netping_news',
						'posts_per_page' => 5,
					);

					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_pagination(array(
						'format'    => '?paged=%#%',
						'prev_text' => '' ,
						'next_text' => '' ,
					));
					
				echo '</div>';
				get_sidebar();
			echo '</div>';

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		
		?>
	</div>
</main><!-- #main -->

<?php
get_footer();
