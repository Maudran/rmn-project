<?php
list($absolute,) = explode('?', $_SERVER['REQUEST_URI']);

$absolute = str_replace('rmn-project/', '', $absolute);

$absolute = trim($absolute, '/');

$controller = str_replace('.htm', '', $absolute);

$mysqli = new mysqli("localhost", "root", "", "rmn-project");

$mysqli->set_charset("utf8");

if ($mysqli->connect_errno) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

require_once('model/class.contact.php');

if (file_exists($controllerPath = 'controller/' . $controller . 'Action.php')) {
    include($controllerPath);
}
else {
    include('controller/homeAction.php');
}



