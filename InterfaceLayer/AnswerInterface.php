<?php
$QuestionID = $_POST["QuestionID"];
$AnswerGiven = $_POST["AnswerGiven"];
$AnswerGiven = (string)$AnswerGiven;
$QuestionID = (string)$QuestionID;
require("..\..\MonoclBackend\AnswerSystem.php");
echo IsAnswerCorrect($AnswerGiven,$QuestionID); 
?>