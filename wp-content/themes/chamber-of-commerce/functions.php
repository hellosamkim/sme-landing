<?php
/**
 * chamber of commerce functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chamber_of_commerce
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function chamber_of_commerce_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on chamber of commerce, use a find and replace
		* to change 'chamber-of-commerce' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'chamber-of-commerce', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'chamber-of-commerce' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'chamber_of_commerce_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'chamber_of_commerce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chamber_of_commerce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chamber_of_commerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'chamber_of_commerce_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chamber_of_commerce_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'chamber-of-commerce' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'chamber-of-commerce' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'chamber_of_commerce_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function chamber_of_commerce_scripts() {
	// wp_enqueue_style( 'chamber-of-commerce-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'chamber-of-commerce-style', 'rtl', 'replace' );

	wp_enqueue_script( 'chamber-of-commerce-app', get_template_directory_uri() .'/src/js/app.min.js', array(), _S_VERSION , true);

	wp_enqueue_style( 'chamber-of-commerce-style', get_template_directory_uri() . '/src/css/app.css', array(), _S_VERSION, 'all' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'chamber_of_commerce_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * ACF
 */
require get_template_directory() . '/inc/hooks/acf.php';

/**
 * HELPER
 */
require get_template_directory() . '/inc/hooks/helper.php';

/**
 * CPT
 */
require get_template_directory() . '/inc/hooks/cpt.php';

/**
 * POST
 */
require get_template_directory() . '/inc/hooks/posts.php';
require get_template_directory() . '/inc/hooks/edit-member.php';

/**
 * AUTHENTICATION
 */
require get_template_directory() . '/inc/hooks/authentication.php';

/**
 * Ajax functions
 */
require get_template_directory() . '/inc/hooks/ajax_functions.php';

/**
 * BMD
 */
require get_template_directory() . '/inc/hooks/business-member-directory.php';

/**
 * CMD
 */
require get_template_directory() . '/inc/hooks/chamber-member-directory.php';

/**
 * Arbitrator Directory
 */
require get_template_directory() . '/inc/hooks/find-an-arbitrator.php';

/**
 * Single Arbitrator Directory
 */
require get_template_directory() . '/inc/hooks/arbitrator-profile.php';

/**
 * AMD
 */
require get_template_directory() . '/inc/hooks/association-member-directory.php';

/**
 * BM
 */
require get_template_directory() . '/inc/hooks/become-member.php';

// OLD CHAMBER STUFF

function unregister_portfolio()
{
	unregister_post_type('portfolio');

	$areas = array('Artificial intelligence', 'Canada-U.S.', 'Cannabis', 'Circular economy', 'Competition policy',
		'Diversity & inclusion', 'Environment', 'Fintech', 'Fiscal policy', 'Indigenous business relations', 'Infrastructure', 'Innovation', 'Intellectual property',
		'Internal trade', 'International affairs', 'Labour relations', 'Natural resources & energy', 'Regulatory competitiveness',
		'Science and technology', 'Skills & immigration', 'Small & medium sized business', 'Transportation');

	$process_areas = array();
	$toRemove = array(' ', '-', '.');
	foreach ($areas as $current) {
		$key = str_replace('&', 'and', str_replace($toRemove, '', strtolower($current)));
		$process_areas[$key] = $current;
	}
	$GLOBALS['areas'] = $process_areas;


	$industries = array('Accomodation', 'Advertising, Marketing & Communications', 'Agriculture',
		'Arts, Entertainment & Recreation', 'Construction & Engineering', 'Finance & Insurance',
		'Food & Beverage Services', 'Healthcare & Social Services', 'High Technology',
		'HR & Payroll Services', 'Importing & Exporting', 'Legal Services',
		'Logging & Forestry', 'Manufacturing', 'Media',
		'Mining, Oil & Gas', 'Printing & Production', 'Real Estate & Development',
		'Retail Trade', 'Skilled Trades', 'Transportation & Warehousing',
		'Utilities', 'Wholesale Trade', 'Other Business Servcies');

	$process_industries = array();
	$toRemove = array(' ', '&', ',');
	foreach ($industries as $current) {
		$key = str_replace($toRemove, '', strtolower($current));
		$process_industries[$key] = $current;
	}
	$GLOBALS['industries'] = $process_industries;
}

