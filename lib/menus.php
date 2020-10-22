<?php

/**
 * Custom menus
 * @package storefront-child
 */


function hds_custom_new_menu() {
    register_nav_menus(
      array(
        'top-menu' => __( 'Top Menu' ),
      )
    );
  }
  add_action( 'init', 'hds_custom_new_menu' );


?>
