<?php

acf_register_block_type(array(
    'name'              => 'featured-posts',
    'title'             => __('Featured Posts'),
    'render_callback'   => 'featured_posts_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function featured_posts_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-posts-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-posts';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$heading = get_field('heading');
$cta = get_field('cta');
$dark_background = get_field('dark_background');
$hide_meta = get_field('hide_meta');
$main_featured_post;
$featured_posts;

if ($options['type_of_post'] == "post") {
    $main_featured_post = get_field('featured_blog')[0];
    $featured_posts = array_slice(get_field('featured_blog'), 1);
} else if ($options['type_of_post'] == "events") {
    $main_featured_post = get_field('featured_events')[0];
    $featured_posts = array_slice(get_field('featured_events'), 1);
} else if ($options['type_of_post'] == "news") {
    $main_featured_post = get_field('featured_news')[0];
    $featured_posts = array_slice(get_field('featured_news'), 1);
} else if ($options['type_of_post'] == "resources") {
    $main_featured_post = get_field('featured_resources')[0];
    $featured_posts = array_slice(get_field('featured_resources'), 1);
} else if ($options['type_of_post'] == "policycommittees") {
    $main_featured_post = get_field('featured_policy_committees_&_councils')[0];
    $featured_posts = array_slice(get_field('featured_policy_committees_&_councils'), 1);
} else if ($options['type_of_post'] == "campaigns") {
    $main_featured_post = get_field('featured_campaigns')[0];
    $featured_posts = array_slice(get_field('featured_campaigns'), 1);
} else if ($options['type_of_post'] == "strategic-issues") {
    $main_featured_post = get_field('featured_strategic_issues')[0];
    $featured_posts = array_slice(get_field('featured_strategic_issues'), 1);
} else if ($options['type_of_post'] == "all") {
    $main_featured_post = get_field('featured_posts')[0];
    $featured_posts = array_slice(get_field('featured_posts'), 1);
}

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16  <?php if ($options['add_background_overlay']) { ?> bg-overlay <?php } ?> overflow-hidden relative" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
        <div class="relative">
            <?php if ($heading) { ?><h2 class="pb-10"><?= $heading; ?></h2><?php } ?>
            <?php if (!$options['no_featured_post']) { ?>
            <?php if (get_field('external_link', $main_featured_post['post'])) {
                $link = get_field('external_link', $main_featured_post['post']);
            } else {
                $link = get_the_permalink($main_featured_post['post']);
            }
            $doc = get_field('publication_document', $main_featured_post['post']);
            if ($doc) {
                $link = $doc;
            }
            ?>
            <a href="<?= $link; ?>" <?php if ($doc || get_field('external_link', $item['post'])) { echo "target='_blank'"; } ?> class="flex flex-col justify-between col-span-12 mb-8 bg-white rounded md:flex-row card lg:col-span-4 hover:card-shadow">
                <div class="relative md:w-1/2 md:min-h-[16rem] lg:min-h-[22rem]">
                    <img class="absolute object-cover object-top w-full h-full rounded-l" src="<?php if (get_the_post_thumbnail_url($main_featured_post['post'])) { echo get_the_post_thumbnail_url($main_featured_post['post']); } else { echo get_template_directory_uri(). '/src/images/placeholder-image.jpeg'; } ?>" alt="">
                </div>
                <div class="p-8 md:w-1/2">
                    <?php if (!$hide_meta) { ?>
                    <div class="flex items-center mb-4 meta <?php if (get_post_type($main_featured_post['post']) == "events" || get_post_type($main_featured_post['post']) == "policycommittees" || get_post_type($main_featured_post['post']) == "resources" || get_post_type($main_featured_post['post']) == "strategicissues") { echo "hidden"; } ?>">
                        <?php
                            if (get_post_type($main_featured_post['post'])  == "post") {
                                $label = 'Blog';
                                $slug = 'post';
                            } else {
                                $label = get_post_type_object(get_post_type($main_featured_post['post']))->labels->singular_name;
                                $slug = get_post_type($main_featured_post['post']);
                            }
                        ?>
                        <div class="mr-4 label <?= $slug; ?>"><?= $label ?></div>
                        <p class="dates"><?= get_the_date('M d, Y',$main_featured_post['post']) ?></p>
                    </div>
                    <?php } ?>
                    <h3 class="pb-4 leading-8"><?= get_the_title($main_featured_post['post']) ?></h3>
                    <div class="text-dark-body"><?= get_the_excerpt($main_featured_post['post']) ?></div>
                </div>
            </a>

            <?php } ?>
            <div class="grid grid-cols-12 gap-5">
                <?php foreach ($featured_posts as $key => $item) { ?>
                    <?php if (get_field('external_link', $item['post'])) {
                        $link = get_field('external_link', $item['post']);
                    } else {
                        $link = get_the_permalink($item['post']);
                    }
                    $doc = get_field('publication_document', $item['post']);
                    if ($doc) {
                        $link = $doc;
                    }
                    ?>
                    <a href="<?= $link; ?>" <?php if ($doc || get_field('external_link', $item['post'])) { echo "target='_blank'"; } ?> class="flex flex-col col-span-12 bg-white rounded md:flex-row lg:flex-col card lg:col-span-4 hover:card-shadow">
                        <img class="md:w-1/2 lg:w-full h-[16rem] object-cover rounded-t" src="<?php if (get_the_post_thumbnail_url($item['post'])) { echo get_the_post_thumbnail_url($item['post'], 'medium_large'); } else { echo "/wp-content/themes/chamber-of-commerce/src/images/placeholder-image.jpeg"; } ?>" alt="">
                        <div class="p-8 md:px-8 md:py-4 md:w-1/2 lg:w-full">
                            <?php if (!$hide_meta) { ?>
                            <div class="flex items-center mb-4 meta <?php if (get_post_type($item['post']) == "events" || get_post_type($item['post']) == "policycommittees" || get_post_type($item['post']) == "resources" || get_post_type($item['post']) == "strategicissues") { echo "hidden"; } ?>">
                                <?php 
                                if (get_post_type($item['post'])  == "post") {
                                    $label = 'Blog';
                                    $slug = 'post';
                                } else {
                                    $label = get_post_type_object(get_post_type($item['post']))->labels->singular_name;
                                    $slug = get_post_type($item['post']);
                                }
                                ?>
                                <?php if ($label) { ?><div class="mr-4 label <?= $slug; ?>"><?= $label ?></div><?php } ?>
                                <p class="dates"><?= get_the_date('M d, Y',$item['post']) ?></p>
                            </div>
                            <?php } ?>
                            <h3 class="pb-4 leading-8"><?= get_the_title($item['post']) ?></h3>
                            <div class="text-dark-body"><?= get_the_excerpt($item['post']) ?></div>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <?php if ($cta) { ?>
            <div class="flex justify-end mt-10 mr-2 lg:mt-20">
                <a href="<?= $cta['url'] ?>" class="text-button"><i class="fa-solid fa-chevron-right"></i> <span><?= $cta['title'] ?></span></a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>