function check_payment_params($param, $dict)
{
	return array_key_exists($param, $dict) && $dict[$param] != 'null' && $dict[$param] != null && trim($dict[$param]) !== '';
}

add_action('init', 'unregister_portfolio');

/* Chamber Members Filter */

// add_action('wp_enqueue_scripts', 'ccc_scripts_enqueue');

// function ccc_scripts_enqueue()
// {
// 	wp_register_script('generic_submit_script', get_stylesheet_directory_uri() . '/js/generic_form_submit.js', array('jquery'), '1', true);
// 	if (is_page_template('templates/listing-meeting-events.php') || is_page_template('templates/listing-news.php') ||
// 		is_page_template('templates/listing-events.php') || is_page_template('templates/blog_template.php')
// 		|| is_page_template('templates/listing-policy-resolutions.php') || is_page_template('templates/business-member-directory.php') ||
// 		is_page_template('templates/listing-publications.php') || is_singular('issue') || is_page_template('templates/board_directors.php') ||
// 		(is_singular('program')) || is_page("member-directory"))
// 		wp_enqueue_script('generic_submit_script');

// 	wp_localize_script('generic_submit_script', 'form_filter_vars',
// 		['ajaxurl' => admin_url('admin-ajax.php'), 'check_nonce' => wp_create_nonce('form_filter_nonce')]);

// 	wp_register_script('jquery-ui-script', get_stylesheet_directory_uri() . '/js/vendor/jquery-ui.js', array('jquery'), '1', true);
// 	wp_enqueue_style('jquery-ui-style', get_stylesheet_directory_uri() . '/js/vendor/jquery-ui.css');
// 	wp_enqueue_script('jquery-ui-script');

// 	wp_register_script('child-theme', get_stylesheet_directory_uri() . '/js/child-theme.js', array('keydesign-scripts', 'kd_addon_script'), '1', true);
// 	wp_localize_script('child-theme', 'lang_vars',
// 		['username_placeholder' => __('Username', 'chamber-of-commerce'), 'password_placeholder' => __('Password', 'chamber-of-commerce')]);
// 	wp_enqueue_script('child-theme');

// 	if (is_user_logged_in()) {
// 		wp_enqueue_script('member_view', get_stylesheet_directory_uri() . '/js/member_view.js', array('jquery'), '1', true);
// 		if (is_page_template('templates/profile.php')) {
// 			wp_enqueue_script('change_pass_script');
// 		}
// 	}

// 	//Checking if user is logged in
// 	if (is_user_logged_in()) {
// 		wp_enqueue_script('user_logged_in', get_stylesheet_directory_uri() . '/js/user_logged_in.js', array('jquery'), '1', false);
// 		wp_localize_script('user_logged_in', 'user_logged_vars',
// 			[
// 				'login_url' => get_url_post_translation_by_slug("/login/"),
// 				//'ajaxurl'       => admin_url('admin-ajax.php'),
// 				//'check_nonce'   => wp_create_nonce('log-out'),
// 				//'logout_text'  => __('Logout', 'chamber-of-commerce'),
// 				//'logout_url'  => "/wp-login.php?action=logout",
// 				//'redirect_url'  => urlencode(get_permalink())
// 			]
// 		);
// 	}

// 	wp_register_script('contact_form_script', get_stylesheet_directory_uri() . '/js/contact_form.js', array('jquery'), '1', true);
// 	wp_localize_script('contact_form_script', 'contact_form_vars',
// 		['ajaxurl' => admin_url('admin-ajax.php'), 'check_nonce' => wp_create_nonce('contact_form_nonce'),
// 			"success_title" => __("Success!", 'chamber-of-commerce'), "success_text" => __("Your Message has been received. You will get an answer soon.", 'chamber-of-commerce'),
// 			"error_title" => __("Error!", 'chamber-of-commerce'), "error_text" => __("An error occur during processing your request. Please Try Again.", 'chamber-of-commerce')]);

// 	if (is_page_template('templates/contact_us.php')) {
// 		wp_enqueue_script('contact_form_script');
// 	}

// 	wp_register_script('publication_modal_script', get_stylesheet_directory_uri() . '/js/publication_modal.js', array('jquery'), '1', true);
// 	wp_localize_script('publication_modal_script', 'publication_modal_vars',
// 		['ajaxurl' => admin_url('admin-ajax.php'), 'check_nonce' => wp_create_nonce('dialog_modal_nonce'), 'close_text' => __('Close', 'chamber-of-commerce')]);

