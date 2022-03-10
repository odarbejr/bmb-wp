<?php

function add_query_vars_filter( $vars ) {
    $vars[] = "view";
    return $vars;
  }
  add_filter( 'query_vars', 'add_query_vars_filter' );
  get_query_var('view');


// if(!function_exists('load_my_script')){
//     function load_my_script() {
//         global $post;
//         $deps = array('jquery');
//         $version= '1.0'; 
//         $in_footer = true;
//         wp_enqueue_script('citylist', get_stylesheet_directory_uri() . '/js/citylist.js', $deps, $version, $in_footer);
//         wp_localize_script('citylist', 'my_script_vars', array(
//                 'postID' => $post->ID
//             )
//         );
//     }
// }
// add_action('wp_enqueue_scripts', 'load_my_script');