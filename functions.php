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
/**
 * Content security policy
*/

function hds_child_theme_header_metadata() {


?>

<meta http-equiv="Content-Security-Policy" content="default-src 'self' 'unsafe-inline' 'unsafe-eval'  data: *.google-analytics.com *.paypal.com ajax.googleapis.com *.googletagmanager.com use.fontawesome.com *.google.com *.unpkg.com fonts.googleapis.com fonts.gstatic.com unpkg.com *.fontawesome.com *.gravatar.com *.googlesyndication.com *.wp.com *.paypalobjects.com;frame-src 'self' *.youtube.com *.google.com *.paypalobjects.com widgets.wp.com;object-src 'none';">
<?php

}
add_action( 'wp_head', 'hds_child_theme_header_metadata' );