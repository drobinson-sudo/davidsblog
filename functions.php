<?php
/**
 * Theme Functions
 * 
 * @package David's Blog
 */

if (! defined( 'DAVIDSBLOG_DIR_PATH')) {
    define( 'DAVIDSBLOG_DIR_PATH', untrailingslashit( get_template_directory()));
}

if (! defined ( 'DAVIDSBLOG_DIR_URI')) {
    define( 'DAVIDSBLOG_DIR_URI', untrailingslashit( get_template_directory_uri()));
}

require_once DAVIDSBLOG_DIR_PATH . '/inc/helpers/autoloader.php';
require_once DAVIDSBLOG_DIR_PATH . '/inc/helpers/template-tags.php';

function davidsblog_get_theme_instance() {
    \DAVIDS_BLOG\Inc\DAVIDSBLOG_THEME::get_instance();
}

davidsblog_get_theme_instance();


 function davidsblog_enqueue_scripts() {
    
 } 