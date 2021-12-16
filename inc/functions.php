<?php
require_once 'open_db.php';
define('CHARSET', 'ISO-8859-1');
define('REPLACE_FLAGS', ENT_COMPAT | ENT_XHTML);
/*
Safety Pig!
                         _
 _._ _..._ .-',     _.._(`))
'-. `     '  /-._.-'    ',/
   )         \            '.
  / _    _    |             \
 |  a    a    /              |
 \   .-.                     ;  
  '-('' ).-'       ,'       ;
     '-;           |      .'
        \           \    /
        | 7  .__  _.-\   \
        | |  |  ``/  /`  /
       /,_|  |   /,_/   /
          /,_/      '`-'
*/

function userinf($db, $username) {
    $query = "SELECT * from user_info where user_name = :username;";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function getuserinfo($db, $username, $password) {
    $query = "SELECT * from users;";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    verify_login($results, $username, $password);
}

function verify_login($userdata, $username, $password) {
    $users = array();
    $userpasses = array();
    $userIDs = array();
    $admins = array();
    $usercount = count($userdata);
    for ($x = 0; $x < $usercount; $x++) {
        array_push($userIDs, $userdata[$x]['User_ID']);
        array_push($users, $userdata[$x]['User_Name']);
        array_push($userpasses, $userdata[$x]['User_Password']);
        array_push($admins, $userdata[$x]['User_IsAdmin']);
    }
    $user_exists = in_array($username, $users);
    if (!$user_exists) {
        echo "<script>window.onload = function() { document.getElementById('errorbox').value = 'That user does not exist.'}</script>";
    } else {
        $userplace = array_search($username, $users);
        $userpass = $userpasses[$userplace];
        $userID = $userIDs[$userplace];
        $userIsAdmin = $admins[$userplace];
        
        if (password_verify($password, $userpass)) {
            $_SESSION['username'] = $username;
            $_SESSION['userID'] = $userID;
            $_SESSION['isAdmin'] = $userIsAdmin;
            header("Location: index.php");
        } else { echo "<script>window.onload = function() { document.getElementById('errorbox').value = 'Invalid Password'}</script>"; }
    }
}

function checkpass($db, $username, $password) {
    $query = "SELECT password FROM user_info WHERE user_name = :user";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $hash = $result['password'];
    return password_verify($password, $hash);
}

function adduser($db, $username, $password) {
    $user = htmlspecialchars($username);
    $encrypt_password = password_hash($password, PASSWORD_DEFAULT);
    adduserdata($db, $user, $encrypt_password);
    $_SESSION['username'] = $user;
    header('Location: index.php');
}

function existing_username($db, $username) {
    $query = "SELECT COUNT(user_name) FROM user_info WHERE user_name = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $exists = $statement->fetch();
    $statement->closeCursor();
    return $exists;
}

function adduserdata($db, $username, $password) {
    $query = "INSERT INTO user_info (user_name, password) VALUES (:username, :password);";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function datacheck($post) {
    $arr = array();
    foreach ($post as $key => $value) {
        if ($value == null) {
            $value = "N/A";
            // This should not happen, due to the required field elements.
            // If it does, summon Safety Pig.
        } else if ($value != null || $value != '') {
            array_push($arr, htmlspecialchars($value));
        }
    }
    return $arr;
}

function getid($db, $charname) {
    $query = "SELECT char_id from char_info where char_name = :name";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $charname);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results[0]['char_id'];
}

//nc = Null Checking
function nc($data) {
    if (!isset($data)) {
        echo "Not yet added";
    }
}

function addchar($db, $charinfo, $username) {
    $query = "INSERT INTO char_info(user_name, char_fullname, char_name, char_alias, char_desc, char_age, char_gender, char_sexuality, char_race, char_status,char_soul, char_other)
            VALUES(:user, :fullname, :name, :alias, :desc, :age, :gender, :sexuality, :race, :status, :soul, :other);";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->bindValue(':fullname', $charinfo[0]);
    $statement->bindValue(':name', $charinfo[1]);
    $statement->bindValue(':alias', $charinfo[2]);
    $statement->bindValue(':desc', $charinfo[3]);
    $statement->bindValue(':age', $charinfo[4]);
    $statement->bindValue(':gender', $charinfo[5]);
    $statement->bindValue(':sexuality', $charinfo[6]);
    $statement->bindValue(':race', $charinfo[7]);
    $statement->bindValue(':status', $charinfo[8]);
    $statement->bindValue(':soul', $charinfo[9]);
    $statement->bindValue(':other', $charinfo[10]);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function addappearance($db, $appear) {
    $query = "INSERT INTO char_appear(char_name, app_eyes, app_hair, app_ears, app_height, app_weight, app_skin, app_unique, app_other)
            VALUES(:name, :eyes, :hair, :ears, :height, :weight, :skin, :unique, :other);";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $appear[0]);
    $statement->bindValue(':eyes', $appear[1]);
    $statement->bindValue(':hair', $appear[2]);
    $statement->bindValue(':ears', $appear[3]);
    $statement->bindValue(':height', $appear[4]);
    $statement->bindValue(':weight', $appear[5]);
    $statement->bindValue(':skin', $appear[6]);
    $statement->bindValue(':unique', $appear[7]);
    $statement->bindValue(':other', $appear[8]);
    $success = $statement->execute();
    $statement->closeCursor();
    appupdate($db, $appear[0]);
    return $success;
}

function appupdate($db, $charname) {
    $id = getid($db, $charname);
    $query = "UPDATE char_appear SET char_appear.char_id = :id where char_appear.char_name = :name;";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $charname);
    $statement->execute();
    $statement->closeCursor();
}

function addpers($db, $pers) {
    $query = "INSERT INTO char_pers(char_name, pers_act, pers_agree, pers_assert, pers_conf, pers_disc, pers_emocap, pers_friend, pers_honest, pers_intel, pers_manner, pers_pos, pers_rebel, pers_type) "
            . "VALUES(:name, :act, :agree, :assert, :conf, :disc, :emocap, :friend, :honest, :intel, :manner, :pos, :rebel, :type);";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $pers[0]);
    $statement->bindValue(':act', $pers[1]);
    $statement->bindValue(':agree', $pers[2]);
    $statement->bindValue(':assert', $pers[3]);
    $statement->bindValue(':conf', $pers[4]);
    $statement->bindValue(':disc', $pers[5]);
    $statement->bindValue(':emocap', $pers[6]);
    $statement->bindValue(':friend', $pers[7]);
    $statement->bindValue(':honest', $pers[8]);
    $statement->bindValue(':intel', $pers[9]);
    $statement->bindValue(':manner', $pers[10]);
    $statement->bindValue(':pos', $pers[11]);
    $statement->bindValue(':rebel', $pers[12]);
    $statement->bindValue(':type', $pers[13]);
    $success = $statement->execute();
    $statement->closeCursor();
    persupdate($db, $pers[0]);
    return $success;
}

