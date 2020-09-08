<?php
/**
 * Global Reporting Centre functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Global_Reporting_Centre
 */

if ( ! function_exists( 'global_reporting_centre_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function global_reporting_centre_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Global Reporting Centre, use a find and replace
		 * to change 'global-reporting-centre' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'global-reporting-centre', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'global-reporting-centre' ),
            'footer'  => esc_html__( 'Footer', 'global-reporting-centre' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'global_reporting_centre_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add theme support to change the Gutenberg editor's styles
        add_theme_support('editor-styles');
        add_editor_style( 'css/editor.css' );

}
endif;
add_action( 'after_setup_theme', 'global_reporting_centre_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function global_reporting_centre_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'global_reporting_centre_content_width', 1280 );
}
add_action( 'after_setup_theme', 'global_reporting_centre_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function global_reporting_centre_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary', 'global-reporting-centre' ),
		'id'            => 'primary',
    ) );
}
add_action( 'widgets_init', 'global_reporting_centre_widgets_init' );

add_action( 'init', 'people_post_type' );
// Register Custom Post Type for People
function people_post_type() {

	$labels = array(
		'name'                  => 'People',
		'singular_name'         => 'Person',
		'menu_name'             => 'People',
		'name_admin_bar'        => 'People',
		'archives'              => 'People Archive',
		'attributes'            => 'People Attributes',
		'parent_item_colon'     => 'Person',
		'all_items'             => 'All People',
		'add_new_item'          => 'Add Person',
		'add_new'               => 'Add Person',
		'new_item'              => 'New Person',
		'edit_item'             => 'Edit Person',
		'update_item'           => 'Update Person',
		'view_item'             => 'View Person',
		'view_items'            => 'View People',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Person',
		'description'           => 'People',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
        'can_export'            => true,
		'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true,
	);
	register_post_type( 'people', $args );
}

add_action( 'init', 'podcast_post_type' );
// Register custom post type for podcast episodes
function podcast_post_type() {
  $labels = array(
    'name'                  => _x( 'Podcast Episodes', 'Post type general name', 'podcast' ),
    'singular_name'         => _x( 'Episode', 'Post type singular name', 'podcast' ),
    'menu_name'             => _x( 'Podcasts', 'Admin Menu text', 'podcast' ),
    'name_admin_bar'        => _x( 'Episode', 'Add New on Toolbar', 'podcast' ),
    'add_new'               => __( 'Add New', 'podcast' ),
    'add_new_item'          => __( 'Add new episode', 'podcast' ),
    'new_item'              => __( 'New episode', 'podcast' ),
    'edit_item'             => __( 'Edit episode', 'podcast' ),
    'view_item'             => __( 'View episode', 'podcast' ),
    'all_items'             => __( 'Episodes', 'podcast' ),
  );
  $args = array(
    'labels'             => $labels,
    'description'        => 'Syllabus custom post type',
    'menu_icon'          => 'dashicons-format-chat',
    'public'             => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => false,
    'rewrite'            => false,
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions', 'excerpt' ),
    'show_in_rest'       => true,
    'rewrite' => array( 'slug' => '/on-chinas-new-silk-road-podcast')
  );
  register_post_type( 'podcast', $args );
}

add_filter( 'enter_title_here', 'custom_enter_title' );

// Instead of displaying "Add Title" in WP Editor, display "Name of person"
function custom_enter_title( $input ) {
    global $post_type;
    if ( 'people' === $post_type ) {
        return __( 'Name of person', 'global-reporting-centre' );
    }
    return $input;
}

// Exclude posts that are in the "Exclude from Home" category
function excludeCat($query) {
    if ( $query->is_home() ) {
        $query->set('cat', '-18');
    }
    return $query;
    }
add_filter('pre_get_posts', 'excludeCat');

// Add a class to the prev/next page of posts buttons
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button primary"';
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
    function custom_excerpt_length( $length ) {
    return 34; // Length of the excerpt in number of words
}

//change admin login screen styles
function my_login_logo() { ?>

    <style type="text/css">
        body.login div#login h1 a {
            background-image: url('https://globalreportingcentre.org/wp-content/uploads/2020/06/global_reporting_centre_logo.svg');
            background-size: 76%;
            width: 100%;
            height: 86px;
            margin: 0;
        }
        body.login h1 {
        	padding: 15px;
        }
        body.login {
            background: linear-gradient(to left, #614385, #161616);
        }
        .login #backtoblog a, .login #nav a {
        	color: #fff !important;
        }

    </style>

<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return "Global Reporting Centre";
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
 * Enqueue scripts and styles.
 */
function global_reporting_centre_scripts() {
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Vollkorn');
    wp_enqueue_style('fa-solid', 'https://use.fontawesome.com/releases/v5.7.2/css/solid.css');
    wp_enqueue_style('fa-brands', 'https://use.fontawesome.com/releases/v5.7.2/css/brands.css');
    wp_enqueue_style('fa-core', 'https://use.fontawesome.com/releases/v5.7.2/css/fontawesome.css');

    wp_enqueue_style( 'global-reporting-centre-style', get_stylesheet_uri() );
	wp_enqueue_script( 'global-reporting-centre-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    wp_enqueue_script( 'global-reporting-centre-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if(is_front_page()) {
		wp_enqueue_script('owl-js', get_template_directory_uri() . '/carousel/owl.carousel.min.js', array('jquery'), false, true);
		wp_enqueue_style('owl-css', get_template_directory_uri() . '/carousel/owl.carousel.css');
		wp_enqueue_script('owl-init', get_template_directory_uri() . '/carousel/owl-init.js', array('owl-js'), false, true);
    }

    if ( is_page('contact') ) {
        wp_enqueue_script('contact-selector', get_template_directory_uri() . '/js/contact-selector.js', array('jquery'), false, true);
    }

    if ( is_page('people') ) {
        wp_enqueue_script('people-selector', get_template_directory_uri() . '/js/people-selector.js', array('jquery'), false, true);
    }

    if ( is_page('vancouver-institute') || is_page('about') ) {
        wp_enqueue_script('collapser', get_template_directory_uri() . '/js/collapser.js', array('jquery'), false, true);
    }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'global_reporting_centre_scripts' );

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

