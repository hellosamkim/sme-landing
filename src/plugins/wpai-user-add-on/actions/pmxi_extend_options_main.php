<?php

function pmui_pmxi_extend_options_main($post_type, $post){

	if ( $post_type == 'import_users' or $post_type == 'shop_customer' ):

		$pmui_controller = new PMUI_Admin_Import();										
		
		$pmui_controller->index( $post );

	endif;
		
}

?>