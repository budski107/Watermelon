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
                    <li><a href="login.php">Login | </a></li>
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
                    <li><a href="contact_us.php">Contact Us</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </nav>
        </div>
        <div id="main">
            <div id="faq">

            </div>
            <?php    
                require_once("conn.php");
                $ad_id = $_SESSION['adid'];

                $sql = ("select usr.email, usr.uid
                from tbl_advertisement adv, tblUsrPro usr 
                where adv.user_prof_id = usr.uid
                and adv.ad_id = ad_id");
                //SELECT tblUsrPro.email,tblUsrPro.uid,tbl_advertisement.user_prof_id FROM tblUsrPro INNER JOIN 
                            //tbl_advertisement ON tbl_advertisement.ad_id = tblUsrPro.uid WHERE tbl_advertisement.ad_id=:ad_id");
                $query = $db->prepare($sql);
                $query -> execute(array(':ad_id'=>$ad_id));
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
                    {
                        $email = $row['email'];
                    }        
                $body = $_POST['emailtext'];
                $sub = "New Inquiry";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'From: thefatehstudio.com' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";            
                @mail($email, $sub, $body,$headers) or die ("Failure");
                echo "Your Message has been Sent Successfully";
            ?>
        </div>
<?php include("footer.php")?>



