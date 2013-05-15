<?php include("header.php");
require_once("faqService.php");
//require_once("service/faqService.php");

?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    
  				<?php 
                                $objFaqService = new faqService();
                                $faqCategoryArr = $objFaqService->selectCategory();
                
                                foreach($faqCategoryArr as $objCategory)
                                {
                                ?>
                                    <p> <?php echo $objCategory->getCategoryTitle(); ?></p>
                                    <p> <?php echo $objCategory->getCategoryDescription(); ?></p>
                                    <a href="<?php echo $objCategory->getCategoryLink()?>"><?php echo $objCategory->getCategoryArticle();?></a> 
                                    <hr />
                                    
                                <?php
                                }// for loop for displaying faq ends
                                ?>
                    </div>
    </div>
    
    
</div>
<?php include("footer.php")?>