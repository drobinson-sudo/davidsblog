<?php
/**
 * The template for content.
 * 
 * To be used inside the WordPress Loop.
 * 
 * @package David's Blog
 */

 ?>

 <div class="entry-content">
    <?php
        if ( is_single() ) {
            the_content(
                sprintf(
                    wp_kses(
                        __( 'Continue reading %s <span class="meat-nav">&rarr;</span>', 'davidsblog' ),
                        [
                            'span' => [
                                'class' => []
                            ]
                        ]
                    ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )    
                )
            );

            wp_link_pages(
                [
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'davidsblog' ),
                    'after' => '</div>',
                ]
                );

        } else {
            davidsblog_the_excerpt();
            printf( '<br>');
            echo davidsblog_excerpt_more();
        }

        
    ?>
 </div>
