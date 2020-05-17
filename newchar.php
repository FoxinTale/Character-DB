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
    <script type="text/javascript" src="scripts/ui.js"></script>
</head>
`<body>
    <main>
        <div class='w3-pale-purple-box'>
            <div class="w3-tab w3-black">
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'general_info')">General Info</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_info')">Info</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_appearance')">Appearance</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_outfit')">Outfit</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_personality')">Personality</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_stats')">Stats</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_race')">Race</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_other')">Other</button>
            </div>
            <div id="general_info" class="w3-light-purple-box infotab">
                <p>This is where you enter data for all your characters</p>
                <p>Some things you cannot leave empty, while others you can. It'll complain if it cannot be left empty.</p>
                <p>Any item can be one word, or a sentence if desired. </p>
                <p>If you need help filling some boxes, head over to the resources page.</p>            
                <p>Last note, some of the formatting / display may be messy. That will be fixed eventually.</p>
                <hr>
                <p><b>You must add the character information first, and then add the others from there.</b></p> 
            </div>
            <div id='character_info' class='w3-light-purple-box infotab' style="display:none">
                <h3 class="w3-display-header">Character Information</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <?php
                if (isset($_POST["new_char"])) {
                    echo "<span id='success'>Info successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <form id="charinfo" method="post" class='w3-container' action="newchar.php">
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
                        <textarea required id="shortdesc" name="short_desc" class='w3-textarea'></textarea>
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
                        <textarea id="charother" name="char_other" class='w3-textarea'></textarea>
                    </p>
                    <?php
                    if ($username != "Test User") {
                        echo "<button type='submit' id='char_button' name='new_char'>Add Character!</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_appearance" class="w3-light-purple-box w3-container infotab" style="display:none">
                <h3 class="w3-display-header">Character Appearance</h3>
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
                        <textarea id="chareyes" required name="char_eyes" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Hair colour, length and appearance.">
                        <label for="charhair">Hair Description: </label>
                        <textarea id="charhair" required name="char_hair" class='w3-textarea'></textarea>
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
                        <textarea id="charskin" name="char_skin" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Unique identifying features, if any. Birthmarks, scars, tattoos, ect...">
                        <label for="charweight">Unique Features: </label>
                        <textarea id="charunique" name="char_unique" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Anything else not covered.">
                        <label for="charadd">Additional: </label>
                        <textarea id="charadd" name="char_add" class='w3-textarea'></textarea>
                    </p>
                    <?php
                    if ($username != "Test User") {
                        echo "<button type='submit' id='appearance_button' name='new_appearance'>Add Appearance.</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_outfit" class="w3-light-purple-box w3-container infotab" style="display:none">
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
                        <textarea id="apphats" class='w3-textarea' name="app_hats"> </textarea>
                    </p>
                    <p class="tooltip" title="Rings, Necklaces, Piercings.">
                        <label for="appjewlery">Jewlery: </label>
                        <textarea id="appjewlery" class='w3-textarea' name="app_jewlery"> </textarea>
                    </p>
                    <p class="tooltip" title="Shirts, tops and undershirts.">
                        <label for="apptop">Top / Shirt: </label>
                        <textarea id="apptop" class='w3-textarea'name="app_top"> </textarea>
                    </p>
                    <p class="tooltip" title="Pants, Shorts, Bottomwear.">
                        <label for="appbottom">Bottom / Pants: </label>
                        <textarea id="appbottom" class='w3-textarea' name="app_bottom"> </textarea>
                    </p>
                    <p class="tooltip" title="Shoes , Footwear.">
                        <label for="appfeet">Footwear: </label>
                        <textarea id="appfeet" class='w3-textarea' name="app_feet"> </textarea>
                    </p>
                    <?php
                    if ($username != "Test User") {
                        echo "<button type='submit' id='outfit_button' name='new_outfit'>Add Outfit!</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_personality" class="w3-light-purple-box w3-container infotab" style="display:none">
                <h3 class="w3-display-header">Character Personality</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <?php
                if (isset($_POST["new_pers"])) {
                    echo "<span id='success'>Personality successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <form id="char_pers" method="post" action="newchar.php#character_personality">
                    <?php getcharnames($db, $username, $info, "For Character "); ?>
                    <p class="tooltip" title="The lifestyle of this character. Are they lazy, active? Something different?">
                        <label for="charact">Activity: </label>
                        <input type="text" id="charact" class='w3-input' name="char_act">
                    </p>
                    <p class="tooltip" title="How agreeable, or cooperative this character is.">
                        <label for="charagree">Agreeableness: </label>
                        <input type="text" id="charagree" class='w3-input' name="char_agree">
                    </p>
                    <p class="tooltip" title="How assertive, or how well this character can lead others.">
                        <label for="charassert">Assertiveness: </label>
                        <input type="text" id="charassert" class='w3-input' name="char_assert">
                    </p>
                    <p class="tooltip" title="How confident this character is with themselves and their choices.">
                        <label for="charconf">Confidence: </label>
                        <input type="text" id="charconf" class='w3-input' name="char_conf">
                    </p>
                    <p class="tooltip" title="How disciplined, or motivated this character is.">
                        <label for="chardisc">Discipline: </label>
                        <input type="text" id="chardisc" class='w3-input' name="char_disc">
                    </p>
                    <p class="tooltip" title="How well the character can recognize, express and control their emotions.">
                        <label for="charemocap">Emotional Capacity: </label>
                        <input type="text" id="charemocap" class='w3-input' name="char_emocap">
                    </p>
                    <p class="tooltip" title="How friendly this character is.">
                        <label for="charfriend">Friendliness: </label>
                        <input type="text" id="charfriend" class='w3-input' name="char_friend">
                    </p>
                    <p class="tooltip" title="How honest this character is with others.">
                        <label for="charhonest">Honesty: </label>
                        <input type="text" id="charhonest" class='w3-input' name="char_honest">
                    </p>
                    <p class="tooltip" title="How smart, or intelligent this character is.">
                        <label for="charintel">Intelligence: </label>
                        <input type="text" id="charintel" class='w3-input' name="char_intel">
                    </p>
                    <p class="tooltip" title="How polite or rude this character is.">
                        <label for="charmanners">Manners: </label>
                        <input type="text" id="charmanners" class='w3-input' name="char_manners">
                    </p>
                    <p class="tooltip" title="This character's general outlook on life. Are they upbeat, depressed...something different?">
                        <label for="charpos">Positivity: </label>
                        <input type="text" id="charpos" class='w3-input' name="char_pos">
                    </p>
                    <p class="tooltip" title="How likely this character is to rebel against a given plan, situation or rules.">
                        <label for="charrebel">Rebelliousness: </label>
                        <input type="text" id="charrebel" class='w3-input' name="char_rebel">
                    </p>
                    <p class="tooltip" title="The personality type. Can be Meyers-Briggs, Big 5, or any other type.">
                        <label for="charperstype">Personality Type: </label>
                        <input type="text" required id="charperstype" class='w3-input' name="char_perstype">
                    </p>
                    <p class="tooltip" title="Description of their personality, if the other areas don't quite fit.">
                        <label for="charpersdesc">Description (Optional): </label>
                        <textarea id="charpersdesc" name="char_persdesc" class='w3-textarea'></textarea>
                    </p>
                    <?php
                    if ($username != "Test User") {
                        echo "<button type='submit' id='pers_button' name='new_pers'>Add Personality.</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_stats" class="w3-light-purple-box w3-container infotab" style="display:none">
                <h3 class="w3-display-header">Character Stats</h3>
                <p>You would use these, usually for tabletop based games. But you can use them for other purposes.</p>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <?php
                if (isset($_POST["new_stats"])) {
                    echo "<span id='success'>Stats successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <form id="charstats" method="post" action="newchar.php#character_stats">
                    <?php getcharnames($db, $username, $info, "For Character "); ?>
                    <p class="tooltip" title="Character health, or hit points.">
                        <label for="stathealth">Health / Hit Points: </label>
                        <input type="text" required id="stathealth" class="w3-input" name="stat_health">
                    </p>
                    <p class="tooltip" title="Stamina, or endurance of the character.">
                        <label for="statstam">Stamina: </label>
                        <input type="text" id="statstam" class="w3-input" name="stat_stam">
                    </p>
                    <p class="tooltip" title="Mana, Magicka, or Magical energy the character has.">
                        <label for="statmana">Mana / Magicka: </label>
                        <input type="text" id="statmana" class="w3-input" name="stat_mana">
                    </p>
                    <p class="tooltip" title="Level of the character.">
                        <label for="statlevel">Level: </label>
                        <input type="text" id="statlevel" class="w3-input" name="stat_level">
                    </p>
                    <p class="tooltip" title="Current experience level.">
                        <label for="statexp">Experience Level: </label>
                        <input type="text" id="statexp" class="w3-input" name="stat_exp">
                    </p>
                    <p class="tooltip" title="How quick on their feet the character is.">
                        <label for="statagile">Agility: </label>
                        <input type="text" id="statagile" class="w3-input" name="stat_agile">
                    </p>
                    <p class="tooltip" title="How strong your character is.">
                        <label for="statstrong">Strength: </label>
                        <input type="text" id="statstrong" class="w3-input" name="stat_strong">
                    </p>
                    <p class="tooltip" title="The ability of your character to influence those around them.">
                        <label for="statchar">Charisma: </label>
                        <input type="text" id="statchar" class="w3-input" name="stat_char">
                    </p>
                    <p class="tooltip" title="How observant your character is of others, or the surrounding environment.">
                        <label for="statpercep">Perception: </label>
                        <input type="text" id="statpercep" class="w3-input" name="stat_percep">
                    </p>
                    <?php
                    if ($username != "Test User") {
                        echo "<button type='submit' id='stat_button' name='new_stats'>Add stats.</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_race" class="w3-light-purple-box w3-container infotab" style="display:none">
                <h3 class="w3-display-header">Character Species / Race.</h3>
                <p>If your character is not human, use this section. Otherwise it is not needed.</p>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <?php
                if (isset($_POST["new_race"])) {
                    echo "<span id='success'>Race successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <?php getcharnames($db, $username, $info, "For Character "); ?>
                <form id="charspecies" method="post" action="newchar.php#character_race">
                    <p class="tooltip" title="The name of the species / race.">
                        <label for="racename">Name: </label>
                        <input type="text" id="racename" name="race_name" class='w3-input'>
                    </p>
                    <p class="tooltip" title="Home planet / galaxy / universe. Yes, even if an alternate Earth.">
                        <label for="racehome">Home / Origin: </label>
                        <textarea id="racehome" name="race_home" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="The average age of this race. If not human years, please specify the scale.">
                        <label for="raceage">Average Age: </label>
                        <input type="text" id="raceage" name="race_age" class='w3-input'>
                    </p>
                    <p class="tooltip" title="Average size. Please list something measurable.">
                        <label for="racesize">Average Height: </label>
                        <input type="text" id="racesize" name="race_size" class='w3-input'>
                    </p>
                    <p class="tooltip" title="Traits, abilities and aspects specific to this race.">
                        <label for="racetraits">Racial Aspects: </label>
                        <textarea id="racetraits" name="race_traits" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="A full, detailed description of the race.">
                        <label for="racedesc">Description: </label>
                        <textarea id="racedesc" name="race_desc" class='w3-textarea'></textarea>
                    </p>
                    <?php
                    if ($username != "Test User") {
                        echo "<button type='submit' id='race_button' name='new_race]'>Add Race / Species</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_other"  class="w3-light-purple-box w3-container infotab" style="display:none">
                <h3 class="w3-display-header">Other Info</h3>
                <p>This is for other information that might not fit in well in the other sections. This one is optional.</p>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <?php
                if (isset($_POST["char_other"])) {
                    echo "<span id='success'>Info successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <form id="charother" method="post" action="newchar.php#character_other">
                    <?php getcharnames($db, $username, $info, "For Character "); ?>
                    <p class="tooltip" title="Self-Explanatory. Can be just the name, the name and a link...whatever you wish.">
                        <label for="othertheme">Theme Song: </label>
                        <input type="text" id="othertheme" name="other_theme" class='w3-input'>
                    </p>
                    <p class="tooltip" title="Self-Explanatory.">
                        <label for="otherquotes">Quotes: </label>
                        <textarea id="otherquotes" name="other_quotes" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Personality quirks, interesting things, or the very literal quirk.">
                        <label for="otherquirks">Quirks: </label>
                        <textarea id="otherquirks" name="other_quirks" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="If a quirk, a short description of it.">
                        <label for="otherquirksdesc">Quirk Description: </label>
                        <textarea id="otherquirksdesc" name="other_quirksdesc" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Can be anything that is considered a weakness.">
                        <label for="otherweak">Weaknesses: </label>
                        <textarea id="otherweak" name="other_weak" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Self-Explanatory.">
                        <label for="otherbackstory">Backstory: </label>
                        <textarea id="otherbackstory" name="other_backstory" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Birthday...What else would it be.">
                        <label for="otherbday">Birthday: </label>
                        <input type="text" id="otherbday" name="other_bday" class='w3-input'>
                    </p>
                    <p class="tooltip" title="Zodiac sign. If you don't know what this is, it isn't important.">
                        <label for="otherzodiac">Zodiac: </label>
                        <input type="text" id="otherzodiac" name="other_zodiac" class='w3-input'>
                    </p>
                    <p class="tooltip" title="Self-Explanatory.">
                        <label for="otherhobbies">Hobbies: </label>
                        <textarea id="otherhobbies" name="other_hobbies" class='w3-textarea'></textarea>
                    </p>
                    <p class="tooltip" title="Any other thing that doesn't have its own area goes here.">
                        <label for="otherother">Other: </label>
                        <textarea id="otherother" name="other_other" class='w3-textarea'></textarea>
                    <p>
                        <?php
                        if ($username != "Test User") {
                            echo "<button type='submit' id='other_button' name='other_stuff'>Add Information</button>";
                        }
                        ?>
                </form>
            </div>
        </div>

    </main>
</body>
