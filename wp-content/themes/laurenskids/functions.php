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
		'awareness' => __( 'Awareness Menu', 'laurenskids' ),
		'education' => __( 'Education Menu', 'laurenskids' ),
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
	add_image_size( 'news-featured-thumb', 321, 234, true ); //w x h
	//set latest-news size
	add_image_size( 'news-latest-thumb', 192, 140, true ); //w x h
	
	set_post_thumbnail_size( 237, 172, true ); // sets the default size "post_thumbnail" for the_post_thumbnail(), will crop;
	
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
		'name'          => __( 'Testimonials', 'laurenskids' ),
		'id'            => 'testimonial',
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
	
	// remove Recent Tweets plugin css
	wp_dequeue_style('tp_twitter_plugin_css');
}
add_action( 'wp_enqueue_scripts', 'laurenskids_scripts' );


// removes jQuery in favor of Google CDN
function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
	}
}
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );


// Disable support for comments and trackbacks in post types
	function df_disable_comments_post_types_support() {
	    $post_types = get_post_types();
	    foreach ($post_types as $post_type) {
	        if(post_type_supports($post_type, 'comments')) {
	            remove_post_type_support($post_type, 'comments');
	            remove_post_type_support($post_type, 'trackbacks');
	        }
	    }
	}
	add_action('admin_init', 'df_disable_comments_post_types_support');
	 
	// Close comments on the front-end
	function df_disable_comments_status() {
	    return false;
	}
	add_filter('comments_open', 'df_disable_comments_status', 20, 2);
	add_filter('pings_open', 'df_disable_comments_status', 20, 2);
	 
	// Hide existing comments
	function df_disable_comments_hide_existing_comments($comments) {
	    $comments = array();
	    return $comments;
	}
	add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
	 
	// Remove comments page in menu
	function df_disable_comments_admin_menu() {
	    remove_menu_page('edit-comments.php');
	}
	add_action('admin_menu', 'df_disable_comments_admin_menu');
	 
	// Redirect any user trying to access comments page
	function df_disable_comments_admin_menu_redirect() {
	    global $pagenow;
	    if ($pagenow === 'edit-comments.php') {
	        wp_redirect(admin_url()); exit;
	    }
	}
	add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
	 
	// Remove comments metabox from dashboard
	function df_disable_comments_dashboard() {
	    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	}
	add_action('admin_init', 'df_disable_comments_dashboard');
	 
	// Remove comments links from admin bar
	function df_disable_comments_admin_bar() {
	    if (is_admin_bar_showing()) {
	        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	    }
	}
	add_action('init', 'df_disable_comments_admin_bar');


// custom output for UWPQSF 
function customize_output($results , $arg, $id, $getdata) {
	// The Query
		$apiclass = new uwpqsfprocess();
		$query = new WP_Query( $arg );
		ob_start();	$result = '';
	
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				global $post; ?>
					<div class="lk-post<?php if(in_category('featured') ) echo " featured-post";?>">
					<a href="<?php the_permalink(); ?>">
						<?php 
							if ( has_post_thumbnail() ): 
								/*
								if(in_category('featured') ) {
									the_post_thumbnail("large");
								}else{
								*/?>
								<div class="post-img"></div>
								<?php the_post_thumbnail(); 
								/* } */
							endif; ?>
							
						<div class="post-preview">
								<h3><?php the_title(); ?></h3>
								<h5><?php the_time('F j, Y'); ?></h5>
								<hr>
								<p><?php laurenskids_excerpt(25); ?></p>
								
								<?php if (has_category()): ?>
								<hr>
								<h5>Category:<span> <?php 
									$category = get_the_category();
									$length = count($category);
									$i = 0;
									foreach($category as $aCat) {
										if ($i < $length - 1) {
											echo $aCat->cat_name . ", ";
										}else{
											echo $aCat->cat_name;
										}
									$i++;
									}?> 
								</span></h5>
								<?php endif; ?>
						</div>
					</a>
					</div>
	<?php   }
			echo  $apiclass->ajax_pagination($arg['paged'],$query->max_num_pages, 4, $id, $getdata);
	
			} else {
				echo  'No posts found :(';
			}

			/* Restore original Post Data */
			wp_reset_postdata();
 
		$results = ob_get_clean();		
			return $results;
}

// Add Survivor Stories Custom Post Type

add_action( 'init', 'survivor_stories_init' );

