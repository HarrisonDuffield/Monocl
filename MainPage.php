<html>
<link href="Assets/FontAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/CommonAssets.css" rel="stylesheet" type="text/css">
<link href="Assets/MainPageAssets.css" rel="stylesheet" type="text/css">
<div id="MonocleHeaderBar">
    <img src="Assets/Monocl.png" align="left">
</div>
<div id="beige-box-main">
    <?php
       $TopicDisplayArray = array();
       $QuestionDisplayArray = array();
       $servername = "localhost:3306";
       $account = "PHPConnection2";
       $dbname = "monoclmain";
       $password="PHPPassword12";
       $ConnectionFunction = mysqli_connect($servername, $account, $password, $dbname);
       function QuestionDisplayArray($TopicClickedOn){
           $QuestionListQuery = "Select QuestionID from QuestionTable Where Topic = '$TopicClickedOn'";
           $QuestionListExecution = mysqli_query($ConnectionFunction,$QuestionListQuery);
           if($QuestionListExecution){
               foreach($QuestionListExecution as $row){
                   if(in_array($row['QuestionID'],$QuestionDisplayArray())){
                       echo "item already in the array";
                       
                   }
                   else{
                       array_push($QuestionDisplayArray,$row['QuestioID']);
                   }
               }
           }
           else{
               echo "Connection Failure";
       }
       function TopicListRetreival(){
       $TopicListQuery = "SELECT Topic from QuestionTable Limit *";
       $TopicListExecution= mysqli_query($ConnectionFunction, $TopicListQuery);
       if($TopicListExecution){
           foreach($TopicListExecution as $row){
                if(in_array($row['TopicListExecution'],$TopicDisplayArray)){
                   echo "item already in the array";
                }
                else{
                  
                    array_push($TopicDisplayArray,$row['TopicListExecution']);
                }
            }
       
        }
        else{
            echo "Connection Error";
        }
       }
       
    ?>
    
    
</div>
    
    
</html>