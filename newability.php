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
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/expanding.jquery.js"></script>
    <script type="text/javascript" src="scripts/addthings.js"></script>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div id ="spell">
        <h3 id="spellheader">New Power, Ability, or spell.</h3>
        <?php
        if (isset($_POST["spellbutton"])) {
            echo "<span id='success'>Successfuly added!</span>";
            echo '<br>';
        }
        ?>
        <label for="fillit"  id="filllabel">Fill Blank Spots: </label>
        <input type="checkbox" id="fillit" name="fillempties" onclick ="fillblanksspell()">
        <form id="newability" method='post' class="align" action='newability.php'>
            <div class="tooltip" title="The name of the spell / ability, obviously.">
                <label for="spellname" id="spellnamelabel">Power Name: </label>
                <input type="text" required id="spellname" name="spell_name"><span class = "error" > </span>
                <input type="hidden" id="spell_name" value="">
                <br>
            </div>
            <?php getcharnames($db, $username, $info, "Character Name"); ?>
            <div class="tooltip" title="This is a short description of the power. Please keep it short, one or two sentences.">
                <label for="spelldesc">Short Description: </label>
                <textarea id="spelldesc" required name="spell_desc" class="expanding"> </textarea><span class = "error" > </span>
                <input type="hidden" id="spell_desc" value="">
            </div>
            <div class="tooltip" title="A significantly more detailed desription. Be as lengthy as you wish.">
                <label for="spelldesc2">Detailed Description: </label>
                <textarea id="spelldesc2" required  name="spell_desc2" class="expanding"></textarea><span class = "error" > </span>
                <input type="hidden" id="spell_desc2" value="">
                <br>
            </div>
            <div class="tooltip" title="The type, or class of the spell. Can be elemental, Utility, Offensive, Defensive...">
                <label for="spelltype">Type: </label>
                <input type="text" required id="spelltype" name="spell_type"><span class = "error" > </span>
                <input type="hidden" id="spell_type" value="">
                <br>
            </div>
            <div class="tooltip" title="The school of magic, if applicable. Restoration, Conjuration...">
                <label for="spellschool">School: </label>
                <input type="text" id="spellschool" name="spell_school"><span class = "error" > </span>
                <input type="hidden" id="spell_school" value="">
                <br>
            </div>
            <div class="tooltip" title="The range of the spell. Please list units as well.">
                <label for="spellrange">Range: </label>
                <input type="text" id="spellrange" name="spell_range"><span class = "error" > </span>
                <input type="hidden" id="spell_range" value="">
                <br>
            </div>
            <div class="tooltip" title="How long the spell lasts once cast.">
                <label for="spellduration">Duration: </label>
                <input type="text" id="spellduration" name="spell_duration"><span class = "error" > </span>
                <input type="hidden" id="spell_duration" value="">
                <br>
            </div>
            <div class="tooltip" title="How long the spell takes to cast.">
                <label for="spellcast">Casting Time: </label>
                <input type="text" id="spellcast" name="spell_cast"><span class = "error" > </span>
                <input type="hidden" id="spell_cast" value="">
                <br>
            </div>
            <div class="tooltip" title="How much damage this does, if applicable.">
                <label for="spelldmg">Damage: </label>
                <input type="text" id="spelldmg" name="spell_dmg"><span class = "error" > </span>
                <input type="hidden" id="spell_dmg" value="">
                <br>
            </div>
            <div class="tooltip" title="The skill level required to use this. Beginner, Master...">
                <label for="spelllevel">Level: </label>
                <input type="text" id="spelllevel" name="spell_level"><span class = "error" > </span>
                <input type="hidden" id="spell_level" value="">
                <br>
            </div>
            <div class="tooltip" title="Any materials required to cast the spell, or use the power.">
                <label for="spellmats">Materials: </label>
                <input type="text" id="spellmats" name="spell_mats"><span class = "error" > </span>
                <input type="hidden" id="spell_mats" value="">
                <br>
            </div>
            <div class="tooltip" title="Is a ritual of sorts required for this?">
                <label for="spellrit">Ritual: </label>
                <input type="text" id="spellrit" name="spell_rit"><span class = "error" > </span>
                <input type="hidden" id="spell_rit" value="">
                <br>
            </div>
            <div class="tooltip" title="Tags, or categories used to help find this easier while searching.">
                <label for="spelltags">Tags: </label>
                <input type="text" id="spelltags" name="spell_tags"><span class = "error" > </span>
                <input type="hidden" id="spell_tags" value="">
                <br>
            </div>
            <?php
            if ($username != "Test User") {
                echo "<button type='submit' name='spellbutton' id='spell_button'>Add ability, spell or power!</button> ";
            }
            ?>
        </form>
    </div>
</body>
