<?php
require_once 'database.php';
require_once 'model/registerClass.php';
class registerDAO
{
    function registerUser($regUserObj)
   {
       $fname = $regUserObj->getFname();
       $lname = $regUserObj->getLname();
       $email = $regUserObj->getEmail();
       $pwd = $regUserObj->getPwd();
       $phone = $regUserObj->getPhone();
       $city = $regUserObj->getCity();
       $prov = $regUserObj->getProv();
       $addr = $regUserObj->getAddr();
       $zip = $regUserObj->getZip();
       $img = $regUserObj->getImg();
       $ques1 = $regUserObj->getQues1();
       $ans1 = $regUserObj->getAns1();
       $ques2 = $regUserObj->getQues2();
       $ans2 = $regUserObj->getAns2();
                   
       $dbObj= new database();
       $conn = $dbObj->getConnection();
       $sql = "INSERT INTO tblUsrPro (fname, lname, email, pwd, phone, city, prov, addr, zip,img, ques1,ans1, ques2, ans2)
                    VALUES(:fname,:lname,:email,:pwd,:phone,:city,:prov,:addr,:zip,:img,:ques1,:ans1,:ques2,:ans2)";
       $query = $conn->prepare($sql);        
       $query->execute(array(':fname'=>$fname,':lname'=>$lname,':email'=>$email,':pwd'=>$pwd,':phone'=>$phone,':city'=>$city,':prov'=>$prov, ':addr'=>$addr,':zip'=>$zip,':img'=>$img,':ques1'=>$ques1,':ans1'=>$ans1,':ques2'=>$ques2,':ans2'=>$ans2));
       return $query; 
   }
}
?>