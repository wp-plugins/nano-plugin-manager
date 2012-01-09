<?php

/* Clean the option and sort it. */

function npm_clean(){
	$activated = get_option('npm_activated', array());
	$present_files = npm_files();

	/* make sure that there are no files in the option that no longer exist (have been deleted). */
	foreach($activated as $key => $value){
		if(!in_array($value, $present_files))
			unset($activated[$key]);
	}
	
	/* just sort it alphabetically. it also assings new keys. we want that. */
	sort($activated);
	update_option('npm_activated', $activated);
}
