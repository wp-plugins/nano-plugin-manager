<?php

/* The editor menu. */

function npm_editor_menu(){
	if(!current_user_can(NPM_CAPABILITY))
		wp_die(__('You do not have sufficient permissions to access this page.', 'npm'));
	
	/* first initialize everything to '' */
	$file_name = '';
	$name = '';
	$description = '';
	$type = '';
	$tag = '';
	$arguments = '';
	$content = '';
	$priority = '';
	
	/* get the parameters if you're editing */
	if(isset($_GET['npm_edit'])){
		$edit = TRUE;
		$file_name = $_GET['npm_edit'];
		$params = npm_params($file_name);
		
		$name = $params['name'];
		$description = $params['description'];
		$type = $params['type'];
		$tag = $params['tag'];
		$arguments = $params['arguments'];
		$content = $params['content'];
		$priority = $params['priority'];
	}
	else{
		$edit = FALSE;
	}
	
	/* strip extension. if i edit, i know for sure that it's an .xml, because only .xml files are displayed. */
	$file_name = substr($file_name, 0, strrpos($file_name, '.'));
	
	/* this is just for the select option */
	$selected_action = '';
	$selected_filter = '';
	if($type == 'action') $selected_action = ' selected="selected" ';
	if($type == 'filter') $selected_filter = ' selected="selected" ';
	
	/* if saving was successfull, display the message */
	if(isset($_GET['npm_saved']))
		echo '<div class="updated"><p>' . __('Nano plugin', 'npm') . ' <strong>' . __('saved', 'npm') . '.</strong></p></div>';
	
	echo '<div class="wrap">';
	echo '<div class="icon32"><img src="' . WP_PLUGIN_URL . '/npm/includes/npm32.png" alt=""><br /></div>';
	
	/* different titles for different cases */
	if($edit)
		echo '<h2>&nbsp;&nbsp;&nbsp;' . __( 'Edit Nano Plugin', 'npm' ) . '</h2>';
	else
		echo '<h2>&nbsp;&nbsp;&nbsp;' . __( 'Add Nano Plugin', 'npm' ) . '</h2>';
	
	echo '<br />';
	
	echo '<form method="post" action="">';
	
	echo '<input type="hidden" name="npm_edit" value="' . $edit . '" />';
	echo '<input type="hidden" name="npm_old_file_name" value="' . $file_name . '" />';
	
	echo '<table>';
	echo '<tr><td>' . __('Name', 'npm') . '</td><td><input type="text" name="npm_name" value="' . $name . '" size="40"></td></tr>';
	echo '<tr><td>' . __('File Name', 'npm') . '</td><td><input type="text" name="npm_file_name" value="' . $file_name . '" size="40">.xml</td></tr>';
	echo '<tr><td>' . __('Description', 'npm') . '</td><td><textarea rows="5" cols="38" name="npm_description">' . $description . '</textarea></td></tr>';
	echo '<tr><td>' . __('Hook Type', 'npm') . ' (*)</td><td><select name="npm_type"><option value=""></option><option value="action" ' . $selected_action . '>action</option><option value="filter" ' . $selected_filter . '>filter</option></select></td></tr>';
	echo '<tr><td>' . __('Hook Name', 'npm') . ' (*)</td><td><input type="text" name="npm_tag" value="' . $tag . '" size="40"></td></tr>';
	echo '<tr><td>' . __('Hook Arguments', 'npm') . '</td><td><input type="text" name="npm_arguments" value="' . $arguments . '" size="40"></td></tr>';
	echo '<tr><td>' . __('Hook Content', 'npm') . ' (*)</td><td><textarea wrap="off" rows="5" cols="38" name="npm_content">' . $content . '</textarea></td></tr>';
	echo '<tr><td>' . __('Hook Priority', 'npm') . '</td><td><input type="text" name="npm_priority" value="' . $priority . '" size="40"></td></tr>';
	
	echo '<tr><td></td><td><input type="submit" class="button-primary" value="' . __('Save', 'npm') . '" /></td></tr>';
	
	echo '</table>';
	echo '</form>';
	echo '</div>';
}
