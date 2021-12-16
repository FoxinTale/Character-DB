<!DOCTYPE html>
<?php
session_start();
    $user_name = "";

    if(isset($_SESSION['username'])){
      $user_name = $_SESSION['username'];
    }

     $validUser = false;
    if($user_name == "" || NULL){
        $validUser = false;
    } else {
       $validUser = true;
    }
    $_SESSION["validUser"] = $validUser;

?>

<html>
    <title>The Character Journal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/@csstools/normalize.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/mainpage.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <script type="text/javascript" src="scripts/ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <body class="mainpage">
        <nav class="sidebar bar-block collapse animate-left card" style="z-index:3;width:250px;" id="sidenav">
            <a class="bar-item nav-button hide large" href="javascript:void(0)" onclick="closenav()">Close <i class="fa fa-remove"></i></a>
            <a class="bar-item nav-button" href="javascript:framerender('home.php')">Home</a>
            <div>
                <a class="bar-item nav-button" onclick="dropdown('creation')" href="javascript:void(0)">Create New...<i class="fa fa-caret-down"></i></a>
                <div id="creation" class="hide">
                    <a class="bar-item nav-button" href="javascript:framerender('newability.php')">Ability / Power / Spell</a>
                    <a class="bar-item nav-button" href="javascript:framerender('newchar.php')">Character</a>
                    <a class="bar-item nav-button" href="javascript:framerender('newitem.php')" style="display:none;">Item</a>
                    <a class="bar-item nav-button" href="javascript:framerender('newweapon.php')">Weapon</a>
                </div>
            </div>
            <a id="dnd_page" class="bar-item nav-button" href="javascript:framerender('dnd.php')" style="display:none">DnD Land</a>
            <hr class="nav-hr">
            <p class="bar-item">View...</p>
            <a class="bar-item nav-button" href="javascript:framerender('abilities.php')">Abilities / Powers / Spells</a>
            <a class="bar-item nav-button" href="javascript:framerender('chars.php')">Characters</a>
            <a class="bar-item nav-button" href="javascript:framerender('items.php')" style="display:none;">Items</a>
            <a class="bar-item nav-button" href="javascript:framerender('weapons.php')">Weapons</a>
            <hr class="nav-hr">
            <a class="bar-item nav-button" href="javascript:framerender('resources.php')">Resources</a>
            <a class="bar-item nav-button" href="javascript:framerender('credits.php')">Credits</a>
            <a class="bar-item nav-button" href="javascript:framerender('aboutsite.php')">About Site</a>
            <hr class="nav-hr">
            <?php
                if(isset($_SESSION['isAdmin'])){
                    if($_SESSION['isAdmin']){
                        echo "<a class='bar-item nav-button' href=\"javascript:framerender('admin.php')\">Admin Panel</a>";
                    }
                }
               if($validUser){
                   echo "<a class='bar-item nav-button' href=\"javascript:framerender('logout.php')\">Close Journal</a>";
               } else {
                   echo "<a class='bar-item nav-button' href=\"javascript:framerender('newprofile.php')\">Create Journal</a>";
                   echo "<a class='bar-item nav-button' href=\"javascript:framerender('login.php')\">Open Journal</a>";
               }
            ?>
        </nav>
        <div class="overlay hide-large w3-animate-opacity" onclick="closenav()" style="cursor:pointer" id="overlay"></div>
        <div class="mainpage" style="margin-left:250px;">
            <i id="minimenu" class="fa fa-bars w3-button hide-large xlarge" onclick="opennav()"></i>
            <h1>The Character Journal</h1>
            <?php
                if($validUser){ echo "<span id='userdisplay'>$user_name</span>"; }
            ?>
            <!--
                The following element is how all pages are displayed. I am basically abusing a div as an iframe here with jQuery.
                Why? I did not feel like repeating myself (this nav page) on every page so I settled on this way.
                While I do not remember exactly *why* I did it this way, I think I had issues with the iframe not doing things I wanted it to.
            -->
            <div class="minipage" id="container"></div>
            <script type="text/javascript" src="scripts/main.js"></script>
            <footer>Aubrey - 2021</footer>
        </div>
    </body>
    <noscript>Please turn scripts on to allow the page to render properly, and the navigation menu to work properly.</noscript> 
</html> 
