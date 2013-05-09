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
            <form>
                <select id = "search-category" class="input-elements">
                    <option value = "">Categories</option>
                    <option value = "1">Mobiles</option>
                    <option value = "2">Automobiles</option>
                    <option value = "3">Laptops</option>
                    <option value = "4">Services</option>
                </select>
                <input type="text" value="Search by Keywords" class="input-elements"/>
                <select id = "filter1" class="input-elements">
                    <option value = "">Filters</option>
                    <option value = "1">Filters</option>
                    <option value = "2">Filters</option>
                    <option value = "3">Filters</option>
                    <option value = "4">Filters</option>
                </select>
                <select id = "filter2" class="input-elements">
                    <option value = "">Filter</option>
                    <option value = "1">Filters</option>
                    <option value = "2">Filters</option>
                    <option value = "3">Filters</option>
                    <option value = "4">Filters</option>
                </select>
                <input type="button" value="Search" />
            </form>
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
    <form name="editProfile" action="editprofile.php" method="POST" enctype="multipart/form-data">
        <table class="userProfile">
            <tr>
                <td> <img src="uploads/<?php echo $img?>" width="300px" height="300px" /></td>            
            </tr>
            <tr>
                <td>Update Photo</td>            
            </tr>
            <tr>
                <td><input type="file" name="image"</td>
            </tr>
        </table>
        <table class="table" style="margin-left: 20px;">        
            <tr>
                <td>First Name  </td>
                <td><input name="fname" type="text" value='<?echo $fname ?>' required autofocus="true"/>
                <input type="hidden" name="uid" value="<?php echo $uid?>" /></td>
            </tr>
            <tr>
                <td>Last Name  </td>
                <td><input name="lname" type="text" value='<?echo $lname ?>' required/></td>
            </tr>
            <tr>
                <td>Email Name  </td>
                <td><input name="email"  type="text" value='<?echo $email ?>' required /></td>
            </tr>
            <tr>
                <td>Phone  </td>
                <td><input name="phone" type="text" value='<?echo $phone ?>' required /></td>
            </tr>
            <tr>
                <td>Address  </td>
                <td><input name="addr" type="text" value='<?echo $addr ?>' required /></td>
            </tr>
            <tr>            
                <td>City  </td>
                <td><input name="city" type="text" value='<?echo $city ?>' required /></td>
            </tr>
            <tr>            
                <td>Province  </td>
                <td><input name="prov" type="text" value='<?echo $prov ?>' required /></td>
            </tr>
            <tr>            
                <td>Postal Code:  </td>
                <td><input name="zip" type="text" value='<?echo $zip ?>' required /></td>
            </tr>
            <tr>            
                <td>Question 1:  </td>
                <td><input name="ques1" type="text" value='<?echo $ques1 ?>' required /></td>
            </tr>
            <tr>            
                <td>Answer:  </td>
                <td><input name="ans1" type="text" value='<?echo $ans1 ?>' required /></td>
            </tr>
            <tr>            
                <td>Question 2:  </td>
                <td><input name="ques2" type="text" value='<?echo $ques2 ?>' required /></td>
            </tr>
            <tr>            
                <td>Answer:  </td>
                <td><input name="ans2" type="text" value='<?echo $ans2 ?>' required /></td>
            </tr>
        </table>
        <table class="accMenu" style="margin-left: 20px;">
        <tr>
            <td><input type="submit" name="update" value="Update" class="button" /></td>
        </tr>        
        <tr>
            <td style="cursor: pointer" onclick="parent.location='useraccount.php'"><input type="button" class="button" value="View Profile"/></td>
        </tr>
    </table>
    </form>
