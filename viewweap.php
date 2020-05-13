<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <title>Character List</title>
</head>
<body>
    <h3 class="w3-display-header">Weapon</h3>
    <section class="w3-light-purple-box">
        <label for="weapname" id="weapnamelabel">Name: </label>
            <p id="weapname" class="textdiv"><?php echo $_POST['weap_name']; ?></p>
        <label for="weapdesc">Description: </label>
            <p id="weapdesctext" class="textdiv"><?php echo $_POST['weap_desc_orig']; ?></p>
        <label for="weapappear">Appearance: </label>
            <p id="weapappear" class="textdiv"><?php echo $_POST['weap_appear']; ?></p>
        <label for="weaptype">Type: </label>
            <p id="weaptype" class="textdiv"><?php echo $_POST['weap_type']; ?></p>
        <label for="weapsize">Size: </label>
            <p id="weapsize" class="textdiv"><?php echo $_POST['weap_size']; ?>"</p>
        <label for="weaphand">Hand: </label>
            <p id="weaphand" class="textdiv"><?php echo $_POST['weap_hand']; ?></p>
        <label for="weapeffect">Effects: </label>
            <p id="weapeffect" class="textdiv"><?php echo $_POST['weap_effect']; ?></p>
        <label for="weapcond">Conditions: </label>
            <p id="weapcond" class="textdiv"><?php echo $_POST['weap_cond']; ?></p>
        <label for="weapvalue">Value: </label>
            <p id="weapvalue" class="textdiv"><?php echo $_POST['weap_value']; ?></p>
    </section>
</body>