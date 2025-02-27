<?php
/**
 * IPO Tracker 2020 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package IPO_Tracker_2020
 */

if ( ! function_exists( 'ipo_tracker_2020_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ipo_tracker_2020_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on IPO Tracker 2020, use a find and replace
		 * to change 'ipo_tracker_2020' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ipo_tracker_2020', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'ipo_tracker_2020' ),
			'footer' => esc_html__( 'Footer', 'ipo_tracker_2020' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 120,
			'width'       => 540,
			'flex-width'  => false,
			'flex-height' => false,
		) );
		// エディタにCSS追加(default: editor-style.css)
		add_theme_support( 'editor-styles' );
		add_editor_style();
	}
endif;
add_action( 'after_setup_theme', 'ipo_tracker_2020_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ipo_tracker_2020_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ipo_tracker_2020_content_width', 640 );
}
add_action( 'after_setup_theme', 'ipo_tracker_2020_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ipo_tracker_2020_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ipo_tracker_2020' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ipo_tracker_2020' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ipo_tracker_2020_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ipo_tracker_2020_scripts() {
	wp_enqueue_style( 'ipo_tracker_2020-style', get_stylesheet_uri() );


	// wp_enqueue_script( 'ipo_tracker_2020-jquery', "https://code.jquery.com/jquery-3.3.1.min.js");
	// wp_enqueue_script( 'ipo_tracker_2020-popper', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js");
	// wp_enqueue_script( 'ipo_tracker_2020-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js");
	wp_enqueue_script( 'ipo_tracker_2020-app', get_template_directory_uri() . '/js/app.js', array(), false, true);

	// wp_enqueue_script( 'ipo_tracker_2020-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'ipo_tracker_2020-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ipo_tracker_2020_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * 追加
 */
// 絵文字無効
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );

// 管理バー非表示
// add_filter('show_admin_bar', '__return_false');

// 概要表示 ... カスタマイズ
function new_excerpt_more($more) {
	return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

// ショートコード
require get_template_directory() . '/inc/shortcords.php';
