<?php
/**
 * Only Sky WP functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package onlysky_wp_framework
 */

if ( ! function_exists( 'onlysky_wp_framework_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function onlysky_wp_framework_setup() {

		/*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Only Sky WP, use a find and replace
        * to change 'onlysky_wp_framework' to the name of your theme in all the template files.
        */
		load_theme_textdomain( 'onlysky_wp_framework', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Primary Menu', 'onlysky_wp_framework' ),
			'home_quick_nav' => esc_html__( 'Homepage Quick Navigation Menu', 'onlysky_wp_framework' )
			)
		);

		/*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
		add_theme_support(
			'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			)
		);

		/*
        * Enable support for Post Formats.
        * See https://developer.wordpress.org/themes/functionality/post-formats/
        */
		add_theme_support(
			'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
				'onlysky_wp_framework_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
				)
			)
		);
	}
endif; // onlysky_wp_framework_setup
add_action( 'after_setup_theme', 'onlysky_wp_framework_setup' );


/**
 * 
 * Editable 404 Page
 * 
 */
// Insert a privately published page we can query for our 404 page
function create_404_page() {

  // Check if the 404 page exists
	$page_exists = get_page_by_title( '404' );

	if (!isset($page_exists->ID)) {

		// Page array
		$page = array(
			'post_author' => 1,
			'post_content' => '',
			'post_name' =>  '404',
			'post_status' => 'private',
			'post_title' => '404',
			'post_type' => 'page',
			'post_parent' => 0,
			'menu_order' => 0,
			'to_ping' =>  '',
			'pinged' => '',
		);

		$insert = wp_insert_post($page);

		// The insert was successful
		if ($insert) {
			// Store the value of our 404 page
			update_option( '404pageid', (int) $insert );
		}
	}

}
add_action('after_setup_theme', 'create_404_page');

/**
 * 
 * Adjusts Advanced Custom Fields edit page ordering
 * 
 */

function prefix_reset_metabox_positions(){
  delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_post' );
  delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_page' );
  delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_custom_post_type' );
}
add_action( 'admin_init', 'prefix_reset_metabox_positions' );

/**
 * 
 * Adjust Rewrite Rules for post categories
 *
 * Usage: 
 * Set Permalink settings to Custom Structure: "/%category%/%postname%/"
 * Set Category Base to "."
 * 
 */
