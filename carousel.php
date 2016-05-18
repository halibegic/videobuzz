<?php

$args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 6,
    'order'               => 'DESC',
    'orderby'             => 'post_date',
    'ignore_sticky_posts' => 1,
    'meta_key'            => '_featured_post',
    'meta_value'          => 1
);

// The Query
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) : ?>

	<section class="masthead">

    	<div class="container">

            <div class="carousel owl-carousel owl-theme">

                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                    <?php get_template_part( 'template-parts/content', 'sticky' ); ?>

                <?php endwhile; ?>

            </div><!-- .carousel -->

        </div><!-- .container -->

    </section><!-- .masthead -->

<?php endif; ?>

<?php wp_reset_postdata(); ?>
