<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
						if ( have_posts() ) : ?>

							<h1 class="heading"><?php printf( esc_html__( 'Search Results for: %s', 'videobuzz' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

							<?php
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
