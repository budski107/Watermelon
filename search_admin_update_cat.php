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
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    <!--<div id="accordion">-->
				
       <a href="search_admin.php"><input type="button" value="Back to the Search Category Admin Page" /></a>
            <?php
			
			include("conn.php");
			
				
            	$ad_category_id = $_GET['ad_category_id'];
                $sql = ("SELECT * FROM tbl_ad_category WHERE ad_category_id=:ad_category_id");                
                $query = $db->prepare($sql);
                $query -> execute(array(':ad_category_id'=>$ad_category_id));
                $res = $query ->fetch();           
            
            
                echo'<form name="update_category" method="post" action="search_admin_update_cat.php">';
                
                
                echo"<table>
                    <tr>
                        <td><input type='hidden' name='ad_category_id' value='" . $res['ad_category_id'] . "'/></td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td><input type='text' name='ad_category' value='" . $res['ad_category'] . "' /></td>
                    </tr>
                            
                    <tr>
                        <td><input type='submit' value='Update Category' name='upd' id='upd' /></td>
                        <td><a href='search_admin.php'><input type='button' value='Cancel' name='cancel' /></a></td>
                    </tr>
                </table>
            </form>";
			  ?>      	
    </div>
    
</div>



<?php   
	       
	  
//--------------------------------------------------------------
	     
	if(isset($_POST['upd']))
    {        
        $ad_category_id=$_POST['ad_category_id'];
        $ad_category=$_POST['ad_category'];
       	//$search_update_query = new search_update_query();
		
        $sql = "UPDATE tbl_ad_category SET ad_category=:ad_category WHERE ad_category_id=:ad_category_id";
        $query = $db->prepare($sql);
        $query -> execute(array(':ad_category'=>$ad_category, ':ad_category_id'=>$ad_category_id));
		if ($query) 
            {
				
                header("Location: search_admin.php");
            } 
            else 
            {
                //Query failed.
                $errorcode = $sql->errorCode();
                echo $errorcode;
            }    
		
		
	}
	
	
	
	/*if(isset($_POST['delete']))
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
}*/
?>
<?php include ("footer.php"); ?> 