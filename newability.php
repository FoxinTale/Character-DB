<!DOCTYPE html>
<?php
if (isset($_POST["spellbutton"])) {
   //  print_r($_POST);
}
?>
<head>
    <meta charset="UTF-8">
    <title>New Weapon</title>
    <link rel="stylesheet" href="css/spell.css">
</head>
<body>

    <div id ="spell">
        <h3 id="spellheader">New Power, Ability, or spell.</h3>
        <span id="spell_success"> </span>
        <form id="new_ability" method='post' class="align" action='newability.php'>
            <div class="tooltip" title="The name of the spell / ability, obviously.">
                <label for="spellname" id="spellnamelabel">Power Name: </label>
                <input type="text" id="spellname" name="spell_name"><span class = "error" ></span>
                <input type="hidden" id="spell_name" value="">
                <br>
            </div>
            <div class="tooltip" title="This is a short description of the power.">
                <label for="spelldesc">Power Description: </label>
                <input type="text" id="spelldesc" name="spell_desc"><span class = "error" ></span>
                <input type="hidden" id="spell_desc" value="">
                <br>
            </div>
            <div class="tooltip" title="If the power changes upon getting to a higher level.">
                <label for="spelldesc2">Power Desc. Two: </label>
                <input type="text" id="spelldesc2" name="spell_desc2"><span class = "error" ></span>
                <input type="hidden" id="spell_desc2" value="">
                <br>
            </div>
            <div class="tooltip" title="The type, or class of the spell. Can be elemental, or otherwise.">
                <label for="spelltype">Type: </label>
                <input type="text" id="spelltype" name="spell_type"><span class = "error" ></span>
                <input type="hidden" id="spell_type" value="">
                <br>
            </div>
            <div class="tooltip" title="The school of magic, if applicable. Restoration, Conjuration...">
                <label for="spellschool">School: </label>
                <input type="text" id="spellschool" name="spell_school"><span class = "error" ></span>
                <input type="hidden" id="spell_school" value="">
                <br>
            </div>
            <div class="tooltip" title="The range of the spell. Please list units as well.">
                <label for="spellrange">Range: </label>
                <input type="text" id="spellrange" name="spell_range"><span class = "error" ></span>
                <input type="hidden" id="spell_range" value="">
                <br>
            </div>
            <div class="tooltip" title="How long the spell lasts once cast.">
                <label for="spellduration">Duration: </label>
                <input type="text" id="spellduration" name="spell_duration"><span class = "error" ></span>
                <input type="hidden" id="spell_duration" value="">
                <br>
            </div>
            <div class="tooltip" title="How long the spell takes to cast.">
                <label for="spellcast">Casting Time: </label>
                <input type="text" id="spellcast" name="spell_cast"><span class = "error" ></span>
                <input type="hidden" id="spell_cast" value="">
                <br>
            </div>
            <div class="tooltip" title="The skill level required to use this. Beginner, Master...">
                <label for="spelllevel">Level: </label>
                <input type="text" id="spelllevel" name="spell_level"><span class = "error" ></span>
                <input type="hidden" id="spell_level" value="">
                <br>
            </div>
            <div class="tooltip" title="Any materials required to cast the spell, or use the power.">
                <label for="spellmats">Materials: </label>
                <input type="text" id="spellmats" name="spell_mats"><span class = "error" ></span>
                <input type="hidden" id="spell_mats" value="">
                <br>
            </div>
            <div class="tooltip" title="Is a ritual of sorts required for this?">
                <label for="spellrit">Ritual: </label>
                <input type="text" id="spellrit" name="spell_rit"><span class = "error" ></span>
                <input type="hidden" id="spell_rit" value="">
                <br>
            </div>
            <div class="tooltip" title="Tags, or categories used to help find this easier while searching.">
                <label for="spelltags">Tags: </label>
                <input type="text" id="spelltags" name="spell_tags"><span class = "error" ></span>
                <input type="hidden" id="spell_tags" value="">
                <br>
            </div>
            <button type="submit" name="spellbutton" id="spell_button">Add ability, spell or power!</button>   
        </form>
    </div>
</body>
