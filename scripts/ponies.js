function ponycheck() {
	var yes = document.getElementById("yesPonies");
	if (yes.checked == true) {
		initPonies();
	}

	if (yes.checked == false) {
		remove();
	}
}

function showconfig(){
    document.getElementById('options').style.visibility = "visible";
    document.getElementById('ponyoptions').style.visibility = "visible";
    document.getElementById('filterwrapper').style.visibility = "visible";
    document.getElementById('ponylist').style.visibility = "visible";
    document.getElementById('zero').style.visibility = "visible";
}

function hideconfig(){
    document.getElementById('options').style.visibility = "hidden";
    document.getElementById('ponyoptions').style.visibility = "hidden";
    document.getElementById('filterwrapper').style.visibility = "hidden";
    document.getElementById('ponylist').style.visibility = "hidden";
    document.getElementById('zero').style.visibility = "hidden";
}


function remove() {
	BrowserPonies.unspawnAll();
	BrowserPonies.stop();
    hideconfig();
	document.getElementById('controls').style.visibility = "hidden";
	document.getElementById('paddock-back').style.visibility = "hidden";
	document.getElementById('paddock-left').style.visibility = "hidden";
	document.getElementById('paddock-right').style.visibility = "hidden";
	document.getElementById('paddock-front').style.visibility = "hidden";
}

function initPonies() {
    showconfig();
	document.getElementById('controls').style.visibility = "visible";
	document.getElementById('paddock-back').style.visibility = "visible";
	document.getElementById('paddock-left').style.visibility = "visible";
	document.getElementById('paddock-right').style.visibility = "visible";
	document.getElementById('paddock-front').style.visibility = "visible";

}
