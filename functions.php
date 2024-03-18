<?php
/**
 * auction-them functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package auction-them
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}



if ( ! function_exists( 'auction_them_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function auction_them_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on auction-them, use a find and replace
		 * to change 'auction-them' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'auction-them', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'auction-them' ),
				'menu-header' => esc_html__( 'header-menu', 'auction-them' ),
				'menu-footer' => esc_html__( 'footer-menu', 'auction-them' ),
				'menu-mobil' => esc_html__( 'mobil-menu', 'auction-them' ),
				'menu-footer-colum-3' => esc_html__( 'footer-3', 'auction-them' ),
			)
		);
		add_filter( 'nav_menu_css_class', 'filter_nav_menu_css_classes', 10, 4 );
		function filter_nav_menu_css_classes( $classes, $item, $args) {
			if ( $args->theme_location === 'menu-1' ) {
				$classes = [
					'header__item',
				];

				if ( $item->current ) {
					$classes[] = 'item action';
				}
			}

			return $classes;
		}
		add_filter( 'nav_menu_css_class', 'filter_nav_menu_footer_classes', 10, 4 );
		function filter_nav_menu_footer_classes( $classes, $item, $args ) {
			if ( $args->theme_location === 'menu-footer' ) {
				$classes = [
					'footer__item',
				];

				if ( $item->current ) {
					$classes[] = 'menu-action';
				}
			}

			return $classes;
		}
		add_filter( 'nav_menu_css_class', 'filter_nav_menu_footer3_classes', 10, 4 );
		function filter_nav_menu_footer3_classes( $classes, $item, $args ) {
			if ( $args->theme_location === 'menu-footer-colum-3' ) {
				$classes = [
					'footer__item',
				];

				if ( $item->current ) {
					$classes[] = 'menu3-action';
				}
			}

			return $classes;
		}
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
				'auction_them_custom_background_args',
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
add_action( 'after_setup_theme', 'auction_them_setup' );

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	load_template( get_template_directory() . '/includes/carbon-fields/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'auction_them_custom_fields' );
function auction_them_custom_fields() {
	require get_template_directory() . '/includes/custom-fields-options/theme-optons.php';
	require get_template_directory() . '/includes/custom-fields-options/post-meta.php';
	require get_template_directory() . '/includes/custom-fields-options/widget-meta.php';
	require get_template_directory() . '/includes/custom-fields-options/widget-auction.php';
	
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function auction_them_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'auction_them_content_width', 640 );
}
add_action( 'after_setup_theme', 'auction_them_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function auction_them_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'auction-them' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'auction-them' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'id' => 'col_foot1',
			'name' => 'Баннер в footer',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<div class="banner__title">',
			'after_title' => '</div>'
		)
	);
	register_sidebar(
		array(
			'id' => 'col_foot2',
			'name' => 'Footer 2 colum',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
			'before_widget' => '<div class="footer__item">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	register_sidebar(
		array(
			'id' => 'col_foot3',
			'name' => 'Footer 3 colum',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
			'before_widget' => '<div class="footer__item">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	register_sidebar(
		array(
			'id' => 'col_foot4',
			'name' => 'Footer 4 colum',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
			'before_widget' => '<div class="footer__item">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	register_sidebar(
		array(
			'id' => 'woo_auction_sidebar',
			'name' => 'Sidebar Auction',
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
			'before_widget' => '<div class="sidibar">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}
add_action( 'widgets_init', 'auction_them_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function auction_them_scripts() {
	wp_enqueue_style( 'auction-them-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array(), null );
	wp_enqueue_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array(), null );
	wp_style_add_data( 'auction-them-style', 'rtl', 'replace' );
	
	wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js');
	wp_enqueue_script( 'auction-them-slider','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'auction-them-navigation', get_template_directory_uri() . '/js/slider.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'auction-them-nav-js', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'auction_them_scripts' );

add_action( 'woocommerce_register_form_start', 'auction_form_registration_fields', 25 );
 
function auction_form_registration_fields() {
 
	// поле "Имя"
	$billing_first_name = ! empty( $_POST[ 'billing_first_name' ] ) ? $_POST[ 'billing_first_name' ] : '';
	echo '<div class="reg__input">
		<label for="kind_of_name">Vārds   <span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_first_name" id="kind_of_name" value="' . esc_attr( $billing_first_name ) . '" />
	</div>';
 
	// поле "Фамилия"
	$billing_last_name = ! empty( $_POST[ 'billing_last_name' ] ) ? $_POST[ 'billing_last_name' ] : '';
	echo '<div class="reg__input">
		<label for="kind_of_l_name">Uzvārds <span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_last_name" id="kind_of_l_name" value="' . esc_attr( $billing_last_name ) . '" />
	</div>';

	$billing_company_name = ! empty( $_POST[ 'billing_company' ] ) ? $_POST[ 'billing_company' ] : '';
	echo '<div class="reg__input">
		<label for="kind_of_l_name">Uzņēmuma nosaukums  <span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_company" id="kind_of_c_name" value="' . esc_attr( $billing_company_name ) . '" />
	</div>';
 
	echo '<div class="clear"></div>';
 
}
add_action( 'woocommerce_created_customer', 'auction_save_fields', 25 );
 
function auction_save_fields( $user_id ) {
 
	// сохраняем Имя
	if ( isset( $_POST[ 'billing_first_name' ] ) ) {
		update_user_meta( $user_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
		update_user_meta( $user_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
	}
	// сохраняем Фамилию
	if ( isset( $_POST[ 'billing_last_name' ] ) ) {
		update_user_meta( $user_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
		update_user_meta( $user_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
	}
	if ( isset( $_POST[ 'billing_company' ] ) ) {
		update_user_meta( $user_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
		update_user_meta( $user_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
	}
}

add_action( 'init', 'remove_auction_form' );
function remove_auction_form() {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_auction_countdown', 24 );
}
add_action( 'init', 'remove_auction_condition' );
function remove_auction_condition() {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_auction_condition', 23 );
}
add_action( 'init', 'remove_auction_dates' );
function remove_auction_dates() {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_auction_dates', 24 );
}
add_action( 'init', 'remove_auction_bid_form' );
function remove_auction_bid_form() {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_auction_bid_form', 25 );
}
add_action( 'init', 'remove_auction_reserve' );
function remove_auction_reserve() {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_auction_reserve', 25 );
}
add_action( 'init', 'remove_auction_add_cart' );
function remove_auction_add_cart() {
	remove_action( 'woocommerce_auction_add_to_cart', 'woocommerce_auction_add_to_cart', 30 );
}
add_action('woocommerce_before_single_product_summary','add_wrap_countdown',5);
function add_wrap_countdown(){
	?> <div class="item__heder">
	
		<?php
}
add_action('woocommerce_before_single_product_summary','auction_pay_start_wrapp', 14);
function auction_pay_start_wrapp(){
	?>
	<div class="pay__wrapp">	
	<?php
}
add_action('woocommerce_before_single_product_summary','auction_pay_end_wrapp', 16);
function auction_pay_end_wrapp(){
	?>
	</div>	
	<?php
}


add_action('woocommerce_before_single_product_summary','end_wrap_countdown',30);
function end_wrap_countdown(){
	?> </div> <?php
}

add_action('woocommerce_before_single_product_summary','add_wrap_price',35);
function add_wrap_price(){
	?> <div class="item__heder">
	
		<?php
}

add_action('woocommerce_before_single_product_summary','end_wrap_price',40);
function end_wrap_price(){
	?> </div> <?php
}
add_filter('woocommerce_product_tabs', 'dante_add_desc_tab', 0);
function dante_add_desc_tab($tabs = array()) {
	global $post;
	$product_description = get_post_meta($post->ID, 'sf_product_description', true);
	if ($product_description != "") {
		$tabs['description'] = array(
			'title'    => __( '', 'dante' ),
			'priority' => 10,
			'callback' => 'woocommerce_product_description_tab'
		);
	}
	return $tabs;
}

add_filter( 'woocommerce_get_image_size_single', 'true_single_image_size' ); // woocommerce_single
 
function true_single_image_size( $size_options ){
 
	return array(
		'width' => 550,
		'height' => 550,
		'crop' => 0, 
	);
 
}

add_filter('wpcf7_autop_or_not', '__return_false');


add_filter( 'woocommerce_account_menu_items', 'auction_remove_my_account_links' );
function auction_remove_my_account_links( $menu_links ){
	
	unset( $menu_links[ 'edit-address' ] ); // Addresses
	
	unset( $menu_links[ 'dashboard' ] ); // Remove Dashboard
	unset( $menu_links[ 'payment-methods' ] ); // Remove Payment Methods
	// unset( $menu_links[ 'orders' ] ); // Remove Orders
	unset( $menu_links[ 'downloads' ] ); // Disable Downloads
	//unset( $menu_links[ 'edit-account' ] ); // Remove Account details tab
	unset( $menu_links[ 'customer-logout' ] ); // Remove Logout link
	
	return $menu_links;
	
}



add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link', 40 );
function misha_log_history_link( $menu_links ){
	
	$menu_links[ 'edit-account' ] = 'Mans profils'; 
	$menu_links[ 'auctions-endpoint' ] = 'Uzvarētās izsoles'; 
	$menu_links[ 'orders' ] = 'Patreiz piedalos '; 
	// $menu_links = array_slice( $menu_links, 0, 5, true ) 
	// + array( 'cart' => 'Izsole par samaksu' )
	// + array_slice( $menu_links, 5, NULL, true );
	// print_r($menu_links);
	return $menu_links;

}


// // register permalink endpoint
// add_action( 'init', 'misha_add_endpoint' );
// function misha_add_endpoint() {

// 	add_rewrite_endpoint( 'watchlist', EP_PAGES );

// }



// content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
add_action( 'woocommerce_before_account_orders', 'misha_my_account_endpoint_content' );
function misha_my_account_endpoint_content() {

	// of course you can print dynamic content here, one of the most useful functions here is get_current_user_id()
	echo do_shortcode( '[my_active_auctions]' );

}


add_action( 'woocommerce_before_shop_loop_item', 'auction_img_product_cat', 5 );
function auction_img_product_cat() {
	global $product;
	$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
	$thumbnail_id = get_term_meta( $product_cats [0]->term_id, 'thumbnail_id', true );
	$image = wp_get_attachment_url( $thumbnail_id );
		if ( $image ) {
			echo '<img class="category-thumb" src="' . $image . '" alt="" />';
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



