<?php

/* Add the menu and submenu pages. */

function npm_menus(){
	add_menu_page(__('Nano Plugins', 'npm'), __('Nano Plugins', 'npm'), NPM_CAPABILITY, 'nano-plugins', 'npm_main_menu', plugin_dir_url(__FILE__) . 'npm16.png', 66);
	add_submenu_page('nano-plugins', __('Nano Plugin Editor', 'npm'), __('Add / Edit', 'npm'), NPM_CAPABILITY, 'nano-plugin-editor', 'npm_editor_menu');
	add_submenu_page('nano-plugins', __('Nano Plugin Importer', 'npm'), __('Import', 'npm'), NPM_CAPABILITY, 'nano-plugin-importer', 'npm_import_menu');
}
