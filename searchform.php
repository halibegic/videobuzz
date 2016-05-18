<?php
/**
 * The template for displaying search forms
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package videobuzz
 */
?>
    <form class="form-search" method="get" action="<?php print esc_url( home_url( '/' ) ); ?>" role="search">

        <input type="search" class="form-control" value="<?php print get_search_query(); ?>" name="s" placeholder="<?php _e( 'Type and hit enter', 'videobuzz' ); ?>">
        <button type="submit" class="form-submit" role="button" tabindex="-1"></button>

    </form><!-- .form-search -->
