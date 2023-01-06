<?php
/**
 * Template Name: SSO Login Page
 */


function validate_sso_entry()
{
    if (!$_GET['sso-redirect']) {
        wp_redirect('/login');
        exit;
    }
}

function handled_sso_redirect()
{
    $request = new WP_REST_Request('POST', '/jwt-auth/v1/token');
    $response = rest_do_request($request);
    $server = rest_get_server();
    $data_res = $server->response_to_data($response, false);
    if (array_key_exists('data', $data_res)) {
        $data = $data_res['data'];
        if ($data['status'] === 403) {
            return;
        }
    }
    $token = $data_res['token'];
    $redirect_params = array();
    $redirect_params['token'] = $token;
    $user = wp_get_current_user();
    if ($user->ID != 0) {
        update_user_meta($user->ID, 'jwt_token', $token);
        wp_redirect(urldecode($_GET['sso-redirect']) . '?' . http_build_query($redirect_params));
    }

    exit;
}

validate_sso_entry();
handled_sso_redirect();

get_header();

get_template_part('template-parts/content-sso');

get_footer();
