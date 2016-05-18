<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package videobuzz
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

    <div class="col-sm-4">

    	<aside class="sidebar" role="complementary">
    		<?php dynamic_sidebar( 'sidebar-1' ); ?>
    	</aside><!-- .sidebar -->

    </div><!-- .col -->
