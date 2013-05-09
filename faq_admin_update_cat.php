<?php include("header.php")?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    <!--<div id="accordion">-->
				
       <a href="faq_admin_cat.php"><input type="button" value="Back to Category Admin Section" /></a>
            <?php
			
			include("conn.php");
			
			
            	$category_id = $_GET['category_id'];
                $sql = ("SELECT * FROM category WHERE category_id=:category_id");                
                $query = $db->prepare($sql);
                $query -> execute(array(':category_id'=>$category_id));
                $res = $query ->fetch();           
            
            
                echo'<form name="update_category" method="post" action="faq_admin_update_cat.php">';
                
                
                echo"<table>
                    <tr>
                        <td><input type='hidden' name='category_id' value='" . $res['category_id'] . "'/></td>
                    </tr>
                    <tr>
                        <td>Category Title: </td>
                        <td><input type='text' name='category_title' value='" . $res['category_title'] . "' /></td>
                    </tr>
                    
                    <tr>
                        <td>Category Description: </td>
                        <td><input type='text' name='category_description' value='" . $res['category_description'] . "'/></td>
                    </tr>
                    
                     <tr>
                        <td>Category link: </td>
                        <td><input type='text' name='category_link' value='" . $res['category_link'] . "'/></td>
                    </tr>
                    <tr>
                        <td>Category link link text: </td>
                        <td><input type='text' name='category_article' value='" . $res['category_article'] . "'/></td>
                    </tr>
                            
                    <tr>
                        <td><input type='submit' value='Update Category' name='upd' id='upd' /></td>
                        <td><a href='faq_admin_cat.php'><input type='button' value='Cancel' name='cancel' /></a></td>
                    </tr>
                </table>
            </form>";
			  ?>      	
    </div>
    
</div>
<?php include("footer.php")?>


<?php   
	  /*if(isset($_POST['ins']))
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
        	  
    	} */      
	  
//--------------------------------------------------------------
	     
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
	}
	
	$db = null;
?>