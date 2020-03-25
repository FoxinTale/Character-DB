
function loadpage(url) {
    jQuery(document).ready(function ($) {
        e.preventDefault();
        $("#container").load(url); // where we're adding the new html.
    }
    );
}
function load() {
    openpage("../home.html");
    document.getElementById('controls').style.visibility = "hidden";
    document.getElementById('paddock-back').style.visibility = "hidden";
    document.getElementById('paddock-left').style.visibility = "hidden";
    document.getElementById('paddock-right').style.visibility = "hidden";
    document.getElementById('paddock-front').style.visibility = "hidden";

}
