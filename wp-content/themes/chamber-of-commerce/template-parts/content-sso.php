<?php
  if (is_user_logged_in()) {
    wp_redirect('/dashboard', 302);
  }
  $username = (isset($_GET['username']) ) ? $_GET['username'] : "";
  $action = (isset($_GET['action']) ) ? $_GET['action'] : "";
  if ($_GET['login'] == "incorrect_password") {
    $error_password = "error";
  }
  if ($_GET['login'] == "invalid_username") {
    $error_username = "error";
  }
  if ($_GET['checkemail'] == "confirm") {
    $confirmEmail = true;
  }
  if ($_GET['login'] == "invalidkey" || $_GET['login'] == "expiredkey") {
    $invalidKey = true;
  }
  if ($_GET['logged_out'] == "true") {
    $loggedOut = true;
  }
?>
<div class="container">
  <div class="max-w-xl py-16 m-auto text-center">
    <h1>Login</h1>
    <p class="mt-5">Log into our member portal here. If you need assistance, please contact <a href="mailto:info@chamber.ca">info@chamber.ca</a> or <a href="tel:6132384000">613.238.4000 (2221)</a>.</p>
    <?php if ($confirmEmail) { ?>
      <div class="p-2 my-6 text-white bg-primary">
        <h4>*Check your email for a link to reset your password*</h4>
      </div>
    <?php } ?>
    <?php if ($invalidKey) { ?>
      <div class="p-2 my-6 text-white bg-primary">
        <h4>*Password reset failed. Please try again.*</h4>
      </div>
    <?php } ?>
    <?php if ($loggedOut) { ?>
      <div class="p-2 my-6 text-white bg-primary">
        <h4>You have successfully signed out.</h4>
      </div>
    <?php } ?>
    <div class="my-8 text-left">
        <form name="loginform" id="loginform" action="/wp-json/tradewing/v1/sso" method="post" novalidate="novalidate" target="_top">
        <div class="flex justify-center max-w-md mx-auto">
          <p class="w-full mx-2 login-username">
            <label for="user_login" class="form-label">Username</label>
            <input type="text" name="log" id="user_login" placeholder="Username" value="<?= $username; ?>" autocomplete="username" class="w-full input <?= $error_username; ?>" required>
            <?php if ($error_username) { ?>
              <span class="breadcrumbs text-primary">Invalid Username</span>
            <?php } ?>
          </p>
          <p class="w-full mx-2 login-password">
            <label for="user_pass" class="form-label">Password</label>
            <input type="password" name="pwd" id="user_pass" placeholder="Password" autocomplete="current-password" class="w-full input <?= $error_password; ?>" required>
            <?php if ($error_password) { ?>
              <span class="breadcrumbs text-primary">Invalid Password</span>
            <?php } ?>
          </p>
        </div>
        <div class="flex justify-center max-w-md px-2 mx-auto mt-4">
          <input type="submit" name="wp-submit" id="wp-submit" class="w-full cursor-pointer button button-filled__primary" value="Log In">
          <input type="hidden" name="redirect_to" value="<?= $_GET['sso-redirect'] ?>">
        </div>
        </p>
      </form>
      <div class="mt-4 text-center">
        <p><a href="<?= wp_lostpassword_url(); ?>" class="mx-auto">Forgot my password?</a></p>
      </div>
    </div>
    <div class="mt-48">
      <a href="https://www.e-ata.ca/default.aspx" target="_blank" class="mx-2 button-outline__primary">LOG INTO E-ATA CARNET</a>
      <a href="http://www.tradecert.com/canada" target="_blank" class="mx-2 button-outline__primary">LOG INTO TRADECERT</a>
    </div>
  </div> 
</div>