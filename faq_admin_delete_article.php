<?php include("header.php")?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    <!--<div id="accordion">-->
				
       <a href="faq_admin.php"><input type="button" value="Back to FAQ main section" /></a>
            <?php
			
			include("conn.php");
			
			
            	$faq_id = $_GET['faq_id'];
                $sql = ("SELECT * FROM faq WHERE faq_id=:faq_id");                
                $query = $db->prepare($sql);
                $query -> execute(array(':faq_id'=>$faq_id));
                $res = $query ->fetch();           
            
            
                echo'<form name="delete_article" method="post" action="faq_admin_delete_article.php">';
                
                
                echo"<table>
                    <tr>
                        <td><input type='hidden' name='faq_id' value='" . $res['faq_id'] . "'/></td>
                    </tr>
                    <tr>
                        <td>Article Title</td>
                        <td><input type='text' name='title' value='" . $res['title'] . "' /></td>
                    </tr>
                    
                    <tr>
                        <td>Article Contents</td>
                        <td><input type='text' name='faq_content' value='" . $res['faq_content'] . "'/></td>
                    </tr>
                    
                     <tr>
                        <td>Category ID</td>
                        <td><input type='text' name='category_id' value='" . $res['category_id'] . "'/></td>
                    </tr>
                    
                            
                    <tr>
                        <td><input type='submit' value='Delete Article' name='del' id='del' /></td>
                        <td><a href='faq_admin.php'><input type='button' value='Cancel' name='cancel' /></a></td>
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
        $faq_id=$_POST['faq_id'];
        $sql = "DELETE FROM faq WHERE `faq_id`=:faq_id";
        $query = $db->prepare($sql);
        $query -> execute(array(':faq_id'=>$faq_id));
	}
	
	$db = null;
?>