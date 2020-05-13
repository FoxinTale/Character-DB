
function opennav() {
    document.getElementById("sidenav").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}

function closenav() {
    document.getElementById("sidenav").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

window.onscroll = function () {
    scrolldo()
};
function scrolldo() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("top").classList.add("w3-card-4", "w3-animate-opacity");
        document.getElementById("intro").classList.add("w3-show-inline-block");
    } else {
        document.getElementById("intro").classList.remove("w3-show-inline-block");
        document.getElementById("top").classList.remove("w3-card-4", "w3-animate-opacity");
    }
}

function dropdown(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-theme", "");
    }
}

function doaccordion(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-light-purple2";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
                x.previousElementSibling.className.replace("w3-light-purple2", "");
    }
}

function opentab(evt, pagename) {
    var i, x, tablinks;
    x = document.getElementsByClassName("infotab");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-light-purple2", "");
    }
    document.getElementById(pagename).style.display = "block";
    evt.currentTarget.className += " w3-light-purple2";
}