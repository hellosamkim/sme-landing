<?php
  $ads = get_field('advertisement','options');
  $show_ads = [];
  if ($ads) {
    foreach ($ads as $key => $ad) {
      if (($ad['start_date'] < get_the_date())  && (get_the_date() > $ad['end_date']) ){
        if ($ad['active']) {
          array_push($show_ads,$ad);
        }
      }
    }
  }
?>
<?php if ($show_ads) : ?>
<div id="advertisements">
  <div class="container py-16">
    <div id="slick-ads">
      <?php foreach ($show_ads as $key => $ad) { ?>
        <div>
          <a target="_blank" class="flex items-center justify-center mx-2" href="<?= $ad['ad_link']; ?>"><img class="object-cover w-full h-auto" src="<?= $ad['ad_image']['url']; ?>" alt="<?= $ad['ad_image']['alt']; ?>"></a>
        </div>
      <?php } ?>
    </div>
    <div class="flex justify-end mt-10 mr-2">
      <a href="/opportunities-to-get-your-business-known/" class="text-button"><i class="fa-solid fa-chevron-right"></i> <span><?= __('ADVERTISING OPPORTUNITIES','chamber-of-commerce'); ?></span></a>
    </div>
  </div>
</div>
<?php endif; ?>