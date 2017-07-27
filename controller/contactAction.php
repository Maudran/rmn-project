<?php
$view = 'contactView.php';
$bodyId = 'contact-body';

// check $_POST

if ( isset($_GET['valid']) && $_GET['valid'] == '1') {
	$validMsg = "Formulaire envoyé!";
}


if (isset($_POST['contact'])) {

    $formValues = $_POST['contact'];
    $errors = array();


    if (!isset($formValues['surname']) ||
        !isset($formValues['civility']) ||
        !isset($formValues['firstname']) ||
        !isset($formValues['company']) ||
        !isset($formValues['email']) ||
        !isset($formValues['phone_number']) ||
        !isset($formValues['message'])) {
        $errorMsg = 'Une erreur est survenue';
    }


    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $formValues['email'])) {
        $errors['email'] .= 'L\'adresse email donnée ne semble pas être valide.<br />';
        $errorMsg = 'Une erreur est survenue';
    }


    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $formValues['firstname'])) {
        $errors['firstname'] .= 'Le prénom donné ne semble pas être valide.<br />';
        $errorMsg = 'Une erreur est survenue';
    }

    if (!preg_match($string_exp, $formValues['surname'])) {
        $errors['surname'] .= 'Le nom donné ne semble pas être valide.<br />';
        $errorMsg = 'Une erreur est survenue';
    }

    if (strlen($formValues['message']) < 2) {
        $errors['message'] .= 'Le message donné ne semble pas être valide.<br />';
        $errorMsg = 'Une erreur est survenue';
    }

    if (!isset($errorMsg)) {

        if (contact::insert($formValues)) {
            header('Location:/rmn-project/contact.htm?valid=1');
        }
        else {
            $errorMsg = 'Une erreur est survenue';
        }
    }




}