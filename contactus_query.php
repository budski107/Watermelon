<?php
require_once 'database.php';
require_once 'contact_usClass.php';
class contactus_query 
{
     function insert($contact_us)
    {
        //$contact_us = new contact_usClass();
        $dbobj = new database();
        $con = $dbobj->getConnection();
        $firstname = $contact_us->getFirstname();
        $lastname = $contact_us->getLastname();
        $email= $contact_us->getEmail();
        $subject = $contact_us->getSubject();
        $message = $contact_us->getMessage();
        
        $query = "INSERT INTO contact_us(firstname, lastname, email, subject, message) VALUES ('$firstname','$lastname','$email','$subject','$message')";
        $flag = $con->exec($query);
        return $flag;
    }
    
    function Allcontact_us()
    {
        //$contact_us = new contact_usClass();
        $dbobj = new database();
        $con = $dbobj->getConnection();
        $query = "SELECT * FROM contact_us";
        $allcontact_us = $con->query($query);
        return $allcontact_us;
    }
    
    function delete($contact_us)
    {
        //$contact_us = new contact_usClass();
        $dbobj = new database();
        $con = $dbobj->getConnection();
        $query = "DELETE FROM contact_us WHERE contactus_id=".$contact_us;
        $flag = $con->exec($query);
        return $flag;
    }
}

?>