// 	if (is_front_page() || is_page_template('templates/listing-publications.php') || is_page_template('templates/listing-policy-resolutions.php') || is_singular('issue')) {
// 		wp_enqueue_script('publication_modal_script');
// 	} else if (is_page() || is_singular()) {
// 		$id = get_the_ID();
// 		if (has_block('ccc-blocks/activity-block', $id)) {
// 			wp_enqueue_script('publication_modal_script');
// 		}
// 	}

// 	$max_size = (wp_max_upload_size() / 1048576); //1024*1024 MB
// 	wp_register_script('profile_script', get_stylesheet_directory_uri() . "/js/profile.js", array('jquery'), '1', true);
// 	wp_localize_script('profile_script', 'accounts_vars',
// 		['ajaxurl' => admin_url('admin-ajax.php'), 'check_nonce' => wp_create_nonce('accounts_nonce'), 'max_size_upload' => $max_size, 'upload_error_message' => __("The image exceeds the maximum upload size for this site.", 'chamber-of-commerce') . " " . __("Maximum upload file size:", 'chamber-of-commerce') . " " . $max_size . "M"]);
// }

//To check if user is Logged in via AJAX
function ajax_check_user_logged_in()
{
	check_ajax_referer('change_pass_nonce', 'security');
	echo is_user_logged_in() ? true : false;
	die();
}

add_action('wp_ajax_nopriv_custom_post_type_filter', 'custom_post_type_handler');
add_action('wp_ajax_custom_post_type_filter', 'custom_post_type_handler');

add_action('wp_ajax_nopriv_events_filter', 'events_handler');
add_action('wp_ajax_events_filter', 'events_handler');

add_action('wp_ajax_nopriv_get_template_for_modal', 'get_template_for_modal_handler');
add_action('wp_ajax_get_template_for_modal', 'get_template_for_modal_handler');

add_action('wp_ajax_nopriv_change_pass_ajax_action', 'change_password_user');
add_action('wp_ajax_change_pass_ajax_action', 'change_password_user');

add_action('wp_ajax_nopriv_change_img_cover_ajax_action', 'change_image_cover');
add_action('wp_ajax_change_img_cover_ajax_action', 'change_image_cover');

add_action('wp_ajax_nopriv_contact_form_ajax_action', 'send_mail_contact');
add_action('wp_ajax_contact_form_ajax_action', 'send_mail_contact');

add_action('wp_ajax_nopriv_cover_change_ajax_action', 'save_cover_img');
add_action('wp_ajax_cover_change_ajax_action', 'save_cover_img');

add_action('wp_ajax_nopriv_accounts_ajax_action', 'load_accounts');
add_action('wp_ajax_accounts_ajax_action', 'load_accounts');

add_action('wp_ajax_nopriv_become_arbitrator', 'become_arbitrator');
add_action('wp_ajax_become_arbitrator', 'become_arbitrator');

add_action('wp_ajax_nopriv_create_lead_for_publication', 'create_lead_for_publication');
add_action('wp_ajax_create_lead_for_publication', 'create_lead_for_publication');

/*Relationship between post & page */
add_action('admin_init', 'add_meta_boxes');

//Relationship
function add_meta_boxes()
{
    add_meta_box('issue_relationship_metabox', 'Issue Relationship', 'render_relationship', 'issue');
    //add_meta_box('events_relationship_metabox', 'Event Relationship', 'render_relationship', 'events');
    add_meta_box('publication_relationship_metabox', 'Publication Relationship', 'render_relationship', 'publication');
    add_meta_box('news_relationship_metabox', 'News Relationship', 'render_relationship', 'news');
    add_meta_box('post_relationship_metabox', 'Posts Relationship', 'render_relationship', 'post');
}

function ccc_thumbnail_url($id, $size)
{
	if (has_post_thumbnail($id))
		return get_the_post_thumbnail_url($id, $size);
	return get_stylesheet_directory_uri() . '/assets/images/placeholder-image.jpg';
}

function ccc_publication_thumbnail_url($id, $size)
{
	if (has_post_thumbnail($id))
		return get_the_post_thumbnail_url($id, $size);
	return get_stylesheet_directory_uri() . '/assets/images/General.png';
}

