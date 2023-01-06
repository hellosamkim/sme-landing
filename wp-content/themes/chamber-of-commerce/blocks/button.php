<?php

acf_register_block_type(array(
    'name'              => 'button',
    'title'             => __('Button'),
    'render_callback'   => 'button_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function button_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'button-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'button';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$buttons = get_field('content')['buttons'];

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16"  style="background: <?= $options['background_colour'] ?>">
    <div class="container">
        <div class="<?php if (!$options['full_width']) { echo "max-w-4xl"; } ?> mx-auto">
            <?php foreach ($buttons as $key => $button) { ?>
                <div class="mb-8"><a href="<?= $button['button']['url'] ?>" class="button-outline__primary" target="<?= $button['button']['target'] ?>"><?= $button['button']['title'] ?></a></div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>