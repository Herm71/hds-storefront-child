<?php
/**
 * Storefront engine room
 *
 * @package storefront-child
 */

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

//Making jQuery Google API
function modify_jquery() {
  if (!is_admin()) {
      // comment out the next two lines to load the local copy of jQuery
      wp_deregister_script('jquery');
      wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', false, '3.5.1');
      wp_enqueue_script('jquery');
  }
}
add_action('init', 'modify_jquery');

//Google Tag Manager
// Add Google Tag code which is supposed to be placed after opening head tag.
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
// Add Google Tag code which is supposed to be placed after opening body tag.
add_action( 'wp_body_open', 'bb_gtm_body' );
 
function bb_gtm_body() {
  echo '<!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5LMPKPJ"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->';
}

// add_action('woocommerce_thankyou','google_analytics_transaction_tracker');

// function google_analytics_transaction_tracking($order_id){
//   $order = wc_get_order($order_id);
//   $myuser_id = (int)$order->user_id;
//   $user_info = get_userdata($myuser_id);
//   $items = $order->get_items();
// }