<?php

// Mainly for veiwing a character, literal sanity checks for invalid or missing data.

function fillCharInfo($charInfo) {
    $charInfo["Char_Name"] = "404 - Character not found";
    $charInfo["Char_ShortName"] = "404, The Error, What the hell is that?, WTF";
    $charInfo["Char_ShortDesc"] = "A thing here for a character that doesn't really exist in the database.";
    $charInfo["Char_Age"] = "Who knows. It can never be found to ask it how old it is.";
    $charInfo["Char_Gender"] = "Errors don't have a gender...or do they?";
    $charInfo["Char_RaceName"] = "Errors have a race? Sh*t.";
    return $charInfo;
}

function fillOmegaInfo($charOmega) {
    $charOmega["Omega_History"] = "Not even Steve Irwin (rest his soul) was able to track down the elusive 404 to find its history.";
    $charOmega["Omega_AU"] = "404 does not have an alternate universe. It is omnipresent, but also totally useless.";
    $charOmega["Omega_Pers"] = "Uh...........see the personality section.";
    $charOmega["Omega_Story"] = "Let's be real, everyone has encountered the 404 at least once in their life";
    $charOmega["Omega_Reason"] = " Why? It's an error. It shouldn't even exist, but it does.";
    $charOmega["Omega_Other"] = "If you see this, this means that you haven't entered any information for your character. Please do so and this will go away.";
    return $charOmega;
}

?>