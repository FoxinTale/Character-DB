<!DOCTYPE html>
<?php
session_start();
require('inc/functions.php');
$username = $_SESSION["username"];
$info = "wield(s) this weapon.";

if (isset($_POST["weapbutton"])) {
    $weapon = datacheck($_POST);
    addweap($db, $weapon, $username);
}
?>
<head>
    <meta charset="UTF-8">
    <title>New Weapon</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
</head>
<body>
    <div class="w3-pale-purple-box">
        <h3 class="w3-display-header">New Weapon</h3>
        <?php
        if (isset($_POST["weapbutton"])) {
            echo "<span id='success'>Weapon successfuly added!</span>";
            echo '<br>';
        }
        ?>
        <form id="newweap" method="post" class="w3-light-purple-box w3-container" action="newweapon.php">
            <p class="tooltip" title="The name of the weapon, obviously.">
                <label for="weapname" id="weapnamelabel">Weapon Name: </label>
                <input type="text" required id="weapname" name="weap_name" class='w3-input'>
            </p>
            <?php getcharnames($db, $username, $info, "Character Name"); ?>
            <p class="tooltip" title="This is a short description of the weapon.">
                <label for="weapdesc">Weapon Description: </label>
                <textarea id="weapadesc" required name="weap_desc" class='w3-textarea'></textarea>
            </p>
            <p class="tooltip" title="The appearance of the weapon.">
                <label for="weapappear">Weapon Appearance: </label>
                <textarea id="weapappear" required name="weap_appear" class='w3-textarea'></textarea>
            </p>
            <p class="tooltip" title="The type or class of the weapon. Melee, ranged, sword...">
                <label for="weaptype">Weapon Type: </label>
                <input type="text" required id="weaptype" name="weap_type" class='w3-input w3-border-blk'>
            </p>
            <p class="tooltip" title="This is the size of the weapon. Can be in relation to character. If units, please list the units.">
                <label for="weapsize">Weapon Size: </label>
                <input type="text" id="weapsize" name="weap_size" class='w3-input w3-border-blk'>
            </p>
            <p class="tooltip" title="Which hand the weapon can go in. Left, right, both...">
                <label for="weaphand">Weapon Hand: </label>
                <input type="text" id="weaphand" name="weap_hand" class='w3-input w3-border-blk'>
            </p>
            <p class="tooltip" title="Any effects the weapon has. On the user and/or target.">
                <label for="weapeffect">Weapon Effects: </label>
                <input type="text" id="weapeffect" name="weap_effect" class='w3-input w3-border-blk'>
            </p>
            <p class="tooltip" title="Any conditions that have to be met for the weapon to be used.">
                <label for="weapcond">Weapon Conditions: </label>
                <input type="text" id="weapcond" name="weap_cond" class='w3-input w3-border-blk'>
            </p>
            <p class="tooltip" title="The value of the weapon. This area is not required, but can be used if so desired.">
                <label for="weapvalue">Weapon Value: </label>
                <input type="text" id="weapvalue" name="weap_value" class='w3-input w3-border-blk'>
            </p>
            <?php
            if ($username != "Test User") {
                echo "<button type'submit' name='weapbutton' id='weap_button' class='w3-btn w3-border'>Add Weapon!</button>";
            }
            ?>
        </form>
    </div>
</body>