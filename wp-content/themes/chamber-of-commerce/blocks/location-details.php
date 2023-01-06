<?php

acf_register_block_type(array(
    'name'              => 'location-details',
    'title'             => __('(Text Only Section) Location Details'),
    'render_callback'   => 'location_details_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled'
));

function location_details_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'location-details-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'location-details';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$heading = get_field('heading');
$columns = get_field('columns');
$dark_background = get_field('dark_background');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
        <?php if ($heading) { ?><h2 class="pb-10"><?= $heading; ?></h2><?php } ?>
        <div class="grid grid-cols-12 gap-10">
            <?php foreach ($columns as $key => $item) { ?>
                <div class="flex flex-col justify-between col-span-12 md:col-span-6">
                    <div>
                        <h3 class="pb-4"><?= $item['heading'] ?></h3>
                        <div class="flex flex-col body">
                            <p class="whitespace-nowrap"><svg class="inline w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z"/></svg><?= $item['location'] ?></p>
                            <a class="whitespace-nowrap link" href="<?= $item['phone_number']['url'] ?>"><svg class="inline w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"/></svg><?= $item['phone_number']['title'] ?></a>
                        </div>
                    </div>
                    <?php if ($item['cta']) { ?> <div class="mt-8 mb-3"><a href="<?= $item['cta']['url'] ?>"  target="<?= $item['cta']['target'] ?>" class="button-outline__primary"><?= $item['cta']['title'] ?></a></div> <? } ?>
                </div>
            <?php }?>
        </div>
    </div>
</section>
<?php } ?>