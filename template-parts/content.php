<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package videobuzz
 */

?>

	<article <?php post_class(); ?>>

		<figure class="entry-thumbnail">
			<a class="aspect-16x9" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail( 'large', array( 'class' => 'img-responsive' ) ); ?>

				<?php if ( 'video' === get_post_format() ) : ?>
					<div class="play play-small"></div>
				<?php endif; ?>
			</a>
		</figure><!-- .entry-thumbnail -->

		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-meta">
			<?php videobuzz_entry_meta(); ?>
		</div><!-- .entry-meta -->

	</article><!-- .post -->
