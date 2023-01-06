<?php
require_once dirname( __FILE__ )."/../data_service/DataServiceCCC.php";

function render_alert($show_close = true){ ?>
        <div id="alert_message" class="alert show alert-dismissable fadeInUp alert-danger" role="alert">
            <span class="result_message"><strong><?php e__translate("Error!","Chamber"); ?></strong> <?php e__translate("An error occur during processing your request. Please Try Again.","Chamber"); ?></span>
            <?php if($show_close): ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <?php endif; ?>
        </div>
<?php }

function custom_post_type_handler()
{
    check_ajax_referer( 'form_filter_nonce', 'security' );
    $post_type = explode(",",sanitize_text_field($_POST['post_type']));

    $post_per_page = intval($_POST['page_size']);
    $paged = intval($_POST['paged']);
    $options = array(
        'post_type'  => $post_type,
        'posts_per_page' => $post_per_page,
        'paged' => $paged,
        'lang' => sanitize_text_field($_POST['lang']),
        'post_status' => is_user_logged_in()? array("publish","private") : "publish"
    );
    if(array_key_exists("role", $_POST) && $_POST["role"]!="public")
    {
        $roles = explode(",",sanitize_text_field($_POST["role"]));
        $options['meta_query']["meta_access"] = array("relation"=>"OR",array("key"=>"_members_access_role", "compare"=>"NOT EXISTS", "value"=>""));
        foreach ($roles as $r)
		array_push($options['meta_query']["meta_access"],array("key"=>"_members_access_role","value"=>$r)) ;
    }
	if(!array_key_exists("role", $_POST) && $_POST["post_type"] === 'publication') {
		$options['meta_query']["meta_access"] = array(array("key"=>"_members_access_role", "compare"=>"NOT EXISTS", "value"=>""));
	}
    if (array_key_exists('exclude', $_POST)){
        $options['post__not_in'] = array(sanitize_text_field($_POST['exclude']));
    }

    $options['orderby'] = 'date';
    $options['order'] = 'DESC';
    if (array_key_exists('search', $_POST))
        $options['s'] = sanitize_text_field($_POST['search']);

    if (!array_key_exists('all_taxonomy', $_POST)){
        $options['tax_query'] = array("relation"=>"AND");
        if (array_key_exists('news_taxonomy', $_POST) && array_key_exists('news_taxonomy', $_POST)){
            array_push($options['tax_query'], array('relation' => 'OR',
                array('taxonomy' => 'news_taxonomy', 'field' => 'id', 'terms' => $_POST['news_taxonomy']),
                array('taxonomy' => 'publication_taxonomy', 'field' => 'id', 'terms' => $_POST['publication_taxonomy'])));
        }
        else {
            if (array_key_exists('news_taxonomy', $_POST))
                array_push($options['tax_query'], array('taxonomy' => 'news_taxonomy', 'field' => 'id', 'terms' => $_POST['news_taxonomy']));

            else if (array_key_exists('publication_taxonomy', $_POST))
                array_push($options['tax_query'], array('taxonomy' => 'publication_taxonomy', 'field' => 'id', 'terms' => $_POST['publication_taxonomy']));
        }
    }

    //filtering by committee
    if(array_key_exists("committee",$_POST) && $_POST["committee"] > 0)
    {
        $committee_list[] = sanitize_text_field($_POST["committee"]);

        $committee_clause = array();
        foreach ($post_type as $type)
        {
            array_push($committee_clause,array(
                'key'   => $type.'-committee',
                'value' => sanitize_text_field($_POST['committee'])
            ));
        }

        $committee_clause["relation"]="OR";

        $options['meta_query']['meta_committee'] = array('committee_clause'=>$committee_clause);
    }
    //filtering by issue
    if(
    		!array_key_exists("all_issues", $_POST) &&
			array_key_exists("issues",$_POST) &&
			(
					in_array_r('publication', $post_type) ||
					in_array_r('news', $post_type)  ||
					in_array_r('post', $post_type)
			)
	)
    {
        $committee_clause = array();
        foreach ($post_type as $type)
        {
            array_push($committee_clause,array(
                'key'   => $type.'-issue',
                'value' => is_array($_POST['issues']) ? $_POST['issues'] : array(sanitize_text_field($_POST['issues'])),
                'compare' => 'IN',
            ));
        }
        /*if(count($post_type)>1)
        {*/
            $committee_clause["relation"]="OR";
        /*}*/
        $options['meta_query']['meta_issue'] = array('issue_clause'=>$committee_clause);
    }

    if(array_key_exists("dates",$_POST))
    {
        //format m/d/Y
        $dates = explode(" - ", sanitize_text_field($_POST["dates"]));
        $dates[0] = explode("/",$dates[0]);
        $dates[1] = explode("/",$dates[1]);

        $options['date_query'] =  array(
            array(
                'after'     =>  array(
                    'year'  => $dates[0][2],
                    'month' => $dates[0][0],
                    'day'   => $dates[0][1],
                ),
                'before'    => array(
                    'year'  => $dates[1][2],
                    'month' => $dates[1][0],
                    'day'   => $dates[1][1],
                ),
                'inclusive' => true,
            ));
    }

    $members_query = new WP_Query($options);
    $count = ($paged - 1) * $post_per_page + $members_query->post_count;
    ?>
    <input type="hidden" id="input_count" value="<?php echo $count; ?>" />
    <input type="hidden" id="input_total" value="<?php echo $members_query->found_posts; ?>" />

    <?php

    while ($members_query->have_posts()){
        $members_query->the_post();
        global $post;
        $folder = $post->post_type == 'post' ? 'news' : $post->post_type;
        $item_slug = 'partials/' . $folder . '/'."item";
        set_query_var('items_per_row', 1);
        get_template_part($item_slug);
    }
    ?>
    <?php chamber_paginate($members_query->max_num_pages, $paged); ?>
    <?php
    wp_reset_postdata();

    wp_die();
}

