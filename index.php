<!DOCTYPE html> 
<?php
session_start();
include('inc/functions.php');

if (isset($_POST["letmein"])) {
    $username = htmlspecialchars($_POST['user_name']);
    $password = htmlspecialchars($_POST['password']);
    getuserinfo($db, $username, $password);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Character Database</title>
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/w3-min.css">
    </head>
    <body>
        <h1>The Character Database</h1>
        <div id="forms">
            <form id="login" class = 'w3-container' method="post" action='index.php'>
                <input type="text" readonly id="errorbox">
                <br>
                <p><label for="username">Username: </label>
                <input type="text" id="username" name="user_name" class='w3-input'></p>
                <p><label for="pass">Password: </label>
                <input type="password" id="pass" name="password" class='w3-input'></p>
                <br>
                <input type="submit" id="login_button" name='letmein' value="Log-in">    
            </form>
                <button type='button' id="new_button" onclick="document.location = 'newprofile.php'">New Profile</button>
         </div>
    </body>
</html>
