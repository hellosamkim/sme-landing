<?php
/*
Plugin Name: SideBar Block
Description: Plugin that add CCC Sidebar Block for Gutenberg editor
*/

if (!class_exists('LinksBlock')) {
    /**
     * Main class for Gutenberg Block - Links Block
     */
    class LinksBlock
    {
        private static $instance;

        public function __construct()
        {
// Check is Gutenberg editor active.
            if (function_exists('register_block_type')) {
// Init
                add_action('init', array($this, 'register_assets'));
                add_action('init', array($this, 'register_block'));
                add_action('wp_enqueue_scripts', array($this, 'links_block_enqueue_script'));
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
                'links-block-script',
                plugins_url('block.js', __FILE__),
                array('wp-blocks', 'wp-components', 'wp-element', 'wp-i18n', 'wp-editor'),
                filemtime(plugin_dir_path(__FILE__) . 'block.js'),
                true
            );
            wp_register_style(
                'links-block-editor-style',
                plugins_url('editor.css', __FILE__),
                array('wp-edit-blocks'),
                filemtime(plugin_dir_path(__FILE__) . 'editor.css')
            );
            wp_register_style(
                'links-block-frontend-style',
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
            register_block_type('ccc-blocks/links-block', array(
                'editor_script' => 'links-block-script',
                'editor_style' => 'links-block-editor-style'
            ));
        }

        function links_block_enqueue_script(){
            if (is_page() || is_singular() || is_front_page()){
                $id = get_the_ID();
                if (has_block('ccc-blocks/links-block', $id)){
                    wp_enqueue_style('links-block-frontend-style');
                }
            }
        }
    }

    LinksBlock::get_instance();
}
