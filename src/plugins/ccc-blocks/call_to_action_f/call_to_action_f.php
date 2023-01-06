<?php

if (!class_exists('CallToActionF')) {
    /**
     * Main class for Gutenberg Block - Call To Action F
     */
    class CallToActionF
    {
        private static $instance;

        public function __construct()
        {
// Check is Gutenberg editor active.
            if (function_exists('register_block_type')) {
// Init
                add_action('init', array($this, 'register_assets'));
                add_action('init', array($this, 'register_block'));
                add_action('wp_enqueue_scripts', array($this, 'cta_f_enqueue_script'));
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
                'call-to-action-f-block-script',
                plugins_url('block.js', __FILE__),
                array('wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor'),
                filemtime(plugin_dir_path(__FILE__) . 'block.js'),
                true
            );
            wp_register_style(
                'call-to-action-f-block-editor-style',
                plugins_url('editor.css', __FILE__),
                array('wp-edit-blocks'),
                filemtime(plugin_dir_path(__FILE__) . 'editor.css')
            );
            wp_register_style(
                'call-to-action-f-block-frontend-style',
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
            register_block_type('ccc-blocks/cta-f', array(
                'editor_script' => 'call-to-action-f-block-script',
                'editor_style' => 'call-to-action-f-block-editor-style',
            ));
        }

        function cta_f_enqueue_script(){
            if (is_page() || is_singular() || is_front_page()){
                $id = get_the_ID();
                if (has_block('ccc-blocks/cta-f', $id)){
                    wp_enqueue_style('call-to-action-f-block-frontend-style');
                }
            }
        }
    }

    CallToActionF::get_instance();
}