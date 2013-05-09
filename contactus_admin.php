<?php session_start();
if(isset($_SESSION['adminlogin'])){
            
  }
 else {
    header("location:index.php");            
}
?>
<?php
//require_once 'database.php';
require_once 'contact_usClass.php';
require_once 'contactus_query.php';
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
            <script type="text/javascript">
                function confSubmit(form) {
                if (confirm("Are you sure you want to submit the form?")) {
                form.submit();
                }
                else{

                }
                }
            </script>
            <table class="ptable">
                <tr><th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Option</th></tr>
            
            <?php
            $contactus_query = new contactus_query();
            $allcontact_us = $contactus_query->Allcontact_us();
            foreach ($allcontact_us as $row)
            {
            ?>
            <tr>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td><form action="contactus_admin.php" method="POST" name="cu_form"> <input type="hidden" value="<?php echo $row['contactus_id']; ?>" name="contactus_id"><input type="submit" value="Delete" name="delete" /></form></td>
            </tr>
            <?php } ?>
            </table>
        </div>
<?php
//if($_SERVER['REQUEST_METHOD'] == "POST")
if(isset($_POST['delete']))
{
    $id = $_POST['contactus_id'];
    $contactus_query = new contactus_query();
    $delete = $contactus_query->delete($id);
    if($delete > 0)
    {
        //echo "Deleted Successfully!";
        header("Location: contactus_admin.php");
    }
    else
    {
        echo 'Not Deleted !';
    }
}
?>
<?php include("footer.php")?>