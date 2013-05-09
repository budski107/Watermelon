<? ob_start(); ?>
<?php session_start(); 
if(isset($_SESSION['userlogin'])){
       
  }
 else {
    header("location:index.php");            
}
?>
<?php include("header.php");
require_once('../model/ad.php');
require_once('../db/adDAO.php');
?>

<div id="main">
    <form name="frmPostAd" id="frmPostAd" action="postAd.php" method="post" enctype="multipart/form-data">
        <table class="table">   
            <tr>
                <td>
                    Title 
                </td>
                <td>
                    <input type="text" name="txtTitle" id="txtTitle" placeholder="Enter Title" autofocus="true" required="required"/>
                </td>
            </tr>
            <tr>
                <td>
                    Category 
                </td>
                <td>
                    <?php	
                    $adDAOObj = new adDAO();
                    
                    $categories = $adDAOObj->getAllAdCat();
                    ?>
                    <select id="ddlCategory" name="ddlCategory">
			<?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['ad_category_id']; ?>">
                                <?php echo $category['ad_category']; ?>
                            </option>
                	<?php endforeach; ?>
		   </select>
                    
                </td>
            </tr>
            <tr>
                <td>Image Upload</td>
                <td><input type="file" name="image" id="image" /></td>
            </tr>
            <tr>    
                <td>
                    Description 
                </td>
                <td>
                    <textarea id="txtDescription" name="txtDescription" rows="10" cols="50"></textarea>
                    <!--<input type="text" name="txtDescription" id="txtDescription" placeholder="Enter Description" required="required" />-->
                </td>
            </tr>
          <!--  
          
          
          <tr>    
                <td>
                    Start Date
                </td>
                <td>
                    <input type="date" name="txtStartDate" id="txtStartDate" placeholder="Enter Start Date" required />
                </td>
            </tr>
            <tr>    
                <td>
                    End Date 
                </td>
                <td>
                    <input type="date" name="txtEndDate" id="txtEndDate" placeholder="Enter End Date" required />
                </td>
            </tr> -->
            <tr>    
                <td>
                    Cost of product/service 
                </td>
                <td>
                    <input type="number" name="txtPrice" id="txtPrice" placeholder="Enter Price" required />
                </td>
            </tr>
            <tr>    
                <td>
                    City 
                </td>
                <td>
                    <input type="text" name="txtCity" id="txtCity" placeholder="Enter Ad City" required />
                </td>
            </tr>
            <tr>    
                <td>
                    Search Tags 
                </td>
                <td>
                    <textarea id="txtSearchTag" name="txtSearchTag" rows="10" cols="50"></textarea>
          
                </td>
            </tr>
            <tr>    
                <td>
                    Address 
                </td>
                <td>
                    <textarea id="txtAddr" name="txtAddr" rows="10" cols="50"></textarea>
                    <!--<input type="text" name="txtAddr" id="txtAddr" placeholder="Enter Ad Address" />-->
                </td>
            </tr>
            <tr>    
                <td>
                    Province 
                </td>
                <td>
                    <?php		
                    $adDAOObj = new adDAO();
                    $provinces = $adDAOObj->getAllProvince();
                    ?>
                    <select id="ddlProvince" name="ddlProvince">
			<?php foreach ($provinces as $province): ?>
                            <option value="<?php echo $province['id']; ?>">
                                <?php echo $province['province']; ?>
                            </option>
                	<?php endforeach; ?>
		   </select>
                    
                    
                    <!--<input type="text" name="txtProvince" id="txtProvince" placeholder="Enter Ad Province" />-->
                </td>
            </tr>
            
            <tr>    
                <td>
                    Zip Code 
                </td>
                <td>
                    <input type="text" name="txtZip" id="txtZip" placeholder="Enter ZipCode" required />
                </td>        
            </tr>
            <tr>
                <td>
                    <input type="submit" name="btnAdPost" id="btnAdPost" text="Post Ad"/> 
                </td>
                <td>
                    <input type="reset" text="Reset"/>
                </td>
            </tr>
        </table>
        <input type="hidden" id="hdnUserId" name="hdnUserId" value="<?php echo $_SESSION['userId'];?>"/>
    </form>
</div>
<?php include("footer.php")?>

 <?php
 if(isset($_POST['btnAdPost']))
 {
 $title=$_POST['txtTitle'];
 $category=$_POST['ddlCategory'];
 $description=$_POST['txtDescription'];
 //uncomment when you want start date and end date
 //$startDate = $_POST['txtStartDate'];
 //$endDate = $_POST['txtEndDate'];
 $price=$_POST['txtPrice'];
 $city=$_POST['txtCity'];
 $addr=$_POST['txtAddr'];
 $searchTag = $_POST['txtSearchTag'];
 $userProfId = $_POST['hdnUserId'];
 $prov=$_POST['ddlProvince'];
 $zip=$_POST['txtZip'];
 $spamFlag = 0;
 //Regex Pattern
 $textpattern = "/^[A-Za-z ]+$/";
 $numpattern = "/^[0-9]+$/";
 $postalcodepattern = "/^([A-Z]( )?[0-9])+$/";

 $flag = true;
 $error = "";
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
                    $flag=false;
        }
        if($file_size > 2097152){
            $flag=false;
        }				
        if(empty($errors)==true)
            {
                $t=time();
                $filename = $folder. $t . $file_name;                
                $folder="/home/johnland/public_html/thefatehstudio.com/watermelon/adimage/";
                move_uploaded_file($file_tmp,"/home/johnland/public_html/thefatehstudio.com/watermelon/adimage/".$filename);
                //$value=$value+0;
        }else
            {
                $flag=false;
            }
    }

