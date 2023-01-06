<?php

if (!class_exists('ActivityBlock')) {
    /**
     * Main class for Gutenberg Block - Activity Block
     */
    class ActivityBlock
    {
        private static $instance;

        public function __construct()
        {
// Check is Gutenberg editor active.
            if (function_exists('register_block_type')) {
// Init
                add_action('init', array($this, 'register_assets'));
                add_action('init', array($this, 'register_block'));
                add_action('wp_enqueue_scripts', array($this, 'activity_block_enqueue_script'));
            }
        }

        public static function get_instance()
        {
            if (self::$instance == null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        function render_activity_block($attributes){

            $result = "";
            if(!isset($attributes['postType']) || $attributes['postType']==="")
            {
                return "<h2> <strong> Activity Block:</strong> Please Select a Type of element do you want to list.</h2>";
            }
            else if ($attributes['postType'] === 'publication'){

                $result = $this->render_publication($attributes);
            }
            else if($attributes['postType'] === "news") {
                $filter = array('news_taxonomy','issues','daterange');

                $result = $this->render_list($attributes,$filter);
            }
            else if($attributes['postType'] === "events") {
                $filter = array('event_taxonomy','province','daterange');

                $result = $this->render_list($attributes,$filter);
                wp_enqueue_style("template_style",get_stylesheet_directory_uri() ."/template_style.css");
            }
            else if($attributes['postType'] === "meeting") {
                $filter = array('province','daterange');
                $result = $this->render_list($attributes,$filter);
                wp_enqueue_style("template_style",get_stylesheet_directory_uri() ."/template_style.css");
            }
            return $result;
        }

        function render_persons_block($attributes)
        {
            $result = "<style>
                        .page-nav-column
                        {
                            border-top: none;
                        }
                        </style>";
            if(!isset($attributes['postType']) || $attributes['postType']==="")
            {
                return "<h2> <strong> Person List:</strong> Please Select a Type of element do you want to list.</h2>";
            }
            else if ($attributes['postType'] === 'arbitrator'){

                $result .= $this->render_list($attributes,array('province','city','language','specialization'),12);
            }
            else if($attributes['postType'] === "chamber") {
                $result .= $this->render_list($attributes,array('province'),12);
            }
            else if($attributes['postType'] === "business") {
                $result .= $this->render_list($attributes,array('province'),12);
            }
            else if($attributes['postType'] === "association") {
                $result .= $this->render_list($attributes,array('province'),12);
            }
            else if($attributes['postType'] === "staff") {
                $result .= $this->render_list($attributes,array('province'),12);
            }
            else if($attributes['postType'] === "business_directory") {
                $result .= $this->render_member_directory($attributes);
            }
            return $result;
        }

        private function render_publication($attributes)
        {
            $form_filter = array('publication_taxonomy', 'issues' ,'daterange');

            $result = $this->render_list($attributes,$form_filter);

            $result.='<div class="" id="dialog"></div>
                        <script>
                             var in_execution = false;
                                jQuery(document).ready(function () {
                                jQuery("body").append(\'<div id="overlay"></div>\')
                                jQuery( "#dialog" ).dialog({ autoOpen: false, width: \'80%\', resizable: false, close: function () {
                                    jQuery("#overlay").hide();
                                    jQuery("#dialog").empty();
                                }, open: function () {
                                    jQuery("button.ui-dialog-titlebar-close")
                                    .html("'. __translate('Close', 'Chamber'). '<div class=\"close_img\"></div>")
                                    .css(\'font-family\', \'OpenSans\').css(\'font-size\', \'14px\').css(\'line-height\', \'19px\');
                                    jQuery(\'div.ui-dialog\').position({my: \'center bottom-5%\', of: \'nav.navbar\'});
                                    jQuery(\'#overlay\').show();
                                } });
                                jQuery("body").on(\'click\',\'#overlay\', function (e) {
                                    jQuery( "#dialog" ).dialog(\'close\');
                                });
                                jQuery("body").on(\'click\',\'.pub_link\', function (e) {
                                    e.preventDefault();
                                    if (in_execution)
                                        return;
                                    jQuery.ajax({
                                        url : "'.admin_url('admin-ajax.php').'",
                                        type: "post",
                                        data: {pub_id: jQuery(this).data("id"), action : "get_publication"},
                                        beforeSend: function(){
                                            jQuery("#loading").show();
                                            in_execution = true;
                                        },
                                        success: function(result){
                                            jQuery("#dialog").html(result);
                                            jQuery("#dialog").dialog("open");
                                        },
                                        complete: function(){
                                            jQuery("#loading").hide();
                                            in_execution = false;
                                        }
                                    });
                                });
                             jQuery("body").on(\'click\',\'.committee_tabs >li a\', function (e) {
                                e.preventDefault();
                                jQuery("input[name=\'committee\']").val(this.id);
                                jQuery(".committee_tabs > li[aria-selected=true]").attr("aria-selected",false);
                                jQuery(this).parent().attr("aria-selected",true);
                                jQuery("#filter_sidebar_form").submit();
                            });
                        });
        //sourceUrl="publication_modal.js"
                        </script>';
            return $result;
        }

        private function render_list( $attributes, $filter=array(), $list_size=5)
        {
            $result = '<div class="wp-block-ccc-blocks-activity-block">
                            <div class="row vc_row">';
            if(!empty($attributes["title"]))
                $result.='<h2>'.$attributes["title"].'</h2>';
            if(!empty($attributes["description"]))
                $result.='<div class="vc_col-xs-12 vc_col-sm-8">
                            <h6 style="font-size: 18px; line-height: 30px; color: #57646C">'.$attributes["description"].'</h6>
                          </div>';
            $result.='</div>';

            if(!isset($attributes["notFeatured"]) || !$attributes["notFeatured"])
            {
                $related_query = new WP_Query(
                    array(
                        'post_type' => $attributes["postType"],
                        'posts_per_page' => 1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'meta_key' => 'featured',
                        'meta_value' => '1'
                    ));
                while ($related_query->have_posts()){
                    $related_query->the_post();
                    $featured_id = get_the_ID();
                    set_query_var('featured_title', __translate('FEATURED '. strtoupper(get_post_type()), 'Chamber'));
                    $slug = 'partials/'.$attributes["postType"].'/featured';
                    $result .= '
                        <div class="featured_element">';
                    ob_start();
                    get_template_part($slug);
                    $result .= ob_get_contents();
                    ob_end_clean();
                    $result .='                         
                     </div>';
                }
                wp_reset_postdata();

            }

            array_unshift($filter, 'search');
            //array_push($filter,'daterange');

            set_query_var('post_type', $attributes["postType"]);
            set_query_var('form_filter', $filter);
            set_query_var('page_size', $list_size);

            if (isset($featured_id)){
                set_query_var('exclude',$featured_id );
            }

            $result .= '
                        <div class="vc_row" style="padding-top: 10px">
                            <div class="vc_col-xs-12 vc_col-sm-6 vc_col-md-3 filter_column">';
            ob_start();
            get_template_part('/partials/sidebar_listing');
            $sideBar = ob_get_contents();
            ob_end_clean();

            $result .= $sideBar;

			$alphabets = range('a', 'z');
			array_unshift($alphabets, 'all');

            $result .= '</div>
                            <div class="vc_col-xs-12 vc_col-sm-6 vc_col-md-9 summary_col" style="margin-bottom: 10px; display: none">
                                <div class="vc_col-xs-12"> 
                                	<div class="pagination-info">' . __translate("Showing","Chamber") . '&nbsp;<span id="text_count"></span>&nbsp;' . __translate("out of","Chamber") . '&nbsp;<span id="text_total"></span></div>
                                </div>
                                <div class="vc_col-xs-12">
                                	<div class="pagination-info alphabet-filter">';

									foreach ($alphabets as $index => $alphabet) {
										$result .= '<a href="#" data-alpha-value="'.$alphabet.'">'. $alphabet .'</a>';
									}

									$result .= '<input type="hidden" name="selected_alpha" id="selected_alpha" value="all" /> </div>
								</div>
                            </div>
                            <div class="clearfix hidden-md hidden-lg"></div>
                            <div class="vc_col-md-9" id="list_container"></div>

                            <div id="loading" style="position: absolute; width: 100%; height: 100%; background-color: #f0fdff; opacity: 0.2; display: none">
                                <img src="/wp-includes/images/spinner-2x.gif" id="loading-spinner" style="position: relative; top:45%; left: 45%;"/>
                            </div>
                        </div></div>';
            return $result;
        }


        /**
         * Register the block's assets for the editor.
         */
        function register_assets()
        {
            wp_register_script(
                'activity-block-script',
                plugins_url('block.js', __FILE__),
                array('wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor'),
                filemtime(plugin_dir_path(__FILE__) . 'block.js'),
                true
            );

            wp_register_script(
                'generic_submit_script',
                get_stylesheet_directory_uri() . '/js/generic_form_submit.js', array('jquery'),
                '1',
                true );

            wp_register_style(
                'activity-block-editor-style',
                plugins_url('editor.css', __FILE__),
                array('wp-edit-blocks'),
                filemtime(plugin_dir_path(__FILE__) . 'editor.css')
            );
            wp_register_style(
                'activity-block-frontend-style',
                plugins_url('style.css', __FILE__),
                array(),
                filemtime(plugin_dir_path(__FILE__) . 'style.css')
            );
        }

        /**
         * Register new block and set corresponding styles for it
         */
        function register_block()
        {
            register_block_type('ccc-blocks/activity-block', array(
                'editor_script' => 'activity-block-script',
                'editor_style' => 'activity-block-editor-style',
                'attributes' => array('className' => array('type' => 'string'), 'postType' => array('type' => 'string'),
                    "title"=> array("type" => 'string' ), "description" => array( "type" => 'string'), "notFeatured"=>array("type" => 'bool')),
                'render_callback' => array($this, 'render_activity_block')
            ));

            register_block_type('ccc-blocks/member-block', array(
                'editor_script' => 'activity-block-script',
                'editor_style' => 'activity-block-editor-style',
                'attributes' => array('className' => array('type' => 'string'), 'postType' => array('type' => 'string'),
                    "title"=> array("type" => 'string' ), "description" => array( "type" => 'string'), "notFeatured"=>array("type" => 'bool', "default" => true)),
                'render_callback' => array($this, 'render_persons_block')
            ));
        }

        function activity_block_enqueue_script(){
            if (is_page() || is_singular() || is_front_page()){
                $id = get_the_ID();
                if (has_block('ccc-blocks/activity-block', $id)
                    || has_block('ccc-blocks/member-block', $id)){
                    wp_enqueue_style('activity-block-frontend-style');
                    if (!wp_script_is('generic_submit_script')){
                        wp_enqueue_script('generic_submit_script');
                    }
                }
            }
        }

        private function render_member_directory( $attributes )
        {
            $result = '<div class="wp-block-ccc-blocks-activity-block">
                            <div class="row vc_row">';
            if(!empty($attributes["title"]))
                $result.='<h2>'.$attributes["title"].'</h2>';
            if(!empty($attributes["description"]))
                $result.='<div class="vc_col-xs-12 vc_col-sm-8">
                            <h6 style="font-size: 18px; line-height: 30px; color: #57646C">'.$attributes["description"].'</h6>
                          </div>';
            $result.='</div>';

            return $result;
        }

    }

    ActivityBlock::get_instance();
}