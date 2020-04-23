<head>
    <meta charset="UTF-8">
    <title>Character Database - Items</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
    <script type="text/javascript" src="scripts/snow.js"></script>
</head>
<body>
    <main>
        <div id="optiontabs">
            <ul>
                <li><a href="#ponies">Browser Ponies</a></li>
                <li><a href="#snow">Make it Snow!</a></li>
            </ul>
            <div id="ponies">
                <div class ="align" id=enablePonies>
                    <input type="checkbox" id="yesPonies" value="" onclick="ponycheck();">
                    <label for="yesPonies">Enable Browser Ponies: </label>
                    <br>
                </div>
                <div class="align" id="options">
                    <input type="checkbox" id="showfps" onchange="updateConfig();"/>
                    <label for="showfps">Show Frames per Second</label>
                    <br>
                    <input type="checkbox" id="progressbar" onchange="updateConfig();" checked/>
                    <label for="progressbar">Show Progress Bar</label>
                    <br>
                    <input type="checkbox" id="dontspeak" onchange="updateDontSpeak(this.checked);"/>
                    <label for="dontspeak">Never Speak</label>
                    <br>
                </div>

            </div>
            <div id="snow">
                <p>Snow!</p>
                <p>Somewhat working. Don't use on a mobile device. It won't run.</p>
                <div class ="align" id=enablesnow>
                    <a class="snowbutton" id="start" href="javascript:doStart();void(0)" title="Start">&#x25B6;</a>
                    <input type="checkbox" id="snow" value="" onclick="snowStorm.toggleSnow()">
                    <label for="snow">Make it Snow. </label>
                    <br>
                </div>
            </div>
        </div>
        <script>

            jQuery(document).ready(function ($) {
                $("#optiontabs").tabs();
            });
        </script>
    </main>
</body>