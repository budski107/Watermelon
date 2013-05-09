<? ob_start(); ?>
<?php session_start(); 
if(isset($_SESSION['userlogin'])){
       
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
    $email = $_SESSION["userlogin"];
    //echo $email;
    $uid= urldecode(base64_decode($_GET["uid"]));
    //echo $uid;
    require_once ('conn.php');       
    $sql = "SELECT * FROM tblUsrPro WHERE uid=$uid";
    $query = $db->prepare($sql);
    $query -> execute(array(':email'=>$email,));
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $fname = $row['fname'];
    $ans1 = $row['ans1'];
    $ans2 = $row['ans2'];  
    $_SESSION['userid']= $uid;
    //echo $img;
}
    
?>

<div id="main">
    <h1>Welcome <?php echo $fname ?></h1>    
    <form action="changepwd.php" method="post" name="changepwd">
        <table class="table">
            <tr>
                <td>New Password</td>
                <td><input type="password" name="pwd" placeholder="New Password" required="true" /></td>                
            </tr>
            <tr>
                <td>Confirm</td>
                <td><input type="password" name="pwd1" placeholder="Confirm Password" required="true" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="changepwd" text="Change" /></td>
            </tr>
        </table>
    </form>
</div>
<?php 
    if(isset($_POST['changepwd']))
    {
        if($_POST['pwd'] !== $_POST['pwd1'] )
        {
            echo "Passwords do not match";
        }
        else
        {
            $uid= $_SESSION['userid'];
            $pwd=  md5($_POST['pwd']);
            $ans1=$_POST['ans1'];
            $ans2=$_POST['ans2'];
            require_once ('conn.php');
            $sql = "UPDATE tblUsrPro SET `pwd` =? WHERE uid=?";
            $query = $db->prepare($sql);        
            $query->execute(array($pwd,$uid));
            if ($query) 
            {
                session_destroy('userlogin');
                header('location:login.php');
            } 
            else 
            {
                //Query failed.
                $errorcode = $sql->errorCode();
                echo $errorcode;
            }    
        
        
        
        
        }        
     }
?>
<?php include("footer.php");?>
<? ob_flush(); ?>