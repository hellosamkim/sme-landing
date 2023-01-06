<?php

acf_register_block_type(array(
    'name'              => 'form',
    'title'             => __('Embed Form'),
    'render_callback'   => 'form_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function form_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'form-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'form';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$form_id = get_field('form_id');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
        <div class="max-w-3xl p-12 m-auto bg-white">
            <?= do_shortcode('[gravityform id="' . $form_id . '" title="false" description="false" ajax="true"]'); ?>
        </div>
    </div>
</section>
<?php } ?>