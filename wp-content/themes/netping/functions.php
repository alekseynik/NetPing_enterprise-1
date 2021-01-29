<?php
/**
 * NetPing theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NetPing_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'netping_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function netping_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on NetPing theme, use a find and replace
		 * to change 'netping' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'netping', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'netping' ),
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
				'netping_custom_background_args',
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
add_action( 'after_setup_theme', 'netping_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function netping_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'netping_content_width', 640 );
}
add_action( 'after_setup_theme', 'netping_content_width', 0 );

/** Rregister News post type 
 * 
*/

add_action('init', 'netping_news_post_type');
function netping_news_post_type() {
    register_post_type('netping_news',
        array(
            'labels'      => array(
                'name'          => 'Новости',
                'singular_name' => 'Новость',
            ),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array('slug' => 'news'),
			'supports'    => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
			'taxonomy'    => ['post_tag'],
        )
    );
}

/** Add post tag taxonomy for news post type */
add_action( 'init', 'post_tag_for_news' );
function post_tag_for_news() {
	register_taxonomy_for_object_type( 'post_tag', 'netping_news');
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function netping_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'netping' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'netping' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Подвал столбец 1', 'netping' ),
			'id'            => 'footer-col-1',
			'description'   => esc_html__( 'Add widgets here.', 'netping' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Подвал столбец 2', 'netping' ),
			'id'            => 'footer-col-2',
			'description'   => esc_html__( 'Add widgets here.', 'netping' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Подвал столбец 3', 'netping' ),
			'id'            => 'footer-col-3',
			'description'   => esc_html__( 'Add widgets here.', 'netping' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'netping_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function netping_scripts() {
	wp_enqueue_style( 'netping-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'netping-style', 'rtl', 'replace' );

	wp_enqueue_script( 'netping-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if (is_front_page()) {
		wp_enqueue_script( 'home_scripts', get_template_directory_uri() . '/js/home_scripts.js', array(), _S_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'netping_scripts' );

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


//add script for redirection to thankyou modal after cf7 successfull submit
add_action( 'wp_footer', 'after_submit_redirect' );
function after_submit_redirect() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/#open_thankyou_modal';
	}, false );
	</script>
	<?php
}
