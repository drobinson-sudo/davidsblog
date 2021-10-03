<?php
/**
 * The tempalte part for displaying a message that no posts are found.
 * 
 * @package David's Blog
 */

 ?>

 <section class="no-result not-found">
     <header class="page-header">
         <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'davidsblog'); ?></h1>
    </header>

    <div class="page-content">
        <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) {
                ?>
                <p>
                    <?php
                        printf(
                            wp_kses(
                                __( 'Ready to publish your first post? <a href="%s">Get started here.</a>', 'davidsblog' ),
                                [
                                    'a' => [
                                        'href' => []
                                    ]
                                ]
                            ),
                            esc_url( admin_url( 'post-new.php' ) )
                        )
                    ?>
                </p>
            <?php
            } elseif ( is_search() ) {
                ?>
                <p>
                    <?php esc_html_e( 'Sorry, but nothing turned up in your search. Please try another keyword.', 'davidsblog'); ?>
                </p>
                <?php
                get_search_form();
            } else { ?>
                <p>
                    <?php esc_html_e( 'It seems we cannot find what you are looking for. Perhaps a Search form can help.', 'davidsblog'); ?>
                </p>
                <?php
                get_search_form();

            }
        ?>
    </div>
 </section>