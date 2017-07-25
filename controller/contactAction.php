<?php
$view = 'contactView.php';
$bodyId = 'contact-body';

// check $_POST

if ( isset($_GET['valid']) && $_GET['valid'] == '1') {
	$validMsg = "Formulaire envoyé!";
}


if (isset($_POST['contact'])) {

	$to = "maryanne.audran@gmail.com";
	$subject = "Contact CV en ligne";

	$formValues = $_POST['contact'];

	$errors = array();




	if(!isset($formValues['surname']) ||
		!isset($formValues['civility']) ||
	    !isset($formValues['firstname']) ||
	    !isset($formValues['company']) ||
	    !isset($formValues['email']) ||
	    !isset($formValues['phone_number']) ||
	    !isset($formValues['message'])) {
	    $errorMsg = 'Une erreur est survenue';   

	    // $errors['civility'] = ''    
	}
	 
	
	
	
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

	if(!preg_match($email_exp,$formValues['email'])) {
		$errors['email'] .= 'L\'adresse email donnée ne semble pas être valide.<br />';
	}


	$string_exp = "/^[A-Za-z .'-]+$/";

	if(!preg_match($string_exp,$formValues['firstname'])) {
	$errors['firstname'] .= 'Le prénom donné ne semble pas être valide.<br />';
	}

	if(!preg_match($string_exp,$formValues['surname'])) {
	$errors['surname'] .= 'Le nom donné ne semble pas être valide.<br />';
	}

	if(strlen($formValues['message']) < 2) {
	$errors['message'] .= 'Le message donné ne semble pas être valide.<br />';
	}

	$mysqli = new mysqli("localhost", "root", "", "rmn-project");

    if ($mysqli->connect_errno) {
        printf("Échec de la connexion : %s\n", $mysqli->connect_error);
        exit();
    }

    $civility = $mysqli->escape_string($formValues['civility']);
    $firstname = $mysqli->escape_string($formValues['firstname']);
    $surname = $mysqli->escape_string($formValues['surname']);
    $company = $mysqli->escape_string($formValues['company']);
    $email= $mysqli->escape_string($formValues['email']);
    $phone_number = $mysqli->escape_string($formValues['phone_number']);
    $message = $mysqli->escape_string($formValues['message']);


    $mysqli->query("INSERT INTO contact (civility, firstname, surname, company, email, phone_number, message)
                    VALUES ('$civility', '$firstname', '$surname', '$company', '$email', '$phone_number', '$message')");

	
	if (!isset($errorMsg)) {
		header('Location:/rmn-project/contact.htm?valid=1');
	}


}