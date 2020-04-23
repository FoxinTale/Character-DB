<!DOCTYPE html>
<html>
    <head>    
        <title>Logout</title>
        <meta charset="utf-8">
    </head>   
    <body>
        <?php
        session_start();
        unset($_SESSION['username']);
        header('Location: index.php');
        ?>   
    </body>
</html>


