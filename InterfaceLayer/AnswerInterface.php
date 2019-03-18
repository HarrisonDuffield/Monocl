<?php
$QuestionID = $_POST["QuestionID"];
$AnswerGiven = $_POST["AnswerGiven"];
$AnswerGiven = (string)$AnswerGiven;
$QuestionID = (string)$QuestionID;
session_start();
$UserID=$_SESSION["UserLoggedIn"];
require("..\..\MonoclBackend\AnswerSystem.php");
if(IsAnswerCorrect($AnswerGiven,$QuestionID,$UserID)){
    
    

} 
else{
    echo "false";
    }
?>