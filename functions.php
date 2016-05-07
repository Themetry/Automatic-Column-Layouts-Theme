<?php
/**
 * Automatic Column Layouts functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Automatic_Column_Layouts
 */

if ( ! function_exists( 'automatic_column_layouts_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function automatic_column_layouts_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Automatic Column Layouts, use a find and replace
	 * to change 'automatic-column-layouts' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'automatic-column-layouts', get_template_directory() . '/languages' );

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
}
endif;
add_action( 'after_setup_theme', 'automatic_column_layouts_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function automatic_column_layouts_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'automatic_column_layouts_content_width', 640 );
}
add_action( 'after_setup_theme', 'automatic_column_layouts_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function automatic_column_layouts_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'automatic-column-layouts' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'automatic-column-layouts' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'automatic_column_layouts_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function automatic_column_layouts_scripts() {
	wp_enqueue_style( 'automatic-column-layouts-style', get_stylesheet_uri() );

	wp_enqueue_script( 'automatic-column-layouts-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'automatic_column_layouts_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * The magical no-sidebar class function.
 */
require get_template_directory() . '/inc/body-classes.php';
