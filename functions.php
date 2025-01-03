<?php
function custom2_theme_enqueue_styles() {
    // Bootstrap CSS from CDN
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

    // Main Theme Style.css (required by WordPress)
    wp_enqueue_style('custom2-main-style', get_stylesheet_uri());

    // Additional custom styles
    wp_enqueue_style('custom2-style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'custom2_theme_enqueue_styles');

function custom_theme_setup() {
    add_theme_support( 'menus' );

    // Register Primary Navigation Menu
    register_nav_menu( 'primary', __( 'Primary Menu', 'custom2' ) );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

function custom2_register_sidebar() {
    register_sidebar(array(
        'name'          => 'Main Sidebar',
        'id'            => 'main_sidebar',
        'before_widget' => '<div class="widget mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'custom2_register_sidebar');
?>
