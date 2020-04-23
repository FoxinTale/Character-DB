<!DOCTYPE html> 
<?php
session_start();
require('inc/functions.php');
$username = $_SESSION["username"];
$admin = $_SESSION["isadmin"];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/display.css">
    <title>Character List</title>
</head>
<body>
    <?php
    getallchars($db, $username, $admin);
    ?>
</body>