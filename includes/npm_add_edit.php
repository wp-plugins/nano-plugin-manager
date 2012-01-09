<?php

/* Add or edit the nano plugins. */

function npm_add_edit(){
	if(isset($_POST['npm_edit'])){
	
		if(!current_user_can(NPM_CAPABILITY))
			wp_die(__('You do not have sufficient permissions to access this page.', 'npm'));
		
		/* read the posted data */
		$old_file_name = htmlspecialchars(stripslashes($_POST['npm_old_file_name'] . '.xml'));
		$file_name = htmlspecialchars(stripslashes($_POST['npm_file_name'] . '.xml'));
		$name = htmlspecialchars(stripslashes($_POST['npm_name']));
		$description = htmlspecialchars(stripslashes($_POST['npm_description']));
		$type = htmlspecialchars(stripslashes($_POST['npm_type']));
		$tag = htmlspecialchars(stripslashes($_POST['npm_tag']));
		$arguments = htmlspecialchars(stripslashes($_POST['npm_arguments']));
		$content = htmlspecialchars(stripslashes($_POST['npm_content']));
		$priority = htmlspecialchars(stripslashes($_POST['npm_priority']));
		
		/* if it doesn't have a name, the current unix timestamp will have to do */
		if($name == '') $name = time();
		
		/* we generate the file name based on the name of the nano plugin, and we want everything to be very sanitary */
		if($file_name == '.xml') $file_name = sanitize_file_name(sanitize_title($name)) . '.xml';
		
		/* if we edit, we first delete the old file, than create a new one */
		if($_POST['npm_edit']){
			unlink (NANO_PLUGIN_DIR . '/' . $old_file_name);
			
			/* also, change the file name in options, in case it has changed */
			if($old_file_name != $file_name){
				$activated = get_option('npm_activated', array());
				if(in_array($old_file_name, $activated)){
					$key = array_search($old_file_name, $activated);
					$activated[$key] = $file_name;
				
					update_option('npm_activated', $activated);
				}
			}
		}
		
		/* open file (also creates it), write data, close file */
		$fp = fopen(NANO_PLUGIN_DIR . '/' . $file_name, 'w');
		fwrite($fp, '<data><name>' . $name . '</name><description>' . $description . '</description><type>' . $type . '</type><tag>' . $tag . '</tag><arguments>' . $arguments . '</arguments><content>' . $content . '</content><priority>' . $priority . '</priority></data>');
		fclose($fp);
		
		/* just redirect */
		header('Location: ' . npm_current_url() . '?page=nano-plugin-editor&npm_edit=' . $file_name . '&npm_saved=true');
	}
}
