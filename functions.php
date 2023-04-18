<?php

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
function theme_options_parent($parent){
	$parent = '';
	return $parent;
}
add_filter('ot_theme_options_parent_slug', 'theme_options_parent', 20);
/**
 * Required: include OptionTree.
 */
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );





if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}



/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function parish_setup() {
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
	register_nav_menus(
		array(
			'main' 			   => esc_html__( 'Main', 'parish' ),
			'footer' 		   => esc_html__( 'Footer', 'parish' ),
			'short' 		   => esc_html__( 'Short', 'parish'),
			'parish_info_menu' => esc_html__( 'Parish-Menu', 'parish' ),
		)
		
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'title-tag',
		)
	);

	require( trailingslashit( get_template_directory() ) . 'functions/meta-boxes.php');
	require( trailingslashit( get_template_directory() ) . 'functions/theme-options.php');

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'parish_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'parish_setup' );


add_action( 'after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
	load_theme_textdomain( 'parish', get_template_directory() . '/languages' );
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function parish_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'parish_content_width', 640 );
}
add_action( 'after_setup_theme', 'parish_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function parish_widgets_init() {
	register_sidebar(
		array(
			'name'          => 'Боковая панель',
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Добавьте свои виджеты здесь', 'parish' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Side Panel',
			'id'            => 'sidebar-en',
			'description'   => esc_html__( 'Add widgets here', 'parish' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'Хажуугийн самбар',
			'id'            => 'sidebar-mn',
			'description'   => esc_html__( 'Энд виджет нэмэх', 'parish' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'parish_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function parish_styles(){
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css' );
	wp_enqueue_style( 'swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
	wp_enqueue_style( 'parish-style', get_stylesheet_uri(), array('reset') );
	wp_enqueue_style( 'calend-style', get_template_directory_uri() . '/css/calend.css');
	wp_enqueue_style( 'comment-style', get_template_directory_uri() . '/css/comments.css');
}
add_action( 'wp_enqueue_scripts', 'parish_styles');
 
 
function parish_scripts() {
	wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/b84a3c81d0.js');
	wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), '', true);
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '', true);
	wp_enqueue_script( 'parish-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script ( 'vk-community', "https://vk.com/js/api/openapi.js?169");

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'parish_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

function parish_filter_current_item_menu_header( $classes ){
	if(in_array('current-menu-item', $classes)){
		$classes[] = 'menu-item-active';
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'parish_filter_current_item_menu_header');


// Обрезка отрывков описаний записей (постов)

add_filter( 'excerpt_length', function(){
	return 10;
} );

add_filter( 'excerpt_more', function(){
	return '...';
})
?>