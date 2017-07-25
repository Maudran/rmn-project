<?php
$view = 'tableView.php';
$bodyId = 'table-body';

$contactFields = array(
    'civility' => 'Civilité',
    'firstname' => 'Prénom',
    'surname' => 'Nom',
    'company' => 'Entreprise'
);


$request = $mysqli->query("SELECT * FROM contact");
$result = array();

$labels = array();

while ($property = mysqli_fetch_field($request)) {
    if ( array_key_exists($property->name, $contactFields) ) {
        $labels[] = $contactFields[$property->name];
    }
}

//showing all data
while ($row = mysqli_fetch_array($request,MYSQLI_ASSOC)) {

    $newContact = array();

    foreach ( $row as $key => $value ) {
        if ( array_key_exists($key, $contactFields) ) {
            $newContact[$key] = $value;
        }
    }

    $result[] = $newContact;
}
