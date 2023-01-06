<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chamber_of_commerce
 */

$locations = get_nav_menu_locations();
$footerBottom = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ 'footer-bottom' ] )->term_id, array( 'order' => 'DESC' ) );
$footer1 = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ 'footer-1' ] )->term_id, array( 'order' => 'DESC' ) );
$footer2 = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ 'footer-2' ] )->term_id, array( 'order' => 'DESC' ) );
$generic_settings = get_field('generic_settings','option');
$contact_details = get_field('contact_details','option');

?>
<?php get_template_part( 'template-parts/partials/ads' ); ?>

<?php get_template_part('template-parts/partials/modal') ?>	

<section class="relative py-16 overflow-hidden bg-white newsletter" >

<div class="container text-center">
    <h2 class="mb-4 font-semibold lg:h2 h3"><?= _e('Sign Up for Our Newsletter','chamber-of-commerce'); ?></h2>
    <p class="mb-12 text-dark/60"><?= _e('Sign Up to receive the latest news from the Canadian Chamber of Commerce','chamber-of-commerce'); ?></p>
    <div class="relative text-left bg-white newsletter">
        <?= do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]')  ?> 
             
    </div> 
</div> 
</section> 
  
<footer class="px-6 text-white bg-footer-background">
  <div aria-label="footer" class="w-full focus:outline-none dark:border-gray-700 lg:mx-auto md:mx-auto">
      <div class="container py-16 mx-auto lg:py-24">
          <div class="flex flex-col justify-between lg:flex-row">
            <div class="flex flex-col items-start justify-between mb-6 sm:flex-row xl:mb-0 lg:mb-0">
                <a href="/" class="cursor-pointer logo dark:text-white">
                    <img class="h-[40px] md:h-16" src="<?= $generic_settings['logo_white']['url']; ?>" alt="<?= $generic_settings['logo_white']['title']; ?>">
                </a>
                <a href="#" class="lg:hidden cta mt-8 sm:mt-0 text-sm sm:ml-6 text-white hover:text-sm hover:font-normal hover:text-bold border-b-2 border-primary hover:border-primary leading-[19px] pb-1">Member Login</a>
            </div>
              <div class="flex flex-col flex-wrap lg:flex-nowrap md:flex-row">
                <div class="flex-col order-2 pb-8 lg:pb-0 lg:pl-5 md:w-1/2 lg:w-full lg:order-1">
                    <p class="mb-3 text-sm font-bold text-white focus:outline-none dark:text-white whitespace-nowrap"><?php _e('Ottawa HQ','chamber'); ?></p>
                    <p class="mb-5 text-sm font-medium leading-7 text-footer-text whitespace-nowrap">
                        <?= $contact_details['address'] ?>
                    </p>
                    <a class="text-sm font-medium text-footer-text" href="<?= $contact_details['email']['url'] ?>"><?= $contact_details['email']['title'] ?></a><br>
                    <a class="text-sm font-medium text-footer-text" href="<?= $contact_details['phone_number']['url'] ?>"><?= $contact_details['phone_number']['title'] ?></a>
                </div>
                <div class="flex-col order-3 pb-8 lg:pb-0 md:w-1/2 lg:w-full lg:order-2 lg:pl-6 xl:pl-12">
                    <p class="mb-3 text-sm font-bold text-white focus:outline-none dark:text-white whitespace-nowrap"><?php _e('The Chamber','chamber'); ?></p>
                    <ul>
                        <?php foreach ($footer1 as $key => $item) { ?>
                            <li>
                                <a href="<?= $item->url; ?>" class="text-sm table whitespace-nowrap text-white hover:font-normal hover:text-bold border-b-2 border-footer-background hover:border-primary leading-[19px] pb-1 block mb-3 <?= $item->classes[0]; ?>"><?= $item->title; ?></a>
                            </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="flex-col order-4 lg:pb-0 md:w-1/2 lg:w-full lg:order-3 lg:pl-6 xl:pl-12">
                    <p class="mb-3 text-sm font-bold text-white focus:outline-none dark:text-white whitespace-nowrap"><?php _e('Get Involved','chamber'); ?></p>
                    <ul>
                    <?php foreach ($footer2 as $key => $item) { ?>
                            <li>
                                <a href="<?= $item->url; ?>" class="text-sm table whitespace-nowrap text-white hover:font-normal hover:text-bold border-b-2 border-footer-background hover:border-primary leading-[19px] pb-1 block mb-3 <?= $item->classes[0]; ?>"><?= $item->title; ?></a>
                            </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="flex-col order-1 pb-8 lg:pb-0 md:w-1/2 lg:w-full lg:order-4 lg:pl-6 xl:pl-12">
                    <p class="mb-3 text-sm font-bold text-white focus:outline-none dark:text-white whitespace-nowrap"><?php _e('Search our wesbite','chamber'); ?></p>
                    <div class="flex flex-col">
                    <form role="search" method="get" action="/">
                    <div class="relative">
                        <!-- <div class="absolute flex items-center h-full pl-4 text-gray-600 cursor-pointer">
                            <i class="pb-1 text-white fa-search fa"></i>
                        </div> -->
                        <input type="text" class="flex items-center border-footer-border bg-footer-search" placeholder="<?php _e('Search','chamber') ?>..." value="" name="s" id="search">
                    </div>
                    </form>    
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</footer>
<div class="px-6 text-white bg-footer-background">
  <div aria-label="footer" class="w-full focus:outline-none lg:mx-auto md:mx-auto">
      <div class="container mx-auto">
          <div class="flex py-8 flex-wrap flex-col-reverse lg:flex-row justify-between border-t-[1px] border-footer-border">
              <div class="sm:mx-auto lg:mx-0 lg:mb-0">
                  <p tabindex="0" class="flex flex-col text-sm leading-5 text-white sm:text-center lg:flex-row focus:outline-none dark:text-white">&copy; <?= Date('Y'); ?> <?php _e('Canadian Chamber of Commerce','chamber')?> <a href="https://anyday.inc/" class="pl-5 text-white" target="_blank" class="lg:pl-12"><?php _e('Powered by Anyday','chamber') ?><sup>®</sup></a></p>
              </div>
              <div class="mb-8 sm:mx-auto lg:mx-0 lg:mb-0">
                  <ul class="flex flex-col justify-end md:flex-row">
                    <?php foreach ($footerBottom as $key => $item) { ?>
                        <li class="text-left sm:text-center">
                            <a href="<?= $item->url ?>" class="text-sm sm:ml-6 text-white hover:text-sm hover:font-normal hover:text-bold border-b-2 border-footer-background hover:border-primary leading-[19px] pb-1 <?= $item->classes[0]; ?>"><?= $item->title; ?></a>
                        </li>
                    <?php }?>
                    <li class="hidden lg:block">
                    <?php if (is_user_logged_in()) { ?>
                        <a href="<?= wp_logout_url(); ?>" class=" sm:ml-6 button-filled__primary" tabindex="0"><?php _e('Logout','chamber') ?></a>
                    <?php } else { ?>
                        <a href="<?= wp_login_url(); ?>" class=" sm:ml-6 button-filled__primary" tabindex="0"><?php _e('Login','chamber') ?></a>
                    <?php } ?>
                    </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>


<?php wp_footer(); ?>
<script>
  window.onUsersnapCXLoad = function(api) {
    api.init();
  }
  var script = document.createElement('script');
  script.defer = 1;
  script.src = 'https://widget.usersnap.com/global/load/4301456a-40b0-4e53-9edd-e491d7d737f8?onload=onUsersnapCXLoad';
  document.getElementsByTagName('head')[0].appendChild(script);
</script>
</body>
</html>
