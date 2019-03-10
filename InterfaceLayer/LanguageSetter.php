<?php
$LanguageToSet = $_POST["LanguageTwoChar"];

function LanguageSettingHandler($LanguageToSet){
    if($LanguageToSet =="FR"){
        setFrench();
        echo $_SESSION["Langauge"];
        
    }
    else if($LanguageToSet == "DE"){
        setGerman();
        echo $_SESSION["Langauge"];
    }
    else if($LanguageToSet== "ES"){
        setSpanish();
        echo $_SESSION["Langauge"];
    }

}
function setFrench(){
    $_SESSION["Langauge"]="FR";
    
}
function setGerman(){
    $_SESSION["Langauge"]="DE";
}
function setSpanish(){
    $_SESSION["Langauge"]="ES";

}
?>