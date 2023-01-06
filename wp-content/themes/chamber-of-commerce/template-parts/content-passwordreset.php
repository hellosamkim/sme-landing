<?php
  $username = (isset($_GET['username']) ) ? $_GET['username'] : "";
  $action = (isset($_GET['action']) ) ? $_GET['action'] : "";
  $login = (isset($_GET['login']) ) ? $_GET['login'] : "";
  $key = (isset($_GET['key']) ) ? $_GET['key'] : "";
  if ($_GET['errors'] == "invalidcombo") {
    $error_username = "error";
  }
?>
<div class="container">
  <div class="max-w-xl py-16 m-auto text-center">
    <h1>Pick a Password</h1>
    <p class="mt-5">Please enter your new password below.</p>
    <div class="my-8 text-left">
      <form name="resetpassform" id="resetpassform" action="<?php echo site_url( 'wp-login.php?action=resetpass' ); ?>" method="post" autocomplete="off">
       <input type="hidden" id="user_login" name="rp_login" value="<?php echo $login ; ?>" autocomplete="off" />
        <input type="hidden" name="rp_key" value="<?php echo $key; ?>" />
         
        <div class="flex flex-col justify-center max-w-md mx-auto">
        <p class="w-full">
            <label for="pass1" class="form-label"><?php _e( 'New password', 'personalize-login' ) ?></label>
            <input type="password" name="pass1" id="pass1" class="w-full input" size="20" value="" autocomplete="off" required />
        </p>
        <p class="w-full mt-5">
            <label for="pass2" class="form-label"><?php _e( 'Repeat new password', 'personalize-login' ) ?></label>
            <input type="password" name="pass2" id="pass2" class="w-full input" size="20" value="" autocomplete="off" required />
        </p>
        </div>
        <div class="flex justify-center max-w-md mx-auto mt-4">
          <input type="submit" name="submit" id="resetpass-button" class="w-full cursor-pointer lostpassword-button button button-filled__primary"
                value="<?php _e( 'Reset Password', 'personalize-login' ); ?>"/>
        </div>
      </form>
      <div class="mt-4 text-center">
        <p><a href="<?= wp_login_url(); ?>" class="mx-auto">Back to login</a></p>
      </div>
    </div>
  </div> 
</div>