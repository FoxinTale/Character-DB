<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/display.css">
    <title>Character List</title>
</head>
<body>
    <div class="itemcontent">
        <label for="itemname" id="itemnamelabel">Item Name: </label>
        <input type="text" readonly id="itemname" name="item_name" value="<?php echo $_POST['item_name']; ?>">
        <br>
        <label for="itemdesctext">Item Description: </label>
        <div id="itemdesctext" class="textdiv"><?php echo $_POST['item_desc_orig']; ?></div>
        <br>
        <label for="itemappear">Item Appearance: </label>
        <div id="itemappear" class="textdiv"><?php echo $_POST['item_appear']; ?></div>
        <br>
        <label for="itemtype">Item Type: </label>
        <input type="text" readonly id="itemtype" name="item_type" value="<?php echo $_POST['item_type']; ?>">
        <br>
        <label for="itemsize">Item Size: </label>
        <input type="text" readonly id="itemsize" name="item_size" value="<?php echo $_POST['item_size']; ?>">
        <br>
        <label for="itemhand">Item Hand: </label>
        <input type="text" readonly id="itemhand" name="item_hand" value=""<?php echo $_POST['item_loc']; ?>">
        <br>
        <label for="itemeffect">Item Effects: </label>
        <div id="itemeffect" class="textdiv"><?php echo $_POST['item_effect']; ?></div>
        <br>
        <label for="itemcond">Item Conditions: </label>
        <div id="itemcond" class="textdiv"><?php echo $_POST['item_cond']; ?></div>
        <br>
        <label for="itemvalue">Item Value: </label>
        <input type="text" readonly id="itemvalue" name="item_value" value="<?php echo $_POST['item_value']; ?>">
    </div>
</body>