<?php

/* Some constants that are used. */

function npm_constants(){
	/* the nano plugin directory (just the directory name) */
	define('NANO_PLUGIN_DIR_NAME', 'nano-plugin-manager');
	
	/* the nano plugin directory (full path) */
	define('NANO_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . NANO_PLUGIN_DIR_NAME . '/nano-plugins');
	
	/* the nano plugin url */
	define('NANO_PLUGIN_URL', WP_PLUGIN_URL . '/' . NANO_PLUGIN_DIR_NAME);
	
	/* the capability needed to edit nano plugins */
	define('NPM_CAPABILITY', 'edit_plugins');
	
	
}
