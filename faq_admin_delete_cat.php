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
            
            
                echo'<form name="delete_article" method="post" action="faq_admin_delete_cat.php">';
                
                
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
                        <td>Category Link: </td>
                        <td><input type='text' name='category_link' value='" . $res['category_link'] . "'/></td>
                    </tr>
                    <tr>
                        <td>Category Article: </td>
                        <td><input type='text' name='category_article' value='" . $res['category_article'] . "'/></td>
                    </tr>
                            
                    <tr>
                        <td><input type='submit' value='Delete Article' name='del' id='del' /></td>
                        <td><a href='faq_admin_cat.php'><input type='button' value='Cancel' name='cancel' /></a></td>
                    </tr>
                </table>
            </form>";
			  ?>      	
    </div>
    
</div>
<?php include("footer.php")?>


<?php   
	     
	  
//--------------------------------------------------------------
	     
	if(isset($_POST['del']))
    
    {        
        $category_id=$_POST['category_id'];
        $sql = "DELETE FROM category WHERE `category_id`=:category_id";
        $query = $db->prepare($sql);
        $query -> execute(array(':category_id'=>$category_id));
	}
	
	$db = null;
?>