<!DOCTYPE html> 
<?php
require('inc/functions.php');
$charID = $_GET['char_ID'];

$charInfo = getCharInfo($db, $charID);
$charAppear = getCharAppearance($db, $charID);
$charPers = getCharPers($db, $charID);
$charRace = getCharRace($db, $charID);
$charOmega = getCharOmega($db, $charID); //Get it even if it's not true, we handle it anyways. 
$charOther = getCharOther($db, $charID);
$charSettings = getCharSettings($db, $charID);

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
                <button class="tab-item button tablink" onclick="opentab('general_info')">General Info</button>
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
            <div id="general_info" class="light-purple box container infotab">
                
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
                    <section id="shortdesc" class='textdisplay'><?php echo $charInfo[4]; ?></section>
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
                    echo "<div class='hiddendiv'>";
                } else {
                    echo "<div class='visiblediv'>";
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
                <section id="charpersdesc" class="textdisplay"><?php echo $charPers[2]; ?></section>
            </p><p>
                <label for="charperstype">Personality Type: </label>
                <span id="charperstype" class='display'><?php echo $charPers[3]; ?></span>
            </p><p>
                <label for="persalign">Alignment: </label>
                <span id="persalign" class='display'><?php echo $charPers[4]; ?></span>
            </p>
            <?php
                if ($charPers[5] == 0) {
                    echo "<div class='hiddendiv'>";
                } else {
                    echo "<div class='visiblediv'>";
                }
            ?>
                <p class="tooltip" title="The lifestyle of this character.">
                    <label for="charact">Activity: </label>
                    <span id="charact" class='display'><?php echo $charPers[6]; ?></span>
                </p>
                <p class="tooltip" title="How agreeable, or cooperative this character is.">
                    <label for="charagree">Agreeableness: </label>
                    <span id="charagree" class='display'><?php echo $charPers[7]; ?></span>
                </p>
                <p class="tooltip" title="How assertive, or how well this character can lead others.">
                    <label for="charassert">Assertiveness: </label>
                    <span id="charassert" class='display'><?php echo $charPers[8]; ?></span>
                </p>
                <p class="tooltip" title="How confident this character is with themselves and their choices.">
                    <label for="charconf">Confidence: </label>
                    <span id="charconf" class='display'><?php echo $charPers[9]; ?></span>
                </p>
                <p class="tooltip" title="How disciplined, or motivated this character is.">
                    <label for="chardisc">Discipline: </label>
                    <span id="chardisc" class='display'><?php echo $charPers[10]; ?></span>
                </p>
                <p class="tooltip" title="How well the character can recognize, express and control their emotions.">
                    <label for="charemocap">Emotional Capacity: </label>
                    <span id="charemocap" class='display'><?php echo $charPers[11]; ?></span>
                </p>
                <p class="tooltip" title="How friendly this character is.">
                    <label for="charfriend">Friendliness: </label>
                    <span id="charfriend" class='display'><?php echo $charPers[12]; ?></span>
                </p>
                <p class="tooltip" title="How honest this character is with others.">
                    <label for="charhonest">Honesty: </label>
                    <span id="charhonest" class='display'><?php echo $charPers[13]; ?></span>
                </p>
                <p class="tooltip" title="How smart, or intelligent this character is.">
                    <label for="charintel">Intelligence: </label>
                    <span id="charintel" class='display'><?php echo $charPers[14]; ?></span>
                </p>
                <p class="tooltip" title="How polite or rude this character is.">
                    <label for="charmanners">Manners: </label>
                    <span id="charmanners" class='display'><?php echo $charPers[15]; ?></span>
                </p>
                <p class="tooltip" title="This character's general outlook on life.">
                    <label for="charpos">Positivity: </label>
                    <span id="charpos" class='display'><?php echo $charPers[16]; ?></span>
                </p>
                <p class="tooltip" title="How likely this character is to rebel against a given plan, situation or rules.">
                    <label for="charrebel">Rebelliousness: </label>
                    <span id="charrebel" class='display'><?php echo $charPers[17]; ?></span>
                </p>
            </div>
        </div>
        <div id="character_race" class="light-purple box shadow-816 container infotab" style="display:none;">
            <h3 class="display-header">Character Species / Race.</h3>
            <hr>
            <p>
                <label for="racename">Name: </label>
                <section id="racename" class='display'><?php echo $charRace[2]; ?></section>
            </p><p>
                <label for="racedesc">Description: </label>
                <section id="racedesc" class='display'><?php echo $charRace[3]; ?></section>
            </p>
            <p class="tooltip" title="Traits, abilities and aspects specific to this race.">
                <label for="racetraits">Racial Aspects: </label>
                <section id="racetraits" class='display'><?php echo $charRace[4]; ?></section>
            </p><p>
                <label for="racetraits">Race Background: </label>
                <section id="racetraits" class='display'><?php echo $charRace[5]; ?></section>
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
            </p><p>
                <label for="omegapers">Personality (if different from main) : </label>
                <section id="omegapers" class='textdisplay'><?php echo $charOmega[3]; ?></section>
            </p>
                <label for="omegadesc">Backstory / History: </label>
                <section id="omegadesc" class='textdisplay'><?php echo $charOmega[4]; ?></section>
            <p>
                <label for="omegastory">Involvement in the story: </label>
                <section id="omegastory" class='textdisplay'><?php echo $charOmega[5]; ?></section>
            </p><p>
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
                <span id="othertheme" class='display'><?php echo $charOther[2]; ?></span>
            </p><p>
                <label for="otherquotes">Quotes: </label>
                <span id="otherquotes" class='display'><?php echo $charOther[3]; ?></span>
            </p><p>
                <label for="otherquirks">Quirks: </label>
                <span id="otherquirks" class='display'><?php echo $charOther[4]; ?></span>
            </p><p>
                <label for="otherquirksdesc">Quirk Description: </label>
                <section id="otherquirksdesc" class='textdisplay'><?php echo $charOther[5]; ?></section>
            </p><p>
                <label for="otherweak">Weaknesses: </label>
                <section id="otherweak" class='textdisplay'><?php echo $charOther[6]; ?></section>
            </p><p>
                <label for="otherbday">Birthday: </label>
                <span id="otherbday" class='display'><?php echo $charOther[7]; ?></span>
            </p><p>
                <label for="otherzodiac">Zodiac: </label>
                <span id="otherzodiac" class='display'><?php echo $charOther[8]; ?></span>
            </p><p>
                <label for="otherhobbies">Hobbies: </label>
                <section id="otherhobbies" class='textdisplay'><?php echo $charOther[9]; ?></section>
            </p><p>
                <label for="otherother">Other: </label>
                <section id="otherother" class='textdisplay'><?php echo $charOther[10]; ?></section>
            </p>
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
