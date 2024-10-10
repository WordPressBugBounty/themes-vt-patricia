<?php
/**
 * Patricia functions and definitions
 *
 * @package vt-patricia
 */
 
/**
 * Set the theme version, based on theme stylesheet.
 *
 * @global string $vt_patricia_theme_version
 */
function vt_patricia_theme_version_info() {
	$vt_patricia_theme_info = wp_get_theme();
	$GLOBALS['vt_patricia_theme_version'] = $vt_patricia_theme_info->get( 'Version' );
}
add_action( 'after_setup_theme', 'vt_patricia_theme_version_info', 0 );

define('VT_PATRICIA_LIBS_URI', get_template_directory_uri() . '/libs/');
define('VT_PATRICIA_CORE_PATH', get_template_directory() . '/core/');
define('VT_PATRICIA_CORE_URI', get_template_directory_uri() . '/core/');
define('VT_PATRICIA_CORE_FUNCTIONS', VT_PATRICIA_CORE_PATH . 'functions/');
define('VT_PATRICIA_CORE_CUSTOMIZER', VT_PATRICIA_CORE_PATH . 'customizer/');
define('VT_PATRICIA_CORE_WIDGETS', VT_PATRICIA_CORE_PATH . 'widgets/');

// Theme setup
add_action('after_setup_theme', 'vt_patricia_setup');
function vt_patricia_setup() {
	
	// Set Content Width
	if ( ! isset( $content_width ) ) { $content_width = 1140; }
	
	// Translations can be filed in the /languages/ directory.
    load_theme_textdomain( 'vt-patricia', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	
	// Enable support for customizer selective refresh.
	add_theme_support( 'customize-selective-refresh-widgets' );
		
	/* Enable support for Post Thumbnails on posts and pages */
	add_theme_support('post-thumbnails');
	add_image_size( 'vt_patricia_blog_post', 850 );
	add_image_size( 'vt_patricia_grid_post', 500, 352, true );
	add_image_size( 'vt_patricia_widget_thumb', 75, 75, true );
	add_image_size( 'vt_patricia_related_posts', 280, 197, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__('Primary menu', 'vt-patricia')
    ));
	
	/* Add callback for custom TinyMCE editor stylesheets. (editor-style.css) */
	add_editor_style('editor-style.css');

	// Enable support for Post Formats.
	add_theme_support('post-formats', array('image', 'video', 'audio', 'gallery'));
	
	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vt_patricia_custom_background_args', array(
		'default-color' => 'f9f9f9',
		'default-image' => '',
	) ) );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
	
	// Custom logo
	add_theme_support( 'custom-logo', array(
	   'height'      => 175,
	   'width'       => 400,
	   'flex-height' => true,
	   'flex-width'  => true,
	   'header-text' => array( 'site-title', 'site-description' ),
	) );
	
}

// Register & Enqueue Styles / Scripts
add_action('wp_enqueue_scripts', 'vt_patricia_load_scripts');
function vt_patricia_load_scripts() {
	
	global $vt_patricia_theme_version;
	
    // CSS
    wp_enqueue_style('bootstrap', VT_PATRICIA_LIBS_URI . 'bootstrap/css/bootstrap.min.css', array(), '4.4.1' );
    wp_enqueue_style('font-awesome', VT_PATRICIA_LIBS_URI . 'font-awesome/css/all.min.css', array(), '6.5.1' );
    wp_enqueue_style('chosen', VT_PATRICIA_LIBS_URI . 'chosen/chosen.min.css', array(), '1.6.2' );
	wp_enqueue_style('owl-carousel', VT_PATRICIA_LIBS_URI . 'owl/owl.carousel.min.css', array(), '2.3.4' );
	wp_enqueue_style('patricia-style', get_stylesheet_uri(), array(), esc_attr( $vt_patricia_theme_version) );

    // JS
	wp_enqueue_script('fitvids', VT_PATRICIA_LIBS_URI . 'fitvids/fitvids.js', array(), '1.1', true );
	wp_enqueue_script('owl-carousel', VT_PATRICIA_LIBS_URI . 'owl/owl.carousel.min.js', array(), '2.3.4', true );
    wp_enqueue_script('chosen', VT_PATRICIA_LIBS_URI . 'chosen/chosen.jquery.js', array(), '1.6.2', true );
	wp_enqueue_script('modal-accessibility', get_template_directory_uri() . '/assets/js/modal-accessibility.js', array(), '1.0', true );
	
	// Sticky sidebar
    if ( get_theme_mod( 'vt_patricia_sticky_sidebar', '1' ) == '1' ) {
		wp_enqueue_script('theia-sticky-sidebar', VT_PATRICIA_LIBS_URI . 'theia/theia-sticky-sidebar.min.js', array(), '1.7.0', true );
		wp_enqueue_script('sticky-sidebar', get_template_directory_uri() . '/assets/js/sticky-sidebar.js', array(), '', true ); 
	}
	wp_enqueue_script('jquery'); // default Scripts Included and Registered by WordPress
	wp_enqueue_script('patricia-scripts', get_template_directory_uri() . '/assets/js/patricia-scripts.js', array(), '', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script('comment-reply');
    }
}

// Load Google fonts
function vt_patricia_google_fonts_url() {
    $fonts_url = '';
    $Karla = _x( 'on', 'Karla font: on or off', 'vt-patricia' );
    $BarlowCondensed = _x( 'on', 'Barlow Condensed font: on or off', 'vt-patricia' );    

    if ( 'off' !== $BarlowCondensed || 'off' !== $Karla )
    {
        $font_families = array();

        if ('off' !== $BarlowCondensed) {
            $font_families[] = 'Barlow Condensed:400,700';
        }
        
        if ('off' !== $Karla) {
            $font_families[] = 'Karla:400,700';
        }

        $query_args = array(
            'family' => urlencode(implode('|', $font_families )),
            'subset' => urlencode('latin,latin-ext')
        );

        $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css' );
    }

    return esc_url_raw($fonts_url);
}

// Google fonts
function vt_patricia_enqueue_googlefonts() {
    wp_enqueue_style( 'patricia-googlefonts', vt_patricia_google_fonts_url(), array(), null );
}
add_action('wp_enqueue_scripts', 'vt_patricia_enqueue_googlefonts');

/* Add Admin stylesheet to the admin page */
function vt_patricia_selectively_enqueue_admin_script( $hook ) {
	if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_style( 'patricia-adminstyle', get_template_directory_uri() . '/assets/css/style-admin.css' );
}
add_action( 'admin_enqueue_scripts', 'vt_patricia_selectively_enqueue_admin_script' );

/**
 * Enqueue custom customizer styling.
 */
function vt_patricia_load_customizer_script() {
    wp_enqueue_style( 'patricia-customizer-css', get_template_directory_uri() . '/core/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'vt_patricia_load_customizer_script' );

// Sidebar Widgets
function vt_patricia_widgets_init() {
	register_sidebar(array(
		'name'          => __( 'Sidebar', 'vt-patricia' ),
		'id'              => 'sidebar-1',
		'before_widget'   => '<div id="%1$s" class="widget %2$s">',
		'after_widget'    => '</div>',
		'before_title'    => '<h4 class="widget-title">',
		'after_title'     => '</h4>'
	));
}
add_action( 'widgets_init', 'vt_patricia_widgets_init' );

// WooCommerce Plugin Support
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/woocommerce/woocommerce.php';
}

function vt_patricia_require_file( $path ) {
    if ( file_exists($path) ) {
        require $path;
    }
}

// Require core files
vt_patricia_require_file( get_template_directory() . '/core/init.php' );