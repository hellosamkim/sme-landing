<?php

acf_register_block_type(array(
    'name'              => 'tabbed-content-text',
    'title'             => __('Tabbed Content (Text)'),
    'render_callback'   => 'tabbed_content_text_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function tabbed_content_text_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'tabbed-content-text-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'tabbed-content-text';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$heading = get_field('heading');
$columns = get_field('columns');
$count = 0;
$dark_background = get_field('dark_background');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
  <div class="container">
    <div class="relative">
        <div class="flex flex-col gap-2 lg:grid lg:flex-row" style="grid-template-columns: <?= str_repeat('auto ',count($columns)) ?>">
            <?php foreach($columns as $i => $column) : ?>
            <div data-go="<?= $count ?>" class="bg-white px-5 <?php if ($i == 0) { echo "flex-1"; } ?> slick-tabbed-content__bar transition-all  cursor-pointer mt-[-1px] slick-tabbed-content__bar--<?= $count ?> <?php if ($count == 0) { ?> active <?php } ?> text-center opacity-50">
                <p class="block w-full py-5 font-bold text-black uppercase"><?= $column['tab_label'] ?></p>
            </div>
            <?php $count++; endforeach; ?>  
        </div>
      <div id="slick-tabbed-content" class="bg-white">
        <?php foreach($columns as $key => $column) : ?>
            <div>
                <div class="grid grid-cols-1 px-8 py-12">
                    <div class="content">
                        <?php if ($column['heading']) { ?> <h2 class="pb-4"><?= $column['heading'] ?></h2> <?php } ?>
                        <div class="text-dark-body"><?= $column['body']; ?></div>
                        <?php if ($column['cta']) { ?><div class="mt-8"><a href="<?= $column['cta']['url'] ?>" target="<?= $column['cta']['target'] ?>" class="mt-8 button-filled__primary"><?= $column['cta']['title'] ?></a></div><? } ?>
                    </div>
                </div>
            </div>
        <?php  endforeach; ?> 
      </div>
  </div>
  </div>
</section>
<?php } ?>