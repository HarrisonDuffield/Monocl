<?php
session_start();
$UserID = $_SESSION["UserLoggedIn"];
$FunctionToUse = $_POST["FunctionToSelect"];
$HomeworkID = $_POST["HomeworkID"];
require("..\..\MonoclBackend\Leaderboard.php");
require("..\..\MonoclBackend\QuestionTablePopulator.php");

if($FunctionToUse == 1){
    LeaderBoardDisplayClass($UserID);
}
else if($FunctionToUse ==2){
    WhoHasCompletedHomwork($HomeworkID);
    //get the homworks where complete;
}
else if($FunctionToUse ==3){
    MarkAsDone($HomeworkID);
}
else{
}

