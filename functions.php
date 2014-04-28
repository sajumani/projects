<?php
function customposttype_image_box() {

	remove_meta_box('postimagediv', 'pt_slides', 'side');
	add_meta_box('postimagediv', __('Full Size Image. Ratio 3:1, minimum size (960 x 300 pixels.'), 'post_thumbnail_meta_box', 'pt_slides', 'normal', 'high');
}
add_action('do_meta_boxes', 'customposttype_image_box');

function pw_add_image_sizes() {
add_image_size( 'slider-image', 960,300, true );
add_image_size( 'media-image', 205,101, true );	
}
add_action( 'init', 'pw_add_image_sizes' );
// include custom functions
include('inc/post-types.php');
include('inc/meta-boxes.php');
include('inc/widgets.php');
	global $wpdb;
	require(  get_template_directory() . '/inc/theme-settings.php');                //Building theme administration
register_nav_menu('topmenu','Top Menu');
register_nav_menu('footermenu','Footer Menu');
add_post_type_support('page','excerpt');
add_theme_support('post-thumbnails');
function tk_theme_name(){
		return 'spark';
	}
	define( 'tk_theme_name', 'Demo' );
	update_option('tk_theme_name', tk_theme_name);
	
	register_sidebar( array(
		'name'          => __( 'Footer Section', 'twentyfourteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Footer sidebar that appears on the footer.', 'demo' ),
		'before_widget' => '<div class="footercolumn">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );



function has_post_content_image()
{
	global $post;
	$content = $post->post_content;
	$searchimages = '~<img [^>]* />~';
	
	// Run preg_match_all to grab all the images and save the results in $pics
	
	preg_match_all( $searchimages, $content, $pics );
	
	// Check to see if we have at least 1 image
	$iNumberOfPics = count($pics[0]);
	if ( $iNumberOfPics > 0 )
	return true;
	else
	return false;
}
//Get the first image
function get_post_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/path/to/default.png";
  }
  return $first_img;
}
 
/***************** Custom Jquery Function Registeration*************/
function custom_scripts(){
    wp_register_script( 
        's3Slider', 
        get_template_directory_uri() . '/js/s3Slider.js', 
        array( 'jquery' )
    );
	wp_register_script( 
        'customquery', 
        get_template_directory_uri() . '/js/custom.js', 
        array( 'jquery' )
    );
	wp_enqueue_script('jquery');
	wp_enqueue_script('customquery');
	wp_enqueue_script('s3Slider');
	
}
add_action('wp_print_scripts', 'custom_scripts');
