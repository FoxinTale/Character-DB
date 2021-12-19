<!DOCTYPE html>
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <title>New Ability, Power or Spell</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <div class='box light-purple container2 shadow-816'>
        <h3 class="display-header">New Power, Ability, or spell.</h3>
        <form id="newability" method='post' class="light-purple box container" action='newability.php'>
            <p class="tooltip" title="The name of the spell / ability, obviously.">
                <label for="spellname" id="spellnamelabel">Power Name: </label>
                <input type="text" required id="spellname" name="spell_name" class='textinput w3-border-blk'>
            </p>
            <p class="tooltip" title="This is a short description of the power. Please keep it short, one or two sentences.">
                <label for="spelldesc">Short Description: </label>
                <textarea id="spelldesc" required name="spell_desc" class="textbox"></textarea>
            </p>
            <p class="tooltip" title="A significantly more detailed description. Be as lengthy as you wish.">
                <label for="spelldesc2">Detailed Description: </label>
                <textarea id="spelldesc2" required  name="spell_desc2" class="textbox"></textarea>
            </p>
            <p class="tooltip" title="The type, or class of the spell. Can be elemental, Utility, Offensive, Defensive...">
                <label for="spelltype">Type: </label>
                <input type="text" required id="spelltype" name="spell_type" class='textinput'>
            </p>
            <p class="tooltip" title="The school of magic, if applicable. Restoration, Conjuration...">
                <label for="spellschool">School: </label>
                <input type="text" id="spellschool" name="spell_school" class='textinput'>
            </p>
            <p class="tooltip" title="The range of the spell. Please list units as well.">
                <label for="spellrange">Range: </label>
                <input type="text" id="spellrange" name="spell_range" class='textinput'>
            </p>
            <p class="tooltip" title="How long the spell lasts once cast.">
                <label for="spellduration">Duration: </label>
                <input type="text" id="spellduration" name="spell_duration" class='textinput'>
            </p>
            <p class="tooltip" title="How long the spell takes to cast.">
                <label for="spellcast">Casting Time: </label>
                <input type="text" id="spellcast" name="spell_cast" class='textinput'>
            </p>
            <p class="tooltip" title="How much damage this does, if applicable.">
                <label for="spelldmg">Damage: </label>
                <input type="text" id="spelldmg" name="spell_dmg" class='textinput'>
            </p>
            <p class="tooltip" title="The skill level required to use this. Beginner, Master...">
                <label for="spelllevel">Level: </label>
                <input type="text" id="spelllevel" name="spell_level" class='textinput'>
            </p>
            <p class="tooltip" title="Any materials required to cast the spell, or use the power.">
                <label for="spellmats">Materials: </label>
                <input type="text" id="spellmats" name="spell_mats" class='textinput'>
            </p>
            <p class="tooltip" title="Is a ritual of sorts required for this?">
                <label for="spellrit">Ritual: </label>
                <input type="text" id="spellrit" name="spell_rit" class='textinput'>
            </p>
            <p class="tooltip" title="Tags, or categories used to help find this easier while searching.">
                <label for="spelltags">Tags: </label>
                <input type="text" id="spelltags" name="spell_tags" class='textinput'>
            </p>
            <?php
            if ($_SESSION['validUser']) {
                echo "<label for='ability_button'>&nbsp;</label>";
                echo "<p id='ability_button' class='textinput'>Button placeholder.</p>" ;
                //echo "<input type='submit' class='clicky-button clicky-button-two' id='ability_button' value='Add Spell/Ability/Power!'>";
            }
            ?>
        </form>
        <script type="text/javascript">
            $('.textbox').on('input', function () {
                this.style.height = 'auto';

                this.style.height =
                        (this.scrollHeight) + 'px';
            });
        </script>
    </div>
</body>
