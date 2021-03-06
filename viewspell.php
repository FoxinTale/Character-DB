<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <title>Spell, Power or Ability Details</title>
</head>
<body>
    <h3 class="w3-display-header">Ability, Spell, or Power.</h3>
    <section class="w3-light-purple-box">
        <p><label for="spellname" class='w3-info-title'>Name: </label>
            <span id="spellname"><?php echo $_POST['spell_name']; ?></span></p>
        <p><label for="charname" class='w3-info-title'>Used By: </label>
            <span id="charname"><?php echo $_POST['char_name']; ?></span><p>
        <p><label for="spelldesctext" class='w3-info-title'>Description: </label>
            <span id="spelldesctext"><?php echo $_POST['spell_desc_orig']; ?></span></p>
        <p><label for="spelldesctext2" class='w3-info-title'>Extra Description: </label>
            <span id="spelldesctext2"><?php echo $_POST['spell_desc2']; ?></span></p>
        <p><label for="spelltype" class='w3-info-title'>Type: </label>
            <span id="spelltype"><?php echo $_POST['spell_type']; ?></span></p>
        <p><label for="spellschool" class='w3-info-title'>School of Magic: </label>
            <span id="spellschool"><?php echo $_POST['spell_school']; ?></span></p>
        <p><label for="spellrange" class='w3-info-title'>Range: </label>
            <span id="spellrange"><?php echo $_POST['spell_range']; ?></span></p>
        <p><label for="spellduration" class='w3-info-title'>Duration: </label>
            <span id="spellduration"><?php echo $_POST['spell_duration']; ?></span></p>
        <p><label for="spellcast" class='w3-info-title'>Casting Time: </label>
            <span id="spellcast"><?php echo $_POST['spell_cast']; ?></span></p>
        <p><label for="spelldmg" class='w3-info-title'>Damage: </label>
            <span id="spelldmg"><?php echo $_POST['spell_dmg']; ?></span></p>
        <p><label for="spelllvl" class='w3-info-title'>Level: </label>
            <span id="spelllvl"><?php echo $_POST['spell_level']; ?></span></p>
        <p><label for="spellrit" class='w3-info-title'>Ritual: </label>
            <span id="spellrit"><?php echo $_POST['spell_ritual']; ?></span></p>
        <p><label for="spellmats" class='w3-info-title'>Materials: </label>
            <span id="spellmats"><?php echo $_POST['spell_materials']; ?></span></p>
    </section>
</body>