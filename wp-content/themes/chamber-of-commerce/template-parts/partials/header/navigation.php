<?php 
  $social_media = get_field('social_media','option');
  $locations = get_nav_menu_locations();
  $topbaritems = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ 'top-bar' ] )->term_id, array( 'order' => 'DESC' ) );
  $menuitems = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ 'main' ] )->term_id, array( 'order' => 'DESC' ) );
  $mobilemenuitems = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ 'main' ] )->term_id, array( 'order' => 'DESC' ) );
  $generic_settings = get_field('generic_settings','option');
?>
<div class="relative nav">
  <div class="hidden top-bar bg-header-topbar lg:block">
    <div class="container flex justify-end">
      <ul class="flex flex-row space-x-5 social-media">
        <?php if ($social_media['facebook']) { ?>
        <li><a target="_blank" href="<?= $social_media['facebook'] ?>"><i class="text-sm text-dark fa fa-facebook hover:text-primary"></i></a></li>
        <?php } ?>
        <?php if ($social_media['instagram']) { ?>
        <li><a target="_blank"  href="<?= $social_media['instagram'] ?>"><i class="text-sm text-dark fa fa-instagram hover:text-primary"></i></a></li>
        <?php } ?>
        <?php if ($social_media['linkedin']) { ?>
        <li><a target="_blank"  href="<?= $social_media['linkedin'] ?>"><i class="text-sm text-dark fa fa-linkedin hover:text-primary"></i></a></li>
        <?php } ?>
        <?php if ($social_media['twitter']) { ?>
        <li><a target="_blank"  href="<?=$social_media['twitter']?>"><i class="text-sm text-dark fa fa-twitter hover:text-primary"></i></a></li>
        <?php } ?>
      </ul>
      <?php if (is_user_logged_in()) { ?>
        <div class="relative flex items-center menu-cta">
        <a class="text-xs font-medium flexitems-center hover:text-primary open-profile !text-white" href="#">Hello, <?= wp_get_current_user()->display_name; ?>        
        </a>
        <?php get_template_part('template-parts/partials/header/dashboard') ?>
        </div>
      <?php } else { ?>
        <div class="ml-8 menu-cta"><a class="flex items-center text-xs font-medium !text-white" href="<?= wp_login_url(); ?>">Login</a></div>
      <?php } ?>
      <?php foreach ($topbaritems as $key => $item) { ?>
        <?php
           if (wp_get_post_parent_id()) {
            $cur_id = wp_get_post_parent_id();
           } else {
            $cur_id = get_the_ID();
           }
          ?>
        <a class="text-xs ml-8 flex items-center font-medium hover:text-primary <?= $item->classes[0]; ?> <?php if ($cur_id == $item->object_id) { echo "active"; } ?>" href="<?= $item->url; ?>"><?= $item->title; ?></a>
      <?php } ?>
    </div>
  </div>
  <!-- For large screens -->
  <nav class="py-3 lg:px-6 dark:bg-gray-900 border-shadow">
    <div class="container relative flex items-center justify-between mx-auto">
        <a href="<?=  get_home_url(); ?>" class="cursor-pointer logo md:w-3/12 dark:text-white">
            <img class="py-2 lg:py-0 h-[60px]" src="<?= $generic_settings['logo']['url']; ?>" alt="<?= $generic_settings['logo']['title']; ?>">
        </a>
        <ul class="items-center justify-end hidden w-9/12 space-x-8 lg:flex">
            <?php foreach ($menuitems as $key => $item) { ?>
              <?php
              if (wp_get_post_parent_id()) {
                $cur_id = wp_get_post_parent_id();
              } else {
                $cur_id = get_the_ID();
              }
              ?>
              <li>
                <a href="<?= $item->url; ?>" class="text-xs lg:text-right block xl:text-sm text-dark font-medium hover:font-medium hover:border-b-2 border-primary leading-[19px] hover:text-bold <?php if ($cur_id == $item->object_id) { echo "active"; } ?>"><?= $item->title; ?></a>
              </li>
            <?php }?>
            <div class="items-center">
                <button aria-label="search items" class="w-5 text-gray-800 search-btn dark:hover:text-gray-300 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-800">
                  <i class="pb-1 fa-search fa hover:border-b-2 border-primary"></i>
                </button>
            </div>
        </ul>
        <div class="space-y-2 cursor-pointer hamburger lg:hidden">
          <div class="w-8 h-[3px] bg-dark"></div>
          <div class="w-8 h-[3px] bg-dark"></div>
          <div class="w-8 h-[3px] bg-dark"></div>
      </div>
        <div class="searchbar z-20 hidden absolute max-w-[300px] search-shadow flex items-center right-0 top-20">
        <form role="search" method="get" action="/">
          <input class="min-w-[300px]" type="text" placeholder="<?php _e('Search','chamber') ?>..." value="" name="s" id="search">
        </form>
          <i class="absolute text-xs cursor-pointer close fa-solid fa-xmark text-primary right-4"></i>
        </div>
    </div>
  </nav>
