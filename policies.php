<?php include("header.php");
 require_once ("faqService.php");
?>

<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    

                <?php 
                $policyArr = array();
                {
                    $category_id = 3;
                    $objFaqService = new faqService();
                    $policyArr = $objFaqService->selectFaqByCategory($category_id);
                }
                
		//Using PDO for select statement 
                //$query = $db -> prepare("SELECT * FROM faq WHERE category_id = 3");
                //$query -> execute();
                //$row = $query ->fetchALL();
				 	
                    foreach($policyArr as $objFaq)
                        {
                        ?>
                            <p><?php echo $objFaq->getTitle(); ?></p>
                            <p><?php echo $objFaq->getfaq_content(); ?></p>
                        <?php
			}
			?>
                    
    </div>
    
    
</div>
<?php include("footer.php")?>