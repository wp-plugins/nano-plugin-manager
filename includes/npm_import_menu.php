<?php

function npm_import_menu(){
	if(!current_user_can(NPM_CAPABILITY))
		wp_die(__('You do not have sufficient permissions to access this page.', 'npm'));
	
	/* File upload starts here */
	
	if(isset($_FILES["file"])){
		if($_FILES["file"]["type"] == "text/xml"){
			if ($_FILES["file"]["error"] > 0){
				echo '<div class="error"><p>' . __('Error', 'npm') . ': ' . $_FILES['file']['error'] . '</p></div>';
			}
			else{
				if (file_exists(NANO_PLUGIN_DIR . '/' . $_FILES["file"]["name"])){
					echo '<div class="error"><p>' . __('A nano plugin with the same file name already exists!', 'npm') . ' (' . $_FILES["file"]["name"] . ')</p></div>';
				}
				else{
					move_uploaded_file($_FILES["file"]["tmp_name"], NANO_PLUGIN_DIR . '/' . $_FILES["file"]["name"]);
					echo '<div class="updated"><p>' . __('Nano plugin', 'npm') . ' <strong>' . __('imported', 'npm') . '.</strong></p></div>';
				}
			}
		}
		else{
			echo '<div class="error"><p>' . __('Invalid file. XML format required.', 'npm') . '</p></div>';
		}
	}
	
	/* File upload ends here */
	
	echo '<div class="wrap">';
	echo '<div class="icon32"><img src="' . NANO_PLUGIN_URL . '/includes/npm32.png" alt=""><br /></div>';
	echo '<h2>&nbsp;&nbsp;&nbsp;' . __( 'Nano Plugin Importer', 'npm' ) . '</h2>';
	
	echo '<form action="" method="post" enctype="multipart/form-data">';
	
	echo '<p><input type="file" name="file" /></p>';
	echo '<p><input type="submit" class="button-primary" value="' . __('Import', 'npm') . '" /></p>';
	
	echo '</form>';
	echo '</div>';
}