function isNullOrEmpty($var) {
	return (!isset($var) || empty($var));
}
 //validate title
 //check if title is empty
 if (isNullOrEmpty($title)) {
	$flag = false;
	$error .= "<p>Title must not be empty.</p>";
 }
 //check whether Title contains only alphabets
 else if (!preg_match($textpattern, $title)) {
	$flag = false;
	$error .= "<p>Title must only contain alphabets.</p>";
 }
 
//validate category
if (isNullOrEmpty($category)) {
	$flag = false;
	$error .= "<p>Please select a category.</p>";
}

//check if the description is blank
if(isNullOrEmpty($description)){
    $flag=false;
    $error.="<p>Description must not be empty.</p>";
}

//check for validity of end date
/*if($startDate>$endDate)
{
    $flag=false;
    $error.="<p>End date should be a date after start date</p>";
}*/

 //check if price is empty
 if(isNullOrEmpty($price))
 {
     $flag=false;
     $error.="<p>Price cannot be left empty.</p>";
     
 }
 //check if price is non numeric
 else if(!preg_match($numpattern,$price)){
     $flag=false;
     $error.="<p>Price has to be a numeric value.</p>";    
 }
 //check if the city is left blank
 if(isNullOrEmpty($city))
 {
     $flag=false;
     $error.="<p>City cannot be left empty.</p>";    
 }
 //check whether city is a text value or not
 else if(!preg_match($textpattern,$city))
 {
    $flag=false;
    $error.="<p>City has to be a text value.</p>";
 }
 
 // check if address field is empty
 if(isNullOrEmpty($addr))
 {
     $flag=false;
     $error.="<p>Street address cannot be left empty.</p>";    
 }
 /* Validation for search Tag
 // check if address field is empty
 if(isNullOrEmpty($searchTag))
 {
     $flag=false;
     $error.="<p>Search Tag cannot be left empty.</p>";    
 }
 */
 //validate province
if (isNullOrEmpty($prov)) {
	$flag = false;
	$error .= "<p>Please select a province.</p>";
}

 
 //check if the zip is left blank
 if(isNullOrEmpty($zip))
 {
     $flag=false;
     $error.="<p>Zip cannot be left empty.</p>";    
 }
 //check whether zip is a text value or not
 else if(!preg_match($postalcodepattern,$zip))
 {
    $flag=false;
    $error.="<p>Zip has to be of format: A9B 4C5.</p>";
 }
 
 if ($flag) {
        $uid = $_SESSION['userId'];
        $userProfId = $uid;
        //$userProfId = "get from session";
        //$searchTag = "";
        $flag = "";
        //$fullAddress = $addr." ".$city." ".$prov;
        //$address = $addr;
        $startDate="2013-04-01";
        $endDate ="2013-05-05";
        $adObj = new ad($title, $category, $filename, $description, $startDate, $endDate, $price, $city, $userProfId, $searchTag, $spamFlag, $addr, $prov, $zip);
        $daoObj = new adDAO();
        $rowCount = $daoObj->insertAd($adObj);
        if($rowCount>0)
        {
        echo "<script>alert('The Record has been successfully added...!!');</script>";
        header('location:../useraccount.php');
        /*echo 'Title '.$adObj->getAdTitle();
        echo '<br/>Category '.$adObj->getAdCategory();
        echo '<br/>Description '.$adObj->getAdDescription();
        echo '<br/>Start Date '.$adObj->getAdStartDate();
        echo '<br/>End Date '.$adObj->getAdEndDate();
        echo '<br/>Price '.$adObj->getAdPrice();
        echo '<br/>City '.$adObj->getCity();
        echo '<br/>Spam?'.$adObj->getAdFlag();
        echo '<br/>Street Address '.$adObj->getAddress();
        echo '<br/>Zip '.$adObj->getZip();
        echo '<br/>UserProfId '.$adObj->getUserProfId();
        echo '<br/>Province '.$adObj->getProv();
        echo '<br/>Search Tag '.$adObj->getSearchTags();*/
        }
        else
        {
            
            echo 'There was problem adding data.'.$rowCount;
        }
        
        
	//echo 'Name: ' . $fullname . '<br />' . 'Age: ' . $age . '<br />' . 'Gender: ' . $gender . '<br />' . 'Address: ' . $address . '<br />' . 'Postal Code: ' . $postalcode . '<br />' . 'Province: ' . $province . '<br />' . 'Interest: <br />' . GetValues($interest);
} else {
	echo $error;
}
 }
?>
<? ob_flush(); ?>
