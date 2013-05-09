<?php
class contact_usClass {
    private $contactus_id, $firstname, $lastname, $email, $subject, $message;
    
    public  function __construct($firstname, $lastname, $email, $subject, $message) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }
    
    public function getContactUs_id(){
        return $this->contactus_id;
    }
    public function setContactUs_id($value){
        $this->contactus_id = $value;
    }
    
    
    public function getFirstname(){
        return $this->firstname;
    }
    public function setFirstname($value){
        $this->firstname = $value;
    }
    
    
    public function getLastname(){
        return $this->lastname;
    }
    public function setLastname($value){
        $this->lastname = $value;
    }
    
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }
    
    
    public  function getSubject(){
        return $this->subject;
    }
    public function setSubject($value){
        $this->subject = $value;
    }
    
    
    public function getMessage(){
        return $this->message;
    }
    public function setMessage($value){
        $this->message = $value;
    }
}

?>