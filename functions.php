<?php
/**
 * videobuzz functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package videobuzz
 */

if ( ! function_exists( 'videobuzz_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function videobuzz_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on videobuzz, use a find and replace
	 * to change 'videobuzz' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'videobuzz', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'videobuzz' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'video'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'videobuzz_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'videobuzz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function videobuzz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'videobuzz_content_width', 640 );
}
add_action( 'after_setup_theme', 'videobuzz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function videobuzz_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'videobuzz' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title heading">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'videobuzz' ),
		'id' 			=> 'footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-xs-6 col-sm-3 %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<h4 class="widget-title heading">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'videobuzz' ),
		'id' 			=> 'footer-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-xs-6 col-sm-3 %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<h4 class="widget-title heading">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'videobuzz' ),
		'id' 			=> 'footer-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-xs-6 col-sm-3 %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<h4 class="widget-title heading">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'videobuzz' ),
		'id' 			=> 'footer-4',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-xs-6 col-sm-3 %2$s">',
		'after_widget' => '</div>',
		'before_title'  => '<h4 class="widget-title heading">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'videobuzz_widgets_init' );

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 */
function videobuzz_add_editor_styles() {
    add_editor_style();
}
add_action( 'after_setup_theme', 'videobuzz_add_editor_styles' );

/**
 * Enqueue scripts and styles.
 */
function videobuzz_scripts() {

	// Style
	wp_enqueue_style( 'videobuzz-style', get_template_directory_uri() . '/dist/css/main.min.css', array(), '1.0' );

	// JS
	wp_enqueue_script( 'videobuzz-js', get_template_directory_uri() . '/dist/js/main.min.js', array(), '1.0', true );
	wp_enqueue_script( 'videobuzz-skip-link-focus-fix', get_template_directory_uri() . '/dist/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'videobuzz_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load custom post meta box.
 */
require get_template_directory() . '/inc/post-settings.php';

/**
 * Load custom comments.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load custom API fields.
 */
require get_template_directory() . '/inc/api-fields.php';

