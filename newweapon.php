<!DOCTYPE html>
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <title>New Weapon</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="box light-purple container2 shadow-816">
        <h3 class="display-header">New Weapon</h3>
        <form id="newweap" class="align">
            <p class="tooltip" title="The name of the weapon, obviously.">
                <label for="weapname" id="weapnamelabel">Weapon Name: </label>
                <input type="text" class="textinput" id="weapname" name="weap_name">
            </p>
            <p class="tooltip" title="This is a short description of the weapon.">
                <label for="weapdesc">Weapon Description: </label>
                <textarea id="weapdesc" name="weap_desc" class='textbox'></textarea>
            </p>
            <p class="tooltip" title="The appearance of the weapon.">
                <label for="weapappear">Weapon Appearance: </label>
                <textarea id="weapappear" name="weap_appear" class='textbox'></textarea>
            </p>
            <p class="tooltip" title="The type or class of the weapon. Melee, ranged, sword...">
                <label for="weaptype">Weapon Type: </label>
                <input type="text" class="textinput" id="weaptype" name="weap_type">
            </p>
            <p class="tooltip" title="This is the size of the weapon. Can be in relation to character. If units, please list the units.">
                <label for="weapsize">Weapon Size: </label>
                <input type="text" class="textinput" id="weapsize" name="weap_size">
            </p>
            <p class="tooltip" title="Which hand the weapon can go in. Left, right, both...">
                <label for="weaphand">Weapon Hand: </label>
                <input type="text" class="textinput" id="weaphand" name="weap_hand">
            </p>
            <p class="tooltip" title="Any effects the weapon has. On the user and/or target.">
                <label for="weapeffect">Weapon Effects: </label>
                <textarea id="weapeffect" name="weap_effect" class='textbox'></textarea>
            </p>
            <p class="tooltip" title="Any conditions that have to be met for the weapon to be used.">
                <label for="weapcond">Weapon Conditions: </label>
                <textarea id="weapcond" name="weap_cond" class='textbox'></textarea>
            </p>
            <p class="tooltip" title="The value of the weapon. This area is not required, but can be used if so desired.">
                <label for="weapvalue">Weapon Value: </label>
                <input class="textinput" type="text" id="weapvalue" name="weap_value">
            </p>
            <?php
            if ($_SESSION['validUser']) {
                echo "<label for='weap_button'>&nbsp;</label>";
                echo "<input type='submit' class='clicky-button clicky-button-two' id='weap_button' value='Add Weapon'>";
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