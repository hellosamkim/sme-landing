<?php

if (!class_exists('CallToActionE')) {
    /**
     * Main class for Gutenberg Block - Call To Action E
     */
    class CallToActionE
    {
        private static $instance;

        public function __construct()
        {
// Check is Gutenberg editor active.
            if (function_exists('register_block_type')) {
// Init
                add_action('init', array($this, 'register_assets'));
                add_action('init', array($this, 'register_block'));
                add_action('wp_enqueue_scripts', array($this, 'cta_e_enqueue_script'));
            }
        }

        public static function get_instance()
        {
            if (self::$instance == null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Register the block's assets for the editor.
         */
        function register_assets()
        {
            wp_register_script(
                'call-to-action-e-block-script',
                plugins_url('block.js', __FILE__),
                array('wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor'),
                filemtime(plugin_dir_path(__FILE__) . 'block.js'),
                true
            );
            wp_register_style(
                'call-to-action-e-block-editor-style',
                plugins_url('editor.css', __FILE__),
                array('wp-edit-blocks'),
                filemtime(plugin_dir_path(__FILE__) . 'editor.css')
            );
            wp_register_style(
                'call-to-action-e-block-frontend-style',
                plugins_url('style.css', __FILE__),
                array(),
                filemtime(plugin_dir_path(__FILE__) . 'style.css')
            );
        }

        function render_block_cta_e($attributes){
            $thumbnail_url = get_the_post_thumbnail_url($attributes['postId']);
            if (!$thumbnail_url)
                $thumbnail_url =  get_stylesheet_directory_uri()."/assets/images/placeholder-image.jpg";
                return '<div class="vc_col-xs-12 vc_col-sm-6 vc_col-md-4 wp-block-ccc-blocks-cta-e">
                    <div class="issue_item">
                        <a href="'. get_the_permalink($attributes['postId']) .'" class="vc_gitem-link element_link"
                                title="'. get_the_title($attributes['postId']) .'">
                            <figure class="wpb_wrapper vc_figure">
                                <div class="vc_single_image-wrapper vc_box_rounded vc_box_border_grey issue_img">
                                    <img src="'. $thumbnail_url . '"
                                     class="vc_single_image-img attachment-large"
                                     alt=""></div>
                            </figure>                        
                            <span class="cta-e-title">                                
                                '. esc_html(get_the_title($attributes['postId'])) . '<div class="arrow_in_link"></div>
                            </span>                             
                            <div class="excerpt excerpt-white"><p>'. get_the_excerpt($attributes['postId']) . '</p></div>
                        </a>
                        
                    </div>
                </div>';
        }

        /**
         * Register new block and set corresponding styles for it
         */
        function register_block()
        {
            register_block_type('ccc-blocks/cta-e', array(
                'editor_script' => 'call-to-action-e-block-script',
                'editor_style' => 'call-to-action-e-block-editor-style',
                'attributes' => array('postId' => array('type' => 'number'), 'className' => array('type' => 'string'), 'postUrl' => array('type' => 'string')),
                'render_callback' => array($this, 'render_block_cta_e')
            ));
        }

        function cta_e_enqueue_script(){
            if (is_page() || is_singular() || is_front_page()){
                $id = get_the_ID();
                if (has_block('ccc-blocks/cta-e', $id)){
                    wp_enqueue_style('call-to-action-e-block-frontend-style');
                }
            }
        }
    }

    CallToActionE::get_instance();
}