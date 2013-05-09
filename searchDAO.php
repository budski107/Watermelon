<?php
require_once 'database.php';
class searchDAO {
     public static function searchAd($searchTerm)
    {
       $dbObj = new database();
       $con = $dbObj->getConnection();
      
       $sql="SELECT tbl_advertisement.ad_id, tbl_advertisement.ad_title, 
             tbl_advertisement.ad_image, tbl_advertisement.ad_price, 
             tbl_ad_category.ad_category 
             FROM tbl_ad_category INNER JOIN tbl_advertisement
             ON tbl_ad_category.ad_category_id = tbl_advertisement.ad_category_id 
             WHERE ad_title LIKE '%" . $searchTerm . "%' 
             OR ad_category LIKE '%".$searchTerm."%' ";
             //test comments  
       $rows = $con->query($sql);
       return $rows;
    }
}

?>
