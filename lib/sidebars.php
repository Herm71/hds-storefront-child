<?php

/**
 * Top bar sidebar.
 */

function hds_topbar_widget() {
    register_sidebar( array(
        'name'          => __( 'Topbar', 'hds-storefront-child' ),
        'id'            => 'top-sidebar',
        'class'         => 'top-sidebar',
        'description'   => __( 'Widgets in this area will be shown in the Top bar.', 'hds-storefront-child' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
        // 'before_widget' => '<li id="%1$s" class="widget %2$s">',
        // 'after_widget'  => '</li>',
        // 'before_title'  => '<h2 class="widgettitle">',
        // 'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'hds_topbar_widget' );

/**
 * Header sidebar.
 */

function hds_header_widget() {
    register_sidebar( array(
        'name'          => __( 'Header', 'hds-storefront-child' ),
        'id'            => 'header-sidebar',
        'class'         => 'header-sidebar',
        'description'   => __( 'Widgets in this area will be shown in the Header, right of the Site Title.', 'hds-storefront-child' ),
        // 'before_widget' => '',
        // 'after_widget'  => '',
        // 'before_title'  => '',
        // 'after_title'   => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        // 'before_title'  => '<h2 class="widgettitle">',
        // 'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'hds_header_widget' );
?>