include_once dirname(__FILE__) . '/inc/dynamics/dynamicsIntegration.php';
add_action('wp_schedule_users_sync', 'wp_schedule_users_sync_func');

function wp_schedule_users_sync_func() {

	$dynamics = new DynamicsIntegration(ServerNameCRM::ACCOUNT);

	set_time_limit(0);
	$dynamics->syncUsers(MembershipTypeCRM::CHAMBER_MEMBERSHIP);
	$dynamics->syncUsers(MembershipTypeCRM::ASSOCIATION_MEMBERSHIP);
	$dynamics->syncUsers(MembershipTypeCRM::CORPORATE_MEMBERSHIP);
	$dynamics->syncUsers(MembershipTypeCRM::CANADIAN_CHAMBER_OF_COMMERCE);
	$dynamics->syncUsers(MembershipTypeCRM::NON_MEMBER);
	$dynamics->syncUsers(MembershipTypeCRM::ONLY_SECONDARY_MEMERSHIP_TYPES); // come back here for business listings as discussed with Jayme.

	$dynamics->fetchMarketingList();
}

add_action('wp_schedule_users_sync_all', 'wp_schedule_users_sync_all_func');

function wp_schedule_users_sync_all_func() {

}

function ccc_set_html_mail_content_type()
{
	return 'text/html';
}

//Send Mail
function ccc_send_mail($to_mail, $subject, $mail_content, $title)
{
	add_filter('wp_mail_content_type', 'ccc_set_html_mail_content_type');

	$result = wp_mail($to_mail, $subject, $mail_content, $title);

	remove_filter('wp_mail_content_type', 'ccc_set_html_mail_content_type');

	return $result;
}

/**
 * @param $moneris_response
 * @param $formatted_moneris_response
 */
