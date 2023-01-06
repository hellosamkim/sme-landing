<?php

if (!class_exists('CallToActionC')) {
    /**
     * Main class for Gutenberg Block - Call To Action C
     */
    class CallToActionC
    {
        private static $instance;

        public function __construct()
        {
// Check is Gutenberg editor active.
            if (function_exists('register_block_type')) {
// Init
                add_action('init', array($this, 'register_assets'));
                add_action('init', array($this, 'register_block'));
                add_action('wp_enqueue_scripts', array($this, 'cta_c_enqueue_script'));
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
                'call-to-action-c-block-script',
                plugins_url('block.js', __FILE__),
                array('wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor'),
                filemtime(plugin_dir_path(__FILE__) . 'block.js'),
                true
            );
            wp_register_style(
                'call-to-action-c-block-editor-style',
                plugins_url('editor.css', __FILE__),
                array('wp-edit-blocks'),
                filemtime(plugin_dir_path(__FILE__) . 'editor.css')
            );
            wp_register_style(
                'call-to-action-c-block-frontend-style',
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
            register_block_type('ccc-blocks/call-to-action-c', array(
                'editor_script' => 'call-to-action-c-block-script',
                'editor_style' => 'call-to-action-c-block-editor-style'
            ));
        }

        function cta_c_enqueue_script(){
            if (is_page() || is_singular() || is_front_page()){
                $id = get_the_ID();
                if (has_block('ccc-blocks/cta-c', $id)){
                    wp_enqueue_style('call-to-action-c-block-frontend-style');
                }
            }
        }
    }

    CallToActionC::get_instance();
}