function getItemPerson($person, $link_to_bio = false){

//$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(),'full');
//$specializations = get_post_meta( get_the_ID(), "specialization", true );
//$languages =  get_post_meta( get_the_ID(), "language", true );
    ?>
<div class="relative my-5">
    <div class="flex flex-col pt-3">
    <p class="h3">
        <?php if($link_to_bio):?>
        <a class="<?php if ($person["account_type"] == "arbitrator") { echo "load-arbitrator"; } ?>" href="<?php if ($person["account_type"] !== "arbitrator") { ?><?php echo esc_url("/member-bio/?account_type=".$person["account_type"]."&contact_id=".$person["contact_id"]); ?><?php } else { ?>#arbitrator<?php }; ?>" data-id="<?= $person["contact_id"]; ?>" title="<?php echo esc_attr($person["name"]); ?>"><?php echo esc_html($person["name"]); ?></a>
        <?php else: ?>
        <?php echo esc_html($person["name"]); ?>
        <?php endif;?>
    </p>
    <?php if(!empty($person["organization"])):?>
    <p class="font-bold">
        <?php echo esc_html($person["organization"]); ?>
    </p>
    <?php endif; ?>
    <a class="link whitespace-nowrap">
    <svg class="inline w-4 mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 492.452 492.452" style="enable-background:new 0 0 492.452 492.452;" xml:space="preserve"> <path id="XMLID_152_" d="M246.181,0C127.095,0,59.533,102.676,84.72,211.82c17.938,77.722,126.259,280.631,161.462,280.631 c32.892,0,143.243-202.975,161.463-280.631C432.996,103.74,365.965,0,246.181,0z M246.232,224.97 c-34.38,0-62.244-27.863-62.244-62.244c0-34.381,27.864-62.244,62.244-62.244c34.38,0,62.244,27.863,62.244,62.244 C308.476,197.107,280.612,224.97,246.232,224.97z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
    <?php echo esc_html($person["city"].", ".$person["province-territory"]); ?>
    </a>
    <?php if(!empty($person["specializations"])):?>
    <p class="mt-3 text-sm chamber-affiliation">
        <b>Specializations:</b>
        <?php echo esc_html($person["specializations"]); ?>
    </p>
    <?php endif; ?>
    <?php if(!empty($person["languages"])):?>
    <p class="mt-3 text-sm chamber-affiliation">
        <b>Language:</b>
        <?php echo esc_html($person["languages"]); ?>
    </p>
    <?php endif; ?>
    </div>    
</div>
<hr>
<?php
}

