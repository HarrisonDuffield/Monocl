<?php
require("..\..\MonoclBackend\MySQLConnectionFile.php");
session_start();
$UserID = $_SESSION["UserLoggedIn"];
$questiontoget = $_POST["QuestionToReturn"];
$QuestionsToAsk = array();
$QuestionText = array();

$Stringtoprint="t";
main();

function main(){
    global $QuestionText,$Stringtoprint,$questiontoget;
    $Stringtoprint =" ";
    DataCalling();
    
    echo json_encode($QuestionText);

}




function DataCalling(){
       // echo "check";
global $QuestionsToAsk,$QuestionText,$topic,$UserID;
$QuestionRetrievalQuery = "SELECT * FROM questiontable";
$QuestionRetrievalExecution = mysqli_query(ConnectionReturn(),$QuestionRetrievalQuery);
if($QuestionRetrievalExecution){
   // echo "execution";
    foreach($QuestionRetrievalExecution as $row){
        $stringtoreturn = (string) $row["QuestionID"]."¦".$row["QuestionText"];
        array_push($QuestionsToAsk,$row["QuestionID"]);
        array_push($QuestionText,$stringtoreturn);
    }
    for($i=0;$i<count($QuestionsToAsk);$i++){
        $IsQuestionAnsweredQuery = "SELECT * FROM answertable  WHERE QuestionID = $QuestionsToAsk[$i]";
        //echo $IsQuestionAnsweredQuery;
        $IsAnswerExectuion = mysqli_query(ConnectionReturn(),$IsQuestionAnsweredQuery);
        if($IsAnswerExectuion){
            $RowCount = mysqli_num_rows($IsAnswerExectuion);
            if($RowCount>=1){
               // unset($QuestionsToAsk[$i]);
               // unset($QuestionText[$i]);
                
            }
        }
        else{
           // echo "no ans exec";
            //echo mysqli_error(ConnectionReturn());
            
        }
    }
}
else{
    //echo "no execution";
    //echo mysqli_error(ConnectionReturn());
}
}


?>