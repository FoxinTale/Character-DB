<!DOCTYPE html> 
<?php
session_start();
require('inc/functions.php');
require('inc/prints.php');
//$username = $_SESSION["username"];
$userID = $_SESSION['userID'];
//$admin = $_SESSION["isadmin"];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <link rel="stylesheet" href="css/viewchar.css">
    <title>Character List</title>
</head>
<body>
    <?php
    getallchars($db, $userID);
    ?>
</body>