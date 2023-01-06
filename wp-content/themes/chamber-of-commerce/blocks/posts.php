<?php

acf_register_block_type(array(
    'name'              => 'posts',
    'title'             => __('Posts'),
    'render_callback'   => 'posts_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function posts_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'posts-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'posts';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$heading = get_field('heading');
$post_type = get_field('post_type');

if ($post_type == "post") {
    $featured = get_field('featured_blog_post');
    $types_of_issues = get_terms( 'strategic-issues', array(
        'orderby'    => 'title',
        'hide_empty' => 0,
    ) );
} elseif ($post_type == "news") {
    $featured = get_field('featured_news_post');
    $types_of_issues = get_terms( 'news-strategic-issues', array(
        'orderby'    => 'title',
        'hide_empty' => 0,
    ) );
    $news_type = get_terms( 'news_type', array(
        'orderby'    => 'title',
        'hide_empty' => 0,
    ) );
} elseif ($post_type == "publications") {
    $featured = get_field('featured_publication_post');
    $types_of_publication = get_terms( 'publication', array(
        'orderby'    => 'title',
        'hide_empty' => 0,
        'parent' => 0 
    ) );
    $types_of_issues = get_terms( 'publication-strategic-issues', array(
        'orderby'    => 'title',
        'hide_empty' => 0,
    ) );
} elseif ($post_type == "policy-resolutions") {
    $featured = get_field('featured_policy_resolutions_post');
    $types_of_issues = get_terms( 'publication-strategic-issues', array(
        'orderby'    => 'title',
        'hide_empty' => 0,
    ) );
    $posts = new WP_Query( array(
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'publications',
        'post_status' => array('publish'),
        'posts_per_page'   => '5',
        'paged'   => $paged,
        'suppress_filters' => 0,
        'tax_query' => array(
            'relation' => 'OR',
              array(
                'taxonomy' => 'publication',
                'field' => 'term_id',
                'terms' => [163,173]
              )
          )
        )
    );  
} else {
    $featured = get_field('featured_publication_post');
    $types_of_issues = get_terms( 'publication-strategic-issues', array(
        'orderby'    => 'title',
        'hide_empty' => 0,
    ) );
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if (!$posts) {
    $posts = new WP_Query( array(
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => $post_type,
        'post_status' => array('publish'),
        'posts_per_page'   => '5',
        'paged'   => $paged,
        'suppress_filters' => 0,
        )
    );  
}

$total_pages = $posts->max_num_pages;

$current_page = max(1, get_query_var('paged'));

// taxonomies
$types_of_committees = get_terms( 'commitees', array(
    'orderby'    => 'title',
    'hide_empty' => 0,
) );
?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16  <?php if ($options['add_background_overlay']) { ?> bg-overlay <?php } ?> overflow-hidden relative" style="background: <?= $options['background_colour'] ?>">
<?php if ($heading) { ?>
    <div class="container relative featured !mb-[7rem]">
        <div class="relative">
            <h2 class="pb-10"><?= $heading; ?></h2>
            <?php if ($featured) { ?>
            <?php 
                $doc = get_field('publication_document', $featured->ID);
                $external_link = get_field('external_link', $featured->ID);
            ?>
            <a href="<?php if ($doc) { echo $doc; } else if ($external_link) { echo $external_link; } else { echo get_the_permalink($featured->ID); } ?>" <?php if ($doc) { echo "target='_blank'"; } ?> class="flex flex-col justify-between col-span-12 mb-8 bg-white rounded md:flex-row card lg:col-span-4 hover:card-shadow">
                <div class="relative md:w-1/2 md:min-h-[16rem] lg:min-h-[22rem]">
                    <img class="absolute object-cover object-top w-full h-full rounded-l" src="<?php if (get_the_post_thumbnail_url($featured->ID)) { echo get_the_post_thumbnail_url($featured->ID); } else { echo get_template_directory_uri(). '/src/images/placeholder-image.jpeg'; } ?>" alt="">
                </div>
                <div class="p-8 md:w-1/2">
                    <div class="flex items-center mb-4 meta <?php if (get_post_type($featured->ID) == "events" || get_post_type($featured->ID) == "policycommittees" || get_post_type($featured->ID) == "resources" || get_post_type($featured->ID) == "strategicissues") { echo "hidden"; } ?>">
                        <?php if (get_post_type($featured->ID) == "news") {
                            $label = get_the_terms($featured->ID,'news_type')[0]->name;
                            $slug = get_the_terms($featured->ID,'news_type')[0]->slug;
                        } else {
                            if (get_post_type($featured->ID)  == "post") {
                                $label = 'Blog';
                                $slug = 'post';
                            } else {
                                $label = get_post_type_object(get_post_type($featured->ID))->labels->singular_name;
                                $slug = get_post_type($featured->ID);
                            }
                        }
                        ?>
                        <?php if ($label) { ?><div class="mr-4 label <?= $slug; ?>"><?= $label ?></div><?php } ?>
                        <p class="dates"><?= get_the_date('M d, Y',$featured->ID) ?></p>
                    </div>
                    <h3 class="pb-4 leading-8"><?= get_the_title($featured->ID) ?></h3>
                    <div class="text-dark-body"><?= get_the_excerpt($featured->ID) ?></div>
            </div>
            </a>
            <?php } ?>
        </div>        
    </div>
    <?php } ?>
    <div class="container flex flex-col-reverse grid-cols-12 py-5 lg:grid lg:py-0">
        <div class="col-span-9 results-container">
            <div id="results" class="lg:pr-8">
            <h5 class="pagination-show border-b py-[0.9rem] lg:mr-8 hidden">Showing <?= 5 * $current_page; ?> out of <?= $posts->found_posts; ?></h5>
                <?php 
                    if($posts->have_posts()) {
                        while($posts->have_posts()) : $posts->the_post() ?>
                        <?php 
                            $doc = get_field('publication_document', get_the_ID());
                            $external_link = get_field('external_link', get_the_ID());
                        ?>

                            <a href="<?php if ($doc) { echo $doc; } else if ($external_link) { echo $external_link; } else { echo get_the_permalink($post->ID); } ?>" <?php if ($doc) { echo "target='_blank'"; } ?> class="relative flex flex-col justify-between col-span-12 mb-8 bg-white rounded md:flex-row card lg:col-span-4 hover:card-shadow">
                                <div class="relative md:w-1/3 h-[14rem] max-h-full p-8 pr-0">
                                    <img class="object-cover object-top w-full h-full rounded-l" src="<?php if (get_the_post_thumbnail_url($post->ID)) { echo get_the_post_thumbnail_url($post->ID); } else { echo get_template_directory_uri(). '/src/images/placeholder-image.jpeg'; } ?>" alt="">
                                </div>
                                <div class="p-8 md:w-2/3">
                                    <div class="flex items-center mb-4 meta">
                                        <?php if (get_post_type($post->ID) == "news") {
                                            $label = get_the_terms($post->ID,'news_type')[0]->name;
                                            $slug = get_the_terms($post->ID,'news_type')[0]->slug;
                                        } else {
                                            if (get_post_type($post->ID)  == "post") {
                                                $label = 'Blog';
                                                $slug = 'post';
                                            } else {
                                                $label = get_post_type_object(get_post_type($post->ID))->labels->singular_name;
                                                $slug = get_post_type($post->ID);
                                            }
                                        }
                                        ?>
                                        <?php if ($label) { ?><div class="mr-4 label <?= $slug; ?>"><?= $label ?></div><?php } ?>
                                        <p class="dates"><?= get_the_date('M d, Y',$post->ID) ?></p>
                                    </div>
                                    <h4 class="pb-4 leading-8"><?= get_the_title($post->ID) ?></h4>
                                    <div class="text-dark-body"><?= get_the_excerpt($post->ID) ?></div>
                                </div>
                            </a>

                        <?php endwhile;
                        wp_reset_postdata();
                    } else {
                        echo "<h3 class='my-5 text-center col-12'>No results were found</h4>";
                    }
                ?>
            <div class="pb-8 text-center lg:text-right lg:mr-8 pagination">
            <?php
                if ($total_pages > 1){

                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => '?page=%#%',
                        'current' => $current_page,
                        'total' => $total_pages,
                        'prev_text'    => __('<button class="pr-2 text-button"><i class="fa-solid fa-chevron-left"></i></button>'),
                        'next_text'    => __('<button class="pl-2 text-button"><i class="fa-solid fa-chevron-right"></i></button>'),
                    ));
                }
            ?>
            </div>
            </div>
        </div>
        <div class="col-span-3 filter">
        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="posts-filter">
            <input id="filter-search" class="w-full" type="text" placeholder="<?php _e('Search','chamber') ?>..." value="" name="search" id="search">

            <button class="block w-full mt-3 mb-3 button-filled button-filled__primary lg:hidden mobile-drawer-toggle"><?php _e('Filter','chamber') ?></button>


            <div class="mobile-drawer">
                  <a href="" class="absolute text-sm font-medium lg:hidden mobile-drawer-toggle text-primary top-4 right-4"><i class="text-xl cursor-pointer close fa-solid fa-xmark text-primary"></i></a>
            <?php if ($types_of_publication) { ?>
            <div class="my-8 news-type">
                <p class="mb-3 font-bold"><?php _e('Type of Publication','chamber') ?></p>
                <?php foreach ($types_of_publication as $key => $publication) { ?>
                    <div class="relative pt-1 pl-10 my-2 publication">
                        <input type="checkbox" name="publication-<?= $publication->term_id ?>" id="term-<?= $publication->term_id; ?>">
                        <label class="checkbox" for="term-<?= $publication->term_id; ?>"><?= $publication->name ?></label>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if ($news_type) { ?>
            <div class="my-8 news-type">
                <p class="mb-3 font-bold"><?php _e('Type of News','chamber') ?></p>
                <?php foreach ($news_type as $key => $news) { ?>
                    <div class="relative pt-1 pl-10 my-2 news">
                        <input type="checkbox" name="news-<?= $news->term_id ?>" id="term-<?= $news->term_id; ?>">
                        <label class="checkbox" for="term-<?= $news->term_id; ?>"><?= $news->name ?></label>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="my-8 type-of-issues">
                <p class="mb-3 font-bold"><?php _e('Type of Issues','chamber') ?></p>
                <?php foreach ($types_of_issues as $key => $issue) { ?>
                    <div class="relative pt-1 pl-10 my-2 issue">
                        <input type="checkbox" name="issue-<?= $issue->term_id ?>" id="term-<?= $issue->term_id; ?>">
                        <label class="checkbox" for="term-<?= $issue->term_id; ?>"><?= $issue->name ?></label>
                    </div>
                <?php } ?>
            </div>
            <!-- <div class="my-8 type-of-issues">
                <p class="mb-3 font-bold">Type of Committees</p>
                </?php foreach ($types_of_committees as $key => $committee) { ?>
                    <div class="relative pt-1 pl-10 my-2 committee">
                        <input type="checkbox" name="committee-</?= $committee->term_id ?>" id="committee-</?= $committee->term_id; ?>">
                        <label for="committee-</?= $committee->term_id; ?>"></?= $committee->name ?></label>
                    </div>
                </?php } ?>
            </div> -->
            <button class="block w-full mb-3 button-filled button-filled__primary lg:hidden mobile-drawer-toggle"><?php _e('Apply Filter','chamber') ?></button>
            <button id="filter-reset" class="block w-full button-filled button-outline__primary"><?php _e('Reset','chamber') ?></button>
                </div>
            <input type="hidden" name="current_page" value="1">
            <input type="hidden" name="action" value="postfilter">
            <input type="hidden" name="type" value="<?= $post_type; ?>">
            <input type="hidden" name="filtered" value="<?= $featured->ID; ?>">
        </form>
        </div>
</div>
</section>
<?php } ?>