<!DOCTYPE html>
<?php
//session_start();
// include 'inc/functions.php';

if (isset($_POST["newprofile"])) {
    if (adduser($db, $_POST["user_name"], $_POST["password"])) {
        $_SESSION['username'] = $_POST["user_name"];
        header("Location: main.php");
    }
}

if (isset($_POST["check_username"])) {
    $username = $_POST["user_name"];
    $exists = existing_username($db, $username);
    if ($exists[0] == 0) {
        echo "<script>window.onload = function() { document.getElementById('info').value = 'Username available.'}</script>";
    }

    if ($exists[0] == 1) {
        echo "<script>window.onload = function() { document.getElementById('info').value = 'Username taken.'}</script>";
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Profile</title>
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/w3-min.css">
    </head>
    <body>
        <main>
            <div class="box light-purple2">
                <p class="display-text coming">
                    Yes, another account... One may not be a fan of creating accounts, but this makes linking characters, 
                    items and weapons much easier. 
                </p>
                <p class="display-text coming">
                    Please enter a valid email, as this is how you can reset your password if you forget it one day. Your email will never be given out to anyone, 
                    as I (the developer of this) have no reason to give it out anyways.
                </p>
                <form id="new_profile" class="container2" action="" method="post">
                    <label id="firstlabel" for="username" class="login_label">Username</label>
                    <input type='text' class="textinput" id="username" value="">
                    <br>
                    <label for="pass">Password</label>               
                    <input type="text" class="textinput" id="pass" value="">
                    <br>
                    <label for='pass2'>Retype password</label>
                    <input type='text' class="textinput" id='pass2' value=''>
                    <br>
                    <label for='email'>Email</label>
                    <input type='text' class="textinput" id='email' value=''>
                    <br>
                    <label for='email2'>Confirm Email</label>
                    <input type='text' class="textinput" id='email2' value=''>
                    <br>
                    <label for="create">&nbsp;</label>
                    <input class="clicky-button" type="submit" id ="create" value="Create Account">      
                </form>
                <section id="message">
                    <h3>Password should contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </section>
            </div>
            <script type="text/javascript" src="scripts/passverify.js"></script>
            <noscript>Please enable scripts for password checking.</noscript>
        </main>
    </body>
</html>