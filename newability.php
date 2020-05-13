<!DOCTYPE html>
<?php
session_start();
require('inc/functions.php');
$username = $_SESSION["username"];
$info = "wield(s) this ability, spell or power.";
if (isset($_POST["spellbutton"])) {
    $ability = datacheck($_POST);
    addspell($db, $ability, $username);
}
?>
<head>
    <meta charset="UTF-8">
    <title>New Weapon</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
</head>
<body>
    <div class='w3-pale-purple-box'>
        <h3 class="w3-display-header">New Power, Ability, or spell.</h3>
        <?php
        if (isset($_POST["spellbutton"])) {
            echo "<span id='success'>Successfuly added!</span>";
            echo '<br>';
        }
        ?>
        <form id="newability" method='post' class="w3-light-purple-box w3-container" action='newability.php'>
            <p class="tooltip" title="The name of the spell / ability, obviously.">
                <label for="spellname" id="spellnamelabel">Power Name: </label>
                <input type="text" required id="spellname" name="spell_name" class='w3-input w3-border-blk'>
            </p>
            <?php getcharnames($db, $username, $info, "Character Name"); ?>
            <p class="tooltip" title="This is a short description of the power. Please keep it short, one or two sentences.">
                <label for="spelldesc">Short Description: </label>
                <textarea id="spelldesc" required name="spell_desc" class="w3-textarea"></textarea>
            </p>
            <p class="tooltip" title="A significantly more detailed desription. Be as lengthy as you wish.">
                <label for="spelldesc2">Detailed Description: </label>
                <textarea id="spelldesc2" required  name="spell_desc2" class="w3-textarea"></textarea>
            </p>
            <p class="tooltip" title="The type, or class of the spell. Can be elemental, Utility, Offensive, Defensive...">
                <label for="spelltype">Type: </label>
                <input type="text" required id="spelltype" name="spell_type" class='w3-input'>
            </p>
            <p class="tooltip" title="The school of magic, if applicable. Restoration, Conjuration...">
                <label for="spellschool">School: </label>
                <input type="text" id="spellschool" name="spell_school" class='w3-input'>
            </p>
            <p class="tooltip" title="The range of the spell. Please list units as well.">
                <label for="spellrange">Range: </label>
                <input type="text" id="spellrange" name="spell_range" class='w3-input'>
            </p>
            <p class="tooltip" title="How long the spell lasts once cast.">
                <label for="spellduration">Duration: </label>
                <input type="text" id="spellduration" name="spell_duration" class='w3-input'>
            </p>
            <p class="tooltip" title="How long the spell takes to cast.">
                <label for="spellcast">Casting Time: </label>
                <input type="text" id="spellcast" name="spell_cast" class='w3-input'>
            </p>
            <p class="tooltip" title="How much damage this does, if applicable.">
                <label for="spelldmg">Damage: </label>
                <input type="text" id="spelldmg" name="spell_dmg" class='w3-input'>
            </p>
            <p class="tooltip" title="The skill level required to use this. Beginner, Master...">
                <label for="spelllevel">Level: </label>
                <input type="text" id="spelllevel" name="spell_level" class='w3-input'>
            </p>
            <p class="tooltip" title="Any materials required to cast the spell, or use the power.">
                <label for="spellmats">Materials: </label>
                <input type="text" id="spellmats" name="spell_mats" class='w3-input'>
            </p>
            <p class="tooltip" title="Is a ritual of sorts required for this?">
                <label for="spellrit">Ritual: </label>
                <input type="text" id="spellrit" name="spell_rit" class='w3-input'>
            </p>
            <p class="tooltip" title="Tags, or categories used to help find this easier while searching.">
                <label for="spelltags">Tags: </label>
                <input type="text" id="spelltags" name="spell_tags" class='w3-input'>
            </p>
            <?php
            if ($username != "Test User") {
                echo "<button type='submit' name='spellbutton' id='spell_button' class='w3-btn w3-border-blk'>Add ability, spell or power!</button> ";
            }
            ?>
        </form>
    </div>
</body>
