<?php
session_start();
$LanguageToSet = $_POST["LanguageTwoChar"];
LanguageSettingHandler($LanguageToSet);
function LanguageSettingHandler($LanguageToSet){
    echo "does this work";
    if($LanguageToSet =="FR"){
        setFrench();
        echo $_SESSION["Language"];
        
    }
    else if($LanguageToSet == "DE"){
        setGerman();
        echo $_SESSION["Language"];
    }
    else if($LanguageToSet== "ES"){
        setSpanish();
        echo $_SESSION["Language"];
    }

}
function setFrench(){
    $_SESSION["Language"]="FR";
    
}
function setGerman(){
    $_SESSION["Language"]="DE";
}
function setSpanish(){
    $_SESSION["Language"]="ES";

}
?>