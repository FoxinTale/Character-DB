<head>
    <meta charset="UTF-8">
    <title>Character Database - Items</title>
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>
    <main>
        <div id="optiontabs">
            <ul>
                <li><a href="#customize">Website Customization</a></li>
                <li><a href="#ponies">Browser Ponies</a></li>
                <li><a href="#other">Other Options</a></li>
            </ul>
            <div id="customize">
                <p>Placeholder.</p>
            </div>
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
                <div class="align" id ="ponyoptions">
                    <label for="speed">Speed Multiplier:</label>
                    <input type="text" class="number" id="speed" value="3.0" data-value="3.0"
                           data-min="0.1" data-decimals="1" data-step="0.1" size="3"
                           onchange="numberFieldChanged.call(this, event);"/>
                    <button onclick="increaseNumberField.call($('speed'));">+</button>
                    <button onclick="decreaseNumberField.call($('speed'));">&ndash;</button>
                    <br>
                    <div class ="tooltip" title="Even if this is 0% ponies will speak if an animation requires it.">
                        <label for="speak">Random Speak Probability:</label>
                        <input type="text" class="number" id="speak" value="15"
                               data-value="15" data-min="0" data-max="100" data-decimals="0" size="3"
                               onchange="numberFieldChanged.call(this, event);"/>%
                        <button onclick="increaseNumberField.call($('speak'));">+</button>
                        <button onclick="decreaseNumberField.call($('speak'));">&ndash;</button>
                        <br>
                    </div>
                    <label for="fps">Frames per Second:</label>
                    <input type="text" class="number" id="fps" value="25"
                           data-value="25" data-min="1" data-decimals="0" size="3"
                           onchange="numberFieldChanged.call(this, event);"/>
                    <button onclick="increaseNumberField.call($('fps'));">+</button>
                    <button onclick="decreaseNumberField.call($('fps'));">&ndash;</button>
                    <br>
                    <label for="fade">Fade Duration:</label>
                    <input type="text" class="number" id="fade" value="0.5"
                           data-value="0.5" data-min="0" data-decimals="1" data-step="0.1" size="3"
                           onchange="numberFieldChanged.call(this, event);"/>sec
                    <button onclick="increaseNumberField.call($('fade'));">+</button>
                    <button onclick="decreaseNumberField.call($('fade'));">&ndash;</button>
                </div>
                <div id="filterwrapper">
                    <label for="addcat">Filter Categories:</label>
                    <button id="addcat" onclick="showCategorySelect();">+</button>
                    <ul id="catselect" style="display:none;">
                        <li id="allcatsadded">All Added</li>
                    </ul>
                    <ul id="catlist"></ul>
                    <span id="nocatadded" style="display:none;">No Category Selected</span>
                    <button onclick="removeAllCategories();" title="Remove All">&#x232B;</button>
                </div>
                <ul id="ponylist"></ul>
                <p id="zero"><button onclick="setAllZero();">Set all Ponies to 0</button></p>
            </div>
            <div id="other">
                <p>Snow!</p>
            </div>
        </div>
        <script>
            jQuery(document).ready(function ($) {
                $("#optiontabs").tabs();

            });
            $(function () {
                $(document).tooltip();
            });
        </script>
    </main>
</body>