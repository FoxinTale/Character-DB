<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>New Character</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/w3-min.css">
</head>
<body>
    <div id="character_personality" class="light-purple box shadow-816 container infotab">
        <h3 class="display-header">Character Personality</h3>
        <p>You can hover over each entry to learn more about what it is.</p>
        <hr>
        <form id="char_pers" method="post" action="javascript:pagerender('pages/newchar_pers.html', 'personality')">
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
            <p>
                <label for="persbutton">&nbsp;</label>
                <input type="submit" class="clicky-button clicky-button-two" name="submit_pers" value="Add Personality Info" id="persbutton">
            </p>
        </form>
    </div>
    
<script type="text/javascript">
    function persCheck(){
        var pers = document.getElementById("advperscheck");
        var advpers = document.getElementById("adv_pers");
            
        if(pers.checked){
            advpers.style.display = "block";
        } else {
            advpers.style.display = "none";
        }
    }
    
    $('.textbox').on('input', function () {
        this.style.height = 'auto'; 
        this.style.height = (this.scrollHeight) + 'px';
    });
</script>
</body>