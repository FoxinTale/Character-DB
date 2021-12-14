<!DOCTYPE html> 
<head>
    <meta charset="UTF-8">
    <title>Character Database - Home</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/w3-min.css">
</head>
<body>
    <div id="character_omega" class="light-purple box shadow-816 container infotab">
        <h3 class="display-header">The Omega Timeline</h3>
        <p>
            The Omega Timeline is a dimension which is a massive melting pot of various Undertale and Deltarune timelines and alternate universes. These are all connected in some way shape or form.
            <br>(Hover over each entry to get more information.)
        </p>
        <hr>
        <form id="charomega" method="post" action="javascript:pagerender('pages/newchar_omega.html', 'omega')">
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
            <p>
                <label for="omegabutton">&nbsp;</label>
                <input type="submit" class="clicky-button clicky-button-two" name="submit_omega" value="Add OT Info" id="omegabutton">
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