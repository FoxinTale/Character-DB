
var passin = document.getElementById("pass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

var pass2 = document.getElementById("pass2");

pass2.onkeyup = function () {
    var passdupe = pass2.value;
    var password = pass.value;
    if (passdupe !== password) {
        document.getElementById('pass2').nextElementSibling.firstChild.nodeValue = "Passwords not equal.";
    }
    if (passdupe === passin) {
        document.getElementById('pass2').nextElementSibling.firstChild.nodeValue = "Passwords areequal.";
    }
}

passin.onkeyup = function () {
    var lowerCaseLetters = /[a-z]/g;
    if (passin.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    var upperCaseLetters = /[A-Z]/g;
    if (passin.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    var numbers = /[0-9]/g;
    if (passin.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    if (passin.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
}