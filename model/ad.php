<?php

class ad {
    //private $ad_id, $ad_title, $ad_category, $ad_image, $ad_description, $ad_start_date, $ad_end_date, $ad_price, $ad_address, $ad_zip, $user_prof_id, $product_id, $search_tags, $ad_class, $ad_flag;
private $ad_id, $ad_title, $ad_category, $ad_image, $ad_description, $ad_start_date, $ad_end_date, $ad_price, $ad_city, $ad_prov, $ad_address, $ad_zip, $user_prof_id, $product_id, $search_tags, $ad_class, $ad_flag;    
    public function __construct($title, $category, $image, $description, $startDate, $endDate, $price, $city, $userProfId, $searchTag, $spamFlag, $addr, $prov, $zip)
    {      
        /*Start:Temporary defaults*/
        /*$image = "imagePath";
        $userProfId = "userProfId";
        $productId = "productId";
        $searchTag = "searchTag";
        $adClass = "class";
        $flag = "flag";*/
        /*End:Temporary defaults*/
        
        $this->ad_title=$title;
        $this->ad_category=$category;
        $this->ad_image=$image;
        $this->ad_description=$description;
        $this->ad_start_date=$startDate;
        $this->ad_end_date=$endDate;
        $this->ad_price=$price;
        $this->ad_city  = $city;
        $this->user_prof_id=$userProfId;
        $this->search_tags=$searchTag;
        $this->ad_flag=$spamFlag;
        $this->ad_address=$addr;
        $this->ad_prov = $prov;
        $this->ad_zip=$zip;
    }
    
    //getters and setters
    public function getAdId()
    {
        return $this->ad_id;
    }
    public function setAdId($id)
    {
        $this->ad_id=$id;
    }
    
    public function getAdTitle()
    {
        return $this->ad_title;
    }
    public function setAdTitle($title)
    {
        $this->ad_title=$title;
    }
    
    public function getAdCategory()
    {
        return $this->ad_category;
    }
    public function setAdCategory($category)
    {
        $this->ad_category=$category;
    }
    
    public function getAdImage()
    {
        return $this->ad_image;
    }
    public function setAdImage($image)
    {
        $this->ad_image=$image;
    }
    
    public function getAdDescription()
    {
        return $this->ad_description;
    }
    public function setAdDescription($description)
    {
        $this->ad_description=$description;
    }
    
    public function getAdStartDate()
    {
        return $this->ad_start_date;
    }
     public function setAdStartDate($startDate)
    {
        $this->ad_start_date=$startDate;
    }
    
    public function getAdEndDate()
    {
        return $this->ad_end_date;
    }
    public function setAdEndDate($endDate)
    {
        $this->ad_end_date=$endDate;
    }
    
    public function getAdPrice()
    {
        return $this->ad_price;
    }
    public function setAdPrice($price)
    {
        $this->ad_price=$price;
    }
    public function getCity()
    {
        return $this->ad_city;
    }
    public function setCity($nCity)
    {
        $this->ad_city=$nCity;
    }
    public function getAddress()
    {
        return $this->ad_address;
    }
    public function setAddress($address)
    {
        $this->ad_address=$address;
    }
    
    public function getZip()
    {
        return $this->ad_zip;
    }
    public function setZip($zip)
    {
        $this->ad_zip=$zip;
    }
        
    public function getProv()
    {
        return $this->ad_prov;
    }
    
    public function setProv($nAdProv)
    {
        $this->ad_prov=$nAdProv;
    }
    
    public function getSearchTags()
    {
        return $this->search_tags;
    }
    public function setSearchTags($searchTags)
    {
        $this->search_tags=$searchTags;
    }
    
    public function getUserProfId()
    {
        return $this->user_prof_id;
    }
    public function setUserProfId($nUserProfId)
    {
        $this->user_prof_id=$nUserProfId;
    }
   
    public function getAdFlag()
    {
        return $this->ad_flag;
    }
    public function setAdFlag($adFlag)
    {
        $this->ad_flag=$adFlag;
    }
}

?>
