<?php
// Removes unneccessary scripts and enqueues proper ones
function theme_enqueue_scripts() {
	wp_deregister_script('wp-embed'); // Whatever that script is we don't need it
	wp_deregister_script('jquery');   // We do this to include a more recent version
	// wp_register_script('jquery',   ('https://code.jquery.com/jquery-3.3.1.slim.min.js'), false, '', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/includes/main.js', array(), '', true );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Enqueues necessary CSS
function theme_enqueue_styles() {
	wp_enqueue_style('tachyons', 'https://cdnjs.cloudflare.com/ajax/libs/tachyons/4.9.1/tachyons.min.css');
	wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Raleway');
	wp_enqueue_style('main', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 11 );

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

// It's pretty dumb that I have to do these manually
add_filter('widget_text', 'do_shortcode');
add_theme_support('post-thumbnails');
