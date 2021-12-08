
window.onload = load_it();

function menu() {
    var x = document.getElementById("navmenu");
    if (x.className === "sidenav") {
        x.className += " responsive";
    } else {
        x.className = "sidenav";
    }
}

function linkclick(url) {
    jQuery(document).ready(function ($) {
        $("#container").load(url);
    });

}

function framerender(url) {
    jQuery(document).ready(function ($) {
        $("#container").load(url);
    });
}

function load_it() {
    jQuery(document).ready(function ($) {
        $("#container").load("home.php");
    });
}
