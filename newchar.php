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
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/form.css">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/expanding.jquery.js"></script>
    <script src="scripts/jquery-ui.min.js"></script>
</head>
<body>
    <main>
        <div id="tabs" >
            <ul>
                <li><a href="#gen-info">General Info</a></li>
                <li><a href="#character_info">Information</a></li>
                <li><a href="#character_appearance">Appearance</a></li>
                <li><a href="#character_personality">Personality</a></li>
                <li><a href="#character_stats">Stats</a></li>
                <li><a href="#character_race">Race/Species</a></li>
                <li><a href="#character_other">Other Info</a></li>
            </ul>
            <div id="gen-info">
                <p>This is where you enter data for all your characters</p>
                <p>You cannot leave anything empty, but you can put a "-" if you don't want to put something there.</p>
                <p>Any item can be one word, or a sentence if desired. </p>
                <p>If you need help filling some boxes, head over to the resources page.</p>
                <p>Or, if the box does not apply to your character, check the "Fill blanks" box, and it will put 'N/A' in the box, and you can carry on from there.</p>
                <p>If 'Fill blanks' does not fill a box, that means you have to put something in there.</p>
                <p> However, currently, 'Fill Blanks' works when it wants to. I'm working on fixing it.</p> 
                <p>Last note, some of the formatting / display may be messy. That will be fixed eventually.</p>
                <hr>
                <p><b>Below here, is really important things relating to this.</b></p>
                <p class='important'><b><u>You MUST fill in all the sections, no exceptions. Even if it does not apply to your character, again, use the "fill blanks"!</u></b></p>
                <p class="important"><b>You must add the character information first, and then add the others from there.</b></p>
            </div>
            <div id="character_info">
                <h3>Character Information</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <p>You must fill in the other categories before you are able to add the character.</p>
                <hr>
                <?php
                if (isset($_POST["new_char"])) {
                    echo "<span id='success'>Info successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <label for="fillit" id="filllabel">Fill Blank Spots: </label>
                <input type="checkbox" id="fillit" name="fillempties" onclick ="fillblankschar()">
                <form id="charinfo" method="post" class="align" action="newchar.php#character_info">
                    <div class="tooltip" title="This is the full name of the character">
                        <label for="charname">Full Name: </label>
                        <input type="text" required id="charname" name="char_name"><span class = "error" ></span>
                        <input type="hidden" id="char_name" value="">
                        <br>
                    </div>
                    <div class ="tooltip" title="Their first name only. This will be used for adding objects to this character.">
                        <label for="charname2">Short name: </label>
                        <input type="text" required id="charname2" name="char_name2"><span class = "error"></span>
                        <input type="hidden" id="char_name2" value="">
                        <br>
                    </div>
                    <div class ="tooltip" title="Any given nicknames, or shortened forms of their name.">
                        <label for="charalias">Alias(es): </label>
                        <input type="text" id="charalias" name="char_alias"><span class = "error"></span>
                        <input type="hidden" id="char_alias" value="">
                        <br>
                    </div>
                    <div class ="tooltip" title="A short, one to four sentence description of your character.">
                        <label for="shortdesc">Short Description: </label>
                        <textarea required id="shortdesc" name="short_desc" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="short_desc" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="The age of your character. Can be in years, or in terms of their lifespan.">
                        <label for="charage">Age: </label>
                        <input type="text"  required id="charage" name="char_age"><span class ="error"></span>
                        <input type="hidden" id="char_age" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Their gender. Can be any one, or multiple.">
                        <label for="chargender">Gender</label>
                        <input type="text" id="chargender" name="char_gender"><span class = "error"></span>
                        <input type="hidden" id="char_gender" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="The sexuality, can be anything.">
                        <label for="charsexuality">Sexuality: </label>
                        <input type="text" id="charsexuality" name="char_sexuality"><span class = "error"></span>
                        <input type="hidden" id="char_sexuality" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Use the species section if they are not a human character. Otherwise, this is fine.">
                        <label for="charrace">Race / Species: </label>
                        <input type="text" id="charrace" name="char_race"><span class = "error"></span>
                        <input type="hidden" id="char_race" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="The character's current status. Status effects, active/inactive, and more. Maybe even what they're currently thinking about.">
                        <label for="charstatus">Current Status: </label>
                        <input type="text" id="charstatus" name="char_status"><span class = "error"></span>
                        <input type="hidden" id="char_status" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Soul type is related to the game Undertale, and fan-made variants of it. This can also be their most prominent trait.">
                        <label for="charsoul">Soul Type: </label>
                        <input type="text" id="charsoul" name="char_soul"><span class = "error"></span>
                        <input type="hidden" id="char_soul" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Any other small detail not covered by any of these. Please check the other tabs first though.">
                        <label for="charother">Other: </label>
                        <textarea id="charother" name="char_other" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="char_other" value="">
                        <br>
                    </div>
                    <?php
                    if ($username != "Test User") {
                        echo "<button type='submit' id='char_button' name='new_char'>Add Character!</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_appearance">
                <h3>Character Appearance</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>

                <div id="appearance-tabs" >
                    <ul>
                        <li><a href="#appearance">Physical Appearance</a></li>
                        <li><a href="#clothing">Clothing</a></li>
                    </ul>
                    <div id="appearance">
                        <?php
                        if (isset($_POST["new_appearance"])) {
                            echo "<span id='success'>Description successfuly added!</span>";
                            echo '<br>';
                        }
                        ?>
                        <label for="fillit">Fill Blank Spots: </label>
                        <input type="checkbox" id="fillit" name="fillempties" onclick ="fillblanksappear()">
                        <form id = "charapp" method="post" class = "align" action="newchar.php#character_appearance">                        
                            <input type="hidden" id="char_id" value="">
                            <?php getcharnames($db, $username, $info, "For Character "); ?>
                            <div class="tooltip" title="Eye shape if not human, and eye colour regardless.">
                                <label for="chareyes">Eye Description: </label>
                                <textarea id="chareyes" required name="char_eyes" class='expanding'></textarea><span class = "error"></span>
                                <input type="hidden" id="char_eyes" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Hair colour, length and appearance.">
                                <label for="charhair">Hair Description: </label>
                                <textarea id="charhair" required name="char_hair" class='expanding'></textarea><span class = "error"></span>
                                <input type="hidden" id="char_hair" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="This is really for if they aren't a human character. Elf, cat, wolf fox ears...ect.">
                                <label for="charears">Ears: </label>
                                <input type="text" id="charears" name="char_ears"><span class = "error"></span>
                                <input type="hidden" id="char_ears" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Height can be in any scale, as long as the units are provided.">
                                <label for="charheight">Height: </label>
                                <input type="text" required id="charheight" name="char_height"><span class = "error"></span>
                                <input type="hidden" id="char_height" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Weight can be in any scale, as long as the units are provided.">
                                <label for="charweight">Weight: </label>
                                <input type="text" required id="charweight" name="char_weight"><span class = "error"></span>
                                <input type="hidden" id="char_weight" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Skin tone, fur colour, or scales. And even something not listed.">
                                <label for="charskin">Skin: </label>
                                <textarea id="charskin" name="char_skin" class='expanding'></textarea><span class = "error"></span>
                                <input type="hidden" id="char_skin" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Unique identifying features, if any. Birthmarks, scars, tattoos, ect...">
                                <label for="charweight">Unique Features: </label>
                                <textarea id="charunique" name="char_unique" class='expanding'></textarea><span class = "error"></span>
                                <input type="hidden" id="char_unique" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Anything else not covered.">
                                <label for="charadd">Additional: </label>
                                <textarea id="charadd" name="char_add" class='expanding'></textarea><span class = "error"></span>
                                <input type="hidden" id="char_add" value="">
                                <br>
                            </div>
                            <?php
                                if ($username != "Test User") {
                                    echo "<button type='submit' id='appearance_button' name='new_appearance'>Add Appearance.</button>";
                                }
                            ?>
                        </form>
                    </div>
                    <div id="clothing">
                        <?php
                        if (isset($_POST["new_outfit"])) {
                            echo "<span id='success'>Outfit successfuly added!</span>";
                            echo '<br>';
                        }
                        ?>
                        <label for="fillit">Fill Blank Spots: </label>
                        <input type="checkbox" id="fillit" name="fillempties" onclick ="fillblanksoutfit()">
                        <form id="char_outfit" method="post" class="align" action="newchar.php#character_appearance#clothing">
                            <?php getcharnames($db, $username, $info, "For Character "); ?>
                            <div class="tooltip" title="The name of the outfit, for easy finding later on.">
                                <label for="appname">Outfit Name: </label>
                                <input type="text" id="appname" name="app_name"><span class = "error"></span>
                                <input type="hidden" id="app_name" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Hats.">
                                <label for="apphats">Hats: </label>
                                <input type="text" id="apphats" name="app_hats"><span class = "error"></span>
                                <input type="hidden" id="app_hats" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Rings, Necklaces, Piercings.">
                                <label for="appjewlery">Jewlery: </label>
                                <input type="text" id="appjewlery" name="app_jewlery"><span class = "error"></span>
                                <input type="hidden" id="app_jewlery" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Shirts, tops and undershirts.">
                                <label for="apptop">Top / Shirt: </label>
                                <input type="text" id="apptop" name="app_top"><span class = "error"></span>
                                <input type="hidden" id="app_top" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Pants, Shorts, Bottomwear.">
                                <label for="appbottom">Bottom / Pants: </label>
                                <input type="text" id="appbottom" name="app_bottom"><span class = "error"></span>
                                <input type="hidden" id="app_bottom" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Shoes , Footwear.">
                                <label for="appfeet">Footwear: </label>
                                <input type="text" id="appfeet" name="app_feet"><span class = "error"></span>
                                <input type="hidden" id="app_feet" value="">
                                <br>
                            </div>
                            <?php
                            if ($username != "Test User") {
                                    echo "<button type='submit' id='outfit_button' name='new_outfit'>Add Outfit!</button>";
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <div id="character_personality">
                <h3>Character Personality</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <?php
                if (isset($_POST["new_pers"])) {
                    echo "<span id='success'>Personality successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <label for="fillit">Fill Blank Spots: </label>
                <input type="checkbox" id="fillit" name="fillempties" onclick ="fillblankspers()">
                <form id="char_pers" method="post" class="align" action="newchar.php#character_personality">
                    <?php getcharnames($db, $username, $info, "For Character "); ?>
                    <div class="tooltip" title="The lifestyle of this character. Are they lazy, active? Something different?">
                        <label for="charact">Activity: </label>
                        <input type="text" id="charact" name="char_act"><span class = "error"></span>
                        <input type="hidden" id="char_act" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How agreeable, or cooperative this character is.">
                        <label for="charagree">Agreeableness: </label>
                        <input type="text" id="charagree" name="char_agree"><span class = "error"></span>
                        <input type="hidden" id="char_agree" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How assertive, or how well this character can lead others.">
                        <label for="charassert">Assertiveness: </label>
                        <input type="text" id="charassert" name="char_assert"><span class = "error"></span>
                        <input type="hidden" id="char_assert" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How confident this character is with themselves and their choices.">
                        <label for="charconf">Confidence: </label>
                        <input type="text" id="charconf" name="char_conf"><span class = "error"></span>
                        <input type="hidden" id="char_conf" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How disciplined, or motivated this character is.">
                        <label for="chardisc">Discipline: </label>
                        <input type="text" id="chardisc" name="char_disc"><span class = "error"></span>
                        <input type="hidden" id="char_disc" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How well the character can recognize, express and control their emotions.">
                        <label for="charemocap">Emotional Capacity: </label>
                        <input type="text" id="charemocap" name="char_emocap"><span class = "error"></span>
                        <input type="hidden" id="char_emocap" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How friendly this character is.">
                        <label for="charfriend">Friendliness: </label>
                        <input type="text" id="charfriend" name="char_friend"><span class = "error"></span>
                        <input type="hidden" id="char_friend" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How honest this character is with others.">
                        <label for="charhonest">Honesty: </label>
                        <input type="text" id="charhonest" name="char_honest"><span class = "error"></span>
                        <input type="hidden" id="char_honest" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How smart, or intelligent this character is.">
                        <label for="charintel">Intelligence: </label>
                        <input type="text" id="charintel" name="char_intel"><span class = "error"></span>
                        <input type="hidden" id="char_intel" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How polite or rude this character is.">
                        <label for="charmanners">Manners: </label>
                        <input type="text" id="charmanners" name="char_manners"><span class = "error"></span>
                        <input type="hidden" id="char_manners" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="This character's general outlook on life. Are they upbeat, depressed...something different?">
                        <label for="charpos">Positivity: </label>
                        <input type="text" id="charpos" name="char_pos"><span class = "error"></span>
                        <input type="hidden" id="char_pos" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How likely this character is to rebel against a given plan, situation or rules.">
                        <label for="charrebel">Rebelliousness: </label>
                        <input type="text" id="charrebel" name="char_rebel"><span class = "error"></span>
                        <input type="hidden" id="char_rebel" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="The personality type. Can be Meyers-Briggs, Big 5, or any other type.">
                        <label for="charperstype">Personality Type: </label>
                        <input type="text" required id="charperstype" name="char_perstype"><span class = "error"></span>
                        <input type="hidden" id="char_perstype" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Description of their personality, if the other areas don't quite fit.">
                        <label for="charpersdesc">Description (Optional): </label>
                        <textarea id="charpersdesc" name="char_persdesc" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="char_persdesc" value="">
                        <br>
                    </div>
                    <?php
                    if ($username != "Test User") {
                            echo "<button type='submit' id='pers_button' name='new_pers'>Add Personality.</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_stats">
                <h3>Character Stats</h3>
                <p>You would use these, usually for tabletop based games. But you can use them for other purposes.</p>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <?php
                if (isset($_POST["new_stats"])) {
                    echo "<span id='success'>Stats successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <label for="fillit">Fill Blank Spots: </label>
                <input type="checkbox" id="fillit" name="fillempties" onclick ="fillblanksstats()">
                <form id="charstats" method="post" class ="align" action="newchar.php#character_stats">
                    <?php getcharnames($db, $username, $info, "For Character "); ?>
                    <div class="tooltip" title="Character health, or hit points.">
                        <label for="stathealth">Health / Hit Points: </label>
                        <input type="text" required id="stathealth" name="stat_health"><span class = "error"></span>
                        <input type="hidden" id="stat_health" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Stamina, or endurance of the character.">
                        <label for="statstam">Stamina: </label>
                        <input type="text" id="statstam" name="stat_stam"><span class = "error"></span>
                        <input type="hidden" id="stat_stam" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Mana, Magicka, or Magical energy the character has.">
                        <label for="statmana">Mana / Magicka: </label>
                        <input type="text" id="statmana" name="stat_mana"><span class = "error"></span>
                        <input type="hidden" id="stat_mana" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Level of the character.">
                        <label for="statlevel">Level: </label>
                        <input type="text" id="statlevel" name="stat_level"><span class = "error"></span>
                        <input type="hidden" id="stat_level" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Current experience level.">
                        <label for="statexp">Experience Level: </label>
                        <input type="text" id="statexp" name="stat_exp"><span class = "error"></span>
                        <input type="hidden" id="stat_exp" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How quick on their feet the character is.">
                        <label for="statagile">Agility: </label>
                        <input type="text" id="statagile" name="stat_agile"><span class = "error"></span>
                        <input type="hidden" id="stat_agile" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How strong your character is.">
                        <label for="statstrong">Strength: </label>
                        <input type="text" id="statstrong" name="stat_strong"><span class = "error"></span>
                        <input type="hidden" id="stat_strong" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="The ability of your character to influence those around them.">
                        <label for="statchar">Charisma: </label>
                        <input type="text" id="statchar" name="stat_char"><span class = "error"></span>
                        <input type="hidden" id="stat_char" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="How observant your character is of others, or the surrounding environment.">
                        <label for="statpercep">Perception: </label>
                        <input type="text" id="statpercep" name="stat_percep"><span class = "error"></span>
                        <input type="hidden" id="stat_percep" value="">
                        <br>
                    </div>
                    <?php
                    if ($username != "Test User") {
                            echo "<button type='submit' id='stat_button' name='new_stats'>Add stats.</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_race">
                <h3>Character Species.</h3>
                <p>If your character is not human, use this section. Otherwise it is not needed.</p>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <?php
                if (isset($_POST["new_race"])) {
                    echo "<span id='success'>Race successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <label for="fillit" id="filllabel">Fill Blank Spots: </label>
                <input type="checkbox" id="fillit" name="fillempties" onclick ="fillblanksrace()">
                <?php getcharnames($db, $username, $info, "For Character "); ?>
                <form id="charspecies" method="post" class ="align" action="newchar.php#character_race">
                    <div class="tooltip" title="The name of the species / race.">
                        <label for="racename">Name: </label>
                        <input type="text" id="racename" name="race_name"><span class = "error"></span>
                        <input type="hidden" id="race_name" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Home planet / galaxy / universe. Yes, even if an alternate Earth.">
                        <label for="racehome">Home / Origin: </label>
                        <textarea id="racehome" name="race_home" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="race_home" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="The average age of this race. If not human years, please specify the scale.">
                        <label for="raceage">Average Age: </label>
                        <input type="text" id="raceage" name="race_age"><span class = "error"></span>
                        <input type="hidden" id="race_age" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Average size. Please list something measurable.">
                        <label for="racesize">Average Height: </label>
                        <input type="text" id="racesize" name="race_size"><span class = "error"></span>
                        <input type="hidden" id="race_size" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Traits, abilities and aspects specific to this race.">
                        <label for="racetraits">Racial Aspects: </label>
                        <input type="text" id="racetraits" name="race_traits"><span class = "error"></span>
                        <input type="hidden" id="race_traits" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="A full, detailed description of the race.">
                        <label for="racedesc">Description: </label>
                        <textarea id="racedesc" name="race_desc" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="race_desc" value="">
                        <br>
                    </div>
                    <?php
                    if ($username != "Test User") {
                            echo "<button type='submit' id='race_button' name='new_race]'>Add Race / Species</button>";
                    }
                    ?>
                </form>
            </div>
            <div id="character_other">
                <h3>Other Info</h3>
                <p>This is for other information that might not fit in well in the other sections. This one is optional.</p>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <?php
                if (isset($_POST["char_other"])) {
                    echo "<span id='success'>Info successfuly added!</span>";
                    echo '<br>';
                }
                ?>
                <label for="fillit" id="filllabel">Fill Blank Spots: </label>
                <input type="checkbox" id="fillit" name="fillempties" onclick ="fillblanksother()">
                <form id="charother" method="post" class ="align" action="newchar.php#character_other">
                    <?php getcharnames($db, $username, $info, "For Character "); ?>
                    <div class="tooltip" title="Self-Explanatory. Can be just the name, the name and a link...whatever you wish.">
                        <label for="othertheme">Theme Song: </label>
                        <input type="text" id="othertheme" name="other_theme"><span class = "error"></span>
                        <input type="hidden" id="other_theme" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Self-Explanatory.">
                        <label for="otherquotes">Quotes: </label>
                        <textarea id="otherquotes" name="other_quotes" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="other_quotes" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Personality quirks, interesting things, or the very literal quirk.">
                        <label for="otherquirks">Quirks: </label>
                        <textarea id="otherquirks" name="other_quirks" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="other_quirks" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="If a quirk, a short description of it.">
                        <label for="otherquirksdesc">Quirk Description: </label>
                        <textarea id="otherquirksdesc" name="other_quirksdesc" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="other_quirksdesc" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Can be anything that is considered a weakness.">
                        <label for="otherweak">Weaknesses: </label>
                        <textarea id="otherweak" name="other_weak" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="other_weak" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Self-Explanatory.">
                        <label for="otherbackstory">Backstory: </label>
                        <textarea id="otherbackstory" name="other_backstory" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="other_backstory" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Birthday...What else would it be.">
                        <label for="otherbday">Birthday: </label>
                        <input type="text" id="otherbday" name="other_bday"><span class = "error"></span>
                        <input type="hidden" id="other_bday" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Zodiac sign. If you don't know what this is, it isn't important.">
                        <label for="otherzodiac">Zodiac: </label>
                        <input type="text" id="otherzodiac" name="other_zodiac"><span class = "error"></span>
                        <input type="hidden" id="other_zodiac" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Self-Explanatory.">
                        <label for="otherhobbies">Hobbies: </label>
                        <textarea id="otherhobbies" name="other_hobbies" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="other_hobbies" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Any other thing that doesn't have its own area goes here.">
                        <label for="otherother">Other: </label>
                        <textarea id="otherother" name="other_other" class='expanding'></textarea><span class = "error"></span>
                        <input type="hidden" id="other_other" value="">
                        <br>
                    </div>
                    <?php
                    if ($username != "Test User") {
                            echo "<button type='submit' id='other_button' name='other_stuff'>Add Information</button>";
                    }
                    ?>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="scripts/addthings.js"></script>
        <script>
                    jQuery(document).ready(function ($) {
                        $("#tabs").tabs();
                        $("#appearance-tabs").tabs();
                    });
        </script>
    </main>
</body>
