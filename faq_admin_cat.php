<?php include("header.php")?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    <!--<div id="accordion">-->
				
       <a href="faq_admin_add_cat.php"><input type="button" value="Insert A New Category" /></a>
       <!--<a href="faq_admin_add_article.php"><input type="button" value="Insert A New Article" /></a>-->     
                <?php 
                include("conn.php");
		
				// Get all categories
    			$query = 'SELECT * FROM category
              	ORDER BY category_id';
    			$categories = $db->query($query);
				
				
				
//Using PDO for select statement 
                $query = $db -> prepare("SELECT * FROM category ORDER BY category_id");
                $query -> execute();
                $row = $query ->fetchAll();
				
				?>
               
                
                <!--<form name="cat" method="post" action="faq_admin_cat.php">
					<select name="catlist">
					<?php // foreach ($categories as $category): ?>
                    <option value="<?php //echo $category['category_id']; ?>">
                        <?php // echo $category['category_title']; ?>
                    </option>
                	<?php //endforeach; ?>
					</select>
                    <input type="hidden" name="aa" id="aa" value="1" />
                	<input type="submit" value="Submit" />
                </form>-->
				<?php
				
				
			  //SELECT * FROM products
              //WHERE categoryID = $category_id
              //ORDER BY productID
				
//Using PDO for select statement 
                //$query = $db -> prepare("SELECT * FROM faq WHERE category_id ='$category_id' ORDER BY faq_id");
                //$query -> execute();
                //$row = $query ->fetchAll();
                echo "<table>
                      <tr>
                     
                      <th class='datahead'>Category Title</th>
                      <th class='datahead'>Category Description</th>
                      <th class='datahead'>Category Link</th>
					  <th class='datahead'>Category Article</th>
					  <th class='datahead'>Options</th>
                      </tr>";
                	foreach($row as $res)
					{
                    echo "<tr>";
                    //echo "<td class='datacell'>" . $res['faq_id']  . "</td>";
                    echo "<td class='datacell'>" . $res['category_title']  . "</td>";
                    //echo "<td class='datacell'>" . $res['title']  . "</td>";
                    echo "<td class='datacell'>" . $res['category_description']  . "</td>";
                  	echo "<td class='datacell'>" . $res['category_link']  . "</td>";
					echo "<td class='datacell'>" . $res['category_article']  . "</td>";
                    echo "<td class='datacell'><a href='faq_admin_update_cat.php?category_id=" . $res['category_id'] . "'>" ."<input type='button' value='Update' name='upd' id='upd'/></a>
                        <a href='faq_admin_delete_cat.php?category_id=" . $res['category_id'] . "'>" ."<input type='button' value='Delete' name='del' id='del' /></a></td>";
                    echo "</tr>";
					}
                echo"</table>";
            ?>         
              	
    </div>
    
</div>
<?php include("footer.php")?>