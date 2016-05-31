<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package videobuzz
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="<?php echo get_template_directory_uri(); ?>/dist/img/favicon.ico" rel="shortcut icon">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="main" id="main">
	
		<a class="screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'videobuzz' ); ?></a>

		<header class="header" role="banner">

			<nav class="navbar navbar-inverse navbar-static-top">

			    <div class="container">

			        <div class="navbar-header">
			            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse" aria-expanded="false" aria-controls="navbar">
				            <span class="sr-only">Toggle navigation</span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
			            </button>
			            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			        </div><!-- .navbar-header -->

			        <?php
			        	wp_nav_menu(
			        		array(
		                        'theme_location' => 'primary',
		                        'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
		                        'menu_class' => 'nav navbar-nav navbar-right',
		                        'fallback_cb' => '',
		                        'menu_id' => 'primary-menu',
		                        'walker' => new wp_bootstrap_navwalker()
			        		)
		        		); ?>

			    </div><!-- .container -->

			</nav><!-- .navbar -->

		</header><!-- .header -->

		<div class="wrapper transition-fadein">
