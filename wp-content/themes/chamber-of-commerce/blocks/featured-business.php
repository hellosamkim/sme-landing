<?php

acf_register_block_type(array(
    'name'              => 'featured-business',
    'title'             => __('Featured Business'),
    'render_callback'   => 'featured_business_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled',
));

function featured_business_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-business-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'featured-business';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$options = get_field('options');
$heading = get_field('heading');

$data_service = new DataServiceCCC();
$featured_businesses = $data_service->getFeaturedMembersByMembershipType(MembershipTypeCRM::CORPORATE_MEMBERSHIP);
?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16 overflow-hidden relative" style="background: <?= $options['background_colour'] ?>">
    <div class="container">
        <h2 class="pb-10"><?= $heading; ?></h2>
        <?php if (isset($featured_businesses->total_count) && $featured_businesses->total_count > 0): ?>
        <div class="featured-businesses">
        <div class="flex flex-col justify-between col-span-12 md:col-span-6 lg:col-span-3">
            <div id="slick-featured-business">
                <?php foreach ($featured_businesses->elements as $index => $element) { 

                    $featured_business = $element;
                    $total_count = $featured_businesses->total_count;
                    $thumbnail_url = $featured_business->image ? 'data:image/png;base64,' . esc_attr($featured_business->image) : null;

                    if ( $featured_business->address1_city && $featured_business->address1_stateorprovince ) {
                        $location = esc_html($featured_business->address1_city.", ".$featured_business->address1_stateorprovince);
                    } elseif ( $featured_business->address1_city ) {
                        $location = $featured_business->address1_city;
                    } elseif ( $featured_business->address1_stateorprovince ) {
                        $location = $featured_business->address1_stateorprovince;
                    } else {
                        $location = null;
                    }
                ?>
                    <div class="py-5">
                        <div class="p-8 bg-white rounded card hover:card-shadow">
                            <div>
                                <?php if ($thumbnail_url) : ?>
                                <img class="md:w-1/2 lg:w-full max-w-[14rem] max-h-[3rem] mb-5 object-contain object-left rounded-t"
                                src="<?php echo $thumbnail_url; ?>" alt="">
                                <?php endif; ?>
                                <h3 class="pb-1"><?php echo esc_html($featured_business->name); ?></h3>
                                <?php if ( $featured_business->websiteurl ) : ?>
                                    <p><a href="<?php echo $featured_business->websiteurl ?>"><?php echo $featured_business->websiteurl ?></a></p>
                                <?php endif; ?>
                                <div class="flex flex-col pt-3">
                                        <?php if ($location) : ?>
                                        <a class="link whitespace-nowrap" href="tel:6132384000">
                                        <svg class="inline w-4 mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.452 492.452" style="enable-background:new 0 0 492.452 492.452;" xml:space="preserve"> <path id="XMLID_152_" d="M246.181,0C127.095,0,59.533,102.676,84.72,211.82c17.938,77.722,126.259,280.631,161.462,280.631 c32.892,0,143.243-202.975,161.463-280.631C432.996,103.74,365.965,0,246.181,0z M246.232,224.97 c-34.38,0-62.244-27.863-62.244-62.244c0-34.381,27.864-62.244,62.244-62.244c34.38,0,62.244,27.863,62.244,62.244 C308.476,197.107,280.612,224.97,246.232,224.97z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                        <?= $location ?>
                                        </a>
                                        <?php endif; ?>
                                        <?php if ($featured_business->telephone1) : ?>
                                        <a class="link whitespace-nowrap" href="tel:6132384000">
                                        <svg class="inline w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"> <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --> <path d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"> </path> </svg>
                                        <?= $featured_business->telephone1; ?>
                                        </a>
                                        <?php endif; ?>
                                        <?php if ($featured_business->emailaddress1) : ?>
                                        <a class="link whitespace-nowrap" href="mailto:magnew@chamber.ca">
                                        <svg class="inline w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"> <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --> <path d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"> </path> </svg>
                                        <?= $featured_business->emailaddress1; ?>
                                        </a>
                                        <?php endif; ?>
                                        <?php if (!$location) : ?>
                                            <p>&nbsp;</p>
                                        <? endif; ?>
                                        </a>
                                        <?php if (!$featured_business->telephone1) : ?>
                                            <p>&nbsp;</p>
                                        <? endif; ?>
                                        </a>
                                        <?php if (!$featured_business->emailaddress1) : ?>
                                            <p>&nbsp;</p>
                                        <? endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php } ?>