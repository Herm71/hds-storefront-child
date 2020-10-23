<?php
/**
 * Storefront Child Theme
 *
 * @package storefront-child
 * @author Herm71 <jason@blackbirdconsult.com>
 * @copyright 2020 Blackbird Consulting
 * @link https://github.com/Herm71/hds-storefront-child
 * @version 1.2.3
 *
 */
/**
 * Setup
 */

// Theme version
$theme = wp_get_theme();
define('THEME_VERSION', $theme->Version);

// Theme directory
define( 'HDS_DIR', dirname( __FILE__ ) );

// enqueue base child styles
// add_action( 'wp_enqueue_scripts', 'hds_storefront_child_enqueue_styles' );
function hds_storefront_child_enqueue_styles() {
    // syle.css for child theme
    wp_enqueue_style( 'hds-storefront-child-style', get_stylesheet_directory_uri(),
        array( 'parenthandle' ),
        THEME_VERSION
    );

}

// Enqueue custom styles and javascript and make some other changes

function hds_storefront_child_enqueue_additional_assets() {
    //main bundle.css for customizations
    wp_enqueue_style( 'hds-main-stylesheet', get_stylesheet_directory_uri() . '/dist/css/bundle.css', array(), THEME_VERSION, 'all' );
    //compiled js scripts
    wp_enqueue_script( 'hds-scripts', get_stylesheet_directory_uri() . '/dist/js/bundle.js', array(), THEME_VERSION, true );
    //deregister WP jquery, register Google libraries
    if (is_admin()) {
        return; //Do not de-register in admin
    } else {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', false, '3.5.1');
        wp_enqueue_script('jquery');
    }

}
add_action('wp_enqueue_scripts', 'hds_storefront_child_enqueue_additional_assets', 11);

/**
 * Inculde customization files
 */

include ( HDS_DIR . '/lib/init.php');

/**
 * Tracking and analytics scripts
 */

//Google Tag Manager after opening head tag.
add_action('wp_head', 'bb_gtm_head');
function bb_gtm_head(){
  echo "<!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-5LMPKPJ');</script>
  <!-- End Google Tag Manager -->";
}
// Add Google Tag code opening body tag.
add_action( 'wp_body_open', 'bb_gtm_body' );

function bb_gtm_body() {
  echo '<!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LMPKPJ"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->';
}
/**
 * Goole Analytics/Tag Manager eCommerce settings
 */
// add_action('woocommerce_thankyou','google_analytics_transaction_tracker');

// function google_analytics_transaction_tracking($order_id){
//   $order = wc_get_order($order_id);
//   $myuser_id = (int)$order->user_id;
//   $user_info = get_userdata($myuser_id);
//   $items = $order->get_items();
// }


/**
 * Theme customizations
 */

 //Top Menu Callback
 function hds_top_menu (){
    if (has_nav_menu('top-menu')) {
        wp_nav_menu( array(
            'theme_location' => 'top-menu',
            'container' =>  'div',
            'container_class' => 'top-navigation secondary-navigation',
            'fallback_cb' => '',
         ));
    }
}

add_action( 'storefront_before_header', 'hds_top' );

function hds_top (){
    echo '<section id="top-bar" class="hds-header-bar-outer">';
    echo '<div class="col-full">';
    echo '<div class="hds-header-bar-inner">';
    echo '<a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>';
    ?><nav class="secondary-navigation top-navigation" role="navigation" aria-label="<?php._e( 'Secondary Menu', 'hds-storefront-child' )?>">
    <?php
    hds_top_menu();
    echo '</nav>';
    echo '<div class="hds-header-bar-widget site-search">';
    if ( is_active_sidebar( 'top-sidebar' ) ) {
     echo '<div id="site-search" class="widget woocommerce widget_product_search">';
         dynamic_sidebar('top-sidebar');
     echo'</div>';
     }
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
}

// Remove search from header
function hds_remove_sf_header_search() {

	remove_action( 'storefront_header', 'storefront_product_search', 40 );

}
add_action( 'init', 'hds_remove_sf_header_search' );

// Move shopping cart up

function hds_move_cart() {

    remove_action( 'storefront_header', 'storefront_header_cart', 60 );
    add_action( 'storefront_header', 'storefront_header_cart', 30 );

}
add_action( 'init', 'hds_move_cart' );



