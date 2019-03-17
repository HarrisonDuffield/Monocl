<?php
$QuestionID = $_POST["QuestionID"];
$AnswerGiven = $_POST["AnswerGiven"];
require("..\..\MonoclBackend\AnswerSystem.php");
echo IsAnswerCorrect(); 
?>