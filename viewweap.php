<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/display.css">
    <title>Character List</title>
</head>
<body>
    <section class="weapcontent">
        <label for="weapname" id="weapnamelabel">Weapon Name: </label>
            <p id="weapname" class="textdiv"><?php echo $_POST['weap_name']; ?></p>
        <label for="weapdesc">Weapon Description: </label>
            <p id="weapdesctext" class="textdiv"><?php echo $_POST['weap_desc_orig']; ?></p>
        <label for="weapappear">Weapon Appearance: </label>
            <p id="weapappear" class="textdiv"><?php echo $_POST['weap_appear']; ?></p>
        <label for="weaptype">Weapon Type: </label>
            <p id="weaptype" class="textdiv"><?php echo $_POST['weap_type']; ?></p>
        <label for="weapsize">Weapon Size: </label>
            <p id="weapsize" class="textdiv"><?php echo $_POST['weap_size']; ?>"</p>
        <label for="weaphand">Weapon Hand: </label>
            <p id="weaphand" class="textdiv"><?php echo $_POST['weap_hand']; ?></p>
        <label for="weapeffect">Weapon Effects: </label>
            <p id="weapeffect" class="textdiv"><?php echo $_POST['weap_effect']; ?></p>
        <label for="weapcond">Weapon Conditions: </label>
            <p id="weapcond" class="textdiv"><?php echo $_POST['weap_cond']; ?></p>
        <label for="weapvalue">Weapon Value: </label>
            <p id="weapvalue" class="textdiv"><?php echo $_POST['weap_value']; ?></p>
    </section>
</body>