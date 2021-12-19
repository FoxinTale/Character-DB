<?php

// Mainly for veiwing a character, literal sanity checks for invalid or missing data.

function fillCharInfo($charInfo) {
    $charInfo[2] = "404 - Character not found";
    $charInfo[3] = "404, The Error, What the hell is that?, WTF";
    $charInfo[4] = "A thing here for a character that doesn't really exist in the database.";
    $charInfo[5] = "Who knows. It can never be found to ask it how old it is.";
    $charInfo[6] = "Errors don't have a gender...or do they?";
    $charInfo[7] = "Errors have a race? Sh*t.";
    return $charInfo;
}

function fillAppInfo($appInfo){

    return $appInfo;
}

function fillCharPers($persInfo){
    $persInfo[2] = "It just is. It's an error.";
    $persInfo[3] = "Does an error even have a personality in the first place?";
    $persInfo[4] = " Probably chaotic neutral.";
    $persInfo[5] = 0;
    return $persInfo;
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