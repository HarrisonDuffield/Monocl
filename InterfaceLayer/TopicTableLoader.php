<?php
$FunctionToCall = $_POST["functiontocall"];
require("..\..\MonoclBackend\QuestionTablePopulator.php");
if($FunctionToCall == 1){
    TopicTableOrganisation();    
}
else if($FunctionToCall == 2){
    BigCiclePercentageCalc();
}
else{
    //do nothing
}
?>
