<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/display.css">
    <title>Character List</title>
</head>
<body>
    <div class="spellcontent">
        <label for="spellname" id="spellnamelabel">Name: </label>
        <input type="text" readonly id="spellname" name="spell_name" value="<?php echo $_POST['spell_name']; ?>">
        <br>
        <label for="charname" id="charnamelabel">Used By: </label>
        <input type="text" readonly id="charname" name="char_name" value="<?php echo $_POST['char_name']; ?>">
        <br>
        <label for="spelldesctext">Description: </label>
        <div id="spelldesctext"class="textdiv"><?php echo $_POST['spell_desc_orig']; ?></div>
        <br>
        <label for="spelldesctext2">Extra Description: </label>
        <div id="spelldesctext2" class="textdiv"><?php echo $_POST['spell_desc2']; ?></div>
        <br>
        <label for="spelltype">Type: </label>
        <input type="text" readonly id="spelltype" name="spell_type" value="<?php echo $_POST['spell_type']; ?>">
        <br>
        <label for="spellschool">School of Magic: </label>
        <input type="text" readonly id="spellschool" name="spell_school" value="<?php echo $_POST['spell_school']; ?>">
        <br>
        <label for="spellrange">Range: </label>
        <input type="text" readonly id="spellrange" name="spell_range" value="<?php echo $_POST['spell_range']; ?>">
        <br>
        <label for="spellduration">Duration: </label>
        <input type="text" readonly id="spellduration" name="spell_duration" value="<?php echo $_POST['spell_duration']; ?>">
        <br>
        <label for="spellcast">Casting Time: </label>
        <input type="text" readonly id="spellcast" name="spell_cast" value="<?php echo $_POST['spell_cast']; ?>">
        <br>
        <label for="spelldmg">Damage: </label>
        <input type="text" readonly id="spelldmg" name="spell_dmg" value="<?php echo $_POST['spell_dmg']; ?>">
        <br>
        <label for="spelllvl">Level: </label>
        <input type="text" readonly id="spelllvl" name="spell_lvl" value="<?php echo $_POST['spell_level']; ?>">
        <br>
        <label for="spellrit">Ritual: </label>
        <input type="text" readonly id="spellrit" name="spell_rit" value="<?php echo $_POST['spell_ritual']; ?>">
        <br>
        <label for="spellmats">Materials: </label>
        <input type="text" readonly id="spellmats" name="spell_mats" value="<?php echo $_POST['spell_materials']; ?>">
        <br>
    </div>
</body>