function survivor_stories_init() {
	$labels = array(
		'name'               => _x( 'Survivor Stories', 'post type general name', 'laurenskids' ),
		'singular_name'      => _x( 'Survivor Story', 'post type singular name', 'laurenskids' ),
		'menu_name'          => _x( 'Survivor Stories', 'admin menu', 'laurenskids' ),
		'name_admin_bar'     => _x( 'Survivor Story', 'add new on admin bar', 'laurenskids' ),
		'add_new'            => _x( 'Add New', 'Story', 'laurenskids' ),
		'add_new_item'       => __( 'Add New Story', 'laurenskids' ),
		'new_item'           => __( 'New Story', 'laurenskids' ),
		'edit_item'          => __( 'Edit Story', 'laurenskids' ),
		'view_item'          => __( 'View this Story', 'laurenskids' ),
		'all_items'          => __( 'All Stories', 'laurenskids' ),
		'search_items'       => __( 'Search Stories', 'laurenskids' ),
		'parent_item_colon'  => __( 'Parent Stories:', 'laurenskids' ),
		'not_found'          => __( 'No stories found.', 'laurenskids' ),
		'not_found_in_trash' => __( 'No stories found in Trash.', 'laurenskids' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'exclude_from_search'=> true,
		'show_ui'            => true,
		'show_in_nav_menu'	 => false,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'survivor-stories' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'			 => 'dashicons-groups',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' )
	);

	register_post_type( 'survivor-stories', $args );
}
add_action( 'init', 'survivor_stories_init' );


// Add Partners & Supporters Custom Post Type
function partners_and_supporters_init() {
	$labels = array(
		'name'               => _x( 'Partners & Supporters', 'post type general name', 'laurenskids' ),
		'singular_name'      => _x( 'Partner', 'post type singular name', 'laurenskids' ),
		'menu_name'          => _x( 'Partners & Supporters', 'admin menu', 'laurenskids' ),
		'name_admin_bar'     => _x( 'Partners & Supporters', 'add new on admin bar', 'laurenskids' ),
		'add_new'            => _x( 'Add New', 'Partner', 'laurenskids' ),
		'add_new_item'       => __( 'Add New Partner', 'laurenskids' ),
		'new_item'           => __( 'New Partner', 'laurenskids' ),
		'edit_item'          => __( 'Edit Partner', 'laurenskids' ),
		'view_item'          => __( 'View this Partner', 'laurenskids' ),
		'all_items'          => __( 'All Partners', 'laurenskids' ),
		'search_items'       => __( 'Search Partners', 'laurenskids' ),
		'parent_item_colon'  => __( 'Parent Supporter:', 'laurenskids' ),
		'not_found'          => __( 'No partners found.', 'laurenskids' ),
		'not_found_in_trash' => __( 'No partners found in Trash.', 'laurenskids' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'exclude_from_search'=> true,
		'show_ui'            => true,
		'show_in_nav_menu'	 => false,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'partners-and-supporters' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 21,
		'menu_icon'			 => 'dashicons-universal-access-alt',
		'supports'           => array( 'title', 'thumbnail' )
	);

	register_post_type( 'partners-supporters', $args );
}
add_action( 'init', 'partners_and_supporters_init' );


// License Plate Form shortcode

function addLicensePlateForm() {
	$output = 
	'<!-- License Form -->
		<div class="license-form-wrapper">
		<div class="license-form forms">
			<form action="http://laurens-kids.force.com/website/contact_us" method="post" data-webforms2-force-js-validation="true">
				<input type="hidden" name="thankYouURL" value="http://www.laurenskids.org"/>
			
				<h3 class="centered-text">license Plate Interest</h3>
				<div class="field">
					<label for="firstname" class="required">First Name:</label>
					<input id="firstname" type="text" name="firstname" required="required" placeholder="first name" maxlength="40"/>
				</div>
				<div class="field">
					<label for="lastname" class="required">Last Name:</label>
					<input id="lastname" type="text" name="lastname" required="required" placeholder="last name" maxlength="80"/>
				</div>
				<div class="field">
					<label for="zip_code" class="required">Zip Code:</label>
					<input id="zip_code" type="text" name="zip_code" required="required" pattern="[0-9]{5}(-?[0-9]{4})?" placeholder="zip code" maxlength="10"/>
				</div>
				<div class="field">
					<label for="phone">Phone:</label>
					<input id="phone" name="phone" type="tel" pattern="[0-9]{3}-?[0-9]{3}-?[0-9]{4}" placeholder="(123) 456-7890" maxlength="12"/>
				</div>
				<div class="field">
					<label for="email_address" class="required">Email Address:</label>
					<input id="email_address" type="email" name="email_address" required="required" placeholder="email@host.com"/>
				</div>
			    <div class="submit-btn">
					<button type="submit">Submit</button>
			    </div>
			</form>
			
			<div class="required-info">
				<p>Fields marked with <img src="'. get_stylesheet_directory_uri().'/img/butterfly-bullet_hover.png"/> are required.</p>
			</div>
				
		</div><!--End License Form-->
		</div>';
		
	return $output;	
}

add_shortcode('license-plate-form', 'addLicensePlateForm');


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


// Custom Admin Style

function admin_css() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin/admin.css' );
}
add_action('admin_print_styles', 'admin_css' );

// Custom WordPress Login Page
function login_css() {
	wp_enqueue_style( 'login_css', get_template_directory_uri() . '/css/admin/login.css' );
	
	// fix login logo link
	function loginpage_custom_link() {
		return home_url();
	}
	add_filter('login_headerurl','loginpage_custom_link');
	
	function change_title_on_logo() {
		return 'Return to LaurensKids.org';
	}
	add_filter('login_headertitle', 'change_title_on_logo');
}
add_action('login_head', 'login_css');