function process_moneris_response(&$moneris_response, &$formatted_moneris_response)
{
	$formatted_moneris_response = '';
	if (check_payment_params('chargeTotal', $_SESSION)) {
		$formatted_moneris_response .= '<p><strong>' . __('Transaction Total', 'chamber-of-commerce') . ': </strong>$ ' . $_SESSION['chargeTotal'] . ' (CAD)</p>';
	}
	if (array_key_exists('chargeTotal', $_SESSION)) {
		$moneris_response .= '<p><strong>' . __('Transaction Total', 'chamber-of-commerce') . ': </strong>$ ' . $_SESSION['chargeTotal'] . ' (CAD)</p>';
	}

	if (check_payment_params('trans_name', $_POST)) {
		$trans_names = array('purchase', 'preauth', 'cavv_purchase', 'cavv_preauth', 'idebit_purchase');
		if (array_search($_POST['trans_name'], $trans_names) !== false) {
			$formatted_moneris_response .= '<p><strong> ' . __('Transaction Type', 'chamber-of-commerce') . ': </strong><span class="text-uppercase">' . esc_html($_POST['trans_name']) . '</span></p>';
		}
	}
	if (array_key_exists('trans_name', $_POST)) {
		$moneris_response .= '<p><strong> ' . __('Transaction Type', 'chamber-of-commerce') . ': </strong><span class="text-uppercase">' . sanitize_text_field($_POST['trans_name']) . '</span></p>';
	}

	if (check_payment_params('date_stamp', $_POST) && check_payment_params('time_stamp', $_POST)) {
		$formatted_moneris_response .= '<p><strong>' . __('Date / Time', 'chamber-of-commerce') . ': </strong>' . esc_html($_POST['date_stamp']) . ' ' . esc_html($_POST['time_stamp']) . '</p>';
	} else if (check_payment_params('date_stamp', $_POST)) {
		$formatted_moneris_response .= '<p><strong>' . __('Date', 'chamber-of-commerce') . ': </strong>' . esc_html($_POST['date_stamp']) . '</p>';
	}

	if (array_key_exists('date_stamp', $_POST)) {
		$moneris_response .= '<p><strong>' . __('Date', 'chamber-of-commerce') . ': </strong>' . sanitize_text_field($_POST['date_stamp']) . '</p>';
	}
	if (array_key_exists('time_stamp', $_POST)) {
		$moneris_response .= '<p><strong>' . __('Time', 'chamber-of-commerce') . ': </strong>' . sanitize_text_field($_POST['time_stamp']) . '</p>';
	}

	if (check_payment_params('charge_total', $_POST)) {
		$formatted_moneris_response .= '<p><strong>' . __('Transaction Amount', 'chamber-of-commerce') . ': &nbsp </strong>$ ' . esc_html($_POST['charge_total']) . ' (CAD)</p>';
	}
	if (array_key_exists('charge_total', $_POST)) {
		$moneris_response .= '<p><strong>' . __('Transaction Amount', 'chamber-of-commerce') . ': &nbsp </strong>$ ' . sanitize_text_field($_POST['charge_total']) . ' (CAD)</p>';
	}

	if (check_payment_params('response_order_id', $_POST)) {
		$formatted_moneris_response .= '<p><strong>' . __('Order ID', 'chamber-of-commerce') . ': </strong> ' . esc_html($_POST['response_order_id']) . '</p>';
	}
	if (array_key_exists('response_order_id', $_POST)) {
		$moneris_response .= '<p><strong>' . __('Order ID', 'chamber-of-commerce') . ': </strong> ' . sanitize_text_field($_POST['response_order_id']) . '</p>';
	}

	if (check_payment_params('f4l4', $_POST)) {
		$formatted_moneris_response .= '<p><strong>' . __('Card Number', 'chamber-of-commerce') . ': </strong> ' . esc_html($_POST['f4l4']) . '</p>';
	}
	if (array_key_exists('f4l4', $_POST)) {
		$moneris_response .= '<p><strong>' . __('Card Number', 'chamber-of-commerce') . ': </strong> ' . sanitize_text_field($_POST['f4l4']) . '</p>';
	}

	if (check_payment_params('card', $_POST)) {
		$card_values = array('M', 'V', 'AX', 'DC', 'NO', 'SE');
		if (array_search($_POST['card'], $card_values) !== false) {
			$formatted_moneris_response .= '<p><strong>' . __('Card Type', 'chamber-of-commerce') . ': </strong>';
			switch ($_POST['card']) {
				case 'M':
					$formatted_moneris_response .= 'Mastercard';
					break;
				case 'V':
					$formatted_moneris_response .= 'Visa';
					break;
				case 'AX':
					$formatted_moneris_response .= 'American Express';
					break;
				case 'DC':
					$formatted_moneris_response .= 'Diners Card';
					break;
				case 'NO':
					$formatted_moneris_response .= 'Novus / Discover';
					break;
				case 'SE':
					$formatted_moneris_response .= 'Sears';
					break;
			}
			$formatted_moneris_response .= '</p>';
		}
	}
	if (array_key_exists('card', $_POST)) {
		$moneris_response .= '<p><strong>' . __('Card Type', 'chamber-of-commerce') . ': </strong> ' . sanitize_text_field($_POST['card']) . '</p>';
	}

	if (check_payment_params('bank_transaction_id', $_POST)) {
		$formatted_moneris_response .= '<p><strong>' . __('Reference Number', 'chamber-of-commerce') . ': </strong>' . esc_html($_POST['bank_transaction_id']) . '</p>';
	}
	if (array_key_exists('bank_transaction_id', $_POST)) {
		$moneris_response .= '<p><strong>' . __('Reference Number', 'chamber-of-commerce') . ': </strong>' . sanitize_text_field($_POST['bank_transaction_id']) . '</p>';
	}
}

function get_taxonomy_filter($title_name, $term_items, $hierarchical = true)
{
	?>
	<div class="wpb_wrapper" style="margin-bottom: 10px">
		<span class="filter_heading"><?php echo __('Type of' . ' ' . ucfirst($title_name), 'chamber-of-commerce'); ?></span>
		<fieldset>
            <span>
            <?php if (count($term_items) > 1): ?>
				<label class="checkbox-container">
                    <span><?php _e('All', 'chamber-of-commerce'); ?></span>
                    <input type="checkbox" value="All" checked="checked" class="all_checkbox" name="all_taxonomy"/>
                    <span class="checkmark"></span>
                </label>
			<?php endif;

			foreach ($term_items as $current_term) {
				if (($hierarchical && $current_term->parent == 0))
					continue; ?>
				<label class="checkbox-container">
                    <span><?php echo $current_term->name; ?></span>
                    <input type="checkbox" checked="checked" class="checkbox_filter"
						   name="<?php echo $current_term->taxonomy; ?>" value="<?php echo $current_term->term_id; ?>">
                    <span class="checkmark"></span>
                </label>
			<?php }
			?>
            </span>
		</fieldset>
	</div>

	<?php
}

