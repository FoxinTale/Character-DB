<!DOCTYPE html> 

<?php
require('inc/functions.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/charselect.css">
    <title>Character List</title>
</head>
<body>
    <?php
    printallchars($db);
    ?>
</body>