<?php

/* Main redirection of the default login page */
function redirect_login_page() {
	if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
		if ( is_user_logged_in() ) {
			wp_redirect( home_url( 'dashboard' ) );
			exit;
		}	

		// The rest are redirected to the login page
		$login_url = home_url( 'login' );
		if ( ! empty( $redirect_to ) ) {
				$login_url = add_query_arg( 'redirect_to', $redirect_to, $login_url );
		}

		wp_redirect( $login_url );
		exit;
	}
}
add_action('login_form_login','redirect_login_page');

function redirect_to_custom_lostpassword() {
	if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
			if ( is_user_logged_in() ) {
					wp_redirect( home_url( 'dashboard' ) );
					exit;
			}

			wp_redirect( home_url( 'forgot-password' ) );
			exit;
	}
}
add_action( 'login_form_lostpassword', 'redirect_to_custom_lostpassword' );

function do_password_lost() {
	if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
			$errors = retrieve_password();
			if ( is_wp_error( $errors ) ) {
					// Errors found
					$redirect_url = home_url( 'forgot-password' );
					$redirect_url = add_query_arg( 'errors', join( ',', $errors->get_error_codes() ), $redirect_url );
			} else {
					// Email sent
					$redirect_url = home_url( 'login' );
					$redirect_url = add_query_arg( 'checkemail', 'confirm', $redirect_url );
			}

			wp_redirect( $redirect_url );
			exit;
	}
}
add_action( 'login_form_lostpassword', 'do_password_lost' );

function replace_retrieve_password_message( $message, $key, $user_login, $user_data ) {
	// Create new message
	$msg  = __( 'Hello!', 'personalize-login' ) . "\r\n\r\n";
	$msg .= sprintf( __( 'You asked us to reset your password for your account using the email address %s.', 'personalize-login' ), $user_login ) . "\r\n\r\n";
	$msg .= __( "If this was a mistake, or you didn't ask for a password reset, just ignore this email and nothing will happen.", 'personalize-login' ) . "\r\n\r\n";
	$msg .= __( 'To reset your password, visit the following address:', 'personalize-login' ) . "\r\n\r\n";
	$msg .= site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ) . "\r\n\r\n";
	$msg .= __( 'Thanks!', 'personalize-login' ) . "\r\n";

	return $msg;
}
add_filter( 'retrieve_password_message', 'replace_retrieve_password_message', 10, 4 );

function redirect_to_custom_password_reset() {
	if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
			// Verify key / login combo
			$user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );
			if ( ! $user || is_wp_error( $user ) ) {
					if ( $user && $user->get_error_code() === 'expired_key' ) {
							wp_redirect( home_url( 'login?login=expiredkey' ) );
					} else {
							wp_redirect( home_url( 'login?login=invalidkey' ) );
					}
					exit;
			}

			$redirect_url = home_url( 'password-reset' );
			$redirect_url = add_query_arg( 'login', esc_attr( $_REQUEST['login'] ), $redirect_url );
			$redirect_url = add_query_arg( 'key', esc_attr( $_REQUEST['key'] ), $redirect_url );

			wp_redirect( $redirect_url );
			exit;
	}
}
add_action( 'login_form_rp', 'redirect_to_custom_password_reset' );
add_action( 'login_form_resetpass', 'redirect_to_custom_password_reset' );

function do_password_reset() {
	if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
			$rp_key = $_REQUEST['rp_key'];
			$rp_login = $_REQUEST['rp_login'];

			$user = check_password_reset_key( $rp_key, $rp_login );

			if ( ! $user || is_wp_error( $user ) ) {
					if ( $user && $user->get_error_code() === 'expired_key' ) {
							wp_redirect( home_url( 'login?login=expiredkey' ) );
					} else {
							wp_redirect( home_url( 'login?login=invalidkey' ) );
					}
					exit;
			}

			if ( isset( $_POST['pass1'] ) ) {
					if ( $_POST['pass1'] != $_POST['pass2'] ) {
							// Passwords don't match
							$redirect_url = home_url( 'password-reset' );

							$redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
							$redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
							$redirect_url = add_query_arg( 'error', 'password_reset_mismatch', $redirect_url );

							wp_redirect( $redirect_url );
							exit;
					}

					if ( empty( $_POST['pass1'] ) ) {
							// Password is empty
							$redirect_url = home_url( 'password-reset' );

							$redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
							$redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
							$redirect_url = add_query_arg( 'error', 'password_reset_empty', $redirect_url );

							wp_redirect( $redirect_url );
							exit;
					}

					// Parameter checks OK, reset password
					reset_password( $user, $_POST['pass1'] );
					wp_redirect( home_url( 'login?password=changed' ) );
			} else {
					echo "Invalid request.";
			}

			exit;
	}
}
add_action( 'login_form_rp', 'do_password_reset');
add_action( 'login_form_resetpass', 'do_password_reset');

function maybe_redirect_at_authenticate( $user, $username, $password ) {
	// Check if the earlier authenticate filter (most likely, 
	// the default WordPress authentication) functions have found errors
	if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
			if ( is_wp_error( $user ) ) {
					$error_codes = join( ',', $user->get_error_codes() );

					$login_url = home_url( 'login' );
					$login_url = add_query_arg( 'login', $error_codes, $login_url );

					wp_redirect( $login_url );
					exit;
			}
	}

	return $user;
}
add_filter( 'authenticate', 'maybe_redirect_at_authenticate', 101, 3 );

function redirect_after_logout() {
	$redirect_url = home_url( 'login?logged_out=true' );
	wp_safe_redirect( $redirect_url );
	exit;
}
add_action( 'wp_logout', 'redirect_after_logout' );

add_filter( 'login_redirect', 'redirect_after_login', 10, 3 );
function redirect_after_login( $redirect_to, $requested_redirect_to, $user ) {
	$redirect_url = home_url();

	if ( ! isset( $user->ID ) ) {
			return $redirect_url;
	}

	$redirect_url = home_url( 'dashboard' );

	return wp_validate_redirect( $redirect_url, home_url() );
}


// /* Where to go if a login failed */
// function custom_login_failed($username) {
// 	$login_page  = home_url('/login/');
// 	wp_redirect($login_page . '?username='. $username . '&password=invalid');
// 	exit;
// }
// add_action('wp_login_failed', 'custom_login_failed');

// /* Where to go if any of the fields were empty */
// function verify_user_pass($user, $username, $password) {
// 	$login_page  = home_url('/login/');
//   $query = "?";
// 	if($username == "") {
// 		$query .= "username=false";
// 	} else {
//     $query .= "username=" . $username;
//   }
// 	if($password == "") {
// 		$query .= "&password=false";
// 	}
//   wp_redirect($login_page . $query);
// }
// add_filter('authenticate', 'verify_user_pass', 1, 3);

// /* What to do on logout */
// function logout_redirect() {
// 	$login_page  = home_url('/login/');
// 	wp_redirect($login_page . "?login=false");
// 	exit;
// }
// add_action('wp_logout','logout_redirect');
