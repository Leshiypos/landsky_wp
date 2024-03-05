<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> || <?php wp_title(); ?> </title>
	<?php wp_head(); ?>
</head>
<body <?php body_class('main_page'); ?>>
<header id="top">
<div class="wrap_header">
    <div class="top_header">
        <div class="logo"><a href="<?php bloginfo( 'home_url' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" >LandSky</a></div>
        <nav>
            <svg id="but_menu" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.125 13.125H1.875C0.839473 13.125 0 13.9645 0 15C0 16.0355 0.839473 16.875 1.875 16.875H28.125C29.1605 16.875 30 16.0355 30 15C30 13.9645 29.1605 13.125 28.125 13.125Z" fill="white"/>
                <path d="M1.875 8.12503H28.125C29.1605 8.12503 30 7.28556 30 6.25003C30 5.2145 29.1605 4.37503 28.125 4.37503H1.875C0.839473 4.37503 0 5.2145 0 6.25003C0 7.28556 0.839473 8.12503 1.875 8.12503Z" fill="white"/>
                <path d="M28.125 21.875H1.875C0.839473 21.875 0 22.7145 0 23.75C0 24.7855 0.839473 25.625 1.875 25.625H28.125C29.1605 25.625 30 24.7855 30 23.75C30 22.7145 29.1605 21.875 28.125 21.875Z" fill="white"/>
            </svg>
            <?php wp_nav_menu( [
                'menu'            => 'main_header',
                'container'       => false,
                'menu_class'      => 'main_menu',
                'echo'            => true,
                'fallback_cb'     => '',
                'depth'           => 1,
            ] ); ?>
        </nav>
    </div>
    <h1><?php the_field('title_h1'); ?></h1>
    <div class="button_header">
        <div class="button order" id="but_order"><a href="#">Заказать</a></div>
        <div class="button who"><a href="#about_as">Кто мы</a></div>
    </div>
</div>
</header>
