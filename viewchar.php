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
        
        $nya = "Not Yet Added, or Not Applicable to this character.";
        ?>
        <div id="accordion">
            <h3>Basic Information about <?php echo $charname; ?>.</h3>
            <section class="display">
                <label for="charname" id ="charnamelabel">Full Name: </label>
                    <p id="charname" class="textdiv"><?php echo $charinfo['char_fullname']; ?></p>
                <label for="charname2">Short name: </label>
                    <p id="charname2" class="textdiv"><?php echo $charinfo['char_name']; ?></p>
                <label for="charalias">Alias(es): </label>
                    <p id="charalias" class="textdiv"><?php echo $charinfo['char_alias']; ?></p>
                <label for="shortdesc">Short Description: </label>
                    <p id="shortdesc" class="textdiv"> <?php echo $charinfo['char_desc']; ?></p>
                <label for="charage">Age: </label>
                    <p id="charage" class="textdiv"><?php echo $charinfo['char_age']; ?></p>
                <label for="chargender">Gender</label>
                    <p id="chargender" class="textdiv"><?php echo $charinfo['char_gender']; ?></p>
                <label for="charsexuality">Sexuality: </label>
                    <p id="charsexuality" class="textdiv"><?php echo $charinfo['char_sexuality']; ?></p>
                <label for="charrace">Race / Species: </label>
                    <p id="charrace" class="textdiv"><?php echo $charinfo['char_race']; ?></p>
                <label for="charstatus">Current Status: </label>
                    <p id="charstatus" class="textdiv"><?php echo $charinfo['char_status']; ?></p>
                <label for="charsoul">Soul Type: </label>
                    <p id="charsoul" class="textdiv"><?php echo $charinfo['char_soul']; ?></p>
                <label for="charother">Other: </label>
                    <p id="charother" class="textdiv"><?php echo $charinfo['char_other']; ?></p>
            </section>
            <h3><?php echo $charname; ?>'s physical appearance.</h3>
            <section class="display">
                <label for="chareyes">Eye Description: </label>
                    <p id= "chareyes" class="textdiv"><?php  if(isset($charappear)&& !empty($charappear)){  echo $charappear['app_eyes'];} else{echo$nya;} ?></p>
                <label for="charhair">Hair Description: </label>
                    <p id="charhair" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){ echo $charappear['app_hair'];} else{echo$nya;} ?></p>
                <label for="charears">Ears: </label>
                    <p class="textdiv" class="textdiv"><?php  if(isset($charappear)&& !empty($charappear)){echo $charappear['app_ears'];} else{echo$nya;} ?></p>
                <label for="charheight">Height: </label>
                    <p id="charheight" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){echo $charappear['app_height'];} else{echo$nya;} ?></p>
                <label for="charweight">Weight: </label>
                    <p id="charweight" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){echo $charappear['app_weight'];} else{echo$nya;} ?></p>
                <label for="charskin">Skin: </label>
                    <p id="charskin" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){echo $charappear['app_skin'];} else{echo$nya;} ?></p>
                <label for="charunique">Unique Features: </label>
                    <p id="charunique" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){ echo $charappear['app_unique'];} else{echo$nya;} ?></p>
                <label for="charadd">Additional: </label>
                    <p class="textdiv"><?php  if(isset($charappear)&& !empty($charappear)){echo $charappear['app_other'];} else{echo$nya;} ?></p>
            </section>
            <h3><?php echo $charname; ?> 's outfit(s) (if applicable).</h3>
            <section class="display">
                <label for="outname">Name: </label>
                    <p id="outname" class="textdiv"><?php if(isset($charoutfit)&& !empty($charoutfit) ){echo $charoutfit['outfit_name'];} else{echo$nya;} ?></p>
                <label for="outglass">Eyewear / Hats: </label>
                    <p id="outglass" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_glasses'];} else{echo $nya;} ?></p>
                <label for="outtop">Top: </label>
                    <p id="outtop" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_top'];} else{echo $nya;} ?></p>
                <label for="outbot">Bottom: </label>
                    <p id="outbot" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_bottom'];} else{echo $nya;} ?></p>
                <label for="outfoot">Footwear: </label>
                    <p id="outfoot" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_footwear'];} else{echo $nya;} ?></p>
                <label for="outjewel">Jewelery: </label>
                    <p id="outjewel" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_jewlery'];} else{echo $nya;} ?></p>
            </section>
            <h3><?php echo $charname; ?>'s detailed personality.</h3>
            <section class ="display">
                <label for="charact">Activity: </label>
                    <p id="charact" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_act'];} else{echo $nya;} ?></p>
                <label for="charagree">Agreeableness: </label>
                    <p id="charagree" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_agree'];} else{echo $nya;} ?></p>
                <label for="charassert">Assertiveness: </label>
                    <p id="charassert" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_assert'];} else{echo $nya;} ?></p> 
                <label for="charconf">Confidence: </label>
                    <p id="charconf" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_conf'];} else{echo $nya;} ?></p>
                <label for="chardisc">Discipline: </label>
                    <p id="chardisc" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_disc']; } else{echo $nya;}?></p>
                <label for="charemocap">Emotional Capacity: </label>
                    <p id="charemocap" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_emocap']; } else{echo $nya;}?></p>
                <label for="charfriend">Friendliness: </label>
                    <p id="charfriend" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_friend']; } else{echo $nya;}?></p>
                <label for="charhonest">Honesty: </label>
                    <p id="charhonest" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_honest']; } else{echo $nya;}?></p>
                <label for="charintel">Intelligence: </label>
                    <p id="charintel" class ="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_intel']; } else{echo $nya;}?></p>
                <label for="charmanners">Manners: </label>
                    <p id ="charmanners" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_manner']; } else{echo $nya;}?></p>
                <label for="charpos">Positivity: </label>
                    <p id="charpos" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_pos']; } else{echo $nya;}?></p>
                <label for="charrebel">Rebelliousness: </label>
                    <p id="charrebel" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_rebel']; } else{echo $nya;}?></p>
                <label for="charperstype">Personality Type: </label>
                    <p id="charperstype" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_type']; } else{echo $nya;}?></p>
                <label for="charpersdesc">Description (Optional): </label>
                    <p id="charpersdesc" class='textdiv'><?php if(isset($charpers) && !empty($charpers)){echo $charpers['pers_desc'];} else{echo $nya;} ?></p>
            </section>
            <h3><?php echo $charname; ?>'s stats, if applicable.</h3>
            <section class ="display">
                <label for="stathealth">Health / Hit Points: </label>
                    <p id="stathealth" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_health'];} else{echo $nya;} ?></p>
                <label for="statstam">Stamina: </label>
                    <p id="statstam" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_stam'];} else{echo $nya;} ?></p>
                <label for="statmana">Mana / Magicka: </label>
                    <p id="statmana" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_mana'];} else{echo $nya;} ?></p>
                <label for="statlevel">Level: </label>
                    <p id="statlevel" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_level'];} else{echo $nya;} ?></p>
                <label for="statexp">Experience Level: </label>
                    <p id="statexp" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_exp'];} else{echo $nya;} ?></p>
                <label for="statagile">Agility: </label>
                    <p id="statagile" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_agile'];} else{echo $nya;} ?></p>
                <label for="statstrong">Strength: </label>
                    <p id="statstrong" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_strength'];} else{echo $nya;} ?></p>
                <label for="statchar">Charisma: </label>
                    <p id="statchar" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_charisma'];} else{echo $nya;} ?></p>
                <label for="statpercep">Perception: </label>
                    <p id="statpercep" class="textdiv"><?php if(isset($charstat) && !empty($charstat)){echo $charstat['stat_percep'];} else{echo $nya;} ?></p>
            </section>
            <h3><?php echo $charname; ?>'s race, if non-human.</h3>
            <section class ="display">
                <label for="charrace">Race Name: </label>
                    <p id="charrace" class="textdiv"><?php if(isset($charrace) && !empty($charrace)){echo $charrace['race_name']; } else{echo $nya;}?></p>
                <label for="racehome">Home: </label>
                    <p id="racehome" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_home']; } else{echo $nya;}?></p>
                <label for="raceage">Average Age: </label>
                    <p id="raceage" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_age']; } else{echo $nya;}?></p>
                <label for="raceheight">Average Height: </label>
                    <p id="raceheight" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_height']; } else{echo $nya;}?></p>
                <label for="raceaspects">Racial Aspects: </label>
                    <p id="raceaspects" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_aspect']; } else{echo $nya;}?></p>
                <label for="charracedesc">Description: </label>
                    <p id="charracedesc" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_desc']; } else{echo $nya;}?></p>
            </section>
            <h3><?php echo $charname; ?>'s other information that didn't quite fit anywhere else.</h3>
            <section class ="display">
                <label for="othertheme">Theme Song: </label>
                    <p id="othertheme" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_theme'];} else{echo $nya;} ?></p>
                <label for="otherquotes">Quotes: </label>
                    <p id="otherquotes" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_quotes'];} else{echo $nya;} ?></p>
                <label for="otherquirks">Quirks: </label>
                    <p id="otherquirks" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_quirks'];} else{echo $nya;} ?></p>
                <label for="otherquirksdesc">Quirk Description: </label>
                    <p id="otherquirksdesc" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_quirkinfo'];} else{echo $nya;} ?></p>
                <label for="otherweak">Weaknesses: </label>
                    <p id="otherweak" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_weak'];} else{echo $nya;} ?></p>
                <label for="otherbackstory">Backstory: </label>
                    <p id="otherbackstory" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_backstory'];} else{echo $nya;} ?></p>
                <label for="otherbday">Birthday: </label>
                    <p id="otherbday" class="textdiv"><?php if(isset($charother) && !empty($charother)) {echo $charother['other_bday'];} else{echo $nya;} ?></p>     
                <label for="otherzodiac">Zodiac: </label>
                    <p id="otherzodiac" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_zodiac'];} else{echo $nya;} ?></p>
                <label for="otherhobbies">Hobbies: </label>
                    <p id="otherhobbies" class="textdiv"><?php if(isset($charother) && !empty($charother)){echo $charother['other_hobbies'];} else{echo $nya;} ?></p>
                <label for="otherother">Other: </label>
                    <p id="otherother" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo nc($charother['other_other']);} else{echo $nya;} ?></p>
            </section>
        </div>
        <script>
            $(function () {
                $("#accordion").accordion();
            });
        </script>
    </body>
</html>
