<?php

// A Hash function to share everywhere, in a more functional way
function getHash($str)
{
	return hash('sha256', $str);
}

/*
AUTOLOADER
*/

function autoload($classname)
{
	$file = dirname(__FILE__) . '/' . $classname . '.php'; // catch all files in the directory
	if (file_exists($file)) {
		require $file; // require ONLY the files that exist into the folder...
	}
}

spl_autoload_register('autoload'); // This is the function to run the autoloader