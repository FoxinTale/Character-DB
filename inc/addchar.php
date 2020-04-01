
<?php
include 'functions.php';

$appearcomp = false;
$outfitcomp = false;
$perscomp = false;
$statcomp = false;
$racecomp = false;

$appearance = $charinfo = $outfit = $pers = $stats = $race = null;

if (isset($_POST["new_char"])) {
    $charinfo = datacheck($_POST);
    print_r($charinfo);
    // Then, this will fire off commands or calls to add stuff into 
}

if (isset($_POST["new_appearance"])) {
    //print_r($_POST);
    $appearance = datacheck($_POST);
}

if (isset($_POST["new_outfit"])) {
    //print_r($_POST);
    $outfit = datacheck($_POST);
}

if (isset($_POST["new_pers"])) {
    //print_r($_POST);
    $pers = datacheck($_POST);
}

if (isset($_POST["new_stats"])) {
    // print_r($_POST);
    $stats = datacheck($_POST);
}

if (isset($_POST["new_race"])) {
    // print_r($_POST);
    $race = datacheck($_POST);
}

?>
