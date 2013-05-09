<html>
    <body>
        <?php 
        $con=mysql_connect("localhost","root","");
        if(!$con)
        {
            die("There was an Error Connecting to the Database" . mysql_error());
        }        
        ?>
    </body>    
</html>    
