<?php
    $dsn = 'mysql:host=localhost;dbname=johnland_watermelon';
    $username = 'johnland_gary';
    $password = 'bl4c<p3rl';

    try 
    {
        $db = new PDO($dsn, $username, $password);
    }
    catch (PDOException $e) 
    {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>