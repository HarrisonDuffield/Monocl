<?php
session_start();
$UserID = $_SESSION["UserLoggedIn"];
$FunctionToUse = $_POST["FunctionToSelect"];
require("..\..\MonoclBackend\Leaderboard.php");
if($FunctionToUse == 1){
    LeaderBoardDisplayClass($UserID);
}

