<?php
acf_register_block_type(array(
    'name'              => 'sponsorship-advertising',
    'title'             => __('Sponsorship Advertising Opportunities'),
    'render_callback'   => 'sponsorship_advertising_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function sponsorship_advertising_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'sponsorship-advertising-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'sponsorship-advertising';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$heading = get_field('heading');
$columns = get_field('columns');
$dark_background = get_field('dark_background');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
  <div class="container">
    <div class="relative">
        <div class="flex-col grid-cols-2 lflex lg:grid lg:gap-2">
            <?php foreach($columns as $column) : ?>
            <div data-go="<?= $count ?>" class="bg-white slick-sponsorship-advertising__bar transition-all  cursor-pointer mt-[-1px] slick-sponsorship-advertising__bar--<?= $count ?> <?php if ($count == 0) { ?> active <?php } ?> text-center opacity-50">
                <p class="block w-full py-5 font-bold text-black uppercase"><?= $column['tab_label'] ?></p>
            </div>
            <?php $count++; endforeach; ?>  
        </div>
      <div id="slick-sponsorship-advertising" class="bg-white">
        <?php 
            $lim = count($columns);
            $i = 0;
            foreach($columns as $key => $column) : ?>
            <div>
                <div class="px-8 py-12">
                <?php foreach ($column['list'] as $key => $list) : ?>
                    <div class="pb-12 mb-8 border-b list">
                        <h2 class="pb-4"><?= $list['heading'] ?></h2>
                        <div class="text-dark-body"><?= $list['body']; ?></div>
                        <div class="mt-8"><a href="<?= $list['buton']['url'] ?>" class="mt-8 button-filled__primary"><?= $list['buton']['title'] ?></a></div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        <?php  endforeach; ?> 
      </div>
  </div>
  </div>
</section>


<div class="fixed top-0 left-0 z-50 flex items-center justify-center hidden w-full !max-w-[100%] h-screen overflow-auto bg-black/70" id="contact-modal">
    <div class="absolute   w-full lg:max-w-screen-lg max-w-[96vw] lg:p-10 p-5 py-16 transform -translate-x-1/2 -translate-y-1/2 rounded shadow bg-gray-topbar top-1/2 left-1/2 max-h-[90vh] overflow-auto">
        <a href="" class="absolute text-sm font-medium close-contact-mdoal text-primary top-4 right-4"><i class="text-xl cursor-pointer close fa-solid fa-xmark text-primary"></i></a>


        <div class="max-w-3xl m-auto ">
            <h2><?php _e('Contact Us','chamber') ?></h2>
            <p class="mb-10"><?php _e('We’re here to help. Please fill out this form to contact us. Someone will get back to you as soon as possible. If you’d like to contact a specific member of #TeamChamber, please consult the staff directory.','chamber') ?></p>
   
            <?= do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
        </div>


    </div>
</div>
<?php } ?>