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