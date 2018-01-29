<?php
require_once('inc/widget.php');
require_once('inc/custom-post.php');
require_once('inc/custom-functions.php');


if ( function_exists('register_sidebar') )
    register_sidebar(array(
      'name' => 'Sidebar Right',
        'before_widget' => '<div class="section"><div class="area">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3><span>',
        'after_title' => '</h3></span>',
    ));
register_sidebar( array(
'name' => 'Top Recent Widget',
'id' => 'top-widget',
'description' => 'Widget diatas Latest Release',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<div class="rvad"><h1><span>',
'after_title' => '</span></h1></div><a class="iconf" href="/anime/>Show More</a>',
) );
register_sidebar( array(
'name' => 'Bottom Recent Widget',
'id' => 'bot-widget',
'description' => 'Widget dibawah Page navigation',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<div class="rvad"><h1><span>',
'after_title' => '</span></h1></div><a class="iconf" href="/anime/>Show More</a>',
) );
 register_sidebar(array(
        'name' => 'Footer One',
        'id' => 'footer-1',
        'before_widget' => '<div class="side">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Two',
        'id' => 'footer-2',
        'before_widget' => '<div class="side">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Three',
        'id' => 'footer-3',
        'before_widget' => '<div class="side">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

add_action( 'init', 'register_my_menus' );
function register_my_menus() {
  register_nav_menus(
    array(
'main' => __( 'Header Menu' ),
'bottom' => __( 'Bottom Menu' )
    )
  );
}

add_filter('jpeg_quality', function($arg){return 92;});

add_action( 'after_setup_theme', 'mytheme_custom_thumbnail_size' );
function mytheme_custom_thumbnail_size(){
    add_image_size( 'thumb-small', 300, 9999, true ); // Hard crop to exact dimensions (crops sides or top and bottom)
    add_image_size( 'thumb-medium', 520, 9999 ); // Crop to 520px width, unlimited height
    add_image_size( 'thumb-large', 720, 340 ); // Soft proprtional crop to max 720px width, max 340px height
}
get_the_post_thumbnail($id, array(200,200) );
add_action('init','random_add_rewrite');
function random_add_rewrite() {
   global $wp;
   $wp->add_query_var('random');
   add_rewrite_rule('random/?$', 'index.php?random=1', 'top');
}

add_theme_support( 'post-thumbnails' );

function post_from_today_class($class) {
//add .new-post-today to post_class() if newer than 24hrs
    global $post;
    if( date('U') - get_the_modified_time('U', $post->ID) < 24*60*60 ) $class[] = 'new-post-today';
    return $class;
}

add_filter('post_class','post_from_today_class');

add_action('template_redirect','random_template');
function random_template() {
   if (get_query_var('random') == 1) {
           $posts = get_posts('post_type=anime&orderby=rand&numberposts=1');
           foreach($posts as $post) {
                   $link = get_permalink($post);
           }
           wp_redirect($link,307);
           exit;
   }
}
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}


add_theme_support( 'automatic-feed-links' );
function new_excerpt_more( $more ) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
function custom_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).' ...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

add_filter('widget_tag_cloud_args','set_tag_cloud_sizes');
function set_tag_cloud_sizes($args) {
$args['smallest'] = 10;
$args['largest'] = 10;
return $args; }
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
wp_enqueue_style( 'dashicons' );
}

add_theme_support('html5', array('search-form'));
add_filter('show_admin_bar', '__return_false');

// Multiple Bg
if (class_exists('MultiPostThumbnails')) {

new MultiPostThumbnails(array(
'label' => 'Thumbnail Depan',
'id' => 'cover-image',
'post_type' => 'anime',
 ) );
}
add_action( 'wp_enqueue_scripts', 'my_custom_script_load' );
function my_custom_script_load(){
  wp_enqueue_script( 'owl.carousel.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js', array() );
}
// Receive the Request post that came from AJAX
add_action( 'wp_ajax_demo-pagination-load-posts', 'cvf_demo_pagination_load_posts' );
// We allow non-logged in users to access our pagination
add_action( 'wp_ajax_nopriv_demo-pagination-load-posts', 'cvf_demo_pagination_load_posts' );
function cvf_demo_pagination_load_posts() {
   
    global $wpdb;
    // Set default variables
    $msg = '';
   
    if(isset($_POST['page'])){
        // Sanitize the received page  
        $page = sanitize_text_field($_POST['page']);
        $cur_page = $page;
        $page -= 1;
        // Set the number of results to display
        $per_page = 12;
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;
       
        // Set the table where we will be querying data
        $table_name = $wpdb->prefix . "posts";
        $table_names = $wpdb->prefix . "postmeta";
       
        // Query the necessary posts
        $all_blog_posts = $wpdb->get_results($wpdb->prepare("
            SELECT $wpdb->posts.* 
    FROM $wpdb->posts, $wpdb->postmeta
    WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id 
    AND $wpdb->postmeta.meta_key = 'smoke-status' 
    AND $wpdb->postmeta.meta_value = 'Currently Airing' 
    AND $wpdb->posts.post_status = 'publish' 
    AND $wpdb->posts.post_type = 'anime'
    ORDER BY $wpdb->posts.post_modified DESC LIMIT %d, %d", $start, $per_page ) );

        // At the same time, count the number of queried posts
        $count = $wpdb->get_var($wpdb->prepare("
            SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = 'anime' AND post_status = 'publish'", array() ) );
   
        // Loop into all the posts
        foreach($all_blog_posts as $key => $post):
           
            // Set the desired output into a variable
            $msg .= include (TEMPLATEPATH . '/gridmode.php');
           
        endforeach;
       
        // Optional, wrap the output into a container
        $msg = "<div class='cvf-universal-content'>" . $msg . "</div><br class = 'clear' />";
       
        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);

        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }
       
        // Pagination Buttons logic    
        $pag_container .= "
        <div class='cvf-universal-pagination'>
            <ul>";

        /*if ($first_btn && $cur_page > 1) {
            $pag_container .= "<li p='1' class='active'>First</li>";
        } else if ($first_btn) {
            $pag_container .= "<li p='1' class='inactive'>First</li>";
        }*/

        if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1;
            $pag_container .= "<li p='$pre' class='active'>Previous</li>";
        } else if ($previous_btn) {
            $pag_container .= "<li class='inactive'>Previous</li>";
        }
        /*
        for ($i = $start_loop; $i <= $end_loop; $i++) {

            if ($cur_page == $i)
                $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
            else
                $pag_container .= "<li p='$i' class='active'>{$i}</li>";
        }*/
       
        if ($next_btn && $cur_page < $no_of_paginations) {
            $nex = $cur_page + 1;
            $pag_container .= "<li p='$nex' class='active'>Next</li>";
        } else if ($next_btn) {
            $pag_container .= "<li class='inactive'>Next</li>";
        }

        /*if ($last_btn && $cur_page < $no_of_paginations) {
            $pag_container .= "<li p='$no_of_paginations' class='active'>Last</li>";
        } else if ($last_btn) {
            $pag_container .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
        }*/

        $pag_container = $pag_container . "
            </ul>
        </div>";
       
        // We echo the final output
        echo        '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';
       
    }
    // Always exit to avoid further execution
    exit();
}
add_action( 'pre_get_posts', 'my_tax_query' );

function my_tax_query($query){

    if ( !is_admin() && $query->is_main_query() && $query->is_tax( 'season' ) ) {
        $query->set( 'post_type', array( 'anime' ) );
    }
};