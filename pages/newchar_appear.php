<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <title>Character Database - Home</title>
        <link rel="stylesheet" href="../css/fonts.css">
        <link rel="stylesheet" href="../css/w3-min.css">
    </head>
    <body>
        <div id="character_appearance" class="light-purple box shadow-816 container infotab">
            <h3 class="display-header">Character Appearance</h3>
            <p>You can hover over each entry to learn more about what it is.</p>
            <hr>
            <form id = "charapp" method="post" action="javascript:pagerender('pages/newchar_home.html', 'home')">
                <p class="tooltip" title="General Appearance">
                    <label for="charapp">Appearance Description: </label>
                    <textarea id="charapp" name="char_app" class='textbox'></textarea>
                </p>
                <p class="tooltip" title="Enables or disables listing detailed appearance.">
                    <label for="advappcheck">Enable/Disable Appearance Details:</label>
                    <input type="checkbox" id="advappcheck" onchange="appCheck()" class="w3-checkbox"  name="hasadvappear">
                </p>
                <div id="adv_app" style="display:none;">
                    <p class="tooltip" title="Eye shape if not human, and eye colour regardless.">
                        <label for="chareyes">Eye Description: </label>
                        <textarea id="chareyes" name="char_eyes" class='textbox'></textarea>
                    </p>
                    <p class="tooltip" title="Hair colour, length and appearance.">
                        <label for="charhair">Hair Description: </label>
                        <textarea id="charhair" name="char_hair" class='textbox'></textarea>
                    </p>
                    <p class="tooltip" title="This is really for if they aren't a human character. Elf, cat, wolf fox ears...ect.">
                        <label for="charears">Ears: </label>
                        <input type="text" id="charears" class="textinput" name="char_ears">
                    </p>
                    <p class="tooltip" title="Height can be in any scale, as long as the units are provided.">
                        <label for="charheight">Height: </label>
                        <input type="text" id="charheight" class="textinput" name="char_height">
                    </p>
                    <p class="tooltip" title="Weight can be in any scale, as long as the units are provided.">
                        <label for="charweight">Weight: </label>
                        <input type="text" id="charweight" class="textinput" name="char_weight">
                    </p>
                    <p class="tooltip" title="Skin tone, fur colour, or scales. And even something not listed.">
                        <label for="charskin">Skin: </label>
                        <textarea id="charskin" name="char_skin" class='textbox'></textarea>
                    </p>
                    <p class="tooltip" title="Unique identifying features, if any. Birthmarks, scars, tattoos, ect...">
                        <label for="charweight">Unique Features: </label>
                        <textarea id="charunique" name="char_unique" class='textbox'></textarea>
                    </p>
                </div>
                <p>
                    <label for="app_button">&nbsp;</label>
                    <input type="submit" class="clicky-button clicky-button-two" name="submit_app" value="Add Appearance Info" id="app_button">
                </p>
            </form>
        </div>
    <script type="text/javascript">
        function appCheck(){
            var appear = document.getElementById("advappcheck");
            var advapp = document.getElementById("adv_app");

            if(appear.checked){
                advapp.style.display = "block";
            } else {
                advapp.style.display = "none";
            }
        }
        
        $('.textbox').on('input', function () {
            this.style.height = 'auto'; 
            this.style.height = (this.scrollHeight) + 'px';
        });
    </script>
</body>