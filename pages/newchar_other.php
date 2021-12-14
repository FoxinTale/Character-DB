<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <title>Character Database - Home</title>
        <link rel="stylesheet" href="../css/fonts.css">
        <link rel="stylesheet" href="../css/w3-min.css">
        
    </head>
    <body>
       <div id="character_other"  class="light-purple box shadow-816 container infotab">
        <h3 class="w3-display-header">Other Info</h3>
        <p>This is for other information that might not fit in well in the other sections. This one is optional.</p>
        <p>You can hover over each entry to learn more about what it is.</p>
        <hr>
        <form id="charother" method="post" action="newchar.php#character_other">
            <p class="tooltip" title="Self-Explanatory. Can be just the name, the name and a link...whatever you wish.">
                <label for="othertheme">Theme Song: </label>
                <input type="text" id="othertheme" name="other_theme" class='textinput'>
            </p>
            <p class="tooltip" title="Self-Explanatory.">
                <label for="otherquotes">Quotes: </label>
                <textarea id="otherquotes" name="other_quotes" class='textbox'></textarea>
            </p>
            <p class="tooltip" title="Personality quirks, interesting things, or the very literal quirk.">
                <label for="otherquirks">Quirks: </label>
                <textarea id="otherquirks" name="other_quirks" class='textbox'></textarea>
            </p>
            <p class="tooltip" title="If a quirk, a short description of it.">
                <label for="otherquirksdesc">Quirk Description: </label>
                <textarea id="otherquirksdesc" name="other_quirksdesc" class='textbox'></textarea>
            </p>
            <p class="tooltip" title="Can be anything that is considered a weakness.">
                <label for="otherweak">Weaknesses: </label>
                <textarea id="otherweak" name="other_weak" class='textbox'></textarea>
            </p>
            <p class="tooltip" title="Birthday...What else would it be.">
                <label for="otherbday">Birthday: </label>
                <input type="text" id="otherbday" name="other_bday" class='textinput'>
            </p>
            <p class="tooltip" title="Zodiac sign. If you don't know what this is, leave it blank.">
                <label for="otherzodiac">Zodiac: </label>
            <input type="text" id="otherzodiac" name="other_zodiac" class='textinput'>
            </p>
            <p class="tooltip" title="Self-Explanatory.">
                <label for="otherhobbies">Hobbies: </label>
                <textarea id="otherhobbies" name="other_hobbies" class='textbox'></textarea>
            </p>
            <p class="tooltip" title="Any other thing that doesn't have its own area goes here.">
                <label for="otherother">Other: </label>
                <textarea id="otherother" name="other_other" class='textbox'></textarea>
            <p>
            <p>
                <label for="otherbutton">&nbsp;</label>
                <input type="submit" class="clicky-button clicky-button-two" name="submit_other" value="Add Info" id="otherbutton">
            </p>
            </form>
        </div>
    <script type="text/javascript">
        $('.textbox').on('input', function () {
            this.style.height = 'auto'; 
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>
</body>