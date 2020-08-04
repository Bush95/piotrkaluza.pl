<?php

require_once( get_parent_theme_file_path( '/inc/navigation.php' ) );
require_once( get_parent_theme_file_path( '/inc/assets.php' ) );
require_once( get_parent_theme_file_path( '/inc/images.php' ) );
require_once( get_parent_theme_file_path( '/inc/wp-filter-extra.php' ) );
require_once( get_parent_theme_file_path( '/inc/theme-settings.php' ) );
require_once( get_parent_theme_file_path( '/inc/post-types.php' ) );
require_once( get_parent_theme_file_path( '/inc/capabilities.php' ) );
require_once( get_parent_theme_file_path( '/inc/forms.php' ) );
require_once( get_parent_theme_file_path( '/inc/acf/seo-microdata.php' ) );
require_once( get_parent_theme_file_path( '/inc/embed.php' ) );
require_once( get_parent_theme_file_path( '/inc/api.php' ) );
require_once( get_parent_theme_file_path( '/inc/comments.php' ) );
require_once( get_parent_theme_file_path( '/inc/popular-posts.php' ) );
require_once( get_parent_theme_file_path( '/inc/search.php' ) );


function add_favicon() {
  	$favicon_url = get_template_directory_uri() . '/assets/favicon/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
 
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

function str_to_id($string) {
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    return strtolower(trim($string, '-'));
}

?>
