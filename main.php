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
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/font-awesome-min.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <script type="text/javascript" src="scripts/ui.js"></script>
    <script type="text/javascript" src="scripts/jquery.min.js"></script> 
    <body class="w3-main">
        <nav class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" style="z-index:3;width:250px;" id="sidenav">
            <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="closenav()">Close <i class="fa fa-remove"></i></a>
            <a class="w3-bar-item w3-button" href="javascript:framerender('home.php')">Home</a>
            <div>
                <a class="w3-bar-item w3-button" onclick="dropdown('creation')" href="javascript:void(0)">Create New...<i class="fa fa-caret-down"></i></a>
                <div id="creation" class="w3-hide">
                    <a class="w3-bar-item w3-button" href="javascript:framerender('newability.php')">Ability / Power</a>
                    <a class="w3-bar-item w3-button" href="javascript:framerender('newchar.php')">Character</a>
                    <a class="w3-bar-item w3-button" href="javascript:framerender('newitem.php')">Item</a>
                    <a class="w3-bar-item w3-button" href="javascript:framerender('newweapon.php')">Weapon</a>
                </div>
            </div>
            <hr>
            <a class="w3-bar-item w3-button" href="javascript:framerender('abilities.php')">Abilities / Powers</a>
            <a class="w3-bar-item w3-button" href="javascript:framerender('chars.php')">Characters</a>
            <a class="w3-bar-item w3-button" href="javascript:framerender('items.php')">Items</a>
            <a class="w3-bar-item w3-button" href="javascript:framerender('weapons.php')">Weapons</a>
            <hr>
            <a class="w3-bar-item w3-button" href="javascript:framerender('resources.php')">Resources</a>
            <a class="w3-bar-item w3-button" href="javascript:framerender('notes.php')">Notes</a>
            <a class="w3-bar-item w3-button" href="javascript:framerender('todo.php')">To Do</a>
            <a class="w3-bar-item w3-button" href="javascript:framerender('forum.php')">Forum</a>
            <a class="w3-bar-item w3-button" href="javascript:framerender('credits.php')">Credits</a>
            <hr>
            <a class="w3-bar-item w3-button" href="logout.php">Logout</a>        
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
    <noscript>Please turn scripts on to allow the page to render properly, and the navigation menu to work properly.</noscript> 
</html> 
