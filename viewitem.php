<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/display.css">
    <title>Character List</title>
</head>
<body>
    <section class="itemcontent">
        <label for="itemname" id="itemnamelabel">Item Name: </label>
            <p id="itemname" class="textdiv"><?php echo $_POST['item_name']; ?>></p>
        <label for="itemdesctext">Item Description: </label>
            <p id="itemdesctext" class="textdiv"><?php echo $_POST['item_desc_orig']; ?></p>
        <label for="itemappear">Item Appearance: </label>
            <p id="itemappear" class="textdiv"><?php echo $_POST['item_appear']; ?></p>
        <label for="itemtype">Item Type: </label>
            <p id="itemtype" class="textdiv"><?php echo $_POST['item_type']; ?></p>
        <label for="itemsize">Item Size: </label>
            <p id="itemsize" class="textdiv"><?php echo $_POST['item_size']; ?></p>
        <label for="itemhand">Item Hand: </label>
            <p id="itemhand" class="textdiv"><?php echo $_POST['item_loc']; ?></p>
        <label for="itemeffect">Item Effects: </label>
            <p id="itemeffect" class="textdiv"><?php echo $_POST['item_effect']; ?></p>
        <label for="itemcond">Item Conditions: </label>
            <p id="itemcond" class="textdiv"><?php echo $_POST['item_cond']; ?></p>
        <label for="itemvalue">Item Value: </label>
            <p id="itemvalue" class="textdiv"><?php echo $_POST['item_value']; ?></p>
    </section>
</body>