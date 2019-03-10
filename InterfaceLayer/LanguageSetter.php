<?php
function LanguageSettingHandler($LanguageToSet){
    if($LanguageToSet =="FR"){
        setFrench();
    }
    else if($LanguageToSet == "DE"){
        setFrench();
    }
    else if($LanguageToSet== "ES"){
        setSpanish();
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