<?php
  add_action('wp_ajax_nopriv_accounts_filter', 'accounts_handler');
  add_action('wp_ajax_accounts_filter', 'accounts_handler');

  function accounts_handler() {
    require_once dirname(__FILE__) . "/../data_service/DataServiceCCC.php";
    check_ajax_referer( 'form_filter_nonce', 'security' );

    $data_service = new DataServiceCCC();
    $filters = new stdClass();

    if ($_POST['province']){
        $filters->provinces = is_array($_POST['province']) ? $_POST['province'] : array($_POST['province']);
    } else {
        $filters->provinces;
    }
    if ($_POST['industry']){
        $filters->industry_types = is_array($_POST['industry']) ? $_POST['industry'] : array($_POST['industry']);
    }
    if ($_POST['service']){
      $filters->services = is_array($_POST['service']) ? $_POST['service'] : array($_POST['service']);
    }
    $filters->search = $_POST['search'];
    $filters->city = $_POST['city'];
    $filters->sort = $_POST['sort'];

	$filters->account_filter = (isset($_POST["account_filter"]) && $_POST["account_filter"] !== 'all') ? $_POST["account_filter"] : null;
    $page_size = 12;
    $paged = intval(str_replace( ",", "", "".$_POST['paged'].""));
    $data = $data_service->getAllMembersByMembershipType(MembershipTypeCRM::CORPORATE_MEMBERSHIP, $filters, false, null, $page_size, $paged);
    if (!$data) { ?>
        <input type="hidden" id="input_count" value="0" />
        <input type="hidden" id="input_total" value="0" />
        <?php render_alert();
        wp_die();
    }
    $count = ($paged - 1) * $page_size + count($data->elements);
    $total = $data->total_count;
    if($total == 0) { ?>
        <input type="hidden" id="input_count" value="0" />
        <input type="hidden" id="input_total" value="0" />
        <?php render_not_found();
        wp_die();
    } else {
        ?>
        <input type="hidden" id="input_count" value="<?php echo $count; ?>" />
        <input type="hidden" id="input_total" value="<?php echo $total; ?>" />
        <?php
        foreach ($data->elements as $account)
        {
            set_query_var('current_account', $account);
            set_query_var('items_per_row', 1);
            get_template_part( 'template-parts/partials/item');
        }
    }
    $pages = (int)($total / $page_size);
    $pages += (($total % $page_size) > 0) ? 1 : 0;
    chamber_paginate($pages, $paged);
    exit;
}