<?php
// Mainly for veiwing a character, literal sanity checks for invalid or missing data.
// Also, Hah! Sanity, PHP has none of it.
$comments = array(" Not yet added to this character", "Perhaps this info has not been added", "Not applicable", "Placeholder content", 
    "This is not the info you are looking for.", "Maybe this character does not exist yet.");

function fillCharInfo($charInfo) {
    $comments = $GLOBALS['comments'];
    $commentsSize = sizeof($comments) - 1;
    
    for($x = 2; $x < 8; $x++){
        $num = rand(0, $commentsSize);
        $charInfo[$x] = $comments[$num];
    }
    return $charInfo;
}


function fillAppInfo($appInfo){
    $comments = $GLOBALS['comments'];
    $commentsSize = sizeof($comments) - 1;
    
    for($x = 2; $x < 12; $x++){
        $num = rand(0, $commentsSize);
        $appInfo[$x] = $comments[$num];
    }
    return $appInfo;
}


function fillCharPers($persInfo){
    $comments = $GLOBALS['comments'];
    $commentsSize = sizeof($comments) - 1;
    
    for($x = 2; $x < 18; $x++){
        $num = rand(0, $commentsSize);
        $persInfo[$x] = $comments[$num];
    }
    return $persInfo;
}


function fillCharOther($otherInfo){
    $comments = $GLOBALS['comments'];
    $commentsSize = sizeof($comments) - 1;
    
    for($x = 2; $x < 18; $x++){
        $num = rand(0, $commentsSize);
        $otherInfo[$x] = $comments[$num];
    }
    return $otherInfo;
}

function fillRaceInfo($raceInfo){
    $comments = $GLOBALS['comments'];
    $commentsSize = sizeof($comments) - 1;
    
    for($x = 2; $x < 18; $x++){
        $num = rand(0, $commentsSize);
        $raceInfo[$x] = $comments[$num];
    }
    return $raceInfo;
}

function fillOmegaInfo($charOmega) {
    $charOmega[2] = "Not even Steve Irwin (rest his soul) was able to track down the elusive 404 to find its history.";
    $charOmega[3] = "404 does not have an alternate universe. It is omnipresent, but also totally useless.";
    $charOmega[4] = "Uh...........see the personality section.";
    $charOmega[5] = "Let's be real, everyone has encountered the 404 at least once in their life";
    $charOmega[6] = " Why? It's an error. It shouldn't even exist, but it does.";
    $charOmega[7] = "If you see this, this means that you haven't entered any information for your character. Please do so and this will go away.";
    return $charOmega;
}

?>