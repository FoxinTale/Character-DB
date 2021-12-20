<!DOCTYPE html>
<?php
//session_start();
include 'inc/functions.php';

if (isset($_POST["newprofile"])) {
    $userData = dataCheck($_POST);
    //print_r($userData);
    if (addUser($db, $userData)) {
        //$_SESSION["username"] = $userData[0];
        header('Location: login.php');
    } else {
        echo "Login has failed, somehow.";
    }
}

if (isset($_POST["check_username"])) {
    $exists = existing_username($db, $_POST["username"]);
    if ($exists[0] == 0) {
        echo "<script>window.onload = function() { document.getElementById('infobox').value = 'Username available.'}</script>";
    } else {
        echo "<script>window.onload = function() { document.getElementById('infobox').value = 'Username taken.'}</script>";
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
                    <label id="firstlabel" for="user_name" class="login_label">Username</label>
                    <input type='text' class="textinput" id="user_name" name="username" value="">
                    <br>
                    <label for="pass">Password</label>               
                    <input type="password" class="textinput" id="pass" value="">
                    <br>
                    <label for='pass2'>Retype password</label>
                    <input type='password' class="textinput" id='pass2' name="password" value=''>
                    <br>
                    <label for='email'>Email</label>
                    <input type='text' class="textinput" id='email' value=''>
                    <br>
                    <label for='email2'>Confirm Email</label>
                    <input type='text' class="textinput" id='email2' name="email" value=''>
                    <br>
                    <label for="create">&nbsp;</label>
                    <input class="clicky-button" type="submit" id ="create" name="newprofile" value="Create Account">
                    <br>
                    <label for="checkname">&nbsp;</label>
                    <input type="submit" id="checkname" class="clicky-button clicky-button-two" name="check_username" value="Check Username Availability" >
                    <br>
                    <label for="infobox">&nbsp;</label>
                    <input type="text" id="infobox" readonly value=''>

                </form>
                <section id="message">
                    <h3>Password should contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>6 characters</b></p>
                </section>
            </div>
            <script type="text/javascript">
                var passin = document.getElementById("pass");
                var letter = document.getElementById("letter");
                var capital = document.getElementById("capital");
                var number = document.getElementById("number");
                var length = document.getElementById("length");

                var email = document.getElementById("email");
                var emailin = document.getElementById("email2");

                var passin2 = document.getElementById("pass2");


                emailin.onkeyup = function () {
                    var emailOne = email.value;
                    var emailTwo = emailin.value;
                    var infobox = document.getElementById('infobox');

                    if (emailOne === emailTwo) {
                        infobox.value = "";
                    } else {
                        infobox.value = "Emails are not equal";
                    }
                }

                passin2.onkeyup = function () {
                    var passOne = passin.value;
                    var passTwo = passin2.value;
                    var infobox = document.getElementById('infobox');

                    if (passOne === passTwo) {
                        infobox.value = "";
                    } else {
                        infobox.value = "Passwords are not equal";
                    }
                }

                passin.onkeyup = function () {
                    var lowerCaseLetters = /[a-z]/g;
                    if (passin.value.match(lowerCaseLetters)) {
                        letter.classList.remove("invalid");
                        letter.classList.add("valid");
                    } else {
                        letter.classList.remove("valid");
                        letter.classList.add("invalid");
                    }

                    var upperCaseLetters = /[A-Z]/g;
                    if (passin.value.match(upperCaseLetters)) {
                        capital.classList.remove("invalid");
                        capital.classList.add("valid");
                    } else {
                        capital.classList.remove("valid");
                        capital.classList.add("invalid");
                    }

                    var numbers = /[0-9]/g;
                    if (passin.value.match(numbers)) {
                        number.classList.remove("invalid");
                        number.classList.add("valid");
                    } else {
                        number.classList.remove("valid");
                        number.classList.add("invalid");
                    }

                    if (passin.value.length >= 6) {
                        length.classList.remove("invalid");
                        length.classList.add("valid");
                    } else {
                        length.classList.remove("valid");
                        length.classList.add("invalid");
                    }
                }
            </script>
            <noscript>Please enable scripts for password checking.</noscript>
        </main>
    </body>
</html>