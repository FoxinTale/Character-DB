<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Character Database</title>
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/w3-min.css">
    </head>
    <body>
        <div id="login-form" class="light-purple2">
            <form id="login" class="container" method="post" action='index.html'>
                <input type="text" readonly id="errorbox">
                <br>
                <p>
                    <label class="labeltext" for="username">Username: </label>
                    <input type="text" id="username" name="user_name" class='textinput'>
                </p>
                <p>
                    <label class="labeltext" for="pass">Password: </label>
                    <input type="password" id="pass" name="password" class='textinput'>
                </p>
                <br>
            </form>
         </div>
    </body>
</html>
