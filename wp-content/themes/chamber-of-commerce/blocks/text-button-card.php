<?php

acf_register_block_type(array(
    'name'              => 'text-button-card',
    'title'             => __('Text Button Card'),
    'render_callback'   => 'text_button_card_cb',
    'category'          => 'Information Cards',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled'
));

function text_button_card_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'text-button-card-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-button-card';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$cols = get_field('options')['number_of_columns'];
$content = get_field('content');
$content_columns = get_field('content_columns');

if ($options['number_of_columns'] == 1) {
?>
    <?php if ($content['image']) { ?>
    <section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
        <div class="container">
            <?php if ($content['section_title']) { ?><h2 class="pb-10"><?= $content['section_title']; ?></h2><?php } ?>
                <?php if ($content['icon']) { ?>
                    <div class="col-span-12 bg-white">
                    <div class="items-end block pb-10">
                        <?php if ($content['image']) { ?><img class="h-[2.5rem] pr-5" src="<?= $content['image']['url'] ?>" alt="<?= $content['image']['title'] ?>"><?php } ?>
                        <h2 class="mb-0"><?= $content['heading']; ?></h2>
                    </div>
                    <?php if ($content['body']) { ?>
                    <div class="content">
                        <?= $content['body']; ?>
                    </div>
                    <?php } ?>
                    <?php if ($content['button']) { ?> <div class="mt-8"><a href="<?= $content['button']['url'] ?>" target="<?= $content['button']['target'] ?>" class="button-outline__primary"><?= $content['button']['title'] ?></a></div> <? } ?>
                    </div>
                <?php } else { ?>
                    <div class="flex flex-col justify-between col-span-12 bg-white rounded md:flex-row card lg:col-span-4">
                        <img class="w-[25rem] object-cover rounded-l" src="<?= $content['image']['url'] ?>" alt="">
                        <div class="w-full p-8 pb-10">
                            <h3 class="pb-4 leading-8"><?= $content['heading'] ?></h3>
                            <div class="text-dark-body content"><?= $content['body'] ?></div>
                            <?php if ($content['button']) { ?> <div class="mt-8"><a href="<?= $content['button']['url'] ?>" target="<?= $content['button']['target'] ?>" class="button-outline__primary"><?= $content['button']['title'] ?></a></div> <? } ?>
                        </div>
                    </div>
                <?php } ?>
            <?php if ($content['text_button']) { ?>
            <div class="flex justify-center mt-5 mr-2 lg:justify-end">
                <a href="<?= $content['text_button']['url'] ?>" class="text-button"><i class="fa-solid fa-chevron-right"></i> <span><?= $content['text_button']['title'] ?></span></a>
            </div>
            <?php } ?>
        </div>
    </section>
    <?php } else { ?>
    <section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
        <div class="container">
            <?php if ($content['section_title']) { ?><h2 class="pb-10"><?= $content['section_title']; ?></h2><?php } ?>
            <div class="grid grid-cols-12 gap-y-14 lg:gap-y-7 lg:gap-7">
            <div class="flex flex-col justify-between col-span-12 p-8 bg-white rounded card lg:w-full hover:card-shadow <?php if ($options['centered_text']) { echo "items-center text-center"; } ?>">
                <div class="max-w-4xl">
                    <h3 class="pb-4"><?= $content['heading'] ?></h3>
                    <div class="text-dark-body"><?= $content['body'] ?></div>
                </div>
                <?php if ($content['button']) { ?> <div class="mt-8 mb-2"><a href="<?= $content['button']['url'] ?>" target="<?= $content['button']['target'] ?>" class="button-outline__primary"><?= $content['button']['title'] ?></a></div> <? } ?>
            </div>
            </div>
        </div>
    </section>
    <?php } ?>
<?php } else { ?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
        <?php if ($content_columns['section_title']) { ?><h2 class="pb-10"><?= $content_columns['section_title']; ?></h2><?php } ?>
        <div class="grid grid-cols-12 gap-y-14 lg:gap-y-7 lg:gap-7">
            <?php foreach ($content_columns['columns'] as $key => $item) { ?>
                <?php if ($item['image']) { ?>
                    <?php if ($item['icon']) { ?>
                        <div class="flex flex-col justify-between col-span-12 p-8 bg-white rounded card <?php if ($cols == 2) { echo "lg:col-span-6"; } else { echo "lg:col-span-4"; }; ?> hover:card-shadow <?php if ($options['centered_text']) { echo "items-center text-center"; } ?>">
                        <div>
                        <img class="md:w-1/2 lg:w-full max-w-[14rem] max-h-[3rem] mb-5 object-contain object-left rounded-t" src="<?= $item['image']['url'] ?>" alt="">
                            <h3 class="pb-4"><?= $item['heading'] ?></h3>
                            <div class="text-dark-body"><?= $item['body'] ?></div>
                        </div>
                        <?php if ($item['button']) { ?> <div class="mt-8"><a href="<?= $item['button']['url'] ?>" target="<?= $item['button']['target'] ?>" class="button-outline__primary"><?= $item['button']['title'] ?></a></div> <? } ?>
                        </div>
                    <?php } else {  ?>
                        <a href="<?= $item['button']['url'] ?>" target="<?= $item['button']['target'] ?>" class="flex flex-col col-span-12 bg-white rounded md:flex-row lg:flex-col card lg:col-span-4 hover:card-shadow">
                        <img class="md:w-1/2 lg:w-full h-[16rem] object-cover rounded-t" src="<?= $item['image']['url'] ?>" alt="">
                        <div class="p-8 md:px-8 md:py-4 md:w-1/2 lg:w-full">
                            <h3 class="pb-4"><?= $item['heading'] ?></h3>
                                <div class="text-dark-body"><?= $item['body'] ?></div>
                        </div>
                        </a>
                    <?php } ?>
                <?php } else { ?>
                    <div class="flex flex-col justify-between col-span-12 p-8 bg-white rounded card <?php if ($cols == 2) { echo "lg:col-span-6"; } else { echo "lg:col-span-4"; }; ?> hover:card-shadow <?php if ($options['centered_text']) { echo "items-center text-center"; } ?>">
                        <div>
                            <h3 class="pb-4"><?= $item['heading'] ?></h3>
                            <div class="text-dark-body"><?= $item['body'] ?></div>
                        </div>
                        <?php if ($item['button']) { ?> <div class="mt-8"><a href="<?= $item['button']['url'] ?>" target="<?= $item['button']['target'] ?>" class="button-outline__primary"><?= $item['button']['title'] ?></a></div> <? } ?>
                    </div>
                <?php } ?>
            <?php }?>
        </div>
        <?php if ($content_columns['text_button']) { ?>
        <div class="flex justify-center mt-5 mr-2 lg:justify-end">
            <a href="<?= $content_columns['text_button']['url'] ?>" class="text-button"><i class="fa-solid fa-chevron-right"></i> <span><?= $content_columns['text_button']['title'] ?></span></a>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?> 
<?php } ?>