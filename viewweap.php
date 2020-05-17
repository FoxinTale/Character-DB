<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <title>Weapon Details</title>
</head>
<body>
    <h3 class="w3-display-header">Weapon</h3>
    <section class="w3-light-purple-box">
        <label for="weapname" class='w3-info-title'>Name: </label>
        <p id="weapname"><?php echo $_POST['weap_name']; ?></p>
        <label for="weapdesc" class='w3-info-title'>Description: </label>
        <p id="weapdesctext"><?php echo $_POST['weap_desc_orig']; ?></p>
        <label for="weapappear" class='w3-info-title'>Appearance: </label>
        <p id="weapappear"><?php echo $_POST['weap_appear']; ?></p>
        <label for="weaptype" class='w3-info-title'>Type: </label>
        <p id="weaptype"><?php echo $_POST['weap_type']; ?></p>
        <label for="weapsize" class='w3-info-title'>Size: </label>
        <p id="weapsize"><?php echo $_POST['weap_size']; ?>"</p>
        <label for="weaphand" class='w3-info-title'>Hand: </label>
        <p id="weaphand"><?php echo $_POST['weap_hand']; ?></p>
        <label for="weapeffect" class='w3-info-title'>Effects: </label>
        <p id="weapeffect"><?php echo $_POST['weap_effect']; ?></p>
        <label for="weapcond" class='w3-info-title'>Conditions: </label>
        <p id="weapcond"><?php echo $_POST['weap_cond']; ?></p>
        <label for="weapvalue" class='w3-info-title'>Value: </label>
        <p id="weapvalue"><?php echo $_POST['weap_value']; ?></p>
    </section>
</body>