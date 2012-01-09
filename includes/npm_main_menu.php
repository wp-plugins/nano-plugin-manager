<?php

/* Main administration menu. */

function npm_main_menu(){
	if(!current_user_can(NPM_CAPABILITY))
		wp_die(__('You do not have sufficient permissions to access this page.', 'npm'));
	
	/* strip all get variables from the URL */
	$url = npm_current_url();
	
	/* read the option */
	$activated = get_option('npm_activated', array());
	
	/* read the files that are there */
	$present_files = npm_files();
	
	/* Update messages */
	
	/* if activation was successfull, display the message */
	if(isset($_GET['npm_activate']) && in_array($_GET['npm_activate'], $activated))
		echo '<div class="updated"><p>' . __('Nano plugin', 'npm') . ' <strong>' . __('activated', 'npm') . '.</strong></p></div>';
	
	/* if deactivation was successfull, display the message */
	if(isset($_GET['npm_deactivate']) && !in_array($_GET['npm_deactivate'], $activated))
		echo '<div class="updated"><p>' . __('Nano plugin', 'npm') . ' <strong>' . __('deactivated', 'npm') . '.</strong></p></div>';
	
	/* if deleting was successfull, display the message */
	if(isset($_GET['npm_delete']) && !in_array($_GET['npm_delete'], $present_files))
		echo '<div class="updated"><p>' . __('Nano plugin', 'npm') . ' <strong>' . __('deleted', 'npm') . '.</strong></p></div>';
	
	/* Show list */
	
	echo '<div class="wrap">';
	echo '<div class="icon32"><img src="' . WP_PLUGIN_URL . '/npm/includes/npm32.png" alt=""><br /></div>';
	echo '<h2>&nbsp;&nbsp;&nbsp;' . __( 'Nano Plugins', 'npm' ) . '</h2>';
	
	echo '<br />';
	
	echo '<table class="widefat plugins">';
	
	echo '<thead><tr><th>' . __( 'Nano Plugin', 'npm' ) . '</th><th>' . __( 'Description', 'npm' ) . '</th></tr></thead>';
	echo '<tfoot><tr><th>' . __( 'Nano Plugin', 'npm' ) . '</th><th>' . __( 'Description', 'npm' ) . '</th></tr></tfoot>';
	echo '<tbody>';
	
	foreach($present_files as $file_name){
		/* read parameters for nano plugin */
		$params = npm_params($file_name);
		
		if(!in_array($file_name, $activated))
			echo '<tr class="inactive">';
		if(in_array($file_name, $activated))
			echo '<tr class="active">';
		
		echo '<td class="plugin-title">';
		
		/* display name */
		echo '<strong>' . $params['name'] . '</strong>';
		
		
		/* generate the activate/deactivate/edit/delete links */	
		echo '<div class="row-actions-visible">';
		if(!in_array($file_name, $activated))
			echo '<span><a href="' . $url . '?page=nano-plugins&npm_activate=' . $file_name . '">' . __( 'Activate', 'npm' ) . '</a> | </span>';
		if(in_array($file_name, $activated))
			echo '<span><a href="' . $url . '?page=nano-plugins&npm_deactivate=' . $file_name . '">' . __( 'Deactivate', 'npm' ) . '</a> | </span>';
		echo '<span><a href="' . $url . '?page=nano-plugin-editor&npm_edit=' . $file_name . '">' . __( 'Edit', 'npm' ) . '</a> | </span>';
		echo '<span><a href="' . WP_PLUGIN_URL . '/npm/nano-plugins/' . $file_name . '">' . __( 'Export', 'npm' ) . '</a> | </span>';
		echo '<span class="delete"><a href="' . $url . '?page=nano-plugins&npm_delete=' . $file_name . '" onclick="return confirm(\'' . __( 'Delete', 'npm' ) . '?\' );">' . __( 'Delete', 'npm' ) . '</a></span>';
		echo '</div>';
		
		echo '</td>';
		
		/* display description */
		if($params['description']=='') $params['description'] = $params['tag'] . ' ' . $params['type'];
		echo '<td><p>' . $params['description'] . '</p></td>';
		echo '</tr>';
	}

	echo '</tbody>';	
	echo '</table>';
	echo '</div>';
}
