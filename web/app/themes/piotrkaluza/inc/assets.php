<?php

function gp_script_enqueue () {
	// CSS
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.3.4', 'all');

    if(is_page_template('page-templates/wedding.php')) {
        wp_enqueue_style('weddingfont', "https://fonts.googleapis.com/css?family=Allura&display=swap", array(), '1.0.0', 'all');
    }

	// JS
    wp_enqueue_script('justifedgallery', get_template_directory_uri() . '/assets/js/jquery.justifiedGallery.min.js', array('jquery'), '', 'all');
    wp_enqueue_script('magnificpopup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('mainjs', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.3.4', true);

}

add_action('wp_enqueue_scripts', 'gp_script_enqueue');



/* -------- */
/* Cleaning */
/* -------- */

function dequeue_jquery_migrate( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
    }
}
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove emoji
function disable_wp_emojicons() {
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

    // remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

add_filter( 'emoji_svg_url', '__return_false' );
add_action( 'init', 'disable_wp_emojicons' );

remove_action( 'wp_head', 'rsd_link' );
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');



?>
