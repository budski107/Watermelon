<?php include("header.php");
require_once("faqService.php");
?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    

                <?php 
                $HelpArr = array();
                //if($_POST['default'] ==2)
                {
                    $category_id = 2;
                    $objFaqService = new faqService();
                    $HelpArr = $objFaqService->selectFaqByCategory($category_id);
                }
//                $faqArr = array();
//                if($_POST['default']==2)
//                {   
//                    $category_id = 2;
//                    $objFaqService = new faqService();
//                    $faqArr = $objFaqService->selectFaqByCategory($category_id);
//                }
                
                //$query = $db -> prepare("SELECT * FROM faq WHERE category_id = 2");
                //$query -> execute();
                //$row = $query ->fetchALL();
				 	
			foreach($HelpArr as $objFaq)
			{
                        ?>
                            <p><?php echo $objFaq->getTitle(); ?></p>
                            <p><?php echo $objFaq->getFaq_content(); ?></p>
                        <?php
			}
                        ?>
					
					
    				
                    
    </div>
    
    
</div>
<?php include("footer.php")?>