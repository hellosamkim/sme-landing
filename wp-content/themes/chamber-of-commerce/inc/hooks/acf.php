<?php

// Init new blocks in blocks folder
add_action('acf/init', 'blocks_acf_init');
function blocks_acf_init(){
    // check function exists
    if (function_exists('acf_register_block')) {

        $files = glob(__DIR__ . '/../../blocks/*.php');
        foreach ($files as $file) {
            require_once($file);
        }
    }
}

//Custom Block category for AFI
add_filter( 'block_categories', function( $categories, $post ) {
    return array_merge(
        array(
            array(
                'slug' => 'chamber',
                'title' => __( 'Custom Components', 'chamber' ),
            ),
        ),
        $categories
    );
}, 10, 2 );

// Create options page
if (function_exists('acf_add_options_page')) {
  $parent = acf_add_options_page(array(
      'page_title' => 'Canadian Chamber of Commerce : Theme Settings',
      'menu_title' => 'Theme Settings',
      'menu_slug' => 'site-options',
      'capability' => 'manage_options',
      'redirect' => false,
  ));
  $parent = acf_add_options_page(array(
      'page_title' => 'Canadian Chamber of Commerce : Advertisement',
      'menu_title' => 'Advertisements',
      'menu_slug' => 'advertisements',
      'capability' => 'manage_options',
      'redirect' => false,
  ));
}

function acf_filter_rest_api_preload_paths( $preload_paths ) {
    if ( ! get_the_ID() ) {
      return $preload_paths;
    }
    $remove_path = '/wp/v2/' . get_post_type() . 's/' . get_the_ID() . '?context=edit';
    $v1 =  array_filter(
      $preload_paths,
      function( $url ) use ( $remove_path ) {
        return $url !== $remove_path;
      }
    );
    $remove_path = '/wp/v2/' . get_post_type() . 's/' . get_the_ID() . '/autosaves?context=edit';
    return array_filter(
      $v1,
      function( $url ) use ( $remove_path ) {
        return $url !== $remove_path;
      }
    );
  }
  add_filter( 'block_editor_rest_api_preload_paths', 'acf_filter_rest_api_preload_paths', 10, 1 );