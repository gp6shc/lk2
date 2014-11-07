<?php
/**
 * laurenskids functions and definitions
 *
 * @package laurenskids
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'laurenskids_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function laurenskids_setup() {



	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on laurenskids, use a find and replace
	 * to change 'laurenskids' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'laurenskids', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );



	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'laurenskids' ),
		'about' => __( 'About Menu', 'laurenskids' ),
	) );



	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	
	
	
	/*
	 * post thumbnail support (featured images for posts)
	 */
	add_theme_support( 'post-thumbnails' ); 
	//set feautred-news size
	add_image_size( 'news-featured-thumb', 321, 234 ); //w x h
	//set latest-news size
	add_image_size( 'news-latest-thumb', 192, 140 ); //w x h
	
	
	
	
	/*
	 * the_excerpt()
	 * set excerpt length & modify the read more link at end
	 */
	function lk_excerpt_length($length) {
	    return 26; // return number of words
	}
	add_filter('excerpt_length', 'lk_excerpt_length');
	 
	function lk_excerpt_more($more) {
	    global $post;
	    return '<a class="read-more" href="'. get_permalink($post->ID) . '">Read More <i class="fa fa-caret-right"></i></a>';
	}
	add_filter('excerpt_more', 'lk_excerpt_more');
	
	
	

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'laurenskids_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // laurenskids_setup
add_action( 'after_setup_theme', 'laurenskids_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function laurenskids_widgets_init() {
	//sidebar-1
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'laurenskids' ),
		'id'            => 'sidebar-1',
		'description'   => 'To show on all Posts. Position: sidebar, right.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	//footer-1
	register_sidebar( array(
		'name'          => __( 'Footer Area 1', 'laurenskids' ),
		'id'            => 'footer-1',
		'description'   => 'To show on the footer on all pages. Position: footer, left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	//footer-2
	register_sidebar( array(
		'name'          => __( 'Footer Area 2', 'laurenskids' ),
		'id'            => 'footer-2',
		'description'   => 'To show on the footer on all pages. Position: footer, middle',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	//footer-3
	register_sidebar( array(
		'name'          => __( 'Footer Area 3', 'laurenskids' ),
		'id'            => 'footer-3',
		'description'   => 'To show on the footer on all pages. Position: footer, right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'laurenskids_widgets_init' );




/**
 * Count the number of footer sidebars (widgets) to enable dynamic classes for the footer.
 */
function lk_footer_widget_count() {
	$count = 0;

	if ( is_active_sidebar( 'footer-1' ) )
		$count++;

	if ( is_active_sidebar( 'footer-2' ) )
		$count++;

	if ( is_active_sidebar( 'footer-3' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'widget-count-1';
			break;
		case '2':
			$class = 'widget-count-2';
			break;
		case '3':
			$class = 'widget-count-3';
			break;
	}

	if ( $class )
		echo $class;
}






/**
 * Enqueue scripts and styles.
 */
function laurenskids_scripts() {
	//STYLES
	//replace default stylesheet with SASS-compiled stylesheet, "css/style.css"
	wp_enqueue_style( 'SASS', get_template_directory_uri() . '/css/style.css', array(), '0.1');
	
	//SCRIPTS
	//jquery
	wp_register_script('jquery',"http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null);
	wp_enqueue_script('jquery');
	//link focus
	wp_enqueue_script( 'laurenskids-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '0.1', true );
	// comment script (when comments open on single-view)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'laurenskids_scripts' );









/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
