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
            <?php include_once 'dbClass.php'; ?>
            <a href="#">
                <a href="index.php"><div id="logo">
                
                </div></a>
            </a>
            <nav id="top-right-nav">
                 <ul>
                    <li><a href="login.php">Login | </a></li>
                    <li><a href="register.php">Register | </a></li>
                    <li><a href="wishlist.php"><?php include "wishlistFeature.php"?></a></li>
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
                    
                    <li><a href="#">Account </a></li>
                    <!--<li><a href="<?php //echo $_SERVER['REMOTE_HOST'].'watermelon\view\postAd.php'?>">Post Ad </a></li>-->
                   
                    <li><a href="<?php echo $_SERVER['REMOTE_HOST'].'\view\postAd.php'?>">Post Ad</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </nav>
        </div>