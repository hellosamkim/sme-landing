<?php

add_action( 'user_register', function ( $user_id ) {
    $userdata = array();
    $userdata['ID'] = $user_id;
    $userdata['updated_since'] = current_datetime();
    wp_update_user( $userdata );
} );

add_filter(
    'jwt_auth_expire',
    function ( $expire, $issued_at ) {
        // Set $expire to 30 days.
        $expire = time() + (86400 * (1 * 30));
        return $expire;
    },
    10,
    2
);