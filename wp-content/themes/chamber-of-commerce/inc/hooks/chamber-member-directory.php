<?php
add_action('wp_ajax_nopriv_arbitrator_member_filter', 'arbitrator_member_handler');
add_action('wp_ajax_arbitrator_member_filter', 'arbitrator_member_handler');

function arbitrator_member_handler(){
    
    require_once dirname(__FILE__) . "/../data_service/DataServiceCCC.php";
    check_ajax_referer( 'form_filter_nonce', 'security' );
    $post_type = $_POST['post_type'] ;

    $dataservice = new DataServiceCCC(true);
    $count=0;
    $totals = 0;
    $data = false;


    $filters = new stdClass();
    if (!array_key_exists('all_provinces', $_POST)){
        $filters->provinces = is_array($_POST["province"])? $_POST["province"] :
            ( ($_POST["province"] !== null)? array($_POST["province"]): null );
    }
    $filters->search = sanitize_text_field($_POST["search"]);
		$filters->starts_with = (isset($_POST["last_name_filter"]) && $_POST["last_name_filter"] !== 'all') ? $_POST["last_name_filter"] : null;
		$data = $dataservice->getAllAccountsByMembershipType(MembershipTypeCRM::CHAMBER_MEMBERSHIP, $filters , false, null, $_POST["page_size"], $_POST['paged']);
		if($data)
		{
			foreach ($data->elements as $chamber)
			{
				$person = array();
				$person["name"] = (!empty($chamber->name))?$chamber->name:"";
				$person["city"] = (!empty($chamber->address1_city))?$chamber->address1_city:"";
				$person["province-territory"] = (!empty($chamber->address1_stateorprovince))?$chamber->address1_stateorprovince:"";
				$person["contact_id"] = 0;
				$person["account_type"] = "chamber";
				getItemPerson($person);
			}
		}

	if (!$data) { ?>
        <input type="hidden" id="input_count" value="0" />
        <input type="hidden" id="input_total" value="0" />
		<?php render_alert();
		wp_die();
	}
	else
    {
	    $count =  ($_POST['paged'] -1) * $_POST["page_size"] + count($data->elements);
	    $totals = $data->total_count;
	    ?>

        <input type="hidden" id="input_count" value="<?php echo $count; ?>" />
        <input type="hidden" id="input_total" value="<?php echo $totals ?>" />

	    <?php
	    $pages = (int)($totals/$_POST['page_size']);
	    $pages +=(($totals%$_POST['page_size'])>0)? 1 : 0;
	    chamber_paginate($pages, $_POST['paged']);
        exit;
    }
}