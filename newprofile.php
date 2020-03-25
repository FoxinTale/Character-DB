<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>New Profile</title>
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
        <main>
            <!--
            Creating a new profile.
            
            Things in "" will likely end up being actual text on the page.
          
           "This is needed, as without a profile there is not a 
            solid way to link characters to a user."
            
            Email is needed to send, well...an email if the password is ever forgotten.
            That way, it can be reset without my input, or doing it myself.
            
           "The purpose of inputting your email is so if you ever forget your password,
            you can reset it and still access your characters. It will not ever be shared."
            
            Each element has a span element afterwards for errors.
            
            Form elements:
                Username 
                Password
                Confirm Password 
                Email  
                Confirm Email 
            
            Maybe figure out how to send a confirmation Email?
           
            -->
            <div id="new">
                <p>Yes, another account... One may not be a fan of creating accounts, but this makes linking characters, items and weapons much easier. </p>
                <p>Please enter a valid email, as this is how you can reset your password if you forget it one day. Your email will never be given out to anyone, 
                    as I (the developer of this) have no reason to give it out anyways.</p>
                <hr> 
                <form id="new_profile" class="align" action="" method="post">
                    <label id="firstlabel" for="username" class="login_label">Username</label>
                    <input type='text' id="username" value="">
                    <br>
                    <label for="pass">Password</label>               
                    <input type="text" id="pass" value="">
                    <br>
                    <label for='pass2'>Retype password</label>
                    <input type='text' id='pass2' value=''>
                    <br>
                    <label for='email'>Email</label>
                    <input type='text' id='email' value=''>
                    <br>
                     <label for='email2'>Confirm Email</label>
                    <input type='text' id='email2' value=''>
                    <br>
                    <input type="submit" id ="create" value="Create Account">      
                </form>        
                <form id="usercheck" class ="align">
                    <input type="submit" name="check_username" value="Check Username Availability" 
                           id="check_button">
                </form>
            </div>
        </main>
    </body>