<?php

/* Edit editor capabilities */
function gp_edit_editor_options() {
    $role_object = get_role( 'editor' );
    $role_object->add_cap('manage_options');
    $role_object->add_cap('edit_theme_options');
    $role_object->add_cap('gravityforms_edit_forms');
    $role_object->add_cap('gravityforms_create_forms');
    $role_object->add_cap('gravityforms_view_entries');
    $role_object->add_cap('gravityforms_edit_entries');
    $role_object->add_cap('gravityforms_delete_entries');
    add_filter( 'aioseo_custom_menu_order', '__return_false' );
}
add_action('admin_menu', 'gp_edit_editor_options');

// Acf capabilities
function gp_acf_settings_capability( $path ) {

    return 'administrator';

}
add_filter('acf/settings/capability', 'gp_acf_settings_capability');

// More in Adminimize
