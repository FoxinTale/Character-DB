<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/display.css">
    <title>Character List</title>
</head>
<body>
    <div class="weapcontent">
        <label for="weapname" id="weapnamelabel">Weapon Name: </label>
        <input type="text" readonly id="weapname" name="weap_name" value="<?php echo $_POST['weap_name']; ?>">
        <br>
        <label for="weapdesc">Weapon Description: </label>
        <div id="weapdesctext" class="textdiv"><?php echo $_POST['weap_desc_orig']; ?></div>
        <br>
        <label for="weapappear">Weapon Appearance: </label>
        <div id="weapappear" class="textdiv"><?php echo $_POST['weap_appear']; ?></div>
        <br>
        <label for="weaptype">Weapon Type: </label>
        <input type="text" readonly id="weaptype" name="weap_type" value="<?php echo $_POST['weap_type']; ?>">
        <br>
        <label for="weapsize">Weapon Size: </label>
        <input type="text" readonly id="weapsize" name="weap_size" value="<?php echo $_POST['weap_size']; ?>">
        <br>
        <label for="weaphand">Weapon Hand: </label>
        <input type="text" readonly id="weaphand" name="weap_hand" value="<?php echo $_POST['weap_hand']; ?>">
        <br>
        <label for="weapeffect">Weapon Effects: </label>
        <input type="text" readonly id="weapeffect" name="weap_effect" value="<?php echo $_POST['weap_effect']; ?>">
        <br>
        <label for="weapcond">Weapon Conditions: </label>
        <input type="text" readonly id="weapcond" name="weap_cond" value="<?php echo $_POST['weap_cond']; ?>">
        <br>
        <label for="weapvalue">Weapon Value: </label>
        <input type="text" readonly id="weapvalue" name="weap_value" value="<?php echo $_POST['weap_value']; ?>">
    </div>
</body>