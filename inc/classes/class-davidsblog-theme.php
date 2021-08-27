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
         $this->set_hooks();
     }

     protected function set_hooks() {
         //actions and filters
     }
}