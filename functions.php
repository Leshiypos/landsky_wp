<?php
require get_template_directory() . '/inc/redux-option-panel.php'; // Подключение редукс 
wp_add_inline_script( 'jquery', '$ = jQuery;' ); //Убираем ошибку с $ в JQuery
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function landsky_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on landsky, use a find and replace
		* to change 'landsky' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'landsky', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main_header' => 'Главное верхнее меню',
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'landsky_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);


	// Добавляем произвольные тумбы
	add_image_size( 'service_icon', 61, 61, true );
	add_image_size( 'works_thumb_w', 788, 486, true );
	add_image_size( 'works_thumb', 384, 486, true );
	add_image_size( 'parthners_thumb', 501, 725, true );
}
add_action( 'after_setup_theme', 'landsky_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function landsky_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'landsky_content_width', 640 );
}
add_action( 'after_setup_theme', 'landsky_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//WP-dev
/**
 * Enqueue scripts and styles.
 */
function landsky_scripts() {
	wp_enqueue_style( 'landsky-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'landsky-style', 'rtl', 'replace' );
	wp_enqueue_script( 'landsky-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'landsky-owlcarousel', get_template_directory_uri(  ).'/assets/js/owlcarousel/owl.carousel.min.css' , array(),  _S_VERSION );
	wp_enqueue_style( 'landsky-owlcarousel-default', get_template_directory_uri(  ).'/assets/js/owlcarousel/owl.theme.default.min.css' , array(),  _S_VERSION );
	wp_enqueue_style( 'landsky-main-style', get_template_directory_uri(  ).'/assets/css/styles.css' , array(),  _S_VERSION );
	wp_enqueue_style( 'landsky-heqdermain-style', get_template_directory_uri(  ).'/assets/css/header_main.css' , array(),  _S_VERSION );
	wp_enqueue_script( 'landsky-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array('jquery'), _S_VERSION, false );
	wp_enqueue_script( 'landsky-owlcarousel', get_template_directory_uri(  ).'/assets/js/owlcarousel/owl.carousel.min.js' , array('jquery'), _S_VERSION, false );
	wp_enqueue_script( 'landsky-validate', get_template_directory_uri(  ).'/assets/js/validate/jquery.validate.min.js' , array('jquery'), _S_VERSION, false );
	wp_enqueue_script( 'landsky-main-js', get_template_directory_uri(  ).'/assets/js/custom/main.js' , array('jquery'), _S_VERSION, false );
	wp_enqueue_style( 'landsky-fancyapps', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css' , array(),  _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'landsky_scripts' );

/*
 * Регистрируем постайп для Сервисов
 * */
add_action( 'init', 'landsky_register_custom_post_type' );
 
function landsky_register_custom_post_type() {
//Товары
   register_post_type( 'services', array(
	   'labels'             => array(
		   'name'                  => 'Сервисы',
		   'singular_name'         => 'Сервис',
		   'add_new'               => 'Добавить новый',
	   ),
	   'public'             => true,
	   'publicly_queryable' => true,
	   'show_ui'            => true,
	   'show_in_menu'       => true,
	   'query_var'          => true,
	   'rewrite'            => array( 'slug' => 'services' ),
	   'capability_type'    => 'post',
	   'has_archive'        => true,
	   'hierarchical'       => false,
	   'menu_position'      => 6,
	   'menu_icon'          => 'dashicons-list-view',
	   'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
   ) );


   //Команда
   register_post_type( 'team', array(
	   'labels'             => array(
		   'name'                  => 'Наша команда',
		   'singular_name'         => 'Наша команда',
		   'add_new'               => 'Добавить члена команды',
	   ),
	   'public'             => true,
	   'publicly_queryable' => true,
	   'show_ui'            => true,
	   'show_in_menu'       => true,
	   'query_var'          => true,
	   'rewrite'            => array( 'slug' => 'team' ),
	   'capability_type'    => 'post',
	   'has_archive'        => true,
	   'hierarchical'       => false,
	   'menu_position'      => 7,
	   'menu_icon'          => 'dashicons-groups',
	   'supports'           => array( 'title', 'editor', 'thumbnail'),
   ) );

  //Register Taxonomy
   register_taxonomy(
	   'profession',
	   'team',
	   array(
		   'label' => 'Профессия',
		   'rewrite' => array( 'slug' => 'profession' ),
		   'hierarchical' => false,
	   )
   );

	   //Партнеры
	   register_post_type( 'partners', array(
		   'labels'             => array(
			   'name'                  => 'Партнеры',
			   'singular_name'         => 'Партнер',
			   'add_new'               => 'Добавить партнера',
		   ),
		   'public'             => true,
		   'publicly_queryable' => true,
		   'show_ui'            => true,
		   'show_in_menu'       => true,
		   'query_var'          => true,
		   'rewrite'            => array( 'slug' => 'partners' ),
		   'capability_type'    => 'post',
		   'has_archive'        => true,
		   'hierarchical'       => false,
		   'menu_position'      => 8,
		   'menu_icon'          => 'dashicons-businessperson',
		   'supports'           => array( 'title', 'editor', 'thumbnail'),
	   ) );
   
	  //Register Taxonomy
	   register_taxonomy(
		   'activity',
		   'partners',
		   array(
			   'label' => 'Род деятельности',
			   'rewrite' => array( 'slug' => 'activity' ),
			   'hierarchical' => false,
		   )
	   );
	   //Register Taxonomy
	   register_taxonomy(
	   'location_partners',
	   'partners',
	   array(
		   'label' => 'Расположение',
		   'rewrite' => array( 'slug' => 'location_partners' ),
		   'hierarchical' => true,
	   )
   );

    //Работы
	register_post_type( 'works', array(
		'labels'             => array(
			'name'                  => 'Работы',
			'singular_name'         => 'работа',
			'add_new'               => 'Добавить работу',
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'works' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 9,
		'menu_icon'          => 'dashicons-hammer',
		'supports'           => array( 'title', 'editor', 'thumbnail'),
	) );

	//Register Taxonomy
	register_taxonomy(
	'location_works',
	'works',
	array(
		'label' => 'Расположение',
		'rewrite' => array( 'slug' => 'location_works' ),
		'hierarchical' => true,
	)
);

}



