<?php
//ZMIENNE GLOBALNE
global $pagesData;

//ZMIENNE DLA STRON
$pagesData = [
    // 'home' => 9, //ID STRONA GŁÓWNA
    // 'contact' => 18, //ID KONTAKT
    // 'flats' => 15, //ID OFERTA MIESZKAŃ
    'blocks' => 78472,
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
  wp_enqueue_script( 'contact', get_template_directory_uri() . '/dist/contact.js', array(), '', true );

  if ( is_front_page()) :
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/dist/style.css', [], 2, 'all' );
    wp_enqueue_script( 'chocolat', get_template_directory_uri() . '/dist/libs/3jquery.chocolat.js', array(), '', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/dist/libs/1slick.min.js', array(), '', true );
    wp_enqueue_script( 'old-script', get_template_directory_uri() . '/dist/libs/main-script.js', array(), '', true );

  elseif ( is_page('o-nas')) :
    wp_enqueue_style( 'onas-style', get_template_directory_uri() . '/dist/o-nas.css', [], 2, 'all' );

  elseif ( is_page_template('template-uslugi-page.php')) :
    wp_enqueue_style( 'uslugi-style', get_template_directory_uri() . '/dist/uslugi.css', [], 2, 'all' );
    
  elseif ( is_page_template('template-kredyty-hipoteczne-page.php')) :
    wp_enqueue_style( 'kredyty-style', get_template_directory_uri() . '/dist/kredyty.css', [], 2, 'all' );

  elseif ( is_page_template('template-form-page.php')) :
    wp_enqueue_style( 'form-style', get_template_directory_uri() . '/dist/form.css', [], 2, 'all' );
  
  elseif ( is_page('kontakt')) :
    wp_enqueue_style( 'kontakt-style', get_template_directory_uri() . '/dist/kontakt.css', [], 2, 'all' );
  
  elseif ( is_page('rodo')) :
    wp_enqueue_style( 'rodo-style', get_template_directory_uri() . '/dist/rodo.css', [], 2, 'all' );

  elseif ( is_page('oferty')) :
    wp_enqueue_style( 'oferty-style', get_template_directory_uri() . '/dist/oferty.css', [], 2, 'all' );

  elseif ( is_page('blog')) :
    wp_enqueue_style( 'blog-style', get_template_directory_uri() . '/dist/blog.css', [], 2, 'all' );

  elseif ( is_page('rynek-pierwotny')) :
    wp_enqueue_style( 'rynek-pierwotny-style', get_template_directory_uri() . '/dist/pierwotny.css', [], 2, 'all' );
    wp_enqueue_script( 'chocolat', get_template_directory_uri() . '/dist/libs/3jquery.chocolat.js', array(), '', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/dist/libs/1slick.min.js', array(), '', true );
    wp_enqueue_script( 'old-script', get_template_directory_uri() . '/dist/libs/main-script.js', array(), '', true );

  elseif ( is_singular('mieszkania')) :
    wp_enqueue_style( 'mieszkania-style', get_template_directory_uri() . '/dist/single-offer.css', [], 2, 'all' );
    wp_enqueue_script( 'chocolat', get_template_directory_uri() . '/dist/libs/3jquery.chocolat.js', array(), '', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/dist/libs/1slick.min.js', array(), '', true );
    wp_enqueue_script( 'old-script', get_template_directory_uri() . '/dist/libs/main-script.js', array(), '', true );
    wp_enqueue_script( 'contact', get_template_directory_uri() . '/dist/contact.js', array(), '', true );
  
  elseif ( is_singular('inwestycje')) :
    wp_enqueue_style( 'inwestycja-style', get_template_directory_uri() . '/dist/single-pierwotny.css', [], 2, 'all' );
    wp_enqueue_script( 'chocolat', get_template_directory_uri() . '/dist/libs/3jquery.chocolat.js', array(), '', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/dist/libs/1slick.min.js', array(), '', true );
    wp_enqueue_script( 'old-script', get_template_directory_uri() . '/dist/libs/main-script.js', array(), '', true );

  elseif ( is_singular('blog')) :
    wp_enqueue_style( 'blog-style', get_template_directory_uri() . '/dist/single-blog.css', [], 2, 'all' );

  elseif ( is_singular('specjalisci')) :
    wp_enqueue_style( 'specjalist-style', get_template_directory_uri() . '/dist/specjalist.css', [], 2, 'all' );

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

function custom4(){
  register_post_type('blog',
      [
          'labels' => [
              'name' => __( 'Blog' ),
              'singular_name' => __( 'Blog' )
          ],
          'public' => true,
          'has_archive' => false,
          'hierarchical' => true,
          'supports' => ['title', 'page-attributes'],
          'rewrite' => ['slug' => 'blog']
      ]
  );
}
add_action('init', 'custom4');

function custom_disable_redirect_canonical( $redirect_url ){
    if(is_singular('inwestycje') ||  is_singular('specjalisci')) $redirect_url = false;
    return $redirect_url;
}
add_filter('redirect_canonical','custom_disable_redirect_canonical');

// CUT DESCRIPTION
function html_cut($text, $max_length)
{
  $tags   = array();
  $result = "";
  $is_open   = false;
  $grab_open = false;
  $is_close  = false;
  $in_double_quotes = false;
  $in_single_quotes = false;
  $tag = "";
  $i = 0;
  $stripped = 0;
  $stripped_text = strip_tags($text);
  while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
  {
      $symbol  = $text{$i};
      $result .= $symbol;
      switch ($symbol)
      {
          case '<':
              $is_open   = true;
              $grab_open = true;
              break;
          case '"':
              if ($in_double_quotes)
                  $in_double_quotes = false;
              else
                  $in_double_quotes = true;
          break;
          case "'":
            if ($in_single_quotes)
                $in_single_quotes = false;
            else
                $in_single_quotes = true;
          break;
          case '/':
              if ($is_open && !$in_double_quotes && !$in_single_quotes)
              {
                  $is_close  = true;
                  $is_open   = false;
                  $grab_open = false;
              }
              break;
          case ' ':
              if ($is_open)
                  $grab_open = false;
              else
                  $stripped++;
              break;
          case '>':
              if ($is_open)
              {
                  $is_open   = false;
                  $grab_open = false;
                  array_push($tags, $tag);
                  $tag = "";
              }
              else if ($is_close)
              {
                  $is_close = false;
                  array_pop($tags);
                  $tag = "";
              }
              break;
          default:
              if ($grab_open || $is_close)
                  $tag .= $symbol;

              if (!$is_open && !$is_close)
                  $stripped++;
      }
      $i++;
  }
  while ($tags)
      $result .= "</".array_pop($tags).">";
  return $result;
}
// BREADCRUMBS
function get_breadcrumb($par_id = '') {
  global $post;
    echo '<p class="page-adress">';
    echo '<a href="'.home_url().'" rel="nofollow">Home &#x3E; </a>';
    
    
    if ( $post->post_parent ) {
    echo '<a href="';
    echo get_permalink( $post->post_parent );
    echo '>';
    echo ucfirst(str_replace("-"," ",get_the_title( $post->post_parent )));
    echo '</a> &#x3E; ';
  }
    
    if (is_category() || is_single()) {
      if($par_id) {
        
      echo '<a href="';
      echo get_permalink($par_id);
      echo '">';
      echo ucfirst(str_replace("-"," ",get_the_title($par_id)));
      echo '</a>';
    }

    if(get_the_category()) {
      $cat = get_the_category();
      
      echo '<span>'; echo ucfirst(str_replace("-"," ", $cat[0]->slug)); echo '</span>';
      echo '<span> &#x3E; <span>';
    }
    
    if (is_single()) {
      echo '<a href="';
      echo get_permalink();
      echo '">';
      echo ucfirst(str_replace("-"," ",get_post_type($post_id)));
      echo ' > ';
      echo ucfirst(str_replace("-"," ", $post->post_name));
      echo '</a>';
    }
    } elseif (is_page()) {
        echo '<a href="'.get_permalink().'">'; echo ucfirst(str_replace("-"," ", $post->post_name)); echo '</a>';
    } elseif (is_home()) {
    echo '<a href="/">Home</a>';
    } elseif (is_search()) {
        echo "&nbsp;/&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    };
    echo '</p>';
}

// użycie <?php get_breadcrumb();