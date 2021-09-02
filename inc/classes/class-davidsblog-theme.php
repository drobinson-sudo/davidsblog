<?php
/**
 * bootstraps the theme.
 * 
 * @package Davids Blog
 * 
 */

 namespace DAVIDS_BLOG\Inc;

 use DAVIDS_BLOG\Inc\Traits\Singleton;

 class DAVIDSBLOG_THEME {
     use Singleton;

     protected function __construct() {         
         //load class

         Assets::get_instance();

         $this->setup_hooks();
        }     

     protected function setup_hooks() {
         
        /**
         * Actions
         */
        add_action( 'after_setup_theme', [$this, 'setup_theme' ] );
         
     }

     public function setup_theme() {
         add_theme_support( 'title-tag' );
     }

     
}