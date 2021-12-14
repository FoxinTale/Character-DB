<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <title>Character Database - Home</title>
        <link rel="stylesheet" href="../css/fonts.css">
        <link rel="stylesheet" href="../css/w3-min.css">
        
    </head>
    <body>
        <div id="character_race" class="light-purple box shadow-816 container infotab">
            <h3 class="display-header">Character Species / Race.</h3>
            <p>
                If your character is not human, use this section. Otherwise it is not needed.<br>
                You can hover over each entry to learn more about what it is.
            </p>
            <hr>
            <form id="charspecies" method="post" action="javascript:pagerender('pages/newchar_race.html', 'race')">
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
                <p>
                    <label for="racebutton">&nbsp;</label>
                    <input type="submit" class="clicky-button clicky-button-two" name="submit_race" value="Add Race Info" id="racebutton">
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