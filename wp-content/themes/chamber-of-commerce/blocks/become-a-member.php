<?php

acf_register_block_type(array(
    'name'              => 'become-a-member-section',
    'title'             => __('Become a Member section'),
    'render_callback'   => 'become_a_member_cb',
    'category'          => 'Other',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled'
));

function become_a_member_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'become-a-member-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'become-a-member-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$cols = get_field('options')['number_of_columns'];
$content = get_field('content');
?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> flex items-center h-[80%] py-16 border border-dark border-2 absolute mt-16" style="background: <?= $options['background_colour'] ?>">
<div class="absolute top-[-24px] left-0 right-0 mx-auto bg-white w-1/2 flex justify-center z-[1]"><img src="<?= get_template_directory_uri(). '/src/images/Triple-C.svg' ?>" alt="CCC" class="w-[45px]"></div>    
    <div class="container text-center">
        <div class="lg:max-w-[70%] mx-auto">    
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
            <?php if ($content['button']) { ?><div class="mt-8"><a href="<?= $content['button']['url'] ?>" class="button-filled__primary"><?= $content['button']['title'] ?></a></div><? } ?>
        </div>
    </div>
</section>
<?php } ?>