<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/display.css">
    <title>Character List</title>
</head>
<body>
    <section class="spellcontent">
        <label for="spellname" id="spellnamelabel">Name: </label>
            <p id="spellname" class="textdiv"><?php echo $_POST['spell_name']; ?></p>
        <label for="charname" id="charnamelabel">Used By: </label>
            <p id="charname" class="textdiv"><?php echo $_POST['char_name']; ?><p>
        <label for="spelldesctext">Description: </label>
            <p id="spelldesctext" class="textdiv"><?php echo $_POST['spell_desc_orig']; ?></p>
        <label for="spelldesctext2">Extra Description: </label>
            <p id="spelldesctext2" class="textdiv"><?php echo $_POST['spell_desc2']; ?></p>
        <label for="spelltype">Type: </label>
            <p id="spelltype" class="textdiv"><?php echo $_POST['spell_type']; ?></p>
        <label for="spellschool">School of Magic: </label>
            <p id="spellschool" class="textdiv"><?php echo $_POST['spell_school']; ?></p>
        <label for="spellrange">Range: </label>
            <p id="spellrange" class="textdiv"><?php echo $_POST['spell_range']; ?></p>
        <label for="spellduration">Duration: </label>
            <p class="textdiv"><?php echo $_POST['spell_duration']; ?></p>
        <label for="spellcast">Casting Time: </label>
            <p id="spellcast" class="textdiv"><?php echo $_POST['spell_cast']; ?></p>
        <label for="spelldmg">Damage: </label>
            <p id="spelldmg" class="textdiv"><?php echo $_POST['spell_dmg']; ?></p>
        <label for="spelllvl">Level: </label>
            <p id="spelllvl" class="textdiv"><?php echo $_POST['spell_level']; ?></p>
        <label for="spellrit">Ritual: </label>
            <p id="spellrit" class="textdiv"><?php echo $_POST['spell_ritual']; ?></p>
        <label for="spellmats">Materials: </label>
            <p id="spellmats" class="textdiv"><?php echo $_POST['spell_materials']; ?></p>
    </section>
</body>