<?php

acf_register_block_type(array(
    'name'              => 'contact-details',
    'title'             => __('(Text Only Section) Contact Details'),
    'render_callback'   => 'contact_details_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled'
));

function contact_details_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-details-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact-details';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$heading = get_field('heading');
$columns = get_field('columns');
$cta_1 = get_field('cta_1');
$cta_2 = get_field('cta_2');
$dark_background = get_field('dark_background');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
        <?php if ($heading) { ?><h2 class="pb-10"><?= $heading; ?></h2><?php } ?>
        <?php if ($columns) { ?>
        <div class="grid grid-cols-12 gap-10">
            <?php foreach ($columns as $key => $item) { ?>
                <div class="flex flex-col justify-between col-span-12 md:col-span-6 lg:col-span-3">
                    <div>
                        <div class="flex flex-col body">
                            <?php if ($item['heading']) { ?><h3 class="pb-4"><?= $item['heading'] ?></h3><?php } ?>
                            <?php if ($item['body']) { ?><div class="pb-4 text-dark-body"><?= $item['body'] ?></div><?php } ?>
                            <?php if ($item['phone_number']) { ?><a class="link whitespace-nowrap" href="<?= $item['phone_number']['url'] ?>"><svg class="inline w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"/></svg><?= $item['phone_number']['title'] ?></a><?php } ?>
                                <?php if ($item['email']) { ?><a class="link whitespace-nowrap" href="<?= $item['email']['url'] ?>"><svg class="inline w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"/></svg><?= $item['email']['title'] ?></a><?php } ?>
                        </div>
                    </div>
                    <?php if ($item['cta']) { ?> <div class="mt-8 mb-3"><a href="<?= $item['cta']['url'] ?>"  target="<?= $item['cta']['target'] ?>" class="button-outline__primary"><?= $item['cta']['title'] ?></a></div> <? } ?>
                </div>
            <?php }?>
        </div>
        <?php } ?>
        <?php if ($cta_1) { ?>
        <div class="flex flex-row justify-center gap-8 pt-8 m-auto mb-2">
            <div class="mt-8"><a href="<?= $cta_1['url'] ?>" class="button-outline__primary"><?= $cta_1['title'] ?></a></div>
            <?php if ($cta_2) { ?> <div class="mt-8"><a href="<?= $cta_2['url'] ?>" class="button-outline__primary"><?= $cta_2['title'] ?></a></div> <? } ?>
        </div>
        <? } ?>
    </div>
</section>
<?php } ?>