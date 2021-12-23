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
            unset($_SESSION['validUser']);
            unset($_SESSION['user_ID']);
            unset($_SESSION['isAdmin']);
            header('Location: home.php');
            session_destroy();
        ?>   
    </body>
</html>


