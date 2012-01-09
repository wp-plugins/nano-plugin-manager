<?php

/* Add the filters and actions. */

function npm_core(){
	/* get the file names */
	$activated = get_option('npm_activated', array());
	foreach($activated as $file_name){
		/* get the parameters for each nano plugin */
		$params = npm_params($file_name);
		
		/* if it's a filter, add the filter */
		if($params['type'] == 'filter'){
			add_filter($params['tag'], create_function($params['arguments'], $params['content']), (int)$params['priority'], substr_count($params['arguments'], '$'));
		}
		
		/* if it's an action, add the action */
		if($params['type'] == 'action'){
			add_action($params['tag'], create_function($params['arguments'], $params['content']), (int)$params['priority'], substr_count($params['arguments'], '$'));
		}
	
		/* Yes, yes. I know about anonymous functions. Will switch to them when PHP 5.3 gains wider adoption. */
	}
}
