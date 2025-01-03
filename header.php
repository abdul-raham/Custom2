<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <!-- WordPress Head Hook -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Site Title -->
                <a href="<?php echo esc_url(home_url()); ?>" class="text-white h4 mb-0">
                    <?php bloginfo('name'); ?>
                </a>
                <!-- Navigation Menu -->
                <nav>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'navbar-nav d-flex justify-content-end mb-0',
                        'container'      => false,
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </header>
