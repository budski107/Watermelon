<? ob_start(); ?>
<?php session_start(); 
if(isset($_SESSION['recoveremail'])){
       
}
else {
    header("location:index.php");            
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Advertisement Portal</title>
<link href="css/style.css" rel="stylesheet">
<!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>
<body>
    <div id="container">
        <div id="header">
            <a href="#">
                <a href="index.php"><div id="logo">
                
                </div></a>
            </a>
            <nav id="top-right-nav">
                 <ul>
                    <li><a href="logout.php">Logout | </a></li>
                    <li><a href="register.php">Register | </a></li>
                    <li><a href="help.php">Help</a></li>
                </ul>    
            </nav>
            <div id="find-us">
                <ul>
                    <li><a href="#"><img src="images/Facebook.png" alt="Team Watermelon" class="imgs" /></a></li>
                    <li><a href="#"><img src="images/Twitter.png" alt="Team Watermelon" class="imgs" /></a></li>
                    <li><a href="#"><img src="images/Youtube.png" alt="Team Watermelon" class="imgs" /></a></li>
                </ul>
            </div>
      
            <nav id="main-nav">
                <ul>
                    <li><a href="#">Post Add </a></li>
                    <li><a href="#">Account </a></li>
                    <li><a href="#">Hot-Deals</a></li>
                    <li><a href="#">Advanced Search</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </nav>
        </div>
        <div id="search-bar-home">
            
            
        </div>

<?php
    $email = $_SESSION["recoveremail"];
    //echo "email is " . $email;
    require_once ('conn.php');       
    $sql = "SELECT * FROM tblUsrPro WHERE email=:email";
    $query = $db->prepare($sql);
    $query -> execute(array(':email'=>$email,));
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
       {
            $uid = $row['uid'];
            $fname = $row['fname'];
            $ques1 = $row['ques1'];
            $ques2 = $row['ques2'];
            $ans1 = $row['ans1'];
            $ans2 = $row['ans2'];  
            //echo $img;
        }
    $_SESSION['recovery'] = array('uid' => $uid, 'ques1' => $ques1, 'ques2' => $ques2, 'ans1' => $ans1, 'ans2' => $ans2);    
    
?>

<div id="main">
    <h1>Welcome</h1>    
    <form action="securityanswer.php" method="post" name="securityanswer">
        <table class="table">
            <tr>
                <td>Question</td>
                <td><input type="text" name="ques1" disabled="true" value="<?php echo $_SESSION['recovery']['ques1'] ;?>" /></td>                
            </tr>
            <tr>
                <td>Answer</td>
                <td><input type="text" name="ans1" placeholder="Your Answer" required="true" /></td>                
            </tr>
            <tr>
                <td>Question</td>
                <td><input type="text" name="ques2" disabled="true" value="<?php echo $_SESSION['recovery']['ques2'] ;?>" /></td>                
            </tr>
            <tr>
                <td>Answer</td>
                <td><input type="text" name="ans2" placeholder="Your Answer" required="true" /></td>                
            </tr>
            <tr>
                <td><input type="submit" name="changepwd" text="Submit" /></td>
            </tr>
        </table>
    </form>
</div>
<?php 
    if(isset($_POST['changepwd']))
    {        
            $uid = $_SESSION['recovery']['uid'];
            $oldAns1 = $_SESSION['recovery']['ans1'];
            $oldAns2 = $_SESSION['recovery']['ans2'];
            $newAns1 = $_POST['ans1'];
            $newAns2 = $_POST['ans2'];
            
            if($oldAns1 == $newAns1 && $oldAns2 == $newAns2)
            {
                //Generate a RANDOM MD5 Hash for a password
                $random_password=md5(uniqid(rand()));
                //Take the first 8 digits and use them as the password we intend to email the user
                $emailpassword=substr($random_password, 0, 8);
                //Encrypt $emailpassword in MD5 format for the database
                $newpassword = md5($emailpassword);
                require_once ('conn.php');
                $sql = "UPDATE tblUsrPro SET pwd=:pwd WHERE uid=:uid ";
                $query = $db->prepare($sql);
                $query -> execute(array(':pwd'=>$newpassword,':uid'=>$uid));
                
                $body = "This is your new Password for login : " . $emailpassword;
                $body .="<br /><br />Please Login and Change your passsword";
                $sub = "Password Change";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'From: thefatehstudio.com' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";            
                @mail($email, $sub, $body,$headers) or die ("Failure");
                echo "Your Message has been Sent Successfully";
                
                
            }
            else{
                echo"The security answers do not match with your previous answers";
            }
     }
?>
<?php include("footer.php");?>
<? ob_flush(); ?>