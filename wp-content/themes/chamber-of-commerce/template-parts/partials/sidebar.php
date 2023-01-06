<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="post" class="search-form" novalidate="novalidate" id="filter_sidebar_form">
    <input type="hidden" value="<?php echo $post_type; ?>" name="post_type" id="post_type"/>
    <input type="hidden" value="1" name="paged" id="paged"/>
    <input type="hidden" value="<?php echo $page_size; ?>" name="page_size"/>
    <input type="hidden" value="<?php echo apply_filters( 'wpml_current_language', NULL ); ?>" name="lang"/>

    <input type="hidden" name="current_page" value="1">
    <?php if (isset($role)): ?>
        <input type="hidden" value="<?php echo $role ?>" name="role"/>
    <?php endif;
    if (isset($committee)):?>
        <input type="hidden" value="<?php echo $committee ?>" name="committee"/>
    <?php endif;
    if (isset($exclude)): ?>
        <input type="hidden" value="<?php echo $exclude; ?>" name="exclude"/>
    <?php endif;
    if (isset($member_type)): ?>
        <input type="hidden" value="<?php echo $member_type; ?>" name="member_type"/>
    <?php endif;
    foreach ($form_filter as $current_filter): ?>
        <?php if ($current_filter == 'search'): ?>
            <div class="mb-3 search">
                <div class="relative flex items-center">
                    <input type="search" class="text-field"
                            placeholder="<?php _e('Search', 'Chamber'); ?>…" value=""
                            name="search" style="width: 100%">
                            <i class="absolute pb-1 m-auto cursor-pointer fa-search fa hover:border-b-2 right-4 border-primary" aria-hidden="true"></i>
                </div>
                <input type="submit" class="hidden search_img" id="search_button" value=""/>
            </div>
        <?php endif; ?>

        <?php if (strpos($current_filter, 'taxonomy') !== false) {
            if ($current_filter == "custom_taxonomy") {
                get_taxonomy_filter($custom_taxonomy_title, $custom_terms_list, false);
            } else {
                $current_taxonomy = get_taxonomy($current_filter);

                $terms = get_terms(['taxonomy' => $current_filter, 'hide_empty' => false]);
                get_taxonomy_filter($current_taxonomy->labels->singular_name, $terms, $current_taxonomy->hierarchical);
            }
        } ?>

        <?php if ($current_filter == 'issues'):
            $related_query = new WP_Query(
                array(
                    'post_type' => 'issue', 'posts_per_page' => -1
                )
            ); ?>
            <div class="wpb_wrapper" style="margin-bottom: 10px">
                <span class="filter_heading"><?php _e('Type of Issues', 'Chamber'); ?></span>
                <fieldset> <span>
                    <label class="checkbox-container">
                        <span><?php _e('All', 'Chamber'); ?></span>
                        <input type="checkbox" value="All" class="all_checkbox" name="all_issues"
                                checked="checked"/>
                        <span class="checkmark"></span>
                    </label>
                    <?php foreach ($related_query->posts as $current_issue): ?>
                        <label class="checkbox-container">
                            <span><?php echo $current_issue->post_title; ?></span>
                            <input type="checkbox" name="issues" checked="checked"
                                    class="checkbox_filter" value="<?php echo $current_issue->ID; ?>"/>
                            <span class="checkmark"></span>
                        </label>
                    <?php endforeach;
                    wp_reset_postdata();
                    ?>
                    </span>
                </fieldset>
            </div>
        <?php endif; ?>

        <?php if (strpos($current_filter, 'province') !== false):

            $provinces = $current_filter == 'province' ? DataServiceCCC::getProvinces() : DataServiceCCC::getMarketingProvinces();
            ?>
            <div class="mb-3 accordion" id="province">
                <div class="bg-white border rounded">
                    <h2 class="mb-0 accordion-header" id="headingProvince">
                    <button class="relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProvince" aria-expanded="false" aria-controls="collapseProvince">
                        Province/Territory
                        <svg class="absolute right-4 top-0 bottom-0 m-auto w-[1.7rem] h-auto" width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M4.18179 6.18181C4.35753 6.00608 4.64245 6.00608 4.81819 6.18181L7.49999 8.86362L10.1818 6.18181C10.3575 6.00608 10.6424 6.00608 10.8182 6.18181C10.9939 6.35755 10.9939 6.64247 10.8182 6.81821L7.81819 9.81821C7.73379 9.9026 7.61934 9.95001 7.49999 9.95001C7.38064 9.95001 7.26618 9.9026 7.18179 9.81821L4.18179 6.81821C4.00605 6.64247 4.00605 6.35755 4.18179 6.18181Z" fill="currentColor" /> </svg>
                    </button>
                    </h2>
                    <div id="collapseProvince" class="accordion-collapse collapse" aria-labelledby="headingProvince"
                    data-bs-parent="#province">
                    <div class="px-4 py-4 accordion-body">
                    <?php foreach ($provinces as $code => $current_prov): ?>
                        <div class="relative pt-1 pl-10 my-2">
                            <input type="checkbox" class="checkbox_filter" name="province" value="<?php echo $code; ?>" id="province-<?= $code; ?>">
                            <label class="checkbox" for="province-<?= $code; ?>"><?php _e($current_prov, "chamber-of-commerce"); ?></label>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($current_filter == "daterange"): ?>
            <div class="accordion_filter_container">
                <h6 class="accordion-header filter_heading"
                    data-target="date_range_container"><?php _e("Dates", "Chamber"); ?>
                    <div class="arrow-down"></div>
                </h6>
                <div class="checkboxes" style="display: none; margin-bottom: 5px"
                        id="date_range_container">
                    <input type="text" name="dates" value="" id="dates_filter" class="form-control"/>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($current_filter == 'specialization'): ?>
            <div class="mb-3 accordion" id="specialization">
                <div class="bg-white border rounded">
                    <h2 class="mb-0 accordion-header" id="headingSpecialization">
                    <button class="relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSpecialization" aria-expanded="false" aria-controls="collapseSpecialization">
                        Specializations
                        <svg class="absolute right-4 top-0 bottom-0 m-auto w-[1.7rem] h-auto" width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M4.18179 6.18181C4.35753 6.00608 4.64245 6.00608 4.81819 6.18181L7.49999 8.86362L10.1818 6.18181C10.3575 6.00608 10.6424 6.00608 10.8182 6.18181C10.9939 6.35755 10.9939 6.64247 10.8182 6.81821L7.81819 9.81821C7.73379 9.9026 7.61934 9.95001 7.49999 9.95001C7.38064 9.95001 7.26618 9.9026 7.18179 9.81821L4.18179 6.81821C4.00605 6.64247 4.00605 6.35755 4.18179 6.18181Z" fill="currentColor" /> </svg>
                    </button>
                    </h2>
                    <div id="collapseSpecialization" class="accordion-collapse collapse" aria-labelledby="headingSpecialization"
                    data-bs-parent="#specialization">
                    <div class="px-4 py-4 accordion-body">
                    <input type="text" name="specialization" value="" id="specialization_filter" class="w-full" placeholder="ex: Arbitration"/>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($current_filter == 'language'):
            $languages = DynamicsIntegration::languagesCRMOptions();
            ?>
            <div class="mb-3 accordion" id="language">
                <div class="bg-white border rounded">
                    <h2 class="mb-0 accordion-header" id="headingLanguage">
                    <button class="relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLanguage" aria-expanded="false" aria-controls="collapseLanguage">
                        Languages
                        <svg class="absolute right-4 top-0 bottom-0 m-auto w-[1.7rem] h-auto" width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M4.18179 6.18181C4.35753 6.00608 4.64245 6.00608 4.81819 6.18181L7.49999 8.86362L10.1818 6.18181C10.3575 6.00608 10.6424 6.00608 10.8182 6.18181C10.9939 6.35755 10.9939 6.64247 10.8182 6.81821L7.81819 9.81821C7.73379 9.9026 7.61934 9.95001 7.49999 9.95001C7.38064 9.95001 7.26618 9.9026 7.18179 9.81821L4.18179 6.81821C4.00605 6.64247 4.00605 6.35755 4.18179 6.18181Z" fill="currentColor" /> </svg>
                    </button>
                    </h2>
                    <div id="collapseLanguage" class="accordion-collapse collapse" aria-labelledby="headingLanguage"
                    data-bs-parent="#language">
                    <div class="px-4 py-4 accordion-body">
                    <input type="text" name="language" value="" id="language_filter" class="w-full" placeholder="ex: English"/>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($current_filter == 'event_type'):
            $eventTypes = get_query_var('event_types'); ?>
            <div style="margin-bottom: 10px; margin-top: 10px;" id="type_event_filter">
                <span class="filter_heading"><?php _e('Type of Event', 'Chamber'); ?></span>
                <fieldset class="checkboxes">
                <span>
                    <?php if (count($eventTypes) > 1): ?>
                        <label class="checkbox-container">
                            <span><?php _e('All', 'Chamber'); ?></span>
                            <input type="checkbox" value="1" name="all_events" checked="checked"
                                    class="all_checkbox">
                            <span class="checkmark"></span>
                        </label>
                    <?php endif; ?>
                    <?php foreach ($eventTypes as $code => $current_event): ?>
                        <label class="checkbox-container">
                            <span><?php _e($current_event, 'Chamber'); ?></span>
                            <input type="checkbox" checked="checked" class="checkbox_filter"
                                    name="event_type" value="<?php echo $code; ?>">
                            <span class="checkmark"></span>
                        </label>
                    <?php endforeach; ?>
                </span>
                </fieldset>
            </div>
        <?php endif; ?>

        <?php if ($current_filter == "city"): ?>
            <div class="mb-3 accordion" id="city">
                <div class="bg-white border rounded">
                    <h2 class="mb-0 accordion-header" id="headingCity">
                    <button class="relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCity" aria-expanded="false" aria-controls="collapseCity">
                        City
                        <svg class="absolute right-4 top-0 bottom-0 m-auto w-[1.7rem] h-auto" width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M4.18179 6.18181C4.35753 6.00608 4.64245 6.00608 4.81819 6.18181L7.49999 8.86362L10.1818 6.18181C10.3575 6.00608 10.6424 6.00608 10.8182 6.18181C10.9939 6.35755 10.9939 6.64247 10.8182 6.81821L7.81819 9.81821C7.73379 9.9026 7.61934 9.95001 7.49999 9.95001C7.38064 9.95001 7.26618 9.9026 7.18179 9.81821L4.18179 6.81821C4.00605 6.64247 4.00605 6.35755 4.18179 6.18181Z" fill="currentColor" /> </svg>
                    </button>
                    </h2>
                    <div id="collapseCity" class="accordion-collapse collapse" aria-labelledby="headingCity"
                    data-bs-parent="#city">
                    <div class="px-4 py-4 accordion-body">
                    <input type="text" name="city" value="" id="city_filter" class="w-full" placeholder="ex: Toronto"/>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($current_filter == "industry_type"):
            $industry_types = DataServiceCCC::getIndustryTypes();
            ?>
            <div class="mb-3 accordion" id="industry">
                <div class="bg-white border rounded">
                    <h2 class="mb-0 accordion-header" id="headingIndustry">
                    <button class="relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseIndustry" aria-expanded="false" aria-controls="collapseIndustry">
                        Industry Type
                        <svg class="absolute right-4 top-0 bottom-0 m-auto w-[1.7rem] h-auto" width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M4.18179 6.18181C4.35753 6.00608 4.64245 6.00608 4.81819 6.18181L7.49999 8.86362L10.1818 6.18181C10.3575 6.00608 10.6424 6.00608 10.8182 6.18181C10.9939 6.35755 10.9939 6.64247 10.8182 6.81821L7.81819 9.81821C7.73379 9.9026 7.61934 9.95001 7.49999 9.95001C7.38064 9.95001 7.26618 9.9026 7.18179 9.81821L4.18179 6.81821C4.00605 6.64247 4.00605 6.35755 4.18179 6.18181Z" fill="currentColor" /> </svg>
                    </button>
                    </h2>
                    <div id="collapseIndustry" class="accordion-collapse collapse" aria-labelledby="headingIndustry"
                    data-bs-parent="#industry">
                    <div class="px-4 py-4 accordion-body">
                    <?php foreach ($industry_types as $code => $current_industry): ?>
                        <div class="relative pt-1 pl-10 my-2">
                            <input type="checkbox" class="checkbox_filter" name="industry" value="<?php echo $code; ?>" id="industry-<?= $code; ?>">
                            <label class="checkbox" for="industry-<?= $code; ?>"><?php _e($current_industry, "chamber-of-commerce"); ?></label>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($current_filter == "account_service"):
            $services = DataServiceCCC::getServicesWithoutKeys();
            ?>
            <div class="mb-3 accordion" id="service">
                <div class="bg-white border rounded">
                    <h2 class="mb-0 accordion-header" id="headingService">
                    <button class="relative" type="button" data-bs-toggle="collapse" data-bs-target="#collapseService" aria-expanded="false" aria-controls="collapseService">
                        Services
                        <svg class="absolute right-4 top-0 bottom-0 m-auto w-[1.7rem] h-auto" width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M4.18179 6.18181C4.35753 6.00608 4.64245 6.00608 4.81819 6.18181L7.49999 8.86362L10.1818 6.18181C10.3575 6.00608 10.6424 6.00608 10.8182 6.18181C10.9939 6.35755 10.9939 6.64247 10.8182 6.81821L7.81819 9.81821C7.73379 9.9026 7.61934 9.95001 7.49999 9.95001C7.38064 9.95001 7.26618 9.9026 7.18179 9.81821L4.18179 6.81821C4.00605 6.64247 4.00605 6.35755 4.18179 6.18181Z" fill="currentColor" /> </svg>
                    </button>
                    </h2>
                    <div id="collapseService" class="accordion-collapse collapse" aria-labelledby="headingService"
                    data-bs-parent="#service">
                    <div class="px-4 py-4 accordion-body">
                    <?php foreach ($services as $code => $current_service): ?>
                        <div class="relative pt-1 pl-10 my-2">
                            <input type="checkbox" class="checkbox_filter" name="service" value="<?php echo $code; ?>" id="service-<?= $code; ?>">
                            <label class="checkbox" for="service-<?= $code; ?>"><?php _e($current_service, "chamber-of-commerce"); ?></label>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <button id="filter_submit" type="submit" class="mb-3 button-filled button-outline__primary lg:w-full">
        <?php _e('Apply filter', 'Chamber'); ?>
    </button>
    <button id="filter_reset" type="button" class="button-filled button-outline__primary lg:w-full">
        <?php _e('Reset', 'Chamber'); ?>
    </button>
    <input type="hidden" name="check_nonce" value="<?= wp_create_nonce('form_filter_nonce'); ?>">
</form>