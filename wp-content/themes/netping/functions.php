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
	define( '_S_VERSION', '1.3.0' );
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
add_action( 'widgets_init', 'netping_widgets_init' );
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
        array (
            'name' => 'Catalog sidebar',
            'id' => 'shop',
            'description' => 'Сайдбар на страницах каталога',
            'before_widget' => '<div class="widget-content">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title h-line">',
            'after_title' => '</h3>',
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



/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'netping_scripts', 5 );
function netping_scripts() {
	wp_enqueue_style( 'netping-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'netping-style', 'rtl', 'replace' );

	wp_enqueue_script( 'netping-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	if (is_single() && is_product() ) {
		wp_enqueue_script( 'scrollable-tabs', get_template_directory_uri() . '/js/jquery.scrolltabs.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'scrollable-tabs-setup', get_template_directory_uri() . '/js/scrolltabs-setup.js', array(), _S_VERSION, true );
	}
	
	wp_enqueue_script( 'netping-scripts', get_template_directory_uri() . '/js/npscripts.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if (is_front_page()) {
		wp_enqueue_script( 'home_scripts', get_template_directory_uri() . '/js/home_scripts.js', array(), _S_VERSION, true );
	}
}


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

/**
 * Load Admin meta output function
 */
require get_template_directory() . '/inc/admin-customizations.php';

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

//add Каталог to breadcrumbs
add_filter( 'woocommerce_get_breadcrumb', function($crumbs, $Breadcrumb) {
	if(is_woocommerce() && !is_shop() ) { //Check we got an ID (shop page is set). Added check for is_shop to prevent Home / Shop / Shop as suggested in comments
		$new_breadcrumb = [
			_x( 'Каталог', 'breadcrumb', 'woocommerce' ), //Title
			get_permalink(wc_get_page_id('shop')) // URL
		];
		array_splice($crumbs, 1, 0, [$new_breadcrumb]); //Insert a new breadcrumb after the 'Home' crumb
	}
	return $crumbs;
}, 10, 2 );


// wrap the breadcrumb separator
add_filter( 'woocommerce_breadcrumb_defaults', 'netping_change_breadcrumb_delimiter' );
function netping_change_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = '<sep> &#47; </sep>';
	return $defaults;
}

//SECTION Single product

if ( is_single() ) {
	remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}

add_action('woocommerce_before_single_product_summary', 'single_image_summary_wrapper', 15);
add_action('woocommerce_after_single_product_summary', 'single_image_summary_wrapper_end', 5);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 3);

function single_image_summary_wrapper() {
	echo '<div class="flex-wrapper">';
}

function single_image_summary_wrapper_end() {
	echo '</div>';
}

//SECTION custom tabs

//ANCHOR output custom tab 
add_filter( 'woocommerce_product_tabs', 'netping_custom_tab' );
function netping_custom_tab( $tabs ) {

	//output admin custom tabs
	if ( get_post_meta( get_the_ID(), 'tab_fields', true ) ) {
		$custom_tabs = get_post_meta( get_the_ID(), 'tab_fields' );
		$n = 1;
		foreach ( $custom_tabs[0] as $custom_tab_name => $custom_tab ) {
			
			if ($custom_tab !== '') {
				$tabs['custom_tab_' . strval($n)] = array(
					'title'     => $custom_tab_name,
					'priority'  => 70,
					'callback'  => function() use ($custom_tab) { echo $custom_tab; },
				);
			}
			$n++;
		}
	}

	//output Compatible products custom tab
	if ( get_post_meta( get_the_id(), '_compatible_products_ids', true ) ) {
		$tabs['compatibles_tab'] = array(
			'title'    => 'Совместимые устройства',
			'priority' => 80,
			'callback' => 'compatible_devices_list'
		);
	}

	//output where to buy tab
	$tabs['delivery'] = array(
		'title'     => 'Где купить?',
		'priority'  => 70,
		'callback'  => 'netping_delivery_tab_content'
	);

    return $tabs;
}

function netping_delivery_tab_content() {
	echo get_page_by_path('delivery')->post_content;
}


//!SECTION custom tabs

