<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Character Database</title>
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>
        <h1>The Character Database</h1>
        <section>
            <p>You don't actually have to create an account or login.</p>
            <p>Some PHP is present, and this notice will be removed shortly.</p>
            <p>Currently, you can just hit "Log in". Verification is not functional yet.</p>
            <p>You can create new items and weapons, but not new characters. It's complicated currently.</p>
            <p>Yet.</p>
        </section>
        <div id="forms">
            <form id="login" class = "align" method="post" action="main.php">
                <label for="username">Username: </label>
                <input type="text" id="username" name="user_name"><span class = "error"></span>
                <input type="hidden" id="user_name" value="">
                <br>

                <label for="pass">Password: </label>
                <input type="password" id="pass" name="password"><span class = "error"></span>
                <input type="hidden" id="password" value="">
                <br>
                <input type="submit" id="login_button" value="Log-in">    

            </form>
            <form id="new_profile" class ="align" action="newprofile.php">
                <input type="submit" class="button" id="new_button" value="New Profile">    
            </form>
        </div>
    </body>
</html>
