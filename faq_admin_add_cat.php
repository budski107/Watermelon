<?php include("header.php")?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    <!--<div id="accordion">-->
				
       <a href="faq_admin_cat.php"><input type="button" value="Back to Category Admin Sectio" /></a>
            
                <form name="add_category" method="post" action="faq_admin_add_cat.php">
                <table>
                    <tr>
                        <td><input type="hidden" name="category_id"/></td>
                    </tr>
                    <tr>
                        <td>Article Category: </td>
                        <td><input type="text" name="category_title" autofocus /></td>
                    </tr>
                    
                    <tr>
                        <td>Categroy Description: </td>
                        <td><textarea name="category_description" rows="5" cols="50" ></textarea></td>
                    </tr>
                    
                     <tr>
                        <td>Link to Category Page: </td>
                        <td><input type="text" name="category_link" /></td>
                    </tr>
                    
                     <tr>
                        <td>Link to Article Category Text: </td>
                        <td><input type="text" name="category_article" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Create new FAQ Category" name="ins" /></td>
                        <td><a href="faq_admin_add_cat.php"><input type="button" value="Cancel" name="cancel" /></a></td>
                    </tr>
                </table>
            </form>
			        	
    </div>
    
</div>
<?php include("footer.php")?>


<?php 
/*getting category Data
        $category_id=$_POST['category_id'];
        $category_title=$_POST['category_title'];
		$category_description=$_POST['category_description'];
        $category_link=$_POST['category_link'];
        $category_article=$_POST['category_article']; 
 
 
 
require_once('database.php');
    $query = "INSERT INTO category
                 (category_title, category_description, category_link, category_article)
              VALUES
                 ('$category_title', '$category_description', '$category_link', '$category_article')";
    $db->exec($query); */






//---------------------------------------------------------------------------


if(isset($_POST['ins']))
    	{   
        //getting values from the form and storing them in variables
        $category_id=$_POST['category_id'];
        $category_title=$_POST['category_title'];
        $category_description=$_POST['category_description'];
        $category_link=$_POST['category_link'];
        $category_article=$_POST['category_article']; 
        require_once('database.php');
        //using PDO for insert operation
        $sql = ("INSERT INTO category(`category_id`,`category_title`, `category_description`, `category_link`, `category_article`) VALUES (?,?,?,?,?)");                
        $query = $db->prepare($sql);
        //binding the variables. using question marks instead of ':' is considered more secured.
        $query -> execute(array($category_id,$category_title,$category_description,$category_link,$category_article));//executing the query
        
        $db = null;
        	/*if ($query->execute()) {               
            header("location:header.php");
        	} 
        	else 
        	{
            	// Query failed.
            	$errorcode = $query->errorInfo();
            	echo $errorcode;
            	header("location:header.php");
        	}    */   

		}
         
?>