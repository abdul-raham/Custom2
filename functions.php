<?php
function custom2_theme_enqueue_styles() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

    wp_enqueue_style('custom2-main-style', get_stylesheet_uri());

    wp_enqueue_style('custom2-style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'custom2_theme_enqueue_styles');

function custom2_enqueue_scripts() {
    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'custom2_enqueue_scripts');


function custom_theme_setup() {
    add_theme_support('menus');

    register_nav_menu('primary', __('Primary Menu', 'custom2'));
}
add_action('after_setup_theme', 'custom_theme_setup');

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

function custom_theme_support() {
    add_theme_support('page-attributes');
}
add_action('after_setup_theme', 'custom_theme_support');

function custom_team_member_post_type() {
    $labels = array(
        'name'                  => _x('Team Members', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Team Member', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Team Members', 'text_domain'),
        'all_items'             => __('All Team Members', 'text_domain'),
        'add_new_item'          => __('Add New Team Member', 'text_domain'),
        'edit_item'             => __('Edit Team Member', 'text_domain'),
        'view_item'             => __('View Team Member', 'text_domain'),
    );

    $args = array(
        'label'                 => __('Team Member', 'text_domain'),
        'description'           => __('A custom post type for team members', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'thumbnail'),
        'public'                => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-groups',
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'team-member'),
    );

    register_post_type('team_member', $args);
}
add_action('init', 'custom_team_member_post_type');

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_team_member_fields',
        'title' => 'Team Member Details',
        'fields' => array(
            array(
                'key' => 'field_position',
                'label' => 'Position',
                'name' => 'position',
                'type' => 'text',
                'instructions' => 'Enter the team member\'s position',
            ),
            array(
                'key' => 'field_linkedin',
                'label' => 'LinkedIn Profile',
                'name' => 'linkedin_profile',
                'type' => 'url',
                'instructions' => 'Enter the LinkedIn profile URL',
            ),
            array(
                'key' => 'field_profile_picture',
                'label' => 'Profile Picture',
                'name' => 'profile_picture',
                'type' => 'image',
                'instructions' => 'Upload the team member\'s profile picture',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'team_member',
                ),
            ),
        ),
    ));
}
?>