add_filter("wck_cptc_capabilities_user_cover_image", "adding_capabilities_to_cover_image_cpt", 10, 1);

function adding_capabilities_to_cover_image_cpt($capability_type)
{
	$cap = array();
// Meta capabilities

	$cap["edit_post"] = "edit_{$capability_type}";
	$cap["read_post"] = "read_{$capability_type}";
	$cap["delete_post"] = "delete_{$capability_type}";

	// Primitive capabilities used outside of map_meta_cap():

	$cap["edit_posts"] = "edit_{$capability_type}s";
	$cap["edit_others_posts"] = "edit_others_{$capability_type}s";
	$cap["publish_posts"] = "publish_{$capability_type}s";
	$cap["read_private_posts"] = "read_private_{$capability_type}s";

	// Primitive capabilities used within map_meta_cap():

	$cap["read"] = "read";
	$cap["delete_posts"] = "delete_{$capability_type}s";
	$cap["delete_private_posts"] = "delete_private_{$capability_type}s";
	$cap["delete_published_posts"] = "delete_published_{$capability_type}s";
	$cap["delete_others_posts"] = "delete_others_{$capability_type}s";
	$cap["edit_private_posts"] = "edit_private_{$capability_type}s";
	$cap["edit_published_posts"] = "edit_published_{$capability_type}s";
	$cap["create_posts"] = "edit_{$capability_type}s";

	return $cap;

}

//Chambers Members Users Roles Functions
/**
 * @param $membership_type : string/array with role or roles name
 * @return true if current user belongs to the role or some of the roles if $membership_type is array
 */
function is_memberof($membership_type)
{
	$is_member = false;
	if (is_user_logged_in()) {
		$roles = wp_get_current_user()->roles;
		if (is_array($membership_type)) {
			foreach ($roles as $role) {
				if (in_array($role, $membership_type)) {
					$is_member = true;
					break;
				}

			}
		} else {
			$is_member = in_array($membership_type, $roles);
		}

	}
	return $is_member;
}

/**
 * Return all roles for specific user
 * @return array
 */
function get_user_roles($user = null)
{
	$user = ($user) ? $user : wp_get_current_user();

	$roles = array_filter(( array )$user->roles, function ($r) {
		return $r !== 'bbp_participant';
	});

	return $roles;
}

function get_urls_in_content($content)
{
	if (empty($content)) {
		return false;
	}

	if (preg_match_all('/<a\s[^>]*?href=([\'"])(.+?)\1/is', $content, $matches)) {
		return $matches[2];
	}

	return false;
}

/**
 * Simple check to see if buddy dev has forum for current user roles
 *
 * @return bool
 */
function buddydev_has_forum_for_role(): bool
{
	$user = wp_get_current_user();
	$roles = ( array )$user->roles;

	$args = array(
		'post_type' => 'forum',
		'meta_key' => '_members_access_role',
		'meta_value' => $roles,
		'meta_compare' => 'IN'
	);

	$forums = new WP_Query($args);

	return $forums->found_posts > 0;
}

/**
 * return a sub-array of meta checks for bbpress to be sure that the forums are filtered by role
 *
 * @return array[]
 */
function buddydev_get_forums_by_role(): array
{
	$user = wp_get_current_user();
	$roles = ( array )$user->roles;

	return array(
		array(
			'key' => '_members_access_role',
			'value' => $roles,
			'compare' => 'IN'
		),
	);
}

/**
 * Takes query $r and adds restraints to show only forums for user role, passed to hook
 * @param $r
 * @return mixed
 */
function buddydev_modify_forum_args($r)
{
	if (!is_user_logged_in()) {
		// To show no forum when user not logged in.
		$r['post__in'] = array(0);

		return $r;
	}

	$r['meta_query'] = buddydev_get_forums_by_role();

	return $r;
}

add_filter('bbp_after_has_forums_parse_args', 'buddydev_modify_forum_args');

/**
 * Takes $can_view = true, and the $forum_id and checks if the user is allowed to  view the forum IF they enter the link manually.
 * Passed to hook.
 *
 * @param $can_view
 * @param $forum_id
 * @return bool
 */
