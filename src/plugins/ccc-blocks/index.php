<?php
 /*
 Plugin Name: CCC Blocks
 Description: Plugin that add blocks for Gutenberg editor
 Author: Author Name
 Version: 1.0
 */

 defined( 'ABSPATH' ) || exit;
 include "question_block/question_block.php";
 include "links_block/links_block.php";
 include "featured_person/featured_person.php";
 include 'call_to_action_a/call_to_action_a.php';
 include 'call_to_action_b/call_to_action_b.php';
 include 'call_to_action_c/call_to_action_c.php';
 include 'call_to_action_d/call_to_action_d.php';
 include 'call_to_action_e/call_to_action_e.php';
 include 'call_to_action_f/call_to_action_f.php';
 include 'call_to_action_g/call_to_action_g.php';
 include 'cta_container/cta_container.php';
 include "sidebar_block/sidebar_block.php";
 include "faq/faq.php";
 //include "ccc_tab/ccc_tab.php";
 include "activity_block/activity_block.php";

    // add CCC Blocks block category
add_filter('block_categories', 'create_block_category', 10, 2);

 /**
  * Check Array for Value Recursive
  */
 function in_array_r($needle, $haystack, $strict = false){
     if(is_array($haystack) && !empty($haystack)){
         foreach($haystack as $item){
             if(($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))){
                 return true;
             }
         }
     }

     return false;
 }

 /**
  * Add CCC Blocks Gutenberg Block Category
  */
 function create_block_category($categories, $post){
     if(in_array_r('ccc_blocks', $categories)){
         return $categories;
     }

     return array_merge($categories, array(array('slug' => 'ccc_blocks', 'title' => __('CCC Blocks', 'ccc_blocks'))));
 }

 ?>