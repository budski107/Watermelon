<?php session_start();
/*if(isset($_SESSION['adminlogin'])){
            
  }
 else {
    header("location:index.php");            
}*/
?>
<?php include("header.php")?>
<div id="main">
    
    <div id="faq" style="border:black 2px solid">
    <!--<div id="accordion">-->				
       <a href="faq_admin_add_cat.php"><input type="button" value="Insert A New Category" /></a>
       <a href="faq_admin_add_article.php"><input type="button" value="Insert A New Article" /></a>     
                <?php 
                
                $faqArr = array();
                if($_POST['default'] ==1)
				{ 
					$category_id = 1;//$_POST['catlist'];
					$objFaqService = new faqService();
                                        $faqArr = $objFaqService->selectFaqByCategory($category_id);
				}
                
                //include("conn.php");
				
				
				/*if($_POST['default'] ==1)
				{ 
					$category_id = $_POST['catlist'];
					$query = $db -> prepare("SELECT * FROM faq WHERE category_id ='$category_id' ORDER BY faq_id");
                	$query -> execute();
                	$row2 = $query ->fetchAll();
				}
				
				
				else{
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
                $row = $query ->fetchAll();
				*/
				?>
               
                
                <form name="cat" method="post" action="faq_admin.php">
					<select name="catlist">
					<?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['category_id']; ?>">
                        <?php echo $category['category_title']; ?>
                    </option>
                	<?php endforeach; ?>
					</select>
                    <input type="hidden" name="default" id="default" value="1" />
                	<input type="submit" value="Submit" />
                </form>
       
       
       
                <table>
                      <tr>
                     
                      <th class='datahead'>Article Title</th>
                      <th class='datahead'>Article Content</th>
                      
					  <th class='datahead'>Options</th>
                      </tr>
                	<?php foreach($faqArr as $objFaq)
			{
                        ?>
                      <tr>
                        <td class='datacell'><?php echo $objFaq->getTitle(); ?></td>
                        <td class='datacell'><?php echo $objFaq->getFaq_content(); ?></td>
                  	
                        <td class='datacell'><a href='faq_admin_update_article.php?faq_id="<?php echo $objFaq->getFaq_id(); ?>"'>
                            <input type='button' value='Update' name='upd' id='upd'/></a>
                            <a href='faq_admin_delete_article.php?faq_id="<?php echo $objFaq->getFaq_id();?>"'>
                            <input type='button' value='Delete' name='del' id='del' /></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
				
				
				
		
<!--                <table>
                      <tr>
                     
                      <th class='datahead'>Article Title</th>
                      <th class='datahead'>Article Content</th>
                      
					  <th class='datahead'>Options</th>
                      </tr>
                      <?php
                	//foreach($faqArr as $objFaq)
                        //{
                         ?>
                            <tr>
                                <td class='datacell'><?php// echo $objFaq->getTitle(); ?></td>
                                <td class='datacell'><?php// echo $objFaq->getFaq_content(); ?></td>
                  	
					
                    <td class='datacell'><a href='faq_admin_update_article.php?faq_id=" . $res['faq_id'] . "'>"
                                            ."<input type='button' value='Update' name='upd' id='upd'/></a>
                        <a href='faq_admin_delete_article.php?faq_id=" . $res['faq_id'] . "'>" ."
                           <input type='button' value='Delete' name='del' id='del' /></a></td>";
                    </tr>
                    <?php
			//}
                        ?>
                </table>-->
                   
              	
    </div>
    
</div>
<?php include("footer.php")?>