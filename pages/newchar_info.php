<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <title>Character Database - Home</title>
        <link rel="stylesheet" href="../css/fonts.css">
        <link rel="stylesheet" href="../css/w3-min.css">
    </head>
    <body>
        <div id='character_info' class="light-purple box container infotab">
            <h3 class="display-header">Character Information</h3>
            <p>You can hover over each entry to learn more about what it is.</p>
            <hr>
            <form id="charinfo" method="post" action="javascript:pagerender('pages/newchar_info.html')">
                <p class="tooltip" title="This is the full name of the character">
                    <label for="charname">Full Name: </label>
                    <input type="text" class="textinput" required id="charname" name="char_name">
                </p>
                <p class ="tooltip" title="Any nicknames, or shortened forms of their name.">
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
                <p>
                    <label for="charbutton">&nbsp;</label>
                    <input type="submit" class="clicky-button clicky-button-two" name="submit_char" value="Add Character" id="charbutton">
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