function persupdate($db, $charname) {
    $id = getid($db, $charname);
    $query = "UPDATE char_pers SET char_pers.char_id = :id where char_pers.char_name = :name;";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $charname);
    $statement->execute();
    $statement->closeCursor();
}

function addoutfit($db, $outfit) {
    $query = "INSERT INTO char_outfit(char_name, outfit_name, outfit_glasses, outfit_top, outfit_bottom, outfit_footwear, outfit_jewlery)
          VALUES(:name, :outfitname, :glasses, :top, :bottom, :footwear, :jewlery);";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $outfit[0]);
    $statement->bindValue(':outfitname', $outfit[1]);
    $statement->bindValue(':glasses', $outfit[2]);
    $statement->bindValue(':top', $outfit[4]);
    $statement->bindValue(':bottom', $outfit[5]);
    $statement->bindValue(':footwear', $outfit[6]);
    $statement->bindValue(':jewlery', $outfit[3]);
    $success = $statement->execute();
    $statement->closeCursor();
    outfitupdate($db, $outfit[0]);
    return $success;
}

function outfitupdate($db, $charname) {
    $id = getid($db, $charname);
    $query = "UPDATE char_outfit SET char_outfit.char_id = :id where char_outfit.char_name = :name;";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $charname);
    $statement->execute();
    $statement->closeCursor();
}

function addrace($db, $race) {
    $query = "INSERT INTO char_race(char_name, race_name, race_home, race_age, race_height, race_aspect, race_desc)
	VALUES(:name, :racename, :racehome, :raceage, :raceheight, :raceaspect, :racedesc);";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $race[0]);
    $statement->bindValue(':racename', $race[1]);
    $statement->bindValue(':racehome', $race[2]);
    $statement->bindValue(':raceage', $race[3]);
    $statement->bindValue(':raceheight', $race[4]);
    $statement->bindValue(':raceaspect', $race[5]);
    $statement->bindValue(':racedesc', $race[6]);
    $success = $statement->execute();
    $statement->closeCursor();
    raceupdate($db, $race[0]);
    return $success;
}

function raceupdate($db, $charname) {
    $id = getid($db, $charname);
    $query = "UPDATE char_race SET char_race.char_id = :id where char_race.char_name = :name;";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $charname);
    $statement->execute();
    $statement->closeCursor();
}

