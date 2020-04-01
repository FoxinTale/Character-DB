<!DOCTYPE html>
<?php
require_once('inc/addchar.php');
?>
<head>
    <meta charset="UTF-8">
    <title>New Character</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/chars.css">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/jquery-ui.min.js"></script>
</head>
<body>
    <main>
        <div id="tabs" >
            <ul>
                <li><a href="#character_info">Information</a></li>
                <li><a href="#character_appearance">Appearance</a></li>
                <li><a href="#character_personality">Personality</a></li>
                <li><a href="#character-stats">Stats</a></li>
                <li><a href="#character-race">Race/Species</a></li>
            </ul>
            <div id="character_info">
                <h3>Character Information</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <p>You must fill in the other categories before you are able to add the character.</p>
                <hr>
                <form id="charinfo" method="post" class="align" action="newchar.php">
                    <div class="tooltip" title="This is the name of the character">
                        <label for="charname">Character Name: </label>
                        <input type="text" id="charname" name="char_name"><span class = "error" ></span>
                        <input type="hidden" id="char_name" value="">
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
                        <input type="text" id="shortdesc" name="short_desc"><span class = "error"></span>
                        <input type="hidden" id="short_desc" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="The age of your character. Can be in years, or in terms of their lifespan.">
                        <label for="charage">Age: </label>
                        <input type="text" id="charage" name="char_age"><span class ="error"></span>
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
                    <div class="tooltip" title="The character's current status. Status effects, active/inactive, and more.">
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
                        <input type="text" id="charother" name="char_other"><span class = "error"></span>
                        <input type="hidden" id="char_other" value="">
                        <br>
                    </div>
                    <button type="submit" id="char_button" name="new_char">Add Character!</button>
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
                        <form id = "charapp" method="post" class = "align" action="newchar.php">
                            <input type="hidden" id="char_id" value="">
                            <div class="tooltip" title="Eye shape if not human, and eye colour regardless.">
                                <label for="chareyes">Eye Description: </label>
                                <input type="text" id="chareyes" name="char_eyes"><span class = "error"></span>
                                <input type="hidden" id="char_eyes" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Hair colour, length and appearance.">
                                <label for="charhair">Hair Description: </label>
                                <input type="text" id="charhair" name="char_hair"><span class = "error"></span>
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
                                <input type="text" id="charheight" name="char_height"><span class = "error"></span>
                                <input type="hidden" id="char_height" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Weight can be in any scale, as long as the units are provided.">
                                <label for="charweight">Weight: </label>
                                <input type="text" id="charweight" name="char_weight"><span class = "error"></span>
                                <input type="hidden" id="char_weight" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Skin tone, fur colour, or scales. And even something not listed.">
                                <label for="charskin">Skin: </label>
                                <input type="text" id="charskin" name="char_skin"><span class = "error"></span>
                                <input type="hidden" id="char_skin" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Unique identifying features, if any. Birthmarks, scars, tattoos, ect...">
                                <label for="charweight">Unique Features: </label>
                                <input type="text" id="charunique" name="char_unique"><span class = "error"></span>
                                <input type="hidden" id="char_unique" value="">
                                <br>
                            </div>
                            <div class="tooltip" title="Anything else not covered.">
                                <label for="charadd">Additional: </label>
                                <input type="text" id="charadd" name="char_add"><span class = "error"></span>
                                <input type="hidden" id="char_add" value="">
                                <br>
                            </div>
                            <button type="submit" id="appearance_button" name="new_appearance">Add Appearance.</button>  
                        </form>
                    </div>
                    <div id="clothing">
                        <form id="char_outfit" method="post" class="align" action="newchar.php">
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
                            <button type="submit" id="outfit_button" name="new_outfit">Add Outfit!</button> 
                        </form>
                    </div>
                </div>
            </div>
            <div id="character_personality">
                <h3>Character Personality</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <form id="char_pers" method="post" class="align" action="newchar.php">
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
                        <input type="text" id="charperstype" name="char_perstype"><span class = "error"></span>
                        <input type="hidden" id="char_perstype" value="">
                        <br>
                    </div>
                    <button type="submit" id="pers_button" name="new_pers">Add Personality.</button>
                </form>
            </div>
            <div id="character-stats">
                <h3>Character Stats</h3>
                <p>You would use these, usually for tabletop based games. But you can use them for other purposes.</p>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <form id="charstats" method="post" class ="align" action="newchar.php">
                    <div class="tooltip" title="Character health, or hit points.">
                        <label for="stathealth">Health / Hit Points: </label>
                        <input type="text" id="stathealth" name="stat_health"><span class = "error"></span>
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
                    <button type="submit" id="stat_button" name="new_stats">Add stats.</button>
                </form>
            </div>
            <div id="character-race">
                <h3>Character Species.</h3>
                <p>If your character is not human, use this section. Otherwise it is not needed.</p>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <form id="charspecies" method="post" class ="align" action="newchar.php">
                    <div class="tooltip" title="The name of the species / race.">
                        <label for="racename">Name: </label>
                        <input type="text" id="racename" name="race_name"><span class = "error"></span>
                        <input type="hidden" id="race_name" value="">
                        <br>
                    </div>
                    <div class="tooltip" title="Home planet / galaxy / universe. Yes, even if an alternate Earth.">
                        <label for="racehome">Home / Origin: </label>
                        <input type="text" id="racehome" name="race_home"><span class = "error"></span>
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
                    <button type="submit" id="race_button" name="new_race">Add Race / Species</button>
                </form>
            </div>
        </div>
        <!--
        Theme Song
        Quirks
        Quote(s)
        Weakness(es)
        -->
        <script>
            jQuery(document).ready(function ($) {
                $("#tabs").tabs();
                $("#appearance-tabs").tabs();
            });
            $(function () {
                $(document).tooltip();
            });
        </script>
    </main>
</body>
