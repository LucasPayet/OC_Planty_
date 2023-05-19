<?php
/**
** child theme
**/
function theme_enqueue_styles() {
    $version =  wp_get_theme()-> get('Version') ;
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '../blankslate/style.css' );
    // wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array(), 6.2 );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/**
 ** customize theme   
 */
function montheme_customize_register($wp_customize)
{
    // Ajout d'une section pour le logo personnalisé
    $wp_customize->add_section('montheme_logo_section', array(
        'title'      => __('Logo', 'montheme'),
        'priority'   => 30,
    ));

    // Ajout de la fonctionnalité de logo personnalisé
    $wp_customize->add_setting('montheme_logo');

    // Ajout du contrôle pour téléverser le logo personnalisé
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'montheme_logo', array(
        'label'    => __('Téléverser votre logo', 'montheme'),
        'section'  => 'montheme_logo_section',
        'settings' => 'montheme_logo',
    )));
}
add_action('customize_register', 'montheme_customize_register');

function add_custom_menu_item( $items, $args ) {
    if ( is_user_logged_in() ) {
        $NewItems = '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="http://localhost/Projet6/wp-admin"> <span>Admin</span> </a></li>';
        $items .= $NewItems;
    }
    return $items;
}

apply_filters( 'wp_nav_menu_items', $items, $args);
// $menu_items = 
// echo $menu_items;