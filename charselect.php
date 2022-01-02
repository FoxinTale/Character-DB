<!DOCTYPE html> 
<?php
session_start();
require('inc/functions.php');
require('inc/prints.php');
$userID = $_SESSION['userID'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <title>Character List</title>
</head>
<body>
    <?php
        $charInfo = getallnames($db, $userID);
        printEditBoxes($charInfo);
    ?>
    
</body>