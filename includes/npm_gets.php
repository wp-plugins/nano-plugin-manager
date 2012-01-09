<?php

/* Activate / deactivate / delete the nano plugins. */

function npm_gets(){
	/* read the option */
	$activated = get_option('npm_activated', array());
	
	/* onlu add the newly activated nano plugin if it's not already there */
	if(isset($_GET['npm_activate']) && !in_array($_GET['npm_activate'], $activated)){
		if(!current_user_can(NPM_CAPABILITY))
			wp_die(__('You do not have sufficient permissions to access this page.', 'npm'));
		$activated[] = $_GET['npm_activate'];
	}
	
	/* only remove the newly deactivated nano plugin if it IS there */
	if(isset($_GET['npm_deactivate']) && in_array($_GET['npm_deactivate'], $activated)){
		if(!current_user_can(NPM_CAPABILITY))
			wp_die(__('You do not have sufficient permissions to access this page.', 'npm'));
		$key = array_search($_GET['npm_deactivate'], $activated);
		unset($activated[$key]);
	}
	
	/* update the option */
	update_option('npm_activated', $activated);
	
	/* delete file */
	if(isset($_GET['npm_delete'])){
		if(!current_user_can(NPM_CAPABILITY))
			wp_die(__('You do not have sufficient permissions to access this page.', 'npm'));
		unlink (NANO_PLUGIN_DIR . '/' . $_GET['npm_delete']);
	}
}
