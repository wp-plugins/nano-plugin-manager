<?php

/* Read the nano plugin files. */

function npm_files(){
	/* open directory */
	$dir = opendir(NANO_PLUGIN_DIR);
	
	$file_names = array();
	
	/* read the files into an array. only read .xml files */
	while(false !== ($file_name = readdir($dir))){
		if($file_name != '.' && $file_name != '..' && strrchr($file_name, '.') == '.xml'){
			$file_names[] = $file_name;
		}
	}
	
	closedir($dir);
	
	sort($file_names);
	
	return $file_names;
}
