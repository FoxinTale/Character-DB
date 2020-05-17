var containerHidden = false;
var frameHidden = true;
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
    if (containerHidden) {
        frameHidden = true;
        containerHidden = false;
        document.getElementById('minipage').style.visibility = "hidden";
        document.getElementById('minipage').style.width = "0px";
        document.getElementById('minipage').style.height = "0px";
        document.getElementById('container').style.display = "block";
        document.getElementById('container').style.height = "70%";
        document.getElementById('container').style.width = "75%";
        document.getElementById('container').style.border = "none";
        document.getElementById('container').style.margin = "2.5% 0% 0% 10%";
        jQuery(document).ready(function ($) {
            $("#container").load(url);
        });
    } else if (!containerHidden) {
        jQuery(document).ready(function ($) {
            $("#container").load(url);
        });
    }
}

function framerender(url) {
    if (frameHidden) {
        frameHidden = false;
        containerHidden = true;
        document.getElementById('container').style.width = "0px";
        document.getElementById('container').style.height = "0px";
        document.getElementById('container').style.display = "none";
        document.getElementById('minipage').style.visibility = "visible";
        document.getElementById('minipage').style.width = "75%";
        document.getElementById('minipage').style.height = "700px";
        document.getElementById('minipage').style.margin = "0% 0% 0% 10%";
        document.getElementById('minipage').style.border = "none";
        document.getElementById('minipage').src = url;
    } else if (!frameHidden) {
        document.getElementById('minipage').src = url;
    }
}

function load_it() {
    document.getElementById('minipage').style.visibility = "hidden";
    document.getElementById('minipage').style.height = "0px";
    document.getElementById('minipage').style.width = "0px";
    jQuery(document).ready(function ($) {
        $("#container").load("home.php");
    });
}
