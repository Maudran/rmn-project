<?php
$view = 'tableView.php';
$bodyId = 'table-body';


if (isset($_GET['delete'])) {
    if ( contact::delete($_GET['delete']) ) {
        $successMsg = "Le contact a été correctement supprimé";
    } else {
        $errorMsg = "Une erreur est survenue";
    }
}

$resultModel = contact::getAll();

$labels = $resultModel['labels'];
$result = $resultModel['result'];

