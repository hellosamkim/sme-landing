<?php

require_once dirname(__FILE__) . "/../inc/data_service/DataServiceCCC.php";

$current_user = wp_get_current_user();
$lang = apply_filters( 'wpml_current_language', NULL );
$dynamic = new DataServiceCCC(true);
$error = false;
$error_message = "";
if (isset($_POST["action"])) {
	switch ($_POST["action"]) {
		case "edit_member_information":
			if (!empty($_POST["contact_id"]) && !empty($_POST["employer"]) && !empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"])) {
				$email = sanitize_email($_POST["email"]);
				$first_name = sanitize_text_field($_POST["first_name"]);
				$last_name = sanitize_text_field($_POST["last_name"]);
				$phone = sanitize_text_field($_POST["phone"]);
				$title = sanitize_text_field($_POST["title"]);
				$address1 = sanitize_text_field($_POST["address1"]);
				$address2 = sanitize_text_field($_POST["address2"]);
				$postal_code = sanitize_text_field($_POST["postal_code"]);
				$city = sanitize_text_field($_POST["city"]);

				$result = $dynamic->updateContact($_POST["contact_id"], $_POST["employer"], $first_name, $last_name, $email, $phone, $title, $_POST["age_range"], $address1, $city, $_POST["province"], $postal_code, $address2);
				if ($result) {
					$user_id = wp_update_user(
						array('ID' => wp_get_current_user()->ID,
							'user_email' => $email,
							'display_name' => $first_name . " " . $last_name,
							'first_name' => $first_name,
							'last_name' => $last_name,
						));

					if (!is_wp_error($user_id))
						update_user_meta(get_current_user_id(), 'accountid', $_POST["employer"]);
					else $result = false;

				}

				if (!$result) {
					$error = true;
					$error_message = "Something was wrong when saving Member Information.";
				} else {
					$error = false;
					$error_message = "The Member Information was successfully updated.";
				}
			} else {
				$error = true;
				$error_message = "Some data is incomplete.";
			}
			break;

		case "edit_arbitrator_bio":
			if (
					!empty($_POST["arbitratorbio_id"]) &&
					!empty($_POST["arbitrator_contact_id"]) &&
					!empty($_POST["arbitrator_first_name"]) &&
					!empty($_POST["arbitrator_last_name"]) &&
					!empty($_POST["bio"])
			) {
				$languages = implode(',', $_POST['languages']);
				$languages .= ',' . $_POST['languages_others'];

				$arbitrator_first_name = sanitize_text_field($_POST["arbitrator_first_name"]);
				$arbitrator_last_name = sanitize_text_field($_POST["arbitrator_last_name"]);
				$arbitrator_phone = sanitize_text_field($_POST["arbitrator_phone"]);
				//$arbitrator_title = sanitize_text_field($_POST["arbitrator_title"]);
				$specializations = sanitize_text_field($_POST["specializations"]);
				$expertise = sanitize_text_field($_POST["expertise"]);
				$languages = sanitize_text_field($languages);
				$website = sanitize_text_field($_POST["arbitrator_website"]);
				$provinces = $_POST["arbitrator_province"];
				$city = sanitize_text_field($_POST["arbitrator_city"]);

				$contact_result = $dynamic->updateArbitrator(
					$_POST["arbitrator_contact_id"],
					null,
					$arbitrator_first_name,
					$arbitrator_last_name,
					null,
					$arbitrator_phone,
					null,
					$website,
					$specializations,
					$expertise,
					$languages,
					$provinces,
					$city
				);

				$bio_result = $dynamic->updateArbitratorBio($_POST["arbitratorbio_id"], $_POST["bio"], $website);

				if (!$bio_result && !$contact_result) {
					$error = true;
					$error_message = "Something was wrong when saving Bio.";
				} else {
					$error = false;
					$error_message = "The Bio was successfully updated.";
				}
			} else {
				$error = true;
				$error_message = "Some data is incomplete.";
			}
			break;

		case "edit_subscriptions":
			$contact_id = $_POST['contact_id'];
			$casl = $_POST['caslconsent'];
			$marketinglist = $_POST['marketinglist'];
			$areasofinterest = $_POST['areasofinterest'];

			if (!empty($casl) && !empty($contact_id)) {
				try {
					$data = array(
						'caslconsent' => $casl,
						'interests' => $areasofinterest,
						'marketinglist' => $marketinglist
					);
					$dynamic->updateContactSubscription($contact_id, $data);

					$error = false;
					$error_message = "Subscriptions was successfully updated.";
				} catch (Exception $e) {
					$error = true;
					$error_message = "Something was wrong when saving Subscriptions.";
				}
			} else {
				$error = true;
				$error_message = "Some data is incomplete.";
			}
			break;
	}


}

$provinces = DataServiceCCC::getProvinces();

$header = "";
$is_member = is_memberof(array("association_member", "business_member", "chamber_member", "arbitrator_member"));
$is_guest = is_memberof("guest");
$is_board = is_memberof("board_member");
$is_arbitrator = is_memberof("arbitrator_member");
$profile = array();
$contact_id = null;
$contact = false;
if (is_user_logged_in()) {

	$contact_id = get_user_meta($current_user->ID, "contactid", true);
	$profile["email"] = $current_user->user_email;
	$profile["image"] = get_avatar($profile["email"], 200, null, "Profile User Image", array("class" => "profile_user_image"));
	$profile["employer"] = "";
	$profile["title"] = "";
	$header = $current_user->display_name;
	$contact = empty($contact_id) ? false : $dynamic->getContactById($contact_id);

}

