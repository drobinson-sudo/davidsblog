<?php

/**
 * Register Menus
 * 
 * @package David's Blog
 * 
 */

 namespace DAVIDS_BLOG\Inc;

 use DAVIDS_BLOG\Inc\Traits\Singleton;

 class Menus {
     use Singleton;

     protected function __construct() {         
        //load class
        $this->setup_hooks();
       }     

    protected function setup_hooks() {
        
       /**
        * Actions
        */
        add_action( 'init', [$this, 'register_menus' ] );
    }
    public function register_menus() {
        register_nav_menus( [
            'davidsblog-header-menu' => esc_html__( 'Header Menu', 'davidsblog' ),
            'davidsblog-footer-menu' => esc_html__( 'Footer Menu', 'davidsblog')
        ]);
    }
    
    
 }