<?php include("header.php");
 require_once ("faqService.php");
?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    

                <?php 
                $ManageAccArr = array();
                {
                    $category_id = 4;
                    $objFaqService = new faqService();
                    $ManageAccArr = $objFaqService->selectFaqByCategory($category_id);
                }
                
		//Using PDO for select statement 
                //$query = $db -> prepare("SELECT * FROM faq WHERE category_id = 4");
                //$query -> execute();
                //$row = $query ->fetchALL();
				 	
		foreach($ManageAccArr as $objFaq)
		{
                ?>
                    <p><?php echo $objFaq->gettitle(); ?></p>
                    <p><?php echo $objFaq->getfaq_content(); ?></p>
                <?php
		}
		?>
                    
    </div>
    
    
</div>
<?php include("footer.php")?>