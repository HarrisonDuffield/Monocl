<?php
$FunctionToUse = $_POST["FunctionCalled"];
$AnswerID = $_POST["AnswerID"];
$QuestionID = $_POST["QuestionID"];
session_start();
$UserLoggedIn = $_SESSION["UserLoggedIn"];
$servername = "localhost:3306";
$account = "PHPConnection2";
$dbname = "monoclmain";
$password="PHPPassword12";

    $ConnectionFunction = mysqli_connect($servername, $account, $password, $dbname);

$AnswersToAsk = array();
$AnswerText = array();
function PointsAward($AmountToAward,$UserID){
    global $ConnectionFunction;
    $CurrentPoints =0;
    $PointRetrievalQuery = "SELECT UserPoints FROM userdetails WHERE UserID = $UserID";
    $PointRetrievalExecution = mysqli_query($ConnectionFunction,$PointRetrievalQuery);
    if($PointRetrievalExecution){
        foreach($PointRetrievalExecution as $row){
            $CurrentPoints = $row["UserPoints"];
        }
        $PointsToSet = $CurrentPoints +$AmountToAward;
        $PointAmmedmentQuery="UPDATE userdetails SET UserPoints = $PointsToSet WHERE UserID = $UserID";
        $PointAmmendmentExecution = mysqli_query($ConnectionFunction,$PointAmmedmentQuery);
        if($PointAmmendmentExecution){
            return true;

        }
        else{
            return false;
        }

    }


    else{
        return false;
    }
    

}
function AnswerPopulator($QuestionID){
    
    global $AnswersToAsk,$AnswerText,$ConnectionFunction;
$AnswerRetrievalQuery = "SELECT * FROM answertable WHERE QuestionID = $QuestionID";
$AnswerRetrievalExecution = mysqli_query($ConnectionFunction,$AnswerRetrievalQuery);
if($AnswerRetrievalExecution){
   // echo "execution";
    foreach($AnswerRetrievalExecution as $row){
        $stringtoreturn = (string) $row["AnswerID"]."¦".$row["AnswerText"];
        array_push($AnswersToAsk,$row["AnswerID"]);
        array_push($AnswerText,$stringtoreturn);
    }
}
else{
    //echo "no execution";
    //echo mysqli_error(ConnectionReturn());
}
echo json_encode($AnswerText);
}
function AnswerCorrect($AnswerID){
    global $ConnectionFunction,$UserLoggedIn;
  $Query = "UPDATE answertable SET `GeneralAvailibility` = 1 WHERE `AnswerID` = $AnswerID";
  $QueryExec = mysqli_query($ConnectionFunction,$Query);
  if($QueryExec){
  PointsAward(50,$UserLoggedIn);
  echo "it worked - 50 awarded";
  }
  else{
      myqli_error($ConnectionFunction);
  }
}
function AnswerIncorrect($AnswerID){
    //does nothign user essentially just clicks button to skip
}
if($FunctionToUse == 1){
    AnswerCorrect($AnswerID);
}
if($FunctionToUse == 2){
    AnswerPopulator($QuestionID);
}
else{
    AnswerIncorrect($AnswerID);
}
?>
