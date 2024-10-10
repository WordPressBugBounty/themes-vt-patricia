<?php
/**
 * WooCommerce Compatibility.
 *
 * @link https://woocommerce.com/
 *
 * @package VT Patricia
 */
 
/*----------------------------------------------------------------------
# WooCommerce Support.
-------------------------------------------------------------------------*/  
function vt_patricia_woocommerce_setup() {

	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'woocommerce', array(
		'gallery_thumbnail_image_width' => 300,
	) );
	
}
add_action( 'after_setup_theme', 'vt_patricia_woocommerce_setup' );

/**
 * Remove WooCommerce Default Sidebar.
 */
remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar',10 );


/*----------------------------------------------------------------------
# WooCommerce Enqueue Scripts.
-------------------------------------------------------------------------*/  
function vt_patricia_woocommerce_scripts() {

	wp_enqueue_style( 'vt-patricia-woocommerce-style', get_template_directory_uri() . '/woocommerce/css/woocommerce.css' );

}
add_action( 'wp_enqueue_scripts', 'vt_patricia_woocommerce_scripts' );

/*----------------------------------------------------------------------
# Ensure cart contents update when products are added to the cart via AJAX
-------------------------------------------------------------------------*/ 
add_filter( 'woocommerce_add_to_cart_fragments', 'patricia_header_add_to_cart_fragment' );
function patricia_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
		<div class="cart-contents">
			<i class="fas fa-shopping-basket"></i>
			<span class="cart-contents-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
		</div>
	<?php
	$fragments['.cart-contents'] = ob_get_clean();
	return $fragments;

}

/*----------------------------------------------------------------------
# Get WC Header cart
-------------------------------------------------------------------------*/
if ( ! function_exists( 'vt_patricia_header_cart' ) ) {
    function vt_patricia_header_cart() {
        if(!function_exists('wc_get_cart_url')) return;
        ?>
        <ul id="site-header-cart" class="site-header-cart">
            <li class="cart-icon">
                <div class="cart-contents">
					<i class="fas fa-shopping-basket"></i>
                    <span class="cart-contents-count"><?php echo absint( WC()->cart->get_cart_contents_count() ); ?></span>
                </div>
            </li>
            <li>
                <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
            </li>
        </ul>
        <?php
    }
}