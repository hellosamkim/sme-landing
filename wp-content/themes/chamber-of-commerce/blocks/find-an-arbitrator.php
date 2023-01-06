<?php

acf_register_block_type(array(
    'name'              => 'find-an-arbitrator',
    'title'             => __('Find an Arbitrator'),
    'render_callback'   => 'find_an_arbitrator_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function find_an_arbitrator_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'find-an-arbitrator-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'find-an-arbitrator';
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
            $form_filter[] = 'city';
            $form_filter[] = 'language';
            $form_filter[] = 'specialization';

            set_query_var('post_type', 'arbitrator');
            set_query_var('form_filter', $form_filter);
            set_query_var('page_size', 12);
            get_template_part('template-parts/partials/sidebar')
        ?>
        </div>
</section>
<div class="fixed top-0 left-0 z-50 flex items-center justify-center hidden w-full !max-w-[100%] h-screen overflow-auto bg-black/70" id="arbitrator-modal">
    <div class="absolute w-full lg:max-w-screen-lg max-w-[96vw] lg:p-10 p-5 py-16 transform -translate-x-1/2 -translate-y-1/2 rounded shadow bg-gray-topbar top-1/2 left-1/2 max-h-[90vh] overflow-auto">
        <a href="" class="absolute text-sm font-medium close-arbitrator-mdoal text-primary top-4 right-4"><i class="text-xl cursor-pointer close fa-solid fa-xmark text-primary"></i></a>
        <div id="main-arbitrator-profile"></div>
    </div>
</div>
<?php } ?>