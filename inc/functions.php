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

function verifyinput() {
    
}

function addchar() {
    
}

function additem() {
    
}

function addweap() {
    
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
    $query = "select char_info.char_id, char_name, char_desc, char_age,char_alias, char_pers.pers_type, 
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

function printchar() {
    
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
     * inner join user_info on char_info.user_name = user_info.user_name 
     * where user_info.user_name ="Aubrey"
     * 
     * Change "Aubrey", bind value to the actual username.
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
    $personality = $charinfo['pers_type'];
    $chardesc = $charinfo['char_desc'];
    
    echo "<form class='charlist' method='post'>";
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
    echo "<label for = 'perstype' id = 'perstypelabel'>Personality Type: </label>";
    echo "<input readonly type = 'text' id = 'perstype' name = 'pers_type' value = '$personality'>";
    echo '<br>';
    echo '<hr>';
    echo "<label for = 'chardesc' id = 'desclabel'>Short Description: </label>";
    echo "<textarea readonly id = 'chardesc' name = 'char_desc'>$chardesc</textarea>";
    echo '<br>';
    echo "<input type = 'submit' id = 'morecharinfo' value = 'More info about this character.'>";
    echo '</form>';
}

?>