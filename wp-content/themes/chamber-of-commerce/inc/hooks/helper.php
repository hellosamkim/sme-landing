<?php
require_once dirname( __FILE__ )."/../data_service/DataServiceCCC.php";

// Chamber connection pagination
function chamber_paginate($total, $current){
  global $post;
  $post_slug = $post->post_name;

  if ($post_slug !== 'dashboard') {
    $paginate_links = paginate_links(array(
    'format' => '?page=%#%',
    'total' => $total,
    'prev_text' => '<button class="pr-2 text-button"><i class="fa-solid fa-chevron-left"></i></button>', 
    'next_text' => '<button class="pl-2 text-button"><i class="fa-solid fa-chevron-right"></i></button>',
    'current' => $current,
  ));
    if ($paginate_links && $paginate_links != ''): ?>
      <div class="pt-8 text-center lg:text-right pagination">
        <?php echo $paginate_links; ?>
      </div>
  <?php endif;
  }
}

  //   Register WP Menus
  function mytheme_register_nav_menu(){
      register_nav_menus( array(
          'main' => __( 'Main' ),
          'business' => __( 'Business Member' ),
          'top-bar' => __( 'Top Bar' ),
          'footer-1' => __( 'Footer Column 1' ),
          'footer-2' => __( 'Footer Column 2' ),
          'footer-bottom' => __( 'Footer Bottom' ),
          'dashboard' => __( 'Dashboard' ),
      ) );
  }
  add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );


  //   Remove default gutenberg blocks
  function remove_default_blocks($allowed_blocks){
 
    // Get all registered blocks
    $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
    
    // Remove all blocks that are prefixed with core/
    $filtered_blocks = array();
    foreach($registered_blocks as $block) {     
      if(strpos($block->name , 'core/') === false) { 
        array_push($filtered_blocks, $block->name);
      }
    }

    array_push($filtered_blocks, 'core/columns');
    
    return $filtered_blocks;
}

// add_filter('allowed_block_types', 'remove_default_blocks');

// remove [...] from excerpt
function custom_excerpt_more( $excerpt ) {
  return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

// edit excerpt length
function my_excerpt_length($length){
  return 20;
}
add_filter('excerpt_length', 'my_excerpt_length', 999);

add_filter( 'gform_submit_button_1', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='button-filled__primary' id='gform_submit_button_{$form['id']}'>". __('Submit','chamber') . "</button>";
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}