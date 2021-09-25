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
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->
				<div class="row">
					<div class="articles-wrapper">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						the_posts_pagination();
						
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
