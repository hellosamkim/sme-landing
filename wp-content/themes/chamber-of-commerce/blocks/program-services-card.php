<?php

acf_register_block_type(array(
    'name'              => 'program-services-card',
    'title'             => __('Programs & Services Card'),
    'render_callback'   => 'program_services_card_cb',
    'category'          => 'Information Cards',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled'
));

function program_services_card_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'program-services-card-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'program-services-card';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$cols = get_field('options')['number_of_columns'];
$content = get_field('content');
$content_columns = get_field('content_columns');

if ($options['number_of_columns'] == 1) {
?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
    <?php if ($content['section_title']) { ?><h2 class="pb-10"><?= $content['section_title']; ?></h2><?php } ?>
    <div class="grid grid-cols-12 gap-7 gap-y-12 lg:gap-y-7 ">
        <a href="<?= $content['card_link']['url']; ?>" target="<?= $content['card_link']['target']; ?>" class="flex justify-between col-span-12 p-4 bg-white border-b-4 rounded img-scale card border-forest-DEFUALT lg:col-span-6 group">
        <?php if ($content['image']) { ?>
            <div class="img-container flex-none mr-4 w-[8rem] h-[8rem]">
                <img class="object-cover w-full h-full rounded" src="<?= $content['image']['url'] ?>" alt="<?= $content['image']['alt'] ?>">
            </div>
        <?php } ?>
        <div class="flex flex-col w-full px-2 pt-1">
            <div class="pb-4 mr-8"><h4 class="relative table"><span class="relative z-10 block pr-5 bg-white"><?= $content['card_link']['title'] ?></span><img src="<?= get_template_directory_uri(). '/src/images/long-right-arrow.svg' ?>" class="animate-hover absolute group-hover:right-[-2rem] top-[6px] right-[-1rem] object-cover"  alt="Canadian Chamber of Commerce Icon" /></h4></div>
            <div class="text-dark-body"><?= $content['body'] ?></div>
        </div>
        </a>
        </div>
    </div>
</section>
<?php } else if ($options['number_of_columns'] == 2) { ?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
    <?php if ($content_columns['section_title']) { ?><h2 class="pb-10"><?= $content_columns['section_title']; ?></h2><?php } ?>
        <?php if ($options['image_or_icon'] == 'image') { ?>
        <div class="grid grid-cols-12 gap-7 gap-y-12 lg:gap-y-7 ">
            <?php foreach ($content_columns['columns'] as $key => $item) { ?>
                <a href="<?= $item['card_link']['url']; ?>" class="flex justify-between col-span-12 p-4 bg-white border-b-4 rounded img-scale card border-forest-DEFUALT lg:col-span-6 group">
                    <?php if ($item['image']) { ?>
                        <div class="img-container mr-4 flex-none w-24 h-24 md:w-[8rem]  md:h-[8rem]">
                            <img class="object-cover w-full h-full rounded" src="<?= $item['image']['url'] ?>" alt="<?= $item['image']['alt'] ?>">
                        </div>
                    <?php } ?>
                    <div class="flex flex-col w-full px-2 pt-1">
                        <div class="pb-4 mr-8"><h4 class="relative table"><span class="relative z-10 block pr-5 bg-white"><?= $item['card_link']['title'] ?></span><img src="<?= get_template_directory_uri(). '/src/images/long-right-arrow.svg' ?>" class="animate-hover absolute group-hover:right-[-2rem] top-[6px] right-[-1rem] object-cover"  alt="Canadian Chamber of Commerce Icon" /></h4></div>
                        <div class="text-dark-body"><?= $item['body'] ?></div>
                    </div>
                    </a>
            <?php }?>
        </div>
        <?php } else { ?>
        <div class="grid grid-cols-12 gap-7 gap-y-12 lg:gap-y-7 ">
        <?php foreach ($content_columns['columns'] as $key => $item) { ?>
            <a href="<?= $item['cta']['url']; ?>" target="<?= $item['cta']['target'] ?>" class="flex flex-col col-span-12 p-8 bg-white rounded card lg:col-span-6 group">
                <?php if ($item['icon']) { ?>
                    <div class="flex-none pb-8 img-container">
                        <img class="object-cover h-[3rem] rounded" src="<?= $item['icon']['url'] ?>" alt="<?= $item['icon']['alt'] ?>">
                    </div>
                <?php } ?>
                <div class="flex flex-col w-full">
                    <div class="pb-4 mr-8"><h4 class="relative table"><span class="relative z-10 block pr-5 bg-white"><?= $item['heading'] ?></span><img src="<?= get_template_directory_uri(). '/src/images/long-right-arrow.svg' ?>" class="animate-hover absolute group-hover:right-[-2rem] top-[6px] right-[-1rem] object-cover"  alt="Canadian Chamber of Commerce Icon" /></h4></div>
                    <div class="text-dark-body"><?= $item['body'] ?></div>
                </div>
                </a>
        <?php }?>
        </div>
        <?php } ?>
    </div>
</section>
<?php } else { ?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
    <?php if ($content_columns['section_title']) { ?><h2 class="pb-10"><?= $content_columns['section_title']; ?></h2><?php } ?>
        <?php if ($options['image_or_icon'] == 'image') { ?>
        <div class="grid grid-cols-12 gap-7 gap-y-12 lg:gap-y-7 ">
            <?php foreach ($content_columns['columns'] as $key => $item) { ?>
                <a href="<?= $item['card_link']['url']; ?>" class="flex justify-between col-span-12 p-4 bg-white border-b-4 rounded img-scale card border-forest-DEFUALT lg:col-span-4 group">
                    <?php if ($item['image']) { ?>
                        <div class="img-container flex-none w-[8rem] h-[8rem]">
                            <img class="object-cover w-full h-full rounded" src="<?= $item['image']['url'] ?>" alt="<?= $item['image']['alt'] ?>">
                        </div>
                    <?php } ?>
                    <div class="flex flex-col w-full px-8 pt-1">
                        <div class="pb-4 mr-8"><h4 class="relative table"><span class="relative z-10 block pr-5 bg-white"><?= $item['card_link']['title'] ?></span><img src="<?= get_template_directory_uri(). '/src/images/long-right-arrow.svg' ?>" class="animate-hover absolute group-hover:right-[-2rem] top-[6px] right-[-1rem] object-cover"  alt="Canadian Chamber of Commerce Icon" /></h4></div>
                        <div class="text-dark-body"><?= $item['body'] ?></div>
                    </div>
                    </a>
            <?php }?>
        </div>
        <?php } else { ?>
        <div class="grid grid-cols-12 gap-7 gap-y-12 lg:gap-y-7 ">
        <?php foreach ($content_columns['columns'] as $key => $item) { ?>
            <a href="<?= $item['card_link']['url']; ?>" class="flex flex-col col-span-12 p-8 bg-white rounded card lg:col-span-4 group">
                <?php if ($item['icon']) { ?>
                    <div class="flex-none pb-8 img-container">
                        <img class="object-cover h-[3rem] rounded" src="<?= $item['icon']['url'] ?>" alt="<?= $item['icon']['alt'] ?>">
                    </div>
                <?php } ?>
                <div class="flex flex-col w-full">
                    <div class="pb-4 mr-8"><h4 class="relative table"><span class="relative z-10 block pr-5 bg-white"><?= $item['card_link']['title'] ?></span><img src="<?= get_template_directory_uri(). '/src/images/long-right-arrow.svg' ?>" class="animate-hover absolute group-hover:right-[-2rem] top-[6px] right-[-1rem] object-cover"  alt="Canadian Chamber of Commerce Icon" /></h4></div>
                    <div class="text-dark-body"><?= $item['body'] ?></div>
                </div>
                </a>
        <?php }?>
        </div>
        <?php } ?>
    </div>
</section>
<?php } ?> 
<?php } ?>