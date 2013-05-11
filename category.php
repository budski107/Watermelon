<?php
// category means faq category
class category {
   private $category_id, $category_title, $category_description, $category_link, $category_article;
   public function __construct($nCategory_title, $nCategory_description, $nCategory_link, $nCategory_article) {
       $this->category_title=$nCategory_title;
       $this->category_description=$nCategory_description;
       $this->category_link=$nCategory_link;
       $this->category_article=$nCategory_article;
   }
   
   //setter and getter for category id
   public function setCategoryId($nCategory_id)
   {
       $this->category_id=$nCategory_id;
   }
   
   public function getCategoryId()
   {
       return $this->category_id;
       
   }
   
   //setter and getter for category title
   public function setCategoryTitle($nCategory_title)
   {
       $this->category_title=$nCategory_title;
   }
   public function getCategoryTitle()
   {
       return $this->category_title;
       
   }
    
  //setter and getter for category description

   public function setCategoryDescription($nCategory_description)
   {
       $this->category_description=$nCategory_description;
   }
   public function getCategoryDescription()
   {
       return $this->category_description;
       
   }
   
   //setter and getter for category title
   public function setCategoryLink($nCategory_link)
   {
       $this->category_link=$nCategory_link;
   }
    public function getCategoryLink()
     {
         return $this->category_link;

     }
   public function setCategoryArticle($nCategory_article)
   {
       $this->category_article=$nCategory_article;
   }
   public function getCategoryArticle()
   {
       return $this->category_article;
       
   }
   
}

?>
