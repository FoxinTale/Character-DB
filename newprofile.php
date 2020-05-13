<!DOCTYPE html>
<?php
session_start();
include 'inc/functions.php';

if (isset($_POST["newprofile"])) {
    if (adduser($db, $_POST["user_name"], $_POST["password"])) {
        $_SESSION['username'] = $_POST["user_name"];
        header("Location: main.php");
    }
}

if(isset($_POST["check_username"])){
    $username = $_POST["user_name"];
    $exists =  existing_username($db, $username);
    if($exists[0] == 0){
        echo "<script>window.onload = function() { document.getElementById('info').value = 'Username available.'}</script>";
    }
    
    if($exists[0] == 1){
        echo "<script>window.onload = function() { document.getElementById('info').value = 'Username taken.'}</script>";
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Profile</title>
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
        <main>
            <div id="new">
                <p class="notice">Yes, another account... One may not be a fan of creating accounts, but this makes linking characters, items and weapons much easier. </p>
                <p class="notice">You can get a preview of this site by logging in with username 'Test User' and password 'Passw0rd', without the quotes.</p>
                <hr> 
                <section>
                    <form id="new_profile" class="align" action="" method="post">
                        <label id="firstlabel" for="username" class="login_label">Username</label>
                        <input type='text' required id="username" name = "user_name" value="">
                        <br>
                        <label for="pass">Password</label>               
                        <input type="password" id="pass" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])).{8,})" 
                               title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" value="">
                        <br>
                        <label for='pass2'>Retype password</label>
                        <input type='password' id='pass2' name="pass_verify" value=''>
                        <br>
                        <input type="submit" id ="create" name="newprofile" value="Create Account">      
                                      <input type="submit" name="check_username" value="Check Username Availability" 
                               id="check_button">
                    </form>        
                    <input type="text" readonly id="info"> 
                           
                    <div id="message">
                        <h3>Password should contain the following:</h3>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>
            </div>
            <script type="text/javascript" src="scripts/passverify.js"></script>
            <noscript>Please enable scripts for password checking.</noscript>
        </main>
    </body>
</html>