<?php

/* Add the menu and submenu pages. */

function npm_menus(){
	add_menu_page(__('Nano Plugins', 'npm'), __('Nano Plugins', 'npm'), NPM_CAPABILITY, 'nano-plugins', 'npm_main_menu', plugin_dir_url(__FILE__) . 'npm16.png', 66);
	$npm_editor_page = add_submenu_page('nano-plugins', __('Nano Plugin Editor', 'npm'), __('Add / Edit', 'npm'), NPM_CAPABILITY, 'nano-plugin-editor', 'npm_editor_menu');
	add_submenu_page('nano-plugins', __('Nano Plugin Importer', 'npm'), __('Import', 'npm'), NPM_CAPABILITY, 'nano-plugin-importer', 'npm_import_menu');
	
	add_action( 'admin_head-'. $npm_editor_page, 'npm_editor_header' );
}

/* All that follows is just for the syntax highlighter. */

function npm_editor_header(){
	/* the core css and javascript */
	echo '<link rel="stylesheet" href="' . NANO_PLUGIN_URL . '/codemirror/lib/codemirror.css">';
	echo '<script src="' . NANO_PLUGIN_URL . '/codemirror/lib/codemirror.js"></script>';
	
	/* the needed dependencies */
	echo '<script src="' . NANO_PLUGIN_URL . '/codemirror/mode/xml/xml.js"></script>';
	echo '<script src="' . NANO_PLUGIN_URL . '/codemirror/mode/javascript/javascript.js"></script>';
	echo '<script src="' . NANO_PLUGIN_URL . '/codemirror/mode/css/css.js"></script>';
	echo '<script src="' . NANO_PLUGIN_URL . '/codemirror/mode/clike/clike.js"></script>';
	
	/* the mode that I actually need */
	echo '<script src="' . NANO_PLUGIN_URL . '/codemirror/mode/php/php.js"></script>';
	
	/* the theme */
	echo '<link rel="stylesheet" href="' . NANO_PLUGIN_URL . '/codemirror/theme/monokai.css">';
}