</div>

<div class="nav fixed transition-all duration-700 left-0 z-30 w-full bg-white top-[-200px]">
  <div class="hidden top-bar bg-header-topbar lg:block">
    <div class="container flex justify-end">
      <ul class="flex flex-row space-x-5 social-media">
        <?php if ($social_media['facebook']) { ?>
        <li><a target="_blank"  href="<?=$social_media['facebook'] ?>"><i class="text-sm text-dark fa fa-facebook hover:text-primary"></i></a></li>
        <?php } ?>
        <?php if ($social_media['instagram']) { ?>
        <li><a target="_blank"  href="<?=$social_media['instagram'] ?>"><i class="text-sm text-dark fa fa-instagram hover:text-primary"></i></a></li>
        <?php } ?>
        <?php if ($social_media['linkedin']) { ?>
        <li><a target="_blank"  href="<?=$social_media['linkedin'] ?>"><i class="text-sm text-dark fa fa-linkedin hover:text-primary"></i></a></li>
        <?php } ?>
        <?php if ($social_media['twitter']) { ?>
        <li><a target="_blank"  href="<?=$social_media['twitter'] ?>"><i class="text-sm text-dark fa fa-twitter hover:text-primary"></i></a></li>
        <?php } ?>
      </ul>
      <?php if (is_user_logged_in()) { ?>
        <div class="relative flex items-center menu-cta">
        <a class="text-xs font-medium flexitems-center hover:text-primary open-profile !text-white" href="#">Hello, <?= wp_get_current_user()->display_name; ?>        
        </a>
        <?php get_template_part('template-parts/partials/header/dashboard') ?>
        </div>
      <?php } else { ?>
        <div class="ml-8 menu-cta"><a class="flex items-center text-xs font-medium !text-white" href="<?= wp_login_url(); ?>">Login</a></div>
      <?php } ?>
      <?php foreach ($topbaritems as $key => $item) { ?>
        <a class="text-xs ml-8 flex items-center font-medium hover:text-primary <?= $item->classes[0]; ?>" href="<?= $item->url; ?>"><?= $item->title; ?></a>
      <?php } ?>
    </div>
  </div>
  <!-- For large screens -->
  <nav class="py-3 lg:px-6 dark:bg-gray-900 border-shadow">
    <div class="container relative flex items-center justify-between mx-auto">
        <a href="<?=  get_home_url(); ?>" class="cursor-pointer logo md:w-3/12 dark:text-white">
            <img class="py-2 lg:py-0 h-[60px]" src="<?= $generic_settings['logo']['url']; ?>" alt="<?= $generic_settings['logo']['title']; ?>">
        </a>
        <ul class="items-center justify-end hidden w-9/12 space-x-8 lg:flex">
            <?php foreach ($menuitems as $key => $item) { ?>
              <?php
              if (wp_get_post_parent_id()) {
                $cur_id = wp_get_post_parent_id();
              } else {
                $cur_id = get_the_ID();
              }
              ?>
              <li>
                <a href="<?= $item->url; ?>" class="text-xs lg:text-right block xl:text-sm text-dark font-medium hover:font-medium hover:border-b-2 border-primary leading-[19px] hover:text-bold <?php if ($cur_id == $item->object_id) { echo "active"; } ?>"><?= $item->title; ?></a>
              </li>
            <?php }?>
            <div class="items-center">
                <button aria-label="search items" class="w-5 text-gray-800 search-btn dark:hover:text-gray-300 dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-800">
                  <i class="pb-1 fa-search fa hover:border-b-2 border-primary"></i>
                </button>
            </div>
        </ul>
        <div class="space-y-2 cursor-pointer hamburger lg:hidden">
          <div class="w-8 h-[3px] bg-dark"></div>
          <div class="w-8 h-[3px] bg-dark"></div>
          <div class="w-8 h-[3px] bg-dark"></div>
      </div>
        <div class="searchbar z-20 hidden absolute max-w-[300px] search-shadow flex items-center right-0 top-20">
        <form role="search" method="get" action="/">
          <input class="min-w-[300px]" type="text" placeholder="<?php _e('Search','chamber') ?>..." value="" name="s" id="search">
        </form>
          <i class="absolute text-xs cursor-pointer close fa-solid fa-xmark text-primary right-4"></i>
        </div>
    </div>
  </nav>
