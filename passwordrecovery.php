<? ob_start(); ?>
<? session_start() ?>
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
<div id="main">   
    <form action="passwordrecovery.php" method="post" name="passwordrecovery">
        <table class="table">
            <tr>
                <td>Enter Your E-mail</td>
                <td><input type="text" name="email" placeholder="Enter Your Email" required="true" /></td>                
            </tr>            
            <tr>
                <td><input type="submit" name="checkemail" text="Submit" /></td>
            </tr>
        </table>
    </form>
</div>
<?php 
    if(isset($_POST['checkemail']))
    {                  
            $email = $_POST['email'];
            require_once('conn.php');
            $sql = "SELECT COUNT(*) FROM tblUsrPro WHERE email =?";
            $query = $db->prepare($sql);        
            $query->bindParam(1, $email);
            $query->execute();
            if ($query->rowCount() > 0)
            {
                //echo "success";                
                $_SESSION['recoveremail'] = $email; 
                header("location:securityanswer.php");
            }
            else{
                echo "This id is not yet registered with this website";
            }
     }
?>
<?php include("footer.php");?>
<? ob_flush(); ?>