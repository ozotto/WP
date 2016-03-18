<?php
/**
 * laTomate functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package laTomate
 */

if ( ! function_exists( 'latomate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function latomate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on laTomate, use a find and replace
	 * to change 'latomate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'latomate', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'latomate' ),
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
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'latomate_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'latomate_setup' );

/* Registrer Nav Boostrap */
add_action( 'after_setup_theme', 'wpt_setup' );
if ( ! function_exists( 'wpt_setup' ) ):
	function wpt_setup() {
		register_nav_menu( 'primary', __( 'Primary navigation', 'latomate' ) );
	} endif;

require_once('inc/wp_bootstrap_navwalker.php');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function latomate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'latomate_content_width', 640 );
}
add_action( 'after_setup_theme', 'latomate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function latomate_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'latomate' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
			'name'          => esc_html__( 'Footer Center', 'latomate' ),
			'id'            => 'footer-center',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
	) );

	register_sidebar( array(
			'name'          => esc_html__( 'Footer Left', 'latomate' ),
			'id'            => 'footer-left',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
	) );

	register_sidebar( array(
			'name'          => esc_html__( 'Footer Right', 'latomate' ),
			'id'            => 'footer-right',
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
	) );


}
add_action( 'widgets_init', 'latomate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function latomate_scripts() {
	wp_enqueue_style( 'latomate-style', get_stylesheet_uri() );

	wp_enqueue_script( 'latomate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'latomate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'latomate_scripts' );

/**
 * Add library
 */
function add_scripts_enqueue() {
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), NULL, true );
	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', false, NULL, 'all' );
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.css', false, NULL, 'all' );
	wp_register_style( 'theme-css', get_template_directory_uri() . '/css/theme-custom.css', false, NULL, 'all' );
	wp_register_style( 'custom-css', get_template_directory_uri() . '/css/custom.css', false, NULL, 'all' );


	wp_enqueue_script( 'bootstrap-js' );
	wp_enqueue_style( 'bootstrap-css' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'custom-css' );
	wp_enqueue_style( 'theme-css' );

}
add_action( 'wp_enqueue_scripts', 'add_scripts_enqueue' );

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
 * Custom Menu Back-end
 */

require_once('inc/custom/admin-pageHome.php');
add_action('admin_head', 'custom_style');

/**
 * Custom Post
 */
/**/

include("inc/custom/custom-post.php");
add_action( 'init', 'create_post_type_slider' );
add_action( 'init', 'create_post_type_description' );
add_action( 'init', 'create_post_type_module' );

function testCustom(){
	add_menu_page('Page Home', 'Page Home', 'manage_options', 'menuHome', 'laTomate_admin_page', 'dashicons-admin-home', 6);
	add_submenu_page( 'menuHome', 'Slider', 'Slider', 'manage_options', 'edit.php?post_type=slider', NULL );
	add_submenu_page( 'menuHome', 'Description', 'Description', 'manage_options', 'edit.php?post_type=description', NULL );
	add_submenu_page( 'menuHome', 'Module', 'Module', 'manage_options', 'edit.php?post_type=module', NULL );
}

add_action('admin_menu', 'testCustom');

/**
 * Custom Meta Post
 */
/**/

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}

include("inc/custom/custom-meta-post.php");
add_action( 'cmb2_admin_init', 'custom_meta_slider' );
add_action( 'cmb2_admin_init', 'custom_meta_module' );


/**
 * Custom Widget *
 */
include("inc/custom/custom-widget.php");
include("inc/custom/custom-widget-social.php");
add_action( 'widgets_init', function(){
	register_widget( 'information_Widget' );
	register_widget( 'social_widget' );
});
