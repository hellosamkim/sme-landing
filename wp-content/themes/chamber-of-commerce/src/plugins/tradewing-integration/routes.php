<?php 

add_action('rest_api_init', function () {

    register_rest_route('tradewing/v1', 'users/', [
        'methods' => 'GET',
        'callback' => 'tradewing_get_users',
        'permission_callback' => function ($request) {
            if (current_user_can('edit_others_posts'))
                return true;
        }
    ]);

    register_rest_route('tradewing/v1', 'users/(?<id>\d+)/', [
        'methods' => 'GET',
        'callback' => 'tradewing_get_user',
        'permission_callback' => function ($request) {
            if (current_user_can('edit_others_posts'))
                return true;
        }
    ]);

    register_rest_route('tradewing/v1', 'committees', [
        'methods' => 'GET',
        'callback' => 'tradewing_get_committees'
    ]);

    register_rest_route('tradewing/v1', 'committees/(?<id>\d+)/users', [
        'methods' => 'GET',
        'callback' => 'tradewing_get_committees_users'
    ]);

    register_rest_route('tradewing/v1', 'groups', [
        'methods' => 'GET',
        'callback' => 'tradewing_get_groups'
    ]);

    register_rest_route('tradewing/v1', 'groups/(?<id>\d+)/users', [
        'methods' => 'GET',
        'callback' => 'tradewing_get_users_by_group'
    ]);

    register_rest_route('tradewing/v1', 'sso', [
        'methods' => 'POST',
        'callback' => 'tradewing_sso_handler'
    ]);
    

});