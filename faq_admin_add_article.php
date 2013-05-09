<?php include("header.php")?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    <!--<div id="accordion">-->
				
       <a href="faq_admin.php"><input type="button" value="Back to FAQ main section" /></a>
            
                <form name="add_article" method="post" action="faq_admin_add_article.php">
                <table>
                    <tr>
                        <td><input type="hidden" name="faq_id"/></td>
                    </tr>
                    <tr>
                        <td>Article Title</td>
                        <td><input type="text" name="title" autofocus /></td>
                    </tr>
                    
                    <tr>
                        <td>Article Contents</td>
                        <td><textarea name="faq_content" rows="5" cols="50"></textarea></td>
                    </tr>
                    
                     <tr>
                        <td>Category ID</td>
                        <td><input type="text" name="category_id"/></td>
                    </tr>
                    
                            
                    <tr>
                        <td><input type="submit" value="Create new Article" name="ins" /></td>
                        <td><a href="faq_admin_add_article.php"><input type="button" value="Cancel" name="cancel" /></a></td>
                    </tr>
                </table>
            </form>
			        	
    </div>
    
</div>
<?php include("footer.php")?>


<?php 
//getting category Data
    /*  $faq_id=$_POST['faq_id'];
        $title=$_POST['title'];
		$faq_content=$_POST['faq_content'];
        $category_id=$_POST['category_id'];
        
 
 
 
require_once('database.php');
    $query = "INSERT INTO faq
                 (faq_id, title, faq_content, category_id)
              VALUES
                 ('$faq_id','$title', '$faq_content', '$category_id')";
    $db->exec($query); */
      
	  
	  //------------------------------------------------------------------------------
	  
	  if(isset($_POST['ins']))
    	{   
        //getting values from the form and storing them in variables
        $faq_id=$_POST['faq_id'];
        $title=$_POST['title'];
        $faq_content=$_POST['faq_content'];
        $category_id=$_POST['category_id'];
        require_once('database.php');
        //using PDO for insert operation
        $sql = ("INSERT INTO faq(`faq_id`,`title`, `faq_content`, `category_id`) VALUES (?,?,?,?)");                
        $query = $db->prepare($sql);
        //binding the variables. using question marks instead of ':' is considered more secured.
        $query -> execute(array($faq_id,$title,$faq_content,$category_id));//executing the query
        
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

