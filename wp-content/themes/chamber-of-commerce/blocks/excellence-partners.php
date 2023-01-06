<?php

acf_register_block_type(array(
    'name'              => 'excellence-partners',
    'title'             => __('Exellence Partners'),
    'render_callback'   => 'excellence_partners_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function excellence_partners_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'excellence-partners-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'excellence-partners';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$heading = get_field('heading');
$tiers = get_field('tiers');
$cta = get_field('cta');


?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
        <?php if ($heading) { ?><h2 class="pb-10"><?= $heading; ?></h2><?php } ?>
        <?php foreach ($tiers as $key => $item) { ?>
            <div class="partners-section">
                <h4 class="pb-4 font-normal uppercase border-b-2 text-gray border-gray-hr"><?= $item['tier'] ?></h4>
                <div class="grid grid-cols-2 gap-12 py-10 md:grid-cols-3 lg:grid-cols-5 partners">
                    <?php foreach ($item['company'] as $key => $item) { ?>
                        <a target="_blank" href="<?= $item['company_url'] ?>" class="flex items-center justify-center"><img class="block max-h-[55px] max-w-[150px]" src="<?= $item['logo']['url'] ?>" alt="<?= $item['logo']['title'] ?>"></a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?php if ($cta) { ?>
        <div class="flex justify-end mt-10 mr-2 lg:mt-20">
            <a href="<?= $cta['url'] ?>" class="text-button"><i class="fa-solid fa-chevron-right"></i> <span><?= $cta['title'] ?></span></a>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>