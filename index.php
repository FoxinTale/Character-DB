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
    </head>
    <body>
        <h1>The Character Database</h1>
        <div id="forms">
            <form id="login" class = "align" method="post" action='index.php'>
                <input type="text" readonly id="errorbox">
                <br>
                <label for="username">Username: </label>
                <input type="text" id="username" name="user_name"><span class = "error"></span>
                <br>
                <label for="pass">Password: </label>
                <input type="password" id="pass" name="password"><span class = "error"></span>
                <br>
                <input type="submit" id="login_button" name='letmein' value="Log-in">    
            </form>
            <form id="new_profile" class ="align" action="newprofile.php">
                <input type="submit" class="button" id="new_button" value="New Profile">    
            </form>
           <!--  <p class="note">Note: This site does not currently work well on mobile devices.</p> -->
            <!-- <p class="note">This was made on a 1920 x 1080 display. Things may look odd on other resolutions. I'm working on it.</p> -->
         </div>
    </body>
</html>
