<!DOCTYPE html>
<?php
session_start();
require('inc/functions.php');
$username = $_SESSION["username"];
$info = "use(s) this item.";

if (isset($_POST["newitem"])) {
    $item = datacheck($_POST);
    additem($db, $item, $username);
}
?>
<head>
    <meta charset="UTF-8">
    <title>New Item</title>
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/expanding.jquery.js"></script>
    <script type="text/javascript" src="scripts/addthings.js"></script>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div id ="items">
        <h3 id="itemheader">New Item</h3>
        <?php
        if (isset($_POST["itembutton"])) {
            echo "<span id='success'>Item successfuly added!</span>";
            echo '<br>';
        }
        ?>
        <label for="fillit"  id="filllabel">Fill Blank Spots: </label>
        <input type="checkbox" id="fillit" name="fillempties" onclick ="fillblanksitem()">
        <form id="newitem" method="post" class="align" action="newitem.php">
            <div class="tooltip" title="The name of the item, obviously.">
                <label for="itemname" id="itemnamelabel">Item Name: </label>
                <input type="text" required id="itemname" name="item_name"><span class = "error" ></span>
                <input type="hidden" id="item_name" value="">
                <br>
            </div>
            <?php getcharnames($db, $username, $info, "Character Name"); ?>
            <div class="tooltip" title="A short description of the item.">
                <label for="itemdesc">Item Description: </label>
                <textarea id="itemdesc" required name="item_desc" class='expanding'></textarea><span class = "error" ></span>
                <input type="hidden" id="item_desc" value="">
                <br>
            </div>
            <div class="tooltip" title="The appearance of the item.">
                <label for="itemappear">Item Appearance: </label>
                <textarea required id="itemappear" name="item_appear" class='expanding'></textarea><span class = "error" ></span>
                <input type="hidden" id="item_appear" value="">
                <br>
            </div>
            <div class="tooltip" title="The type or class of the item. Magical, tool, or otherwise.">
                <label for="itemtype">Item Type: </label>
                <input type="text" required id="itemtype" name="item_type"><span class = "error" ></span>
                <input type="hidden" id="item_type" value="">
                <br>
            </div>
            <div class="tooltip" title="This is the size of the item. Can be in relation to character. If units, please list the units.">
                <label for="itemsize">Item Size: </label>
                <input type="text" id="itemsize" name="item_size"><span class = "error" ></span>
                <input type="hidden" id="item_size" value="">
                <br>
            </div>
            <div class="tooltip" title="Where the item can go on the character. Is it headwear, a ring, a necklace, held in the hand?...">
                <label for="itemloc">Item Location: </label>
                <input type="text" id="itemloc" name="item_loc"><span class = "error" ></span>
                <input type="hidden" id="item_loc" value="">
                <br>
            </div>
            <div class="tooltip" title="Any effects the item has. On the user and/or area...">
                <label for="itemeffect">Item Effects: </label>
                <input type="text" id="itemeffect" name="item_effect"><span class = "error" ></span>
                <input type="hidden" id="item_effect" value="">
                <br>
            </div>
            <div class="tooltip" title="Any conditions that have to be met for the item to be used.">
                <label for="itemcond">Item Conditions: </label>
                <input type="text" id="itemcond" name="item_cond"><span class = "error" ></span>
                <input type="hidden" id="item_cond" value="">
                <br>
            </div>
            <div class="tooltip" title="The value of the item. This area is not required, but can be used if so desired.">
                <label for="itemvalue">Item Value: </label>
                <input type="text" id="itemvalue" name="item_value"><span class = "error" ></span>
                <input type="hidden" id="item_value" value="">
                <br>
            </div>
            <?php
            if ($username != "Test User") {
                echo "<button type='submit' id='item_button' name='itembutton'>Add Item!</button>";
            }
            ?>
        </form>
    </div>
</body>