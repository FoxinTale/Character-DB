<!DOCTYPE html>
<?php
session_start();
require('inc/functions.php');
$username = $_SESSION["username"];
$charname = null;
$appearance = $charinfo = $outfit = $pers = $stats = $race = $other = null;
$info = "this applies to.";
$text = "For Character";

if (isset($_POST["new_char"])) {
    $charinfo = datacheck($_POST);
    $_SESSION["charname"] = $charinfo[1];
    $charname = $_SESSION["char_name"];
    addchar($db, $charinfo, $username);
}

if (isset($_POST["new_appearance"])) {
    $appearance = datacheck($_POST);
    addappearance($db, $appearance, $charname);
}

if (isset($_POST["new_outfit"])) {
    $outfit = datacheck($_POST);
    addoutfit($db, $outfit, $charname);
}

if (isset($_POST["new_pers"])) {
    $pers = datacheck($_POST);
    addpers($db, $pers, $charname);
}

if (isset($_POST["new_stats"])) {
    $stats = datacheck($_POST);
    addstats($db, $stats, $charname);
}

if (isset($_POST["new_race"])) {
    $race = datacheck($_POST);
    addrace($db, $race, $charname);
}

if (isset($_POST["other_stuff"])) {
    $other = datacheck($_POST);
    addother($db, $other, $charname);
}
?>
<head>
    <meta charset="UTF-8">
    <title>New Character</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <main>
        <div class='w3-container w3-pale-purple-box'>
            <div class="w3-tab w3-black">
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'general_info')">General Info</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_info')">Info</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_appearance')">Appearance</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_outfit')">Outfit</button>
            </div>
            <div id="general_info" class="w3-light-purple-box infotab">
                <p>This is where you enter data for all your characters</p>
                <p>You cannot leave anything empty, but you can put a "-" if you don't want to put something there.</p>
                <p>Any item can be one word, or a sentence if desired. </p>
                <p>If you need help filling some boxes, head over to the resources page.</p>            
                <p>Last note, some of the formatting / display may be messy. That will be fixed eventually.</p>
                <hr>
                <p><b>Below here, is really important things relating to this.</b></p>
                <p class='important'><b><u>You MUST fill in all the sections, no exceptions. Even if it does not apply to your character, again, use the "fill blanks"!</u></b></p>
                <p class="important"><b>You must add the character information first, and then add the others from there.</b></p> 
            </div>
            <div id='character_info' class='w3-light-purple-box infotab' style="display:none">
                <h3>Character Information</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <?php
                if (isset($_POST["new_char"])) {
                    echo "<span id='success'>Info successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <form id="charinfo" method="post" action="newchar.php">
                    <p class="tooltip" title="This is the full name of the character">
                        <label for="charname">Full Name: </label>
                        <input type="text" class="w3-input" required id="charname" name="char_name">
                    </p>
                    <p class ="tooltip" title="Their first name only. This will be used for adding objects to this character.">
                        <label for="charname2">Short name: </label>
                        <input type="text" class="w3-input" required id="charname2" name="char_name2">
                    </p>
                    <p class ="tooltip" title="Any given nicknames, or shortened forms of their name.">
                        <label for="charalias">Alias(es): </label>
                        <input type="text" class="w3-input" id="charalias" name="char_alias">
                    </p>
                    <p class ="tooltip" title="A short, one to four sentence description of your character.">
                        <label for="shortdesc">Short Description: </label>
                        <textarea required id="shortdesc" name="short_desc" class='expanding w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="The age of your character. Can be in years, or in terms of their lifespan.">
                        <label for="charage">Age: </label>
                        <input type="text"  required id="charage" class="w3-input" name="char_age">
                    </p>
                    <p class="tooltip" title="Their gender. Can be any one, or multiple.">
                        <label for="chargender">Gender</label>
                        <input type="text" id="chargender" class="w3-input" name="char_gender">
                    </p>
                    <p class="tooltip" title="The sexuality, can be anything.">
                        <label for="charsexuality">Sexuality: </label>
                        <input type="text" id="charsexuality" class="w3-input" name="char_sexuality">
                    </p>
                    <p class="tooltip" title="Use the species section if they are not a human character. Otherwise, this is fine.">
                        <label for="charrace">Race / Species: </label>
                        <input type="text" id="charrace" class="w3-input" name="char_race">
                    </p>
                    <p class="tooltip" title="The character's current status. Status effects, active/inactive, and more. Maybe even what they're currently thinking about.">
                        <label for="charstatus">Current Status: </label>
                        <input type="text" id="charstatus" class="w3-input" name="char_status">
                    </p>
                    <p class="tooltip" title="Soul type is related to the game Undertale, and fan-made variants of it. This can also be their most prominent trait.">
                        <label for="charsoul">Soul Type: </label>
                        <input type="text" id="charsoul" class="w3-input" name="char_soul">
                    </p>
                    <p class="tooltip" title="Any other small detail not covered by any of these. Please check the other tabs first though.">
                        <label for="charother">Other: </label>
                        <textarea id="charother" name="char_other" class='expanding w3-textarea'></textarea>
                    </p>
                    <?php
                    if ($username != "Test User") {
                        echo "<button type='submit' id='char_button' name='new_char'>Add Character!</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_appearance" class="w3-light-purple-box infotab" style="display:none">
                <h3>Character Appearance</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>

                <?php
                if (isset($_POST["new_appearance"])) {
                    echo "<span id='success'>Description successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <form id = "charapp" method="post" action="newchar.php#character_appearance">                        
                    <?php getcharnames($db, $username, $info, "For Character "); ?>
                    <p class="tooltip" title="Eye shape if not human, and eye colour regardless.">
                        <label for="chareyes">Eye Description: </label>
                        <textarea id="chareyes" required name="char_eyes" class='expanding w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Hair colour, length and appearance.">
                        <label for="charhair">Hair Description: </label>
                        <textarea id="charhair" required name="char_hair" class='expanding w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="This is really for if they aren't a human character. Elf, cat, wolf fox ears...ect.">
                        <label for="charears">Ears: </label>
                        <input type="text" id="charears" class="w3-input" name="char_ears">
                    </p>
                    <p class="tooltip" title="Height can be in any scale, as long as the units are provided.">
                        <label for="charheight">Height: </label>
                        <input type="text" required id="charheight" class="w3-input" name="char_height">
                    </p>
                    <p class="tooltip" title="Weight can be in any scale, as long as the units are provided.">
                        <label for="charweight">Weight: </label>
                        <input type="text" required id="charweight" class="w3-input" name="char_weight">
                    </p>
                    <p class="tooltip" title="Skin tone, fur colour, or scales. And even something not listed.">
                        <label for="charskin">Skin: </label>
                        <textarea id="charskin" name="char_skin" class='expanding w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Unique identifying features, if any. Birthmarks, scars, tattoos, ect...">
                        <label for="charweight">Unique Features: </label>
                        <textarea id="charunique" name="char_unique" class='expanding w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Anything else not covered.">
                        <label for="charadd">Additional: </label>
                        <textarea id="charadd" name="char_add" class='expanding w3-textarea'></textarea>
                    </p>
                    <?php
                    if ($username != "Test User") {
                        echo "<button type='submit' id='appearance_button' name='new_appearance'>Add Appearance.</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_outfit" class="w3-light-purple-box infotab" style="display:none">
                <?php
                if (isset($_POST["new_outfit"])) {
                    echo "<span id='success'>Outfit successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <form id="char_outfit" method="post" action="newchar.php#clothing">
                    <?php getcharnames($db, $username, $info, "For Character "); ?>
                    <p class="tooltip" title="The name of the outfit, for easy finding later on.">
                        <label for="appname">Outfit Name: </label>
                        <input type="text" id="appname" class='w3-input' name="app_name">
                    </p>
                    <p class="tooltip" title="Hats.">
                        <label for="apphats">Hats: </label>
                        <textarea id="apphats" class='expanding w3-textarea' name="app_hats"> </textarea>
                    </p>
                    <p class="tooltip" title="Rings, Necklaces, Piercings.">
                        <label for="appjewlery">Jewlery: </label>
                        <textarea id="appjewlery" class='expanding w3-textarea' name="app_jewlery"> </textarea>
                    </p>
                    <p class="tooltip" title="Shirts, tops and undershirts.">
                        <label for="apptop">Top / Shirt: </label>
                        <textarea id="apptop" class='expanding w3-textarea'name="app_top"> </textarea>
                    </p>
                    <p class="tooltip" title="Pants, Shorts, Bottomwear.">
                        <label for="appbottom">Bottom / Pants: </label>
                        <textarea id="appbottom" class='expanding w3-textarea' name="app_bottom"> </textarea>
                    </p>
                    <p class="tooltip" title="Shoes , Footwear.">
                        <label for="appfeet">Footwear: </label>
                        <textarea id="appfeet" class='expanding w3-textarea' name="app_feet"> </textarea>
                    </p>
                    <?php
                    if ($username != "Test User") {
                        echo "<button type='submit' id='outfit_button' name='new_outfit'>Add Outfit!</button>";
                    }
                    ?>
                </form>
            </div>

        </div>
    </main>
    <script>
        function opentab(evt, pagename) {
            var i, x, tablinks;
            x = document.getElementsByClassName("infotab");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-purple", "");
            }
            document.getElementById(pagename).style.display = "block";
            evt.currentTarget.className += " w3-purple";
        }
    </script>
</body>
