<?php
  $username = (isset($_GET['username']) ) ? $_GET['username'] : "";
  $action = (isset($_GET['action']) ) ? $_GET['action'] : "";
  if ($_GET['errors'] == "invalidcombo") {
    $error_username = "error";
  }
?>
<div class="container">
  <div class="max-w-xl py-16 m-auto text-center">
    <h1>Forgot Password</h1>
    <p class="mt-5">Please enter your username or email address.<br>You will receive a link to create a new password via email.</p>
    <div class="my-8 text-left">
      <form id="lostpasswordform" action="<?php echo wp_lostpassword_url(); ?>" method="post">
        <div class="flex justify-center max-w-md mx-auto">
          <p class="w-full mx-2 login-username">
            <label for="user_login" class="form-label">Username</label>
            <input type="text" name="user_login" id="user_login" placeholder="Username" value="<?= $username; ?>" autocomplete="username" class="w-full input <?= $error_username; ?>" required>
            <?php if ($error_username) { ?>
              <span class="breadcrumbs text-primary">Invalid Username</span>
            <?php } ?>
          </p>
        </div>
        <div class="flex justify-center max-w-md px-2 mx-auto mt-4">
          <input type="submit" name="submit" class="w-full cursor-pointer lostpassword-button button button-filled__primary"
                value="<?php _e( 'Reset Password', 'personalize-login' ); ?>"/>
        </div>
      </form>
      <div class="mt-4 text-center">
        <p><a href="<?= wp_login_url(); ?>" class="mx-auto">Back to login</a></p>
      </div>
    </div>
  </div> 
</div>