<!DOCTYPE html> 
    <head>
        <meta charset="UTF-8">
        <title>Character Database - Home</title>
        <!--
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/w3-min.css">
        -->
    </head>
    <body>
        <main>
            <section class="light-purple2 box2">
                <p class = "description">Overview and rundown: </p>
                <hr class="sep">
                <ul>
                    <li>Create a new character, item, weapon or power from the dropdown "Create New...".</li>
                    <li>View your existing characters on the characters page.</li>
                    <li>View your items over on the items page.</li>
                    <li>View your powers, spells and abilities you have over on the abilities page.</li>
                    <li>And finally, see all your weapons over on the weapons page.</li>
                </ul>
            </section>
            <section class="light-purple2 box2">
                <p class = "description">About the rest of the site</p>
                <hr class="sep">
                <ul>
                    <li>"Home" will bring you right back to this page.</li>
                    <li>The resources page has links to various off site character generators.</li>
                </ul>
            </section>
            
            <script>
            jQuery(document).ready(function($){
                $("#ul li a").on( "click", function(e) {
                    e.preventDefault();
                    var url = $(this).attr("href"); // this should be some-page.html in this example.
                    $("#container").load( url ); // where we're adding the new html.
                });
            });
            </script>
        </main>
    </body>