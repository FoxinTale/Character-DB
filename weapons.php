<!DOCTYPE html>
<?php
session_start();
include 'inc/functions.php';
$username = $_SESSION["username"];
?>
<head>
    <meta charset="UTF-8">
    <title>Character Weapons</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/display.css">
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/expanding.jquery.js"></script>
</head>
<body>
    <?php
    getallweaps($db, $username);
    ?>
</body>
