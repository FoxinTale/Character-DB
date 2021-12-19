<?php

require_once 'open_db.php';
require_once 'sanitychecks.php';
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
            header("Location: home.php");
        } else {
            echo "<script>window.onload = function() { document.getElementById('errorbox').value = 'Invalid Password'}</script>";
        }
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
    $query = "SELECT COUNT(user_name) FROM users WHERE user_name = :username";
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

//encodes HTML chars to attempt to protect against SQL injection. 
function dataCheck($post) {
    $arr = array();
    foreach ($post as $key => $value) {
        if ($value == null) {
            $value = "Not applicable to this character, or this has not yet been added.";
            array_push($arr, $value);
        } else {
            $value = str_replace("\r\n", "<br>", $value);
            array_push($arr, htmlspecialchars($value));
        }
    }
    return $arr;
}

// Un-encodes any HTML special characters that were entered.
function dataUncheck($content) {
    $arr = array();
    foreach ($content as $key => $value) {
        if ($value == null || $value == "") {
            $value = "N/A";
            // This should not happen, due to the required field elements.
            // If it does, summon Safety Pig.
            
        } else if ($value != null || $value != '') {
            array_push($arr, htmlspecialchars_decode($value));
        }
    }
    return $arr;
}

function addCharacter($db, $charinfo, $userID) {
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

function addAppearance($db, $appear) {
    $query = "INSERT INTO char_appearance(Appear_Char_ID, Appear_Desc, Appear_Adv, Appear_Eyes, Appear_Hair, Appear_Ears, Appear_Height, Appear_Weight, Appear_Skin, Appear_Unique, Appear_Other)
        VALUES(:charID, :desc, :appearAdv, :eyes, :hair, :ears, :height, :weight, :skin, :unique, :other);";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $appear[0]);
    $statement->bindValue(':desc', $appear[1]);
    if ($appear[2] == "on") {
        $statement->bindValue(':appearAdv', 1);
    } else {
        $statement->bindValue(':appearAdv', 0);
    }
    $statement->bindValue(':eyes', $appear[3]);
    $statement->bindValue(':hair', $appear[4]);
    $statement->bindValue(':ears', $appear[5]);
    $statement->bindValue(':height', $appear[6]);
    $statement->bindValue(':weight', $appear[7]);
    $statement->bindValue(':skin', $appear[8]);
    $statement->bindValue(':unique', $appear[9]);
    $statement->bindValue(':other', $appear[10]);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function addPersonality($db, $pers) {
    $query = "INSERT INTO char_pers(Pers_Char_ID, Pers_Text, Pers_Type, Pers_Alignment, Pers_IsAdv,  Pers_Activity, Pers_Agree, Pers_Assert, Pers_Conf, 
              Pers_Discipline, Pers_EmoCap, Pers_Friendly, Pers_Honesty, Pers_Intel, Pers_Manners, Pers_Positivity, Pers_Rebel) VALUES 
              (:charID, :text, :type, :align, :persAdv, :act, :agree, :assert, :conf, :disc, :emocap, :friend, :honesty, :intel, :manners, :pos, :rebel);";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $pers[0]);
    $statement->bindValue(':text', $pers[1]);
    $statement->bindValue(':type', $pers[2]);
    $statement->bindValue(':align', $pers[3]);
    if ($pers[4] == "on") {
        $statement->bindValue(':persAdv', 1);
    } else {
        $statement->bindValue(':persAdv', 0);
    }
    $statement->bindValue(':act', $pers[5]);
    $statement->bindValue(':agree', $pers[6]);
    $statement->bindValue(':assert', $pers[7]);
    $statement->bindValue(':conf', $pers[8]);
    $statement->bindValue(':disc', $pers[9]);
    $statement->bindValue(':emocap', $pers[10]);
    $statement->bindValue(':friend', $pers[11]);
    $statement->bindValue(':honesty', $pers[12]);
    $statement->bindValue(':intel', $pers[13]);
    $statement->bindValue(':manners', $pers[14]);
    $statement->bindValue(':pos', $pers[15]);
    $statement->bindValue(':rebel', $pers[16]);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function addRace($db, $race) {
    $query = "INSERT INTO char_race(Race_Char_ID, Race_Name, Race_Desc, Race_Aspects, Race_Background)
	VALUES(:charID, :racename, :racedesc, :raceaspect,  :racebg);";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $race[0]);
    $statement->bindValue(':racename', $race[1]);
    $statement->bindValue(':racedesc', $race[2]);
    $statement->bindValue(':raceaspect', $race[3]);
    $statement->bindValue(':racebg', $race[4]);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function addOther($db, $other) {
    $query = "INSERT INTO char_other(Other_Char_ID, other_theme, other_quotes, other_quirks, other_quirkdesc, other_weak, other_birthday, other_zodiac, other_hobbies, other_other)
        VALUES(:charID, :theme, :quotes, :quirk, :quirkdesc, :weak, :bday, :zodiac, :hobbies, :other);";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $other[0]);
    $statement->bindValue(':theme', $other[1]);
    $statement->bindValue(':quotes', $other[2]);
    $statement->bindValue(':quirk', $other[3]);
    $statement->bindValue(':quirkdesc', $other[4]);
    $statement->bindValue(':weak', $other[5]);
    $statement->bindValue(':bday', $other[6]);
    $statement->bindValue(':zodiac', $other[7]);
    $statement->bindValue(':hobbies', $other[8]);
    $statement->bindValue(':other', $other[9]);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function addSettings($db, $post) {
    $isFav = $isOmega = 0;
    if (isset($post['isfavchar'])) {
        $isFav = 1;
    } else {
        $isFav = 0;
    }
    if (isset($post['isomegachar'])) {
        $isOmega = 1;
    } else {
        $isOmega = 0;
    }

    $query = "INSERT INTO char_settings(Char_Settings_Char_ID, Char_IsFav, Char_IsOmegaTimeLine) VALUES(:charID, :isFav, :isOmega);";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $post['charnamelist']);
    $statement->bindValue(':isFav', $isFav);
    $statement->bindValue(':isOmega', $isOmega);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function addOmegaInfo($db, $post) {
    $query = "INSERT INTO char_omegatime(Omega_Char_ID, Omega_AU, Omega_Pers, Omega_History, Omega_Story, Omega_Reason) 
            VALUES (:charID, :au, :pers, :history, :story, :reason);";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $post[0]); // charnamelist
    $statement->bindValue(':au', $post[1]); // omegaau_desc
    $statement->bindValue(':pers', $post[2]); // omega_pers
    $statement->bindValue(':history', $post[3]); // omega_desc
    $statement->bindValue(':story', $post[4]); // omega_story
    $statement->bindValue(':reason', $post[5]); // omega_reason
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

    for ($x = 0; $x < $nameCount; $x++) {
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

function getCharOther($db, $charID) {
    $query = "select * from char_other where Other_Char_ID = :charID;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $charID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if(!empty($results)){
        return dataUncheck($results[0]);
    } else {
        return fillCharOther($results); 
    }
}

function getCharRace($db, $charID) {
    $query = "select * from char_race where Race_Char_ID = :charID;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $charID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if (!empty($results)) {
        return dataUncheck($results[0]);
    } else {
        return fillRaceInfo($results);
    }
}

function getCharInfo($db, $charID) {
    $query = "select * from characters where Char_ID= :charID";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $charID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if (!empty($results)) {
        return dataUncheck($results[0]);
    } else {
        return fillCharInfo($results);
    }
}

function getCharPers($db, $charID) {
    $query = "select * from char_pers where Pers_Char_ID = :charID;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $charID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if (!empty($results)) {
        return dataUncheck($results[0]);
    } else {
        return fillCharPers($results);
    }
}

function getCharAppearance($db, $charID) {
    $query = "select * from char_appearance where Appear_Char_ID = :charID;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $charID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if (!empty($results)) {
        return dataUncheck($results[0]);
    } else {
        return fillAppInfo($results);
    }
}

function getCharOmega($db, $charID) {
    $query = "SELECT * from char_omegatime where Omega_Char_ID = :charID;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $charID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if (!empty($results)) {
        return dataUncheck($results[0]);
    } else {
        return fillOmegaInfo($results);
    }
}

function getCharSettings($db, $charID) {
    $query = "select * from char_settings where Char_Settings_Char_ID = :charID;";
    $statement = $db->prepare($query);
    $statement->bindValue(':charID', $charID);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    if (!empty($results)) {
        return $results[0];
    } else {
        return $results;
    }
}

function printallchars($allchars) {
    $charcount = count($allchars);
    for ($x = 0; $x < $charcount; $x++) {
        $charinfo = $allchars[$x];
        $charinfo = datauncheck($charinfo);
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