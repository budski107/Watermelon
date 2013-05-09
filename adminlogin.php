<? ob_start(); ?>
<?php
session_start(); 
include("header.php");
include('conn.php')
?>
<fieldset style="margin:20px;font-family: arial;font-size: 14pt;">
           <legend style="font-weight:900">Admin Login</legend>  
               <form action="adminlogin.php" method="post" name="adminlogin" id="adminlogin">
                   <table style="margin:20px;line-height: 2">
<!--       
Decide if it has to be here ??
                       <tr>
                           <td>Role</td>
                           <td><select id="role" name="role"><option value="" selected="selected">Select</option><option value="admin">Admin</option></select></td><td><div id="erole" style="color: red;display:none;font-size: 11pt">Enter Role</div></td>
                       </tr>-->
                       <tr>
                           <td>Email</td>
                           <td><input type="text" id="email" name="email" placeholder="Enter Email" </td>
                       </tr>
                       <tr>
                           <td>Password&nbsp;&nbsp;&nbsp;&nbsp;</td>
                           <td><input type="password" id="pwd" name="pwd" placeholder="Enter Password" /></td></tr>
                       <tr>
                           <td colspan="3"><input type="submit" value="SUBMIT" name="login" style="margin-left:100px;" /></td></tr>
                   </table>
               </form>
</fieldset>

<?php
if(isset($_POST['login'])&& !empty($_POST['email']) && !empty($_POST['pwd']))
    {
        //$r=$_POST['role'];
        $email=$_POST['email'];
        //Encryption
        $status = "admin";
        $pwd=md5($_POST['pwd']);       
        $sql = "SELECT * FROM tblUsrPro WHERE email=? AND pwd =? AND status=?";
        $query = $db->prepare($sql);        
        $query->bindParam(1, $email);
        $query->bindParam(2, $pwd);
        $query->bindParam(3, $status);
        $query->execute();
        if ($query->rowCount() > 0)
        {
            //echo "success";
            $_SESSION['adminlogin']=$email; 
            header("location:adminaccount.php");
        }
        else
        {
            //echo "fail";
            echo "Incorrect Login Credentials, Please try again ";
        }
    }
?>
<?php include("footer.php")?>
<? ob_flush(); ?>