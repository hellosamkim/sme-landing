<?php
/**
 * Plugin Name: Tradewing Integration
 */

 function user_map ($user) {
    return array(
      "Integration ID" => $user->data->ID,
      "First Name" => get_user_meta( $user->data->ID, 'first_name', true ),
      "Last Name" => get_user_meta( $user->data->ID, 'last_name', true ),
      "Credentials" => get_user_meta( $user->data->ID, 'ccc_prefix', true ), // Prefix
      "Primary Phone Number" => get_user_meta( $user->data->ID, 'telephone1', true ), // Business Phone Number
      "Job Title" => get_user_meta( $user->data->ID, 'jobtitle', true ),  //
      "Primary Address Information" => get_user_meta( $user->data->ID, 'primary_address_information', true ),
      "Membership Status Field" => get_user_meta( $user->data->ID, 'membershipstatus', true ),
      "Chamber Access Pass" => get_user_meta( $user->data->ID, 'new_businessaccesspass', true ),
      "Email" => $user->data->user_email,
      "Last Update" => get_user_meta( $user->data->ID, 'last_update', true )
   );
 }

 function tradewing_get_users ( $params ) {

   $data = $params->get_params();

   $stuff = get_users();
   $stuff = array_map( function ($x) {
      //return $x;
      return user_map($x);
   }, $stuff);

   $stuff = array_values($stuff);

   if (isset($data['Updated_Since'])) {
      $updated_since = intval($data['Updated_Since']);

      $stuff = array_filter( $stuff, function ($x) use ($updated_since)  {
         return intval($x['Last Update']) > $updated_since;
      });
   }
   $stuff = array_values($stuff);

   $limit = intval($data['limit'] ?? null);
   $offset = intval($data['offset'] ?? 0);
   $total_offset = $limit * $offset;
   if ($limit) {
      $stuff = array_slice( $stuff, $total_offset, $limit );
   }
   return $stuff;
 }

 function tradewing_get_user ( $params ) {

   $u_id = $params['id'];
   $stuff = [get_user_by('id', $u_id)];
   return array_map( function ($x) {
      //return $x;
      return user_map($x);
   }, $stuff)[0];
}

function tradewing_get_committees ( $params ) {
   
   $params = $params->get_params();

   $data = get_posts([
      'post_type' => 'marketinglist',
      'numberposts' => -1
   ]);
   $stuff = array_map( function ($x) {

      return  array(
         "Integration ID" => $x->ID,
         "Name" => $x->post_title
      );
   }, $data);
   $limit = $params['limit'] ?? null;
   $offset = intval($params['offset'] ?? 0);
   $total_offset = intval($limit) * $offset;
   if ($limit) {
      $stuff = array_slice( $stuff, $total_offset, $limit );
   }
   return $stuff;
}

function tradewing_get_committees_users ( $params ) {
   
   
   $params = $params->get_params();

   $id = $params['id'];
   $data = get_posts([
      'post_type' => 'marketinglist',
      'id' => $id,
      'numberposts' => 1
   ]);
   $stuff = array_map( function ($x) {
      $users = get_field('users', $x->ID);
      $users_array = array();
      foreach ($users as $key => $value) {
         array_push($users_array, get_user_by('id', $value['ID']));
      }
      $users_array = array_map( function ($y) {
         return user_map($y);
      }, $users_array);
   
      $users_array = array_values($users_array);
      return $users_array;
   }, $data)[0];
   $limit = $params['limit'] ?? null;
   $offset = intval($params['offset'] ?? 0);
   $total_offset = intval($limit) * $offset;
   if ($limit) {
      $stuff = array_slice( $stuff, $total_offset, $limit );
   }
   return $stuff;
}

function tradewing_get_groups ( $params ) {
   return get_wp_roles();
}

function get_wp_roles () {
   global $wp_roles;
   $roles = wp_roles()->get_names();
   $res = array();

   $i = 0;
   foreach( $roles as $role ) {
      array_push( $res, array(
         "name" => translate_user_role( $role ),
         "id" => $i++
      ));
   }
   return $res;
}

function tradewing_get_users_by_group ( $params ) {
   $data = $params->get_params();
   $id = $data['id'];

   $roles = get_wp_roles();

   $args = array(
      'role'    => $roles[intval($id)]['name'],
      'orderby' => 'user_nicename',
      'order'   => 'ASC'
   );
   $users = get_users( $args );
   $users = array_map( function ($x) {
      //return $x;
      return user_map($x);
   }, $users);
   return $users;
}

function tradewing_sso_handler ( $params ) {
   $data = $params->get_params();

   $username = $data['log'];

   if ( isset($data['pwd'])) {
      $password = $data['pwd'];
      //$url = $data['url'];

      $auth = wp_authenticate( $username, $password );

      $redirect_url = '/sso-login';
      $redirect_params = array (
            'sso-redirect' => $data['redirect_to'],
      );

      if ( is_wp_error( $auth ) ) {

         $error_codes = $auth->get_error_codes();
         foreach ( $error_codes as $err_code ) {
            $redirect_params['error'] = $err_code;
         }
         wp_redirect('/sso-login?' . http_build_query($redirect_params) );
         exit;
      } else {
         $request = new WP_REST_Request('POST', '/jwt-auth/v1/token');
         $request->set_param('username', $username);
         $request->set_param('password', $password);
         $response = rest_do_request( $request );
         $server = rest_get_server();
         $data_res = $server->response_to_data( $response, false );
         $json = wp_json_encode( $data_res );
         $token = $data_res['token'];
         $redirect_params['token'] = $token;

         $user = get_user_by( 'email', $username );
         update_user_meta( $user->ID, 'jwt_token', $token);

         unset($redirect_params['sso-redirect']);
         wp_redirect(urldecode($data['redirect_to']) . '?' . http_build_query($redirect_params) );
         exit;
      }
   }
}

require_once plugin_dir_path( __FILE__ ) . 'hooks.php';
require_once plugin_dir_path( __FILE__ ) . 'routes.php';
