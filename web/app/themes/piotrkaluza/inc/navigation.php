<?php

function gp_registerNav() {

	add_theme_support('menus');

	register_nav_menu('header_menu', 'Header');
	register_nav_menu('footer_menu', 'Footer');

}

add_action('init', 'gp_registerNav');
