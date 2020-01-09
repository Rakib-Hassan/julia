	<?php
function julio_theme_file() {

	wp_enqueue_style('google-styles', 'https://fonts.googleapis.com/icon?family=Material+Icons');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '1.0', 'all');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0', 'all');
	wp_enqueue_style('sm-clean', get_template_directory_uri() . '/assets/css/sm-clean.css', array(), '1.0', 'all');
	wp_enqueue_style('sm-core', get_template_directory_uri() . '/assets/css/sm-core.css', array(), '1.0', 'all');
	wp_enqueue_style('default-css', get_template_directory_uri() . '/assets/css/default.css', array(), '1.0', 'all');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', array('julio-style'), '1.0', 'all');
	wp_enqueue_style('julio-style', get_stylesheet_uri());

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/assets/js/fontawesome.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('active-js', get_template_directory_uri() . '/assets/js/smartmenus.min.js', array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts', 'julio_theme_file');
add_filter('use_block_editor_for_post', '__return_false', 10);

function wpdocs_enqueue_custom_admin_style() {
	wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/css/my-acf-input.css', false, '1.0.0' );
	wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );

//after_setup_theme
if ( ! function_exists( 'myblog2_setup' ) ) :
	
function myblog2_setup() {
		//Make theme available for translation.
	load_theme_textdomain( 'myblog2', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
		// Let WordPress manage the document title. 
	add_theme_support( 'title-tag' );
	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Header menu', 'julia001' ),
		'menu-2' => esc_html__( 'Footer One', 'julia001' ),
		'menu-3' => esc_html__( 'Footer Two', 'julia001' ),
		'menu-4' => esc_html__( 'Footer Three', 'julia001' ),
		'menu-5' => esc_html__( 'Footer Four', 'julia001' ),
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'myblog2_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	//Add support for core custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
	}
	endif;
	add_action( 'after_setup_theme', 'myblog2_setup' );

// ======>>CUSTOM TAXONOMY / CATEGORIES>>=========//
function julia_custom_category_And_Tag() {
  //custom categories
	$labels = array(
		"name" 			=> __( "Custom Categories", "julia" ),
		"singular_name" => __( "Custom Category", "julia" ),
	);
	$args = array("label" => __( "Custom Categories", "julia" ),
		
		"labels" 				=> $labels,
		"rewrite" 				=> array( 'slug' => 'custom_category', 'with_front' => true, ),
		"rest_base" 			=> "custom_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		);
	register_taxonomy( "custom_category", array( "page", "custom_post" ), $args );


	//Taxonomy: Custom Tags.
		
	$labels = array(
		"name" => __( "Custom Tags", "julia" ),
		"singular_name" => __( "Custom Tag", "julia" ),
	);
	$args = array(
		"label" 				=> __( "Custom Tags", "julia" ),
		"labels" 				=> $labels,
		"rewrite" 				=> array( 'slug' => 'custom_tag   ', 'with_front' => true, ),
		"rest_base"             => "custom_tag",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		);
	register_taxonomy( "custom_tag", array( "page", "custom_post" ), $args );
	
}
add_action( 'init', 'julia_custom_category_And_Tag' );


// widgets register
function Creative_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer one', 'julia001' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add footer one widgets here.', 'julia001' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="footer-menu">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer two', 'julia001' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add footer two widgets here.', 'julia001' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s footer-menu-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer three', 'julia001' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add footer three widgets here.', 'julia001' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s footer-menu-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer four  ', 'julia001' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add footer four widgets here.', 'julia001' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s footer-menu-2">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '<h5>',
	) );

}
add_action( 'widgets_init', 'Creative_widgets_init' );



//ACF Option page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Management setting',
		'menu_title'	=> 'Theme Management setting',
		'parent_slug'	=> 'theme-general-settings',
	));
}
//Blog custom post type

function julia_theme_custom_post() {
			$labels = array(
			'name'               => __( 'Blog posts', 'julia001' ),
			'singular_name'      => __( 'Blog posts', 'julia001' ),	);
		
		$args = array('labels' => $labels, 'public' => false,'show_ui'  => true,
			'supports'            => array('title','editor','thumbnail','custom-fields','custom-fields','revisions','page-attributes',),);
				
		register_post_type( 'Blog_posts', $args );	
}	
add_action( 'init', 'julia_theme_custom_post' );


//ACF ENQUEUE 

function my_acf_admin_enqueue_scripts() {
	// register style
    wp_register_style( 'my-acf-input-css', get_stylesheet_directory_uri() . '/assets/css/my-acf-input.css', false, '1.0.0' );
    wp_enqueue_style( 'my-acf-input-css' );  
}
add_action( 'input', 'my_acf_admin_enqueue_scripts' );

// Banner Background loop
function banner_background_changes(){
	if (have_rows( 'banner_section_group', 'option' ) ) :
		while( have_rows( 'banner_section_group', 'option' ) ) : the_row();
			$banner_background_color = get_sub_field( 'banner_background_color' );
			$banner_background_image = get_sub_field('banner_background_image','option');
			if (get_sub_field( 'banner_select','option' ) == 'background color' ) { ?>
				<style>
				.banner-area {
					background: <?php echo $banner_background_color; ?>;
				}
			   </style>

        <?php
		} else {
         ?>
       <style>
		.banner-area {
			background: url(<?php echo $banner_background_image['url']?>);
			background-position: center;
			background-size: cover;
		}
	  </style>
		<?php }
		endwhile;
	endif;
}
add_action( "wp_head", "banner_background_changes" );
?>