</div>
<!-- For small screen -->
<nav id="mobile-menu" class="fixed inset-0 z-50 flex hidden w-full h-screen px-6 mt-20 bg-white lg:mt-32 flex- col dark:bg-gray-900 lg:hidden">
  <div class="container">
  <div class="flex justify-between pt-4">
    <div class="z-10 flex w-full searchbar top-20">
    <form class="w-full" role="search" method="get" action="/">
      <div class="relative">
          <input class="px-4 py-[5px] w-full font-light text-left" type="text" placeholder="<?php _e('Search','chamber') ?>..." value="" name="s" id="search">
      </div>
    </form>   
  </div>
  </div>
    <ul class="flex flex-col pt-5 space-y-2"> 
    <?php foreach ($menuitems as $key => $item) { ?>
      <?php
      if (wp_get_post_parent_id()) {
        $cur_id = wp_get_post_parent_id();
      } else {
        $cur_id = get_the_ID();
      }
      ?>
      <li>
        <a href="<?= $item->url; ?>" class="text-xl xl:text-sm text-dark font-medium hover:font-medium hover:border-b-2 border-primary leading-[19px] pb-3 block hover:text-bold <?php if ($cur_id == $item->object_id) { echo "active"; } ?>"><?= $item->title; ?></a>
      </li>
    <?php }?>
    </ul>
    <?php if (is_user_logged_in()) { ?>
      <a href="/dashboard" class="block w-full my-5 cta">Hello, <?= wp_get_current_user()->display_name; ?></a>
    <?php } else { ?>
      <a href="<?= wp_login_url(); ?>" class="block w-full my-5 cta">Login</a>
    <?php } ?>
    <ul class="flex flex-row justify-center space-x-5 social-media">
      <?php if ($social_media['facebook']) { ?>
      <li><a target="_blank" href="<?= $social_media['facebook']; ?>"><i class="px-1 text-xl fa fa-facebook text-dark"></i></a></li>
      <?php } ?>
      <?php if ($social_media['instagram']) { ?>
      <li><a target="_blank" href="<?= $social_media['instagram']; ?>"><i class="px-1 text-xl fa fa-instagram text-dark"></i></a></li>
      <?php } ?>
      <?php if ($social_media['linkedin']) { ?>
      <li><a target="_blank" href="<?= $social_media['linkedin']; ?>"><i class="px-1 text-xl fa fa-linkedin text-dark"></i></a></li>
      <?php } ?>
      <?php if ($social_media['twitter']) { ?>
      <li><a target="_blank" href="<?= $social_media['twitter']; ?>"><i class="px-1 text-xl fa fa-twitter text-dark"></i></a></li>
      <?php } ?>
    </ul>
  </div>
</nav>