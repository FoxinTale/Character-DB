<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>New Character</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts/ui.js"></script>
</head>
<body>
    <main>
        <div class='pale-purple box3 shadow-816'>
            <div class="w3-tab black">
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'general_info')">General Info</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_info')">Info</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_appearance')">Appearance</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_personality')">Personality</button>
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_race')">Race</button>
                <button id="omega_tab" class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_omega')"style="display:none">Omega Timeline</button> 
                <button class="w3-tab-item w3-button tablink" onclick="opentab(event, 'character_options')">Options</button>
            </div>
            <div id="general_info" class="light-purple box shadow-816 infotab">
                <p>This is where you enter data for all your characters</p>
                <p>Some things you cannot leave empty, while others you can. It'll complain if it cannot be left empty.</p>
                <p>Any item can be one word, or a sentence if desired. </p>
                <p>If you need help filling some boxes, head over to the resources page.</p>            
                <p>Last note, some of the formatting / display may be messy. That will be fixed eventually.</p>
                <hr>
                <p><b>You must add the character information first, and then add the others from there.</b></p> 
            </div>
            <div id='character_info' class="light-purple box container infotab" style="display:none">
                <h3 class="display-header">Character Information</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <form id="charinfo" method="post" action="newchar.php">
                    <p class="tooltip" title="This is the full name of the character">
                        <label for="charname">Full Name: </label>
                        <input type="text" class="textinput" required id="charname" name="char_name">
                    </p>
                    <p class ="tooltip" title="Any given nicknames, or shortened forms of their name.">
                        <label for="charalias">Alias(es): </label>
                        <input type="text" class="textinput" id="charalias" name="char_alias">
                    </p>
                    <p class ="tooltip" title="A short, one to four sentence description of your character.">
                        <label for="shortdesc">Short Description: </label>
                        <textarea required id="shortdesc" name="short_desc" class='textbox'></textarea>
                    </p>
                    <p class="tooltip" title="The age of your character. Can be in years, or in terms of their lifespan.">
                        <label for="charage">Age: </label>
                        <input type="text"  required id="charage" class="textinput" name="char_age">
                    </p>
                    <p class="tooltip" title="Their gender. Can be any one, or multiple.">
                        <label for="chargender">Gender</label>
                        <input type="text" id="chargender" class="textinput" name="char_gender">
                    </p>
                    <p class="tooltip" title="Use the Race/Species section if they are not a human character. Otherwise, this is fine.">
                        <label for="charrace">Race / Species: </label>
                        <input type="text" id="charrace" class="textinput" name="char_race">
                    </p>
                </form>
            </div>
            <div id="character_appearance" class="light-purple box shadow-816 container infotab" style="display:none">
                <h3 class="display-header">Character Appearance</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <form id = "charapp" method="post" action="newchar.php#character_appearance">                        
                    <p class="tooltip" title="Eye shape if not human, and eye colour regardless.">
                        <label for="chareyes">Eye Description: </label>
                        <textarea id="chareyes" required name="char_eyes" class='textbox'></textarea>
                    </p>
                    <p class="tooltip" title="Hair colour, length and appearance.">
                        <label for="charhair">Hair Description: </label>
                        <textarea id="charhair" required name="char_hair" class='textbox'></textarea>
                    </p>
                    <p class="tooltip" title="This is really for if they aren't a human character. Elf, cat, wolf fox ears...ect.">
                        <label for="charears">Ears: </label>
                        <input type="text" id="charears" class="textinput" name="char_ears">
                    </p>
                    <p class="tooltip" title="Height can be in any scale, as long as the units are provided.">
                        <label for="charheight">Height: </label>
                        <input type="text" required id="charheight" class="textinput" name="char_height">
                    </p>
                    <p class="tooltip" title="Weight can be in any scale, as long as the units are provided.">
                        <label for="charweight">Weight: </label>
                        <input type="text" required id="charweight" class="textinput" name="char_weight">
                    </p>
                    <p class="tooltip" title="Skin tone, fur colour, or scales. And even something not listed.">
                        <label for="charskin">Skin: </label>
                        <textarea id="charskin" name="char_skin" class='textbox'></textarea>
                    </p>
                    <p class="tooltip" title="Unique identifying features, if any. Birthmarks, scars, tattoos, ect...">
                        <label for="charweight">Unique Features: </label>
                        <textarea id="charunique" name="char_unique" class='textbox'></textarea>
                    </p>
                </form>
            </div>
            <div id="character_personality" class="light-purple box shadow-816 container infotab" style="display:none">
                <h3 class="display-header">Character Personality</h3>
                <p>You can hover over each entry to learn more about what it is.</p>
                <hr>
                <form id="char_pers" method="post" action="newchar.php#character_personality">
                    <p class="tooltip" title="Their personality description.">
                        <label for="persdesc">Personality Description:</label>
                        <textarea id="charpersdesc" class="textbox" name="pers_desc"></textarea>
                    </p>
                    <p class="tooltip" title="The personality type. Can be Meyers-Briggs, Big 5, or any other type.">
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
                </form>
            </div>
            <div id="character_race" class="light-purple box shadow-816 container infotab" style="display:none">
                <h3 class="display-header">Character Species / Race.</h3>
                <p>
                    If your character is not human, use this section. Otherwise it is not needed.<br>
                    You can hover over each entry to learn more about what it is.
                </p>
                <hr>
                <form id="charspecies" method="post" action="newchar.php#character_race">
                    <p class="tooltip" title="The name of the species / race.">
                        <label for="racename">Name: </label>
                        <input type="text" id="racename" name="race_name" class='textinput'>
                    </p>
                    <p class="tooltip" title="Home planet / galaxy / universe. Yes, even if an alternate Earth.">
                        <label for="racehome">Home / Origin: </label>
                        <textarea id="racehome" name="race_home" class='textbox'></textarea>
                    </p>
                    <p class="tooltip" title="The average age of this race. If not human years, please specify the scale.">
                        <label for="raceage">Average Age: </label>
                        <input type="text" id="raceage" name="race_age" class='textinput'>
                    </p>
                    <p class="tooltip" title="Average size. Please list something measurable.">
                        <label for="racesize">Average Height: </label>
                        <input type="text" id="racesize" name="race_size" class='textinput'>
                    </p>
                    <p class="tooltip" title="Traits, abilities and aspects specific to this race.">
                        <label for="racetraits">Racial Aspects: </label>
                        <textarea id="racetraits" name="race_traits" class='textbox'></textarea>
                    </p>
                    <p class="tooltip" title="A full, detailed description of the race.">
                        <label for="racedesc">Description: </label>
                        <textarea id="racedesc" name="race_desc" class='textbox'></textarea>
                    </p>
                </form>
            </div>
            <div id="character_omega" class="light-purple box shadow-816 container infotab" style="display:none">
                <h3 class="display-header">The Omega Timeline</h3>
                <p>
                    The Omega Timeline is a dimension which is a massive melting pot of various Undertale and Deltarune timelines and alternate universes. These are all connected in some way shape or form.<br>
                    (Hover over each entry to get more information.)
                </p>
                <hr>
                <p class="tooltip" title="A description of the AU this character or 'muse' is from. Please specify if it is from Undertale or Deltarune.">
                    <label for="omegaaudesc">Alternate Universe (AU): </label>
                    <textarea id="omegaaudesc" name="omegaau_desc" class='textbox'></textarea>
                </p>
                <p class="tooltip" title="A personality of the character. If this is an alternate version of them that has a different personality than is in the main personality section, otherwise leave blank.">
                    <label for="omegapers">Personality (if different from main) : </label>
                    <textarea id="omegapers" name="omega_pers" class='textbox'></textarea>
                </p>
                <p class="tooltip" title="The backstory of your character's life. Try to keep it short and simple, but also describe who they are and what they've done.">
                    <label for="omegadesc">Backstory / History: </label>
                    <textarea id="omegadesc" name="omega_desc" class='textbox'></textarea>
                </p>
                <p class="tooltip" title="Why did they come to the timeline? How did they hear of the timeline?">
                    <label for="omegareason">Reason for joining: </label>
                    <textarea id="omegareason" name="omega_reason" class='textbox'></textarea>
                </p>
                <p class="tooltip" title="What this character's involvement with the main story is. Did they interact with canon characters in your AU? Did they do something to affect the story? That sort of thing.">
                    <label for="omegastory">Involvement in the story: </label>
                    <textarea id="omegastory" name="omega_story" class='textbox'></textarea>
                </p>
            </div>
            
            <div id="character_options" class="light-purple box shadow-816 container infotab" style="display:none">
                <h3 class="display-header">Character Options</h3>
                    <p>Various options for your character.</p>
                <hr>
                <form id="charoptions" method="post" action="newchar.php#character_options">
                    <p class="tooltip" title="Whether or not this character is a favourite">
                        <label for="is_fav">Is a favourite character</label>
                        <input type="checkbox" id="is_fav" name="isfavchar">
                    </p>
                    <p class="tooltip" title="Whether or not this character is a DnD version, or if they are a DnD only character">
                        <label for="is_dnd">Is a DnD character:</label>
                        <input type="checkbox" id="is_dnd" onchange="dndCheck()" name="isdndchar">
                    </p>
                    <!-- 
                        In PHP, the checkbox will be set based off of what is retreived from the database and the tabs will be set based off of that. 
                        The value retreived from the database will probably determine if a checked one is what is displayed vial an if statement.
                        The property is literally called "checked"
                    -->
                    <p class="tooltip" title="Whether or not this character is part of the Omega Timeline. If you have to ask what this is, you don't need to check it.">
                        <label for="is_omega">Is part of the Omega Timeline:</label>
                        <input type="checkbox" id="is_omega" onchange="omegaCheck()" name="isomegachar">
                    </p>
                </form>
            </div>
        </div>
    <script type="text/javascript">
        window.onload = checkBoxes()

        function checkBoxes(){
            persCheck();
            omegaCheck();
            dndCheck();
        }
         
        
        function persCheck(){
            var pers = document.getElementById("advperscheck");
            var advpers = document.getElementById("adv_pers");
            
            if(pers.checked){
                advpers.style.display = "block";
            } else {
                advpers.style.display = "none";
            }
        }
        
        function omegaCheck(){
            var omega = document.getElementById("is_omega");
            var omegaTab = document.getElementById("omega_tab");
            
            if(omega.checked){
                omegaTab.style.display = "block";
            } else{
                omegaTab.style.display = "none";
            }
        }
        
        function dndCheck(){
            var dnd = document.getElementById("is_dnd");
            var dndTab = document.getElementById("dnd_page");
            
            if(dnd.checked){
                dndTab.style.display="block";
            } else{
                dndTab.style.display="none";
            }
        }
        
        
        
        $('.textbox').on('input', function () {
            this.style.height = 'auto';
              
            this.style.height = 
                    (this.scrollHeight) + 'px';
        });
    </script>
    </main>
</body>
