<?php
session_start();

if(isset($_SESSION['isAdmin'])){
    if($_SESSION['isAdmin'] == 0){
        // User is not an admin
        echo "You do not have admin rights to see this page. Sorry. In fact, this shouldn't ever be visible, but I have to handle it anyways.";
    } else {
        // User is an admin and we output literally the entire admin page.
        // During development, it will be put here as normal, but once the page is done, 
    }
} else {
    echo "You sneaky, sneaky person you.";
}

?>