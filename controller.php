<?php
list($absolute,) = explode('?', $_SERVER['REQUEST_URI']);

$absolute = str_replace('rmn-project/', '', $absolute);

$absolute = trim($absolute, '/');

$controller = str_replace('.htm', '', $absolute);

$mysqli = new mysqli("localhost", "root", "", "rmn-project");

if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}



if (file_exists($controllerPath = 'controller/' . $controller . 'Action.php')) {
    include($controllerPath);
}
else {
	 include('controller/homeAction.php');	
}



