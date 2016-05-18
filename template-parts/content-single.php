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

		<header class="entry-header">
			<?php
			the_title( '<h1 class="entry-title entry-title-large">', '</h1>' );

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php videobuzz_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'videobuzz' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'videobuzz' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php videobuzz_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</article><!-- .post -->
