<?php

acf_register_block_type(array(
    'name'              => 'tabbed-content',
    'title'             => __('Tabbed Content (Membership section   )'),
    'render_callback'   => 'tabbed_content_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function tabbed_content_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'tabbed-content-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'tabbed-content';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$heading = get_field('heading');
$count = 0;
$columns = get_field('columns');
$dark_background = get_field('dark_background');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?>   py-16" style="background: <?= $options['background_colour'] ?>">
  <div class="container">
    <div class="relative">
        <div class="flex-col lg:grid-cols-3 lflex lg:grid lg:gap-2">
            <?php foreach($columns as $column) : ?>
            <div data-type="<?= strtolower($column['tab_label']) ?>" data-go="<?= $count ?>" class="bg-white slick-tabbed-content__bar transition-all  cursor-pointer mt-[-1px] slick-tabbed-content__bar--<?= $count ?> <?php if ($count == 0) { ?> active <?php } ?> text-center opacity-50">
                <p class="block w-full py-5 font-bold text-black uppercase"><?= $column['tab_label'] ?></p>
            </div>
            <?php $count++; endforeach; ?>  
        </div>
      <div id="slick-tabbed-content" class="bg-white">
        <?php foreach($columns as $key => $column) : ?>
            <div>
                <div class="flex flex-col grid-cols-12 px-8 py-12 lg:grid ">
                    <div class="col-span-4 pr-8 mb-14 content lg:mb-0">
                        <?php if ($column['heading']) { ?> <h2 class="pb-4"><?= $column['heading'] ?></h2> <?php } ?>
                        <div class="text-dark-body"><?= $column['body']; ?></div>
                        <?php if ($column['cta']) { ?><div class="mt-8">
                            <a href="<?= $column['cta']['url'] ?>" target="<?= $column['cta']['target'] ?>" class="inline-block mt-8 button-filled__primary"><?= $column['cta']['title'] ?></a></div><? } ?>
                    </div>
                    <div class="col-span-8 pl-12 content">
                        <?php foreach ($column['list'] as $key => $list) : ?>
                            <div class="flex justify-start mb-8 list">
                                <svg class="h-[1.2rem] mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39 30"><defs><style>.cls-1{fill:#00B9B4;}</style></defs><title>check-green</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="For-dev"><polygon id="check-green" class="cls-1" points="12.39 23.67 3.15 14.34 0 17.49 12.39 30 39 3.15 35.87 0 12.39 23.67"/></g></g></g></svg>
                                <div class="w-full content">
                                    <?php if ($list['heading']) { ?> <h4 class="pb-4"><?= $list['heading'] ?></h4> <?php } ?>
                                    <div class="text-dark-body"><?= $list['body']; ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php  endforeach; ?> 
      </div>
  </div>
  </div>
</section>

<?php } ?>