<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <title>Item Details</title>
</head>
<body>
    <h3 class="w3-display-header">Weapon</h3>
    <section class="w3-light-purple-box">
        <label for="itemname" class='w3-info-title'>Item Name: </label>
        <p id="itemname"><?php echo $_POST['item_name']; ?>></p>
        <label for="itemdesctext" class='w3-info-title'>Item Description: </label>
        <p id="itemdesctext"><?php echo $_POST['item_desc_orig']; ?></p>
        <label for="itemappear" class='w3-info-title'>Item Appearance: </label>
        <p id="itemappear"><?php echo $_POST['item_appear']; ?></p>
        <label for="itemtype" class='w3-info-title'>Item Type: </label>
        <p id="itemtype"><?php echo $_POST['item_type']; ?></p>
        <label for="itemsize" class='w3-info-title'>Item Size: </label>
        <p id="itemsize"><?php echo $_POST['item_size']; ?></p>
        <label for="itemhand" class='w3-info-title'>Item Hand: </label>
        <p id="itemhand"><?php echo $_POST['item_loc']; ?></p>
        <label for="itemeffect" class='w3-info-title'>Item Effects: </label>
        <p id="itemeffect"><?php echo $_POST['item_effect']; ?></p>
        <label for="itemcond" class='w3-info-title'>Item Conditions: </label>
        <p id="itemcond"><?php echo $_POST['item_cond']; ?></p>
        <label for="itemvalue" class='w3-info-title'>Item Value: </label>
        <p id="itemvalue"><?php echo $_POST['item_value']; ?></p>
    </section>
</body>