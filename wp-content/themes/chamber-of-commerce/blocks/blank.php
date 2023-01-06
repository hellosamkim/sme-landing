<?php

acf_register_block_type(array(
    'name'              => 'blank',
    'title'             => __('Blank'),
    'render_callback'   => 'blank_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function blank_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'blank-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blank';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$heading = get_field('heading');


?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16 ">
    <div class="container">
        <?php if ($heading) { ?><h2 class="pb-10"><?= $heading; ?></h2><?php } ?>
    </div>
</section>
<?php } ?>