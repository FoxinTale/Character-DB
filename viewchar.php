<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Viewing Character</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="css/display.css">
        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/jquery-ui.min.js"></script>
    </head>
    <body>
        <?php
        include 'inc/functions.php';
        $charname = $_POST["charname"];
        $charinfo = getcharinfo($db, $charname);
        $charappear = getcharappear($db, $charname);
        $charpers = getcharpers($db, $charname);
        $charoutfit = getoutfit($db, $charname);
        $charrace = getrace($db, $charname);
        $charstat = getcharstats($db, $charname);
        $charother = getother($db, $charname);
        
        $nya = "Not Yet Added";
        ?>
        <!-- Warning, there is an exessive useage of divs up ahead. This is because textareas are a pain to work with -->
        <div id="accordion">
            <h3>Basic Information about <?php echo $charname; ?>.</h3>
            <div class="display">
                <label for="charname" id ="charnamelabel">Full Name: </label>
                <input type="text" readonly id="charname" name="char_name" value="<?php echo $charinfo['char_fullname']; ?>"> 
                <br>
                <label for="charname2">Short name: </label>
                <input type="text" readonly id="charname2" name="char_name2" value="<?php echo $charinfo['char_name']; ?>">
                <br>
                <label for="charalias">Alias(es): </label>
                <input type="text" readonly id="charalias" name="char_alias" value="<?php echo $charinfo['char_alias']; ?>">
                <br>
                <label for="shortdesc">Short Description: </label>
                <div id="shortdesc" class="textdiv"> <?php echo $charinfo['char_desc']; ?></div>
                <br>
                <label for="charage">Age: </label>
                <input type="text" readonly id="charage" name="char_age" value="<?php echo $charinfo['char_age']; ?>">
                <br>
                <label for="chargender">Gender</label>
                <input type="text" readonly id="chargender" name="char_gender" value="<?php echo $charinfo['char_gender']; ?>">
                <br>
                <label for="charsexuality">Sexuality: </label>
                <input type="text" readonly id="charsexuality" name="char_sexuality" value="<?php echo $charinfo['char_sexuality']; ?>">
                <br>
                <label for="charrace">Race / Species: </label>
                <input type="text" readonly id="charrace" name="char_race" value="<?php echo $charinfo['char_race']; ?>">
                <br>
                <label for="charstatus">Current Status: </label>
                <div id="charstatus" class="textdiv"><?php echo $charinfo['char_status']; ?></div>
                <br>
                <label for="charsoul">Soul Type: </label>
                <input type="text" readonly id="charsoul" name="char_soul" value="<?php echo $charinfo['char_soul']; ?>">
                <br>
                <label for="charother">Other: </label>
                <div id="charother" class="textdiv"><?php echo $charinfo['char_other']; ?></div>
                <br>
            </div>
            <h3><?php echo $charname; ?>'s physical appearance.</h3>
            <div class="display">
                <label for="chareyes">Eye Description: </label>
                <div id="chareyes" class="textdiv"><?php  if(isset($charappear)&& !empty($charappear)){  echo $charappear['app_eyes'];} else{echo$nya;} ?></div>
                <br>
                <label for="charhair">Hair Description: </label>
                <div id="charhair" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){ echo $charappear['app_hair'];} else{echo$nya;} ?></div>
                <br>
                <label for="charears">Ears: </label>
                <div id="charears" class="textdiv"><?php  if(isset($charappear)&& !empty($charappear)){echo $charappear['app_ears'];} else{echo$nya;} ?></div>
                <br>
                <label for="charheight">Height: </label>
                <div id="charheight" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){echo $charappear['app_height'];} else{echo$nya;} ?></div>
                <br>
                <label for="charweight">Weight: </label>
                <div id="charweight" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){echo $charappear['app_weight'];} else{echo$nya;} ?></div>
                <br>
                <label for="charskin">Skin: </label>
                <div id="charskin" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){echo $charappear['app_skin'];} else{echo$nya;} ?></div>
                <br>
                <label for="charweight">Unique Features: </label>
                <div id="charunique" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){ echo $charappear['app_unique'];} else{echo$nya;} ?></div>
                <br>
                <label for="charadd">Additional: </label>
                <div id="charadd" class="textdiv"><?php  if(isset($charappear)&& !empty($charappear)){echo $charappear['app_other'];} else{echo$nya;} ?></div>
                <br>
            </div>
            <h3><?php echo $charname; ?> 's outfit(s) (if applicable).</h3>
            <div class="display">
                <label for="outname">"Name": </label>
                <div id="outname" class="textdiv"><?php if(isset($charoutfit)&& !empty($charoutfit) ){echo $charoutfit['outfit_name'];} else{echo$nya;} ?></div>
                <br>
                <label for="outglass">Eyewear / Hats: </label>
                <div id="outglass" name="out_glass" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_glasses'];} else{echo $nya;} ?></div>
                <br>
                <label for="outtop">Top: </label>
                <div id="outtop" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_top'];} else{echo $nya;} ?></div>
                <br>
                <label for="outbot">Bottom: </label>
                <div id="outbot" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_bottom'];} else{echo $nya;} ?></div>
                <br>
                <label for="outfoot">Footwear: </label>
                <div id="outfoot" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_footwear'];} else{echo $nya;} ?></div>
                <br>
                <label for="outjewel">Jewelery: </label>
                <div id="outjewel" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_jewlery'];} else{echo $nya;} ?></div>
                <br>
            </div>
            <h3><?php echo $charname; ?>'s detailed personality.</h3>
            <div class ="display">
                <label for="charact">Activity: </label>
                <div id="charact" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_act'];} else{echo $nya;} ?></div>
                <br>
                <label for="charagree">Agreeableness: </label>
                <div id="charagree" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_agree'];} else{echo $nya;} ?></div>
                <br>
                <label for="charassert">Assertiveness: </label>
                <div id="charassert" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_assert'];} else{echo $nya;} ?></div> 
                <br>
                <label for="charconf">Confidence: </label>
                <div id="charconf" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_conf'];} else{echo $nya;} ?></div>
                <br>
                <label for="chardisc">Discipline: </label>
                <div id="chardisc" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_disc']; } else{echo $nya;}?></div>
                <br>
                <label for="charemocap">Emotional Capacity: </label>
                <div id="charemocap" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_emocap']; } else{echo $nya;}?></div>
                <br>
                <label for="charfriend">Friendliness: </label>
                <div id="charfriend" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_friend']; } else{echo $nya;}?></div>
                <br>
                <label for="charhonest">Honesty: </label>
                <div id="charhonest" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_honest']; } else{echo $nya;}?></div>
                <br>
                <label for="charintel">Intelligence: </label>
                <div id="charintel" class ="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_intel']; } else{echo $nya;}?></div>
                <br>
                <label for="charmanners">Manners: </label>
                <div id ="charmanners" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_manner']; } else{echo $nya;}?></div>
                <br>
                <label for="charpos">Positivity: </label>
                <div id="charpos" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_pos']; } else{echo $nya;}?></div>
                <br>
                <label for="charrebel">Rebelliousness: </label>
                <div id="charrebel" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_rebel']; } else{echo $nya;}?></div>
                <br>
                <label for="charperstype">Personality Type: </label>
                <div id="charperstype" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_type']; } else{echo $nya;}?></div>
                <br>
                <label for="charpersdesc">Description (Optional): </label>
                <div id="charpersdesc" class='textdiv'><?php if(isset($charpers) && !empty($charpers)){echo $charpers['pers_desc'];} else{echo $nya;} ?></div>
                <br>
            </div>
            <h3><?php echo $charname; ?>'s stats, if applicable.</h3>
            <div class ="display">
                <label for="stathealth">Health / Hit Points: </label>
                <input type="text" readonly id="stathealth" name="stat_health" value="<?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_health'];} else{echo $nya;} ?>">
                <br>
                <label for="statstam">Stamina: </label>
                <input type="text" readonly id="statstam" name="stat_stam" value="<?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_stam'];} else{echo $nya;} ?>">
                <br>
                <label for="statmana">Mana / Magicka: </label>
                <input type="text" readonly id="statmana" name="stat_mana" value="<?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_mana'];} else{echo $nya;} ?>">
                <br>
                <label for="statlevel">Level: </label>
                <input type="text" readonly id="statlevel" name="stat_level" value="<?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_level'];} else{echo $nya;} ?>">
                <br>
                <label for="statexp">Experience Level: </label>
                <input type="text" readonly id="statexp" name="stat_exp" value="<?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_exp'];} else{echo $nya;} ?>">
                <br>
                <label for="statagile">Agility: </label>
                <input type="text" readonly id="statagile" name="stat_agile" value="<?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_agile'];} else{echo $nya;} ?>">
                <br>
                <label for="statstrong">Strength: </label>
                <input type="text" readonly id="statstrong" name="stat_strong" value="<?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_strength'];} else{echo $nya;} ?>">
                <br>
                <label for="statchar">Charisma: </label>
                <input type="text" readonly id="statchar" name="stat_char" value="<?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_charisma'];} else{echo $nya;} ?>">
                <br>
                <label for="statpercep">Perception: </label>
                <input type="text" readonly id="statpercep" name="stat_percep" value="<?php if(isset($charstat) && !empty($charstat)){echo $charstat['stat_percep'];} else{echo $nya;} ?>">
                <br>
            </div>
            <h3><?php echo $charname; ?>'s race, if non-human.</h3>
            <div class ="display">
                <label for="charrace">Race Name: </label>
                <input type="text" readonly id="charrace" name="char_race" value="<?php if(isset($charrace) && !empty($charrace)){echo $charrace['race_name']; } else{echo $nya;}?>">
                <br>
                <label for="racehome">Home: </label>
                <div id="racehome" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_home']; } else{echo $nya;}?></div>
                <br>
                <label for="raceage">Average Age: </label>
                <input type="text" readonly id="raceage" name="race_age" value="<?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_age']; } else{echo $nya;}?>">
                <br>
                <label for="raceheight">Average Height: </label>
                <input type="text" readonly id="raceheight" name="race_height" value="<?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_height']; } else{echo $nya;}?>">
                <br>
                <label for="raceaspects">Racial Aspects: </label>
                <div id="raceaspects" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_aspect']; } else{echo $nya;}?></div>
                <br>
                <label for="charracedesc">Description: </label>
                <div id="charracedesc" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_desc']; } else{echo $nya;}?></div>
                <br>
            </div>
            <h3><?php echo $charname; ?>'s other information that didn't quite fit anywhere else.</h3>
            <div class ="display">
                <label for="othertheme">Theme Song: </label>
                <div id="othertheme" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_theme'];} else{echo $nya;} ?></div>
                <br>
                <label for="otherquotes">Quotes: </label>
                <div id="otherquotes" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_quotes'];} else{echo $nya;} ?></div>
                <br>
                <label for="otherquirks">Quirks: </label>
                <div id="otherquirks" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_quirks'];} else{echo $nya;} ?></div>
                <br>
                <label for="otherquirksdesc">Quirk Description: </label>
                <div id="otherquirksdesc" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_quirkinfo'];} else{echo $nya;} ?></div>
                <br>
                <label for="otherweak">Weaknesses: </label>
                <div id="otherweak" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_weak'];} else{echo $nya;} ?></div>
                <br>
                <label for="otherbackstory">Backstory: </label>
                <div id="otherbackstory" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_backstory'];} else{echo $nya;} ?></div>
                <br>
                <label for="otherbday">Birthday: </label>
                <input type="text" readonly id="otherbday" name="other_bday" value="<?php if(isset($charother) && !empty($charother)) {echo $charother['other_bday'];} else{echo $nya;} ?>">
                <br>
                <label for="otherzodiac">Zodiac: </label>
                <input type="text" readonly id="otherzodiac" name="other_zodiac" value="<?php if(isset($charother)&& !empty($charother)){echo $charother['other_zodiac'];} else{echo $nya;} ?>">
                <br>
                <label for="otherhobbies">Hobbies: </label>
                <div id="otherhobbies" class="textdiv"><?php if(isset($charother) && !empty($charother)){echo $charother['other_hobbies'];} else{echo $nya;} ?></div>
                <br>
                <label for="otherother">Other: </label>
                <div id="otherother" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo nc($charother['other_other']);} else{echo $nya;} ?></div>
                <br>
            </div>
        </div>
        <script>
            $(function () {
                $("#accordion").accordion();
            });
        </script>
    </body>
</html>