function onlysky_wp_framework_filter_category_rewrite_rules( $rules ) {
    $categories = get_categories( array( 'hide_empty' => false ) );

    if ( is_array( $categories ) && ! empty( $categories ) ) {
        $slugs = array();
        foreach ( $categories as $category ) {
            if ( is_object( $category ) && ! is_wp_error( $category ) ) {
                if ( 0 == $category->category_parent ) {
                    $slugs[] = $category->slug;
                } else {
                    $slugs[] = trim( get_category_parents( $category->term_id, false, '/', true ), '/' );
                }
            }
        }

        if ( ! empty( $slugs ) ) {
            $rules = array();

            foreach ( $slugs as $slug ) {
                $rules[ '(' . $slug . ')/feed/(feed|rdf|rss|rss2|atom)?/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
                $rules[ '(' . $slug . ')/(feed|rdf|rss|rss2|atom)/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
                $rules[ '(' . $slug . ')(/page/(\d)+/?)?$' ] = 'index.php?category_name=$matches[1]&paged=$matches[3]';
            }
        }
    }
    return $rules;
}
add_filter( 'category_rewrite_rules', 'onlysky_wp_framework_filter_category_rewrite_rules' );

/**
 * 
 * Remove <p> tags from around category descriptions
 *
 * Usage: <?php echo category_description(); ?> in template
 * 
 */
function onlysky_wp_framework_custom_archive_description($description) {

	$remove = array( '<p>', '</p>' );

	$description = str_replace( $remove, "", $description );

	return $description;
}
add_filter( 'category_description', 'onlysky_wp_framework_custom_archive_description' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onlysky_wp_framework_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'onlysky_wp_framework_content_width', 640 );
}
add_action( 'after_setup_theme', 'onlysky_wp_framework_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function onlysky_wp_framework_widgets_init() {
	// Page Sidebar
	register_sidebar(
		array(
		'name'          => esc_html__( 'Page Sidebar', 'onlysky_wp_framework' ),
		'id'            => 'page-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		)
	);

	// Post Sidebar
	register_sidebar(
		array(
		'name'          => esc_html__( 'Posts Sidebar', 'onlysky_wp_framework' ),
		'id'            => 'post-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		)
	);

	// News/Blog Sidebar
	register_sidebar(
		array(
		'name'          => esc_html__( 'News Index Sidebar', 'onlysky_wp_framework' ),
		'id'            => 'index-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		)
	);

	// Footer Top Sidebar
	register_sidebar(
		array(
		'name'          => esc_html__( 'Footer Top', 'onlysky_wp_framework' ),
		'id'            => 'footer-top-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		)
	);

	// Footer Bottom Sidebar
	register_sidebar(
		array(
		'name'          => esc_html__( 'Footer Bottom', 'onlysky_wp_framework' ),
		'id'            => 'footer-bottom-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget widget-footer %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'onlysky_wp_framework_widgets_init' );


/**
 * Enqueue Styles
 */


/*Load css into the website's front-end*/
function onlysky_wp_framework_enqueue_style() {

	// Load Theme info
	wp_enqueue_style( 'theme-info', get_stylesheet_uri() );

	// Load Stylesheet
	wp_enqueue_style( 'styles', get_template_directory_uri() .  '/css/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'onlysky_wp_framework_enqueue_style' );


/*Load css into the admin pages*/
function onlysky_wp_framework_enqueue_options_style() {
	wp_enqueue_style( 'onlysky_wp_framework-options-style', get_template_directory_uri() . '/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'onlysky_wp_framework_enqueue_options_style' );

/*Load css into the login page*/
function onlysky_wp_framework_enqueue_login_style() {
	wp_enqueue_style( 'onlysky_wp_framework-options-style', get_template_directory_uri() . '/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'onlysky_wp_framework_enqueue_login_style' );

/**
 * Remove Page Attributes & Hero Show for Homepage
 */
function onlysky_wp_framework_remove_homepage_attribute_meta_box(){
    
    global $post_ID, $post_type;

    if ( empty ( $post_ID ) or 'page' !== $post_type ) {
    	return;
    }
  
    if ( $post_ID === (int) get_option( 'page_on_front' ) ){
    	//remove_meta_box('pageparentdiv', 'page', 'normal');
    	echo "<style>#pageparentdiv, .acf-field-563a80a1cceb3 {display:none !important;}</style>";
    }
}
add_action( 'edit_form_after_title', 'onlysky_wp_framework_remove_homepage_attribute_meta_box' );


/**
 *  Remove WP Page Widgets section from page templates with no sidebars, and some specific pages
 */
/*
function onlysky_wp_framework_remove_page_widget_box()
{
	$post_id = ( isset($_GET['post']) ) ? intval($_GET['post']) : intval($_POST['post_ID']);
	$template_file = get_post_meta( $post_id, '_wp_page_template', TRUE );
	echo $template_file;

    if ($template_file == 'template-full-width.php') {
    	remove_meta_box( 'pw-widgets',  'page', 'advanced');
    }
// $post_id in_array('149, 21, 70')
}
add_action( 'admin_init' , 'onlysky_wp_framework_remove_page_widget_box');
*/

/**
 * Enqueue scripts
 */
function onlysky_wp_framework_scripts() {
	
	//!TODO - Move this over to concated scripts and vendor scripts that come from bower

	// Locations Page
	//wp_enqueue_script( 'onlysky_wp_framework-locations', get_template_directory_uri() . '/js/jquery.responsiveiframe.js', array('jquery'), '1.1', true );
	//wp_enqueue_script( 'onlysky_wp_framework-locations', '/wp-content/plugins/advanced-iframe/js/ai_external.js', array('jquery'), '1.1', true );

	wp_enqueue_script( 'onlysky_wp_framework-iframeresizer', get_template_directory_uri() . '/js/iframeResizer.min.js', array('jquery'), '1.1', true );
	wp_enqueue_script( 'onlysky_wp_framework-locations', get_template_directory_uri() . '/js/locations.js', array('jquery'), '1.1', true );


	
	// Menu Navigation
	wp_enqueue_script( 'onlysky_wp_framework-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '1.1', true );

	wp_enqueue_script( 'onlysky_wp_framework-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '1.1', true );

	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.min.js', array('jquery'), '1.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'onlysky_wp_framework_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';