// Change admin menu labels
add_action( 'admin_menu', 'custom_change_admin_label' );
function custom_change_admin_label() {
    global $menu, $submenu;

    $menu[26][0] = 'Устройства';
    $submenu['edit.php?post_type=product'][5][0] = 'Все устройства';
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

//SECTION compatible products on single (outputs by netping_custom_tab function)

//ANCHOR add compatible products fields
add_action( 'woocommerce_product_options_related', 'npshop_add_compatible_products_fields' );
function npshop_add_compatible_products_fields() {
	global $post;
	?>
	<p class="form-field">
		<label for="compat_prod_ids">Совместимые устройства</label>
		<select class="wc-product-search" multiple="multiple" style="width: 50%;" id="compat_prod_ids" name="compat_prod_ids[]" data-placeholder="Поиск по товарам" data-action="woocommerce_json_search_products_and_variations" data-exclude="<?php echo intval( $post->ID ); ?>">
			<?php
			$product_ids = get_post_meta( $post->ID, '_compatible_products_ids', true );

			if ('' != $product_ids ) {
				foreach ( $product_ids as $product_id ) {
					$product = wc_get_product( $product_id );
					if ( is_object( $product ) ) {
						echo '<option value="' . esc_attr( $product_id ) . '"' . selected( true, true, false ) . '>' . esc_html( wp_strip_all_tags( $product->get_formatted_name() ) ) . '</option>';
					}
				}
			}
			?>
		</select> <?php echo wc_help_tip( 'Указанные здесь товары будут отображаться на вкладке "Совместимые устройства"'); // WPCS: XSS ok. ?>
	</p>

	<?php
}

//ANCHOR save compatible products fields
add_action( 'woocommerce_process_product_meta', 'npshop_save_compatible_products_fields' );
function npshop_save_compatible_products_fields( $post_id ){
    if ( isset($_POST['compat_prod_ids']) ) {
		update_post_meta( $post_id, '_compatible_products_ids', $_POST['compat_prod_ids'] );
	}

}

//ANCHOR output compatible products
// add_action('woocommerce_after_single_product_summary', 'compatible_devices_list', 11 );
function compatible_devices_list() {
	global $product;
	$compat_prod_ids = get_post_meta( $product->get_ID(), '_compatible_products_ids', true );

	if ( !empty($compat_prod_ids) ) {
			echo '<div class="compatible-devices">';
			foreach ( $compat_prod_ids as $compat_prod_id ) {
				$compat_product = wc_get_product($compat_prod_id);
				?>
				<div class="compat-product">
					<a class="name-link" href="<?php echo $compat_product->get_permalink() ?>">
					<?php echo $compat_product->get_image('shop_thumbnail'); ?>
						<?php echo $compat_product->get_name(); ?>
					</a>
				</div>
			<?php
			}
			echo '</div>';
	}
}

//!SECTION compatible products on single

//SECTION Product gallery customizations

add_filter('woocommerce_single_product_carousel_options', 'update_woo_flexslider_options');
function update_woo_flexslider_options($options) {
    $options['directionNav'] = true;
    $options['controlNav'] = false;
    $options['smoothHeight'] = false;
    $options['prevText'] = '';
    $options['nextText'] = '';

	return $options;
}

add_filter( 'woocommerce_get_image_size_single', function( $size ) {
	return array(
		'width' => 560,
		'height' => 315,
		'crop' => 0,
	);
} );

//SECTION Product Modifications on single

// save modifications fields to array
add_action('acf/save_post', 'save_mod_fields', 20);
function save_mod_fields( $post_id ) {

	
	for ( $mod_i = 1; $mod_i <= 7; $mod_i++ ) {
		if ( get_field( "name_mod_{$mod_i}" ) == '' ) {
			continue;
		} else {
			$mod_fields["mod_{$mod_i}"] = array( 
				'name'   => get_field( "name_mod_{$mod_i}", $post_id ),
				'status' => get_field( "status_mod_{$mod_i}", $post_id ),
				'price'  => get_field( "price_mod_{$mod_i}", $post_id ),
			); 
		}
	}

	for ( $tab_i = 1; $tab_i <= 4; $tab_i++ ) {
		if (get_field( "tab_title_{$tab_i}" ) !== '') { 
			$tab_fields[get_field( "tab_title_{$tab_i}" )] = get_field( "custom_tab_{$tab_i}" );
		} else { 
			$tab_fields["tab_{$tab_i}"] = '' ;
		};
	}

	update_field( 'mod_fields', $mod_fields, $post_id );
	update_field( 'tab_fields', $tab_fields, $post_id );

}

//!SECTION Product Modifications on single


//!SECTION Single product

//SECTION Catalog archives

//add catalog sidebar 
add_action( 'widgets_init', 'catalog_sidebar_reg' );
function catalog_sidebar_reg() {

}

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

//remove product counter from category title
add_filter( 'woocommerce_subcategory_count_html', '__return_null' );

//thumbnail for categories and product in archive
add_action( 'after_setup_theme', function() {
	add_image_size( 'category_thumb', 450, 623, true );
	add_image_size( 'product_thumb', 450, 312, true );
});
add_filter( 'subcategory_archive_thumbnail_size', function() { return 'category_thumb'; } );
add_filter( 'single_product_archive_thumbnail_size', function() { return 'product_thumb'; } );

//change button text for products in archve loop
add_filter('woocommerce_product_add_to_cart_text', 'netping_add_to_cart_text', 10, 2 );
function netping_add_to_cart_text($button_text, $product) {
	return 'Подробнее&nbsp;&nbsp;❯';
}

//length of excerpt in words
add_filter( 'excerpt_length', 'change_excerpt_length', 10, 1);
function change_excerpt_length( $length ) {
	return 30;
}

//add short description for product on archive page
add_action('woocommerce_after_shop_loop_item_title', 'add_short_desc_to_archive_product', 3);
function add_short_desc_to_archive_product() {
	global $product;

	$first_desc = explode(PHP_EOL, $product->get_short_description() );
	echo '<div class="archive-product-desc">' . $first_desc[0]  . '</div>';

}

//!SECTION Catalog archives

remove_filter( 'the_excerpt', 'wpautop' );

//shortcode to include external files. Params: file - full path to external file, wrapper - tag to wrap with (default is pre), class - class for wrapper.
add_shortcode( 'show_file', 'show_file_func' );
function show_file_func( $atts ) {
	extract( shortcode_atts( array(
	    	'file'    => '',
			'wrapper' => 'pre',
			'class'   => '',
		), 
	$atts ));

	if ($file != '') {
		echo '<' . $wrapper . ' class="' . $class . '">';
		echo @file_get_contents(get_stylesheet_directory() . '/' .$file);
		echo '</' . $wrapper. '>';
	}
}

// if ( IS_TEST_SITE ) {
// 	add_filter( 'wp_robots', 'wp_robots_no_robots' );
// }