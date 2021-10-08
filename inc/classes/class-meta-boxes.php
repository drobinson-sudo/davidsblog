<?php

/**
 * Register Meta Boxes
 * 
 * @package David's Blog
 * 
 */

 namespace DAVIDS_BLOG\Inc;

 use DAVIDS_BLOG\Inc\Traits\Singleton;

 class Meta_Boxes {
     use Singleton;

     protected function __construct() {         
        //load class
        $this->setup_hooks();
       }     

    protected function setup_hooks() {
        
       /**
        * Actions
        */
        add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
        add_action( 'save_post', [$this, 'save_post_meta_data' ] );

    }

    public function add_custom_meta_box() {
        $screens = ['post' ];
        foreach ($screens as $screen) {
            add_meta_box(
                'hide-page-title ',             // Unique ID
                'Hide Page Title',     // Box Title
                [ $this, 'custom_meta_box_html'],    //Content callback, must be of type callable
                $screen,                     // Post type
                'side'
            );
        }
    }
    public function custom_meta_box_html( $post) {

        $value = get_post_meta($post->ID, '_hide_page_title', true);
        /**
         * Use nonce for verification 
         */
        wp_nonce_field( \plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name');

        ?>

        <label for="davidsblog-field"><?php esc_html_e( 'Hide the page title', 'davidsblog'); ?></label>
        <select name="davidsblog_hide_title_field" id="davidsblog-field" class="postbox">
            <option value=""><?php esc_html_e( 'Select', 'davidsblog')  ?></option>
            <option value="yes" <?php selected( $value, 'yes'); ?>>
                <?php esc_html_e( 'Yes', 'davidsblog'); ?>
            </option>
            <option value="no" <?php selected( $value, 'no'); ?>>
                <?php esc_html_e( 'No', 'davidsblog'); ?>
            </option>
        </select>
        <?php

    }

    public function save_post_meta_data( $post_id ) {
        /**
         * When the post is saved or updated we get $_POST available
         * Check if the current user is authorized 
         */
        if ( ! \current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        /**
         * Check if nonce value recieved in post request is same as we sent.
         * 
         */
        if ( ! isset( $_POST['hide_title_meta_box_nonce_name'] ) ||
            ! wp_verify_nonce(  $_POST['hide_title_meta_box_nonce_name'] , plugin_basename(__FILE__) )
            ) {
                return;
            }

        if (array_key_exists( 'davidsblog_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['davidsblog_hide_title_field']
            );
        }
    }
 }