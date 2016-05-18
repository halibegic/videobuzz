<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package videobuzz
 */

get_header(); ?>

	<?php get_template_part( 'carousel' ); ?>

	<div class="container">

		<section class="content">

			<div class="row">

				<div class="<?php echo is_active_sidebar( 'sidebar-1' ) ? 'col-sm-8' : 'col-sm-12'; ?>">

					<main class="main" role="main">

						<?php
						if ( have_posts() ) :

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
