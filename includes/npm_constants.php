<?php

/* Some constants that are used. */

function npm_constants(){
	/* the nano plugin directory */
	define('NANO_PLUGIN_DIR', WP_PLUGIN_DIR . '/nano-plugin-manager/nano-plugins');
	
	/* the capability needed to edit nano plugins */
	define('NPM_CAPABILITY', 'edit_plugins');
}
