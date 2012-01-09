<?php

/* Check if we have appropriate permissions for file operations. */

function npm_permissions(){
	if(!is_writable(NANO_PLUGIN_DIR))
		echo '<div class="error"><p><strong>' . __('Nano Plugins Notice', 'npm') . '</strong>: ' . __('Unfortunately, your server configuration requires you to <a href="http://codex.wordpress.org/Changing_File_Permissions">chmod</a> your nano-plugins directory to a set of less secure writing permissions in order to be able to Add, Edit or Delete your nano plugins. If you find yourself in this situation, and you consider the security risk to be too high, you may still use this plugin but you will have to do all file operations (Add, Edit, Delete) via FTP. Aditionally, you may also want to talk about this with your hosting service provider. Your WordPress one-click updates probably don\'t work either.', 'npm') . '</p></div>';
}
