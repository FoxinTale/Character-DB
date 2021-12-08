
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
        document.getElementById("top").classList.add("card-4", "animate-opacity");
        document.getElementById("intro").classList.add("show-inline-block");
    } else {
        document.getElementById("intro").classList.remove("show-inline-block");
        document.getElementById("top").classList.remove("card-4", "animate-opacity");
    }
}

function dropdown(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("show") === -1) {
        x.className += " show";
        x.previousElementSibling.className += " theme";
    } else {
        x.className = x.className.replace("show", "");
        x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" theme", "");
    }
}

function doaccordion(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("show") === -1) {
        x.className += " show";
        x.previousElementSibling.className += " light-purple2";
    } else {
        x.className = x.className.replace("show", "");
        x.previousElementSibling.className =
                x.previousElementSibling.className.replace("light-purple2", "");
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
        tablinks[i].className = tablinks[i].className.replace(" light-purple2", "");
    }
    document.getElementById(pagename).style.display = "block";
    evt.currentTarget.className += " light-purple2";
}