if ($contact) {

	if (apply_filters( 'wpml_current_language', NULL ) == "fr") {
		$marketingList = array(
			'Bulletin : La Chambre cette semaine - Bulletin hebdomadaire pour les membres' => 'f4d682be-800e-eb11-b806-d5416cca82f5',
			'Bulletin: La relance des entreprises - Bulletin mensuel pour les chambres de commerce membres sur nos programmes de services aux entreprises canadiennes' => '215c4125-d46e-ea11-8adb-f5bfea15c721',
			'Bulletin : Services aux entreprises de la Chambre - Bulletin mensuel pour les membres chambres et associations sur nos programmes de Services aux entreprises canadiennes' => 'de8a0628-810e-eb11-b806-d5416cca82f5'
		);	
	} else {
		$marketingList = array(
			'Newsletter: Canadian Chamber This Week - Weekly newsletter for members' => 'b998c1b4-800e-eb11-b806-d5416cca82f5',
			'Newsletter: Business Recovery Bulletin - Monthly newsletter for member chambers of commerce on our Canadian Business Services programs' => '065543ec-a0e8-eb11-b814-e7acae95983b',
			'Newsletter: Chamber Business Services - Monthly newsletter for chamber and association members on our Chamber Business Services programs' => 'bfb95621-810e-eb11-b806-d5416cca82f5'
		);
	}

	// Use this to find the guid of the marketing list
	// print('<pre>');
	// print_r($dynamic->getMarketingListsByIDs());
	// print('</pre>');
	// exit;

	$all_marketing_list = $dynamic->getMarketingListsByIDs($marketingList);
	$user_roles = $current_user->roles;
	$membership_type = MembershipTypeCRM::ONLY_SECONDARY_MEMERSHIP_TYPES;
	$areas_of_interests = $GLOBALS['areas'];

	foreach ($user_roles as $role) {
		switch ($role) {
			case "association_member":
				$membership_type = MembershipTypeCRM::ASSOCIATION_MEMBERSHIP;
				break;
			case  "business_member":
				$membership_type = MembershipTypeCRM::CORPORATE_MEMBERSHIP;
				break;
			case "chamber_member":
				$membership_type = MembershipTypeCRM::CHAMBER_MEMBERSHIP;
				break;
		}
	}

	if ($is_guest) {

		//user properties pulling for CRM
		$profile["first_name"] = $current_user->first_name;
		$profile["last_name"] = $current_user->last_name;
		$profile["phone"] = "";
		$profile["employer_id"] = "";
		$profile["employer"] = "";
		$profile["title"] = "";
		$profile["address1"] = "";
		$profile["address2"] = "";
		$profile["city"] = "";
		$profile["province"] = "";
		$profile["province_id"] = "";
		$profile["postal_code"] = "";
		$profile["age"] = "";
		$profile["website"] = $current_user->user_url;
		$profile["contact_id"] = "";
		$profile["wp_user_id"] = $current_user->ID;
		$age_range = DataServiceCCC::ageRangeOptions();


		$profile["bio"] = new stdClass();
	} else {

		//user properties pulling for CRM
		$profile["first_name"] = $contact->firstname;
		$profile["last_name"] = $contact->lastname;
		$profile["email"] = $contact->emailaddress1;
		$profile["phone"] = $contact->telephone1;
		$profile["employer_id"] = $contact->accountid;
		$profile["employer"] = $contact->companyname;
		$profile["title"] = $contact->jobtitle;
		$profile["address1"] = $contact->address1_line1;
		$profile["address2"] = $contact->address1_line2;
		$profile["city"] = $contact->city;
		$profile["province"] = $contact->province;
		$profile["province_id"] = $contact->province_id;
		$profile["postal_code"] = $contact->address1_postalcode;
		$profile["age"] = $contact->agerange;
		$profile["website"] = $contact->websiteurl;
		$profile["contact_id"] = $contact_id;
		$profile["wp_user_id"] = $current_user->ID;
		$profile["caslconsent"] = $contact->caslconsent;
		$profile["interests"] = empty($contact_id) ? array() : $dynamic->getContactInterestsByContactId($contact_id);
		$profile["marketing_list"] = empty($contact_id) ? array() : $dynamic->fetchContactMarketingList($contact_id);
		$profile["marketing_list"] = array_map(function ($ml) { return  $ml->listid; }, $profile["marketing_list"]);
		$age_range = DataServiceCCC::ageRangeOptions();

		//see committee and user relationship
		$profile["committees"] = array();//"sme-committee", "intellectual-property-committee", "innovation-committee"

		//properties for arbitrator user
		$bio_languages = $contact->languages;
		$bio_languages = str_replace(array("\r","\n","\r\n"),",", $bio_languages);
		$bio_languages = explode(',', $bio_languages);
		$bio_languages = array_map(function ($i) {
			return strtolower(trim($i));
		}, $bio_languages);
		$bio_languages = array_filter($bio_languages);
		$bio_languages = array_values($bio_languages);

		if ($is_arbitrator) {
			$arbitratorBio = $dynamic->getArbitratorBioByContactId($contact_id);
			$profile["arbitrator"] = array(
				"bio" => $arbitratorBio->bio,
				"arbitratorbioid" => $arbitratorBio->arbitratorbioid,
				"specializations" => trim($arbitratorBio->specializations),
				"expertise" => trim($arbitratorBio->expertise),
				"languages" => $bio_languages,
				"employer" => $arbitratorBio->arbitrator_company_name,
				"website" => $arbitratorBio->arbitrator_company_website
			);

			$speaksEnglish = in_array('english', $profile["arbitrator"]["languages"]);
			$speaksFrench = in_array('french', $profile["arbitrator"]["languages"]);

			$englishIdx = array_search('english', $profile["arbitrator"]["languages"]);
			$frenchIdx = array_search('french', $profile["arbitrator"]["languages"]);

			$others = $profile["arbitrator"]["languages"];

			unset($others[$englishIdx]);
			unset($others[$frenchIdx]);

			$others = array_map(function ($i) {
				return ucfirst($i);
			}, $others);

			$other_languages = implode(',', $others);
		}
	}

} else {
	$error = true;
	$error_message = "Something was wrong when getting your Profile.";
}

