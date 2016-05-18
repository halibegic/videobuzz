<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package videobuzz
 */

if ( ! function_exists( 'videobuzz_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function videobuzz_posted_on() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );

    $posted_on = sprintf(
        esc_html_x( 'Posted on %s', 'post date', 'videobuzz' ),
        '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
    );

    $byline = sprintf(
        esc_html_x( 'by %s', 'post author', 'videobuzz' ),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

if ( ! function_exists( 'videobuzz_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the post-date/time and comments.
 */
function videobuzz_entry_meta() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );

    $posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

    echo '<span class="posted-on">' . $posted_on . '</span>';

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

        echo ' <span>&middot;</span> ';
        echo '<span class="comments-link">';
        comments_popup_link( esc_html__( 'Leave a comment', 'videobuzz' ), esc_html__( '1 Comment', 'videobuzz' ), esc_html__( '% Comments', 'videobuzz' ) );
        echo '</span>';
    }
}
endif;

if ( ! function_exists( 'videobuzz_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function videobuzz_entry_footer() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( esc_html__( ', ', 'videobuzz' ) );
        if ( $categories_list && videobuzz_categorized_blog() ) {
            printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'videobuzz' ) . '</span>', $categories_list ); // WPCS: XSS OK.
        }

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html__( ', ', 'videobuzz' ) );
        if ( $tags_list ) {

            echo ' <span>&middot;</span> ';
            printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'videobuzz' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
        comments_popup_link( esc_html__( 'Leave a comment', 'videobuzz' ), esc_html__( '1 Comment', 'videobuzz' ), esc_html__( '% Comments', 'videobuzz' ) );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            /* translators: %s: Name of current post */
            esc_html__( 'Edit %s', 'videobuzz' ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
        ),
        '<span class="edit-link">',
        '</span>'
    );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function videobuzz_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'videobuzz_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'videobuzz_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so videobuzz_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so videobuzz_categorized_blog should return false.
        return false;
    }
}

/**
 * Flush out the transients used in videobuzz_categorized_blog.
 */
function videobuzz_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'videobuzz_categories' );
}
add_action( 'edit_category', 'videobuzz_category_transient_flusher' );
add_action( 'save_post',     'videobuzz_category_transient_flusher' );

/**
 * Get video player based on _video_url
 */
function videobuzz_player() {

    global $post;
    global $wp_embed;

    $url = get_post_meta($post->ID, '_video_url', true);

    // Do nothing if we have no video to embed
    if( ! $url ) {
        return;
    }

    $embed = $wp_embed->autoembed($url);

    preg_match( '/src=[\"|\']([^ ]*)[\"|\']/', $embed, $matches );

    // Add query arguments
    if( isset( $matches[1] ) ) {

        $url = $matches[1];

        // YouTube
        if( strpos( $url, 'youtube.com' ) ) {

            $url = add_query_arg( array(
                'autoplay'       => 1,        // Play the video automatically on load
                'color'          => 'd22130', // Color used in the controls
                'rel'            => 0,        // Disabled suggested videos
                'showinfo'       => 0,        // Remove top info bar
                'iv_load_policy' => 3,        // Remove video annotations
                'modestbranding' => 3,        // Remove logo
            ), $url );

            $updated_query = true;
        }

        // Vimeo
        else if( strpos( $url, 'vimeo.com' ) ) {

            $url = add_query_arg( array(
                'autoplay'  => 1,        // Play the video automatically on load
                'byline'    => 0,        // Show the user’s byline on the video
                'color'     => 'd22130', // Color used in the controls
                'portrait'  => 0,        // Show the user’s portrait on the video
                'title'     => 0         // Show the title on the video
            ), $url);

            $updated_query = true;
        }

        // Dailymotion
        else if( strpos( $url, 'dailymotion.com' ) ) {

            $url = add_query_arg( array(
                'autoplay'     => 1,        // Play the video automatically on load
                'ui-highlight' => 'd22130', // Color used in the controls
                'ui-logo'      => 0,        // Hide logo
            ), $url);

            $updated_query = true;
        }

        if( $updated_query ) {
            $embed = preg_replace( '/src=[\"|\']([^ ]*)[\"|\']/', 'src="' . esc_url( $url ) . '"', $embed );
        }
    }

    echo $embed;
}

/*
 * Navigation
 */
function videobuzz_previous_post_link( $link ) {

    $prev_post = get_previous_post();

    if( $prev_post ) {
        $link = str_replace( 'rel=', ' title="' . $prev_post->post_title. '" rel=', $link );
    }

    return $link;
}

 function videobuzz_next_post_link( $link ) {

    $next_post = get_next_post();

    if( $next_post ) {
        $link = str_replace( 'rel=', ' title="' . $next_post->post_title. '" rel=', $link );
    }

    return $link;
}

add_filter( 'previous_post_link', 'videobuzz_previous_post_link' );
add_filter( 'next_post_link', 'videobuzz_next_post_link' );
