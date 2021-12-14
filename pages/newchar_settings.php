<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>New Character</title>
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/w3-min.css">
</head>
<body>
    <div id="character_options" class="light-purple box shadow-816 container infotab">
        <h3 class="display-header">Character Options</h3>
        <p>Various options for your character.</p>
        <hr>
        <form id="charoptions" method="post" action="javascript:pagerender('pages/newchar_settings.html', 'settings')">
            <p class="tooltip" title="Whether or not this character is a favourite">
                <label for="is_fav">Is a favourite character</label>
                <input type="checkbox" id="is_fav" name="isfavchar">
            </p>
            <p class="tooltip" title="Whether or not this character is a DnD version, or if they are a DnD only character">
                <label for="is_dnd">Is a DnD character:</label>
                <input type="checkbox" id="is_dnd" onchange="dndCheck()" name="isdndchar">
            </p>
            <!-- 
                In PHP, the checkbox will be set based off of what is retreived from the database and the tabs will be set based off of that. 
                The value retreived from the database will probably determine if a checked one is what is displayed vial an if statement.
                The property is literally called "checked"
            -->
            <p class="tooltip" title="Whether or not this character is part of the Omega Timeline. If you have to ask what this is, you don't need to check it.">
                <label for="is_omega">Is part of the Omega Timeline:</label>
                <input type="checkbox" id="is_omega" onchange="omegaCheck()" name="isomegachar">
            </p>
            <p>
                <label for="applysettings">&nbsp;</label>
                <input type="submit" class="clicky-button clicky-button-two" name="submit_settings" value="Apply Settings" id="applysettings">
            </p>
        </form>
    </div>
    
    <script type="text/javascript">
        function omegaCheck(){
            var omega = document.getElementById("is_omega");
            var omegaTab = document.getElementById("omegalink");
            
            if(omega.checked){
                omegaTab.style.display = "block";
            } else{
                omegaTab.style.display = "none";
            }
        }
        
        function dndCheck(){
            var dnd = document.getElementById("is_dnd");
            var dndTab = document.getElementById("dnd_page");
            
            if(dnd.checked){
                dndTab.style.display="block";
            } else{
                dndTab.style.display="none";
            }
        }
        
    </script>
</body>