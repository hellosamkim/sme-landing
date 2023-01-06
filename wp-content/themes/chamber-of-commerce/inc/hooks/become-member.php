<?php
  add_action('wp_ajax_nopriv_becomemember', 'becomemember');
  add_action('wp_ajax_becomemember', 'becomemember');

  function becomemember() {
    error_log($_POST['first_name'], date("Y/m/d"));
    require_once dirname(__FILE__) . "/../data_service/DataServiceCCC.php";
    check_ajax_referer( 'business_member', 'security' );

    $memberData = new stdClass();

    $memberData->type = sanitize_text_field($_POST['type']);
    $memberData->company_name = sanitize_text_field($_POST['chamber_name']);
    $memberData->description = array_key_exists('business_type', $_POST) ? sanitize_text_field($_POST['business_type']) : '';

    $prefix = $_POST['type'] == 'Chamber' ? '' : strtolower(sanitize_text_field($_POST['type'])) . '_';

    $memberData->address1_line1 = sanitize_text_field($_POST[$prefix . 'address_line1']);
    $memberData->address1_line2 = array_key_exists($prefix . 'address_line2', $_POST) ? sanitize_text_field($_POST[$prefix . 'address_line2']) : '';
    $memberData->address1_city = sanitize_text_field($_POST[$prefix . 'city']);
    if (array_key_exists($prefix . 'province', $_POST) && array_key_exists($_POST[$prefix . 'province'], DynamicsIntegration::provinceCRMOptions())){
        $memberData->address1_stateorprovince = DynamicsIntegration::provinceCRMOptions()[$_POST[$prefix . 'province']];
    }
    $memberData->address1_postalcode = sanitize_text_field($_POST[$prefix . 'postal']);

    $memberData->telephone1 = sanitize_text_field($_POST[$prefix . 'telephone']);
    $memberData->twitter = array_key_exists('twitter_handle', $_POST) ? sanitize_text_field($_POST['twitter_handle']) : '';
    $memberData->facebook = array_key_exists('facebookUrl', $_POST) ? esc_url($_POST['facebookUrl']) : '';
    $memberData->websiteurl = array_key_exists('website', $_POST) ? esc_url($_POST['website']) : '';

    $memberData->numberofemployees = array_key_exists('how_many_jobs', $_POST) ? sanitize_text_field($_POST['how_many_jobs']) : '';
    $memberData->yearlyfinancialcontributiontoprograms = array_key_exists('your_yearly_financial', $_POST) ? sanitize_text_field($_POST['your_yearly_financial']) : '';

    if ($memberData->type == 'Business')
    {
        $memberData->memberoflocalchamber = array_key_exists('local_chamber', $_POST) ? sanitize_text_field($_POST['local_chamber']) : '';
        $memberData->memberofprovincialchamber = array_key_exists('prov_chamber', $_POST) ? sanitize_text_field($_POST['prov_chamber']) : '';
    }

    $memberData->acceptedtc = array_key_exists('accept_conditions', $_POST) ? 1 : 0;

    if($_POST['type'] == BecomeMemberType::ASSOCIATION)
    {
        $memberData->association_type = sanitize_text_field($_POST['partner_type']);
    }
    
    $contactData = new stdClass();
    if (array_key_exists('prefix', $_POST) && array_key_exists($_POST['prefix'], DynamicsIntegration::salutationCRMOptions())){
        $contactData->salutation       = $_POST['prefix'];
    }
    $contactData->firstname        = sanitize_text_field($_POST['first_name']);
    $contactData->lastname         = sanitize_text_field($_POST['last_name']);
    $contactData->emailaddress1    = sanitize_email($_POST['email']);
    $contactData->jobtitle         = sanitize_text_field($_POST['title']);

    if ($memberData->type != 'Chamber'){
        $contactData->contactphone     = sanitize_text_field($_POST['telephone']);
        $contactData->ccc_lauguagepref = sanitize_text_field($_POST['primary_lang']);
    }

    $chamberMemberTypes = null;
    $chamberOthersStaff = null;
    if ($memberData->type == 'Chamber'){
        $contactData->termofoffice = sanitize_text_field($_POST['terms_office']);

        $chamberMemberTypes = array();
        $chamberMemberTypes['1_99members'] = 0;
        $chamberMemberTypes['100_199members'] = 0;
        $chamberMemberTypes['200_399members'] = 0;
        $chamberMemberTypes['400_599members'] = 0;
        $chamberMemberTypes['600_799members'] = 0;
        $chamberMemberTypes['800_1199members'] = 0;
        $chamberMemberTypes['1200_2999members'] = 0;
        $chamberMemberTypes['3000_3999members'] = 0;
        $chamberMemberTypes['4000_5999members'] = 0;
        $chamberMemberTypes['6000_plus'] = 0;

        if (array_key_exists('chamber_size', $_POST) && array_key_exists($_POST['chamber_size'], $chamberMemberTypes)){
            $chamberMemberTypes[$_POST['chamber_size']] = 1;
        }

        $chamberOthersStaff = array();
        if (array_key_exists('senior_name', $_POST)){
            $chamberOthersStaff['seniorchamberstaffname'] = sanitize_text_field($_POST['senior_name']);
        }
        if (array_key_exists('senior_title', $_POST)){
            $chamberOthersStaff['seniorchamberstafftitle'] = sanitize_text_field($_POST['senior_title']);
        }
        if (array_key_exists('senior_email', $_POST)){
            $chamberOthersStaff['seniorstaffemail'] = sanitize_email($_POST['senior_email']);
        }
        if (array_key_exists('staff_member_name', $_POST)){
            $chamberOthersStaff['keychamberstaffname'] = sanitize_text_field($_POST['staff_member_name']);
        }
        if (array_key_exists('staff_member_title', $_POST)){
            $chamberOthersStaff['keychamberstafftitle'] = sanitize_text_field($_POST['staff_member_title']);
        }
        if (array_key_exists('staff_member_email', $_POST)){
            $chamberOthersStaff['keychamberstaffemail'] = sanitize_email($_POST['staff_member_email']);
        }
    }

    $areasOfInterestData = null;
    $industryTypesData = null;

    if($_POST['type'] == BecomeMemberType::BUSINESS || $_POST['type'] == BecomeMemberType::ASSOCIATION) {
        $areas = $GLOBALS['areas'];
        $areasOfInterestData = array();
        foreach ($areas as $key => $value) {
            $areasOfInterestData[$key] = 0;
        }
        if (isset($_POST['interest_area'])) {
            if(is_string($_POST['interest_area']) && array_key_exists($_POST['interest_area'], $areas)){
                $areasOfInterestData[$_POST['interest_area']] = 1;
            }
            else{
                foreach ($_POST['interest_area'] as $current) {
                    if (array_key_exists($current, $areas)){
                        $areasOfInterestData[$current] = 1;
                    }
                }
            }
        }

        $areasOfInterestData['otherareasofpolicyinterest'] = array_key_exists('other_areas', $_POST) ? sanitize_text_field($_POST['other_areas']) : '';
        $areasOfInterestData['countryofinterest1'] = array_key_exists('area1', $_POST) ? sanitize_text_field($_POST['area1']) : '';
        $areasOfInterestData['countryofinterest2'] = array_key_exists('area2', $_POST) ? sanitize_text_field($_POST['area2']) : '';
        $areasOfInterestData['countryofinterest3'] = array_key_exists('area3', $_POST) ? sanitize_text_field($_POST['area3']) : '';

        $industries = $GLOBALS['industries'];
        $industryTypesData = array();
        foreach ($industries as $key => $value) {
            $industryTypesData[$key] = 0;
        }
        if (isset($_POST['industry_type']) && array_key_exists($_POST['industry_type'], $industries)) {
            $industryTypesData[$_POST['industry_type']] = 1;
        }
    }

    $dataservice = new DataServiceCCC();
    echo $dataservice->insertRequestOfMember($memberData, $contactData, $areasOfInterestData, $industryTypesData, $chamberMemberTypes, $chamberOthersStaff);


    wp_die();
}