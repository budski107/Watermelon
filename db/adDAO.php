<?php
require_once 'database.php';
require_once '../model/ad.php';
//require_once 'model/ad.php';
class adDAO
{
   //private $adObj = new ad();
    public function getAdByUser($userId)
   {
       
       $dbObj = new database();
       $con = $dbObj->getConnection();
       
       $query = "select ad.ad_id, ad.ad_title, ad.ad_category_id, cat.ad_category, 
                 ad.ad_image,ad.ad_description, ad.ad_price, 
                 ad.ad_city, usr.uid, ad.search_tags,
                 ad.ad_flag, ad.ad_addr, ad.ad_province_id, prov.province, ad.ad_zip
                 from tbl_advertisement ad, tbl_ad_category cat, tbl_provinces prov, tblUsrPro usr
                 where ad.user_prof_id =".$userId." 
                     and cat.ad_category_id = ad.ad_category_id 
                     and usr.uid=ad.user_prof_id
                     and prov.id = ad.ad_province_id
                     order by ad_id";
       $ads = $con->query($query);
       
       return $ads;
   }
   
   public function getAllAdCat()
   {
       $dbObj= new database();
       $con = $dbObj->getConnection();
       $query = "select * from tbl_ad_category order by ad_category_id";
       $categories = $con->query($query);
       return $categories;
   }
   
   public function getAllProvince()
   {
       $dbObj= new database();
       $con = $dbObj->getConnection();
       $query = "select * from tbl_provinces order by id";
       $provinces = $con->query($query);
       return $provinces;
   }
   
   public function insertAd($adObj)
   {
       $adTitle = $adObj->getAdTitle();
       $adCategory = $adObj->getAdCategory();
       $adImage = $adObj->getAdImage();
       $adDescription = $adObj->getAdDescription();
       $adStartDate = $adObj->getAdStartDate();
       $adEndDate = $adObj->getAdEndDate();
       $adPrice = $adObj->getAdPrice();
       $adCity = $adObj->getCity();
       $adUserProfId = $adObj->getUserProfId();
       $adSearchTags = $adObj->getSearchTags();
       $adSpamFlag = $adObj->getAdFlag();
       $adAddress = $adObj->getAddress();
       $adProv = $adObj->getProv();
       $adZip = $adObj->getZip();
    //   $flag = 0;
       //$adObj = new ad();
       //$adObj = $adv;
       $dbObj= new database();
       $conn = $dbObj->getConnection();
       $query = "INSERT INTO tbl_advertisement
              (ad_title, ad_category_id, ad_image, 
              ad_description, ad_start_date, ad_end_date, 
              ad_price, ad_city, user_prof_id, 
              search_tags, ad_flag, ad_addr, 
              ad_province_id, ad_zip)
              VALUES
              ('$adTitle',$adCategory,'$adImage',
               '$adDescription','$adStartDate','$adEndDate',
               $adPrice,'$adCity' ,$adUserProfId,
               '$adSearchTags',$adSpamFlag, '$adAddress', 
               '$adProv', '$adZip')";
       /* echo 'Title '.$adObj->getAdTitle();
        echo '<br/>Category '.$adObj->getAdCategory();
        echo '<br/>Description '.$adObj->getAdDescription();
        echo '<br/>Start Date '.$adObj->getAdStartDate();
        echo '<br/>End Date '.$adObj->getAdEndDate();
        echo '<br/> Image '.$adObj->getAdImage();
        echo '<br/>Price '.$adObj->getAdPrice();
        echo '<br/>City '.$adObj->getCity();
        echo '<br/>Spam?'.$adObj->getAdFlag();
        echo '<br/>Street Address '.$adObj->getAddress();
        echo '<br/>Zip '.$adObj->getZip();
        echo '<br/>UserProfId '.$adObj->getUserProfId();
        echo '<br/>Province '.$adObj->getProv();
        echo '<br/>Search Tag '.$adObj->getSearchTags();*/
        $rowCount = $conn->exec($query);
        return $rowCount; 
   }
    

    public function displayAD($)
}
/*require_once 'adReceive.php';
function insertAd($ad)
{
    $dbObj = new database();
    $conn = $dbObj->getConnection();
    $query = "INSERT INTO tbl_advertisement
              (ad_title, ad_category, ad_image, ad_description, ad_start_date, ad_end_date, ad_price, ad_full_address, ad_zip, user_prof_id, product_id, search_tags, ad_class,ad_flag)
              VALUES
              ('$ad->getAdTitle()','$ad->getAdCategory()','$ad->getAdDescription()',
               '$ad->getAdStartDate()','$ad->getAdEndDate()','$ad->getAdPrice()',
               '$ad->getAddress()','$ad->getZip()','$ad->getUserProfId()',
               '$ad->getProductId()','$ad->getSearchTags()','$ad->getAdClass()',
               '$ad->getAdFlag()')";
        
    $conn->exec($query);
}*/
?>
