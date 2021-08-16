<?php
/**
 * Theme Functions
 * 
 * @package David's Blog
 */

 function davidsblog_enqueue_scripts() {
    wp_enqueue_style( 'style-sheet', get_stylesheet_uri() , [], filemtime( get_template_directory() . '/style.css'), 'all' );
 }

 add_action( 'wp_enqueue_scripts', 'davidsblog_enqueue_scripts' );