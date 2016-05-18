<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package videobuzz
 */

get_header();

	if ( 'video' === get_post_format() ) :

		get_template_part( 'template-parts/content', 'video' );

	endif; ?>

	<div class="container">

		<section class="content">

			<div class="row">

				<div class="<?php print is_active_sidebar( 'sidebar-1' ) ? 'col-sm-8' : 'col-sm-12'; ?>">

					<main class="main" role="main">

						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'single' );

						endwhile; // End of the loop. ?>

						<hr>

						<div class="about-author">

                            <div class="author-avatar">
                                <?php echo get_avatar( get_the_author_meta( 'user_email' ), 60, null, null, array( 'class' => array( 'img-responsive', 'img-circle' ) ) ); ?>
                            </div>

							<div class="author-info">
								<h5><?php echo _e( 'About The Author', 'videobuzz' ); ?></h5>
								<span>
									<?php the_author_posts_link(); ?> - <?php the_author_meta( 'description' ); ?>
								</span>
							</div>

                        </div><!--/about-author-->

						<hr>

						<div class="nav-links">

							<div class="row">

								<div class="col-xs-6">
									<div class="nav-previous">
										<?php previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'videobuzz' ) ); ?>
									</div>
								</div>

								<div class="clearfix mb-15 visible-xs"></div>

								<div class="col-xs-6">
									<div class="nav-next">
										<?php next_post_link( '<div class="nav-next">%link</div>', _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link', 'videobuzz' ) ); ?>
									</div>
								</div>

							</div>

						</div><!-- .nav-links -->

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif; ?>

					</main><!-- .main -->

				</div><!-- .col -->

				<?php get_sidebar(); ?>

			</div><!-- .row -->

		</section><!-- .content -->

	</div><!-- .container -->

<?php get_footer(); ?>
