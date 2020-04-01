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
        <link rel="stylesheet" href="css/animnav.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/gui.css">
        <script type="text/javascript" src="scripts/jquery.min.js"></script>
        <script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
        <script type="text/javascript" src="scripts/ponycfg.js" id="browser-ponies-config"></script>
        <script type="text/javascript" src="scripts/browserponies.js" id="browser-ponies-script"></script>
        <script type="text/javascript" src="scripts/gui-common.js"></script>
        <script type="text/javascript" src="scripts/gui.js"></script>
        <script type="text/javascript" src="scripts/ponies.js"></script>
        <script type="text/javascript" src="scripts/snow.js"></script>
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
            <a class="button" href="javascript:BrowserPonies.unspawnAll();BrowserPonies.stop();void(0)" title="Remove all Ponies">&times;</a>
        </div>
        <h1>The Character Database</h1>
        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="logo">
                    <a href="javascript:linkclick('home.php')" class="nav-link">
                        <!-- Image go here. -->
                        <img src="images/home.svg" alt="Home" id="home-icon">
                        <span class="link-text logo-text">Character Database</span>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <img src="images/plus.svg" alt="Chars">
                        <a href="javascript:void(0)" class="dropbtn"></a>
                        <div class="dropdown-content">
                            <a href="javascript:datapages('newability.php')">Ability</a>
                            <a href="javascript:datapages('newchar.php')">Character</a>
                            <a href="javascript:datapages('newitem.php')">Item</a>
                            <a href="javascript:datapages('newweapon.php')">Weapon</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="javascript:datapages('chars.php')" class="nav-link">
                        <img src="images/chars.svg" alt="Chars">
                        <span class="link-text">Characters</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:linkclick('items.php')" class="nav-link">
                        <img src="images/items.svg" alt="Items">
                        <span class="link-text">Items</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:linkclick('weapons.php')" class="nav-link">
                        <img src="images/weaps.svg" alt="Weapons">
                        <span class="link-text">Weapons</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:linkclick('notes.php')" class="nav-link">
                        <img src="images/idea.svg" alt="Notes">
                        <span class="link-text">Notes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:linkclick('resources.php')" class="nav-link">
                        <img src="images/external-link.svg" alt="Resources">
                        <span class="link-text">Resources</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:linkclick('funstuff.php')" class="nav-link">
                        <img src="images/settings.svg" alt="Settings">
                        <span class="link-text">Fun Stuff</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:linkclick('profile.php')" class="nav-link">
                        <img src="images/info.svg" alt="Info">
                        <span class="link-text">My Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:linkclick('credits.php')" class="nav-link">
                        <img src="images/about.svg" alt="Credits">
                        <span class="link-text">Credits & About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- Leave this be, I'm not bothering with the CSS right now. -->
                </li>
            </ul>
        </nav>
        <iframe id="minipage" name="frame" src="about:blank"></iframe>
        <div id="container"></div>
        <script type="text/javascript" src="scripts/main.js"></script>
        <footer>
            Aubrey Jane - Spring 2020
        </footer>
    </body>
</html>