function getBoardPerson($person)
{
    ?>
    <div class="vc_col-xs-12 vc_col-sm-6 contact_card" style="padding-right: 0px; padding-left: 0px">
        <h6 style="font-weight: bold"><?php echo esc_html($person["name"]); ?></h6>
        <h6 style="font-weight: bold"><?php echo esc_html($person["organization"]); ?></h6>
        <h6 style="font-weight: bold">
            <div class="location-green" style="width: 20px; height: 20px"></div>
            <?php echo esc_html($person["city"]. ', ' . $person["province-territory"]); ?>
        </h6>
        <?php if(!empty($person["phone"])):?>
        <h6 style="font-weight: bold">
            <div class="phone-green" style="width: 20px; height: 20px"></div>
            <?php echo esc_html($person["phone"]);?>
        </h6>
    <?php endif;?>

</div>
<?php
}

function get_template_for_modal_handler(){
    check_ajax_referer('dialog_modal_nonce', 'security');
    get_template_part('partials/modal/' . $_GET['file']);

    wp_die();
}

function events_handler(){
	require_once dirname(__FILE__) . "/data_service/DataServiceCCC.php";
	check_ajax_referer( 'form_filter_nonce', 'security' );

	$dataservice = new DataServiceCCC();
	$filters = new stdClass();
	if (!array_key_exists('all_events', $_POST)){
        $filters->types = is_array($_POST['event_type']) ? $_POST['event_type'] : array($_POST['event_type']);
    }
    if (!array_key_exists('all_provinces', $_POST)){
        $filters->provinces = is_array($_POST['province']) ? $_POST['province'] : array($_POST['province']);
    }
	$filters->search = $_POST['search'];

	if (array_key_exists('exclude', $_POST)){
        $filters->eventid = $_POST['exclude'];
    }

	//format m/d/Y
	$dates = explode(" - ", $_POST["dates"]);

	$dates[0] = explode("/", $dates[0]);
	$dates[1] = explode("/", $dates[1]);
	$filters->startdate = date("Y-m-d",strtotime($dates[0][2]."-".$dates[0][0]."-".$dates[0][1]));//format Y-m-d
	$filters->enddate = date("Y-m-d",strtotime($dates[1][2]."-".$dates[1][0]."-".$dates[1][1]));

	$data = $dataservice->getAllEvents($filters, false, null, 5, $_POST['paged']);
	if (!$data) { ?>
        <input type="hidden" id="input_count" value="0" />
        <input type="hidden" id="input_total" value="0" />
	    <?php render_alert();
	    wp_die();
    }
	$page_size = 5;
	$count = ($_POST['paged'] - 1) * $page_size + count($data->elements);
    $total = $data->total_count;
	foreach ($data->elements as $event)
	{
		set_query_var('current_event', $event);
		set_query_var('items_per_row', 1);
		get_template_part('/partials/dynamics/event-item');
	}
	?>
    <input type="hidden" id="input_count" value="<?php echo $count; ?>" />
    <input type="hidden" id="input_total" value="<?php echo $total; ?>" />
    <?php
    $pages = (int)($total / $page_size);
    $pages += (($total % $page_size) > 0) ? 1 : 0;
    chamber_paginate($pages, $_POST['paged']); ?>
	<?php  wp_die();
}

function change_password_user()
{
    check_ajax_referer( 'change_pass_nonce', 'security' );

    $current_user = wp_get_current_user();

    if(empty($_POST["new_pass"]))
        echo json_encode(array('result' => 'Error', 'message' => __translate("The Password can not be empty.","Chamber")));

    if(strlen($_POST["new_pass"]) < 6)
        echo json_encode(array('result' => 'Error', 'message' => __translate("The Password must be at least 6 characters.","Chamber")));

    if(!wp_check_password($_POST["old_pass"],$current_user->data->user_pass))
        echo json_encode(array('result' => 'Error', 'message' => __translate("The Current Password does not match the one entered.","Chamber")));

    else {

         wp_set_password($_POST["new_pass"],$current_user->ID);

         wp_set_auth_cookie($current_user->ID);
         wp_set_current_user($current_user->ID);
         do_action("wp_login", $current_user->user_login, $current_user);
         echo json_encode(array('result' => 'OK', 'new_nonce' => wp_create_nonce('change_pass_nonce'), 'message' => __translate("The Password has changed. Reloading in 5 seconds.","Chamber")));
    }

    wp_die();
}

