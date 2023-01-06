<?php

acf_register_block_type(array(
    'name'              => 'chamber-stats',
    'title'             => __('Chamber Stats'),
    'render_callback'   => 'chamber_stats_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled'
));

function chamber_stats_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'chamber-stats-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'chamber-stats';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$stats = get_field('stats');3

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> bg-white pt-28 pb-16">
    <div class="container">
        <div class="grid grid-cols-12 gap-7 gap-y-12 lg:gap-y-7 ">
            <?php foreach ($stats as $key => $stat) { ?>
                <div class="relative flex flex-col justify-between col-span-12 pt-16 pb-6 bg-white border border-4 rounded-none rounded text-gray-dark card lg:col-span-4 border-indigo-DEFUALT">
                    <div class="w-[5rem] absolute top-[-1.5rem] m-auto left-0 right-0 bg-white">
                        <img class="px-4" src="<?= get_template_directory_uri(). '/src/images/Triple-C.svg' ?>" alt="Triple C - Canadian Chamber of Commerce">
                    </div>
                    <div class="text-center">
                        <h2 class="pb-8 text-[3.625rem] text-indigo-DEFUALT font-bold"><?= $stat['heading'] ?></h2>
                        <div class="h4 text-dark-body"><?= $stat['sub_heading'] ?></div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>
<?php } ?>