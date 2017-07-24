<?php
$view = 'contactView.php';
$bodyId = 'contact-body';

// check $_POST

if ( isset($_GET['valid']) && $_GET['valid'] == '1') {
	$validMsg = "<script>alert(\"Formulaire envoyé!\");</script>";
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


	$email_message = "Form details below.\n\n";
	

	 
	
	$email_message .= "Civilité: ".($formValues['civility'])."\n";
	$email_message .= "First Name: ".($formValues['firstname'])."\n";
	$email_message .= "Last Name: ".($formValues['surname'])."\n";
	$email_message .= "Company: ".($formValues['company'])."\n";
	$email_message .= "Email: ".($formValues['email'])."\n";
	$email_message .= "Telephone: ".($formValues['phone_number'])."\n";
	$email_message .= "Message: ".($formValues['message'])."\n";
	

	$email = $formValues['email'];
	//$email_message = '';

	$headers = 'From: '.$email."\r\n".
	'X-Mailer: PHP/' . phpversion();
	$emailSent = mail($to, $subject, $email_message, $headers);

	//$errorMsg = 'Une erreur est survenue';   
    //$errors['civility'] = 'Vous êtes sûr de votre sexe ?';
	
	if (!isset($errorMsg)) {
		header('Location:/rmn-project/contact.htm?valid=1');
	}


}