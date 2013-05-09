<? ob_start(); ?>
<?php
session_start(); 
include("header.php");
include('conn.php')
?>
<fieldset style="margin:20px;font-family: arial;font-size: 14pt;">
           <legend style="font-weight:900">Login</legend><br />  
               <form action="login.php" method="post" name="usrlogin" id="usrlogin">
                   <table style="margin:20px;line-height: 2">
                       <tr>
                           <td>Email</td>
                           <td><input type="text"id="email" name="email" placeholder="Enter Email"/> </td><td>
                       </tr>
                       <tr>
                           <td>Password&nbsp;&nbsp;&nbsp;&nbsp;</td>
                           <td><input type="password" id="pwd" name="pwd" placeholder="Enter Password"  /></td><td>
                       <tr>
                           <td><a href="passwordrecovery.php">Forgot Password ??</a></td>
                       </tr>
                       <tr>
                           <td colspan="3"><input type="submit" value="SUBMIT" name="login" style="margin-left:100px;" /></td>
                       </tr>
                   </table>
               </form>
</fieldset>

<?php
if(isset($_POST['login'])&& !empty($_POST['email']) && !empty($_POST['pwd']))
    {
        $email=$_POST['email'];
        //Encryption
        $pwd=md5($_POST['pwd']);   
        $status = "user";
        require_once ('conn.php');       
        $sql = "SELECT * FROM tblUsrPro WHERE email=? AND pwd =? AND status=?";
        $query = $db->prepare($sql);        
        $query->bindParam(1, $email);
        $query->bindParam(2, $pwd);
        $query->bindParam(3, $status);
        $query->execute();
        $row = $query->fetch();
        if ($query->rowCount() > 0)
        {
            $uid = $row['uid'];
           // echo $uid;
            $_SESSION['userlogin']=$email; 
            $_SESSION['userId'] = $uid;
            header("location:useraccount.php");
        }
        else
        {
            //echo "fail";
            echo "Incorrect Login Credentials, Please try again ";
        }
    
               //                   
               //
               //Query failed.
               //
    
   }
?>
<?php include("footer.php")?>
<? ob_flush(); ?>