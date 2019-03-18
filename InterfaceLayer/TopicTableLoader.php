<?php
$FunctionToCall = $_POST["functiontocall"];
$Topic = $_POST["TopicClicked"];
require("..\..\MonoclBackend\QuestionTablePopulator.php");
if($FunctionToCall == 1){
    TopicTableOrganisation();    
}
else if($FunctionToCall == 2){
    BigCiclePercentageCalc();
}
else if($FunctionToCall == 3){
    QuestionTableExport($Topic);
    //do nothing
}
else if($FunctionToCall == 4){
    HomeworkLoading();
}
else{
    // do nothing
}
?>
