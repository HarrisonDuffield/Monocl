<?php
$ValueToRetrieve = $_POST["QuestionToReturn"];
require("..\MonoclBackend\MySQLConnectionFile.php");
session_start();
$UserID = $_SESSION["UserLoggedIn"];
$topic = $_GET["Topic"];
$QuestionsToAsk = array();

echo $QuestionsText["ValueToRetireve"];

function DataCalling(){
global $QuestionsToAsk,$QuestionText;
$QuestionRetrievalQuery = "SELECT * FROM questiontable WHERE Topic = $topic";
$QuestionRetrievalExecution = mysqli_query(ConnectionReturn(),$QuestionRetrievalQuery);
if($QuestionRetrievalExecution){
    foreach($QuestionRetrievalExecution as $row){
        array_push($QuestionsToAsk,$row["QuestionID"]);
        array_push($QuestionText,$row["QuestionText"]);
    }
    for($i=0;$i<count($QuestionsToAsk);$i++){
        $IsQuestionAnsweredQuery = "SELECT * FROM answertable  WHERE QuestionID = `$QuestionsToAsk[$i]` AND UserID = $UserID AND GeneralAvailibilty = 1";
        $IsAnswerExectuion = mysqli_query(ConnectionReturn(),$IsQuestionAnsweredQuery);
        if($IsAnswerExectuion){
            $RowCount = mysqli_num_rows($IsAnswerExectuion);
            if($RowCount>=1){
                unset($QuestionsToAsk[$i]);
                unset($QuestionText[$i]);
            }
        }
    }
}
else{
    mysqli_error(ConnectionReturn());
}
}


?>