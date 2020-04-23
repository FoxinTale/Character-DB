<?php
//Change or add the proper information if implementing this.
    $servername = '';
    $username = '';
    $password = '';
    $dbname = '';
    
    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo $error_message;
        exit();
    }
?>