</div>
<?php 
    if(isset($_POST['update']))
    {
        $uid=$_POST['uid'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $city=$_POST['city'];
        $prov=$_POST['prov'];
        $zip=$_POST['zip'];
        //ip address of user
        //$ip=$REMOTE_ADDR;        
        $addr=$_POST['addr'];
        $ques1=$_POST['ques1'];
        $ans1=$_POST['ans1'];
        $ques2=$_POST['ques2'];
        $ans2=$_POST['ans2'];
        require_once ('conn.php');
        
    //VAlIDATIONS
    $value = 0;    
    if (isset ($_POST["fname"]) && !empty($_POST["fname"]))
    {
        $valFname = $_POST["lname"];    
        $patternName = "/[A-Z,a-z]/";
        if(preg_match($patternName,$valFname))
        {
            $value = $value + 0;
        }
        else {
            echo "The Last Name should contain only alphabets.<br />";
            $value = $value + 1;
            } 
    }
    //validating lname
    
    if (isset ($_POST["lname"]) && !empty($_POST["lname"]))
    {
    $valLname = $_POST["lname"];    
    $patternName = "/[A-Z,a-z]/";
    if (preg_match($patternName,$valLname))
    {
        $value = $value + 0;
    }
    else {
        echo "The Last Name should contain only alphabets.<br />";
        $value = $value + 1;
         } 
    }
    //validating email
    if (isset ($_POST["email"]) && !empty($_POST["email"])) 
    {
    $valEmail = $_POST["email"];
    $patternEmail = "/^[^@ ]+@[^@ ]+\.[^@ \.]+$/";
    
    if (preg_match($patternEmail,$valEmail))
    {
        $value = $value + 0;
    }
    else {
        echo "Please Enter a valid Email.<br />";
        $value = $value + 1;
         } 
    }
    else 
    {
    echo "Please enter your E-mail.<br />"; 
    $value = $value + 1;
    }
    
    //Validating City
    if (isset ($_POST["city"]) && !empty($_POST["city"]))
    {
    $valCity = $_POST["city"];    
    $patternName = "/[A-Z,a-z]/";
    if (preg_match($patternName,$valCity))
    {
        $value = $value + 0;
    }
    else {
        echo "City should contain only alphabets.<br />";
        $value = $value + 1;
         } 
    }
    //Validating Province
    if (isset ($_POST["prov"]) && !empty($_POST["prov"]))
    {
    $valProv = $_POST["prov"];    
    $patternName = "/[A-Z,a-z]/";
    if (preg_match($patternName,$valProv))
    {
        $value = $value + 0;
    }
    else {
        echo "Province should contain only alphabets.<br />";
        $value = $value + 1;
         } 
    }
    //Validating Address
    if (isset ($_POST["addr"]) && empty($_POST["addr"]))
    {
        echo("Please Enter an Address");
        $value = $value + 1;
    }
    //Validating question1
    if (isset ($_POST["ques1"]) && empty($_POST["ques1"]) && isset ($_POST["ques2"]) && empty($_POST["ques2"]) && 
            isset ($_POST["ans1"]) && empty($_POST["ans1"]) && isset ($_POST["ans2"]) && empty($_POST["ans2"]))
    {
        echo("Please Complete the Security Questions");
        $value = $value + 1;
    }    
    //Validating phone no
        
    if (isset ($_POST["phone"]) && !empty($_POST["phone"])) 
    {
    $valPhone = $_POST["phone"];
    $patternPhone = "(^\(?\d{3}\)?(\s|-)\d{3}-\d{4}$)";
    
    if (preg_match($patternPhone,$valPhone))
    {
        $value = $value + 0;
    }
    else {
        echo "Please Enter a valid Phone NO.<br />";
        $value = $value + 1;
         } 
    }
    else 
    {
    echo "Please enter your Phone No.<br />"; 
    $value = $value + 1;
    }
    
    //Validating Postal code
    
    if (isset ($_POST["zip"]) && !empty($_POST["zip"])) 
    {
    $valPcode = $_POST["zip"];    
    $patternPcode = "/^[ABCEGHJKLMNPRSTVXYabceghjklmnprstvxy]{1}\d{1}[A-Z,a-z]{1} *\d{1}[A-Z,a-z]{1}\d{1}$/";
    
    if (preg_match($patternPcode,$valPcode))
    {
        $value = $value + 0;
    }
    else {
        echo "Please Enter a valid Postal Code.<br />";
        $value = $value + 1;
         } 
    }
    else 
    {
    echo "Please enter Postal Code.<br />"; 
    $value = $value + 1;
    }
    
    // image upload
    
    if(isset($_FILES['image']))
    {
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];   
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        $extensions = array("jpeg","jpg","png"); 		
        if(in_array($file_ext,$extensions )=== false)
            {

            }
        if($file_size > 2097152){
            $value=$value+1;
        }				
        if(empty($errors)==true)
            {
                $t=time();
                $filename = $folder. $t . $file_name;
                $folder="/home/johnland/public_html/thefatehstudio.com/watermelon/uploads/";
                move_uploaded_file($file_tmp,"/home/johnland/public_html/thefatehstudio.com/watermelon/uploads/".$filename);
                $value=$value+0;
        }
    }
    //  
        
        if($value==0)
        {
            $sql = "UPDATE tblUsrPro SET `fname` =?, `lname`=?, `email`=?, `phone`=?, `city`=?, `prov`=?, `addr`=?, 
                `zip`=?,`img`=?,`ques1`=?,`ans1`=?,`ques2`=?,`ans2`=? WHERE uid=?";
            $query = $db->prepare($sql);        
            $query->execute(array($fname,$lname,$email,$phone,$city,$prov,$addr,$zip,$filename,$ques1,$ans1,$ques2,$ans2,$uid));

            if ($query) 
            {
                
                header('location:useraccount.php');
                
            } 
            else 
            {
                //Query failed.
                $errorcode = $sql->errorCode();
                echo $errorcode;
            }    
        }
        else{
            echo "<br />There were Errors On the Page,Please Try Again";
        } 
    }
?>
<?php include("footer.php");?>
<? ob_flush(); ?>