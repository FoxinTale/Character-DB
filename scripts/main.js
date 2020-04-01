containerHidden = false;
frameHidden = true;
window.onload = hidedetails();

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
        document.getElementById('container').style.margin = "2.5% 0% 0% 15%";
        jQuery(document).ready(function ($) {
            $("#container").load(url);
        });
    } else if (!containerHidden) {
        jQuery(document).ready(function ($) {
            $("#container").load(url);
        });
    }
}

function datapages(url) {
    if (frameHidden) {
        frameHidden = false;
        containerHidden = true;
        document.getElementById('container').style.width = "0px";
        document.getElementById('container').style.height = "0px";
        document.getElementById('container').style.display = "none";
        document.getElementById('minipage').style.visibility = "visible";
        document.getElementById('minipage').style.width = "75%";
        document.getElementById('minipage').style.height = "700px";
        document.getElementById('minipage').style.margin = "0% 0% 0% 15%";
        document.getElementById('minipage').style.border = "none";
        document.getElementById('minipage').src = url;
    } else if (!frameHidden) {
        document.getElementById('minipage').src = url;
    }
}

function hideminipage() {

}

function hidedetails() {
    jQuery(document).ready(function ($) {
        $("#container").load("home.php");
    });
    document.getElementById('minipage').style.visibility = "hidden";
    document.getElementById('minipage').style.height = "0px";
    document.getElementById('minipage').style.width = "0px";
    document.getElementById('controls').style.visibility = "hidden";
    document.getElementById('paddock-back').style.visibility = "hidden";
    document.getElementById('paddock-left').style.visibility = "hidden";
    document.getElementById('paddock-right').style.visibility = "hidden";
    document.getElementById('paddock-front').style.visibility = "hidden";
}



const themeMap = {
    dark: "light",
    light: "solar",
    solar: "dark"
};

const theme = localStorage.getItem('theme')
        || (tmp = Object.keys(themeMap)[0],
                localStorage.setItem('theme', tmp),
                tmp);
const bodyClass = document.body.classList;
bodyClass.add(theme);

function toggleTheme() {
    const current = localStorage.getItem('theme');
    const next = themeMap[current];

    bodyClass.replace(current, next);
    localStorage.setItem('theme', next);
}

document.getElementById('themeButton').onclick = toggleTheme;
