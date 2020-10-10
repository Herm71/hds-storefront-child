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

/**
 * Content security policy
*/

function hds_child_theme_header_metadata() {


?>

<meta http-equiv="Content-Security-Policy" content="default-src 'self' 'unsafe-inline' 'unsafe-eval' data: *.google-analytics.com *.paypal.com ajax.googleapis.com *.googletagmanager.com use.fontawesome.com *.google.com *.unpkg.com fonts.googleapis.com fonts.gstatic.com unpkg.com *.fontawesome.com *.gravatar.com *.googlesyndication.com *.wp.com *.paypalobjects;frame-src 'self' *.youtube.com *.google.com;object-src 'none';">
<?php

}
add_action( 'wp_head', 'hds_child_theme_header_metadata' );