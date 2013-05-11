<?php
require_once 'database.php';
require_once 'category.php';
class faqDAO {
        //private $categoryArr = new Array();
	
        public function getFaqByCat()
        {    
             $categoryArr = array();
             
             $dbObj= new database();
             $con = $dbObj->getConnection();
             $query = $con-> prepare("SELECT * FROM category");
             $query -> execute();
             $row = $query ->fetchAll();
             
             foreach($row as $res)
                                {
                                 $objCategory = new category($res['category_title'], $res['category_description'], $res['category_link'], $res['category_article']);
                                 $objCategory->setCategoryId($res['category_id']);
                                 $categoryArr[] = $objCategory;
                                }// for loop for displaying faq ends

             return $categoryArr;
        }
}
?>
