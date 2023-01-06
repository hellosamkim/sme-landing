<?php

acf_register_block_type(array(
    'name'              => 'text-only-section',
    'title'             => __('Text Only Section'),
    'render_callback'   => 'text_only_section_cb',
    'category'          => 'Information Cards',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled'
));

function text_only_section_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'text-only-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-only-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$cols = get_field('options')['number_of_columns'];
$content = get_field('content');
$content_columns = get_field('content_columns');

if ($options['number_of_columns'] == 1) {
?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container <?php if ($options['centered_text']) { ?> text-center <?php } ?>">
        <div class="<?php if (!$options['full_width']) { echo "max-w-4xl"; } ?> mx-auto">
            <?php if ($content['heading']) { ?>
            <div class="items-end block pb-10">
                <h2 class="mb-0"><?= $content['heading']; ?></h2>
            </div>
            <?php } ?>
            <?php if ($content['body']) { ?>
            <div class="content">
                <?= $content['body']; ?>
            </div>
            <?php } ?>
            <?php if ($content['button']) { ?> <div class="mt-8 mb-2"><a href="<?= $content['button']['url'] ?>" target="<?= $content['button']['target'] ?>" class="button-outline__primary"><?= $content['button']['title'] ?></a></div> <? } ?>
        </div>
    </div>
</section>
<?php } else { ?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
        <div class="flex flex-col grid-cols-12 gap-12 lg:grid">
            <?php foreach ($content_columns as $key => $item) { ?>
                <div class="flex flex-col justify-between col-span-12 card <?php if ($cols == 2) { echo "lg:col-span-6"; } else { echo "lg:col-span-4"; }; ?> <?php if ($options['centered_text']) { echo "items-center text-center"; } ?>">
                    <div>
                        <?php if ($item['heading']) { ?><h3 class="pb-4"><?= $item['heading'] ?></h3><?php } ?>
                        <div class="text-dark-body"><?= $item['body'] ?></div>
                    </div>
                </div>
            <?php }?>
        </div>
        <?php if ($item['button']) { ?> <div class="mt-8 mb-3"><a href="<?= $item['button']['url'] ?>" target="<?= $item['button']['target'] ?>" class="button-outline__primary"><?= $item['button']['title'] ?></a></div> <? } ?>
    </div>
</section>
<?php } ?>
<?php } ?>