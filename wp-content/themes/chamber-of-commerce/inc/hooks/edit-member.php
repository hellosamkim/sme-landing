<?php
  add_action('wp_ajax_edit_member_information', 'edit_member_information'); // wp_ajax_{ACTION HERE}
  add_action('wp_ajax_nopriv_edit_member_information', 'edit_member_information');

  function edit_member_information() {
   //   $user_id = $_POST['user_id'];
   //   update_user_meta($user_id, 'favourites_products', $user_profile);

   
    $response = array('status' => false);

    if ( $_POST ) {

        $user_ID    = get_current_user_id(); 
      //   $first_name = $_POST['first_name'];
      //   $last_name  = $_POST['last_name'];
      //   $last_name  = $_POST['email'];
      //   $last_name  = $_POST['phone'];
       
      //   update_user_meta( $user_ID, 'first_name', $first_name );  
      //   update_user_meta( $user_ID, 'last_name', $last_name ) 
      //   update_user_meta( $user_ID, 'email', $last_name ) 

        if ( $_FILES ) {
  
            $uploadedImage     = $_FILES['user_profile'];
            $uploadedImagePath = $uploadedImage['name'];
            $extension         = pathinfo( $uploadedImagePath, PATHINFO_EXTENSION );
            $newImageName      = 'profile'.$user_ID;

            require_once( ABSPATH . 'wp-admin/includes/image.php' );
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
            require_once( ABSPATH . 'wp-admin/includes/media.php' );

            $attchment_ID = media_handle_upload( 'user_profile', 0 ); // Get Media Image Id.

            if ( $attchment_ID ) {

                $update = apply_filters( 'attachment_fields_to_save', ['ID' => $attchment_ID, 'post_title' => $newImageName ], [] );

                wp_update_post($update); // Update Profile Image Name.  

                update_field( 'headshot', $attchment_ID, 'user_'.$user_ID ); // Update Image Post Id.

               $response['status'] = true;
               $response['url'] = wp_get_attachment_url($attchment_ID);
            }

        }
    }

    wp_send_json_success( $response ); // Response. 
  
  }

add_action('wp_ajax_loadTemplate', 'loadTemplate'); 
add_action('wp_ajax_nopriv_loadTemplate', 'loadTemplate');

function loadTemplate() {
   $type = $_POST['type'];
 
   if($type === 'business'){
      $result = get_template_part('template-parts/partials/forms/business');
      echo  $result;
      die();
   }
    if($type === 'association'){
      $result = get_template_part('template-parts/partials/forms/associations');
      echo  $result;
      die();
   }
    if($type === 'chamberNo'){
      $result = get_template_part('template-parts/partials/forms/chamber-no');
      echo  $result;
      die();
   }

}


add_action('wp_ajax_loadModal', 'loadModal'); 
add_action('wp_ajax_nopriv_loadModal', 'loadModal');

function loadModal() {
   $type = $_POST['type'];
 
   if($type === 'membership'){
      $result = get_template_part('template-parts/partials/modal/membership-modal');
      echo  $result;
      die();
   } 
 
   if($type === 'arbitrator'){
      $result = get_template_part('template-parts/partials/modal/arbitrator-modal');
      echo  $result;
      die();
   } 

}