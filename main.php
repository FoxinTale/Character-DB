<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Character Database</title>
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/gui.css"/>
        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/jquery-ui.min.js"></script>
        <script type="text/javascript" src="scripts/ponycfg.js" id="browser-ponies-config"></script>
        <script type="text/javascript" src="scripts/browserponies.js" id="browser-ponies-script"></script>
        <script type="text/javascript" src="scripts/gui-common.js"></script>
        <script type="text/javascript" src="scripts/gui.js"></script>
        <script src="scripts/ponies.js"></script>
    </head>
    <body>
        <div id="paddock-back">
            <div id="paddock-left">
                <div id="paddock-right">
                    <div id="paddock-front"></div>
                </div>
            </div>
        </div>
        <div id="controls">
            <a class="button" id="start" href="javascript:BrowserPonies.start();void(0)" title="Start">&#x25B6;</a>
            <a class="button" id="stop" href="javascript:BrowserPonies.stop();void(0)" title="Stop">&#x25A0;</a>
            <a class="button" href="javascript:BrowserPonies.pause();void(0)" title="Pause">&#x25AE;&#x25AE;</a>
            <a class="button" href="javascript:BrowserPonies.resume();void(0)" title="Resume">&#x25AE;&#x25B6;</a>
            <a class="button" href="javascript:BrowserPonies.togglePoniesToBackground();void(0)"
               title="Toggle ponies in background">&#x2195;</a>
            <a class="button" href="javascript:BrowserPonies.unspawnAll();BrowserPonies.stop();void(0)" title="Remove all Ponies">&times;</a>
        </div>

        <h1>The Character Database</h1>
        <div class = "sidenav" id="navmenu">
            <a href="javascript:linkclick('home.php')">Home</a>
            <div class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">Create New...</a>
                <div class="dropdown-content">
                    <a href="javascript:datapages('newability.php')">Ability</a>
                    <a href="javascript:datapages('newchar.php')">Character</a>
                    <a href="javascript:datapages('newitem.php')">Item</a>
                    <a href="javascript:datapages('newweapon.php')">Weapon</a>
                </div>
            </div>
            <a href="javascript:linkclick('chars.php')">Characters</a>
            <a href="javascript:linkclick('items.php')">Items</a>
            <a href="javascript:linkclick('weapons.php')">Weapons</a>
            <a href="javascript:linkclick('notes.php')">Notes</a>
            <a href="javascript:linkclick('resources.php')">Resources</a>
            <a href="javascript:linkclick('profile.php')">My Profile</a>
            <a href="javascript:linkclick('funstuff.php')">Fun Stuff</a>
            <a href="javascript:linkclick('credits.php')">Credits</a>
            <a href="javascript:linkclick('issues.php')">Known Issues</a>
            <a href="javascript:linkclick('todo.php')">To Do List</a>
            <a href="logout.php" id="logout">Log Out</a>
            <a href="javascript:void(0);" class="icon" onclick="menu()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <iframe id="minipage" name="frame" src="about:blank"></iframe>
        <div id="container"></div>

        <script type = "text/javascript" language = "javascript">
            containerHidden = false;
            frameHidden = true;

            window.onload = hidedetails();
            function menu() {
                var x = document.getElementById("navmenu");
                if (x.className === "sidenav") {
                    x.className += " responsive";
                } else {
                    x.className = "sidenav";
                }
            }

            function linkclick(url) {
                if (containerHidden) {
                    frameHidden = true;
                    containerHidden = false;
                    document.getElementById('minipage').style.visibility = "hidden";
                    document.getElementById('minipage').style.width = "0px";
                    document.getElementById('minipage').style.height = "0px";
                    document.getElementById('container').style.display = "block";
                    document.getElementById('container').style.height = "70%";
                    document.getElementById('container').style.width = "70%";
                    document.getElementById('container').style.border = "none";
                    document.getElementById('container').style.margin = "2.5% 0% 0% 20%";
                    jQuery(document).ready(function ($) {
                        $("#container").load(url);
                    });
                } else if (!containerHidden) {
                    jQuery(document).ready(function ($) {
                        $("#container").load(url);
                    });
                }
            }

            function datapages(url) {
                if (frameHidden) {
                    frameHidden = false;
                    containerHidden = true;
                    document.getElementById('container').style.width = "0px";
                    document.getElementById('container').style.height = "0px";
                    document.getElementById('container').style.display = "none";
                    document.getElementById('minipage').style.visibility = "visible";
                    document.getElementById('minipage').style.width = "70%";
                    document.getElementById('minipage').style.height = "700px";
                    document.getElementById('minipage').style.margin = "0% 0% 0% 20%";
                    document.getElementById('minipage').style.border = "none";
                    document.getElementById('minipage').src = url;
                } else if (!frameHidden) {
                    document.getElementById('minipage').src = url;
                }
            }

            function hideminipage() {

            }

            function hidedetails() {
                jQuery(document).ready(function ($) {
                    $("#container").load("home.php");
                });
                document.getElementById('minipage').style.visibility = "hidden";
                document.getElementById('minipage').style.height = "0px";
                document.getElementById('minipage').style.width = "0px";
                document.getElementById('controls').style.visibility = "hidden";
                document.getElementById('paddock-back').style.visibility = "hidden";
                document.getElementById('paddock-left').style.visibility = "hidden";
                document.getElementById('paddock-right').style.visibility = "hidden";
                document.getElementById('paddock-front').style.visibility = "hidden";
            }
        </script>
        <footer>
            Aubrey Jane - Spring 2020
        </footer>
    </body>
</html>