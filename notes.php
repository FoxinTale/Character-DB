<!DOCTYPE html>
<?php
session_start();
include 'inc/functions.php';
$username = $_SESSION["username"];
$doclink = getdoc($db, $username);
$link =  $doclink['doc_link'];

if (isset($_POST["docbutton"])) {
   $gdoc = datacheck($_POST);
   adddoc($db, $username, $gdoc[0]);
}
?>
<head>
    <meta charset="UTF-8">
    <title>My Notes</title>
    <link rel="stylesheet" href="css/notes.css">
</head>
<body>
    <h2>Notes</h2>
    <?php
    if ($doclink == null || $doclink = "") {
        printnodoc($username);
    } else {
        echo "<iframe src='$link'></iframe>";
    }
    ?>
</body>