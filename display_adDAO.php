<?php
//require_once 'model/ad.php';
require_once 'database.php';

class display_adDAO {

   public function getDisplayAd($ad_id){

        $dbObj = new database();
        $con = $dbObj->getConnection();

        $sql = ("SELECT adv.ad_id, adv.ad_title, adv.ad_category_id, 
                cat.ad_category, adv.ad_image, adv.ad_description, 
                adv.ad_price, adv.ad_city, adv.ad_addr, 
                adv.ad_province_id , adv.ad_zip, prov.province
                    FROM tbl_advertisement adv, tbl_provinces prov, tbl_ad_category cat
                    where prov.id = adv.ad_province_id 
                    and adv.ad_category_id = cat.ad_category_id
                    and adv.ad_id=:ad_id");
        //$sql = ("SELECT * FROM tbl_advertisement WHERE ad_id=:ad_id");                
        $query = $con->prepare($sql);
        $query->execute(array(':ad_id'=>$ad_id));
        $res = $query->fetch(); 
        
        //echo $res['ad_title'];
        return $res;
      }
}
   ?>