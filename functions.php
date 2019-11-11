<?php
/**
 * vr functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vr
 */

if ( ! function_exists( 'vr_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vr_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on vr, use a find and replace
		 * to change 'vr' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'vr', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'vr' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'vr_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'vr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vr_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'vr_content_width', 640 );
}
add_action( 'after_setup_theme', 'vr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vr_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vr' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'vr' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vr_scripts() {
	wp_enqueue_style( 'vr-style', get_template_directory_uri(). '/css/styles.min.css', '1.0' );
	wp_enqueue_script( 'vr-script', get_template_directory_uri(). '/js/scripts.min.js', array(), null, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vr_scripts' );

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


// Register Custom Post Type Price List
function pricelist_post_type() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'vr' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'vr' ),
		'menu_name'             => __( 'Services Price List', 'vr' ),
		'name_admin_bar'        => __( 'Service', 'vr' ),
		'archives'              => __( 'Item Archives', 'vr' ),
		'attributes'            => __( 'Item Attributes', 'vr' ),
		'parent_item_colon'     => __( 'Parent Service:', 'vr' ),
		'all_items'             => __( 'All Services', 'vr' ),
		'add_new_item'          => __( 'Add New Service', 'vr' ),
		'add_new'               => __( 'New Service', 'vr' ),
		'new_item'              => __( 'New Item', 'vr' ),
		'edit_item'             => __( 'Edit Service', 'vr' ),
		'update_item'           => __( 'Update Service', 'vr' ),
		'view_item'             => __( 'View Service', 'vr' ),
		'view_items'            => __( 'View Items', 'vr' ),
		'search_items'          => __( 'Search services', 'vr' ),
		'not_found'             => __( 'No services found', 'vr' ),
		'not_found_in_trash'    => __( 'No services found in Trash', 'vr' ),
		'featured_image'        => __( 'Featured Image', 'vr' ),
		'set_featured_image'    => __( 'Set featured image', 'vr' ),
		'remove_featured_image' => __( 'Remove featured image', 'vr' ),
		'use_featured_image'    => __( 'Use as featured image', 'vr' ),
		'insert_into_item'      => __( 'Insert into item', 'vr' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'vr' ),
		'items_list'            => __( 'Items list', 'vr' ),
		'items_list_navigation' => __( 'Items list navigation', 'vr' ),
		'filter_items_list'     => __( 'Filter items list', 'vr' ),
	);
	$rewrite = array(
		'slug'                  => 'services',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => __( 'Service', 'vr' ),
		'description'           => __( 'Pricelist information pages.', 'vr' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'pricelist',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'pricelist', $args );

}
add_action( 'init', 'pricelist_post_type', 0 );

// Register Custom Post Type Study Center
function study_post_type() {

	$labels = array(
		'name'                  => _x( 'Study Center', 'Post Type General Name', 'vr' ),
		'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'vr' ),
		'menu_name'             => __( 'Study Center', 'vr' ),
		'name_admin_bar'        => __( 'Study Center', 'vr' ),
		'archives'              => __( 'Item Archives', 'vr' ),
		'attributes'            => __( 'Item Attributes', 'vr' ),
		'parent_item_colon'     => __( 'Parent Course:', 'vr' ),
		'all_items'             => __( 'All Courses', 'vr' ),
		'add_new_item'          => __( 'Add New Course', 'vr' ),
		'add_new'               => __( 'New Course', 'vr' ),
		'new_item'              => __( 'New Item', 'vr' ),
		'edit_item'             => __( 'Edit Course', 'vr' ),
		'update_item'           => __( 'Update Course', 'vr' ),
		'view_item'             => __( 'View Course', 'vr' ),
		'view_items'            => __( 'View Items', 'vr' ),
		'search_items'          => __( 'Search courses', 'vr' ),
		'not_found'             => __( 'No courses found', 'vr' ),
		'not_found_in_trash'    => __( 'No courses found in Trash', 'vr' ),
		'featured_image'        => __( 'Featured Image', 'vr' ),
		'set_featured_image'    => __( 'Set featured image', 'vr' ),
		'remove_featured_image' => __( 'Remove featured image', 'vr' ),
		'use_featured_image'    => __( 'Use as featured image', 'vr' ),
		'insert_into_item'      => __( 'Insert into item', 'vr' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'vr' ),
		'items_list'            => __( 'Items list', 'vr' ),
		'items_list_navigation' => __( 'Items list navigation', 'vr' ),
		'filter_items_list'     => __( 'Filter items list', 'vr' ),
	);

	$rewrite = array(
		'slug'                  => 'study',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => false,
	);
	
	$args = array(
		'label'                 => __( 'Study Center', 'vr' ),
		'description'           => __( 'Study Center information pages.', 'vr' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'study',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'study', $args );

}
add_action( 'init', 'study_post_type', 0 );
