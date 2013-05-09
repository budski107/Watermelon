<?php include("header.php")?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    <!--<div id="accordion">-->
				
       <a href="faq_admin.php"><input type="button" value="Back to FAQ main section" /></a>
            
            <?php 
// retrieving the ID from url            
                include("conn.php");
                $id = $_GET['category_id'];
                //echo "<h1>" . $id . "</h1>";
                $sql = ("SELECT * FROM category WHERE category_id=:category_id");                
                $query = $db->prepare($sql);
                $query -> execute(array(':category_id'=>$category_id));
                $row = $query ->fetch(); 
            ?>
                <form name="update" method="post" action="faq_admin_update.php">
                <table>
                    <tr>
                        <td><input type="hidden" name="category_id" value='<?php $row["category_id"] ?>'/></td>
                    </tr>
                    <tr>
                        <td>Article Category</td>
                        <td><input type="text" name="category_title" required palceholder="Enter Category" value='<?php $row["category_title"] ?>' autofocus /></td>
                    </tr>
                    
                    <tr>
                        <td>Categroy Description</td>
                        <td><textarea name="category_description" rows="5" cols="50" required palceholder="Enter Category Description" value='<?php $row["category_description"] ?>'></textarea></td>
                    </tr>
                    
                     <tr>
                        <td>Link to Category Page</td>
                        <td><input type="text" name="category_link" required palceholder="Enter Link to Category Page" value='<?php $row["category_link"] ?>'/></td>
                    </tr>
                    
                     <tr>
                        <td>Link to Article Category Text</td>
                        <td><input type="text" name="category_article" required placeholder="Enter Article Category Link name" value='<?php $row["category_article"] ?>' /></td>
                    </tr>
                                        
                    <tr>
                        <td><input type="submit" value="Update Existing Category" name="upd" /></td>
                        <td><a href="faq_admin_update.php"><input type="button" value="Cancel" name="cancel" /></a></td>
                    </tr>
                </table>
            </form>
			        	
    </div>
    
</div>
<?php include("footer.php")?>




<?php 
    if(isset($_POST['upd']))
    {        
        $category_id=$_POST['category_id'];
        $category_title=$_POST['category_title'];
        $category_description=$_POST['category_description'];
        $category_link=$_POST['category_link'];
		$category_article=$_POST['category_article'];
        $sql = "UPDATE category SET category_title=:category_title, category_description=:category_description, category_link=:category_link, category_article=:category_article WHERE category_id=:category_id";
        $query = $db->prepare($sql);
        $query -> execute(array(':category_title'=>$category_title, ':category_description'=>$category_description, ':category_link'=>$category_link, ':category_article'=>$category_article, ':category_id'=>$category_id));
		
        if ($query->execute()) {               
            header("location:index.php");
        } 
        else 
        {
            // Query failed.
            $errorcode = $query->errorCode();
            echo $errorcode;
        }        
    }    
?>