<!DOCTYPE html> 
<?php
require('inc/functions.php');
$charID = $_GET['char_ID'];

$charInfo = getCharInfo($db, $charID);
$charAppear = getCharAppearance($db, $charID);
$charSettings = getCharSettings($db, $charID);
$charOmega = getCharOmega($db, $charID); //Get it even if it's not true, we handle it anyways. 

$omegaTimeline = false; // When you mistakenly invalidate the entire timeline in one single line of code. Oops.

if (!empty($charSettings)) {
    if ($charSettings["Char_IsOmegaTimeline"] == 1) {
        $omegaTimeline = true; // Hey, it's validated again!
    } else {
        $omegaTimeline = false; // Ah, bollocks. 
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Viewing Character - <?php echo $charInfo[2]; ?></title>
        <link href="https://unpkg.com/@csstools/normalize.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/w3-min.css">
        <link rel="stylesheet" href="css/viewchar.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
            <div class="w3-tab pale-purple">
                <button class="tab-item button tablink" onclick="opentab('character_info')">Character Info</button>
                <button class="tab-item button tablink" onclick="opentab('character_appearance')">Appearance</button>
                <button class="tab-item button tablink" onclick="opentab('character_personality')">Personality</button>
                <button class="tab-item button tablink" onclick="opentab('character_race')">Race</button>
                <?php
                if ($omegaTimeline) {
                    echo "<button class='tab-item button tablink' id='omegalink' onclick=\"opentab('character_omega')\">Omega Timeline</button>";
                }
                ?>
                <button class="tab-item button tablink" onclick="opentab('character_other')">Other</button>
            </div>
            <div id='character_info' class="light-purple box container infotab">
                <h3 class="display-header">Character Information</h3>
                <hr>
                <p>
                    <label for="charname">Full Name: </label>
                    <span id="charname" class='display'><?php echo $charInfo[2]; ?></span>
                </p>
                <p class ="tooltip" title="Any nicknames, or shortened forms of their name.">
                    <label for="charalias">Alias(es): </label>
                    <span id="charalias" class='display'><?php echo $charInfo[3]; ?></span>
                </p><p>
                    <label for="shortdesc">Short Description: </label>
                    <span id="shortdesc" class='display'><?php echo $charInfo[4]; ?></span>
                </p><p>
                    <label for="charage">Age: </label>
                    <span id="charage" class="display"><?php echo $charInfo[5]; ?></span>
                </p><p>
                    <label for="chargender">Gender: </label>
                    <span id="chargender" class='display'><?php echo $charInfo[6]; ?></span>
                </p><p>
                    <label for="charrace">Race / Species: </label>
                    <span id="charrace" class='display'><?php echo $charInfo[7]; ?></span>
                </p>
            </div>
            <div id="character_appearance" class="light-purple box shadow-816 container infotab" style="display:none;">
                <h3 class="display-header">Character Appearance</h3>
                <hr>
                <p>
                    <label for="charapp">Appearance Description: </label>
                <section id="charapp" class='textdisplay'><?php echo $charAppear[2]; ?></section>
                </p>
                <?php
                if ($charAppear[3] == 0) {
                    echo "<div style=\"display=none;\">";
                } else {
                    echo '<div>';
                }
                ?>
                <p>
                    <label for="chareyes">Eye Description: </label>
                    <span id="chareyes" class='display'><?php echo $charAppear[4]; ?></span>
                </p><p>
                    <label for="charhair">Hair Description: </label>
                    <span id="charhair" class='display'><?php echo $charAppear[5]; ?></span>
                </p><p>
                    <label for="charears">Ears: </label>
                    <span id="charears" class='display'><?php echo $charAppear[6]; ?></span>
                </p><p>
                    <label for="charheight">Height: </label>
                    <span id="charheight" class='display'><?php echo $charAppear[7]; ?></span>
                </p><p>
                    <label for="charweight">Weight: </label>
                    <span id="charweight" class='display'><?php echo $charAppear[8]; ?></span>
                </p><p>
                    <label for="charskin">Skin: </label>
                    <span id="charskin" class='display'><?php echo $charAppear[9]; ?></span>
                </p> <p>
                    <label for="charweight">Unique Features: </label>
                    <span id="charunique" class='display'><?php echo $charAppear[10]; ?></span>
                </p><p>
                    <label for='appearother'>Other: </label>
                    <span id='appearother' class=''display'><?php echo $charAppear[11]; ?></span>
                </p>
            </div>
        </div>
        <div id="character_personality" class="light-purple box shadow-816 container infotab" style="display:none;">
            <h3 class="display-header">Character Personality</h3>
            <p>You can hover over each entry to learn more about what it is.</p>
            <hr>
            <p class="tooltip" title="Their personality description.">
                <label for="persdesc">Personality Description:</label>
                <textarea id="charpersdesc" class="textbox" name="pers_desc"></textarea>
            </p>
            <p class="tooltip" title="The personality type. Can be Meyers-Briggs (Big 16), Big 5, or any other type.">
                <label for="charperstype">Personality Type: </label>
                <input type="text" id="charperstype" class='textinput' name="pers_type">
            </p>
            <p class="tooltip" title="Enables or disables listing detailed personality aspects.">
                <label for="advperscheck">Enable/Disable Detailed Personality:</label>
                <input type="checkbox" id="advperscheck" onchange="persCheck()" class="w3-checkbox"  name="hasadvpers">
            </p>
            <div id="adv_pers" style="display:none">
                <p class="tooltip" title="The lifestyle of this character. Are they lazy, active? Something different?">
                    <label for="charact">Activity: </label>
                    <input type="text" id="charact" class='textinput' name="char_act">
                </p>
                <p class="tooltip" title="How agreeable, or cooperative this character is.">
                    <label for="charagree">Agreeableness: </label>
                    <input type="text" id="charagree" class='textinput' name="char_agree">
                </p>
                <p class="tooltip" title="How assertive, or how well this character can lead others.">
                    <label for="charassert">Assertiveness: </label>
                    <input type="text" id="charassert" class='textinput' name="char_assert">
                </p>
                <p class="tooltip" title="How confident this character is with themselves and their choices.">
                    <label for="charconf">Confidence: </label>
                    <input type="text" id="charconf" class='textinput' name="char_conf">
                </p>
                <p class="tooltip" title="How disciplined, or motivated this character is.">
                    <label for="chardisc">Discipline: </label>
                    <input type="text" id="chardisc" class='textinput' name="char_disc">
                </p>
                <p class="tooltip" title="How well the character can recognize, express and control their emotions.">
                    <label for="charemocap">Emotional Capacity: </label>
                    <input type="text" id="charemocap" class='textinput' name="char_emocap">
                </p>
                <p class="tooltip" title="How friendly this character is.">
                    <label for="charfriend">Friendliness: </label>
                    <input type="text" id="charfriend" class='textinput' name="char_friend">
                </p>
                <p class="tooltip" title="How honest this character is with others.">
                    <label for="charhonest">Honesty: </label>
                    <input type="text" id="charhonest" class='textinput' name="char_honest">
                </p>
                <p class="tooltip" title="How smart, or intelligent this character is.">
                    <label for="charintel">Intelligence: </label>
                    <input type="text" id="charintel" class='textinput' name="char_intel">
                </p>
                <p class="tooltip" title="How polite or rude this character is.">
                    <label for="charmanners">Manners: </label>
                    <input type="text" id="charmanners" class='textinput' name="char_manners">
                </p>
                <p class="tooltip" title="This character's general outlook on life. Are they upbeat, depressed...something different?">
                    <label for="charpos">Positivity: </label>
                    <input type="text" id="charpos" class='textinput' name="char_pos">
                </p>
                <p class="tooltip" title="How likely this character is to rebel against a given plan, situation or rules.">
                    <label for="charrebel">Rebelliousness: </label>
                    <input type="text" id="charrebel" class='textinput' name="char_rebel">
                </p>
            </div>
        </div>
        <div id="character_race" class="light-purple box shadow-816 container infotab" style="display:none;">
            <h3 class="display-header">Character Species / Race.</h3>
            <hr>
            <p>
                <label for="racename">Name: </label>
                <input type="text" id="racename" name="race_name" class='textinput'>
            </p>
            <p>
                <label for="racehome">Home / Origin: </label>
                <textarea id="racehome" name="race_home" class='textbox'></textarea>
            </p>
            <p>
                <label for="raceage">Average Age: </label>
                <input type="text" id="raceage" name="race_age" class='textinput'>
            </p>
            <p>
                <label for="racesize">Average Height: </label>
                <input type="text" id="racesize" name="race_size" class='textinput'>
            </p>
            <p>
                <label for="racetraits">Racial Aspects: </label>
                <textarea id="racetraits" name="race_traits" class='textbox'></textarea>
            </p>
            <p>
                <label for="racedesc">Description: </label>
                <textarea id="racedesc" name="race_desc" class='textbox'></textarea>
            </p>
        </div>
        <div id="character_omega" class="light-purple box shadow-816 container infotab" style="display:none;">
            <h3 class="display-header">The Omega Timeline</h3>
            <p>
                The Omega Timeline is a dimension which is a massive melting pot of various Undertale and Deltarune timelines and alternate universes. These are all connected in some way shape or form.
                <br>(Hover over each entry to get more information.)
            </p>
            <hr>
            <p>
                <label for="omegaaudesc">Alternate Universe (AU): </label>
            <section id="omegaaudesc" class='textdisplay'><?php echo $charOmega[2]; ?></section>
            </p>
            <p>
                <label for="omegapers">Personality (if different from main) : </label>
            <section id="omegapers" class='textdisplay'><?php echo $charOmega[3]; ?></section>
            </p>
            <label for="omegadesc">Backstory / History: </label>
            <section id="omegadesc" class='textdisplay'><?php echo $charOmega[4]; ?></section>
            <p>
                <label for="omegastory">Involvement in the story: </label>
            <section id="omegastory" class='textdisplay'><?php echo $charOmega[5]; ?></section>
            </p>
            <p>
                <label for="omegareason">Reason for joining the OT: </label>
            <section id="omegareason" class='textdisplay'><?php echo $charOmega[6]; ?></section>
            </p>
        </div>
        <div id="character_other"  class="light-purple box shadow-816 container infotab" style="display:none;">
            <h3 class="display-header">Other Info</h3>
            <p>This is for other information that might not fit in well in the other sections. This one is optional.</p>
            <p>You can hover over each entry to learn more about what it is.</p>
            <hr>
            <p>
                <label for="othertheme">Theme Song: </label>
                <input type="text" id="othertheme" name="other_theme" class='textinput'>
            </p>
            <p>
                <label for="otherquotes">Quotes: </label>
                <textarea id="otherquotes" name="other_quotes" class='textbox'></textarea>
            </p>
            <p>
                <label for="otherquirks">Quirks: </label>
                <textarea id="otherquirks" name="other_quirks" class='textbox'></textarea>
            </p>
            <p>
                <label for="otherquirksdesc">Quirk Description: </label>
                <textarea id="otherquirksdesc" name="other_quirksdesc" class='textbox'></textarea>
            </p>
            <p>
                <label for="otherweak">Weaknesses: </label>
                <textarea id="otherweak" name="other_weak" class='textbox'></textarea>
            </p>
            <p>
                <label for="otherbday">Birthday: </label>
                <input type="text" id="otherbday" name="other_bday" class='textinput'>
            </p>
            <p>
                <label for="otherzodiac">Zodiac: </label>
                <input type="text" id="otherzodiac" name="other_zodiac" class='textinput'>
            </p>
            <p>
                <label for="otherhobbies">Hobbies: </label>
                <textarea id="otherhobbies" name="other_hobbies" class='textbox'></textarea>
            </p>
            <p>
                <label for="otherother">Other: </label>
                <textarea id="otherother" name="other_other" class='textbox'></textarea>
            <p>
        </div>
        <script type="text/javascript">
            function opentab(pagename) {
                var i, x;
                x = document.getElementsByClassName("infotab");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                document.getElementById(pagename).style.display = "block";
            }
        </script>
    </main>
</body>
</html>
