<?php
/**
 * my portfolio demo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package my_portfolio_demo
 */
require_once get_theme_file_path( '/inc/acf-mb.php' );
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'my_portfolio_demo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function my_portfolio_demo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on my portfolio demo, use a find and replace
		 * to change 'my-portfolio-demo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'my-portfolio-demo', get_template_directory() . '/languages' );

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
    add_theme_support( "post-formats", array("image","quote","video","audio","link") );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'my-portfolio-demo' ),
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
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'my_portfolio_demo_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'my_portfolio_demo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function my_portfolio_demo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'my_portfolio_demo_content_width', 640 );
}
add_action( 'after_setup_theme', 'my_portfolio_demo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function my_portfolio_demo_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'my-portfolio-demo' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'my-portfolio-demo' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'my_portfolio_demo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function my_portfolio_demo_scripts() {
	wp_enqueue_style( 'my-portfolio-demo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'my-portfolio-demo-style', 'rtl', 'replace' );

  wp_enqueue_script( 'my-portfolio-demo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
 
wp_enqueue_style( "dashicons" );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'my_portfolio_demo_scripts' );

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
/* custom css enqueue**/

function portfolio_custom_css()
{

  wp_enqueue_style('image1', get_template_directory_uri() . '/assets/img/favicon.png', array(), '1.1', 'all');
    wp_enqueue_style('image2', get_template_directory_uri() . '/assets/img/apple-touch-icon.png', array(), '1.1', 'all');
  wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all');

  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.min.css', array(), '1.1', 'all');
    wp_enqueue_style('fontawesome2', get_template_directory_uri() . '/assets/vendor/ionicons/css/ionicons.min.css', array(), '1.1', 'all');
      wp_enqueue_style('fontawesome3', get_template_directory_uri() . '/assets/vendor/owl.carousel/assets/owl.carousel.min.css', array(), '1.1', 'all');
        wp_enqueue_style('fontawesome4', get_template_directory_uri() . '/assets/vendor/venobox/venobox.css', array(), '1.1', 'all');
          wp_enqueue_style('maincss', get_template_directory_uri() . '/assets/css/style.css', array(), '1.1', 'all');
}
add_action('wp_enqueue_scripts', 'portfolio_custom_css');

/* custom js enqueue*/

function portfolio_custom_js1() {

  wp_enqueue_script('g', get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js', array('jquery'), 1.0, true);

  wp_enqueue_script('f', get_template_directory_uri() . '/assets/vendor/jquery.easing/jquery.easing.min.js', array('jquery'), 1.0, true);

    wp_enqueue_script('h', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array('jquery'), 1.0, true);

    wp_enqueue_script('u', get_template_directory_uri() . '/assets/vendor/waypoints/jquery.waypoints.min.js', array('jquery'), 1.0, true);

    wp_enqueue_script('t', get_template_directory_uri() . '/assets/vendor/counterup/jquery.counterup.min.js', array('jquery'), 1.0, true);

    wp_enqueue_script('o', get_template_directory_uri() . '/assets/vendor/owl.carousel/owl.carousel.min.js', array('jquery'), 1.0, true);

    wp_enqueue_script('e', get_template_directory_uri() . '/assets/vendor/typed.js/typed.min.js', array('jquery'), 1.0, true);

    wp_enqueue_script('l', get_template_directory_uri() . '/assets/vendor/venobox/venobox.min.js', array('jquery'), 1.0, true);

    wp_enqueue_script('i', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), 1.0, true);

   


}

add_action('wp_enqueue_scripts', 'portfolio_custom_js1');

/**
 * Register Custom Navigation Walker
 */
require_once('inc/class-wp-bootstrap-navwalker.php');

//to remove custom field  option from admin panel below code is used
// add_filter( 'acf/settings/show_admin',' __return_false');

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'movies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,
 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

function srz_register_my_cpts() {

	/**
	 * Post Type: Books.
	 */

	$labels = [
		"name" => __( "Books", "my-portfolio-demo" ),
		"singular_name" => __( "Book", "my-portfolio-demo" ),
	];

	$args = [
		"label" => __( "Books", "my-portfolio-demo" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "book", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "book", $args );
}
add_action( 'init', 'srz_register_my_cpts' );

//Action Hook practice
function before_blog_titlefun(){
echo "<h1>Our All post means the blog post</h1>";
}
add_action("before_blog_title","before_blog_titlefun");

function after_blog_titlefun(){
echo "<h4>After titlte</h4>";
}

add_action("after_blog_title","after_blog_titlefun");



