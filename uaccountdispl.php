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
    require_once ('conn.php');       
    $sql = "SELECT * FROM tblUsrPro WHERE email=:email";
    $query = $db->prepare($sql);
    $query -> execute(array(':email'=>$email,));
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $uid = $row['uid'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];    
    $phone = $row['phone'];
    $city = $row['city'];
    $prov = $row['prov'];
    $addr = $row['addr'];
    $zip = $row['zip'];
    $img = $row['img'];
    $ques1 = $row['ques1'];
    $ans1 = $row['ans1'];
    $ques2 = $row['ques2'];
    $ans2 = $row['ans2'];  
    //echo $img;
}
    
?>

<div id="main">
    <h1>Welcome <?php echo $_SESSION['userlogin']?></h1>    
    
    <table class="table">
        <tr>
            <td>
                <?php
                    header('Content-type: image/jpg');
                    echo $img;
                ?>
            </td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><?echo $fname ?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?echo $lname ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?echo $email ?></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><?echo $phone ?></td>
        </tr><tr>
            <td>City</td>
            <td><?echo $city ?></td>
        </tr>
        <tr>
            <td>Province</td>
            <td><?echo $prov ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?echo $addr ?></td>
        </tr>
        <tr>
            <td>Zip</td>
            <td><?echo $zip ?></td>
        </tr>      
    </table>
</div>