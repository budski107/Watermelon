<?php include("header.php")?>
<div id="main">
    <div id="faq" style="border:#F00 1px solid">
    <!--<div id="accordion">-->

  				<?php 
                include("conn.php");
					//Using PDO for select statement 
                $query = $db -> prepare("SELECT * FROM category");
                $query -> execute();
                $row = $query ->fetchAll();
				 	
					foreach($row as $res)
					{
					 echo "<p>" . $res['category_title'] . "</p>";
					 echo "<p>" . $res['category_description'] . "</p>";
					 echo "<a href=".$res['category_link'].">".$res['category_article']."</a>"; 
					 echo "<hr />";
					}
					
					
    				?>
                    </div>
    </div>
    
    
</div>
<?php include("footer.php")?>