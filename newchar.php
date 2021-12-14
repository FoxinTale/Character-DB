<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>New Character</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/w3-min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="w3-tab pale-purple">
        <a class="tab-item tablink" href="javascript:pagerender('pages/newchar_home.php')">General Info</a>
        <a class="tab-item tablink" href="javascript:pagerender('pages/newchar_info.php')">Character Info</a>
        <a class="tab-item tablink" href="javascript:pagerender('pages/newchar_appear.php')">Appearance</a>
        <a class="tab-item tablink" href="javascript:pagerender('pages/newchar_pers.php')" >Personality</a>
        <a class="tab-item tablink" href="javascript:pagerender('pages/newchar_race.php')" >Race</a>
        <a id="omegalink" class="tab-item tablink" href="javascript:pagerender('pages/newchar_omega.php')" style="display: none;">Omega Timeline</a>
        <a class="tab-item tablink" href="javascript:pagerender('pages/newchar_other.php')" >Other</a>
        <a class="tab-item tablink" href="javascript:pagerender('pages/newchar_settings.php')" >Settings &amp; Options</a>
    </div>
    <div class="minipage" id="charpagebox"></div>
    <script type="text/javascript">
        window.onload = load_it();

        function load_it() {
            jQuery(document).ready(function ($) {
                $("#charpagebox").load("pages/newchar_home.php");
            });
        }

        function pagerender(url) {
            jQuery(document).ready(function ($) {
                $("#charpagebox").load(url);
            });

        }
        
        
    </script>
</body>