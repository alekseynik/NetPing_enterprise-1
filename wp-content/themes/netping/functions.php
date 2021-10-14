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
	define( '_S_VERSION', '1.4.0' );
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

/** 
 * Rregister News post type 
 * 
*/
add_action( 'init', 'register_news_taxonomies');
function register_news_taxonomies() {
    register_taxonomy(
        'news_categories',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'netping_news',             // post type name
        array(
            'hierarchical' => true,
            'label'       => 'Рубрики новостей', // display name
			'has_archive' => true,
            'rewrite'     => array(
                'slug'       => 'news_cat',    // This controls the base slug that will display before each term
                // 'with_front' => false  // Don't display the category base before
            )
        )
    );

	register_taxonomy(
        'news_tags',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'netping_news',             // post type name
        array(
            'hierarchical' => false,
            'label'       => 'Метки новостей', // display name
			'has_archive' => true,
            'rewrite'     => array(
                'slug'       => 'news_tag',    // This controls the base slug that will display before each term
                // 'with_front' => false  // Don't display the category base before
            )
        )
    );
}

add_action('init', 'netping_news_post_type');
function netping_news_post_type() {
    register_post_type('netping_news',
        array(
            'labels'      => array(
                'name'          => 'Наш блог',
                'singular_name' => 'Пост',
            ),
			'public'      => true,
			'has_archive' => 'news',
			'menu_icon'   => 'dashicons-media-document',
			'rewrite'     => array('slug' => 'news'),
			'supports'    => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
			'taxonomy'    => [ 'news_tags', 'news_categories' ],
        )
    );
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
 * Load Breadcrumbs class
 */
if ( !function_exists( 'breadcrumb_trail' ) ) {
	require_once( 'inc/breadcrumbs.php' );
}

/**
 * Load post meta table function for Admin area
 */
require get_template_directory() . '/inc/admin-customizations.php';

/**
 * Load custom widgets classes
 */
require( 'inc/class-wp-widget-netping-tags.php' );
require( 'inc/class-wp-widget-recent-news.php' );


//register custom widgets
add_action( 'widgets_init', 'register_netping_widgets' );
function register_netping_widgets() {
	register_widget( 'WP_Widget_Recent_News' );
	register_widget( 'WP_Widget_Netping_Tags' );
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

//add Каталог to woocommerce breadcrumbs
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


// wrap woocommerce breadcrumb separator
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

//add short description for product on archive page
add_action('woocommerce_after_shop_loop_item_title', 'add_short_desc_to_archive_product', 3);
function add_short_desc_to_archive_product() {
	global $product;

	$first_desc = explode(PHP_EOL, wp_strip_all_tags($product->get_short_description()) );
	echo '<div class="archive-product-desc">' . $first_desc[0] . '</div>';

}

//!SECTION Catalog archives

//excerpt customiztions
remove_filter( 'the_excerpt', 'wpautop' );
add_filter('excerpt_more', function($more) {
	return '...';
});

//length of excerpt in words
add_filter( 'excerpt_length', 'change_excerpt_length', 10, 1);
function change_excerpt_length( $length ) {
	if ( get_post_type() == 'netping_news' && !is_front_page() ) {
		return 100;
	} else {
		return 30;
	}
}

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

//add class if sidebar is present on news archives
add_filter('body_class', 'add_sidebar_class' );
function add_sidebar_class( $classes ) {
	// if ( is_post_type_archive('netping_news') ) {
	// 	unset($classes['custom-background']);
	// }

	if (is_active_sidebar('sidebar-1') && is_post_type_archive('netping_news') ) {
		$classes[] = 'has_sidebar';
	}
	return $classes;
}

//count visits for News posts
add_action( 'wp_head', 'count_news_post_visits' );
function count_news_post_visits() {
	if ( is_singular('netping_news') ) {
	   global $post;
	   $views = get_post_meta( $post->ID, 'news_post_views', true );
	   if ( $views == '' ) {
		  update_post_meta( $post->ID, 'news_post_views', '1' ); 
	   } else {
		  $views_no = intval( $views );
		  update_post_meta( $post->ID, 'news_post_views', ++$views_no );
	   }
	}
 }

 /**
 * Displays list of popular tags. Based on wp_tag_cloud(). Used in class-wp-widget-netping-tags.php
 *
 * Outputs a list of tags in what is called a 'tag cloud', where the size of each tag
 * is determined by how many times that particular tag has been assigned to posts.
 *
 * @since 2.3.0
 * @since 2.8.0 Added the `taxonomy` argument.
 * @since 4.8.0 Added the `show_count` argument.
 *
 * @param array|string $args {
 *     Optional. Array or string of arguments for displaying a tag cloud. See wp_generate_tag_cloud()
 *     and get_terms() for the full lists of arguments that can be passed in `$args`.
 *
 *     @type int    $number    The number of tags to display. Accepts any positive integer
 *                             or zero to return all. Default 45.
 *     @type string $link      Whether to display term editing links or term permalinks.
 *                             Accepts 'edit' and 'view'. Default 'view'.
 *     @type string $post_type The post type. Used to highlight the proper post type menu
 *                             on the linked edit page. Defaults to the first post type
 *                             associated with the taxonomy.
 *     @type bool   $echo      Whether or not to echo the return value. Default true.
 * }
 * @return void|string|string[] Void if 'echo' argument is true, or on failure. Otherwise, tag cloud
 *                              as a string or an array, depending on 'format' argument.
 */
function wp_pop_tag( $args = '' ) {
	$defaults = array(
		'smallest'   => 14,
		'largest'    => 14,
		'unit'       => 'px',
		'number'     => 0,
		'format'     => 'flat',
		'separator'  => "\n",
		'orderby'    => 'count',
		'order'      => 'DESC',
		'exclude'    => '',
		'include'    => '',
		'link'       => 'view',
		'taxonomy'   => 'post_tag',
		'post_type'  => '',
		'echo'       => true,
		'show_count' => 0,
	);

	$args = wp_parse_args( $args, $defaults );

	$tags = get_terms(
		array_merge(
			$args,
			array(
				'orderby' => 'count',
				'order'   => 'DESC',
			)
		)
	); // Always query top tags.

	if ( empty( $tags ) || is_wp_error( $tags ) ) {
		return;
	}

	foreach ( $tags as $key => $tag ) {
		if ( 'edit' === $args['link'] ) {
			$link = get_edit_term_link( $tag->term_id, $tag->taxonomy, $args['post_type'] );
		} elseif ( 'link_params' === $args['link'] ) {
			$paged = ( get_query_var( 'paged' ) ) ? true : false;
			$link = ( $paged ) ? esc_url( home_url( '/news/' ) ) . '?news_tags='  . $tag->slug : '?news_tags=' . $tag->slug;
		} else {
			$link = get_term_link( (int) $tag->term_id, $tag->taxonomy );
		}

		if ( is_wp_error( $link ) ) {
			return;
		}

		$tags[ $key ]->link = $link;
		$tags[ $key ]->id   = $tag->term_id;
	}

	// Here's where those top tags get sorted according to $args.
	$return = wp_generate_tag_cloud( $tags, $args );

	/**
	 * Filters the tag cloud output.
	 *
	 * @since 2.3.0
	 *
	 * @param string|string[] $return Tag cloud as a string or an array, depending on 'format' argument.
	 * @param array           $args   An array of tag cloud arguments. See wp_tag_cloud()
	 *                                for information on accepted arguments.
	 */
	$return = apply_filters( 'wp_tag_cloud', $return, $args );

	if ( 'array' === $args['format'] || empty( $args['echo'] ) ) {
		return $return;
	}

	echo $return;
}

//add readmore class to 'add to cart' button in archives
add_filter('woocommerce_loop_add_to_cart_args', 'add_readmore_class', 15, 1 );
function add_readmore_class($args) {
	$args['class'] = $args['class'] . ' readmore-button';
	return $args;
}

//wrap tags by tag-wrapper
add_filter('term_links-news_tags', 'wrap_tag_links' );
function wrap_tag_links($links) {
	foreach ( $links as $link ) {
		$link = '<span class="tag-wrapper">' . $link . '</span>';
		$wrapped_links[] = $link;
	}

	return $wrapped_links;
}

//add tag-wrapper class for tags in cloud
add_filter( 'wp_generate_tag_cloud_data', 'add_class_for_tags_in_clouds' );
function add_class_for_tags_in_clouds($tags_data) {
	foreach ($tags_data as $tag_data ) {
		$tag_data['class'] = 'tag-wrapper ' . $tag_data['class'];
		$wrapped_tags_data[] = $tag_data;
	}
	return $wrapped_tags_data;
}

//get only tags used by posts of specific category
function get_tags_in_use($category_ID, $type = 'name') {
    // Set up the query for our posts
    $my_posts = new WP_Query(array(
		'post_type' => 'netping_news',
		'tax_query' => array(
			array(
				'taxonomy' => 'news_categories',
				'terms'    => $category_ID,
			)),
    	'posts_per_page' => -1 // All posts from that category
    ));

    // Initialize our tag arrays
    $tags_by_id = array();
    $tags_by_name = array();
    $tags_by_slug = array();
	
    // If there are posts in this category, loop through them
    if ($my_posts->have_posts()): while ($my_posts->have_posts()): $my_posts->the_post();

		// Get all tags of current post
		// $post_tags = wp_get_post_tags($my_posts->post->ID);
		$post_tags = wp_get_post_terms($my_posts->post->ID, 'news_tags' );
		// $post_tags = 'psttags';
		// echo wp_get_post_terms($my_posts->post->ID, 'news_tags' );

		// Loop through each tag
		foreach ($post_tags as $tag):

			// Set up our tags by id, name, and/or slug
			$tag_id = $tag->term_id;
			$tag_name = $tag->name;
			$tag_slug = $tag->slug;

			// Push each tag into our main array if not already in it
			if (!in_array($tag_id, $tags_by_id))
				array_push($tags_by_id, $tag_id);

			if (!in_array($tag_name, $tags_by_name))
				array_push($tags_by_name, $tag_name);

			if (!in_array($tag_slug, $tags_by_slug))
				array_push($tags_by_slug, $tag_slug);

		endforeach;
    endwhile; 
	endif;

    // Return value specified
    if ($type == 'id')
        return $tags_by_id;

    if ($type == 'name')
        return $tags_by_name;

    if ($type == 'slug')
        return $tags_by_slug;
}

add_action('pre_get_posts','alter_query');
function alter_query($query) {
	//gets the global query var object
	global $wp_query;

	if ( !$query->is_main_query() )
		return;

	if ( ! is_admin() && is_archive() ) {
		$query-> set( 'posts_per_page', 20 );
	}

}

// if ( IS_TEST_SITE ) {
// 	add_filter( 'wp_robots', 'wp_robots_no_robots' );
// }

add_filter('get_the_archive_title_prefix','__return_false');