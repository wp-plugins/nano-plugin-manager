<?php

/* Read nano plugin prameters for each file. */

function npm_params($file_name){
	/* load the xml */
	$xml = simplexml_load_file(NANO_PLUGIN_DIR . '/' . $file_name);
	
	/* reat all parameters into an array */
	foreach($xml as $key => $value){
		$arr[$key] = htmlspecialchars_decode($value);
	}
	return $arr;
}