function addother($db, $other) {
    $query = "INSERT INTO char_other(char_name, other_theme, other_quotes, other_quirks, other_quirkinfo, other_weak, other_backstory, other_bday, other_zodiac, other_hobbies, other_other)
        VALUES(:name,:theme, :quotes, :quirk, :quirkdesc, :weak, :backstory, :bday, :zodiac, :hobbies, :other);";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $other[0]);
    $statement->bindValue(':theme', $other[1]);
    $statement->bindValue(':quotes', $other[2]);
    $statement->bindValue(':quirk', $other[3]);
    $statement->bindValue(':quirkdesc', $other[4]);
    $statement->bindValue(':weak', $other[5]);
    $statement->bindValue(':backstory', $other[6]);
    $statement->bindValue(':bday', $other[7]);
    $statement->bindValue(':zodiac', $other[8]);
    $statement->bindValue(':hobbies', $other[9]);
    $statement->bindValue(':other', $other[10]);
    $success = $statement->execute();
    $statement->closeCursor();
    otherupdate($db, $other[0]);
    return $success;
}


function additem($db, $item, $username) {
    $query = "INSERT INTO item(user_name, item_name, char_name, item_desc, item_appear, item_type, item_size, item_loc, item_effects, item_cond, item_value)
            VALUES(:user, :itemname, :charname, :itemdesc, :itemappear, :itemtype, :itemsize, :itemloc, :itemeffects, :itemcond, :itemvalue);";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->bindValue(':itemname', $item[0]);
    $statement->bindValue(':charname', $item[1]);
    $statement->bindValue(':itemdesc', $item[2]);
    $statement->bindValue(':itemappear', $item[3]);
    $statement->bindValue(':itemtype', $item[4]);
    $statement->bindValue(':itemsize', $item[5]);
    $statement->bindValue(':itemloc', $item[6]);
    $statement->bindValue(':itemeffects', $item[7]);
    $statement->bindValue(':itemcond', $item[8]);
    $statement->bindValue(':itemvalue', $item[9]);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function addweap($db, $weapon, $username) {
    $query = "INSERT INTO weapon(user_nanme, weap_name, char_name, weap_desc, weap_appear, weap_type, weap_size, weap_hand, weap_effect, weap_cond, weap_value)
                VALUES (:user, :weapname, :charname, :weapdesc, :weapappear, :weaptype, :weapsize, :weaphand, :weapeffect, :weapcond, :weapvalue);";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->bindValue(':weapname', $weapon[0]);
    $statement->bindValue(':charname', $weapon[1]);
    $statement->bindValue(':weapdesc', $weapon[2]);
    $statement->bindValue(':weapappear', $weapon[3]);
    $statement->bindValue(':weaptype', $weapon[4]);
    $statement->bindValue(':weapsize', $weapon[5]);
    $statement->bindValue(':weaphand', $weapon[6]);
    $statement->bindValue(':weapeffect', $weapon[7]);
    $statement->bindValue(':weapcond', $weapon[8]);
    $statement->bindValue(':weapvalue', $weapon[9]);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function addspell($db, $spell, $username) {
    $query = "INSERT INTO spell(user_name, spell_name, char_name, spell_desc, spell_desc_ext, spell_type, spell_school, spell_range,
            spell_duration, spell_cast, spell_dmg, spell_level, spell_ritual, spell_materials) VALUES(:user, :spellname, :charname,
            :spelldesc, :spelldescext, :spelltype, :spellschool, :spellrange, :spellduration, :spellcast, :spelldmg,
            :spelllevel, :spellritual, :spellmaterials);";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->bindValue(':spellname', $spell[0]);
    $statement->bindValue(':charname', $spell[1]);
    $statement->bindValue(':spelldesc', $spell[2]);
    $statement->bindValue(':spelldescext', $spell[3]);
    $statement->bindValue(':spelltype', $spell[4]);
    $statement->bindValue(':spellschool', $spell[5]);
    $statement->bindValue(':spellrange', $spell[6]);
    $statement->bindValue(':spellduration', $spell[7]);
    $statement->bindValue(':spellcast', $spell[8]);
    $statement->bindValue(':spelldmg', $spell[9]);
    $statement->bindValue(':spelllevel', $spell[10]);
    $statement->bindValue(':spellritual', $spell[11]);
    $statement->bindValue(':spellmaterials', $spell[12]);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function getallchars($db, $userID) {
        $query = "select * from characters where Char_User_ID = :userID;";
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        printallchars($results);
}

function getcharnames($db, $username, $info, $text) {
    $query = "select char_name from char_info where user_name = :username;";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    charnamedrop($results, $info, $text);
}

function charnamedrop($namearr, $info, $text) {
    $val = count($namearr);
    $longnames = array();
    $names = array();
    for ($x = 0; $x < $val; $x++) {
        array_push($longnames, implode($namearr[$x]));
    }
    $val2 = count($longnames);
    for ($x = 0; $x < $val2; $x++) {
        $tmp = explode(" ", $longnames[$x]);
        array_push($names, $tmp[0]);
    }
    echo "<p class='tooltip' title='Which character(s) $info'>";
    echo "<label for='charnames' id='charnamelabel' >$text: </label>";
    echo "<select id='charnames' class='w3-select' name='charnamelist'>";
    echo "<option value='N/A'>N/A</option>";
    $val3 = count($names);
    for ($x = 0; $x < $val3; $x++) {
        echo "<option value='$names[$x]'>$names[$x]</option>";
    }
    echo '</select>';
    echo '<br>';
    echo '</p>';
}

function getother($db, $charname) {
    $query = "select * from char_other where char_name = :charname;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charname', $charname);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function getallitems($db, $username) {
    $query = "select * from item where user_name = :user;";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    getiteminfos($results);
}

function getallweaps($db, $username) {
    $query = "select * from weapon where user_name = :user;";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    getweapinfos($results);
}

function getallspells($db, $username) {
    $query = "select * from spell where user_name = :user;";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    getspellinfos($results);
}

function getoutfit($db, $charname) {
    $query = "select * from char_outfit where char_name = :name;";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $charname);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if (empty($results)) {
        return $results;
    } else {
        return $results[0];
    }
}

function getrace($db, $charname) {
    $query = "select * from char_race where char_name = :name;";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $charname);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if (empty($results)) {
        return $results;
    } else {
        return $results[0];
    }
}

