<?php
//ZMIENNE GLOBALNE
global $pagesData;

//ZMIENNE DLA STRON
$pagesData = [
    'home' => 9, //ID STRONA GŁÓWNA
    'contact' => 18, //ID KONTAKT
    'flats' => 15, //ID OFERTA MIESZKAŃ
];

function remove_default_image_sizes( $sizes ) {
    unset( $sizes[ 'medium_large' ]);
    return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'remove_default_image_sizes' );

function page_scripts() {
    global $pagesData;
	wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'aos-style', get_template_directory_uri() . '/dist/libs/aos.css' );
  wp_enqueue_script( 'main-script', get_template_directory_uri() . '/dist/index.js', array(), '', true );
  wp_enqueue_script( 'aos-script', get_template_directory_uri() . '/dist/libs/aos.js', array(), '', true );

  if ( is_front_page()) :
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/dist/style.css' );

  elseif ( is_page('o-nas')) :
    wp_enqueue_style( 'onas-style', get_template_directory_uri() . '/dist/o-nas.css' );

  elseif ( is_page('uslugi')) :
    wp_enqueue_style( 'uslugi-style', get_template_directory_uri() . '/dist/uslugi.css' );
    
  else :
    null;
  endif;
}
add_action( 'wp_enqueue_scripts', 'page_scripts' );


//add_filter('site_transient_update_plugins', '__return_false');
add_filter('show_admin_bar', '__return_false');

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
if(function_exists('disabler_kill_rss')) {
    function disabler_kill_rss(){
        wp_die( _e("No feeds available.", 'ippy_dis') );
    }
}

remove_action( 'wp_head', 'feed_links_extra', 3 ); //Extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // General feeds: Post and Comment Feed
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
add_action( 'widgets_init', 'my_remove_recent_comments_style' );
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
}
function disable_embeds_init() {
   remove_action('rest_api_init', 'wp_oembed_register_route');
   remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
   remove_action('wp_head', 'wp_oembed_add_discovery_links');
   remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'disable_embeds_init', 9999);
add_filter( 'style_loader_src', 't5_remove_version' );
add_filter( 'script_loader_src', 't5_remove_version' );
function t5_remove_version( $url )
{
   return remove_query_arg( 'ver', $url );
}

function remove_menus(){
  remove_menu_page( 'edit-comments.php' );
  remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'remove_menus' );

function custom1(){
    register_post_type('mieszkania',
        [
            'labels' => [
                'name' => __( 'Oferty mieszkań' ),
                'singular_name' => __( 'Oferty mieszkań' )
            ],
            'public' => true,
            'has_archive' => false,
            'hierarchical' => true,
            'supports' => ['title', 'page-attributes'],
            'rewrite' => ['slug' => 'oferty-mieszkan']
        ]
    );
}
add_action('init', 'custom1');

function custom2(){
    register_post_type('specjalisci',
        [
            'labels' => [
                'name' => __( 'Specjaliści' ),
                'singular_name' => __( 'Specjaliści' )
            ],
            'public' => true,
            'has_archive' => false,
            'hierarchical' => true,
            'supports' => ['title', 'page-attributes'],
            'rewrite' => ['slug' => 'specjalisci']
        ]
    );
}
add_action('init', 'custom2');

function custom3(){
    register_post_type('inwestycje',
        [
            'labels' => [
                'name' => __( 'Inwestycje' ),
                'singular_name' => __( 'Inwestycje' )
            ],
            'public' => true,
            'has_archive' => false,
            'hierarchical' => true,
            'supports' => ['title', 'page-attributes'],
            'rewrite' => ['slug' => 'inwestycje']
        ]
    );
}
add_action('init', 'custom3');

function custom_disable_redirect_canonical( $redirect_url ){
    if(is_singular('inwestycje') ||  is_singular('specjalisci')) $redirect_url = false;
    return $redirect_url;
}
add_filter('redirect_canonical','custom_disable_redirect_canonical');