<?php
require_once 'open_db.php';
define('CHARSET', 'ISO-8859-1');
define('REPLACE_FLAGS', ENT_COMPAT | ENT_XHTML);
/*
Safety Pig, for when things go wrong.
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
  
 * Or, Safety fox.

        /|_/|
       / ^ ^(_o
      /    __.'
      /     \
     (_) (_) '._
       '.__     '. .-''-'.
          ( '.   ('.____.''
          _) )'_, )
         (__/ (__/
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
    $query = "SELECT User_Password FROM users WHERE User_Name = :user";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $hash = $result['User_Password'];
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
    $query = "INSERT INTO users (User_Name, User_Password, User_Email) VALUES (:username, :password, :email);";
    $statement = $db->prepare($query);
    $email = "";
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':email', $email);
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

function addchar($db, $charinfo, $userID) {
    $query = "INSERT INTO characters(Char_User_ID, Char_Name, Char_ShortName, Char_ShortDesc, Char_Age, Char_Gender, Char_RaceName)
            VALUES(:userID, :name, :shortname, :desc, :age, :gender, :race);";
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':name', $charinfo[0]);
    $statement->bindValue(':shortname', $charinfo[1]);
    $statement->bindValue(':desc', $charinfo[2]);
    $statement->bindValue(':age', $charinfo[3]);
    $statement->bindValue(':gender', $charinfo[4]);
    $statement->bindValue(':race', $charinfo[5]);
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

function addsettings($db, $post){
    $isFav = $isOmega = 0;
    if(isset($post['isfavchar'])){ $isFav = 1; } else { $isFav = 0; }
    if(isset($post['isomegachar'])){ $isOmega = 1; } else { $isOmega = 0; }
    
    $query = "INSERT INTO char_settings(Char_Settings_Char_ID, Char_IsFav, Char_IsOmegaTimeLine) VALUES(:charID, :isFav, :isOmega);";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $post['charnamelist']);
    $statement->bindValue(':isFav', $isFav);
    $statement->bindValue(':isOmega', $isOmega);
    $success = $statement->execute();
    $statement->closeCursor();
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

function getcharnames($db, $userID, $info, $text) {
    $query = "select Char_ID, Char_Name from characters where Char_User_ID = :userID;";
    $statement = $db->prepare($query);
    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    charnamedrop($results, $info, $text);
    //print_r($results);
}

function charnamedrop($namearr, $info, $text) {
    $nameCount = count($namearr);
   $names = $IDs = array();
    
    for($x = 0; $x < $nameCount; $x++){
        array_push($IDs, $namearr[$x]['Char_ID']);
        array_push($names, $namearr[$x]['Char_Name']);
    }
  
    echo "<p class='tooltip' title='Which character $info'>";
        echo "<label for='chardropdown' id='charnamelabel' >$text: </label>";
        echo "<select id='chardropdown' class='charselect' name='charnamelist'>";
            echo "<option value='N/A'>N/A</option>";
            $val3 = count($names);
            for ($x = 0; $x < $val3; $x++) {
                echo "<option value='$IDs[$x]'>$names[$x]</option>";
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