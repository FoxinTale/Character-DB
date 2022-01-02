<!DOCTYPE html>
<?php
session_start();

// Hardcoded values so I can develop easily without constantly having to login. Makes it so much easier.
// Obviously, this will be removed in production and testing.
///*
  $user_name = "Aubrey";
  $validUser = true;
  $_SESSION['validUser'] = true;
  $_SESSION['username'] = "Aubrey";
  $_SESSION['userID'] = 1;
  $_SESSION['isAdmin'] = 1;
 //*/

/*
$user_name = "";
if (isset($_SESSION['username'])) {
    $user_name = $_SESSION['username'];
}

$validUser = false;
if ($user_name == "" || NULL) {
    $validUser = false;
} else {
    $validUser = true;
}
$_SESSION["validUser"] = $validUser;

*/
?>

<html>
    <title>The Character Journal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/@csstools/normalize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/mainpage.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <script type="text/javascript" src="scripts/ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <body class="mainpage">
        <nav  id="sidenav" class="sidebar bar-block collapse animate-left card" style="z-index:3;width:250px;">
            <a class="bar-item nav-button hide large" href="javascript:void(0)" onclick="closenav()">Close <i class="fa fa-remove"></i></a>
            <a class="bar-item nav-button" href="javascript:setFrameSrc('home.php')">Home</a>
            <hr class="nav-hr">
            <div>
                <a class="bar-item nav-button" onclick="dropdown('creation')" href="javascript:void(0)">Create New...<i class="fa fa-caret-down"></i></a>
                <div id="creation" class="hide">
                    <a class='bar-item nav-button' href="javascript:setFrameSrc('newability.php')">Ability / Power / Spell</a>
                    <a class='bar-item nav-button' href="javascript:setFrameSrc('newchar.php')">Character</a>
                    <a class='bar-item nav-button' href="javascript:setFrameSrc('newitem.php')">Item</a>
                    <a class='bar-item nav-button' href="javascript:setFrameSrc('newweapon.php')">Weapon</a>
                </div>
            </div>
            <hr class="nav-hr">
            <?php
            if($validUser){
                // Edit makes sense. However, I put the view as part of this because no point in viewing anything if the user is not logged in.
                // This PHP is also staggered/formatted like this to look pretty here. Serves no functional purpose other than looking like good HTML.
                echo '<div>';
                    echo "<a class='bar-item nav-button' onclick=\"dropdown('edit')\" href=\"javascript:void(0)\">Edit...<i class='fa fa-caret-down'></i></a>";
                        echo "<div id='edit' class='hide'>";
                            echo "<a class='bar-item nav-button' href=\"javascript:setFrameSrc('abilities.php')\">Abilities / Powers / Spells</a>";
                            echo "<a class='bar-item nav-button' href=\"javascript:setFrameSrc('charselect.php')\">Characters</a>";
                            echo "<a class='bar-item nav-button' href=\"javascript:setFrameSrc('items.php')\">Items</a>";
                            echo "<a class='bar-item nav-button' href=\"javascript:setFrameSrc('weapons.php')\">Weapons</a>";
                        echo '</div>';
                    echo '</div>';
                echo "<hr class='nav-hr'>";
                echo '<div>';
                    echo "<a class='bar-item nav-button' onclick=\"dropdown('view')\" href=\"javascript:void(0)\">View...<i class='fa fa-caret-down'></i></a>";
                        echo "<div id='view' class='hide'>";            
                            echo "<a class='bar-item nav-button' href=\"javascript:setFrameSrc('abilities.php')\">Abilities / Powers / Spells</a>";
                            echo "<a class='bar-item nav-button' href=\"javascript:setFrameSrc('chars.php')\">Characters</a>";
                            echo "<a class='bar-item nav-button' href=\"javascript:setFrameSrc('items.php')\">Items</a>";
                            echo "<a class='bar-item nav-button' href=\"javascript:setFrameSrc('weapons.php')\">Weapons</a>";
                        echo '</div>';
                echo '</div>';
                echo "<hr class='nav-hr'>";
            } 
            ?>
            <a class='bar-item nav-button' href="javascript:setFrameSrc('aboutsite.php')">About Site</a>
            <a class='bar-item nav-button' href="javascript:setFrameSrc('credits.php')">Credits</a>
            <a class='bar-item nav-button' href="javascript:setFrameSrc('resources.php')">Resources</a>
            <a class='bar-item nav-button' href="javascript:setFrameSrc('todo.php')">Site To-Do List</a>
            <hr class="nav-hr">
            <?php
            if (isset($_SESSION['isAdmin'])) { // Check if it actually exists
                if ($_SESSION['isAdmin']) { // If so, check its value.
                    echo "<a class='bar-item nav-button' href='admin.php' target='pages'>Admin Panel</a>";
                }
            }
            if ($validUser) {
                echo "<a class='bar-item nav-button' href='logout.php'>Close Journal</a>";
            } else {
                echo "<a class='bar-item nav-button' href=\"javascript:setFrameSrc('newprofile.php')\">Create Journal</a>";
                echo "<a class='bar-item nav-button' href=\"javascript:setFrameSrc('login.php')\">Open Journal</a>";
            }
            ?>
        </nav>
        <div id="overlay" class='overlay hide-large w3-animate-opacity' onclick="closenav()" style="cursor:pointer"></div>
        <div class='mainpage' style="margin-left:250px;">
            <i id="minimenu" class="fa fa-bars w3-button hide-large xlarge" onclick="opennav()"></i>
            <h1>The Character Journal</h1>
            <?php
            if ($validUser) {
                echo "<span id='userdisplay'>$user_name</span>";
            }
            ?>

            <iframe id="pageframe" name="pages">
                <p>I-frames aren't supported. Sorry. Use a browser that doesn't suck.</p>
            </iframe>
            <script type="text/javascript">
                window.onload  = setFrameSrc("home.php");
               var frame = document.getElementById("pageframe");
               
               pageframe.onload = function(){
                 console.log(pageframe.src);
               };

                function setFrameSrc(url){
                    pageframe.src = url;
                }

                window.onmessage = function(event){
                    if (event.data === 'login' || event.data === 'logout') {
                        window.location.reload(true);
                        setFrameSrc('home.php');
                    }
                };
            </script>
            <footer>Aubrey - 2022</footer>
        </div>
    </body>
    <noscript>Please turn scripts on to allow the page to render properly, and the navigation menu to work properly.</noscript> 
</html> 
