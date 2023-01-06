<?php

acf_register_block_type(array(
    'name'              => 'team-members',
    'title'             => __('Team Members'),
    'render_callback'   => 'team_members_cb',
    'category'          => 'chamber',
    'mode'              => 'edit',
    'supports'          => ['mode'=>false],
    'icon'              => 'star-filled'
));

function team_members_cb( $block) {

// Create id attribute allowing for custom "anchor" value.
$id = 'team-members-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team-members';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$options = get_field('options');
$content = get_field('content');

?>
<section id="<?= esc_attr($id); ?>" class="<?= esc_attr($className); ?> py-16" style="background: <?= $options['background_colour'] ?>">
    <div class="container <?php if ($options['centered_text']) { ?> text-center <?php } ?>">
        <div class="<?php if (!$options['full_width']) { echo "max-w-4xl"; } ?> mx-auto">
            <?php if ($content['heading']) { ?>
            <div class="items-end block pb-10">
                <h2 class="mb-0"><?= $content['heading']; ?></h2>
            </div>
            <?php } ?>
            <?php foreach ($content['members'] as $key => $member) { ?>
                <div class="flex flex-col items-start justify-between col-span-12 bg-white md:flex-row">
                    <?php if ($member['headshot']) { ?> 
                        <img class="w-[15rem] object-contain pr-8" src="<?= $member['headshot']['url'] ?>" alt="<?= $member['headshot']['alt'] ?>">
                    <?php } ?>
                        <div class="w-full !pt-0 pb-10 pr-8">
                            <h3 class="pb-1 leading-8"><?= $member['name'] ?></h3>
                            <div class="text-dark-body content">
                                <p class="pb-4"><strong><?= $member['position'] ?></strong></p>
                                <div class="flex flex-row pb-10 social-media">
                                    <?php if ($member['social_media']['twitter']) { ?><a href="<?= $member['social_media']['twitter']; ?>" target="_blank"><svg class="w-5" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 112.197 112.197" style="enable-background:new 0 0 112.197 112.197;" xml:space="preserve"> <g> <circle style="fill:#55ACEE;" cx="56.099" cy="56.098" r="56.098"/> <g> <path style="fill:#F1F2F2;" d="M90.461,40.316c-2.404,1.066-4.99,1.787-7.702,2.109c2.769-1.659,4.894-4.284,5.897-7.417 c-2.591,1.537-5.462,2.652-8.515,3.253c-2.446-2.605-5.931-4.233-9.79-4.233c-7.404,0-13.409,6.005-13.409,13.409 c0,1.051,0.119,2.074,0.349,3.056c-11.144-0.559-21.025-5.897-27.639-14.012c-1.154,1.98-1.816,4.285-1.816,6.742 c0,4.651,2.369,8.757,5.965,11.161c-2.197-0.069-4.266-0.672-6.073-1.679c-0.001,0.057-0.001,0.114-0.001,0.17 c0,6.497,4.624,11.916,10.757,13.147c-1.124,0.308-2.311,0.471-3.532,0.471c-0.866,0-1.705-0.083-2.523-0.239 c1.706,5.326,6.657,9.203,12.526,9.312c-4.59,3.597-10.371,5.74-16.655,5.74c-1.08,0-2.15-0.063-3.197-0.188 c5.931,3.806,12.981,6.025,20.553,6.025c24.664,0,38.152-20.432,38.152-38.153c0-0.581-0.013-1.16-0.039-1.734 C86.391,45.366,88.664,43.005,90.461,40.316L90.461,40.316z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></a><? } ?>
                                    <?php if ($member['social_media']['linkedin']) { ?><a href="<?= $member['social_media']['linkedin']; ?>" class="ml-2" target="_blank"><svg class="w-5" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 112.196 112.196" style="enable-background:new 0 0 112.196 112.196;" xml:space="preserve"> <g> <circle style="fill:#007AB9;" cx="56.098" cy="56.097" r="56.098"/> <g> <path style="fill:#F1F2F2;" d="M89.616,60.611v23.128H76.207V62.161c0-5.418-1.936-9.118-6.791-9.118 c-3.705,0-5.906,2.491-6.878,4.903c-0.353,0.862-0.444,2.059-0.444,3.268v22.524H48.684c0,0,0.18-36.546,0-40.329h13.411v5.715 c-0.027,0.045-0.065,0.089-0.089,0.132h0.089v-0.132c1.782-2.742,4.96-6.662,12.085-6.662 C83.002,42.462,89.616,48.226,89.616,60.611L89.616,60.611z M34.656,23.969c-4.587,0-7.588,3.011-7.588,6.967 c0,3.872,2.914,6.97,7.412,6.97h0.087c4.677,0,7.585-3.098,7.585-6.97C42.063,26.98,39.244,23.969,34.656,23.969L34.656,23.969z M27.865,83.739H41.27V43.409H27.865V83.739z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></a><? } ?>
                                </div>
                                <div class="body">
                                    <?= $member['bio'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>