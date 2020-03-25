<!DOCTYPE html> 

<?php
require('inc/functions.php');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Character List</title>
    <link rel="stylesheet" href="css/charselect.css">
</head>
<body>
    <?php
    printallchars($db);
    ?>
</body>