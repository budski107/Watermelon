<?php include("header.php")?>
<?php include_once("db/registerDAO.php"); ?>
<?php include_once("model/registerClass.php"); ?>
<div id="main">
    <h1>New User Registration</h1>
    <form name="usr_reg" id="usr_reg" action="register.php" method="post" enctype="multipart/form-data" >
        <table class="table" style="margin: 50px;">   
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname" id="fname" placeholder="Enter First Name" autofocus="true" required="required"/></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname" id="lname" placeholder="Enter Last Name" required /></td>
            </tr>
            <tr>    
                <td>Email</td>
                <td><input type="email" name="email" id="email" placeholder="Enter Email" required /></td>
            </tr>
            <tr>    
                <td>Password</td>
                <td><input type="password" name="pwd" id="pwd" placeholder="Enter Password" required /></td>
            </tr>
            <tr>    
                <td>Confirm</td>
                <td><input type="password" name="pwd1" id="pwd1" placeholder="Repeat Password" required /></td>
            </tr>
            <tr>    
                <td>Phone No.</td>
                <td><input type="tel" name="phone" id="phone" placeholder="111-111-1111" required /></td>
            </tr>
            <tr>    
                <td>City</td>
                <td><input type="text" name="city" id="city" placeholder="Enter Your City" required /></td>
            </tr>
            <tr>    
                <td>Province</td>
                <td><input type="text" name="prov" id="prov" placeholder="Enter Your Province" required /></td>
            </tr>
            <tr>    
                <td>Address</td>
                <td><input type="text" name="addr" id="addr" placeholder="Enter Your Address" required /></td>
            </tr>
            <tr>    
                <td>Postal Code</td>
                <td><input type="text" name="zip" id="zip" placeholder="A9A 9A9 Format" required /></td>        
            </tr>
        </table>
        <table class="table" style="margin: 50px;">
            <tr>
                <td>Photo Upload</td>
                <td><input type="file" name="image" id="image" /></td>
            </tr>
            <tr>
                <td>Question 1</td>
                <td><textarea name="ques1" placeholder="Write your own question" required></textarea></td>
            </tr>
            <tr>
                <td>Secret Answer</td>
                <td><textarea name="ans1" placeholder="Write your secret answer" required></textarea></td>
            </tr>
            <tr>
                <td>Question 2</td>
                <td><textarea name="ques2" placeholder="Write your own question" required></textarea></td>
            </tr>
            <tr>
                <td>Secret Answer</td>
                <td><textarea name="ans2" placeholder="Write your secret answer" required></textarea></td>
            </tr>
            <tr>
                <td>Captcha</td>
                <td><img src="captcha.php"></td>
            </tr>
            <tr>
                <td>Confirm Captcha</td>
                <td><input type="text" name="captcha" placeholder="Enter digits as seen above" required</td>
            </tr>
                <td>
                    <input type="submit" name="reg" id="reg" text="Register"/> 
                </td>
                <td>
                    <input type="reset" text="Reset"/>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php include("footer.php")?>




<?php
    if(isset($_POST['reg']))
    {
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
        $captcha=$_POST['captcha'];
        //Encryption
        $pwd=$_POST['pwd'];
        $pwd1=$_POST['pwd1'];
        $epwd=md5($_POST['pwd']);
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
    //Validating Password
    if (isset ($_POST["pwd"]) && isset ($_POST["pwd1"]) && empty($_POST["pwd"]) && empty($_POST["pwd1"])) 
    {
        echo "Please enter a Password.<br />"; 
        $value = $value + 1;
    }
    else if($pwd!=$pwd1)
        {
            echo "Passwords do not Match.<br />"; 
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
    $patternPcode = "/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ]( )?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/";
    
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
                    $value=$value+1;
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
        }else
            {
                $value= $value+1;
            }
    }
    //
    
    //Validating Captcha
    
    if(isset ($_POST["captcha"]) && empty($_POST["captcha"]) && ($_POST['captcha']) != $_SESSION['code']) 
        { 
            
                echo "The captcha code you entered does not match. Please try again. <br />";
        } 
    else 
        { 
                $captcha = $_POST['code'];
        }
        
        if($value==0)
        {
            $regUsrObj = new registerClass($fname , $lname, $email, $epwd, $phone, $city, $prov, $addr, $zip, $filename, $ques1, $ans1, $ques2, $ans2);
            $newRegUsrObj = new registerDAO();
            $rowCount = $newRegUsrObj->registerUser($regUsrObj);            
            if ($rowCount>0) 
            {                
                echo "success";                
            } 
            else 
            {
                echo "There was an error, Please try again...!!";
            }    
        }
        else{
            echo "<br />There were Errors On the Page,Please Try Again";
        } 
    }
?>