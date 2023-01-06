<?php
add_action('wp_ajax_nopriv_arbitrator_filter', 'arbitrator_handler');
add_action('wp_ajax_arbitrator_filter', 'arbitrator_handler');

function arbitrator_handler(){
    
    require_once dirname(__FILE__) . "/../data_service/DataServiceCCC.php";
    check_ajax_referer( 'form_filter_nonce', 'security' );
    $post_type = $_POST['post_type'] ;

    $dataservice = new DataServiceCCC(true);
    $count=0;
    $totals = 0;
    $data = false;


    $filters = new stdClass();
			if ($_POST['province']){
					$filters->provinces = is_array($_POST['province']) ? $_POST['province'] : array($_POST['province']);
			} else {
					$filters->provinces;
			}

        $filters->language = (!empty($_POST["language"]))? $_POST["language"] : null;
        $filters->specializations = (!empty($_POST["specialization"]))? $_POST["specialization"] : null;
        $filters->city = (!empty($_POST["city"]))? $_POST["city"] : null;
        $filters->last_name_starts_with = (isset($_POST["last_name_filter"]) && $_POST["last_name_filter"] !== 'all') ? $_POST["last_name_filter"] : null;

        $data = $dataservice->getAllArbitrators($filters, false, null, $_POST["page_size"], $_POST['paged']);
        if($data){
	        foreach ($data->elements as $arbitrator)
	        {
		        $person = array();
		        $person["name"] = (!empty($arbitrator->fullname))?$arbitrator->fullname:"";
		        $person["specializations"] = (!empty($arbitrator->specializations))?$arbitrator->specializations:"";
		        $person["city"] = (!empty($arbitrator->city))?$arbitrator->city:"";
		        $person["province-territory"] = (!empty($arbitrator->province))?$arbitrator->province:"";
		        $person["languages"] = (!empty($arbitrator->languages)) ? $arbitrator->languages : "";
		        $person["organization"] = (!empty($arbitrator->companyname))?$arbitrator->companyname:"";
		        $person["contact_id"] = (!empty($arbitrator->contactid))?$arbitrator->contactid:0;
		        $person["account_type"] = "arbitrator";

		        /*if(!stristr($person["languages"],$arbitrator["languagepreference"]))
					$person["languages"] .= $arbitrator["languagepreference"];*/
		        getItemPerson($person,true);
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