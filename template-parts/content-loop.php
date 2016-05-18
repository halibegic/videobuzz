<?php
/**
 * Template part for displaying results.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package videobuzz
 */

    /* keep track of the row div */
    $i = 0;

    /* Start the Loop */
    while ( have_posts() ) : the_post();

    if( $i % 2 === 0 ) : ?>
        <div class="row">

    <?php
    endif;
    ?>

        <div class="col-xs-6">

            <?php
            /*
             * Include the Post-Format-specific template for the content.
             * If you want to override this in a child theme, then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'template-parts/content' ); ?>

        </div><!-- .col -->

    <?php $i++; ?>

    <?php if( $i !== 0 && $i % 2 === 0 ) : ?>
        </div><!--/.row-->

    <?php
    endif;

    endwhile;

    if( $i !== 0 && $i % 2 !== 0) : /* close the row if it did not get closed in the loop */ ?>
        </div><!--/.row-->

    <?php
    endif;

    the_posts_navigation(); ?>
