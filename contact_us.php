<?php 
//require_once 'database.php';
require_once 'contact_usClass.php';
require_once 'contactus_query.php';
?>

<?php include('header.php')?>
        <form action="contact_us.php" method="POST">
            <h1>Contact Us</h1>
            <br />
            <table style="line-height: 2.1;padding: 15px;">
                <tr><td>
                First Name :</td><td> <input type="text" name="firstname" required/>
                </td></tr>
                <tr>
                    <td>Last Name :</td><td><input type="text" name="lastname" required/></td>
                </tr>
                <tr>
                    <td>Email :</td><td><input required type="text" name="email" required/></td>
                </tr>
                <tr>
                    <td>Subject :</td><td><input type="text" name="subject" required/></td>
                </tr>
                <tr>
                    <td>Message :</td><td><textarea rows="10" cols="50" name="message"></textarea></td>
                </tr>
                <tr><td></td><td><input type="submit" value="Submit" name="submit"/></td></tr>
            </table>
        </form>
<?php include('footer.php')?>

<?php 
if(isset($_POST['submit']))
{
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $objcontact_usClass = new contact_usClass($firstname,$lastname,$email,$subject,$message);
    $contact_us = new contactus_query();
    $flag =  $contact_us->insert($objcontact_usClass);
    if($flag > 0)
    {
        echo 'Your message is sent successfully!';
    }
 else {
        echo 'There is some problem . Please try later !';
    }
}

?>
