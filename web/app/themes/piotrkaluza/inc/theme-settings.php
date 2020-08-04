<?php

// Option pages
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme_settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => 30,
        'icon_url'      => 'dashicons-nametag'
    ));

}

function lower_aioseop_priority( $html ) {
    return 'low';
}
add_filter( 'aioseop_post_metabox_priority', 'lower_aioseop_priority' );

add_filter( 'body_class', function( $classes ) {
    if (isset($_COOKIE['loading-transition']) && $_COOKIE['loading-transition'] == "1") {
        $classes = array_merge($classes, array('transition-load'));        
    } else {
        $classes = array_merge($classes, array('no-transition-load'));
    }
    return $classes;
} );

remove_filters_for_anonymous_class( 'the_content', 'wpdevart_comment_front_end', 'insert_facebook_comment_in_content', 10 );
