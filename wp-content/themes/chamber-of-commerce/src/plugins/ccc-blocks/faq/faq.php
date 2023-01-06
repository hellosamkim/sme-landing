<?php

if (!class_exists('Faq')) {
    /**
     * Main class for Gutenberg Block - Call To Action A
     */
    class Faq
    {
        private static $instance;

        public function __construct()
        {
// Check is Gutenberg editor active.
            if (function_exists('register_block_type')) {
// Init
                add_action('init', array($this, 'register_assets'));
                add_action('init', array($this, 'register_block'));
                add_action('wp_enqueue_scripts', array($this, 'cta_faq_enqueue_script'));
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
                'faq-block-script',
                plugins_url('block.js', __FILE__),
                array('wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor','jquery','jquery-ui-core'),
                filemtime(plugin_dir_path(__FILE__) . 'block.js'),
                true
            );
            wp_register_script(
                'faq-script',
                plugins_url('faq.js', __FILE__),
                array('jquery','jquery-ui-core'),
                filemtime(plugin_dir_path(__FILE__) . 'faq.js'),
                true
            );
            wp_register_style(
                'faq-block-editor-style',
                plugins_url('editor.css', __FILE__),
                array('wp-edit-blocks'),
                filemtime(plugin_dir_path(__FILE__) . 'editor.css')
            );
            wp_register_style(
                'faq-block-frontend-style',
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
            register_block_type('ccc-blocks/faq', array(
                'editor_script' => 'faq-block-script',
                'editor_style' => 'faq-block-editor-style',
            ));
        }

        function cta_faq_enqueue_script(){
            if (is_page() || is_singular() || is_front_page()){
                $id = get_the_ID();
                if (has_block('ccc-blocks/faq', $id)){
                    wp_enqueue_style('faq-block-frontend-style');
                    wp_enqueue_script('faq-script');
                }
            }
        }
    }

    Faq::get_instance();
}