<?php

acf_register_block_type(array(
    'name'              => 'hero',
    'title'             => __('Hero'),
    'render_callback'   => 'hero_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function hero_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$subheading = get_field('sub_heading');
$heading = get_field('heading');
$bannerimg = get_field('banner_image');
$body = get_field('body');
$cta = get_field('cta');
$background_colour = get_field('background_colour');
$banner_style = get_field('banner_style');
$c_colour = get_field('c_colour');


 global $post;
 

if ($banner_style == "style-1") { 
?>

<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> relative text-white" style="background: #<?= $background_colour; ?>">
    <div class="lg:container flex flex-col items-center justify-center md:flex md:flex-row md:min-h-[500px] relative z-10">
        <div class="container order-2 w-full py-16 md:order-1 md:w-2/5 xl:pr-20 lg:pr-10">
            <div class="content">
                 <?php if($post->post_parent) : ?>
                    <a href="<?=get_permalink( $post->post_parent ) ?>" class="inline-block pb-3 uppercase h5"><?= $subheading; ?> /</a>
                <?php else : ?>
                    <h5 class="pb-3 uppercase"><?= $subheading; ?></h5>
                <?php endif; ?>
                <h1 class="pb-6"><?= $heading; ?></h1>
                <p class="text-white subtitle"><?= $body; ?></p>
                <?php if($cta) { ?><a href="<?= $cta['url']; ?>" target="<?= $cta['target']; ?>" class="table mt-7 button-outline__white"><?= $cta['title']; ?></a><?php } ?>
            </div>
        </div>
        <div class="relative order-1 overflow-hidden lg:ml-0 lg:mr-0 md:order-2 md:w-3/5">
            <?php if ($bannerimg["url"]) { ?>
            <img class="md:hidden" src="<?= $bannerimg["url"] ?>" alt="" />
            <?php } ?>
            <img src="<?= get_template_directory_uri(). '/src/images/Triple-C.svg' ?>" class="absolute top-0 right-0 object-cover w-full h-full mix-blend-multiply"  alt="Canadian Chamber of Commerce Icon" />
        </div>
    </div>
    <div class="absolute top-0 left-0 flex-row hidden w-full h-full md:flex">
        <div class="order-1 w-full md:w-2/5 md:mr-20">
            &nbsp;
        </div>
        <div class="order-2 w-full md:w-3/5">
            <?php if ($bannerimg) { ?>
            <img class="block object-cover w-full h-full" src="<?= $bannerimg["url"] ?>" alt="" />
            <?php } ?>
        </div>
    </div>
    <img src="<?= get_template_directory_uri(). '/src/images/Triple-C.svg' ?>" class="absolute top-0 right-0 hidden w-1/2 lg:block lg:w-auto lg:h-full mix-blend-multiply"  alt="Canadian Chamber of Commerce Icon" />
</section>
<?php } else if ($banner_style == "style-2") { ?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> relative text-white" style="background: #<?= $background_colour; ?>">
    <div class="lg:container flex flex-col items-center justify-center md:flex md:flex-row md:min-h-[500px] relative z-10">
        <div class="container order-2 w-full py-16 md:order-1 md:w-1/2 lg:pr-10">
            <div class="content">
                 <?php if($post->post_parent) : ?>
                    <a href="<?=get_permalink( $post->post_parent ) ?>" class="inline-block pb-3 uppercase h5"><?= $subheading; ?> /</a>
                <?php else : ?>
                    <h5 class="pb-3 uppercase"><?= $subheading; ?></h5>
                <?php endif; ?>
                <h1 class="pb-6"><?= $heading; ?></h1>
                <p class="text-white subtitle"><?= $body; ?></p>
                <?php if($cta) { ?><a href="<?= $cta['url']; ?>" target="<?= $cta['target']; ?>" class="table mt-7 button-outline__white"><?= $cta['title']; ?></a><?php } ?>
            </div>
        </div>
        <div class="relative order-1 overflow-hidden lg:ml-0 lg:mr-0 md:order-2 md:w-1/2">
            <?php if ($bannerimg["url"]) { ?>
            <img class="md:hidden" src="<?= $bannerimg["url"] ?>" alt="" />
            <?php } ?>
            <img src="<?= get_template_directory_uri(). '/src/images/c-'. $c_colour .'.svg' ?>" class="absolute top-0 right-0 object-cover h-full mix-blend-multiply"  alt="Canadian Chamber of Commerce Icon" />
        </div>
    </div>
    <div class="absolute top-0 left-0 flex-row hidden w-full h-full md:flex">
        <div class="order-1 w-full md:w-1/2 md:mr-20">
            &nbsp;
        </div>
        <div class="order-2 w-full md:w-1/2">
            <img class="block object-cover w-full h-full" src="<?= $bannerimg["url"] ?>" alt="" />
        </div>
    </div>
    <img src="<?= get_template_directory_uri(). '/src/images/c-'. $c_colour .'.svg' ?>" class="absolute top-0 right-0 hidden w-1/2 lg:block lg:w-auto lg:h-full mix-blend-multiply"  alt="Canadian Chamber of Commerce Icon" />
</section>
<?php } elseif ($banner_style == "style-3") { ?>
    <section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> relative text-white" style="background: #<?= $background_colour; ?>">
    <div class="lg:container flex flex-col items-center justify-center md:flex md:flex-row md:min-h-[500px] relative z-10">
        <div class="container order-2 w-full py-16 md:order-1 md:w-1/2 lg:pr-10">
            <div class="content">
                <?php if($post->post_parent) : ?>
                    <a href="<?=get_permalink( $post->post_parent ) ?>" class="inline-block pb-3 uppercase h5"><?= $subheading; ?> /</a>
                <?php else : ?>
                    <h5 class="pb-3 uppercase"><?= $subheading; ?></h5>
                <?php endif; ?>
                <h1 class="pb-6"><?= $heading; ?></h1>
                <p class="text-white subtitle"><?= $body; ?></p>
                <?php if($cta) { ?><a href="<?= $cta['url']; ?>" target="<?= $cta['target']; ?>" class="table mt-7 button-outline__white"><?= $cta['title']; ?></a><?php } ?>
            </div>
        </div>
        <div class="relative order-1 overflow-hidden lg:ml-0 lg:mr-0 md:order-2 md:w-1/2">
            <?php if ($bannerimg) { ?>            
            <img class="md:hidden" src="<?= $bannerimg["url"] ?>" alt="" />
            <?php } ?>
        </div>
    </div>
    <div class="absolute top-0 left-0 flex-row hidden w-full h-full md:flex">
        <div class="order-1 w-full md:w-1/2 md:mr-20">
            &nbsp;
        </div>
        <div class="order-2 w-full md:w-1/2">
            <?php if ($bannerimg) { ?>
            <img class="block object-cover w-full h-full" src="<?= $bannerimg["url"] ?>" alt="" />
            <?php } ?>
        </div>
    </div>
</section>
<?php } else { ?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> relative text-white" style="background: #<?= $background_colour; ?>">
    <div class="flex flex-col items-center justify-center md:flex md:flex-row md:min-h-[500px] relative z-10">
        <div class="hidden lg:block order-2 w-full py-16 md:order-1 md:w-2/6 lg:w-[25%]">
            <img src="<?= get_template_directory_uri(). '/src/images/Triple-C.svg' ?>" class="absolute top-0 left-0 w-[240px] mix-blend-multiply"  alt="Canadian Chamber of Commerce Icon" />
        </div>
        <div class="container order-2 w-full py-16 md:order-1 md:w-3/6 lg:pr-10">
            <div class="content">
                 <?php if($post->post_parent) : ?>
                    <a href="<?=get_permalink( $post->post_parent ) ?>" class="inline-block pb-3 uppercase h5"><?= $subheading; ?> /</a>
                <?php else : ?>
                    <h5 class="pb-3 uppercase"><?= $subheading; ?></h5>
                <?php endif; ?>
                <h1 class="pb-6"><?= $heading; ?></h1>
                <p class="text-white subtitle"><?= $body; ?></p>
                <?php if($cta) { ?><a href="<?= $cta['url']; ?>" target="<?= $cta['target']; ?>" class="table mt-7 button-outline__white"><?= $cta['title']; ?></a><?php } ?>
            </div>
        </div>
        <div class="relative order-1 overflow-hidden lg:ml-0 lg:mr-0 md:order-2 md:w-2/6">
            <?php if ($bannerimg) { ?>
            <img class="md:hidden" src="<?= $bannerimg["url"] ?>" alt="" />
            <?php } ?>
        </div>
    </div>
    <div class="absolute top-0 left-0 flex-row hidden w-full h-full md:flex">
        <div class="order-1 w-full md:w-2/6 md:mr-20">
            &nbsp;
        </div>
        <div class="order-2 w-full md:w-3/6">
            &nbsp;
        </div>
        <div class="order-3 w-full md:w-4/6 lg:w-2/6">
            <?php if ($bannerimg) { ?>
            <img class="block object-cover w-full h-full" src="<?= $bannerimg["url"] ?>" alt="" />
            <?php } ?>
        </div>
    </div>
</section>

<?php }} ?>