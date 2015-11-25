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
			//'primary' => esc_html__( 'Primary Menu', 'onlysky_wp_framework' ),
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
		/*
		add_theme_support(
			'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			)
		);
		*/

		// Set up the WordPress core custom background feature.
		/*
		add_theme_support(
			'custom-background', apply_filters(
				'onlysky_wp_framework_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
				)
			)
		);
		*/
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
 * Widget title links
 *
 * Source: http://spicemailer.com/wordpress/how-to-link-widget-titles-in-wordpress-without-using-a-plugin/
 *
 * Usage:  [link href = http://google.com]My Widget Title[/link]
 * 
 */

function onlysky_wp_framework_accept_html_widget_title( $mytitle ) { 
  // The sequence of String Replacement is important!!
  
	$mytitle = str_replace( '[link', '<a', $mytitle );
	$mytitle = str_replace( '[/link]', '</a>', $mytitle );
    $mytitle = str_replace( ']', '>', $mytitle );
	

	return $mytitle;
}

add_filter( 'widget_title', 'onlysky_wp_framework_accept_html_widget_title' );

/**
 * 
 * Adjusts Advanced Custom Fields edit page ordering
 * 
 */

function onlysky_wp_framework_prefix_reset_metabox_positions(){
  delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_post' );
  delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_page' );
  delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_custom_post_type' );
}
add_action( 'admin_init', 'onlysky_wp_framework_prefix_reset_metabox_positions' );

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
 * Pretty Search URL
 *
 * Source: http://wpengineer.com/2258/change-the-search-url-of-wordpress/
 * 
 */

function onlysky_wp_framework_search_url_rewrite() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
		exit();
	}	
}
add_action( 'template_redirect', 'onlysky_wp_framework_search_url_rewrite' );


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
	// Main Menu Sidebar
	register_sidebar(
		array(
		'name'          => esc_html__( 'Main Menu', 'onlysky_wp_framework' ),
		'id'            => 'menu-sidebar',
		'description'   => 'The widget area for the main menu',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		)
	);

	// Page Sidebar
	register_sidebar(
		array(
		'name'          => esc_html__( 'Page Sidebar', 'onlysky_wp_framework' ),
		'id'            => 'page-sidebar',
		'description'   => 'The sidebar for pages',
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
		'description'   => 'The sidebar displayed for posts',
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
		'description'   => 'Sidebar for News section and category index',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		)
	);

	// Footer Sidebar
	register_sidebar(
		array(
		'name'          => esc_html__( 'Footer', 'onlysky_wp_framework' ),
		'id'            => 'footer-sidebar',
		'description'   => 'Footer Widget Area',
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

	// Jquery UI slider
	//wp_enqueue_style( 'jquery-ui-slider', get_template_directory_uri() .  '/js/vendor/jquery-ui-slider-only/jquery-ui.min.css' );
	wp_enqueue_style( 'jquery-noui-slider', get_template_directory_uri() .  '/js/vendor/noui-slider/nouislider.min.css' );
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
 * 
 * Bourbon Neat Column Shortcode
 *
 * Source: https://gist.github.com/evantravers/5601961df325167b7ca5
 */

function onlysky_wp_framework_column_func( $atts, $content="" ) {
	$divclass = "col";

	if ($atts != "") {
	  $divclass = "col-" . $atts['number'];
	}
	else {
		$divclass = "col-default";
	}

	return "<div class='" . $divclass . "'>" . $content . "</div>";

}
add_shortcode( 'column', 'onlysky_wp_framework_column_func' );

/**
 * 
 * Button Shortcode
 *
 * Source: http://www.wpexplorer.com/wordpress-button-shortcode/
 */
function onlysky_wp_framework_button($atts, $content = null) {
	extract( shortcode_atts( array(
	      'url' => '#',
	      'type' => 'primary',
	      'title' => '',
	      'id' => '',
	      'class' => ''
	), $atts ) );
	return '<a href="'.$url.'" id="'.$id.'" title="'.$title.'" class="button '.$type.' '.$class.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'onlysky_wp_framework_button');

/**
 * 
 * Content Box Shortcode
 *
 * Source: http://www.wpexplorer.com/wordpress-button-shortcode/
 */
function onlysky_wp_framework_content_box($atts, $content = null) {
	extract( shortcode_atts( array(
	      'color' => 'blue',
	), $atts ) );
	return '<div class="content-box content-box-'.$color.'">' . do_shortcode($content) . '</div>';
}
add_shortcode('content_box', 'onlysky_wp_framework_content_box');

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


/*
 * Custom Gravity Forms Password Field Validation
 *
 * source: http://wpthemetutorial.com/2012/01/12/advanced-password-checking-with-gravity-forms/
 *
 */
/*
function onlysky_wp_framework_password_length_and_characters( $validation_result ){
 
  // checking now to make sure the passwords match the requirements
  // for length and that we only have upper and lower case letters
  // and numbers
  if( !preg_match( "/^[a-zA-Z0-9]{4,16}$/", $_POST['input_7'] ) ){
 
    // marking the whole thing as not valid
    $validation_result['is_valid'] = false;
 
      // looping through our fields and marking the failed ones
      foreach( $validation_result['form']['fields'] as &$field ){
 
      // if 17 or 16 mark as not valid
      if( $field['id'] == '7' || $field['id'] == '8' ){
 
          $field['failed_validation'] = true;
          $field['validation_message'] = 'Your password needs to be between 4 and 16 characters and can only contain upper and lower case letters and numbers.';
 
      }
 
    }
 
  }
 
  return $validation_result;
 
}
add_filter( 'gform_validation_3', 'onlysky_wp_framework_password_length_and_characters' );
*/

/**
 *  Add Password Fields to Gravity Forms
 */
add_filter( 'gform_enable_password_field', '__return_true' );


/**
 *  Add CC Fields to Gravity Forms
 */
add_filter( 'gform_enable_credit_card_field', 'enable_creditcard', 11 );
function enable_creditcard( $is_enabled ) {
    return true;
}

/**
 *  Gravity Forms Validation Helpers
 */

/**
* Gravity Wiz // Require Minimum Character Limit for Gravity Forms
* 
* Adds support for requiring a minimum number of characters for text-based Gravity Form fields.
* 
* @version	 1.0
* @author    David Smith <david@gravitywiz.com>
* @license   GPL-2.0+
* @link      http://gravitywiz.com/...
* @copyright 2013 Gravity Wiz
*/
class GW_Minimum_Characters {
    
    public function __construct( $args = array() ) {
        
        // make sure we're running the required minimum version of Gravity Forms
        if( ! property_exists( 'GFCommon', 'version' ) || ! version_compare( GFCommon::$version, '1.7', '>=' ) )
            return;
    	
    	// set our default arguments, parse against the provided arguments, and store for use throughout the class
    	$this->_args = wp_parse_args( $args, array( 
    		'form_id' => false,
    		'field_id' => false,
    		'min_chars' => 0,
            'max_chars' => false,
            'validation_message' => false,
            'min_validation_message' => __( 'Please enter at least %s characters.' ),
            'max_validation_message' => __( 'You may only enter %s characters.' )
    	) );
    	
        extract( $this->_args );
        
        if( ! $form_id || ! $field_id || ! $min_chars )
            return;
        
    	// time for hooks
    	add_filter( "gform_field_validation_{$form_id}_{$field_id}", array( $this, 'validate_character_count' ), 10, 4 );
        
    }
    
    public function validate_character_count( $result, $value, $form, $field ) {
        $char_count = strlen( $value );
        $is_min_reached = $this->_args['min_chars'] !== false && $char_count >= $this->_args['min_chars'];
        $is_max_exceeded = $this->_args['max_chars'] !== false && $char_count > $this->_args['max_chars'];
        if( ! $is_min_reached ) {
            $message = $this->_args['validation_message'];
            if( ! $message )
                $message = $this->_args['min_validation_message'];
            $result['is_valid'] = false;
            $result['message'] = sprintf( $message, $this->_args['min_chars'] );
        } else if( $is_max_exceeded ) {
            $message = $this->_args['max_validation_message'];
            if( ! $message )
                $message = $this->_args['validation_message'];
            $result['is_valid'] = false;
            $result['message'] = sprintf( $message, $this->_args['max_chars'] );
        }
        
        return $result;
    }
    
}

// eServices Form Username
new GW_Minimum_Characters( array( 
    'form_id' => 3,
    'field_id' => 8,
    'min_chars' => 8,
    'max_chars' => 15,
    'min_validation_message' => __( 'Please enter at least %s characters.' ),
    'max_validation_message' => __( 'Please enter only up to %s characters.' )
) );

// eServices Form Password
new GW_Minimum_Characters( array( 
    'form_id' => 3,
    'field_id' => 25,
    'min_chars' => 6,
    'min_validation_message' => __( 'Please enter at least %s characters.' )
) );

// eServices Form Pin
add_filter( 'gform_field_validation_3_26', 'gravity_eservices_pin', 10, 4 );
function gravity_eservices_pin( $result, $value, $form, $field ) {

    
    if(!preg_match('~^\d+$~', $value)){
        $result["is_valid"] = false;
        $result["message"] = "Only numbers are allowed. Please enter a 4 digit number.";
    }
    /*
    if ( $result['is_valid'] && intval( $value ) > 4 ) {
        $result['is_valid'] = false;
        $result['message'] = 'Please enter a 4 digit number';
    }
    elseif( $result['is_valid'] && intval( $value ) < 4 ) {
        $result['is_valid'] = false;
        $result['message'] = 'Please enter a 4 digit number';
    }
    */
    return $result;
}

new GW_Minimum_Characters( array( 
    'form_id' => 3,
    'field_id' => 26,
    'min_chars' => 4,
    'max_chars' => 4,
    'min_validation_message' => __( 'Please enter a 4 digit number.' ),
    'max_validation_message' => __( 'Please enter a 4 digit number.' )
) );


/**
* Merge Tags as Dynamic Population Parameters
* http://gravitywiz.com/dynamic-products-via-post-meta/
*/
add_filter('gform_pre_render', 'gw_prepopluate_merge_tags');
function gw_prepopluate_merge_tags($form) {
    
    $filter_names = array();
    
    foreach($form['fields'] as &$field) {
        
        if(!rgar($field, 'allowsPrepopulate'))
            continue;
        
        // complex fields store inputName in the "name" property of the inputs array
        if(is_array(rgar($field, 'inputs')) && $field['type'] != 'checkbox') {
            foreach($field['inputs'] as $input) {
                if(rgar($input, 'name'))
                    $filter_names[] = array('type' => $field['type'], 'name' => rgar($input, 'name'));
            }
        } else {
            $filter_names[] = array('type' => $field['type'], 'name' => rgar($field, 'inputName'));
        }
        
    }
    
    foreach($filter_names as $filter_name) {
        
        $filtered_name = GFCommon::replace_variables_prepopulate($filter_name['name']);
        
        if($filter_name['name'] == $filtered_name)
            continue;
        
        add_filter("gform_field_value_{$filter_name['name']}", create_function("", "return '$filtered_name';"));
    }
    
    return $form;
}


/**
* Better Pre-submission Confirmation
* http://gravitywiz.com/2012/08/04/better-pre-submission-confirmation/
*/
class GWPreviewConfirmation {

    private static $lead;

    public static function init() {
        add_filter( 'gform_pre_render', array( __class__, 'replace_merge_tags' ) );
    }

    public static function replace_merge_tags( $form ) {

        $current_page = isset(GFFormDisplay::$submission[$form['id']]) ? GFFormDisplay::$submission[$form['id']]['page_number'] : 1;
        $fields = array();

        // get all HTML fields on the current page
        foreach($form['fields'] as &$field) {

            // skip all fields on the first page
            if(rgar($field, 'pageNumber') <= 1)
                continue;

            $default_value = rgar($field, 'defaultValue');
            preg_match_all('/{.+}/', $default_value, $matches, PREG_SET_ORDER);
            if(!empty($matches)) {
                // if default value needs to be replaced but is not on current page, wait until on the current page to replace it
                if(rgar($field, 'pageNumber') != $current_page) {
                    $field['defaultValue'] = '';
                } else {
                    $field['defaultValue'] = self::preview_replace_variables($default_value, $form);
                }
            }

            // only run 'content' filter for fields on the current page
            if(rgar($field, 'pageNumber') != $current_page)
                continue;

            $html_content = rgar($field, 'content');
            preg_match_all('/{.+}/', $html_content, $matches, PREG_SET_ORDER);
            if(!empty($matches)) {
                $field['content'] = self::preview_replace_variables($html_content, $form);
            }

        }

        return $form;
    }

    /**
    * Adds special support for file upload, post image and multi input merge tags.
    */
    public static function preview_special_merge_tags($value, $input_id, $merge_tag, $field) {
        
        // added to prevent overriding :noadmin filter (and other filters that remove fields)
        if( ! $value )
            return $value;
        
        $input_type = RGFormsModel::get_input_type($field);
        
        $is_upload_field = in_array( $input_type, array('post_image', 'fileupload') );
        $is_multi_input = is_array( rgar($field, 'inputs') );
        $is_input = intval( $input_id ) != $input_id;
        
        if( !$is_upload_field && !$is_multi_input )
            return $value;

        // if is individual input of multi-input field, return just that input value
        if( $is_input )
            return $value;
            
        $form = RGFormsModel::get_form_meta($field['formId']);
        $lead = self::create_lead($form);
        $currency = GFCommon::get_currency();

        if(is_array(rgar($field, 'inputs'))) {
            $value = RGFormsModel::get_lead_field_value($lead, $field);
            return GFCommon::get_lead_field_display($field, $value, $currency);
        }

        switch($input_type) {
        case 'fileupload':
            $value = self::preview_image_value("input_{$field['id']}", $field, $form, $lead);
            $value = self::preview_image_display($field, $form, $value);
            break;
        default:
            $value = self::preview_image_value("input_{$field['id']}", $field, $form, $lead);
            $value = GFCommon::get_lead_field_display($field, $value, $currency);
            break;
        }

        return $value;
    }

    public static function preview_image_value($input_name, $field, $form, $lead) {

        $field_id = $field['id'];
        $file_info = RGFormsModel::get_temp_filename($form['id'], $input_name);
        $source = RGFormsModel::get_upload_url($form['id']) . "/tmp/" . $file_info["temp_filename"];

        if(!$file_info)
            return '';

        switch(RGFormsModel::get_input_type($field)){

            case "post_image":
                list(,$image_title, $image_caption, $image_description) = explode("|:|", $lead[$field['id']]);
                $value = !empty($source) ? $source . "|:|" . $image_title . "|:|" . $image_caption . "|:|" . $image_description : "";
                break;

            case "fileupload" :
                $value = $source;
                break;

        }

        return $value;
    }

    public static function preview_image_display($field, $form, $value) {

        // need to get the tmp $file_info to retrieve real uploaded filename, otherwise will display ugly tmp name
        $input_name = "input_" . str_replace('.', '_', $field['id']);
        $file_info = RGFormsModel::get_temp_filename($form['id'], $input_name);

        $file_path = $value;
        if(!empty($file_path)){
            $file_path = esc_attr(str_replace(" ", "%20", $file_path));
            $value = "<a href='$file_path' target='_blank' title='" . __("Click to view", "gravityforms") . "'>" . $file_info['uploaded_filename'] . "</a>";
        }
        return $value;

    }

    /**
    * Retrieves $lead object from class if it has already been created; otherwise creates a new $lead object.
    */
    public static function create_lead( $form ) {
        
        if( empty( self::$lead ) ) {
            self::$lead = GFFormsModel::create_lead( $form );
            self::clear_field_value_cache( $form );
        }
        
        return self::$lead;
    }

    public static function preview_replace_variables( $content, $form ) {

        $lead = self::create_lead($form);

        // add filter that will handle getting temporary URLs for file uploads and post image fields (removed below)
        // beware, the RGFormsModel::create_lead() function also triggers the gform_merge_tag_filter at some point and will
        // result in an infinite loop if not called first above
        add_filter('gform_merge_tag_filter', array('GWPreviewConfirmation', 'preview_special_merge_tags'), 10, 4);

        $content = GFCommon::replace_variables($content, $form, $lead, false, false, false);

        // remove filter so this function is not applied after preview functionality is complete
        remove_filter('gform_merge_tag_filter', array('GWPreviewConfirmation', 'preview_special_merge_tags'));

        return $content;
    }
    
    public static function clear_field_value_cache( $form ) {
        
        if( ! class_exists( 'GFCache' ) )
            return;
            
        foreach( $form['fields'] as &$field ) {
            if( GFFormsModel::get_input_type( $field ) == 'total' )
                GFCache::delete( 'GFFormsModel::get_lead_field_value__' . $field['id'] );
        }
        
    }

}

GWPreviewConfirmation::init();

/* END OF Gravity Forms Mods */

/**
 *  Remove WP Page Widgets section from page templates with no sidebars, and some specific pages
 **/
function onlysky_wp_framework_add_favicon() {
  	$favicon_url = get_stylesheet_directory_uri() . '/img/favicon/admin-favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action('login_head', 'onlysky_wp_framework_add_favicon');
add_action('admin_head', 'onlysky_wp_framework_add_favicon');

/**
 *  Remove WP Page Widgets section from page templates with no sidebars, and some specific pages
 **/
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
 * 
 * Display Notice on themes page
 *
 */
global $pagenow;
if ( $pagenow == 'themes.php' ) :

    function onlysky_wp_framework_remove_them_editor_notice() {
        echo '<div class="admin-notice"><h2>You are currently using the ACU WordPress theme.</h2> <p>This theme is developed using the <strong>Only Sky WP Framework</strong>. The Only Sky WP Framework leverages a <em>build system</em> to process and create theme files from <em>source code</em>.</p><p><span class="warning-box"><strong class="warning">WARNING: </strong><strong>You should never modify any of the theme code directly</strong>, including all php, javascript, css, or html files. Changes should <em>always</em> be made exculsively to the <strong>source code</strong> instead.</p><p>Contact <a href="mailto:dev@onlysky.com">dev@onlysky.com</a> with any questions.</p></div>';
    }
    add_action( 'admin_notices', 'onlysky_wp_framework_remove_them_editor_notice' );
endif;

/**
 * 
 * Hide theme links in admin menu for non Only Sky users
 *
 */
function onlysky_wp_framework_remove_admin_theme_link() {

	$current_user = wp_get_current_user();

	// If is Only Sky User (user 2)
	if ( $current_user->user_login  == "onlysky" ) {
		// Don't do anything
	} else {

		//Remove the theme editor submenu item
		remove_submenu_page( 'themes.php', 'theme-editor.php' );

		//Remove the customizer submenu item
		remove_submenu_page( 'themes.php', 'customize.php' );
		
		/* Disable File Editing (Theme and Plugins) */
		//define('DISALLOW_FILE_EDIT', true);
	}
}
add_action( 'admin_menu', 'onlysky_wp_framework_remove_admin_theme_link', 999 );


/**
 * Enqueue scripts
 */
function onlysky_wp_framework_scripts() {

	//!TODO - Move this over to concated scripts and vendor scripts that come from bower

	// Locations Page
	//wp_enqueue_script( 'onlysky_wp_framework-locations', get_template_directory_uri() . '/js/jquery.responsiveiframe.js', array('jquery'), '1.1', true );
	//wp_enqueue_script( 'onlysky_wp_framework-locations', '/wp-content/plugins/advanced-iframe/js/ai_external.js', array('jquery'), '1.1', true );
	//wp_enqueue_script( 'onlysky_wp_framework-iframeresizer', get_template_directory_uri() . '/js/iframeResizer.min.js', array('jquery'), '1.1', true );
	//wp_enqueue_script( 'onlysky_wp_framework-locations', get_template_directory_uri() . '/js/locations.js', array('jquery'), '1.1', true );

	// Credit Cards Page
	wp_enqueue_script( 'onlysky_wp_framework-credit-cards', get_template_directory_uri() . '/js/credit-cards.js', array('jquery'), '1.1', true );

	// Auto Loans Slider
	// moved to template
	//wp_enqueue_script( 'onlysky_wp_framework-jquery-ui-slider', get_template_directory_uri() . '/js/vendor/jquery-ui-slider-only/jquery-ui.min.js', array('jquery'), '1.1', true );
	//wp_enqueue_script( 'onlysky_wp_framework-jquery-ui-touoch', get_template_directory_uri() . '/js/vendor/jquery.ui.touch-punch.min.js', array('jquery'), '1.1', true );
	/*if (is_page(212)){
		wp_enqueue_script( 'onlysky_wp_framework-wnumb', get_template_directory_uri() . '/js/vendor/wNumb.js', array('jquery'), '1.1', true );
		wp_enqueue_scripts( 'onlysky_wp_framework-no-ui-slider', get_template_directory_uri() . '/js/vendor/noui-slider/nouislider.min.js', array('jquery'), '1.1', true );
		wp_enqueue_script( 'onlysky_wp_framework-auto-loans-calc', get_template_directory_uri() . '/js/auto-loans-calc.js', array('jquery'), '1.1', true );
	}*/

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
 * Don't disable search engine on staging
 */

function wp_local_toolbox_enable_search() {

	if (defined('WPLT_SERVER') && WPLT_SERVER) {

		if (strtoupper(WPLT_SERVER) == 'LOCAL' && strtoupper(WPLT_SERVER) == 'local'  && strtoupper(WPLT_SERVER) == 'DEV') {
			/**
			 * LOCAL/DEV Environment Everything except PRODUCTION/LIVE/STAGING Environment
			 */
			
			// Hide from robots
			add_filter('pre_option_blog_public', '__return_zero');

		} else {
			/**
			 * PRODUCTION/LIVE/STAGING Environment
			 */
			
			// Don't hide from robots
			add_filter('pre_option_blog_public', '__return_true');
		}
	}
}
add_action( 'wp_loaded', 'wp_local_toolbox_enable_search' );

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
