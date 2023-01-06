<?php

acf_register_block_type(array(
    'name'              => 'image-video-text-section',
    'title'             => __('Image/Video + Text Section'),
    'render_callback'   => 'image_video_text_section_cb',
    'category'          => 'Information Cards',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled'
));

function image_video_text_section_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'image-video-text-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'image-video-text-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$cols = get_field('options')['number_of_columns'];
$content = get_field('content');
$content_columns = get_field('content_columns');

if ($options['image_or_video'] == 'image') {
?>
<?php if ($options['icon']) {
?>
<?php if ($options['positioning'] == "image-left") {
?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="relative z-10 flex flex-col items-center justify-center container md:flex md:flex-row <?php if ($dark_background) { ?> bg-white <?php } ?>">
        <div class="order-1 w-full md:order-2 lg:pl-8">
            <div class="content">
                <h2 class="pb-4"><?= $content['heading'] ?></h2>
                <div class="text-dark-body"><?= $content['body']; ?></div>
                <?php if ($content['button']) { ?><div><a href="<?= $content['button']['url'] ?>" class="mt-5 button-outline__primary"><?= $content['button']['title'] ?></a></div><? } ?>
            </div>
        </div>
        <div class="relative order-2 overflow-hidden lg:ml-0 lg:mr-0 md:order-1 max-w-[10rem]">
            <img src="<?= $content['image']['url'] ?>" alt="<?= $content['image']['alt'] ?>">
        </div>
    </div>
</section>
<?php } else { ?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="relative z-10 flex flex-col items-center justify-center container md:flex md:flex-row <?php if ($dark_background) { ?> bg-white <?php } ?>">
        <div class="order-2 w-full md:order-1 lg:ml-0 lg:mr-0">
            <div class="content">
                <h2 class="pb-4"><?= $content['heading'] ?></h2>
                <div class="text-dark-body"><?= $content['body']; ?></div>
                <?php if ($content['button']) { ?><div><a href="<?= $content['button']['url'] ?>" class="mt-5 button-outline__primary"><?= $content['button']['title'] ?></a></div><? } ?>
            </div>
        </div>
        <div class="relative order-1 max-w-[10rem] overflow-hidden md:order-2 lg:pl-8">
            <img src="<?= $content['image']['url'] ?>" alt="<?= $content['image']['alt'] ?>">
        </div>
    </div>
</section>
<?php } ?>
<?php } else { ?>
<?php if ($options['positioning'] == "image-left") { ?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="relative z-10 flex flex-col items-center justify-center lg:container md:flex md:flex-row <?php if ($dark_background) { ?> bg-white <?php } ?>">
        <div class="container order-2 w-full md:w-1/2 xl:pl-20 lg:pl-10">
            <div class="content">
                <h2 class="pb-4"><?= $content['heading'] ?></h2>
                <div class="text-dark-body"><?= $content['body']; ?></div>
                <?php if ($content['button']) { ?><div><a href="<?= $content['button']['url'] ?>" class="mt-5 button-outline__primary"><?= $content['button']['title'] ?></a></div><? } ?>
            </div>
        </div>
        <div class="relative order-1 mb-5 overflow-hidden lg:mb-0 lg:ml-0 lg:mr-0 md:w-1/2">
            <img src="<?= $content['image']['url'] ?>" alt="<?= $content['image']['alt'] ?>">
        </div>
    </div>
</section>
<?php } else { ?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="relative z-10 flex flex-col items-center justify-center lg:container md:flex md:flex-row <?php if ($dark_background) { ?> bg-white <?php } ?>">
        <div class="container order-1 w-full md:w-1/2 xl:pr-20 lg:pr-10">
            <div class="content">
                <h2 class="pb-4"><?= $content['heading'] ?></h2>
                <div class="text-dark-body"><?= $content['body']; ?></div>
                <?php if ($content['button']) { ?><div><a href="<?= $content['button']['url'] ?>" class="mt-5 button-outline__primary"><?= $content['button']['title'] ?></a></div><? } ?>
            </div>
        </div>
        <div class="relative order-2 mb-5 overflow-hidden lg:mb-0 lg:ml-0 lg:mr-0 md:w-1/2">
            <img src="<?= $content['image']['url'] ?>" alt="<?= $content['image']['alt'] ?>">
        </div>
    </div>
</section>
<?php } ?>
<?php } ?>
<?php } else { ?>
<?php if ($options['positioning'] == "image-left") { ?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="relative z-10 flex flex-col items-center justify-center lg:container md:flex md:flex-row <?php if ($dark_background) { ?> bg-white <?php } ?>">
        <div class="container order-2 w-full py-16 md:w-1/2 xl:pl-20 lg:pl-10">
            <div class="content">
                <h2 class="pb-4"><?= $content['heading'] ?></h2>
                <div class="text-dark-body"><?= $content['body']; ?></div>
                <?php if ($content['button']) { ?><div><a href="<?= $content['button']['url'] ?>" class="mt-5 button-outline__primary"><?= $content['button']['title'] ?></a></div><? } ?>
            </div>
        </div>
        <div class="relative order-1 w-full px-4 mb-5 overflow-hidden lg:px-auto lg:ml-0 lg:mr-0 lg:mb-0 md:w-1/2">
            <iframe class="min-h-[26rem]" width="100%" height="100%" src="<?= $content['video_url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</section>
<?php } else { ?>
    <section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="relative z-10 flex flex-col items-center justify-center lg:container md:flex md:flex-row <?php if ($dark_background) { ?> bg-white <?php } ?>">
        <div class="container order-1 w-full py-16 md:w-1/2 xl:pr-20 lg:pr-10">
            <div class="content">
                <h2 class="pb-4"><?= $content['heading'] ?></h2>
                <div class="text-dark-body"><?= $content['body']; ?></div>
                <?php if ($content['button']) { ?><div><a href="<?= $content['button']['url'] ?>" class="mt-5 button-outline__primary"><?= $content['button']['title'] ?></a></div><? } ?>
            </div>
        </div>
        <div class="relative order-2 w-full px-4 mb-5 overflow-hidden lg:px-auto lg:ml-0 lg:mr-0 lg:mb-0 md:w-1/2">
            <iframe class="min-h-[26rem]" width="100%" height="100%" src="<?= $content['video_url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</section>
<?php } ?>
<?php } ?>
<?php } ?>