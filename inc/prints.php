<?php


function printweapinfo($weapinfo) {
    $charname = $weapinfo['char_name'];
    $weapappear = $weapinfo['weap_appear'];
    $weapname = $weapinfo['weap_name'];
    $weapdesc = $weapinfo['weap_desc'];
    $weaptype = $weapinfo['weap_type'];
    $weapsize = $weapinfo['weap_size'];
    $weaphand = $weapinfo['weap_hand'];
    $weapeffect = $weapinfo['weap_effect'];
    $weapcond = $weapinfo['weap_cond'];
    $weapvalue = $weapinfo['weap_value'];

    echo "<form class='w3-light-purple-databox' method='post' action='viewweap.php'>";
    echo "<p><label for='weapname' id='weapnamelabel'>Weapon Name: </label>";
    echo "<input type='text' readonly id='weapname' name = 'weap_name' value='$weapname'></p>";
    echo "<p><label for='charnameweap' id='charnamelabelweap'>Used By: </label>";
    echo "<input type='text' readonly id='charnameweap' name = 'char_name' value='$charname'></p>";
    echo "<p><label for='weapdesc' id='charnamelabelweap'>Description: </label>";
    echo "<span id='weapdesc'>$weapdesc</span></p>";
    echo "<p><label for='weaptype' id='weaptypelabel'>Weapon Type: </label>";
    echo "<input type='text' readonly id='weaptype' name = 'weap_type' value='$weaptype'></p>";
    echo "<p><label for='weapvalue' id='weapvaluelabel'>Weapon Type: </label>";
    echo "<input type='text' readonly id='weapvalue' name = 'weap_value' value='$weapvalue'></p>";

    echo "<input type='hidden' name='weap_desc_orig' value='$weapdesc'>";
    echo "<input type='hidden' name='weap_appear' value='$weapappear'>";
    echo "<input type='hidden' name='weap_size' value='$weapsize'>";
    echo "<input type='hidden' name='weap_hand' value='$weaphand'>";
    echo "<input type='hidden' name='weap_effect' value='$weapeffect'>";
    echo "<input type='hidden' name='weap_cond' value='$weapcond'>";
    echo '<br>';
    echo "<input type = 'submit' id = 'moreweapinfo' name='moreinfo' value = 'More info.'>";
    echo '</form>';
}


function printiteminfo($iteminfo) {
    $itemname = $iteminfo['item_name'];
    $charname = $iteminfo['char_name'];
    $itemdesc = $iteminfo['item_desc'];
    $itemappear = $iteminfo['item_appear'];
    $itemtype = $iteminfo['item_type'];
    $itemsize = $iteminfo['item_size'];
    $itemloc = $iteminfo['item_loc'];
    $itemeffects = $iteminfo['item_effects'];
    $itemcond = $iteminfo['item_cond'];
    $itemvalue = $iteminfo['item_value'];

    echo "<form class='w3-light-purple-databox' method='post' action='viewitem.php'>";
    echo "<p><label for='itemname' id='itemnamelabel'>Item Name: </label>";
    echo "<input type='text' readonly id='itemname' name = 'item_name' value='$itemname'></p>";
    echo "<p><label for='charnameitem' id='charnamelabelitem'>Used By: </label>";
    echo "<input type='text' readonly id='charnameitem' name = 'char_name' value='$charname'></p>";
    echo "<p><label for='itemdesc' id='charnamelabelitem'>Description: </label>";
    echo "<span id='itemdesc>$itemdesc</span></p>";
    echo "<p><label for='itemtype' id='itemtypelabel'>Item Type: </label>";
    echo "<input type='text' readonly id='itemtype' name = 'item_type' value='$itemtype'></p>";
    echo "<p><label for='itemvalue' id='itemvaluelabel'>Item Value: </label>";
    echo "<input type='text' readonly id='itemvalue' name = 'item_value' value='$itemvalue'></p>";

    echo "<input type='hidden' name='item_desc_orig' value='$itemdesc'>";
    echo "<input type='hidden' name='item_appear' value='$itemappear'>";
    echo "<input type='hidden' name='item_size' value='$itemsize'>";
    echo "<input type='hidden' name='item_loc' value='$itemloc'>";
    echo "<input type='hidden' name='item_effect' value='$itemeffects'>";
    echo "<input type='hidden' name='item_cond' value='$itemcond'>";
    echo '<br>';
    echo "<input type = 'submit' id = 'moreiteminfo' name='moreinfo' value = 'More info.'>";
    echo '</form>';
}