$locations = get_nav_menu_locations();
$menuitems = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ 'dashboard' ] )->term_id, array( 'order' => 'DESC' ) );
$posts = new WP_Query( array(
  'orderby'     => 'date',
  'order'       => 'DESC',
  'post_type'   => array('publications'),
  'post_status' => array('publish'),
  'posts_per_page'   => '3',
  'suppress_filters' => 0,
  )
);  

print_r($is_member);
if ($is_member) {
  $sage300Proxy = new DataServiceCCC();
  $account_number = get_user_meta(get_current_user_id(), 'accountnumber', true);

  $outstanding_invoices = ($account_number == "") ? false : $sage300Proxy->getAllInvoicesByCustomerNumber($account_number, FullyPaid::NO);
  $paid_invoices = ($account_number == "") ? false : $sage300Proxy->getAllInvoicesByCustomerNumber($account_number, FullyPaid::YES);
		// $outstanding_invoices = false;
		// $paid_invoices = false;
}

?>

<div class="py-16">
  <div class="container rounded card main relative z-[1] flex flex-col lg:flex-row items-center lg:items-start">
  <div class="bg-white  header lg:w-[30%]">
      <div class="flex items-end profile">
        <div class="ml-5 content">
          <h1 class="h3"><?= wp_get_current_user()->display_name; ?></h1>
          <p class="!mb-0 text-xs pb-1"><?= $profile['title']; ?></p>
          <p class="pb-3"><?= $profile['employer']; ?></p>
          <?php
            $user_id = get_current_user_id();
            $user_profile	= get_user_meta($user_id, 'headshot', true); 
            $user_profile	= wp_get_attachment_image_url( $user_profile) ;
              
          ?>
          <div class="pb-3 img-container">
            <img class="rounded-full w-[8rem] h-[8rem] object-cover object-center" id="user-img" src="<?= ($user_profile ? $user_profile : get_template_directory_uri(). '/src/images/user.png') ?>" alt="">
          </div>
          <a href="/dashboard?action=settings" class="px-2 py-1 text-xs uppercase transition-all border rounded border-primary text-primary hover:text-white hover:bg-primary">Edit Member Info</a>
        </div>
      </div>
      <ul class="p-4">
      <hr>
        <li><a class="flex items-center my-2 whitespace-nowrap text-dark hover:text-primary" href="/dashboard"><svg class="w-4 mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 58.365 58.365" style="enable-background:new 0 0 58.365 58.365;" xml:space="preserve"> <path d="M57.863,26.632L29.182,0L0.502,26.632c-0.404,0.376-0.428,1.009-0.052,1.414c0.374,0.404,1.009,0.427,1.413,0.052 l4.319-4.011v3.278v31h16v-18c0-3.866,3.134-7,7-7s7,3.134,7,7v18h16v-31v-3.278l4.319,4.011c0.192,0.179,0.437,0.267,0.681,0.267 c0.269,0,0.536-0.107,0.732-0.319C58.291,27.641,58.267,27.008,57.863,26.632z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
      Main Dashboard</a></li>
        <li><a class="flex items-center justify-center my-2 lg:justify-start whitespace-nowrap text-dark hover:text-primary" href="/dashboard?action=invoices"><svg class="w-4 mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.998 511.998" style="enable-background:new 0 0 511.998 511.998;" xml:space="preserve"> <g> <g> <g> <path d="M430.584,0H183.389c-6.544,0-12.82,2.599-17.448,7.229L63.968,109.198c-4.628,4.628-7.229,10.904-7.229,17.448v360.676 c0,13.628,11.049,24.677,24.677,24.677h349.166c13.628,0,24.677-11.049,24.677-24.677V24.677C455.261,11.049,444.212,0,430.584,0 z M176.196,66.767v52.687h-52.688L176.196,66.767z M405.907,462.646H106.094V168.809h94.779 c13.628,0,24.677-11.049,24.677-24.677V49.354h180.357V462.646z"/> <path d="M167.999,229.969c0,13.628,11.049,24.677,24.677,24.677h140.646c13.628,0,24.677-11.049,24.677-24.677 c0-13.628-11.049-24.677-24.677-24.677H192.675C179.047,205.293,167.999,216.341,167.999,229.969z"/> <path d="M333.321,286.551H192.675c-13.628,0-24.677,11.049-24.677,24.677c0,13.628,11.049,24.677,24.677,24.677h140.646 c13.628,0,24.677-11.049,24.677-24.677C357.998,297.6,346.95,286.551,333.321,286.551z"/> <path d="M333.321,367.812H192.675c-13.628,0-24.677,11.049-24.677,24.677c0,13.628,11.049,24.677,24.677,24.677h140.646 c13.628,0,24.677-11.049,24.677-24.677C357.998,378.861,346.95,367.812,333.321,367.812z"/> </g> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
        View/Pay Invoices</a></li>
        <?php
        $membership_meta = get_user_meta( wp_get_current_user()->ID, 'new_businessaccesspass', true);
          if ($membership_meta != null && $membership_meta != "") { ?>
        <li><a class="flex items-center my-2 whitespace-nowrap text-dark hover:text-primary" href="sso-login/?sso-redirect=https%3A%2F%2Fchamberca.tradewing.com%2Fapi%2Fv1%2Fsso"><svg class="w-4 mr-2" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 448 448" id="svg2" version="1.1" inkscape:version="0.91 r13725" sodipodi:docname="comment.svg"> <defs id="defs4" /> <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="0.9899495" inkscape:cx="430.79505" inkscape:cy="198.13527" inkscape:document-units="px" inkscape:current-layer="layer1" showgrid="true" units="px" inkscape:snap-bbox="true" inkscape:bbox-nodes="true" inkscape:window-width="1264" inkscape:window-height="842" inkscape:window-x="201" inkscape:window-y="440" inkscape:window-maximized="0"> <inkscape:grid type="xygrid" id="grid3336" spacingx="16" spacingy="16" empspacing="2" /> </sodipodi:namedview> <metadata id="metadata7"> <rdf:RDF> <cc:Work rdf:about=""> <dc:format>image/svg+xml</dc:format> <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" /> <dc:title></dc:title> </cc:Work> </rdf:RDF> </metadata> <g inkscape:label="Layer 1" inkscape:groupmode="layer" id="layer1" transform="translate(0,-604.36209)"> <path style="fill-rule:evenodd;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" d="M 35.199219 0 C 15.698404 0 0 15.698404 0 35.199219 L 0 316.80078 L 0 320 L 0 352 L 0 448 L 96 352 L 412.80078 352 C 432.3016 352 448 336.3016 448 316.80078 L 448 35.199219 C 448 15.698404 432.3016 0 412.80078 0 L 35.199219 0 z " transform="translate(0,604.36209)" id="path3335" /> </g> </svg>
        Access Chamber Community</a></li> 
        <?php }; ?>
        <li><a class="flex items-center justify-center my-2 lg:justify-start whitespace-nowrap text-dark hover:text-primary" href="/dashboard?action=subscriptions"><svg class="w-4 mr-2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 55.867 55.867" style="enable-background:new 0 0 55.867 55.867;" xml:space="preserve"> <path d="M55.818,21.578c-0.118-0.362-0.431-0.626-0.808-0.681L36.92,18.268L28.83,1.876c-0.168-0.342-0.516-0.558-0.896-0.558 s-0.729,0.216-0.896,0.558l-8.091,16.393l-18.09,2.629c-0.377,0.055-0.689,0.318-0.808,0.681c-0.117,0.361-0.02,0.759,0.253,1.024 l13.091,12.76l-3.091,18.018c-0.064,0.375,0.09,0.754,0.397,0.978c0.309,0.226,0.718,0.255,1.053,0.076l16.182-8.506l16.18,8.506 c0.146,0.077,0.307,0.115,0.466,0.115c0.207,0,0.413-0.064,0.588-0.191c0.308-0.224,0.462-0.603,0.397-0.978l-3.09-18.017 l13.091-12.761C55.838,22.336,55.936,21.939,55.818,21.578z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
        Manage Subscriptions</a></li>
        <?php if ($is_arbitrator): ?>
        <li><a class="flex items-center justify-center my-2 lg:justify-start whitespace-nowrap text-dark hover:text-primary" href="/dashboard?action=arbitrator_bio"><svg class="w-4 mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 459 459" style="enable-background:new 0 0 459 459;" xml:space="preserve"> <g> <g> <path d="M229.5,0C102.53,0,0,102.845,0,229.5C0,356.301,102.719,459,229.5,459C356.851,459,459,355.815,459,229.5 C459,102.547,356.079,0,229.5,0z M347.601,364.67C314.887,393.338,273.4,409,229.5,409c-43.892,0-85.372-15.657-118.083-44.314 c-4.425-3.876-6.425-9.834-5.245-15.597c11.3-55.195,46.457-98.725,91.209-113.047C174.028,222.218,158,193.817,158,161 c0-46.392,32.012-84,71.5-84c39.488,0,71.5,37.608,71.5,84c0,32.812-16.023,61.209-39.369,75.035 c44.751,14.319,79.909,57.848,91.213,113.038C354.023,354.828,352.019,360.798,347.601,364.67z"/> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
        Edit Arbitrator Bio</a></li>
        <?php endif; ?>
      </ul>
    </div>
    <div class="main-section lg:w-[70%] p-5">
      <div class="hidden nav lg:block">
        <ul class="flex justify-end">
          Helpful Links: 
          <?php foreach ($menuitems as $item) { ?>
            <li><a class="mx-2" href="<?= $item->url; ?>"><?= $item->title; ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <div id="dashboard" class="hidden p-6 mt-8 bg-gray-light">
        <h2 class="mb-5">Access Chamber Community</h2>
        <div>
        <?php
          $membership_meta = get_user_meta( wp_get_current_user()->ID, 'new_businessaccesspass', true);
            if ($membership_meta != null && $membership_meta != "") { ?>
            <a class="access-tradewing button-outline__primary" target="_blank" href="sso-login/?sso-redirect=https%3A%2F%2Fchamberca.tradewing.com%2Fapi%2Fv1%2Fsso">Chamber Community</a>
            <?php
            } else { 
            if (apply_filters( 'wpml_current_language', NULL ) != "fr") {
            ?>
              <p>
              Not already registered to the Chamber Community? Click <a target="_blank" href="https://www.surveymonkey.com/r/ChamberTermsAgreementForm">here</a> to sign-up as a chamber of commerce or board of trade or click <a target="_blank" href="https://www.surveymonkey.com/r/BusinessAccessPassRegistrationForm">here</a> to register as a business or corporation.<br><br>
  Link for chambers: <a target="_blank" href="https://www.surveymonkey.com/r/ChamberTermsAgreementForm">https://www.surveymonkey.com/r/ChamberTermsAgreementForm</a><br>
  Link for businesses: <a target="_blank" href="https://www.surveymonkey.com/r/BusinessAccessPassRegistrationForm">https://www.surveymonkey.com/r/BusinessAccessPassRegistrationForm</a><br><br>
  For more information about the Chamber Community, please contact <a href="mailto:chamberservices@chamber.ca">chamberservices@chamber.ca</a>
              </p>									
            <?php } else {?>
              <p>Vous n'êtes pas encore inscrit à la Communauté de la Chambre ? Cliquez <a target="_blank" href="https://fr.surveymonkey.com/r/ChambreFormulairedaccordsurlestermesetconditions">ici</a> pour vous inscrire en tant que chambre de commerce ou cliquez <a target="_blank" href="https://fr.surveymonkey.com/r/LaissezPasserpourlesentreprisesFormulairedenregistrement">ici</a> pour vous inscrire en tant qu'entreprise ou société.<br><br>
              Link for chambers : <a target="_blank" href="https://fr.surveymonkey.com/r/ChambreFormulairedaccordsurlestermesetconditions">https://fr.surveymonkey.com/r/ChambreFormulairedaccordsurlestermesetconditions</a><br>
              Link for businesses : <a target="_blank" href="https://fr.surveymonkey.com/r/LaissezPasserpourlesentreprisesFormulairedenregistrement">https://fr.surveymonkey.com/r/LaissezPasserpourlesentreprisesFormulairedenregistrement</a><br><br>
              Pour plus de renseignements, veuillez contacter <a href="mailto:chamberservices@chamber.ca">chamberservices@chamber.ca</a></p>
            <?php } ?>
          <?php	}
          ?>
        </div>
      </div>
      <div id="settings" class="hidden p-6 mt-8 bg-gray-light">
        <form action="/wp-admin/admin-ajax.php" id="user-form" enctype="multipart/form-data"  method="post" class="form form-horizontal"
          id="form_member_info">
          <input type="hidden" name="action" value="edit_member_information">
          <input type="hidden" name="contact_id"
                value="<?= $profile["contact_id"] ?>">
          <input type="hidden" name="membership_type" id="membership_type"
                value="<?= $membership_type; ?>">
          <h2 class="mb-3"><?php _e("Member Information", "chamber-of-commerce"); ?></h2>
          <div class="grid grid-cols-12 gap-5 mb-5 gap-y-4">
            <div class="col-span-12 form-group">
              <div class="flex profile">
                <?php
                  $user_id = get_current_user_id();
                  $user_profile	= get_user_meta($user_id, 'headshot', true); 
                  $user_profile	= wp_get_attachment_image_url( $user_profile) ;
                   
                ?>
                <div class="img-container">
                  <img class="rounded-full w-[8rem] h-[8rem] object-cover object-center" id="user-img" src="<?= ($user_profile ? $user_profile : get_template_directory_uri(). '/src/images/user.png') ?>" alt="">
                </div>
                <div class="ml-5 content">
                  <h1 class="my-3 h3">Profile Picture</h1>
                 
                  <!-- <input type="hidden" name="user_id" value="<?= $user_id ?>" id="profile-photo"> -->
                  <input type="file" name="user_profile" class="!w-px !h-px overflow-hidden !p-0 !m-0 !border-none"  id="profile-photo">
                  <label for="profile-photo"  class="px-2 py-1 text-xs uppercase transition-all border rounded form-label border-primary text-primary hover:text-white hover:bg-primary">Update Photo</a>
                </div>
              </div>
            </div>
          </div>
          <div class="grid grid-cols-12 gap-5 mb-3 gap-y-4">
            <div class="col-span-6 form-group">
              <label class="required_field form-label"><?php _e("First Name", "chamber-of-commerce"); ?><span class="text-primary">*</span></label>
              <input type="text" class="w-full" name="first_name" value="<?= $profile["first_name"] ?>" required/>
            </div>
            <div class="col-span-6 form-group">
              <label class="required_field form-label"><?php _e("Last Name", 'chamber-of-commerce'); ?><span class="text-primary">*</span></label>
              <input type="text" class="w-full" name="last_name" value="<?= $profile["last_name"] ?>" required/>
            </div>
          </div>
          <div class="grid grid-cols-12 gap-5 mb-3 gap-y-4">
            <div class="col-span-6 form-group">
              <label class="required_field form-label"><?php _e("Email", 'chamber-of-commerce'); ?><span class="text-primary">*</span></label>
              <input type="email" class="w-full" readonly name="email" value="<?= $profile["email"] ?>" required/>
            </div>
            <div class="col-span-6 form-group">
              <label class="form-label"><?php _e("Phone", 'chamber-of-commerce'); ?></label>
              <input type="text" class="w-full" name="phone" value="<?= $profile["phone"] ?>"/>
            </div>
          </div>
          <div class="grid grid-cols-12 gap-5 mb-3 gap-y-4">
            <div class="col-span-6 form-group">
              <label class="required_field form-label"><?php _e("Employer", 'chamber-of-commerce'); ?><span class="text-primary">*</span></label>
              <!--<input type="hidden" name="employer" value="<?php /*echo $profile["employer_id"] */?>">
              <input type="text" class="w-full" name="display_employer_name" value="<?php /*echo $profile["employer"] */?>" readonly>-->
              <select class="w-full" name="employer" required readonly>
                <option value="<?= $profile["employer_id"] ?>"
                    selected="selected"><?= $profile["employer"] ?></option>
              </select>
            </div>
            <div class="col-span-6 form-group">
              <label class="form-label"><?php _e("Title", 'chamber-of-commerce'); ?></label>
              <input type="text" class="w-full" name="title" value="<?= $profile["title"] ?>"/>
            </div>
          </div>
          <div class="grid grid-cols-12 gap-5 mb-3 gap-y-4">
            <div class="col-span-6 form-group">
              <label class="form-label"><?= __("Address Line 1", 'chamber-of-commerce'); ?></label>
              <input type="text" class="w-full" name="address1" value="<?= $profile["address1"] ?>"/>
            </div>
            <div class="col-span-6 form-group">
              <label class="form-label"><?= __("Address Line 2", 'chamber-of-commerce'); ?></label>
              <input type="text" class="w-full" name="address2" value="<?= $profile["address2"] ?>"/>
            </div>
          </div>
          <div class="grid grid-cols-12 gap-5 mb-3 gap-y-4">
            <div class="col-span-4 form-group">
              <label class="form-label"><?php _e("City", 'chamber-of-commerce'); ?></label>
              <input type="text" class="w-full" name="city" value="<?= $profile["city"] ?>"/>
            </div>
            <div class="col-span-4 form-group">
                <label class="form-label"><?php _e("Province", 'chamber-of-commerce'); ?></label>
                <select class="w-full" name="province"> <option value=""><?php _e("Choose option", 'chamber-of-commerce'); ?></option>
                  <?php foreach ($provinces as $code => $current) : ?>
                    <option value="<?= $code; ?>" <?= $profile["province_id"] == $code ? ' selected="selected" ' : ''; ?>><?php _e($current, 'chamber-of-commerce'); ?></option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="col-span-4 form-group">
              <label class="form-label"><?php _e("Postal Code", 'chamber-of-commerce'); ?></label>
              <input type="text" class="w-full" name="postal_code" value="<?= $profile["postal_code"] ?>"/>
            </div>
          </div>
          <div class="grid gap-5 gap-y-4">
            <?php if ($is_arbitrator): ?>
              <div class="form-group">
                <div class="vc_col-span-6" style="padding-left: 0px">
                  <label class="form-label"><?php _e("Age Range", 'chamber-of-commerce'); ?></label>
                  <select class="w-full" name="age_range"> <option value=""><?php _e("Choose option", 'chamber-of-commerce'); ?></option>
                    <?php foreach ($age_range as $key => $current) : ?>
                      <option value="<?= $key; ?>" <?= $profile["age"] == $current ? ' selected="selected" ' : ''; ?>><?php _e($current, 'chamber-of-commerce'); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            <?php endif; ?>
            <div class="form-group">
              <button class="button-filled__primary" type="submit"><?php _e("Submit", 'Chamber') ?></button>
            </div>
          </div>
        </form>
      </div>
      <div id="invoices" class="hidden p-6 mt-8 bg-gray-light">
        <h2 class="mb-3"><?php _e("Invoices", "chamber-of-commerce"); ?></h2>
        <?php if (!$outstanding_invoices || !$paid_invoices): ?>
          <p><?php _e('This information is not available at the moment. Please try again later', 'Chamber') ?></p>
        <?php else: ?>
          <?php if ($outstanding_invoices->total_count > 0): ?>
            <div class="mt-8">
              <h3>Outstanding Invoices</h3>
              <hr class="my-3">
              <?php foreach ($outstanding_invoices->elements as $invoice): ?>
              <div class="flex items-end justify-between p-4 pb-3 my-5 bg-white border-b border-gray-200 invoice">
                <div>
                  <h4 class="mb-3">INV: <?= $invoice->DocumentNumber; ?></h4>
                  <p>Due: <?= date("M. j, Y", strtotime($invoice->DueDate)); ?></p>
                  <p class="text-bold">$<?= number_format($invoice->DocumentTotalIncludingTax, 2); ?></p>
                </div>
                <div>
                <?php
                $paid = Sage300Integration::checkInvoiceWasPaid($invoice->CustomerNumber, $invoice->DocumentNumber);
                if (!$paid):?>
                  <form method="post"
                      action="https://www3.moneris.com/HPPDP/index.php">
                    <input type="HIDDEN" name="ps_store_id" value="<?= monerisPsStoreId; ?>">
                    <input type="HIDDEN" name="hpp_key" value="<?= monerisHppKey; ?>">
                    <input type="hidden"
                          name="charge_total"
                          value="<?= $invoice->DocumentTotalIncludingTax; ?>"/>
                    <button class="button-outline__primary"
                        type="submit"><?php _e("Pay Invoice", "Chamber"); ?></button>
                  </form>

                <?php else: ?>
                  <p style="color: #006699"><?php _e('Processing', 'Chamber'); ?></p>
                <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
          <?php if ($paid_invoices->total_count > 0): ?>
            <div class="mt-14">
              <h3>Paid Invoices</h3>
              <hr class="my-3">
              <?php foreach ($paid_invoices->elements as $invoice): ?>
                <div class="p-4 pb-3 my-5 bg-white border-b border-gray-200 invoice">
                  <h4 class="mb-3">INV: <?= $invoice->DocumentNumber; ?></h4>
                  <p>PAID: <?= date("M. j, Y", strtotime($invoice->DatePaid)); ?></p>
                  <p class="text-bold">$<?= number_format($invoice->DocumentTotalIncludingTax, 2); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
      <div id="subscriptions" class="hidden p-6 mt-8 bg-gray-light">
        <form id="subscription_form" method="post" action="/dashboard/"
          class="form form-horizontal">
          <input type="hidden" name="action" value="edit_subscriptions">
          <input type="hidden" name="contact_id" value="<?= $contact_id; ?>">
          <div class="form-group">
            <h2 class="mb-3"><?php _e("Subscriptions and Interests", "Chamber"); ?></h2>
            <h4 class="mb-2"><?php _e("Subscription: Email", "Chamber"); ?></h4>
            <p><?php _e("I would like to receive news and information on policy, events, the benefits of membership and various products and services from the Canadian Chamber of Commerce:", "Chamber"); ?></p>
          </div>
          <div class="mb-5 form-group">
            <div class="flex pt-1 mb-2">
                <div class="relative flex items-end mr-4">
                  <input type="radio" name="caslconsent" value="Express" <?php if ($profile['caslconsent'] === 'Express') { ?> checked="checked" <?php } ?> id="caslconsent-yes">
                  <label class="radio radio-container" for="caslconsent-yes"><?php _e("Yes", "Chamber"); ?></label>
                </div>
                <div class="relative flex items-end">
                  <input type="radio" name="caslconsent" value="No" <?php if ($profile['caslconsent'] === 'No') { ?> checked="checked" <?php } ?> id="caslconsent-no">
                  <label class="radio radio-container" for="caslconsent-no"><?php _e("No", "Chamber"); ?></label>
                </div>
            </div>
          </div>
          <div class="mb-5 form-group">
            <h4 class="mb-2"><?php _e("Subscriptions: Newsletters", "Chamber"); ?></h4>
            <p><?php _e("Please check the box to subscribe to a newsletter. Please uncheck the box to unsubscribe. You may change your preference at any time.", "Chamber"); ?></p>
          </div>
          <div class="mb-5 form-group">
            <?php
            foreach ($all_marketing_list as $key => $list){
              $truthy = in_array($list->listid, $profile["marketing_list"]);
            ?>
              <div class="relative pt-1 pl-10 mb-2 checkbox">
                  <input id="ml-<?= $key ?>" type="checkbox" <?php if ($truthy) { ?> checked="checked" <?php } ?> name="marketinglist[]" value="<?= $list->listid; ?>">
                  <label for="ml-<?= $key ?>" class="checkbox" ><?php _e($list->cmsname, "Chamber"); ?></label>
              </div>
            <?php } ?>
          </div>
          <div class="mb-5 form-group">
            <h4 class="mb-2"><?php _e("Areas of Interest", "Chamber"); ?></h4>
            <p><?php _e("I would like to receive updates from the Canadian Chamber of Commerce on the following topics:", "Chamber"); ?></p>
          </div>
          <div class="mb-5 form-group">
            <?php
            foreach ($areas_of_interests as $key => $aoi){
              $full_key = 'new_' . $key;
            ?>
              <div class="relative pt-1 pl-10 mb-2 checkbox">
                  <input id="aoi-<?= $key ?>" type="checkbox" <?php if ($profile["interests"]->{$full_key} === 'true') { ?> checked="checked" <?php } ?> name="areasofinterest[]" value="<?= $key; ?>">
                  <label for="aoi-<?= $key ?>" class="checkbox"><?php _e($aoi, "Chamber"); ?></label>
              </div>
            <?php } ?>
          </div>
          <div class="mb-5 form-group">
            <button class="button-filled__primary" type="submit"><?php _e("Submit", 'Chamber') ?></button>
          </div>
        </form>
      </div>
      <div id="arbitrator_bio" class="hidden p-6 mt-8 bg-gray-light">
        <form id="bio_form" action="/dashboard/" method="post">
          <!--<input type="hidden" name="action" value="edit_arbitrator_profile">-->
          <input type="hidden" name="arbitrator_contact_id"
                value="<?= $profile["contact_id"] ?>">
          <input type="hidden" name="action" value="edit_arbitrator_bio">
          <input type="hidden" name="arbitratorbio_id"
                value="<?= $profile["arbitrator"]["arbitratorbioid"] ?>">

          <div class="row">
            <h2 class="mb-3"><?php _e("Arbitrator Bio", "chamber-of-commerce"); ?></h2>
            <div class="grid grid-cols-12 gap-5 gap-y-4">
              <div class="col-span-6">
                <div class="form-group">
                  <label class="form-label"><?php _e("First Name", "chamber-of-commerce"); ?><span class="text-primary">*</span></label>
                  <input type="text" name="arbitrator_first_name"
                        class="w-full"
                        value="<?= $profile["first_name"] ?>" required/>
                </div>
              </div>
              <div class="col-span-6">
                <div class="form-group">
                  <label class="form-label"><?php _e("Last Name", 'chamber-of-commerce'); ?><span class="text-primary">*</span></label>
                  <input type="text" name="arbitrator_last_name"
                        class="w-full"
                        value="<?= $profile["last_name"] ?>" required/>
                </div>
              </div>

              <div class="col-span-6">
                <div class="form-group">
                  <label class="form-label"><?php _e("Email", 'chamber-of-commerce'); ?><span class="text-primary">*</span></label>
                  <input type="email" name="arbitrator_email" class="w-full"
                        value="<?= $profile["email"] ?>" readonly required/>
                </div>
              </div>
              <div class="col-span-6">
                <div class="form-group">
                  <label class="form-label"><?php _e("Phone", 'chamber-of-commerce'); ?></label>
                  <input type="text" class="w-full" name="arbitrator_phone"
                        value="<?= $profile["phone"] ?>"/>
                </div>
              </div>

              <div class="col-span-12">
                <div class="form-group">
                <label class="form-label"><?php _e("Language Spoken", 'chamber-of-commerce'); ?></label>
                <div class="relative pt-1 pl-10 my-2">
                    <input type="checkbox" name="languages[]" <?= ($speaksEnglish) ? 'checked' : '' ?> value="English" id="lang-eng">
                    <label class="checkbox" for="lang-eng"><?= __('English','chamber-of-commerce') ?></label>
                </div>
                <div class="relative pt-1 pl-10 my-2">
                    <input type="checkbox" name="languages[]" <?= ($speaksFrench) ? 'checked' : '' ?> value="French" id="lang-fr">
                    <label class="checkbox" for="lang-fr"><?= __('French','chamber-of-commerce') ?></label>
                </div>
                
                  <div class="relative pt-1 my-2">
                      <input type="text" placeholder="<?php _e("Others. Separated by comma sign"); ?>"  class="w-full" style="width: 50%" name="languages_others" value="<?= $other_languages; ?>"/>
                  </div>
                </div>
              </div>

              <div class="col-span-6">
                <label class="form-label"><?php _e("Specializations", 'chamber-of-commerce'); ?></label>
                <textarea class="w-full" placeholder="<?php _e("Comma separated list of specializations"); ?>" name="specializations" cols="30"
                      rows="10"><?= $profile["arbitrator"]["specializations"] ?></textarea>
              </div>
              <div class="col-span-6">
                <label class="form-label"><?php _e("Expertise", 'chamber-of-commerce'); ?></label>
                <textarea class="w-full" placeholder="<?php _e("Comma separated list of expertise"); ?>" name="expertise" cols="30"
                      rows="10"><?= $profile["arbitrator"]["expertise"] ?></textarea>
              </div>

              <div class="col-span-12">
                <div class="form-group">
                  <label class="form-label"><?php _e("Bio Description", 'chamber-of-commerce'); ?><span class="text-primary">*</span></label>
                  <textarea name="bio" class="w-full">
                    <?= $profile["arbitrator"]["bio"] ?>
                  </textarea>
                  <!--<input type="hidden" id="bio_from_server"
                        value="<?php /*echo $profile["arbitrator"]["bio"] */?>">
                  <label class="form-label"><?php /*_e("Bio Description", 'Chamber'); */?><span class="text-primary">*</span></label>
                  <textarea id="bio" name="bio"></textarea>-->
                </div>
              </div>

              <div class="col-span-12">
                <h2 style="margin: 10px 0;"><?php _e("Organization Information", "chamber-of-commerce"); ?></h2>
              </div>

              <div class="col-span-6">
                <div class="form-group">
                  <label class="form-label"><?php _e("Organization Name", 'chamber-of-commerce'); ?><span class="text-primary">*</span></label>
                  <input type="text" name="org_name" class="w-full" value="<?= $profile["arbitrator"]["employer"] ?>" readonly/>
                </div>
              </div>
              <div class="col-span-6">
                <div class="form-group">
                  <label class="form-label"><?php _e("Organization Website", 'chamber-of-commerce'); ?></label>
                  <input type="text" name="arbitrator_website" class="w-full" value="<?= $profile["arbitrator"]["website"] ?>"/>
                </div>
              </div>

              <div class="col-span-6">
                <div class="form-group">
                  <label class="form-label"><?= __("Province", 'chamber-of-commerce'); ?><span class="text-primary">*</span></label>
                  <select name="arbitrator_province" class="w-full">
                    <option value=""><?php _e("Choose option", 'chamber-of-commerce'); ?></option>
                    <?php foreach ($provinces as $code => $current) : ?>
                      <option value="<?= $code; ?>" <?= $profile["province_id"] == $code ? ' selected="selected" ' : ''; ?>><?php _e($current, 'chamber-of-commerce'); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-span-6">
                <div class="form-group">
                  <label class="form-label"><?= __("City", 'chamber-of-commerce'); ?><span class="text-primary">*</span></label>
                  <input type="text" name="arbitrator_city" class="w-full" value="<?= $profile["city"] ?>"/>
                </div>
              </div>

              <div class="col-span-12">
                <div class="form-group">
                  <button class="button-filled__primary" type="submit"><?php _e("Submit", 'Chamber') ?></button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>