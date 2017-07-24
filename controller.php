<?php
list($absolute,) = explode('?', $_SERVER['REQUEST_URI']);

$absolute = str_replace('rmn-project/', '', $absolute);

$absolute = trim($absolute, '/');

$controller = str_replace('.htm', '', $absolute);


if (file_exists($controllerPath = 'controller/' . $controller . 'Action.php')) {
    include($controllerPath);
}
else {
	 include('controller/homeAction.php');	
}