function getweapinfos($weapdata) {
    $weapcount = count($weapdata);
    for ($x = 0; $x < $weapcount; $x++) {
        $weapinfo = $weapdata[$x];
        printweapinfo($weapinfo);
    }
}

function getiteminfos($itemdata) {
    $itemcount = count($itemdata);
    for ($x = 0; $x < $itemcount; $x++) {
        $iteminfo = $itemdata[$x];
        printiteminfo($iteminfo);
    }
}

function getspellinfos($spelldata) {
    $spellcount = count($spelldata);
    for ($x = 0; $x < $spellcount; $x++) {
        $spellinfo = $spelldata[$x];
        printspellinfo($spellinfo);
    }
}

function getcharinfo($db, $charname) {
    $query = "select * from char_info where char_name = :charname;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charname', $charname);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results[0];
}

function getcharappear($db, $charname) {
    $query = "select * from char_appear where char_name = :charname;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charname', $charname);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if (empty($results)) {
        return $results;
    } else {
        return $results[0];
    }
}

function getcharpers($db, $charname) {
    $query = "select * from char_pers where char_name = :charname;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charname', $charname);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results[0];
}

function getcharstats($db, $charname) {
    $query = "select * from char_stat where char_name = :charname;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charname', $charname);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if (empty($results)) {
        return $results;
    } else {
        return $results[0];
    }
}


function printallchars($allchars) {
    $charcount = count($allchars);
    for ($x = 0; $x < $charcount; $x++) {
        $charinfo = $allchars[$x];
        printcharinfo($charinfo);
    }
}

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
            echo "<input type='text' readonly class='textdisplay' id='char_name' value='$charName'>";
        echo '</p>';
        echo '<p>';
            echo "<label for='charalias'>Nicknames &amp; Aliases:</label>";
            echo "<input type='text' readonly class='textdisplay' id='charalias' value='$charShortNames'>";
        echo '</p>';
        echo '<p>';
            echo "<label for='shortdesc'>Short Description: </label>";
            echo "<textarea readonly id='shortdesc' class='textbox textdisplay'>$charShortDesc</textarea>";
        echo '</p>';
        echo '<p>';
            echo "<label for='char_age'>Age: </label>";
            echo "<input type='text' readonly class='textdisplay' id='char_age' value='$charAge'>";
        echo '</p>';
        echo '<p>';
            echo "<label for='char_gender'>Gender: </label>";
            echo "<input type='text' readonly class='textdisplay' id='char_gender' value='$charGender'>";
        echo '</p>';
        echo '<p>';
            echo "<label for='char_racename>Race: </label>";
            echo "<input type='text' readonly class='displaytext' id='char_racename' value='$charRaceName'>";
        echo '</p>';
            echo "<label for='morecharinfo'>&nbsp;</label>";
            echo "<input type='submit' class='clicky-button clicky-button-two' id='morecharinfo' value='More Info'>";
    echo '</form>';

}

//This will let users delete their own items, if they choose to.
function deletechar() {
    
}

function deleteitem() {
    
}

function deleteweap() {
    
}

function deletespell() {
    
}

// This is how editing areas will work.
function updatechar() {
    
}

function updateitem() {
    
}

function updateweap() {
    
}

function updatespell() {
    
}


?>