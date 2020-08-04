<?php
/**
 * Plugin Name: Disable Autoupdates
 * Description: To update wordpress and plugins use Composer instead of wordpress cms.
 * Version: 1.0.0
 * Author: GiantPeach
 */


add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );


function gp_hidden_plugin( $r, $url ) {
    if ( 0 !== strpos( $url, 'http://api.wordpress.org/plugins/update-check' ) )
        return $r; // Not a plugin update request. Bail immediately.
  
    $plugins = unserialize( $r['body']['plugins'] );
    unset( $plugins->plugins[ plugin_basename( __FILE__ ) ] );
    unset( $plugins->active[ array_search( plugin_basename( __FILE__ ), $plugins->active ) ] );
    $r['body']['plugins'] = serialize( $plugins );
    return $r;
}
 
add_filter( 'http_request_args', 'gp_hidden_plugin', 5, 2 );

?>