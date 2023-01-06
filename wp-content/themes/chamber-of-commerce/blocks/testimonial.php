<?php

acf_register_block_type(array(
    'name'              => 'testimonial',
    'title'             => __('Testimonial'),
    'render_callback'   => 'testimonial_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function testimonial_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$testimonial = get_field('testimonial');
$dark_background = get_field('dark_background');
$background_color = get_field('background_color');
$author = get_field('author');
$cta = get_field('cta');
$icon = get_field('icon');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16 text-white" style="background: <?= $options['background_colour'] ?>">
    <div class="container text-center">
        <?php if ($testimonial) { ?>
        <div class="items-end block max-w-4xl pb-10 m-auto">
            <?php if ($icon) { ?><img class="h-[2.5rem] pr-5" src="<?= $icon['url'] ?>" alt="<?= $icon['title'] ?>"><?php } ?>
            <h2 class="mb-0"><span class="text-[6rem] pr-3 inline-flex translate-y-[2.2rem] leading-3">“</span><?= $testimonial; ?><span class="inline-flex pl-4 translate-y-[3.5rem] text-[6rem] leading-3">”</span></h2>
        </div>
        <?php } ?>
        <?php if ($author) { ?>
        <div class="content">
            <?= $author; ?>
        </div>
        <?php } ?>
        <?php if ($cta) { ?> <div class="mt-8"><a href="<?= $cta['url'] ?>" class="button-outline__primary"><?= $cta['title'] ?></a></div> <? } ?>
    </div>
</section>
<?php } ?>