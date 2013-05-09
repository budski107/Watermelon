<? ob_start(); ?>
<?php session_start(); 
if(isset($_SESSION['userlogin'])){
       
  }
 else {
    header("location:index.php");            
}
include "header.php";

?>


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
    include "searchfeature.php";
?>

<div id="main">
    <h1>Welcome <?php echo $_SESSION['userlogin']?></h1>    
    
    <table class="userProfile">
        <tr>
            <td> <img src="uploads/<?php echo $img?>" width="300px" height="300px" />
            </td>
        </tr>
        <tr>            
            <td><?echo $fname ?> <?echo $lname ?></td>
        </tr>
        <tr>
            <td><?echo $email ?></td>
        </tr>
        <tr>
            <td><?echo $phone ?></td>
        </tr>
        <tr>
            <td><?echo $addr ?>, <?echo $city ?></td>
        </tr>
        <tr>            
            <td><?echo $prov ?> <?echo $zip ?></td>
        </tr>      
    </table>
    <table class="accMenu" style="margin-left: 20px;">
        <tr>
            <td style="cursor: pointer" onclick="window.location='view/postAd.php'">Post an Ad</td>
        </tr>
        <tr>
            <td style="cursor: pointer" onclick="window.location='view/viewAd.php'">View Your Adds</td>
        </tr>
        
            <tr>
                <td style="cursor: pointer" onclick="window.location='editprofile.php?uid=<?php echo urlencode(base64_encode($uid)) ?>';">Edit Profile</a></td>
            </tr>
        <tr>
            <td style="cursor: pointer" onclick="window.location='changepwd.php?uid=<?php echo urlencode(base64_encode($uid)) ?>';">Change Password</td>
        </tr>
    </table>
</div>

<?php include("footer.php");?>
<? ob_flush(); ?>