function printspellinfo($spellinfo) {
    $spellname = $spellinfo['spell_name'];
    $charname = $spellinfo['char_name'];
    $spelldesc = $spellinfo['spell_desc'];
    $spelldesc2 = $spellinfo['spell_desc_ext'];
    $spelltype = $spellinfo['spell_type'];
    $spellschool = $spellinfo['spell_school'];
    $spellrange = $spellinfo['spell_range'];
    $spellduration = $spellinfo['spell_duration'];
    $spellcast = $spellinfo['spell_cast'];
    $spelldmg = $spellinfo['spell_dmg'];
    $spelllevel = $spellinfo['spell_level'];
    $spellritual = $spellinfo['spell_ritual'];
    $spellmats = $spellinfo['spell_materials'];

    echo "<form class='w3-light-purple-databox' method='post' action='viewspell.php'>";
    echo "<p  class='w3-text-display' ><label for='spellname' id='spellnamelabel'>Name: </label>";
    echo "<input readonly type='text' id='spellname' name = 'spell_name' class='w3-text-display'value='$spellname'></p>";
    echo "<p  class='w3-text-display' ><label for='charnamespell' id='charnamelabelspell'>Used By: </label>";
    echo "<input readonly type='text' id='charnamespell' name = 'char_name' value='$charname'></p>";
    echo "<p class='w3-text-display'><label for='spelldesc'>Description: </label>";
    echo "<span id='spelldesc' class='w3-text-display'>$spelldesc</span></p>";
    echo "<p class='w3-text-display'><label for='spelltype' id='spelltypelabel'>Type: </label>";
    echo "<input readonly type='text' id='spelltype' name = 'spell_type' value='$spelltype'></p>";
    echo "<p class='w3-text-display' ><label for='spellschool' id='spellschoollabel'>School: </label>";
    echo "<input readonly type='text' id='spellschool' name = 'spell_school' value='$spellschool'></p>";
    echo "<p class='w3-text-display' ><label for='spelldmg' id='spelldmglabel'>Damage: </label>";
    echo "<input readonly type='text' id='spelldmg' name = 'spell_dmg' value='$spelldmg'></p>";
    echo "<input type='hidden' name='spell_desc_orig' value='$spelldesc'>";
    echo "<input type='hidden' name='spell_desc2' value='$spelldesc2'>";
    echo "<input type='hidden' name='spell_range' value='$spellrange'>";
    echo "<input type='hidden' name='spell_duration' value='$spellduration'>";
    echo "<input type='hidden' name='spell_cast' value='$spellcast'>";
    echo "<input type='hidden' name='spell_level' value='$spelllevel'>";
    echo "<input type='hidden' name='spell_ritual' value='$spellritual'>";
    echo "<input type='hidden' name='spell_materials' value='$spellmats'>";
    echo '<br>';
    echo "<input type = 'submit' id = 'morespellinfo' name='moreinfo' value = 'More info.'>";
    echo '</form>';
}

function printcharinfo($charinfo) {
    $charID = $charinfo['Char_ID'];
    $charName = htmlspecialchars_decode($charinfo['Char_Name']);
    $charShortNames = htmlspecialchars_decode($charinfo['Char_ShortName']);
    $charShortDesc = htmlspecialchars_decode($charinfo['Char_ShortDesc']);
    $charAge = $charinfo['Char_Age'];
    $charGender = htmlspecialchars_decode($charinfo['Char_Gender']);
    $charRaceName = htmlspecialchars_decode($charinfo['Char_RaceName']);

    echo "<form class='light-purple box container coming' method='get' target='_blank' action='viewchar.php'>";
        echo "<input type='text' hidden readonly name='char_ID' value='$charID'>";
        echo '<p>';
            echo "<label for='char_name'>Name:</label>";
            echo "<input type='text' readonly class='textdisplay' id='char_name' value=\"$charName\">";
        echo '</p>';
        echo '<p>';
            echo "<label for='charalias'>Nicknames &amp; Aliases:</label>";
            echo "<input type='text' readonly class='textdisplay' id='charalias' value=\"$charShortNames\">";
        echo '</p>';
        echo '<p>';
            echo "<label for='shortdesc'>Short Description: </label>";
            echo "<textarea readonly id='shortdesc' class='textbox textdisplay'>$charShortDesc</textarea>";
        echo '</p>';
        echo '<p>';
            echo "<label for='char_age'>Age: </label>";
            echo "<input type='text' readonly class='textdisplay' id='char_age' value=\"$charAge\">";
        echo '</p>';
        echo '<p>';
            echo "<label for='char_gender'>Gender: </label>";
            echo "<input type='text' readonly class='textdisplay' id='char_gender' value=\"$charGender\">";
        echo '</p>';
        echo '<p>';
            echo "<label for='char_racename>Race: </label>";
            echo "<input type='text' readonly class='displaytext' id='char_racename' value=\"$charRaceName\">";
        echo '</p>';
            echo "<label for='morecharinfo'>&nbsp;</label>";
            echo "<input type='submit' class='clicky-button clicky-button-two' id='morecharinfo' value='More Info'>";
    echo '</form>';
}

?>