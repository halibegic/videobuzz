<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package videobuzz
 */

get_header(); ?>

	<div class="container">

		<section class="content">

			<div class="row">

				<div class="<?php echo is_active_sidebar( 'sidebar-1' ) ? 'col-sm-8' : 'col-sm-12'; ?>">

					<main class="main" role="main">

						<?php
						if ( have_posts() ) :

							the_archive_title( '<h1 class="heading">', '</h1>' );

							/* Start the Loop */
							get_template_part( 'template-parts/content', 'loop' );

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</main><!-- .main -->

				</div><!-- .col -->

				<?php get_sidebar(); ?>

			</div><!-- .row -->

		</section><!-- .content -->

	</div><!-- .container -->

<?php get_footer(); ?>
