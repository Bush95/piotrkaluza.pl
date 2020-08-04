<?php
add_theme_support( 'post-thumbnails', array( 'post' ) );   
add_theme_support( 'title-tag', array('post') );

function gp_create_post_types() {
    register_post_type( 'portfolio',
        array(
                'labels' => array(
                'name' => __( 'Portfolio' ),
                'singular_name' => __( 'Portfolio' ),
                'add_new_item' => __( 'Dodaj do portfolio' ),
                'edit_item' => __( 'Edytuj' ),
                'new_item' => __( 'Nowy' ),
                'view_item' => __( 'Pokaż portfolio' ),
                'search_items' => __( 'Szukaj w portfolio' )
            ),
            'menu_position' => 5,
            'supports' => array('title', 'editor'),
            'menu_icon'   => 'dashicons-hammer',
            'has_archive' => true,
            'public' => true
        )
    );
}

add_action( 'init', 'gp_create_post_types' );

add_action( 'template_redirect', 'theme_redirects', 99 );
function theme_redirects() {
    if ( is_singular( 'krajobrazy' ) ) {
        wp_redirect( get_post_type_archive_link( 'krajobrazy' ) );
        die();
    }
    if ( is_singular( 'portrety' ) ) {
        wp_redirect( get_post_type_archive_link( 'portrety' ) );
        die();
    }
}

// Notifications admin columns
// ADD TWO NEW COLUMNS
function images_columns_head($defaults) {
    $defaults['photo']  = 'Thumbnail';
    return $defaults;
}

function images_columns_content($column_name, $post_ID) {
    if (get_field('photo') && $column_name == 'photo') {
        echo wp_get_attachment_image(get_field('photo', $post_ID)['id'], 'thumbnail');
    }
}
add_filter('manage_krajobrazy_posts_columns', 'images_columns_head');
add_action('manage_krajobrazy_posts_custom_column', 'images_columns_content', 10, 2);
add_filter('manage_portrety_posts_columns', 'images_columns_head');
add_action('manage_portrety_posts_custom_column', 'images_columns_content', 10, 2);
