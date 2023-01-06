<?php

acf_register_block_type(array(
    'name'              => 'faq',
    'title'             => __('FAQ'),
    'render_callback'   => 'faq_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function faq_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'faq-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'faq';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$heading = get_field('heading');
$body = get_field('body');
$faqs = get_field('faq');
$cta = get_field('cta');
$dark_background = get_field('dark_background');


?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
        <?php if ($heading) { ?><h2 class="pb-10"><?= $heading; ?></h2><?php } ?>
        <p class="text-dark-body"><?= $body; ?></p>
        <div class="pt-5 accordion">
        <?php foreach ($faqs as $key => $faq) { ?>
            <div class="flex flex-coloverflow-hidden md:flex-row open-close wow fadeInUp" data-id="<?= $key + 1; ?>">
                <div class="w-full">
                    <div class="px-8 my-2 transition-all bg-white">
                        <div class="flex justify-between py-4 cursor-pointer lg:items-center">
                            <h2 class="flex overflow-auto lg:items-center py-3 transition-all h4 max-w-[90%] mr-5 lg:mr-0 text-dark leading-[1.3]"><span class="text-[2rem] pr-5 lg:pr-0 lg:text-[2.8rem] font-bold text-primary lg:w-[4rem] inline">Q</span> <?= $faq['question']; ?></span></h3>
                            <button aria-label="too" class="text-dark dark:text-white">
                                <svg class="scale-125 text-dark" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path class="transition-all fade-close" d="M10 4.1665V15.8332" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.16602 10H15.8327" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="h-full overflow-hidden transition-all text-dark-body max-h-0">
                            <div id="para<?= $key + 1; ?>" class="pb-12 hidden-box">
                            <div class="w-full mt-4 lg:mt-0">
                                <div class="pl-12 mx-4 content"><?= $faq['answer']; ?></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>    
        <?php if ($cta) { ?>
        <div class="flex justify-end mt-5 mr-2">
            <a href="<?= $cta['url'] ?>" class="text-button"><i class="fa-solid fa-chevron-right"></i> <span><?= $cta['title'] ?></span></a>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?>