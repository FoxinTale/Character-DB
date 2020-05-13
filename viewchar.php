<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Viewing Character</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/w3-min.css">
       <script src="scripts/ui.js"></script>
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
        <div id="accordion" class="w3-pale-purple-box">
            <button onclick="doaccordion('charinfo')" class="w3-accordion w3-left-align">Basic Information about <?php echo $charname; ?>.</button>
            <section id='charinfo' class="w3-hide w3-light-purple-box">
                <p><label for="charname" class='w3-info-title'>Full Name: </label>
                    <span id="charname" class="textdiv"><?php echo $charinfo['char_fullname']; ?></span></p>
                <p><label for="charname2" class='w3-info-title'>Short name: </label>
                    <span id="charname2" class="textdiv"><?php echo $charinfo['char_name']; ?></span></p>
                <p><label for="charalias" class='w3-info-title'>Alias(es): </label>
                    <span id="charalias" class="textdiv"><?php echo $charinfo['char_alias']; ?></span></p>
                <p><label for="shortdesc" class='w3-info-title'>Short Description: </label>
                    <span id="shortdesc" class="textdiv"> <?php echo $charinfo['char_desc']; ?></span></p>
                <p><label for="charage" class='w3-info-title'>Age: </label>
                    <span id="charage" class="textdiv"><?php echo $charinfo['char_age']; ?></span></p>
                <p><label for="chargender" class='w3-info-title'>Gender</label>
                    <span id="chargender" class="textdiv"><?php echo $charinfo['char_gender']; ?></span></p>
                <p><label for="charsexuality" class='w3-info-title'>Sexuality: </label>
                    <span id="charsexuality" class="textdiv"><?php echo $charinfo['char_sexuality']; ?></span></p>
                <p><label for="charrace" class='w3-info-title'>Race / Species: </label>
                    <span id="charrace" class="textdiv"><?php echo $charinfo['char_race']; ?></span></p>
                <p><label for="charstatus" class='w3-info-title'>Current Status: </label>
                    <span id="charstatus" class="textdiv"><?php echo $charinfo['char_status']; ?></span></p>
                <p><label for="charsoul" class='w3-info-title'>Soul Type: </label>
                    <span id="charsoul" class="textdiv"><?php echo $charinfo['char_soul']; ?></span></p>
                <p><label for="charother" class='w3-info-title'>Other: </label>
                    <span id="charother" class="textdiv"><?php echo $charinfo['char_other']; ?></span></p>
            </section>
            <button onclick="doaccordion('charappear')" class="w3-accordion w3-left-align"><?php echo $charname; ?>'s physical appearance.</button>
            <section id='charappear' class="w3-hide w3-light-purple-box">
                <p><label for="chareyes" class='w3-info-title'>Eye Description: </label>
                    <span id= "chareyes" class="textdiv"><?php  if(isset($charappear)&& !empty($charappear)){  echo $charappear['app_eyes'];} else{echo$nya;} ?></span></p>
                <p><label for="charhair" class='w3-info-title'>Hair Description: </label>
                    <span id="charhair" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){ echo $charappear['app_hair'];} else{echo$nya;} ?></span></p>
                <p><label for="charears" class='w3-info-title'>Ears: </label>
                    <span class="textdiv" class="textdiv"><?php  if(isset($charappear)&& !empty($charappear)){echo $charappear['app_ears'];} else{echo$nya;} ?></span></p>
                <p><label for="charheight" class='w3-info-title'>Height: </label>
                    <span id="charheight" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){echo $charappear['app_height'];} else{echo$nya;} ?></span></p>
                <p><label for="charweight" class='w3-info-title'>Weight: </label>
                    <span id="charweight" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){echo $charappear['app_weight'];} else{echo$nya;} ?></span></p>
                <p><label for="charskin" class='w3-info-title'>Skin: </label>
                    <span id="charskin" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){echo $charappear['app_skin'];} else{echo$nya;} ?></span></p>
                <p><label for="charunique" class='w3-info-title'>Unique Features: </label>
                    <span id="charunique" class="textdiv"><?php if(isset($charappear)&& !empty($charappear)){ echo $charappear['app_unique'];} else{echo$nya;} ?></span></p>
                <p><label for="charadd" class='w3-info-title'>Additional: </label>
                    <span class="textdiv"><?php  if(isset($charappear)&& !empty($charappear)){echo $charappear['app_other'];} else{echo$nya;} ?></span></p>
            </section>
            <button onclick="doaccordion('charoutfit')" class="w3-accordion w3-left-align"><?php echo $charname; ?>'s outfits, if applicable.</button>
            <section id="charoutfit" class="w3-hide w3-light-purple-box">
                <p><label for="outname" class='w3-info-title'>Name: </label>
                    <span id="outname" class="textdiv"><?php if(isset($charoutfit)&& !empty($charoutfit) ){echo $charoutfit['outfit_name'];} else{echo$nya;} ?></span></p>
                <p><label for="outglass" class='w3-info-title'>Eyewear / Hats: </label>
                    <span id="outglass" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_glasses'];} else{echo $nya;} ?></span></p>
                <p><label for="outtop" class='w3-info-title'>Top: </label>
                    <span id="outtop" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_top'];} else{echo $nya;} ?></span></p>
                <p><label for="outbot" class='w3-info-title'>Bottom: </label>
                    <span id="outbot" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_bottom'];} else{echo $nya;} ?></span></p>
                <p><label for="outfoot" class='w3-info-title'>Footwear: </label>
                    <span id="outfoot" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_footwear'];} else{echo $nya;} ?></span></p>
                <p><label for="outjewel" class='w3-info-title'>Jewelery: </label>
                    <span id="outjewel" class="textdiv"><?php if(isset($charoutfit) && !empty($charoutfit)){echo $charoutfit['outfit_jewlery'];} else{echo $nya;} ?></span></p>
            </section>
            <button onclick="doaccordion('charpers')" class="w3-accordion w3-left-align"><?php echo $charname; ?>'s detailed personality.</button>
            <section id="charpers" class ="w3-hide w3-light-purple-box">
                <p><label for="charact" class='w3-info-title'>Activity: </label>
                    <span id="charact" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_act'];} else{echo $nya;} ?></span></p>
                <p><label for="charagree" class='w3-info-title'>Agreeableness: </label>
                    <span id="charagree" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_agree'];} else{echo $nya;} ?></span></p>
                <p><label for="charassert" class='w3-info-title'>Assertiveness: </label>
                    <span id="charassert" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_assert'];} else{echo $nya;} ?></span></p> 
                <p><label for="charconf" class='w3-info-title'>Confidence: </label>
                    <span id="charconf" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_conf'];} else{echo $nya;} ?></span></p>
                <p><label for="chardisc" class='w3-info-title'>Discipline: </label>
                    <span id="chardisc" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_disc']; } else{echo $nya;}?></span></p>
                <p><label for="charemocap" class='w3-info-title'>Emotional Capacity: </label>
                    <span id="charemocap" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_emocap']; } else{echo $nya;}?></span></p>
                <p><label for="charfriend" class='w3-info-title'>Friendliness: </label>
                    <span id="charfriend" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_friend']; } else{echo $nya;}?></span></p>
                <p><label for="charhonest" class='w3-info-title'>Honesty: </label>
                    <span id="charhonest" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_honest']; } else{echo $nya;}?></span></p>
                <p><label for="charintel" class='w3-info-title'>Intelligence: </label>
                    <span id="charintel" class ="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_intel']; } else{echo $nya;}?></span></p>
                <p><label for="charmanners" class='w3-info-title'>Manners: </label>
                    <span id ="charmanners" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_manner']; } else{echo $nya;}?></span></p>
                <p><label for="charpos" class='w3-info-title'>Positivity: </label>
                    <span id="charpos" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_pos']; } else{echo $nya;}?></span></p>
                <p><label for="charrebel" class='w3-info-title'>Rebelliousness: </label>
                    <span id="charrebel" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_rebel']; } else{echo $nya;}?></span></p>
                <p><label for="charperstype" class='w3-info-title'>Personality Type: </label>
                    <span id="charperstype" class="textdiv"><?php if(isset($charpers)&& !empty($charpers)){echo $charpers['pers_type']; } else{echo $nya;}?></span></p>
                <p><label for="charpersdesc" class='w3-info-title'>Description (Optional): </label>
                    <span id="charpersdesc" class='textdiv'><?php if(isset($charpers) && !empty($charpers)){echo $charpers['pers_desc'];} else{echo $nya;} ?></span></p>
            </section>
            <button onclick="doaccordion('charstat')" class="w3-accordion w3-left-align"><?php echo $charname; ?>'s stats, if applicable.</button>
            <section id='charstat' class ="w3-hide w3-light-purple-box">
                <p><label for="stathealth" class='w3-info-title'>Health / Hit Points: </label>
                    <span id="stathealth" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_health'];} else{echo $nya;} ?></span></p>
                <p><label for="statstam" class='w3-info-title'>Stamina: </label>
                    <span id="statstam" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_stam'];} else{echo $nya;} ?></span></p>
                <p><label for="statmana" class='w3-info-title'>Mana / Magicka: </label>
                    <span id="statmana" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_mana'];} else{echo $nya;} ?></span></p>
                <p><label for="statlevel" class='w3-info-title'>Level: </label>
                    <span id="statlevel" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_level'];} else{echo $nya;} ?></span></p>
                <p><label for="statexp" class='w3-info-title'>Experience Level: </label>
                    <span id="statexp" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_exp'];} else{echo $nya;} ?></span></p>
                <p><label for="statagile" class='w3-info-title'>Agility: </label>
                    <span id="statagile" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_agile'];} else{echo $nya;} ?></span></p>
                <p><label for="statstrong" class='w3-info-title'>Strength: </label>
                    <span id="statstrong" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_strength'];} else{echo $nya;} ?></span></p>
                <p><label for="statchar" class='w3-info-title'>Charisma: </label>
                    <span id="statchar" class="textdiv"><?php if(isset($charstat)&& !empty($charstat)){echo $charstat['stat_charisma'];} else{echo $nya;} ?></span></p>
                <p><label for="statpercep" class='w3-info-title'>Perception: </label>
                    <span id="statpercep" class="textdiv"><?php if(isset($charstat) && !empty($charstat)){echo $charstat['stat_percep'];} else{echo $nya;} ?></span></p>
            </section>
            <button onclick="doaccordion('charraceinfo')" class="w3-accordion w3-left-align"><?php echo $charname; ?>'s race, if non-human.</button>
            <section id='charraceinfo' class ="w3-hide w3-light-purple-box">
                <p><label for="charrace" class='w3-info-title'>Race Name: </label>
                    <span id="charrace" class="textdiv"><?php if(isset($charrace) && !empty($charrace)){echo $charrace['race_name']; } else{echo $nya;}?></span></p>
                <p><label for="racehome" class='w3-info-title'>Home: </label>
                    <span id="racehome" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_home']; } else{echo $nya;}?></span></p>
                <p><label for="raceage" class='w3-info-title'>Average Age: </label>
                    <span id="raceage" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_age']; } else{echo $nya;}?></span></p>
                <p><label for="raceheight" class='w3-info-title'>Average Height: </label>
                    <span id="raceheight" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_height']; } else{echo $nya;}?></span></p>
                <p><label for="raceaspects"class='w3-info-title'>Racial Aspects: </label>
                    <span id="raceaspects" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_aspect']; } else{echo $nya;}?></span></p>
                <p><label for="charracedesc" class='w3-info-title'>Description: </label>
                    <span id="charracedesc" class="textdiv"><?php if(isset($charrace)&& !empty($charrace)){echo $charrace['race_desc']; } else{echo $nya;}?></span></p>
            </section>
            <button onclick="doaccordion('charotherinfo')" class="w3-accordion w3-left-align"><?php echo $charname; ?>'s other information that didn't quite fit anywhere else.</button>
            <section id='charotherinfo' class ="w3-hide w3-light-purple-box">
                <p><label for="othertheme" class='w3-info-title'>Theme Song: </label>
                    <span id="othertheme" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_theme'];} else{echo $nya;} ?></span></p>
                <p><label for="otherquotes" class='w3-info-title'>Quotes: </label>
                    <span id="otherquotes" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_quotes'];} else{echo $nya;} ?></span></p>
                <p><label for="otherquirks"class='w3-info-title'>Quirks: </label>
                    <span id="otherquirks" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_quirks'];} else{echo $nya;} ?></span></p>
                <p><label for="otherquirksdesc" class='w3-info-title'>Quirk Description: </label>
                    <span id="otherquirksdesc" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_quirkinfo'];} else{echo $nya;} ?></span></p>
                <p><label for="otherweak" class='w3-info-title'>Weaknesses: </label>
                    <span id="otherweak" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_weak'];} else{echo $nya;} ?></span></p>
                <p><label for="otherbackstory" class='w3-info-title'>Backstory: </label>
                    <span id="otherbackstory" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_backstory'];} else{echo $nya;} ?></span></p>
                <p><label for="otherbday" class='w3-info-title'>Birthday: </label>
                    <span id="otherbday" class="textdiv"><?php if(isset($charother) && !empty($charother)) {echo $charother['other_bday'];} else{echo $nya;} ?></span></p>     
                <p><label for="otherzodiac" class='w3-info-title'>Zodiac: </label>
                    <span id="otherzodiac" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo $charother['other_zodiac'];} else{echo $nya;} ?></span></p>
                <p><label for="otherhobbies" class='w3-info-title'>Hobbies: </label>
                    <span id="otherhobbies" class="textdiv"><?php if(isset($charother) && !empty($charother)){echo $charother['other_hobbies'];} else{echo $nya;} ?></span></p>
                <p><label for="otherother" class='w3-info-title'>Other: </label>
                    <span id="otherother" class="textdiv"><?php if(isset($charother)&& !empty($charother)){echo nc($charother['other_other']);} else{echo $nya;} ?></span></p>
            </section>
        </div>
    </body>
</html>
