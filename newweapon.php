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
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/expanding.jquery.js"></script>
    <script type="text/javascript" src="scripts/addthings.js"></script>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div id ="weapons">
        <h3>New Weapon</h3>
        <?php
        if (isset($_POST["weapbutton"])) {
            echo "<span id='success'>Weapon successfuly added!</span>";
            echo '<br>';
        }
        ?>
        <label for="fillit" id="filllabel">Fill Blank Spots: </label>
        <input type="checkbox" id="fillit" name="fillempties" onclick ="fillblanksweap()">
        <form id="newweap" method="post" class="align" action="newweapon.php">
            <div class="tooltip" title="The name of the weapon, obviously.">
                <label for="weapname" id="weapnamelabel">Weapon Name: </label>
                <input type="text" required id="weapname" name="weap_name"><span class = "error" ></span>
                <input type="hidden" id="weap_name" value="">
                <br>
            </div>
            <?php getcharnames($db, $username, $info, "Character Name:"); ?>
            <div class="tooltip" title="This is a short description of the weapon.">
                <label for="weapdesc">Weapon Description: </label>
                <textarea id="weapdesc" required name="weap_desc" class='expanding'></textarea><span class = "error" ></span>
                <input type="hidden" id="weap_desc" value="">
                <br>
            </div>
            <div class="tooltip" title="The appearance of the weapon.">
                <label for="weapappear">Weapon Appearance: </label>
                <textarea id="weapappear" required name="weap_appear" class='expanding'></textarea><span class = "error" ></span>
                <input type="hidden" id="weap_appear" value="">
                <br>
            </div>
            <div class="tooltip" title="The type or class of the weapon. Melee, ranged, sword...">
                <label for="weaptype">Weapon Type: </label>
                <input type="text" required id="weaptype" name="weap_type"><span class = "error" ></span>
                <input type="hidden" id="weap_type" value="">
                <br>
            </div>
            <div class="tooltip" title="This is the size of the weapon. Can be in relation to character. If units, please list the units.">
                <label for="weapsize">Weapon Size: </label>
                <input type="text" id="weapsize" name="weap_size"><span class = "error" ></span>
                <input type="hidden" id="weap_size" value="">
                <br>
            </div>
            <div class="tooltip" title="Which hand the weapon can go in. Left, right, both...">
                <label for="weaphand">Weapon Hand: </label>
                <input type="text" id="weaphand" name="weap_hand"><span class = "error" ></span>
                <input type="hidden" id="weap_hand" value="">
                <br>
            </div>
            <div class="tooltip" title="Any effects the weapon has. On the user and/or target.">
                <label for="weapeffect">Weapon Effects: </label>
                <input type="text" id="weapeffect" name="weap_effect"><span class = "error" ></span>
                <input type="hidden" id="weap_effect" value="">
                <br>
            </div>
            <div class="tooltip" title="Any conditions that have to be met for the weapon to be used.">
                <label for="weapcond">Weapon Conditions: </label>
                <input type="text" id="weapcond" name="weap_cond"><span class = "error" ></span>
                <input type="hidden" id="weap_cond" value="">
                <br>
            </div>
            <div class="tooltip" title="The value of the weapon. This area is not required, but can be used if so desired.">
                <label for="weapvalue">Weapon Value: </label>
                <input type="text" id="weapvalue" name="weap_value"><span class = "error" ></span>
                <input type="hidden" id="weap_value" value="">
                <br>
            </div>
            <?php
            if ($username != "Test User") {
                echo "<button type'submit' name='weapbutton' id='weap_button'>Add Weapon!</button>";
            }
            ?>
        </form>
    </div>
</body>