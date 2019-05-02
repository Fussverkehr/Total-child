<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/font-awesome.min.css' );
    
}
add_filter( 'cleverreach_extension_container_selector', 'my_custom_cleverreach_container_selector' );
function my_custom_cleverreach_container_selector() {
  return 'wpcf7'; // General Contact Form 7 wrapper
}

add_filter( 'wpex_hook_site_logo_inner', 'attachment_image_link_remove_filter' );

    function attachment_image_link_remove_filter( $content ) {
        $content =
            preg_replace(
                array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
                    '{ wp-image-[0-9]*" /></a>}'),
                array('<img','" />'),
                $content
            );
        return $content;
    }
   
