<?php include("header.php")?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    <div id="accordion">

  				<?php 
                include("conn.php");
					//Using PDO for select statement 
                $query = $db -> prepare("SELECT * FROM faq WHERE category_id = 3");
                $query -> execute();
                $row = $query ->fetchALL();
				 	
					foreach($row as $res)
					{
					 echo "<p>" . $res['title'] . "</p>";
					 echo "<p>" . $res['faq_content'] . "</p>";
					}
					
					
					
    				?>
                    </div>
    </div>
    
    
</div>
<?php include("footer.php")?>