<!DOCTYPE html>
<?php
    session_start();
    include 'inc/functions.php';
    if(isset($_POST['letmein'])){
        //$userData = dataCheck($_POST);
        //print_r($userData);
        $user_name = htmlspecialchars($_POST['user_name']);
        $password = htmlspecialchars($_POST['password']);
        getuserinfo($db, $user_name, $password);
       // getuserinfo($db, $username, $password)
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/w3-min.css">
        <title>Character Database</title>
    </head>
    <body>
        <div id="forms" class="box light-purple2">
            <form id="login" class = 'container2' method="post" action="login.php">
                <input type="text" readonly id="errorbox">
                <br>
                <p>
                    <label for="username">Username: </label>
                    <input type="text" id="username" name="user_name" class='textinput'>
                </p>
                <p>
                    <label for="pass">Password: </label>
                    <input type="password" id="pass" name="password" class='textinput'>
                </p>
                <br>
                <p>
                    <label for="login_button">&nbsp;</label>
                    <input type="submit" id="login_button" class="clicky-button clicky-button-two" name='letmein' value="Log-in">
                </p>    
            </form>
         </div>
    </body>
</html>