<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package auction-them
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function auction_them_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 324,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'auction_them_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function auction_them_woocommerce_scripts() {
	wp_enqueue_style( 'auction-them-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'auction-them-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'auction_them_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function auction_them_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'auction_them_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function auction_them_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'auction_them_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'auction_them_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function auction_them_woocommerce_wrapper_before() {
		?>
		<div class="shop__link">
			    <div class="container">
       				
			
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'auction_them_woocommerce_wrapper_before' );

if ( ! function_exists( 'auction_them_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function auction_them_woocommerce_wrapper_after() {
		?>
			      </div>
    		</div><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'auction_them_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'auction_them_woocommerce_header_cart' ) ) {
			auction_them_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'auction_them_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function auction_them_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		auction_them_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'auction_them_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'auction_them_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function auction_them_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'auction-them' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'auction-them' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'auction_them_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function auction_them_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php auction_them_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}	

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop_item' , 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10); 
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action( 'woocommerce_before_subcategory_title','woocommerce_subcategory_thumbnail',10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
//Product
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images', 20);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_auction_add_to_cart', 30);







add_action('woocommerce_after_shop_loop_item','auction_treker',5);
add_action('woocommerce_after_shop_loop_item','woocommerce_auction_dates',10);


add_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_title',20);
add_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_price',30);
add_action('woocommerce_after_shop_loop_item','replace_add_to_cart');
add_action('woocommerce_before_template_part','woocommerce_catalog_ordering',20);
// add_action( 'woocommerce_before_single_product_summary','auction_treker', 10 );

//product

add_action('woocommerce_before_single_product_summary','auction_treker',24);
add_action('woocommerce_before_single_product_summary','cheked_data_auction',28);
add_action('woocommerce_before_single_product_summary','woocommerce_template_single_price',38);
add_action('woocommerce_before_single_product_summary','woocommerce_simple_auction_start_price',36);
add_action('woocommerce_before_single_product_summary','woocommerce_auction_bid_form',50);
add_action('woocommerce_single_product_summary','woocommerce_template_single_title', 42);
add_action('woocommerce_single_product_summary','woocommerce_product_description_tab', 44);
add_action('woocommerce_single_product_summary','woocommerce_show_product_images', 45);

add_action('woocommerce_before_single_product_summary','woocommerce_auction_pay', 15);




add_action('template_redirect', 'woo_login_redirect');

//вывод категории на карточке товара 
add_action( 'woocommerce_before_shop_loop_item', 'auction_show_product_cat', 10 );

add_filter('woocommerce_product_tabs','auction_tab_history');
function auction_tab_history($arr){
	// echo print_r($arr);
}return;



function auction_show_product_cat() {
	global $product;
    echo wc_get_product_category_list( $product->get_id(), ', ', '<div class="product-cat">' . _n( '', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</div>' ); 

}


function auction_treker (){
	global $product;
	if ( $product->get_type() !== 'auction'){
		return;
	   }
	   
	   if ( ( $product->is_closed() === FALSE ) && ($product->is_started() === TRUE ) ) : ?>
		   <div class="auction-time" id="countdown"><?php echo apply_filters('time_text', esc_html__( 'Atlikušais laiks:', 'wc_simple_auctions' ), $product->get_id() ); ?> 
			   <div class="main-auction auction-time-countdown" data-time="<?php echo $product->get_seconds_remaining() ?>" data-auctionid="<?php echo $product->get_id() ?>" data-format="<?php echo get_option( 'simple_auctions_countdown_format' ) ?>"></div>
		   </div>
	   
	   <?php 
	   elseif ( ( $product->is_closed() === FALSE ) && ($product->is_started() === FALSE ) ) :?>
		   <div class="auction-time future" id="countdown"><?php echo apply_filters('auction_starts_text', esc_html__( 'Auction starts in:', 'wc_simple_auctions' ), $product); ?> 
			   <div class="auction-time-countdown future" data-time="<?php echo $product->get_seconds_to_auction() ?>" data-format="<?php echo get_option( 'simple_auctions_countdown_format' ) ?>"></div>
		   </div>
	   <?php endif; 
}


function cheked_data_auction (){
	global  $product, $post;
	$gmt_offset = get_option( 'gmt_offset' ) > 0 ? '+' . get_option( 'gmt_offset' ) : get_option( 'gmt_offset' );
	$dateformat = get_option( 'date_format' );
	$timeformat = get_option( 'time_format' );

	if ( $product->get_type() !== 'auction' ) {
		return;
	}
	if ( ( $product->is_closed() === false ) && ( $product->is_started() === true ) ) : ?>
	<p class="auction__data"><?php echo apply_filters( 'time_left_text', esc_html__( 'Izsole beidzās:', 'wc_simple_auctions' ), $product ); ?> <?php echo date_i18n( $dateformat, strtotime( $product->get_auction_end_time() ) ); ?>  <?php echo date_i18n( $timeformat, strtotime( $product->get_auction_end_time() ) ); ?> 
	</p>
		<?php
	elseif ( ( $product->is_closed() === false ) && ( $product->is_started() === false ) ) :
		?>
		<p class="auction-starts"><?php echo apply_filters( 'time_text', esc_html__( 'Auction starts:', 'wc_simple_auctions' ), $product->get_id() ); ?> <?php echo date_i18n( $dateformat, strtotime( $product->get_auction_start_time() ) ); ?>  <?php echo date_i18n( $timeformat, strtotime( $product->get_auction_start_time() ) ); ?></p>
		<p class="auction-end"><?php echo apply_filters( 'time_text', esc_html__( 'Auction ends:', 'wc_simple_auctions' ), $product->get_id() ); ?> <?php echo date_i18n( $dateformat, strtotime( $product->get_auction_end_time() ) ); ?>  <?php echo date_i18n( $timeformat, strtotime( $product->get_auction_end_time() ) ); ?> </p>
		<?php
	endif;
}


function woocommerce_simple_auction_start_price() {

	$product = wc_get_product();
	?>
	<div class="price__likme">Pēdējā likme: <span> <?php
	echo  $product->get_meta( '_auction_start_price', true );
	?>&#8364;</span></div> 
	<?php
}

function replace_add_to_cart() {
	global $product;
	$link = $product->get_permalink();
	echo do_shortcode('<a href="'.$link.'" class="auction__btn">Atvērt izsoli</a>');
	}


	function woo_login_redirect() {
		if (
		! is_user_logged_in()
		&& ( is_checkout())
		) {
		wp_redirect( '/my-account/' );
		exit;
		}
	}

