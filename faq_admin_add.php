<?php include("header.php")?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    <!--<div id="accordion">-->
				
       <a href="faq_admin.php"><input type="button" value="Back to FAQ main section" /></a>
            
                <form name="add" method="post" action="faq_admin_add.php">
                <table>
                    <tr>
                        <td><input type="hidden" name="category_id"/></td>
                    </tr>
                    <tr>
                        <td>Article Category</td>
                        <td><input type="text" name="category_title" required palceholder="Enter Category" autofocus /></td>
                    </tr>
                    
                    <tr>
                        <td>Categroy Description</td>
                        <td><textarea name="category_description" rows="5" cols="50" required palceholder="Enter Category Description"></textarea></td>
                    </tr>
                    
                     <tr>
                        <td>Link to Category Page</td>
                        <td><input type="text" name="category_link" required palceholder="Enter Link to Category Page"/></td>
                    </tr>
                    
                     <tr>
                        <td>Link to Article Category Text</td>
                        <td><input type="text" name="category_article" required placeholder="Enter Article Category Link name" /></td>
                    </tr>
                    
                    
                    <!--faq table from here down -->
                    <!--<tr>
                        <td>Article Title</td>
                        <td><input type="text" name="title" required palceholder="Enter Article Title" /></td>
                    </tr>
                    <tr>
                        <td>Article Content</td>
                        <td><textarea name="faq_contents" rows="5" cols="50" required palceholder="Enter Article Contents"></textarea></td>
                    </tr>-->
                   
                    
                                        
                    <tr>
                        <td><input type="submit" value="Create new Article" name="ins" /></td>
                        <td><a href="faq_admin_add.php"><input type="button" value="Cancel" name="cancel" /></a></td>
                    </tr>
                </table>
            </form>
			        	
    </div>
    
</div>
<?php include("footer.php")?>


<?php 
//getting category Data
        $category_id=$_POST['category_id'];
        $category_title=$_POST['category_title'];
		$category_description=$_POST['category_description'];
        $category_link=$_POST['category_link'];
        $category_article=$_POST['category_article']; 
 
 
 
require_once('conn.php');
    $query = "INSERT INTO category
                 (category_title, category_description, category_link, category_article)
              VALUES
                 ('$category_title', '$category_description', '$category_link', '$category_article')";
    $db->exec($query); 
         
?>

