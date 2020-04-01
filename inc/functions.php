<?php

require_once 'open_db.php';

function verify_login($db, $username, $password) {
    $query = "SELECT user_password FROM users WHERE username = :user";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $username);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $hash = $result['user_password'];
    return password_verify($password, $hash);
}

function existing_username($db, $username) {
    $query = "SELECT COUNT(username) FROM users WHERE username = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $exists = $statement->fetch();
    $statement->closeCursor();
    return $exists[0] == 1;
}

function addUser($db, $username, $password) {
    $query = "INSERT INTO users (username, user_password)
                VALUES (:username, :password)";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}

function validPassword($password) {
    $valid_pattern = '/(?=^.{8,}$)(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).*$/';
    if (preg_match($valid_pattern, $password)) {
        return true;
    } else {
        return false;
    }
}

function datacheck($post) {
    $arr = array();
    foreach ($post as $key => $value) {
        if ($value == null) {
            // In actuality nothing needs to be here, this is just error catching. 
            // Probably should set the span element by this field to display an error.
        } else if ($value != null || $value != '') {
            array_push($arr, htmlspecialchars($value));
        }
    }
    return $arr;
}

function addchar() {
    ///Ugh...
}

function additem() {
    
}

function addweap($db, $weapon) {
    $query = "INSERT INTO weapon(weap_name, char_name, weap_desc, weap_appear, weap_type, weap_size, weap_hand, weap_effect, weap_cond, weap_value)
                VALUES (:weapname, :charname, :weapdesc, :weapappear, :weaptype, :weapsize, :weaphand, :weapeffect, :weapcond, :weapvalue)";
    $statement = $db->prepare($query);
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

function addspell() {
    
}

function updatechar() {
    
}

function updateitem() {
    
}

function updateweap() {
    
}

function updatespell() {
    
}

function getallchars($db) {
    //Add in a username at some point in time, into a where part.
    $query = "select char_info.char_id, char_name, char_desc, char_soul, char_age,char_alias, char_pers.pers_type, 
        char_appear.app_image from char_info inner join char_pers on char_info.char_id = char_pers.char_id
        inner join char_appear on char_appear.char_id = char_info.char_id;";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $results;
}

function getallitems() {
    
}

function getallweaps() {
    
}

function getallspells() {
    
}

function printitem() {
    
}

function printweaps() {
    
}

function printspells() {
    
}

function getchar() {
    /*
     * select * from char_info 
     * inner join char_appear on char_appear.char_id = char_info.char_id 
     * inner join char_pers on char_pers.char_id = char_info.char_id 
     * inner join char_stat on char_stat.char_id = char_info.char_id 
     * inner join user_info on char_info.user_name = user_info.user_name where char_info.char_id = '1'
     * 
     * After the "where" can be char_ id or char_name. Bind it, of course.
     */
}

function getitem() {
    
}

function getweap() {
    
}

function getspell() {
    
}

function deletechar() {
    
}

function deleteitem() {
    
}

function deleteweap() {
    
}

function deletespell() {
    
}

function adddoc() {
    
}

function getdoc() {
    
}

function printallchars($db) {
    $chars = getallchars($db);
    $charcount = count($chars);
    for ($x = 0; $x < $charcount; $x++) {
        $charinfo = $chars[$x];
        printcharinfo($charinfo);
    }
}

function printcharinfo($charinfo) {
    $image = $charinfo['app_image'];
    $id = $charinfo['char_id'];
    $charname = $charinfo['char_name'];
    $nickname = $charinfo['char_alias'];
    $age = $charinfo['char_age'];
    $soul = $charinfo['char_soul'];
    $personality = $charinfo['pers_type'];
    $chardesc = $charinfo['char_desc'];

    echo "<form class='charlist' method='post' action>";
    echo "<img src =$image alt='Character Image'>"; //char_image
    echo "<input type = 'hidden' id = 'username' value = 'Aubrey'>";
    echo "<input type = 'hidden' id = 'charid' value = $id>";
    echo "<label for = 'charname' id = 'namelabel'>Name: </label>";
    echo "<input readonly type = 'text' id = 'charname' name='char_name' value = '$charname'>";
    echo '<br>';
    echo "<label for = 'charalias' id = 'aliaslabel'>Nickname / Alias: </label>";
    echo "<input readonly type = 'text' id = 'charalias' name = 'char_alias' value = '$nickname'>";
    echo '<br>';
    echo "<label for = 'charage' id = 'agelabel'>Age: </label>";
    echo "<input readonly type = 'text' id = 'charage' name = 'char_age' value = '$age'>";
    echo '<br>';
    echo "<label for = 'charsoul' id = 'soullabel'>'Soul' Type: </label>";
    echo "<input readonly type = 'text' id = 'charsoul' name = 'char_soul' value = '$soul'>";
    echo '<br>';
    echo "<label for = 'perstype' id = 'perstypelabel'>Personality Type: </label>";
    echo "<input readonly type = 'text' id = 'perstype' name = 'pers_type' value = '$personality'>";
    echo '<br>';
    echo "<hr class='divider'>";
    echo "<label for = 'chardesc' id = 'desclabel'>Short Description: </label>";
    echo "<textarea readonly id = 'chardesc' name = 'char_desc'>$chardesc</textarea>";
    echo '<br>';
    echo "<input type = 'submit' id = 'morecharinfo' value = 'More info about this character.'>";
    echo '</form>';
}

?>