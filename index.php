<!DOCTYPE html>
<?php
session_start();
include 'inc/functions.php';
$_SESSION['username'] = 'Aubrey';
//  $username = $_POST['user_name'];
$username = $_SESSION['username'];
$user_info = userinf($db, $username);
$admin = $user_info[0]['is_admin'];
$_SESSION["isadmin"] = $admin;
?>
<html>
    <title>Character Database</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3-min.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome-min.css">
    <link rel="stylesheet" href="css/nav.css">
    <script type="text/javascript" src="scripts/nav.js"></script>
    <script type="text/javascript" src="scripts/jquery.min.js"></script> 
    <body>
        <nav class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" style="z-index:3;width:250px;" id="sidenav">
            <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="closenav()">Close <i class="fa fa-remove"></i></a>
            <a class="w3-bar-item w3-button" href="javascript:linkclick('home.php')">Home</a>
            <div>
                <a class="w3-bar-item w3-button" onclick="dropdown('creation')" href="javascript:void(0)">Create New...<i class="fa fa-caret-down"></i></a>
                <div id="creation" class="w3-hide">
                    <a class="w3-bar-item w3-button" href="javascript:datapages('newability.php')">Ability / Power</a>
                    <a class="w3-bar-item w3-button" href="javascript:datapages('newchar.php')">Character</a>
                    <a class="w3-bar-item w3-button" href="javascript:datapages('newitem.php')">Item</a>
                    <a class="w3-bar-item w3-button" href="javascript:datapages('newweapon.php')">Weapon</a>
                </div>
            </div>
            <hr>
            <a class="w3-bar-item w3-button" href="javascript:datapages('abilities.php')">Abilities / Powers</a>
            <a class="w3-bar-item w3-button" href="javascript:datapages('chars.php')">Characters</a>
            <a class="w3-bar-item w3-button" href="javascript:datapages('items.php')">Items</a>
            <a class="w3-bar-item w3-button" href="javascript:datapages('weaps.php')">Weapons</a>
            <hr>
            <a class="w3-bar-item w3-button" href="javascript:linkclick('resources.php')">Resources</a>
            <a class="w3-bar-item w3-button" href="javascript:linkclick('notes.php')">Notes</a>
            <a class="w3-bar-item w3-button" href="javascript:linkclick('todo.php')">To Do</a>
            <a class="w3-bar-item w3-button" href="javascript:linkclick('credits.php')">Credits</a>
            <hr>
            <a class="w3-bar-item w3-button" href="#">Logout</a>        
        </nav>
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="closenav()" style="cursor:pointer" id="overlay"></div>
        <div class="w3-main" style="margin-left:250px;">
            <i class="fa fa-bars w3-button  w3-hide-large w3-xlarge" onclick="opennav()"></i>
            <h1>Character Database</h1>
                    <span id="userdisplay"><?php echo $username; ?></span>
            <iframe id="minipage" name="frame" src="about:blank"></iframe>
            <div id="container"></div>
            
            <script type="text/javascript" src="scripts/main.js"></script>
            <footer>Aubrey Jane - Spring 2020</footer>
        </div>
    </body>
</html> 