function send_mail_contact()
{
    check_ajax_referer( 'contact_form_nonce', 'security' );

    $admin_email = array("info@chamber.ca","aman@iversoft.ca"); //get_option("admin_email");
    $name = $_POST["name"];
    $last_name = $_POST["last_name"];
    $organization = $_POST["organization"];
    $title = $_POST["title"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $receive_update= $_POST["receive_update"];

    $mail_content = "<p><strong>Sent By: </strong>".esc_html($name)." ".esc_html($last_name)."<br/>";
    $mail_content .= "<strong>Organization: </strong>".esc_html($organization)."<br/>";
    $mail_content .= "<strong>With Email: </strong>".esc_html($email)."<br/>";
    $mail_content .= "<strong>With Web Site: </strong>".esc_html($website)."<br/></p>";
    $mail_content .="<p><strong>Message: </strong></p>";
    $mail_content .="<p>".esc_html($message)."</p>";
    $mail_content .= "<p><strong>Receive Updates: </strong>".esc_html($receive_update)."</p>";

    add_filter( 'wp_mail_content_type', 'ccc_set_html_mail_content_type_2' );

    $result = wp_mail( $admin_email, $subject,  $mail_content,  $title );

    remove_filter( 'wp_mail_content_type', 'ccc_set_html_mail_content_type_2' );

    echo $result;

    wp_die();
}

function ccc_set_html_mail_content_type_2() {
	return 'text/html';
}

function save_cover_img()
{
    check_ajax_referer( 'cover_change_nonce', 'security' );

    //verifying the arguments
    if(empty($_POST["img_id"]))
        echo false;

    $result = update_user_meta(get_current_user_id(),"cover",sanitize_file_name($_POST["img_id"]));

    echo get_user_meta(get_current_user_id(),  'cover', true ) == $_POST["img_id"];

    wp_die();
}

function load_accounts()
{
    check_ajax_referer( 'accounts_nonce', 'security' );

    //verifying the arguments
    if(empty($_POST["type"]))
        echo [];

    $dataservice = new DataServiceCCC();
    $accounts = $dataservice->getAllAccountsByMembershipType($_POST["type"],(object)["search"=>$_POST["q"]],false,null,15,$_POST["page"]);
    $result = array("results"=>array(), "count_filtered"=>$accounts->total_count);
    foreach ($accounts->elements as $account)
    {

        array_push($result["results"], (object)["id"=> $account->accountid, "text"=> $account->name]);
    }
    echo json_encode($result);

    wp_die();
}

function check_captcha(){
    if (array_key_exists('g-recaptcha-response', $_POST)){
        $secret = googleSecretKey;
        $response = $_POST['g-recaptcha-response'];
        $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
        $captcha_response = json_decode($verify);
        return $captcha_response->success;
    }
    return true;
}

function become_member(){
    check_ajax_referer('become_member', 'security');
    if (check_captcha() == false){
        echo -2;
        wp_die();
    }
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

function become_arbitrator(){
    check_ajax_referer('become_arbitrator', 'security');
    if (check_captcha() == false){
        echo -2;
        wp_die();
    }
    $memberData = new stdClass();

    $memberData->academicgovernmentnonprofit = 0;
    $memberData->solearbitratorandmemberofccc = 0;
    $memberData->inhouselawyer = 0;
    $memberData->solearbitratorandnotmemberofccc = 0;
    $memberData->youngpractitioner = 0;

    switch ($_POST['arbitrator_type']){
        case ArbitratorType::ACADEMIC_GOVERNMENT_OR_NON_PROFIT_ORGANIZATION_LAWYER:
            $memberData->academicgovernmentnonprofit = 1;
            break;
        case ArbitratorType::SOLE_ARBITRATOR_OR_LAWYER_MEMBER_OF_CHAMBER:
            $memberData->solearbitratorandmemberofccc = 1;
            break;
        case ArbitratorType::IN_HOUSE_LAWYER:
            $memberData->inhouselawyer = 1;
            break;
        case ArbitratorType::SOLE_ARBITRATOR_OR_LAWYER_NOT_MEMBER_OF_CHAMBER:
            $memberData->solearbitratorandnotmemberofccc = 1;
            break;
        case ArbitratorType::YOUNG_PRACTITIONER:
            $memberData->youngpractitioner = 1;
            break;
    }

    $memberData->company_name = sanitize_text_field($_POST['company_name']);
    $memberData->salutation = sanitize_text_field($_POST['prefix']);

    $memberData->description = '';
    $memberData->firstname = sanitize_text_field($_POST['first_name']);
    $memberData->lastname = sanitize_text_field($_POST['last_name']);
    if (array_key_exists('age_range', $_POST) && array_key_exists($_POST['age_range'], DynamicsIntegration::ageRangeArbitratorOptions())){
        $memberData->age = $_POST['age_range'];
    }
    $memberData->jobtitle = sanitize_text_field($_POST['jobtitle']);

    $memberData->address1_line1 = sanitize_text_field($_POST['address_line1']);
    $memberData->address1_line2 = array_key_exists('address_line2', $_POST) ? sanitize_text_field($_POST['address_line2']) : '';
    $memberData->address1_city = sanitize_text_field($_POST['city']);
    if (array_key_exists('province', $_POST) && array_key_exists($_POST['province'], DynamicsIntegration::provinceCRMOptions())){
        $memberData->address1_stateorprovince = DynamicsIntegration::provinceCRMOptions()[$_POST['province']];
    }
    $memberData->address1_postalcode = sanitize_text_field($_POST['postal']);

    $memberData->telephone1 = $_POST['telephone'];
    $memberData->twitter = array_key_exists('twitter', $_POST) ? sanitize_text_field($_POST['twitter']) : '';
    $memberData->facebook = array_key_exists('facebook', $_POST) ? esc_url($_POST['facebook']) : '';
    $memberData->emailaddress1    = sanitize_email($_POST['email']);

    $memberData->acceptedtc = array_key_exists('accept_conditions', $_POST) ? 1 : 0;

    $dataservice = new DataServiceCCC();
    echo $dataservice->insertRequestOfArbitrator($memberData);
    wp_die();
}

function create_lead_for_publication(){
    check_ajax_referer('create_lead', 'security');
    $dataService = new DataServiceCCC();
    echo $dataService->insertLead(sanitize_text_field($_POST['first_name']), sanitize_text_field($_POST['last_name']), sanitize_text_field($_POST['company']),
        sanitize_text_field($_POST['title']), sanitize_email($_POST['email']));
    wp_die();
}

function change_image_cover()
{
    check_ajax_referer( 'change_img_cover_nonce', 'security' );
    $user = wp_get_current_user();
    $result = array("result"=>"ERROR", "url"=>"", "attachment_id" => "");
//    $user_cover_image_post_id = 0;
//    $user_cover_image_query = new WP_Query(
//        array(
//            'post_type' => "user_cover_image",
//            'posts_per_page' => 1,
//            'author' =>  $user,
//        )
//    );
//    if($user_cover_image_query->have_posts())
//    {
//        $user_cover_image_query->the_post();
//        $user_cover_image_post_id = get_the_ID();
//        wp_reset_postdata();
//    }
//    else
//    {
        $user_cover_image_post_id = wp_insert_post(array(
            "post_title" => $user->display_name." Image Cover",
            "post_status" => "pending",
            "post_author" => $user->ID,
            "post_type" => "user_cover_image"
        ));
        if($user_cover_image_post_id)
        {
            require_once(ABSPATH."wp-admin/includes/image.php");
            require_once(ABSPATH."wp-admin/includes/file.php");
            require_once (ABSPATH."wp-admin/includes/media.php");

            $attachment = media_handle_upload('image',$user_cover_image_post_id);
            if(!is_wp_error($attachment)){
                update_post_meta ($user_cover_image_post_id, '_thumbnail_id',$attachment);
                wp_update_post(array(
                    'ID' => $user_cover_image_post_id,
                    "post_status" => "publish",
                ));

                $result["result"] = "OK";
                $result["url"] = get_the_post_thumbnail_url($user_cover_image_post_id);
                $result["attachment_id"] = $attachment;
            }
            else {
                wp_delete_post($user_cover_image_post_id,true);
                $result["result"]= "ERROR";
            }
        }

//    }

    echo json_encode($result);
    wp_die();
}

function render_not_found(){ ?>
    <section class="">
        <header>
            <h3 style="margin-bottom: 10px; margin-top: 25px; border-top: 1px solid #f0f3f5; text-align: left; padding-top: 15px;">
                <?php _e( 'Nothing Found', 'twentysixteen' ); ?></h3>
        </header>
        <div class="page-content">
            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentysixteen' ); ?></p>
        </div>
    </section>
<?php
}
