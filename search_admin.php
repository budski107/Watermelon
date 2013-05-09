<?php session_start();
if(isset($_SESSION['adminlogin'])){
            
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
<!--<div id="main">
    <div id="faq" style="border:#F00 1px solid">-->
    <!--<div id="accordion">-->
			<br />
            <br />	
       <a href="search_admin_add_cat.php"><input type="button" value="Insert A New Category" /></a>
          
                <?php 
                include_once("conn.php");
				
				$query = $db -> prepare("SELECT * FROM tbl_ad_category");
                $query -> execute();
                $row = $query ->fetchALL();
				
			  
              echo "<table>
                      <tr>
                      <th class='datahead'>Search Category</th>
                      <th class='datahead'>Options</th>
                      </tr>";
                	foreach($row as $res)
					{
                    echo "<tr>";
                    
                    echo "<td class='datacell'>" . $res['ad_category']  . "</td>";
                  	
					
                    echo "<td class='datacell'><a href='search_admin_update_cat.php?ad_category_id=" . $res['ad_category_id'] . "'>" ."<input type='button' value='Update' name='upd' id='upd'/></a><a href='search_admin_delete_cat.php?ad_category_id=" . $res['ad_category_id'] . "'>" ."<input type='button' value='Delete' name='del' id='del' /></a></td>";
                    echo "</tr>";
					}
                echo"</table>";
            ?>          
              	
</div>
<?php include ("footer.php"); ?>    

