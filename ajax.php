<?php


require_once('model/class.contact.php');

$mysqli = contact::getDB();

$response = array('valid' => false);


if (isset($_GET['delete'])) {
    if ( contact::delete($_GET['delete']) ) {
        $response['valid'] = true;
    }
}

echo json_encode($response);