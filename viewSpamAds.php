<?php session_start();
//include("header.php");
require_once 'spamDAO.php';

if(isset($_SESSION['adminlogin'])){
            
 }
 else {
    header("location:index.php");            
}
//$spamDAOObj = new spamDAO();
                //Getting the result
                
                    $ads = spamDAO::getSpamAds();
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
                    <li><a href="faq_admin.php">FAQ</a></li>
                    <li><a href="search_admin.php">Search Categories</a></li>
                    <li><a href="spamcheck-admin.php">Spam Check </a></li>
                    <li><a href="thirdpartyads-admin.php">3rd Party Ads</a></li>     
                    <li><a href="tagcloud-admin.php">Tag Cloud</a></li>
                    <li><a href="contactus_admin.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <div id="search-bar-home">
            
        </div>
       
        <div id="main">
            <h1>Welcome Administrator <?php echo $_SESSION['adminlogin']?></h1>
<div>
                    <table>
                        <tr><td class='search_result'>Title</td><td class='search_result'>Description</td><td></td></tr>
                    <?php
                    foreach ($ads as $singleAd){
                        //$adId = $singleAd['ad_id'];
                        //echo '<br/>'.$adId.'<br/>';
                        ?>
                                
                                            <tr>
                                                
                                                <td class='search_result'>
                                                    <a href="display_ad.php?ad_id=<?php echo $singleAd['ad_id'];?>" >
                                                    <?php
                                                    echo $singleAd['ad_title'].'<br/>';
                                                    ?>
                                                    </a>
                                                </td>
                                               <td class='search_result'>
                                                    <?php
                                                    echo $singleAd['ad_description'].'<br/>';
                                                    ?>
                                               </td>
                                               <td class='search_result'><a href="deleteSpam.php?ad_id=<?php echo $singleAd['ad_id'];?>">Delete Spam</a></td>
                                            </tr>
                                    <?php
                                    
                        }
                        ?>
                    </table>
</div>
        </div>        
<?php include("footer.php")?>

