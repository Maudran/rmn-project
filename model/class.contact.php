<?php

class contact {

    private static $contactFields = array(
        'id' => 'ID',
        'civility' => 'Civilité',
        'firstname' => 'Prénom',
        'surname' => 'Nom',
        'company' => 'Entreprise',
        'email' => 'Email',
        'phone_number' => 'Téléphone',
        'message' => 'Message'
    );


    /**
     * Get input data from form
     * Save it into DB
     * @param $formValues
     */
    public static function insert($formValues) {

        global $mysqli;


            $civility = $mysqli->escape_string($formValues['civility']);
            $firstname = $mysqli->escape_string($formValues['firstname']);
            $surname = $mysqli->escape_string($formValues['surname']);
            $company = $mysqli->escape_string($formValues['company']);
            $email = $mysqli->escape_string($formValues['email']);
            $phone_number = $mysqli->escape_string($formValues['phone_number']);
            $message = $mysqli->escape_string($formValues['message']);


            $res = $mysqli->query("INSERT INTO contact (civility, firstname, surname, company, email, phone_number, message)
                    VALUES ('$civility', '$firstname', '$surname', '$company', '$email', '$phone_number', '$message')");

            if($res){
                return true;
            } else {
                return false;
            }
    }


    /**
     * Delete 1 contact from DB
     */
    public static function delete() {

        global $mysqli;

        $deleteId = $_GET['delete'];
        $query = sprintf("DELETE FROM contact WHERE id= %d", $deleteId);
        $res = $mysqli->query($query);

        if ( $res ) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * retrieve all contact in DB. With labels
     * @return array Array with keys : labels and result
     */
    public static function getAll() {

        global $mysqli;

        $request = $mysqli->query("SELECT * FROM contact");
        $result = array();

        $labels = array();

        while ($property = mysqli_fetch_field($request)) {
            if ( array_key_exists($property->name, self::$contactFields) ) {
                $labels[] = self::$contactFields[$property->name];
            }
        }

        //showing all data
        while ($row = mysqli_fetch_array($request,MYSQLI_ASSOC)) {

            $newContact = array();

            foreach ( $row as $key => $value ) {
                if ( array_key_exists($key, self::$contactFields) ) {
                    $newContact[$key] = $value;
                }
            }

            $result[] = $newContact;
        }

        return array('labels' => $labels, 'result' => $result);
    }



}