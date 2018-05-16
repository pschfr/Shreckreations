<?php
// Removes unneccessary scripts and enqueues proper ones
function theme_enqueue_scripts() {
	wp_deregister_script('wp-embed'); // This is only used when embedding content from other sites
	wp_deregister_script('jquery'); // Removes jQuery 1.12 and jQuery Migrate so I can add jQuery 3 below
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '', true);
	wp_enqueue_script('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/1.12.1/simple-lightbox.min.js', array('jquery'), '', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/includes/main.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Enqueues necessary CSS (Tachyons and simpleLightbox are now located in includes/sass)
function theme_enqueue_styles() {
	// wp_enqueue_style('tachyons', 'https://cdnjs.cloudflare.com/ajax/libs/tachyons/4.9.1/tachyons.min.css');
	// wp_enqueue_style('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/1.12.1/simplelightbox.min.css');
	wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Raleway:n,b,i');
	wp_enqueue_style('main', get_template_directory_uri().'/includes/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 11);

// Prevents Contact Form 7 from loading CSS and JS, it's enabled only on templates/contact.php
// https://contactform7.com/loading-javascript-and-stylesheet-only-when-it-is-necessary/
add_filter('wpcf7_load_css', '__return_false');
add_filter('wpcf7_load_js',  '__return_false');

// Initializes widget area
function theme_widgets_init() {
	register_sidebar(array(
		'name' => 'Widget Area 1',
		'id'   => 'widget_area_1',
		'before_widget' => '<div class="small-12 columns">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
}
// add_action('widgets_init', 'theme_widgets_init');

// Initializes menu area
function theme_menus_init() { register_nav_menu('first_menu', __('First Menu')); }
add_action('init', 'theme_menus_init');

// Adds classes to the <a> tag in the menus, see https://wordpress.stackexchange.com/a/241072/
function menu_add_class($atts, $item, $args) {
    $atts['class'] .= 'gray ph1';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'menu_add_class', 10, 3);

// Adds classes to post thumbnails, see https://wordpress.stackexchange.com/a/102250/
function thumbnail_add_class($atts) {
	$atts['class'] .= ' h-100';
	return $atts;
  }
add_filter('wp_get_attachment_image_attributes','thumbnail_add_class');

// It's pretty dumb that I have to do these manually
add_filter('widget_text', 'do_shortcode');
add_theme_support('post-thumbnails');
