<?php
/*
Plugin Name: SAGE integration
Description: Plugin for monitor Moneris and Sage payments
Author: Author Name
Version: 1.0
*/

register_activation_hook(__FILE__, 'sage_table_activation');
define('invoices_paid_tablename', 'invoices_paid');
define('invoices_denied_tablename', 'invoices_denied');

function sage_table_activation() {
    global $wpdb;

    $creation_query_invoices_paid = "CREATE TABLE `wp_invoices_paid` (
                      `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                      `user_id` bigint(20) unsigned NOT NULL,
                      `customer_number` varchar(255) NOT NULL,
                      `document_number` varchar(255) NOT NULL,
                      `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
                      `moneris_response` text,
                      `send_sage_at` datetime DEFAULT NULL,
                      `success_response_sage` tinyint(1) DEFAULT NULL,
                      `sage_response` text,
                      PRIMARY KEY (`ID`),
                      KEY `user_id` (`user_id`) USING BTREE
                    ) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;";
    $tablename = invoices_paid_tablename;
    if($wpdb->get_var("SHOW TABLES LIKE '$tablename'") != $tablename) {
        // table does not exist!
        $wpdb->query($creation_query_invoices_paid);
    }

	$creation_query_invoices_denied = "CREATE TABLE `wp_invoices_denied` (
                                      `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                                      `user_id` bigint(20) unsigned NOT NULL,
                                      `customer_number` varchar(255) NOT NULL,
                                      `document_number` varchar(255) NOT NULL,
                                      `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
                                      `moneris_response` text,
                                      PRIMARY KEY (`ID`),
                                      KEY `user_id` (`user_id`) USING BTREE
                                    ) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;";
	$tablename = invoices_denied_tablename;
	if($wpdb->get_var("SHOW TABLES LIKE '$tablename'") != $tablename) {
		// table does not exist!
		$wpdb->query($creation_query_invoices_denied);
	}
}

add_action('admin_init', 'sage_admin_init');

add_action('admin_menu', 'sage_settings_menu');

function sage_settings_menu() {
    add_options_page('Sage Payment Management','Sage integration','manage_options','sage-integration','sage_payment_config_page');
}

function sage_admin_init(){
    add_action( 'admin_post_delete_payment_record', 'delete_payment_record' );
}

function delete_payment_record() {
    // Check that user has proper security level
    if ( !current_user_can( 'manage_options' ) )
        wp_die( 'Not allowed' );
    // Check if nonce field is present
    check_admin_referer( 'payment_deletion' );
    // If payments are present, cycle through array and call SQL
    // command to delete entries one by one
    if ( !empty( $_POST['payment'] ) ) {
    // Retrieve array of payments IDs to be deleted
        $payments_to_delete = $_POST['payment'];
        global $wpdb;
        foreach ( $payments_to_delete as $payment_to_delete ) {
            $query = 'DELETE from ' . $wpdb->prefix . invoices_paid_tablename ;
            $query .= ' WHERE ID = %d' ;
            $wpdb->query($wpdb->prepare( $query , array(intval( $payment_to_delete ))));
        }
    }
    // Redirect the page to the user submission form
    wp_redirect( add_query_arg( 'page', 'sage-integration', admin_url( 'options-general.php' ) ) );
    die();
}

function sage_payment_config_page() {
    global $wpdb;
    ?>
    <!-- Top-level menu -->
    <div class="wrap">
        <h2>Sage Payments Tracker </h2>
        <form method="post" action="<?php echo admin_url( 'admin-post.php' ); ?>">
            <input type="hidden" name="action" value="delete_payment_record" />
            <!-- Adding security through hidden referrer field -->
            <?php wp_nonce_field( 'payment_deletion' ); ?>
            <!-- Display payments list if no parameter sent in URL -->
            <?php
            $payment_query = 'SELECT * FROM ';
            $payment_query .= $wpdb->prefix . invoices_paid_tablename . ' ';
            $payment_query .= 'ORDER by %s DESC';
            $payment_items = $wpdb->get_results( $wpdb->prepare( $payment_query , array('created_at')),ARRAY_A );
            ?>
            <h3>Manage Payment Entries</h3>
            <table class="wp-list-table widefat fixed" >
                <thead>
                    <tr><th style="width: 50px"></th>
                        <th style="width: 50px">User ID</th>
                        <th style="width: 115px">Customer Number</th>
                        <th style="width: 120px">Document Number</th>
                        <th style="width: 120px">Created At</th>
                        <th>Moneris Response</th>
                        <th style="width: 120px">Sent Sage At</th>
                        <th style="width: 100px">Success Response Sage</th>
                        <th>Sage Response</th>
                    </tr>
                </thead>
                <?php
                // Display payments if query returned results
                if ( $payment_items ) {
                    foreach ( $payment_items as $payment_item ) {
                        echo '<tr style="background: #FFF">';

                        echo '<td><input type="checkbox" name="payment[]" value="'. esc_attr( $payment_item['ID'] ) . '" /></td>';

                        echo '<td>' . $payment_item['user_id'] . '</td>';
                        echo '<td>' . $payment_item['customer_number'] . '</td>';
                        echo '<td>' . $payment_item['document_number'] . '</td>';
                        echo '<td>' . $payment_item['created_at'] . '</td>';
                        echo '<td>' . $payment_item['moneris_response'] . '</td>';
                        echo '<td>' . $payment_item['send_sage_at'] . '</td>';
                        echo '<td>' . $payment_item['sage_response'] .
                            '</td></tr>';
                    }
                } else {
                    echo '<tr style="background: #FFF">';
                    echo '<td></td><td colspan="7">No Payment Found</td></tr>';
                }
                ?>
            </table><br />
            <input type="submit" value="Delete Selected" class="button-primary"/>
        </form>
    </div>

    <div class="wrap">
        <h3>Denied Moneris Payments Tracker </h3>
        <!-- Display payments list if no parameter sent in URL -->
        <?php
        $payment_query = 'SELECT * FROM ';
        $payment_query .= $wpdb->prefix . invoices_denied_tablename . ' ';
        $payment_query .= 'ORDER by %s DESC';
        $payment_items = $wpdb->get_results( $wpdb->prepare( $payment_query , array('created_at')),ARRAY_A );
        ?>
        <table class="wp-list-table widefat fixed" >
            <thead>
            <tr>
                <th style="width: 50px">User ID</th>
                <th style="width: 115px">Customer Number</th>
                <th style="width: 120px">Document Number</th>
                <th style="width: 120px">Created At</th>
                <th>Moneris Response</th>
            </tr>
            </thead>
            <?php
            // Display payments if query returned results
            if ( $payment_items ) {
                foreach ( $payment_items as $payment_item ) {
                    echo '<tr style="background: #FFF">';

                    echo '<td>' . $payment_item['user_id'] . '</td>';
                    echo '<td>' . $payment_item['customer_number'] . '</td>';
                    echo '<td>' . $payment_item['document_number'] . '</td>';
                    echo '<td>' . $payment_item['created_at'] . '</td>';
                    echo '<td>' . $payment_item['moneris_response'] . '</td>'.
                         '</td></tr>';
                }
            } else {
                echo '<tr style="background: #FFF">';
                echo '<td colspan="5">No Payment Found</td></tr>';
            }
            ?>
    </div>
<?php }

?>