<?php
require_once 'database.php';
require_once 'category.php';
require_once 'faqClass.php';
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
		
		public function getFaqByCatId($catId)
		{
                        $faqArr = array();
			$dbObj= new database();
                        $con = $dbObj->getConnection();
			$query = $con -> prepare("SELECT * FROM faq WHERE category_id ='$catId' ORDER BY faq_id");
                        $query -> execute();
                        $row = $query ->fetchAll();
			
			foreach($row as $res)
                                {
                                 $objFaq = new faq($res['title'], $res['faq_content'], $res['category_id']);
                                 $objFaq->setFaq_id($res['faq_id']);
                                 $faqArr[] = $objFaq;
                                }// for loop for displaying faq ends

                return $faqArr;		
					
		}
                
               
                
                

                                public function dumbfunction()
		{
			
			
				
				
				/*else{
				$category_id = 1;
				$category_idd = $_POST['catlist'];
				$query = $db -> prepare("SELECT * FROM faq WHERE category_id = '$category_id' ORDER BY faq_id");
                $query -> execute();
                $row2 = $query ->fetchAll();	
				}
				
				// Get all categories
    			$query = 'SELECT * FROM category
              	ORDER BY category_id';
    			$categories = $db->query($query);
				
				// Get articles for selected category
    			$query = "SELECT * FROM faq
              	WHERE category_id = $category_id
              	ORDER BY faq_id";
    			$faq = $db->query($query);
				
				//Using PDO for select statement 
                $query = $db -> prepare("SELECT * FROM category ORDER BY category_id");
                $query -> execute();
                $row = $query ->fetchAll();*/
		}
}
?>
