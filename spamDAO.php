<?php
require_once 'db/database.php';

class spamDAO {
    public static function markSpam($adId)
    {
       $dbObj = new database();
       $con = $dbObj->getConnection();
      
       $query = "update tbl_advertisement set ad_flag=1 where ad_id=".$adId;
       $rowCount = $con->exec($query);
       header('location:adminaccount.php');
       //return $rowCount;
    }
    
    public static function deleteSpam($adId)
    {
       $dbObj = new database();
       $con = $dbObj->getConnection();
      
       $query = "delete from tbl_advertisement where ad_id=".$adId;
       $rowCount = $con->exec($query);
       header('location:adminaccount.php');
       //return $rowCount;
    }
    
    public static function getSpamAds()
    {
       $dbObj = new database();
       $con = $dbObj->getConnection();
      
       $query = "select * from tbl_advertisement where ad_flag=1";
       $rows = $con->query($query);
        return $rows;
    }
}

?>
