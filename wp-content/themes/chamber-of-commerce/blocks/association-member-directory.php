<?php

acf_register_block_type(array(
    'name'              => 'association-member-directory',
    'title'             => __('Association Member Directory'),
    'render_callback'   => 'association_member_directory_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function association_member_directory_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'association-member-directory-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'association-member-directory';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16  overflow-hidden relative" style="background: <?= $options['background_colour'] ?>">
<div class="container flex flex-col-reverse grid-cols-12 lg:grid">
        <div class="col-span-9 results-container">
            <div class="relative pr-8">
                <h5 class="pagination-show border-b py-[0.9rem] lg:mr-8 hidden">Showing <span id='text_count'></span> out of <span id='text_total'></span></h5>
                <div id="loading" class="absolute flex justify-center w-full my-3"><img src="<?= get_template_directory_uri(). '/src/images/spinner.gif' ?>" alt=""></div><div id="list_container"></div>
            </div>
        </div>
        <div class="col-span-3 filter">
        <?php
            require_once dirname(__FILE__) . "/../inc/dynamics/dynamicsIntegration.php";
            $form_filter = array('search');

            $form_filter[] = 'province';

            set_query_var('post_type', 'association');
            set_query_var('form_filter', $form_filter);
            set_query_var('page_size', 12);
            get_template_part('template-parts/partials/sidebar')
        ?>
        </div>
</section>
<?php } ?>