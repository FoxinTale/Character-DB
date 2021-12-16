<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Viewing Character</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/w3-min.css">
       <script src="scripts/ui.js"></script>
    </head>
    <body>
        <?php
          require('inc/functions.php');
          $charID = $_GET['char_ID'];
          
           /*
            * What this needs to do:
            * 
            * Pull information from every table related to this character ID.
            * 
            * I will need to create several characters to test this.
            *  Table names: Characters, char_appearance, char_omegatime, char_pers, char_other, char_race
            *   char_settings is also a table, but this will not be displayed. The "is_omegatime" bit is used to determine if the omega timeline tab is displayed.
            * 
            * First, however, I will need to remake all the functions that add stuff to the database, because, well, it has been totally redone.
            * Then I'll need to remake some of the existing ones to fetch data, and then make new ones for new sections I've added. 
            * 
            */
        ?>
    </body>
</html>