function buddydev_user_can_view_forum($can_view, $forum_id): bool
{
	if (!is_user_logged_in()) {
		return false;
	}

	$roles = get_user_roles();

	$args = array(
		'p' => $forum_id,
		'post_type' => 'forum',
		'meta_key' => '_members_access_role',
		'meta_value' => $roles,
		'meta_compare' => 'IN'
	);

	$forums = new WP_Query($args);

	if ($forums->found_posts < 1)
		$can_view = false;

	return $can_view;
}

/**
 * @param int $forum_id
 */
function ccc_bbp_get_forum_post_count(int $forum_id = 0): void
{
	$forum_id = bbp_get_forum_id($forum_id);

	$user = wp_get_current_user();
	$roles = ( array )$user->roles;

	$args = array(
		'post_type' => bbp_get_topic_post_type(),
		'post_parent' => $forum_id,
		'post_status' => array('publish'),
		'meta_key' => '_members_access_role',
		'meta_value' => $roles,
		'meta_compare' => 'IN'
	);

	$topics = new WP_Query($args);
	$topicsIds = wp_list_pluck($topics->posts, 'ID');

	if (count($topicsIds) === 0) {
		echo 0;
	} else {
		$args = array(
			'post_type' => bbp_get_reply_post_type(),
			'post_parent__in' => $topicsIds,
			'post_status' => array('publish'),
			'meta_key' => '_members_access_role',
			'meta_value' => $roles,
			'meta_compare' => 'IN'
		);

		$replies = new WP_Query($args);
		echo (int)$replies->post_count + (int)count($topicsIds);
	}
}

/**
 * @return string
 */
function dashboard_title_by_role(): string
{
	$roles = get_user_roles();
	if (count($roles) > 1) {
		$roles = array_filter($roles, function ($r) {
			return $r !== 'arbitrator_member';
		});
	}

	$roles = array_values($roles);

	$string = '';
	foreach ($roles as $key => $role) {
		$string .= __(ucwords(str_replace('_', ' ', $role)), 'chamber-of-commerce');
		break;
		//$string .= ($key !== (count($roles) - 1)) ? ', ' : '';
	}

	return $string;
}

function ccc_frontend_upload($t, $user)
{
	if (isset($_FILES['d4p_attachment'])) {
		return array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif' => 'image/gif',
			'png' => 'image/png',
			'csv' => 'text/csv',
			'txt' => 'text/plain',
			'pdf' => 'application/pdf',
			'zip' => 'application/zip',
			'rar' => 'application/rar'
		);
	}

	return $t;
}

add_filter('upload_mimes', 'ccc_frontend_upload', 10, 2);

function generate_recover_password_link($user_name)
{
	$user = get_user_by("login", trim($user_name));
	if (!$user)
		$user = get_user_by("email", trim(wp_unslash($user_name)));
	if (!$user)
		return false;

	//generate link to recovery password
	//generate key
	$key = get_password_reset_key($user);

	if (is_wp_error($key)) {
		return false;
	}

	return network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login');
}


function ck_load_js_script() {
	wp_enqueue_script( 'js-file', 'https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js');
}
add_action('wp_enqueue_scripts', 'ck_load_js_script');

 function my_custom_status_creation(){
        register_post_status( 'archived', array(
            'label'                     => _x( 'Archived', 'post' ),
            'label_count'               => _n_noop( 'Archived <span class="count">(%s)</span>', 'Archived <span class="count">(%s)</span>'),
            'public'                    => true,
            'exclude_from_search'       => false,
            'show_in_admin_all_list'    => true,
            'show_in_admin_status_list' => true
        ));
    }
    add_action( 'init', 'my_custom_status_creation' );

    function my_custom_status_add_in_quick_edit() {
        echo "<script>
        jQuery(document).ready( function() {
            jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"archived\">Archived</option>' );      
        }); 
        </script>";
    }
    add_action('admin_footer-edit.php','my_custom_status_add_in_quick_edit');
    function my_custom_status_add_in_post_page() {
        echo "<script>
        jQuery(document).ready( function() {        
            jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"archived\">Archived</option>' );
        });
        </script>";
    }
    add_action('admin_footer-post.php', 'my_custom_status_add_in_post_page');
    add_action('admin_footer-post-new.php', 'my_custom_status_add_in_post_page');